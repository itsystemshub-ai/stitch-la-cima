const express = require('express');
const router = express.Router();
const { authMiddleware, authorize } = require('../middleware/auth');

// Placeholder routes - implement as needed
router.get('/', authMiddleware, authorize('admin'), (req, res) => {
  res.json({ success: true, data: [] });
});

module.exports = router;
