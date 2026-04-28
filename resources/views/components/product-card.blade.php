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
        <div class="flex justify-between items-center mb-3">
            <span class="text-[9px] font-black text-primary uppercase tracking-[0.2em] bg-stone-900 px-2 py-0.5 shadow-sm">{{ $product->categoria ?? 'MASTER_PART' }}</span>
            <span class="text-[10.5px] font-mono font-bold text-stone-400 bg-stone-50 px-2 py-0.5 rounded border border-stone-100">OEM: {{ $product->codigo_oem ?? 'PROTOCOL_NA' }}</span>
        </div>
        <a href="{{ url('/tienda/producto/' . $product->id) }}" class="block">
            <h3 class="text-xl font-headline font-black uppercase tracking-tighter mb-4 group-hover:text-primary transition-colors line-clamp-2 leading-none italic" title="{{ $product->nombre }}">
                {{ $product->nombre }}
            </h3>
        </a>
        <div class="mb-6 bg-stone-50/50 p-4 rounded-xl border border-stone-100/50">
            <p class="text-3xl font-headline font-black text-stone-900 tracking-tighter flex items-start gap-1">
                <span class="text-sm mt-1">$</span>
                <span class="font-mono tracking-tight">{{ number_format($product->precio_mayor ?? 0, 2) }}</span>
            </p>
            <p class="text-[10.5px] font-bold text-stone-400 uppercase tracking-widest mt-1 flex items-center gap-1 italic">
                <span class="material-symbols-outlined text-[10px]">currency_exchange</span>
                Ref. Bs. {{ number_format(($product->precio_mayor ?? 0) * 36.0, 2) }}
            </p>
        </div>
        <div class="flex items-center gap-2">
            <!-- Selector de Cantidad Industrial -->
            <div class="flex items-center bg-stone-900 rounded-xl p-1 h-12 border border-stone-800 shadow-lg">
                <button type="button" class="w-8 h-8 flex items-center justify-center rounded-lg hover:bg-stone-800 text-stone-400 transition-all active:scale-90" onclick="this.parentNode.querySelector('input').stepDown()">
                    <span class="material-symbols-outlined text-sm font-black">remove</span>
                </button>
                <input type="number" value="1" min="1" class="w-8 text-center bg-transparent border-none focus:ring-0 font-black text-[12px] p-0 appearance-none pointer-events-none text-white" readonly />
                <button type="button" class="w-8 h-8 flex items-center justify-center rounded-lg hover:bg-stone-800 text-stone-400 transition-all active:scale-90" onclick="this.parentNode.querySelector('input').stepUp()">
                    <span class="material-symbols-outlined text-sm font-black">add</span>
                </button>
            </div>

            <button
                @if($product->stock_actual > 0)
                    onclick="Cart.add({{ $product->id }}, '{{ addslashes($product->nombre) }}', {{ $product->precio_mayor ?? 0 }}, '{{ $product->imagen_url ?? '' }}', '{{ $product->categoria ?? '' }}', this.previousElementSibling.querySelector('input').value)"
                    class="flex-1 bg-primary text-stone-900 hover:bg-white hover:text-stone-900 h-12 px-3 rounded-xl font-black uppercase text-[10px] tracking-[0.15em] flex items-center justify-center gap-2 transition-all cursor-pointer shadow-xl shadow-primary/10 active:scale-95 group/btn"
                @else
                    disabled
                    class="flex-1 bg-stone-100 text-stone-300 h-12 px-3 rounded-xl font-black uppercase text-[10px] tracking-widest flex items-center justify-center gap-2 cursor-not-allowed border border-stone-200"
                @endif
            >
                <span class="material-symbols-outlined text-lg transition-transform group-hover/btn:rotate-12">{{ $product->stock_actual > 0 ? 'add_shopping_cart' : 'block' }}</span>
                {{ $product->stock_actual > 0 ? 'Adquirir' : 'Agotado' }}
            </button>
        </div>
    </div>
</article>
