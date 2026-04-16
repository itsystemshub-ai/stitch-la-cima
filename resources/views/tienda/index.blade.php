@extends('layouts.ecommerce')

@section('title', 'Tienda Virtual | Mayor de Repuesto La Cima, C.A.')

@push('styles')
    <link rel="stylesheet" href="css/index.css">
@endpush

@section('content')
<main class="pt-16">
<!-- Hero Section: Precision Search -->
<section class="relative min-h-[700px] flex items-center justify-center py-20 overflow-hidden">
<div class="absolute inset-0 z-0">
<img alt="Industrial Warehouse Background" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDs3Y7CL32i44Xn4shAtPpvk84XltJEiTJMuPlnBC17eJ-hj0QxChCl3Mw4I9HaJ-smmd4Qh9IEaHZDWU0qalgCeYzVP7bs-XpTH0VmqyPaTgeyzK50mSobQTpufhM77pTKAz7NvqIzaGhsHZyztZMkM3vQSMMSubCuh3hDRnpTBnZlJDVQ20RfnInSL0BZDsdLiYRbFXnqSNSpEuSySoXpas4o0m9MrpOONLRd6VeAnoImFPFwo0vS--4MNIW7yFAh20S0KTZzRQ"/>
<div class="absolute inset-0 bg-black/75"></div>
</div>
<div class="container mx-auto px-6 relative z-10">
<div class="max-w-5xl mx-auto">
<div class="text-center mb-10">
<span class="inline-block px-3 py-1 bg-primary text-black text-[10px] font-black uppercase tracking-[0.2em] mb-4">E-commerce Público &amp; Mayorista</span>
<h1 class="text-5xl md:text-5xl font-black text-white leading-tight tracking-tighter mb-4 uppercase">
                       MAYOR DE REPUESTO <span class="text-primary">LA CIMA, C.A.</span>
</h1>
<p class="text-stone-300 text-lg max-w-2xl mx-auto font-light leading-relaxed">
                        Localice piezas críticas con precisión absoluta por VIN, OEM o catálogo técnico.
                    </p>
</div>
<!-- Central Search Console -->
<div class="bg-white p-1 rounded-xl shadow-2xl">
<div class="grid grid-cols-1 md:grid-cols-4 gap-px bg-outline rounded-lg overflow-hidden">
<div class="bg-white p-4">
<label class="block text-[10px] font-bold text-on-surface-variant uppercase mb-2 tracking-widest">Año</label>
<select id="searchYear" class="w-full border-none bg-transparent font-bold text-sm p-0 focus:ring-0">
<option value="">Seleccionar Año</option>
<option value="2024">2024</option>
<option value="2023">2023</option>
<option value="2022">2022</option>
<option value="2021">2021</option>
</select>
</div>
<div class="bg-white p-4">
<label class="block text-[10px] font-bold text-on-surface-variant uppercase mb-2 tracking-widest">Marca / Fabricante</label>
<select id="searchBrand" class="w-full border-none bg-transparent font-bold text-sm p-0 focus:ring-0">
<option value="">Seleccionar Marca</option>
<option value="Toyota">Toyota</option>
<option value="Caterpillar">Caterpillar</option>
<option value="Cummins">Cummins</option>
<option value="Volvo">Volvo</option>
<option value="Detroit Diesel">Detroit Diesel</option>
<option value="Ford">Ford</option>
</select>
</div>
<div class="bg-white p-4">
<label class="block text-[10px] font-bold text-on-surface-variant uppercase mb-2 tracking-widest">Modelo</label>
<select id="searchModel" class="w-full border-none bg-transparent font-bold text-sm p-0 focus:ring-0">
<option value="">Seleccionar Modelo</option>
<option value="Hilux">Hilux</option>
<option value="Corolla">Corolla</option>
<option value="F-150">F-150</option>
<option value="C15">C15</option>
<option value="D13">D13</option>
<option value="DD15">DD15</option>
</select>
</div>
<div onclick="searchProducts()" class="bg-primary p-4 flex items-center justify-center cursor-pointer hover:bg-primary-dim transition-colors group">
<span class="material-symbols-outlined text-black mr-2">search</span>
<span class="font-black uppercase tracking-widest text-black text-sm">Buscar Repuesto</span>
</div>
</div>
<div class="p-4 flex flex-wrap gap-4 items-center justify-between bg-stone-50 border-t border-outline">
<div class="flex-1">
<div class="relative">
<input id="quickSearch" class="w-full bg-white border-outline text-xs py-3 px-10 rounded-md focus:ring-primary focus:border-primary" placeholder="Búsqueda rápida por número de parte OEM o serie VIN..." type="text"/>
<span class="material-symbols-outlined absolute left-3 top-2.5 text-stone-400 text-lg">qr_code_scanner</span>
</div>
</div>
<div class="flex items-center gap-6">
<button class="flex items-center gap-2 text-[10px] font-bold text-stone-500 uppercase hover:text-black">
<span class="material-symbols-outlined text-sm">description</span>
                                Catálogo PDF
                            </button>
