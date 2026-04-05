/**
 * Cart Service - La Cima Zenith ERP
 * Centralized cart management synced with backend API
 */

const CART_STORAGE_KEY = 'zenith_cart';

// Get cart from API or localStorage fallback
async function getCart() {
  const user = api.getCurrentUser();
  
  if (user && api.isLoggedIn()) {
    try {
      const response = await api.get('/cart');
      return response.data?.items || response.data || [];
    } catch (error) {
      console.warn('Cart API unavailable, using local fallback');
    }
  }

  // Local fallback
  try {
    return JSON.parse(localStorage.getItem(CART_STORAGE_KEY) || '[]');
  } catch {
    return [];
  }
}

// Add item to cart
async function addToCart(product) {
  const cart = await getCart();
  
  // Check if item already exists
  const existingIndex = cart.findIndex(item => item.id === product.id);
  
  if (existingIndex >= 0) {
    cart[existingIndex].qty += product.qty || 1;
  } else {
    cart.push({
      id: product.id,
      sku: product.sku,
      name: product.name,
      price: product.price,
      qty: product.qty || 1,
      image: product.image || '',
      addedAt: new Date().toISOString(),
    });
  }

  // Save
  await _saveCart(cart);
  updateCartBadge();
  showToast(`${product.name} agregado al carrito`, 'success');
  return cart;
}

// Remove item from cart
async function removeFromCart(productId) {
  let cart = await getCart();
  cart = cart.filter(item => item.id !== productId);
  await _saveCart(cart);
  updateCartBadge();
  return cart;
}

// Update item quantity
async function updateQuantity(productId, newQty) {
  const cart = await getCart();
  const item = cart.find(i => i.id === productId);
  
  if (item) {
    if (newQty <= 0) {
      return removeFromCart(productId);
    }
    item.qty = newQty;
    await _saveCart(cart);
    updateCartBadge();
  }
  
  return cart;
}

// Increment/decrement quantity
async function changeQuantity(productId, delta) {
  const cart = await getCart();
  const item = cart.find(i => i.id === productId);
  
  if (item) {
    const newQty = item.qty + delta;
    return updateQuantity(productId, newQty);
  }
  
  return cart;
}

// Clear entire cart
async function clearCart() {
  await _saveCart([]);
  updateCartBadge();
  return [];
}

// Get cart total
async function getCartTotal() {
  const cart = await getCart();
  return cart.reduce((total, item) => total + (item.price * item.qty), 0);
}

// Get cart item count
async function getCartCount() {
  const cart = await getCart();
  return cart.reduce((count, item) => count + item.qty, 0);
}

// Save cart (API or localStorage)
async function _saveCart(cart) {
  localStorage.setItem(CART_STORAGE_KEY, JSON.stringify(cart));

  const user = api.getCurrentUser();
  if (user && api.isLoggedIn()) {
    try {
      await api.post('/cart', { userId: user.id, items: cart });
    } catch (error) {
      // Silently fail - localStorage is enough for now
    }
  }
}

// Update cart badge in navbar
function updateCartBadge() {
  getCartCount().then(count => {
    // Update all cart badges on page
    const badges = document.querySelectorAll('[data-cart-badge]');
    badges.forEach(badge => {
      badge.textContent = count;
      badge.style.display = count > 0 ? 'flex' : 'none';
    });

    // Also update elements with cart-count class
    const countEls = document.querySelectorAll('.cart-count');
    countEls.forEach(el => {
      el.textContent = count;
      el.style.display = count > 0 ? 'inline' : 'none';
    });
  });
}

// Initialize cart badge on page load
document.addEventListener('DOMContentLoaded', function() {
  updateCartBadge();
});

// Expose to global scope for inline onclick handlers
window.cartService = {
  getCart,
  addToCart,
  removeFromCart,
  updateQuantity,
  changeQuantity,
  clearCart,
  getCartTotal,
  getCartCount,
  updateCartBadge,
};
