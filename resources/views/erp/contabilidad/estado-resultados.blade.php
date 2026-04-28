@extends('erp.layouts.app')

@section('title', 'Estado Resultados | ERP La Cima')

@section('breadcrumb')
    <a href="{{ url('/erp/contabilidad') }}" class="hover:text-stone-900">Contabilidad</a>
    <span class="material-symbols-outlined text-sm">chevron_right</span>
    <span class="text-stone-900 font-medium">Estado Resultados</span>
@endsection

@section('content')
<div class="max-w-7xl mx-auto py-12 px-6 lg:px-12 text-white relative z-10">
    <!-- Header Section: Performance Authority -->
    <header class="flex flex-col md:flex-row justify-between items-end mb-20 relative border-b border-primary/20 pb-16">
        <div class="space-y-6">
            <div class="flex items-center gap-4">
                <span class="bg-primary/20 text-primary border border-primary/30 px-5 py-2 text-[12px] font-black uppercase tracking-[0.4em] italic shadow-[0_0_20px_rgba(206,255,94,0.15)]">ESTADO_RESULTADOS_P&G</span>
                <span class="text-stone-600 font-mono text-[11px] uppercase tracking-widest italic">REF_ID: ZENITH_PG_0x77E1</span>
            </div>
            <h1 class="text-5xl md:text-8xl font-headline font-black text-white uppercase tracking-tighter leading-none italic">
                MAYOR_REPUESTO<br/><span class="text-stone-700 not-italic">LA CIMA_CONTABILIDAD</span>
            </h1>
            <div class="flex items-center gap-4 bg-stone-900 shadow-inner px-6 py-3 rounded-2xl border border-white/5 w-fit">
                <span class="material-symbols-outlined text-stone-500 text-[18px]">calendar_today</span>
                <p class="text-stone-400 font-mono text-[12px] tracking-[0.2em] font-black uppercase italic">FISCAL_PERIOD: 2026 | PROTOCOL: IFRS_TRANS_SYNC</p>
            </div>
        </div>
        <div class="flex gap-6 mt-12 md:mt-0">
            <button class="flex items-center gap-4 bg-stone-900 px-8 py-5 text-stone-300 font-black text-[12px] uppercase tracking-[0.4em] hover:bg-stone-800 transition-all border border-stone-800 rounded-[20px] shadow-xl group">
                <span class="material-symbols-outlined text-[20px] group-hover:scale-125 transition-transform text-primary">download</span>
                <span>EXPORT_PDF</span>
            </button>
            <button class="flex items-center gap-4 bg-primary px-8 py-5 text-stone-950 font-black text-[12px] uppercase tracking-[0.4em] hover:brightness-110 transition-all rounded-[20px] shadow-[0_0_30px_rgba(206,255,94,0.2)]">
                <span class="material-symbols-outlined text-[20px]">table_view</span>
                <span>SYNC_EXCEL</span>
            </button>
        </div>
    </header>

    <!-- Financial Performance Bento: Magnitude Analysis -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-20">
        <!-- Gross Profit Magnitude -->
        <div class="bg-stone-900 border border-stone-800 p-10 rounded-[40px] shadow-2xl relative overflow-hidden group">
            <div class="absolute top-0 right-0 w-48 h-48 bg-primary/5 -mr-24 -mt-24 rounded-full blur-3xl group-hover:bg-primary/10 transition-all duration-1000"></div>
            <p class="text-[12px] font-black text-stone-600 uppercase tracking-[0.4em] mb-6 italic relative z-10 group-hover:text-stone-400 transition-colors">Gross_Profit_Magnitude</p>
            <div class="flex items-baseline gap-4 relative z-10">
                <p class="text-4xl font-headline font-black text-white italic tracking-tighter">1.452.890,00</p>
                <span class="text-primary text-[14px] font-black font-mono shadow-primary/20 drop-shadow-[0_0_8px_rgba(206,255,94,0.4)]">+14.2%</span>
            </div>
            <div class="mt-8 w-full bg-stone-950 h-2 rounded-full overflow-hidden border border-white/5">
                <div class="bg-primary h-full w-[68%] shadow-[0_0_15px_#ceff5e]"></div>
            </div>
        </div>
        <!-- Operational Efficiency Score -->
        <div class="bg-stone-900 border border-stone-800 p-10 rounded-[40px] shadow-2xl relative overflow-hidden group">
            <p class="text-[12px] font-black text-stone-600 uppercase tracking-[0.4em] mb-6 italic relative z-10 group-hover:text-stone-400 transition-colors">Op_Margin_Efficiency</p>
            <p class="text-4xl font-headline font-black text-white italic tracking-tighter relative z-10">32.42%</p>
            <div class="flex items-center gap-3 mt-8 bg-stone-950/50 px-4 py-2 rounded-xl border border-white/5 w-fit">
                <span class="material-symbols-outlined text-[16px] text-stone-700">settings_suggest</span>
                <p class="text-[11px] text-stone-600 uppercase font-black tracking-widest">PROTOCOL_OPTIM_NODE_177</p>
            </div>
        </div>
        <!-- Net Utility Transmission -->
        <div class="bg-primary border border-primary/20 p-10 rounded-[40px] shadow-[0_0_50px_rgba(206,255,94,0.1)] relative overflow-hidden group">
            <p class="text-[12px] font-black text-stone-900/60 uppercase tracking-[0.4em] mb-6 italic relative z-10 group-hover:text-stone-950 transition-colors">Net_Utility_Availability</p>
            <p class="text-4xl font-headline font-black text-stone-950 italic tracking-tighter relative z-10">628.430,22</p>
            <div class="flex items-center gap-3 mt-8 bg-black/10 px-4 py-2 rounded-xl border border-black/5 w-fit">
                <span class="material-symbols-outlined text-[16px] text-stone-900">verified</span>
                <p class="text-[11px] text-stone-900 font-black uppercase tracking-widest">POST_FISCAL_ISLR_34%</p>
            </div>
        </div>
    </div>

    <!-- P&L Data Stream: Fiduciary Depth -->
    <div class="bg-stone-950 border border-stone-800 rounded-[40px] shadow-3xl overflow-hidden mb-20">
        <table class="w-full text-left border-collapse font-mono">
            <thead>
                <tr class="bg-stone-900 border-b border-white/5">
                    <th class="py-8 px-12 text-[12px] font-black text-stone-500 uppercase tracking-[0.4em] italic">Account_Node</th>
                    <th class="py-8 px-12 text-[12px] font-black text-stone-500 uppercase tracking-[0.4em] italic">Partida_Description</th>
                    <th class="py-8 px-12 text-right text-[12px] font-black text-stone-500 uppercase tracking-[0.4em] italic">Magnitude (VES)</th>
                    <th class="py-8 px-12 text-right text-[12px] font-black text-stone-500 uppercase tracking-[0.4em] italic">%_Transmission</th>
                </tr>
            </thead>
            <tbody class="text-white">
                <!-- SECTION: OPERATIONAL_INCOME -->
                <tr class="bg-stone-900/40">
                    <td class="py-6 px-12 text-[12px] font-black text-primary uppercase tracking-[0.5em] italic" colspan="4">04 / INGRESOS_OPERACIONALES_MAG</td>
                </tr>
                <tr class="hover:bg-primary/5 transition-all group/row">
                    <td class="py-6 px-12 text-[12px] font-black text-stone-600 group-hover/row:text-stone-300 transition-colors italic">4.1.01.01</td>
                    <td class="py-6 px-12 text-[14px] font-black text-stone-400 group-hover/row:text-white uppercase tracking-tight transition-colors italic">Net_Ventas_Repuestos_Industrial</td>
                    <td class="py-6 px-12 text-right text-[16px] font-black text-white italic tracking-tighter">4.250.000,00</td>
                    <td class="py-6 px-12 text-right text-[11px] font-black text-stone-600 italic">100.0%</td>
                </tr>
                <tr class="hover:bg-primary/5 transition-all group/row">
                    <td class="py-6 px-12 text-[12px] font-black text-stone-600 group-hover/row:text-stone-300 transition-colors italic">4.1.01.05</td>
                    <td class="py-6 px-12 text-[14px] font-black text-stone-400 group-hover/row:text-white uppercase tracking-tight transition-colors italic">Servicios_Precision_Mecanica</td>
                    <td class="py-6 px-12 text-right text-[16px] font-black text-white italic tracking-tighter">180.450,00</td>
                    <td class="py-6 px-12 text-right text-[11px] font-black text-stone-600 italic">004.2%</td>
                </tr>
                
                <!-- SECTION: COGS -->
                <tr class="bg-stone-900/40 border-t border-white/5">
                    <td class="py-6 px-12 text-[12px] font-black text-primary uppercase tracking-[0.5em] italic" colspan="4">05 / COSTO_VENTA_PROTOCOL (ART_177)</td>
                </tr>
                <tr class="hover:bg-red-500/5 transition-all group/row">
                    <td class="py-6 px-12 text-[12px] font-black text-stone-600 italic">5.1.01.10</td>
                    <td class="py-6 px-12 text-[14px] font-black text-stone-500 uppercase tracking-tight italic">Initial_Stock_Inventory_Magn</td>
                    <td class="py-6 px-12 text-right text-[16px] font-black text-stone-300 italic tracking-tighter">950.000,00</td>
                    <td class="py-6 px-12 text-right text-[11px] font-black text-stone-600 italic">—</td>
                </tr>
                <tr class="hover:bg-red-500/5 transition-all group/row">
                    <td class="py-6 px-12 text-[12px] font-black text-stone-600 italic">5.1.01.99</td>
                    <td class="py-6 px-12 text-[14px] font-black text-stone-500 uppercase tracking-tight italic">Final_Cycle_Inventory_Stock</td>
                    <td class="py-6 px-12 text-right text-[16px] font-black text-red-500 italic tracking-tighter">(622.440,00)</td>
                    <td class="py-6 px-12 text-right text-[11px] font-black text-stone-600 italic">—</td>
                </tr>

                <!-- TOTAL_BRUTA -->
                <tr class="bg-stone-900 border-t-4 border-primary/40">
                    <td class="py-8 px-12 text-[14px] font-black text-white uppercase tracking-[0.4em] italic" colspan="2">TOTAL_UTILIDAD_BRUTA_EN_VENTAS</td>
                    <td class="py-8 px-12 text-right text-3xl font-headline font-black text-primary tracking-tighter italic">1.452.890,00</td>
                    <td class="py-8 px-12 text-right text-[14px] font-black text-primary/60 italic">32.8%</td>
                </tr>

                <!-- FINAL_NET -->
                <tr class="bg-primary shadow-[0_-20px_50px_rgba(206,255,94,0.15)]">
                    <td class="py-12 px-12 text-[18px] font-black text-stone-950 uppercase tracking-[0.5em] italic" colspan="2">UTILIDAD_NETA_DEL_EJERCICIO</td>
                    <td class="py-12 px-12 text-right text-5xl font-headline font-black text-stone-950 tracking-tighter italic shadow-stone-950/20 drop-shadow-2xl">628.577,22 <span class="text-[18px] font-black not-italic uppercase">VES</span></td>
                    <td class="py-12 px-12 text-right text-[18px] font-black text-stone-950 italic">14.2%</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Technical Disclaimers: Industrial Oversight -->
    <footer class="mt-32 grid grid-cols-1 md:grid-cols-2 gap-20 opacity-60 hover:opacity-100 transition-all duration-700">
        <div class="p-10 border border-stone-800 bg-stone-900/40 rounded-[32px] backdrop-blur-xl relative overflow-hidden group">
            <div class="absolute inset-0 bg-primary/5 opacity-0 group-hover:opacity-100 transition-opacity"></div>
            <h4 class="text-[12px] font-black text-stone-400 uppercase tracking-[0.4em] mb-6 flex items-center gap-4 italic relative z-10">
                <span class="material-symbols-outlined text-[20px] text-primary">analytics</span>
                NOTAS_AUDITORÍA_COMPLEMENTARIAS
            </h4>
            <p class="text-[12px] text-stone-500 leading-loose font-mono uppercase italic relative z-10 group-hover:text-stone-300 transition-colors">
                REPORTE GENERADO BAJO STANDAR NIIF (IFRS). COSTO DE VENTA INCLUYE AJUSTES POR DESVALORIZACIÓN DE INVENTARIO OBSOLETO SEGÚN PROTOCOLO ZENITH_INTERNAL_STOCK_4.0. GASTOS PRORRATEADOS POR CONSUMO DIRECTO.
            </p>
        </div>
        <div class="flex flex-col justify-end items-end gap-8 px-10">
            <div class="flex items-center gap-10">
                <div class="flex flex-col items-end">
                    <span class="text-[12px] font-black text-stone-600 uppercase tracking-[0.4em] mb-4 italic">Authorizing_Node_Finance</span>
                    <span class="text-[16px] font-black uppercase text-white tracking-widest italic">DIRECCIÓN_FINANZAS_CENTRAL</span>
                    <div class="w-48 h-1 bg-primary/20 mt-6 rounded-full overflow-hidden">
                        <div class="h-full bg-primary w-[75%]"></div>
                    </div>
                </div>
                <div class="w-16 h-16 rounded-full border border-primary/30 flex items-center justify-center bg-primary/5 shadow-[0_0_20px_rgba(206,255,94,0.1)]">
                    <span class="material-symbols-outlined text-primary text-[32px]">verified_user</span>
                </div>
            </div>
            <p class="text-[11px] font-black text-stone-700 uppercase tracking-[0.3em] font-mono italic">TRANSMISSION_STAMP: 2026-10-24_14:35_UTC-4 // BY: ZENITH_SYSTEM_CORE</p>
        </div>
    </footer>
</div>
>
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('erp/js/estado-resultados.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const main = document.querySelector('main');
            if(main) {
                main.classList.remove('bg-background', 'bg-stone-50');
                main.classList.add('bg-zinc-950');
            }
        });
    </script>
@endpush
