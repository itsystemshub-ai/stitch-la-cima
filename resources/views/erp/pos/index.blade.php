@extends('layouts.erp')

@section('title', 'Terminal POS')

@section('styles')
    <link rel="stylesheet" href="{{ asset('erp/css/pos.css') }}">
    <style>
        /* Ajuste para que el contenido POS ocupe el resto de la pantalla al lado del sidebar */
        main {
            margin-left: 288px; /* w-72 */
        }
        @media (max-width: 1024px) {
            main { margin-left: 0; }
        }
    </style>
@endsection

@section('content')
<!-- Main Terminal Section -->
<main class="flex-1 flex flex-col min-w-0 bg-[#0a0a0a] relative min-h-screen">
    <!-- Header Controls -->
    <header class="bg-black/80 backdrop-blur-2xl border-b border-white/5 p-8 flex flex-col md:flex-row justify-between items-end gap-8 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-64 h-64 bg-primary/5 blur-[100px] pointer-events-none"></div>
        <div class="flex-1 max-w-2xl relative z-10">
            <div class="flex items-center gap-3 mb-6">
                <span class="w-1.5 h-4 bg-primary rounded-full"></span>
                <p class="text-[10px] font-black text-stone-500 uppercase tracking-[0.4em]">Terminal Activo: POS-ZENITH-04</p>
            </div>
            <h2 class="text-5xl font-black text-white uppercase tracking-tighter mb-8 leading-none">Nueva <span class="text-primary">Transacción</span></h2>
            
            <div class="grid grid-cols-2 gap-8">
                <div class="space-y-3">
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
                            <option value="1" class="bg-stone-900">Consumidor Final (General)</option>
                            <option value="2" class="bg-stone-900">Transporte Carabobo - J-554210-3</option>
                        </select>
                        <span class="material-symbols-outlined absolute right-5 top-3.5 text-primary pointer-events-none">expand_more</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex gap-4 mb-1 relative z-10">
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
        <div class="flex-1 p-10 overflow-y-auto bg-[radial-gradient(circle_at_top_right,_#1a1a1a_0%,_#0a0a0a_100%)] no-scrollbar">
            <div class="bg-white/5 backdrop-blur-xl border border-white/5 rounded-2xl shadow-2xl overflow-hidden">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-white/[0.02]">
                            <th class="p-8 text-[10px] font-black text-stone-500 uppercase tracking-[0.3em] border-b border-white/5">Componente</th>
                            <th class="p-8 text-[10px] font-black text-stone-500 uppercase tracking-[0.3em] border-b border-white/5 text-center">Cant.</th>
                            <th class="p-8 text-[10px] font-black text-stone-500 uppercase tracking-[0.3em] border-b border-white/5 text-right">Precio Unit.</th>
                            <th class="p-8 text-[10px] font-black text-stone-500 uppercase tracking-[0.3em] border-b border-white/5 text-right">Subtotal</th>
                            <th class="p-8 w-12 border-b border-white/5"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5" id="cart-items">
                        <!-- Ejemplo estático de item -->
                        <tr class="hover:bg-white/[0.03] transition-colors group">
                            <td class="p-8">
                                <div class="flex items-center gap-8">
                                    <div class="w-16 h-16 bg-black border border-white/10 rounded-xl flex items-center justify-center text-primary">
                                        <span class="material-symbols-outlined text-3xl">settings_input_component</span>
                                    </div>
                                    <div>
                                        <p class="text-base font-black text-white uppercase tracking-tight">Junta de Culata Cummins</p>
                                        <p class="text-[10px] text-stone-500 font-black uppercase tracking-[0.2em] mt-2">SKU: CU-982-GK</p>
                                    </div>
                                </div>
                            </td>
                            <td class="p-8">
                                <div class="flex items-center justify-center gap-8 text-lg font-black text-primary">04</div>
                            </td>
                            <td class="p-8 text-right text-sm font-black text-stone-400">$ 142.50</td>
                            <td class="p-8 text-right text-lg font-black text-white">$ 570.00</td>
                            <td class="p-8 text-center">
                                <button class="text-stone-500 hover:text-red-500 transition-all"><span class="material-symbols-outlined">close</span></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Checkout Column -->
        <aside class="w-[450px] bg-black border-l border-white/5 p-12 flex flex-col shadow-[0_0_100px_rgba(0,0,0,1)] relative z-20">
            <div class="mb-14">
                <h3 class="text-[11px] font-black text-stone-500 uppercase tracking-[0.5em] mb-12 pb-6 border-b border-white/5">Estado de Cuenta</h3>
                <div class="space-y-8">
                    <div class="flex justify-between items-center">
                        <span class="text-[11px] font-black text-stone-400 uppercase tracking-widest">Subtotal Neto</span>
                        <span class="text-xl font-black text-white tracking-widest" id="summary-subtotal">$ 570.00</span>
                    </div>
                </div>
            </div>

            <div class="mt-auto space-y-12">
                <div class="bg-primary/5 border border-primary/20 p-10 rounded-3xl relative overflow-hidden group shadow-2xl">
                    <p class="text-xs font-black text-primary uppercase tracking-[0.4em] mb-4 relative z-10">Total a Liquidar</p>
                    <p class="text-7xl font-black text-white tracking-tighter relative z-10" id="summary-total">$ 661<span class="text-primary">.20</span></p>
                </div>
                
                <form action="{{ route('erp.ventas.facturar') }}" method="POST" id="checkout-form">
                    @csrf
                    <input type="hidden" name="customer_id" value="1">
                    <input type="hidden" name="vendedor_id" value="1">
                    <!-- Los items se inyectarían vía JS en un escenario real -->
                    <button type="submit" class="w-full h-24 bg-primary text-stone-900 font-black text-xl uppercase tracking-[0.4em] rounded-2xl shadow-xl hover:brightness-110 hover:-translate-y-1 transition-all">
                        Procesar <span class="text-[10px] bg-black/10 px-3 py-1 rounded ml-2">ENTER</span>
                    </button>
                </form>

                <div class="text-center pt-8 border-t border-white/5">
                    <p class="text-[10px] text-stone-500 font-black uppercase tracking-[0.4em]">RIF: J-40308741-5</p>
                </div>
            </div>
        </aside>
    </div>
</main>
@endsection

@section('scripts')
    <script src="{{ asset('js/inicio.js') }}"></script>
    <script>
        // Lógica de terminal POS básica
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' && !e.shiftKey) {
                // Simular submit si no hay inputs enfocados
                if (document.activeElement.tagName !== 'INPUT') {
                    // document.getElementById('checkout-form').submit();
                }
            }
        });
    </script>
@endsection
