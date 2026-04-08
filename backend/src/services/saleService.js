const prisma = require('../models/prismaClient');

/**
 * VAT rate for Venezuela (16%)
 */
const VAT_RATE = 0.16;

/**
 * Validate sale input data
 * @param {Object} saleData - The sale data to validate
 * @returns {{ valid: boolean, errors: string[] }}
 */
function validateSaleData(saleData) {
  const errors = [];

  if (!saleData.items || !Array.isArray(saleData.items) || saleData.items.length === 0) {
    errors.push('La venta debe incluir al menos un producto');
  }

  if (!saleData.paymentMethod) {
    errors.push('El metodo de pago es requerido');
  }

  const validPaymentMethods = ['PAGO_MOVIL', 'C2P', 'TRANSFERENCIA_BS', 'STRIPE', 'PAYPAL', 'BINANCE', 'CASH', 'CARD'];
  if (saleData.paymentMethod && !validPaymentMethods.includes(saleData.paymentMethod)) {
    errors.push(`Metodo de pago invalido. Metodos aceptados: ${validPaymentMethods.join(', ')}`);
  }

  if (saleData.items) {
    saleData.items.forEach((item, index) => {
      if (!item.productId) {
        errors.push(`El producto es requerido en el item ${index + 1}`);
      }
      if (!item.quantity || item.quantity <= 0) {
        errors.push(`La cantidad debe ser mayor a 0 en el item ${index + 1}`);
      }
      if (!item.price || item.price <= 0) {
        errors.push(`El precio debe ser mayor a 0 en el item ${index + 1}`);
      }
    });
  }

  return { valid: errors.length === 0, errors };
}

/**
 * Calculate sale total from items including tax
 * @param {Array} items - Array of sale items
 * @param {Object} options - Discount and tax options
 * @returns {{ subtotal: number, tax: number, discount: number, total: number }}
 */
function calculateSaleTotal(items, options = {}) {
  const subtotal = items.reduce((sum, item) => {
    return sum + (item.price * item.quantity);
  }, 0);

  const discountPercent = options.discountPercent || 0;
  const discount = subtotal * (discountPercent / 100);
  const subtotalAfterDiscount = subtotal - discount;

  const applyTax = options.applyTax !== false;
  const taxRate = options.taxRate || VAT_RATE;
  const tax = applyTax ? subtotalAfterDiscount * taxRate : 0;

  const total = subtotalAfterDiscount + tax;

  return {
    subtotal,
    tax: Math.round(tax * 100) / 100,
    discount: Math.round(discount * 100) / 100,
    total: Math.round(total * 100) / 100
  };
}

/**
 * Apply discount to a sale
 * @param {number} subtotal - The sale subtotal
 * @param {number} discountPercent - Discount percentage (0-100)
 * @returns {number} Discount amount
 */
function applyDiscount(subtotal, discountPercent) {
  if (discountPercent < 0 || discountPercent > 100) {
    throw new Error('El descuento debe estar entre 0 y 100');
  }
  return Math.round((subtotal * (discountPercent / 100)) * 100) / 100;
}

/**
 * Calculate VAT/IVA tax
 * @param {number} amount - The amount to calculate tax on
 * @param {number} rate - Tax rate (default 0.16 for Venezuela)
 * @returns {number} Tax amount
 */
function calculateTax(amount, rate = VAT_RATE) {
  return Math.round((amount * rate) * 100) / 100;
}

/**
 * Generate sequential invoice number
 * @param {Date} date - Date for the invoice
 * @returns {Promise<string>} Invoice number like FAC-20260407-0001
 */
async function generateInvoiceNumber(date = new Date()) {
  const year = date.getFullYear();
  const month = String(date.getMonth() + 1).padStart(2, '0');
  const day = String(date.getDate()).padStart(2, '0');

  const todayStart = new Date(year, date.getMonth(), date.getDate(), 0, 0, 0, 0);
  const todayEnd = new Date(year, date.getMonth(), date.getDate(), 23, 59, 59, 999);

  const count = await prisma.sale.count({
    where: {
      createdAt: {
        gte: todayStart,
        lte: todayEnd
      }
    }
  });

  const sequence = String(count + 1).padStart(4, '0');
  return `FAC-${year}${month}${day}-${sequence}`;
}

/**
 * Process payment based on method
 * @param {string} method - Payment method
 * @param {Object} data - Payment data
 * @returns {Object} Payment result
 */
