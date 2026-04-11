/**
 * ERP La Cima - Module: Inventory Products
 */

document.addEventListener('DOMContentLoaded', () => {
    console.log('Inventory Products loaded (Mirror mode)');
    
    // Auth check (Uses function from common.js if available, otherwise fallback)
    if (typeof checkAuth === 'function') {
        checkAuth();
    } else if (!localStorage.getItem('erp_session')) {
        window.location.href = '/auth/login';
    }
});

function logout() {
    localStorage.removeItem('erp_session');
    window.location.href = '/auth/login';
}
