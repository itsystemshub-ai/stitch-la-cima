<!DOCTYPE html>
<html class="light" lang="es">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta name="description" content="Detalle del producto - MAYOR DE REPUESTO LA CIMA, C.A.">
    <meta name="theme-color" content="#ceff5e">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="LA CIMA">
    <link rel="manifest" href="../manifest.json">
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/images/logo.png') }}">
    <title id="pageTitle">Detalle del Producto | LA CIMA</title>
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
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <script src="js/detalle_productos.js"></script>
    <link rel="stylesheet" href="css/detalle_productos.css">
</head>
<body class="bg-background text-on-surface selection:bg-primary/30 min-h-screen flex flex-col">

<!-- Mobile Menu -->
<div id="mobileMenu" class="fixed inset-0 bg-black/50 z-50 hidden" onclick="closeMobileMenu()"></div>
<div id="mobileNav" class="mobile-menu fixed top-0 left-0 h-full w-80 bg-white z-50 shadow-2xl">
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

<!-- Premium Product Detail Main -->
<main class="pt-20 pb-24">
    <section class="max-w-screen-2xl mx-auto px-6 md:px-12 py-12">
        <!-- Breadcrumb -->
        <nav class="mb-8 flex items-center gap-2 text-[10px] font-black uppercase tracking-[0.2em] text-on-surface-variant">
            <a href="{{ url('/tienda/' . 'index') }}" class="hover:text-primary transition-colors flex items-center gap-1">
                <span class="material-symbols-outlined text-sm">home</span> Inicio
            </a>
            <span class="material-symbols-outlined text-xs">chevron_right</span>
            <a href="{{ url('/tienda/' . 'catalogo_general') }}" class="hover:text-primary transition-colors">Catálogo</a>
            <span class="material-symbols-outlined text-xs">chevron_right</span>
            <span id="breadcrumbBrand" class="hover:text-primary transition-colors">Cummins</span>
            <span class="material-symbols-outlined text-xs">chevron_right</span>
            <span id="breadcrumbProduct" class="text-black">Producto</span>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16">
            <!-- Gallery Section -->
            <div class="lg:col-span-7 space-y-6">
                <div class="gallery-main relative aspect-square bg-white border border-outline rounded-2xl overflow-hidden flex items-center justify-center p-8 lg:p-16 group">
                    <img id="mainImage" src="" class="w-full h-full object-contain mix-blend-multiply transition-transform duration-500 group-hover:scale-110" alt="">
                    <div class="absolute top-6 left-6 flex gap-3">
                        <span class="bg-black text-primary px-4 py-2 text-[10px] font-black uppercase tracking-widest rounded-full">OEM Genuine</span>
                        <span id="discountBadge" class="bg-primary text-black px-4 py-2 text-[10px] font-black uppercase tracking-widest rounded-full hidden">-15% OFF</span>
                    </div>
                    <div class="absolute top-6 right-6">
                        <button id="favoriteBtn" onclick="toggleFavorite()" class="w-10 h-10 bg-white/90 backdrop-blur rounded-full flex items-center justify-center hover:bg-primary transition-colors shadow-lg">
                            <span id="favoriteIcon" class="material-symbols-outlined text-lg">favorite_border</span>
                        </button>
                    </div>
                </div>
                <div id="thumbnails" class="grid grid-cols-5 gap-4">
                    <!-- Thumbnails generados dinámicamente -->
                </div>
            </div>

            <!-- Product Info Section -->
            <div class="lg:col-span-5 flex flex-col">
                <div class="flex items-center gap-3 mb-4">
                    <span id="productBrand" class="text-primary text-[10px] font-black uppercase tracking-[0.4em] bg-primary/10 px-3 py-1 rounded-full">CUMMINS</span>
                    <span class="flex items-center gap-1 text-green-600 text-[10px] font-black uppercase tracking-widest">
                        <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                        <span id="stockStatus">En Stock</span>
                    </span>
                </div>

                <h1 id="productTitle" class="text-4xl lg:text-5xl font-black text-black uppercase tracking-tighter leading-[0.95] mb-4">Cargando...</h1>
                
                <div class="flex items-center gap-6 mb-8 pb-6 border-b border-outline">
                    <span id="productSKU" class="bg-black text-white px-4 py-2 text-[10px] font-black uppercase tracking-widest rounded-lg">SKU: ---</span>
                    <div class="flex items-center gap-1">
                        <span class="material-symbols-outlined text-primary text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
                        <span class="material-symbols-outlined text-primary text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
                        <span class="material-symbols-outlined text-primary text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
                        <span class="material-symbols-outlined text-primary text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
                        <span class="material-symbols-outlined text-stone-300 text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
                        <span class="text-xs font-bold text-on-surface-variant ml-1">(24 reseñas)</span>
                    </div>
                </div>

                <div class="bg-white border border-outline rounded-2xl p-8 mb-8 shadow-sm">
                    <div class="flex items-end gap-4 mb-8">
                        <span id="productPrice" class="text-5xl font-black text-black tracking-tighter">$0.00</span>
                        <span id="productOldPrice" class="text-on-surface-variant line-through text-2xl font-bold mb-1 hidden">$0.00</span>
                        <span id="productDiscount" class="bg-primary text-black px-3 py-1 text-[10px] font-black uppercase tracking-widest rounded-full mb-1 hidden">-0%</span>
                    </div>
                    <p id="productPriceBs" class="text-[10px] font-bold text-on-surface-variant uppercase tracking-widest mb-6">Bs. 0.00 aprox. | IVA incluido</p>

                    <div class="flex gap-4 mb-8">
                        <div class="flex items-center bg-background border border-outline rounded-xl overflow-hidden">
                            <button onclick="updateQty(-1)" class="qty-btn w-14 h-14 flex items-center justify-center text-black font-black text-xl hover:bg-white transition-colors">−</button>
                            <input id="qtyInput" class="w-16 bg-transparent border-none text-center font-black text-lg focus:ring-0" type="number" value="1" min="1" max="99"/>
                            <button onclick="updateQty(1)" class="qty-btn w-14 h-14 flex items-center justify-center text-black font-black text-xl hover:bg-white transition-colors">+</button>
                        </div>
                        <button onclick="addToCartFromDetail()" class="flex-grow bg-black text-primary hover:bg-primary hover:text-black border border-black font-black uppercase py-4 px-8 tracking-[0.2em] text-[11px] rounded-xl transition-all flex items-center justify-center gap-3 shadow-lg shadow-black/10">
                            <span class="material-symbols-outlined text-xl">shopping_bag</span>
                            Añadir al Carrito
                        </button>
                    </div>

                    <div class="grid grid-cols-2 gap-6 pt-6 border-t border-outline">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center flex-shrink-0">
                                <span class="material-symbols-outlined text-primary text-lg">local_shipping</span>
                            </div>
                            <div class="text-[10px] font-black uppercase tracking-widest">
                                <p class="text-black">Envío Nacional</p>
                                <p class="text-on-surface-variant">2-4 días hábiles</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center flex-shrink-0">
                                <span class="material-symbols-outlined text-primary text-lg">verified_user</span>
                            </div>
                            <div class="text-[10px] font-black uppercase tracking-widest">
                                <p class="text-black">Garantía 12 Meses</p>
                                <p class="text-on-surface-variant">Fabricante directo</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center flex-shrink-0">
                                <span class="material-symbols-outlined text-primary text-lg">security</span>
                            </div>
                            <div class="text-[10px] font-black uppercase tracking-widest">
                                <p class="text-black">Pago Seguro</p>
                                <p class="text-on-surface-variant">Encriptación SSL</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center flex-shrink-0">
                                <span class="material-symbols-outlined text-primary text-lg">exchange</span>
                            </div>
                            <div class="text-[10px] font-black uppercase tracking-widest">
                                <p class="text-black">Devolución Fácil</p>
                                <p class="text-on-surface-variant">30 días garantía</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="technicalNote" class="bg-primary/10 border-l-4 border-primary rounded-r-xl p-6">
                    <p class="text-xs font-black uppercase tracking-[0.3em] mb-2 text-black flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary">engineering</span>
                        Nota Técnica del Experto
                    </p>
                    <p id="technicalNoteText" class="text-sm font-semibold text-on-surface-variant leading-relaxed">Cargando...</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Tabs Section -->
    <section class="max-w-screen-2xl mx-auto px-6 md:px-12 mt-24">
        <div class="flex gap-0 border-b-2 border-outline mb-12 overflow-x-auto">
            <button onclick="switchTab('specs')" id="tab-specs" class="tab-btn pb-4 border-b-4 border-primary text-black text-[11px] font-black uppercase tracking-[0.3em] whitespace-nowrap px-6">Especificaciones</button>
            <button onclick="switchTab('compatibility')" id="tab-compatibility" class="tab-btn pb-4 border-b-4 border-transparent text-on-surface-variant hover:text-primary transition-all text-[11px] font-black uppercase tracking-[0.3em] whitespace-nowrap px-6">Compatibilidad</button>
            <button onclick="switchTab('installation')" id="tab-installation" class="tab-btn pb-4 border-b-4 border-transparent text-on-surface-variant hover:text-primary transition-all text-[11px] font-black uppercase tracking-[0.3em] whitespace-nowrap px-6">Instalación</button>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
            <div id="content-specs" class="tab-content active">
                <h3 class="text-3xl font-black text-black uppercase tracking-tighter mb-8">Especificaciones Técnicas</h3>
                <div id="specsTable" class="border border-outline rounded-2xl overflow-hidden">
                    <!-- Generado dinámicamente -->
                </div>
            </div>

            <div id="content-compatibility" class="tab-content">
                <h3 class="text-3xl font-black text-black uppercase tracking-tighter mb-8">Compatibilidad</h3>
                <div id="compatibilityGrid" class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <!-- Generado dinámicamente -->
                </div>
            </div>

            <div id="content-installation" class="tab-content">
                <h3 class="text-3xl font-black text-black uppercase tracking-tighter mb-8">Guía de Instalación</h3>
                <div id="installationSteps" class="space-y-6">
                    <!-- Generado dinámicamente -->
                </div>
            </div>

            <div class="space-y-8">
                <div class="bg-black p-10 rounded-2xl relative overflow-hidden group">
                    <div class="relative z-10">
                        <h4 class="text-primary text-2xl font-black uppercase tracking-tighter mb-4 italic">¿Necesitas Soporte Técnico?</h4>
                        <p class="text-stone-400 text-xs font-medium mb-8 leading-relaxed uppercase tracking-widest">Habla con un ingeniero para especificaciones de torque y secuencia de montaje en tiempo real.</p>
                        <a href="mailto:soporte@lacima.com" class="inline-flex items-center gap-2 bg-primary text-black px-8 py-3 text-[10px] font-black uppercase tracking-widest rounded-lg hover:bg-white transition-all">
                            <span class="material-symbols-outlined text-sm">support_agent</span>
                            Conectar con Experto
                        </a>
                    </div>
                    <span class="material-symbols-outlined absolute right-[-20px] bottom-[-20px] text-white/5 text-[160px] transform group-hover:scale-110 transition-transform">engineering</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Products -->
    <section class="max-w-screen-2xl mx-auto px-6 md:px-12 mt-32">
        <div class="flex items-center justify-between mb-12">
            <div>
                <span class="text-primary text-[10px] font-black uppercase tracking-[0.4em]">Compra Inteligente</span>
                <h3 class="text-3xl font-black text-black uppercase tracking-tighter mt-2">Productos Complementarios</h3>
            </div>
        </div>
        <div id="relatedProducts" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Generado dinámicamente -->
        </div>
    </section>
