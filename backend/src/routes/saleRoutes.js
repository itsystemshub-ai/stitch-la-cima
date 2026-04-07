const express = require('express');
const router = express.Router();
const saleController = require('../controllers/saleController');
const { protect, authorize } = require('../middleware/authMiddleware');

router.post('/', protect, saleController.createSale);
router.get('/', protect, authorize('ADMIN', 'MANAGER'), saleController.getSales);

module.exports = router;
