// Initialize cart from localStorage
let cart = JSON.parse(localStorage.getItem('cart')) || [];

// Save cart to localStorage
function saveCart() {
    localStorage.setItem('cart', JSON.stringify(cart));
}

// Update cart count badge
function updateCartCount() {
    const count = cart.reduce((sum, item) => sum + item.qty, 0);
    const badge = document.getElementById('cart-count');
    if (badge) {
        badge.textContent = count;
        badge.style.display = count > 0 ? 'flex' : 'none';
    }
}

// Render cart items
function renderCart() {
    const container = document.getElementById('cartItemsContainer');
    const emptyMessage = document.getElementById('emptyCartMessage');
    const cartContent = document.getElementById('cartContent');
    
    if (!container || !emptyMessage || !cartContent) return;

    if (cart.length === 0) {
        emptyMessage.classList.remove('hidden');
        cartContent.classList.add('hidden');
        return;
    }
    
    emptyMessage.classList.add('hidden');
    cartContent.classList.remove('hidden');
    
    container.innerHTML = cart.map((item, index) => `
        <div class="cart-item grid grid-cols-12 gap-6 p-6 items-center hover:bg-background transition-colors group" style="animation-delay: ${index * 0.1}s">
            <div class="col-span-6 flex gap-6 items-center">
                <div class="w-24 h-24 bg-background border border-outline p-2 overflow-hidden flex items-center justify-center flex-shrink-0 rounded">
                    <img src="${item.image}" class="w-full h-full object-contain mix-blend-multiply transition-transform group-hover:scale-110" alt="${item.name}">
                </div>
                <div>
                    <h4 class="text-lg font-black text-black uppercase tracking-tight leading-none mb-2">${item.name}</h4>
                    <p class="text-[9px] font-black text-on-surface-variant uppercase tracking-[0.2em]">Ref: ${item.ref}</p>
                    <button onclick="removeItem(${item.id})" class="mt-4 text-[9px] font-black text-stone-400 hover:text-red-500 uppercase tracking-widest flex items-center gap-2 remove-btn transition-colors">
                        <span class="material-symbols-outlined text-sm">delete</span> Eliminar
                    </button>
                </div>
            </div>
            <div class="col-span-2 flex justify-center">
                <div class="flex items-center border border-outline bg-background p-1 rounded">
                    <button onclick="updateQuantity(${item.id}, -1)" class="quantity-btn w-8 h-8 flex items-center justify-center text-black font-black hover:bg-white transition-colors rounded">-</button>
                    <span class="w-10 text-center font-black text-sm">${item.qty}</span>
                    <button onclick="updateQuantity(${item.id}, 1)" class="quantity-btn w-8 h-8 flex items-center justify-center text-black font-black hover:bg-white transition-colors rounded">+</button>
                </div>
            </div>
            <div class="col-span-2 text-right font-black text-on-surface-variant tracking-tighter text-sm">$${item.price.toFixed(2)}</div>
            <div class="col-span-2 text-right font-black text-black tracking-widest text-sm">$${(item.price * item.qty).toFixed(2)}</div>
        </div>
    `).join('');
    
    updateSummary();
}

// Update quantity
function updateQuantity(id, change) {
    const item = cart.find(i => i.id === id);
    if (item) {
        item.qty = Math.max(1, item.qty + change);
        saveCart();
        renderCart();
        updateCartCount();
    }
}

// Remove item
function removeItem(id) {
    cart = cart.filter(i => i.id !== id);
    saveCart();
    renderCart();
    updateCartCount();
}

// Clear cart
function clearCart() {
    if (confirm('¿Estás seguro de que deseas vaciar el carrito?')) {
        cart = [];
        saveCart();
        renderCart();
        updateCartCount();
    }
}

// Update summary
function updateSummary() {
    const subtotal = cart.reduce((sum, item) => sum + (item.price * item.qty), 0);
    const shipping = subtotal > 0 ? 45.00 : 0;
    const tax = subtotal * 0.16;
    const total = subtotal + shipping + tax;
    
    const subtotalEl = document.getElementById('subtotal');
    const shippingEl = document.getElementById('shipping');
    const taxEl = document.getElementById('tax');
    const totalEl = document.getElementById('total');

    if (subtotalEl) subtotalEl.textContent = `$${subtotal.toFixed(2)}`;
    if (shippingEl) shippingEl.textContent = shipping > 0 ? `$${shipping.toFixed(2)}` : '$0.00';
    if (taxEl) taxEl.textContent = `$${tax.toFixed(2)}`;
    if (totalEl) totalEl.textContent = `USD $${total.toFixed(2)}`;
}

// Checkout
function checkout() {
    if (cart.length === 0) {
        showNotification('Tu carrito está vacío', 'error');
        return;
    }
    showNotification('Redirigiendo al proceso de pago...', 'success');
}

function showNotification(message, type = 'success') {
    const notification = document.createElement('div');
    const bgColor = type === 'error' ? 'bg-red-600' : 'bg-green-600';
    notification.className = `fixed top-24 right-6 ${bgColor} text-white px-6 py-4 rounded-lg shadow-2xl z-50 flex items-center gap-3`;
    const icon = type === 'error' ? 'error' : 'check_circle';
    notification.innerHTML = `<span class="material-symbols-outlined text-white">${icon}</span><span class="text-sm font-bold">${message}</span>`;
    document.body.appendChild(notification);
    setTimeout(() => {
        notification.style.opacity = '0';
        notification.style.transition = 'opacity 0.3s';
        setTimeout(() => notification.remove(), 300);
    }, 3000);
}

// Search functionality
const searchInput = document.getElementById('searchInput');
if (searchInput) {
    searchInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter' && this.value.trim()) {
            window.location.href = '/tienda/catalogo_detallado?q=' + encodeURIComponent(this.value.trim());
        }
    });
}

// Initialize
document.addEventListener('DOMContentLoaded', function() {
    renderCart();
    updateCartCount();
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
