/**
 * Navigation Router - La Cima Zenith ERP
 * Connects all pages with proper routing
 */

const ROUTES = {
  // Public Pages
  home: '../public/ecommerce/index.html',
  catalog: '../public/ecommerce/catalogo.html',
  product: '../public/ecommerce/product.html',
  cart: '../public/ecommerce/cart.html',
  account: '../public/ecommerce/account.html',
  search: '../public/ecommerce/search.html',
  landing: '../public/ecommerce/landing.html',
  landing_erp: '../public/ecommerce/landing_erp.html',
  
  // Auth Pages
  login: '../public/auth/login.html',
  register: '../public/auth/register.html',
  recovery: '../public/auth/recovery.html',
  
  // ERP Pages
  dashboard: '../public/erp/dashboard.html',
  inventory: '../public/erp/inventory.html',
  orders: '../public/erp/orders.html',
  clients: '../public/erp/clients.html',
  sales: '../public/erp/sales.html',
  quotes: '../public/erp/quotes.html',
  reports: '../public/erp/reports.html',
  settings: '../public/erp/settings.html',
  support: '../public/erp/support.html',
  tracking: '../public/erp/tracking.html',
};

function navigate(page, params = {}) {
  const path = ROUTES[page];
  if (!path) {
    console.error(`Route not found: ${page}`);
    return;
  }
  
  let url = path;
  if (Object.keys(params).length > 0) {
    const query = new URLSearchParams(params).toString();
    url += `?${query}`;
  }
  
  window.location.href = url;
}

function updateNavLinks() {
  document.querySelectorAll('[data-nav]').forEach(link => {
    const page = link.getAttribute('data-nav');
    if (ROUTES[page]) {
      link.href = ROUTES[page];
    }
  });
}

document.addEventListener('DOMContentLoaded', updateNavLinks);
