const { Category, Product } = require('../models');

// GET /api/categories - Get all categories
const getAll = async (req, res) => {
  try {
    const categories = await Category.findAll({
      include: [{ model: Product, as: 'products', attributes: ['id', 'name', 'price', 'stock'] }],
      order: [['name', 'ASC']]
    });
    res.json({ success: true, data: categories });
  } catch (error) {
    console.error('Get categories error:', error);
    res.status(500).json({ success: false, message: 'Error interno del servidor' });
  }
};

// POST /api/categories - Create category (admin only)
const create = async (req, res) => {
  try {
    const { name, icon, description } = req.body;
    if (!name) {
      return res.status(400).json({ success: false, message: 'Nombre requerido' });
    }
    
    const category = await Category.create({ name, icon, description });
    res.status(201).json({ success: true, data: category });
  } catch (error) {
    console.error('Create category error:', error);
    res.status(500).json({ success: false, message: 'Error interno del servidor' });
  }
};

// PUT /api/categories/:id - Update category (admin only)
const update = async (req, res) => {
  try {
    const category = await Category.findByPk(req.params.id);
    if (!category) {
      return res.status(404).json({ success: false, message: 'Categoría no encontrada' });
    }
    
    await category.update(req.body);
    res.json({ success: true, data: category });
  } catch (error) {
    console.error('Update category error:', error);
    res.status(500).json({ success: false, message: 'Error interno del servidor' });
  }
};

// DELETE /api/categories/:id - Delete category (admin only)
const remove = async (req, res) => {
  try {
    const category = await Category.findByPk(req.params.id);
    if (!category) {
      return res.status(404).json({ success: false, message: 'Categoría no encontrada' });
    }
    
    await category.destroy();
    res.json({ success: true, message: 'Categoría eliminada' });
  } catch (error) {
    console.error('Delete category error:', error);
    res.status(500).json({ success: false, message: 'Error interno del servidor' });
  }
};

module.exports = { getAll, create, update, remove };
