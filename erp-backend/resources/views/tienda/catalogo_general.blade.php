@extends('layouts.ecommerce')

@section('title', 'Catálogo | Mayor de Repuesto LA CIMA, C.A.')

@push('styles')
    <link rel="stylesheet" href="/frontend/public/ecommerce/css/catalogo_general.css">
@endpush

@section('content')
    <!-- Hero Section -->
    <header
      class="relative min-h-[85vh] flex items-center overflow-hidden bg-black pt-16"
    >
      <div class="absolute inset-0 z-0">
        <img
          src="https://lh3.googleusercontent.com/aida-public/AB6AXuDAXDDoopL1vJGvj43_2EcixnT0qcffP-8sugqc3PJmetlM42HxR7EiDaACitBpmwFEGPY-d0LPOMheDO8XJC_vDkZ0NGhadXT3P0f67reZI-WnouLsKv14pyDyoOT8dU2KDqwTVwiQO7apJ_kQ5mUQ43bKNXlPy0n8itI7-GxJBnEoLXqAGm4Lc218ApwlfA93ICa2tzs84XoB3YvCguieK7UMsUIQ6QITRFgZwmKhnd-3jYDRMGtcZ5G-7Alrjd3kFtkJEppsOsA"
          class="w-full h-full object-cover opacity-40 grayscale mix-blend-luminosity"
        />
        <div
          class="absolute inset-0 bg-gradient-to-t from-background via-transparent to-transparent"
        ></div>
      </div>
      <div class="container mx-auto px-6 relative z-10">
        <div class="max-w-4xl">
          <span
            class="inline-block px-3 py-1 bg-primary text-black text-[10px] font-black uppercase tracking-[0.2em] mb-6"
            >Distribuidor Autorizado</span
          >
          <h1
            class="text-6xl md:text-8xl font-headline font-black text-white uppercase tracking-tighter leading-[0.9] mb-8"
          >
            IMPULSADO POR <br />
            <span class="text-primary-dim">LA PRECISIÓN.</span>
          </h1>
          <p
            class="text-stone-300 text-lg md:text-xl max-w-xl leading-relaxed mb-10 font-medium italic"
          >
            Suministro de piezas de motor industrial de carga pesada para
            Cummins, Volvo y Detroit Diesel. Excelencia en ingeniería para la
            base del tiempo de actividad industrial.
          </p>
          <div class="flex flex-wrap gap-4">
            <a
              href="/tienda/catalogo_detallado"
              class="bg-primary hover:bg-white text-black font-black uppercase py-5 px-10 tracking-[0.2em] text-xs transition-all inline-block"
              >Explorar Catálogo</a
            >
            <button
              class="border border-white text-white font-black uppercase py-5 px-10 tracking-[0.2em] text-xs hover:bg-white/10 transition-all"
            >
              Especificaciones Técnicas
            </button>
          </div>
        </div>
      </div>
      <div
        class="absolute bottom-12 right-12 hidden lg:block border-l-4 border-primary pl-6 bg-black/40 backdrop-blur-md p-6"
      >
        <p
          class="text-stone-400 text-[10px] font-black uppercase tracking-[0.3em] mb-2"
        >
          Integridad del Motor
        </p>
        <p
          class="text-white text-3xl font-black italic tracking-tighter uppercase"
        >
          99.9% DISPONIBILIDAD
        </p>
      </div>
    </header>

    <!-- Product Catalog -->
