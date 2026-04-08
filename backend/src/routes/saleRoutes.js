const express = require('express');
const router = express.Router();
const saleController = require('../controllers/saleController');
const { protect, authorize } = require('../middleware/authMiddleware');

// POST /api/sales - Create sale
router.post('/', protect, saleController.createSale);

// GET /api/sales - List sales with filters
router.get('/', protect, saleController.getSales);

// GET /api/sales/summary - Get sales summary
router.get('/summary', protect, saleController.getSalesSummary);

// GET /api/sales/by-date - Sales by date range
router.get('/by-date', protect, saleController.getSalesByDate);

// GET /api/sales/top-products - Top selling products
router.get('/top-products', protect, saleController.getTopProducts);

// GET /api/sales/by-salesperson - Sales by salesperson
router.get('/by-salesperson', protect, saleController.getSalesBySalesperson);

// POST /api/sales/credit-notes - Create credit note (ADMIN only)
router.post('/credit-notes', protect, authorize('ADMIN'), saleController.createCreditNote);

// GET /api/sales/credit-notes - List credit notes
router.get('/credit-notes', protect, saleController.getCreditNotes);

// GET /api/sales/daily-report - Daily sales report
router.get('/daily-report', protect, saleController.getDailyReport);

// GET /api/sales/tax-report - Tax report (ADMIN, MANAGER only)
router.get('/tax-report', protect, authorize('ADMIN', 'MANAGER'), saleController.getTaxReport);

// GET /api/sales/:id - Get sale detail
router.get('/:id', protect, saleController.getSaleById);

// POST /api/sales/:id/cancel - Cancel sale (ADMIN, MANAGER only)
router.post('/:id/cancel', protect, authorize('ADMIN', 'MANAGER'), saleController.cancelSale);

module.exports = router;
