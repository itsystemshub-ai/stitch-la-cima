const prisma = require('../models/prismaClient');

/**
 * Validate supplier input data
 * @param {Object} data - The supplier data to validate
 * @returns {{ valid: boolean, errors: string[] }}
 */
function validateSupplierData(data) {
  const errors = [];

  if (!data.name || typeof data.name !== 'string' || data.name.trim().length === 0) {
    errors.push('El nombre del proveedor es requerido');
  }

  if (!data.rif || typeof data.rif !== 'string' || data.rif.trim().length === 0) {
    errors.push('El RIF del proveedor es requerido');
  }

  if (data.rif && data.rif.length > 20) {
    errors.push('El RIF no puede exceder 20 caracteres');
  }

  if (data.email && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(data.email)) {
    errors.push('El email del proveedor no es valido');
  }

  if (data.phone && data.phone.length > 20) {
    errors.push('El telefono no puede exceder 20 caracteres');
  }

  if (data.contact && data.contact.length > 255) {
    errors.push('El contacto no puede exceder 255 caracteres');
  }

  return { valid: errors.length === 0, errors };
}

/**
 * Generate sequential PO number like OC-20260407-0001
 * @param {Date} date - Date for the order
 * @param {Object} tx - Prisma transaction client (optional)
 * @returns {Promise<string>} PO number
 */
async function generatePOrderNumber(date = new Date(), tx = null) {
  const year = date.getFullYear();
  const month = String(date.getMonth() + 1).padStart(2, '0');
  const day = String(date.getDate()).padStart(2, '0');

  const todayStart = new Date(year, date.getMonth(), date.getDate(), 0, 0, 0, 0);
  const todayEnd = new Date(year, date.getMonth(), date.getDate(), 23, 59, 59, 999);

  const client = tx || prisma;

  const count = await client.purchaseOrder.count({
    where: {
      createdAt: {
        gte: todayStart,
        lte: todayEnd
      }
    }
  });

  const sequence = String(count + 1).padStart(4, '0');
  return `OC-${year}${month}${day}-${sequence}`;
}

/**
 * Calculate purchase order total from items
 * @param {Array} items - Array of purchase items
 * @returns {number} Total amount
 */
function calculatePurchaseTotal(items) {
  const total = items.reduce((sum, item) => {
    return sum + (item.unitCost * item.quantity);
  }, 0);
  return Math.round(total * 100) / 100;
}

/**
 * Create a purchase order with items
 * @param {Object} orderData - Order data with supplierId, items, notes, orderDate
 * @param {number} userId - User creating the order
 * @returns {Promise<Object>} Created purchase order with items
 */
async function createPurchaseOrder(orderData, userId) {
  const { supplierId, items, notes, orderDate } = orderData;

  // Validate supplier exists
  const supplier = await prisma.supplier.findUnique({
    where: { id: supplierId }
  });

  if (!supplier) {
    throw new Error('Proveedor no encontrado');
  }

  if (!supplier.active) {
    throw new Error('El proveedor no esta activo');
  }

  // Validate items
  if (!items || !Array.isArray(items) || items.length === 0) {
    throw new Error('La orden de compra debe incluir al menos un item');
  }

  for (const item of items) {
    if (!item.productName || item.productName.trim().length === 0) {
      throw new Error('El nombre del producto es requerido en cada item');
    }
    if (!item.quantity || item.quantity <= 0) {
      throw new Error(`La cantidad debe ser mayor a 0 para "${item.productName}"`);
    }
    if (item.unitCost === undefined || item.unitCost === null || item.unitCost < 0) {
      throw new Error(`El costo unitario es requerido y debe ser >= 0 para "${item.productName}"`);
    }
  }

  // Calculate total
  const total = calculatePurchaseTotal(items);

  // Generate PO number
  const number = await generatePOrderNumber();

  return await prisma.$transaction(async (tx) => {
    const po = await tx.purchaseOrder.create({
      data: {
        number,
        supplierId,
        total,
        status: 'PENDING',
        orderDate: orderDate ? new Date(orderDate) : new Date(),
        notes: notes || null,
        items: {
          create: items.map(item => ({
            productName: item.productName.trim(),
            sku: item.sku || null,
            productId: item.productId || null,
            quantity: parseInt(item.quantity),
            unitCost: parseFloat(item.unitCost),
            total: Math.round(item.unitCost * item.quantity * 100) / 100,
            received: 0
          }))
        }
      },
      include: {
        items: true,
        supplier: {
          select: { id: true, name: true, rif: true, email: true, phone: true }
        }
      }
    });

    return po;
  });
}

/**
 * Update inventory stock from a received purchase order
 * @param {number} purchaseOrderId - The purchase order ID
 * @param {Object} tx - Prisma transaction client
 * @returns {Promise<void>}
 */
async function updateInventoryFromPO(purchaseOrderId, tx) {
  const items = await tx.purchaseItem.findMany({
    where: { purchaseOrderId }
  });

  for (const item of items) {
    // If the item has a productId linked, update its stock
    if (item.productId) {
      await tx.product.update({
        where: { id: item.productId },
        data: { stock: { increment: item.quantity } }
      });

      // Log the inventory addition
      await tx.inventoryLog.create({
        data: {
          productId: item.productId,
          type: 'IN',
          quantity: item.quantity,
          cost: item.unitCost,
          reason: `Recepcion de orden de compra ${item.purchaseOrder?.number || '#' + purchaseOrderId} - Proveedor`
        }
      });
    }

    // Mark item as fully received
    await tx.purchaseItem.update({
      where: { id: item.id },
      data: { received: item.quantity }
    });
  }
}

