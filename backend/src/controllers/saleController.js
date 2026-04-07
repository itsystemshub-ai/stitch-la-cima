const prisma = require('../models/prismaClient');
const paymentService = require('../services/paymentService');

exports.createSale = async (req, res) => {
  const { items, total, paymentMethod, paymentData } = req.body;
  const userId = req.user?.id;

  try {
    const result = await prisma.$transaction(async (tx) => {
      // 1. Process Payment
      const payment = await paymentService.processPayment(paymentMethod, paymentData);

      // 2. Create Sale
      const sale = await tx.sale.create({
        data: {
          userId,
          total,
          paymentMethod,
          status: 'COMPLETED',
          items: {
            create: items.map(item => ({
              productId: item.productId,
              quantity: item.quantity,
              price: item.price,
            }))
          }
        },
        include: { items: true }
      });

      // 3. Update Inventory & Log
      for (const item of items) {
        await tx.product.update({
          where: { id: item.productId },
          data: { stock: { decrement: item.quantity } }
        });

        await tx.inventoryLog.create({
          data: {
            productId: item.productId,
            type: 'OUT',
            quantity: item.quantity,
            cost: item.price, // Selling price for this log
            reason: `Sale #${sale.id}`
          }
        });
      }

      return sale;
    });

    res.status(201).json({ status: 'success', data: result });
  } catch (error) {
    res.status(400).json({ status: 'error', message: error.message });
  }
};

exports.getSales = async (req, res) => {
  try {
    const sales = await prisma.sale.findMany({
      include: { items: { include: { product: true } } },
      orderBy: { createdAt: 'desc' }
    });
    res.json({ status: 'success', data: sales });
  } catch (error) {
    res.status(400).json({ status: 'error', message: error.message });
  }
};
