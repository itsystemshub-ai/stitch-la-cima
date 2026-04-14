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

        // Guardar solicitud para aprobación del super usuario (Simulado en Phase 1)
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
            window.location.href = '/auth/login';
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
        button.innerHTML = show ? 'Enviando...' : 'Enviar Solicitud de Recuperación <span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">send</span>';
    }
}

function showNotification(message, type = 'success') {
    const existing = document.querySelector('.recovery-notification');
    if (existing) existing.remove();

    const notification = document.createElement('div');
    const bgColor = type === 'error' ? 'bg-red-600' : 'bg-green-600';
    const icon = type === 'error' ? 'error' : 'check_circle';
    
    notification.className = `recovery-notification fixed top-24 right-6 ${bgColor} text-white px-6 py-4 rounded-lg shadow-2xl z-50 flex items-center gap-3 animate-slide-in`;
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
    document.getElementById('mobileMenu')?.classList.remove('hidden');
    document.getElementById('mobileNav')?.classList.remove('-translate-x-full');
    document.body.style.overflow = 'hidden';
}

function closeMobileMenu() {
    document.getElementById('mobileMenu')?.classList.add('hidden');
    document.getElementById('mobileNav')?.classList.add('-translate-x-full');
    document.body.style.overflow = '';
}
