const express = require('express');
const router = express.Router();
const syncService = require('../services/syncService');

/**
 * Rutas de Sincronización Híbrida
 */

// POST /api/sync/push - Recibir datos de un nodo
router.post('/push', async (req, res) => {
  try {
    const { model, node, data } = req.body;
    console.log(`📥 Recibiendo push desde ${node} para ${model}...`);
    
    // Aquí se procesaría el guardado en la nube
    // Por ahora devolvemos éxito
    res.json({ status: 'success', message: 'Datos recibidos correctamente' });
  } catch (error) {
    res.status(500).json({ status: 'error', message: error.message });
  }
});

// GET /api/sync/pull - Enviar cambios a un nodo
router.get('/pull', async (req, res) => {
  try {
    const { lastSync, node } = req.query;
    console.log(`📤 Generando pull para ${node} desde ${lastSync}...`);
    
    res.json({ status: 'success', data: [] });
  } catch (error) {
    res.status(500).json({ status: 'error', message: error.message });
  }
});

// POST /api/sync/trigger - Disparar sincronización manual
router.post('/trigger', async (req, res) => {
  try {
    const results = await syncService.sync();
    res.json({ status: 'success', data: results });
  } catch (error) {
    res.status(500).json({ status: 'error', message: error.message });
  }
});

module.exports = router;
