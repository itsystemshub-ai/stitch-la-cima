const prisma = require('../models/prismaClient');
const { exec } = require('child_process');
const fs = require('fs');
const path = require('path');
const util = require('util');

const execPromise = util.promisify(exec);

/**
 * Valid configuration categories
 */
const VALID_CATEGORIES = ['GENERAL', 'FISCAL', 'INVENTORY', 'SALES', 'HR'];

/**
 * Valid configuration keys with their expected categories and validation rules
 */
const CONFIG_VALIDATION_RULES = {
  // GENERAL
  'app.name': { category: 'GENERAL', type: 'string' },
  'app.timezone': { category: 'GENERAL', type: 'string' },
  'app.language': { category: 'GENERAL', type: 'string' },
  'app.maintenance_mode': { category: 'GENERAL', type: 'boolean' },

  // FISCAL
  'fiscal.tax_rate': { category: 'FISCAL', type: 'number', min: 0, max: 100 },
  'fiscal.company_name': { category: 'FISCAL', type: 'string' },
  'fiscal.company_rif': { category: 'FISCAL', type: 'string' },
  'fiscal.fiscal_address': { category: 'FISCAL', type: 'string' },
  'fiscal.invoice_prefix': { category: 'FISCAL', type: 'string' },
  'fiscal.contribuyente_especial': { category: 'FISCAL', type: 'boolean' },

  // INVENTORY
  'inventory.low_stock_threshold': { category: 'INVENTORY', type: 'number', min: 0 },
  'inventory.auto_reorder': { category: 'INVENTORY', type: 'boolean' },
  'inventory.costing_method': { category: 'INVENTORY', type: 'string', allowed: ['FIFO', 'LIFO', 'WEIGHTED_AVG'] },

  // SALES
  'sales.max_discount_percent': { category: 'SALES', type: 'number', min: 0, max: 100 },
  'sales.require_po_number': { category: 'SALES', type: 'boolean' },
  'sales.auto_invoice': { category: 'SALES', type: 'boolean' },
  'sales.credit_limit': { category: 'SALES', type: 'number', min: 0 },

  // HR
  'hr.work_hours_per_day': { category: 'HR', type: 'number', min: 1, max: 24 },
  'hr.overtime_multiplier': { category: 'HR', type: 'number', min: 1 },
  'hr.payroll_frequency': { category: 'HR', type: 'string', allowed: ['WEEKLY', 'BIWEEKLY', 'MONTHLY'] },
};

/**
 * Get a configuration value by key
 * @param {string} key - Configuration key
 * @param {string} [defaultValue] - Default value if key not found
 * @returns {Promise<string|null>} Configuration value
 */
async function getConfig(key, defaultValue = null) {
  try {
    const config = await prisma.systemConfig.findUnique({
      where: { key },
    });
    return config ? config.value : defaultValue;
  } catch (error) {
    throw new Error(`Error al obtener configuracion '${key}': ${error.message}`);
  }
}

/**
 * Set a configuration value
 * @param {string} key - Configuration key
 * @param {string} value - Configuration value
 * @param {string} [description] - Optional description
 * @param {number} [userId] - User ID for audit logging
 * @returns {Promise<object>} Updated configuration
 */
async function setConfig(key, value, description = null, userId = null) {
  const validation = validateConfig(key, value);
  if (!validation.valid) {
    throw new Error(validation.error);
  }

  try {
    const existingConfig = await prisma.systemConfig.findUnique({
      where: { key },
    });

    const oldValues = existingConfig ? { key: existingConfig.key, value: existingConfig.value } : null;

    const config = await prisma.systemConfig.upsert({
      where: { key },
      update: { value, description: description || existingConfig?.description },
      create: {
        key,
        value,
        description,
        category: CONFIG_VALIDATION_RULES[key]?.category || 'GENERAL',
      },
    });

    // Log audit
    await logAudit({
      userId,
      action: existingConfig ? 'UPDATE' : 'CREATE',
      entity: 'SystemConfig',
      entityId: key,
      details: JSON.stringify({
        oldValue: oldValues,
        newValue: { key: config.key, value: config.value },
      }),
    });

    return config;
  } catch (error) {
    throw new Error(`Error al guardar configuracion '${key}': ${error.message}`);
  }
}

/**
 * Validate configuration data
 * @param {string} key - Configuration key
 * @param {string} value - Configuration value
 * @returns {{ valid: boolean, error?: string }} Validation result
 */
