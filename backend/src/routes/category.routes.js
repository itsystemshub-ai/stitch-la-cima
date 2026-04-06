const express = require('express');
const router = express.Router();
const categoryController = require('../controllers/category.controller');
const { authMiddleware, authorize } = require('../middleware/auth');

router.get('/', categoryController.getAll);
router.post('/', authMiddleware, authorize('admin'), categoryController.create);
router.put('/:id', authMiddleware, authorize('admin'), categoryController.update);
router.delete('/:id', authMiddleware, authorize('admin'), categoryController.remove);

module.exports = router;
