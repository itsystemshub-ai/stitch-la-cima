const prisma = require('../models/prismaClient');
const {
  calculateMonthlyDepreciation,
  recordDepreciation,
  generateAgingReport,
  calculateFinancialRatios
} = require('../services/financeService');
const {
  generateBalanceSheet,
  generateIncomeStatement
} = require('../services/accountingService');

// ============================================================
// Fixed Assets
// ============================================================

/**
 * GET /fixed-assets - Get all fixed assets with filters
 * Query params: category, active
 */
exports.getFixedAssets = async (req, res) => {
  try {
    const { category, active } = req.query;
    const where = {};

    if (category) {
      where.category = { equals: category, mode: 'insensitive' };
    }

    if (active !== undefined) {
      where.active = active === 'true' || active === '1';
    }

    const assets = await prisma.fixedAsset.findMany({
      where,
      orderBy: { acquisitionDate: 'desc' }
    });

    // Calculate depreciation info for each asset
    const assetsWithDepreciation = assets.map(asset => ({
      ...asset,
      acquisitionCost: parseFloat(asset.acquisitionCost.toFixed(2)),
      salvageValue: parseFloat(asset.salvageValue.toFixed(2)),
      currentBookValue: parseFloat(asset.currentBookValue.toFixed(2)),
      accumulatedDepreciation: parseFloat((asset.acquisitionCost - asset.currentBookValue).toFixed(2)),
      depreciationInfo: asset.active ? calculateMonthlyDepreciation(asset) : null
    }));

    res.json({
      status: 'success',
      data: {
        assets: assetsWithDepreciation,
        total: assets.length
      }
    });
  } catch (error) {
    res.status(400).json({ status: 'error', message: error.message });
  }
};

/**
 * POST /fixed-assets - Create a new fixed asset
 * Body: { name, code, category, acquisitionDate, acquisitionCost, usefulLife, depreciationMethod?, salvageValue? }
 */
exports.createFixedAsset = async (req, res) => {
  try {
    const asset = await financeService.createFixedAsset(req.body);
    res.status(201).json({ status: 'success', data: asset });
  } catch (error) {
    if (error.code === 'P2002') {
      return res.status(409).json({ status: 'error', message: 'Ya existe un activo con ese codigo' });
    }
    res.status(400).json({ status: 'error', message: error.message });
  }
};

/**
 * POST /fixed-assets/:id/depreciate - Calculate and record depreciation for an asset
 */
exports.calculateDepreciation = async (req, res) => {
  try {
    const { id } = req.params;
    if (!id) {
      return res.status(400).json({ status: 'error', message: 'ID de activo requerido' });
    }

    const result = await recordDepreciation(id);

    res.json({
      status: 'success',
      data: result,
      message: 'Depreciacion calculada y registrada exitosamente'
    });
  } catch (error) {
    if (error.message.includes('no encontrado')) {
      return res.status(404).json({ status: 'error', message: error.message });
    }
    res.status(400).json({ status: 'error', message: error.message });
  }
};

/**
 * POST /fixed-assets/depreciate-all - Calculate depreciation for all active assets
 */
exports.calculateAllDepreciation = async (req, res) => {
  try {
    const assets = await prisma.fixedAsset.findMany({
      where: { active: true }
    });

    const results = [];
    const errors = [];

    for (const asset of assets) {
      try {
        const result = await recordDepreciation(asset.id);
        results.push({
          assetId: asset.id,
          code: asset.code,
          name: asset.name,
          depreciation: result.depreciation,
          success: true
        });
      } catch (error) {
        errors.push({
          assetId: asset.id,
          code: asset.code,
          name: asset.name,
          error: error.message,
          success: false
        });
      }
    }

    res.json({
      status: 'success',
      data: {
        processed: assets.length,
        successful: results.length,
        failed: errors.length,
        results,
        errors
      },
      message: `Depreciacion calculada para ${results.length} de ${assets.length} activos`
    });
  } catch (error) {
    res.status(400).json({ status: 'error', message: error.message });
  }
};

