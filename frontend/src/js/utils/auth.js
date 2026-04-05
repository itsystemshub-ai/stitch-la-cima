// Auth Utilities - Sistema de Autenticación Zenith ERP

// Check if user is logged in
function isLoggedIn() {
    const session = JSON.parse(localStorage.getItem('currentSession') || 'null');
    if (!session) return false;
    
    // Check if session expired
    if (new Date(session.expires) < new Date()) {
        logout();
        return false;
    }
    
    return true;
}

// Get current user session
function getCurrentUser() {
    if (!isLoggedIn()) return null;
    return JSON.parse(localStorage.getItem('currentSession'));
}

// Logout function
function logout() {
    // Log activity before clearing
    const session = getCurrentUser();
    if (session) {
        logActivity(session.userId, 'LOGOUT', 'Cierre de sesión');
    }
    
    // Clear session
    localStorage.removeItem('currentSession');
    
    // Redirect to login
    window.location.href = 'login.html';
}

// Log activity
function logActivity(userId, action, details) {
    let logs = JSON.parse(localStorage.getItem('activityLogs') || '[]');
    logs.push({
        userId: userId,
        action: action,
        details: details,
        timestamp: new Date().toISOString(),
        ip: '192.168.1.' + Math.floor(Math.random() * 255)
    });
    localStorage.setItem('activityLogs', JSON.stringify(logs));
}

// Protect page - redirect to login if not authenticated
function protectPage() {
    if (!isLoggedIn()) {
        window.location.href = 'login.html';
    }
}

// Update UI based on auth state
function updateAuthUI() {
    const user = getCurrentUser();
    const loginBtn = document.querySelector('[data-auth="login"]');
    const userMenu = document.querySelector('[data-auth="user-menu"]');
    
    if (user) {
        // User is logged in
        if (loginBtn) loginBtn.style.display = 'none';
        if (userMenu) {
            userMenu.style.display = 'flex';
            userMenu.innerHTML = `
                <div class="flex items-center gap-2 bg-primary/10 px-4 py-2 rounded-full">
                    <span class="material-symbols-outlined text-primary text-sm">person</span>
                    <span class="text-[10px] font-bold text-primary uppercase">${user.name.split(' ')[0]}</span>
                </div>
                <button onclick="logout()" class="text-xs text-stone-500 hover:text-red-500 transition-colors">
                    <span class="material-symbols-outlined text-sm">logout</span>
                </button>
            `;
        }
    } else {
        // User is not logged in
        if (loginBtn) loginBtn.style.display = 'flex';
        if (userMenu) userMenu.style.display = 'none';
    }
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    updateAuthUI();
});
