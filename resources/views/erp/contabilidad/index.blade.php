@extends('erp.layouts.app')

@section('title', 'Contabilidad | ERP La Cima')

@section('breadcrumb')
    <span class="text-stone-900">Contabilidad</span>
@endsection

@section('content')
<!-- Page Header: Industrial Identity & Transmission Node -->
<div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-10 mb-16 relative">
    <div class="relative z-10">
        <div class="flex items-center gap-4 mb-6">
            <span class="w-12 h-1 bg-primary rounded-full shadow-[0_0_15px_rgba(206,255,94,0.4)]"></span>
            <p class="text-[12px] font-black text-stone-500 uppercase tracking-[0.4em] italic leading-none">Node_Transmission: FIDUCIARY_MASTER_V1</p>
        </div>
        <h2 class="text-6xl md:text-8xl font-headline font-black text-stone-950 tracking-tighter uppercase italic leading-[0.8] mb-6">Accounting <br/><span class="text-stone-300 not-italic">Hub</span></h2>
        <div class="flex items-center gap-3">
            <span class="px-3 py-1 bg-stone-950 text-primary text-[10px] font-black uppercase tracking-widest rounded italic">LIVE_FEED</span>
            <p class="text-stone-400 text-[11px] font-black uppercase tracking-[0.3em] italic">
                LA CIMA, C.A. • ALPHA_FINANCE_GATEWAY_300
            </p>
        </div>
    </div>
    <div class="flex gap-4 relative z-10">
        <a href="{{ url('/erp/contabilidad/libro-diario') }}" class="bg-stone-950 text-white px-10 py-5 rounded-[24px] flex items-center gap-5 hover:bg-stone-900 transition-all font-black uppercase text-[12px] tracking-[0.3em] shadow-2xl shadow-stone-950/20 italic group">
            <span class="material-symbols-outlined text-[24px] text-primary group-hover:rotate-12 transition-transform">menu_book</span>
            Master_Ledger_Sync
        </a>
    </div>
    <div class="absolute -top-20 -right-20 w-96 h-96 bg-primary/5 rounded-full blur-[120px] pointer-events-none"></div>
</div>

