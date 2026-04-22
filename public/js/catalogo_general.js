/**
 * CATÁLOGO GENERAL - usa el módulo cart.js centralizado
 * Las funciones getCart, saveCart, addToCart ya están en cart.js
 */

// Actualizar badge al cargar
document.addEventListener('DOMContentLoaded', function() {
    Cart.updateBadge();
});

    // ==================== MOBILE MENU ====================
    function openMobileMenu() {
        document.getElementById('mobileMenu').classList.remove('hidden');
        document.getElementById('mobileNav').classList.remove('-translate-x-full');
        document.getElementById('mobileNav').classList.add('open');
        document.body.style.overflow = 'hidden';
    }
    function closeMobileMenu() {
        document.getElementById('mobileMenu').classList.add('hidden');
        document.getElementById('mobileNav').classList.add('-translate-x-full');
        document.getElementById('mobileNav').classList.remove('open');
        document.body.style.overflow = '';
    }

    // ==================== FILTROS DE CATEGORÍA ====================
    function filterProducts(category) {
        const articles = document.querySelectorAll('#productGrid article');
        const buttons = document.querySelectorAll('.filter-btn');
        
        buttons.forEach(btn => {
            if (btn.dataset.category === category || (category === 'all' && btn.textContent.includes('Todos'))) {
                btn.classList.add('bg-black', 'text-primary');
                btn.classList.remove('bg-white', 'text-black');
            } else {
                btn.classList.remove('bg-black', 'text-primary');
                btn.classList.add('bg-white', 'text-black');
            }
        });

        articles.forEach(article => {
            if (category === 'all' || article.dataset.category === category) {
                article.style.display = '';
            } else {
                article.style.display = 'none';
            }
        });
    }

    // ==================== SCROLL TO TOP ====================
    const scrollTopBtn = document.getElementById('scrollTopBtn');
    if (scrollTopBtn) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 500) scrollTopBtn.classList.remove('hidden');
            else scrollTopBtn.classList.add('hidden');
        });
    }

    // ==================== PWA INSTALL ====================
    let deferredPrompt;
    const installContainer = document.getElementById('pwaInstallContainer');
    const installBtn = document.getElementById('pwaInstallBtn');
    if (installBtn) {
        window.addEventListener('beforeinstallprompt', (e) => {
            e.preventDefault();
            deferredPrompt = e;
            if (installContainer) installContainer.classList.remove('hidden');
        });
        installBtn.addEventListener('click', async () => {
            if (!deferredPrompt) return;
            deferredPrompt.prompt();
            await deferredPrompt.userChoice;
            deferredPrompt = null;
            if (installContainer) installContainer.classList.add('hidden');
        });
    }