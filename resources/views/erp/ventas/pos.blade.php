@extends('erp.layouts.app')

@section('title', 'Punto de Venta | Mayor de Repuesto La Cima, C.A.')

@push('styles')
<style>
    /* Fullscreen POS Overrides */
    body { overflow: hidden; height: 100vh; }
    /* Hide standard header */
    body > header { display: none !important; }
    /* Override standard main styles for POS */
    body > main {
        margin-top: 0 !important;
        padding: 0 !important;
        height: 100vh !important;
        display: flex !important;
        flex-direction: column !important;
        background-color: #0a0a0a !important;
    }
    /* Hide standard footer inside main */
    body > main > div.pt-4.mt-8 { display: none !important; }
</style>
<link rel="stylesheet" href="{{ asset('erp/css/pos.css') }}">
@endpush

@section('content')
<!-- Header Controls -->
<header class="bg-black/80 backdrop-blur-2xl border-b border-white/5 p-8 flex flex-col md:flex-row justify-between items-end gap-8 relative overflow-hidden shrink-0">
    <div class="absolute top-0 right-0 w-64 h-64 bg-primary/5 blur-[100px] pointer-events-none"></div>
    <div class="flex-1 max-w-2xl relative z-10">
        <div class="flex items-center gap-3 mb-6">
            <span class="w-1.5 h-4 bg-primary rounded-full"></span>
            <p class="text-[10px] font-black text-stone-500 uppercase tracking-[0.4em]">Terminal Activo: POS-ZENITH-04</p>
        </div>
        <h2 class="text-5xl font-black text-white uppercase tracking-tighter mb-8 leading-none">Nueva <span class="text-primary">Transacción</span></h2>
        
        <div class="grid grid-cols-2 gap-8">
            <div id="tour-pos-scanner" class="space-y-3">
                <label class="text-[9px] font-black uppercase tracking-[0.3em] text-stone-500">Búsqueda de Repuestos</label>
                <div class="flex items-center bg-white/5 border border-white/10 px-5 py-4 focus-within:border-primary/50 transition-all rounded-xl">
                    <span class="material-symbols-outlined text-primary text-xl mr-4">barcode_scanner</span>
                    <input class="bg-transparent border-none text-white w-full text-xs font-black uppercase tracking-widest placeholder-white/10 outline-none" placeholder="Escaneé SKU o Nombre..." type="text"/>
                </div>
            </div>
            <div class="space-y-3">
                <label class="text-[9px] font-black uppercase tracking-[0.3em] text-stone-500">Asignación de Cliente</label>
                <div class="relative">
                    <select class="appearance-none bg-white/5 border border-white/10 text-white w-full py-4 px-5 text-xs font-black uppercase tracking-widest focus:ring-1 focus:ring-primary cursor-pointer rounded-xl outline-none">
                        <option class="bg-stone-900">Consumidor Final (General)</option>
                        <option class="bg-stone-900">Transporte Carabobo - J-554210-3</option>
                        <option class="bg-stone-900">Industrial Parts S.A. - J-127440-1</option>
                        <option class="bg-stone-900">Constructora Master - J-332145-8</option>
                    </select>
                    <span class="material-symbols-outlined absolute right-5 top-3.5 text-primary pointer-events-none">expand_more</span>
                </div>
            </div>
        </div>
    </div>

    <div class="flex gap-4 mb-1 relative z-10">
        <button id="tour-quick-tour" onclick="startErpTour()" class="h-14 px-8 flex items-center justify-center gap-3 bg-primary/10 border border-primary/20 text-primary font-black uppercase text-[10px] tracking-widest hover:bg-primary hover:text-stone-900 transition-all rounded-xl">
            <span class="material-symbols-outlined text-lg">auto_awesome</span> Quick Tour
        </button>
        <button class="h-14 px-8 flex items-center justify-center gap-3 bg-white/5 border border-white/10 text-stone-400 font-black uppercase text-[10px] tracking-widest hover:text-white hover:bg-white/10 transition-all rounded-xl">
            <span class="material-symbols-outlined text-lg">print</span> Pausar <span class="text-[8px] opacity-30 ml-2">F4</span>
        </button>
        <button class="h-14 px-8 flex items-center justify-center gap-3 bg-red-500/10 border border-red-500/20 text-red-500 font-black uppercase text-[10px] tracking-widest hover:bg-red-500 hover:text-white transition-all rounded-xl">
            <span class="material-symbols-outlined text-lg">delete</span> Anular
        </button>
    </div>
</header>

