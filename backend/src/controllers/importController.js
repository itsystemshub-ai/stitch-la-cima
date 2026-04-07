const fs = require('fs');
const prisma = require('../models/prismaClient');

exports.importInventory = async (req, res) => {
  if (!req.file) {
    return res.status(400).json({ status: 'error', message: 'No file uploaded' });
  }

  const filePath = req.file.path;
  const results = [];

  try {
    const content = fs.readFileSync(filePath, 'utf8');
    const lines = content.split('\n');
    const headers = lines[0].split(',').map(h => h.trim());

    // Simple CSV parser
    for (let i = 1; i < lines.length; i++) {
      if (!lines[i].trim()) continue;
      const values = lines[i].split(',').map(v => v.trim());
      const row = {};
      headers.forEach((header, index) => {
        row[header] = values[index];
      });
      results.push(row);
    }

    // Process rows (Bulk Upsert)
    for (const item of results) {
      await prisma.product.upsert({
        where: { sku: item.sku },
        update: {
          name: item.name,
          price: parseFloat(item.price),
          stock: parseInt(item.stock),
          category: item.category,
        },
        create: {
          sku: item.sku,
          name: item.name,
          price: parseFloat(item.price),
          stock: parseInt(item.stock),
          category: item.category,
        },
      });
    }

    // Cleanup file
    fs.unlinkSync(filePath);

    res.json({ 
      status: 'success', 
      message: `Successfully imported ${results.length} products.`,
      count: results.length 
    });
  } catch (error) {
    console.error('Import Error:', error);
    res.status(500).json({ status: 'error', message: 'Failed to process import file' });
  }
};
