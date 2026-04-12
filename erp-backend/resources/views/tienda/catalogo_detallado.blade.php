<!DOCTYPE html>
<html class="light" lang="es"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta name="description" content="Catálogo detallado de repuestos industriales. MAYOR DE REPUESTO LA CIMA, C.A."/>
<meta name="theme-color" content="#ceff5e">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="apple-mobile-web-app-title" content="LA CIMA">
<link rel="manifest" href="../manifest.json">
<link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">
<link rel="apple-touch-icon" href="{{ asset('assets/images/logo.png') }}">
<title>Catálogo Detallado | Mayor de Repuesto LA CIMA, C.A.</title>
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
<script src="{{ asset('js/catalogo_detallado.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/catalogo_detallado.css') }}">
</head>
<body class="bg-background text-on-surface selection:bg-primary/30">
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
            <a class="text-xs uppercase tracking-widest font-bold text-black border-b-2 border-primary" href="{{ url('/tienda/' . 'catalogo_general') }}">Catálogo</a>
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
            <a href="{{ url('/auth/login') }}" class="hidden sm:flex items-center gap-2 bg-black text-white px-4 py-2 rounded-md font-bold text-[10px] uppercase tracking-widest hover:bg-stone-800 transition-all">
                <span class="material-symbols-outlined text-primary text-sm">database</span>
                Acceso ERP
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
        <a href="{{ url('/tienda/' . 'catalogo_general') }}" class="block text-sm font-bold uppercase tracking-widest text-black border-l-4 border-primary pl-4 py-2">Catálogo</a>
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
<main class="flex-grow pt-24 pb-12 px-6 max-w-[1920px] mx-auto w-full">
    <div class="flex flex-col md:flex-row gap-8">
        
        <!-- Sidebar Filters -->
        <aside class="w-full md:w-72 flex-shrink-0 space-y-8">
            <div class="bg-white border border-outline p-6 rounded-lg shadow-sm">
                <h2 class="font-headline text-lg font-bold uppercase tracking-tighter mb-6 flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary">filter_list</span>
                    Filtrado Técnico
                </h2>
                <div class="space-y-6">
                    <div>
                        <label class="font-headline text-xs font-bold uppercase text-on-surface-variant block mb-3 tracking-widest">Tipo de Motor</label>
                        <div class="space-y-2">
                            <label class="flex items-center gap-3 cursor-pointer group">
                                <input class="w-4 h-4 rounded border-outline text-primary focus:ring-primary" type="checkbox"/>
                                <span class="text-sm font-medium group-hover:text-primary transition-colors">Diesel V8 Heavy Duty</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer group">
                                <input checked="" class="w-4 h-4 rounded border-outline text-primary focus:ring-primary" type="checkbox"/>
                                <span class="text-sm font-medium group-hover:text-primary transition-colors">Inline 6 Turbo</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer group">
                                <input class="w-4 h-4 rounded border-outline text-primary focus:ring-primary" type="checkbox"/>
                                <span class="text-sm font-medium group-hover:text-primary transition-colors">Gas Turbine Aux</span>
                            </label>
                        </div>
                    </div>
                    <div>
                        <label class="font-headline text-xs font-bold uppercase text-on-surface-variant block mb-3 tracking-widest text-[#5a5c5e]">Marca / Fabricante</label>
                        <select class="w-full bg-stone-100 border-none rounded-lg text-sm p-3 focus:ring-2 focus:ring-primary">
                            <option>Cummins Engine Co.</option>
                            <option>Volvo Penta</option>
                            <option>Caterpillar Inc.</option>
                            <option>Detroit Diesel</option>
                        </select>
                    </div>
                    <div>
                        <label class="font-headline text-xs font-bold uppercase text-on-surface-variant block mb-3 tracking-widest text-[#5a5c5e]">Tipo de Maquinaria</label>
                        <div class="grid grid-cols-2 gap-2">
                            <button class="p-2 text-xs font-bold border border-outline rounded hover:bg-black hover:text-white transition-all uppercase">Excavator</button>
                            <button class="p-2 text-xs font-bold border border-outline rounded bg-primary text-black uppercase">Truck</button>
                            <button class="p-2 text-xs font-bold border border-outline rounded hover:bg-black hover:text-white transition-all uppercase">Marine</button>
                            <button class="p-2 text-xs font-bold border border-outline rounded hover:bg-black hover:text-white transition-all uppercase">GenSet</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Technical Support Card -->
            <div class="bg-black text-white p-6 rounded-lg relative overflow-hidden group">
                <div class="relative z-10">
                    <h3 class="font-headline text-xl font-black uppercase leading-none mb-2 text-primary">Soporte Técnico</h3>
                    <p class="text-stone-400 text-xs mb-4">Piezas críticas y asistencia en instalación industrial.</p>
                    <button class="text-primary text-xs font-bold uppercase flex items-center gap-1 group-hover:gap-2 transition-all">
                        Hablar con Ingeniero
                        <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </button>
                </div>
                <div class="absolute -right-4 -bottom-4 opacity-10 group-hover:scale-110 transition-transform duration-500">
                    <span class="material-symbols-outlined text-8xl" style="font-variation-settings: 'FILL' 1;">engineering</span>
                </div>
            </div>
        </aside>

        <!-- Product Listing -->
        <section class="flex-grow">
            <div class="flex justify-between items-end mb-8">
                <div>
                    <span class="text-primary font-bold text-xs uppercase tracking-widest block mb-1">Precision Inventory</span>
                    <h1 class="font-headline text-4xl font-black uppercase tracking-tighter">Catálogo Completo</h1>
                </div>
                <div class="text-right">
                    <p class="text-xs font-bold text-on-surface-variant uppercase tracking-widest">Mostrando 12 de 842 Items</p>
                    <div class="flex gap-2 mt-2 justify-end">
                        <button id="gridViewBtn" class="view-btn active w-8 h-8 flex items-center justify-center bg-black text-white rounded" onclick="switchToGrid()"><span class="material-symbols-outlined text-sm">grid_view</span></button>
                        <button id="listViewBtn" class="view-btn w-8 h-8 flex items-center justify-center text-on-surface-variant hover:bg-stone-200 rounded transition-colors" onclick="switchToList()"><span class="material-symbols-outlined text-sm">list</span></button>
                    </div>
                </div>
            </div>

            <div id="productGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4                <!-- 1 -->
                <article class="bg-white border border-outline rounded-xl overflow-hidden hover:shadow-xl transition-all group flex flex-col h-full">
                    <div class="aspect-square bg-stone-100 relative overflow-hidden flex-shrink-0 max-h-[180px] md:max-h-[200px] lg:max-h-[220px]">
                        <img src="{{ $item->imagen ?? 'https://lh3.googleusercontent.com/...' }}" class="w-full h-full object-contain group-hover:scale-110 transition-transform duration-500 p-4">
                    </div>
                    <div class="p-5 flex flex-col flex-grow">
                        <p class="text-xs font-black uppercase text-on-surface-variant tracking-widest mb-1 text-primary">SKU: CUM-9928-HJ</p>
                        <h3 class="text-lg font-bold uppercase tracking-tight mb-4 group-hover:text-primary transition-colors line-clamp-2">Junta de culata Cummins QSB6.7</h3>
                        <div class="mt-auto flex justify-between items-center">
                            <span class="text-xl font-black text-black tracking-tighter">$284.00</span>
                            <button class="bg-black text-white p-2 rounded-lg hover:bg-primary hover:text-black transition-colors">
                                <span class="material-symbols-outlined text-sm">add_shopping_cart</span>
                            </button>
                        </div>
                    </div>
                </article>

                <!-- 2 -->
                <article class="bg-white border border-outline rounded-xl overflow-hidden hover:shadow-xl transition-all group flex flex-col h-full">
                    <div class="aspect-square bg-stone-100 relative overflow-hidden flex-shrink-0 max-h-[250px] sm:max-h-none">
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDQKD29s0z6GuS4uPSiUeQyw70ldIFl3871UjP1-u9TQTaoCIMjKqWVYf7vjLiRsk-6ggNcyvjOtMnh0Mdju6jWKG76OQKCbleekn-DTwlFAGhQGfIXROTK57Phh8C0XzugExcdoE7eGfV5Li66UjyA7Sw8tByNp7MulgucBI1tD5xgkPM-viyQr1WLFdmyQNTjZOo1QzliRygUM3ddoPLKdvFd6ifJrPGWai6WB6d2pnrTotXOVPtPuWBJu1GO7m7nCGbmB_13mek" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-5 flex flex-col flex-grow">
                        <p class="text-[10px] font-black uppercase text-on-surface-variant tracking-widest mb-1 text-primary">SKU: VOL-P901-LP</p>
                        <h3 class="text-lg font-bold uppercase tracking-tight mb-4 group-hover:text-primary transition-colors line-clamp-2">Filtro de Aceite Volvo Penta D13</h3>
                        <div class="mt-auto flex justify-between items-center">
                            <span class="text-xl font-black text-black tracking-tighter">$45.50</span>
                            <button class="bg-black text-white p-2 rounded-lg hover:bg-primary hover:text-black transition-colors">
                                <span class="material-symbols-outlined text-sm">add_shopping_cart</span>
                            </button>
                        </div>
                    </div>
                </article>

                <!-- 3 -->
                <article class="bg-white border border-outline rounded-xl overflow-hidden hover:shadow-xl transition-all group flex flex-col h-full">
                    <div class="aspect-square bg-stone-100 relative overflow-hidden flex-shrink-0 max-h-[250px] sm:max-h-none">
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuAbPP-XFkK6zkczQlnJ0syN052qGxQ9Rj-hlorwmbSZIobuLFXOel2ZMx0xu6dwLm9-7Ubl0F2lzgVQ9DmZ9aBpYK8U6OEIRoY7anE1Esb-iCtFH7QjfwnGbXQqUkSaEkdrFKthlP8ErjHnt8sdiQWx4hVhDWfz79PgQ5U5869M8Wvi6zCxv6CSXXNqnUgGKIIQF2s1hQvlIJcaEfVIfzhL9lTiMBPL-6dmN6QYh7jai-A4a8yMUvreZnN2WsiryiSjUCufA4sWu3I" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-5 flex flex-col flex-grow">
                        <p class="text-[10px] font-black uppercase text-on-surface-variant tracking-widest mb-1 text-primary">SKU: CAT-T40-99</p>
                        <h3 class="text-lg font-bold uppercase tracking-tight mb-4 group-hover:text-primary transition-colors line-clamp-2">Turbocargador Caterpillar C15</h3>
                        <div class="mt-auto flex justify-between items-center">
                            <span class="text-xl font-black text-black tracking-tighter">$1,420.00</span>
                            <button class="bg-black text-white p-2 rounded-lg hover:bg-primary hover:text-black transition-colors">
                                <span class="material-symbols-outlined text-sm">add_shopping_cart</span>
                            </button>
                        </div>
                    </div>
                </article>

                <!-- 4 -->
                <article class="bg-white border border-outline rounded-xl overflow-hidden hover:shadow-xl transition-all group flex flex-col h-full">
                    <div class="aspect-square bg-stone-100 relative overflow-hidden flex-shrink-0 max-h-[250px] sm:max-h-none">
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuBIn0RkeL7SWo_eG05JQuzVMLn7doFBFF7OpIHfDkWl6wZNAvi_1ZRIdJaIVb7a4iDU4D_xMPMwP1PwALo5h5Ne8BeQ6IYJyR5Toi0SScObpCgrDYb9pJcmIDEu8LMBWvn4ErCt93id7lunEM7-qeA4b_9GAXvUPZ4R2NbJ2iwlpFpnmQqi9yDn3DX6RtOLX6S_nes72O7ZOPAzaUA_laYrmrxqNDUBi9HF74lajrW3XH8c3vNOglhQV_mA3b7yPUnw_7OzGx-fL4k" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-5 flex flex-col flex-grow">
                        <p class="text-[10px] font-black uppercase text-on-surface-variant tracking-widest mb-1 text-primary">SKU: DEL-24V-HD</p>
                        <h3 class="text-lg font-bold uppercase tracking-tight mb-4 group-hover:text-primary transition-colors line-clamp-2">Alternador 24V Detroit Diesel</h3>
                        <div class="mt-auto flex justify-between items-center">
                            <span class="text-xl font-black text-black tracking-tighter">$312.00</span>
                            <button class="bg-black text-white p-2 rounded-lg hover:bg-primary hover:text-black transition-colors">
                                <span class="material-symbols-outlined text-sm">add_shopping_cart</span>
                            </button>
                        </div>
                    </div>
                </article>

                <!-- 5 -->
                <article class="bg-white border border-outline rounded-xl overflow-hidden hover:shadow-xl transition-all group flex flex-col h-full">
                    <div class="aspect-square bg-stone-100 relative overflow-hidden flex-shrink-0 max-h-[250px] sm:max-h-none">
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuBcq0FTn4sixsza9CVtPOnPKQJov8Ui8XYA3uGRpWC4LDD1Ze8Gg-2xj-O9jKECyJsf6PWKzcAP587qr46eOqqlv0ITwFAOGg9qxHstfdMaVcO13OY1Y43qVQhaQL0N9fEioYTxTcnUjuYC2VZLrFJAgMr_d9gGNwMWkd5tTzJ94ESTCuNWfpLOavRKnF76xuxrOANZKwOUUtEEqpu5exJOvPc5wGxgjew4_6X2fRisUN82VMogfrxsFPZqweCdlMiG8PcxWexovxQ" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-5 flex flex-col flex-grow">
                        <p class="text-[10px] font-black uppercase text-on-surface-variant tracking-widest mb-1 text-primary">SKU: BOS-6701-IN</p>
                        <h3 class="text-lg font-bold uppercase tracking-tight mb-4 group-hover:text-primary transition-colors line-clamp-2">Inyector Bosch Common Rail</h3>
                        <div class="mt-auto flex justify-between items-center">
                            <span class="text-xl font-black text-black tracking-tighter">$580.00</span>
                            <button class="bg-black text-white p-2 rounded-lg hover:bg-primary hover:text-black transition-colors">
                                <span class="material-symbols-outlined text-sm">add_shopping_cart</span>
                            </button>
                        </div>
                    </div>
                </article>

                <!-- 6 -->
                <article class="bg-white border border-outline rounded-xl overflow-hidden hover:shadow-xl transition-all group flex flex-col h-full">
                    <div class="aspect-square bg-stone-100 relative overflow-hidden flex-shrink-0 max-h-[250px] sm:max-h-none">
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuCWEohmAw6eWxzZ0isaHUZlU9cOvgrjklSgykQalVfOYZjL7qpFC9-FV6LmS9RIY5UcJfa-IDSmjpStTpdObb10qNTIOJuZpo-VXSDINLYw_NacgWn7-C6XvF7I6UnQoSXSOgNfqitJ1gcjbw5DdAiBmXQX89pAwFe1_5df3bM8k3-weKsaPWlmyLHvLBLkb0ywwgbPXjfB1kWHVmNfCx5gdA5eB-GuYD_aiBMLpQb2oSH1PQdn7qfRneQGFFuTAQUR1gzSjZQ4ahs" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-5 flex flex-col flex-grow">
                        <p class="text-[10px] font-black uppercase text-on-surface-variant tracking-widest mb-1 text-primary">SKU: CUM-PIS-6</p>
                        <h3 class="text-lg font-bold uppercase tracking-tight mb-4 group-hover:text-primary transition-colors line-clamp-2">Kit de Pistones Cummins N14</h3>
                        <div class="mt-auto flex justify-between items-center">
                            <span class="text-xl font-black text-black tracking-tighter">$1,150.00</span>
                            <button class="bg-black text-white p-2 rounded-lg hover:bg-primary hover:text-black transition-colors">
                                <span class="material-symbols-outlined text-sm">add_shopping_cart</span>
                            </button>
                        </div>
                    </div>
                </article>
            </div>

            <!-- Pagination -->
            <div class="mt-12 flex justify-center items-center gap-4">
                <button class="w-10 h-10 flex items-center justify-center rounded border border-outline text-on-surface-variant hover:text-primary hover:border-primary transition-all">
                    <span class="material-symbols-outlined">chevron_left</span>
                </button>
                <div class="flex items-center gap-2">
                    <button class="w-10 h-10 flex items-center justify-center rounded bg-black text-primary font-bold">1</button>
                    <button class="w-10 h-10 flex items-center justify-center rounded border border-outline hover:border-primary font-bold">2</button>
                    <button class="w-10 h-10 flex items-center justify-center rounded border border-outline hover:border-primary font-bold">3</button>
                    <span class="px-2 text-stone-400">...</span>
                    <button class="w-10 h-10 flex items-center justify-center rounded border border-outline hover:border-primary font-bold">24</button>
                </div>
                <button class="w-10 h-10 flex items-center justify-center rounded border border-outline text-on-surface-variant hover:text-primary hover:border-primary transition-all">
                    <span class="material-symbols-outlined">chevron_right</span>
                </button>
            </div>

            <!-- Technical Compatibility Table (RESTORING DATA) -->
            <div class="mt-24">
                <h2 class="font-headline text-2xl font-bold uppercase tracking-widest mb-8 flex items-center gap-4">
                    <span class="w-12 h-[2px] bg-primary"></span>
                    Compatibilidad Técnica
                </h2>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="font-headline uppercase text-xs tracking-widest text-on-surface-variant border-b border-outline">
                            <tr>
                                <th class="pb-4 px-4 font-black">Componente</th>
                                <th class="pb-4 px-4 font-black">Marca Compatible</th>
                                <th class="pb-4 px-4 font-black">Origen</th>
                                <th class="pb-4 px-4 font-black">Certificación</th>
                                <th class="pb-4 px-4 font-black">Disponibilidad</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            <tr class="bg-white hover:bg-stone-50 transition-colors border-b border-outline">
                                <td class="py-4 px-4 font-bold">Inyectores de Combustible</td>
                                <td class="py-4 px-4">CAT / Perkins</td>
                                <td class="py-4 px-4">USA / Germany</td>
                                <td class="py-4 px-4 font-medium uppercase text-xs">OEM Specification</td>
                                <td class="py-4 px-4 text-primary font-bold">In Stock</td>
                            </tr>
                            <tr class="bg-white hover:bg-stone-50 transition-colors border-b border-outline">
                                <td class="py-4 px-4 font-bold">Kits de Empacadura</td>
                                <td class="py-4 px-4">Detroit Diesel</td>
                                <td class="py-4 px-4">USA</td>
                                <td class="py-4 px-4 font-medium uppercase text-[10px]">SAE Standard</td>
                                <td class="py-4 px-4 text-primary font-bold">In Stock</td>
                            </tr>
                            <tr class="bg-white hover:bg-stone-50 transition-colors">
                                <td class="py-4 px-4 font-bold">Bombas de Agua</td>
                                <td class="py-4 px-4">Mack / Volvo</td>
                                <td class="py-4 px-4">Brazil</td>
                                <td class="py-4 px-4 font-medium uppercase text-[10px]">Heavy Duty Grade</td>
                                <td class="py-4 px-4 text-red-600 font-bold">Low Stock</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
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

