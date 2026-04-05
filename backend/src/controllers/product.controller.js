const { Product, Category } = require('../models');
const { Op } = require('sequelize');

// GET /api/products
const getAll = async (req, res) => {
  try {
    const { page = 1, limit = 20, search, brand, category, stock, sort } = req.query;
    
    const where = {};
    if (search) {
      where[Op.or] = [
        { name: { [Op.iLike]: `%${search}%` } },
        { sku: { [Op.iLike]: `%${search}%` } },
        { oem: { [Op.iLike]: `%${search}%` } },
      ];
    }
    if (brand) where.brand = brand;
    if (category) where.categoryId = category;
    if (stock === 'in_stock') where.stock = { [Op.gt]: 0 };
    if (stock === 'out_of_stock') where.stock = 0;

    const order = [];
    if (sort) {
      const [field, direction] = sort.split(':');
      order.push([field, direction.toLowerCase()]);
    }

    const offset = (page - 1) * limit;
    const { count, rows: products } = await Product.findAndCountAll({
      where,
      limit: parseInt(limit),
      offset,
      order: order.length ? order : [['createdAt', 'DESC']],
    });

    res.json({
      success: true,
      data: {
        products,
        pagination: {
          total: count,
          page: parseInt(page),
          limit: parseInt(limit),
          pages: Math.ceil(count / limit),
        },
      },
    });
  } catch (error) {
    console.error('Error getAll products:', error);
    res.status(500).json({
      success: false,
      message: 'Error interno del servidor',
    });
  }
};

// GET /api/products/visible
const getVisible = async (req, res) => {
  try {
    const products = await Product.findAll({ where: { visible: true } });
    res.json({ success: true, data: products });
  } catch (error) {
    console.error('Error getVisible products:', error);
    res.status(500).json({ success: false, message: 'Error interno del servidor' });
  }
};

// GET /api/products/:id
const getById = async (req, res) => {
  try {
    const product = await Product.findByPk(req.params.id);
    if (!product) {
      return res.status(404).json({ success: false, message: 'Producto no encontrado' });
    }
    res.json({ success: true, data: product });
  } catch (error) {
    console.error('Error getById product:', error);
    res.status(500).json({ success: false, message: 'Error interno del servidor' });
  }
};

// POST /api/products (admin only)
const create = async (req, res) => {
  try {
    const product = await Product.create(req.body);
    res.status(201).json({ success: true, data: product });
  } catch (error) {
    console.error('Error create product:', error);
    res.status(500).json({ success: false, message: error.message });
  }
};

// PUT /api/products/:id
const update = async (req, res) => {
  try {
    const product = await Product.findByPk(req.params.id);
    if (!product) {
      return res.status(404).json({ success: false, message: 'Producto no encontrado' });
    }
    await product.update(req.body);
    res.json({ success: true, data: product });
  } catch (error) {
    console.error('Error update product:', error);
    res.status(500).json({ success: false, message: error.message });
  }
};

// DELETE /api/products/:id
const remove = async (req, res) => {
  try {
    const product = await Product.findByPk(req.params.id);
    if (!product) {
      return res.status(404).json({ success: false, message: 'Producto no encontrado' });
    }
    await product.destroy();
    res.json({ success: true, message: 'Producto eliminado' });
  } catch (error) {
    console.error('Error delete product:', error);
    res.status(500).json({ success: false, message: 'Error interno del servidor' });
  }
};

// PATCH /api/products/:id/toggle-visibility
const toggleVisibility = async (req, res) => {
  try {
    const product = await Product.findByPk(req.params.id);
    if (!product) {
      return res.status(404).json({ success: false, message: 'Producto no encontrado' });
    }
    await product.update({ visible: !product.visible });
    res.json({ success: true, data: product });
  } catch (error) {
    console.error('Error toggleVisibility product:', error);
    res.status(500).json({ success: false, message: 'Error interno del servidor' });
  }
};

module.exports = { getAll, getVisible, getById, create, update, remove, toggleVisibility };
