const prisma = require('../models/prismaClient');
const {
  createJournalEntry,
  postEntry,
  calculateTrialBalance,
  generateBalanceSheet,
  generateIncomeStatement,
  calculateVATReport
} = require('../services/accountingService');

// ============================================================
// Chart of Accounts
// ============================================================

/**
 * GET /accounts - Get chart of accounts with optional filters
 * Query params: type, active, search
 */
exports.getChartOfAccounts = async (req, res) => {
  try {
    const { type, active, search } = req.query;
    const where = {};

    if (type) {
      const validTypes = ['ASSET', 'LIABILITY', 'EQUITY', 'REVENUE', 'EXPENSE'];
      if (!validTypes.includes(type.toUpperCase())) {
        return res.status(400).json({
          status: 'error',
          message: 'Tipo de cuenta invalido. Use: ASSET, LIABILITY, EQUITY, REVENUE, EXPENSE'
        });
      }
      where.type = type.toUpperCase();
    }

    if (active !== undefined) {
      where.active = active === 'true' || active === '1';
    }

    if (search) {
      where.OR = [
        { code: { contains: search, mode: 'insensitive' } },
        { name: { contains: search, mode: 'insensitive' } }
      ];
    }

    const accounts = await prisma.account.findMany({
      where,
      orderBy: [{ type: 'asc' }, { code: 'asc' }],
      select: {
        id: true,
        code: true,
        name: true,
        type: true,
        parentCode: true,
        balance: true,
        active: true,
        createdAt: true,
        updatedAt: true
      }
    });

    // Group by type
    const grouped = {
      ASSET: [],
      LIABILITY: [],
      EQUITY: [],
      REVENUE: [],
      EXPENSE: []
    };

    for (const account of accounts) {
      if (grouped[account.type]) {
        grouped[account.type].push(account);
      }
    }

    res.json({
      status: 'success',
      data: {
        accounts,
        grouped,
        total: accounts.length
      }
    });
  } catch (error) {
    res.status(400).json({ status: 'error', message: error.message });
  }
};

/**
 * POST /accounts - Create a new account in the chart of accounts
 * Body: { code, name, type, parentCode?, balance? }
 */
exports.createAccount = async (req, res) => {
  try {
    const { code, name, type, parentCode, balance } = req.body;

    // Required field validation
    if (!code || !name || !type) {
      return res.status(400).json({
        status: 'error',
        message: 'Los campos codigo, nombre y tipo son obligatorios'
      });
    }

    const validTypes = ['ASSET', 'LIABILITY', 'EQUITY', 'REVENUE', 'EXPENSE'];
    if (!validTypes.includes(type.toUpperCase())) {
      return res.status(400).json({
        status: 'error',
        message: 'Tipo de cuenta invalido. Use: ASSET, LIABILITY, EQUITY, REVENUE, EXPENSE'
      });
    }

    // Validate parent account if provided
    if (parentCode) {
      const parent = await prisma.account.findUnique({
        where: { code: parentCode, active: true }
      });
      if (!parent) {
        return res.status(400).json({
          status: 'error',
          message: `Cuenta padre '${parentCode}' no encontrada`
        });
      }
    }

    const account = await prisma.account.create({
      data: {
        code: String(code).trim(),
        name: String(name).trim(),
        type: type.toUpperCase(),
        parentCode: parentCode || null,
        balance: typeof balance === 'number' ? balance : 0
      }
    });

    res.status(201).json({ status: 'success', data: account });
  } catch (error) {
    if (error.code === 'P2002') {
      return res.status(409).json({ status: 'error', message: 'Ya existe una cuenta con ese codigo' });
    }
    res.status(400).json({ status: 'error', message: error.message });
  }
};

/**
 * PUT /accounts/:id - Update an existing account
 * Body: { name?, parentCode?, active? }
 */
