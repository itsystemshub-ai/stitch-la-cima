const prisma = require('../models/prismaClient');
const socketUtils = require('../utils/socket'); 

/**
 * Calculate the weighted average cost (costo promedio ponderado) for a product.
 *
 * Formula:
 *   newCost = ((oldStock * oldCost) + (newQuantity * newCost)) / (oldStock + newQuantity)
 *
 * @param {number} oldStock - Current stock quantity before the movement
 * @param {number} oldCost - Current unit cost/price before the movement
 * @param {number} newQuantity - Quantity being added
 * @param {number} newCost - Unit cost of the incoming batch
 * @returns {number} The new weighted average cost rounded to 2 decimals
 */
function calculateWeightedAverageCost(oldStock, oldCost, newQuantity, newCost) {
  const totalStock = oldStock + newQuantity;
  if (totalStock === 0) return 0;

  const weightedCost = ((oldStock * oldCost) + (newQuantity * newCost)) / totalStock;
  return parseFloat(weightedCost.toFixed(2));
}

/**
 * Validate stock movement data before processing.
 *
 * @param {Object} data - Movement data to validate
 * @param {number} data.productId - Product ID (must be a positive integer)
 * @param {number} data.quantity - Quantity (must be a positive integer)
 * @param {number} [data.cost] - Unit cost (must be non-negative, required for IN movements)
 * @returns {{ valid: boolean, message?: string }} Validation result
 */
function validateStockMovement(data) {
  const { productId, quantity, cost } = data;

  if (productId === undefined || productId === null) {
    return { valid: false, message: 'El campo productId es obligatorio' };
  }

  // UUID validation regex
  const isUuid = /^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/i.test(productId);
  if (!isUuid) {
    return { valid: false, message: 'El productId debe ser un UUID válido' };
  }

  if (quantity === undefined || quantity === null) {
    return { valid: false, message: 'El campo quantity es obligatorio' };
  }

  const parsedQuantity = parseInt(quantity);
  if (isNaN(parsedQuantity) || parsedQuantity <= 0) {
    return { valid: false, message: 'La cantidad debe ser un número entero positivo' };
  }

  if (cost !== undefined && cost !== null) {
    const parsedCost = parseFloat(cost);
    if (isNaN(parsedCost) || parsedCost < 0) {
      return { valid: false, message: 'El costo debe ser un número no negativo' };
    }
  }

  return { valid: true };
}

/**
 * Create an inventory log entry in the database.
 *
 * @param {import('@prisma/client').Prisma.TransactionClient} tx - Prisma transaction client
 * @param {Object} data - Log data
 * @param {number} data.productId - Product ID
 * @param {string} data.type - Movement type: 'IN', 'OUT', or 'ADJUST'
 * @param {number} data.quantity - Quantity moved
 * @param {number} data.cost - Unit cost at the time of movement
 * @param {string} [data.reason] - Reason for the movement
 * @param {number} [data.userId] - ID of the user performing the movement
 * @returns {Promise<import('@prisma/client').InventoryLog>}
 */
async function createInventoryLog(tx, data) {
  return tx.inventoryLog.create({
    data: {
      productId: data.productId,
      type: data.type,
      quantity: data.quantity,
      cost: data.cost,
      reason: data.reason || null,
      userId: data.userId || null
    }
  });
}

/**
 * Add stock to a product with weighted average cost calculation
 * @param {string} productId - Product ID
 * @param {number} quantity - Quantity to add
 * @param {number} cost - Unit cost
 * @param {string} reason - Reason for entry
 * @param {string} [userId] - User ID for audit
 */
async function addStock(productId, quantity, cost, reason, userId = null) {
  const product = await prisma.product.findUnique({
    where: { id: productId },
    include: {
      inventoryLogs: {
        where: { type: 'IN' },
        orderBy: { createdAt: 'desc' },
        take: 1
      }
    }
  });

  if (!product) {
    throw new Error('Producto no encontrado');
  }

  const newWeightedCost = calculateWeightedAverageCost(
    product.stock,
    product.inventoryLogs[0]?.cost || product.price,
    quantity,
    cost
  );

  return prisma.$transaction(async (tx) => {
    const updatedProduct = await tx.product.update({
      where: { id: productId },
      data: {
        stock: product.stock + quantity,
        price: newWeightedCost
      }
    });

    const log = await createInventoryLog(tx, {
      productId,
      type: 'IN',
      quantity,
      cost,
      reason: reason || 'Entrada de stock',
      userId
    });

    return { product: updatedProduct, log };
  });
}

/**
 * Remove stock from a product
 * @param {string} productId - Product ID
 * @param {number} quantity - Quantity to remove
 * @param {string} reason - Reason for removal
 * @param {string} [userId] - User ID for audit
 */
