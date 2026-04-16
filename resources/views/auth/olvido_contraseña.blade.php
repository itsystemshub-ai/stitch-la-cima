<!DOCTYPE html>

<html class="light" lang="es"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta name="description" content="Recuperación de contraseña - MAYOR DE REPUESTO LA CIMA, C.A."/>
<meta name="theme-color" content="#ceff5e">
<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="apple-mobile-web-app-title" content="MAYOR DE REPUESTO LA CIMA, C.A.">
<link rel="manifest" href="{{ asset('manifest.json') }}">
<link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">
<link rel="apple-touch-icon" href="{{ asset('assets/images/logo.png') }}">
<title>Olvido Contraseña | Mayor de Repuesto LA CIMA, C.A.</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&amp;family=Inter:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script src="{{ asset('js/api.js') }}"></script>
<script src="{{ asset('js/olvido_contraseñ​a.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/olvido_contraseña.css') }}">
<script>
  tailwind.config = {
    darkMode: "class",
    theme: {
      extend: {
        colors: {
          primary: "#ceff5e",
          secondary: "#1c1c1c",
          background: "#f6f6f9",
          surface: "#ffffff",
          outline: "#e2e2e5"
        },
        fontFamily: {
          headline: ["League Spartan", "sans-serif"],
          body: ["Inter", "sans-serif"]
        }
      }
    }
  }
</script>
</head>
<body class="bg-surface font-body text-on-surface">
<!-- Top Navigation -->
<nav class="fixed top-0 w-full z-40 bg-white/90 backdrop-blur-md border-b border-outline shadow-sm">
    <div class="flex justify-between items-center px-6 py-3">
        <button onclick="openMobileMenu()" class="md:hidden p-2 hover:bg-stone-100 rounded-full">
            <span class="material-symbols-outlined">menu</span>
        </button>
        <a href="{{ url('/') }}" class="flex items-center gap-2 group">
            <img src="{{ asset('assets/images/logo.png') }}" alt="LA CIMA" class="h-8 md:h-10 w-auto object-contain">
            <div class="flex flex-col">
                <span class="text-xs md:text-sm font-black text-black leading-tight tracking-tighter uppercase whitespace-nowrap">MAYOR DE REPUESTO LA CIMA, C.A</span>
                <span class="text-[8px] md:text-[9px] font-medium text-stone-500 tracking-[0.15em] uppercase leading-none mt-1">RIF.: J-40308741-5</span>
            </div>
        </a>
        <div class="hidden md:flex items-center gap-6">
            <a class="text-xs uppercase tracking-widest font-bold text-on-surface-variant hover:text-black transition-colors" href="{{ url('/') }}">Inicio</a>
            <a class="text-xs uppercase tracking-widest font-bold text-on-surface-variant hover:text-black transition-colors" href="{{ url('/tienda/catalogo_general') }}">Catálogo</a>
            <a class="text-xs uppercase tracking-widest font-bold text-on-surface-variant hover:text-black transition-colors" href="{{ url('/auth/' . 'Nosotros') }}">Nosotros</a>
            <a class="text-xs uppercase tracking-widest font-bold text-on-surface-variant hover:text-black transition-colors" href="{{ url('/auth/' . 'contacto') }}">Contacto</a>
        </div>
        <div class="flex items-center gap-4">
            <a href="{{ url('/auth/login') }}" class="hidden sm:flex items-center gap-2 bg-black text-white px-4 py-2 rounded-md font-bold text-[10px] uppercase tracking-widest hover:bg-stone-800 transition-all">
                <span class="material-symbols-outlined text-primary text-sm">login</span>
                Login
            </a>
        </div>
    </div>
</nav>

