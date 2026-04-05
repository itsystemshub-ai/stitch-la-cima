/**
 * Order Service - La Cima Zenith ERP
 * Manages order creation and tracking via API
 */

// Create order from cart
async function createOrder(orderData) {
  try {
    const response = await api.post('/orders', orderData);
    return { success: true, order: response.data };
  } catch (error) {
    return { success: false, message: error.message };
  }
}

// Get order by ID
async function getOrderById(id) {
  try {
    const response = await api.get(`/orders/${id}`);
    return response.data;
  } catch (error) {
    console.error('Error fetching order:', error);
    return null;
  }
}

// Get user orders
async function getUserOrders() {
  try {
    const response = await api.get('/orders');
    return response.data?.orders || response.data || [];
  } catch (error) {
    console.error('Error fetching orders:', error);
    return [];
  }
}

// Get order by order number
async function getOrderByNumber(orderNumber) {
  try {
    const response = await api.get(`/orders?orderNumber=${orderNumber}`);
    const orders = response.data?.orders || response.data || [];
    return orders[0] || null;
  } catch (error) {
    console.error('Error fetching order:', error);
    return null;
  }
}

// Update order status (admin only)
async function updateOrderStatus(orderId, status, trackingNumber = null) {
  try {
    const response = await api.patch(`/orders/${orderId}/status`, {
      status,
      trackingNumber,
    });
    return { success: true, order: response.data };
  } catch (error) {
    return { success: false, message: error.message };
  }
}

// Generate order summary from cart
async function generateOrderSummary() {
  const cart = await window.cartService?.getCart() || [];
  const subtotal = cart.reduce((sum, item) => sum + (item.price * item.qty), 0);
  const tax = subtotal * 0.16; // IVA 16%
  const shippingCost = subtotal > 500 ? 0 : 25; // Free shipping over $500
  const total = subtotal + tax + shippingCost;

  return {
    items: cart.map(item => ({
      productId: item.id,
      name: item.name,
      sku: item.sku,
      qty: item.qty,
      price: item.price,
      subtotal: item.price * item.qty,
    })),
    subtotal,
    tax,
    shippingCost,
    total,
    itemCount: cart.reduce((sum, item) => sum + item.qty, 0),
  };
}

// Format order number for display
function formatOrderNumber(orderNumber) {
  if (!orderNumber) return 'N/A';
  return orderNumber;
}

// Get status badge config
function getStatusBadgeConfig(status) {
  const config = {
    pending: { label: 'Pendiente', color: 'bg-yellow-100 text-yellow-800' },
    confirmed: { label: 'Confirmada', color: 'bg-blue-100 text-blue-800' },
    processing: { label: 'Procesando', color: 'bg-purple-100 text-purple-800' },
    shipped: { label: 'Despachada', color: 'bg-indigo-100 text-indigo-800' },
    in_transit: { label: 'En tránsito', color: 'bg-cyan-100 text-cyan-800' },
    delivered: { label: 'Entregada', color: 'bg-green-100 text-green-800' },
    cancelled: { label: 'Cancelada', color: 'bg-red-100 text-red-800' },
    refunded: { label: 'Reembolsada', color: 'bg-stone-100 text-stone-800' },
  };
  return config[status] || { label: status, color: 'bg-stone-100 text-stone-800' };
}

// Export
window.orderService = {
  createOrder,
  getOrderById,
  getUserOrders,
  getOrderByNumber,
  updateOrderStatus,
  generateOrderSummary,
  formatOrderNumber,
  getStatusBadgeConfig,
};
