const prisma = require('../models/prismaClient');

// Venezuelan VAT rate
const VAT_RATE = 0.16;

// ============================================================
// Journal Entry Operations
// ============================================================

/**
 * Validate that a journal entry is balanced (total debit = total credit)
 * @param {Array} lines - Array of line items with debit and credit
 * @returns {{ valid: boolean, totalDebit: number, totalCredit: number, message?: string }}
 */
function validateEntryBalance(lines) {
  if (!Array.isArray(lines) || lines.length === 0) {
    return { valid: false, totalDebit: 0, totalCredit: 0, message: 'El asiento debe tener al menos una linea' };
  }

  let totalDebit = 0;
  let totalCredit = 0;

  for (const line of lines) {
    const debit = typeof line.debit === 'number' ? line.debit : 0;
    const credit = typeof line.credit === 'number' ? line.credit : 0;

    if (debit < 0 || credit < 0) {
      return { valid: false, totalDebit: 0, totalCredit: 0, message: 'Los montos no pueden ser negativos' };
    }

    if (debit === 0 && credit === 0) {
      return { valid: false, totalDebit: 0, totalCredit: 0, message: 'Cada linea debe tener un monto en debito o credito' };
    }

    totalDebit += debit;
    totalCredit += credit;
  }

  const tolerance = 0.01; // Tolerance for floating point
  const balanced = Math.abs(totalDebit - totalCredit) < tolerance;

  return {
    valid: balanced,
    totalDebit: parseFloat(totalDebit.toFixed(2)),
    totalCredit: parseFloat(totalCredit.toFixed(2)),
    message: balanced ? null : `El asiento no esta balanceado. Debito: Bs ${totalDebit.toFixed(2)}, Credito: Bs ${totalCredit.toFixed(2)}`
  };
}

/**
 * Generate a unique journal entry number
 * @returns {string} Formatted entry number (e.g., "AE-20260407-0001")
 */
function generateEntryNumber() {
  const now = new Date();
  const year = now.getFullYear();
  const month = String(now.getMonth() + 1).padStart(2, '0');
  const day = String(now.getDate()).padStart(2, '0');
  const random = String(Math.floor(Math.random() * 9999) + 1).padStart(4, '0');
  return `AE-${year}${month}${day}-${random}`;
}

/**
 * Create a balanced journal entry in the database
 * @param {Object} data - Entry data { date, description, lines: [{ accountId, debit, credit, description }] }
 * @returns {Promise<Object>} Created journal entry
 * @throws {Error} If entry is not balanced or validation fails
 */
async function createJournalEntry(data) {
  const { date, description, lines } = data;

  if (!date || !description || !lines) {
    throw new Error('Los campos fecha, descripcion y lineas son obligatorios');
  }

  // Validate balance
  const balanceCheck = validateEntryBalance(lines);
  if (!balanceCheck.valid) {
    throw new Error(balanceCheck.message);
  }

  // Validate all accounts exist and are active
  const accountIds = [...new Set(lines.map(l => l.accountId))];
  const accounts = await prisma.account.findMany({
    where: { id: { in: accountIds }, active: true },
    select: { id: true, code: true, name: true }
  });

  if (accounts.length !== accountIds.length) {
    const foundIds = new Set(accounts.map(a => a.id));
    const missing = accountIds.filter(id => !foundIds.has(id));
    throw new Error(`Cuentas no encontradas o inactivas: ${missing.join(', ')}`);
  }

  const entryNumber = generateEntryNumber();

  // Create entry and lines in a transaction
  const entry = await prisma.$transaction(async (tx) => {
    const createdEntry = await tx.journalEntry.create({
      data: {
        number: entryNumber,
        date: new Date(date),
        description: String(description).trim(),
        totalDebit: balanceCheck.totalDebit,
        totalCredit: balanceCheck.totalCredit,
        posted: false
      }
    });

    const createdLines = await Promise.all(
      lines.map(line =>
        tx.journalEntryLine.create({
          data: {
            entryId: createdEntry.id,
            accountId: line.accountId,
            debit: typeof line.debit === 'number' ? line.debit : 0,
            credit: typeof line.credit === 'number' ? line.credit : 0,
            description: line.description ? String(line.description).trim() : null
          }
        })
      )
    );

    return {
      ...createdEntry,
      lines: createdLines
    };
  });

  return entry;
}

