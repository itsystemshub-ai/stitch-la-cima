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

// Accounting & Finance (ERP)
router.use('/accounting', require('./accountingRoutes'));
router.use('/finance', require('./financeRoutes'));

// Hybrid Sync (Híbrido)
router.use('/sync', require('./syncRoutes'));

// System Configuration & Administration (ERP)
router.use('/admin/config', require('./configRoutes'));
router.use('/admin/users', require('./userManagementRoutes'));

// Health Check
router.get('/health', (req, res) => {
  res.json({ status: 'OK', timestamp: new Date(), version: '1.0.0-zenith' });
});

module.exports = router;
