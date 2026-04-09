/**
 * ZENITH ERP - Login Handler
 * Conecta con el backend para autenticación real
 */

async function handleLogin() {
  const email = document.getElementById('email')?.value?.trim();
  const password = document.getElementById('password')?.value;

  // Validaciones
  if (!email) {
    showNotification('Por favor ingrese su correo electrónico', 'error');
    return;
  }

  if (!password) {
    showNotification('Por favor ingrese su contraseña', 'error');
    return;
  }

  try {
    showLoading(true);

    // Llamar a la API real
    const response = await window.zenithApi.login(email, password);

    if (response.status === 'success' && response.data?.token) {
      // Guardar token y sesión
      window.zenithApi.setToken(response.data.token);
      localStorage.setItem('erp_session', 'true');
      localStorage.setItem('user_role', response.data.user?.role || 'USER');
      localStorage.setItem('user_name', response.data.user?.name || '');

      showNotification('Inicio de sesión exitoso. Redirigiendo...', 'success');

      // Redirigir según rol
      setTimeout(() => {
        const role = response.data.user?.role;
        if (role === 'ADMIN' || role === 'MANAGER') {
          window.location.href = '../erp/inicio.html';
        } else {
          window.location.href = '../ecommerce/index.html';
        }
      }, 1500);
    } else {
      showNotification(response.message || 'Error al iniciar sesión', 'error');
    }
  } catch (error) {
    console.error('Login error:', error);
    showNotification(error.message || 'Error de conexión con el servidor', 'error');
  } finally {
    showLoading(false);
  }
}

function showLoading(show) {
  const button = document.querySelector('button[type="submit"]');
  const spinner = document.getElementById('loginSpinner');
  
  if (button) {
    button.disabled = show;
    button.style.opacity = show ? '0.7' : '1';
  }
  
  if (spinner) {
    spinner.style.display = show ? 'inline-block' : 'none';
  }
}

function showNotification(message, type = 'success') {
  // Remover notificación existente
  const existing = document.querySelector('.login-notification');
  if (existing) existing.remove();

  const notification = document.createElement('div');
  const bgColor = type === 'error' ? 'bg-red-600' : 'bg-green-600';
  const icon = type === 'error' ? 'error' : 'check_circle';
  
  notification.className = `login-notification fixed top-6 right-6 ${bgColor} text-white px-6 py-4 rounded-lg shadow-2xl z-50 flex items-center gap-3 animate-slide-in`;
  notification.innerHTML = `
    <span class="material-symbols-outlined">${icon}</span>
    <span class="text-sm font-bold">${message}</span>
  `;
  
  document.body.appendChild(notification);

  setTimeout(() => {
    notification.style.opacity = '0';
    notification.style.transition = 'opacity 0.3s';
    setTimeout(() => notification.remove(), 300);
  }, 4000);
}

// ==================== MOBILE MENU ====================
function openMobileMenu() {
  document.getElementById('mobileMenu').classList.remove('hidden');
  document.getElementById('mobileNav').classList.remove('-translate-x-full');
  document.body.style.overflow = 'hidden';
}

function closeMobileMenu() {
  document.getElementById('mobileMenu').classList.add('hidden');
  document.getElementById('mobileNav').classList.add('-translate-x-full');
  document.body.style.overflow = '';
}

// Verificar si ya está logueado al cargar
document.addEventListener('DOMContentLoaded', () => {
  if (localStorage.getItem('erp_session') === 'true') {
    const role = localStorage.getItem('user_role');
    if (role === 'ADMIN' || role === 'MANAGER') {
      window.location.href = '../erp/inicio.html';
    }
  }

  // Permitir login con Enter
  const passwordInput = document.getElementById('password');
  if (passwordInput) {
    passwordInput.addEventListener('keypress', (e) => {
      if (e.key === 'Enter') {
        handleLogin();
      }
    });
  }
});
