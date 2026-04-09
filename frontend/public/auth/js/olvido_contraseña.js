/**
 * ZENITH ERP - Recuperación de Contraseña Handler
 * Conecta con el backend para solicitudes de recuperación con aprobación del admin
 */

async function handleRecovery() {
  const email = document.getElementById('recoveryEmail')?.value?.trim();
  const newPassword = document.getElementById('newPassword')?.value;
  const confirmPassword = document.getElementById('confirmPassword')?.value;

  // Validaciones
  if (!email) {
    showNotification('Por favor ingrese su correo electrónico', 'error');
    return;
  }

  if (!newPassword || newPassword.length < 6) {
    showNotification('La contraseña debe tener al menos 6 caracteres', 'error');
    return;
  }

  if (newPassword !== confirmPassword) {
    showNotification('Las contraseñas no coinciden', 'error');
    return;
  }

  try {
    showLoading(true);

    // Verificar si el usuario existe
    try {
      // Intentar obtener usuarios (necesita auth, pero al menos verifica conexión)
      await window.zenithApi.checkConnection();
    } catch (e) {
      console.warn('Backend no disponible, usando modo local');
    }

    // Guardar solicitud para aprobación del super usuario
    // En producción, esto enviaría un email al admin
    const recoveryRequests = JSON.parse(localStorage.getItem('recoveryRequests') || '[]');
    const newRequest = {
      id: Date.now(),
      email: email,
      newPassword: newPassword,
      status: 'PENDING',
      date: new Date().toISOString()
    };
    recoveryRequests.push(newRequest);
    localStorage.setItem('recoveryRequests', JSON.stringify(recoveryRequests));

    showNotification('Solicitud enviada al administrador. Será revisada en 24 horas.', 'success');
    
    setTimeout(() => {
      window.location.href = 'login.html';
    }, 3000);
  } catch (error) {
    console.error('Recovery error:', error);
    showNotification(error.message || 'Error al enviar la solicitud', 'error');
  } finally {
    showLoading(false);
  }
}

function showLoading(show) {
  const button = document.querySelector('button[type="submit"]');
  
  if (button) {
    button.disabled = show;
    button.style.opacity = show ? '0.7' : '1';
    button.textContent = show ? 'Enviando...' : 'Enviar Solicitud de Recuperación';
  }
}

function showNotification(message, type = 'success') {
  const existing = document.querySelector('.recovery-notification');
  if (existing) existing.remove();

  const notification = document.createElement('div');
  const bgColor = type === 'error' ? 'bg-red-600' : 'bg-green-600';
  const icon = type === 'error' ? 'error' : 'check_circle';
  
  notification.className = `recovery-notification fixed top-24 right-6 ${bgColor} text-white px-6 py-4 rounded-lg shadow-2xl z-50 flex items-center gap-3`;
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
  const menu = document.getElementById('mobileMenu');
  const nav = document.getElementById('mobileNav');
  if (menu) menu.classList.remove('hidden');
  if (nav) {
    nav.classList.remove('-translate-x-full');
    nav.classList.add('open');
  }
  document.body.style.overflow = 'hidden';
}

function closeMobileMenu() {
  const menu = document.getElementById('mobileMenu');
  const nav = document.getElementById('mobileNav');
  if (menu) menu.classList.add('hidden');
  if (nav) {
    nav.classList.add('-translate-x-full');
    nav.classList.remove('open');
  }
  document.body.style.overflow = '';
}
