const express = require('express');
const router = express.Router();
const accountingController = require('../controllers/accountingController');
const { protect, authorize } = require('../middleware/authMiddleware');

// NOTE: Specific routes MUST come before parameterized routes (:id)

// Financial Reports
router.get('/trial-balance', protect, authorize('ADMIN', 'MANAGER'), accountingController.getTrialBalance);
router.get('/general-ledger', protect, authorize('ADMIN', 'MANAGER'), accountingController.getGeneralLedger);
router.get('/balance-sheet', protect, authorize('ADMIN', 'MANAGER'), accountingController.getBalanceSheet);
router.get('/income-statement', protect, authorize('ADMIN', 'MANAGER'), accountingController.getIncomeStatement);
router.get('/tax-report', protect, authorize('ADMIN', 'MANAGER'), accountingController.getTaxReport);
router.get('/cash-book', protect, authorize('ADMIN', 'MANAGER'), accountingController.getCashBook);

// Journal Entries
router.get('/journal-entries', protect, authorize('ADMIN', 'MANAGER'), accountingController.getJournalEntries);
router.post('/journal-entries', protect, authorize('ADMIN', 'MANAGER'), accountingController.createJournalEntry);
router.post('/journal-entries/:id/post', protect, authorize('ADMIN'), accountingController.postJournalEntry);

// Chart of Accounts
router.get('/accounts', protect, authorize('ADMIN', 'MANAGER'), accountingController.getChartOfAccounts);
router.post('/accounts', protect, authorize('ADMIN'), accountingController.createAccount);
router.put('/accounts/:id', protect, authorize('ADMIN'), accountingController.updateAccount);

module.exports = router;
