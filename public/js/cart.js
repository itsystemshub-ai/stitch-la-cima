/**
 * =============================================================
 * CART.JS — Sistema de Carrito Unificado (Stitch La Cima)
 * =============================================================
 * Este archivo centraliza TODA la lógica del carrito:
 * - Almacenamiento local (localStorage) para persistencia entre sesiones
 * - Sincronización con el servidor (API Laravel) para pedidos reales
 * - Notificaciones visuales para feedback al usuario
 * - Contador de items en el icono del carrito
 */

(function() {
    'use strict';

    // ==================== CONSTANTES ====================
    const CART_KEY = 'lacima_cart';
    const API_CART = '/api/tienda/carrito';
    const CART_PAGE = '/tienda/carrito';

    // ==================== ESTADO ====================
    let _cart = [];
    let _syncFailed = false;

    // ==================== FUNCIONES PRIVADAS ====================

    function _getCsrf() {
        return document.querySelector('meta[name="csrf-token"]')?.content || 
               document.querySelector('input[name="_token"]')?.value || '';
    }

    function _loadFromStorage() {
        try {
            const stored = localStorage.getItem(CART_KEY);
            _cart = stored ? JSON.parse(stored) : [];
        } catch(e) {
            _cart = [];
        }
        return _cart;
    }

    function _saveToStorage() {
        try {
            localStorage.setItem(CART_KEY, JSON.stringify(_cart));
        } catch(e) {
            console.error('[CART] Error al guardar en localStorage:', e);
        }
    }

    function _getTotalItems() {
        return _cart.reduce((sum, item) => sum + (parseInt(item.qty) || 0), 0);
    }

    function _getTotalPrice() {
        return _cart.reduce((sum, item) => sum + (parseFloat(item.price) || 0) * (parseInt(item.qty) || 0), 0);
    }

    function _updateBadge() {
        const badge = document.getElementById('cart-count');
        if (badge) {
            const total = _getTotalItems();
            badge.textContent = total;
            badge.style.display = total > 0 ? 'flex' : 'none';
        }
    }

    function _showNotification(message, type = 'success') {
        // Eliminar notificaciones anteriores
        document.querySelectorAll('.cart-notification').forEach(n => n.remove());
        
        const colors = {
            success: 'bg-green-600',
            error: 'bg-red-600',
            warning: 'bg-amber-500'
        };
        
        const icons = {
            success: 'check_circle',
            error: 'error',
            warning: 'warning'
        };

        const notif = document.createElement('div');
        notif.className = `cart-notification fixed top-24 right-6 z-[9999] ${colors[type] || 'bg-green-600'} text-white px-6 py-4 rounded-xl shadow-2xl flex items-center gap-3 transition-all duration-300`;
        notif.innerHTML = `
            <span class="material-symbols-outlined text-lg" style="font-variation-settings:'FILL' 1">${icons[type] || 'check_circle'}</span>
            <span class="text-sm font-bold">${message}</span>
        `;
        document.body.appendChild(notif);
        
        setTimeout(() => {
            notif.style.opacity = '0';
            notif.style.transform = 'translateX(20px)';
            notif.style.transition = 'all 0.3s ease';
            setTimeout(() => notif.remove(), 300);
        }, 2500);
    }

    function _syncToServer(productId, qty, method = 'POST', onSuccess, onError) {
        const body = method === 'DELETE' 
            ? null 
            : JSON.stringify({ product_id: productId, cantidad: qty });

        fetch(API_CART, {
            method: method,
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': _getCsrf(),
                'Accept': 'application/json'
            },
            body: body
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                _syncFailed = false;
                if (onSuccess) onSuccess(data);
            } else {
                _syncFailed = true;
                if (onError) onError(data.message || 'Error desconocido');
                _showNotification('Error al sincronizar: ' + (data.message || ''), 'error');
            }
        })
        .catch(error => {
            _syncFailed = true;
            console.error('[CART] Error de red al sincronizar:', error);
            if (onError) onError(error.message);
            _showNotification('Sin conexión al servidor. Carrito guardado localmente.', 'warning');
        });
    }

    // ==================== API PÚBLICA ====================

    window.Cart = {
        /**
         * Obtiene todos los items del carrito
         */
        getAll: function() {
            return [..._cart];
        },

        /**
         * Obtiene la cantidad total de items
         */
        getCount: function() {
            return _getTotalItems();
        },

        /**
         * Obtiene el precio total
         */
        getTotal: function() {
            return _getTotalPrice();
        },

        /**
         * Obtiene un item específico por ID
         */
        getItem: function(id) {
            return _cart.find(item => item.id == id);
        },

        /**
         * Añade un producto al carrito
         * @param {number} id - ID del producto
         * @param {string} name - Nombre del producto
         * @param {number} price - Precio unitario
         * @param {string} image - URL de imagen
         * @param {string} ref - Referencia/SKU
         * @param {number} qty - Cantidad a añadir (default: 1)
         */
        add: function(id, name, price, image, ref, qty = 1) {
            qty = parseInt(qty) || 1;
            id = parseInt(id) || id;

            // Buscar si ya existe
            const existing = _cart.find(item => item.id == id);
            
            if (existing) {
                existing.qty = (existing.qty || 0) + qty;
            } else {
                _cart.push({
                    id: id,
                    name: name || '',
                    price: parseFloat(price) || 0,
                    image: image || '',
                    ref: ref || '',
                    qty: qty,
                    addedAt: Date.now()
                });
            }

            _saveToStorage();
            _updateBadge();

            // Sincronizar con servidor (no bloquea la UI)
            _syncToServer(id, qty, 'POST');

            // Notificación de éxito
            _showNotification(`${qty}x ${name || 'Producto'} añadido`);

            console.log('[CART] Añadido:', id, name, qty);
            return true;
        },

        /**
         * Elimina un producto del carrito
         * @param {number} id - ID del producto
         */
        remove: function(id) {
            const index = _cart.findIndex(item => item.id == id);
            if (index > -1) {
                const removed = _cart.splice(index, 1)[0];
                _saveToStorage();
                _updateBadge();

                // Sincronizar con servidor
                _syncToServer(id, 0, 'DELETE');

                _showNotification(`${removed.name || 'Producto'} eliminado`);
            }
        },

        /**
         * Actualiza la cantidad de un producto
         * @param {number} id - ID del producto
         * @param {number} qty - Nueva cantidad
         */
        updateQty: function(id, qty) {
            qty = parseInt(qty) || 1;
            const item = _cart.find(item => item.id == id);
            if (item) {
                if (qty <= 0) {
                    this.remove(id);
                } else {
                    item.qty = qty;
                    _saveToStorage();
                    _updateBadge();
                    _syncToServer(id, qty, 'PUT');
                }
            }
        },

        /**
         * Incrementa la cantidad de un producto
         * @param {number} id - ID del producto
         */
        increment: function(id) {
            const item = _cart.find(item => item.id == id);
            if (item) {
                this.updateQty(id, (item.qty || 0) + 1);
            }
        },

        /**
         * Decrementa la cantidad de un producto
         * @param {number} id - ID del producto
         */
        decrement: function(id) {
            const item = _cart.find(item => item.id == id);
            if (item && item.qty > 1) {
                this.updateQty(id, item.qty - 1);
            } else {
                this.remove(id);
            }
        },

        /**
         * Vacía el carrito completamente
         */
        clear: function() {
            _cart = [];
            _saveToStorage();
            _updateBadge();
            _showNotification('Carrito vaciado');
        },

        /**
         * Verifica si el carrito está vacío
         */
        isEmpty: function() {
            return _cart.length === 0;
        },

        /**
         * Verifica si hay errores de sincronización pendientes
         */
        hasSyncErrors: function() {
            return _syncFailed;
        },

        /**
         * Reintenta sincronizar con el servidor
         */
        retrySync: function() {
            if (!_syncFailed) return;

            _cart.forEach(item => {
                _syncToServer(item.id, item.qty, 'POST');
            });

            _syncFailed = false;
            _showNotification('Sincronizando carrito...');
        },

        /**
         * Actualiza el badge del carrito en la UI
         */
        updateBadge: function() {
            _loadFromStorage();
            _updateBadge();
        },

        /**
         * Inicializa el carrito (debe llamarse al cargar la página)
         */
        init: function() {
            _loadFromStorage();
            _updateBadge();

            // Listener para sincronizar entre pestañas
            window.addEventListener('storage', function(e) {
                if (e.key === CART_KEY) {
                    _loadFromStorage();
                    _updateBadge();
                    console.log('[CART] Sincronizado desde otra pestaña');
                }
            });

            console.log('[CART] Inicializado con', _cart.length, 'items');
        }
    };

    // ==================== SHORTCUT GLOBAL ====================

    /**
     * Función global addToCart (compatible con código existente)
     */
    window.addToCart = function(id, name, price, image, ref, qty) {
        return window.Cart.add(id, name, price, image, ref, qty);
    };

    // ==================== AUTO-INICIALIZAR ====================
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', () => window.Cart.init());
    } else {
        window.Cart.init();
    }

})();