/**
 * Input Validation Middleware
 * La Cima Zenith ERP - Security Improvement
 * Uses express-validator to prevent SQL injection and invalid data
 */
const { body, param, query, validationResult } = require('express-validator');

// Helper: Run validation and return errors
const validate = (req, res, next) => {
  const errors = validationResult(req);
  if (!errors.isEmpty()) {
    return res.status(400).json({
      success: false,
      message: 'Datos de entrada inválidos',
      errors: errors.array().map(e => ({
        field: e.path,
        message: e.msg,
      })),
    });
  }
  next();
};

// ===== AUTH VALIDATIONS =====
const validateLogin = [
  body('email')
    .isEmail()
    .normalizeEmail()
    .withMessage('Email inválido')
    .isLength({ max: 255 })
    .withMessage('Email demasiado largo'),
  body('password')
    .isString()
    .isLength({ min: 6, max: 128 })
    .withMessage('Contraseña debe tener entre 6 y 128 caracteres'),
  validate
];

const validateRegister = [
  body('name')
    .isString()
    .trim()
    .isLength({ min: 2, max: 100 })
    .withMessage('Nombre debe tener entre 2 y 100 caracteres')
    .matches(/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/)
    .withMessage('Nombre solo puede contener letras y espacios'),
  body('email')
    .isEmail()
    .normalizeEmail()
    .withMessage('Email inválido')
    .isLength({ max: 255 })
    .withMessage('Email demasiado largo'),
  body('password')
    .isString()
    .isLength({ min: 6, max: 128 })
    .withMessage('Contraseña debe tener entre 6 y 128 caracteres')
    .matches(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)/)
    .withMessage('Contraseña debe tener al menos una minúscula, una mayúscula y un número'),
  body('phone')
    .optional()
    .isString()
    .trim()
    .matches(/^[+]?[\d\s()-]+$/)
    .withMessage('Teléfono inválido')
    .isLength({ max: 20 })
    .withMessage('Teléfono demasiado largo'),
  validate
];

const validateB2BRegister = [
  body('companyName')
    .isString()
    .trim()
    .isLength({ min: 2, max: 200 })
    .withMessage('Nombre de empresa debe tener entre 2 y 200 caracteres'),
  body('rif')
    .isString()
    .trim()
    .matches(/^[JGVPEC]-?\d{8}-?\d$/)
    .withMessage('RIF inválido (formato: J-12345678-9)'),
  body('contactName')
    .isString()
    .trim()
    .isLength({ min: 2, max: 100 })
    .withMessage('Nombre de contacto inválido')
    .matches(/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/)
    .withMessage('Nombre solo puede contener letras y espacios'),
  body('email')
    .isEmail()
    .normalizeEmail()
    .withMessage('Email inválido'),
  body('phone')
    .isString()
    .trim()
    .matches(/^[+]?[\d\s()-]+$/)
    .withMessage('Teléfono inválido'),
  body('businessType')
    .isIn(['taller', 'flota', 'distribuidor', 'concesionario'])
    .withMessage('Tipo de negocio inválido'),
  body('password')
    .isString()
    .isLength({ min: 6, max: 128 })
    .withMessage('Contraseña debe tener entre 6 y 128 caracteres'),
  validate
];

// ===== PRODUCT VALIDATIONS =====
const validateProduct = [
  body('name')
    .isString()
    .trim()
    .isLength({ min: 2, max: 200 })
    .withMessage('Nombre del producto debe tener entre 2 y 200 caracteres'),
  body('sku')
    .isString()
    .trim()
    .isLength({ min: 3, max: 50 })
    .withMessage('SKU debe tener entre 3 y 50 caracteres')
    .matches(/^[A-Z0-9-]+$/)
    .withMessage('SKU solo puede contener mayúsculas, números y guiones'),
  body('oem')
    .isString()
    .trim()
    .isLength({ min: 2, max: 50 })
    .withMessage('OEM inválido'),
  body('price')
    .isFloat({ min: 0, max: 9999999 })
    .withMessage('Precio debe ser un número entre 0 y 9,999,999'),
  body('stock')
    .optional()
    .isInt({ min: 0, max: 999999 })
    .withMessage('Stock debe ser un número entero entre 0 y 999,999'),
  body('brand')
    .optional()
    .isString()
    .trim()
    .isLength({ max: 100 })
    .withMessage('Marca demasiado larga'),
  body('vehicle')
    .optional()
    .isString()
    .trim()
    .isLength({ max: 200 })
    .withMessage('Vehículo demasiado largo'),
  body('image')
    .optional()
    .isURL()
    .withMessage('URL de imagen inválida'),
  validate
];

const validateProductId = [
  param('id')
    .isString()
    .trim()
    .isLength({ min: 3, max: 50 })
    .withMessage('ID de producto inválido'),
  validate
];

