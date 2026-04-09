const prisma = require('../models/prismaClient');

exports.getProducts = async (req, res) => {
  try {
    const products = await prisma.product.findMany({
      where: { active: true },
      include: { inventoryLogs: true },
    });
    res.json({ status: 'success', data: products });
  } catch (error) {
    res.status(400).json({ status: 'error', message: error.message });
  }
};

exports.getProduct = async (req, res) => {
  try {
    const product = await prisma.product.findUnique({
      where: { id: req.params.id },
      include: { inventoryLogs: true },
    });
    if (!product) return res.status(404).json({ status: 'error', message: 'Product not found' });
    res.json({ status: 'success', data: product });
  } catch (error) {
    res.status(400).json({ status: 'error', message: error.message });
  }
};

exports.createProduct = async (req, res) => {
  try {
    const product = await prisma.product.create({
      data: req.body,
    });
    res.status(201).json({ status: 'success', data: product });
  } catch (error) {
    res.status(400).json({ status: 'error', message: error.message });
  }
};

exports.updateProduct = async (req, res) => {
  try {
    const product = await prisma.product.update({
      where: { id: req.params.id },
      data: req.body,
    });
    res.json({ status: 'success', data: product });
  } catch (error) {
    res.status(400).json({ status: 'error', message: error.message });
  }
};

exports.deleteProduct = async (req, res) => {
  try {
    await prisma.product.update({
      where: { id: req.params.id },
      data: { active: false },
    });
    res.json({ status: 'success', message: 'Product deactivated' });
  } catch (error) {
    res.status(400).json({ status: 'error', message: error.message });
  }
};
