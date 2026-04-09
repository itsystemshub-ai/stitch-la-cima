// ==================== FORM HANDLER ====================
function handleRecovery() {
  const email = document.getElementById('recoveryEmail')?.value?.trim();
  const newPassword = document.getElementById('newPassword')?.value;
  const confirmPassword = document.getElementById('confirmPassword')?.value;

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

  // Guardar solicitud en localStorage para revisión del super usuario
  const recoveryRequests = JSON.parse(localStorage.getItem('recoveryRequests') || '[]');
  const newRequest = {
    id: Date.now(),
    email: email,
    newPassword: newPassword, // En producción, esto debería enviarse al backend de forma segura
    status: 'PENDING', // PENDING, APPROVED, REJECTED
    date: new Date().toISOString()
  };
  recoveryRequests.push(newRequest);
  localStorage.setItem('recoveryRequests', JSON.stringify(recoveryRequests));

  showNotification('Solicitud enviada al administrador. Será revisada en 24 horas.', 'success');
  setTimeout(() => {
    window.location.href = 'login.html';
  }, 4000);
}

function showNotification(message, type = 'success') {
  const notification = document.createElement('div');
  const bgColor = type === 'error' ? 'bg-red-600' : 'bg-green-600';
  notification.className = `fixed top-24 right-6 ${bgColor} text-white px-6 py-4 rounded-lg shadow-2xl z-50 flex items-center gap-3`;
  const icon = type === 'error' ? 'error' : 'check_circle';
  notification.innerHTML = `<span class="material-symbols-outlined">${icon}</span><span class="text-sm font-bold">${message}</span>`;
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
  document.getElementById('mobileNav').classList.add('open');
  document.body.style.overflow = 'hidden';
}
function closeMobileMenu() {
  document.getElementById('mobileMenu').classList.add('hidden');
  document.getElementById('mobileNav').classList.add('-translate-x-full');
  document.getElementById('mobileNav').classList.remove('open');
  document.body.style.overflow = '';
}