<!-- Mobile Menu -->
<div id="mobileMenu" class="fixed inset-0 bg-black/50 z-50 hidden md:hidden" onclick="closeMobileMenu()"></div>
<div id="mobileNav" class="mobile-menu fixed top-0 left-0 h-full w-80 bg-white z-50 shadow-2xl transform -translate-x-full transition-transform duration-300 md:hidden">
    <div class="p-6 border-b border-outline flex justify-between items-center">
        <div class="flex items-center gap-2">
            <img src="{{ asset('assets/images/logo.png') }}" alt="LA CIMA" class="h-8 w-auto">
            <span class="text-xs font-black uppercase">LA CIMA, C.A</span>
        </div>
        <button onclick="closeMobileMenu()" class="p-2 hover:bg-stone-100 rounded-full">
            <span class="material-symbols-outlined">close</span>
        </button>
    </div>
    <nav class="p-6 space-y-4">
        <a href="{{ url('/') }}" class="block text-sm font-bold uppercase tracking-widest text-on-surface-variant hover:text-black pl-4 py-2 transition-colors">Inicio</a>
        <a href="{{ url('/auth/login') }}" class="block text-sm font-bold uppercase tracking-widest text-on-surface-variant hover:text-black pl-4 py-2 transition-colors">Iniciar Sesión</a>
    </nav>
</div>
</nav>

<main class="flex-grow flex items-center justify-center pt-24 pb-12 px-4">

<div class="max-w-4xl w-full grid grid-cols-1 md:grid-cols-12 gap-0 overflow-hidden bg-surface-container-lowest shadow-2xl shadow-black/10 rounded-lg">
<!-- Side Panel: Brand Identity -->
<div class="md:col-span-5 bg-stone-900 p-8 flex flex-col justify-between relative overflow-hidden">
<div class="absolute inset-0 opacity-20 pointer-events-none">
<img alt="Industrial machinery texture" class="w-full h-full object-cover grayscale" data-alt="Close-up of industrial heavy machinery parts with metallic textures and dark shadows in an engineering workshop setting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDTkZtJSSNsIHQErzV1_9XzToxX14snaVh43pqwzxNW6Ysrohl30gc_ET3s2rbj_7xZPTRmQl6vkH5UscwLPkzzpOtsC8WKPHdFedPQRqjs9ltLOdAbPSm9OUkB0jAHwI5AVbjXmmuFCrQBtiUrmD9q5KNpxxK6zXS6ormvjXgxV_NL5LbNwo1zdKtlB8zFOOCA6tzK7QaADLxWIOQccfeV4ZjoVm0mtOIqsFO9_lx9JC9SkXIBSc515ARVcq2IuNoRbZXElNdOh48"/>
</div>
<div class="relative z-10">
<h2 class="font-headline text-3xl font-black text-lime-500 leading-none tracking-tighter uppercase mb-2">
                        MAYOR DE REPUESTO LA CIMA, C.A.
                    </h2>
<div class="w-12 h-1 bg-lime-500 mb-6"></div>
<p class="font-label text-stone-400 uppercase tracking-widest text-[10px] leading-relaxed">
                        Capa de Seguridad: Protocolo 04-B<br/>
                        Gestión de Activos Industriales<br/>
                        Estado del Nodo: Operativo
                    </p>
</div>
<div class="relative z-10">
<div class="p-4 bg-stone-800/50 border-l-4 border-lime-500">
<div class="flex items-center gap-3 mb-2">
<span class="material-symbols-outlined text-lime-500 text-sm">security</span>
<span class="font-headline text-xs font-bold text-stone-100 tracking-widest uppercase">Cifrado Activo</span>
</div>
<p class="text-[11px] text-stone-400 leading-normal">
                            Todas las solicitudes de recuperación se registran mediante identificadores únicos de hardware y están sujetas a auditoría manual del ERP.
                        </p>
</div>
</div>
</div>
<!-- Form Panel -->
<div class="md:col-span-7 p-8 md:p-12 bg-white">
<div class="mb-8">
<h1 class="font-headline text-4xl font-extrabold text-stone-900 uppercase tracking-tighter mb-4 leading-none">
                        Recuperación de <span class="text-primary italic">Credenciales</span>
</h1>
<p class="text-secondary font-medium text-sm max-w-sm">
                        Ingrese su correo registrado y establezca una nueva contraseña. Su solicitud será revisada por el administrador del sistema.
                    </p>
