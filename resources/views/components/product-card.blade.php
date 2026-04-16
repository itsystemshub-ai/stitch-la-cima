@props(['product'])

<article class="bg-white border border-outline group overflow-hidden shadow-sm hover:shadow-2xl hover:-translate-y-1 transition-all duration-300" data-category="{{ strtolower($product->categoria ?? 'general') }}">
    <a href="{{ url('/tienda/producto/' . $product->id) }}" class="block">
        <div class="relative aspect-square overflow-hidden bg-stone-50 p-8 flex items-center justify-center">
            <img
                src="{{ $product->imagen_url ?? asset('assets/images/default-product.png') }}"
                alt="{{ $product->nombre }}"
                loading="lazy"
                class="w-full h-full object-contain mix-blend-multiply transition-transform duration-700 group-hover:scale-110"
            />
            @if($product->stock_actual > 0)
            <div class="absolute top-4 right-4 bg-black text-primary text-[9px] font-black uppercase tracking-[0.2em] px-2 py-1 shadow-md">
                En Stock
            </div>
            @else
            <div class="absolute top-4 right-4 bg-red-600 text-white text-[9px] font-black uppercase tracking-[0.2em] px-2 py-1 shadow-md">
                Agotado
            </div>
            @endif
        </div>
    </a>
    <div class="p-6">
        <div class="flex justify-between items-start mb-2">
            <span class="text-[10px] font-black text-primary uppercase tracking-widest">{{ $product->categoria ?? 'Repuesto' }}</span>
            <span class="text-[10px] font-mono font-bold text-stone-400">#{{ $product->codigo_oem ?? 'N/A' }}</span>
        </div>
        <a href="{{ url('/tienda/producto/' . $product->id) }}" class="block">
            <h3 class="text-xl font-black uppercase tracking-tight mb-4 group-hover:text-primary transition-colors line-clamp-2" title="{{ $product->nombre }}">
                {{ $product->nombre }}
            </h3>
        </a>
        <div class="mb-6">
            <p class="text-3xl font-black text-black tracking-tighter">
                ${{ number_format($product->precio_mayor ?? 0, 2) }}
            </p>
            <p class="text-[10px] font-bold text-stone-400 uppercase tracking-widest">
                Bs. {{ number_format(($product->precio_mayor ?? 0) * 36.0, 2) }} aprox.
            </p>
        </div>
        <button
            @if($product->stock_actual > 0)
                onclick="addToCart({{ $product->id }}, '{{ addslashes($product->nombre) }}', {{ $product->precio_mayor ?? 0 }}, '{{ $product->imagen_url ?? '' }}', '{{ $product->categoria ?? '' }}')"
                class="w-full bg-black text-white hover:bg-primary hover:text-black py-4 font-black uppercase text-[10px] tracking-[0.2em] flex items-center justify-center gap-3 transition-all cursor-pointer"
            @else
                disabled
                class="w-full bg-stone-300 text-stone-500 py-4 font-black uppercase text-[10px] tracking-[0.2em] flex items-center justify-center gap-3 cursor-not-allowed"
            @endif
        >
            <span class="material-symbols-outlined text-lg">{{ $product->stock_actual > 0 ? 'add_shopping_cart' : 'remove_shopping_cart' }}</span>
            {{ $product->stock_actual > 0 ? 'Agregar al Carrito' : 'Sin Disponibilidad' }}
        </button>
    </div>
</article>
