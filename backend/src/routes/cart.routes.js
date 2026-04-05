const express = require('express');
const router = express.Router();
const { authMiddleware } = require('../middleware/auth');

// Placeholder routes - implement as needed
router.get('/', authMiddleware, (req, res) => {
  res.json({ success: true, data: [] });
});

module.exports = router;