// ===== ORDER VALIDATIONS =====
const validateOrder = [
  body('items')
    .isArray({ min: 1, max: 100 })
    .withMessage('Orden debe tener entre 1 y 100 items'),
  body('items.*.productId')
    .isString()
    .trim()
    .isLength({ min: 3, max: 50 })
    .withMessage('ID de producto inválido'),
  body('items.*.qty')
    .isInt({ min: 1, max: 999 })
    .withMessage('Cantidad debe ser entre 1 y 999'),
  body('items.*.price')
    .isFloat({ min: 0, max: 9999999 })
    .withMessage('Precio inválido'),
  body('subtotal')
    .isFloat({ min: 0 })
    .withMessage('Subtotal inválido'),
  body('tax')
    .isFloat({ min: 0 })
    .withMessage('Impuesto inválido'),
  body('total')
    .isFloat({ min: 0 })
    .withMessage('Total inválido'),
  body('paymentMethod')
    .isIn(['transfer', 'corporate_credit', 'credit_card', 'cash'])
    .withMessage('Método de pago inválido'),
  body('billingAddress')
    .isObject()
    .withMessage('Dirección de facturación requerida'),
  validate
];

const validateOrderStatus = [
  param('id')
    .isUUID()
    .withMessage('ID de orden inválido'),
  body('status')
    .isIn([
      'pending', 'confirmed', 'processing', 'shipped',
      'in_transit', 'delivered', 'cancelled', 'refunded'
    ])
    .withMessage('Estado inválido'),
  body('trackingNumber')
    .optional()
    .isString()
    .trim()
    .isLength({ max: 100 })
    .withMessage('Número de tracking demasiado largo'),
  validate
];

// ===== USER VALIDATIONS =====
const validateUserProfile = [
  body('name')
    .optional()
    .isString()
    .trim()
    .isLength({ min: 2, max: 100 })
    .withMessage('Nombre inválido')
    .matches(/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/)
    .withMessage('Nombre solo puede contener letras y espacios'),
  body('phone')
    .optional()
    .isString()
    .trim()
    .matches(/^[+]?[\d\s()-]+$/)
    .withMessage('Teléfono inválido'),
  body('address')
    .optional()
    .isString()
    .trim()
    .isLength({ max: 500 })
    .withMessage('Dirección demasiado larga'),
  validate
];

const validateUserStatus = [
  param('id')
    .isUUID()
    .withMessage('ID de usuario inválido'),
  body('status')
    .isIn(['active', 'suspended', 'pending_approval'])
    .withMessage('Estado inválido'),
  validate
];

// ===== CATEGORY VALIDATIONS =====
const validateCategory = [
  body('name')
    .isString()
    .trim()
    .isLength({ min: 2, max: 100 })
    .withMessage('Nombre de categoría inválido'),
  body('icon')
    .optional()
    .isString()
    .trim()
    .isLength({ max: 50 })
    .withMessage('Icono inválido'),
  body('description')
    .optional()
    .isString()
    .trim()
    .isLength({ max: 500 })
    .withMessage('Descripción demasiado larga'),
  validate
];

// ===== CART VALIDATIONS =====
const validateCartItem = [
  body('userId')
    .isUUID()
    .withMessage('ID de usuario inválido'),
  body('productId')
    .isString()
    .trim()
    .isLength({ min: 3, max: 50 })
    .withMessage('ID de producto inválido'),
  body('qty')
    .optional()
    .isInt({ min: 1, max: 999 })
    .withMessage('Cantidad debe ser entre 1 y 999'),
  validate
];

// ===== B2B VALIDATIONS =====
const validateB2BRequest = [
  body('companyName')
    .isString()
    .trim()
    .isLength({ min: 2, max: 200 })
    .withMessage('Nombre de empresa inválido'),
  body('rif')
    .isString()
    .trim()
    .matches(/^[JGVPEC]-?\d{8}-?\d$/)
    .withMessage('RIF inválido'),
  body('contactName')
    .isString()
    .trim()
    .isLength({ min: 2, max: 100 })
    .withMessage('Nombre de contacto inválido'),
  body('email')
    .isEmail()
    .normalizeEmail()
    .withMessage('Email inválido'),
  body('businessType')
    .isIn(['taller', 'flota', 'distribuidor', 'concesionario'])
    .withMessage('Tipo de negocio inválido'),
  validate
];

// ===== RECOVERY VALIDATIONS =====
const validateRecovery = [
  body('email')
    .isEmail()
    .normalizeEmail()
    .withMessage('Email inválido'),
  body('newPassword')
    .isString()
    .isLength({ min: 6, max: 128 })
    .withMessage('Contraseña debe tener entre 6 y 128 caracteres'),
  validate
];

// ===== QUERY VALIDATIONS (for list endpoints) =====
const validatePagination = [
  query('page')
    .optional()
    .isInt({ min: 1, max: 10000 })
    .withMessage('Página debe ser entre 1 y 10,000'),
  query('limit')
    .optional()
    .isInt({ min: 1, max: 100 })
    .withMessage('Límite debe ser entre 1 y 100'),
  query('search')
    .optional()
    .isString()
    .trim()
    .isLength({ max: 200 })
    .withMessage('Búsqueda demasiado larga'),
  query('sort')
    .optional()
    .matches(/^[a-zA-Z_]+:(asc|desc)$/i)
    .withMessage('Formato de ordenamiento inválido (campo:direction)'),
  validate
];

module.exports = {
  // Auth
  validateLogin,
  validateRegister,
  validateB2BRegister,
  
  // Products
  validateProduct,
  validateProductId,
  
  // Orders
  validateOrder,
  validateOrderStatus,
  
  // Users
  validateUserProfile,
  validateUserStatus,
  
  // Categories
  validateCategory,
  
  // Cart
  validateCartItem,
  
  // B2B
  validateB2BRequest,
  
  // Recovery
  validateRecovery,
  
  // Query
  validatePagination,
};
