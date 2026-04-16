<!DOCTYPE html>
<html class="light" lang="es"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<!-- PWA & SEO Meta Tags -->
<meta name="description" content="@yield('meta_description', 'Mayor de Repuesto La Cima, C.A. - Distribuidor autorizado de repuestos industriales para motores Cummins, Volvo, Detroit Diesel.')">
<meta name="keywords" content="@yield('meta_keywords', 'repuestos, motores, cummins, volvo, detroit diesel, industriales, venezuela')">
<meta name="author" content="Mayor de Repuesto La Cima, C.A.">
<!-- Open Graph Meta Tags -->
<meta property="og:title" content="@yield('title', 'E-commerce Profesional | Mayor de Repuesto La Cima, C.A.')">
<meta property="og:description" content="@yield('meta_description', 'Mayor de Repuesto La Cima, C.A. - Distribuidor autorizado de repuestos industriales.')">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ request()->url() }}">
<meta property="og:image" content="{{ asset('assets/images/logo.png') }}">
<meta name="theme-color" content="#ceff5e">
<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="apple-mobile-web-app-title" content="MAYOR DE REPUESTO LA CIMA, C.A.">
<link rel="manifest" href="/manifest.json">
<link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">
<link rel="apple-touch-icon" href="{{ asset('assets/images/logo.png') }}">
<title>@yield('title', 'E-commerce Profesional | Mayor de Repuesto La Cima, C.A.')</title>
@vite(['resources/css/app.css', 'resources/js/app.js'])
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&family=Sora:wght@100..800&family=League+Spartan:wght@100..900&family=Inter:wght@100..900&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
@stack('styles')
</head>
<body class="bg-background text-on-surface selection:bg-primary/30">

<!-- Mobile Menu -->
<div id="mobileMenu" class="fixed inset-0 bg-black/50 z-50 hidden" onclick="closeMobileMenu()"></div>
<div id="mobileNav" class="fixed top-0 left-0 h-full w-80 bg-white z-50 shadow-2xl transform -translate-x-full transition-transform duration-300">
    <div class="p-6 border-b border-outline flex justify-between items-center">
        <div class="flex items-center gap-2">
            <img src="{{ asset('assets/images/logo.png') }}" alt="MAYOR DE REPUESTO LA CIMA, C.A." class="h-8 w-auto">
            <span class="text-xs font-black uppercase">MAYOR DE REPUESTO LA CIMA, C.A.</span>
        </div>
        <button onclick="closeMobileMenu()" class="p-2 hover:bg-stone-100 rounded-full">
            <span class="material-symbols-outlined">close</span>
        </button>
    </div>
    <nav class="p-6 space-y-4">
        <a href="/tienda/index" class="block text-sm font-bold uppercase tracking-widest text-black border-l-4 border-primary pl-4 py-2">Inicio</a>
        <a href="/tienda/catalogo_general" class="block text-sm font-bold uppercase tracking-widest text-on-surface-variant hover:text-black pl-4 py-2 transition-colors">Catálogo</a>
        <a href="/tienda/nosotros" class="block text-sm font-bold uppercase tracking-widest text-on-surface-variant hover:text-black pl-4 py-2 transition-colors">Nosotros</a>
        <a href="/tienda/contacto" class="block text-sm font-bold uppercase tracking-widest text-on-surface-variant hover:text-black pl-4 py-2 transition-colors">Contacto</a>
    </nav>
    <div class="p-6 border-t border-outline">
        @guest
            <a href="/auth/login" class="flex items-center gap-2 bg-black text-white px-4 py-3 rounded-md font-bold text-xs uppercase tracking-widest">
                <span class="material-symbols-outlined text-primary text-sm">database</span>
                Login ERP
            </a>
        @endguest
        @auth
            <div class="space-y-4">
                <div class="flex items-center gap-3 p-3 bg-stone-50 rounded-lg">
                    <div class="h-10 w-10 bg-primary/20 flex items-center justify-center rounded-full">
                        <span class="material-symbols-outlined text-primary">person</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-xs font-bold uppercase">{{ Auth::user()->name }}</span>
                        <span class="text-[10px] text-stone-500 uppercase">{{ Auth::user()->email }}</span>
                    </div>
                </div>
                <a href="/erp/inicio" class="flex items-center gap-2 text-stone-600 font-bold text-xs uppercase tracking-widest pl-2">
                    <span class="material-symbols-outlined text-sm">dashboard</span>
                    Panel ERP
                </a>
                <form method="POST" action="/auth/logout">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-2 bg-red-50 text-red-600 px-4 py-3 rounded-md font-bold text-xs uppercase tracking-widest">
                        <span class="material-symbols-outlined text-sm">logout</span>
                        Cerrar Sesión
                    </button>
                </form>
            </div>
        @endauth
    </div>
