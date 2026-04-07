const prisma = require('../models/prismaClient');

/**
 * Hybrid Payment Service
 * Dispatches to the correct payment logic based on method
 */
exports.processPayment = async (method, data) => {
  console.log(`Processing payment for method: ${method}`);
  
  switch (method) {
    case 'PAGO_MOVIL':
    case 'C2P':
    case 'TRANSFERENCIA_BS':
      return { status: 'success', reference: data.reference, gateway: 'Local' };
    
    case 'STRIPE':
    case 'PAYPAL':
      // Implementation placeholder for external SDKs
      return { status: 'success', id: 'ext_' + Date.now(), gateway: 'International' };
    
    case 'BINANCE':
      return { status: 'success', address: data.address, gateway: 'Crypto' };
    
    default:
      throw new Error('Unsupported payment method');
  }
};
