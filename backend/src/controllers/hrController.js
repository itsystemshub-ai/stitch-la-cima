const prisma = require('../models/prismaClient');
const hrService = require('../services/hrService');

// ==========================================
// EMPLOYEE CONTROLLERS
// ==========================================

/**
 * GET /api/hr/employees
 * Get all employees with optional filters
 */
exports.getEmployees = async (req, res) => {
  try {
    const { page = 1, limit = 50, department, active, search } = req.query;

    const where = {};

    if (department) {
      where.department = department;
    }

    if (active !== undefined) {
      where.active = active === 'true';
    }

    if (search) {
      where.OR = [
        { firstName: { contains: search, mode: 'insensitive' } },
        { lastName: { contains: search, mode: 'insensitive' } },
        { email: { contains: search, mode: 'insensitive' } },
        { dni: { contains: search, mode: 'insensitive' } },
        { position: { contains: search, mode: 'insensitive' } }
      ];
    }

    const pageNum = Math.max(1, parseInt(page));
    const limitNum = Math.min(100, Math.max(1, parseInt(limit)));
    const skip = (pageNum - 1) * limitNum;

    const [employees, total] = await Promise.all([
      prisma.employee.findMany({
        where,
        orderBy: [{ lastName: 'asc' }, { firstName: 'asc' }],
        skip,
        take: limitNum,
        include: {
          _count: {
            select: { payroll: true }
          }
        }
      }),
      prisma.employee.count({ where })
    ]);

    res.json({
      status: 'success',
      data: {
        employees,
        pagination: {
          total,
          page: pageNum,
          limit: limitNum,
          totalPages: Math.ceil(total / limitNum)
        }
      }
    });
  } catch (error) {
    res.status(500).json({ status: 'error', message: error.message });
  }
};

/**
 * GET /api/hr/employees/:id
 * Get single employee with details
 */
exports.getEmployeeById = async (req, res) => {
  try {
    const { id } = req.params;

    const employee = await prisma.employee.findUnique({
      where: { id: parseInt(id) },
      include: {
        payroll: {
          orderBy: [{ year: 'desc' }, { month: 'desc' }],
          take: 12
        }
      }
    });

    if (!employee) {
      return res.status(404).json({ status: 'error', message: 'Empleado no encontrado' });
    }

    const seniority = hrService.calculateSeniority(employee.hireDate);
    const seniorityBenefits = hrService.calculateSeniorityBenefits(employee.salary, seniority);

    res.json({
      status: 'success',
      data: {
        ...employee,
        seniority,
        seniorityBenefits
      }
    });
  } catch (error) {
    res.status(500).json({ status: 'error', message: error.message });
  }
};

/**
 * POST /api/hr/employees
 * Create a new employee (ADMIN only)
 */
exports.createEmployee = async (req, res) => {
  try {
    const employeeData = req.body;

    const validation = hrService.validateEmployeeData(employeeData);
    if (!validation.valid) {
      return res.status(400).json({ status: 'error', message: validation.errors.join('. ') });
    }

    // Check for duplicate DNI
    const existingDni = await prisma.employee.findUnique({
      where: { dni: employeeData.dni.trim() }
    });
    if (existingDni) {
      return res.status(409).json({ status: 'error', message: 'Ya existe un empleado con esa cedula de identidad' });
    }

    // Check for duplicate email
    const existingEmail = await prisma.employee.findUnique({
      where: { email: employeeData.email.trim().toLowerCase() }
    });
    if (existingEmail) {
      return res.status(409).json({ status: 'error', message: 'Ya existe un empleado con ese email' });
    }

    const employee = await prisma.employee.create({
      data: {
        firstName: employeeData.firstName.trim(),
        lastName: employeeData.lastName.trim(),
        dni: employeeData.dni.trim().toUpperCase(),
        email: employeeData.email.trim().toLowerCase(),
        position: employeeData.position.trim(),
        department: employeeData.department.trim(),
        hireDate: new Date(employeeData.hireDate),
        salary: parseFloat(employeeData.salary),
        active: employeeData.active !== false
      }
    });

    res.status(201).json({ status: 'success', data: employee });
  } catch (error) {
    const statusCode = error.code === 'P2002' ? 409 : 500;
    res.status(statusCode).json({ status: 'error', message: error.message });
  }
};

