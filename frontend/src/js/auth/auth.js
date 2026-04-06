/**
 * Auth Service - La Cima Zenith ERP
 * Authentication utilities with API integration
 */

const API_BASE = window.API_BASE || 'http://localhost:3000/api';

// Check if user is logged in
function isLoggedIn() {
  try {
    const session = JSON.parse(localStorage.getItem('zenith_session'));
    if (!session) return false;
    if (new Date(session.expires) < new Date()) {
      logout();
      return false;
    }
    return true;
  } catch {
    return false;
  }
}

// Get current user session
function getCurrentUser() {
  if (!isLoggedIn()) return null;
  try {
    return JSON.parse(localStorage.getItem('zenith_session')).user;
  } catch {
    return null;
  }
}

// Login via API
async function login(email, password) {
  try {
    const response = await fetch(`${API_BASE}/auth/login`, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ email, password }),
    });
    const data = await response.json();
    
    if (data.success) {
      const { user, token, refreshToken, expires } = data.data;
      localStorage.setItem('zenith_session', JSON.stringify({ user, token, refreshToken, expires }));
      logActivity(user.id, 'LOGIN', 'Inicio de sesión exitoso');
      return { success: true, user };
    }
    return { success: false, message: data.message || 'Credenciales inválidas' };
  } catch (error) {
    return { success: false, message: 'Error de conexión' };
  }
}

// Register personal account
async function registerPersonal(data) {
  try {
    const response = await fetch(`${API_BASE}/auth/register`, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({
        name: data.name,
        email: data.email,
        phone: data.phone,
        password: data.password,
        role: 'user',
      }),
    });
    const result = await response.json();
    return result;
  } catch (error) {
    return { success: false, message: 'Error de conexión' };
  }
}

// Register B2B corporate account
async function registerB2B(data) {
  try {
    const response = await fetch(`${API_BASE}/auth/register-b2b`, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({
        name: data.contactName,
        email: data.email,
        phone: data.phone,
        password: data.password,
        company: data.companyName,
        rif: data.rif,
        businessType: data.businessType,
      }),
    });
    const result = await response.json();
    return result;
  } catch (error) {
    return { success: false, message: 'Error de conexión' };
  }
}

// Logout
function logout() {
  const user = getCurrentUser();
  if (user) {
    logActivity(user.id, 'LOGOUT', 'Cierre de sesión');
  }
  localStorage.removeItem('zenith_session');
  window.location.href = '/login.html';
}

// Protect page - redirect to login if not authenticated
function protectPage() {
  if (!isLoggedIn()) {
    window.location.href = '/login.html';
    return false;
  }
  return true;
}

// Update UI based on auth state
function updateAuthUI() {
  const user = getCurrentUser();
  const loginBtn = document.querySelector('[data-auth="login"]');
  const userMenu = document.querySelector('[data-auth="user-menu"]');

  if (user) {
    if (loginBtn) loginBtn.style.display = 'none';
    if (userMenu) {
      userMenu.style.display = 'flex';
      const firstName = user.name.split(' ')[0];
      userMenu.innerHTML = `
        <div class="flex items-center gap-2 bg-primary/10 px-4 py-2 rounded-full">
          <span class="material-symbols-outlined text-primary text-sm">person</span>
          <span class="text-[10px] font-bold text-primary uppercase">${firstName}</span>
        </div>
        <button onclick="logout()" class="text-xs text-stone-500 hover:text-red-500 transition-colors">
          <span class="material-symbols-outlined text-sm">logout</span>
        </button>
      `;
    }
  } else {
    if (loginBtn) loginBtn.style.display = 'flex';
    if (userMenu) userMenu.style.display = 'none';
  }
}

// Log activity locally
function logActivity(userId, action, details) {
  try {
    let logs = JSON.parse(localStorage.getItem('zenith_activity_logs') || '[]');
    logs.push({ userId, action, details, timestamp: new Date().toISOString(), ip: 'local' });
    if (logs.length > 100) logs = logs.slice(-100);
    localStorage.setItem('zenith_activity_logs', JSON.stringify(logs));
  } catch (e) {
    // Silently fail
  }
}

// Handle login form submission
async function handleLoginForm(formElement) {
  const email = formElement.querySelector('[name="email"]')?.value;
  const password = formElement.querySelector('[name="password"]')?.value;
  const errorEl = formElement.querySelector('[data-error]');

  if (!email || !password) {
    if (errorEl) {
      errorEl.textContent = 'Completa todos los campos';
      errorEl.style.display = 'block';
    }
    return;
  }

  const result = await login(email, password);
  if (result.success) {
    window.location.href = '/dashboard.html';
  } else {
    if (errorEl) {
      errorEl.textContent = result.message;
      errorEl.style.display = 'block';
    }
  }
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
  updateAuthUI();

  const loginForm = document.querySelector('#loginForm, form[data-auth="login"]');
  if (loginForm) {
    loginForm.addEventListener('submit', async (e) => {
      e.preventDefault();
      await handleLoginForm(loginForm);
    });
  }
});

// Expose to global scope
window.isLoggedIn = isLoggedIn;
window.getCurrentUser = getCurrentUser;
window.login = login;
window.logout = logout;
window.protectPage = protectPage;
window.updateAuthUI = updateAuthUI;
window.logActivity = logActivity;
window.handleLoginForm = handleLoginForm;
