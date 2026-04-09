const { validationResult } = require('express-validator');

/**
 * Middleware to handle express-validator results
 */
const validate = (req, res, next) => {
  const errors = validationResult(req);
  if (errors.isEmpty()) {
    return next();
  }

  const extractedErrors = [];
  errors.array().map(err => extractedErrors.push({ [err.path]: err.msg }));

  return res.status(400).json({
    status: 'error',
    message: 'Error de validación',
    errors: extractedErrors,
  });
};

module.exports = validate;
