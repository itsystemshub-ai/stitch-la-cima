function getCart() {
        return JSON.parse(localStorage.getItem('cart')) || [];
    }
    
    function saveCart(cart) {
        localStorage.setItem('cart', JSON.stringify(cart));
    }
    
    function updateCartCounter() {
        const cart = getCart();
        const count = cart.reduce((sum, item) => sum + item.qty, 0);
        const badge = document.getElementById('cart-count');
        if (badge) {
            badge.textContent = count;
            badge.style.display = count > 0 ? 'flex' : 'none';
        }
    }
    
    function addToCart(id, name, price, image, ref) {
        let cart = getCart();
        const existingItem = cart.find(item => item.id === id);
        
        if (existingItem) {
            existingItem.qty += 1;
        } else {
            cart.push({ id, name, price, image, ref, qty: 1 });
        }
        
        saveCart(cart);
        updateCartCounter();
        
        const notification = document.createElement('div');
        notification.className = 'fixed top-24 right-6 bg-black text-white px-6 py-4 rounded-lg shadow-2xl z-50 flex items-center gap-3';
        notification.innerHTML = '<span class="material-symbols-outlined text-primary">check_circle</span><span class="text-sm font-bold">' + name + ' agregado</span>';
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.style.opacity = '0';
            notification.style.transition = 'opacity 0.3s ease';
            setTimeout(() => notification.remove(), 300);
        }, 2000);
    }
    
    document.addEventListener('DOMContentLoaded', updateCartCounter);

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