function processPayment(method, data = {}) {
  switch (method) {
    case 'PAGO_MOVIL':
    case 'C2P':
    case 'TRANSFERENCIA_BS':
      return {
        status: 'success',
        reference: data.reference || `REF-${Date.now()}`,
        gateway: 'Local',
        method
      };

    case 'STRIPE':
      return {
        status: 'success',
        id: data.stripeId || `stripe_${Date.now()}`,
        gateway: 'Stripe',
        method
      };

    case 'PAYPAL':
      return {
        status: 'success',
        id: data.paypalId || `paypal_${Date.now()}`,
        gateway: 'PayPal',
        method
      };

    case 'BINANCE':
      return {
        status: 'success',
        address: data.address || '',
        gateway: 'Crypto',
        method
      };

    case 'CASH':
      return {
        status: 'success',
        reference: `CASH-${Date.now()}`,
        gateway: 'Efectivo',
        method
      };

    case 'CARD':
      return {
        status: 'success',
        reference: data.cardLast4 ? `CARD-****${data.cardLast4}` : `CARD-${Date.now()}`,
        gateway: 'Tarjeta',
        method
      };

    default:
      throw new Error(`Metodo de pago no soportado: ${method}`);
  }
}

/**
 * Restore inventory when a sale is cancelled
 * @param {number} saleId - The sale ID to restore
 * @param {Object} tx - Prisma transaction client
 * @returns {Promise<void>}
 */
async function restoreInventory(saleId, tx) {
  const items = await tx.saleItem.findMany({
    where: { saleId }
  });

  for (const item of items) {
    await tx.product.update({
      where: { id: item.productId },
      data: { stock: { increment: item.quantity } }
    });

    await tx.inventoryLog.create({
      data: {
        productId: item.productId,
        type: 'IN',
        quantity: item.quantity,
        cost: item.price,
        reason: `Devolucion por cancelacion de venta #${saleId}`
      }
    });
  }
}

/**
 * Generate a credit note for a sale
 * @param {number} saleId - The sale ID
 * @param {string} reason - Reason for the credit note
 * @param {number} userId - User creating the credit note
 * @returns {Promise<Object>} Created credit note
 */
async function generateCreditNote(saleId, reason, userId) {
  const sale = await prisma.sale.findUnique({
    where: { id: saleId },
    include: { items: true }
  });

  if (!sale) {
    throw new Error('Venta no encontrada');
  }

  if (sale.status === 'CANCELLED') {
    throw new Error('No se puede generar nota de credito para una venta cancelada');
  }

  const creditNoteNumber = await (async () => {
    const count = await prisma.creditNote.count();
    return `NC-${String(count + 1).padStart(6, '0')}`;
  })();

  const creditNote = await prisma.creditNote.create({
    data: {
      creditNoteNumber,
      saleId,
      userId,
      amount: sale.total,
      reason,
      status: 'ISSUED'
    }
  });

  return creditNote;
}

/**
 * Main sale processing function with inventory check
 * @param {Object} saleData - Sale data with items, paymentMethod, etc.
 * @param {number} userId - User creating the sale
 * @returns {Promise<Object>} Created sale with items
 */
async function processSale(saleData, userId) {
  const validation = validateSaleData(saleData);
  if (!validation.valid) {
    throw new Error(validation.errors.join('. '));
  }

  const { items, paymentMethod, discountPercent = 0, paymentDetails = {} } = saleData;

  // Check inventory availability
  for (const item of items) {
    const product = await prisma.product.findUnique({
      where: { id: item.productId }
    });

    if (!product) {
      throw new Error(`Producto con ID ${item.productId} no encontrado`);
    }

    if (!product.active) {
      throw new Error(`Producto "${product.name}" no esta activo`);
    }

    if (product.stock < item.quantity) {
      throw new Error(`Stock insuficiente para "${product.name}". Disponible: ${product.stock}, Solicitado: ${item.quantity}`);
    }
  }

  // Calculate totals
  const totals = calculateSaleTotal(items, { discountPercent });

  return await prisma.$transaction(async (tx) => {
    // Generate invoice number
    const invoiceNumber = await generateInvoiceNumber();

    // Process payment
    const paymentResult = processPayment(paymentMethod, paymentDetails);

    // Create sale
    const sale = await tx.sale.create({
      data: {
        userId,
        total: totals.total,
        status: 'COMPLETED',
        paymentMethod,
        invoiceNumber,
        subtotal: totals.subtotal,
        tax: totals.tax,
        discount: totals.discount,
        paymentReference: paymentResult.reference || paymentResult.id,
        items: {
          create: items.map(item => ({
            productId: item.productId,
            quantity: item.quantity,
            price: item.price
          }))
        }
      },
      include: {
        items: {
          include: { product: true }
        },
        user: {
          select: { id: true, name: true, email: true }
        }
      }
    });

    // Decrement inventory and log
    for (const item of items) {
      await tx.product.update({
        where: { id: item.productId },
        data: { stock: { decrement: item.quantity } }
      });

      const product = await tx.product.findUnique({
        where: { id: item.productId }
      });

      await tx.inventoryLog.create({
        data: {
          productId: item.productId,
          type: 'OUT',
          quantity: item.quantity,
          cost: item.price,
          reason: `Venta #${sale.id} - Factura ${invoiceNumber}`
        }
      });
    }

    return sale;
  });
}

module.exports = {
  processSale,
  calculateSaleTotal,
  applyDiscount,
  calculateTax,
  generateInvoiceNumber,
  processPayment,
  restoreInventory,
  validateSaleData,
  generateCreditNote,
  VAT_RATE
};