<!-- KPI Bento Grid: Analytical Magnitudes -->
<div id="tour-accounting-stats" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-16">
    <!-- Revenue -->
    <div class="bg-white border border-stone-100 p-10 rounded-[40px] shadow-2xl shadow-stone-200/50 relative group overflow-hidden transition-all hover:border-primary/40">
        <div class="absolute inset-0 opacity-[0.02] group-hover:opacity-[0.05] transition-opacity" style="background-image: radial-gradient(#000 1px, transparent 1px); background-size: 20px 20px;"></div>
        <div class="flex items-center justify-between mb-10 relative z-10">
            <div class="w-14 h-14 bg-stone-950 text-primary rounded-2xl flex items-center justify-center shadow-2xl shadow-stone-950/40 group-hover:scale-110 transition-transform">
                <span class="material-symbols-outlined text-3xl">trending_up</span>
            </div>
            <div class="flex flex-col items-end">
                <span class="text-[12px] font-black text-green-600 italic tracking-[0.1em]">+12.4%_DELTA</span>
                <span class="text-[9px] text-stone-400 uppercase font-black italic">MAGNITUDE_ACCEL</span>
            </div>
        </div>
        <p class="text-[11px] font-black text-stone-400 uppercase tracking-[0.4em] mb-4 italic relative z-10">Monthly_Gross_Yield</p>
        <div class="flex items-baseline gap-2 relative z-10">
            <span class="text-4xl font-headline font-black text-stone-950 italic tracking-tighter leading-none">${{ number_format($stats['ingresos_mes'], 2) }}</span>
        </div>
        <div class="mt-8 pt-8 border-t border-stone-50 relative z-10">
            <p class="text-[11px] text-stone-400 font-black uppercase tracking-[0.3em] italic">Transmission_Verified_O1</p>
        </div>
    </div>

    <!-- Expenses -->
    <div class="bg-white border border-stone-100 p-10 rounded-[40px] shadow-2xl shadow-stone-200/50 relative group overflow-hidden transition-all hover:border-red-500/20">
        <div class="absolute inset-0 opacity-[0.02] group-hover:opacity-[0.05] transition-opacity" style="background-image: radial-gradient(#000 1px, transparent 1px); background-size: 20px 20px;"></div>
        <div class="flex items-center justify-between mb-10 relative z-10">
            <div class="w-14 h-14 bg-stone-950 text-red-500 rounded-2xl flex items-center justify-center shadow-2xl shadow-stone-950/40 group-hover:scale-110 transition-transform">
                <span class="material-symbols-outlined text-3xl">trending_down</span>
            </div>
            <div class="flex flex-col items-end">
                <span class="text-[12px] font-black text-red-600 italic tracking-[0.1em]">-5.2%_DELTA</span>
                <span class="text-[9px] text-stone-400 uppercase font-black italic">LEAKAGE_REDUCT</span>
            </div>
        </div>
        <p class="text-[11px] font-black text-stone-400 uppercase tracking-[0.4em] mb-4 italic relative z-10">Operational_Outflow</p>
        <div class="flex items-baseline gap-2 relative z-10">
            <span class="text-4xl font-headline font-black text-stone-950 italic tracking-tighter leading-none text-red-500">${{ number_format($stats['gastos_mes'], 2) }}</span>
        </div>
        <div class="mt-8 pt-8 border-t border-stone-50 relative z-10">
            <p class="text-[11px] text-stone-400 font-black uppercase tracking-[0.3em] italic">Resource_Drain_Loop</p>
        </div>
    </div>

    <!-- Net Utility -->
    <div class="bg-white border border-stone-100 p-10 rounded-[40px] shadow-2xl shadow-stone-200/50 relative group overflow-hidden transition-all hover:border-primary/40">
        <div class="absolute inset-0 opacity-[0.02] group-hover:opacity-[0.05] transition-opacity" style="background-image: radial-gradient(#ceff5e 1px, transparent 1px); background-size: 20px 20px;"></div>
        <div class="flex items-center justify-between mb-10 relative z-10">
            <div class="w-14 h-14 bg-stone-950 text-primary rounded-2xl flex items-center justify-center shadow-2xl shadow-stone-950/40 group-hover:scale-110 transition-transform">
                <span class="material-symbols-outlined text-3xl">savings</span>
            </div>
            <div class="flex flex-col items-end">
                <span class="text-[12px] font-black text-primary italic tracking-widest bg-stone-950 px-3 py-1 rounded">33.7%_MARGIN</span>
            </div>
        </div>
        <p class="text-[11px] font-black text-stone-400 uppercase tracking-[0.4em] mb-4 italic relative z-10">Net_Utility_Protocol</p>
        <div class="flex items-baseline gap-2 relative z-10">
            <span class="text-4xl font-headline font-black text-stone-950 italic tracking-tighter leading-none">${{ number_format($stats['utilidad_neta'], 2) }}</span>
        </div>
        <div class="mt-8 pt-8 border-t border-stone-50 relative z-10">
            <p class="text-[11px] text-stone-400 font-black uppercase tracking-[0.3em] italic">Equilibrium_State_Active</p>
        </div>
    </div>

    <!-- Tax Liability -->
    <div class="bg-stone-950 border border-stone-800 p-10 rounded-[40px] group shadow-2xl relative overflow-hidden transition-all hover:border-primary/40">
        <div class="absolute inset-0 opacity-[0.05] group-hover:opacity-[0.1] transition-opacity" style="background-image: radial-gradient(#ceff5e 1.5px, transparent 1.5px); background-size: 20px 20px;"></div>
        <div class="flex items-center justify-between mb-10 relative z-10">
            <div class="w-14 h-14 bg-stone-900 border border-stone-800 text-primary rounded-2xl flex items-center justify-center shadow-2xl transition-transform group-hover:scale-110">
                <span class="material-symbols-outlined text-3xl">gavel</span>
            </div>
            <div class="flex flex-col items-end">
                <span class="text-[11px] font-black text-primary italic font-mono uppercase tracking-[0.2em] animate-pulse">NEXT_CYCLE: 30D</span>
            </div>
        </div>
        <p class="text-[11px] font-black text-stone-500 uppercase tracking-[0.4em] mb-4 relative z-10 italic">Tax_Liability_Gateway</p>
        <div class="flex items-baseline gap-2 relative z-10">
            <span class="text-4xl font-headline font-black text-white italic tracking-tighter leading-none">${{ number_format($stats['iva_por_pagar'], 2) }}</span>
        </div>
        <div class="mt-8 pt-8 border-t border-white/5 relative z-10">
            <p class="text-[11px] text-stone-600 font-black uppercase tracking-[0.3em] italic">Fiscal_Block_Stabilized</p>
        </div>
    </div>