<style>
/* Estilos dinámicos para la vista de lista */
#productGrid.view-list {
    grid-template-columns: 1fr !important;
    gap: 1.5rem;
}
#productGrid.view-list article {
    flex-direction: row;
    height: auto;
    min-height: 200px;
}
#productGrid.view-list article .aspect-square {
    width: 250px;
    height: 250px;
    max-height: none;
    flex-shrink: 0;
}
#productGrid.view-list article > div.p-5 {
    display: flex;
    flex-direction: column;
    justify-content: center;
    width: 100%;
}
@media (max-width: 640px) {
    #productGrid.view-list article {
        flex-direction: column;
        height: auto;
    }
    #productGrid.view-list article .aspect-square {
        width: 100%;
        height: auto;
        aspect-ratio: 1/1;
    }
}
</style>
<script>
function switchToGrid() {
    const grid = document.getElementById('productGrid');
    const gridBtn = document.getElementById('gridViewBtn');
    const listBtn = document.getElementById('listViewBtn');
    
    grid.className = 'grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6';
    grid.classList.remove('view-list');
    
    gridBtn.classList.add('bg-black', 'text-white');
    gridBtn.classList.remove('text-on-surface-variant', 'hover:bg-stone-200');
    listBtn.classList.add('text-on-surface-variant', 'hover:bg-stone-200');
    listBtn.classList.remove('bg-black', 'text-white');
}

function switchToList() {
    const grid = document.getElementById('productGrid');
    const gridBtn = document.getElementById('gridViewBtn');
    const listBtn = document.getElementById('listViewBtn');
    
    grid.className = 'grid gap-6 view-list';
    
    listBtn.classList.add('bg-black', 'text-white');
    listBtn.classList.remove('text-on-surface-variant', 'hover:bg-stone-200');
    gridBtn.classList.add('text-on-surface-variant', 'hover:bg-stone-200');
    gridBtn.classList.remove('bg-black', 'text-white');
}
</script>
<script src="{{ asset('js/catalogo_detallado.js') }}"></script>

</body></html>ript>

</body></html>