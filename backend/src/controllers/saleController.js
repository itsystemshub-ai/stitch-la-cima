const prisma = require('../models/prismaClient');
const saleService = require('../services/saleService');

/**
 * POST /api/sales
 * Create a new sale with items, decrement inventory, process payment
 */
exports.createSale = async (req, res) => {
  try {
    const userId = req.user?.id;
    const saleData = req.body;

    const sale = await saleService.processSale(saleData, userId);

    res.status(201).json({ status: 'success', data: sale });
  } catch (error) {
    const statusCode = error.message.includes('Stock') || error.message.includes('no encontrado') || error.message.includes('valid') ? 400 : 500;
    res.status(statusCode).json({ status: 'error', message: error.message });
  }
};

/**
 * GET /api/sales
 * Get all sales with filters (date range, status, payment method, pagination)
 */
exports.getSales = async (req, res) => {
  try {
    const {
      page = 1,
      limit = 20,
      status,
      paymentMethod,
      startDate,
      endDate,
      search,
      userId
    } = req.query;

    const where = {};

    if (status) {
      where.status = status;
    }

    if (paymentMethod) {
      where.paymentMethod = paymentMethod;
    }

    if (userId) {
      where.userId = userId;
    }

    if (startDate || endDate) {
      where.createdAt = {};
      if (startDate) {
        where.createdAt.gte = new Date(startDate);
      }
      if (endDate) {
        where.createdAt.lte = new Date(endDate);
      }
    }

    if (search) {
      // Búsqueda simplificada: si parece un UUID completo, buscamos por ID, si no, por factura o referencia
      const isUuid = /^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/i.test(search);
      where.OR = [
        { invoiceNumber: { contains: search, mode: 'insensitive' } },
        ...(isUuid ? [{ id: search }] : []),
        { paymentReference: { contains: search, mode: 'insensitive' } }
      ];
    }

    const pageNum = Math.max(1, parseInt(page));
    const limitNum = Math.min(100, Math.max(1, parseInt(limit)));
    const skip = (pageNum - 1) * limitNum;

    const [sales, total] = await Promise.all([
      prisma.sale.findMany({
        where,
        include: {
          items: {
            include: { product: { select: { id: true, name: true, sku: true } } }
          },
          user: { select: { id: true, name: true, email: true } }
        },
        orderBy: { createdAt: 'desc' },
        skip,
        take: limitNum
      }),
      prisma.sale.count({ where })
    ]);

    res.json({
      status: 'success',
      data: {
        sales,
        pagination: {
          total,
          page: pageNum,
          limit: limitNum,
          totalPages: Math.ceil(total / limitNum)
        }
      }
    });
  } catch (error) {
    res.status(500).json({ status: 'error', message: error.message });
  }
};

/**
 * GET /api/sales/:id
 * Get single sale with items
 */
exports.getSaleById = async (req, res) => {
  try {
    const { id } = req.params;

    const sale = await prisma.sale.findUnique({
      where: { id },
      include: {
        items: {
          include: { product: { select: { id: true, name: true, sku: true, price: true } } }
        },
        user: { select: { id: true, name: true, email: true } },
        creditNotes: true
      }
    });

    if (!sale) {
      return res.status(404).json({ status: 'error', message: 'Venta no encontrada' });
    }

    res.json({ status: 'success', data: sale });
  } catch (error) {
    res.status(500).json({ status: 'error', message: error.message });
  }
};

/**
 * POST /api/sales/:id/cancel
 * Cancel sale and restore inventory (ADMIN, MANAGER only)
 */
exports.cancelSale = async (req, res) => {
  try {
    const { id } = req.params;
    const { reason } = req.body;

    const updatedSale = await saleService.cancelSale(id, reason, req.user?.id);

    res.json({ status: 'success', data: updatedSale, message: 'Venta cancelada exitosamente' });
  } catch (error) {
    res.status(500).json({ status: 'error', message: error.message });
  }
};

/**
 * GET /api/sales/summary
 * Get sales summary (total sales, revenue, avg ticket, top products)
 */
