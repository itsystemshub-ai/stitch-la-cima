// Sistema de gestión de productos - Zenith ERP
// Este archivo sirve como base de datos centralizada para todos los módulos

const PRODUCTS_DB_KEY = 'zenith_products';
const CATEGORIES_DB_KEY = 'zenith_categories';

// Productos iniciales del sistema
const DEFAULT_PRODUCTS = [
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
        image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuCNjAH9S_Dx8VtU7mF1yl1gIoO1HHxRUQR20jPWmEZ_fWPK0Lf-aqaHg5SbId7ALpHlPm1IBVe6hQPm83-NLF_KRSd1NILUJYVRLn7UO6bSjWbJHrwIEjbFqo-DEe4gv3JFYAtDUXn6VNxmvX1mo4hAlQY5e3qx9t69T02-YM-fgbgyu5g29n1SbpBH5IfDiboMUFBwLW5HUBLf0gL-uFhYCkYCmLrNxaXuJfXidw71gc1TWNKpa50EjrPRsAU9-GWS_sIc880L1A',
        visible: true, // Visible para usuarios no logueados
        createdAt: new Date().toISOString()
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
        oldPrice: null,
        stock: 0,
        stockStatus: 'Bajo Pedido',
        image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuAiuQeey5lmq6st-vJo1TRQIs8oQtq_4Cg3QyJcj3j5bJguRJRMBb8ZSC_EXi5lrwaP7iFhysnzJ-1xPxNGrK4UF7AT2OeN8ElIvXkr9-fKhD32L0ADYy9Ey15LiRkDN8mJeDuWdAW5rDzkxw-EYW2ydO_BYYgkeF9JIGC8kwEVf-n5FRVlF_rtG7bTZ9VsR_-6AslLZLeyVYNZWjszYl7HOoO_0ZWqNEcN2WLJnxoqR8dzy5OKZhKk8pdLOhI6kvQ7oAHsQ2gQeQ',
        visible: true,
        createdAt: new Date().toISOString()
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
        oldPrice: null,
        stock: 12,
        image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuDHtNySrP8HrGI66TLOsvDPkaDg0OsqNHGb13gCFvCGw0QIBbKbi8njt_UPgaMng-OmtqIcDmx0wAhZUrdUXCmDeFIZM1XG2w7u_7l-k80z1giO2h8A-I1XxRLmt3-W6Idk23flMeIDf660-0qi_Dc3Uczsjnu_ZMz4jIfiTbyh7AkLSoXLrM58e4ggXYxH_nVG2JNEMfP0fVELVbhRLEirDlLmeSZR96Sd4mKGltM7moFTxvlb8IZZgiNy_dX4rJRNFQjnr-pwkw',
        visible: true,
        createdAt: new Date().toISOString()
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
        oldPrice: null,
        stock: 100,
        image: '',
        visible: true,
        createdAt: new Date().toISOString()
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
        oldPrice: null,
        stock: 8,
        image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuDRn-wdKgaOpSBynFvnr0e_fmpdUwmPnpozU-NafufUaamlmKKGX6d-dkHr2aj7_nDx-AKznW0KzL5fIjYG7gtzalG2_9IuNT-hTRWpJiQeJzZ8511dZsT6tl5qkDqAo8LX7qK-hVKM713GcUlIo5wK0hJMgn8yJDs7Of6LasPy_8C4MbxFJrKC_7-xXWWCDrchCbWw_snA5feSSKqCid71lSKHG6-nFtzz1O8S3ya-CRGXCpluZVnH6mf88Zf6m9L0V_NoXpdkOA',
        visible: true,
        createdAt: new Date().toISOString()
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
        oldPrice: null,
        stock: 45,
        image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuCNjAH9S_Dx8VtU7mF1yl1gIoO1HHxRUQR20jPWmEZ_fWPK0Lf-aqaHg5SbId7ALpHlPm1IBVe6hQPm83-NLF_KRSd1NILUJYVRLn7UO6bSjWbJHrwIEjbFqo-DEe4gv3JFYAtDUXn6VNxmvX1mo4hAlQY5e3qx9t69T02-YM-fgbgyu5g29n1SbpBH5IfDiboMUFBwLW5HUBLf0gL-uFhYCkYCmLrNxaXuJfXidw71gc1TWNKpa50EjrPRsAU9-GWS_sIc880L1A',
        visible: true,
        createdAt: new Date().toISOString()
    }
];

// Funciones CRUD de productos
function getAllProducts() {
    return JSON.parse(localStorage.getItem(PRODUCTS_DB_KEY) || '[]');
}

function getVisibleProducts() {
    return getAllProducts().filter(p => p.visible === true);
}

function getProductById(id) {
    return getAllProducts().find(p => p.id === id);
}

function saveProducts(products) {
    localStorage.setItem(PRODUCTS_DB_KEY, JSON.stringify(products));
}

function addProduct(product) {
    const products = getAllProducts();
    product.id = 'PROD-' + String(products.length + 1).padStart(3, '0');
    product.createdAt = new Date().toISOString();
    products.push(product);
    saveProducts(products);
    return product;
}

function updateProduct(id, updates) {
    const products = getAllProducts();
    const index = products.findIndex(p => p.id === id);
    if (index >= 0) {
        products[index] = { ...products[index], ...updates };
        saveProducts(products);
        return products[index];
    }
    return null;
}

function deleteProduct(id) {
    let products = getAllProducts();
    products = products.filter(p => p.id !== id);
    saveProducts(products);
}

function toggleProductVisibility(id) {
    const product = getProductById(id);
    if (product) {
        return updateProduct(id, { visible: !product.visible });
    }
    return null;
}

// Inicializar productos si no existen
function initProducts() {
    if (!localStorage.getItem(PRODUCTS_DB_KEY)) {
        saveProducts(DEFAULT_PRODUCTS);
    }
}

// Categorías
function getCategories() {
    return JSON.parse(localStorage.getItem(CATEGORIES_DB_KEY) || '[]');
}

function saveCategories(categories) {
    localStorage.setItem(CATEGORIES_DB_KEY, JSON.stringify(categories));
}

const DEFAULT_CATEGORIES = [
    { id: 'CAT-001', name: 'Motor', icon: 'settings', active: true },
    { id: 'CAT-002', name: 'Frenos', icon: 'stop_circle', active: true },
    { id: 'CAT-003', name: 'Suspensión', icon: 'build', active: true },
    { id: 'CAT-004', name: 'Transmisión', icon: 'settings_input_component', active: true },
    { id: 'CAT-005', name: 'Carrocería', icon: 'directions_car', active: true },
    { id: 'CAT-006', name: 'Electrónica', icon: 'electrical_services', active: true },
    { id: 'CAT-007', name: 'Filtros', icon: 'filter_alt', active: true }
];

function initCategories() {
    if (!localStorage.getItem(CATEGORIES_DB_KEY)) {
        saveCategories(DEFAULT_CATEGORIES);
    }
}

// Inicializar todo al cargar
document.addEventListener('DOMContentLoaded', function() {
    initProducts();
    initCategories();
});
