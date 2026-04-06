const express = require('express');
const router = express.Router();
const { Product, Category, Order, User } = require('../models');
const { Op } = require('sequelize');

// Helper para datos comunes
async function getCommonData(req) {
  const user = req.user || null;
  return { user };
}

// HOME - Vista dinámica principal
router.get('/', async (req, res) => {
  try {
    const products = await Product.findAll({ where: { visible: true }, limit: 8, order: [['createdAt', 'DESC']] });
    const categories = await Category.findAll({ where: { active: true } });
    
    res.render('pages/ecommerce/index', {
      title: 'Inicio',
      page: 'home',
      products,
      categories,
      ...await getCommonData(req)
    });
  } catch (error) {
    console.error('Home error:', error);
    // Fallback to static file
    res.sendFile(require('path').join(__dirname, '../../frontend/public/ecommerce/index.html'));
  }
});

// CATALOG - Vista dinámica de catálogo
router.get('/catalogo', async (req, res) => {
  try {
    const { page = 1, limit = 20, search, brand, category } = req.query;
    const where = { visible: true };
    if (search) where[Op.or] = [{ name: { [Op.like]: `%${search}%` } }, { sku: { [Op.like]: `%${search}%` } }];
    if (brand) where.brand = brand;
    if (category) where.categoryId = category;
    
    const offset = (page - 1) * limit;
    const { count, rows: products } = await Product.findAndCountAll({ where, limit: parseInt(limit), offset, order: [['createdAt', 'DESC']] });
    const brands = await Product.findAll({ attributes: ['brand'], group: ['brand'], raw: true });
    const categories = await Category.findAll({ where: { active: true } });
    
    res.render('pages/ecommerce/catalogo', {
      title: 'Catálogo',
      page: 'catalogo',
      products,
      brands: brands.map(b => b.brand),
      categories,
      pagination: { total: count, page: parseInt(page), limit: parseInt(limit), pages: Math.ceil(count / limit) },
      ...await getCommonData(req)
    });
  } catch (error) {
    console.error('Catalog error:', error);
    res.sendFile(require('path').join(__dirname, '../../frontend/public/ecommerce/Catalogo_general.html'));
  }
});

module.exports = router;
