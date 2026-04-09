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

module.exports = {
  init,
  getIO,
  emit
};
