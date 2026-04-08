const prisma = require('../models/prismaClient');
const {
  calculateWeightedAverageCost,
  validateStockMovement,
  createInventoryLog,
  generateInventoryReport
} = require('../services/inventoryService');

// ============================================================
// Product CRUD
// ============================================================

/**
 * GET /products - List all products with filters and pagination
 * Query params: category, brand, search, stockStatus (in-stock|low-stock|out-of-stock), page, limit
 */
exports.getProducts = async (req, res) => {
  try {
    const { category, brand, search, stockStatus, page = '1', limit = '20' } = req.query;
    const pageNum = Math.max(1, parseInt(page) || 1);
    const limitNum = Math.min(100, Math.max(1, parseInt(limit) || 20));
    const skip = (pageNum - 1) * limitNum;

    const where = { active: true };

    if (category) where.category = { equals: category, mode: 'insensitive' };
    if (brand) where.brand = { equals: brand, mode: 'insensitive' };
    if (search) {
      where.OR = [
        { name: { contains: search, mode: 'insensitive' } },
        { sku: { contains: search, mode: 'insensitive' } },
        { description: { contains: search, mode: 'insensitive' } }
      ];
    }
    if (stockStatus === 'in-stock') where.stock = { gt: 0 };
    if (stockStatus === 'out-of-stock') where.stock = { lte: 0 };

    const [products, total] = await Promise.all([
      prisma.product.findMany({
        where,
        skip,
        take: limitNum,
        orderBy: { name: 'asc' },
        select: {
          id: true,
          sku: true,
          name: true,
          description: true,
          price: true,
          stock: true,
          category: true,
          brand: true,
          origin: true,
          active: true,
          createdAt: true
        }
      }),
      prisma.product.count({ where })
    ]);

    res.json({
      status: 'success',
      data: {
        products,
        pagination: {
          page: pageNum,
          limit: limitNum,
          total,
          totalPages: Math.ceil(total / limitNum)
        }
      }
    });
  } catch (error) {
    res.status(400).json({ status: 'error', message: error.message });
  }
};

/**
 * GET /products/:id - Get single product with inventory logs
 */
exports.getProductById = async (req, res) => {
  try {
    const id = parseInt(req.params.id);
    if (isNaN(id)) {
      return res.status(400).json({ status: 'error', message: 'ID de producto inválido' });
    }

    const product = await prisma.product.findUnique({
      where: { id, active: true },
      include: {
        inventoryLogs: {
          orderBy: { createdAt: 'desc' },
          take: 50
        }
      }
    });

    if (!product) {
      return res.status(404).json({ status: 'error', message: 'Producto no encontrado' });
    }

    res.json({ status: 'success', data: product });
  } catch (error) {
    res.status(400).json({ status: 'error', message: error.message });
  }
};

/**
 * POST /products - Create a new product
 */
exports.createProduct = async (req, res) => {
  try {
    const { sku, name, description, price, stock, category, brand, origin } = req.body;

    // Required field validation
    if (!sku || !name || price === undefined) {
      return res.status(400).json({
        status: 'error',
        message: 'Los campos SKU, nombre y precio son obligatorios'
      });
    }

    if (typeof price !== 'number' || price < 0) {
      return res.status(400).json({
        status: 'error',
        message: 'El precio debe ser un número positivo'
      });
    }

    if (stock !== undefined && (typeof stock !== 'number' || stock < 0 || !Number.isInteger(stock))) {
      return res.status(400).json({
        status: 'error',
        message: 'El stock debe ser un número entero no negativo'
      });
    }

    const product = await prisma.product.create({
      data: {
        sku: String(sku).trim(),
        name: String(name).trim(),
        description: description ? String(description).trim() : null,
        price: Number(price),
        stock: stock !== undefined ? Number(stock) : 0,
        category: category ? String(category).trim() : null,
        brand: brand ? String(brand).trim() : null,
        origin: origin ? String(origin).trim() : null
      }
    });

    res.status(201).json({ status: 'success', data: product });
  } catch (error) {
    if (error.code === 'P2002') {
      return res.status(409).json({ status: 'error', message: 'Ya existe un producto con ese SKU' });
    }
    res.status(400).json({ status: 'error', message: error.message });
  }
};

/**
 * PUT /products/:id - Update an existing product
 */
