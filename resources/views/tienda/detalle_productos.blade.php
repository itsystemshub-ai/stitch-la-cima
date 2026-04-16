@extends('layouts.ecommerce')

@section('title')
    <title id="pageTitle">Detalle del Producto | MAYOR DE REPUESTO LA CIMA, C.A.</title>
@endsection

@push('styles')
    <link rel="stylesheet" href="css/detalle_productos.css">
@endpush

@section('content')
<!-- Premium Product Detail Main -->
<main class="pt-32 pb-24">
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
@endsection

@push('scripts')
    <script src="js/detalle_productos.js"></script>
@endpush