</div>

<!-- TopNavBar -->
<nav class="fixed top-0 w-full z-40 bg-white/90 backdrop-blur-md border-b border-outline shadow-sm">
    <div class="flex justify-between items-center px-6 py-3">
        <button onclick="openMobileMenu()" class="md:hidden p-2 hover:bg-stone-100 rounded-full">
            <span class="material-symbols-outlined">menu</span>
        </button>
        
        <a href="/tienda/index" class="flex items-center gap-2 group">
            <img src="{{ asset('assets/images/logo.png') }}" alt="LA CIMA" class="h-8 md:h-10 w-auto object-contain">
            <div class="flex flex-col">
                <span class="text-xs md:text-sm font-black text-black leading-tight tracking-tighter uppercase whitespace-nowrap">MAYOR DE REPUESTO LA CIMA, C.A</span>
                <span class="text-[8px] md:text-[9px] font-medium text-stone-500 tracking-[0.15em] uppercase leading-none mt-1">RIF.: J-40308741-5</span>
            </div>
        </a>
        <div class="hidden md:flex items-center gap-6">
            <a class="text-xs uppercase tracking-widest font-bold text-black border-b-2 border-primary" href="/tienda/index">Inicio</a>
            <a class="text-xs uppercase tracking-widest font-bold text-on-surface-variant hover:text-black transition-colors" href="/tienda/catalogo_general">Catálogo</a>
            <a class="text-xs uppercase tracking-widest font-bold text-on-surface-variant hover:text-black transition-colors" href="/tienda/nosotros">Nosotros</a>
            <a class="text-xs uppercase tracking-widest font-bold text-on-surface-variant hover:text-black transition-colors" href="/tienda/contacto">Contacto</a>
        </div>
        <div class="flex items-center gap-4">
            <div class="relative hidden lg:block">
                <input id="searchInput" class="bg-stone-100 border-none rounded-lg pl-10 pr-4 py-2 text-sm focus:ring-2 focus:ring-primary w-64" placeholder="Buscar por OEM o VIN..." type="text"/>
                <span class="material-symbols-outlined absolute left-3 top-2 text-on-surface-variant text-lg">search</span>
            </div>
            <a href="/tienda/carrito" class="relative p-2 text-black hover:bg-stone-100 rounded-full transition-colors">
                <span class="material-symbols-outlined">shopping_cart</span>
                <span id="cart-count" class="absolute top-0 right-0 bg-primary text-black text-[10px] font-bold h-4 w-4 flex items-center justify-center rounded-full border border-white">0</span>
            </a>
            <div class="h-6 w-px bg-outline mx-2 hidden sm:block"></div>
            @guest
                <a href="/auth/login" class="hidden sm:flex items-center gap-2 bg-black text-white px-4 py-2 rounded-md font-bold text-[10px] uppercase tracking-widest hover:bg-stone-800 transition-all">
                    <span class="material-symbols-outlined text-primary text-sm">database</span>
                    Login
                </a>
            @endguest
            @auth
                <div class="relative group">
                    <button class="flex items-center gap-2 bg-stone-100 hover:bg-stone-200 px-4 py-2 rounded-full transition-all">
                        <div class="flex flex-col items-end hidden lg:flex">
                            <span class="text-[10px] font-black uppercase text-black leading-none">{{ Auth::user()->name }}</span>
                            <span class="text-[8px] font-bold text-stone-500 uppercase tracking-tighter">Conectado</span>
                        </div>
                        <div class="h-8 w-8 bg-black flex items-center justify-center rounded-full ml-1">
                            <span class="material-symbols-outlined text-primary text-lg">person</span>
                        </div>
                    </button>
                    <!-- Dropdown Menu -->
                    <div class="absolute right-0 mt-2 w-56 bg-white border border-outline shadow-2xl rounded-xl py-2 invisible group-hover:visible opacity-0 group-hover:opacity-100 transition-all duration-300 z-50">
                        <div class="px-4 py-3 border-b border-outline mb-2">
                            <p class="text-[10px] font-bold text-stone-400 uppercase">Usuario Autenticado</p>
                            <p class="text-xs font-black truncate">{{ Auth::user()->email }}</p>
                        </div>
                        <a href="/erp/inicio" class="flex items-center gap-3 px-4 py-2 text-xs font-bold text-stone-700 hover:bg-stone-50 transition-colors uppercase">
                            <span class="material-symbols-outlined text-lg">dashboard</span>
                            Ir al ERP
                        </a>
                        <a href="/tienda/perfil" class="flex items-center gap-3 px-4 py-2 text-xs font-bold text-stone-700 hover:bg-stone-50 transition-colors uppercase">
                            <span class="material-symbols-outlined text-lg">settings</span>
                            Mi Perfil
                        </a>
                        <div class="h-px bg-outline my-1"></div>
                        <form method="POST" action="/auth/logout">
                            @csrf
                            <button type="submit" class="w-full flex items-center gap-3 px-4 py-2 text-xs font-bold text-red-600 hover:bg-red-50 transition-colors uppercase">
                                <span class="material-symbols-outlined text-lg">logout</span>
                                Salir del Sistema
                            </button>
                        </form>
                    </div>
                </div>
            @endauth
        </div>
    </div>
