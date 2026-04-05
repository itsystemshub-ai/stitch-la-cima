const { Sequelize } = require('sequelize');
require('dotenv').config();

// Try PostgreSQL first, fallback to SQLite
const isSQLite = !process.env.DB_HOST || process.env.DB_HOST === 'localhost' && process.env.USE_SQLITE === 'true';

let sequelize;

if (isSQLite || process.env.USE_SQLITE === 'true') {
  console.log('📦 Usando SQLite para desarrollo local...');
  sequelize = new Sequelize({
    dialect: 'sqlite',
    storage: './database/zenith_erp.sqlite',
    logging: process.env.NODE_ENV === 'development' ? console.log : false,
  });
} else {
  sequelize = new Sequelize(
    process.env.DB_NAME || 'zenith_erp_lacima',
    process.env.DB_USER || 'postgres',
    process.env.DB_PASSWORD || 'postgres',
    {
      host: process.env.DB_HOST || 'localhost',
      port: process.env.DB_PORT || 5432,
      dialect: 'postgres',
      logging: process.env.NODE_ENV === 'development' ? console.log : false,
      pool: {
        max: 10,
        min: 0,
        acquire: 30000,
        idle: 10000,
      },
    }
  );
}

module.exports = sequelize;
