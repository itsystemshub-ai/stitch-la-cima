<!DOCTYPE html>
<html class="light" lang="es">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta name="description" content="Carrito de compras - Repuestos industriales. MAYOR DE REPUESTO LA CIMA, C.A."/>
    <meta name="theme-color" content="#ceff5e">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="LA CIMA">
    <link rel="manifest" href="../manifest.json">
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/images/logo.png') }}">
    <title>Carrito | Mayor de Repuesto LA CIMA, C.A.</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
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
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <script src="js/carrito.js"></script>
    <link rel="stylesheet" href="css/carrito.css">
</head>
<body class="bg-background text-on-surface selection:bg-primary/30 min-h-screen flex flex-col">

<!-- Top Navigation -->
<nav class="fixed top-0 w-full z-40 bg-white/90 backdrop-blur-md border-b border-outline shadow-sm">
    <div class="flex justify-between items-center px-6 py-3">
        <button onclick="openMobileMenu()" class="md:hidden p-2 hover:bg-stone-100 rounded-full">
            <span class="material-symbols-outlined">menu</span>
        </button>
        <a href="{{ url('/tienda/' . 'index') }}" class="flex items-center gap-2 group">
            <img src="{{ asset('assets/images/logo.png') }}" alt="LA CIMA" class="h-8 md:h-10 w-auto object-contain">
            <div class="flex flex-col">
                <span class="text-xs md:text-sm font-black text-black leading-tight tracking-tighter uppercase whitespace-nowrap">MAYOR DE REPUESTO LA CIMA, C.A</span>
                <span class="text-[8px] md:text-[9px] font-medium text-stone-500 tracking-[0.15em] uppercase leading-none mt-1">RIF.: J-40308741-5</span>
            </div>
        </a>
        <div class="hidden md:flex items-center gap-6">
            <a class="text-xs uppercase tracking-widest font-bold text-on-surface-variant hover:text-black transition-colors" href="{{ url('/tienda/' . 'index') }}">Inicio</a>
            <a class="text-xs uppercase tracking-widest font-bold text-on-surface-variant hover:text-black transition-colors" href="{{ url('/tienda/' . 'catalogo_general') }}">Catálogo</a>
            <a class="text-xs uppercase tracking-widest font-bold text-on-surface-variant hover:text-black transition-colors" href="{{ url('/tienda/' . 'Nosotros') }}">Nosotros</a>
            <a class="text-xs uppercase tracking-widest font-bold text-on-surface-variant hover:text-black transition-colors" href="{{ url('/tienda/' . 'contacto') }}">Contacto</a>
        </div>
        <div class="flex items-center gap-4">
            <div class="relative hidden lg:block">
                <input id="searchInput" class="bg-stone-100 border-none rounded-lg pl-10 pr-4 py-2 text-sm focus:ring-2 focus:ring-primary w-64" placeholder="Buscar por OEM o VIN..." type="text"/>
                <span class="material-symbols-outlined absolute left-3 top-2 text-on-surface-variant text-lg">search</span>
            </div>
            <a href="{{ url('/tienda/' . 'carrito') }}" class="relative p-2 text-black hover:bg-stone-100 rounded-full transition-colors">
                <span class="material-symbols-outlined">shopping_cart</span>
                <span id="cart-count" class="cart-badge absolute top-0 right-0 bg-primary text-black text-[10px] font-bold h-4 w-4 flex items-center justify-center rounded-full border border-white">0</span>
            </a>
            <div class="h-6 w-px bg-outline mx-2 hidden sm:block"></div>
            <a href="{{ url('/auth/' . 'login') }}" class="hidden sm:flex items-center gap-2 bg-black text-white px-4 py-2 rounded-md font-bold text-[10px] uppercase tracking-widest hover:bg-stone-800 transition-all">
                <span class="material-symbols-outlined text-primary text-sm">database</span>
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
        <a href="{{ url('/tienda/' . 'index') }}" class="block text-sm font-bold uppercase tracking-widest text-on-surface-variant hover:text-black pl-4 py-2 transition-colors">Inicio</a>
        <a href="{{ url('/tienda/' . 'catalogo_general') }}" class="block text-sm font-bold uppercase tracking-widest text-on-surface-variant hover:text-black pl-4 py-2 transition-colors">Catálogo</a>
        <a href="{{ url('/tienda/' . 'Nosotros') }}" class="block text-sm font-bold uppercase tracking-widest text-on-surface-variant hover:text-black pl-4 py-2 transition-colors">Nosotros</a>
        <a href="{{ url('/tienda/' . 'contacto') }}" class="block text-sm font-bold uppercase tracking-widest text-on-surface-variant hover:text-black pl-4 py-2 transition-colors">Contacto</a>
    </nav>
    <div class="p-6 border-t border-outline">
        <a href="{{ url('/auth/' . 'login') }}" class="flex items-center gap-2 bg-black text-white px-4 py-3 rounded-md font-bold text-xs uppercase tracking-widest">
            <span class="material-symbols-outlined text-primary text-sm">database</span>
            Login ERP
        </a>
    </div>