</div>

<!-- System Interaction Panel: Quick Architecture Access -->
<div id="tour-accounting-actions" class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-16">
    <a href="{{ url('/erp/contabilidad/plan-cuentas') }}" class="group bg-primary text-stone-950 p-12 rounded-[40px] flex flex-col items-center justify-center gap-8 transition-all hover:bg-stone-950 hover:text-primary active:scale-95 shadow-2xl shadow-primary/30 border-2 border-transparent hover:border-primary/20 relative overflow-hidden">
        <div class="absolute inset-0 opacity-[0.1] bg-white group-hover:opacity-[0.05] transition-opacity"></div>
        <span class="material-symbols-outlined text-6xl group-hover:scale-125 group-hover:rotate-[360deg] transition-all duration-700 relative z-10">format_list_numbered</span>
        <div class="text-center relative z-10">
            <p class="text-[14px] font-black uppercase tracking-[0.4em] italic leading-none">Chart_Accounts</p>
            <p class="text-[11px] font-black uppercase tracking-widest opacity-60 mt-4">{{ $stats['cuentas_count'] }} Entities_Mapped</p>
        </div>
    </a>
    <a href="{{ url('/erp/contabilidad/libros') }}" class="group bg-white border border-stone-100 p-12 rounded-[40px] flex flex-col items-center justify-center gap-8 transition-all hover:border-primary active:scale-95 shadow-2xl shadow-stone-200/50 relative overflow-hidden">
        <div class="absolute inset-0 opacity-[0.02] group-hover:opacity-[0.05] bg-stone-950 transition-opacity"></div>
        <span class="material-symbols-outlined text-6xl group-hover:scale-125 transition-all duration-700 text-stone-300 group-hover:text-primary relative z-10">menu_book</span>
        <span class="text-[14px] font-black uppercase tracking-[0.4em] italic text-center leading-none text-stone-950 relative z-10">Legal_Ledgers</span>
    </a>
    <a href="{{ url('/erp/contabilidad/balance-general') }}" class="group bg-white border border-stone-100 p-12 rounded-[40px] flex flex-col items-center justify-center gap-8 transition-all hover:border-primary active:scale-95 shadow-2xl shadow-stone-200/50 relative overflow-hidden">
        <div class="absolute inset-0 opacity-[0.02] group-hover:opacity-[0.05] bg-stone-950 transition-opacity"></div>
        <span class="material-symbols-outlined text-6xl group-symbols-outlined group-hover:scale-125 transition-all duration-700 text-stone-300 group-hover:text-primary relative z-10">balance</span>
        <span class="text-[14px] font-black uppercase tracking-[0.4em] italic text-center leading-none text-stone-950 relative z-10">Balance_Sheet</span>
    </a>
    <a href="{{ url('/erp/contabilidad/reportes') }}" class="group bg-white border border-stone-100 p-12 rounded-[40px] flex flex-col items-center justify-center gap-8 transition-all hover:border-primary active:scale-95 shadow-2xl shadow-stone-200/50 relative overflow-hidden">
        <div class="absolute inset-0 opacity-[0.02] group-hover:opacity-[0.05] bg-stone-950 transition-opacity"></div>
        <span class="material-symbols-outlined text-6xl group-hover:scale-125 transition-all duration-700 text-stone-300 group-hover:text-primary relative z-10">analytics</span>
        <span class="text-[14px] font-black uppercase tracking-[0.4em] italic text-center leading-none text-stone-950 relative z-10">Fiscal_Analytica</span>
    </a>
