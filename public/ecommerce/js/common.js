// Funciones compartidas del ecommerce

// Abrir menú mobile
function openMobileMenu() {
  const menu = document.getElementById('mobileMenu');
  if (menu) menu.classList.remove('hidden');
}

// Cerrar menú mobile
function closeMobileMenu() {
  const menu = document.getElementById('mobileMenu');
  if (menu) menu.classList.add('hidden');
}

// Buscar productos y redirigir al catálogo
function searchProducts() {
  window.location.href = '/tienda/catalogo_detallado';
}

// Agregar al carrito
function addToCart(id, name, price, image, category) {
  let cart = JSON.parse(localStorage.getItem('cart') || '[]');
  const existing = cart.find(item => item.id === id);
  if (existing) {
    existing.qty++;
  } else {
    cart.push({ id, name, price, image, category, qty: 1 });
  }
  localStorage.setItem('cart', JSON.stringify(cart));
  
  // Mostrar notificación
  const toast = document.createElement('div');
  toast.className = 'fixed bottom-4 right-4 bg-black text-white px-6 py-3 rounded-lg z-50 shadow-lg';
  toast.textContent = `✓ ${name} agregado al carrito`;
  document.body.appendChild(toast);
  setTimeout(() => toast.remove(), 2000);
  
  // Actualizar contador del carrito
  updateCartCount();
}

// Actualizar contador del carrito
function updateCartCount() {
  const cart = JSON.parse(localStorage.getItem('cart') || '[]');
  const count = cart.reduce((sum, item) => sum + item.qty, 0);
  const badge = document.getElementById('cartCount');
  if (badge) badge.textContent = count;
}

// Filtrar productos (para catálogo)
function filterProducts(category) {
  const btn = event.target;
  document.querySelectorAll('.filter-btn').forEach(b => {
    b.classList.remove('bg-black', 'text-primary');
    b.classList.add('bg-white', 'text-black');
  });
  btn.classList.remove('bg-white', 'text-black');
  btn.classList.add('bg-black', 'text-primary');
  
  // Aquí iría la lógica de filtrado real
  console.log('Filtrando por:', category);
}

// Inicializar al cargar la página
document.addEventListener('DOMContentLoaded', () => {
  updateCartCount();
});
