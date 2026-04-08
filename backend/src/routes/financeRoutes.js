const express = require('express');
const router = express.Router();
const financeController = require('../controllers/financeController');
const { protect, authorize } = require('../middleware/authMiddleware');

// NOTE: Specific routes MUST come before parameterized routes (:id)

// Receivables Summary
router.get('/receivables/summary', protect, authorize('ADMIN', 'MANAGER'), financeController.getReceivablesSummary);

// Fixed Assets Summary
router.get('/fixed-assets/summary', protect, authorize('ADMIN', 'MANAGER'), financeController.getFixedAssetsSummary);
router.post('/fixed-assets/depreciate-all', protect, authorize('ADMIN'), financeController.calculateAllDepreciation);

// Financial Dashboard
router.get('/dashboard', protect, authorize('ADMIN', 'MANAGER'), financeController.getFinancialDashboard);

// Receivables CRUD
router.get('/receivables', protect, authorize('ADMIN', 'MANAGER'), financeController.getAccountsReceivable);
router.post('/receivables', protect, authorize('ADMIN', 'MANAGER'), financeController.createReceivable);
router.put('/receivables/:id', protect, authorize('ADMIN', 'MANAGER'), financeController.updateReceivable);

// Fixed Assets CRUD
router.get('/fixed-assets', protect, authorize('ADMIN', 'MANAGER'), financeController.getFixedAssets);
router.post('/fixed-assets', protect, authorize('ADMIN'), financeController.createFixedAsset);
router.post('/fixed-assets/:id/depreciate', protect, authorize('ADMIN'), financeController.calculateDepreciation);

module.exports = router;
