const express = require('express');
const router = express.Router();
const productController = require('../controllers/productController');
const { protect, authorize } = require('../middleware/authMiddleware');

router.get('/', productController.getProducts);
router.get('/:id', productController.getProduct);
router.post('/', protect, authorize('ADMIN', 'MANAGER'), productController.createProduct);
router.put('/:id', protect, authorize('ADMIN', 'MANAGER'), productController.updateProduct);
router.delete('/:id', protect, authorize('ADMIN'), productController.deleteProduct);

module.exports = router;
