const express = require('express');
const router = express.Router();
const b2bController = require('../controllers/b2b.controller');
const { authMiddleware, authorize } = require('../middleware/auth');
const { validateB2BRequest, validateB2BRegister } = require('../middleware/validation');

router.get('/requests', authMiddleware, authorize('admin'), b2bController.getRequests);
router.post('/register', validateB2BRequest, b2bController.register);
router.patch('/requests/:id/approve', authMiddleware, authorize('admin'), b2bController.approve);
router.patch('/requests/:id/reject', authMiddleware, authorize('admin'), b2bController.reject);

module.exports = router;
