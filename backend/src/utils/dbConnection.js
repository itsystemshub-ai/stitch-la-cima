// ==========================================
// ZENITH ERP - Utilidad de Conexión Híbrida
// Detecta automáticamente el ambiente
// - Local: SQLite (archivo dev.db)
// - Nube: PostgreSQL (Railway, Render, Fly.io)
// ==========================================

const { PrismaClient } = require('@prisma/client');

// Detectar ambiente
const isProduction = process.env.NODE_ENV === 'production';
const isRailway = !!process.env.RAILWAY_ENVIRONMENT;
const isRender = !!process.env.RENDER;
const isFly = !!process.env.FLY_APP_NAME;

// Determinar si estamos en la nube
const isCloud = isProduction || isRailway || isRender || isFly;

// Configuración de base de datos
const dbConfig = {
  local: {
    provider: 'sqlite',
    url: 'file:./dev.db',
    description: 'SQLite (Desarrollo Local)'
  },
  cloud: {
    provider: 'postgresql',
    url: process.env.DATABASE_URL,
    description: 'PostgreSQL (Producción Nube)'
  }
};

// Seleccionar configuración según ambiente
const config = isCloud ? dbConfig.cloud : dbConfig.local;

// Logs de inicio
console.log('╔══════════════════════════════════════════╗');
console.log('║     ZENITH ERP - Conexión Base Datos     ║');
console.log('╠══════════════════════════════════════════╣');
console.log(`║  Ambiente: ${isCloud ? 'PRODUCCIÓN (Nube)'.padEnd(26)}║`);
console.log(`║  Base Datos: ${config.description.padEnd(23)}║`);
console.log(`║  Provider: ${config.provider.padEnd(25)}║`);
console.log('╚══════════════════════════════════════════╝');

// Validar conexión en producción
if (isCloud && !process.env.DATABASE_URL) {
  console.error('❌ ERROR: DATABASE_URL no está configurada');
  console.error('   En Railway/Render esto se genera automáticamente');
  console.error('   Si estás corriendo localmente, usa: npm run dev:local');
  process.exit(1);
}

// Crear instancia de Prisma Client
const prisma = new PrismaClient({
  log: isCloud 
    ? ['error', 'warn'] 
    : ['query', 'error', 'warn'],
});

// Función para verificar conexión
async function checkConnection() {
  try {
    await prisma.$connect();
    console.log(`✅ Conectado a ${config.description}`);
    return true;
  } catch (error) {
    console.error(`❌ Error de conexión: ${error.message}`);
    return false;
  }
}

// Función para cerrar conexión (graceful shutdown)
async function disconnect() {
  await prisma.$disconnect();
  console.log('🔌 Conexión cerrada');
}

module.exports = {
  prisma,
  config,
  isCloud,
  isProduction,
  checkConnection,
  disconnect
};
