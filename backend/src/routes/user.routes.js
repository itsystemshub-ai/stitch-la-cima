const express = require('express');
const router = express.Router();
const userController = require('../controllers/user.controller');
const { authMiddleware, authorize } = require('../middleware/auth');

// Public routes
router.post('/me/orders', authMiddleware, userController.getMyOrders);

// User routes
router.get('/', authMiddleware, authorize('admin'), userController.getAll);
router.get('/stats', authMiddleware, authorize('admin'), userController.getStats);
router.get('/me', authMiddleware, (req, res) => res.json({ success: true, data: req.user }));
router.get('/:id', authMiddleware, userController.getById);
router.put('/:id', authMiddleware, userController.updateProfile);
router.patch('/:id/status', authMiddleware, authorize('admin'), userController.updateStatus);
router.delete('/:id', authMiddleware, authorize('admin'), userController.remove);

module.exports = router;