/**
 * PUT /api/hr/employees/:id
 * Update an employee (ADMIN, MANAGER)
 */
exports.updateEmployee = async (req, res) => {
  try {
    const { id } = req.params;
    const employeeData = req.body;

    const existing = await prisma.employee.findUnique({
      where: { id: parseInt(id) }
    });

    if (!existing) {
      return res.status(404).json({ status: 'error', message: 'Empleado no encontrado' });
    }

    // Validate DNI if being changed
    if (employeeData.dni && employeeData.dni.trim() !== existing.dni) {
      const duplicate = await prisma.employee.findUnique({
        where: { dni: employeeData.dni.trim() }
      });
      if (duplicate) {
        return res.status(409).json({ status: 'error', message: 'Ya existe un empleado con esa cedula de identidad' });
      }
    }

    // Validate email if being changed
    if (employeeData.email && employeeData.email.trim().toLowerCase() !== existing.email) {
      const duplicate = await prisma.employee.findUnique({
        where: { email: employeeData.email.trim().toLowerCase() }
      });
      if (duplicate) {
        return res.status(409).json({ status: 'error', message: 'Ya existe un empleado con ese email' });
      }
    }

    const employee = await prisma.employee.update({
      where: { id: parseInt(id) },
      data: {
        ...(employeeData.firstName !== undefined && { firstName: employeeData.firstName.trim() }),
        ...(employeeData.lastName !== undefined && { lastName: employeeData.lastName.trim() }),
        ...(employeeData.dni !== undefined && { dni: employeeData.dni.trim().toUpperCase() }),
        ...(employeeData.email !== undefined && { email: employeeData.email.trim().toLowerCase() }),
        ...(employeeData.position !== undefined && { position: employeeData.position.trim() }),
        ...(employeeData.department !== undefined && { department: employeeData.department.trim() }),
        ...(employeeData.hireDate !== undefined && { hireDate: new Date(employeeData.hireDate) }),
        ...(employeeData.salary !== undefined && { salary: parseFloat(employeeData.salary) }),
        ...(employeeData.active !== undefined && { active: employeeData.active })
      }
    });

    res.json({ status: 'success', data: employee });
  } catch (error) {
    const statusCode = error.code === 'P2002' ? 409 : 500;
    res.status(statusCode).json({ status: 'error', message: error.message });
  }
};

/**
 * POST /api/hr/employees/:id/deactivate
 * Deactivate an employee (ADMIN only)
 */
exports.deactivateEmployee = async (req, res) => {
  try {
    const { id } = req.params;
    const { reason } = req.body;

    const employee = await prisma.employee.findUnique({
      where: { id: parseInt(id) }
    });

    if (!employee) {
      return res.status(404).json({ status: 'error', message: 'Empleado no encontrado' });
    }

    if (!employee.active) {
      return res.status(400).json({ status: 'error', message: 'El empleado ya esta desactivado' });
    }

    const updated = await prisma.employee.update({
      where: { id: parseInt(id) },
      data: { active: false }
    });

    res.json({
      status: 'success',
      data: updated,
      message: reason ? `Empleado desactivado: ${reason}` : 'Empleado desactivado exitosamente'
    });
  } catch (error) {
    res.status(500).json({ status: 'error', message: error.message });
  }
};

// ==========================================
// DEPARTMENT CONTROLLERS
// ==========================================

/**
 * GET /api/hr/departments
 * Get list of departments
 */
exports.getDepartments = async (req, res) => {
  try {
    const departments = await prisma.employee.groupBy({
      by: ['department'],
      _count: { id: true },
      _avg: { salary: true },
      where: { active: true },
      orderBy: { department: 'asc' }
    });

    res.json({
      status: 'success',
      data: departments.map(d => ({
        department: d.department,
        employeeCount: d._count.id,
        avgSalary: Math.round((d._avg.salary || 0) * 100) / 100
      }))
    });
  } catch (error) {
    res.status(500).json({ status: 'error', message: error.message });
  }
};

/**
 * GET /api/hr/by-department
 * Get employees grouped by department
 */