<div class="flex-1 flex overflow-hidden">
    <!-- Transaction Table Container -->
    <div class="flex-1 p-10 overflow-y-auto custom-scrollbar bg-[radial-gradient(circle_at_top_right,_#1a1a1a_0%,_#0a0a0a_100%)] relative">
        <div id="tour-pos-cart" class="bg-white/5 backdrop-blur-xl border border-white/5 rounded-2xl shadow-2xl overflow-hidden relative z-10">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-white/[0.02]">
                        <th class="p-8 text-[10px] font-black text-stone-500 uppercase tracking-[0.3em] border-b border-white/5">Identificación del Componente</th>
                        <th class="p-8 text-[10px] font-black text-stone-500 uppercase tracking-[0.3em] border-b border-white/5 text-center">Cant.</th>
                        <th class="p-8 text-[10px] font-black text-stone-500 uppercase tracking-[0.3em] border-b border-white/5 text-right">Precio Unit.</th>
                        <th class="p-8 text-[10px] font-black text-stone-500 uppercase tracking-[0.3em] border-b border-white/5 text-right">Subtotal Neto</th>
                        <th class="p-8 w-12 border-b border-white/5"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    <!-- Item 1 -->
                    <tr class="hover:bg-white/[0.03] transition-colors group">
                        <td class="p-8">
                            <div class="flex items-center gap-8">
                                <div class="w-16 h-16 bg-black border border-white/10 rounded-xl flex items-center justify-center text-primary group-hover:scale-105 transition-transform shadow-lg shadow-black/50">
                                    <span class="material-symbols-outlined text-3xl">settings_input_component</span>
                                </div>
                                <div>
                                    <p class="text-base font-black text-white uppercase tracking-tight">Junta de Culata Cummins</p>
                                    <p class="text-[10px] text-stone-500 font-black uppercase tracking-[0.2em] mt-2">SKU: CU-982-GK</p>
                                </div>
                            </div>
                        </td>
                        <td class="p-8">
                            <div class="flex items-center justify-center gap-8">
                                <button class="w-10 h-10 flex items-center justify-center rounded-lg border border-white/10 text-stone-400 hover:text-white hover:border-white transition-all font-black">-</button>
                                <span class="text-lg font-black text-primary tracking-widest">04</span>
                                <button class="w-10 h-10 flex items-center justify-center rounded-lg border border-white/10 text-stone-400 hover:text-white hover:border-white transition-all font-black">+</button>
                            </div>
                        </td>
                        <td class="p-8 text-right text-sm font-black text-stone-400 tracking-tighter">$ 142.50</td>
                        <td class="p-8 text-right text-lg font-black text-white tracking-widest">$ 570.00</td>
                        <td class="p-8 text-center">
                            <button class="w-10 h-10 rounded-lg text-stone-500 hover:text-red-500 hover:bg-red-500/10 transition-all">
                                <span class="material-symbols-outlined">close</span>
                            </button>
                        </td>
                    </tr>
                    <!-- Item 2 -->
                    <tr class="hover:bg-white/[0.03] transition-colors group">
                        <td class="p-8">
                            <div class="flex items-center gap-8">
                                <div class="w-16 h-16 bg-black border border-white/10 rounded-xl flex items-center justify-center text-primary group-hover:scale-105 transition-transform shadow-lg shadow-black/50">
                                    <span class="material-symbols-outlined text-3xl">filter_list</span>
                                </div>
                                <div>
                                    <p class="text-base font-black text-white uppercase tracking-tight">Filtro de Aceite Volvo</p>
                                    <p class="text-[10px] text-stone-500 font-black uppercase tracking-[0.2em] mt-2">SKU: VO-FL-002</p>
                                </div>
                            </div>
                        </td>
                        <td class="p-8">
                            <div class="flex items-center justify-center gap-8">
                                <button class="w-10 h-10 flex items-center justify-center rounded-lg border border-white/10 text-stone-400 hover:text-white hover:border-white transition-all font-black">-</button>
                                <span class="text-lg font-black text-primary tracking-widest">12</span>
                                <button class="w-10 h-10 flex items-center justify-center rounded-lg border border-white/10 text-stone-400 hover:text-white hover:border-white transition-all font-black">+</button>
                            </div>
                        </td>
                        <td class="p-8 text-right text-sm font-black text-stone-400 tracking-tighter">$ 45.00</td>
                        <td class="p-8 text-right text-lg font-black text-white tracking-widest">$ 540.00</td>
                        <td class="p-8 text-center">
                            <button class="w-10 h-10 rounded-lg text-stone-500 hover:text-red-500 hover:bg-red-500/10 transition-all">
                                <span class="material-symbols-outlined">close</span>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Dashboard Shortcuts -->
        <div class="grid grid-cols-4 gap-6 mt-10 relative z-10">
            <button class="p-8 bg-white/[0.02] border border-white/5 rounded-2xl hover:border-primary/30 hover:bg-primary/[0.02] transition-all flex flex-col items-center gap-4 group">
                <span class="material-symbols-outlined text-stone-500 group-hover:text-primary transition-colors text-3xl">barcode</span>
                <span class="text-[10px] font-black uppercase tracking-[0.3em] text-stone-500 group-hover:text-white transition-colors">Entrada Rápida</span>
            </button>
            <button class="p-8 bg-white/[0.02] border border-white/5 rounded-2xl hover:border-primary/30 hover:bg-primary/[0.02] transition-all flex flex-col items-center gap-4 group">
                <span class="material-symbols-outlined text-stone-500 group-hover:text-primary transition-colors text-3xl">sell</span>
                <span class="text-[10px] font-black uppercase tracking-[0.3em] text-stone-500 group-hover:text-white transition-colors">Descuento</span>
            </button>
            <button class="p-8 bg-white/[0.02] border border-white/5 rounded-2xl hover:border-primary/30 hover:bg-primary/[0.02] transition-all flex flex-col items-center gap-4 group">
                <span class="material-symbols-outlined text-stone-500 group-hover:text-primary transition-colors text-3xl">history</span>
                <span class="text-[10px] font-black uppercase tracking-[0.3em] text-stone-500 group-hover:text-white transition-colors">Historial</span>
            </button>
            <button class="p-8 bg-white/[0.02] border border-white/5 rounded-2xl hover:border-primary/30 hover:bg-primary/[0.02] transition-all flex flex-col items-center gap-4 group">
                <span class="material-symbols-outlined text-stone-500 group-hover:text-primary transition-colors text-3xl">inventory_2</span>
                <span class="text-[10px] font-black uppercase tracking-[0.3em] text-stone-500 group-hover:text-white transition-colors">Ver Stock</span>
            </button>
        </div>
        
        <!-- Background Elements within terminal -->
        <div class="absolute inset-0 pointer-events-none opacity-[0.02] z-0" style="background-image: radial-gradient(#ceff5e 1px, transparent 1px); background-size: 40px 40px;"></div>
    </div>

    <!-- Checkout Column -->
    <aside class="w-[450px] bg-black border-l border-white/5 p-12 flex flex-col shadow-[0_0_100px_rgba(0,0,0,1)] relative z-20 shrink-0">
        <div class="mb-14">
            <h3 class="text-[11px] font-black text-stone-500 uppercase tracking-[0.5em] mb-12 pb-6 border-b border-white/5">Estado de Cuenta</h3>
            <div class="space-y-8">
                <div class="flex justify-between items-center">
                    <span class="text-[11px] font-black text-stone-400 uppercase tracking-widest">Subtotal Neto</span>
                    <span class="text-xl font-black text-white tracking-widest">$ 1,110.00</span>
                </div>
                <div class="flex justify-between items-center">
                    <div class="flex items-center gap-3">
                        <span class="text-[11px] font-black text-stone-400 uppercase tracking-widest">I.V.A (16%)</span>
                        <span class="text-[8px] bg-primary/10 border border-primary/20 px-2 py-1 text-primary font-black rounded">FISCAL OPT</span>
                    </div>
                    <span class="text-xl font-black text-white tracking-widest">$ 177.60</span>
                </div>
            </div>
        </div>

        <div class="mt-auto space-y-12">
            <div class="bg-primary/5 border border-primary/20 p-10 rounded-3xl relative overflow-hidden group shadow-2xl">
                <div class="absolute inset-0 bg-primary/5 group-hover:scale-110 transition-transform duration-700"></div>
                <p class="text-xs font-black text-primary uppercase tracking-[0.4em] mb-4 relative z-10">Total a Liquidar</p>
                <p class="text-7xl font-black text-white tracking-tighter relative z-10">$ 1,287<span class="text-primary">.60</span></p>
            </div>
            
            <div id="tour-pos-total" class="space-y-6">
                <div class="grid grid-cols-2 gap-4">
                    <button class="h-20 flex flex-col items-center justify-center gap-2 bg-white/5 border border-white/5 hover:border-primary/50 hover:bg-primary/5 transition-all group rounded-2xl">
                        <span class="material-symbols-outlined text-stone-500 group-hover:text-primary transition-colors">payments</span>
                        <span class="text-[10px] font-black uppercase text-stone-500 tracking-widest group-hover:text-white transition-colors">Efectivo</span>
                    </button>
                    <button class="h-20 flex flex-col items-center justify-center gap-2 bg-white/5 border border-white/5 hover:border-primary/50 hover:bg-primary/5 transition-all group rounded-2xl">
                        <span class="material-symbols-outlined text-stone-500 group-hover:text-primary transition-colors">credit_card</span>
                        <span class="text-[10px] font-black uppercase text-stone-500 tracking-widest group-hover:text-white transition-colors">Tarjeta</span>
                    </button>
                </div>
                <button id="tour-pos-checkout" class="w-full h-24 bg-primary text-stone-900 font-black text-xl uppercase tracking-[0.4em] rounded-2xl shadow-[0_20px_60px_rgba(206,255,94,0.15)] hover:brightness-110 hover:-translate-y-1 transition-all active:scale-95">
                    Procesar <span class="text-[10px] bg-black/10 px-3 py-1 rounded ml-2">ENTER</span>
                </button>
            </div>

            <div class="text-center pt-8 border-t border-white/5 space-y-3">
                <p class="text-[10px] text-stone-500 font-black uppercase tracking-[0.4em]">RIF: J-40308741-5</p>
                <p class="text-[9px] text-stone-600 font-black uppercase tracking-[0.3em]">Operador: Admin_Cima_01</p>
            </div>
        </div>
    </aside>
</div>
@endsection

@push('scripts')
<script src="{{ asset('erp/js/pos.js') }}"></script>
@endpush
