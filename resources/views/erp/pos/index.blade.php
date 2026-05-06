@extends('erp.layouts.app')

@section('title', 'Terminal POS')

@section('breadcrumb')
    <a href="{{ url('/erp/ventas') }}" class="hover:text-stone-900 transition-colors">Ventas</a>
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <span class="text-stone-900">Terminal POS</span>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('erp/css/pos.css') }}">
@endsection

@section('content')
<!-- Terminal Container -->
<div class="flex flex-col min-w-0 bg-white rounded-[32px] shadow-sm border border-stone-200 overflow-hidden min-h-[calc(100vh-180px)]">
    <!-- Header Controls -->
    <header class="bg-stone-50 border-b border-stone-200 p-8 flex flex-col md:flex-row justify-between items-end gap-8 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-64 h-64 bg-primary/5 blur-[100px] pointer-events-none"></div>
        <div class="flex-1 max-w-2xl relative z-10">
            <div class="flex items-center gap-3 mb-4">
                <span class="w-1.5 h-4 bg-primary rounded-full shadow-[0_0_10px_#ceff5e]"></span>
                <p class="text-[10px] font-black text-stone-500 uppercase tracking-[0.4em] italic">Terminal Activo: POS-ZENITH-04</p>
            </div>
            <h2 class="text-4xl font-headline font-black text-stone-900 uppercase tracking-tighter mb-6 leading-none italic">Nueva <span class="text-primary not-italic">Transacción</span></h2>
            
            <div class="grid grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-[9px] font-black uppercase tracking-[0.3em] text-stone-400 italic">Búsqueda de Repuestos</label>
                    <div class="flex items-center bg-white border border-stone-200 px-4 py-3 focus-within:border-primary transition-all rounded-xl shadow-sm">
                        <span class="material-symbols-outlined text-stone-400 text-lg mr-3">barcode_scanner</span>
                        <input class="bg-transparent border-none text-stone-900 w-full text-[12px] font-bold uppercase tracking-widest placeholder-stone-300 outline-none" placeholder="Escaneé SKU o Nombre..." type="text"/>
                    </div>
                </div>
                <div class="space-y-2">
                    <label class="text-[9px] font-black uppercase tracking-[0.3em] text-stone-400 italic">Asignación de Cliente</label>
                    <div class="relative">
                        <select class="appearance-none bg-white border border-stone-200 text-stone-900 w-full py-3 px-4 text-[12px] font-bold uppercase tracking-widest focus:ring-1 focus:ring-primary cursor-pointer rounded-xl outline-none shadow-sm">
                            <option value="1">Consumidor Final (General)</option>
                            <option value="2">Transporte Carabobo - J-554210-3</option>
                        </select>
                        <span class="material-symbols-outlined absolute right-4 top-2.5 text-stone-400 pointer-events-none">expand_more</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex gap-3 mb-1 relative z-10">
            <button class="h-12 px-6 flex items-center justify-center gap-2 bg-white border border-stone-200 text-stone-500 font-black uppercase text-[10px] tracking-widest hover:text-stone-900 hover:border-stone-400 transition-all rounded-xl shadow-sm">
                <span class="material-symbols-outlined text-lg">print</span> Pausar <span class="text-[8px] opacity-40 ml-1">F4</span>
            </button>
            <button class="h-12 px-6 flex items-center justify-center gap-2 bg-red-50 border border-red-100 text-red-500 font-black uppercase text-[10px] tracking-widest hover:bg-red-500 hover:text-white transition-all rounded-xl shadow-sm">
                <span class="material-symbols-outlined text-lg">delete</span> Anular
            </button>
        </div>
    </header>

    <div class="flex-1 flex overflow-hidden">
        <!-- Transaction Table Container -->
        <div class="flex-1 p-8 overflow-y-auto bg-stone-50/50 no-scrollbar">
            <div class="bg-white border border-stone-200 rounded-2xl shadow-sm overflow-hidden">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-stone-50">
                            <th class="p-6 text-[10px] font-black text-stone-400 uppercase tracking-[0.3em] border-b border-stone-100 italic">Componente</th>
                            <th class="p-6 text-[10px] font-black text-stone-400 uppercase tracking-[0.3em] border-b border-stone-100 text-center italic">Cant.</th>
                            <th class="p-6 text-[10px] font-black text-stone-400 uppercase tracking-[0.3em] border-b border-stone-100 text-right italic">Precio Unit.</th>
                            <th class="p-6 text-[10px] font-black text-stone-400 uppercase tracking-[0.3em] border-b border-stone-100 text-right italic">Subtotal</th>
                            <th class="p-6 w-12 border-b border-stone-100"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-stone-100" id="cart-items">
                        <tr class="hover:bg-stone-50/50 transition-colors group">
                            <td class="p-6">
                                <div class="flex items-center gap-6">
                                    <div class="w-12 h-12 bg-stone-100 border border-stone-200 rounded-xl flex items-center justify-center text-stone-400 group-hover:bg-primary group-hover:text-stone-950 transition-all">
                                        <span class="material-symbols-outlined text-2xl">settings_input_component</span>
                                    </div>
                                    <div>
                                        <p class="text-[14px] font-black text-stone-900 uppercase tracking-tight italic">Junta de Culata Cummins</p>
                                        <p class="text-[10px] text-stone-400 font-black uppercase tracking-[0.2em] mt-1 italic">SKU: CU-982-GK</p>
                                    </div>
                                </div>
                            </td>
                            <td class="p-6">
                                <div class="flex items-center justify-center gap-4 text-base font-black text-stone-900 font-mono italic">04</div>
                            </td>
                            <td class="p-6 text-right text-[12px] font-black text-stone-400 italic font-mono">$ 142.50</td>
                            <td class="p-6 text-right text-base font-black text-stone-900 italic font-mono">$ 570.00</td>
                            <td class="p-6 text-center">
                                <button class="text-stone-300 hover:text-red-500 transition-all"><span class="material-symbols-outlined">close</span></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Checkout Column -->
        <aside class="w-[400px] bg-white border-l border-stone-200 p-10 flex flex-col shadow-sm relative z-20">
            <div class="mb-10">
                <h3 class="text-[11px] font-black text-stone-400 uppercase tracking-[0.5em] mb-8 pb-4 border-b border-stone-100 italic">Estado de Cuenta</h3>
                <div class="space-y-6">
                    <div class="flex justify-between items-center">
                        <span class="text-[11px] font-black text-stone-500 uppercase tracking-widest italic">Subtotal Neto</span>
                        <span class="text-lg font-black text-stone-900 tracking-widest font-mono italic" id="summary-subtotal">$ 570.00</span>
                    </div>
                </div>
            </div>

            <div class="mt-auto space-y-8">
                <div class="bg-primary/5 border border-primary/20 p-8 rounded-3xl relative overflow-hidden group shadow-sm">
                    <p class="text-[10px] font-black text-primary uppercase tracking-[0.4em] mb-3 relative z-10 italic">Total a Liquidar</p>
                    <p class="text-6xl font-headline font-black text-stone-900 tracking-tighter relative z-10 italic" id="summary-total">$ 661<span class="text-primary not-italic">.20</span></p>
                </div>
                
                <form action="{{ route('erp.ventas.facturar') }}" method="POST" id="checkout-form">
                    @csrf
                    <input type="hidden" name="customer_id" value="1">
                    <input type="hidden" name="vendedor_id" value="1">
                    <button type="submit" class="w-full h-20 bg-stone-900 text-primary font-black text-lg uppercase tracking-[0.4em] rounded-2xl shadow-xl hover:bg-stone-800 hover:-translate-y-1 transition-all italic">
                        Procesar <span class="text-[10px] bg-primary/20 px-3 py-1 rounded ml-2 not-italic">ENTER</span>
                    </button>
                </form>

                <div class="text-center pt-6 border-t border-stone-100">
                    <p class="text-[9px] text-stone-400 font-black uppercase tracking-[0.4em] italic">RIF: J-40308741-5 • ZENITH_CORE_v6</p>
                </div>
            </div>
        </aside>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/inicio.js') }}"></script>
    <script>
        // Lógica de terminal POS básica
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' && !e.shiftKey) {
                if (document.activeElement.tagName !== 'INPUT' && document.activeElement.tagName !== 'SELECT') {
                    // document.getElementById('checkout-form').submit();
                }
            }
        });
    </script>
@endsection
