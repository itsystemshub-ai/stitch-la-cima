@extends('layouts.ecommerce')

@section('title', 'Catálogo Detallado | Mayor de REPUESTO LA CIMA, C.A.')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/catalogo_detallado.css') }}">
@endpush

@section('content')
<main class="flex-grow pt-20 pb-12 px-6 lg:px-10 max-w-[1920px] mx-auto w-full">
    <div class="flex flex-col lg:flex-row gap-6">
        
        <!-- Sidebar Filters -->
        <aside class="w-full lg:w-72 flex-shrink-0">
            <form action="{{ url()->current() }}" method="GET" id="filterForm" class="space-y-6">
                @if(request('q'))
                    <input type="hidden" name="q" value="{{ request('q') }}">
                @endif
                <input type="hidden" name="view" value="{{ request('view', 'grid') }}">
                
                <div class="bg-white border border-outline p-5 rounded-[20px] shadow-sm">
                    <div class="flex justify-between items-center mb-5">
                        <h2 class="font-headline text-lg font-bold uppercase tracking-tighter flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary">filter_list</span>
                            Filtrado Técnico
                        </h2>
                    </div>
                    
                    <div class="space-y-5">
                        <!-- Categorías -->
                        <div>
                            <label class="font-headline text-[10px] font-black uppercase text-stone-400 block mb-3 tracking-[0.3em] italic">Sistemas / Categorías</label>
                            <div class="space-y-2.5 max-h-48 overflow-y-auto pr-2 custom-scrollbar">
                                @forelse($categories as $category)
                                    <label class="flex items-center gap-3 cursor-pointer group">
                                        <input class="w-4 h-4 rounded border-stone-200 text-primary focus:ring-primary/20" 
                                               type="checkbox" name="categories[]" value="{{ $category }}"
                                               {{ is_array(request('categories')) && in_array($category, request('categories')) ? 'checked' : '' }}
                                               onchange="this.form.submit()"/>
                                        <span class="text-[12px] font-black text-stone-900 group-hover:text-primary transition-colors uppercase tracking-tight">{{ $category }}</span>
                                    </label>
                                @empty
                                    <p class="text-[10px] text-stone-400 italic font-black uppercase tracking-widest">No hay categorías</p>
                                @endforelse
                            </div>
                        </div>

                        <!-- Marcas -->
                        <div>
                            <label class="font-headline text-[10px] font-black uppercase text-stone-400 block mb-4 tracking-[0.3em] italic text-stone-500">Fabricantes OEM</label>
                            <div class="space-y-3 max-h-64 overflow-y-auto pr-2 custom-scrollbar">
                                @forelse($brands as $brand)
                                    <label class="flex items-center gap-3 cursor-pointer group">
                                        <input class="w-4 h-4 rounded border-stone-200 text-primary focus:ring-primary/20" 
                                               type="checkbox" name="brands[]" value="{{ $brand }}"
                                               {{ is_array(request('brands')) && in_array($brand, request('brands')) ? 'checked' : '' }}
                                               onchange="this.form.submit()"/>
                                        <span class="text-[12px] font-black text-stone-900 group-hover:text-primary transition-colors uppercase tracking-tight">{{ $brand }}</span>
                                    </label>
                                @empty
                                    <p class="text-[10px] text-stone-400 italic font-black uppercase tracking-widest">No hay marcas</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Vista compacta: Botones Grid/List -->
                <div class="bg-stone-50 p-4 rounded-[20px] border border-outline">
                    <label class="text-[10px] font-black uppercase tracking-widest text-stone-400 block mb-3">Vista</label>
                    <div class="flex gap-2">
                        @php
                            $currentParams = request()->except(['view', 'page']);
                            $gridUrl = request()->fullUrlWithQuery(array_merge($currentParams, ['view' => 'grid']));
                            $listUrl = request()->fullUrlWithQuery(array_merge($currentParams, ['view' => 'list']));
                        @endphp
                        <a href="{{ $gridUrl }}" 
                           class="flex-1 text-center py-2 px-3 rounded-lg text-[11px] font-black uppercase tracking-widest transition-all {{ request('view', 'grid') === 'grid' ? 'bg-black text-white' : 'bg-white text-stone-500 hover:bg-stone-100' }}">
                            Cuadrada
                        </a>
                        <a href="{{ $listUrl }}" 
                           class="flex-1 text-center py-2 px-3 rounded-lg text-[11px] font-black uppercase tracking-widest transition-all {{ request('view', 'grid') === 'list' ? 'bg-black text-white' : 'bg-white text-stone-500 hover:bg-stone-100' }}">
                            Lista
                        </a>
                    </div>
                </div>

                <!-- Soporte Técnico Card -->
                <div class="bg-stone-950 text-white p-8 rounded-[32px] relative overflow-hidden group shadow-2xl border border-white/5">
                    <div class="relative z-10">
                        <h3 class="font-headline text-2xl font-black uppercase leading-none mb-3 text-primary italic">Soporte <br>Técnico</h3>
                        <p class="text-stone-500 text-[10px] font-black uppercase tracking-widest mb-6 leading-relaxed">Asistencia certificada para instalación industrial.</p>
                        <a href="{{ url('/tienda/contacto') }}" class="bg-primary/10 text-primary text-[9px] font-black uppercase tracking-[0.2em] px-4 py-2 rounded-lg border border-primary/20 flex items-center justify-center gap-2 group-hover:bg-primary group-hover:text-black transition-all">
                            Conectar con Ingeniero
                            <span class="material-symbols-outlined text-sm">engineering</span>
                        </a>
                    </div>
                    <div class="absolute -right-10 -bottom-10 opacity-[0.03] group-hover:scale-110 transition-transform duration-700 pointer-events-none">
                        <span class="material-symbols-outlined text-[180px]">settings_accessibility</span>
                    </div>
                </div>
            </form>
        </aside>

            <!-- Product Listing -->
            <section class="flex-grow">
                @php
                    $currentView = request('view', 'grid');
                @endphp
                
                @if($currentView === 'list')
                    <!-- VISTA LISTA: Compacta, SIN FOTO -->
                <div class="bg-white border border-outline rounded-[32px] overflow-hidden">
                    <table class="w-full text-left min-w-[800px]">
                        <thead class="bg-stone-50/80 border-b border-stone-200">
                            <tr class="text-[9px] font-black uppercase tracking-widest text-stone-400">
                                <th class="py-4 px-4">Referencia</th>
                                <th class="py-4 px-4">Descripción</th>
                                <th class="py-4 px-4">Marca</th>
                                <th class="py-4 px-4">Categoría</th>
                                <th class="py-4 px-4 text-center">Stock</th>
                                <th class="py-4 px-4 text-right">Precio</th>
                                <th class="py-4 px-4 text-center w-16">Cant.</th>
                                <th class="py-4 px-4 text-center w-16"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-stone-50">
                            @forelse($products as $product)
                            <tr class="hover:bg-stone-50/50 transition-all text-[12px]">
                                <td class="py-3 px-4">
                                    <span class="font-mono text-[10px] font-black text-black bg-stone-100 px-2 py-0.5 rounded">
                                        {{ $product->codigo_oem ?? 'N/A' }}
                                    </span>
                                </td>
                                <td class="py-3 px-4">
                                    <a href="{{ url('/tienda/producto/' . $product->id) }}" class="font-black text-stone-900 hover:text-primary transition-colors line-clamp-1">
                                        {{ $product->nombre }}
                                    </a>
                                </td>
                                <td class="py-3 px-4">
                                    <span class="text-stone-600 font-bold uppercase">{{ $product->marca ?? '-' }}</span>
                                </td>
                                <td class="py-3 px-4">
                                    <span class="text-[10px] text-stone-500">{{ $product->categoria ?? '-' }}</span>
                                </td>
                                <td class="py-3 px-4 text-center">
                                    <span class="inline-flex items-center gap-1">
                                        <span class="w-2 h-2 rounded-full bg-green-500"></span>
                                        <span class="text-stone-600 text-[11px]">Disponible</span>
                                    </span>
                                </td>
                                <td class="py-3 px-4 text-right">
                                    <span class="font-headline font-black text-stone-900">
                                        ${{ number_format($product->precio_mayor ?? 0, 2) }}
                                    </span>
                                </td>
                                <td class="py-3 px-4 text-center">
                                    <input type="number" value="1" min="1" 
                                           class="w-14 h-7 text-center bg-stone-100 border border-stone-200 rounded text-[11px] font-bold focus:ring-1 focus:ring-primary focus:outline-none"
                                           onchange="this.value = this.value || 1;">
                                </td>
                                <td class="py-3 px-4 text-center">
                                    <button class="w-8 h-8 bg-primary text-white rounded-lg flex items-center justify-center hover:bg-stone-800 transition-all" 
                                            onclick="addToCartList({{ $product->id }}, '{{ addslashes($product->nombre) }}', {{ $product->precio_mayor ?? 0 }}, this.closest('tr').querySelector('input').value)"
                                            title="Agregar al carrito">
                                        <span class="material-symbols-outlined text-sm">shopping_cart</span>
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="py-20 text-center">
                                    <span class="material-symbols-outlined text-4xl text-stone-200 mb-4 block">inventory_2</span>
                                    <p class="text-stone-500 font-black uppercase tracking-widest">No se encontraron productos</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                <!-- Paginación lista -->
                <div class="mt-8 flex justify-center">
                    {{ $products->appends(request()->except('page'))->links() }}
                </div>

            @else
                <!-- VISTA GRID: Cuadrada con galería -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6" id="productGrid">
                    @forelse($products as $product)
                    <article class="bg-white border border-outline rounded-[24px] overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group cursor-pointer" 
                             onclick="window.location.href='{{ url('/tienda/producto/' . $product->id) }}'">
                        
                        <!-- Galería de imágenes -->
                        <div class="aspect-square bg-stone-50 relative overflow-hidden">
                            @php
                                $images = [];
                                if($product->imagen_url) $images[] = $product->imagen_url;
                                if($product->imagen_galeria) {
                                    $extra = explode(',', $product->imagen_galeria);
                                    $images = array_merge($images, $extra);
                                }
                                if(empty($images)) $images[] = asset('assets/images/default-product.png');
                                $totalImgs = count($images);
                                $hasMultiple = $totalImgs > 1;
                            @endphp
                            
                            @foreach($images as $idx => $img)
                                <img src="{{ $img }}" 
                                     alt="{{ $product->nombre }}"
                                     class="w-full h-full object-contain transition-opacity duration-500 absolute inset-0 {{ $idx === 0 ? 'opacity-100' : 'opacity-0' }}" />
                            @endforeach
                            
                            <!-- Badges -->
                            <div class="absolute top-3 left-3 flex gap-2">
                                @if($hasMultiple)
                                    <span class="bg-black/60 backdrop-blur text-white text-[9px] font-black px-2 py-0.5 rounded flex items-center gap-1">
                                        <span class="material-symbols-outlined text-[10px]">image</span>
                                        {{ $totalImgs }}
                                    </span>
                                @endif
                                @if($product->created_at && $product->created_at->diffInDays(now()) < 15)
                                    <span class="bg-primary text-stone-900 text-[9px] font-black px-2 py-0.5 rounded">NUEVO</span>
                                @endif
                            </div>
                            
                            <!-- Controles galería -->
                            @if($hasMultiple)
                                <button class="nav-prev absolute left-2 top-1/2 -translate-y-1/2 w-7 h-7 bg-black/50 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all hover:bg-black z-10" onclick="event.stopPropagation(); navigateProductImg(this, -1)">
                                    <span class="material-symbols-outlined text-white text-sm">chevron_left</span>
                                </button>
                                <button class="nav-next absolute right-2 top-1/2 -translate-y-1/2 w-7 h-7 bg-black/50 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all hover:bg-black z-10" onclick="event.stopPropagation(); navigateProductImg(this, 1)">
                                    <span class="material-symbols-outlined text-white text-sm">chevron_right</span>
                                </button>
                                <div class="absolute bottom-3 left-1/2 -translate-x-1/2 flex gap-1">
                                    @for($i = 0; $i < $totalImgs; $i++)
                                        <span class="w-1.5 h-1.5 rounded-full bg-white/{{ $i === 0 ? '100' : '30' }}"></span>
                                    @endfor
                                </div>
                            @endif
                        </div>
                        
                        <!-- Info -->
                        <div class="p-4">
                            <span class="text-[9px] font-mono font-black text-black bg-stone-100 px-2 py-0.5 rounded">
                                {{ $product->codigo_oem ?? 'N/A' }}
                            </span>
                            <h3 class="text-[13px] font-black text-stone-900 mt-2 leading-tight line-clamp-2 group-hover:text-primary transition-colors">
                                {{ $product->nombre }}
                            </h3>
                            <div class="flex items-center gap-2 mt-2 text-[10px] text-stone-500">
                                <span>{{ $product->categoria ?? '-' }}</span>
                                <span>•</span>
                                <span>{{ $product->marca ?? '-' }}</span>
                            </div>
                            <div class="mt-3 flex items-center justify-between">
                                <span class="text-lg font-headline font-black text-stone-900">
                                    ${{ number_format($product->precio_mayor ?? 0, 2) }}
                                </span>
                                <button class="w-8 h-8 bg-primary text-white rounded-lg flex items-center justify-center hover:bg-stone-800 transition-all" onclick="event.stopPropagation();">
                                    <span class="material-symbols-outlined text-sm">add</span>
                                </button>
                            </div>
                        </div>
                    </article>
                    @empty
                    <div class="col-span-full py-20 text-center">
                        <span class="material-symbols-outlined text-5xl text-stone-200 mb-6 block">inventory_2</span>
                        <p class="text-stone-500 font-black uppercase tracking-widest">Sin productos disponibles</p>
                    </div>
                    @endforelse
                </div>
                
                <!-- Paginación grid -->
                <div class="mt-12 flex justify-center">
                    {{ $products->appends(request()->except('page'))->links() }}
                </div>
            @endif
        </section>
    </div>