exports.updateProduct = async (req, res) => {
  try {
    const id = parseInt(req.params.id);
    if (isNaN(id)) {
      return res.status(400).json({ status: 'error', message: 'ID de producto inválido' });
    }

    const existing = await prisma.product.findUnique({ where: { id } });
    if (!existing) {
      return res.status(404).json({ status: 'error', message: 'Producto no encontrado' });
    }

    const { sku, name, description, price, category, brand, origin } = req.body;

    // Validate price if provided
    if (price !== undefined && (typeof price !== 'number' || price < 0)) {
      return res.status(400).json({
        status: 'error',
        message: 'El precio debe ser un número positivo'
      });
    }

    const product = await prisma.product.update({
      where: { id },
      data: {
        ...(sku !== undefined && { sku: String(sku).trim() }),
        ...(name !== undefined && { name: String(name).trim() }),
        ...(description !== undefined && { description: description ? String(description).trim() : null }),
        ...(price !== undefined && { price: Number(price) }),
        ...(category !== undefined && { category: category ? String(category).trim() : null }),
        ...(brand !== undefined && { brand: brand ? String(brand).trim() : null }),
        ...(origin !== undefined && { origin: origin ? String(origin).trim() : null })
      }
    });

    res.json({ status: 'success', data: product });
  } catch (error) {
    if (error.code === 'P2002') {
      return res.status(409).json({ status: 'error', message: 'Ya existe un producto con ese SKU' });
    }
    res.status(400).json({ status: 'error', message: error.message });
  }
};

/**
 * DELETE /products/:id - Soft delete (set active = false)
 */
exports.deleteProduct = async (req, res) => {
  try {
    const id = parseInt(req.params.id);
    if (isNaN(id)) {
      return res.status(400).json({ status: 'error', message: 'ID de producto inválido' });
    }

    const product = await prisma.product.findUnique({ where: { id } });
    if (!product) {
      return res.status(404).json({ status: 'error', message: 'Producto no encontrado' });
    }

    if (!product.active) {
      return res.status(400).json({ status: 'error', message: 'El producto ya está desactivado' });
    }

    await prisma.product.update({
      where: { id },
      data: { active: false }
    });

    res.json({ status: 'success', message: 'Producto desactivado correctamente' });
  } catch (error) {
    res.status(400).json({ status: 'error', message: error.message });
  }
};

// ============================================================
// Inventory Operations
// ============================================================

/**
 * GET /kardex/:productId - Get inventory movement history (kardex) for a product
 */
exports.getKardex = async (req, res) => {
  try {
    const productId = parseInt(req.params.productId);
    if (isNaN(productId)) {
      return res.status(400).json({ status: 'error', message: 'ID de producto inválido' });
    }

    const product = await prisma.product.findUnique({
      where: { id: productId },
      select: { id: true, name: true, sku: true, stock: true, price: true }
    });

    if (!product) {
      return res.status(404).json({ status: 'error', message: 'Producto no encontrado' });
    }

    const { startDate, endDate } = req.query;
    const whereClause = { productId };
    if (startDate || endDate) {
      whereClause.createdAt = {};
      if (startDate) whereClause.createdAt.gte = new Date(startDate);
      if (endDate) whereClause.createdAt.lte = new Date(endDate);
    }

    const logs = await prisma.inventoryLog.findMany({
      where: whereClause,
      orderBy: { createdAt: 'asc' },
      select: {
        id: true,
        type: true,
        quantity: true,
        cost: true,
        reason: true,
        createdAt: true
      }
    });

    // Build kardex with running balance
    let runningBalance = 0;
    const kardex = [];

    for (const log of logs) {
      if (log.type === 'IN') {
        runningBalance += log.quantity;
      } else if (log.type === 'OUT') {
        runningBalance -= log.quantity;
      } else if (log.type === 'ADJUST') {
        runningBalance = log.quantity;
      }

      kardex.push({
        ...log,
        balance: runningBalance
      });
    }

    res.json({
      status: 'success',
      data: {
        product,
        movements: kardex,
        currentStock: product.stock,
        totalMovements: logs.length
      }
    });
  } catch (error) {
    res.status(400).json({ status: 'error', message: error.message });
  }
};

/**
 * POST /stock/add - Add stock with inventory log and weighted average cost update
 * Body: { productId, quantity, cost, reason }
 */
