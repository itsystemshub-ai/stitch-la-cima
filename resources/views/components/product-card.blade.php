@props(['product'])

<article class="bg-white border border-outline group overflow-hidden shadow-sm hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 relative" data-category="{{ strtolower($product->categoria ?? 'general') }}">
    <!-- Whole card link (except cart button) -->
    <a href="{{ url('/tienda/producto/' . $product->id) }}" class="block absolute inset-0 z-10" aria-label="Ver detalles de {{ $product->nombre }}"></a>
    
    <div class="relative aspect-square overflow-hidden bg-stone-50 p-6 flex items-center justify-center">
        @php
            $images = [];
            if ($product->imagen_url) {
                $images[] = $product->imagen_url;
            }
            $hasMultiple = false; // Por defecto una sola imagen
        @endphp
        
        @foreach($images as $index => $img)
            <img src="{{ $img }}" 
                 alt="{{ $product->nombre }}" 
                 loading="lazy"
                 class="w-full h-full object-contain mix-blend-multiply transition-transform duration-700 group-hover:scale-110" />
        @endforeach
        
        @if($product->created_at && $product->created_at->diffInDays(now()) < 15)
        <div class="absolute top-4 left-4 bg-primary text-stone-900 text-[9px] font-black uppercase tracking-[0.2em] px-2 py-1 shadow-md flex items-center gap-1">
            <span class="material-symbols-outlined text-[10px]">new_releases</span>
            Incorporado
        </div>
        @endif
    </div>
    
    <div class="p-4 relative z-20">
        <div class="flex justify-between gap-2 items-start mb-2.5">
            <span class="text-[10px] font-mono font-black text-primary uppercase tracking-widest bg-stone-900 px-2 py-1 shadow-sm rounded-sm min-w-0 break-words">{{ $product->codigo_oem ?? 'PROTOCOL_NA' }}</span>
            <span class="text-[9px] font-black text-stone-500 bg-stone-50 px-2 py-1 rounded border border-stone-100 uppercase tracking-widest text-right min-w-0 break-words">{{ $product->categoria ?? 'MASTER_PART' }}</span>
        </div>
        <h3 class="text-[13px] font-headline font-black uppercase tracking-tight mb-3 text-stone-900 leading-tight italic line-clamp-2" title="{{ $product->nombre }}">
            {{ $product->nombre }}
        </h3>
        <div class="mb-4 bg-stone-50/50 p-3 rounded-lg border border-stone-100/50">
            <p class="text-xl font-headline font-black text-stone-900 tracking-tighter flex items-start gap-0.5">
                <span class="text-[10px] mt-0.5 font-bold">$</span>
                <span class="font-mono tracking-tight">{{ number_format($product->precio_mayor ?? 0, 2) }}</span>
            </p>
        </div>
        <div class="flex items-center gap-2">
            <div class="flex flex-1 items-center bg-stone-950 rounded-lg p-1 h-10 border border-stone-800 shadow-md">
                <button type="button" class="w-7 h-7 flex items-center justify-center rounded-md hover:bg-stone-800 text-stone-400 transition-all active:scale-90" onclick="this.parentNode.querySelector('input').stepDown()">
                    <span class="material-symbols-outlined text-xs font-black">remove</span>
                </button>
                <input type="number" value="1" min="1" 
                       class="w-full bg-transparent border-none focus:ring-0 font-black text-[12px] p-0 text-center text-white [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none" 
                       placeholder="1" />
                <button type="button" class="w-7 h-7 flex items-center justify-center rounded-md hover:bg-stone-800 text-stone-400 transition-all active:scale-90" onclick="this.parentNode.querySelector('input').stepUp()">
                    <span class="material-symbols-outlined text-xs font-black">add</span>
                </button>
            </div>

            <button onclick="event.stopPropagation(); Cart.add({{ $product->id }}, '{{ addslashes($product->nombre) }}', {{ $product->precio_mayor ?? 0 }}, '{{ $product->imagen_url ?? '' }}', '{{ $product->categoria ?? '' }}', this.closest('div').querySelector('input').value)"
                    class="w-10 h-10 bg-primary text-stone-900 hover:bg-stone-950 hover:text-primary rounded-lg font-black flex items-center justify-center transition-all cursor-pointer shadow-lg active:scale-90 group/btn z-20 relative"
                    title="Adquirir item">
                <span class="material-symbols-outlined text-lg transition-transform group-hover/btn:rotate-12">add_shopping_cart</span>
            </button>
        </div>
    </div>
</article>

<script>
// Script de navegación de galería para esta tarjeta
document.addEventListener('DOMContentLoaded', function() {
    const card = document.currentScript.parentElement.querySelector('.bg-white[border]');
    const images = card ? card.querySelectorAll('img') : [];
    const dots = card ? card.querySelectorAll('[data-dot]') : [];
    const prevBtn = card ? card.querySelector('.nav-prev') : null;
    const nextBtn = card ? card.querySelector('.nav-next') : null;
    let currentIndex = 0;

    function showImage(index) {
        images.forEach((img, i) => {
            img.classList.toggle('opacity-100', i === index);
            img.classList.toggle('opacity-0', i !== index);
            img.classList.toggle('absolute', i !== index);
        });
        dots.forEach((dot, i) => {
            dot.classList.toggle('bg-white', i === index);
            dot.classList.toggle('bg-white/50', i !== index);
        });
        currentIndex = index;
    }

    if (prevBtn && nextBtn && images.length > 1) {
        prevBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            const newIndex = (currentIndex - 1 + images.length) % images.length;
            showImage(newIndex);
        });
        nextBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            const newIndex = (currentIndex + 1) % images.length;
            showImage(newIndex);
        });
        dots.forEach((dot, index) => {
            dot.addEventListener('click', (e) => {
                e.stopPropagation();
                showImage(index);
            });
        });
    }
});
</script>
