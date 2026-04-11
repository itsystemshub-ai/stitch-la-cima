@extends('layouts.ecommerce')

@section('title', 'Carrito | Mayor de Repuesto LA CIMA, C.A.')

@push('styles')
    <link rel="stylesheet" href="/frontend/public/ecommerce/css/carrito.css">
@endpush

@section('content')
<main class="flex-grow w-full max-w-screen-2xl mx-auto px-6 md:px-12 pt-32 pb-24 relative z-10">
    <!-- Page Header -->
    <div class="mb-16">
        <h1 class="text-6xl font-black text-black uppercase tracking-tighter leading-none mb-4 italic">Carrito de <span class="text-primary italic">Compras</span></h1>
        <p class="text-[10px] font-black text-on-surface-variant uppercase tracking-[0.4em]">Revisa tu inventario de repuestos industriales</p>
    </div>

    <!-- Empty Cart Message (shown when cart is empty) -->
    <div id="emptyCartMessage" class="hidden cart-empty text-center py-24">
        <span class="material-symbols-outlined text-8xl text-stone-300 mb-8">shopping_cart_off</span>
        <h2 class="text-3xl font-black text-black uppercase tracking-tight mb-4">Tu carrito está vacío</h2>
        <p class="text-on-surface-variant mb-8">Agrega repuestos industriales de alta calidad para comenzar tu pedido.</p>
        <a href="/tienda/catalogo_general" class="inline-flex items-center gap-3 bg-black text-primary hover:bg-primary hover:text-black font-black uppercase py-4 px-10 tracking-[0.3em] text-xs transition-all">
            <span class="material-symbols-outlined">storefront</span>
            Explorar Catálogo
        </a>
    </div>

    <!-- Cart Content (shown when cart has items) -->
    <div id="cartContent" class="hidden">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-start">
            <!-- Cart Items -->
            <div class="lg:col-span-8 space-y-4">
                <div class="bg-white border border-outline overflow-hidden rounded-lg">
                    <!-- Header -->
                    <div class="grid grid-cols-12 gap-6 p-6 bg-black text-primary font-black text-xs uppercase tracking-[0.3em] items-center rounded-t-lg">
                        <div class="col-span-6">Especificación del Componente</div>
                        <div class="col-span-2 text-center">Cant.</div>
                        <div class="col-span-2 text-right">Precio Unit.</div>
                        <div class="col-span-2 text-right">Subtotal</div>
                    </div>

                    <!-- Items Container -->
                    <div id="cartItemsContainer" class="divide-y divide-outline">
                        <!-- Items will be dynamically inserted here -->
                    </div>

                    <!-- Cart Summary Bar -->
                    <div class="p-6 bg-background/50 border-t border-outline flex flex-col sm:flex-row items-center justify-between gap-4">
                        <a href="/tienda/catalogo_general" class="flex items-center gap-3 font-black text-[10px] uppercase tracking-[0.3em] hover:text-primary transition-colors group">
                            <span class="material-symbols-outlined group-hover:-translate-x-2 transition-transform">arrow_back</span>
                            Continuar Comprando
                        </a>
                        <button onclick="clearCart()" class="flex items-center gap-3 font-black text-[10px] uppercase tracking-[0.3em] text-red-500 hover:text-black transition-colors group">
                            <span class="material-symbols-outlined group-hover:scale-125 transition-transform">delete_sweep</span>
                            Vaciar Carrito
                        </button>
                    </div>
                </div>
            </div>

            <!-- Order Summary -->
            <aside class="lg:col-span-4 sticky top-32 space-y-6">
                <!-- Summary Card -->
                <div class="bg-white border border-outline p-10 shadow-sm relative overflow-hidden rounded-lg">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-primary/10 -mr-12 -mt-12 rotate-45 pointer-events-none"></div>
                    
                    <h2 class="text-3xl font-black text-black uppercase tracking-tighter mb-10 pb-4 border-b-4 border-primary italic">Resumen del Pedido</h2>
                    
                    <div class="space-y-6 mb-12">
                        <div class="flex justify-between items-center text-xs font-black uppercase tracking-widest text-on-surface-variant">
                            <span>Subtotal</span>
                            <span id="subtotal" class="text-black text-lg tracking-tighter">$0.00</span>
                        </div>
                        <div class="flex justify-between items-center text-xs font-black uppercase tracking-widest text-on-surface-variant">
                            <span>Envío (Flete)</span>
                            <span id="shipping" class="text-primary text-lg tracking-tighter">$45.00</span>
                        </div>
                        <div class="flex justify-between items-center text-xs font-black uppercase tracking-widest text-on-surface-variant">
                            <span>IVA (16%)</span>
                            <span id="tax" class="text-black text-lg tracking-tighter">$0.00</span>
                        </div>
                        
                        <div class="pt-8 border-t-2 border-outline mt-8">
                            <div class="flex flex-col gap-2">
                                <span class="text-[10px] font-black uppercase tracking-[0.4em] text-on-surface-variant italic">Total a Pagar</span>
                                <div id="total" class="text-5xl font-black text-black tracking-tighter tabular-nums leading-none">$0.00</div>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <button onclick="checkout()" class="w-full bg-black text-primary hover:bg-white hover:text-black border-2 border-black font-black uppercase py-5 px-10 tracking-[0.3em] text-[11px] shadow-2xl transition-all flex items-center justify-center gap-4 group">
                            Proceder al Pago
                            <span class="material-symbols-outlined group-hover:translate-x-2 transition-transform">payments</span>
                        </button>
                        <p class="text-[9px] text-on-surface-variant text-center font-bold uppercase tracking-widest leading-relaxed">
                            Precios incluyen IVA. Envío internacional sujeto a inspección aduanera.
                        </p>
                    </div>

                    <!-- Security Badge -->
                    <div class="mt-12 pt-8 border-t border-outline flex items-center gap-4 opacity-40 grayscale hover:grayscale-0 hover:opacity-100 transition-all">
                        <span class="material-symbols-outlined text-4xl">verified_user</span>
                        <div class="text-[9px] font-black uppercase tracking-widest leading-tight">
                            Portal Industrial <br/> Encriptado y Seguro
                        </div>
                    </div>
                </div>

                <!-- Support Card -->
                <div class="bg-black p-8 group relative overflow-hidden rounded-lg">
                    <div class="relative z-10">
                        <h4 class="text-primary text-lg font-black uppercase tracking-tighter mb-2 italic">¿Necesitas Soporte?</h4>
                        <p class="text-stone-500 text-[10px] font-bold uppercase tracking-widest mb-6 leading-relaxed">Nuestro equipo de ingeniería está disponible para verificación de catálogo en tiempo real.</p>
                        <a href="mailto:info@lacima.com" class="text-white text-[10px] font-black uppercase tracking-[0.2em] border-b-2 border-primary pb-1 hover:text-primary transition-colors">Solicitar Verificación de Catálogo</a>
                    </div>
                    <span class="material-symbols-outlined absolute right-[-20px] bottom-[-20px] text-white/5 text-[120px] transform group-hover:scale-110 transition-transform">engineering</span>
                </div>
            </aside>
        </div>
    </div>
</main>
@endsection

@push('scripts')
    <script src="/frontend/public/ecommerce/js/carrito.js"></script>
@endpush