exports.getEmployeeByDepartment = async (req, res) => {
  try {
    const { active = 'true' } = req.query;

    const departments = await prisma.employee.groupBy({
      by: ['department'],
      where: { active: active === 'true' },
      orderBy: { department: 'asc' },
      _count: { id: true },
      _avg: { salary: true },
      _sum: { salary: true }
    });

    const result = await Promise.all(
      departments.map(async (dept) => {
        const employees = await prisma.employee.findMany({
          where: { department: dept.department, active: active === 'true' },
          orderBy: [{ lastName: 'asc' }, { firstName: 'asc' }],
          select: {
            id: true,
            firstName: true,
            lastName: true,
            email: true,
            position: true,
            hireDate: true,
            salary: true,
            active: true
          }
        });

        return {
          department: dept.department,
          employeeCount: dept._count.id,
          avgSalary: Math.round((dept._avg.salary || 0) * 100) / 100,
          totalSalary: Math.round((dept._sum.salary || 0) * 100) / 100,
          employees
        };
      })
    );

    res.json({ status: 'success', data: result });
  } catch (error) {
    res.status(500).json({ status: 'error', message: error.message });
  }
};

// ==========================================
// PAYROLL CONTROLLERS
// ==========================================

/**
 * GET /api/hr/payrolls
 * Get all payrolls with filters
 */
exports.getPayrolls = async (req, res) => {
  try {
    const { page = 1, limit = 20, employeeId, month, year, processed } = req.query;

    const where = {};

    if (employeeId) {
      where.employeeId = parseInt(employeeId);
    }

    if (month) {
      where.month = parseInt(month);
    }

    if (year) {
      where.year = parseInt(year);
    }

    if (processed !== undefined) {
      where.processed = processed === 'true';
    }

    const pageNum = Math.max(1, parseInt(page));
    const limitNum = Math.min(100, Math.max(1, parseInt(limit)));
    const skip = (pageNum - 1) * limitNum;

    const [payrolls, total] = await Promise.all([
      prisma.payroll.findMany({
        where,
        include: {
          employee: {
            select: {
              id: true,
              firstName: true,
              lastName: true,
              dni: true,
              department: true,
              position: true
            }
          }
        },
        orderBy: [{ year: 'desc' }, { month: 'desc' }],
        skip,
        take: limitNum
      }),
      prisma.payroll.count({ where })
    ]);

    res.json({
      status: 'success',
      data: {
        payrolls,
        pagination: {
          total,
          page: pageNum,
          limit: limitNum,
          totalPages: Math.ceil(total / limitNum)
        }
      }
    });
  } catch (error) {
    res.status(500).json({ status: 'error', message: error.message });
  }
};

/**
 * GET /api/hr/payrolls/:id
 * Get single payroll with full details
 */
exports.getPayrollById = async (req, res) => {
  try {
    const { id } = req.params;

    const payroll = await prisma.payroll.findUnique({
      where: { id: parseInt(id) },
      include: {
        employee: true
      }
    });

    if (!payroll) {
      return res.status(404).json({ status: 'error', message: 'Nomina no encontrada' });
    }

    const report = await hrService.generatePayrollReport(payroll.employeeId, payroll.month, payroll.year);

    res.json({ status: 'success', data: report });
  } catch (error) {
    const statusCode = error.message.includes('no encontrada') ? 404 : 500;
    res.status(statusCode).json({ status: 'error', message: error.message });
  }
};

/**
 * POST /api/hr/payrolls/calculate
 * Calculate payroll for employee(s) for a month
 */
exports.calculatePayroll = async (req, res) => {
  try {
    const { employeeId, month, year, overtimeHours = 0, includeCestaTicket = true, additionalBonuses = 0 } = req.body;

    if (!employeeId || !month || !year) {
      return res.status(400).json({
        status: 'error',
        message: 'Los campos empleado, mes y ano son requeridos'
      });
    }

    const validation = hrService.validatePayrollData({ employeeId, month, year });
    if (!validation.valid) {
      return res.status(400).json({ status: 'error', message: validation.errors.join('. ') });
    }

    const payroll = await hrService.calculateMonthlyPayroll(
      employeeId,
      month,
      year,
      { overtimeHours, includeCestaTicket, additionalBonuses }
    );

    res.json({ status: 'success', data: payroll });
  } catch (error) {
    const statusCode = error.message.includes('no encontrado') || error.message.includes('no esta activo') || error.message.includes('Ya existe')
      ? 400
      : 500;
    res.status(statusCode).json({ status: 'error', message: error.message });
  }
};

