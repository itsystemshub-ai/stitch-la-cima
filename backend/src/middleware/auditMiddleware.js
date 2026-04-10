const prisma = require('../models/prismaClient');

/**
 * Middleware de Auditoría para Zenith ERP
 * Registra acciones críticas en la base de datos para cumplimiento y seguridad.
 * @param {string} action - Descripción de la acción (ej: 'CREATE_SALE', 'UPDATE_STOCK')
 */
const auditLog = (action) => {
  return async (req, res, next) => {
    // Capturamos el final de la respuesta para saber si fue exitosa
    const originalSend = res.send;
    
    res.send = function (data) {
      res.send = originalSend;
      
      // Solo registramos si la operación fue exitosa (2xx)
      if (res.statusCode >= 200 && res.statusCode < 300) {
        const userId = req.user ? req.user.id : 'ANONYMOUS';
        const ip = req.headers['x-forwarded-for'] || req.socket.remoteAddress;
        
        // Ejecutamos en segundo plano para no bloquear la respuesta al usuario
        prisma.auditLog.create({
          data: {
            action,
            userId,
            ipAddress: ip,
            resourceId: req.params.id || null,
            details: JSON.stringify({
              method: req.method,
              url: req.originalUrl,
              body: req.method !== 'GET' ? req.body : undefined
            }),
            timestamp: new Date()
          }
        }).catch(err => console.error('❌ Error en Audit Log:', err));
      }
      
      return res.send(data);
    };
    
    next();
  };
};

module.exports = auditLog;
