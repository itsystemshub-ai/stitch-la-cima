const express = require('express');
const router = express.Router();
const orderController = require('../controllers/order.controller');
const { authMiddleware, authorize } = require('../middleware/auth');

// Admin routes
router.get('/', authMiddleware, authorize('admin'), orderController.getAll);
router.get('/:id', authMiddleware, orderController.getById);
router.patch('/:id/status', authMiddleware, authorize('admin'), orderController.updateStatus);

// User routes
router.post('/', authMiddleware, orderController.create);
router.get('/user/:userId', authMiddleware, orderController.getUserOrders);

module.exports = router;
