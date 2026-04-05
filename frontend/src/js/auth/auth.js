/**
 * Auth Service - La Cima Zenith ERP
 * Replaces localStorage auth with API calls
 */

// Check if user is logged in
function isLoggedIn() {
  return api.isLoggedIn();
}

// Get current user session
function getCurrentUser() {
  return api.getCurrentUser();
}

// Login
async function login(email, password) {
  try {
    const response = await api.post('/auth/login', { email, password });
    
    if (response.success) {
      const { user, token, refreshToken, expires } = response.data;
      api.setSession({ user, token, refreshToken, expires });
      logActivity(user.id, 'LOGIN', 'Inicio de sesión exitoso');
      return { success: true, user };
    }
    return { success: false, message: 'Credenciales inválidas' };
  } catch (error) {
    return { success: false, message: error.message };
  }
}

// Register personal account
async function registerPersonal(data) {
  try {
    const response = await api.post('/auth/register', {
      name: data.name,
      email: data.email,
      phone: data.phone,
      password: data.password,
      role: 'user',
    });
    
    if (response.success) {
      return { success: true, user: response.data.user };
    }
    return { success: false, message: 'Error en el registro' };
  } catch (error) {
    return { success: false, message: error.message };
  }
}

// Register B2B corporate account
async function registerB2B(data) {
  try {
    const response = await api.post('/auth/register-b2b', {
      name: data.contactName,
      email: data.email,
      phone: data.phone,
      password: data.password,
      company: data.companyName,
      rif: data.rif,
      businessType: data.businessType,
    });
    
    if (response.success) {
      return { success: true, message: response.data.message };
    }
    return { success: false, message: 'Error en el registro' };
  } catch (error) {
    return { success: false, message: error.message };
  }
}

// Logout
async function logout() {
  const user = getCurrentUser();
  if (user) {
    try {
      await api.post('/auth/logout');
    } catch (e) {
      // Continue logout even if API fails
    }
  }
  logActivity(user?.id, 'LOGOUT', 'Cierre de sesión');
  api.clearSession();
  window.location.href = 'login.html';
}

// Protect page - redirect to login if not authenticated
function protectPage() {
  if (!isLoggedIn()) {
    window.location.href = 'login.html';
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

// Log activity (stored locally for now, can be moved to API)
function logActivity(userId, action, details) {
  try {
    let logs = JSON.parse(localStorage.getItem('zenith_activity_logs') || '[]');
    logs.push({
      userId,
      action,
      details,
      timestamp: new Date().toISOString(),
      ip: 'local'
    });
    // Keep only last 100 logs
    if (logs.length > 100) logs = logs.slice(-100);
    localStorage.setItem('zenith_activity_logs', JSON.stringify(logs));
  } catch (e) {
    // Silently fail if localStorage is unavailable
  }
}

// Handle login form
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
    window.location.href = 'dashboard.html';
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

  // Auto-handle login forms
  const loginForm = document.querySelector('#loginForm, form[data-auth="login"]');
  if (loginForm) {
    loginForm.addEventListener('submit', async (e) => {
      e.preventDefault();
      await handleLoginForm(loginForm);
    });
  }
});
