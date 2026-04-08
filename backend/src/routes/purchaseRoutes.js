const express = require('express');
const router = express.Router();
const purchaseController = require('../controllers/purchaseController');
const { protect, authorize } = require('../middleware/authMiddleware');

// ==========================================
// SUPPLIER ROUTES
// ==========================================

// GET /api/purchases/suppliers - List all suppliers
router.get('/suppliers', protect, purchaseController.getSuppliers);

// GET /api/purchases/suppliers/:id - Get supplier details
router.get('/suppliers/:id', protect, purchaseController.getSupplierById);

// POST /api/purchases/suppliers - Create supplier (ADMIN, MANAGER only)
router.post('/suppliers', protect, authorize('ADMIN', 'MANAGER'), purchaseController.createSupplier);

// PUT /api/purchases/suppliers/:id - Update supplier (ADMIN, MANAGER only)
router.put('/suppliers/:id', protect, authorize('ADMIN', 'MANAGER'), purchaseController.updateSupplier);

// ==========================================
// PURCHASE ORDER ROUTES
// ==========================================

// POST /api/purchases/orders - Create purchase order (ADMIN, MANAGER only)
router.post('/orders', protect, authorize('ADMIN', 'MANAGER'), purchaseController.createPurchaseOrder);

// GET /api/purchases/orders - List purchase orders
router.get('/orders', protect, purchaseController.getPurchaseOrders);

// GET /api/purchases/orders/:id - Get purchase order details
router.get('/orders/:id', protect, purchaseController.getPurchaseOrderById);

// POST /api/purchases/orders/:id/approve - Approve PO (ADMIN, MANAGER only)
router.post('/orders/:id/approve', protect, authorize('ADMIN', 'MANAGER'), purchaseController.approvePurchaseOrder);

// POST /api/purchases/orders/:id/receive - Receive PO (ADMIN, MANAGER only)
router.post('/orders/:id/receive', protect, authorize('ADMIN', 'MANAGER'), purchaseController.receivePurchaseOrder);

// POST /api/purchases/orders/:id/cancel - Cancel PO (ADMIN, MANAGER only)
router.post('/orders/:id/cancel', protect, authorize('ADMIN', 'MANAGER'), purchaseController.cancelPurchaseOrder);

// ==========================================
// REPORTS & SUMMARY ROUTES
// ==========================================

// GET /api/purchases/history - Purchase history
router.get('/history', protect, purchaseController.getPurchaseHistory);

// GET /api/purchases/summary - Purchases summary
router.get('/summary', protect, purchaseController.getPurchasesSummary);

module.exports = router;
