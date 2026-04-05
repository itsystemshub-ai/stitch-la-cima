const { DataTypes } = require('sequelize');
const sequelize = require('../config/database');

const Product = sequelize.define('Product', {
  id: {
    type: DataTypes.STRING,
    primaryKey: true,
  },
  name: {
    type: DataTypes.STRING,
    allowNull: false,
  },
  sku: {
    type: DataTypes.STRING,
    allowNull: false,
    unique: true,
  },
  oem: {
    type: DataTypes.STRING,
    allowNull: false,
  },
  description: {
    type: DataTypes.TEXT,
    allowNull: true,
  },
  categoryId: {
    type: DataTypes.STRING,
    allowNull: true,
  },
  brand: {
    type: DataTypes.STRING,
    allowNull: false,
  },
  vehicle: {
    type: DataTypes.STRING,
    allowNull: true,
  },
  price: {
    type: DataTypes.DECIMAL(10, 2),
    allowNull: false,
  },
  oldPrice: {
    type: DataTypes.DECIMAL(10, 2),
    allowNull: true,
  },
  stock: {
    type: DataTypes.INTEGER,
    allowNull: false,
    defaultValue: 0,
  },
  stockStatus: {
    type: DataTypes.ENUM('in_stock', 'low_stock', 'out_of_stock', 'under_order'),
    defaultValue: 'in_stock',
  },
  image: {
    type: DataTypes.TEXT,
    allowNull: true,
  },
  visible: {
    type: DataTypes.BOOLEAN,
    defaultValue: true,
  },
  warehouseStock: {
    type: DataTypes.JSONB,
    defaultValue: {},
    comment: 'Stock por almacén: { "warehouse-1": 50, "warehouse-2": 30 }',
  },
  specifications: {
    type: DataTypes.JSONB,
    defaultValue: {},
    comment: 'Especificaciones técnicas',
  },
  compatibility: {
    type: DataTypes.JSONB,
    defaultValue: [],
    comment: 'Vehículos compatibles',
  },
  crossReferences: {
    type: DataTypes.JSONB,
    defaultValue: [],
    comment: 'Referencias cruzadas OEM',
  },
  warranty: {
    type: DataTypes.STRING,
    allowNull: true,
  },
}, {
  indexes: [
    { fields: ['sku'] },
    { fields: ['oem'] },
    { fields: ['brand'] },
    { fields: ['categoryId'] },
    { fields: ['visible'] },
    { fields: ['name'], using: 'GIN', operator: 'gin_trgm_ops' },
  ],
});

module.exports = Product;