</div>

<!-- Accounting Summary: Fiduciary Loops -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-16">
    <!-- Income Statement Summary -->
    <div class="bg-white rounded-[40px] border border-stone-100 p-12 shadow-2xl shadow-stone-200/50 relative overflow-hidden group transition-all hover:border-primary/20">
        <div class="absolute inset-0 opacity-[0.01] group-hover:opacity-[0.03] transition-opacity" style="background-image: radial-gradient(#000 2px, transparent 2px); background-size: 30px 30px;"></div>
        <div class="flex items-center gap-8 mb-12 border-b border-stone-50 pb-10 relative z-10">
            <div class="w-16 h-16 bg-stone-950 rounded-[20px] flex items-center justify-center text-primary shadow-2xl shadow-stone-950/40">
                <span class="material-symbols-outlined text-3xl">monitoring</span>
            </div>
            <div>
                <h3 class="text-3xl font-headline font-black text-stone-950 uppercase tracking-tighter italic leading-none">Net_Profit_Timeline</h3>
                <p class="text-[11px] text-stone-400 font-black uppercase tracking-[0.3em] mt-3 italic">Current_Cycle: ANALYTICAL_FEED</p>
            </div>
        </div>

        <div class="space-y-6 relative z-10">
            <div class="flex justify-between items-center p-8 bg-stone-50 rounded-[28px] border border-stone-100 transition-all hover:bg-white hover:shadow-xl hover:border-primary/10">
                <span class="text-[12px] font-black text-stone-500 uppercase tracking-[0.3em] italic">Magnitude: TOTAL_INFLUX</span>
                <span class="text-[20px] font-mono font-black text-green-600 italic tracking-tighter">${{ number_format($balances['ingresos'], 2) }}</span>
            </div>
            <div class="flex justify-between items-center p-8 bg-stone-50 rounded-[28px] border border-stone-100 transition-all hover:bg-white hover:shadow-xl hover:border-red-500/10">
                <span class="text-[12px] font-black text-stone-500 uppercase tracking-[0.3em] italic">Magnitude: RESOURCE_DRAIN</span>
                <span class="text-[20px] font-mono font-black text-red-500 italic tracking-tighter">(${{ number_format($balances['egresos'], 2) }})</span>
            </div>
            <div class="mt-12 pt-12 border-t border-stone-100 flex justify-between items-center px-6">
                <div class="flex flex-col">
                    <span class="text-[11px] font-black text-stone-400 uppercase tracking-[0.3em] italic mb-2 italic">Yield_Consolidation</span>
                    <span class="text-[12px] font-black text-stone-950 uppercase tracking-[0.4em] italic leading-none">Final_Magnitude</span>
                </div>
                <span class="text-5xl font-headline font-black text-green-600 italic tracking-tighter leading-none">${{ number_format($balances['ingresos'] - $balances['egresos'], 2) }}</span>
            </div>
        </div>
        <span class="material-symbols-outlined absolute -right-12 -bottom-12 text-[200px] opacity-[0.03] text-stone-950 pointer-events-none rotate-12 group-hover:opacity-[0.06] group-hover:rotate-0 transition-all duration-1000">receipt</span>
    </div>

    <!-- Balance Sheet Summary -->
    <div class="bg-white rounded-[40px] border border-stone-100 p-12 shadow-2xl shadow-stone-200/50 relative overflow-hidden group transition-all hover:border-primary/20">
        <div class="absolute inset-0 opacity-[0.01] group-hover:opacity-[0.03] transition-opacity" style="background-image: radial-gradient(#000 2px, transparent 2px); background-size: 30px 30px;"></div>
        <div class="flex items-center gap-8 mb-12 border-b border-stone-50 pb-10 relative z-10">
            <div class="w-16 h-16 bg-stone-950 rounded-[20px] flex items-center justify-center text-primary shadow-2xl shadow-stone-950/40">
                <span class="material-symbols-outlined text-3xl">balance</span>
            </div>
            <div>
                <h3 class="text-3xl font-headline font-black text-stone-950 uppercase tracking-tighter italic leading-none">EQUILIBRIUM_INTEGRITY</h3>
                <p class="text-[11px] text-stone-400 font-black uppercase tracking-[0.3em] mt-3 italic">Aggregated_Fiduciary_Gate</p>
            </div>
        </div>

        <div class="space-y-6 relative z-10">
            <div class="grid grid-cols-3 gap-4">
                <div class="bg-stone-50 p-8 rounded-[28px] border border-stone-100 transition-all hover:bg-stone-950 hover:text-white hover:shadow-2xl group/card text-center">
                    <p class="text-[11px] font-black text-stone-400 uppercase tracking-[0.3em] mb-4 italic group-hover/card:text-primary transition-colors">Assets</p>
                    <p class="text-[18px] font-mono font-black text-stone-950 italic tracking-tighter group-hover/card:text-white transition-colors">${{ number_format($balances['activo'], 2) }}</p>
                </div>
                <div class="bg-stone-50 p-8 rounded-[28px] border border-stone-100 transition-all hover:bg-stone-950 hover:text-white hover:shadow-2xl group/card text-center">
                    <p class="text-[11px] font-black text-stone-400 uppercase tracking-[0.3em] mb-4 italic group-hover/card:text-primary transition-colors">Liability</p>
                    <p class="text-[18px] font-mono font-black text-stone-950 italic tracking-tighter group-hover/card:text-white transition-colors">${{ number_format($balances['pasivo'], 2) }}</p>
                </div>
                <div class="bg-stone-50 p-8 rounded-[28px] border border-stone-100 transition-all hover:bg-stone-950 hover:text-white hover:shadow-2xl group/card text-center">
                    <p class="text-[11px] font-black text-stone-400 uppercase tracking-[0.3em] mb-4 italic group-hover/card:text-primary transition-colors">Equity</p>
                    <p class="text-[18px] font-mono font-black text-stone-950 italic tracking-tighter group-hover/card:text-white transition-colors">${{ number_format($balances['patrimonio'], 2) }}</p>
                </div>
            </div>
            
            <div class="mt-12 pt-12 border-t border-stone-100 flex flex-col md:flex-row justify-between items-center gap-8 px-6">
                <div class="flex flex-col">
                    <span class="text-[11px] font-black text-stone-400 uppercase tracking-[0.3em] italic mb-2 italic">Duality_Loop_Protocol</span>
                    <span class="text-[12px] font-black text-stone-950 uppercase tracking-[0.4em] italic leading-none italic">Integrity_Verification</span>
                </div>
                <span class="px-10 py-3 rounded-2xl text-[12px] font-black uppercase tracking-[0.3em] italic border-2 transition-all duration-500 shadow-2xl {{ abs($balances['activo'] - ($balances['pasivo'] + $balances['patrimonio'])) < 0.01 ? 'bg-primary/10 text-stone-950 border-primary shadow-primary/20' : 'bg-red-500/10 text-red-600 border-red-500 shadow-red-500/20 animate-pulse' }}">
                    {{ abs($balances['activo'] - ($balances['pasivo'] + $balances['patrimonio'])) < 0.01 ? 'INTEGRITY_CHECK: PASS' : 'INTEGRITY_VIOLATION' }}
                </span>
            </div>
        </div>
        <span class="material-symbols-outlined absolute -right-12 -bottom-12 text-[200px] opacity-[0.03] text-stone-950 pointer-events-none rotate-12 group-hover:opacity-[0.06] group-hover:rotate-0 transition-all duration-1000">account_balance</span>
    </div>