/**
 * POST /api/hr/payrolls/process
 * Process and finalize payroll (ADMIN only)
 */
exports.processPayroll = async (req, res) => {
  try {
    const { payrollId } = req.body;

    if (!payrollId) {
      return res.status(400).json({ status: 'error', message: 'El ID de la nomina es requerido' });
    }

    const payroll = await prisma.payroll.findUnique({
      where: { id: parseInt(payrollId) },
      include: { employee: true }
    });

    if (!payroll) {
      return res.status(404).json({ status: 'error', message: 'Nomina no encontrada' });
    }

    if (payroll.processed) {
      return res.status(400).json({ status: 'error', message: 'Esta nomina ya fue procesada' });
    }

    const updated = await prisma.payroll.update({
      where: { id: parseInt(payrollId) },
      data: { processed: true }
    });

    res.json({
      status: 'success',
      data: updated,
      message: `Nomina de ${payroll.employee.firstName} ${payroll.employee.lastName} para ${payroll.month}/${payroll.year} procesada exitosamente`
    });
  } catch (error) {
    res.status(500).json({ status: 'error', message: error.message });
  }
};

/**
 * GET /api/hr/payrolls/summary
 * Get payroll summary
 */
exports.getPayrollSummary = async (req, res) => {
  try {
    const { month, year } = req.query;

    const currentMonth = month ? parseInt(month) : new Date().getMonth() + 1;
    const currentYear = year ? parseInt(year) : new Date().getFullYear();

    const totalEmployees = await prisma.employee.count({ where: { active: true } });

    const payrolls = await prisma.payroll.findMany({
      where: { month: currentMonth, year: currentYear },
      include: { employee: true }
    });

    const totals = payrolls.reduce(
      (acc, p) => ({
        baseSalary: acc.baseSalary + p.baseSalary,
        bonuses: acc.bonuses + p.bonuses,
        deductions: acc.deductions + p.deductions,
        netSalary: acc.netSalary + p.netSalary
      }),
      { baseSalary: 0, bonuses: 0, deductions: 0, netSalary: 0 }
    );

    const avgSalary = payrolls.length > 0
      ? Math.round((totals.netSalary / payrolls.length) * 100) / 100
      : 0;

    const monthlyPayrollCost = Math.round(totals.netSalary * 100) / 100;
    const totalEmployerInces = Math.round(totals.baseSalary * hrService.PAYROLL_CONFIG.incesRate * 100) / 100;

    // Department breakdown
    const departmentBreakdown = payrolls.length > 0
      ? payrolls.reduce((acc, p) => {
          const dept = p.employee.department;
          if (!acc[dept]) {
            acc[dept] = { department: dept, employees: 0, totalNetSalary: 0 };
          }
          acc[dept].employees++;
          acc[dept].totalNetSalary += p.netSalary;
          return acc;
        }, {})
      : {};

    const deptArray = Object.values(departmentBreakdown).map(d => ({
      department: d.department,
      employees: d.employees,
      totalNetSalary: Math.round(d.totalNetSalary * 100) / 100
    }));

    res.json({
      status: 'success',
      data: {
        period: `${currentMonth}/${currentYear}`,
        totalEmployees,
        payrollsProcessed: payrolls.length,
        payrollsPending: totalEmployees - payrolls.length,
        monthlyPayrollCost,
        avgSalary,
        totals: {
          baseSalary: Math.round(totals.baseSalary * 100) / 100,
          bonuses: Math.round(totals.bonuses * 100) / 100,
          deductions: Math.round(totals.deductions * 100) / 100,
          netSalary: Math.round(totals.netSalary * 100) / 100,
          employerInces: totalEmployerInces,
          totalCompanyCost: Math.round((totals.baseSalary + totals.bonuses + totalEmployerInces) * 100) / 100
        },
        departmentBreakdown: deptArray
      }
    });
  } catch (error) {
    res.status(500).json({ status: 'error', message: error.message });
  }
};

// ==========================================
// ATTENDANCE CONTROLLERS
// ==========================================

