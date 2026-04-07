const express = require('express');
const router = express.Router();
const categoryController = require('../controllers/category.controller');
const { authMiddleware, authorize } = require('../middleware/auth');
const { validateCategory, validatePagination } = require('../middleware/validation');

router.get('/', validatePagination, categoryController.getAll);
router.post('/', authMiddleware, authorize('admin'), validateCategory, categoryController.create);
router.put('/:id', authMiddleware, authorize('admin'), validateCategory, categoryController.update);
router.delete('/:id', authMiddleware, authorize('admin'), categoryController.remove);

module.exports = router;
