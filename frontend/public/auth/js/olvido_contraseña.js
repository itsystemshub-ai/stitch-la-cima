// ==================== FORM HANDLER ====================
    function handleRecovery() {
        const email = document.getElementById('recoveryEmail')?.value?.trim();
        if (!email) {
            showNotification('Por favor ingrese su correo electrónico', 'error');
            return;
        }

        showNotification('Enlace de recuperación enviado. Revise su correo.', 'success');
        setTimeout(() => {
            window.location.href = 'login.html';
        }, 3000);
    }

    function showNotification(message, type = 'success') {
        const notification = document.createElement('div');
        const bgColor = type === 'error' ? 'bg-red-600' : 'bg-green-600';
        notification.className = `fixed top-24 right-6 ${bgColor} text-white px-6 py-4 rounded-lg shadow-2xl z-50 flex items-center gap-3`;
        const icon = type === 'error' ? 'error' : 'check_circle';
        notification.innerHTML = `<span class="material-symbols-outlined text-primary">${icon}</span><span class="text-sm font-bold">${message}</span>`;
        document.body.appendChild(notification);
        setTimeout(() => {
            notification.style.opacity = '0';
            notification.style.transition = 'opacity 0.3s';
            setTimeout(() => notification.remove(), 300);
        }, 3000);
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