/* ============================================
   ERP La Cima - JavaScript
   Archivo: inicio.js
   ============================================ */


   
// Verificar autenticación al cargar - Guardado contra bucles
(function() {
  const isLoggedIn = localStorage.getItem('erp_session') === 'true';
  const isAuthPage = window.location.pathname.includes('/auth/');
  
  if (!isLoggedIn && !isAuthPage) {
    window.location.href = '/auth/login';
  }
})();

// Toggle sidebar en mobile
const menuToggle = document.getElementById('menuToggle');
const sidebar = document.getElementById('sidebar');
const overlay = document.getElementById('sidebarOverlay');

if (menuToggle) {
  menuToggle.addEventListener('click', () => {
    sidebar.classList.toggle('open');
    overlay.classList.toggle('hidden');
  });
}

// Toggle Dropdown Menu (hacia la derecha)
function toggleDropdown(menuItem) {
  const parent = menuItem.closest('.menu-parent');
  const wasOpen = parent.classList.contains('open');

  // Cerrar todos los demás dropdowns
  document.querySelectorAll('.menu-parent.open').forEach(el => {
    if (el !== parent) el.classList.remove('open');
  });

  // Toggle el actual
  if (!wasOpen) {
    parent.classList.add('open');
  }
}

// Cerrar dropdowns al hacer clic fuera
document.addEventListener('click', (e) => {
  if (!e.target.closest('.menu-parent')) {
    document.querySelectorAll('.menu-parent.open').forEach(el => {
      el.classList.remove('open');
    });
  }
});

// Resaltar página actual en sidebar
const currentPage = window.location.pathname.split('/').pop();
if (currentPage) {
  document.querySelectorAll('.submenu a').forEach(link => {
    const href = link.getAttribute('href');
    if (href === currentPage) {
      link.style.background = 'rgba(206, 255, 94, 0.15)';
      link.style.color = '#1c1c1c';
      link.style.fontWeight = '600';

      // Abrir el dropdown padre automáticamente
      const parent = link.closest('.menu-parent');
      if (parent) {
        parent.classList.add('open');

        // Highlight en el item principal
        const mainItem = parent.querySelector('.menu-item');
        if (mainItem) {
          mainItem.style.background = '#f8f9fa';
          mainItem.style.color = '#1c1c1c';
          mainItem.style.fontWeight = '600';
        }
      }
    }
  });
}
