/**
 * Product Service - La Cima Zenith ERP
 * Product database with API integration and localStorage fallback
 */

const API_BASE = window.API_BASE || 'http://localhost:3000/api';
const CACHE_KEY = 'zenith_products_cache';
const CATEGORIES_CACHE_KEY = 'zenith_categories_cache';

// Get all products from API or cache
async function getAllProducts() {
  try {
    const response = await fetch(`${API_BASE}/products`);
    const data = await response.json();
    const products = data.data?.products || data.data || [];
    localStorage.setItem(CACHE_KEY, JSON.stringify(products));
    return products;
  } catch (error) {
    const cached = JSON.parse(localStorage.getItem(CACHE_KEY) || '[]');
    return cached;
  }
}

// Get only visible products
async function getVisibleProducts() {
  try {
    const response = await fetch(`${API_BASE}/products/visible`);
    const data = await response.json();
    const products = data.data || [];
    localStorage.setItem(CACHE_KEY, JSON.stringify(products));
    return products;
  } catch (error) {
    const all = JSON.parse(localStorage.getItem(CACHE_KEY) || '[]');
    return all.filter(p => p.visible !== false);
  }
}

// Get product by ID
async function getProductById(id) {
  try {
    const response = await fetch(`${API_BASE}/products/${id}`);
    const data = await response.json();
    return data.data;
  } catch (error) {
    const all = JSON.parse(localStorage.getItem(CACHE_KEY) || '[]');
    return all.find(p => p.id === id);
  }
}

// Search products
async function searchProducts(query) {
  try {
    const response = await fetch(`${API_BASE}/products?search=${encodeURIComponent(query)}`);
    const data = await response.json();
    return data.data?.products || [];
  } catch (error) {
    const all = JSON.parse(localStorage.getItem(CACHE_KEY) || '[]');
    const q = query.toLowerCase();
    return all.filter(p =>
      (p.name && p.name.toLowerCase().includes(q)) ||
      (p.sku && p.sku.toLowerCase().includes(q)) ||
      (p.oem && p.oem.toLowerCase().includes(q)) ||
      (p.brand && p.brand.toLowerCase().includes(q))
    );
  }
}

// Get products with filters
async function getFilteredProducts(filters = {}) {
  try {
    const params = new URLSearchParams();
    if (filters.page) params.set('page', filters.page);
    if (filters.limit) params.set('limit', filters.limit);
    if (filters.search) params.set('search', filters.search);
    if (filters.brand) params.set('brand', filters.brand);
    if (filters.category) params.set('category', filters.category);
    if (filters.stock) params.set('stock', filters.stock);
    if (filters.sort) params.set('sort', filters.sort);

    const response = await fetch(`${API_BASE}/products?${params}`);
    const data = await response.json();
    return data.data || { products: [], pagination: { total: 0, page: 1, pages: 0 } };
  } catch (error) {
    return { products: [], pagination: { total: 0, page: 1, pages: 0 } };
  }
}

// Categories
async function getCategories() {
  try {
    const response = await fetch(`${API_BASE}/categories`);
    const data = await response.json();
    const categories = data.data || [];
    localStorage.setItem(CATEGORIES_CACHE_KEY, JSON.stringify(categories));
    return categories;
  } catch (error) {
    return JSON.parse(localStorage.getItem(CATEGORIES_CACHE_KEY) || '[]');
  }
}

// Admin CRUD operations
async function addProduct(productData) {
  const token = JSON.parse(localStorage.getItem('zenith_session'))?.token;
  const response = await fetch(`${API_BASE}/products`, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'Authorization': `Bearer ${token}`,
    },
    body: JSON.stringify(productData),
  });
  return response.json();
}

async function updateProduct(id, updates) {
  const token = JSON.parse(localStorage.getItem('zenith_session'))?.token;
  const response = await fetch(`${API_BASE}/products/${id}`, {
    method: 'PUT',
    headers: {
      'Content-Type': 'application/json',
      'Authorization': `Bearer ${token}`,
    },
    body: JSON.stringify(updates),
  });
  return response.json();
}

async function deleteProduct(id) {
  const token = JSON.parse(localStorage.getItem('zenith_session'))?.token;
  const response = await fetch(`${API_BASE}/products/${id}`, {
    method: 'DELETE',
    headers: { 'Authorization': `Bearer ${token}` },
  });
  return response.json();
}

async function toggleProductVisibility(id) {
  const token = JSON.parse(localStorage.getItem('zenith_session'))?.token;
  const response = await fetch(`${API_BASE}/products/${id}/toggle-visibility`, {
    method: 'PATCH',
    headers: { 'Authorization': `Bearer ${token}` },
  });
  return response.json();
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
  getVisibleProducts();
  getCategories();
});

// Expose to global scope
window.getAllProducts = getAllProducts;
window.getVisibleProducts = getVisibleProducts;
window.getProductById = getProductById;
window.searchProducts = searchProducts;
window.getFilteredProducts = getFilteredProducts;
window.getCategories = getCategories;
window.addProduct = addProduct;
window.updateProduct = updateProduct;
window.deleteProduct = deleteProduct;
window.toggleProductVisibility = toggleProductVisibility;
