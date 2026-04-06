/**
 * Index Page - La Cima Zenith ERP
 * Page-specific functionality: search, cart, featured products
 */

// Product database for intelligent search
const productDatabase = [
  { id: 'TRB-VGT-84521', name: 'Turboalimentador Variable VGT', oem: '28231-27000', category: 'Motor', brand: 'Toyota', vehicle: 'Hilux 2016-2020', price: '$845.00', image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuDRn-wdKgaOpSBynFvnr0e_fmpdUwmPnpozU-NafufUaamlmKKGX6d-dkHr2aj7_nDx-AKznW0KzL5fIjYG7gtzalG2_9IuNT-hTRWpJiQeJzZ8511dZsT6tl5qkDqAo8LX7qK-hVKM713GcUlIo5wK0hJMgn8yJDs7Of6LasPy_8C4MbxFJrKC_7-xXWWCDrchCbWw_snA5feSSKqCid71lSKHG6-nFtzz1O8S3ya-CRGXCpluZVnH6mf88Zf6m9L0V_NoXpdkOA' },
  { id: 'BRK-9004-HD', name: 'Pastillas de Freno Heavy Duty', oem: '04465-35290', category: 'Frenos', brand: 'Toyota', vehicle: 'Land Cruiser 2016+', price: '$129.50', image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuCNjAH9S_Dx8VtU7mF1yl1gIoO1HHxRUQR20jPWmEZ_fWPK0Lf-aqaHg5SbId7ALpHlPm1IBVe6hQPm83-NLF_KRSd1NILUJYVRLn7UO6bSjWbJHrwIEjbFqo-DEe4gv3JFYAtDUXn6VNxmvX1mo4hAlQY5e3qx9t69T02-YM-fgbgyu5g29n1SbpBH5IfDiboMUFBwLW5HUBLf0gL-uFhYCkYCmLrNxaXuJfXidw71gc1TWNKpa50EjrPRsAU9-GWS_sIc880L1A' },
  { id: 'KIT-MT-2024', name: 'Kit de Filtros Mantenimiento', oem: 'HF28953', category: 'Filtros', brand: 'Ford', vehicle: 'Ranger Raptor 2019+', price: '$54.00', image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuD1LXppgzwzoDNtBCTum-3mUotkQKZr4efvjDbwAOBjwjJE2xZCUgtXD8SPX-_Nrqm76VjHKjH7dT9dKprmE0OBFhJprM5FcDSVVREanO0F4r8SMiO-hTRsbWq77Oy4vN8Zk7C5pJiqCntBy0l2e0yWjv_L5WjI7HIX-r13bq1FI_0xFhYGlLvThi__IzNvRhTRxJ6WmLoXd6SFCDRN_G_2vR0jLH5i2il3DtSt1QLW1MmUWGZsxfKHSnOmdfpVN-ai4OREYR2giw' },
  { id: 'OPT-8820-LED', name: 'Óptica Frontal LED Proyección', oem: '81110-02U80', category: 'Carrocería', brand: 'Toyota', vehicle: 'Corolla X50 2018-2022', price: '$210.00', image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuCrcJwmgPZi9HdRxqunTqDBpRfn4pF3cktXGtXeDeErJkw6Qr0CH6OOarSUXnpPzyA7DqT72dqcSy8u7-h3VsSX86XAAENjxgioCB4WNZwfXPtuR6AxXXTNotht--sFm_e7RL3FjkeUQfE-26tCftzD_frwFhDn1XAoncUkfQRnsU3VZ__P2TJjqMRUe7brF9pyOJYrpl2CyEHUYkAYbJ1zHE9sm8r21lspqmBh19bYhggjkEl8P1sXmOyTVSzh8pvZyxase_kxuQ' },
  { id: 'DIS-4421-VTL', name: 'Kit de Discos de Freno Ventilados', oem: '43512-60290', category: 'Frenos', brand: 'Toyota', vehicle: 'Land Cruiser 2015+', price: '$85.00', image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuCNjAH9S_Dx8VtU7mF1yl1gIoO1HHxRUQR20jPWmEZ_fWPK0Lf-aqaHg5SbId7ALpHlPm1IBVe6hQPm83-NLF_KRSd1NILUJYVRLn7UO6bSjWbJHrwIEjbFqo-DEe4gv3JFYAtDUXn6VNxmvX1mo4hAlQY5e3qx9t69T02-YM-fgbgyu5g29n1SbpBH5IfDiboMUFBwLW5HUBLf0gL-uFhYCkYCmLrNxaXuJfXidw71gc1TWNKpa50EjrPRsAU9-GWS_sIc880L1A' },
  { id: 'INJ-CAT-882', name: 'Inyector de Combustible Heavy Duty', oem: 'CAT-882', category: 'Motor', brand: 'Caterpillar', vehicle: 'CAT C7/C9', price: '$320.00', image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuAiuQeey5lmq6st-vJo1TRQIs8oQtq_4Cg3QyJcj3j5bJguRJRMBb8ZSC_EXi5lrwaP7iFhysnzJ-1xPxNGrK4UF7AT2OeN8ElIvXkr9-fKhD32L0ADYy9Ey15LiRkDN8mJeDuWdAW5rDzkxw-EYW2ydO_BYYgkeF9JIGC8kwEVf-n5FRVlF_rtG7bTZ9VsR_-6AslLZLeyVYNZWjszYl7HOoO_0ZWqNEcN2WLJnxoqR8dzy5OKZhKk8pdLOhI6kvQ7oAHsQ2gQeQ' },
  { id: 'SUS-101-DEL', name: 'Amortiguador Reforzado Delantero', oem: '48510-60440', category: 'Suspensión', brand: 'Toyota', vehicle: 'Land Cruiser 2015+', price: '$145.00', image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuDHtNySrP8HrGI66TLOsvDPkaDg0OsqNHGb13gCFvCGw0QIBbKbi8njt_UPgaMng-OmtqIcDmx0wAhZUrdUXCmDeFIZM1XG2w7u_7l-k80z1giO2h8A-I1XxRLmt3-W6Idk23flMeIDf660-0qi_Dc3Uczsjnu_ZMz4jIfiTbyh7AkLSoXLrM58e4ggXYxH_nVG2JNEMfP0fVELVbhRLEirDlLmeSZR96Sd4mKGltM7moFTxvlb8IZZgiNy_dX4rJRNFQjnr-pwkw' },
  { id: 'TRS-55-FIL', name: 'Filtro de Transmisión Automática', oem: '35330-60010', category: 'Transmisión', brand: 'Toyota', vehicle: 'Land Cruiser 2015+', price: '$42.50', image: '' },
  { id: 'VIN-HTX-2020', name: 'Sensor de Oxígeno Lambda', oem: '89465-02190', category: 'Electrónica', brand: 'Toyota', vehicle: 'Hilux 2016-2020', price: '$95.00', image: '' },
  { id: 'VIN-CLL-2019', name: 'Bomba de Agua', oem: '16100-59475', category: 'Motor', brand: 'Toyota', vehicle: 'Corolla 2019-2023', price: '$78.00', image: '' },
  { id: 'OEM-F150-2021', name: 'Kit de Embrague Completo', oem: 'FL3Z-7550-A', category: 'Transmisión', brand: 'Ford', vehicle: 'F-150 2021+', price: '$285.00', image: '' },
  { id: 'VIN-CAT-C15', name: 'Turbo Compresor C15', oem: '245-3932', category: 'Motor', brand: 'Caterpillar', vehicle: 'CAT C15', price: '$1,850.00', image: '' }
];

let navSearchTimeout = null;
let heroSearchTimeout = null;

// ========== AUTH UI ==========
function initAuthUI() {
  const user = getCurrentUser();
  if (user) {
    const loginBtn = document.querySelector('[data-auth="login"]');
    if (loginBtn) loginBtn.style.display = 'none';
    
    const userMenu = document.querySelector('[data-auth="user-menu"]');
    if (userMenu) {
      userMenu.style.display = 'flex';
      userMenu.classList.remove('hidden');
      
      const displayName = user.name.split(' ')[0];
      const userNameEl = document.getElementById('userName');
      const dropdownNameEl = document.getElementById('dropdownUserName');
      const dropdownRoleEl = document.getElementById('dropdownUserRole');
      
      if (userNameEl) userNameEl.textContent = displayName;
      if (dropdownNameEl) dropdownNameEl.textContent = user.name;
      if (dropdownRoleEl) dropdownRoleEl.textContent = user.role === 'admin' ? 'Administrador' : 'Usuario';
    }
  }
}

function toggleUserDropdown() {
  const dropdown = document.getElementById('userDropdown');
  const arrow = document.getElementById('userDropdownArrow');
  if (!dropdown || !arrow) return;
  
  if (dropdown.classList.contains('hidden')) {
    dropdown.classList.remove('hidden');
    arrow.style.transform = 'rotate(180deg)';
  } else {
    dropdown.classList.add('hidden');
    arrow.style.transform = 'rotate(0deg)';
  }
}

function closeDropdownOnClickOutside() {
  const dropdown = document.getElementById('userDropdown');
  const button = document.getElementById('userMenuButton');
  if (button && dropdown && !button.contains(event.target) && !dropdown.contains(event.target)) {
    dropdown.classList.add('hidden');
    const arrow = document.getElementById('userDropdownArrow');
    if (arrow) arrow.style.transform = 'rotate(0deg)';
  }
}

// ========== NAVBAR SEARCH ==========
function handleNavSearch() {
  clearTimeout(navSearchTimeout);
  const searchTerm = document.getElementById('navSearchInput')?.value.trim().toLowerCase();
  const suggestions = document.getElementById('navSearchSuggestions');
  const resultsCount = document.getElementById('navResultsCount');
  
  if (!searchTerm || !suggestions) {
    if (suggestions) suggestions.classList.add('hidden');
    return;
  }
  
  navSearchTimeout = setTimeout(() => {
    const matches = productDatabase.filter(p => 
      p.id.toLowerCase().includes(searchTerm) ||
      p.name.toLowerCase().includes(searchTerm) ||
      p.oem.toLowerCase().includes(searchTerm) ||
      p.category.toLowerCase().includes(searchTerm) ||
      p.brand.toLowerCase().includes(searchTerm) ||
      p.vehicle.toLowerCase().includes(searchTerm)
    ).slice(0, 5);
    
    if (resultsCount) resultsCount.textContent = `${matches.length} encontrado${matches.length !== 1 ? 's' : ''}`;
    
    const listEl = document.getElementById('navSuggestionsList');
    if (listEl) {
      if (matches.length === 0) {
        listEl.innerHTML = '<div class="p-4 text-center"><span class="material-symbols-outlined text-stone-300 text-3xl mb-2">search_off</span><p class="text-xs text-stone-400">No se encontraron resultados</p></div>';
      } else {
        listEl.innerHTML = matches.map(p => `
          <div class="p-3 hover:bg-stone-50 cursor-pointer transition-colors border-b border-outline/50 last:border-b-0" onclick="selectNavProduct('${p.id}')">
            <div class="flex items-center gap-3">
              ${p.image ? `<img src="${p.image}" class="w-10 h-10 rounded object-cover flex-shrink-0" alt="${p.name}"/>` : `<div class="w-10 h-10 bg-stone-100 rounded flex items-center justify-center flex-shrink-0"><span class="material-symbols-outlined text-stone-400 text-sm">inventory</span></div>`}
              <div class="flex-1 min-w-0">
                <p class="text-sm font-bold text-black truncate">${p.name}</p>
                <p class="text-[10px] text-stone-400">OEM: ${p.oem} | ${p.brand} ${p.vehicle}</p>
              </div>
              <span class="text-sm font-black text-primary">${p.price}</span>
            </div>
          </div>
        `).join('');
      }
    }
    suggestions.classList.remove('hidden');
  }, 300);
}

function selectNavProduct(productId) {
  const input = document.getElementById('navSearchInput');
  if (input) input.value = productId;
  const suggestions = document.getElementById('navSearchSuggestions');
  if (suggestions) suggestions.classList.add('hidden');
  window.location.href = `busqueda_resultados.html?q=${encodeURIComponent(productId)}`;
}

function executeNavSearch() {
  const searchTerm = document.getElementById('navSearchInput')?.value.trim();
  if (searchTerm) {
    window.location.href = `busqueda_resultados.html?q=${encodeURIComponent(searchTerm)}`;
  }
}

// ========== HERO SEARCH ==========
function handleHeroSearch() {
  clearTimeout(heroSearchTimeout);
  const searchTerm = document.getElementById('heroSearchInput')?.value.trim().toLowerCase();
  const suggestions = document.getElementById('heroSearchSuggestions');
  const resultsCount = document.getElementById('heroResultsCount');
  
  if (!searchTerm || !suggestions) {
    if (suggestions) suggestions.classList.add('hidden');
    return;
  }
  
  heroSearchTimeout = setTimeout(() => {
    const matches = productDatabase.filter(p => 
      p.id.toLowerCase().includes(searchTerm) ||
      p.name.toLowerCase().includes(searchTerm) ||
      p.oem.toLowerCase().includes(searchTerm) ||
      p.category.toLowerCase().includes(searchTerm) ||
      p.brand.toLowerCase().includes(searchTerm) ||
      p.vehicle.toLowerCase().includes(searchTerm)
    ).slice(0, 5);
    
    if (resultsCount) resultsCount.textContent = `${matches.length} encontrado${matches.length !== 1 ? 's' : ''}`;
    
    const listEl = document.getElementById('heroSuggestionsList');
    if (listEl) {
      if (matches.length === 0) {
        listEl.innerHTML = '<div class="p-4 text-center"><span class="material-symbols-outlined text-stone-300 text-3xl mb-2">search_off</span><p class="text-xs text-stone-400">No se encontraron resultados</p></div>';
      } else {
        listEl.innerHTML = matches.map(p => `
          <div class="p-3 hover:bg-stone-50 cursor-pointer transition-colors border-b border-outline/50 last:border-b-0" onclick="selectHeroProduct('${p.id}')">
            <div class="flex items-center gap-3">
              ${p.image ? `<img src="${p.image}" class="w-12 h-12 rounded object-cover flex-shrink-0" alt="${p.name}"/>` : `<div class="w-12 h-12 bg-stone-100 rounded flex items-center justify-center flex-shrink-0"><span class="material-symbols-outlined text-stone-400 text-sm">inventory</span></div>`}
              <div class="flex-1 min-w-0">
                <p class="text-sm font-bold text-black truncate">${p.name}</p>
                <p class="text-[10px] text-stone-400">OEM: ${p.oem} | ${p.brand} ${p.vehicle}</p>
              </div>
              <span class="text-sm font-black text-primary">${p.price}</span>
            </div>
          </div>
        `).join('');
      }
    }
    suggestions.classList.remove('hidden');
  }, 300);
}

function selectHeroProduct(productId) {
  const input = document.getElementById('heroSearchInput');
  if (input) input.value = productId;
  const suggestions = document.getElementById('heroSearchSuggestions');
  if (suggestions) suggestions.classList.add('hidden');
  window.location.href = `busqueda_resultados.html?q=${encodeURIComponent(productId)}`;
}

function executeHeroSearch() {
  const searchTerm = document.getElementById('heroSearchInput')?.value.trim();
  if (searchTerm) {
    window.location.href = `busqueda_resultados.html?q=${encodeURIComponent(searchTerm)}`;
  }
}

function closeSearchSuggestionsOnClickOutside() {
  const navSuggestions = document.getElementById('navSearchSuggestions');
  const navInput = document.getElementById('navSearchInput');
  const heroSuggestions = document.getElementById('heroSearchSuggestions');
  const heroInput = document.getElementById('heroSearchInput');
  
  if (navInput && !navInput.contains(event.target) && navSuggestions && !navSuggestions.contains(event.target)) {
    navSuggestions.classList.add('hidden');
  }
  if (heroInput && !heroInput.contains(event.target) && heroSuggestions && !heroSuggestions.contains(event.target)) {
    heroSuggestions.classList.add('hidden');
  }
}

// ========== CART ==========
function updateCartCount() {
  const cart = JSON.parse(localStorage.getItem('cart') || '[]');
  const totalItems = cart.reduce((sum, item) => sum + item.qty, 0);
  const cartBadge = document.getElementById('cartBadge');
  if (cartBadge) {
    cartBadge.textContent = totalItems > 0 ? totalItems : '0';
  }
}

function addToCartFromIndex(name, sku, price) {
  let cart = JSON.parse(localStorage.getItem('cart') || '[]');
  const existingIndex = cart.findIndex(item => item.sku === sku);
  
  if (existingIndex >= 0) {
    cart[existingIndex].qty += 1;
  } else {
    cart.push({
      id: 'CART-' + Date.now(),
      sku: sku,
      name: name,
      price: price,
      qty: 1,
      image: '',
      addedAt: new Date().toISOString()
    });
  }
  
  localStorage.setItem('cart', JSON.stringify(cart));
  updateCartCount();
  
  // Show toast notification
  const toast = document.createElement('div');
  toast.className = 'fixed top-24 right-8 z-[100] bg-primary text-black px-6 py-4 rounded-xl shadow-2xl flex items-center gap-3';
  toast.innerHTML = `
    <span class="material-symbols-outlined text-2xl">check_circle</span>
    <div>
      <p class="font-bold text-sm">Producto añadido al carrito</p>
      <p class="text-xs opacity-80">${name}</p>
    </div>
  `;
  document.body.appendChild(toast);
  
  setTimeout(() => {
    toast.style.opacity = '0';
    toast.style.transition = 'opacity 0.3s ease';
    setTimeout(() => toast.remove(), 300);
  }, 3000);
}

// ========== FEATURED PRODUCTS ==========
function renderFeaturedProducts() {
  const products = typeof getVisibleProducts === 'function' ? getVisibleProducts().slice(0, 4) : [];
  const grid = document.querySelector('.product-grid');
  
  if (!grid) return;
  
  if (products.length === 0) {
    grid.innerHTML = '<p class="col-span-4 text-center text-stone-400 py-8">No hay productos disponibles</p>';
    return;
  }

  grid.innerHTML = products.map(p => `
    <div class="product-card group bg-stone-50 border border-outline rounded-xl p-4 hover:shadow-xl transition-all">
      <div class="relative aspect-square mb-4 overflow-hidden rounded-lg bg-white">
        ${p.image ? `<img alt="${p.name}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" src="${p.image}"/>` : `<div class="w-full h-full flex items-center justify-center bg-stone-100"><span class="material-symbols-outlined text-6xl text-stone-200">settings_input_component</span></div>`}
        ${p.oldPrice ? `<span class="absolute top-2 left-2 bg-black text-primary text-[9px] font-black px-2 py-1 uppercase">-${Math.round((1 - p.price/p.oldPrice) * 100)}%</span>` : ''}
        ${!p.image && p.category === 'Frenos' ? `<span class="absolute top-2 left-2 bg-black text-primary text-[9px] font-black px-2 py-1 uppercase">-15%</span>` : ''}
        ${p.stock === 0 ? `<span class="absolute top-2 right-2 bg-stone-400 text-white text-[9px] font-black px-2 py-1 uppercase">Agotado</span>` : ''}
        ${p.stock > 20 && !p.oldPrice ? `<span class="absolute top-2 right-2 bg-primary text-black text-[9px] font-black px-2 py-1 uppercase">Top Ventas</span>` : ''}
      </div>
      <p class="text-[10px] font-bold text-stone-400 uppercase mb-1">${p.category} / ${p.oem}</p>
      <h4 class="font-bold text-sm text-black mb-2 line-clamp-1">${p.name}</h4>
      <div class="flex items-center justify-between mb-4">
        <div>
          <span class="text-lg font-black text-black">$${p.price.toFixed(2)}</span>
          ${p.oldPrice ? `<span class="text-[10px] text-stone-400 line-through ml-2">$${p.oldPrice.toFixed(2)}</span>` : ''}
        </div>
        <span class="text-[10px] font-bold ${p.stock > 10 ? 'text-green-500' : p.stock > 0 ? 'text-yellow-500' : 'text-red-500'} uppercase">${p.stock > 0 ? `Stock: ${p.stock}` : p.stockStatus || 'Agotado'}</span>
      </div>
      <button class="w-full bg-black text-white py-3 rounded-lg flex items-center justify-center gap-2 hover:bg-primary hover:text-black transition-colors group/btn ${p.stock === 0 ? 'opacity-50 cursor-not-allowed' : ''}" onclick="${p.stock > 0 ? `addToCartFromIndex('${p.name.replace(/'/g, "\\'")}', '${p.sku}', ${p.price})` : ''}" ${p.stock === 0 ? 'disabled' : ''}>
        <span class="material-symbols-outlined text-sm group-hover/btn:text-primary">add_shopping_cart</span>
        <span class="text-[10px] font-black uppercase tracking-widest">${p.stock > 0 ? 'Añadir al Carrito' : 'Sin Stock'}</span>
      </button>
    </div>
  `).join('');
}

// ========== INIT ==========
document.addEventListener('DOMContentLoaded', function() {
  initAuthUI();
  updateCartCount();
  renderFeaturedProducts();
  
  // Global click handlers
  document.addEventListener('click', function(e) {
    closeDropdownOnClickOutside();
    closeSearchSuggestionsOnClickOutside();
  });
});

// Expose functions to global scope for inline onclick handlers
window.toggleUserDropdown = toggleUserDropdown;
window.handleNavSearch = handleNavSearch;
window.selectNavProduct = selectNavProduct;
window.executeNavSearch = executeNavSearch;
window.handleHeroSearch = handleHeroSearch;
window.selectHeroProduct = selectHeroProduct;
window.executeHeroSearch = executeHeroSearch;
window.updateCartCount = updateCartCount;
window.addToCartFromIndex = addToCartFromIndex;
