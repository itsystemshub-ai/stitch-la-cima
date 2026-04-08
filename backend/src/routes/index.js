const express = require('express');
const router = express.Router();

// Public / Auth
router.use('/auth', require('./authRoutes'));

// Product Catalog
router.use('/products', require('./productRoutes'));

// Inventory & Logistics
router.use('/inventory', require('./inventoryRoutes'));
router.use('/import', require('./importRoutes'));

// Sales & E-commerce
router.use('/sales', require('./saleRoutes'));

// ERP Purchasing / Procurement
router.use('/purchases', require('./purchaseRoutes'));

// HR & Payroll
router.use('/hr', require('./hrRoutes'));

// Health Check
router.get('/health', (req, res) => {
  res.json({ status: 'OK', timestamp: new Date(), version: '1.0.0-zenith' });
});

module.exports = router;