exports.getSalesSummary = async (req, res) => {
  try {
    const { startDate, endDate } = req.query;

    const dateFilter = {};
    if (startDate || endDate) {
      if (startDate) dateFilter.gte = new Date(startDate);
      if (endDate) dateFilter.lte = new Date(endDate);
    }

    const where = { status: 'COMPLETED' };
    if (Object.keys(dateFilter).length > 0) {
      where.createdAt = dateFilter;
    }

    const [
      totalSales,
      revenueData,
      avgTicketData,
      paymentMethodBreakdown
    ] = await Promise.all([
      prisma.sale.count({ where }),
      prisma.sale.aggregate({
        where,
        _sum: { total: true }
      }),
      prisma.sale.aggregate({
        where,
        _avg: { total: true }
      }),
      prisma.sale.groupBy({
        by: ['paymentMethod'],
        where,
        _count: { id: true },
        _sum: { total: true }
      })
    ]);

    // Top products
    const topProducts = await prisma.saleItem.groupBy({
      by: ['productId'],
      where: {
        sale: {
          status: 'COMPLETED',
          createdAt: dateFilter
        }
      },
      _sum: { quantity: true, price: true },
      _count: { id: true },
      orderBy: { _sum: { quantity: 'desc' } },
      take: 10
    });

    const topProductsWithNames = await Promise.all(
      topProducts.map(async (item) => {
        const product = await prisma.product.findUnique({
          where: { id: item.productId },
          select: { id: true, name: true, sku: true, category: true }
        });
        return {
          productId: item.productId,
          product: product,
          quantitySold: item._sum.quantity,
          revenue: item._sum.price,
          timesSold: item._count.id
        };
      })
    );

    res.json({
      status: 'success',
      data: {
        totalSales,
        revenue: revenueData._sum.total || 0,
        avgTicket: avgTicketData._avg.total || 0,
        topProducts: topProductsWithNames,
        paymentMethodBreakdown: paymentMethodBreakdown.map(pm => ({
          method: pm.paymentMethod,
          count: pm._count.id,
          total: pm._sum.total || 0
        }))
      }
    });
  } catch (error) {
    res.status(500).json({ status: 'error', message: error.message });
  }
};

/**
 * GET /api/sales/by-date
 * Get sales grouped by date for charts
 */
exports.getSalesByDate = async (req, res) => {
  try {
    const { startDate, endDate, groupBy = 'day' } = req.query;

    const dateFilter = {};
    if (startDate) dateFilter.gte = new Date(startDate);
    if (endDate) dateFilter.lte = new Date(endDate);

    const where = { status: 'COMPLETED' };
    if (Object.keys(dateFilter).length > 0) {
      where.createdAt = dateFilter;
    }

    const sales = await prisma.sale.findMany({
      where,
      select: {
        createdAt: true,
        total: true,
        paymentMethod: true
      },
      orderBy: { createdAt: 'asc' }
    });

    // Group by date
    const grouped = {};
    sales.forEach(sale => {
      let key;
      const date = new Date(sale.createdAt);

      if (groupBy === 'month') {
        key = `${date.getFullYear()}-${String(date.getMonth() + 1).padStart(2, '0')}`;
      } else if (groupBy === 'week') {
        const weekStart = new Date(date);
        weekStart.setDate(date.getDate() - date.getDay());
        key = weekStart.toISOString().split('T')[0];
      } else {
        key = date.toISOString().split('T')[0];
      }

      if (!grouped[key]) {
        grouped[key] = { date: key, totalSales: 0, totalRevenue: 0, count: 0, byPaymentMethod: {} };
      }

      grouped[key].totalSales++;
      grouped[key].totalRevenue += sale.total;
      grouped[key].count++;

      if (!grouped[key].byPaymentMethod[sale.paymentMethod]) {
        grouped[key].byPaymentMethod[sale.paymentMethod] = { count: 0, total: 0 };
      }
      grouped[key].byPaymentMethod[sale.paymentMethod].count++;
      grouped[key].byPaymentMethod[sale.paymentMethod].total += sale.total;
    });

    const result = Object.values(grouped).map(g => ({
      ...g,
      totalRevenue: Math.round(g.totalRevenue * 100) / 100
    }));

    res.json({ status: 'success', data: result });
  } catch (error) {
    res.status(500).json({ status: 'error', message: error.message });
  }
};

/**
 * GET /api/sales/top-products
 * Get top selling products
 */