</main>
@endsection

@push('scripts')
<script>
// Navegación de imágenes en cards
function navigateProductImg(btn, direction) {
    const card = btn.closest('.group');
    const images = card.querySelectorAll('.aspect-square > img');
    const dots = card.querySelectorAll('.absolute.bottom-3 span');
    let current = -1;
    
    images.forEach((img, idx) => {
        if (img.classList.contains('opacity-100')) current = idx;
    });
    
    const next = (current + direction + images.length) % images.length;
    
    images.forEach(img => img.classList.replace('opacity-100', 'opacity-0'));
    images[next].classList.replace('opacity-0', 'opacity-100');
    
    dots.forEach((dot, idx) => {
        dot.classList.toggle('bg-white', idx === next);
        dot.classList.toggle('bg-white/30', idx !== next);
    });
}

// Función para agregar al carrito desde la vista LISTA
function addToCartList(productId, productName, price, qty) {
    fetch('/api/tienda/carrito', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            product_id: productId,
            cantidad: qty
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            alert(productName + ' agregado al carrito');
            const badge = document.getElementById('cart-count');
            if (badge) badge.textContent = data.cart_count;
        } else {
            alert('Error: ' + (data.message || 'No se pudo agregar'));
        }
    })
    .catch(err => {
        console.error('Error:', err);
        alert('Error técnico al agregar al carrito.');
    });
}
</script>
@endpush
