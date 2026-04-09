const { body } = require('express-validator');

const createSaleValidator = [
  body('items')
    .isArray({ min: 1 }).withMessage('La venta debe incluir al menos un producto'),
  body('items.*.productId')
    .notEmpty().withMessage('El ID del producto es obligatorio')
    .isString().withMessage('El ID del producto debe ser un string (UUID)'),
  body('items.*.quantity')
    .notEmpty().withMessage('La cantidad es obligatoria')
    .isNumeric().withMessage('La cantidad debe ser un número')
    .custom((value) => value > 0).withMessage('La cantidad debe ser mayor a 0'),
  body('items.*.price')
    .notEmpty().withMessage('El precio es obligatorio')
    .isNumeric().withMessage('El precio debe ser un número')
    .custom((value) => value > 0).withMessage('El precio debe ser mayor a 0'),
  body('paymentMethod')
    .notEmpty().withMessage('El método de pago es requerido')
    .isIn(['PAGO_MOVIL', 'C2P', 'TRANSFERENCIA_BS', 'STRIPE', 'PAYPAL', 'BINANCE', 'CASH', 'CARD'])
    .withMessage('Método de pago no soportado'),
  body('discountPercent')
    .optional()
    .isNumeric().withMessage('El descuento debe ser un número')
    .isFloat({ min: 0, max: 100 }).withMessage('El descuento debe estar entre 0 y 100'),
  body('paymentDetails')
    .optional()
    .isObject().withMessage('Los detalles de pago deben ser un objeto')
];

module.exports = {
  createSaleValidator
};