/**
 * Approve a purchase order (changes status from PENDING to APPROVED)
 * @param {number} poId - Purchase order ID
 * @returns {Promise<Object>} Updated purchase order
 */
async function approvePurchaseOrder(poId) {
  const po = await prisma.purchaseOrder.findUnique({
    where: { id: poId },
    include: { items: true }
  });

  if (!po) {
    throw new Error('Orden de compra no encontrada');
  }

  if (po.status !== 'PENDING') {
    throw new Error(`Solo se pueden aprobar ordenes pendientes. Estado actual: ${po.status}`);
  }

  return await prisma.purchaseOrder.update({
    where: { id: poId },
    data: { status: 'APPROVED' },
    include: {
      items: true,
      supplier: {
        select: { id: true, name: true, rif: true }
      }
    }
  });
}

/**
 * Receive a purchase order, add stock to inventory, and update status
 * @param {number} poId - Purchase order ID
 * @param {Object} receiveData - Optional receive data (partialReceive: boolean, receivedItems: Array)
 * @returns {Promise<Object>} Updated purchase order
 */
async function receivePurchaseOrder(poId, receiveData = {}) {
  const po = await prisma.purchaseOrder.findUnique({
    where: { id: poId },
    include: { items: true }
  });

  if (!po) {
    throw new Error('Orden de compra no encontrada');
  }

  if (po.status === 'RECEIVED') {
    throw new Error('La orden de compra ya fue recibida');
  }

  if (po.status === 'CANCELLED') {
    throw new Error('No se puede recibir una orden cancelada');
  }

  const { partialReceive = false, receivedItems = null } = receiveData;

  return await prisma.$transaction(async (tx) => {
    if (partialReceive && receivedItems && Array.isArray(receivedItems) && receivedItems.length > 0) {
      // Partial receive: update only specified items
      for (const ri of receivedItems) {
        const poItem = po.items.find(i => i.id === ri.itemId);
        if (!poItem) {
          throw new Error(`Item con ID ${ri.itemId} no encontrado en la orden`);
        }

        const qtyToReceive = Math.min(ri.quantity, poItem.quantity - poItem.received);
        if (qtyToReceive <= 0) {
          throw new Error(`El item "${poItem.productName}" ya fue recibido completamente`);
        }

        // If productId is linked, update inventory
        if (poItem.productId && qtyToReceive > 0) {
          await tx.product.update({
            where: { id: poItem.productId },
            data: { stock: { increment: qtyToReceive } }
          });

          await tx.inventoryLog.create({
            data: {
              productId: poItem.productId,
              type: 'IN',
              quantity: qtyToReceive,
              cost: poItem.unitCost,
              reason: `Recepcion parcial de orden ${po.number} - Item: ${poItem.productName}`
            }
          });
        }

        await tx.purchaseItem.update({
          where: { id: poItem.id },
          data: { received: poItem.received + qtyToReceive }
        });
      }

      // Check if all items are fully received
      const updatedItems = await tx.purchaseItem.findMany({
        where: { purchaseOrderId: poId }
      });

      const allFullyReceived = updatedItems.every(i => i.received >= i.quantity);

      const updatedPO = await tx.purchaseOrder.update({
        where: { id: poId },
        data: {
          status: allFullyReceived ? 'RECEIVED' : 'APPROVED',
          receivedAt: allFullyReceived ? new Date() : undefined
        },
        include: {
          items: true,
          supplier: {
            select: { id: true, name: true, rif: true }
          }
        }
      });

      return updatedPO;
    } else {
      // Full receive: receive all remaining items
      for (const item of po.items) {
        const qtyToReceive = item.quantity - item.received;
        if (qtyToReceive <= 0) continue;

        if (item.productId) {
          await tx.product.update({
            where: { id: item.productId },
            data: { stock: { increment: qtyToReceive } }
          });

          await tx.inventoryLog.create({
            data: {
              productId: item.productId,
              type: 'IN',
              quantity: qtyToReceive,
              cost: item.unitCost,
              reason: `Recepcion de orden de compra ${po.number}`
            }
          });
        }

        await tx.purchaseItem.update({
          where: { id: item.id },
          data: { received: item.quantity }
        });
      }

      const updatedPO = await tx.purchaseOrder.update({
        where: { id: poId },
        data: {
          status: 'RECEIVED',
          receivedAt: new Date()
        },
        include: {
          items: true,
          supplier: {
            select: { id: true, name: true, rif: true }
          }
        }
      });

      return updatedPO;
    }
  });
}

/**
 * Cancel a purchase order
 * @param {number} poId - Purchase order ID
 * @param {string} reason - Cancellation reason
 * @returns {Promise<Object>} Updated purchase order
 */
async function cancelPurchaseOrder(poId, reason) {
  const po = await prisma.purchaseOrder.findUnique({
    where: { id: poId },
    include: { items: true }
  });

  if (!po) {
    throw new Error('Orden de compra no encontrada');
  }

  if (po.status === 'CANCELLED') {
    throw new Error('La orden de compra ya esta cancelada');
  }

  if (po.status === 'RECEIVED') {
    throw new Error('No se puede cancelar una orden ya recibida');
  }

  return await prisma.purchaseOrder.update({
    where: { id: poId },
    data: { status: 'CANCELLED' },
    include: {
      items: true,
      supplier: {
        select: { id: true, name: true, rif: true }
      }
    }
  });
}

module.exports = {
  validateSupplierData,
  generatePOrderNumber,
  calculatePurchaseTotal,
  createPurchaseOrder,
  updateInventoryFromPO,
  approvePurchaseOrder,
  receivePurchaseOrder,
  cancelPurchaseOrder
};