</main>

<button id="scrollTopBtn" onclick="window.scrollTo({top: 0, behavior: 'smooth'})" class="fixed bottom-8 right-8 bg-primary text-black p-4 shadow-xl hover:bg-white transition-all z-30 border border-black/10 hidden">
    <span class="material-symbols-outlined font-black">arrow_upward</span>
</button>

<footer class="bg-black text-white w-full py-16 px-8 border-t border-zinc-900">
<div class="grid grid-cols-1 md:grid-cols-4 gap-12 w-full max-w-7xl mx-auto">
<div class="md:col-span-1">
<div class="flex items-center gap-3 mb-6">
    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="h-12 w-auto">
    <div class="flex flex-col justify-center">
        <span class="text-primary font-black text-sm block uppercase tracking-tighter leading-none">MAYOR DE REPUESTO LA CIMA, C.A</span>
        <span class="text-primary font-black text-xs block uppercase tracking-tighter leading-none mt-1">RIF.: J-40308741-5</span>
    </div>
</div>
<div class="flex gap-4">
<div class="h-10 w-10 bg-zinc-900 rounded-full flex items-center justify-center hover:bg-primary hover:text-black cursor-pointer transition-all"><span class="material-symbols-outlined text-sm">facebook</span></div>
<div class="h-10 w-10 bg-zinc-900 rounded-full flex items-center justify-center hover:bg-primary hover:text-black cursor-pointer transition-all"><span class="material-symbols-outlined text-sm">alternate_email</span></div>
</div>
</div>
<div><span class="text-white font-black text-xs uppercase tracking-[0.2em] mb-6 block">Catálogo</span><nav class="flex flex-col gap-4"><a class="text-stone-500 text-xs uppercase tracking-widest hover:text-primary transition-colors" href="{{ url('/tienda/' . 'catalogo_general') }}">Nuevos Ingresos</a><a class="text-stone-500 text-xs uppercase tracking-widest hover:text-primary transition-colors" href="{{ url('/tienda/' . 'catalogo_general') }}">Sistemas de Motor</a><a class="text-stone-500 text-xs uppercase tracking-widest hover:text-primary transition-colors" href="{{ url('/tienda/' . 'catalogo_general') }}">Frenado</a><a class="text-stone-500 text-xs uppercase tracking-widest hover:text-primary transition-colors" href="{{ url('/tienda/' . 'catalogo_general') }}">Transmisión</a></nav></div>
<div><span class="text-white font-black text-xs uppercase tracking-[0.2em] mb-6 block">Empresa</span><nav class="flex flex-col gap-4"><a class="text-stone-500 text-xs uppercase tracking-widest hover:text-primary transition-colors" href="{{ url('/auth/' . 'login') }}">Portal ERP</a><a class="text-stone-500 text-xs uppercase tracking-widest hover:text-primary transition-colors" href="{{ url('/tienda/' . 'terminos_b2b') }}">Términos B2B</a><a class="text-stone-500 text-xs uppercase tracking-widest hover:text-primary transition-colors" href="{{ url('/tienda/' . 'soporte') }}">Soporte Técnico</a><a class="text-stone-500 text-xs uppercase tracking-widest hover:text-primary transition-colors" href="{{ url('/tienda/' . 'contacto') }}">Contacto</a></nav></div>
<div><span class="text-white font-black text-xs uppercase tracking-[0.2em] mb-6 block">Sede Central</span><p class="text-stone-500 text-xs uppercase tracking-widest leading-relaxed">AV. 119, EDIF. MULTICENTRO PASEO EL PARRAL, OFICINA NO. 2-3-C, URB. EL PARRAL, 2001, VALENCIA, EDO. CARABOBO</p><div class="mt-6 p-4 bg-zinc-900 rounded-lg border border-white/5"><p class="text-[10px] text-primary font-bold uppercase tracking-widest">¿Necesitas ayuda?</p><p class="text-white text-xs font-bold mt-1">LACIMA.REPUESTOS@GMAIL.COM</p><p class="text-white text-xs font-bold mt-1">PEDIDOSLACIMA@GMAIL.COM</p></div></div>
</div>
<div class="max-w-7xl mx-auto border-t border-zinc-900 mt-16 pt-8 flex justify-between items-center"><p class="text-[9px] text-stone-600 uppercase tracking-widest">© 2026 MAYOR DE REPUESTO LA CIMA, C.A. TODOS LOS DERECHOS RESERVADOS.</p><div class="flex gap-6"><a class="text-[9px] text-stone-600 uppercase tracking-widest cursor-pointer hover:text-white" href="{{ url('/tienda/' . 'soporte') }}">Soporte</a><a class="text-[9px] text-stone-600 uppercase tracking-widest cursor-pointer hover:text-white" href="{{ url('/tienda/' . 'terminos_b2b') }}">Legal</a></div></div>
</footer>

<script src="js/detalle_productos.js"></script>

</body></html>