function validateConfig(key, value) {
  const rules = CONFIG_VALIDATION_RULES[key];

  if (!rules) {
    // Unknown key - allow it but warn
    return { valid: true };
  }

  // Type validation
  switch (rules.type) {
    case 'number': {
      const num = parseFloat(value);
      if (isNaN(num)) {
        return { valid: false, error: `El valor para '${key}' debe ser un numero` };
      }
      if (rules.min !== undefined && num < rules.min) {
        return { valid: false, error: `El valor minimo para '${key}' es ${rules.min}` };
      }
      if (rules.max !== undefined && num > rules.max) {
        return { valid: false, error: `El valor maximo para '${key}' es ${rules.max}` };
      }
      break;
    }
    case 'boolean': {
      const boolValues = ['true', 'false', '1', '0', 'yes', 'no'];
      if (!boolValues.includes(String(value).toLowerCase())) {
        return { valid: false, error: `El valor para '${key}' debe ser booleano (true/false)` };
      }
      break;
    }
    case 'string': {
      if (rules.allowed && !rules.allowed.includes(String(value))) {
        return {
          valid: false,
          error: `El valor para '${key}' debe ser uno de: ${rules.allowed.join(', ')}`,
        };
      }
      if (!value || String(value).trim().length === 0) {
        return { valid: false, error: `El valor para '${key}' no puede estar vacio` };
      }
      break;
    }
  }

  return { valid: true };
}

/**
 * Create an audit log entry
 * @param {object} params - Audit log parameters
 * @param {number|null} [params.userId] - User ID
 * @param {string} params.action - Action performed
 * @param {string} params.entity - Entity type
 * @param {string|null} [params.entityId] - Entity ID
 * @param {string|null} [params.details] - Details in JSON
 * @param {string|null} [params.ip] - IP address
 * @returns {Promise<object>} Created audit log
 */
async function logAudit({ userId, action, entity, entityId = null, details = null, ip = null }) {
  try {
    return await prisma.auditLog.create({
      data: {
        userId,
        action,
        entity,
        entityId,
        details,
        ip,
      },
    });
  } catch (error) {
    // Do not throw - audit logging should not break the main operation
    console.error('Error al registrar auditoria:', error.message);
    return null;
  }
}

/**
 * Trigger a database backup
 * @param {number} [userId] - User ID for audit logging
 * @param {string} [notes] - Optional notes
 * @returns {Promise<object>} Backup record
 */
async function triggerBackup(userId = null, notes = null) {
  const timestamp = new Date().toISOString().replace(/[:.]/g, '-');
  const filename = `backup_${timestamp}.sql`;

  let backupRecord;
  try {
    backupRecord = await prisma.backup.create({
      data: {
        filename,
        size: 0,
        status: 'PENDING',
        notes,
      },
    });

    // Log audit
    await logAudit({
      userId,
      action: 'CREATE',
      entity: 'Backup',
      entityId: String(backupRecord.id),
      details: JSON.stringify({ filename, notes }),
    });

    // Execute backup asynchronously
    performBackup(backupRecord.id, filename).catch((err) => {
      console.error('Error en backup asincrono:', err.message);
    });

    return { status: 'success', message: 'Backup iniciado', backup: backupRecord };
  } catch (error) {
    throw new Error(`Error al iniciar backup: ${error.message}`);
  }
}

/**
 * Perform the actual backup operation
 * @param {number} backupId - Backup record ID
 * @param {string} filename - Backup filename
 */
async function performBackup(backupId, filename) {
  const backupDir = path.join(__dirname, '..', '..', 'backups');

  // Create backups directory if it doesn't exist
  if (!fs.existsSync(backupDir)) {
    fs.mkdirSync(backupDir, { recursive: true });
  }

  const filepath = path.join(backupDir, filename);
  const startTime = Date.now();

  try {
    // Use pg_dump for PostgreSQL backup
    const databaseUrl = process.env.DATABASE_URL;
    if (!databaseUrl) {
      throw new Error('DATABASE_URL no configurada');
    }

    // Parse connection info from DATABASE_URL
    const url = new URL(databaseUrl);
    const pgPassword = url.password;
    const pgUser = url.username;
    const pgHost = url.hostname;
    const pgPort = url.port || '5432';
    const pgDatabase = url.pathname.substring(1);

    // Set PGPASSWORD environment variable for pg_dump
    const env = {
      ...process.env,
      PGPASSWORD: pgPassword,
    };

    const { stdout, stderr } = await execPromise(
      `pg_dump -h ${pgHost} -p ${pgPort} -U ${pgUser} -d ${pgDatabase} -F p -f "${filepath}"`,
      { env }
    );

    if (stderr && !stderr.includes('WARNING')) {
      console.warn('pg_dump warnings:', stderr);
    }

    // Get file size
    const stats = fs.statSync(filepath);

    // Update backup record
    await prisma.backup.update({
      where: { id: backupId },
      data: {
        size: stats.size,
        status: 'COMPLETED',
        completedAt: new Date(),
        notes: `Backup completado en ${((Date.now() - startTime) / 1000).toFixed(2)}s`,
      },
    });
  } catch (error) {
    await prisma.backup.update({
      where: { id: backupId },
      data: {
        status: 'FAILED',
        completedAt: new Date(),
        notes: `Error: ${error.message}`,
      },
    });
    throw new Error(`Backup failed: ${error.message}`);
  }
}

