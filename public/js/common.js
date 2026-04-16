/**
 * Mayor de Repuesto La Cima, C.A. - Common Scripts
 * Shared JavaScript for all ERP pages
 * Mayor de Repuesto La Cima, C.A.
 */

// Mobile Menu Toggle
const menuToggle = document.getElementById('menuToggle');
const sidebar = document.getElementById('sidebar');
const overlay = document.getElementById('sidebarOverlay');

if (menuToggle && sidebar && overlay) {
  menuToggle.addEventListener('click', () => {
    sidebar.classList.toggle('open');
    overlay.classList.toggle('hidden');
  });
}

// Dropdown Menu Toggle (Flyout to the right)
function toggleDropdown(menuItem) {
  const parent = menuItem.closest('.menu-parent');
  if (!parent) return;

  const wasOpen = parent.classList.contains('open');

  // Close all other dropdowns
  document.querySelectorAll('.menu-parent.open').forEach(el => {
    if (el !== parent) el.classList.remove('open');
  });

  // Toggle current
  if (!wasOpen) {
    parent.classList.add('open');
  }
}

// Close dropdowns when clicking outside
document.addEventListener('click', (e) => {
  if (!e.target.closest('.menu-parent')) {
    document.querySelectorAll('.menu-parent.open').forEach(el => {
      el.classList.remove('open');
    });
  }
});

// Logout function
function logout() {
  localStorage.removeItem('erp_session');
  window.location.href = '/auth/login';
}

// Check authentication on page load
document.addEventListener('DOMContentLoaded', () => {
  const isLoggedIn = localStorage.getItem('erp_session') === 'true';
  const isAuthPage = window.location.pathname.includes('/auth/');

  if (!isLoggedIn && !isAuthPage) {
    window.location.href = '/auth/login';
  }
});
