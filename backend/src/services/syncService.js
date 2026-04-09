const prisma = require('../models/prismaClient');
const axios = require('axios');

const CLOUD_API_URL = process.env.CLOUD_API_URL;
const NODE_NAME = process.env.NODE_NAME || 'LOCAL_NODE_1';

/**
 * Servicio de Sincronización Híbrida
 * Gestiona la transferencia de datos entre el nodo local y el servidor en la nube.
 */
class SyncService {
  /**
   * Envía cambios locales a la nube
   */
  async pushToCloud() {
    if (!CLOUD_API_URL) return { status: 'skipped', message: 'CLOUD_API_URL no configurada' };

    console.log('🔄 Iniciando Push a la nube...');
    const syncResults = {};

    // Modelos a sincronizar
    const models = [
      'Product', 'Supplier', 'Category', 'Brand', 'Sale', 'SaleItem', 
      'Account', 'JournalEntry', 'JournalEntryLine', 'FixedAsset',
      'InventoryLog', 'AccountsReceivable'
    ];

    for (const modelName of models) {
      try {
        const prismaModel = prisma[modelName.charAt(0).toLowerCase() + modelName.slice(1)];
        
        // Buscar registros no sincronizados creados localmente
        const pending = await prismaModel.findMany({
          where: {
            isSynced: false,
            originNode: 'LOCAL'
          }
        });

        if (pending.length > 0) {
          console.log(`📤 Enviando ${pending.length} registros de ${modelName}...`);
          
          const response = await axios.post(`${CLOUD_API_URL}/sync/push`, {
            model: modelName,
            node: NODE_NAME,
            data: pending
          });

          if (response.data.status === 'success') {
            // Marcar como sincronizados
            const ids = pending.map(p => p.id);
            await prismaModel.updateMany({
              where: { id: { in: ids } },
              data: { 
                isSynced: true,
                lastSync: new Date()
              }
            });
            syncResults[modelName] = pending.length;
          }
        }
      } catch (error) {
        console.error(`❌ Error sincronizando ${modelName}:`, error.message);
      }
    }

    return syncResults;
  }

  /**
   * Trae cambios de la nube al nodo local
   */
  async pullFromCloud() {
    if (!CLOUD_API_URL) return { status: 'skipped', message: 'CLOUD_API_URL no configurada' };

    console.log('🔄 Iniciando Pull desde la nube...');
    // Implementación de pull (simplificada para MVP)
    // En un escenario real, pediríamos cambios desde el último sync exitoso
    return { message: 'Pull logic ready for implementation' };
  }

  /**
   * Ejecuta ciclo completo de sincronización
   */
  async sync() {
    console.log('🚀 Iniciando ciclo de sincronización...');
    const pushed = await this.pushToCloud();
    const pulled = await this.pullFromCloud();
    
    return {
      timestamp: new Date(),
      pushed,
      pulled
    };
  }
}

module.exports = new SyncService();
