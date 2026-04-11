/**
 * ZENITH ERP - Dashboard Inicio
 */

document.addEventListener('DOMContentLoaded', () => {
    // Verificar sesión
    if (localStorage.getItem('erp_session') !== 'true') {
        window.location.href = '/auth/login';
        return;
    }

    // Cargar datos de usuario
    const userName = localStorage.getItem('user_name') || 'Administrador';
    const userRole = localStorage.getItem('user_role') || 'Admin';
    
    const userNameEl = document.getElementById('userName');
    const userRoleEl = document.getElementById('userRole');
    const userInitialEl = document.getElementById('userInitial');

    if (userNameEl) userNameEl.textContent = userName;
    if (userRoleEl) userRoleEl.textContent = userRole;
    if (userInitialEl) userInitialEl.textContent = userName.charAt(0).toUpperCase();

    // Stats dinámicos (Simulados por ahora, Mirror 1:1)
    loadDashboardStats();
});

function loadDashboardStats() {
    // Por ahora mantenemos los datos del HTML original para el espejo 1:1
    console.log('Dashboard stats loaded (Mirror mode)');
}

// Sidebar toggle mobile
const menuToggle = document.getElementById('menuToggle');
const sidebar = document.getElementById('sidebar');
const overlay = document.getElementById('sidebarOverlay');

if (menuToggle) {
    menuToggle.addEventListener('click', () => {
        sidebar.classList.toggle('open');
        overlay.classList.toggle('hidden');
    });
}

// Dropdown toggle
function toggleDropdown(menuItem) {
    const parent = menuItem.parentElement;
    parent.classList.toggle('open');
}
