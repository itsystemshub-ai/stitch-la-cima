/**
 * ZENITH DATA - Sincronizador de Datos Inteligente
 * Maneja el estado global del inventario, ventas y finanzas de Mayor de Repuesto La Cima, C.A.
 * Permite que los 71 módulos operen como un solo ecosistema integrado.
 */

const ZENITH_DATA = {
    // Datos iniciales de demostración premium
    init: function() {
        if (!localStorage.getItem('zenith_inventory')) {
            const initialInventory = [
                { id: 1, name: "Empacadura de Cámara V6", oem: "CIMA-EMP-001", stock: 142, price: 45.00, category: "Motor" },
                { id: 2, name: "Bomba de Agua Isuzu 4HK1", oem: "CIMA-PMP-982", stock: 8, price: 182.00, category: "Enfriamiento" },
                { id: 3, name: "Filtro de Aceite Donaldson", oem: "CIMA-FIL-332", stock: 500, price: 12.50, category: "Filtros" }
            ];
            localStorage.setItem('zenith_inventory', JSON.stringify(initialInventory));
        }

        if (!localStorage.getItem('zenith_finance')) {
            localStorage.setItem('zenith_finance', JSON.stringify({
                total_sales: 12450.00,
                total_purchases: 8200.00,
                cash_balance: 4250.00,
                active_orders: 7
            }));
        }
    },

    // Sincronizar Stock (Al comprar o vender)
    updateStock: function(oem, quantity) {
        let inventory = JSON.parse(localStorage.getItem('zenith_inventory'));
        const index = inventory.findIndex(item => item.oem === oem);
        
        if (index !== -1) {
            inventory[index].stock += quantity;
            localStorage.setItem('zenith_inventory', JSON.stringify(inventory));
            this.broadcastChange('inventory_updated');
            return true;
        }
        return false;
    },

    // Registrar Venta (Afecta inventario y finanzas)
    registerSale: function(oem, quantity, amount) {
        if (this.updateStock(oem, -quantity)) {
            let finance = JSON.parse(localStorage.getItem('zenith_finance'));
            finance.total_sales += amount;
            finance.cash_balance += amount;
            localStorage.setItem('zenith_finance', JSON.stringify(finance));
            this.broadcastChange('finance_updated');
            return true;
        }
        return false;
    },

    // Registrar Compra (Aumenta inventario, disminuye caja)
    registerPurchase: function(oem, quantity, amount) {
        if (this.updateStock(oem, quantity)) {
            let finance = JSON.parse(localStorage.getItem('zenith_finance'));
            finance.total_purchases += amount;
            finance.cash_balance -= amount;
            localStorage.setItem('zenith_finance', JSON.stringify(finance));
            this.broadcastChange('finance_updated');
            return true;
        }
        return false;
    },

    // Notificar a otros módulos abiertos en el navegador
    broadcastChange: function(type) {
        const event = new CustomEvent('zenith_sync', { detail: { type: type } });
        window.dispatchEvent(event);
        console.log(`[ZENITH SYNC] Evento: ${type} disparado.`);
    }
};

ZENITH_DATA.init();