/**
 * GET /fixed-assets/summary - Get fixed assets summary
 */
exports.getFixedAssetsSummary = async (req, res) => {
  try {
    const assets = await prisma.fixedAsset.findMany({
      where: { active: true }
    });

    const byCategory = {};
    let totalAcquisitionCost = 0;
    let totalCurrentBookValue = 0;
    let totalAccumulatedDepreciation = 0;

    for (const asset of assets) {
      const depreciation = calculateMonthlyDepreciation(asset);
      const accumulatedDepreciation = asset.acquisitionCost - asset.currentBookValue;

      if (!byCategory[asset.category]) {
        byCategory[asset.category] = {
          count: 0,
          totalAcquisitionCost: 0,
          totalCurrentBookValue: 0,
          totalAccumulatedDepreciation: 0,
          assets: []
        };
      }

      byCategory[asset.category].count++;
      byCategory[asset.category].totalAcquisitionCost += asset.acquisitionCost;
      byCategory[asset.category].totalCurrentBookValue += asset.currentBookValue;
      byCategory[asset.category].totalAccumulatedDepreciation += accumulatedDepreciation;
      byCategory[asset.category].assets.push({
        id: asset.id,
        code: asset.code,
        name: asset.name,
        acquisitionCost: parseFloat(asset.acquisitionCost.toFixed(2)),
        currentBookValue: parseFloat(asset.currentBookValue.toFixed(2)),
        accumulatedDepreciation: parseFloat(accumulatedDepreciation.toFixed(2)),
        monthlyDepreciation: depreciation.monthly
      });

      totalAcquisitionCost += asset.acquisitionCost;
      totalCurrentBookValue += asset.currentBookValue;
      totalAccumulatedDepreciation += accumulatedDepreciation;
    }

    // Format category totals
    const formattedByCategory = {};
    for (const [category, data] of Object.entries(byCategory)) {
      formattedByCategory[category] = {
        count: data.count,
        totalAcquisitionCost: parseFloat(data.totalAcquisitionCost.toFixed(2)),
        totalCurrentBookValue: parseFloat(data.totalCurrentBookValue.toFixed(2)),
        totalAccumulatedDepreciation: parseFloat(data.totalAccumulatedDepreciation.toFixed(2)),
        assets: data.assets
      };
    }

    res.json({
      status: 'success',
      data: {
        totalAssets: assets.length,
        totalAcquisitionCost: parseFloat(totalAcquisitionCost.toFixed(2)),
        totalCurrentBookValue: parseFloat(totalCurrentBookValue.toFixed(2)),
        totalAccumulatedDepreciation: parseFloat(totalAccumulatedDepreciation.toFixed(2)),
        byCategory: formattedByCategory
      }
    });
  } catch (error) {
    res.status(400).json({ status: 'error', message: error.message });
  }
};

// ============================================================
// Accounts Receivable
// ============================================================

/**
 * GET /receivables - Get all accounts receivable with filters
 * Query params: status, customerId, overdue, page, limit
 */
