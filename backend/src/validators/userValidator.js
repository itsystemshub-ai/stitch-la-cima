const { body } = require('express-validator');

const createUserValidator = [
  body('email')
    .notEmpty().withMessage('El email es obligatorio')
    .isEmail().withMessage('El email no es válido')
    .normalizeEmail(),
  body('password')
    .notEmpty().withMessage('La contraseña es obligatoria')
    .isLength({ min: 6 }).withMessage('La contraseña debe tener al menos 6 caracteres'),
  body('name')
    .notEmpty().withMessage('El nombre es obligatorio')
    .isString().withMessage('El nombre debe ser un texto'),
  body('role')
    .optional()
    .isIn(['ADMIN', 'MANAGER', 'USER', 'SALES_AGENT'])
    .withMessage('Rol no válido')
];

const updateUserValidator = [
  body('email')
    .optional()
    .isEmail().withMessage('El email no es válido')
    .normalizeEmail(),
  body('password')
    .optional()
    .isLength({ min: 6 }).withMessage('La contraseña debe tener al menos 6 caracteres'),
  body('name')
    .optional()
    .isString().withMessage('El nombre debe ser un texto'),
  body('role')
    .optional()
    .isIn(['ADMIN', 'MANAGER', 'USER', 'SALES_AGENT'])
    .withMessage('Rol no válido')
];

const loginValidator = [
  body('email')
    .notEmpty().withMessage('El email es obligatorio')
    .isEmail().withMessage('El email no es válido'),
  body('password')
    .notEmpty().withMessage('La contraseña es obligatoria')
];

module.exports = {
  createUserValidator,
  updateUserValidator,
  loginValidator
};
