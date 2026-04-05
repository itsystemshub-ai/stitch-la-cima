const sequelize = require('../config/database');
const User = require('./User');
const Product = require('./Product');
const Category = require('./Category');
const Order = require('./Order');
const Cart = require('./Cart');
const B2BRequest = require('./B2BRequest');
const PasswordRecovery = require('./PasswordRecovery');
const ActivityLog = require('./ActivityLog');

// Relationships
User.hasMany(Order, { foreignKey: 'userId', as: 'orders' });
Order.belongsTo(User, { foreignKey: 'userId', as: 'user' });

User.hasOne(Cart, { foreignKey: 'userId', as: 'cart' });
Cart.belongsTo(User, { foreignKey: 'userId', as: 'user' });

Category.hasMany(Product, { foreignKey: 'categoryId', as: 'products' });
Product.belongsTo(Category, { foreignKey: 'categoryId', as: 'category' });

User.hasMany(ActivityLog, { foreignKey: 'userId', as: 'logs' });
ActivityLog.belongsTo(User, { foreignKey: 'userId', as: 'user' });

// Sync all models
const syncModels = async () => {
  await sequelize.sync({ alter: process.env.NODE_ENV === 'development' });
  console.log('✅ Modelos sincronizados');
};

module.exports = {
  sequelize,
  User,
  Product,
  Category,
  Order,
  Cart,
  B2BRequest,
  PasswordRecovery,
  ActivityLog,
  syncModels,
};
