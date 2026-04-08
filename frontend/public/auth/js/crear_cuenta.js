// ==================== FORM HANDLER ====================
    function handleRegister() {
        const company = document.getElementById('companyName')?.value?.trim();
        const rif = document.getElementById('rif')?.value?.trim();
        const email = document.getElementById('workEmail')?.value?.trim();
        const password = document.getElementById('password')?.value?.trim();

        if (!company || !rif || !email || !password) {
            showNotification('Por favor complete todos los campos obligatorios', 'error');
            return;
        }
        if (password.length < 6) {
            showNotification('La contraseña debe tener al menos 6 caracteres', 'error');
            return;
        }

        // Simulate registration (in production, this would call an API)
        localStorage.setItem('erp_session', 'true');
        localStorage.setItem('user_company', company);
        localStorage.setItem('user_email', email);

        showNotification('¡Cuenta creada exitosamente! Redirigiendo...', 'success');
        setTimeout(() => {
            window.location.href = '/frontend/public/erp/dashboard_principal.html';
        }, 2000);
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