/**
 * GET /api/hr/attendance
 * Get attendance records with filters
 */
exports.getAttendance = async (req, res) => {
  try {
    const { page = 1, limit = 50, employeeId, startDate, endDate } = req.query;

    const where = {};

    if (employeeId) {
      where.employeeId = parseInt(employeeId);
    }

    if (startDate || endDate) {
      where.date = {};
      if (startDate) {
        where.date.gte = new Date(startDate);
      }
      if (endDate) {
        where.date.lte = new Date(endDate);
      }
    }

    const pageNum = Math.max(1, parseInt(page));
    const limitNum = Math.min(200, Math.max(1, parseInt(limit)));
    const skip = (pageNum - 1) * limitNum;

    const [records, total] = await Promise.all([
      prisma.attendance.findMany({
        where,
        include: {
          employee: {
            select: {
              id: true,
              firstName: true,
              lastName: true,
              dni: true,
              department: true,
              position: true
            }
          }
        },
        orderBy: { date: 'desc' },
        skip,
        take: limitNum
      }),
      prisma.attendance.count({ where })
    ]);

    res.json({
      status: 'success',
      data: {
        records,
        pagination: {
          total,
          page: pageNum,
          limit: limitNum,
          totalPages: Math.ceil(total / limitNum)
        }
      }
    });
  } catch (error) {
    res.status(500).json({ status: 'error', message: error.message });
  }
};

/**
 * POST /api/hr/attendance
 * Record employee check-in/check-out
 */
exports.recordAttendance = async (req, res) => {
  try {
    const { employeeId, type, notes } = req.body;

    if (!employeeId) {
      return res.status(400).json({ status: 'error', message: 'El ID del empleado es requerido' });
    }

    if (!type || !['checkIn', 'checkOut'].includes(type)) {
      return res.status(400).json({
        status: 'error',
        message: 'El tipo debe ser checkIn o checkOut'
      });
    }

    const employee = await prisma.employee.findUnique({
      where: { id: parseInt(employeeId) }
    });

    if (!employee) {
      return res.status(404).json({ status: 'error', message: 'Empleado no encontrado' });
    }

    const today = new Date();
    today.setHours(0, 0, 0, 0);

    const endDate = new Date(today);
    endDate.setDate(endDate.getDate() + 1);

    let record = await prisma.attendance.findFirst({
      where: {
        employeeId: parseInt(employeeId),
        date: {
          gte: today,
          lt: endDate
        }
      }
    });

    if (type === 'checkIn') {
      if (record) {
        return res.status(400).json({
          status: 'error',
          message: 'El empleado ya registro entrada el dia de hoy'
        });
      }

      record = await prisma.attendance.create({
        data: {
          employeeId: parseInt(employeeId),
          date: today,
          checkIn: new Date(),
          notes: notes || null
        },
        include: {
          employee: {
            select: {
              id: true,
              firstName: true,
              lastName: true,
              dni: true
            }
          }
        }
      });

      return res.status(201).json({
        status: 'success',
        data: record,
        message: 'Entrada registrada exitosamente'
      });
    }

    // checkOut
    if (!record) {
      return res.status(400).json({
        status: 'error',
        message: 'No se encontro registro de entrada para hoy. Primero debe registrar la entrada'
      });
    }

    if (record.checkOut) {
      return res.status(400).json({
        status: 'error',
        message: 'El empleado ya registro salida el dia de hoy'
      });
    }

    const checkOutTime = new Date();
    const hoursWorked = Math.round(((checkOutTime - record.checkIn) / (1000 * 60 * 60)) * 100) / 100;

    record = await prisma.attendance.update({
      where: { id: record.id },
      data: {
        checkOut: checkOutTime,
        hours: hoursWorked,
        notes: notes || record.notes
      },
      include: {
        employee: {
          select: {
            id: true,
            firstName: true,
            lastName: true,
            dni: true
          }
        }
      }
    });

    res.json({
      status: 'success',
      data: record,
      message: 'Salida registrada exitosamente'
    });
  } catch (error) {
    const statusCode = error.code === 'P2002' ? 409 : 500;
    res.status(statusCode).json({ status: 'error', message: error.message });
  }
};

module.exports = exports;
