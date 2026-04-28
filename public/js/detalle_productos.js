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
        
        // Update stock visibility logic
        const stockEl = document.getElementById('stockStatus');
        if (stockEl) stockEl.closest('span').classList.add('hidden');
        
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
        
        // Update Bs price - REMOVED per user request
        // document.getElementById('productPriceBs').textContent = 'Bs. ' + (product.price * 36).toFixed(2) + ' aprox. | IVA incluido';
        
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
        
        // Update specs table - Zenith Industrial Standard: 12px labels / 10.5px values
        document.getElementById('specsTable').innerHTML = '<table class="w-full border-separate border-spacing-0"><tbody class="text-[12px] font-black uppercase tracking-tight">' +
            product.specs.map((s, i) => `
                <tr class="bg-white border-b border-stone-100 hover:bg-stone-50 transition-colors group">
                    <td class="px-8 py-5 text-stone-500 bg-stone-50/50 w-1/3 border-r border-stone-100 italic transition-all group-hover:pl-10">${s.label}</td>
                    <td class="px-8 py-5 text-stone-900 font-mono text-[10.5px] tracking-widest">${s.value}</td>
                </tr>`).join('') +
            '</tbody></table>';
        
        // Update compatibility - Industrial Clarity: 12px
        document.getElementById('compatibilityGrid').innerHTML = product.compatibility.map(c => `
            <div class="p-6 border-l-4 border-primary bg-white rounded-r-3xl shadow-sm hover:shadow-xl transition-all group active:scale-[0.98]">
                <p class="text-stone-400 mb-2 text-[9px] font-black uppercase tracking-[0.3em] italic">${c.title}</p>
                <p class="text-stone-900 text-[12px] font-black uppercase tracking-tight">${c.desc}</p>
            </div>
        `).join('');
        
        // Update installation
        document.getElementById('installationSteps').innerHTML = product.installation.map(s => `
            <div class="flex gap-6 items-start group">
                <div class="w-12 h-12 bg-stone-900 rounded-2xl flex items-center justify-center flex-shrink-0 text-primary font-black shadow-lg shadow-black/20 group-hover:bg-primary group-hover:text-black transition-all">
                    <span class="text-[14px]">${s.step}</span>
                </div>
                <div>
                    <h4 class="font-black uppercase text-[12px] tracking-widest mb-1 text-stone-900 italic">${s.title}</h4>
                    <p class="text-[11px] text-stone-500 font-bold uppercase tracking-tight leading-relaxed">${s.desc}</p>
                </div>
            </div>
        `).join('');
        
        // Update related products - Zenith Industrial Product Cards: 12px
        const related = (window.relatedProductsData && window.relatedProductsData.length > 0) 
            ? window.relatedProductsData 
            : productsDB.filter(p => p.id !== product.id).sort(() => Math.random() - 0.5).slice(0, 4);
            
        document.getElementById('relatedProducts').innerHTML = related.map(p => `
            <div class="group bg-white border border-stone-200 rounded-[30px] overflow-hidden hover:shadow-2xl transition-all duration-500 block relative">
                <a href="/tienda/detalle_productos?id=${p.id}" class="block">
                    <div class="relative aspect-square bg-stone-50 overflow-hidden flex items-center justify-center p-8">
                        <img src="${p.image || (p.images ? p.images[0] : '')}" class="w-full h-full object-contain mix-blend-multiply group-hover:scale-110 transition-transform duration-700">
                    </div>
                </a>
                <div class="p-6">
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-[9px] font-black text-primary uppercase tracking-[0.2em] bg-stone-900 px-2 py-0.5">${p.category || 'GENUINE_PART'}</span>
                        <span class="text-[10.5px] font-mono font-bold text-stone-400 bg-stone-50 px-2 py-0.5 rounded border border-stone-100">#${p.sku || 'REF'}</span>
                    </div>
                    <a href="/tienda/detalle_productos?id=${p.id}" class="block">
                        <h4 class="text-[16px] font-headline font-black uppercase tracking-tighter mb-4 group-hover:text-primary transition-colors line-clamp-1 italic" title="${p.name}">${p.name}</h4>
                    </a>
                    <div class="mb-6 bg-stone-50 p-4 rounded-2xl border border-stone-100">
                        <p class="text-2xl font-headline font-black text-stone-900 tracking-tighter flex items-start gap-1">
                            <span class="text-xs mt-1">$</span>
                            <span class="font-mono tracking-tight">${p.price.toFixed(2)}</span>
                        </p>
                    </div>
                    
                    <div class="flex items-center gap-2">
                        <div class="flex items-center bg-stone-900 rounded-xl p-1 h-11 border border-stone-800">
                            <button type="button" class="w-8 h-8 flex items-center justify-center rounded-lg hover:bg-stone-800 text-stone-400 transition-all" onclick="this.parentNode.querySelector('input').stepDown()">
                                <span class="material-symbols-outlined text-xs font-black">remove</span>
                            </button>
                            <input type="number" value="1" min="1" class="w-full flex-1 bg-transparent border-none focus:ring-0 font-black text-[12px] p-0 text-center text-white [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none" placeholder="1" />
                            <button type="button" class="w-8 h-8 flex items-center justify-center rounded-lg hover:bg-stone-800 text-stone-400 transition-all" onclick="this.parentNode.querySelector('input').stepUp()">
                                <span class="material-symbols-outlined text-xs font-black">add</span>
                            </button>
                        </div>
                        <button onclick="Cart.add(${p.id}, '${p.name.replace(/'/g, "\\'")}', ${p.price}, '${p.image || (p.images ? p.images[0] : '')}', '${p.brand} / ${p.sku}', this.previousElementSibling.querySelector('input').value)" class="flex-1 bg-primary text-stone-900 hover:bg-white hover:text-stone-900 h-11 px-3 rounded-xl font-black uppercase text-[10px] tracking-widest flex items-center justify-center gap-2 transition-all active:scale-95 shadow-lg shadow-primary/10">
                            <span class="material-symbols-outlined text-lg">add_shopping_cart</span>
                            Adquirir
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