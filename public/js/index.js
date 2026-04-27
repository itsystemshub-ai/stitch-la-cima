// INDEX.JS - usa el módulo cart.js centralizado
// Las funciones getCart, saveCart, addToCart ya están en cart.js

console.log('[INDEX.JS] Módulo de inicio cargado (usa cart.js centralizado)');

// Actualizar badge al cargar
document.addEventListener('DOMContentLoaded', function() {
    Cart.updateBadge();
});

    function showNotification(message) {
        const notification = document.createElement('div');
        notification.className = 'fixed top-24 right-6 bg-black text-white px-6 py-4 rounded-lg shadow-2xl z-50 flex items-center gap-3';
        notification.innerHTML = '<span class="material-symbols-outlined text-primary">check_circle</span><span class="text-sm font-bold">' + message + '</span>';
        document.body.appendChild(notification);

        setTimeout(() => {
            notification.style.opacity = '0';
            notification.style.transition = 'opacity 0.3s ease';
            setTimeout(() => notification.remove(), 300);
        }, 2000);
    }

    // ==================== SEARCH FUNCTIONALITY ====================
    const searchInput = document.getElementById('searchInput');
    if (searchInput) {
        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter' && this.value.trim()) {
                window.location.href = '/tienda/catalogo_detallado?q=' + encodeURIComponent(this.value.trim());
            }
        });
    }

    const quickSearch = document.getElementById('quickSearch');
    if (quickSearch) {
        quickSearch.addEventListener('keypress', function(e) {
            if (e.key === 'Enter' && this.value.trim()) {
                window.location.href = '/tienda/catalogo_detallado?q=' + encodeURIComponent(this.value.trim());
            }
        });
    }

    // ==================== INICIALIZAR ====================
    console.log('[LA CIMA] JS cargado correctamente');
    if (typeof Cart !== 'undefined' && Cart.updateBadge) {
        Cart.updateBadge();
    }

    function searchProducts() {
        const brand = document.getElementById('searchBrand')?.value || '';
        const category = document.getElementById('searchCategory')?.value || '';
        const fabricante = document.getElementById('searchFabricante')?.value || '';
        const quick = document.getElementById('quickSearch')?.value?.trim() || '';

        let queryParts = [];
        if (brand) queryParts.push(brand);
        if (category) queryParts.push(category);
        if (fabricante) queryParts.push(fabricante);
        if (quick) queryParts.push(quick);

        if (queryParts.length === 0) {
            showNotification('Seleccione al menos un filtro o escriba una búsqueda');
            return;
        }

        let query = queryParts.join(' ');

        // Add related keywords for smarter search
        let relatedTerms = [];
        if (brand === 'Cummins') relatedTerms = ['motor', 'repuesto', 'inyector', 'filtro', 'pistón', 'turbo'];
        else if (brand === 'Caterpillar') relatedTerms = ['CAT', 'motor', 'repuesto', 'excavadora'];
        else if (brand === 'Volvo') relatedTerms = ['Volvo Penta', 'motor', 'repuesto', 'camión'];
        else if (brand === 'Detroit Diesel') relatedTerms = ['DD15', 'DD13', 'motor', 'inyector', 'turbo'];
        else if (brand === 'Toyota') relatedTerms = ['Hilux', 'Corolla', 'motor', 'freno', 'suspensión'];
        else if (brand === 'Ford') relatedTerms = ['F-150', 'motor', 'repuesto', 'camión'];

        if (model === 'D13') relatedTerms.push('Volvo D13', 'motor D13', 'repuesto D13');
        else if (model === 'DD15') relatedTerms.push('Detroit DD15', 'motor DD15');
        else if (model === 'C15') relatedTerms.push('CAT C15', 'motor C15');
        else if (model === 'ISX15') relatedTerms.push('Cummins ISX', 'motor ISX15');

        if (relatedTerms.length > 0) query += ' ' + relatedTerms.join(' ');

        window.location.href = '/tienda/catalogo_detallado?q=' + encodeURIComponent(query);
    }

    // ==================== MOBILE MENU ====================
    function openMobileMenu() {
        document.getElementById('mobileMenu').classList.remove('hidden');
        document.getElementById('mobileNav').classList.remove('-translate-x-full');
        document.body.style.overflow = 'hidden';
    }

    function closeMobileMenu() {
        document.getElementById('mobileMenu').classList.add('hidden');
        document.getElementById('mobileNav').classList.add('-translate-x-full');
        document.body.style.overflow = '';
    }

    // ==================== SCROLL TO TOP ====================
    const scrollTopBtn = document.getElementById('scrollTopBtn');
    if (scrollTopBtn) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 500) {
                scrollTopBtn.classList.remove('hidden');
            } else {
                scrollTopBtn.classList.add('hidden');
            }
        });
    }

    // ==================== PWA SERVICE WORKER & INSTALL ====================
    if ('serviceWorker' in navigator) {
        window.addEventListener('load', () => {
            navigator.serviceWorker.register('../service-worker.js')
                .then(reg => console.log('[PWA] Service Worker registrado'))
                .catch(err => console.log('[PWA] Error al registrar SW:', err));
        });
    }

    let deferredPrompt;
    const installContainer = document.getElementById('pwaInstallContainer');
    const installBtn = document.getElementById('pwaInstallBtn');

    window.addEventListener('beforeinstallprompt', (e) => {
        e.preventDefault();
        deferredPrompt = e;
        if (installContainer) {
            installContainer.classList.remove('hidden');
        }
    });

    if (installBtn) {
        installBtn.addEventListener('click', async () => {
            if (!deferredPrompt) return;
            deferredPrompt.prompt();
            const { outcome } = await deferredPrompt.userChoice;
            if (outcome === 'accepted') {
                console.log('[PWA] Usuario aceptó la instalación');
            }
            deferredPrompt = null;
            installContainer.classList.add('hidden');
        });
    }

    window.addEventListener('appinstalled', () => {
        if (installContainer) {
            installContainer.classList.add('hidden');
        }
        deferredPrompt = null;
    });

    // ==================== INITIALIZE ====================
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof Cart !== 'undefined' && Cart.updateBadge) {
            Cart.updateBadge();
        }
    });