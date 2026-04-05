const express = require('express');
const router = express.Router();
const orderController = require('../controllers/order.controller');
const { authMiddleware, authorize } = require('../middleware/auth');

router.get('/', authMiddleware, authorize('admin'), orderController.getAll);
router.get('/:id', authMiddleware, orderController.getById);
router.post('/', authMiddleware, orderController.create);
router.patch('/:id/status', authMiddleware, authorize('admin'), orderController.updateStatus);
router.get('/user/:userId', authMiddleware, orderController.getUserOrders);

module.exports = router;