exports.getTopProducts = async (req, res) => {
  try {
    const { limit = 10, startDate, endDate } = req.query;
    const limitNum = Math.min(50, Math.max(1, parseInt(limit)));

    const dateFilter = {};
    if (startDate) dateFilter.gte = new Date(startDate);
    if (endDate) dateFilter.lte = new Date(endDate);

    const saleFilter = { status: 'COMPLETED' };
    if (Object.keys(dateFilter).length > 0) {
      saleFilter.createdAt = dateFilter;
    }

    const topProducts = await prisma.saleItem.groupBy({
      by: ['productId'],
      where: { sale: saleFilter },
      _sum: { quantity: true, price: true },
      _count: { id: true },
      orderBy: { _sum: { quantity: 'desc' } },
      take: limitNum
    });

    const productsWithDetails = await Promise.all(
      topProducts.map(async (item) => {
        const product = await prisma.product.findUnique({
          where: { id: item.productId },
          select: { id: true, name: true, sku: true, category: true, brand: true, price: true, stock: true }
        });
        return {
          productId: item.productId,
          product,
          quantitySold: item._sum.quantity,
          totalRevenue: Math.round((item._sum.price || 0) * 100) / 100,
          timesSold: item._count.id
        };
      })
    );

    res.json({ status: 'success', data: productsWithDetails });
  } catch (error) {
    res.status(500).json({ status: 'error', message: error.message });
  }
};

/**
 * GET /api/sales/by-salesperson
 * Get sales grouped by salesperson
 */
exports.getSalesBySalesperson = async (req, res) => {
  try {
    const { startDate, endDate } = req.query;

    const dateFilter = {};
    if (startDate) dateFilter.gte = new Date(startDate);
    if (endDate) dateFilter.lte = new Date(endDate);

    const where = { status: 'COMPLETED', userId: { not: null } };
    if (Object.keys(dateFilter).length > 0) {
      where.createdAt = dateFilter;
    }

    const salesByPerson = await prisma.sale.groupBy({
      by: ['userId'],
      where,
      _count: { id: true },
      _sum: { total: true },
      _avg: { total: true },
      orderBy: { _sum: { total: 'desc' } }
    });

    const result = await Promise.all(
      salesByPerson.map(async (item) => {
        const user = await prisma.user.findUnique({
          where: { id: item.userId },
          select: { id: true, name: true, email: true, role: true }
        });
        return {
          userId: item.userId,
          user,
          totalSales: item._count.id,
          totalRevenue: Math.round((item._sum.total || 0) * 100) / 100,
          avgTicket: Math.round((item._avg.total || 0) * 100) / 100
        };
      })
    );

    res.json({ status: 'success', data: result });
  } catch (error) {
    res.status(500).json({ status: 'error', message: error.message });
  }
};

/**
 * POST /api/sales/credit-notes
 * Create credit note for a sale (ADMIN only)
 */
exports.createCreditNote = async (req, res) => {
  try {
    const { saleId, reason } = req.body;
    const userId = req.user.id;

    if (!saleId) {
      return res.status(400).json({ status: 'error', message: 'El ID de la venta es requerido' });
    }

    if (!reason) {
      return res.status(400).json({ status: 'error', message: 'El motivo es requerido' });
    }

    const creditNote = await saleService.generateCreditNote(saleId, reason, userId);

    res.status(201).json({ status: 'success', data: creditNote });
  } catch (error) {
    const statusCode = error.message.includes('no encontrada') || error.message.includes('cancelada') ? 400 : 500;
    res.status(statusCode).json({ status: 'error', message: error.message });
  }
};

/**
 * GET /api/sales/credit-notes
 * Get all credit notes
 */
exports.getCreditNotes = async (req, res) => {
  try {
    const { page = 1, limit = 20, status, saleId } = req.query;

    const where = {};
    if (status) {
      where.status = status;
    }
    if (saleId) {
      where.saleId = saleId;
    }

    const pageNum = Math.max(1, parseInt(page));
    const limitNum = Math.min(100, Math.max(1, parseInt(limit)));
    const skip = (pageNum - 1) * limitNum;

    const [creditNotes, total] = await Promise.all([
      prisma.creditNote.findMany({
        where,
        include: {
          sale: {
            select: { id: true, invoiceNumber: true, total: true, createdAt: true }
          },
          user: { select: { id: true, name: true, email: true } }
        },
        orderBy: { createdAt: 'desc' },
        skip,
        take: limitNum
      }),
      prisma.creditNote.count({ where })
    ]);

    res.json({
      status: 'success',
      data: {
        creditNotes,
        pagination: {
          total,
          page: pageNum,
          limit: limitNum,
          totalPages: Math.ceil(total / limitNum)
        }
      }
    });
  } catch (error) {
    res.status(500).json({ status: 'error', message: error.message });
  }
};

/**
 * GET /api/sales/daily-report
 * Get daily sales report
 */
