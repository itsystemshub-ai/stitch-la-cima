const prisma = require('../models/prismaClient');
const purchaseService = require('../services/purchaseService');

// ==========================================
// SUPPLIER CONTROLLERS
// ==========================================

/**
 * GET /api/purchases/suppliers
 * Get all suppliers with optional filters
 */
exports.getSuppliers = async (req, res) => {
  try {
    const { page = 1, limit = 50, search, active } = req.query;

    const where = {};

    if (active !== undefined) {
      where.active = active === 'true';
    }

    if (search) {
      where.OR = [
        { name: { contains: search, mode: 'insensitive' } },
        { rif: { contains: search, mode: 'insensitive' } },
        { email: { contains: search, mode: 'insensitive' } }
      ];
    }

    const pageNum = Math.max(1, parseInt(page));
    const limitNum = Math.min(100, Math.max(1, parseInt(limit)));
    const skip = (pageNum - 1) * limitNum;

    const [suppliers, total] = await Promise.all([
      prisma.supplier.findMany({
        where,
        orderBy: { name: 'asc' },
        skip,
        take: limitNum,
        include: {
          _count: {
            select: { purchases: true }
          }
        }
      }),
      prisma.supplier.count({ where })
    ]);

    res.json({
      status: 'success',
      data: {
        suppliers,
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
 * GET /api/purchases/suppliers/:id
 * Get single supplier with purchase history summary
 */
exports.getSupplierById = async (req, res) => {
  try {
    const { id } = req.params;

    const supplier = await prisma.supplier.findUnique({
      where: { id },
      include: {
        purchases: {
          orderBy: { orderDate: 'desc' },
          take: 10,
          select: {
            id: true,
            number: true,
            total: true,
            status: true,
            orderDate: true,
            receivedAt: true
          }
        }
      }
    });

    if (!supplier) {
      return res.status(404).json({ status: 'error', message: 'Proveedor no encontrado' });
    }

    // Get aggregate stats
    const stats = await prisma.purchaseOrder.aggregate({
      where: { supplierId: id },
      _count: { id: true },
      _sum: { total: true },
      _avg: { total: true }
    });

    res.json({
      status: 'success',
      data: {
        ...supplier,
        stats: {
          totalOrders: stats._count.id,
          totalSpent: stats._sum.total || 0,
          avgOrderValue: stats._avg.total || 0
        }
      }
    });
  } catch (error) {
    res.status(500).json({ status: 'error', message: error.message });
  }
};

/**
 * POST /api/purchases/suppliers
 * Create a new supplier (ADMIN, MANAGER only)
 */
exports.createSupplier = async (req, res) => {
  try {
    const supplierData = req.body;

    const validation = purchaseService.validateSupplierData(supplierData);
    if (!validation.valid) {
      return res.status(400).json({ status: 'error', message: validation.errors.join('. ') });
    }

    // Check for duplicate RIF
    const existing = await prisma.supplier.findUnique({
      where: { rif: supplierData.rif.trim() }
    });

    if (existing) {
      return res.status(409).json({ status: 'error', message: 'Ya existe un proveedor con ese RIF' });
    }

    const supplier = await prisma.supplier.create({
      data: {
        name: supplierData.name.trim(),
        rif: supplierData.rif.trim().toUpperCase(),
        email: supplierData.email ? supplierData.email.trim().toLowerCase() : null,
        phone: supplierData.phone ? supplierData.phone.trim() : null,
        address: supplierData.address ? supplierData.address.trim() : null,
        contact: supplierData.contact ? supplierData.contact.trim() : null,
        active: supplierData.active !== false
      }
    });

    res.status(201).json({ status: 'success', data: supplier });
  } catch (error) {
    const statusCode = error.code === 'P2002' ? 409 : 500;
    res.status(statusCode).json({ status: 'error', message: error.message });
  }
};

/**
 * PUT /api/purchases/suppliers/:id
 * Update a supplier (ADMIN, MANAGER only)
 */
exports.updateSupplier = async (req, res) => {
  try {
    const { id } = req.params;
    const supplierData = req.body;

    const existing = await prisma.supplier.findUnique({
      where: { id }
    });

    if (!existing) {
      return res.status(404).json({ status: 'error', message: 'Proveedor no encontrado' });
    }

    // Validate if RIF is being changed
    if (supplierData.rif && supplierData.rif.trim() !== existing.rif) {
      const duplicate = await prisma.supplier.findUnique({
        where: { rif: supplierData.rif.trim() }
      });
      if (duplicate) {
        return res.status(409).json({ status: 'error', message: 'Ya existe un proveedor con ese RIF' });
      }
    }

    const supplier = await prisma.supplier.update({
      where: { id },
      data: {
        ...(supplierData.name !== undefined && { name: supplierData.name.trim() }),
        ...(supplierData.rif !== undefined && { rif: supplierData.rif.trim().toUpperCase() }),
        ...(supplierData.email !== undefined && { email: supplierData.email ? supplierData.email.trim().toLowerCase() : null }),
        ...(supplierData.phone !== undefined && { phone: supplierData.phone ? supplierData.phone.trim() : null }),
        ...(supplierData.address !== undefined && { address: supplierData.address ? supplierData.address.trim() : null }),
        ...(supplierData.contact !== undefined && { contact: supplierData.contact ? supplierData.contact.trim() : null }),
        ...(supplierData.active !== undefined && { active: supplierData.active })
      }
    });

    res.json({ status: 'success', data: supplier });
  } catch (error) {
    const statusCode = error.code === 'P2002' ? 409 : 500;
    res.status(statusCode).json({ status: 'error', message: error.message });
  }
};

// ==========================================
// PURCHASE ORDER CONTROLLERS
// ==========================================

/**
 * POST /api/purchases/orders
 * Create a new purchase order with items (ADMIN, MANAGER only)
 */
exports.createPurchaseOrder = async (req, res) => {
  try {
    const userId = req.user?.id;
    const orderData = req.body;

    if (!orderData.supplierId) {
      return res.status(400).json({ status: 'error', message: 'El proveedor es requerido' });
    }

    const po = await purchaseService.createPurchaseOrder(orderData, userId);

    res.status(201).json({ status: 'success', data: po });
  } catch (error) {
    const statusCode = error.message.includes('no encontrado') || error.message.includes('debe incluir') || error.message.includes('requerido') ? 400 : 500;
    res.status(statusCode).json({ status: 'error', message: error.message });
  }
};

/**
 * GET /api/purchases/orders
 * Get all purchase orders with filters and pagination
 */
exports.getPurchaseOrders = async (req, res) => {
  try {
    const {
      page = 1,
      limit = 20,
      status,
      supplierId,
      startDate,
      endDate,
      search
    } = req.query;

    const where = {};

    if (status) {
      where.status = status;
    }

    if (supplierId) {
      where.supplierId = parseInt(supplierId);
    }

    if (startDate || endDate) {
      where.orderDate = {};
      if (startDate) {
        where.orderDate.gte = new Date(startDate);
      }
      if (endDate) {
        where.orderDate.lte = new Date(endDate);
      }
    }

    if (search) {
      const isUuid = /^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/i.test(search);
      where.OR = [
        { number: { contains: search, mode: 'insensitive' } },
        ...(isUuid ? [{ id: search }] : []),
        { notes: { contains: search, mode: 'insensitive' } }
      ];
    }

    const pageNum = Math.max(1, parseInt(page));
    const limitNum = Math.min(100, Math.max(1, parseInt(limit)));
    const skip = (pageNum - 1) * limitNum;

    const [orders, total] = await Promise.all([
      prisma.purchaseOrder.findMany({
        where,
        include: {
          supplier: {
            select: { id: true, name: true, rif: true }
          },
          _count: {
            select: { items: true }
          }
        },
        orderBy: { orderDate: 'desc' },
        skip,
        take: limitNum
      }),
      prisma.purchaseOrder.count({ where })
    ]);

    res.json({
      status: 'success',
      data: {
        orders,
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
 * GET /api/purchases/orders/:id
 * Get single purchase order with full details
 */
exports.getPurchaseOrderById = async (req, res) => {
  try {
    const { id } = req.params;

    const po = await prisma.purchaseOrder.findUnique({
      where: { id },
      include: {
        items: true,
        supplier: {
          select: { id: true, name: true, rif: true, email: true, phone: true, contact: true }
        }
      }
    });

    if (!po) {
      return res.status(404).json({ status: 'error', message: 'Orden de compra no encontrada' });
    }

    res.json({ status: 'success', data: po });
  } catch (error) {
    res.status(500).json({ status: 'error', message: error.message });
  }
};

/**
 * POST /api/purchases/orders/:id/approve
 * Approve a purchase order (ADMIN, MANAGER only)
 */
exports.approvePurchaseOrder = async (req, res) => {
  try {
    const { id } = req.params;

    const po = await purchaseService.approvePurchaseOrder(id);

    res.json({ status: 'success', data: po, message: 'Orden de compra aprobada exitosamente' });
  } catch (error) {
    const statusCode = error.message.includes('no encontrada') || error.message.includes('Solo se pueden aprobar') ? 400 : 500;
    res.status(statusCode).json({ status: 'error', message: error.message });
  }
};

/**
 * POST /api/purchases/orders/:id/receive
 * Receive a purchase order and add stock to inventory (ADMIN, MANAGER only)
 */
exports.receivePurchaseOrder = async (req, res) => {
  try {
    const { id } = req.params;
    const receiveData = req.body || {};

    const po = await purchaseService.receivePurchaseOrder(id, receiveData);

    const message = receiveData.partialReceive
      ? 'Recepcion parcial registrada exitosamente'
      : 'Orden de compra recibida exitosamente. Inventario actualizado.';

    res.json({ status: 'success', data: po, message });
  } catch (error) {
    const statusCode = error.message.includes('no encontrada') || error.message.includes('ya fue recibida') || error.message.includes('cancelada') ? 400 : 500;
    res.status(statusCode).json({ status: 'error', message: error.message });
  }
};

/**
 * POST /api/purchases/orders/:id/cancel
 * Cancel a purchase order (ADMIN, MANAGER only)
 */
exports.cancelPurchaseOrder = async (req, res) => {
  try {
    const { id } = req.params;
    const { reason } = req.body;

    const po = await purchaseService.cancelPurchaseOrder(id, reason || 'Sin motivo especificado');

    res.json({ status: 'success', data: po, message: 'Orden de compra cancelada exitosamente' });
  } catch (error) {
    const statusCode = error.message.includes('no encontrada') || error.message.includes('ya esta cancelada') || error.message.includes('ya recibida') ? 400 : 500;
    res.status(statusCode).json({ status: 'error', message: error.message });
  }
};

// ==========================================
// REPORTS & SUMMARY CONTROLLERS
// ==========================================

/**
 * GET /api/purchases/history
 * Get purchase history by supplier with filters
 */
exports.getPurchaseHistory = async (req, res) => {
  try {
    const { supplierId, startDate, endDate, status } = req.query;

    const where = {};

    if (supplierId) {
      where.supplierId = parseInt(supplierId);
    }

    if (status) {
      where.status = status;
    }

    if (startDate || endDate) {
      where.orderDate = {};
      if (startDate) where.orderDate.gte = new Date(startDate);
      if (endDate) where.orderDate.lte = new Date(endDate);
    }

    const orders = await prisma.purchaseOrder.findMany({
      where,
      include: {
        supplier: {
          select: { id: true, name: true, rif: true }
        },
        items: true
      },
      orderBy: { orderDate: 'desc' }
    });

    // Aggregate stats
    const stats = await prisma.purchaseOrder.aggregate({
      where,
      _count: { id: true },
      _sum: { total: true },
      _avg: { total: true }
    });

    // Status breakdown
    const statusBreakdown = await prisma.purchaseOrder.groupBy({
      by: ['status'],
      where,
      _count: { id: true },
      _sum: { total: true }
    });

    // Supplier breakdown if no specific supplier filter
    let supplierBreakdown = [];
    if (!supplierId) {
      const supplierStats = await prisma.purchaseOrder.groupBy({
        by: ['supplierId'],
        where,
        _count: { id: true },
        _sum: { total: true }
      });

      supplierBreakdown = await Promise.all(
        supplierStats.map(async (sp) => {
          const supplier = await prisma.supplier.findUnique({
            where: { id: sp.supplierId },
            select: { id: true, name: true, rif: true }
          });
          return {
            supplierId: sp.supplierId,
            supplier,
            orderCount: sp._count.id,
            totalSpent: sp._sum.total || 0
          };
        })
      );
    }

    res.json({
      status: 'success',
      data: {
        orders,
        summary: {
          totalOrders: stats._count.id,
          totalSpent: stats._sum.total || 0,
          avgOrderValue: stats._avg.total || 0,
          statusBreakdown: statusBreakdown.map(sb => ({
            status: sb.status,
            count: sb._count.id,
            total: sb._sum.total || 0
          })),
          supplierBreakdown
        }
      }
    });
  } catch (error) {
    res.status(500).json({ status: 'error', message: error.message });
  }
};

/**
 * GET /api/purchases/summary
 * Get purchases summary with key metrics
 */
exports.getPurchasesSummary = async (req, res) => {
  try {
    const { startDate, endDate } = req.query;

    const dateFilter = {};
    if (startDate) dateFilter.gte = new Date(startDate);
    if (endDate) dateFilter.lte = new Date(endDate);

    const baseWhere = {};
    if (Object.keys(dateFilter).length > 0) {
      baseWhere.orderDate = dateFilter;
    }

    const [
      totalOrders,
      totalSpent,
      avgOrderValue,
      statusBreakdown,
      pendingOrders,
      recentOrders,
      topSuppliers,
      activeSuppliers
    ] = await Promise.all([
      prisma.purchaseOrder.count({ where: baseWhere }),
      prisma.purchaseOrder.aggregate({
        where: baseWhere,
        _sum: { total: true }
      }),
      prisma.purchaseOrder.aggregate({
        where: baseWhere,
        _avg: { total: true }
      }),
      prisma.purchaseOrder.groupBy({
        by: ['status'],
        where: baseWhere,
        _count: { id: true },
        _sum: { total: true }
      }),
      prisma.purchaseOrder.count({
        where: { ...baseWhere, status: 'PENDING' }
      }),
      prisma.purchaseOrder.findMany({
        where: baseWhere,
        include: {
          supplier: {
            select: { id: true, name: true }
          }
        },
        orderBy: { orderDate: 'desc' },
        take: 5
      }),
      prisma.purchaseOrder.groupBy({
        by: ['supplierId'],
        where: baseWhere,
        _count: { id: true },
        _sum: { total: true },
        orderBy: { _sum: { total: 'desc' } },
        take: 5
      }),
      prisma.supplier.count({ where: { active: true } })
    ]);

    const topSupplierDetails = await Promise.all(
      topSuppliers.map(async (ts) => {
        const supplier = await prisma.supplier.findUnique({
          where: { id: ts.supplierId },
          select: { id: true, name: true, rif: true }
        });
        return {
          supplierId: ts.supplierId,
          supplier,
          orderCount: ts._count.id,
          totalSpent: ts._sum.total || 0
        };
      })
    );

    res.json({
      status: 'success',
      data: {
        totalOrders,
        totalSpent: totalSpent._sum.total || 0,
        avgOrderValue: avgOrderValue._avg.total || 0,
        pendingOrders,
        activeSuppliers,
        statusBreakdown: statusBreakdown.map(sb => ({
          status: sb.status,
          count: sb._count.id,
          total: sb._sum.total || 0
        })),
        recentOrders: recentOrders.map(po => ({
          id: po.id,
          number: po.number,
          supplier: po.supplier,
          total: po.total,
          status: po.status,
          orderDate: po.orderDate
        })),
        topSuppliers: topSupplierDetails,
        period: {
          startDate: startDate || null,
          endDate: endDate || null
        }
      }
    });
  } catch (error) {
    res.status(500).json({ status: 'error', message: error.message });
  }
};
