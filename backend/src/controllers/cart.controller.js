const { Cart, User, Product } = require('../models');

// GET /api/cart - Get user's cart
const getCart = async (req, res) => {
  try {
    const userId = req.user?.id || req.body.userId;
    if (!userId) {
      return res.status(400).json({ success: false, message: 'User ID required' });
    }
    
    let cart = await Cart.findOne({ where: { userId } });
    if (!cart) {
      cart = await Cart.create({ userId, items: [] });
    }
    
    res.json({ success: true, data: cart.items });
  } catch (error) {
    console.error('Get cart error:', error);
    res.status(500).json({ success: false, message: 'Error interno del servidor' });
  }
};

// POST /api/cart - Add item to cart
const addToCart = async (req, res) => {
  try {
    const { userId, productId, qty = 1 } = req.body;
    if (!userId || !productId) {
      return res.status(400).json({ success: false, message: 'userId and productId required' });
    }
    
    let cart = await Cart.findOne({ where: { userId } });
    if (!cart) {
      cart = await Cart.create({ userId, items: [] });
    }
    
    const product = await Product.findByPk(productId);
    if (!product) {
      return res.status(404).json({ success: false, message: 'Producto no encontrado' });
    }
    
    let items = cart.items || [];
    const existingIndex = items.findIndex(item => item.productId === productId);
    
    if (existingIndex >= 0) {
      items[existingIndex].qty += qty;
    } else {
      items.push({
        productId,
        name: product.name,
        sku: product.sku,
        price: parseFloat(product.price),
        qty,
        image: product.image || '',
        addedAt: new Date().toISOString()
      });
    }
    
    await cart.update({ items });
    
    // Emit socket event
    if (req.io) {
      req.io.to(`user:${userId}`).emit('cart:updated', { userId, items, totalItems: items.reduce((sum, i) => sum + i.qty, 0) });
    }
    
    res.json({ success: true, data: { items, totalItems: items.reduce((sum, i) => sum + i.qty, 0) } });
  } catch (error) {
    console.error('Add to cart error:', error);
    res.status(500).json({ success: false, message: 'Error interno del servidor' });
  }
};

// PUT /api/cart - Update cart item quantity
const updateCartItem = async (req, res) => {
  try {
    const { userId, productId, qty } = req.body;
    if (!userId || !productId || qty === undefined) {
      return res.status(400).json({ success: false, message: 'userId, productId, and qty required' });
    }
    
    let cart = await Cart.findOne({ where: { userId } });
    if (!cart) {
      return res.status(404).json({ success: false, message: 'Carrito no encontrado' });
    }
    
    let items = cart.items || [];
    const itemIndex = items.findIndex(item => item.productId === productId);
    
    if (itemIndex >= 0) {
      if (qty <= 0) {
        items.splice(itemIndex, 1);
      } else {
        items[itemIndex].qty = qty;
      }
      await cart.update({ items });
    }
    
    res.json({ success: true, data: { items, totalItems: items.reduce((sum, i) => sum + i.qty, 0) } });
  } catch (error) {
    console.error('Update cart error:', error);
    res.status(500).json({ success: false, message: 'Error interno del servidor' });
  }
};

// DELETE /api/cart - Clear cart
const clearCart = async (req, res) => {
  try {
    const { userId } = req.body;
    if (!userId) {
      return res.status(400).json({ success: false, message: 'userId required' });
    }
    
    let cart = await Cart.findOne({ where: { userId } });
    if (cart) {
      await cart.update({ items: [] });
    }
    
    res.json({ success: true, message: 'Carrito vaciado' });
  } catch (error) {
    console.error('Clear cart error:', error);
    res.status(500).json({ success: false, message: 'Error interno del servidor' });
  }
};

module.exports = { getCart, addToCart, updateCartItem, clearCart };
