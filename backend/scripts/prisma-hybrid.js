const fs = require('fs');
const path = require('path');
const { execSync } = require('child_process');

// Forzar carga de variables desde el backend
const envPath = path.join(__dirname, '../.env');
if (fs.existsSync(envPath)) {
  const envConfig = require('dotenv').parse(fs.readFileSync(envPath));
  for (const k in envConfig) {
    process.env[k] = envConfig[k];
  }
}

const useSqlite = process.env.USE_SQLITE === 'true';
const schemaPath = path.join(__dirname, '../prisma/schema.prisma');
const tempSchemaPath = path.join(__dirname, '../prisma/schema.temp.prisma');

if (!fs.existsSync(schemaPath)) {
  console.error('❌ Error Crítico: No se encontró backend/prisma/schema.prisma');
  process.exit(1);
}

console.log(`🚀 Zenith Hybrid Engine: Modo ${useSqlite ? 'SQLite' : 'PostgreSQL'}`);

let schemaContent = fs.readFileSync(schemaPath, 'utf8');

// REGEX RESILIENTE para el provider
const providerRegex = /provider\s*=\s*(env\("DB_PROVIDER"\)|"postgresql"|"sqlite")/g;

if (useSqlite) {
  schemaContent = schemaContent.replace(providerRegex, 'provider = "sqlite"');
  // Limpiar etiquetas no soportadas por SQLite
  schemaContent = schemaContent.replace(/@db\.\w+(\([^)]*\))?/g, '');
  
  if (!process.env.DATABASE_URL) {
    process.env.DATABASE_URL = 'file:./database/zenith_erp.sqlite';
  }
} else {
  schemaContent = schemaContent.replace(providerRegex, 'provider = "postgresql"');
}

fs.writeFileSync(tempSchemaPath, schemaContent);

try {
  const args = process.argv.slice(2).join(' ') || 'generate';
  console.log(`⚙️  Ejecutando: npx prisma ${args} --schema=prisma/schema.temp.prisma`);
  
  execSync(`npx prisma ${args} --schema=prisma/schema.temp.prisma`, { 
    stdio: 'inherit',
    env: process.env
  });
  
  console.log('✅ Zenith Engine: Operación completada.');
} catch (error) {
  console.error('❌ Fallo en el motor Prisma:', error.message);
  process.exit(1);
} finally {
  if (fs.existsSync(tempSchemaPath)) fs.unlinkSync(tempSchemaPath);
}
