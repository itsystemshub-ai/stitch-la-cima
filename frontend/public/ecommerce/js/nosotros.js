const searchInput = document.getElementById('searchInput');
    if (searchInput) {
        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter' && this.value.trim()) {
                window.location.href = 'catalogo_detallado.html?q=' + encodeURIComponent(this.value.trim());
            }
        });
    }

    // ==================== CART ====================
    function getCart() { return JSON.parse(localStorage.getItem('cart')) || []; }
    function updateCartCount() {
        const cart = getCart();
        const count = cart.reduce((sum, item) => sum + item.qty, 0);
        const badge = document.getElementById('cart-count');
        if (badge) { badge.textContent = count; badge.style.display = count > 0 ? 'flex' : 'none'; }
    }

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

    document.addEventListener('DOMContentLoaded', updateCartCount);