/**
 * Post a journal entry and update account balances
 * Only draft entries can be posted. Once posted, cannot be unposted.
 * @param {number} entryId - Journal entry ID
 * @returns {Promise<Object>} Posted entry
 * @throws {Error} If entry not found, already posted, or not balanced
 */
async function postEntry(entryId) {
  const id = parseInt(entryId);
  if (isNaN(id)) {
    throw new Error('ID de asiento invalido');
  }

  const entry = await prisma.journalEntry.findUnique({
    where: { id },
    include: { lines: { include: { account: true } } }
  });

  if (!entry) {
    throw new Error('Asiento contable no encontrado');
  }

  if (entry.posted) {
    throw new Error('El asiento ya esta publicado');
  }

  // Re-validate balance before posting
  const balanceCheck = validateEntryBalance(entry.lines);
  if (!balanceCheck.valid) {
    throw new Error(balanceCheck.message);
  }

  // Post and update account balances in a transaction
  const result = await prisma.$transaction(async (tx) => {
    const postedEntry = await tx.journalEntry.update({
      where: { id },
      data: { posted: true },
      include: { lines: { include: { account: true } } }
    });

    // Update account balances based on entry lines
    // For ASSET and EXPENSE accounts: debit increases balance
    // For LIABILITY, EQUITY, and REVENUE accounts: credit increases balance
    const balanceUpdates = {};

    for (const line of entry.lines) {
      const accountId = line.accountId;
      if (!balanceUpdates[accountId]) {
        balanceUpdates[accountId] = 0;
      }

      const accountType = line.account.type;
      if (accountType === 'ASSET' || accountType === 'EXPENSE') {
        balanceUpdates[accountId] += (line.debit - line.credit);
      } else {
        // LIABILITY, EQUITY, REVENUE
        balanceUpdates[accountId] += (line.credit - line.debit);
      }
    }

    for (const [accountId, change] of Object.entries(balanceUpdates)) {
      await tx.account.update({
        where: { id: parseInt(accountId) },
        data: { balance: { increment: change } }
      });
    }

    return postedEntry;
  });

  return result;
}

// ============================================================
// Financial Reports
// ============================================================

/**
 * Calculate the trial balance for all active accounts
 * Lists each account with its debit or credit balance
 * @param {Date} [asOfDate] - Optional date to calculate as-of
 * @returns {Promise<Object>} Trial balance with accounts and totals
 */
async function calculateTrialBalance(asOfDate) {
  const accounts = await prisma.account.findMany({
    where: { active: true },
    orderBy: { code: 'asc' }
  });

  const trialBalance = [];
  let totalDebits = 0;
  let totalCredits = 0;

  for (const account of accounts) {
    let debitBalance = 0;
    let creditBalance = 0;

    if (account.balance !== 0) {
      if (account.balance > 0) {
        debitBalance = account.balance;
      } else {
        creditBalance = Math.abs(account.balance);
      }
    }

    // If asOfDate is provided, get posted entries up to that date
    if (asOfDate) {
      const entries = await prisma.journalEntryLine.findMany({
        where: {
          accountId: account.id,
          entry: { posted: true, date: { lte: new Date(asOfDate) } }
        },
        select: { debit: true, credit: true }
      });

      debitBalance = 0;
      creditBalance = 0;

      for (const line of entries) {
        if (account.type === 'ASSET' || account.type === 'EXPENSE') {
          debitBalance += line.debit;
          creditBalance += line.credit;
        } else {
          debitBalance += line.credit;
          creditBalance += line.debit;
        }
      }

      const netBalance = debitBalance - creditBalance;
      if (netBalance > 0) {
        debitBalance = netBalance;
        creditBalance = 0;
      } else {
        creditBalance = Math.abs(netBalance);
        debitBalance = 0;
      }
    }

    if (debitBalance !== 0 || creditBalance !== 0) {
      trialBalance.push({
        code: account.code,
        name: account.name,
        type: account.type,
        debit: parseFloat(debitBalance.toFixed(2)),
        credit: parseFloat(creditBalance.toFixed(2))
      });

      totalDebits += debitBalance;
      totalCredits += creditBalance;
    }
  }

  return {
    accounts: trialBalance,
    totals: {
      debit: parseFloat(totalDebits.toFixed(2)),
      credit: parseFloat(totalCredits.toFixed(2)),
      balanced: Math.abs(totalDebits - totalCredits) < 0.01
    },
    asOfDate: asOfDate || new Date().toISOString()
  };
}

