@extends('layouts.ecommerce')

@section('title')
    <title id="pageTitle">Detalle del Producto | MAYOR DE REPUESTO LA CIMA, C.A.</title>
@endsection

@push('styles')
    <link rel="stylesheet" href="css/detalle_productos.css">
    <style>
        .industrial-gradient {
            background: linear-gradient(180deg, #ceff5e 0%, #ceff5e 100%);
        }
        .glass-nav {
            backdrop-filter: blur(20px);
        }
    </style>
@endpush

@section('content')
<!-- Premium Product Detail Main -->
<main class="pt-20 pb-16 bg-stone-50">
    <div class="max-w-[1920px] mx-auto px-6 md:px-12">
        <!-- Breadcrumb -->
        <nav class="mb-8 flex items-center gap-2 text-[10px] font-black uppercase tracking-[0.2em] text-stone-500">
            <a href="{{ url('/tienda/index') }}" class="hover:text-primary transition-colors flex items-center gap-1">
                <span class="material-symbols-outlined text-sm">home</span> Inicio
            </a>
            <span class="material-symbols-outlined text-xs">chevron_right</span>
            <a href="{{ url('/tienda/catalogo_general') }}" class="hover:text-primary transition-colors">Catálogo</a>
            <span class="material-symbols-outlined text-xs">chevron_right</span>
            <span class="text-stone-900">{{ $product->marca ?? 'CUMMINS' }}</span>
            <span class="material-symbols-outlined text-xs">chevron_right</span>
            <span class="text-black">{{ Str::limit($product->nombre, 20) }}</span>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16">
            <!-- Left Column: High-Res Imagery Gallery -->
            <div class="lg:col-span-7 space-y-6">
                <!-- Main Image with Gallery Navigation -->
                <div class="relative aspect-[4/3] bg-white border border-stone-200 rounded-2xl overflow-hidden group">
                    @php
                        $imgUrls = [];
                        if($product->imagen_url) $imgUrls[] = $product->imagen_url;
                        if($product->imagen_galeria) {
                            $extra = explode(',', $product->imagen_galeria);
                            $imgUrls = array_merge($imgUrls, $extra);
                        }
                        if(empty($imgUrls)) $imgUrls[] = asset('assets/images/default-product.png');
                        $totalImgs = count($imgUrls);
                    @endphp
                    
                    @foreach($imgUrls as $idx => $imgUrl)
                        <img src="{{ $imgUrl }}" alt="{{ $product->nombre }} - {{ $idx + 1 }}" 
                             class="w-full h-full object-contain transition-transform duration-700 group-hover:scale-105 {{ $idx === 0 ? 'block' : 'hidden' }}" 
                             id="prod-img-{{ $idx }}" />
                    @endforeach
                    
                    <div class="absolute top-6 left-6 flex gap-3">
                        <span class="bg-primary text-black text-[10px] font-black uppercase tracking-widest px-4 py-2 rounded-full">OEM Genuine Quality</span>
                        @if($product->created_at && $product->created_at->diffInDays(now()) < 15)
                        <span class="bg-black text-primary px-4 py-2 text-[10px] font-black uppercase tracking-widest rounded-full">NUEVO INGRESO</span>
                        @endif
                    </div>
                    
                    @if($totalImgs > 1)
                        <!-- Nav Circles -->
                        <button type="button" class="absolute left-3 top-1/2 -translate-y-1/2 w-8 h-8 bg-black/50 hover:bg-black/70 rounded-full flex items-center justify-center transition-all opacity-0 group-hover:opacity-100 z-20" onclick="navigateImage(-1, {{ $totalImgs }})" aria-label="Imagen anterior">
                            <span class="material-symbols-outlined text-white text-sm">chevron_left</span>
                        </button>
                        <button type="button" class="absolute right-3 top-1/2 -translate-y-1/2 w-8 h-8 bg-black/50 hover:bg-black/70 rounded-full flex items-center justify-center transition-all opacity-0 group-hover:opacity-100 z-20" onclick="navigateImage(1, {{ $totalImgs }})" aria-label="Imagen siguiente">
                            <span class="material-symbols-outlined text-white text-sm">chevron_right</span>
                        </button>
                        <!-- Dots Indicator -->
                        <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex gap-2">
                            @for($i = 0; $i < $totalImgs; $i++)
                                <button type="button" class="gallery-dot w-2 h-2 rounded-full {{ $i === 0 ? 'bg-white' : 'bg-white/50' }} hover:bg-white transition-all" onclick="goToImage({{ $i }}, {{ $totalImgs }})"></button>
                            @endfor
                        </div>
                    @endif
                </div>
            </div>

            <!-- Right Column: Commercial Details & Purchase -->
            <div class="lg:col-span-5 flex flex-col">
                <div class="flex items-center gap-3 mb-4">
                    <span class="text-primary text-[10px] font-black uppercase tracking-[0.4em] bg-primary/10 px-3 py-1 rounded-full">
                        {{ strtoupper($product->marca ?? 'GENERAL') }}
                    </span>
                    <span class="flex items-center gap-1 text-green-600 text-[10px] font-black uppercase tracking-widest">
                        <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                        En Stock
                    </span>
                </div>

                <h1 id="productTitle" class="text-3xl md:text-4xl font-black text-black uppercase tracking-tighter leading-[0.95] mb-4">
                    {{ $product->nombre }}
                </h1>

                <div class="flex items-center gap-4 mb-8 pb-6 border-b border-stone-200">
                    <div class="bg-stone-100 px-3 py-1 rounded text-[12px] font-black uppercase tracking-wider text-black">
                        SKU: <span id="productSku">{{ $product->codigo_oem ?? 'N/A' }}</span>
                    </div>
                    @if($product->created_at && $product->created_at->diffInDays(now()) < 15)
                    <div class="flex items-center gap-1 text-primary font-black uppercase tracking-widest">
                        <span class="material-symbols-outlined text-sm">new_releases</span>
                        Nuevo Ingreso
                    </div>
                    @endif
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-md border border-stone-200 mb-8">
                    <div class="flex flex-col mb-6">
                        <span class="text-stone-500 text-sm font-medium uppercase tracking-widest mb-1">Precio Mayorista</span>
                        <div class="flex items-baseline gap-3">
                            <span id="productPrice" class="text-4xl font-headline font-black text-stone-950 tracking-tighter italic leading-none">
                                ${{ number_format($product->precio_mayor ?? 0, 2) }}
                            </span>
                        </div>
                        <p class="text-xs text-stone-500 mt-2 italic">Impuestos y envío calculados al finalizar</p>
                    </div>

                    <div class="flex flex-col gap-4">
                        <label class="text-xs font-bold text-stone-700 uppercase tracking-widest">Cantidad</label>
                        <div class="flex gap-4">
                            <div class="flex items-center bg-stone-950 rounded-xl p-1.5 border border-stone-800 shadow-md">
                                <button type="button" onclick="this.parentNode.querySelector('input').stepDown()" class="w-8 h-8 flex items-center justify-center text-stone-400 hover:text-white transition-all active:scale-75">
                                    <span class="material-symbols-outlined text-sm font-black">remove</span>
                                </button>
                                <input type="number" id="quantity" value="1" min="1" 
                                       data-price="{{ $product->precio_mayor ?? 0 }}"
                                       oninput="updateRowTotal(this)"
                                       class="w-12 bg-transparent border-none text-center text-white text-[14px] font-black [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none focus:ring-0" />
                                <button type="button" onclick="this.parentNode.querySelector('input').stepUp()" class="w-8 h-8 flex items-center justify-center text-stone-400 hover:text-white transition-all active:scale-75">
                                    <span class="material-symbols-outlined text-sm font-black">add</span>
                                </button>
                            </div>
                            <button onclick="addToCart()" 
                                    class="flex-1 industrial-gradient text-black font-headline font-black uppercase tracking-[0.2em] text-xs py-4 px-8 rounded-xl shadow-lg hover:bg-stone-800 transition-all flex items-center justify-center gap-3">
                                <span class="material-symbols-outlined">shopping_bag</span>
                                Agregar al Carrito
                            </button>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4 mb-8">
                    <div class="flex items-center gap-3 bg-white p-4 rounded-xl border border-stone-200">
                        <div class="w-10 h-10 rounded-full bg-stone-50 flex items-center justify-center">
                            <span class="material-symbols-outlined text-stone-600">local_shipping</span>
                        </div>
                        <div>
                            <p class="text-xs font-bold uppercase text-stone-900">Envío Nacional</p>
                            <p class="text-[10px] text-stone-500">24-48 horas</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 bg-white p-4 rounded-xl border border-stone-200">
                        <div class="w-10 h-10 rounded-full bg-stone-50 flex items-center justify-center">
                            <span class="material-symbols-outlined text-stone-600">verified_user</span>
                        </div>
                        <div>
                            <p class="text-xs font-bold uppercase text-stone-900">Garantía 12 Meses</p>
                            <p class="text-[10px] text-stone-500">Fabricante Directo</p>
                        </div>
                    </div>
                </div>

                <div class="bg-stone-900 text-white p-6 rounded-xl relative overflow-hidden">
                    <div class="relative z-10">
                        <h4 class="text-lg font-headline font-bold uppercase mb-2">¿Necesita Soporte Técnico?</h4>
                        <p class="text-sm text-stone-400 mb-4 max-w-xs">Nuestro equipo está disponible para confirmación de torque y secuencia de montaje.</p>
                        <a href="{{ url('/tienda/contacto') }}" class="inline-block bg-primary text-black px-6 py-2 text-[10px] font-black uppercase tracking-widest rounded hover:bg-white transition-all">
                            Hablar con Ingeniero
                        </a>
                    </div>
                    <span class="material-symbols-outlined absolute right-[-10px] bottom-[-10px] text-white/5 text-[100px] pointer-events-none">engineering</span>
                </div>
            </div>
        </div>

        <!-- Technical Specifications -->
        <div class="mt-20 border-t border-stone-200 pt-16">
            <div class="flex gap-12 border-b border-stone-200 mb-12">
                <button class="pb-4 border-b-2 border-primary text-black font-headline font-bold uppercase tracking-widest text-sm">Especificaciones Técnicas</button>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
                <div>
                    <h3 class="text-xl font-headline font-bold uppercase tracking-tight mb-8 text-stone-900">Ficha Técnica</h3>
                    <div class="overflow-hidden rounded-lg border border-stone-200 bg-white">
                        <table class="w-full text-left">
                            <tbody class="text-sm">
                                <tr class="bg-stone-50 border-b border-stone-100">
                                    <td class="px-6 py-4 font-bold uppercase text-stone-500 text-xs tracking-wider">Material</td>
                                    <td class="px-6 py-4 text-stone-900">{{ $product->material ?? 'No especificado' }}</td>
                                </tr>
                                <tr class="bg-white border-b border-stone-100">
                                    <td class="px-6 py-4 font-bold uppercase text-stone-500 text-xs tracking-wider">Espesor</td>
                                    <td class="px-6 py-4 text-stone-900">{{ $product->espesor ?? 'No especificado' }}</td>
                                </tr>
                                <tr class="bg-stone-50 border-b border-stone-100">
                                    <td class="px-6 py-4 font-bold uppercase text-stone-500 text-xs tracking-wider">Peso</td>
                                    <td class="px-6 py-4 text-stone-900">{{ $product->peso ?? 'No especificado' }}</td>
                                </tr>
                                <tr class="bg-white border-b border-stone-100">
                                    <td class="px-6 py-4 font-bold uppercase text-stone-500 text-xs tracking-wider">Fabricante</td>
                                    <td class="px-6 py-4 text-stone-900">{{ $product->fabricante ?? 'No especificado' }}</td>
                                </tr>
                                <tr class="bg-stone-50">
                                    <td class="px-6 py-4 font-bold uppercase text-stone-500 text-xs tracking-wider">Categoría</td>
                                    <td class="px-6 py-4 text-stone-900">{{ $product->categoria ?? 'General' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Compatibility List -->
                <div>
                    <h3 class="text-xl font-headline font-bold uppercase tracking-tight mb-8 text-stone-900">Compatibilidad de Motor</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-stone-50 p-4 rounded-xl border-l-4 border-primary">
                            <p class="text-xs font-bold text-stone-500 uppercase mb-1">Marca</p>
                            <p class="text-sm font-medium text-stone-900">{{ $product->marca ?? 'Universal' }}</p>
                        </div>
                        <div class="bg-stone-50 p-4 rounded-xl border-l-4 border-primary">
                            <p class="text-xs font-bold text-stone-500 uppercase mb-1">Categoría</p>
                            <p class="text-sm font-medium text-stone-900">{{ $product->categoria ?? 'Industrial' }}</p>
                        </div>
                        <div class="bg-stone-50 p-4 rounded-xl border-l-4 border-primary">
                            <p class="text-xs font-bold text-stone-500 uppercase mb-1">Años</p>
                            <p class="text-sm font-medium text-stone-900">2000 - 2024</p>
                        </div>
                        <div class="bg-stone-50 p-4 rounded-xl border-l-4 border-primary">
                            <p class="text-xs font-bold text-stone-500 uppercase mb-1">Aplicación</p>
                            <p class="text-sm font-medium text-stone-900">Motores Diésel</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Products -->
        <div class="mt-24">
            <h3 class="text-2xl font-headline font-bold uppercase tracking-tight mb-12 text-stone-900">Repuestos Complementarios</h3>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                @foreach($relatedProducts as $related)
                <div class="bg-white border border-stone-200 rounded-xl p-6 group hover:shadow-lg transition-all cursor-pointer" 
                     onclick="window.location.href='{{ url('/tienda/producto/' . $related->id) }}'">
                    <div class="aspect-square bg-stone-50 rounded-lg mb-4 flex items-center justify-center overflow-hidden">
                        @if($related->imagen_url)
                        <img src="{{ $related->imagen_url }}" alt="{{ $related->nombre }}" 
                             class="w-full h-full object-contain group-hover:scale-110 transition-transform duration-500">
                        @else
                        <span class="material-symbols-outlined text-stone-200 text-3xl">inventory_2</span>
                        @endif
                    </div>
                    <h4 class="text-xs font-black uppercase tracking-tight text-stone-900 line-clamp-2 leading-tight mb-2">{{ $related->nombre }}</h4>
                    <p class="text-sm font-headline font-black text-primary tracking-tighter">
                        ${{ number_format($related->precio_mayor ?? 0, 2) }}
                    </p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</main>
@endsection

@push('scripts')
<script>
let currentImgIndex = 0;

function navigateImage(direction, total) {
    currentImgIndex = (currentImgIndex + direction + total) % total;
    updateImageDisplay(total);
}

function goToImage(index, total) {
    currentImgIndex = index;
    updateImageDisplay(total);
}

function updateImageDisplay(total) {
    // Hide all images
    for (let i = 0; i < total; i++) {
        const img = document.getElementById('prod-img-' + i);
        if (img) {
            img.classList.add('hidden');
            img.classList.remove('block');
        }
    }
    // Show current
    const currentImg = document.getElementById('prod-img-' + currentImgIndex);
    if (currentImg) {
        currentImg.classList.remove('hidden');
        currentImg.classList.add('block');
    }
    // Update dots
    const dots = document.querySelectorAll('.gallery-dot');
    dots.forEach((dot, index) => {
        dot.classList.toggle('bg-white', index === currentImgIndex);
        dot.classList.toggle('bg-white/50', index !== currentImgIndex);
    });
}

function addToCart() {
    const qty = document.getElementById('quantity').value;
    const productName = "{{ addslashes($product->nombre) }}";
    
    fetch('/api/tienda/carrito', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            product_id: {{ $product->id }},
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
