const express = require('express');
const router = express.Router();
const orderController = require('../controllers/order.controller');
const { authMiddleware, authorize } = require('../middleware/auth');
const { validateOrder, validateOrderStatus, validatePagination } = require('../middleware/validation');

// Admin routes
router.get('/', authMiddleware, authorize('admin'), validatePagination, orderController.getAll);
router.get('/:id', authMiddleware, orderController.getById);
router.patch('/:id/status', authMiddleware, authorize('admin'), validateOrderStatus, orderController.updateStatus);

// User routes
router.post('/', authMiddleware, validateOrder, orderController.create);
router.get('/user/:userId', authMiddleware, orderController.getUserOrders);

module.exports = router;