<button class="flex items-center gap-2 text-[10px] font-bold text-stone-500 uppercase hover:text-black">
<span class="material-symbols-outlined text-sm">settings_suggest</span>
                                Filtro Avanzado
                            </button>
</div>
</div>
</div>
<!-- B2B Prominent Entry -->
<div class="mt-8 flex justify-center">
<div class="bg-black/40 backdrop-blur-md border border-white/10 p-4 rounded-xl flex flex-col md:flex-row items-center gap-6">
<div class="flex items-center gap-3">
<div class="bg-primary/20 p-2 rounded-lg">
<span class="material-symbols-outlined text-primary">corporate_fare</span>
</div>
<div>
<p class="text-white text-xs font-bold uppercase tracking-widest">¿Eres Taller o Flota?</p>
<p class="text-stone-400 text-[10px]">Acceso a precios de mayorista y stock ERP en tiempo real.</p>
</div>
</div>
<a href="{{ url('/auth/' . 'login') }}" class="bg-white text-black px-6 py-2 rounded-md font-black text-[10px] uppercase tracking-[0.2em] hover:bg-primary transition-all">
                            Entrar al Portal ERP
                        </a>
</div>
</div>
<!-- PWA Install Button (hidden by default, shows when installable) -->
<div id="pwaInstallContainer" class="mt-4 flex justify-center hidden">
    <button id="pwaInstallBtn" class="bg-primary text-black px-6 py-2 rounded-md font-black text-[10px] uppercase tracking-[0.2em] hover:bg-primary-dim transition-all flex items-center gap-2">
        <span class="material-symbols-outlined text-sm">download</span>
        Instalar App
    </button>