exports.updateAccount = async (req, res) => {
  try {
    const { id } = req.params;
    if (!id) {
      return res.status(400).json({ status: 'error', message: 'ID de cuenta requerido' });
    }

    const existing = await prisma.account.findUnique({ where: { id } });
    if (!existing) {
      return res.status(404).json({ status: 'error', message: 'Cuenta no encontrada' });
    }

    const { name, parentCode, active } = req.body;

    // Validate parent account if provided
    if (parentCode !== undefined && parentCode !== null) {
      if (parentCode === existing.code) {
        return res.status(400).json({
          status: 'error',
          message: 'Una cuenta no puede ser su propia cuenta padre'
        });
      }
      const parent = await prisma.account.findUnique({
        where: { code: parentCode, active: true }
      });
      if (!parent) {
        return res.status(400).json({
          status: 'error',
          message: `Cuenta padre '${parentCode}' no encontrada`
        });
      }
    }

    const account = await prisma.account.update({
      where: { id },
      data: {
        ...(name !== undefined && { name: String(name).trim() }),
        ...(parentCode !== undefined && { parentCode: parentCode || null }),
        ...(active !== undefined && { active: Boolean(active) })
      }
    });

    res.json({ status: 'success', data: account });
  } catch (error) {
    if (error.code === 'P2002') {
      return res.status(409).json({ status: 'error', message: 'Ya existe una cuenta con ese codigo' });
    }
    res.status(400).json({ status: 'error', message: error.message });
  }
};

// ============================================================
// Journal Entries
// ============================================================

/**
 * GET /journal-entries - Get journal entries with filters
 * Query params: startDate, endDate, posted, search, page, limit
 */