exports.getAccountsReceivable = async (req, res) => {
  try {
    const { status, customerId, overdue, page = '1', limit = '20' } = req.query;
    const pageNum = Math.max(1, parseInt(page) || 1);
    const limitNum = Math.min(100, Math.max(1, parseInt(limit) || 20));
    const skip = (pageNum - 1) * limitNum;

    const where = {};

    if (status) {
      const validStatuses = ['PENDING', 'PARTIAL', 'PAID', 'OVERDUE'];
      if (!validStatuses.includes(status.toUpperCase())) {
        return res.status(400).json({
          status: 'error',
          message: 'Estado invalido. Use: PENDING, PARTIAL, PAID, OVERDUE'
        });
      }
      where.status = status.toUpperCase();
    }

    if (customerId) {
      where.customerId = String(customerId);
    }

    if (overdue === 'true' || overdue === '1') {
      where.dueDate = { lt: new Date() };
      if (status) {
        where.status = { not: 'PAID' };
      } else {
        where.status = { not: 'PAID' };
      }
    }

    const [receivables, total] = await Promise.all([
      prisma.accountsReceivable.findMany({
        where,
        skip,
        take: limitNum,
        orderBy: { dueDate: 'asc' }
      }),
      prisma.accountsReceivable.count({ where })
    ]);

    // Add calculated fields
    const formattedReceivables = receivables.map(r => ({
      ...r,
      amount: parseFloat(r.amount.toFixed(2)),
      paidAmount: parseFloat(r.paidAmount.toFixed(2)),
      outstanding: parseFloat((r.amount - r.paidAmount).toFixed(2)),
      daysOverdue: Math.max(0, Math.floor((new Date() - r.dueDate) / (1000 * 60 * 60 * 24))),
      dueDate: r.dueDate.toISOString(),
      createdAt: r.createdAt.toISOString(),
      updatedAt: r.updatedAt.toISOString()
    }));

    res.json({
      status: 'success',
      data: {
        receivables: formattedReceivables,
        pagination: {
          page: pageNum,
          limit: limitNum,
          total,
          totalPages: Math.ceil(total / limitNum)
        }
      }
    });
  } catch (error) {
    res.status(400).json({ status: 'error', message: error.message });
  }
};

/**
 * POST /receivables - Create a new receivable
 * Body: { customerId, customerName, saleId?, invoiceNumber, amount, dueDate }
 */
exports.createReceivable = async (req, res) => {
  try {
    const receivable = await financeService.createReceivable(req.body);
    res.status(201).json({ status: 'success', data: receivable });
  } catch (error) {
    if (error.code === 'P2002') {
      return res.status(409).json({ status: 'error', message: 'Ya existe una cuenta por cobrar con ese numero de factura' });
    }
    res.status(400).json({ status: 'error', message: error.message });
  }
};

/**
 * PUT /receivables/:id - Update a receivable (mark as paid, record payment)
 * Body: { paidAmount?, status? }
 */
exports.updateReceivable = async (req, res) => {
  try {
    const { id } = req.params;
    const receivable = await financeService.updateReceivable(id, req.body);

    res.json({
      status: 'success',
      data: {
        ...receivable,
        amount: parseFloat(receivable.amount.toFixed(2)),
        paidAmount: parseFloat(receivable.paidAmount.toFixed(2)),
        outstanding: parseFloat((receivable.amount - receivable.paidAmount).toFixed(2))
      },
      message: receivable.status === 'PAID' ? 'Cuenta marcada como pagada' : 'Cuenta actualizada exitosamente'
    });
  } catch (error) {
    res.status(400).json({ status: 'error', message: error.message });
  }
};

/**
 * GET /receivables/summary - Get receivables summary (aging report)
 * Query params: asOfDate
 */
exports.getReceivablesSummary = async (req, res) => {
  try {
    const { asOfDate } = req.query;
    const report = await generateAgingReport(asOfDate || undefined);

    // Also get summary statistics
    const receivables = await prisma.accountsReceivable.findMany({
      where: { status: { not: 'PAID' } },
      select: { amount: true, paidAmount: true, status: true }
    });

    const totalOutstanding = receivables.reduce((sum, r) => sum + (r.amount - r.paidAmount), 0);
    const totalAllReceivables = receivables.reduce((sum, r) => sum + r.amount, 0);

    report.summary.totalAllReceivables = parseFloat(totalAllReceivables.toFixed(2));
    report.summary.totalPaid = parseFloat((totalAllReceivables - totalOutstanding).toFixed(2));

    res.json({ status: 'success', data: report });
  } catch (error) {
    res.status(400).json({ status: 'error', message: error.message });
  }
};

// ============================================================
// Financial Dashboard
// ============================================================

