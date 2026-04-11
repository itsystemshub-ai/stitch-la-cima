/**
 * ZENITH ERP - Login Handler
 * Conecta con el backend para autenticación real
 */

async function handleLogin() {
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    
    const email = emailInput?.value?.trim();
    const password = passwordInput?.value;

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

        // Llamar a la API real (Simulado por ahora para diseño 1:1)
        // En el futuro esto usará endpoints de Laravel Breeze/Fortify o personalizados
        
        // Simulación lógica temporal para permitir navegación en esta fase
        if (email && password) {
            localStorage.setItem('erp_session', 'true');
            showNotification('Inicio de sesión exitoso. Redirigiendo...', 'success');
            setTimeout(() => {
                window.location.href = '/dashboard';
            }, 1500);
        } else {
            showNotification('Credenciales inválidas', 'error');
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
        spinner.classList.toggle('hidden', !show);
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