</div>

<!-- Main Content -->
<main class="flex-grow w-full max-w-screen-2xl mx-auto px-6 md:px-12 pt-32 pb-24 relative z-10">
    <!-- Page Header -->
    <div class="mb-16">
        <h1 class="text-6xl font-black text-black uppercase tracking-tighter leading-none mb-4 italic">Carrito de <span class="text-primary italic">Compras</span></h1>
        <p class="text-[10px] font-black text-on-surface-variant uppercase tracking-[0.4em]">Revisa tu inventario de repuestos industriales</p>
    </div>

    <!-- Empty Cart Message (shown when cart is empty) -->
    <div id="emptyCartMessage" class="hidden cart-empty text-center py-24">
        <span class="material-symbols-outlined text-8xl text-stone-300 mb-8">shopping_cart_off</span>
        <h2 class="text-3xl font-black text-black uppercase tracking-tight mb-4">Tu carrito está vacío</h2>
        <p class="text-on-surface-variant mb-8">Agrega repuestos industriales de alta calidad para comenzar tu pedido.</p>
        <a href="{{ url('/tienda/' . 'catalogo_general') }}" class="inline-flex items-center gap-3 bg-black text-primary hover:bg-primary hover:text-black font-black uppercase py-4 px-10 tracking-[0.3em] text-xs transition-all">
            <span class="material-symbols-outlined">storefront</span>
            Explorar Catálogo
        </a>
    </div>

    <!-- Cart Content (shown when cart has items) -->
    <div id="cartContent" class="hidden">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-start">
            <!-- Cart Items -->
            <div class="lg:col-span-8 space-y-4">
                <div class="bg-white border border-outline overflow-hidden rounded-lg">
                    <!-- Header -->
                    <div class="grid grid-cols-12 gap-6 p-6 bg-black text-primary font-black text-xs uppercase tracking-[0.3em] items-center rounded-t-lg">
                        <div class="col-span-6">Especificación del Componente</div>
                        <div class="col-span-2 text-center">Cant.</div>
                        <div class="col-span-2 text-right">Precio Unit.</div>
                        <div class="col-span-2 text-right">Subtotal</div>
                    </div>

                    <!-- Items Container -->
                    <div id="cartItemsContainer" class="divide-y divide-outline">
                        <!-- Items will be dynamically inserted here -->
                    </div>

                    <!-- Cart Summary Bar -->
                    <div class="p-6 bg-background/50 border-t border-outline flex flex-col sm:flex-row items-center justify-between gap-4">
                        <a href="{{ url('/tienda/' . 'catalogo_general') }}" class="flex items-center gap-3 font-black text-[10px] uppercase tracking-[0.3em] hover:text-primary transition-colors group">
                            <span class="material-symbols-outlined group-hover:-translate-x-2 transition-transform">arrow_back</span>
                            Continuar Comprando
                        </a>
                        <button onclick="clearCart()" class="flex items-center gap-3 font-black text-[10px] uppercase tracking-[0.3em] text-red-500 hover:text-black transition-colors group">
                            <span class="material-symbols-outlined group-hover:scale-125 transition-transform">delete_sweep</span>
                            Vaciar Carrito
                        </button>
                    </div>
                </div>
            </div>

            <!-- Order Summary -->
            <aside class="lg:col-span-4 sticky top-32 space-y-6">
                <!-- Summary Card -->
                <div class="bg-white border border-outline p-10 shadow-sm relative overflow-hidden rounded-lg">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-primary/10 -mr-12 -mt-12 rotate-45 pointer-events-none"></div>
                    
                    <h2 class="text-3xl font-black text-black uppercase tracking-tighter mb-10 pb-4 border-b-4 border-primary italic">Resumen del Pedido</h2>
                    
                    <div class="space-y-6 mb-12">
                        <div class="flex justify-between items-center text-xs font-black uppercase tracking-widest text-on-surface-variant">
                            <span>Subtotal</span>
                            <span id="subtotal" class="text-black text-lg tracking-tighter">$0.00</span>
                        </div>
                        <div class="flex justify-between items-center text-xs font-black uppercase tracking-widest text-on-surface-variant">
                            <span>Envío (Flete)</span>
                            <span id="shipping" class="text-primary text-lg tracking-tighter">$45.00</span>
                        </div>
                        <div class="flex justify-between items-center text-xs font-black uppercase tracking-widest text-on-surface-variant">
                            <span>IVA (16%)</span>
                            <span id="tax" class="text-black text-lg tracking-tighter">$0.00</span>
                        </div>
                        
                        <div class="pt-8 border-t-2 border-outline mt-8">
                            <div class="flex flex-col gap-2">
                                <span class="text-[10px] font-black uppercase tracking-[0.4em] text-on-surface-variant italic">Total a Pagar</span>
                                <div id="total" class="text-5xl font-black text-black tracking-tighter tabular-nums leading-none">$0.00</div>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <button onclick="checkout()" class="w-full bg-black text-primary hover:bg-white hover:text-black border-2 border-black font-black uppercase py-5 px-10 tracking-[0.3em] text-[11px] shadow-2xl transition-all flex items-center justify-center gap-4 group">
                            Proceder al Pago
                            <span class="material-symbols-outlined group-hover:translate-x-2 transition-transform">payments</span>
                        </button>
                        <p class="text-[9px] text-on-surface-variant text-center font-bold uppercase tracking-widest leading-relaxed">
                            Precios incluyen IVA. Envío internacional sujeto a inspección aduanera.
                        </p>
                    </div>

                    <!-- Security Badge -->
                    <div class="mt-12 pt-8 border-t border-outline flex items-center gap-4 opacity-40 grayscale hover:grayscale-0 hover:opacity-100 transition-all">
                        <span class="material-symbols-outlined text-4xl">verified_user</span>
                        <div class="text-[9px] font-black uppercase tracking-widest leading-tight">
                            Portal Industrial <br/> Encriptado y Seguro
                        </div>
                    </div>
                </div>

                <!-- Support Card -->
                <div class="bg-black p-8 group relative overflow-hidden rounded-lg">
                    <div class="relative z-10">
                        <h4 class="text-primary text-lg font-black uppercase tracking-tighter mb-2 italic">¿Necesitas Soporte?</h4>
                        <p class="text-stone-500 text-[10px] font-bold uppercase tracking-widest mb-6 leading-relaxed">Nuestro equipo de ingeniería está disponible para verificación de catálogo en tiempo real.</p>
                        <a href="mailto:info@lacima.com" class="text-white text-[10px] font-black uppercase tracking-[0.2em] border-b-2 border-primary pb-1 hover:text-primary transition-colors">Solicitar Verificación de Catálogo</a>
                    </div>
                    <span class="material-symbols-outlined absolute right-[-20px] bottom-[-20px] text-white/5 text-[120px] transform group-hover:scale-110 transition-transform">engineering</span>
                </div>
            </aside>
        </div>
    </div>