/**
 * Get system health metrics
 * @returns {Promise<object>} System health information
 */
async function getSystemHealth() {
  try {
    // Database status
    const dbStatus = await prisma.$queryRaw`SELECT 1 as connected`;
    const isConnected = dbStatus.length > 0 && dbStatus[0].connected === 1;

    // Record counts
    const userCount = await prisma.user.count();
    const productCount = await prisma.product.count();
    const saleCount = await prisma.sale.count();

    // Recent audit logs
    const recentAuditLogs = await prisma.auditLog.findMany({
      orderBy: { createdAt: 'desc' },
      take: 5,
      select: { id: true, action: true, entity: true, createdAt: true },
    });

    // Memory usage
    const memUsage = process.memoryUsage();

    // Uptime
    const uptimeSeconds = process.uptime();

    // Disk space (approximate via backup directory)
    let diskUsage = null;
    const backupDir = path.join(__dirname, '..', '..', 'backups');
    if (fs.existsSync(backupDir)) {
      const files = fs.readdirSync(backupDir);
      let totalSize = 0;
      for (const file of files) {
        try {
          const stats = fs.statSync(path.join(backupDir, file));
          totalSize += stats.size;
        } catch (e) {
          // Skip files we can't read
        }
      }
      diskUsage = { backupDirSize: totalSize, fileCount: files.length };
    }

    return {
      status: 'healthy',
      database: {
        connected: isConnected,
        recordCounts: {
          users: userCount,
          products: productCount,
          sales: saleCount,
        },
      },
      server: {
        uptime: uptimeSeconds,
        uptimeFormatted: formatUptime(uptimeSeconds),
        memory: {
          rss: formatBytes(memUsage.rss),
          heapTotal: formatBytes(memUsage.heapTotal),
          heapUsed: formatBytes(memUsage.heapUsed),
          external: formatBytes(memUsage.external),
        },
        nodeVersion: process.version,
        platform: process.platform,
      },
      disk: diskUsage,
      recentActivity: recentAuditLogs,
    };
  } catch (error) {
    return {
      status: 'degraded',
      error: error.message,
      database: { connected: false },
    };
  }
}

/**
 * Format bytes to human-readable string
 * @param {number} bytes - Bytes
 * @returns {string} Formatted string
 */
function formatBytes(bytes) {
  if (bytes === 0) return '0 B';
  const k = 1024;
  const sizes = ['B', 'KB', 'MB', 'GB'];
  const i = Math.floor(Math.log(bytes) / Math.log(k));
  return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
}

/**
 * Format uptime seconds to human-readable string
 * @param {number} seconds - Seconds
 * @returns {string} Formatted string
 */
function formatUptime(seconds) {
  const days = Math.floor(seconds / 86400);
  const hours = Math.floor((seconds % 86400) / 3600);
  const minutes = Math.floor((seconds % 3600) / 60);
  const secs = Math.floor(seconds % 60);

  const parts = [];
  if (days > 0) parts.push(`${days}d`);
  if (hours > 0) parts.push(`${hours}h`);
  if (minutes > 0) parts.push(`${minutes}m`);
  if (secs > 0 || parts.length === 0) parts.push(`${secs}s`);

  return parts.join(' ');
}

/**
 * Generate a configuration report
 * @returns {Promise<object>} Configuration report
 */
async function generateConfigReport() {
  try {
    const configs = await prisma.systemConfig.findMany({
      orderBy: [{ category: 'asc' }, { key: 'asc' }],
    });

    const groupedByCategory = {};
    for (const config of configs) {
      if (!groupedByCategory[config.category]) {
        groupedByCategory[config.category] = [];
      }
      groupedByCategory[config.category].push({
        key: config.key,
        value: config.value,
        description: config.description,
        updatedAt: config.updatedAt,
      });
    }

    // Add missing categories with empty arrays
    for (const category of VALID_CATEGORIES) {
      if (!groupedByCategory[category]) {
        groupedByCategory[category] = [];
      }
    }

    return {
      totalConfigs: configs.length,
      categories: Object.keys(groupedByCategory).length,
      groupedByCategory,
      generatedAt: new Date().toISOString(),
    };
  } catch (error) {
    throw new Error(`Error al generar reporte de configuracion: ${error.message}`);
  }
}

module.exports = {
  getConfig,
  setConfig,
  validateConfig,
  logAudit,
  triggerBackup,
  getSystemHealth,
  generateConfigReport,
  VALID_CATEGORIES,
  CONFIG_VALIDATION_RULES,
};
