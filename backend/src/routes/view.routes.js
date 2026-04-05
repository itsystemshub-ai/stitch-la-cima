const express = require('express');
const router = express.Router();
const { Product, Category, Order, User, Cart } = require('../models');
const { authMiddleware } = require('../middleware/auth');
const jwt = require('jsonwebtoken');
const { Op } = require('sequelize');

// Helper: Get user from cookie
async function getUserFromReq(req) {
  try {
    const token = req.cookies?.token;
    if (!token) return null;
    const decoded = jwt.verify(token, process.env.JWT_SECRET);
    return await User.findByPk(decoded.userId);
  } catch {
    return null;
  }
}

// Helper: Get cart count for user
async function getCartCount(userId) {
  if (!userId) return 0;
  const cart = await Cart.findOne({ where: { userId } });
  return cart?.items?.reduce((sum, item) => sum + (item.qty || 1), 0) || 0;
}

// Helper: Get common layout data
async function getLayoutData(req) {
  const user = await getUserFromReq(req);
  const cartCount = user ? await getCartCount(user.id) : 0;
  const categories = await Category.findAll({ where: { active: true } });
  
  return {
    user,
    cartCount,
    categories,
    apiBase: 'http://localhost:3000/api',
    siteName: 'La Cima, C.A',
    year: new Date().getFullYear(),
    port: process.env.PORT || 3000,
  };
}

// HOME
router.get('/', async (req, res) => {
  try {
    const layout = await getLayoutData(req);
    const products = await Product.findAll({
      where: { visible: true },
      limit: 8,
      order: [['createdAt', 'DESC']],
    });
    
    res.render('pages/ecommerce/index', {
      ...layout,
      title: 'Inicio',
      featuredProducts: products.map(p => p.toJSON()),
    });
  } catch (error) {
    console.error('Home error:', error);
    res.render('pages/ecommerce/index', {
      ...(await getLayoutData(req)),
      title: 'Inicio',
      featuredProducts: [],
    });
  }
});

// CATALOG
router.get('/catalogo', async (req, res) => {
  try {
    const layout = await getLayoutData(req);
    const { page = 1, limit = 20, search, brand, category } = req.query;
    
    const where = { visible: true };
    if (search) where[Op.or] = [{ name: { [Op.like]: `%${search}%` } }, { sku: { [Op.like]: `%${search}%` } }];
    if (brand) where.brand = brand;
    if (category) where.categoryId = category;

    const offset = (page - 1) * limit;
    const { count, rows: products } = await Product.findAndCountAll({ where, limit: parseInt(limit), offset, order: [['createdAt', 'DESC']] });
    const brands = await Product.findAll({ attributes: ['brand'], group: ['brand'], raw: true });

    res.render('pages/ecommerce/catalogo', {
      ...layout, title: 'Catálogo',
      products: products.map(p => p.toJSON()),
      brands: brands.map(b => b.brand),
      pagination: { total: count, page: parseInt(page), limit: parseInt(limit), pages: Math.ceil(count / limit) },
      filters: { search, brand, category },
    });
  } catch (error) {
    console.error('Catalog error:', error);
    res.render('pages/ecommerce/catalogo', { ...(await getLayoutData(req)), title: 'Catálogo', products: [], brands: [], pagination: { total: 0, page: 1, limit: 20, pages: 0 }, filters: {} });
  }
});

// SEARCH
router.get('/busqueda', async (req, res) => {
  try {
    const layout = await getLayoutData(req);
    const { q = '' } = req.query;
    let products = [];
    if (q) {
      products = await Product.findAll({
        where: { visible: true, [Op.or]: [{ name: { [Op.like]: `%${q}%` } }, { sku: { [Op.like]: `%${q}%` } }, { oem: { [Op.like]: `%${q}%` } }, { brand: { [Op.like]: `%${q}%` } }] },
        limit: 50,
      });
    }
    res.render('pages/ecommerce/busqueda', { ...layout, title: `Búsqueda: ${q}`, products: products.map(p => p.toJSON()), query: q, totalResults: products.length });
  } catch (error) {
    console.error('Search error:', error);
    res.render('pages/ecommerce/busqueda', { ...(await getLayoutData(req)), title: 'Búsqueda', products: [], query: '', totalResults: 0 });
  }
});

// LOGIN
router.get('/login', async (req, res) => {
  const layout = await getLayoutData(req);
  if (layout.user) return res.redirect('/');
  res.render('pages/auth/login', { ...layout, title: 'Iniciar Sesión' });
});

// REGISTER
router.get('/registro', async (req, res) => {
  const layout = await getLayoutData(req);
  if (layout.user) return res.redirect('/');
  res.render('pages/auth/registro-personal', { ...layout, title: 'Registro' });
});

// DASHBOARD (ERP)
router.get('/dashboard', authMiddleware, async (req, res) => {
  try {
    const layout = await getLayoutData(req);
    const totalProducts = await Product.count();
    const lowStock = await Product.count({ where: { stock: { [Op.lte]: 10 } } });
    const todayOrders = await Order.count({ where: { createdAt: { [Op.gte]: new Date(new Date().setHours(0, 0, 0, 0)) } } });
    const recentOrders = await Order.findAll({ limit: 10, order: [['createdAt', 'DESC']], include: [{ model: User, as: 'user', attributes: ['name', 'email'] }] });

    res.render('pages/erp/dashboard', {
      ...layout, title: 'Dashboard ERP',
      kpis: { totalProducts, lowStock, todayOrders, monthlySales: 0 },
      recentOrders: recentOrders.map(o => o.toJSON()),
    });
  } catch (error) {
    console.error('Dashboard error:', error);
    res.redirect('/');
  }
});

// ERP PRODUCTS
router.get('/erp/productos', authMiddleware, async (req, res) => {
  try {
    if (req.user.role !== 'admin') return res.redirect('/dashboard');
    const layout = await getLayoutData(req);
    const products = await Product.findAll({ order: [['createdAt', 'DESC']] });
    const categories = await Category.findAll();
    res.render('pages/erp/gestion-productos', { ...layout, title: 'Gestión de Productos', products: products.map(p => p.toJSON()), categories });
  } catch (error) {
    console.error('ERP products error:', error);
    res.redirect('/dashboard');
  }
});

// ERP ORDERS
router.get('/erp/ordenes', authMiddleware, async (req, res) => {
  try {
    if (req.user.role !== 'admin') return res.redirect('/dashboard');
    const layout = await getLayoutData(req);
    const orders = await Order.findAll({ order: [['createdAt', 'DESC']], limit: 50, include: [{ model: User, as: 'user', attributes: ['name', 'email', 'company'] }] });
    res.render('pages/erp/ordenes', { ...layout, title: 'Gestión de Órdenes', orders: orders.map(o => o.toJSON()) });
  } catch (error) {
    console.error('ERP orders error:', error);
    res.redirect('/dashboard');
  }
});

// STATIC PAGES
router.get('/nosotros', async (req, res) => { const layout = await getLayoutData(req); res.render('pages/ecommerce/nosotros', { ...layout, title: 'Nosotros' }); });
router.get('/contacto', async (req, res) => { const layout = await getLayoutData(req); res.render('pages/ecommerce/contacto', { ...layout, title: 'Contacto' }); });
router.get('/terminos', async (req, res) => { const layout = await getLayoutData(req); res.render('pages/ecommerce/terminos', { ...layout, title: 'Términos' }); });
router.get('/privacidad', async (req, res) => { const layout = await getLayoutData(req); res.render('pages/ecommerce/privacidad', { ...layout, title: 'Privacidad' }); });

module.exports = router;
