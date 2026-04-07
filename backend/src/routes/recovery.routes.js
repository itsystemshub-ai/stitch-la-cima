const express = require('express');
const router = express.Router();
const recoveryController = require('../controllers/recovery.controller');
const { authMiddleware, authorize } = require('../middleware/auth');
const { validateRecovery } = require('../middleware/validation');

router.post('/request', validateRecovery, recoveryController.request);
router.get('/requests', authMiddleware, authorize('admin'), recoveryController.getRequests);
router.patch('/requests/:id/approve', authMiddleware, authorize('admin'), recoveryController.approve);
router.patch('/requests/:id/reject', authMiddleware, authorize('admin'), recoveryController.reject);

module.exports = router;