/**
 * Generate the balance sheet (Assets = Liabilities + Equity)
 * @param {Date} [asOfDate] - Optional date to calculate as-of
 * @returns {Promise<Object>} Balance sheet with assets, liabilities, equity
 */
async function generateBalanceSheet(asOfDate) {
  const accounts = await prisma.account.findMany({
    where: { active: true },
    orderBy: { code: 'asc' }
  });

  const assets = [];
  const liabilities = [];
  const equity = [];

  for (const account of accounts) {
    if (account.balance === 0) continue;

    const item = {
      code: account.code,
      name: account.name,
      balance: parseFloat(account.balance.toFixed(2)),
      parentCode: account.parentCode
    };

    if (account.type === 'ASSET') {
      assets.push(item);
    } else if (account.type === 'LIABILITY') {
      liabilities.push(item);
    } else if (account.type === 'EQUITY') {
      equity.push(item);
    }
  }

  const totalAssets = assets.reduce((sum, a) => sum + a.balance, 0);
  const totalLiabilities = liabilities.reduce((sum, l) => sum + l.balance, 0);
  const totalEquity = equity.reduce((sum, e) => sum + e.balance, 0);

  return {
    assets: {
      items: assets,
      total: parseFloat(totalAssets.toFixed(2))
    },
    liabilities: {
      items: liabilities,
      total: parseFloat(totalLiabilities.toFixed(2))
    },
    equity: {
      items: equity,
      total: parseFloat(totalEquity.toFixed(2))
    },
    totals: {
      assets: parseFloat(totalAssets.toFixed(2)),
      liabilitiesAndEquity: parseFloat((totalLiabilities + totalEquity).toFixed(2)),
      balanced: Math.abs(totalAssets - (totalLiabilities + totalEquity)) < 0.01
    },
    asOfDate: asOfDate || new Date().toISOString()
  };
}

/**
 * Generate the income statement (Revenue - Expenses = Net Income)
 * @param {Date} startDate - Start date for the period
 * @param {Date} endDate - End date for the period
 * @returns {Promise<Object>} Income statement with revenue, expenses, net income
 */
async function generateIncomeStatement(startDate, endDate) {
  if (!startDate || !endDate) {
    throw new Error('Las fechas de inicio y fin son obligatorias');
  }

  const start = new Date(startDate);
  const end = new Date(endDate);
  end.setHours(23, 59, 59, 999);

  // Get all posted journal entries in the date range
  const entries = await prisma.journalEntry.findMany({
    where: {
      posted: true,
      date: { gte: start, lte: end }
    },
    include: {
      lines: {
        include: { account: true }
      }
    }
  });

  const revenue = [];
  const expenses = [];

  // Aggregate by account
  const accountTotals = {};

  for (const entry of entries) {
    for (const line of entry.lines) {
      const accountId = line.account.id;
      const accountType = line.account.type;

      if (accountType !== 'REVENUE' && accountType !== 'EXPENSE') continue;

      if (!accountTotals[accountId]) {
        accountTotals[accountId] = {
          code: line.account.code,
          name: line.account.name,
          type: accountType,
          amount: 0
        };
      }

      // Revenue: credit increases (positive), debit decreases
      // Expenses: debit increases (positive), credit decreases
      if (accountType === 'REVENUE') {
        accountTotals[accountId].amount += (line.credit - line.debit);
      } else {
        accountTotals[accountId].amount += (line.debit - line.credit);
      }
    }
  }

  for (const account of Object.values(accountTotals)) {
    const item = {
      code: account.code,
      name: account.name,
      amount: parseFloat(account.amount.toFixed(2))
    };

    if (account.type === 'REVENUE') {
      revenue.push(item);
    } else {
      expenses.push(item);
    }
  }

  const totalRevenue = revenue.reduce((sum, r) => sum + r.amount, 0);
  const totalExpenses = expenses.reduce((sum, e) => sum + e.amount, 0);
  const netIncome = totalRevenue - totalExpenses;

  return {
    period: {
      startDate: start.toISOString(),
      endDate: end.toISOString()
    },
    revenue: {
      items: revenue,
      total: parseFloat(totalRevenue.toFixed(2))
    },
    expenses: {
      items: expenses,
      total: parseFloat(totalExpenses.toFixed(2))
    },
    netIncome: parseFloat(netIncome.toFixed(2)),
    netIncomeFormatted: netIncome >= 0
      ? `Ganancia neta: Bs ${netIncome.toFixed(2)}`
      : `Perdida neta: Bs ${Math.abs(netIncome).toFixed(2)}`
  };
}