exports.getDailyReport = async (req, res) => {
  try {
    const { date } = req.query;
    const reportDate = date ? new Date(date) : new Date();
    const startOfDay = new Date(reportDate.getFullYear(), reportDate.getMonth(), reportDate.getDate(), 0, 0, 0, 0);
    const endOfDay = new Date(reportDate.getFullYear(), reportDate.getMonth(), reportDate.getDate(), 23, 59, 59, 999);

    const where = {
      createdAt: {
        gte: startOfDay,
        lte: endOfDay
      }
    };

    const [
      sales,
      summary,
      paymentMethodBreakdown,
      cancelledSales
    ] = await Promise.all([
      prisma.sale.findMany({
        where,
        include: {
          items: {
            include: { product: { select: { name: true, sku: true } } }
          },
          user: { select: { name: true, email: true } }
        },
        orderBy: { createdAt: 'desc' }
      }),
      prisma.sale.aggregate({
        where: { ...where, status: 'COMPLETED' },
        _count: { id: true },
        _sum: { total: true, tax: true },
        _avg: { total: true }
      }),
      prisma.sale.groupBy({
        by: ['paymentMethod'],
        where: { ...where, status: 'COMPLETED' },
        _count: { id: true },
        _sum: { total: true }
      }),
      prisma.sale.findMany({
        where: { ...where, status: 'CANCELLED' },
        select: { id: true, total: true, createdAt: true }
      })
    ]);

    res.json({
      status: 'success',
      data: {
        date: reportDate.toISOString().split('T')[0],
        completedSales: summary._count.id,
        totalRevenue: Math.round((summary._sum.total || 0) * 100) / 100,
        totalTax: Math.round((summary._sum.tax || 0) * 100) / 100,
        avgTicket: Math.round((summary._avg.total || 0) * 100) / 100,
        paymentMethodBreakdown: paymentMethodBreakdown.map(pm => ({
          method: pm.paymentMethod,
          count: pm._count.id,
          total: Math.round((pm._sum.total || 0) * 100) / 100
        })),
        cancelledCount: cancelledSales.length,
        cancelledTotal: Math.round(cancelledSales.reduce((sum, s) => sum + s.total, 0) * 100) / 100,
        sales
      }
    });
  } catch (error) {
    res.status(500).json({ status: 'error', message: error.message });
  }
};

/**
 * GET /api/sales/tax-report
 * Get VAT/IVA tax report (ADMIN, MANAGER only)
 */
exports.getTaxReport = async (req, res) => {
  try {
    const { startDate, endDate, period } = req.query;

    let start, end;

    if (period) {
      // Handle period like "2026-04" for a specific month
      const [year, month] = period.split('-').map(Number);
      start = new Date(year, month - 1, 1, 0, 0, 0, 0);
      end = new Date(year, month, 0, 23, 59, 59, 999);
    } else {
      start = startDate ? new Date(startDate) : new Date(new Date().getFullYear(), new Date().getMonth(), 1);
      end = endDate ? new Date(endDate) : new Date();
    }

    const where = {
      status: 'COMPLETED',
      createdAt: {
        gte: start,
        lte: end
      }
    };

    const [
      sales,
      taxSummary
    ] = await Promise.all([
      prisma.sale.findMany({
        where,
        select: {
          id: true,
          invoiceNumber: true,
          subtotal: true,
          tax: true,
          total: true,
          discount: true,
          paymentMethod: true,
          createdAt: true,
          user: { select: { name: true } }
        },
        orderBy: { createdAt: 'asc' }
      }),
      prisma.sale.aggregate({
        where,
        _sum: { subtotal: true, tax: true, total: true, discount: true },
        _count: { id: true }
      })
    ]);

    res.json({
      status: 'success',
      data: {
        period: {
          startDate: start.toISOString().split('T')[0],
          endDate: end.toISOString().split('T')[0]
        },
        totalInvoices: taxSummary._count.id,
        totalSubtotal: Math.round((taxSummary._sum.subtotal || 0) * 100) / 100,
        totalTax: Math.round((taxSummary._sum.tax || 0) * 100) / 100,
        totalDiscount: Math.round((taxSummary._sum.discount || 0) * 100) / 100,
        totalRevenue: Math.round((taxSummary._sum.total || 0) * 100) / 100,
        effectiveTaxRate: taxSummary._sum.subtotal > 0
          ? Math.round(((taxSummary._sum.tax || 0) / taxSummary._sum.subtotal) * 10000) / 100
          : 0,
        sales
      }
    });
  } catch (error) {
    res.status(500).json({ status: 'error', message: error.message });
  }
};
