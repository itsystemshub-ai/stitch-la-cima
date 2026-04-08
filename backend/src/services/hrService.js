const prisma = require('../models/prismaClient');

// ==========================================
// VENEZUELAN PAYROLL CONFIGURATION
// ==========================================

const PAYROLL_CONFIG = {
  ivssRate: 0.04,           // 4% employee contribution
  faovRate: 0.01,           // 1% employee contribution
  incesRate: 0.005,         // 0.5% employer contribution (not deducted from employee)
  minWageMultiplier: 5,     // IVSS cap at 5 minimum wages
  minWage: 130,             // Bs (configurable - update as needed)
  cestaTicket: 1500,        // Bs monthly food allowance (configurable)
  weeklyHours: 40,          // Standard work week
  overtimeMultiplier: 1.5,  // 1.5x hourly rate
  hoursPerMonth: 173.33     // Average monthly hours (40 * 52 / 12)
};

// ==========================================
// VALIDATION HELPERS
// ==========================================

/**
 * Validate employee input data
 * @param {Object} data - Employee data to validate
 * @returns {{ valid: boolean, errors: string[] }}
 */
function validateEmployeeData(data) {
  const errors = [];

  if (!data.firstName || typeof data.firstName !== 'string' || data.firstName.trim().length === 0) {
    errors.push('El nombre es requerido');
  }

  if (!data.lastName || typeof data.lastName !== 'string' || data.lastName.trim().length === 0) {
    errors.push('El apellido es requerido');
  }

  if (!data.dni || typeof data.dni !== 'string' || data.dni.trim().length === 0) {
    errors.push('La cedula de identidad es requerida');
  } else if (data.dni.length > 20) {
    errors.push('La cedula no puede exceder 20 caracteres');
  }

  if (!data.email || typeof data.email !== 'string') {
    errors.push('El email es requerido');
  } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(data.email)) {
    errors.push('El email no es valido');
  }

  if (!data.position || typeof data.position !== 'string' || data.position.trim().length === 0) {
    errors.push('El cargo es requerido');
  }

  if (!data.department || typeof data.department !== 'string' || data.department.trim().length === 0) {
    errors.push('El departamento es requerido');
  }

  if (!data.hireDate) {
    errors.push('La fecha de ingreso es requerida');
  } else if (isNaN(new Date(data.hireDate).getTime())) {
    errors.push('La fecha de ingreso no es valida');
  }

  if (data.salary === undefined || data.salary === null) {
    errors.push('El salario es requerido');
  } else if (typeof data.salary !== 'number' || data.salary < 0) {
    errors.push('El salario debe ser un numero positivo');
  }

  return { valid: errors.length === 0, errors };
}

/**
 * Validate payroll input data
 * @param {Object} data - Payroll data to validate
 * @returns {{ valid: boolean, errors: string[] }}
 */
function validatePayrollData(data) {
  const errors = [];

  if (!data.employeeId) {
    errors.push('El ID del empleado es requerido');
  } else if (typeof data.employeeId !== 'number' || data.employeeId <= 0) {
    errors.push('El ID del empleado debe ser un numero positivo');
  }

  if (!data.month) {
    errors.push('El mes es requerido');
  } else if (!Number.isInteger(data.month) || data.month < 1 || data.month > 12) {
    errors.push('El mes debe ser un numero entre 1 y 12');
  }

  if (!data.year) {
    errors.push('El ano es requerido');
  } else if (!Number.isInteger(data.year) || data.year < 2000) {
    errors.push('El ano no es valido');
  }

  return { valid: errors.length === 0, errors };
}

// ==========================================
// PAYROLL CALCULATIONS
// ==========================================

/**
 * Calculate IVSS (Social Security) deduction
 * Capped at 5 minimum wages
 * @param {number} baseSalary - Monthly base salary
 * @returns {number} IVSS deduction amount
 */
function calculateIVSS(baseSalary) {
  const cappedSalary = Math.min(baseSalary, PAYROLL_CONFIG.minWage * PAYROLL_CONFIG.minWageMultiplier);
  return Math.round(cappedSalary * PAYROLL_CONFIG.ivssRate * 100) / 100;
}

/**
 * Calculate FAOV (Housing Fund) deduction
 * @param {number} baseSalary - Monthly base salary
 * @returns {number} FAOV deduction amount
 */
