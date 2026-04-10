let io;

/**
 * Initialize Socket.io instance
 * @param {import('socket.io').Server} socketInstance 
 */
function init(socketInstance) {
  io = socketInstance;
  return io;
}

/**
 * Get the initialized Socket.io instance
 * @returns {import('socket.io').Server}
 */
function getIO() {
  return io;
}

/**
 * Helper to emit events safely even if io is not initialized
 * @param {string} event 
 * @param {any} data 
 */
function emit(event, data) {
  if (io) {
    io.emit(event, data);
  }
}

/**
 * Emit a low stock alert
 * @param {Object} product - Product details
 */
function emitStockAlert(product) {
  emit('LOW_STOCK_ALERT', {
    productId: product.id,
    name: product.name,
    stock: product.stock,
    threshold: 10,
    timestamp: new Date()
  });
}

/**
 * Emit a security/audit notification to connected admins
 * @param {Object} log - Audit log entry
 */
function emitSecurityAlert(log) {
  emit('SECURITY_AUDIT', {
    action: log.action,
    userId: log.userId,
    timestamp: new Date()
  });
}

module.exports = {
  init,
  getIO,
  emit,
  emitStockAlert,
  emitSecurityAlert
};
