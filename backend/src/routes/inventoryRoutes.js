const express = require('express');
const router = express.Router();
const inventoryController = require('../controllers/inventoryController');
const { protect, authorize } = require('../middleware/authMiddleware');

router.get('/kardex/:id', protect, inventoryController.getKardex);
router.post('/add-stock', protect, authorize('ADMIN', 'MANAGER'), inventoryController.addStock);

module.exports = router;