</div>
<form id="recoveryForm" class="space-y-6" onsubmit="event.preventDefault(); handleRecovery();">
<!-- Email Input -->
<div>
<label class="block font-label text-[10px] font-bold uppercase tracking-widest text-stone-500 mb-2">
                            Correo Electrónico Registrado
                        </label>
<div class="relative">
<span class="absolute left-4 top-1/2 -translate-y-1/2 material-symbols-outlined text-stone-400 text-lg">alternate_email</span>
<input id="recoveryEmail" name="recoveryEmail" class="w-full pl-12 pr-4 py-4 bg-surface-container-low border-0 text-stone-900 placeholder:text-stone-400 font-body text-sm focus:ring-2 focus:ring-primary focus:bg-white transition-all outline-none" placeholder="operador@lacima.repuestos.com" type="email" required/>
</div>
</div>

<!-- New Password -->
<div>
<label class="block font-label text-[10px] font-bold uppercase tracking-widest text-stone-500 mb-2">
                            Nueva Contraseña
                        </label>
<div class="relative">
<span class="absolute left-4 top-1/2 -translate-y-1/2 material-symbols-outlined text-stone-400 text-lg">lock</span>
<input id="newPassword" name="newPassword" class="w-full pl-12 pr-4 py-4 bg-surface-container-low border-0 text-stone-900 placeholder:text-stone-400 font-body text-sm focus:ring-2 focus:ring-primary focus:bg-white transition-all outline-none" placeholder="Mínimo 6 caracteres" type="password" required minlength="6"/>
</div>
</div>

<!-- Confirm Password -->
<div>
<label class="block font-label text-[10px] font-bold uppercase tracking-widest text-stone-500 mb-2">
                            Confirmar Contraseña
                        </label>
<div class="relative">
<span class="absolute left-4 top-1/2 -translate-y-1/2 material-symbols-outlined text-stone-400 text-lg">lock_reset</span>
<input id="confirmPassword" name="confirmPassword" class="w-full pl-12 pr-4 py-4 bg-surface-container-low border-0 text-stone-900 placeholder:text-stone-400 font-body text-sm focus:ring-2 focus:ring-primary focus:bg-white transition-all outline-none" placeholder="Repetir contraseña" type="password" required minlength="6"/>
</div>
</div>

<!-- Approval Notice -->
<div class="flex gap-4 items-start p-4 bg-primary/10 border border-primary/20 rounded-lg">
<span class="material-symbols-outlined text-primary mt-0.5">approval</span>
<div>
<p class="text-[12px] text-stone-700 leading-relaxed font-medium">
                            <strong>Aprobación Requerida:</strong> Su solicitud será enviada al super usuario para revisión y aprobación manual. Recibirá una notificación cuando su cuenta sea reactivada.
                        </p>
</div>
</div>

<!-- Submit Button -->
<button class="w-full bg-primary py-5 px-6 text-on-primary font-headline font-black uppercase tracking-widest text-sm flex items-center justify-center gap-3 hover:bg-primary-container hover:text-on-primary-container transition-all group" type="submit">
                        Enviar Solicitud de Recuperación
                        <span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">send</span>
</button>
</form>
<div class="mt-8 pt-6 border-t border-stone-100 flex justify-between items-center">
<a class="text-[10px] font-bold text-stone-400 uppercase hover:text-primary tracking-widest flex items-center gap-1 transition-colors" href="{{ url('/auth/login') }}">
<span class="material-symbols-outlined text-xs">arrow_back</span>
                        Volver al Login
                    </a>