function calculateFAOV(baseSalary) {
  return Math.round(baseSalary * PAYROLL_CONFIG.faovRate * 100) / 100;
}

/**
 * Calculate INCES (Training) - employer contribution, not deducted from employee
 * @param {number} baseSalary - Monthly base salary
 * @returns {number} INCES employer contribution
 */
function calculateINCES(baseSalary) {
  return Math.round(baseSalary * PAYROLL_CONFIG.incesRate * 100) / 100;
}

/**
 * Calculate all employee deductions
 * @param {number} baseSalary - Monthly base salary
 * @returns {{ ivss: number, faov: number, total: number }}
 */
function calculateDeductions(baseSalary) {
  const ivss = calculateIVSS(baseSalary);
  const faov = calculateFAOV(baseSalary);
  return {
    ivss,
    faov,
    total: Math.round((ivss + faov) * 100) / 100
  };
}

/**
 * Calculate bonuses for an employee
 * @param {number} baseSalary - Monthly base salary
 * @param {number} overtimeHours - Overtime hours worked
 * @param {Object} options - Bonus options
 * @param {boolean} options.includeCestaTicket - Include cesta ticket bonus
 * @returns {{ cestaTicket: number, overtime: number, total: number }}
 */
function calculateBonuses(baseSalary, overtimeHours = 0, options = {}) {
  const { includeCestaTicket = true } = options;

  // Overtime: 1.5x hourly rate
  const hourlyRate = baseSalary / PAYROLL_CONFIG.hoursPerMonth;
  const overtime = Math.round(overtimeHours * hourlyRate * PAYROLL_CONFIG.overtimeMultiplier * 100) / 100;

  const cestaTicket = includeCestaTicket ? PAYROLL_CONFIG.cestaTicket : 0;

  return {
    cestaTicket,
    overtime,
    total: Math.round((cestaTicket + overtime) * 100) / 100
  };
}

/**
 * Calculate net salary after deductions
 * @param {number} baseSalary - Monthly base salary
 * @param {number} bonuses - Total bonuses
 * @param {number} deductions - Total deductions
 * @returns {number} Net salary
 */
function calculateNetSalary(baseSalary, bonuses, deductions) {
  return Math.round((baseSalary + bonuses - deductions) * 100) / 100;
}

/**
 * Calculate complete monthly payroll for an employee
 * @param {number} employeeId - Employee ID
 * @param {number} month - Month (1-12)
 * @param {number} year - Year
 * @param {Object} options - Calculation options
 * @param {number} options.overtimeHours - Overtime hours worked
 * @param {boolean} options.includeCestaTicket - Include cesta ticket
 * @param {number} options.additionalBonuses - Additional bonus amount
 * @returns {Promise<Object>} Complete payroll calculation
 */
async function calculateMonthlyPayroll(employeeId, month, year, options = {}) {
  const { overtimeHours = 0, includeCestaTicket = true, additionalBonuses = 0 } = options;

  const employee = await prisma.employee.findUnique({
    where: { id: employeeId }
  });

  if (!employee) {
    throw new Error('Empleado no encontrado');
  }

  if (!employee.active) {
    throw new Error('El empleado no esta activo');
  }

  // Check if payroll already exists for this period
  const existingPayroll = await prisma.payroll.findFirst({
    where: {
      employeeId,
      month,
      year
    }
  });

  if (existingPayroll) {
    throw new Error(`Ya existe una nomina para este empleado en ${month}/${year}`);
  }

  const baseSalary = employee.salary;

  // Calculate deductions
  const deductions = calculateDeductions(baseSalary);

  // Calculate bonuses
  const bonuses = calculateBonuses(baseSalary, overtimeHours, { includeCestaTicket });

  // Add additional bonuses
  const totalBonuses = Math.round((bonuses.total + additionalBonuses) * 100) / 100;

  // Calculate net salary
  const netSalary = calculateNetSalary(baseSalary, totalBonuses, deductions.total);

  // Employer INCES cost (not deducted from employee)
  const employerInces = calculateINCES(baseSalary);

  return {
    employeeId: employee.id,
    employeeName: `${employee.firstName} ${employee.lastName}`,
    employeeDni: employee.dni,
    department: employee.department,
    position: employee.position,
    month,
    year,
    baseSalary,
    bonuses: {
      cestaTicket: bonuses.cestaTicket,
      overtime: bonuses.overtime,
      additional: additionalBonuses,
      total: totalBonuses
    },
    deductions: {
      ivss: deductions.ivss,
      faov: deductions.faov,
      total: deductions.total
    },
    employerCosts: {
      inces: employerInces,
      totalEmployerCost: Math.round((baseSalary + employerInces) * 100) / 100
    },
    netSalary,
    totalCost: Math.round((netSalary + employerInces) * 100) / 100
  };
}