/**
 * Calculate VAT (IVA) report for a given period
 * Venezuelan standard VAT rate: 16%
 * @param {Date} startDate - Start date for the period
 * @param {Date} endDate - End date for the period
 * @returns {Promise<Object>} VAT report with input/output VAT
 */
async function calculateVATReport(startDate, endDate) {
  if (!startDate || !endDate) {
    throw new Error('Las fechas de inicio y fin son obligatorias');
  }

  const start = new Date(startDate);
  const end = new Date(endDate);
  end.setHours(23, 59, 59, 999);

  // Get VAT-related accounts
  const vatAccounts = await prisma.account.findMany({
    where: {
      active: true,
      OR: [
        { name: { contains: 'IVA', mode: 'insensitive' } },
        { name: { contains: 'IGTF', mode: 'insensitive' } },
        { name: { contains: 'ISLR', mode: 'insensitive' } }
      ]
    },
    orderBy: { code: 'asc' }
  });

  // Get posted entries in date range with VAT accounts
  const vatEntries = await prisma.journalEntry.findMany({
    where: {
      posted: true,
      date: { gte: start, lte: end }
    },
    include: {
      lines: {
        where: {
          accountId: { in: vatAccounts.map(a => a.id) }
        },
        include: { account: true }
      }
    },
    orderBy: { date: 'asc' }
  });

  const outputVAT = []; // VAT collected on sales (credit)
  const inputVAT = [];  // VAT paid on purchases (debit)

  let totalOutputVAT = 0;
  let totalInputVAT = 0;

  for (const entry of vatEntries) {
    for (const line of entry.lines) {
      const isOutput = line.credit > line.debit;
      const amount = Math.abs(line.credit - line.debit);

      const item = {
        entryNumber: entry.number,
        date: entry.date.toISOString(),
        description: entry.description,
        account: {
          code: line.account.code,
          name: line.account.name
        },
        debit: parseFloat(line.debit.toFixed(2)),
        credit: parseFloat(line.credit.toFixed(2)),
        netAmount: parseFloat(amount.toFixed(2))
      };

      if (isOutput) {
        outputVAT.push(item);
        totalOutputVAT += amount;
      } else {
        inputVAT.push(item);
        totalInputVAT += amount;
      }
    }
  }

  const vatPayable = totalOutputVAT - totalInputVAT;

  return {
    period: {
      startDate: start.toISOString(),
      endDate: end.toISOString()
    },
    vatRate: VAT_RATE,
    outputVAT: {
      items: outputVAT,
      total: parseFloat(totalOutputVAT.toFixed(2)),
      description: 'IVA Débito Fiscal (Ventas)'
    },
    inputVAT: {
      items: inputVAT,
      total: parseFloat(totalInputVAT.toFixed(2)),
      description: 'IVA Crédito Fiscal (Compras)'
    },
    vatPayable: parseFloat(vatPayable.toFixed(2)),
    vatPayableDescription: vatPayable >= 0
      ? `IVA a pagar: Bs ${vatPayable.toFixed(2)}`
      : `Crédito fiscal a favor: Bs ${Math.abs(vatPayable).toFixed(2)}`,
    totalEntries: vatEntries.length
  };
}

module.exports = {
  validateEntryBalance,
  generateEntryNumber,
  createJournalEntry,
  postEntry,
  calculateTrialBalance,
  generateBalanceSheet,
  generateIncomeStatement,
  calculateVATReport
};
