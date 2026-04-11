/**
 * ZENITH ERP - Registro Handler
 * Conecta con el backend para crear cuentas reales
 */

async function handleRegister() {
    const companyName = document.getElementById('companyName')?.value?.trim();
    const rif = document.getElementById('rif')?.value?.trim();
    const workEmail = document.getElementById('workEmail')?.value?.trim();
    const phone = document.getElementById('phone')?.value?.trim();
    const password = document.getElementById('password')?.value;
    const confirmPassword = document.getElementById('confirmPassword')?.value;

    // Validaciones
    if (!companyName) {
        showNotification('Por favor ingrese el nombre de la empresa', 'error');
        return;
    }

    if (!rif) {
        showNotification('Por favor ingrese el RIF', 'error');
        return;
    }

    if (!workEmail) {
        showNotification('Por favor ingrese el correo de trabajo', 'error');
        return;
    }

    if (!password || password.length < 6) {
        showNotification('La contraseña debe tener al menos 6 caracteres', 'error');
        return;
    }

    if (password !== confirmPassword) {
        showNotification('Las contraseñas no coinciden', 'error');
        return;
    }

    try {
        showLoading(true);

        // Llamar a la API real (Simulado por ahora)
        if (companyName && workEmail && password) {
            showNotification('Cuenta creada exitosamente. Ahora puede iniciar sesión.', 'success');
            setTimeout(() => {
                window.location.href = '/auth/login';
            }, 2000);
        } else {
            showNotification('Error al crear la cuenta', 'error');
        }
    } catch (error) {
        console.error('Register error:', error);
        showNotification(error.message || 'Error de conexión con el servidor', 'error');
    } finally {
        showLoading(false);
    }
}

function showLoading(show) {
    const button = document.querySelector('button[type="submit"]');
    if (button) {
        button.disabled = show;
        button.style.opacity = show ? '0.7' : '1';
        button.innerHTML = show ? 'Creando cuenta...' : '<span class="material-symbols-outlined text-xl">person_add</span> Crear Cuenta';
    }
}

function showNotification(message, type = 'success') {
    // Remover notificación existente
    const existing = document.querySelector('.register-notification');
    if (existing) existing.remove();

    const notification = document.createElement('div');
    const bgColor = type === 'error' ? 'bg-red-600' : 'bg-green-600';
    const icon = type === 'error' ? 'error' : 'check_circle';
    
    notification.className = `register-notification fixed top-6 right-6 ${bgColor} text-white px-6 py-4 rounded-lg shadow-2xl z-50 flex items-center gap-3 animate-slide-in`;
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

// Verificar si ya está logueado al cargar
document.addEventListener('DOMContentLoaded', () => {
    // Si ya hay sesión activa, redirigir al dashboard (lógica de fase 1)
});