</main>

<!-- Scroll to Top Button -->
<button id="scrollTopBtn" onclick="window.scrollTo({top: 0, behavior: 'smooth'})" class="fixed bottom-8 right-8 bg-primary text-black p-4 shadow-xl hover:bg-white transition-all z-30 border border-black/10 hidden">
    <span class="material-symbols-outlined font-black">arrow_upward</span>
</button>

<!-- PWA Install Button -->
<div id="pwaInstallContainer" class="fixed bottom-8 left-8 z-30 hidden">
    <button id="pwaInstallBtn" class="bg-black text-primary px-6 py-4 rounded-lg shadow-xl hover:bg-stone-800 transition-all flex items-center gap-3 font-bold text-xs uppercase tracking-widest">
        <span class="material-symbols-outlined text-primary">download</span>
        Instalar App
    </button>
</div>

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
<a class="text-stone-500 text-xs uppercase tracking-widest hover:text-primary transition-colors" href="{{ url('/tienda/' . 'catalogo_general') }}">Nuevos Ingresos</a>
<a class="text-stone-500 text-xs uppercase tracking-widest hover:text-primary transition-colors" href="{{ url('/tienda/' . 'catalogo_general') }}">Sistemas de Motor</a>
<a class="text-stone-500 text-xs uppercase tracking-widest hover:text-primary transition-colors" href="{{ url('/tienda/' . 'catalogo_general') }}">Frenado</a>
<a class="text-stone-500 text-xs uppercase tracking-widest hover:text-primary transition-colors" href="{{ url('/tienda/' . 'catalogo_general') }}">Transmisión</a>
</nav>
</div>
<div>
<span class="text-white font-black text-xs uppercase tracking-[0.2em] mb-6 block">Empresa</span>
<nav class="flex flex-col gap-4">
<a class="text-stone-500 text-xs uppercase tracking-widest hover:text-primary transition-colors" href="{{ url('/auth/' . 'login') }}">Portal ERP</a>
<a class="text-stone-500 text-xs uppercase tracking-widest hover:text-primary transition-colors" href="{{ url('/tienda/' . 'terminos_b2b') }}">Términos B2B</a>
<a class="text-stone-500 text-xs uppercase tracking-widest hover:text-primary transition-colors" href="{{ url('/tienda/' . 'soporte') }}">Soporte Técnico</a>
<a class="text-stone-500 text-xs uppercase tracking-widest hover:text-primary transition-colors" href="{{ url('/tienda/' . 'contacto') }}">Contacto</a>
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
<p class="text-[9px] text-stone-600 uppercase tracking-widest">© 2026 MAYOR DE REPUESTO LA CIMA, C.A. TODOS LOS DERECHOS RESERVADOS.</p>
<div class="flex gap-6">
<a class="text-[9px] text-stone-600 uppercase tracking-widest cursor-pointer hover:text-white" href="{{ url('/tienda/' . 'soporte') }}">Soporte</a>
<a class="text-[9px] text-stone-600 uppercase tracking-widest cursor-pointer hover:text-white" href="{{ url('/tienda/' . 'terminos_b2b') }}">Legal</a>
</div>
</div>
</footer>

<script src="js/carrito.js"></script>

</body>
</html>