<main class="max-w-screen-2xl mx-auto py-24 px-6 w-full" id="catalog">
      <div
        class="flex flex-col md:flex-row justify-between items-end mb-16 gap-8"
      >
        <div class="max-w-xl">
          <h2
            class="text-5xl font-black uppercase tracking-tighter text-black mb-4"
          >
            Componentes de Precisión
          </h2>
          <div class="h-2 w-24 bg-primary mb-6"></div>
          <p class="text-on-surface-variant font-medium leading-relaxed">
            Explore nuestra selección curada de piezas de alto rendimiento. Cada
            componente está rigurosamente probado para durabilidad industrial.
          </p>
        </div>
        <div class="flex gap-4 overflow-x-auto pb-4 w-full md:w-auto">
          <button
            onclick="filterProducts('all')"
            class="filter-btn whitespace-nowrap px-8 py-3 bg-black text-primary text-xs font-black uppercase tracking-[0.2em]"
          >
            Todos
          </button>
          <button
            onclick="filterProducts('cummins')"
            class="filter-btn whitespace-nowrap px-8 py-3 bg-white border border-outline text-black text-xs font-black uppercase tracking-[0.2em] hover:bg-primary transition-colors"
          >
            Cummins
          </button>
          <button
            onclick="filterProducts('volvo')"
            class="filter-btn whitespace-nowrap px-8 py-3 bg-white border border-outline text-black text-xs font-black uppercase tracking-[0.2em] hover:bg-primary transition-colors"
          >
            Volvo
          </button>
          <button
            onclick="filterProducts('detroit')"
            class="filter-btn whitespace-nowrap px-8 py-3 bg-white border border-outline text-black text-xs font-black uppercase tracking-[0.2em] hover:bg-primary transition-colors"
          >
            Detroit
          </button>
          <button
            onclick="filterProducts('toyota')"
            class="filter-btn whitespace-nowrap px-8 py-3 bg-white border border-outline text-black text-xs font-black uppercase tracking-[0.2em] hover:bg-primary transition-colors"
          >
            Toyota
          </button>
        </div>
      </div>

      <!-- Product Grid (RESTORING ALL 8 PRODUCTS) -->
      <!-- Dynamic Product Grid -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach($products as $product)
        <article
          class="bg-white border border-outline group overflow-hidden"
          data-category="{{ strtolower($product->marca) }}"
        >
          <a href="/tienda/detalle_productos?id={{ $product->id }}" class="block">
            <div
              class="relative aspect-square overflow-hidden bg-stone-50 p-8 flex items-center justify-center"
            >
              @php
                // Imagen por defecto si no tiene URL de Google Photos
                $imgUrl = $product->imagen_url ?: 'https://via.placeholder.com/400x400?text=' . urlencode($product->nombre);
              @endphp
              <img
                src="{{ $imgUrl }}"
                class="w-full h-full object-contain mix-blend-multiply transition-transform duration-700 group-hover:scale-110"
                alt="{{ $product->nombre }}"
              />
              <div
                class="absolute top-4 right-4 bg-black text-primary text-[9px] font-black uppercase tracking-[0.2em] px-2 py-1"
              >
                {{ $product->stock_actual > 0 ? 'En Stock' : 'Agotado' }}
              </div>
            </div>
          </a>
          <div class="p-6">
            <div class="flex justify-between items-start mb-2">
              <span
                class="text-[10px] font-black text-primary uppercase tracking-widest"
                >{{ $product->marca }}</span
              >
              <span class="text-[10px] font-mono font-bold text-stone-400"
                >#{{ $product->codigo_oem }}</span
              >
            </div>
            <a href="/tienda/detalle_productos?id={{ $product->id }}" class="block">
              <h3
                class="text-xl font-black uppercase tracking-tight mb-4 group-hover:text-primary transition-colors"
              >
                {{ $product->nombre }}
              </h3>
            </a>
            <div class="mb-6">
              <p class="text-3xl font-black text-black tracking-tighter">
                ${{ number_format($product->precio_mayor, 2) }}
              </p>
              <p
                class="text-xs font-bold text-stone-400 uppercase tracking-widest"
              >
                Bs. {{ number_format($product->precio_mayor * 36, 2) }} aprox.
              </p>
            </div>
            <button
              onclick="
                addToCart(
                  {{ $product->id }},
                  '{{ $product->nombre }}',
                  {{ $product->precio_mayor }},
                  '{{ $imgUrl }}',
                  '{{ $product->marca }} / {{ $product->codigo_oem }}',
                )
              "
              class="w-full bg-black text-white hover:bg-primary hover:text-black py-4 font-black uppercase text-xs tracking-[0.2em] flex items-center justify-center gap-3 transition-all"
            >
              <span class="material-symbols-outlined text-lg"
                >add_shopping_cart</span
              >
              Agregar al Carrito
            </button>
          </div>
        </article>
        @endforeach
      </div>

      <!-- Pagination Support -->
      <div class="mt-20 flex justify-center">
          {{ $products->links() }}
      </div>
    </main>
@endsection

@push('scripts')
    <script src="/frontend/public/ecommerce/js/catalogo_general.js"></script>
@endpush