</div>
</div>
</div>
</section>
<!-- Ofertas Técnicas / Repuestos Destacados -->
<section class="py-20 bg-white">
<div class="container mx-auto px-6">
<div class="flex justify-between items-end mb-10">
<div>
<span class="text-primary font-black text-[10px] uppercase tracking-[0.3em]">Ofertas de la Semana</span>
<h2 class="text-3xl font-black uppercase tracking-tighter text-black mt-1">Repuestos Destacados</h2>
</div>
<a class="text-[10px] font-black uppercase tracking-widest text-black border-b-2 border-primary pb-1" href="{{ url('/tienda/' . 'catalogo_detallado') }}">Ver Catálogo Completo</a>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
<!-- Product Card 1 -->
<div class="group bg-stone-50 border border-outline rounded-xl p-4 hover:shadow-xl transition-all">
<div class="relative aspect-square mb-4 overflow-hidden rounded-lg bg-white">
<img alt="Brake Disc" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCNjAH9S_Dx8VtU7mF1yl1gIoO1HHxRUQR20jPWmEZ_fWPK0Lf-aqaHg5SbId7ALpHlPm1IBVe6hQPm83-NLF_KRSd1NILUJYVRLn7UO6bSjWbJHrwIEjbFqo-DEe4gv3JFYAtDUXn6VNxmvX1mo4hAlQY5e3qx9t69T02-YM-fgbgyu5g29n1SbpBH5IfDiboMUFBwLW5HUBLf0gL-uFhYCkYCmLrNxaXuJfXidw71gc1TWNKpa50EjrPRsAU9-GWS_sIc880L1A"/>
<span class="absolute top-2 left-2 bg-black text-primary text-[9px] font-black px-2 py-1 uppercase">-15%</span>
</div>
<p class="text-[10px] font-bold text-stone-400 uppercase mb-1">Frenos / OEM-4421</p>
<h4 class="font-bold text-sm text-black mb-2 line-clamp-1">Kit de Discos de Freno Ventilados</h4>
<div class="flex items-center justify-between mb-4">
<div>
<span class="text-lg font-black text-black">$85.00</span>
<span class="text-[10px] text-stone-400 line-through ml-2">$102.00</span>
</div>
<span class="text-[10px] font-bold text-primary-dim uppercase">Stock: +50</span>
</div>
<button onclick="addToCart(1, 'Kit de Discos de Freno Ventilados', 85.00, 'https://lh3.googleusercontent.com/aida-public/AB6AXuCNjAH9S_Dx8VtU7mF1yl1gIoO1HHxRUQR20jPWmEZ_fWPK0Lf-aqaHg5SbId7ALpHlPm1IBVe6hQPm83-NLF_KRSd1NILUJYVRLn7UO6bSjWbJHrwIEjbFqo-DEe4gv3JFYAtDUXn6VNxmvX1mo4hAlQY5e3qx9t69T02-YM-fgbgyu5g29n1SbpBH5IfDiboMUFBwLW5HUBLf0gL-uFhYCkYCmLrNxaXuJfXidw71gc1TWNKpa50EjrPRsAU9-GWS_sIc880L1A', 'Frenos / OEM-4421')" class="w-full bg-black text-white py-3 rounded-lg flex items-center justify-center gap-2 hover:bg-stone-800 transition-colors group/btn">
<span class="material-symbols-outlined text-sm group-hover/btn:text-primary">add_shopping_cart</span>
<span class="text-[10px] font-black uppercase tracking-widest">Añadir al Carrito</span>
</button>
</div>
<!-- Product Card 2 -->
<div class="group bg-stone-50 border border-outline rounded-xl p-4 hover:shadow-xl transition-all">
<div class="relative aspect-square mb-4 overflow-hidden rounded-lg bg-white">
<img alt="Engine Part" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAiuQeey5lmq6st-vJo1TRQIs8oQtq_4Cg3QyJcj3j5bJguRJRMBb8ZSC_EXi5lrwaP7iFhysnzJ-1xPxNGrK4UF7AT2OeN8ElIvXkr9-fKhD32L0ADYy9Ey15LiRkDN8mJeDuWdAW5rDzkxw-EYW2ydO_BYYgkeF9JIGC8kwEVf-n5FRVlF_rtG7bTZ9VsR_-6AslLZLeyVYNZWjszYl7HOoO_0ZWqNEcN2WLJnxoqR8dzy5OKZhKk8pdLOhI6kvQ7oAHsQ2gQeQ"/>
<span class="absolute top-2 right-2 bg-primary text-black text-[9px] font-black px-2 py-1 uppercase">Top Ventas</span>
</div>
<p class="text-[10px] font-bold text-stone-400 uppercase mb-1">Motor / CAT-882</p>
<h4 class="font-bold text-sm text-black mb-2 line-clamp-1">Inyector de Combustible Heavy Duty</h4>
<div class="flex items-center justify-between mb-4">
<div>
<span class="text-lg font-black text-black">$320.00</span>
</div>
<span class="text-[10px] font-bold text-primary-dim uppercase">Bajo Pedido</span>
</div>
<button onclick="addToCart(2, 'Inyector de Combustible Heavy Duty', 320.00, 'https://lh3.googleusercontent.com/aida-public/AB6AXuAiuQeey5lmq6st-vJo1TRQIs8oQtq_4Cg3QyJcj3j5bJguRJRMBb8ZSC_EXi5lrwaP7iFhysnzJ-1xPxNGrK4UF7AT2OeN8ElIvXkr9-fKhD32L0ADYy9Ey15LiRkDN8mJeDuWdAW5rDzkxw-EYW2ydO_BYYgkeF9JIGC8kwEVf-n5FRVlF_rtG7bTZ9VsR_-6AslLZLeyVYNZWjszYl7HOoO_0ZWqNEcN2WLJnxoqR8dzy5OKZhKk8pdLOhI6kvQ7oAHsQ2gQeQ', 'Motor / CAT-882')" class="w-full bg-black text-white py-3 rounded-lg flex items-center justify-center gap-2 hover:bg-stone-800 transition-colors group/btn">
<span class="material-symbols-outlined text-sm group-hover/btn:text-primary">add_shopping_cart</span>
<span class="text-[10px] font-black uppercase tracking-widest">Añadir al Carrito</span>
</button>
</div>
<!-- Product Card 3 -->
<div class="group bg-stone-50 border border-outline rounded-xl p-4 hover:shadow-xl transition-all">
<div class="relative aspect-square mb-4 overflow-hidden rounded-lg bg-white">
<img alt="Suspension" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDHtNySrP8HrGI66TLOsvDPkaDg0OsqNHGb13gCFvCGw0QIBbKbi8njt_UPgaMng-OmtqIcDmx0wAhZUrdUXCmDeFIZM1XG2w7u_7l-k80z1giO2h8A-I1XxRLmt3-W6Idk23flMeIDf660-0qi_Dc3Uczsjnu_ZMz4jIfiTbyh7AkLSoXLrM58e4ggXYxH_nVG2JNEMfP0fVELVbhRLEirDlLmeSZR96Sd4mKGltM7moFTxvlb8IZZgiNy_dX4rJRNFQjnr-pwkw"/>
</div>
<p class="text-[10px] font-bold text-stone-400 uppercase mb-1">Suspensión / SUS-101</p>
<h4 class="font-bold text-sm text-black mb-2 line-clamp-1">Amortiguador Reforzado Delantero</h4>
<div class="flex items-center justify-between mb-4">
<div>
<span class="text-lg font-black text-black">$145.00</span>
</div>
<span class="text-[10px] font-bold text-primary-dim uppercase">Stock: 12</span>
</div>
<button onclick="addToCart(3, 'Amortiguador Reforzado Delantero', 145.00, 'https://lh3.googleusercontent.com/aida-public/AB6AXuDHtNySrP8HrGI66TLOsvDPkaDg0OsqNHGb13gCFvCGw0QIBbKbi8njt_UPgaMng-OmtqIcDmx0wAhZUrdUXCmDeFIZM1XG2w7u_7l-k80z1giO2h8A-I1XxRLmt3-W6Idk23flMeIDf660-0qi_Dc3Uczsjnu_ZMz4jIfiTbyh7AkLSoXLrM58e4ggXYxH_nVG2JNEMfP0fVELVbhRLEirDlLmeSZR96Sd4mKGltM7moFTxvlb8IZZgiNy_dX4rJRNFQjnr-pwkw', 'Suspensión / SUS-101')" class="w-full bg-black text-white py-3 rounded-lg flex items-center justify-center gap-2 hover:bg-stone-800 transition-colors group/btn">
<span class="material-symbols-outlined text-sm group-hover/btn:text-primary">add_shopping_cart</span>
<span class="text-[10px] font-black uppercase tracking-widest">Añadir al Carrito</span>
</button>
</div>
<!-- Product Card 4 -->
<div class="group bg-stone-50 border border-outline rounded-xl p-4 hover:shadow-xl transition-all">
<div class="relative aspect-square mb-4 overflow-hidden rounded-lg bg-white flex items-center justify-center">
<span class="material-symbols-outlined text-6xl text-stone-200">settings_input_component</span>
</div>
<p class="text-[10px] font-bold text-stone-400 uppercase mb-1">Transmisión / TRS-55</p>
<h4 class="font-bold text-sm text-black mb-2 line-clamp-1">Filtro de Transmisión Automática</h4>
<div class="flex items-center justify-between mb-4">
<div>
<span class="text-lg font-black text-black">$42.50</span>
</div>
<span class="text-[10px] font-bold text-primary-dim uppercase">Stock: +100</span>
</div>
<button onclick="addToCart(4, 'Filtro de Transmisión Automática', 42.50, '', 'Transmisión / TRS-55')" class="w-full bg-black text-white py-3 rounded-lg flex items-center justify-center gap-2 hover:bg-stone-800 transition-colors group/btn">
<span class="material-symbols-outlined text-sm group-hover/btn:text-primary">add_shopping_cart</span>
<span class="text-[10px] font-black uppercase tracking-widest">Añadir al Carrito</span>
</button>
</div>
</div>
</div>
</section>
<!-- Categories Bento Grid -->
<section class="py-24 bg-stone-50">
<div class="container mx-auto px-6">
<div class="flex flex-col items-center mb-16 text-center">
<h2 class="text-4xl font-black uppercase tracking-tighter text-black">Explora por Categoría</h2>
<div class="h-1.5 w-24 bg-primary mt-4"></div>
</div>
<div class="grid grid-cols-1 md:grid-cols-12 gap-6 h-auto md:h-[700px]">
<div class="md:col-span-8 group relative overflow-hidden rounded-2xl bg-black">
<img alt="Engine Parts" class="w-full h-full object-cover opacity-60 transition-transform duration-700 group-hover:scale-105" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAiuQeey5lmq6st-vJo1TRQIs8oQtq_4Cg3QyJcj3j5bJguRJRMBb8ZSC_EXi5lrwaP7iFhysnzJ-1xPxNGrK4UF7AT2OeN8ElIvXkr9-fKhD32L0ADYy9Ey15LiRkDN8mJeDuWdAW5rDzkxw-EYW2ydO_BYYgkeF9JIGC8kwEVf-n5FRVlF_rtG7bTZ9VsR_-6AslLZLeyVYNZWjszYl7HOoO_0ZWqNEcN2WLJnxoqR8dzy5OKZhKk8pdLOhI6kvQ7oAHsQ2gQeQ"/>
<div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent"></div>
<div class="absolute bottom-0 left-0 p-10">
<span class="text-primary text-xs font-black uppercase tracking-[0.4em]">Industrial Forge</span>
<h3 class="text-5xl font-black text-white uppercase tracking-tighter mt-2">Sistemas de Motor</h3>
<a href="{{ url('/tienda/catalogo_general') }}" class="mt-6 inline-block bg-primary text-black px-8 py-3 rounded-md font-black text-xs uppercase tracking-widest hover:bg-white transition-all">Explorar Motor</a>
</div>
</div>
<div class="md:col-span-4 group relative overflow-hidden rounded-2xl bg-zinc-900">
<img alt="Brake Systems" class="w-full h-full object-cover opacity-50 transition-transform duration-700 group-hover:scale-105" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCNjAH9S_Dx8VtU7mF1yl1gIoO1HHxRUQR20jPWmEZ_fWPK0Lf-aqaHg5SbId7ALpHlPm1IBVe6hQPm83-NLF_KRSd1NILUJYVRLn7UO6bSjWbJHrwIEjbFqo-DEe4gv3JFYAtDUXn6VNxmvX1mo4hAlQY5e3qx9t69T02-YM-fgbgyu5g29n1SbpBH5IfDiboMUFBwLW5HUBLf0gL-uFhYCkYCmLrNxaXuJfXidw71gc1TWNKpa50EjrPRsAU9-GWS_sIc880L1A"/>
<div class="absolute inset-0 bg-black/40 group-hover:bg-transparent transition-all"></div>
<div class="absolute inset-0 flex flex-col justify-end p-10">
<h3 class="text-3xl font-black text-white uppercase tracking-tighter">Frenado y Seguridad</h3>
<p class="text-stone-400 text-sm mt-2 mb-4">Pastillas, discos y componentes hidráulicos.</p>
<a href="{{ url('/tienda/catalogo_general') }}" class="w-fit inline-block bg-white/10 backdrop-blur-md text-white text-[10px] font-bold uppercase tracking-widest px-6 py-3 border border-white/20 hover:bg-primary hover:text-black hover:border-primary transition-all">Ver Más</a>
</div>
</div>
<div class="md:col-span-4 group relative overflow-hidden rounded-2xl bg-primary">
<div class="p-10 h-full flex flex-col justify-between">
<span class="material-symbols-outlined text-6xl text-black">settings_input_component</span>
<div>
<h3 class="text-3xl font-black text-black uppercase tracking-tighter">Transmisión</h3>
<p class="text-black/70 text-sm mt-2">Cajas, embragues y diferenciales industriales certificados.</p>
</div>
</div>
</div>
<div class="md:col-span-8 group relative overflow-hidden rounded-2xl bg-black">
<img alt="Suspension" class="w-full h-full object-cover opacity-60 transition-transform duration-700 group-hover:scale-105" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDHtNySrP8HrGI66TLOsvDPkaDg0OsqNHGb13gCFvCGw0QIBbKbi8njt_UPgaMng-OmtqIcDmx0wAhZUrdUXCmDeFIZM1XG2w7u_7l-k80z1giO2h8A-I1XxRLmt3-W6Idk23flMeIDf660-0qi_Dc3Uczsjnu_ZMz4jIfiTbyh7AkLSoXLrM58e4ggXYxH_nVG2JNEMfP0fVELVbhRLEirDlLmeSZR96Sd4mKGltM7moFTxvlb8IZZgiNy_dX4rJRNFQjnr-pwkw"/>
<div class="absolute inset-0 flex items-center justify-center bg-black/20 group-hover:bg-transparent transition-colors">
<h3 class="text-6xl font-black text-white uppercase tracking-[0.2em] drop-shadow-2xl">Suspensión</h3>
</div>
</div>
</div>
</div>
</section>
<!-- B2B Banner -->
<section class="py-24 bg-black overflow-hidden relative">
<div class="absolute top-0 right-0 w-1/2 h-full bg-primary/5 -skew-x-12 translate-x-1/4"></div>
<div class="container mx-auto px-6 relative z-10">
<div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
<div>
<span class="text-primary font-black text-xs uppercase tracking-[0.4em] mb-4 block">Portal Corporativo</span>
<h2 class="text-4xl md:text-6xl font-black text-white uppercase tracking-tighter leading-none mb-8">
                        SOLUCIONES <br/> <span class="text-primary">ERP B2B</span>
