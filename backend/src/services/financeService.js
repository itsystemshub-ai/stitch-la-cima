const prisma = require('../models/prismaClient');

// ============================================================
// Depreciation Calculations
// ============================================================

/**
 * Calculate annual depreciation using the straight-line method
 * @param {number} acquisitionCost - Original cost of the asset
 * @param {number} salvageValue - Estimated value at end of useful life
 * @param {number} usefulLife - Useful life in years
 * @returns {number} Annual depreciation amount
 */
function calculateStraightLineDepreciation(acquisitionCost, salvageValue, usefulLife) {
  if (usefulLife <= 0) {
    throw new Error('La vida util debe ser mayor a cero');
  }
  const depreciableBase = acquisitionCost - salvageValue;
  if (depreciableBase < 0) {
    throw new Error('El valor residual no puede ser mayor al costo de adquisicion');
  }
  return depreciableBase / usefulLife;
}

/**
 * Calculate annual depreciation using the declining balance method
 * @param {number} bookValue - Current book value of the asset
 * @param {number} usefulLife - Remaining useful life in years
 * @param {number} [multiplier=2] - Declining rate multiplier (2 = double declining)
 * @returns {number} Annual depreciation amount
 */
function calculateDecliningBalanceDepreciation(bookValue, usefulLife, multiplier = 2) {
  if (usefulLife <= 0) {
    throw new Error('La vida util debe ser mayor a cero');
  }
  const rate = multiplier / usefulLife;
  return bookValue * rate;
}

/**
 * Calculate monthly depreciation for an asset
 * @param {Object} asset - Fixed asset record
 * @returns {{ annual: number, monthly: number, accumulated: number }}
 */
function calculateMonthlyDepreciation(asset) {
  const { acquisitionCost, salvageValue, usefulLife, currentBookValue, depreciationMethod } = asset;

  let annualDepreciation;

  if (depreciationMethod === 'DECLINING') {
    annualDepreciation = calculateDecliningBalanceDepreciation(currentBookValue, usefulLife);
  } else {
    annualDepreciation = calculateStraightLineDepreciation(acquisitionCost, salvageValue, usefulLife);
  }

  const monthlyDepreciation = annualDepreciation / 12;
  const accumulatedDepreciation = acquisitionCost - currentBookValue;

  return {
    annual: parseFloat(annualDepreciation.toFixed(2)),
    monthly: parseFloat(monthlyDepreciation.toFixed(2)),
    accumulated: parseFloat(accumulatedDepreciation.toFixed(2))
  };
}

/**
 * Update asset book value after recording depreciation
 * @param {number} assetId - Fixed asset ID
 * @param {number} depreciationAmount - Depreciation amount to apply
 * @param {Date} [asOfDate] - Date of depreciation
 * @returns {Promise<Object>} Updated asset
 */
async function updateAssetBookValue(assetId, depreciationAmount, asOfDate) {
  const id = parseInt(assetId);
  if (isNaN(id)) {
    throw new Error('ID de activo invalido');
  }

  const asset = await prisma.fixedAsset.findUnique({ where: { id, active: true } });
  if (!asset) {
    throw new Error('Activo fijo no encontrado');
  }

  const newBookValue = asset.currentBookValue - depreciationAmount;

  // Book value cannot go below salvage value
  if (newBookValue < asset.salvageValue) {
    throw new Error(`La depreciacion no puede reducir el valor por debajo del valor residual (Bs ${asset.salvageValue.toFixed(2)})`);
  }

  const updated = await prisma.fixedAsset.update({
    where: { id },
    data: { currentBookValue: newBookValue, updatedAt: asOfDate || new Date() }
  });

  return updated;
}

/**
 * Record depreciation for a fixed asset, creating journal entries
 * @param {number} assetId - Fixed asset ID
 * @param {Date} [asOfDate] - Date of depreciation
 * @returns {Promise<Object>} Depreciation record and journal entry
 */
async function recordDepreciation(assetId, asOfDate) {
  const id = parseInt(assetId);
  if (isNaN(id)) {
    throw new Error('ID de activo invalido');
  }

  const asset = await prisma.fixedAsset.findUnique({ where: { id, active: true } });
  if (!asset) {
    throw new Error('Activo fijo no encontrado');
  }

  const monthlyDepreciation = calculateMonthlyDepreciation(asset);

  if (monthlyDepreciation.monthly <= 0) {
    throw new Error('No hay depreciacion pendiente para este activo');
  }

  // Find expense account for depreciation
  const depreciationExpenseAccount = await prisma.account.findFirst({
    where: { code: { contains: 'DEPRE' }, active: true, type: 'EXPENSE' }
  });

  // Find accumulated depreciation account
  const accumulatedDepAccount = await prisma.account.findFirst({
    where: { code: { contains: 'DEPRE' }, active: true, type: 'ASSET' }
  });

  const updated = await updateAssetBookValue(assetId, monthlyDepreciation.monthly, asOfDate);

  return {
    asset: updated,
    depreciation: {
      monthly: monthlyDepreciation.monthly,
      annual: monthlyDepreciation.annual,
      accumulated: monthlyDepreciation.accumulated
    },
    journalEntryNeeded: {
      expenseAccountId: depreciationExpenseAccount?.id || null,
      accumulatedDepreciationAccountId: accumulatedDepAccount?.id || null,
      amount: monthlyDepreciation.monthly
    }
  };
}

// ============================================================
// Accounts Receivable Operations
// ============================================================

/**
 * Generate accounts receivable aging report
 * Categorizes receivables by age: current, 1-30, 31-60, 61-90, 90+ days overdue
 * @param {Date} [asOfDate] - Date to calculate aging as-of
 * @returns {Promise<Object>} Aging report
 */