/**
 * Calculate employee seniority in years
 * @param {Date} hireDate - Employee hire date
 * @returns {number} Years of service
 */
function calculateSeniority(hireDate) {
  const now = new Date();
  const hire = new Date(hireDate);
  const diffTime = Math.abs(now - hire);
  const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
  return Math.round((diffDays / 365.25) * 100) / 100;
}

/**
 * Calculate seniority benefits based on Venezuelan law
 * @param {number} baseSalary - Monthly base salary
 * @param {number} yearsOfService - Years of service
 * @returns {Object} Seniority benefits
 */
function calculateSeniorityBenefits(baseSalary, yearsOfService) {
  // Prestaciones sociales: 30 days per year (first year) + 15 days per additional year
  const baseDays = 30;
  const additionalDays = Math.max(0, yearsOfService - 1) * 15;
  const totalDays = baseDays + additionalDays;
  const cappedDays = Math.min(totalDays, 150); // Cap at 150 days

  const dailyRate = baseSalary / 30;

  return {
    yearsOfService,
    daysPerYear: totalDays,
    cappedDays,
    dailyRate: Math.round(dailyRate * 100) / 100,
    estimatedBenefit: Math.round(dailyRate * cappedDays * 100) / 100,
    seniorityBonus: yearsOfService >= 10
      ? Math.round(baseSalary * 0.1 * 100) / 100 // 10% bonus after 10 years
      : 0
  };
}

// ==========================================
// REPORT GENERATION
// ==========================================

/**
 * Generate a payroll report for an employee and period
 * @param {number} employeeId - Employee ID
 * @param {number} month - Month
 * @param {number} year - Year
 * @returns {Promise<Object>} Payroll report
 */
async function generatePayrollReport(employeeId, month, year) {
  const payroll = await prisma.payroll.findFirst({
    where: { employeeId, month, year },
    include: { employee: true }
  });

  if (!payroll) {
    throw new Error(`Nomina no encontrada para empleado ${employeeId} en ${month}/${year}`);
  }

  const deductions = calculateDeductions(payroll.baseSalary);

  return {
    reportDate: new Date().toISOString(),
    period: `${month}/${year}`,
    employee: {
      id: payroll.employee.id,
      name: `${payroll.employee.firstName} ${payroll.employee.lastName}`,
      dni: payroll.employee.dni,
      position: payroll.employee.position,
      department: payroll.employee.department,
      hireDate: payroll.employee.hireDate
    },
    earnings: {
      baseSalary: payroll.baseSalary,
      bonuses: payroll.bonuses,
      totalEarnings: Math.round((payroll.baseSalary + payroll.bonuses) * 100) / 100
    },
    deductions: {
      ivss: deductions.ivss,
      faov: deductions.faov,
      totalDeductions: payroll.deductions
    },
    netSalary: payroll.netSalary,
    processed: payroll.processed,
    createdAt: payroll.createdAt
  };
}

/**
 * Generate annual employee earnings report
 * @param {number} employeeId - Employee ID
 * @param {number} year - Year
 * @returns {Promise<Object>} Annual report
 */
