const express = require('express');
const router = express.Router();
const cartController = require('../controllers/cart.controller');
const { validateCartItem } = require('../middleware/validation');

router.get('/', cartController.getCart);
router.post('/', validateCartItem, cartController.addToCart);
router.put('/', validateCartItem, cartController.updateCartItem);
router.delete('/', cartController.clearCart);

module.exports = router;
