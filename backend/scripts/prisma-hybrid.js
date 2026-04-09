const fs = require('fs');
const path = require('path');
const { execSync } = require('child_process');

// Load .env from the same directory or parent
const envPath = path.join(__dirname, '../.env');
let useSqlite = true;

if (fs.existsSync(envPath)) {
  const envContent = fs.readFileSync(envPath, 'utf8');
  useSqlite = envContent.includes('USE_SQLITE=true');
}

const schemaPath = path.join(__dirname, '../prisma/schema.prisma');
const tempSchemaPath = path.join(__dirname, '../prisma/schema.temp.prisma');

if (!fs.existsSync(schemaPath)) {
  console.error('❌ Error: No se encontró el archivo schema.prisma');
  process.exit(1);
}

console.log('🔄 Zenith Engine: Preparando esquema para modo ' + (useSqlite ? 'HÍBRIDO (Local/SQLite)' : 'NUBE (PostgreSQL)'));

let schema = fs.readFileSync(schemaPath, 'utf8');

if (useSqlite) {
  // Convertir esquema para SQLite
  schema = schema.replace(/provider = "postgresql"/g, 'provider = "sqlite"');
  
  // SQLite no soporta @db.VarChar, @db.Text, etc. 
  // Los eliminamos para que el validador de Prisma pase en local
  schema = schema.replace(/@db\.\w+(\([^)]*\))?/g, '');
  
  // Asegurarnos de que el URL apunte a un archivo local si no está definido
  if (!process.env.DATABASE_URL || !process.env.DATABASE_URL.startsWith('file:')) {
    process.env.DATABASE_URL = 'file:./dev.db';
    console.log('📝 DATABASE_URL configurado temporalmente como: file:./dev.db');
  }
}

// Escribir esquema temporal
fs.writeFileSync(tempSchemaPath, schema);

try {
  const command = process.argv.slice(2).join(' ') || 'generate';
  console.log(`🚀 Ejecutando: prisma ${command} --schema=prisma/schema.temp.prisma`);
  
  execSync(`npx prisma ${command} --schema=prisma/schema.temp.prisma`, { 
    stdio: 'inherit',
    env: { ...process.env, DATABASE_URL: process.env.DATABASE_URL }
  });
  
  console.log('✅ Operación completada con éxito.');
} catch (error) {
  console.error('❌ Error ejecutando comando Prisma:', error.message);
  process.exit(1);
} finally {
  // Limpiar esquema temporal (opcional, pero recomendado para no ensuciar el repo)
  if (fs.existsSync(tempSchemaPath)) {
    fs.unlinkSync(tempSchemaPath);
  }
}