exports.addStock = async (req, res) => {
  try {
    const { productId, quantity, cost, reason } = req.body;

    const validation = validateStockMovement({ productId, quantity, cost });
    if (!validation.valid) {
      return res.status(400).json({ status: 'error', message: validation.message });
    }

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
      return res.status(404).json({ status: 'error', message: 'Producto no encontrado' });
    }

    const newWeightedCost = calculateWeightedAverageCost(
      product.stock,
      product.inventoryLogs[0]?.cost || product.price,
      quantity,
      cost
    );

    const result = await prisma.$transaction(async (tx) => {
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
        userId: req.user?.id
      });

      return { updatedProduct, log };
    });

    res.status(201).json({
      status: 'success',
      data: {
        previousStock: product.stock,
        currentStock: result.updatedProduct.stock,
        newAverageCost: parseFloat(newWeightedCost.toFixed(2)),
        logId: result.log.id
      }
    });
  } catch (error) {
    res.status(400).json({ status: 'error', message: error.message });
  }
};

/**
 * POST /stock/remove - Remove stock with inventory log
 * Body: { productId, quantity, reason }
 */
exports.removeStock = async (req, res) => {
  try {
    const { productId, quantity, reason } = req.body;

    const validation = validateStockMovement({ productId, quantity, cost: 0 });
    if (!validation.valid) {
      return res.status(400).json({ status: 'error', message: validation.message });
    }

    const product = await prisma.product.findUnique({
      where: { id: productId },
      select: { id: true, stock: true, price: true, name: true }
    });

    if (!product) {
      return res.status(404).json({ status: 'error', message: 'Producto no encontrado' });
    }

    if (product.stock < quantity) {
      return res.status(400).json({
        status: 'error',
        message: `Stock insuficiente. Stock actual: ${product.stock}, solicitado: ${quantity}`
      });
    }

    const result = await prisma.$transaction(async (tx) => {
      const updatedProduct = await tx.product.update({
        where: { id: productId },
        data: { stock: product.stock - quantity }
      });

      const log = await createInventoryLog(tx, {
        productId,
        type: 'OUT',
        quantity,
        cost: product.price,
        reason: reason || 'Salida de stock',
        userId: req.user?.id
      });

      return { updatedProduct, log };
    });

    res.status(201).json({
      status: 'success',
      data: {
        previousStock: product.stock,
        currentStock: result.updatedProduct.stock,
        logId: result.log.id
      }
    });
  } catch (error) {
    res.status(400).json({ status: 'error', message: error.message });
  }
};

/**
 * POST /stock/adjust - Adjust stock to a specific quantity
 * Body: { productId, newQuantity, reason }
 */
exports.adjustStock = async (req, res) => {
  try {
    const { productId, newQuantity, reason } = req.body;

    if (productId === undefined || newQuantity === undefined) {
      return res.status(400).json({
        status: 'error',
        message: 'Los campos productId y newQuantity son obligatorios'
      });
    }

    const parsedProductId = parseInt(productId);
    const parsedNewQuantity = parseInt(newQuantity);

    if (isNaN(parsedProductId) || isNaN(parsedNewQuantity) || parsedNewQuantity < 0) {
      return res.status(400).json({
        status: 'error',
        message: 'productId y newQuantity deben ser números enteros no negativos'
      });
    }

    const product = await prisma.product.findUnique({
      where: { id: parsedProductId },
      select: { id: true, stock: true, price: true, name: true }
    });

    if (!product) {
      return res.status(404).json({ status: 'error', message: 'Producto no encontrado' });
    }

    const difference = parsedNewQuantity - product.stock;
    if (difference === 0) {
      return res.json({
        status: 'success',
        message: 'El stock ya tiene el valor solicitado, no se realizó ningún cambio',
        data: { currentStock: product.stock }
      });
    }

    const type = difference > 0 ? 'IN' : 'OUT';
    const absDifference = Math.abs(difference);

    const result = await prisma.$transaction(async (tx) => {
      const updatedProduct = await tx.product.update({
        where: { id: parsedProductId },
        data: { stock: parsedNewQuantity }
      });

      const log = await createInventoryLog(tx, {
        productId: parsedProductId,
        type: 'ADJUST',
        quantity: parsedNewQuantity,
        cost: product.price,
        reason: reason || `Ajuste de inventario (${difference > 0 ? '+' : ''}${difference} unidades)`,
        userId: req.user?.id
      });

      return { updatedProduct, log };
    });

    res.status(201).json({
      status: 'success',
      data: {
        previousStock: product.stock,
        currentStock: result.updatedProduct.stock,
        difference,
        logId: result.log.id
      }
    });
  } catch (error) {
    res.status(400).json({ status: 'error', message: error.message });
  }
};

