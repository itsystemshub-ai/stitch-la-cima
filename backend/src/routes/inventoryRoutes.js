const express = require('express');
const router = express.Router();
const inventoryController = require('../controllers/inventoryController');
const { protect, authorize } = require('../middleware/authMiddleware');

const validate = require('../middleware/validate');
const { 
  addStockValidator, 
  stockMovementValidator, 
  adjustStockValidator 
} = require('../validators/inventoryValidator');

// NOTE: Specific routes MUST come before parameterized routes (:id)

// Reports & Analytics
router.get('/products/low-stock', protect, inventoryController.getLowStockProducts);
router.get('/products/summary', protect, inventoryController.getInventorySummary);
router.get('/audit', protect, authorize('ADMIN', 'MANAGER'), inventoryController.getInventoryAudit);

// Product CRUD
router.get('/products', protect, inventoryController.getProducts);
router.get('/products/:id', protect, inventoryController.getProductById);
router.post('/products', protect, authorize('ADMIN', 'MANAGER'), inventoryController.createProduct);
router.put('/products/:id', protect, authorize('ADMIN', 'MANAGER'), inventoryController.updateProduct);
router.delete('/products/:id', protect, authorize('ADMIN'), inventoryController.deleteProduct);

// Kardex
router.get('/kardex/:productId', protect, inventoryController.getKardex);

// Stock Operations
router.post('/stock/add', protect, authorize('ADMIN', 'MANAGER'), addStockValidator, validate, inventoryController.addStock);
router.post('/stock/remove', protect, authorize('ADMIN', 'MANAGER'), stockMovementValidator, validate, inventoryController.removeStock);
router.post('/stock/adjust', protect, authorize('ADMIN', 'MANAGER'), adjustStockValidator, validate, inventoryController.adjustStock);

module.exports = router;
