const { Order, User, Product } = require('../models');
const { Op } = require('sequelize');

// GET /api/orders/stats - Get order statistics (admin only)
const getStats = async (req, res) => {
  try {
    const today = new Date();
    today.setHours(0, 0, 0, 0);
    
    const thisMonth = new Date(today.getFullYear(), today.getMonth(), 1);
    
    const total = await Order.count();
    const pending = await Order.count({ where: { status: 'pending' } });
    const todayOrders = await Order.count({ where: { createdAt: { [Op.gte]: today } } });
    const monthOrders = await Order.count({ where: { createdAt: { [Op.gte]: thisMonth } } });
    
    // Calculate monthly sales
    const monthOrdersData = await Order.findAll({
      where: { createdAt: { [Op.gte]: thisMonth }, paymentStatus: 'paid' },
      attributes: ['total']
    });
    const monthlySales = monthOrdersData.reduce((sum, o) => sum + parseFloat(o.total), 0);
    
    res.json({ success: true, data: { total, pending, todayOrders, monthOrders, monthlySales } });
  } catch (error) {
    console.error('Get order stats error:', error);
    res.status(500).json({ success: false, message: 'Error interno del servidor' });
  }
};

module.exports = { getStats };
