@extends('erp.layouts.app')

@section('title', 'Libro Caja | ERP La Cima')

@section('breadcrumb')
    <a href="{{ url('/erp/contabilidad') }}" class="hover:text-stone-900">Contabilidad</a>
    <span class="material-symbols-outlined text-sm">chevron_right</span>
    <span class="text-stone-900 font-medium">Libro Caja</span>
@endsection

@section('content')
<!-- Header & Real-Time Balances: Liquidity Node Oversight -->
<div class="flex flex-col gap-10 mb-16 relative z-10">
    <div class="flex flex-col md:flex-row justify-between items-end gap-10 border-b border-primary/20 pb-12">
        <div>
            <div class="flex items-center gap-4 mb-6">
                <span class="bg-primary/20 text-primary border border-primary/30 px-5 py-2 text-[12px] font-black uppercase tracking-[0.4em] italic shadow-[0_0_20px_rgba(206,255,94,0.15)]">CASH_FLOW_MONITOR_V1.0</span>
                <span class="text-stone-600 font-mono text-[11px] uppercase tracking-widest italic font-black">STREAM_ID: BANCO_NOD_0xFC32</span>
            </div>
            <h1 class="text-5xl md:text-7xl font-headline font-black tracking-tighter uppercase italic text-white mb-4">BANKING_MAGNITUDES</h1>
            <p class="text-[14px] font-black text-stone-500 uppercase tracking-[0.5em] italic">Consolidated_Saldos_RealTime <span class="text-primary/40 not-italic">•</span> SYNC_ACTIVE</p>
        </div>
        <div class="flex gap-6">
            <button class="bg-stone-900 hover:bg-stone-800 border border-stone-800 px-8 py-5 text-[12px] font-black uppercase tracking-[0.4em] flex items-center gap-4 transition-all text-stone-300 rounded-[20px] shadow-xl group">
                <span class="material-symbols-outlined text-[22px] text-primary group-hover:scale-125 transition-transform">file_download</span>
                <span>EXPORT_RAW_DATA</span>
            </button>
            <button class="bg-primary hover:brightness-110 text-stone-950 px-8 py-5 text-[12px] font-black uppercase tracking-[0.5em] flex items-center gap-4 transition-all rounded-[20px] shadow-[0_0_40px_rgba(206,255,94,0.2)]">
                <span class="material-symbols-outlined text-[22px]">sync_alt</span>
                <span>EXECUTE_RECONCILIATION</span>
            </button>
        </div>
    </div>

    <!-- Dashboard Grid: Liquidity Probes -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-stone-900 border border-stone-800 p-8 rounded-[40px] shadow-2xl border-l-[12px] border-l-primary group transition-all hover:bg-stone-800/80">
            <p class="text-[12px] font-black text-stone-600 uppercase tracking-[0.4em] mb-4 italic group-hover:text-stone-400">Banco_Santander_Operat</p>
            <p class="text-4xl font-headline font-black text-white italic tracking-tighter mb-4">1.452.380,00</p>
            <div class="flex items-center gap-3 text-[11px] text-primary font-black uppercase tracking-widest bg-primary/5 px-4 py-1.5 rounded-full border border-primary/10 w-fit">
                <span class="material-symbols-outlined text-[16px]">arrow_upward</span>
                <span>+2.4%_DELTA_24H</span>
            </div>
        </div>
        <div class="bg-stone-900 border border-stone-800 p-8 rounded-[40px] shadow-2xl group transition-all hover:bg-stone-800/80">
            <p class="text-[12px] font-black text-stone-600 uppercase tracking-[0.4em] mb-4 italic group-hover:text-stone-400">BBVA_Reserva_Node</p>
            <p class="text-4xl font-headline font-black text-white italic tracking-tighter mb-4">845.000,50</p>
            <div class="flex items-center gap-3 text-[11px] text-stone-600 font-black uppercase tracking-widest bg-stone-950 px-4 py-1.5 rounded-full border border-white/5 w-fit">
                <span class="material-symbols-outlined text-[16px]">timer</span>
                <span>SYNC: 2H_AGO</span>
            </div>
        </div>
        <div class="bg-stone-900 border border-stone-800 p-8 rounded-[40px] shadow-2xl group transition-all hover:bg-stone-800/80">
            <p class="text-[12px] font-black text-stone-600 uppercase tracking-[0.4em] mb-4 italic group-hover:text-stone-400">Caja_Chica_Planta_1</p>
            <p class="text-4xl font-headline font-black text-white italic tracking-tighter mb-4">12.400,00</p>
            <div class="flex items-center gap-3 text-[11px] text-red-500 font-black uppercase tracking-widest bg-red-500/5 px-4 py-1.5 rounded-full border border-red-500/10 w-fit">
                <span class="material-symbols-outlined text-[16px]">warning</span>
                <span>LOW_LIQUID_REPLENISH</span>
            </div>
        </div>
        <div class="bg-primary p-8 rounded-[40px] shadow-[0_0_50px_rgba(206,255,94,0.15)] relative overflow-hidden group">
            <div class="absolute inset-0 bg-stone-950/5 opacity-0 group-hover:opacity-100 transition-opacity"></div>
            <p class="text-[12px] font-black text-stone-950/60 uppercase tracking-[0.4em] mb-4 italic">Consolidated_Magn_Total</p>
            <p class="text-4xl font-headline font-black text-stone-950 italic tracking-tighter mb-4">2.309.780,50</p>
            <div class="flex items-center gap-3 text-[11px] text-stone-950 font-black uppercase tracking-widest bg-stone-950/10 px-4 py-1.5 rounded-full border border-stone-950/10 w-fit">
                <span class="material-symbols-outlined text-[16px]">verified</span>
                <span>AUDIT_SECURED_100%</span>
            </div>
        </div>
    </div>
