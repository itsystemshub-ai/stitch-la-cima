@extends('layouts.ecommerce')

@section('title', 'Componentes de Precisión | Mayor de Repuesto LA CIMA, C.A.')

@push('styles')
    <link rel="stylesheet" href="/frontend/public/ecommerce/css/catalogo_general.css">
@endpush

@section('content')
<main class="pt-16">
    <!-- Hero Section: High Impact -->
    <section class="relative min-h-[70vh] flex items-center overflow-hidden bg-black">
        <div class="absolute inset-0 z-0">
            <img alt="Industrial Engine Background" class="w-full h-full object-cover opacity-30 grayscale" 
                 src="https://lh3.googleusercontent.com/aida-public/AB6AXuDAXDDoopL1vJGvj43_2EcixnT0qcffP-8sugqc3PJmetlM42HxR7EiDaACitBpmwFEGPY-d0LPOMheDO8XJC_vDkZ0NGhadXT3P0f67reZI-WnouLsKv14pyDyoOT8dU2KDqwTVwiQO7apJ_kQ5mUQ43bKNXlPy0n8itI7-GxJBnEoLXqAGm4Lc218ApwlfA93ICa2tzs84XoB3YvCguieK7UMsUIQ6QITRFgZwmKhnd-3jYDRMGtcZ5G-7Alrjd3kFtkJEppsOsA"/>
            <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent"></div>
        </div>
        <div class="container mx-auto px-6 relative z-10">
            <div class="max-w-4xl">
                <span class="inline-block px-3 py-1 bg-primary text-black text-[10px] font-black uppercase tracking-[0.2em] mb-6">Inventario Certificado</span>
                <h1 class="text-6xl md:text-8xl font-black text-white uppercase tracking-tighter leading-[0.9] mb-8">
                    IMPULSADO POR <br />
                    <span class="text-primary">LA PRECISIÓN.</span>
                </h1>
                <p class="text-stone-400 text-lg md:text-xl max-w-xl leading-relaxed mb-10 font-light italic">
                    Suministro crítico de piezas para Cummins, Volvo y Detroit Diesel. Ingeniería de grado industrial para máxima operatividad.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="#catalog" class="bg-primary hover:bg-white text-black font-black uppercase py-5 px-10 tracking-[0.2em] text-xs transition-all inline-block">Ver Inventario</a>
                    <a href="/tienda/nosotros" class="border border-white/20 text-white font-black uppercase py-5 px-10 tracking-[0.2em] text-xs hover:bg-white/10 transition-all inline-block">Conoce la Cima</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Content Area -->
    <section id="catalog" class="py-24 bg-white">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-8 border-b border-outline pb-10">
                <div class="max-w-xl">
                    <h2 class="text-4xl font-black uppercase tracking-tighter text-black mb-4">Catálogo General</h2>
                    <p class="text-stone-500 font-medium leading-relaxed italic text-sm">
                        {{ $products->total() }} componentes industriales verificados disponibles en despacho inmediato.
                    </p>
                </div>
                <!-- Simple Filters -->
                <div class="flex gap-4 overflow-x-auto pb-4 w-full md:w-auto invisible md:visible">
                    <button class="filter-btn active px-8 py-3 bg-black text-primary text-[10px] font-black uppercase tracking-widest">Todos</button>
                    <button class="filter-btn px-8 py-3 bg-stone-100 text-stone-500 text-[10px] font-black uppercase tracking-widest hover:bg-primary hover:text-black transition-all">Cummins</button>
                    <button class="filter-btn px-8 py-3 bg-stone-100 text-stone-500 text-[10px] font-black uppercase tracking-widest hover:bg-primary hover:text-black transition-all">Volvo</button>
                    <button class="filter-btn px-8 py-3 bg-stone-100 text-stone-500 text-[10px] font-black uppercase tracking-widest hover:bg-primary hover:text-black transition-all">Caterpillar</button>
                </div>
            </div>

            <!-- Modern Editorial Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-6 gap-y-12">
                @foreach($products as $product)
                @php
                    $imgUrl = $product->imagen_url ?: 'https://via.placeholder.com/400x400?text=' . urlencode($product->nombre);
                    $productData = json_encode([
                        'id' => $product->id,
                        'nombre' => $product->nombre,
                        'precio' => $product->precio_mayor,
                        'imagen' => $imgUrl,
                        'sku' => $product->codigo_oem ?? $product->codigo_erp
                    ]);
                @endphp
                <article class="group bg-white border border-outline rounded-xl p-4 hover:shadow-xl transition-all flex flex-col">
                    <div class="relative aspect-square mb-4 overflow-hidden rounded-lg bg-stone-50">
                        <a href="/tienda/detalle_productos?id={{ $product->id }}">
                            <img alt="{{ $product->nombre }}" 
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" 
                                 src="{{ $imgUrl }}"/>
                        </a>
                        @if($product->stock_actual > 0)
                        <span class="absolute top-2 left-2 bg-primary text-black text-[9px] font-black px-2 py-1 uppercase italic shadow-sm">Disponible</span>
                        @else
                        <span class="absolute top-2 left-2 bg-red-600 text-white text-[9px] font-black px-2 py-1 uppercase shadow-sm">Agotado</span>
                        @endif
                    </div>
                    
                    <div class="flex flex-col flex-grow">
                        <p class="text-[10px] font-bold text-stone-400 uppercase mb-1 tracking-widest">
                            {{ $product->marca }} / {{ $product->codigo_oem ?? $product->codigo_erp }}
                        </p>
                        <a href="/tienda/detalle_productos?id={{ $product->id }}">
                            <h4 class="font-black text-sm text-black mb-4 line-clamp-2 hover:text-primary transition-colors uppercase tracking-tight">
                                {{ $product->nombre }}
                            </h4>
                        </a>
                        
                        <div class="mt-auto pt-4 border-t border-outline flex items-center justify-between mb-4">
                            <div>
                                <span class="text-2xl font-black text-black tracking-tighter">${{ number_format($product->precio_mayor, 2) }}</span>
                            </div>
                        </div>

                        <button onclick='addToCart({!! $productData !!})' 
                                class="w-full bg-black text-white py-4 rounded-lg flex items-center justify-center gap-2 hover:bg-stone-800 transition-colors group/btn">
                            <span class="material-symbols-outlined text-sm group-hover/btn:text-primary">add_shopping_cart</span>
                            <span class="text-[10px] font-black uppercase tracking-[0.2em]">Añadir al Carrito</span>
                        </button>
                    </div>
                </article>
                @endforeach
            </div>

            <!-- Premium Pagination -->
            <div class="mt-20 flex justify-center">
                {{ $products->links() }}
            </div>
        </div>
    </section>

    <!-- Support Banner -->
    <section class="py-16 bg-stone-50 border-t border-outline">
        <div class="container mx-auto px-6">
            <div class="bg-black p-12 rounded-3xl relative overflow-hidden flex flex-col md:flex-row items-center justify-between gap-8">
                <div class="relative z-10 max-w-xl">
                    <h3 class="text-3xl font-black text-white uppercase tracking-tighter mb-4">¿No encuentras la pieza exacta?</h3>
                    <p class="text-stone-400 text-sm leading-relaxed">Nuestro departamento técnico puede localizar repuestos críticos fuera de catálogo a través de nuestra red de proveedores OEM internacionales.</p>
                </div>
                <a href="/tienda/soporte" class="bg-primary text-black px-12 py-5 font-black uppercase text-xs tracking-widest rounded-sm hover:scale-105 transition-transform shrink-0 relative z-10">Asistencia Técnica</a>
                <div class="absolute -right-20 -top-20 opacity-5">
                    <span class="material-symbols-outlined text-[300px]" style="font-variation-settings: 'FILL' 1;">precision_manufacturing</span>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

@push('scripts')
    <script src="/frontend/public/ecommerce/js/catalogo_general.js"></script>
    <script src="/frontend/public/ecommerce/js/zenith-ecommerce-sync.js"></script>
@endpush
