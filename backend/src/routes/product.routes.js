const express = require('express');
const router = express.Router();
const productController = require('../controllers/product.controller');
const { authMiddleware, authorize } = require('../middleware/auth');
const { validateProduct, validateProductId, validatePagination } = require('../middleware/validation');

router.get('/', validatePagination, productController.getAll);
router.get('/visible', productController.getVisible);
router.get('/:id', validateProductId, productController.getById);
router.post('/', authMiddleware, authorize('admin'), validateProduct, productController.create);
router.put('/:id', authMiddleware, authorize('admin'), validateProduct, productController.update);
router.delete('/:id', authMiddleware, authorize('admin'), validateProductId, productController.remove);
router.patch('/:id/toggle-visibility', authMiddleware, authorize('admin'), validateProductId, productController.toggleVisibility);

module.exports = router;
