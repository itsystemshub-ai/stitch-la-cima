@extends('layouts.ecommerce')

@section('title', 'Catálogo | Mayor de Repuesto LA CIMA, C.A.')

@push('styles')
    <link rel="stylesheet" href="css/catalogo_general.css" />
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
             class="text-2xl md:text-3xl font-headline font-black text-white uppercase tracking-tighter leading-[0.9] mb-8"
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
              href="{{ url('/tienda/' . 'catalogo_detallado') }}"
              class="bg-primary hover:bg-white text-black font-black uppercase py-5 px-10 tracking-[0.2em] text-xs transition-all inline-block"
              >Explorar Catálogo</a
            >
            <button
              onclick="showNotification('Especificaciones técnicas en preparación')"
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
            class="text-3xl font-black uppercase tracking-tighter text-black mb-4"
          >
            Componentes de Precisión
          </h2>
          <div class="h-2 w-24 bg-primary mb-6"></div>
          <p class="text-stone-500 font-bold leading-relaxed text-[12px] uppercase tracking-wide">
            Explore nuestra selección curada de piezas de alto rendimiento. Cada
            componente está rigurosamente probado para durabilidad industrial.
          </p>
        </div>
        <div class="flex gap-4 overflow-x-auto pb-4 w-full md:w-auto">
          <a
            href="{{ url('/tienda/catalogo_general') }}"
            class="whitespace-nowrap px-8 py-3 {{ !request('marca') && !request('categoria') ? 'bg-black text-primary' : 'bg-white border border-outline text-black' }} text-xs font-black uppercase tracking-[0.2em]"
          >
            Todos
          </a>
          @foreach($brands as $brand)
            <a
              href="{{ url('/tienda/catalogo_general') }}?marca={{ urlencode($brand) }}"
              class="whitespace-nowrap px-8 py-3 {{ request('marca') == $brand ? 'bg-black text-primary' : 'bg-white border border-outline text-black' }} text-xs font-black uppercase tracking-[0.2em] hover:bg-primary transition-colors"
            >
              {{ $brand }}
            </a>
          @endforeach
          @foreach($categories as $category)
            <a
              href="{{ url('/tienda/catalogo_general') }}?categoria={{ urlencode($category) }}"
              class="whitespace-nowrap px-8 py-3 {{ request('categoria') == $category ? 'bg-black text-primary' : 'bg-white border border-outline text-black' }} text-xs font-black uppercase tracking-[0.2em] hover:bg-primary transition-colors"
            >
              {{ $category }}
            </a>
          @endforeach
        </div>
      </div>

      <!-- Product Grid -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6" id="productGrid">
        @forelse($products as $product)
            <x-product-card :product="$product" />
        @empty
            <div class="col-span-full py-20 text-center">
                 <span class="material-symbols-outlined text-4xl text-stone-300 mb-4">inventory_2</span>
                <p class="text-stone-500 font-bold uppercase tracking-widest">No se encontraron productos</p>
            </div>
        @endforelse
      </div>

      <!-- Pagination -->
      <div class="mt-16 flex justify-center">
          {{ $products->links() }}
      </div>
    </main>

     <!-- Features Section (Hero Style) -->
     <section class="relative min-h-[80vh] flex items-center overflow-hidden bg-black">
        <div class="absolute inset-0 z-0">
            <img
              src="https://images.unsplash.com/photo-1504917595217-d4dc5ebe6122?w=1920&q=80"
              class="w-full h-full object-cover opacity-30"
            />
            <div class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent"></div>
        </div>
        <div class="container mx-auto px-6 relative z-10">
            <div class="max-w-4xl">
                <span class="inline-block px-3 py-1 bg-primary text-black text-[10px] font-black uppercase tracking-[0.2em] mb-6">Ventajas Comparativas</span>
                <h2 class="text-2xl md:text-3xl font-headline font-black text-white uppercase tracking-tighter leading-[0.9] mb-12">
                    CALIDAD <br/>
                    <span class="text-primary-dim">EN CADA ENTREGA.</span>
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mt-16">
                    <!-- Feature 1 -->
                    <div class="flex flex-col gap-4">
                        <span class="material-symbols-outlined text-primary text-5xl">precision_manufacturing</span>
                        <h4 class="text-xl font-black uppercase tracking-tight text-white">Estándares O.E.M.</h4>
                        <p class="text-stone-300 text-[12px] leading-relaxed font-bold uppercase tracking-tight">
                            Todas las piezas cumplen o superan las especificaciones del fabricante de equipo original para aplicaciones industriales críticas.
                        </p>
                    </div>
                    <!-- Feature 2 -->
                    <div class="flex flex-col gap-4">
                        <span class="material-symbols-outlined text-primary text-5xl">local_shipping</span>
                        <h4 class="text-xl font-black uppercase tracking-tight text-white">Logística Rápida</h4>
                        <p class="text-stone-300 text-[12px] leading-relaxed font-bold uppercase tracking-tight">
                            Distribución estratégica desde Valencia garantiza cobertura nacional y tiempo de inactividad mínimo para su flota.
                        </p>
                    </div>
                    <!-- Feature 3 -->
                    <div class="flex flex-col gap-4">
                        <span class="material-symbols-outlined text-primary text-5xl">verified</span>
                        <h4 class="text-xl font-black uppercase tracking-tight text-white">Soporte Experto</h4>
                        <p class="text-stone-300 text-[12px] leading-relaxed font-bold uppercase tracking-tight">
                            Nuestro equipo técnico proporciona consulta especializada para compatibilidad de motores y mantenimiento.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Scroll to Top Button -->
    <button
      id="scrollTopBtn"
      onclick="window.scrollTo({ top: 0, behavior: 'smooth' })"
      class="fixed bottom-8 right-8 bg-primary text-black p-4 shadow-xl hover:bg-white transition-all z-30 border border-black/10 hidden"
    >
      <span class="material-symbols-outlined font-black">arrow_upward</span>
    </button>

    <!-- PWA Install Button -->
    <div id="pwaInstallContainer" class="fixed bottom-8 left-8 z-30 hidden">
      <button
        id="pwaInstallBtn"
        class="bg-black text-primary px-6 py-4 rounded-lg shadow-xl hover:bg-stone-800 transition-all flex items-center gap-3 font-bold text-xs uppercase tracking-widest"
      >
        <span class="material-symbols-outlined text-primary">download</span>
        Instalar App
      </button>
    </div>
@endsection

@push('scripts')
    <script src="js/catalogo_general.js"></script>
@endpush
