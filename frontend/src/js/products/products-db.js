/**
 * Product Service - La Cima Zenith ERP
 * Replaces localStorage products with API calls
 * Fallback to localStorage cache when offline
 */

// Cache key for offline fallback
const CACHE_KEY = 'zenith_products_cache';
const CACHE_CATEGORIES_KEY = 'zenith_categories_cache';

// Get all products from API
async function getAllProducts() {
  try {
    const response = await api.get('/products');
    const products = response.data.products || response.data;
    // Update cache
    localStorage.setItem(CACHE_KEY, JSON.stringify(products));
    return products;
  } catch (error) {
    // Fallback to cache
    console.warn('API unavailable, using cache:', error.message);
    return JSON.parse(localStorage.getItem(CACHE_KEY) || '[]');
  }
}

// Get only visible products
async function getVisibleProducts() {
  try {
    const response = await api.get('/products/visible');
    const products = response.data || response.data;
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
    const response = await api.get(`/products/${id}`);
    return response.data;
  } catch (error) {
    const all = JSON.parse(localStorage.getItem(CACHE_KEY) || '[]');
    return all.find(p => p.id === id);
  }
}

// Add product (admin only)
async function addProduct(productData) {
  try {
    const response = await api.post('/products', productData);
    // Refresh cache
    await getAllProducts();
    return response.data;
  } catch (error) {
    console.error('Error adding product:', error);
    throw error;
  }
}

// Update product (admin only)
async function updateProduct(id, updates) {
  try {
    const response = await api.put(`/products/${id}`, updates);
    // Refresh cache
    await getAllProducts();
    return response.data;
  } catch (error) {
    console.error('Error updating product:', error);
    throw error;
  }
}

// Delete product (admin only)
async function deleteProduct(id) {
  try {
    await api.delete(`/products/${id}`);
    // Refresh cache
    await getAllProducts();
    return true;
  } catch (error) {
    console.error('Error deleting product:', error);
    throw error;
  }
}

// Toggle product visibility (admin only)
async function toggleProductVisibility(id) {
  try {
    const response = await api.patch(`/products/${id}/toggle-visibility`);
    // Refresh cache
    await getAllProducts();
    return response.data;
  } catch (error) {
    console.error('Error toggling visibility:', error);
    throw error;
  }
}

