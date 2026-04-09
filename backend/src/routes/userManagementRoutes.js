const express = require('express');
const router = express.Router();
const { protect, authorize } = require('../middleware/authMiddleware');
const userManagementController = require('../controllers/userManagementController');

const validate = require('../middleware/validate');
const { createUserValidator, updateUserValidator } = require('../validators/userValidator');

// All routes require authentication and ADMIN role
router.use(protect);
router.use(authorize('ADMIN'));

// User management routes
router.get('/', userManagementController.getUsers);
router.get('/sessions', userManagementController.getActiveSessions);
router.get('/:id', userManagementController.getUserById);
router.post('/', createUserValidator, validate, userManagementController.createUser);
router.put('/:id', updateUserValidator, validate, userManagementController.updateUser);
router.put('/:id/role', userManagementController.updateUserRole);
router.post('/:id/reset-password', userManagementController.resetUserPassword);
router.post('/:id/deactivate', userManagementController.deactivateUser);
router.post('/:id/force-logout', userManagementController.forceLogoutUser);

module.exports = router;
