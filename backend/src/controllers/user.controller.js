const { User, Order, ActivityLog } = require('../models');
const bcrypt = require('bcrypt');

// GET /api/users - Get all users (admin only)
const getAll = async (req, res) => {
  try {
    const users = await User.findAll({
      attributes: { exclude: ['password'] },
      order: [['createdAt', 'DESC']]
    });
    res.json({ success: true, data: users });
  } catch (error) {
    console.error('Get users error:', error);
    res.status(500).json({ success: false, message: 'Error interno del servidor' });
  }
};

// GET /api/users/:id - Get user by ID
const getById = async (req, res) => {
  try {
    const user = await User.findByPk(req.params.id, {
      attributes: { exclude: ['password'] },
      include: [{ model: Order, as: 'orders', limit: 10, order: [['createdAt', 'DESC']] }]
    });
    if (!user) {
      return res.status(404).json({ success: false, message: 'Usuario no encontrado' });
    }
    res.json({ success: true, data: user });
  } catch (error) {
    console.error('Get user error:', error);
    res.status(500).json({ success: false, message: 'Error interno del servidor' });
  }
};

// PUT /api/users/:id - Update user profile
const updateProfile = async (req, res) => {
  try {
    const user = await User.findByPk(req.params.id);
    if (!user) {
      return res.status(404).json({ success: false, message: 'Usuario no encontrado' });
    }
    
    // Only allow users to update their own profile
    if (req.user.id !== user.id && req.user.role !== 'admin') {
      return res.status(403).json({ success: false, message: 'No autorizado' });
    }
    
    const { name, phone, address } = req.body;
    await user.update({ name, phone, address });
    
    res.json({ success: true, data: { id: user.id, name: user.name, email: user.email, phone: user.phone, address: user.address } });
  } catch (error) {
    console.error('Update profile error:', error);
    res.status(500).json({ success: false, message: 'Error interno del servidor' });
  }
};

// PATCH /api/users/:id/status - Update user status (admin only)
const updateStatus = async (req, res) => {
  try {
    const { status } = req.body;
    if (!['active', 'suspended', 'pending_approval'].includes(status)) {
      return res.status(400).json({ success: false, message: 'Estado inválido' });
    }
    
    const user = await User.findByPk(req.params.id);
    if (!user) {
      return res.status(404).json({ success: false, message: 'Usuario no encontrado' });
    }
    
    await user.update({ status });
    res.json({ success: true, message: `Estado actualizado a ${status}` });
  } catch (error) {
    console.error('Update status error:', error);
    res.status(500).json({ success: false, message: 'Error interno del servidor' });
  }
};

// DELETE /api/users/:id - Delete user (admin only)
const remove = async (req, res) => {
  try {
    const user = await User.findByPk(req.params.id);
    if (!user) {
      return res.status(404).json({ success: false, message: 'Usuario no encontrado' });
    }
    
    await user.destroy();
    res.json({ success: true, message: 'Usuario eliminado' });
  } catch (error) {
    console.error('Delete user error:', error);
    res.status(500).json({ success: false, message: 'Error interno del servidor' });
  }
};

// GET /api/users/me/orders - Get current user's orders
const getMyOrders = async (req, res) => {
  try {
    const orders = await Order.findAll({
      where: { userId: req.user.id },
      order: [['createdAt', 'DESC']],
      limit: 50
    });
    res.json({ success: true, data: orders });
  } catch (error) {
    console.error('Get my orders error:', error);
    res.status(500).json({ success: false, message: 'Error interno del servidor' });
  }
};

// GET /api/users/stats - Get user stats (admin only)
const getStats = async (req, res) => {
  try {
    const total = await User.count();
    const active = await User.count({ where: { status: 'active' } });
    const b2b = await User.count({ where: { role: 'b2b' } });
    const pending = await User.count({ where: { status: 'pending_approval' } });
    
    res.json({ success: true, data: { total, active, b2b, pending } });
  } catch (error) {
    console.error('Get user stats error:', error);
    res.status(500).json({ success: false, message: 'Error interno del servidor' });
  }
};

module.exports = { getAll, getById, updateProfile, updateStatus, remove, getMyOrders, getStats };