async function generateAnnualReport(employeeId, year) {
  const employee = await prisma.employee.findUnique({
    where: { id: employeeId }
  });

  if (!employee) {
    throw new Error('Empleado no encontrado');
  }

  const payrolls = await prisma.payroll.findMany({
    where: {
      employeeId,
      year
    },
    orderBy: { month: 'asc' }
  });

  const seniority = calculateSeniority(employee.hireDate);
  const seniorityBenefits = calculateSeniorityBenefits(employee.salary, seniority);

  const totals = payrolls.reduce(
    (acc, p) => ({
      baseSalary: acc.baseSalary + p.baseSalary,
      bonuses: acc.bonuses + p.bonuses,
      deductions: acc.deductions + p.deductions,
      netSalary: acc.netSalary + p.netSalary
    }),
    { baseSalary: 0, bonuses: 0, deductions: 0, netSalary: 0 }
  );

  const monthlyBreakdown = payrolls.map(p => ({
    month: p.month,
    baseSalary: p.baseSalary,
    bonuses: p.bonuses,
    deductions: p.deductions,
    netSalary: p.netSalary,
    processed: p.processed
  }));

  return {
    employee: {
      id: employee.id,
      name: `${employee.firstName} ${employee.lastName}`,
      dni: employee.dni,
      position: employee.position,
      department: employee.department,
      hireDate: employee.hireDate,
      currentSalary: employee.salary
    },
    year,
    seniority,
    seniorityBenefits,
    totals: {
      baseSalary: Math.round(totals.baseSalary * 100) / 100,
      bonuses: Math.round(totals.bonuses * 100) / 100,
      deductions: Math.round(totals.deductions * 100) / 100,
      netSalary: Math.round(totals.netSalary * 100) / 100,
      monthsProcessed: payrolls.filter(p => p.processed).length,
      monthsPending: payrolls.filter(p => !p.processed).length
    },
    monthlyBreakdown,
    employerCosts: {
      annualInces: Math.round(totals.baseSalary * PAYROLL_CONFIG.incesRate * 100) / 100
    }
  };
}

/**
 * Generate company-wide payroll summary for a period
 * @param {number} month - Month
 * @param {number} year - Year
 * @returns {Promise<Object>} Payroll summary
 */
async function generateCompanyPayrollSummary(month, year) {
  const activeEmployees = await prisma.employee.count({
    where: { active: true }
  });

  const payrolls = await prisma.payroll.findMany({
    where: { month, year },
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
    ? Math.round((totals.baseSalary / payrolls.length) * 100) / 100
    : 0;

  const totalEmployerInces = Math.round(totals.baseSalary * PAYROLL_CONFIG.incesRate * 100) / 100;

  return {
    period: `${month}/${year}`,
    totalEmployees: activeEmployees,
    payrollsProcessed: payrolls.length,
    payrollsPending: activeEmployees - payrolls.length,
    totals: {
      baseSalary: Math.round(totals.baseSalary * 100) / 100,
      bonuses: Math.round(totals.bonuses * 100) / 100,
      deductions: Math.round(totals.deductions * 100) / 100,
      netSalary: Math.round(totals.netSalary * 100) / 100,
      employerInces: totalEmployerInces,
      totalCompanyCost: Math.round((totals.baseSalary + totals.bonuses + totalEmployerInces) * 100) / 100
    },
    averageSalary: avgSalary,
    departmentBreakdown: payrolls.length > 0
      ? await getDepartmentPayrollBreakdown(payrolls)
      : []
  };
}

/**
 * Helper: Get payroll breakdown by department
 * @param {Array} payrolls - Payroll records
 * @returns {Promise<Array>} Department breakdown
 */
async function getDepartmentPayrollBreakdown(payrolls) {
  const deptMap = {};
  payrolls.forEach(p => {
    const dept = p.employee.department;
    if (!deptMap[dept]) {
      deptMap[dept] = { department: dept, employees: 0, totalNetSalary: 0, totalBaseSalary: 0 };
    }
    deptMap[dept].employees++;
    deptMap[dept].totalNetSalary += p.netSalary;
    deptMap[dept].totalBaseSalary += p.baseSalary;
  });

  return Object.values(deptMap).map(d => ({
    department: d.department,
    employees: d.employees,
    totalBaseSalary: Math.round(d.totalBaseSalary * 100) / 100,
    totalNetSalary: Math.round(d.totalNetSalary * 100) / 100,
    avgSalary: Math.round((d.totalBaseSalary / d.employees) * 100) / 100
  }));
}

module.exports = {
  PAYROLL_CONFIG,
  validateEmployeeData,
  validatePayrollData,
  calculateIVSS,
  calculateFAOV,
  calculateINCES,
  calculateDeductions,
  calculateBonuses,
  calculateNetSalary,
  calculateMonthlyPayroll,
  calculateSeniority,
  calculateSeniorityBenefits,
  generatePayrollReport,
  generateAnnualReport,
  generateCompanyPayrollSummary
};