exports.getJournalEntries = async (req, res) => {
  try {
    const { startDate, endDate, posted, search, page = '1', limit = '20' } = req.query;
    const pageNum = Math.max(1, parseInt(page) || 1);
    const limitNum = Math.min(100, Math.max(1, parseInt(limit) || 20));
    const skip = (pageNum - 1) * limitNum;

    const where = {};

    if (startDate || endDate) {
      where.date = {};
      if (startDate) where.date.gte = new Date(startDate);
      if (endDate) where.date.lte = new Date(endDate);
    }

    if (posted !== undefined) {
      where.posted = posted === 'true' || posted === '1';
    }

    if (search) {
      where.OR = [
        { number: { contains: search, mode: 'insensitive' } },
        { description: { contains: search, mode: 'insensitive' } }
      ];
    }

    const [entries, total] = await Promise.all([
      prisma.journalEntry.findMany({
        where,
        skip,
        take: limitNum,
        orderBy: { date: 'desc' },
        include: {
          lines: {
            include: {
              account: {
                select: { code: true, name: true, type: true }
              }
            }
          }
        }
      }),
      prisma.journalEntry.count({ where })
    ]);

    res.json({
      status: 'success',
      data: {
        entries,
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
 * POST /journal-entries - Create a new journal entry (must balance)
 * Body: { date, description, lines: [{ accountId, debit, credit, description? }] }
 */
exports.createJournalEntry = async (req, res) => {
  try {
    const { date, description, lines } = req.body;

    if (!date || !description || !lines) {
      return res.status(400).json({
        status: 'error',
        message: 'Los campos fecha, descripcion y lineas son obligatorios'
      });
    }

    if (!Array.isArray(lines) || lines.length < 2) {
      return res.status(400).json({
        status: 'error',
        message: 'El asiento debe tener al menos 2 lineas'
      });
    }

    // Validate each line has accountId and a valid amount
    for (let i = 0; i < lines.length; i++) {
      const line = lines[i];
      if (!line.accountId) {
        return res.status(400).json({
          status: 'error',
          message: `La linea ${i + 1} debe tener un accountId`
        });
      }
      if (typeof line.debit !== 'number' && typeof line.credit !== 'number') {
        return res.status(400).json({
          status: 'error',
          message: `La linea ${i + 1} debe tener un monto en debito o credito`
        });
      }
    }

    const entry = await createJournalEntry({
      date,
      description,
      lines: lines.map(l => ({
        accountId: l.accountId,
        debit: typeof l.debit === 'number' ? l.debit : 0,
        credit: typeof l.credit === 'number' ? l.credit : 0,
        description: l.description
      }))
    });

    res.status(201).json({ status: 'success', data: entry });
  } catch (error) {
    res.status(400).json({ status: 'error', message: error.message });
  }
};

/**
 * POST /journal-entries/:id/post - Post a journal entry
 * Updates account balances and marks entry as posted
 */
exports.postJournalEntry = async (req, res) => {
  try {
    const { id } = req.params;
    if (!id) {
      return res.status(400).json({ status: 'error', message: 'ID de asiento requerido' });
    }

    const entry = await postEntry(id);

    res.json({
      status: 'success',
      data: entry,
      message: 'Asiento contable publicado exitosamente'
    });
  } catch (error) {
    if (error.message.includes('no encontrado')) {
      return res.status(404).json({ status: 'error', message: error.message });
    }
    res.status(400).json({ status: 'error', message: error.message });
  }
};

// ============================================================
// Financial Reports
// ============================================================

/**
 * GET /trial-balance - Get trial balance
 * Query params: asOfDate
 */
exports.getTrialBalance = async (req, res) => {
  try {
    const { asOfDate } = req.query;
    const trialBalance = await calculateTrialBalance(asOfDate || undefined);

    res.json({ status: 'success', data: trialBalance });
  } catch (error) {
    res.status(400).json({ status: 'error', message: error.message });
  }
};

/**
 * GET /general-ledger - Get general ledger for an account
 * Query params: accountId, startDate, endDate
 */
exports.getGeneralLedger = async (req, res) => {
  try {
    const { accountId, startDate, endDate } = req.query;

    if (!accountId) {
      return res.status(400).json({
        status: 'error',
        message: 'El parametro accountId es obligatorio'
      });
    }

    const account = await prisma.account.findUnique({
      where: { id: accountId }
    });

    if (!account) {
      return res.status(404).json({ status: 'error', message: 'Cuenta no encontrada' });
    }

    const where = {
      accountId: accountId,
      entry: { posted: true }
    };

    if (startDate || endDate) {
      where.entry.date = {};
      if (startDate) where.entry.date.gte = new Date(startDate);
      if (endDate) where.entry.date.lte = new Date(endDate);
    }

    const lines = await prisma.journalEntryLine.findMany({
      where,
      orderBy: { entry: { date: 'asc' } },
      include: {
        entry: {
          select: {
            number: true,
            date: true,
            description: true
          }
        },
        account: {
          select: { code: true, name: true, type: true }
        }
      }
    });

    // Build running balance
    let runningBalance = account.type === 'ASSET' || account.type === 'EXPENSE' ? account.balance : -account.balance;
    const ledger = [];

    // Calculate starting balance from entries before the date range
    const priorLines = await prisma.journalEntryLine.findMany({
      where: {
        accountId: accountId,
        entry: {
          posted: true,
          date: startDate ? { lt: new Date(startDate) } : undefined
        }
      },
      select: { debit: true, credit: true }
    });

    let priorBalance = 0;
    for (const line of priorLines) {
      if (account.type === 'ASSET' || account.type === 'EXPENSE') {
        priorBalance += line.debit - line.credit;
      } else {
        priorBalance += line.credit - line.debit;
      }
    }

    runningBalance = priorBalance;

    // Opening balance
    if (priorBalance !== 0) {
      ledger.push({
        type: 'OPENING',
        date: startDate || null,
        entryNumber: null,
        description: 'Saldo anterior',
        debit: 0,
        credit: 0,
        balance: parseFloat(priorBalance.toFixed(2))
      });
    }

    for (const line of lines) {
      if (account.type === 'ASSET' || account.type === 'EXPENSE') {
        runningBalance += line.debit - line.credit;
      } else {
        runningBalance += line.credit - line.debit;
      }

      ledger.push({
        type: 'ENTRY',
        date: line.entry.date,
        entryNumber: line.entry.number,
        description: line.description || line.entry.description,
        debit: parseFloat(line.debit.toFixed(2)),
        credit: parseFloat(line.credit.toFixed(2)),
        balance: parseFloat(runningBalance.toFixed(2))
      });
    }

    res.json({
      status: 'success',
      data: {
        account: {
          code: account.code,
          name: account.name,
          type: account.type,
          currentBalance: parseFloat(account.balance.toFixed(2))
        },
        entries: ledger,
        period: {
          startDate: startDate || null,
          endDate: endDate || null
        },
        totalDebits: parseFloat(ledger.filter(l => l.type === 'ENTRY').reduce((s, l) => s + l.debit, 0).toFixed(2)),
        totalCredits: parseFloat(ledger.filter(l => l.type === 'ENTRY').reduce((s, l) => s + l.credit, 0).toFixed(2)),
        endingBalance: parseFloat(runningBalance.toFixed(2))
      }
    });
  } catch (error) {
    res.status(400).json({ status: 'error', message: error.message });
  }
};

/**
 * GET /balance-sheet - Get balance sheet (Assets = Liabilities + Equity)
 * Query params: asOfDate
 */
exports.getBalanceSheet = async (req, res) => {
  try {
    const { asOfDate } = req.query;
    const balanceSheet = await generateBalanceSheet(asOfDate || undefined);

    res.json({ status: 'success', data: balanceSheet });
  } catch (error) {
    res.status(400).json({ status: 'error', message: error.message });
  }
};

/**
 * GET /income-statement - Get income statement (Revenue - Expenses)
 * Query params: startDate, endDate (required)
 */
exports.getIncomeStatement = async (req, res) => {
  try {
    const { startDate, endDate } = req.query;

    if (!startDate || !endDate) {
      return res.status(400).json({
        status: 'error',
        message: 'Los parametros startDate y endDate son obligatorios'
      });
    }

    const statement = await generateIncomeStatement(startDate, endDate);

    res.json({ status: 'success', data: statement });
  } catch (error) {
    res.status(400).json({ status: 'error', message: error.message });
  }
};

/**
 * GET /tax-report - Get tax report (VAT/IVA)
 * Query params: startDate, endDate (required)
 */
exports.getTaxReport = async (req, res) => {
  try {
    const { startDate, endDate } = req.query;

    if (!startDate || !endDate) {
      return res.status(400).json({
        status: 'error',
        message: 'Los parametros startDate y endDate son obligatorios'
      });
    }

    const report = await calculateVATReport(startDate, endDate);

    res.json({ status: 'success', data: report });
  } catch (error) {
    res.status(400).json({ status: 'error', message: error.message });
  }
};

/**
 * GET /cash-book - Get cash and bank book
 * Shows all posted entries affecting cash/bank accounts
 * Query params: startDate, endDate
 */
exports.getCashBook = async (req, res) => {
  try {
    const { startDate, endDate } = req.query;

    // Find cash and bank accounts (by code prefix or name)
    const cashAccounts = await prisma.account.findMany({
      where: {
        active: true,
        type: 'ASSET',
        OR: [
          { code: { startsWith: '1.01' } },
          { name: { contains: 'caja', mode: 'insensitive' } },
          { name: { contains: 'banco', mode: 'insensitive' } }
        ]
      },
      select: { id: true, code: true, name: true, balance: true }
    });

    if (cashAccounts.length === 0) {
      return res.json({
        status: 'success',
        data: {
          cashAccounts: [],
          transactions: [],
          summary: { totalInflows: 0, totalOutflows: 0, netCashFlow: 0 }
        }
      });
    }

    const accountIds = cashAccounts.map(a => a.id);

    const where = {
      accountId: { in: accountIds },
      entry: { posted: true }
    };

    if (startDate || endDate) {
      where.entry.date = {};
      if (startDate) where.entry.date.gte = new Date(startDate);
      if (endDate) where.entry.date.lte = new Date(endDate);
    }

    const lines = await prisma.journalEntryLine.findMany({
      where,
      orderBy: { entry: { date: 'asc' } },
      include: {
        entry: {
          select: {
            number: true,
            date: true,
            description: true
          }
        },
        account: {
          select: { code: true, name: true }
        }
      }
    });

    const transactions = [];
    let totalInflows = 0;
    let totalOutflows = 0;

    for (const line of lines) {
      const isDebit = line.debit > 0;
      const amount = Math.max(line.debit, line.credit);

      if (isDebit) {
        totalInflows += amount;
      } else {
        totalOutflows += amount;
      }

      transactions.push({
        date: line.entry.date,
        entryNumber: line.entry.number,
        description: line.entry.description,
        account: {
          code: line.account.code,
          name: line.account.name
        },
        debit: parseFloat(line.debit.toFixed(2)),
        credit: parseFloat(line.credit.toFixed(2)),
        netAmount: parseFloat(amount.toFixed(2)),
        type: isDebit ? 'INFLOW' : 'OUTFLOW'
      });
    }

    const netCashFlow = totalInflows - totalOutflows;

    res.json({
      status: 'success',
      data: {
        cashAccounts,
        transactions,
        period: {
          startDate: startDate || null,
          endDate: endDate || null
        },
        summary: {
          totalInflows: parseFloat(totalInflows.toFixed(2)),
          totalOutflows: parseFloat(totalOutflows.toFixed(2)),
          netCashFlow: parseFloat(netCashFlow.toFixed(2)),
          currentCashBalance: parseFloat(cashAccounts.reduce((s, a) => s + a.balance, 0).toFixed(2))
        }
      }
    });
  } catch (error) {
    res.status(400).json({ status: 'error', message: error.message });
  }
};
