const prisma = require('../models/prismaClient');
const configService = require('../services/configService');

/**
 * Get all configurations
 */
const getConfigs = async (req, res) => {
  try {
    const configs = await prisma.systemConfig.findMany({
      orderBy: [{ category: 'asc' }, { key: 'asc' }],
    });

    res.json({
      status: 'success',
      data: configs,
    });
  } catch (error) {
    res.status(500).json({
      status: 'error',
      message: `Error al obtener configuraciones: ${error.message}`,
    });
  }
};

/**
 * Get configuration by key
 */
const getConfigByKey = async (req, res) => {
  try {
    const { key } = req.params;
    const config = await prisma.systemConfig.findUnique({
      where: { key },
    });

    if (!config) {
      return res.status(404).json({
        status: 'error',
        message: `Configuracion '${key}' no encontrada`,
      });
    }

    res.json({
      status: 'success',
      data: config,
    });
  } catch (error) {
    res.status(500).json({
      status: 'error',
      message: `Error al obtener configuracion: ${error.message}`,
    });
  }
};

/**
 * Update configuration
 */
const updateConfig = async (req, res) => {
  try {
    const { key } = req.params;
    const { value, description } = req.body;

    if (value === undefined || value === null) {
      return res.status(400).json({
        status: 'error',
        message: 'El campo "value" es requerido',
      });
    }

    const config = await configService.setConfig(
      key,
      String(value),
      description,
      req.user?.id
    );

    res.json({
      status: 'success',
      data: config,
      message: 'Configuracion actualizada correctamente',
    });
  } catch (error) {
    if (error.message.includes('debe ser') || error.message.includes('valor')) {
      return res.status(400).json({
        status: 'error',
        message: error.message,
      });
    }

    res.status(500).json({
      status: 'error',
      message: `Error al actualizar configuracion: ${error.message}`,
    });
  }
};

/**
 * Get configurations by category
 */
const getConfigsByCategory = async (req, res) => {
  try {
    const { category } = req.params;

    if (!configService.VALID_CATEGORIES.includes(category)) {
      return res.status(400).json({
        status: 'error',
        message: `Categoria invalida. Categorias validas: ${configService.VALID_CATEGORIES.join(', ')}`,
      });
    }

    const configs = await prisma.systemConfig.findMany({
      where: { category },
      orderBy: { key: 'asc' },
    });

    res.json({
      status: 'success',
      data: configs,
    });
  } catch (error) {
    res.status(500).json({
      status: 'error',
      message: `Error al obtener configuraciones por categoria: ${error.message}`,
    });
  }
};

/**
 * Get system health
 */
const getSystemHealth = async (req, res) => {
  try {
    const health = await configService.getSystemHealth();

    res.json({
      status: 'success',
      data: health,
    });
  } catch (error) {
    res.status(500).json({
      status: 'error',
      message: `Error al obtener estado del sistema: ${error.message}`,
    });
  }
};

/**
 * Get scheduled tasks info
 */
const getScheduledTasks = async (req, res) => {
  try {
    const tasks = [
      {
        id: 'backup_daily',
        name: 'Backup Diario',
        schedule: '0 2 * * *',
        description: 'Backup automatico de base de datos a las 2:00 AM',
        enabled: true,
        lastRun: null,
        nextRun: 'Calculado al proximo dia a las 2:00 AM',
      },
      {
        id: 'inventory_sync',
        name: 'Sincronizacion de Inventario',
        schedule: '0 */6 * * *',
        description: 'Sincronizacion de stock cada 6 horas',
        enabled: true,
        lastRun: null,
        nextRun: 'Calculado cada 6 horas',
      },
      {
        id: 'audit_cleanup',
        name: 'Limpieza de Auditoria',
        schedule: '0 3 * * 0',
        description: 'Eliminacion de logs de auditoria mayores a 90 dias',
        enabled: false,
        lastRun: null,
        nextRun: 'No programado (deshabilitado)',
      },
      {
        id: 'payroll_process',
        name: 'Procesamiento de Nomina',
        schedule: '0 6 1 * *',
        description: 'Procesamiento automatico de nomina mensual',
        enabled: true,
        lastRun: null,
        nextRun: 'Calculado al primer dia del mes a las 6:00 AM',
      },
    ];

    res.json({
      status: 'success',
      data: {
        tasks,
        total: tasks.length,
        enabled: tasks.filter((t) => t.enabled).length,
      },
    });
  } catch (error) {
    res.status(500).json({
      status: 'error',
      message: `Error al obtener tareas programadas: ${error.message}`,
    });
  }
};

/**
 * Trigger manual backup
 */
const triggerBackup = async (req, res) => {
  try {
    const { notes } = req.body;

    const result = await configService.triggerBackup(req.user?.id, notes);

    res.json({
      status: 'success',
      message: result.message,
      data: result.backup,
    });
  } catch (error) {
    res.status(500).json({
      status: 'error',
      message: `Error al iniciar backup: ${error.message}`,
    });
  }
};

/**
 * Get audit logs with filters
 */
const getAuditLogs = async (req, res) => {
  try {
    const {
      page = 1,
      limit = 20,
      action,
      entity,
      userId,
      startDate,
      endDate,
      search,
    } = req.query;

    const where = {};

    if (action) {
      where.action = action;
    }

    if (entity) {
      where.entity = entity;
    }

    if (userId) {
      where.userId = userId;
    }

    if (startDate || endDate) {
      where.createdAt = {};
      if (startDate) {
        where.createdAt.gte = new Date(startDate);
      }
      if (endDate) {
        where.createdAt.lte = new Date(endDate);
      }
    }

    if (search) {
      where.OR = [
        { action: { contains: search, mode: 'insensitive' } },
        { entity: { contains: search, mode: 'insensitive' } },
        { entityId: { contains: search, mode: 'insensitive' } },
      ];
    }

    const skip = (parseInt(page, 10) - 1) * parseInt(limit, 10);

    const [logs, total] = await Promise.all([
      prisma.auditLog.findMany({
        where,
        orderBy: { createdAt: 'desc' },
        skip,
        take: parseInt(limit, 10),
        include: {
          user: {
            select: {
              id: true,
              name: true,
              email: true,
              role: true,
            },
          },
        },
      }),
      prisma.auditLog.count({ where }),
    ]);

    // Sanitize details field - parse JSON if present
    const sanitizedLogs = logs.map((log) => ({
      ...log,
      details: log.details ? (() => {
        try {
          return JSON.parse(log.details);
        } catch (e) {
          return log.details;
        }
      })() : null,
    }));

    res.json({
      status: 'success',
      data: {
        logs: sanitizedLogs,
        pagination: {
          total,
          page: parseInt(page, 10),
          limit: parseInt(limit, 10),
          totalPages: Math.ceil(total / parseInt(limit, 10)),
        },
      },
    });
  } catch (error) {
    res.status(500).json({
      status: 'error',
      message: `Error al obtener logs de auditoria: ${error.message}`,
    });
  }
};

module.exports = {
  getConfigs,
  getConfigByKey,
  updateConfig,
  getConfigsByCategory,
  getSystemHealth,
  getScheduledTasks,
  triggerBackup,
  getAuditLogs,
};