async function removeStock(productId, quantity, reason, userId = null) {
  const product = await prisma.product.findUnique({
    where: { id: productId },
    select: { id: true, stock: true, price: true }
  });

  if (!product) {
    throw new Error('Producto no encontrado');
  }

  if (product.stock < quantity) {
    throw new Error(`Stock insuficiente. Disponible: ${product.stock}, solicitado: ${quantity}`);
  }

  return prisma.$transaction(async (tx) => {
    const updatedProduct = await tx.product.update({
      where: { id: productId },
      data: { stock: { decrement: quantity } }
    });

    const log = await createInventoryLog(tx, {
      productId,
      type: 'OUT',
      quantity,
      cost: product.price,
      reason: reason || 'Salida de stock',
      userId
    });

    // Check for low stock alert
    if (updatedProduct.stock <= 10) {
      socketUtils.emit('low_stock_alert', {
        productId: updatedProduct.id,
        name: updatedProduct.name,
        stock: updatedProduct.stock,
        sku: updatedProduct.sku
      });
    }

    return { product: updatedProduct, log };
  });
}

/**
 * Adjust stock to a specific quantity
 * @param {string} productId - Product ID
 * @param {number} newQuantity - Target quantity
 * @param {string} reason - Reason for adjustment
 * @param {string} [userId] - User ID for audit
 */
async function adjustStock(productId, newQuantity, reason, userId = null) {
  const product = await prisma.product.findUnique({
    where: { id: productId },
    select: { id: true, stock: true, price: true }
  });

  if (!product) {
    throw new Error('Producto no encontrado');
  }

  const difference = newQuantity - product.stock;
  if (difference === 0) return { product, log: null };

  return prisma.$transaction(async (tx) => {
    const updatedProduct = await tx.product.update({
      where: { id: productId },
      data: { stock: newQuantity }
    });

    const log = await createInventoryLog(tx, {
      productId,
      type: 'ADJUST',
      quantity: newQuantity,
      cost: product.price,
      reason: reason || `Ajuste de inventario (${difference > 0 ? '+' : ''}${difference} unidades)`,
      userId
    });

    // Check for low stock alert
    if (updatedProduct.stock <= 10) {
      socketUtils.emit('low_stock_alert', {
        productId: updatedProduct.id,
        name: updatedProduct.name,
        stock: updatedProduct.stock,
        sku: updatedProduct.sku
      });
    }

    return { product: updatedProduct, log };
  });
}

/**
 * Generate a full inventory report with summary statistics.
 *
 * @returns {Promise<Object>} Inventory summary data
 */
async function generateInventoryReport() {
  const [
    totalProducts,
    activeProducts,
    totalStock,
    categories,
    brands,
    stockByCategory,
    totalMovements,
    recentMovements
  ] = await Promise.all([
    prisma.product.count(),
    prisma.product.count({ where: { active: true } }),
    prisma.product.aggregate({
      where: { active: true },
      _sum: { stock: true },
      _avg: { price: true },
      _min: { stock: true },
      _max: { stock: true }
    }),
    prisma.product.groupBy({
      by: ['category'],
      where: { active: true, category: { not: null } },
      _count: { id: true }
    }),
    prisma.product.groupBy({
      by: ['brand'],
      where: { active: true, brand: { not: null } },
      _count: { id: true }
    }),
    prisma.product.groupBy({
      by: ['category'],
      where: { active: true, category: { not: null } },
      _sum: { stock: true },
      _avg: { price: true },
      orderBy: { category: 'asc' }
    }),
    prisma.inventoryLog.count(),
    prisma.inventoryLog.findMany({
      orderBy: { createdAt: 'desc' },
      take: 10,
      include: {
        product: {
          select: { name: true, sku: true }
        }
      }
    })
  ]);

  // Calculate total inventory value
  const activeProductsDetailed = await prisma.product.findMany({
    where: { active: true },
    select: {
      stock: true,
      price: true
    }
  });

  const totalInventoryValue = activeProductsDetailed.reduce(
    (sum, p) => sum + p.stock * p.price,
    0
  );

  // Products by stock status
  const outOfStock = await prisma.product.count({
    where: { active: true, stock: 0 }
  });

  const lowStock = await prisma.product.count({
    where: { active: true, stock: { gt: 0, lte: 10 } }
  });

  const healthyStock = activeProducts - outOfStock - lowStock;

  return {
    overview: {
      totalProducts,
      activeProducts,
      totalStock: totalStock._sum.stock || 0,
      totalInventoryValue: parseFloat(totalInventoryValue.toFixed(2)),
      averagePrice: parseFloat((totalStock._avg.price || 0).toFixed(2)),
      minimumStock: totalStock._min.stock || 0,
      maximumStock: totalStock._max.stock || 0
    },
    stockStatus: {
      outOfStock,
      lowStock,
      healthyStock
    },
    categories: {
      count: categories.length,
      breakdown: stockByCategory.map((c) => ({
        category: c.category,
        productCount: c._count.id,
        totalStock: c._sum.stock || 0,
        averagePrice: parseFloat((c._avg.price || 0).toFixed(2))
      }))
    },
    brands: {
      count: brands.length,
      breakdown: brands.map((b) => ({
        brand: b.brand,
        productCount: b._count.id
      }))
    },
    activity: {
      totalMovements,
      recentMovements: recentMovements.map((m) => ({
        id: m.id,
        product: m.product.name,
        sku: m.product.sku,
        type: m.type,
        quantity: m.quantity,
        cost: m.cost,
        reason: m.reason,
        date: m.createdAt
      }))
    },
    generatedAt: new Date().toISOString()
  };
}

module.exports = {
  calculateWeightedAverageCost,
  validateStockMovement,
  createInventoryLog,
  addStock,
  removeStock,
  adjustStock,
  generateInventoryReport
};
