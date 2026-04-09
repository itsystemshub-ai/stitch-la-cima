const { body } = require('express-validator');

const stockMovementValidator = [
  body('productId')
    .notEmpty().withMessage('El ID del producto es obligatorio')
    .isString().withMessage('El ID del producto debe ser un string (UUID)'),
  body('quantity')
    .notEmpty().withMessage('La cantidad es obligatoria')
    .isNumeric().withMessage('La cantidad debe ser un número')
    .custom((value) => value > 0).withMessage('La cantidad debe ser mayor a 0')
];

const addStockValidator = [
  ...stockMovementValidator,
  body('cost')
    .notEmpty().withMessage('El costo es obligatorio')
    .isNumeric().withMessage('El costo debe ser un número')
    .custom((value) => value >= 0).withMessage('El costo no puede ser negativo'),
  body('reason')
    .optional()
    .isString().withMessage('El motivo debe ser un texto')
];

const adjustStockValidator = [
  body('productId')
    .notEmpty().withMessage('El ID del producto es obligatorio')
    .isString().withMessage('El ID del producto debe ser un string (UUID)'),
  body('newQuantity')
    .notEmpty().withMessage('La nueva cantidad es obligatoria')
    .isNumeric().withMessage('La nueva cantidad debe ser un número')
    .custom((value) => value >= 0).withMessage('La nueva cantidad no puede ser negativa'),
  body('reason')
    .notEmpty().withMessage('El motivo del ajuste es obligatorio')
    .isString().withMessage('El motivo debe ser un texto')
];

module.exports = {
  addStockValidator,
  stockMovementValidator,
  adjustStockValidator
};
