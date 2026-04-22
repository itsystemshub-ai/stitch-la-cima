    // Usar base de datos inyectada por el servidor o fallback vacío
    const productsDB = window.productData ? [window.productData] : [];

    // ==================== FUNCIONES ====================
    let currentProduct = null;

    function getProductFromURL() {
        if (window.productData) return window.productData;
        const params = new URLSearchParams(window.location.search);
        const id = parseInt(params.get('id')) || 1;
        return productsDB.find(p => p.id === id) || productsDB[0];
    }

    function renderProduct(product) {
        currentProduct = product;
        
        // Update title
        document.getElementById('pageTitle').textContent = product.name + ' | LA CIMA';
        
        // Update breadcrumb
        document.getElementById('breadcrumbBrand').textContent = product.brand;
        document.getElementById('breadcrumbProduct').textContent = product.name;
        
        // Update brand badge
        document.getElementById('productBrand').textContent = product.brand.toUpperCase();
        
        // Update title
        document.getElementById('productTitle').textContent = product.name;
        
        // Update SKU
        document.getElementById('productSKU').textContent = 'SKU: #' + product.sku;
        
        // Update stock
        document.getElementById('stockStatus').textContent = product.stockText;
        
        // Update price
        document.getElementById('productPrice').textContent = '$' + product.price.toFixed(2);
        
        const oldPriceEl = document.getElementById('productOldPrice');
        const discountEl = document.getElementById('productDiscount');
        const discountBadge = document.getElementById('discountBadge');
        
        if (product.oldPrice) {
            oldPriceEl.textContent = '$' + product.oldPrice.toFixed(2);
            oldPriceEl.classList.remove('hidden');
            discountEl.textContent = '-' + product.discount + '%';
            discountEl.classList.remove('hidden');
            discountBadge.textContent = '-' + product.discount + '% OFF';
            discountBadge.classList.remove('hidden');
        } else {
            oldPriceEl.classList.add('hidden');
            discountEl.classList.add('hidden');
            discountBadge.classList.add('hidden');
        }
        
        // Update Bs price
        document.getElementById('productPriceBs').textContent = 'Bs. ' + (product.price * 36).toFixed(2) + ' aprox. | IVA incluido';
        
        // Update main image
        document.getElementById('mainImage').src = product.images[0];
        document.getElementById('mainImage').alt = product.name;
        
        // Update thumbnails
        const thumbsContainer = document.getElementById('thumbnails');
        thumbsContainer.innerHTML = product.images.map((img, i) => `
            <button onclick="changeImage(this)" class="${i === 0 ? 'thumb-active' : 'opacity-60'} aspect-square bg-white border-2 ${i === 0 ? 'border-primary' : 'border-outline'} rounded-xl p-2 overflow-hidden flex items-center justify-center hover:border-primary transition-all">
                <img src="${img}" class="w-full h-full object-contain mix-blend-multiply">
            </button>
        `).join('') + `<button onclick="handle360View()" class="aspect-square bg-stone-100 border-2 border-outline rounded-xl flex items-center justify-center text-on-surface-variant hover:text-black hover:border-primary transition-colors cursor-pointer"><span class="material-symbols-outlined text-3xl">360</span></button>`;
        
        // Update technical note
        document.getElementById('technicalNoteText').textContent = product.technicalNote;
        
        // Update specs table
        document.getElementById('specsTable').innerHTML = '<table class="w-full"><tbody class="text-xs font-black uppercase tracking-widest">' +
            product.specs.map((s, i) => `<tr class="bg-white border-b border-outline hover:bg-background transition-colors"><td class="px-8 py-5 text-on-surface-variant bg-background w-1/3">${s.label}</td><td class="px-8 py-5 text-black">${s.value}</td></tr>`).join('') +
            '</tbody></table>';
        
        // Update compatibility
        document.getElementById('compatibilityGrid').innerHTML = product.compatibility.map(c => `
            <div class="p-6 border-l-4 border-primary bg-white rounded-r-xl shadow-sm hover:shadow-md transition-shadow">
                <p class="text-on-surface-variant mb-2 text-[10px] font-bold uppercase tracking-widest">${c.title}</p>
                <p class="text-black text-sm font-bold">${c.desc}</p>
            </div>
        `).join('');
        
        // Update installation
        document.getElementById('installationSteps').innerHTML = product.installation.map(s => `
            <div class="flex gap-4">
                <div class="w-10 h-10 bg-primary rounded-full flex items-center justify-center flex-shrink-0 text-black font-black">${s.step}</div>
                <div>
                    <h4 class="font-black uppercase text-sm mb-1">${s.title}</h4>
                    <p class="text-xs text-on-surface-variant font-medium leading-relaxed">${s.desc}</p>
                </div>
            </div>
        `).join('');
        
        // Update related products (show products injected from server)
        const related = (window.relatedProductsData && window.relatedProductsData.length > 0) 
            ? window.relatedProductsData 
            : productsDB.filter(p => p.id !== product.id).sort(() => Math.random() - 0.5).slice(0, 4);
            
        document.getElementById('relatedProducts').innerHTML = related.map(p => `
            <div class="group bg-white border border-outline rounded-2xl overflow-hidden hover:shadow-xl transition-all block">
                <a href="/tienda/detalle_productos?id=${p.id}" class="block">
                    <div class="relative aspect-square bg-stone-50 overflow-hidden flex items-center justify-center p-8">
                        <img src="${p.image || (p.images ? p.images[0] : '')}" class="w-full h-full object-contain mix-blend-multiply group-hover:scale-110 transition-transform duration-500">
                    </div>
                </a>
                <div class="p-6">
                    <div class="flex justify-between items-start mb-2">
                        <span class="text-[10px] font-black text-primary uppercase tracking-widest">${p.category || p.brand}</span>
                        <span class="text-[10px] font-mono font-bold text-stone-400">#${p.sku || 'N/A'}</span>
                    </div>
                    <a href="/tienda/detalle_productos?id=${p.id}" class="block">
                        <h4 class="text-lg font-black uppercase tracking-tight mb-4 group-hover:text-primary transition-colors line-clamp-1" title="${p.name}">${p.name}</h4>
                    </a>
                    <div class="mb-4">
                        <p class="text-2xl font-black text-black tracking-tighter">$${p.price.toFixed(2)}</p>
                    </div>
                    
                    <div class="flex items-center gap-2">
                        <div class="flex items-center bg-stone-100 rounded-lg p-1 h-10 border border-stone-200">
                            <button type="button" class="w-8 h-8 flex items-center justify-center rounded-md hover:bg-white hover:shadow-sm transition-all text-stone-600 active:scale-90" onclick="this.parentNode.querySelector('input').stepDown()">
                                <span class="material-symbols-outlined text-sm font-black">remove</span>
                            </button>
                            <input type="number" value="1" min="1" class="w-8 text-center bg-transparent border-none focus:ring-0 font-black text-xs p-0 pointer-events-none" readonly />
                            <button type="button" class="w-8 h-8 flex items-center justify-center rounded-md hover:bg-white hover:shadow-sm transition-all text-stone-600 active:scale-90" onclick="this.parentNode.querySelector('input').stepUp()">
                                <span class="material-symbols-outlined text-sm font-black">add</span>
                            </button>
                        </div>
                        <button onclick="Cart.add(${p.id}, '${p.name.replace(/'/g, "\\'")}', ${p.price}, '${p.image || (p.images ? p.images[0] : '')}', '${p.brand} / ${p.sku}', this.previousElementSibling.querySelector('input').value)" class="flex-1 bg-black text-white hover:bg-primary hover:text-black h-10 px-3 rounded-lg font-black uppercase text-[9px] tracking-widest flex items-center justify-center gap-2 transition-all active:scale-95 shadow-sm">
                            <span class="material-symbols-outlined text-base">shopping_cart</span>
                            Añadir
                        </button>
                    </div>
                </div>
            </div>
        `).join('');
    }

    function changeImage(thumb) {
        const mainImg = document.getElementById('mainImage');
        const thumbImg = thumb.querySelector('img');
        if (thumbImg) {
            mainImg.src = thumbImg.src;
        }
        document.querySelectorAll('#thumbnails button').forEach(t => {
            t.classList.remove('thumb-active');
            t.classList.add('opacity-60');
            t.classList.remove('border-primary');
            t.classList.add('border-outline');
        });
        thumb.classList.add('thumb-active');
        thumb.classList.remove('opacity-60');
        thumb.classList.remove('border-outline');
        thumb.classList.add('border-primary');
    }

    function updateQty(change) {
        const input = document.getElementById('qtyInput');
        let val = parseInt(input.value) || 1;
        val = Math.max(1, Math.min(99, val + change));
        input.value = val;
    }

    function switchTab(tabId) {
        document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));
        document.querySelectorAll('.tab-btn').forEach(b => {
            b.classList.remove('border-primary', 'text-black');
            b.classList.add('border-transparent', 'text-on-surface-variant');
        });
        document.getElementById('content-' + tabId).classList.add('active');
        const btn = document.getElementById('tab-' + tabId);
        btn.classList.add('border-primary', 'text-black');
        btn.classList.remove('border-transparent', 'text-on-surface-variant');
    }

    // Usa el módulo cart.js centralizado
    function addToCartFromDetail() {
        if (!currentProduct) return;
        const qty = parseInt(document.getElementById('qtyInput').value) || 1;
        
        Cart.add(
            currentProduct.id,
            currentProduct.name,
            currentProduct.price,
            currentProduct.images[0],
            currentProduct.brand + ' / ' + currentProduct.sku,
            qty
        );
    }

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

    const scrollTopBtn = document.getElementById('scrollTopBtn');
    window.addEventListener('scroll', function() {
        if (window.scrollY > 500) scrollTopBtn.classList.remove('hidden');
        else scrollTopBtn.classList.add('hidden');
    });

    const searchInput = document.getElementById('searchInput');
    if (searchInput) {
        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter' && this.value.trim()) {
                window.location.href = '/tienda/catalogo_detallado?q=' + encodeURIComponent(this.value.trim());
            }
        });
    }

    if ('serviceWorker' in navigator) {
        window.addEventListener('load', () => {
            navigator.serviceWorker.register('../service-worker.js').catch(() => {});
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        const product = getProductFromURL();
        renderProduct(product);
        Cart.updateBadge();
        checkFavorite(product.id);
    });

    // ==================== FAVORITES ====================
    function toggleFavorite() {
        if (!currentProduct) return;
        let favorites = JSON.parse(localStorage.getItem('favorites') || '[]');
        const index = favorites.indexOf(currentProduct.id);
        const icon = document.getElementById('favoriteIcon');
        if (index > -1) {
            favorites.splice(index, 1);
            icon.textContent = 'favorite_border';
            showNotification('Eliminado de favoritos');
        } else {
            favorites.push(currentProduct.id);
            icon.textContent = 'favorite';
            showNotification('Agregado a favoritos');
        }
        localStorage.setItem('favorites', JSON.stringify(favorites));
    }

    function checkFavorite(productId) {
        const favorites = JSON.parse(localStorage.getItem('favorites') || '[]');
        const icon = document.getElementById('favoriteIcon');
        if (favorites.includes(productId)) {
            icon.textContent = 'favorite';
        }
    }

    // ==================== 360 VIEW ====================
    function handle360View() {
        showNotification('Vista 360 disponible próximamente');
    }

    // ==================== NOTIFICATIONS ====================
    function showNotification(message) {
        const notification = document.createElement('div');
        notification.className = 'fixed top-24 right-6 bg-black text-white px-6 py-4 rounded-lg shadow-2xl z-50 flex items-center gap-3';
        notification.innerHTML = '<span class="material-symbols-outlined text-primary">info</span><span class="text-sm font-bold">' + message + '</span>';
        document.body.appendChild(notification);
        setTimeout(() => {
            notification.style.opacity = '0';
            notification.style.transition = 'opacity 0.3s';
            setTimeout(() => notification.remove(), 300);
        }, 2000);
    }