</h2>
<p class="text-stone-400 mb-10 text-lg font-light leading-relaxed">
                        Sistema exclusivo para Talleres y Flotas. Gestione sus pedidos directamente desde nuestro inventario centralizado con condiciones de crédito preferenciales.
                    </p>
<ul class="space-y-6 mb-12">
<li class="flex items-center text-white font-bold text-xs uppercase tracking-widest">
<span class="material-symbols-outlined text-primary mr-4" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                            Precios Mayoristas Netos
                        </li>
<li class="flex items-center text-white font-bold text-xs uppercase tracking-widest">
<span class="material-symbols-outlined text-primary mr-4" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                            Línea de Crédito Industrial
                        </li>
<li class="flex items-center text-white font-bold text-xs uppercase tracking-widest">
<span class="material-symbols-outlined text-primary mr-4" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                            Integración API para Inventarios
                        </li>
</ul>
<div class="flex flex-wrap gap-4">
<a href="{{ url('/auth/' . 'login') }}" class="bg-primary text-black px-10 py-5 font-black uppercase tracking-[0.2em] rounded-sm hover:scale-105 transition-transform inline-block text-center">
                            Entrar al ERP
                        </a>
<a href="{{ url('/auth/' . 'crear_cuenta') }}" class="border border-white/20 text-white px-10 py-5 font-black uppercase tracking-[0.2em] rounded-sm hover:bg-white hover:text-black transition-all inline-block text-center">
                            Solicitar Registro
                        </a>
