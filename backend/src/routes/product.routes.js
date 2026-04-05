const express = require('express');
const router = express.Router();
const productController = require('../controllers/product.controller');
const { authMiddleware, authorize } = require('../middleware/auth');

router.get('/', productController.getAll);
router.get('/visible', productController.getVisible);
router.get('/:id', productController.getById);
router.post('/', authMiddleware, authorize('admin'), productController.create);
router.put('/:id', authMiddleware, authorize('admin'), productController.update);
router.delete('/:id', authMiddleware, authorize('admin'), productController.remove);
router.patch('/:id/toggle-visibility', authMiddleware, authorize('admin'), productController.toggleVisibility);

module.exports = router;