<span class="text-[10px] font-medium text-stone-300 uppercase tracking-tighter">Ref. Sistema: 88-LXC</span>
</div>
</div>
</div>
</main>
<!-- Footer -->
<footer class="bg-black text-white w-full py-16 px-8 border-t border-zinc-900">
<div class="grid grid-cols-1 md:grid-cols-4 gap-12 w-full max-w-7xl mx-auto">
<div class="md:col-span-1">
<div class="flex items-center gap-3 mb-6">
    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="h-12 w-auto">

    <div class="flex flex-col justify-center">
        <span class="text-primary font-black text-sm block uppercase tracking-tighter leading-none">
            MAYOR DE REPUESTO LA CIMA, C.A
        </span>
        <span class="text-primary font-black text-xs block uppercase tracking-tighter leading-none mt-1">
            RIF.: J-40308741-5
        </span>
    </div>
</div>

<div class="flex gap-4">
<div class="h-10 w-10 bg-zinc-900 rounded-full flex items-center justify-center hover:bg-primary hover:text-black cursor-pointer transition-all">
<span class="material-symbols-outlined text-sm">facebook</span>
</div>
<div class="h-10 w-10 bg-zinc-900 rounded-full flex items-center justify-center hover:bg-primary hover:text-black cursor-pointer transition-all">
<span class="material-symbols-outlined text-sm">alternate_email</span>
</div>
</div>
</div>
<div>
<span class="text-white font-black text-xs uppercase tracking-[0.2em] mb-6 block">Catálogo</span>
<nav class="flex flex-col gap-4">
<a class="text-stone-500 text-xs uppercase tracking-widest hover:text-primary transition-colors" href="#">Nuevos Ingresos</a>
<a class="text-stone-500 text-xs uppercase tracking-widest hover:text-primary transition-colors" href="#">Sistemas de Motor</a>
<a class="text-stone-500 text-xs uppercase tracking-widest hover:text-primary transition-colors" href="#">Frenado</a>
<a class="text-stone-500 text-xs uppercase tracking-widest hover:text-primary transition-colors" href="#">Transmisión</a>
</nav>
</div>
<div>
<span class="text-white font-black text-xs uppercase tracking-[0.2em] mb-6 block">Empresa</span>
<nav class="flex flex-col gap-4">
<a class="text-stone-500 text-xs uppercase tracking-widest hover:text-primary transition-colors" href="#">Portal ERP</a>
<a class="text-stone-500 text-xs uppercase tracking-widest hover:text-primary transition-colors" href="#">Términos B2B</a>
<a class="text-stone-500 text-xs uppercase tracking-widest hover:text-primary transition-colors" href="#">Soporte Técnico</a>
<a class="text-stone-500 text-xs uppercase tracking-widest hover:text-primary transition-colors" href="#">Contacto</a>
</nav>
</div>
<div>
<span class="text-white font-black text-xs uppercase tracking-[0.2em] mb-6 block">Sede Central</span>
<p class="text-stone-500 text-xs uppercase tracking-widest leading-relaxed">
        AV. 119, EDIF. MULTICENTRO PASEO EL PARRAL, OFICINA NO. 2-3-C, URB. EL PARRAL, 2001, VALENCIA, EDO. CARABOBO
</p>
<div class="mt-6 p-4 bg-zinc-900 rounded-lg border border-white/5">
<p class="text-[10px] text-primary font-bold uppercase tracking-widest">¿Necesitas ayuda?</p>
<p class="text-white text-xs font-bold mt-1">LACIMA.REPUESTOS@GMAIL.COM</p>
<p class="text-white text-xs font-bold mt-1">PEDIDOSLACIMA@GMAIL.COM</p>
</div>
</div>
</div>
<div class="max-w-7xl mx-auto border-t border-zinc-900 mt-16 pt-8 flex justify-between items-center">
<p class="text-[9px] text-stone-600 uppercase tracking-widest">© 2024 MAYOR DE REPUESTO LA CIMA, C.A. TODOS LOS DERECHOS RESERVADOS.</p>
<div class="flex gap-6">
<span class="text-[9px] text-stone-600 uppercase tracking-widest cursor-pointer hover:text-white">Privacidad</span>
<span class="text-[9px] text-stone-600 uppercase tracking-widest cursor-pointer hover:text-white">Legal</span>
</div>
</div>
</footer>

<script src="{{ asset('js/olvido_contraseña.js') }}"></script>

</body></html>