</div>

<!-- Recent Journal Entries: Live Data Transmission -->
<div class="bg-stone-950 rounded-[40px] border border-stone-800 shadow-2xl p-12 mb-16 relative overflow-hidden group">
    <div class="absolute inset-0 opacity-[0.03] group-hover:opacity-[0.06] transition-opacity" style="background-image: radial-gradient(#ceff5e 1.5px, transparent 1.5px); background-size: 30px 30px;"></div>
    <div class="flex flex-col md:flex-row justify-between items-center mb-16 border-b border-white/5 pb-10 gap-10 relative z-10">
        <div class="flex items-center gap-8">
            <div class="w-16 h-16 bg-stone-900 border border-stone-800 rounded-[20px] flex items-center justify-center text-primary shadow-2xl">
                <span class="material-symbols-outlined text-3xl">receipt_long</span>
            </div>
            <div>
                <h3 class="text-3xl font-headline font-black text-white uppercase tracking-tighter italic leading-none">Journal_Transmission_Feed</h3>
                <p class="text-[11px] text-stone-500 font-black uppercase tracking-[0.3em] mt-3 italic">Live_Accounting_Logic_Loop</p>
            </div>
        </div>
        <a href="{{ url('/erp/contabilidad/libro-diario') }}" class="text-[12px] font-black uppercase tracking-[0.4em] text-primary hover:brightness-110 transition-all flex items-center gap-5 italic group/link">
            ACCESS_MASTER_FEED
            <span class="material-symbols-outlined text-[24px] group-hover/link:translate-x-3 transition-transform">arrow_forward</span>
        </a>
    </div>

    <div class="overflow-x-auto relative z-10">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-stone-900/50 text-stone-500 text-[11px] uppercase font-black italic">
                    <th class="px-10 py-6 text-left tracking-[0.3em]">Protocol_ID</th>
                    <th class="px-10 py-6 text-left tracking-[0.3em]">Timestamp</th>
                    <th class="px-10 py-6 text-left tracking-[0.3em]">Concept_Entropy</th>
                    <th class="px-10 py-6 text-right tracking-[0.3em]">Quantum</th>
                    <th class="px-10 py-6 text-center tracking-[0.3em]">Status_Code</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                @forelse($stats['asientos_recientes'] as $asiento)
                <tr class="group/row hover:bg-primary/5 transition-all">
                    <td class="px-10 py-8">
                        <span class="text-[11px] font-mono font-black text-stone-600 group-hover/row:text-primary transition-colors italic uppercase">AE_{{ str_pad($asiento->id, 5, '0', STR_PAD_LEFT) }}</span>
                    </td>
                    <td class="px-10 py-8">
                        <span class="text-[12px] font-black text-stone-400 group-hover/row:text-white uppercase tracking-tighter italic">{{ $asiento->fecha }}</span>
                    </td>
                    <td class="px-10 py-8">
                        <p class="text-[12px] font-black text-stone-300 group-hover/row:text-white uppercase italic tracking-tight leading-tight max-w-md">{{ $asiento->concepto }}</p>
                    </td>
                    <td class="px-10 py-8 text-right">
                        <span class="text-[18px] font-mono font-black text-white italic tracking-tighter leading-none group-hover/row:scale-110 transition-transform inline-block">${{ number_format($asiento->total_debe, 2) }}</span>
                    </td>
                    <td class="px-10 py-8 text-center italic">
                        <span class="px-6 py-2 rounded-full text-[10px] font-black uppercase tracking-[0.2em] border italic transition-all {{ $asiento->estado === 'CONTABILIZADO' ? 'bg-primary/10 text-primary border-primary/30 group-hover/row:bg-primary group-hover/row:text-stone-950' : 'bg-stone-800 text-stone-500 border-white/5' }}">
                            {{ $asiento->estado }}
                        </span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="py-32 text-center">
                        <div class="flex flex-col items-center gap-6 opacity-20">
                            <span class="material-symbols-outlined text-8xl">database_off</span>
                            <p class="text-[14px] font-black text-stone-400 uppercase tracking-[0.4em] italic">Transmission_Void: NO_ENTRIES_SYNCED</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>


@endsection

@push('scripts')
    <script src="{{ asset('erp/js/contabilidad.js') }}"></script>
@endpush
