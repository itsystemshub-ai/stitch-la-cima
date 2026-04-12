/**
 * ZENITH E-COMMERCE SYNC - El Puente de Integración
 * Sincroniza la tienda online con el inventario real del ERP.
 * Mayor de Repuesto La Cima, C.A.
 */

const ZENITH_ECOMMERCE = {
    // Sincronizar catálogo visual con la data del ERP
    syncInventory: function() {
        const erpInventory = JSON.parse(localStorage.getItem('zenith_inventory'));
        if (!erpInventory) return;

        console.log("[ZENITH SHOP] Sincronizando stock desde ERP...");
        
        // Simulación: Actualizar los indicadores de stock en la tienda
        // (En un sistema real, esto conectaría vía API)
        erpInventory.forEach(item => {
            const stockElements = document.querySelectorAll(`[data-oem="${item.oem}"] .stock-indicator`);
            stockElements.forEach(el => {
                el.innerText = `STOCK: ${item.stock > 0 ? '+' : ''}${item.stock}`;
                if (item.stock <= 5) el.className = "text-[10px] font-bold text-red-600 uppercase";
            });
        });
    },

    // Notificar al ERP sobre una nueva orden web
    processWebOrder: function(cartItems) {
        console.log("[ZENITH SHOP] Procesando Orden Web y notificando al ERP...");
        
        cartItems.forEach(item => {
            // Usamos el motor de datos del ERP para descontar stock
            if (window.ZENITH_DATA) {
                window.ZENITH_DATA.registerSale(item.oem, item.quantity, item.total);
            }
        });

        alert("¡Pedido Sincronizado con el Almacén Central de La Cima!");
    },

    init: function() {
        // Escuchar cambios de stock desde el ERP (si están en diferentes pestañas)
        window.addEventListener('zenith_sync', (e) => {
            if (e.detail.type === 'inventory_updated') {
                this.syncInventory();
            }
        });

        this.syncInventory();
    }
};

window.addEventListener('DOMContentLoaded', () => ZENITH_ECOMMERCE.init());