</div>

<!-- Section 1: Libro de Movimientos & Conciliación: Transaction Feed -->
<section class="grid grid-cols-1 lg:grid-cols-3 gap-12 mb-20 relative z-10">
    <div class="lg:col-span-2 space-y-8">
        <div class="flex justify-between items-center bg-stone-900/50 p-6 rounded-[32px] border border-white/5">
            <h2 class="text-2xl font-headline font-black uppercase tracking-tighter text-white italic">01 <span class="text-stone-600 not-italic">/ MOVEMENT_LOG</span></h2>
            <div class="relative w-96">
                <input class="w-full bg-stone-950 border border-stone-800 text-[12px] font-black uppercase tracking-widest px-12 py-4 focus:ring-1 focus:ring-primary rounded-2xl text-white placeholder:text-stone-800 transition-all shadow-inner" placeholder="FILTER_BY_CONCEPT_OR_ID..." type="text"/>
                <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-stone-800">search</span>
            </div>
        </div>
        <div class="bg-stone-950 border border-stone-800 rounded-[40px] shadow-3xl overflow-hidden">
            <table class="w-full text-left border-collapse font-mono">
                <thead>
                    <tr class="bg-stone-900 text-stone-500 text-[12px] uppercase font-black tracking-[0.4em] border-b border-white/5 italic">
                        <th class="px-8 py-6">Timestamp</th>
                        <th class="px-8 py-6">Ref_ID</th>
                        <th class="px-8 py-6">Concept_Meta</th>
                        <th class="px-8 py-6 text-right">Magnitude</th>
                        <th class="px-8 py-6 text-center">Status</th>
                    </tr>
                </thead>
                <tbody class="text-[12px] text-stone-500">
                    <tr class="hover:bg-primary/5 transition-all group border-b border-white/5">
                        <td class="px-8 py-6 font-black italic">2026-10-24</td>
                        <td class="px-8 py-6 px-4 py-1.5"><span class="bg-white/5 px-3 py-1.5 rounded-lg border border-white/5 text-primary">#TRF-9023</span></td>
                        <td class="px-8 py-6 font-black text-stone-400 group-hover:text-white uppercase transition-colors">Pago_Proveedor_Acero_Inox</td>
                        <td class="px-8 py-6 text-right font-black text-red-500 italic text-[14px]">-250.000,00</td>
                        <td class="px-8 py-6 text-center">
                            <span class="material-symbols-outlined text-primary text-[24px] shadow-[0_0_15px_#ceff5e33]">check_circle</span>
                        </td>
                    </tr>
                    <tr class="bg-stone-900/20 hover:bg-primary/5 transition-all group border-b border-white/5">
                        <td class="px-8 py-6 font-black italic">2026-10-24</td>
                        <td class="px-8 py-6 px-4 py-1.5"><span class="bg-white/5 px-3 py-1.5 rounded-lg border border-white/5 text-primary">#CHQ-4451</span></td>
                        <td class="px-8 py-6 font-black text-stone-400 group-hover:text-white uppercase transition-colors">Cobro_Factura_#V-998 (Cliente_Ind)</td>
                        <td class="px-8 py-6 text-right font-black text-primary italic text-[14px]">+180.500,00</td>
                        <td class="px-8 py-6 text-center">
                            <span class="material-symbols-outlined text-stone-800 text-[24px] group-hover:text-primary transition-colors">history</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Conciliación Rápida AI: Strategic Diagnostics -->
    <div class="space-y-10">
        <div class="bg-stone-900 border border-primary/20 p-10 rounded-[40px] shadow-3xl relative overflow-hidden group">
            <div class="absolute top-0 right-0 w-48 h-48 bg-primary/10 blur-3xl rounded-full -translate-y-1/2 translate-x-1/2 group-hover:bg-primary/20 transition-all duration-1000"></div>
            <h3 class="text-[12px] font-black uppercase tracking-[0.5em] text-primary mb-8 italic relative z-10">STRATEGIC_MATCH_AI</h3>
            <p class="text-[12px] text-stone-500 leading-relaxed font-mono uppercase italic mb-8 relative z-10 transition-colors group-hover:text-stone-300">
                DETECTADOS_4_MOVIMIENTOS_BANCARIOS CON_MATCH_FISCAL_DE_CARTERA_PENDIENTE.
            </p>
            <div class="space-y-4 relative z-10">
                <div class="bg-stone-950 rounded-2xl p-6 flex justify-between items-center group/item cursor-pointer hover:bg-stone-900 transition-all border border-white/5 hover:border-primary/30 shadow-2xl">
                    <div>
                        <div class="text-[11px] text-primary font-black uppercase tracking-[0.4em] mb-2 font-mono">NODE_MATCH: 98.42%</div>
                        <div class="text-[14px] font-black text-white italic uppercase tracking-tighter">DEPOSIT_MAGN: 45.000,00</div>
                    </div>
                    <span class="material-symbols-outlined text-primary opacity-0 group-hover/item:opacity-100 transition-all group-hover/item:translate-x-2">arrow_forward</span>
                </div>
                <button class="w-full bg-primary text-stone-950 rounded-[20px] text-[12px] font-black p-6 uppercase tracking-[0.5em] mt-6 hover:brightness-110 shadow-[0_0_30px_rgba(206,255,94,0.1)] transition-all">
                    AUTO_CONCILIATE_EXEC
                </button>
            </div>
        </div>

        <div class="bg-stone-950 border border-stone-800 p-8 rounded-[40px] shadow-2xl group transition-all hover:border-white/10">
            <h3 class="text-[12px] font-black uppercase tracking-[0.5em] text-stone-600 mb-8 italic group-hover:text-stone-400 transition-colors">Monthly_Liquidity_Flow</h3>
            <div class="h-40 flex items-end gap-3 px-4 mb-4">
                <div class="flex-1 bg-primary/10 h-[60%] hover:bg-primary/40 transition-all rounded-[6px] border border-primary/20"></div>
                <div class="flex-1 bg-primary/10 h-[40%] hover:bg-primary/40 transition-all rounded-[6px] border border-primary/20"></div>
                <div class="flex-1 bg-primary/10 h-[85%] hover:bg-primary/40 transition-all rounded-[6px] border border-primary/20"></div>
                <div class="flex-1 bg-primary/10 h-[55%] hover:bg-primary/40 transition-all rounded-[6px] border border-primary/20"></div>
                <div class="flex-1 bg-primary h-[95%] rounded-[6px] shadow-[0_0_20px_#ceff5e44]"></div>
            </div>
            <div class="flex justify-between mt-4 text-[11px] text-stone-700 font-black uppercase tracking-[0.4em] font-mono italic">
                <span>JAN</span><span>FEB</span><span>MAR</span><span>APR</span><span class="text-primary">MAY</span>
            </div>
        </div>
    </div>
