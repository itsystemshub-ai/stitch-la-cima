const express = require('express');
const router = express.Router();
const multer = require('multer');
const importController = require('../controllers/importController');
const { protect, authorize } = require('../middleware/authMiddleware');

const upload = multer({ dest: 'uploads/' });

router.post('/inventory', protect, authorize('ADMIN', 'MANAGER'), upload.single('file'), importController.importInventory);

module.exports = router;