/**
 * GET /dashboard - Get financial dashboard data
 * Returns revenue, expenses, profit, receivables, assets summary
 */
exports.getFinancialDashboard = async (req, res) => {
  try {
    const { startDate, endDate } = req.query;

    // Default to current month
    const now = new Date();
    const start = startDate ? new Date(startDate) : new Date(now.getFullYear(), now.getMonth(), 1);
    const end = endDate ? new Date(endDate) : now;

    // Get balance sheet
    const balanceSheet = await generateBalanceSheet(end);

    // Get income statement
    const incomeStatement = await generateIncomeStatement(start, end);

    // Get receivables summary
    const agingReport = await generateAgingReport(end);

    // Get fixed assets summary
    const assets = await prisma.fixedAsset.findMany({
      where: { active: true },
      select: {
        acquisitionCost: true,
        currentBookValue: true,
        category: true
      }
    });

    const totalAssetValue = assets.reduce((sum, a) => sum + a.currentBookValue, 0);

    // Calculate financial ratios
    const ratios = calculateFinancialRatios(balanceSheet, incomeStatement);

    // Get pending receivables count
    const pendingReceivables = await prisma.accountsReceivable.count({
      where: { status: { not: 'PAID' } }
    });

    // Get overdue receivables
    const overdueReceivables = await prisma.accountsReceivable.findMany({
      where: {
        status: { not: 'PAID' },
        dueDate: { lt: now }
      },
      select: { amount: true, paidAmount: true }
    });

    const totalOverdue = overdueReceivables.reduce((sum, r) => sum + (r.amount - r.paidAmount), 0);

    // Get key metrics
    const totalRevenue = incomeStatement.revenue.total;
    const totalExpenses = incomeStatement.expenses.total;
    const netProfit = incomeStatement.netIncome;
    const totalOutstandingReceivables = agingReport.summary.totalOutstanding;

    res.json({
      status: 'success',
      data: {
        period: {
          startDate: start.toISOString(),
          endDate: end.toISOString()
        },
        keyMetrics: {
          totalRevenue: parseFloat(totalRevenue.toFixed(2)),
          totalExpenses: parseFloat(totalExpenses.toFixed(2)),
          netProfit: parseFloat(netProfit.toFixed(2)),
          profitMargin: ratios.netProfitMargin,
          totalAssets: parseFloat(balanceSheet.totals.assets.toFixed(2)),
          totalLiabilities: parseFloat(balanceSheet.totals.liabilitiesAndEquity.toFixed(2)) - parseFloat(balanceSheet.equity.total.toFixed(2)),
          totalEquity: parseFloat(balanceSheet.equity.total.toFixed(2)),
          fixedAssetBookValue: parseFloat(totalAssetValue.toFixed(2)),
          receivablesOutstanding: parseFloat(totalOutstandingReceivables.toFixed(2)),
          receivablesOverdue: parseFloat(totalOverdue.toFixed(2)),
          pendingReceivablesCount: pendingReceivables
        },
        ratios: {
          debtRatio: ratios.debtRatio,
          equityRatio: ratios.equityRatio,
          debtToEquity: ratios.debtToEquity,
          netProfitMargin: ratios.netProfitMargin,
          roa: ratios.roa,
          roe: ratios.roe
        },
        receivables: {
          totalOutstanding: parseFloat(agingReport.summary.totalOutstanding.toFixed(2)),
          totalOverdue: parseFloat(agingReport.summary.totalOverdue.toFixed(2)),
          aging: agingReport.aging
        },
        balanceSheet: {
          assets: balanceSheet.assets.total,
          liabilities: balanceSheet.liabilities.total,
          equity: balanceSheet.equity.total,
          balanced: balanceSheet.totals.balanced
        },
        incomeStatement: {
          revenue: totalRevenue,
          expenses: totalExpenses,
          netIncome: netProfit
        }
      }
    });
  } catch (error) {
    res.status(400).json({ status: 'error', message: error.message });
  }
};