// ============================================================
// Reports & Analytics
// ============================================================

/**
 * GET /products/low-stock - Get products below minimum stock threshold
 * Query param: threshold (default: 10)
 */
exports.getLowStockProducts = async (req, res) => {
  try {
    const threshold = parseInt(req.query.threshold) || 10;

    const products = await prisma.product.findMany({
      where: {
        active: true,
        stock: { lte: threshold }
      },
      orderBy: { stock: 'asc' },
      select: {
        id: true,
        sku: true,
        name: true,
        stock: true,
        category: true,
        brand: true,
        price: true
      }
    });

    res.json({
      status: 'success',
      data: {
        products,
        threshold,
        count: products.length
      }
    });
  } catch (error) {
    res.status(400).json({ status: 'error', message: error.message });
  }
};

/**
 * GET /products/summary - Get inventory summary
 */
exports.getInventorySummary = async (req, res) => {
  try {
    const summary = await generateInventoryReport();
    res.json({ status: 'success', data: summary });
  } catch (error) {
    res.status(400).json({ status: 'error', message: error.message });
  }
};

/**
 * GET /audit - Get physical inventory audit report
 * Query params: startDate, endDate, category, brand
 */
exports.getInventoryAudit = async (req, res) => {
  try {
    const { startDate, endDate, category, brand } = req.query;

    const whereClause = { active: true };
    if (category) whereClause.category = { equals: category, mode: 'insensitive' };
    if (brand) whereClause.brand = { equals: brand, mode: 'insensitive' };

    const products = await prisma.product.findMany({
      where: whereClause,
      orderBy: { name: 'asc' },
      select: {
        id: true,
        sku: true,
        name: true,
        stock: true,
        price: true,
        category: true,
        brand: true,
        createdAt: true,
        _count: {
          select: { inventoryLogs: true }
        }
      }
    });

    // Get log date range
    const logWhere = {};
    if (startDate || endDate) {
      logWhere.createdAt = {};
      if (startDate) logWhere.createdAt.gte = new Date(startDate);
      if (endDate) logWhere.createdAt.lte = new Date(endDate);
    }

    const logs = await prisma.inventoryLog.findMany({
      where: logWhere,
      orderBy: { createdAt: 'desc' },
      select: {
        id: true,
        productId: true,
        type: true,
        quantity: true,
        cost: true,
        reason: true,
        createdAt: true
      }
    });

    // Aggregate logs by product
    const logsByProduct = {};
    let totalIn = 0;
    let totalOut = 0;
    let totalAdjustments = 0;

    logs.forEach((log) => {
      if (!logsByProduct[log.productId]) {
        logsByProduct[log.productId] = { in: 0, out: 0, adjustments: 0, count: 0 };
      }
      if (log.type === 'IN') {
        logsByProduct[log.productId].in += log.quantity;
        totalIn += log.quantity;
      } else if (log.type === 'OUT') {
        logsByProduct[log.productId].out += log.quantity;
        totalOut += log.quantity;
      } else if (log.type === 'ADJUST') {
        logsByProduct[log.productId].adjustments++;
        totalAdjustments++;
      }
      logsByProduct[log.productId].count++;
    });

    const auditReport = products.map((product) => ({
      ...product,
      totalValue: parseFloat((product.stock * product.price).toFixed(2)),
      movementSummary: logsByProduct[product.id] || { in: 0, out: 0, adjustments: 0, count: 0 }
    }));

    const totalInventoryValue = auditReport.reduce((sum, p) => sum + p.totalValue, 0);

    res.json({
      status: 'success',
      data: {
        audit: auditReport,
        summary: {
          totalProducts: products.length,
          totalInventoryValue: parseFloat(totalInventoryValue.toFixed(2)),
          totalMovements: logs.length,
          totalStockIn: totalIn,
          totalStockOut: totalOut,
          totalAdjustments: totalAdjustments,
          generatedAt: new Date().toISOString(),
          dateRange: {
            startDate: startDate || null,
            endDate: endDate || null
          }
        }
      }
    });
  } catch (error) {
    res.status(400).json({ status: 'error', message: error.message });
  }
};
