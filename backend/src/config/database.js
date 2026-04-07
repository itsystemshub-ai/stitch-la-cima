/**
 * Database Configuration
 * La Cima Zenith ERP - SQLite default, PostgreSQL ready
 * 
 * IMPORTANT: sequelize instance is exported directly for models to use.
 * initDatabase() can be called in app.js to potentially switch to PostgreSQL.
 */
const { Sequelize } = require('sequelize');
require('dotenv').config();

// Default to SQLite for local development
const sequelize = new Sequelize({
  dialect: 'sqlite',
  storage: './database/zenith_erp.sqlite',
  logging: process.env.NODE_ENV === 'development' ? console.log : false,
});

// Function to switch to PostgreSQL when available
async function initDatabase() {
  try {
    // Try PostgreSQL
    const pgSequelize = new Sequelize(
      process.env.DB_NAME || 'zenith_erp_lacima',
      process.env.DB_USER || 'postgres',
      process.env.DB_PASSWORD || 'postgres',
      {
        host: process.env.DB_HOST || 'localhost',
        port: process.env.DB_PORT || 5432,
        dialect: 'postgres',
        logging: false,
        pool: { max: 10, min: 0, acquire: 30000, idle: 10000 },
      }
    );
    await pgSequelize.authenticate();
    console.log('✅ PostgreSQL conectado correctamente');
    return { sequelize: pgSequelize, dialect: 'postgres' };
  } catch (pgError) {
    // Use SQLite (already initialized)
    await sequelize.authenticate();
    console.log('✅ SQLite conectado (fallback para desarrollo local)');
    console.log('💡 Para producción con PostgreSQL, configurar:');
    console.log('   DB_HOST=localhost');
    console.log('   DB_NAME=zenith_erp_lacima');
    console.log('   DB_USER=postgres');
    console.log('   DB_PASSWORD=your_secure_password');
    return { sequelize, dialect: 'sqlite' };
  }
}

// Export sequelize directly for models to use
module.exports = sequelize;
module.exports.initDatabase = initDatabase;