</section>

<!-- Section 2: Antigüedad de Saldos: Risk Magnitudes -->
<section class="space-y-10 relative z-10 mb-20">
    <div class="flex flex-col md:flex-row justify-between items-end gap-10">
        <div>
            <h2 class="text-3xl font-headline font-black uppercase tracking-tighter text-white italic mb-2">02 <span class="text-stone-600 not-italic">/ AGING_CARTERA_RISK</span></h2>
            <p class="text-[12px] text-stone-600 font-black uppercase tracking-[0.4em] italic">Magnitud_Deuda_Timeline_Analysis</p>
        </div>
        <div class="flex items-center gap-10 bg-stone-900/50 px-8 py-4 rounded-full border border-white/5">
            <div class="flex items-center gap-3">
                <div class="w-4 h-4 bg-primary rounded shadow-[0_0_10px_#ceff5e66]"></div>
                <span class="text-[11px] font-black uppercase text-stone-500 tracking-[0.2em] italic">CORRIENTE</span>
            </div>
            <div class="flex items-center gap-3">
                <div class="w-4 h-4 bg-stone-600 rounded"></div>
                <span class="text-[11px] font-black uppercase text-stone-500 tracking-[0.2em] italic">30_60_DAYS</span>
            </div>
            <div class="flex items-center gap-3">
                <div class="w-4 h-4 bg-red-500 rounded shadow-[0_0_10px_#ef444466]"></div>
                <span class="text-[11px] font-black uppercase text-stone-500 tracking-[0.2em] italic">>90_DAYS_CRIT</span>
            </div>
        </div>
    </div>

    <div class="bg-stone-900 border border-stone-800 rounded-[40px] p-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 shadow-3xl">
        <!-- Cliente 1 -->
        <div class="border-l-4 border-stone-800 pl-8 group hover:border-primary transition-all">
            <div class="text-[14px] font-black uppercase mb-2 text-white italic group-hover:text-primary transition-colors tracking-tight">INDUSTRIAL_S.A.</div>
            <div class="text-[12px] text-stone-600 font-black uppercase tracking-[0.3em] mb-6 italic">Mag: 1.2M_VES</div>
            <div class="flex gap-2 h-3 mb-6 rounded-full overflow-hidden bg-stone-950 border border-white/5">
                <div class="w-[80%] bg-primary shadow-[0_0_15px_#ceff5e44]"></div>
                <div class="w-[15%] bg-stone-700"></div>
                <div class="w-[5%] bg-red-600"></div>
            </div>
            <div class="flex justify-between text-[11px] font-black uppercase font-mono italic">
                <span class="text-primary/60">0.80_MAG_SECURED</span>
                <span class="text-stone-700">LOW_EXPOSURE</span>
            </div>
        </div>
        <!-- Cliente 2 -->
        <div class="border-l-4 border-stone-800 pl-8 group hover:border-red-500 transition-all">
            <div class="text-[14px] font-black uppercase mb-2 text-white italic group-hover:text-red-500 transition-colors tracking-tight">MINERA_DEL_NORTE</div>
            <div class="text-[12px] text-stone-600 font-black uppercase tracking-[0.3em] mb-6 italic">Mag: 840K_VES</div>
            <div class="flex gap-2 h-3 mb-6 rounded-full overflow-hidden bg-stone-950 border border-white/5">
                <div class="w-[40%] bg-primary"></div>
                <div class="w-[40%] bg-stone-700"></div>
                <div class="w-[20%] bg-red-500 shadow-[0_0_15px_#ef444444]"></div>
            </div>
            <div class="flex justify-between text-[11px] font-black uppercase font-mono italic">
                <span class="text-stone-700">0.40_VENCIDO_MAG</span>
                <span class="text-red-500">HI_RISK_ALERT</span>
            </div>
        </div>
        <!-- Cliente 3 -->
        <div class="border-l-4 border-stone-800 pl-8 group hover:border-primary transition-all">
            <div class="text-[14px] font-black uppercase mb-2 text-white italic group-hover:text-primary transition-colors tracking-tight">LOGÍSTICA_GLOBAL</div>
            <div class="text-[12px] text-stone-600 font-black uppercase tracking-[0.3em] mb-6 italic">Mag: 3.5M_VES</div>
            <div class="flex gap-2 h-3 mb-6 rounded-full overflow-hidden bg-stone-950 border border-white/5">
                <div class="w-[95%] bg-primary shadow-[0_0_15px_#ceff5e44]"></div>
                <div class="w-[5%] bg-stone-700"></div>
            </div>
            <div class="flex justify-between text-[11px] font-black uppercase font-mono italic">
                <span class="text-primary/60">0.95_RECV_CONFIRMED</span>
                <span class="text-primary/60">TOP_GRADE</span>
            </div>
        </div>
        <!-- Cliente 4 -->
        <div class="border-l-4 border-red-500/50 pl-8 group hover:border-red-500 transition-all">
            <div class="text-[14px] font-black uppercase mb-2 text-red-500 italic transition-colors tracking-tight">SUMINISTROS_FERROSOS</div>
            <div class="text-[12px] text-stone-600 font-black uppercase tracking-[0.3em] mb-6 italic">Mag: 150K_VES</div>
            <div class="flex gap-2 h-3 mb-6 rounded-full overflow-hidden bg-stone-950 border border-white/5">
                <div class="w-[10%] bg-primary"></div>
                <div class="w-[20%] bg-stone-700"></div>
                <div class="w-[70%] bg-red-500 shadow-[0_0_15px_#ef444466]"></div>
            </div>
            <div class="flex justify-between text-[11px] font-black uppercase font-mono italic">
                <span class="text-red-900">0.70_OVERDUE_MAG</span>
                <span class="text-red-500 animate-pulse">ACTION_REQUIRED</span>
            </div>
        </div>
    </div>

    <!-- Resumen de Riesgo: Consolidated Diagnostics -->
    <div class="bg-stone-950 border border-stone-800 rounded-[40px] p-6 flex flex-col md:flex-row justify-between items-center shadow-3xl overflow-hidden group/footer">
        <div class="flex flex-wrap gap-12 px-8">
            <div class="border-r border-white/5 pr-12">
                <div class="text-[12px] font-black text-stone-600 uppercase tracking-[0.4em] mb-4 italic transition-colors group-hover/footer:text-stone-400">Cartera_Corriente_MAG</div>
                <div class="text-3xl font-headline font-black text-white italic tracking-tighter shadow-primary/10 drop-shadow-xl">12.450.000,00</div>
            </div>
            <div class="border-r border-white/5 pr-12">
                <div class="text-[12px] font-black text-stone-600 uppercase tracking-[0.4em] mb-4 italic transition-colors group-hover/footer:text-stone-400">Monto_en_Riesgo_CRIT</div>
                <div class="text-3xl font-headline font-black text-red-500 italic tracking-tighter shadow-red-500/10 drop-shadow-xl">842.000,00</div>
            </div>
            <div>
                <div class="text-[12px] font-black text-stone-600 uppercase tracking-[0.4em] mb-4 italic transition-colors group-hover/footer:text-stone-400">Avg_Days_Payment_PULSE</div>
                <div class="text-3xl font-headline font-black text-white italic tracking-tighter">42_DÍAS</div>
            </div>
        </div>
        <button class="bg-stone-900 text-primary border border-primary/20 rounded-[24px] px-12 py-5 text-[12px] font-black uppercase tracking-[0.5em] hover:bg-primary hover:text-stone-950 hover:shadow-[0_0_30px_rgba(206,255,94,0.3)] transition-all italic mt-8 md:mt-0">
            VIEW_ANALYTIC_REPORT_TRANSMISSION
        </button>
    </div>
</section>

@endsection

@push('scripts')
    <script src="{{ asset('erp/js/libro-caja.js') }}"></script>
@endpush