</nav>

@yield('content')

<!-- Global Store Footer -->
<footer class="bg-gradient-to-b from-stone-950 to-black text-white pt-20 pb-8">
    <div class="container mx-auto px-6">
        <!-- Main Footer Content -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 mb-16">
            <!-- Brand & Contact -->
            <div class="lg:col-span-2">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-14 h-14 bg-primary/10 rounded-xl flex items-center justify-center">
                        <span class="material-symbols-outlined text-3xl text-primary">precision_manufacturing</span>
                    </div>
                    <div>
                        <h4 class="font-black text-2xl uppercase tracking-tighter text-white">MAYOR DE REPUESTO LA CIMA, C.A.</h4>
                        <p class="text-primary text-xs font-bold uppercase tracking-[0.3em]">RIF: J-40308741-5</p>
                    </div>
                </div>
                
                <p class="text-stone-400 text-sm leading-relaxed mb-6 max-w-lg">
MAYOR DE REPUESTO LA CIMA, C.A.<br>
                        <span class="text-stone-500">Distribuidor autorizado de repuestos para motores Cummins, Volvo, Detroit Diesel y más.</span><br>
                        <span class="text-primary text-xs font-bold">RIF: J-40308741-5</span>
                </p>

                <!-- Contact Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <a href="tel:+584244582766" class="bg-white/5 hover:bg-white/10 border border-white/10 rounded-xl p-4 transition-all group">
                        <div class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-primary group-hover:scale-110 transition">phone</span>
                            <div>
                                <p class="text-[10px] text-stone-500 uppercase font-bold">Teléfono</p>
                                <p class="text-white font-semibold">+58 424-4582766</p>
                            </div>
                        </div>
                    </a>
                    <a href="mailto:lacima.repuestos@gmail.com" class="bg-white/5 hover:bg-white/10 border border-white/10 rounded-xl p-4 transition-all group">
                        <div class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-primary group-hover:scale-110 transition">email</span>
                            <div>
                                <p class="text-[10px] text-stone-500 uppercase font-bold">General</p>
                                <p class="text-white font-semibold">lacima.repuestos@gmail.com</p>
                            </div>
                        </div>
                    </a>
                    <a href="mailto:pedidoslacima@gmail.com" class="bg-white/5 hover:bg-white/10 border border-white/10 rounded-xl p-4 transition-all group">
                        <div class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-primary group-hover:scale-110 transition">shopping_cart</span>
                            <div>
                                <p class="text-[10px] text-stone-500 uppercase font-bold">Pedidos</p>
                                <p class="text-white font-semibold">pedidoslacima@gmail.com</p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Location -->
                <div class="mt-6 bg-stone-900/50 rounded-xl p-4 border border-white/5">
                    <div class="flex items-start gap-3">
                        <span class="material-symbols-outlined text-primary mt-1">location_on</span>
                        <div>
                            <p class="text-xs font-bold text-white uppercase mb-1">Dirección</p>
                            <p class="text-stone-400 text-sm">AV. 119, EDIF. MULTICENTRO PASEO EL PARRAL, OFICINA 2-3-C, URB. EL PARRAL, VALENCIA, EDO. CARABOBO</p>
                            <p class="text-primary text-xs font-bold mt-2">RIF: J-40308741-5</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h5 class="text-white font-black uppercase tracking-widest text-sm mb-6 flex items-center gap-2">
                    <span class="w-1 h-4 bg-primary rounded-full"></span>
                    Catálogo
                </h5>
                <ul class="space-y-3">
                    <li><a href="/tienda/catalogo_general" class="text-stone-400 hover:text-primary transition-colors text-sm font-medium flex items-center gap-2"><span class="material-symbols-outlined text-sm">chevron_right</span> Motores Diesel</a></li>
                    <li><a href="/tienda/catalogo_general?q=filtro" class="text-stone-400 hover:text-primary transition-colors text-sm font-medium flex items-center gap-2"><span class="material-symbols-outlined text-sm">chevron_right</span> Filtros & Lubricantes</a></li>
                    <li><a href="/tienda/catalogo_general?q=turbo" class="text-stone-400 hover:text-primary transition-colors text-sm font-medium flex items-center gap-2"><span class="material-symbols-outlined text-sm">chevron_right</span> Turbos & Compresores</a></li>
                    <li><a href="/tienda/catalogo_general?q=inyector" class="text-stone-400 hover:text-primary transition-colors text-sm font-medium flex items-center gap-2"><span class="material-symbols-outlined text-sm">chevron_right</span> Inyección Combustible</a></li>
                    <li><a href="/tienda/catalogo_general?q=freno" class="text-stone-400 hover:text-primary transition-colors text-sm font-medium flex items-center gap-2"><span class="material-symbols-outlined text-sm">chevron_right</span> Frenos & Suspensión</a></li>
                </ul>
            </div>

            <!-- Support -->
            <div>
                <h5 class="text-white font-black uppercase tracking-widest text-sm mb-6 flex items-center gap-2">
                    <span class="w-1 h-4 bg-primary rounded-full"></span>
                    Soporte
                </h5>
                <ul class="space-y-3">
                    <li><a href="/tienda/contacto" class="text-stone-400 hover:text-white transition-colors text-sm font-medium flex items-center gap-2"><span class="material-symbols-outlined text-sm">support_agent</span> Contacto Ventas</a></li>
                    <li><a href="/tienda/terminos_b2b" class="text-stone-400 hover:text-white transition-colors text-sm font-medium flex items-center gap-2"><span class="material-symbols-outlined text-sm">description</span> Términos B2B</a></li>
                    <li><a href="/tienda/soporte" class="text-stone-400 hover:text-white transition-colors text-sm font-medium flex items-center gap-2"><span class="material-symbols-outlined text-sm">verified_user</span> Políticas Garantía</a></li>
                    <li><a href="/tienda/nosotros" class="text-stone-400 hover:text-white transition-colors text-sm font-medium flex items-center gap-2"><span class="material-symbols-outlined text-sm">business</span> Nosotros</a></li>
                </ul>

                <!-- Social Links -->
                <div class="mt-8">
                    <p class="text-xs font-bold text-stone-500 uppercase tracking-widest mb-4">Síguenos</p>
                    <div class="flex gap-3">
                        <a href="#" class="w-10 h-10 bg-white/5 hover:bg-primary rounded-lg flex items-center justify-center transition-all group">
                            <span class="material-symbols-outlined text-stone-400 group-hover:text-black">chat</span>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white/5 hover:bg-primary rounded-lg flex items-center justify-center transition-all group">
                            <span class="material-symbols-outlined text-stone-400 group-hover:text-black">campaign</span>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white/5 hover:bg-primary rounded-lg flex items-center justify-center transition-all group">
                            <span class="material-symbols-outlined text-stone-400 group-hover:text-black">video_library</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="border-t border-white/10 pt-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <div class="flex items-center gap-4">
                    <span class="text-stone-500 text-xs uppercase tracking-widest">© 2026 MAYOR DE REPUESTO LA CIMA, C.A. - RIF: J-40308741-5</span>
                    <span class="text-stone-600">|</span>
                    <span class="text-stone-600 text-xs">Todos los derechos reservados</span>
                </div>
                <div class="flex items-center gap-2 text-stone-500 text-xs">
                    <span class="material-symbols-outlined text-sm text-primary">verified</span>
                    <span>Zenith ERP v6.0</span>
                </div>
            </div>
        </div>
    </div>
</footer>

<script>
function openMobileMenu() {
    document.getElementById('mobileMenu').classList.remove('hidden');
    document.getElementById('mobileNav').classList.remove('-translate-x-full');
}
function closeMobileMenu() {
    document.getElementById('mobileMenu').classList.add('hidden');
    document.getElementById('mobileNav').classList.add('-translate-x-full');
}
</script>
@stack('scripts')
</body>
</html>
