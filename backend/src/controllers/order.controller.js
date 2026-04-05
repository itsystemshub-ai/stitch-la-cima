const { Order, User } = require('../models');

// GET /api/orders
const getAll = async (req, res) => {
  try {
    const { page = 1, limit = 20, status, userId } = req.query;
    const where = {};
    if (status) where.status = status;
    if (userId) where.userId = userId;

    const offset = (page - 1) * limit;
    const { count, rows: orders } = await Order.findAndCountAll({
      where,
      include: [{ model: User, as: 'user', attributes: ['id', 'name', 'email', 'company'] }],
      limit: parseInt(limit),
      offset,
      order: [['createdAt', 'DESC']],
    });

    res.json({
      success: true,
      data: {
        orders,
        pagination: {
          total: count,
          page: parseInt(page),
          limit: parseInt(limit),
          pages: Math.ceil(count / limit),
        },
      },
    });
  } catch (error) {
    res.status(500).json({ success: false, message: 'Error interno del servidor' });
  }
};

// GET /api/orders/:id
const getById = async (req, res) => {
  try {
    const order = await Order.findByPk(req.params.id, {
      include: [{ model: User, as: 'user', attributes: ['id', 'name', 'email', 'company', 'rif'] }],
    });
    if (!order) {
      return res.status(404).json({ success: false, message: 'Orden no encontrada' });
    }
    res.json({ success: true, data: order });
  } catch (error) {
    res.status(500).json({ success: false, message: 'Error interno del servidor' });
  }
};

// POST /api/orders
const create = async (req, res) => {
  try {
    const { items, subtotal, tax, shippingCost, total, paymentMethod, billingAddress, rif, notes } = req.body;

    if (!items || items.length === 0) {
      return res.status(400).json({ success: false, message: 'La orden debe tener al menos un item' });
    }

    const order = await Order.create({
      userId: req.user.id,
      items,
      subtotal,
      tax,
      shippingCost,
      total,
      paymentMethod,
      billingAddress,
      rif,
      notes,
    });

    res.status(201).json({ success: true, data: order });
  } catch (error) {
    res.status(500).json({ success: false, message: 'Error interno del servidor' });
  }
};

// PATCH /api/orders/:id/status
const updateStatus = async (req, res) => {
  try {
    const order = await Order.findByPk(req.params.id);
    if (!order) {
      return res.status(404).json({ success: false, message: 'Orden no encontrada' });
    }

    const { status, trackingNumber } = req.body;
    const updateData = { status };

    if (status === 'shipped') {
      updateData.shippedAt = new Date();
      updateData.trackingNumber = trackingNumber;
    }
    if (status === 'delivered') {
      updateData.deliveredAt = new Date();
    }

    await order.update(updateData);
    res.json({ success: true, data: order });
  } catch (error) {
    res.status(500).json({ success: false, message: 'Error interno del servidor' });
  }
};

// GET /api/orders/user/:userId
const getUserOrders = async (req, res) => {
  try {
    const orders = await Order.findAll({
      where: { userId: req.params.userId },
      order: [['createdAt', 'DESC']],
    });
    res.json({ success: true, data: orders });
  } catch (error) {
    res.status(500).json({ success: false, message: 'Error interno del servidor' });
  }
};

module.exports = { getAll, getById, create, updateStatus, getUserOrders };
