const prisma = require('../models/prismaClient');

/**
 * Weighted Average Cost Calculation
 * New Cost = ((Old Stock * Old Cost) + (New Stock * New Cost)) / (Total Stock)
 */
exports.addStock = async (req, res) => {
  try {
    const { productId, quantity, cost, reason } = req.body;
    
    // 1. Get current product state
    const product = await prisma.product.findUnique({
      where: { id: productId },
      include: { inventoryLogs: { orderBy: { createdAt: 'desc' }, take: 1 } }
    });

    if (!product) return res.status(404).json({ status: 'error', message: 'Product not found' });

    // 2. Calculate New Weighted Average Cost
    const oldStock = product.stock;
    const oldCost = product.inventoryLogs[0]?.cost || product.price; // Fallback to current price
    
    const newStock = oldStock + quantity;
    const newWeightedCost = ((oldStock * oldCost) + (quantity * cost)) / newStock;

    // 3. Update Product and Log Transaction
    const updatedProduct = await prisma.$transaction([
      prisma.product.update({
        where: { id: productId },
        data: { 
          stock: newStock,
          price: newWeightedCost // Update price to reflect weighted cost
        }
      }),
      prisma.inventoryLog.create({
        data: {
          productId,
          type: 'IN',
          quantity,
          cost, // Unit cost of this batch
          reason
        }
      })
    ]);

    res.json({ 
      status: 'success', 
      data: { 
        previousStock: oldStock, 
        currentStock: newStock, 
        newAverageCost: newWeightedCost.toFixed(2) 
      } 
    });
  } catch (error) {
    res.status(400).json({ status: 'error', message: error.message });
  }
};

exports.getKardex = async (req, res) => {
  try {
    const logs = await prisma.inventoryLog.findMany({
      where: { productId: parseInt(req.params.id) },
      orderBy: { createdAt: 'desc' }
    });
    res.json({ status: 'success', data: logs });
  } catch (error) {
    res.status(400).json({ status: 'error', message: error.message });
  }
};