async function generateAgingReport(asOfDate) {
  const referenceDate = asOfDate ? new Date(asOfDate) : new Date();

  const receivables = await prisma.accountsReceivable.findMany({
    where: { status: { not: 'PAID' } },
    orderBy: { dueDate: 'asc' }
  });

  const aging = {
    current: { items: [], total: 0 },
    days1to30: { items: [], total: 0 },
    days31to60: { items: [], total: 0 },
    days61to90: { items: [], total: 0 },
    over90: { items: [], total: 0 },
    paid: { items: [], total: 0 }
  };

  for (const receivable of receivables) {
    const daysOverdue = Math.floor((referenceDate - receivable.dueDate) / (1000 * 60 * 60 * 24));
    const outstandingAmount = receivable.amount - receivable.paidAmount;

    const item = {
      id: receivable.id,
      customerId: receivable.customerId,
      customerName: receivable.customerName,
      invoiceNumber: receivable.invoiceNumber,
      amount: parseFloat(receivable.amount.toFixed(2)),
      paidAmount: parseFloat(receivable.paidAmount.toFixed(2)),
      outstanding: parseFloat(outstandingAmount.toFixed(2)),
      dueDate: receivable.dueDate.toISOString(),
      daysOverdue: Math.max(0, daysOverdue),
      status: receivable.status
    };

    if (receivable.status === 'PAID') {
      aging.paid.items.push(item);
      aging.paid.total += outstandingAmount;
    } else if (daysOverdue <= 0) {
      aging.current.items.push(item);
      aging.current.total += outstandingAmount;
    } else if (daysOverdue <= 30) {
      aging.days1to30.items.push(item);
      aging.days1to30.total += outstandingAmount;
    } else if (daysOverdue <= 60) {
      aging.days31to60.items.push(item);
      aging.days31to60.total += outstandingAmount;
    } else if (daysOverdue <= 90) {
      aging.days61to90.items.push(item);
      aging.days61to90.total += outstandingAmount;
    } else {
      aging.over90.items.push(item);
      aging.over90.total += outstandingAmount;
    }
  }

  const totalOutstanding =
    aging.current.total +
    aging.days1to30.total +
    aging.days31to60.total +
    aging.days61to90.total +
    aging.over90.total;

  return {
    asOfDate: referenceDate.toISOString(),
    aging: {
      current: { items: aging.current.items, total: parseFloat(aging.current.total.toFixed(2)) },
      '1-30': { items: aging.days1to30.items, total: parseFloat(aging.days1to30.total.toFixed(2)) },
      '31-60': { items: aging.days31to60.items, total: parseFloat(aging.days31to60.total.toFixed(2)) },
      '61-90': { items: aging.days61to90.items, total: parseFloat(aging.days61to90.total.toFixed(2)) },
      '90+': { items: aging.over90.items, total: parseFloat(aging.over90.total.toFixed(2)) }
    },
    summary: {
      totalOutstanding: parseFloat(totalOutstanding.toFixed(2)),
      totalCurrent: parseFloat(aging.current.total.toFixed(2)),
      totalOverdue: parseFloat((
        aging.days1to30.total +
        aging.days31to60.total +
        aging.days61to90.total +
        aging.over90.total
      ).toFixed(2)),
      countOutstanding:
        aging.current.items.length +
        aging.days1to30.items.length +
        aging.days31to60.items.length +
        aging.days61to90.items.length +
        aging.over90.items.length
    }
  };
}

// ============================================================
// Financial Ratios
// ============================================================

/**
 * Calculate key financial ratios from accounting data
 * @param {Object} balanceSheet - Balance sheet data
 * @param {Object} incomeStatement - Income statement data
 * @returns {Object} Financial ratios
 */
function calculateFinancialRatios(balanceSheet, incomeStatement) {
  const ratios = {};

  // Liquidity Ratios
  const totalAssets = balanceSheet?.assets?.total || 0;
  const totalLiabilities = balanceSheet?.liabilities?.total || 0;
  const totalEquity = balanceSheet?.equity?.total || 0;

  // Debt Ratio = Total Liabilities / Total Assets
  ratios.debtRatio = totalAssets > 0 ? parseFloat((totalLiabilities / totalAssets).toFixed(4)) : 0;

  // Equity Ratio = Total Equity / Total Assets
  ratios.equityRatio = totalAssets > 0 ? parseFloat((totalEquity / totalAssets).toFixed(4)) : 0;

  // Debt to Equity = Total Liabilities / Total Equity
  ratios.debtToEquity = totalEquity > 0 ? parseFloat((totalLiabilities / totalEquity).toFixed(4)) : 0;

  // Profitability Ratios
  const totalRevenue = incomeStatement?.revenue?.total || 0;
  const netIncome = incomeStatement?.netIncome || 0;

  // Net Profit Margin = Net Income / Revenue
  ratios.netProfitMargin = totalRevenue > 0 ? parseFloat((netIncome / totalRevenue).toFixed(4)) : 0;

  // Return on Assets (ROA) = Net Income / Total Assets
  ratios.roa = totalAssets > 0 ? parseFloat((netIncome / totalAssets).toFixed(4)) : 0;

  // Return on Equity (ROE) = Net Income / Total Equity
  ratios.roe = totalEquity > 0 ? parseFloat((netIncome / totalEquity).toFixed(4)) : 0;

  // Efficiency Ratios
  ratios.revenueGrowth = 0; // Would need prior period data

  return ratios;
}

module.exports = {
  calculateStraightLineDepreciation,
  calculateDecliningBalanceDepreciation,
  calculateMonthlyDepreciation,
  updateAssetBookValue,
  recordDepreciation,
  generateAgingReport,
  calculateFinancialRatios
};
