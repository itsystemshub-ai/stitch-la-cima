const express = require('express');
const router = express.Router();
const { protect, authorize } = require('../middleware/authMiddleware');
const hrController = require('../controllers/hrController');

// ==========================================
// EMPLOYEE ROUTES
// ==========================================

router.get('/employees',
  protect,
  authorize('ADMIN', 'MANAGER'),
  hrController.getEmployees
);

router.get('/employees/:id',
  protect,
  authorize('ADMIN', 'MANAGER'),
  hrController.getEmployeeById
);

router.post('/employees',
  protect,
  authorize('ADMIN'),
  hrController.createEmployee
);

router.put('/employees/:id',
  protect,
  authorize('ADMIN', 'MANAGER'),
  hrController.updateEmployee
);

router.post('/employees/:id/deactivate',
  protect,
  authorize('ADMIN'),
  hrController.deactivateEmployee
);

// ==========================================
// DEPARTMENT ROUTES
// ==========================================

router.get('/departments',
  protect,
  hrController.getDepartments
);

router.get('/by-department',
  protect,
  hrController.getEmployeeByDepartment
);

// ==========================================
// PAYROLL ROUTES
// ==========================================

router.get('/payrolls',
  protect,
  authorize('ADMIN', 'MANAGER'),
  hrController.getPayrolls
);

router.get('/payrolls/summary',
  protect,
  authorize('ADMIN', 'MANAGER'),
  hrController.getPayrollSummary
);

router.get('/payrolls/:id',
  protect,
  authorize('ADMIN', 'MANAGER'),
  hrController.getPayrollById
);

router.post('/payrolls/calculate',
  protect,
  authorize('ADMIN', 'MANAGER'),
  hrController.calculatePayroll
);

router.post('/payrolls/process',
  protect,
  authorize('ADMIN'),
  hrController.processPayroll
);

// ==========================================
// ATTENDANCE ROUTES
// ==========================================

router.get('/attendance',
  protect,
  hrController.getAttendance
);

router.post('/attendance',
  protect,
  hrController.recordAttendance
);

module.exports = router;
