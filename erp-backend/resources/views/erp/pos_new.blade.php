@extends('layouts.erp')

@section('title', 'POS Terminal')

@section('styles')
<style>
    .pos-grid { height: calc(100vh - 80px); }
    .cart-area { height: calc(100vh - 350px); }
    body { overflow: hidden; } /* Terminal look */
</style>
@endsection

@section('content')
<div class="fixed inset-0 bg-stone-900 text-white z-[9999] flex flex-col">
    <!-- POS Layout Header -->
    <header class="h-20 bg-stone-900 border-b border-white/10 px-8 flex justify-between items-center shrink-0">
        <div class="flex items-center gap-4">
            <a href="/erp/inicio" class="w-10 h-10 bg-stone-800 rounded-full flex items-center justify-center hover:bg-white/10 transition-all">
                <span class="material-symbols-outlined text-primary">arrow_back</span>
            </a>
            <div>
                <h1 class="text-xl font-black uppercase tracking-tighter italic">ZENITH <span class="text-primary italic">POS</span> v2.0</h1>
                <p class="text-[10px] font-bold text-stone-500 uppercase tracking-widest leading-none">Cajero: GUILLERMO PEREZ • Sede: VALENCIA CENTRAL</p>
            </div>
        </div>
        <div class="flex items-center gap-6">
            <div class="text-right">
                <p class="text-[10px] font-bold text-stone-500 uppercase mb-1">Total Ventas Hoy</p>
                <p class="text-2xl font-black text-primary font-headline tracking-tighter">$ 12,450.80</p>
            </div>
            <button class="w-12 h-12 bg-stone-800 rounded-xl flex items-center justify-center hover:bg-red-500/20 group">
                <span class="material-symbols-outlined text-white group-hover:text-red-500">power_settings_new</span>
            </button>
        </div>
    </header>

    <main class="grid grid-cols-12 gap-0 flex-1 overflow-hidden pos-grid">
        <!-- Catalogo y Busqueda (8 cols) -->
        <section class="col-span-8 p-6 bg-stone-800/20 overflow-y-auto">
            <div class="flex gap-4 mb-6">
                <div class="relative flex-1">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 material-symbols-outlined text-stone-500">search</span>
                    <input type="text" placeholder="Escanear código o buscar repuesto..." class="w-full pl-12 pr-4 py-4 bg-stone-900 border-0 rounded-xl text-white placeholder:text-stone-600 focus:ring-2 focus:ring-primary outline-none text-lg font-bold">
                </div>
                <button class="px-6 bg-stone-900 rounded-xl flex items-center justify-center hover:bg-stone-800 border border-white/5">
                    <span class="material-symbols-outlined">category</span>
                </button>
            </div>

            <!-- Categorias Rapidas -->
            <div class="flex gap-3 mb-8 overflow-x-auto pb-2 scrollbar-hide">
                <button class="px-6 py-2 bg-primary text-stone-900 rounded-full text-xs font-black uppercase whitespace-nowrap">Todos</button>
                <button class="px-6 py-2 bg-stone-800 text-stone-400 rounded-full text-xs font-black uppercase whitespace-nowrap hover:bg-stone-700">Frenos</button>
                <button class="px-6 py-2 bg-stone-800 text-stone-400 rounded-full text-xs font-black uppercase whitespace-nowrap hover:bg-stone-700">Motor</button>
                <button class="px-6 py-2 bg-stone-800 text-stone-400 rounded-full text-xs font-black uppercase whitespace-nowrap hover:bg-stone-700">Filtros</button>
                <button class="px-6 py-2 bg-stone-800 text-stone-400 rounded-full text-xs font-black uppercase whitespace-nowrap hover:bg-stone-700">Suspensión</button>
            </div>

            <!-- Grid de Productos -->
            <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4">
                <!-- Card 1 -->
                <button class="bg-stone-900 p-4 rounded-2xl border border-white/5 hover:border-primary/50 transition-all text-left flex flex-col justify-between group">
                    <div class="mb-4">
                        <span class="text-[8px] font-black bg-primary/10 text-primary px-2 py-0.5 rounded tracking-widest uppercase mb-2 block w-max">Stock: 45</span>
                        <h4 class="text-sm font-black text-white leading-tight mb-1 uppercase tracking-tight">DISCO FRENO HILUX</h4>
                        <p class="text-[10px] text-stone-500 font-mono italic">BRK-5042</p>
                    </div>
                    <div class="flex justify-between items-end">
                        <span class="text-lg font-black font-headline text-primary">$ 85.00</span>
                        <div class="w-8 h-8 bg-stone-800 rounded-lg flex items-center justify-center group-hover:bg-primary group-hover:text-stone-900">
                            <span class="material-symbols-outlined text-sm">add_shopping_cart</span>
                        </div>
                    </div>
                </button>
                
                <!-- Mockup de mas productos -->
                @for ($i = 0; $i < 7; $i++)
                <button class="bg-stone-900 p-4 rounded-2xl border border-white/5 hover:border-primary/50 transition-all text-left flex flex-col justify-between group opacity-50">
                    <div class="mb-4">
                        <span class="text-[8px] font-black bg-white/5 text-stone-400 px-2 py-0.5 rounded tracking-widest uppercase mb-2 block w-max">Stock: --</span>
                        <h4 class="text-sm font-black text-stone-400 leading-tight mb-1 uppercase tracking-tight">Repuesto SKU #{{ 1000 + $i }}</h4>
                        <p class="text-[10px] text-stone-600 font-mono italic">OEM-DEMO-{{ $i }}</p>
                    </div>
                    <div class="flex justify-between items-end">
                        <span class="text-lg font-black font-headline text-stone-500">$ --.--</span>
                        <div class="w-8 h-8 bg-stone-800 rounded-lg flex items-center justify-center">
                            <span class="material-symbols-outlined text-sm">add</span>
                        </div>
                    </div>
                </button>
                @endfor
            </div>
        </section>

        <!-- Carrito y Pago (4 cols) -->
        <aside class="col-span-4 bg-stone-900 border-l border-white/10 p-6 flex flex-col shadow-2xl z-10">
            <h3 class="text-lg font-black uppercase tracking-tighter mb-4 flex items-center gap-2">
                <span class="material-symbols-outlined text-primary">shopping_cart</span>
                ORDEN ACTUAL
            </h3>

            <!-- Lista de Items -->
            <div class="flex-1 cart-area overflow-y-auto space-y-3 mb-6 pr-2 custom-scrollbar">
                <div class="flex justify-between items-center p-3 bg-white/5 rounded-xl border border-white/5">
                    <div>
                        <p class="text-xs font-black uppercase tracking-tight">DISCO FRENO HILUX</p>
                        <p class="text-[10px] text-stone-500 italic">2 x $85.00</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="text-sm font-black text-primary font-headline">$ 170.00</span>
                        <button class="p-1 hover:text-red-500 transition-colors"><span class="material-symbols-outlined text-sm">delete</span></button>
                    </div>
                </div>
            </div>

            <!-- Checkout Info -->
            <div class="space-y-3 pt-6 border-t border-white/10 mt-auto">
                <div class="flex justify-between text-stone-500 font-bold uppercase text-[10px] tracking-widest">
                    <span>Monto Base</span>
                    <span class="text-white">$ 170.00</span>
                </div>
                <div class="flex justify-between text-stone-500 font-bold uppercase text-[10px] tracking-widest">
                    <span>I.V.A (16%)</span>
                    <span class="text-white">$ 27.20</span>
                </div>
                <div class="flex justify-between items-center py-4 border-y border-white/5 my-2">
                    <span class="text-sm font-black uppercase tracking-[0.2em] text-stone-400">TOTAL A PAGAR</span>
                    <span class="text-4xl font-black font-headline text-primary tracking-tighter italic">$ 197.20</span>
                </div>

                <!-- Botones de Accion -->
                <div class="grid grid-cols-2 gap-3 mt-4">
                    <button class="py-4 bg-stone-800 rounded-xl font-black text-xs uppercase tracking-widest hover:bg-stone-700 transition-all">Suspender</button>
                    <button class="py-4 bg-primary text-stone-900 rounded-xl font-black text-xs uppercase tracking-widest hover:brightness-110 shadow-lg shadow-primary/20 transition-all">COBRAR (F12)</button>
                </div>
            </div>
        </aside>
    </main>
</div>
@endsection

@section('scripts')
<script>
    // Logica basica de POS para demo frontend
    console.log("[ZENITH POS] Terminal Operativo v2.0 Inicia.");
</script>
@endsection