</div>
</div>
<div class="grid grid-cols-2 gap-4">
<div class="space-y-4 pt-12">
<div class="aspect-square bg-zinc-900 border border-white/5 rounded-2xl p-8 flex flex-col justify-center items-center text-center">
<span class="text-5xl font-black text-primary mb-3">+15k</span>
<span class="text-[10px] text-stone-500 font-bold uppercase tracking-widest">SKUs ERP</span>
</div>
<div class="aspect-square bg-zinc-900 border border-white/5 rounded-2xl p-8 flex flex-col justify-center items-center text-center">
<span class="text-5xl font-black text-primary mb-3">24h</span>
<span class="text-[10px] text-stone-500 font-bold uppercase tracking-widest">Despacho Nacional</span>
</div>
</div>
<div class="space-y-4">
<div class="aspect-square bg-zinc-800 border border-white/5 rounded-2xl p-8 flex flex-col justify-center items-center text-center">
<span class="text-5xl font-black text-primary mb-3">100%</span>
<span class="text-[10px] text-stone-500 font-bold uppercase tracking-widest">Calidad OEM</span>
</div>
<div class="aspect-square bg-zinc-900 border border-white/5 rounded-2xl p-8 flex flex-col justify-center items-center text-center">
<span class="material-symbols-outlined text-primary text-5xl mb-3">support_agent</span>
<span class="text-[10px] text-stone-500 font-bold uppercase tracking-widest">Soporte Técnico</span>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- Brands -->
<section class="py-16 bg-white border-y border-outline">
<div class="container mx-auto px-6">
<div class="flex flex-wrap justify-center items-center gap-16 opacity-30 grayscale hover:grayscale-0 transition-all">
<span class="text-2xl font-black tracking-widest uppercase">Caterpillar</span>
<span class="text-2xl font-black tracking-widest uppercase">Bosch</span>
<span class="text-2xl font-black tracking-widest uppercase">Denso</span>
<span class="text-2xl font-black tracking-widest uppercase">Donaldson</span>
<span class="text-2xl font-black tracking-widest uppercase">Fleetguard</span>
</div>
</div>
</section>
</main>
@endsection

@push('scripts')
    <!-- Zenith Integration Bridge -->
    <script src="{{ asset('js/zenith-data.js') }}"></script>
    <script src="{{ asset('js/zenith-ecommerce-sync.js') }}"></script>
    <script src="{{ asset('js/index.js') }}"></script>
@endpush