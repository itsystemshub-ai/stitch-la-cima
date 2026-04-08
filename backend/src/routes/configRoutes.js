const express = require('express');
const router = express.Router();
const { protect, authorize } = require('../middleware/authMiddleware');
const configController = require('../controllers/configController');

// All routes require authentication and ADMIN role
router.use(protect);
router.use(authorize('ADMIN'));

// Configuration routes
router.get('/', configController.getConfigs);
router.get('/category/:category', configController.getConfigsByCategory);
router.get('/:key', configController.getConfigByKey);
router.put('/:key', configController.updateConfig);

// System routes
router.get('/system/health', configController.getSystemHealth);
router.get('/system/tasks', configController.getScheduledTasks);

// Backup routes
router.post('/backup/trigger', configController.triggerBackup);

// Audit log routes
router.get('/audit-logs', configController.getAuditLogs);

module.exports = router;