// Search products
async function searchProducts(query) {
  try {
    const response = await api.get(`/products?search=${encodeURIComponent(query)}`);
    return response.data.products || [];
  } catch (error) {
    const all = JSON.parse(localStorage.getItem(CACHE_KEY) || '[]');
    const q = query.toLowerCase();
    return all.filter(p =>
      p.name.toLowerCase().includes(q) ||
      p.sku.toLowerCase().includes(q) ||
      p.oem.toLowerCase().includes(q) ||
      p.brand.toLowerCase().includes(q)
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

    const response = await api.get(`/products?${params}`);
    return response.data;
  } catch (error) {
    console.error('Error fetching filtered products:', error);
    return { products: [], pagination: { total: 0, page: 1, pages: 0 } };
  }
}

// Categories
async function getCategories() {
  try {
    const response = await api.get('/categories');
    const categories = response.data || [];
    localStorage.setItem(CACHE_CATEGORIES_KEY, JSON.stringify(categories));
    return categories;
  } catch (error) {
    return JSON.parse(localStorage.getItem(CACHE_CATEGORIES_KEY) || '[]');
  }
}

// Seed default products if API is empty (first run)
async function seedDefaultProducts() {
  const existing = await getAllProducts();
  if (existing.length === 0) {
    const defaults = [
      {
        id: 'PROD-001',
        name: 'Kit de Discos de Freno Ventilados',
        sku: 'DIS-4421-VTL',
        oem: 'OEM-4421',
        category: 'Frenos',
        brand: 'Toyota',
        vehicle: 'Land Cruiser 2015+',
        price: 85.00,
        oldPrice: 102.00,
        stock: 50,
        visible: true,
        image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuCNjAH9S_Dx8VtU7mF1yl1gIoO1HHxRUQR20jPWmEZ_fWPK0Lf-aqaHg5SbId7ALpHlPm1IBVe6hQPm83-NLF_KRSd1NILUJYVRLn7UO6bSjWbJHrwIEjbFqo-DEe4gv3JFYAtDUXn6VNxmvX1mo4hAlQY5e3qx9t69T02-YM-fgbgyu5g29n1SbpBH5IfDiboMUFBwLW5HUBLf0gL-uFhYCkYCmLrNxaXuJfXidw71gc1TWNKpa50EjrPRsAU9-GWS_sIc880L1A',
      },
      {
        id: 'PROD-002',
        name: 'Inyector de Combustible Heavy Duty',
        sku: 'INJ-CAT-882',
        oem: 'CAT-882',
        category: 'Motor',
        brand: 'Caterpillar',
        vehicle: 'CAT C7/C9',
        price: 320.00,
        stock: 0,
        stockStatus: 'Bajo Pedido',
        visible: true,
        image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuAiuQeey5lmq6st-vJo1TRQIs8oQtq_4Cg3QyJcj3j5bJguRJRMBb8ZSC_EXi5lrwaP7iFhysnzJ-1xPxNGrK4UF7AT2OeN8ElIvXkr9-fKhD32L0ADYy9Ey15NiRkDN8mJeDuWdAW5rDzkxw-EYW2ydO_BYYgkeF9JIGC8kwEVf-n5FRVlF_rtG7bTZ9VsR_-6AslLZLeyVYNZWjszYl7HOoO_0ZWqNEcN2WLJnxoqR8dzy5OKZhKk8pdLOhI6kvQ7oAHsQ2gQeQ',
      },
      {
        id: 'PROD-003',
        name: 'Amortiguador Reforzado Delantero',
        sku: 'SUS-101-DEL',
        oem: 'SUS-101',
        category: 'Suspensión',
        brand: 'Toyota',
        vehicle: 'Land Cruiser 2015+',
        price: 145.00,
        stock: 12,
        visible: true,
        image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuDHtNySrP8HrGI66TLOsvDPkaDg0OsqNHGb13gCFvCGw0QIBbKbi8njt_UPgaMng-OmtqIcDmx0wAhZUrdUXCmDeFIZM1XG2w7u_7l-k80z1giO2h8A-I1XxRLmt3-W6Idk23flMeIDf660-0qi_Dc3Uczsjnu_ZMz4jIfiTbyh7AkLSoXLrM58e4ggXYxH_nVG2JNEMfP0fVELVbhRLEirDlLmeSZR96Sd4mKGltM7moFTxvlb8IZZgiNy_dX4rJRNFQjnr-pwkw',
      },
      {
        id: 'PROD-004',
        name: 'Filtro de Transmisión Automática',
        sku: 'TRS-55-FIL',
        oem: 'TRS-55',
        category: 'Transmisión',
        brand: 'Toyota',
        vehicle: 'Land Cruiser 2015+',
        price: 42.50,
        stock: 100,
        visible: true,
      },
      {
        id: 'PROD-005',
        name: 'Turboalimentador Variable VGT',
        sku: 'TRB-VGT-84521',
        oem: '28231-27000',
        category: 'Motor',
        brand: 'Toyota',
        vehicle: 'Hilux 2016-2020',
        price: 845.00,
        stock: 8,
        visible: true,
        image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuDRn-wdKgaOpSBynFvnr0e_fmpdUwmPnpozU-NafufUaamlmKKGX6d-dkHr2aj7_nDx-AKznW0KzL5fIjYG7gtzalG2_9IuNT-hTRWpJiQeJzZ8511dZsT6tl5qkDqAo8LX7qK-hVKM713GcUlIo5wK0hJMgn8yJDs7Of6LasPy_8C4MbxFJrKC_7-xXWWCDrchCbWw_snA5feSSKqCid71lSKHG6-nFtzz1O8S3ya-CRGXCpluZVnH6mf88Zf6m9L0V_NoXpdkOA',
      },
      {
        id: 'PROD-006',
        name: 'Pastillas de Freno Heavy Duty',
        sku: 'BRK-9004-HD',
        oem: '04465-35290',
        category: 'Frenos',
        brand: 'Toyota',
        vehicle: 'Land Cruiser 2016+',
        price: 129.50,
        stock: 45,
        visible: true,
        image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuCNjAH9S_Dx8VtU7mF1yl1gIoO1HHxRUQR20jPWmEZ_fWPK0Lf-aqaHg5SbId7ALpHlPm1IBVe6hQPm83-NLF_KRSd1NILUJYVRLn7UO6bSjWbJHrwIEjbFqo-DEe4gv3JFYAtDUXn6VNxmvX1mo4hAlQY5e3qx9t69T02-YM-fgbgyu5g29n1SbpBH5IfDiboMUFBwLW5HUBLf0gL-uFhYCkYCmLrNxaXuJfXidw71gc1TWNKpa50EjrPRsAU9-GWS_sIc880L1A',
      },
    ];

    for (const product of defaults) {
      try {
        await api.post('/products', product);
      } catch (e) {
        console.warn('Failed to seed product:', product.id);
      }
    }
  }
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
  // Preload products cache
  getVisibleProducts();
  getCategories();
});
