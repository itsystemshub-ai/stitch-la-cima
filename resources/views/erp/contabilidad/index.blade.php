@extends('erp.layouts.app')

@section('title', 'Contabilidad | ERP La Cima')

@section('breadcrumb')
    <span class="text-stone-900">Contabilidad</span>
@endsection

@section('content')
<!-- Page Header: Industrial Identity -->
<div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-8 mb-12">
    <div>
        <div class="flex items-center gap-3 mb-4">
            <span class="w-10 h-1 bg-primary rounded-full shadow-[0_0_15px_rgba(206,255,94,0.4)]"></span>
            <p class="text-[12px] font-black text-stone-400 uppercase tracking-[0.4em] italic leading-none">Fiduciary Control: Fiscal Node</p>
        </div>
        <h2 class="text-5xl md:text-6xl font-headline font-black text-stone-950 tracking-tighter uppercase italic leading-none">Accounting <span class="text-stone-300">Hub</span></h2>
        <p class="text-stone-500 text-[10px] font-black uppercase tracking-[0.3em] mt-4 italic italic">
            MAYOR DE REPUESTO LA CIMA, C.A. • ALPHA_FINANCE_NODE_01
        </p>
    </div>
    <div class="flex gap-4">
        <a href="{{ url('/erp/contabilidad/libro-diario') }}" class="bg-primary text-stone-950 px-8 py-4 rounded-2xl flex items-center gap-4 hover:brightness-110 transition-all font-black uppercase text-[10px] tracking-[0.3em] shadow-2xl shadow-primary/20 italic">
            <span class="material-symbols-outlined text-[20px]">menu_book</span>
            Access Ledger
        </a>
    </div>
</div>

<!-- KPI Bento Grid: Precision Analytics -->
<div id="tour-accounting-stats" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-12">
    <!-- Revenue -->
    <div class="bg-white border border-stone-100 p-10 rounded-[40px] shadow-sm relative group overflow-hidden transition-all hover:border-primary">
        <div class="flex items-center justify-between mb-8">
            <div class="w-12 h-12 bg-stone-950 text-primary rounded-2xl flex items-center justify-center shadow-2xl shadow-stone-950/20">
                <span class="material-symbols-outlined text-2xl">trending_up</span>
            </div>
            <span class="text-[11px] font-black text-green-500 italic">+12.4% Δ</span>
        </div>
        <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.4em] mb-4 italic">Monthly Gross Yield</p>
        <div class="flex items-baseline gap-2">
            <span class="text-3xl font-headline font-black text-stone-950 italic tracking-tighter leading-none">${{ number_format($stats['ingresos_mes'], 2) }}</span>
        </div>
        <div class="mt-8 pt-8 border-t border-stone-50">
            <p class="text-[9px] text-stone-400 font-black uppercase tracking-[0.3em] italic italic">Total Commercial Influx Scan</p>
        </div>
    </div>

    <!-- Expenses -->
    <div class="bg-white border border-stone-100 p-10 rounded-[40px] shadow-sm relative group overflow-hidden transition-all hover:border-primary">
        <div class="flex items-center justify-between mb-8">
            <div class="w-12 h-12 bg-stone-950 text-red-500 rounded-2xl flex items-center justify-center shadow-2xl shadow-stone-950/20">
                <span class="material-symbols-outlined text-2xl">trending_down</span>
            </div>
            <span class="text-[11px] font-black text-red-500 italic">-5.2% Δ</span>
        </div>
        <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.4em] mb-4 italic">Operational Outflow</p>
        <div class="flex items-baseline gap-2">
            <span class="text-3xl font-headline font-black text-stone-950 italic tracking-tighter leading-none">${{ number_format($stats['gastos_mes'], 2) }}</span>
        </div>
        <div class="mt-8 pt-8 border-t border-stone-50">
            <p class="text-[9px] text-stone-400 font-black uppercase tracking-[0.3em] italic italic">Resource Allocation Matrix</p>
        </div>
    </div>

    <!-- Net Utility -->
    <div class="bg-white border border-stone-100 p-10 rounded-[40px] shadow-sm relative group overflow-hidden transition-all hover:border-primary">
        <div class="flex items-center justify-between mb-8">
            <div class="w-12 h-12 bg-stone-950 text-blue-500 rounded-2xl flex items-center justify-center shadow-2xl shadow-stone-950/20">
                <span class="material-symbols-outlined text-2xl">savings</span>
            </div>
            <span class="text-[11px] font-black text-primary italic font-mono uppercase tracking-widest">33.7% Margin</span>
        </div>
        <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.4em] mb-4 italic">Consolidated Net Utility</p>
        <div class="flex items-baseline gap-2">
            <span class="text-3xl font-headline font-black text-stone-950 italic tracking-tighter leading-none">${{ number_format($stats['utilidad_neta'], 2) }}</span>
        </div>
        <div class="mt-8 pt-8 border-t border-stone-50">
            <p class="text-[9px] text-stone-400 font-black uppercase tracking-[0.3em] italic italic">Net Profit Velocity Analysis</p>
        </div>
    </div>

    <!-- Tax Liability -->
    <div class="bg-stone-950 border border-stone-800 p-10 rounded-[40px] group shadow-2xl relative overflow-hidden transition-all hover:border-primary/20">
        <div class="absolute inset-0 opacity-[0.03] group-hover:opacity-[0.06] transition-opacity" style="background-image: radial-gradient(#ceff5e 1.5px, transparent 1.5px); background-size: 20px 20px;"></div>
        <div class="flex items-center justify-between mb-8 relative z-10">
            <div class="w-12 h-12 bg-stone-900 border border-stone-800 text-primary rounded-2xl flex items-center justify-center shadow-2xl">
                <span class="material-symbols-outlined text-2xl">gavel</span>
            </div>
            <span class="text-[11px] font-black text-primary italic font-mono uppercase tracking-widest">NEXT_CYCLE: 30D</span>
        </div>
        <p class="text-[10px] font-black text-stone-500 uppercase tracking-[0.4em] mb-4 relative z-10 italic">IVA Liability Threshold</p>
        <div class="flex items-baseline gap-2 relative z-10">
            <span class="text-3xl font-headline font-black text-white italic tracking-tighter leading-none">${{ number_format($stats['iva_por_pagar'], 2) }}</span>
        </div>
        <div class="mt-8 pt-8 border-t border-white/5 relative z-10">
            <p class="text-[9px] text-stone-600 font-black uppercase tracking-[0.3em] italic italic">Regulatory Compliance Lock Active</p>
        </div>
    </div>
</div>

<!-- System Interaction Panel: Quick Access -->
<div id="tour-accounting-actions" class="grid grid-cols-2 md:grid-cols-4 gap-2 mb-12">
    <a href="{{ url('/erp/contabilidad/plan-cuentas') }}" class="group bg-primary text-stone-950 p-10 rounded-[32px] flex flex-col items-center justify-center gap-6 transition-all hover:bg-stone-950 hover:text-primary active:scale-95 shadow-xl shadow-primary/20">
        <span class="material-symbols-outlined text-5xl group-hover:scale-110 transition-transform">format_list_numbered</span>
        <div class="text-center">
            <p class="text-[12px] font-black uppercase tracking-[0.3em] italic leading-none">Chart of Accounts</p>
            <p class="text-[10px] font-black uppercase tracking-widest opacity-60 mt-2">{{ $stats['cuentas_count'] }} Entities</p>
        </div>
    </a>
    <a href="{{ url('/erp/contabilidad/libros') }}" class="group bg-white border border-stone-100 p-10 rounded-[32px] flex flex-col items-center justify-center gap-6 transition-all hover:border-primary group hover:bg-primary/5 active:scale-95 shadow-sm">
        <span class="material-symbols-outlined text-5xl group-hover:scale-110 transition-transform text-stone-300 group-hover:text-primary">menu_book</span>
        <span class="text-[12px] font-black uppercase tracking-[0.3em] italic text-center leading-none">Accounting Books</span>
    </a>
    <a href="{{ url('/erp/contabilidad/balance-general') }}" class="group bg-white border border-stone-100 p-10 rounded-[32px] flex flex-col items-center justify-center gap-6 transition-all hover:border-primary group hover:bg-primary/5 active:scale-95 shadow-sm">
        <span class="material-symbols-outlined text-5xl group-hover:scale-110 transition-transform text-stone-300 group-hover:text-primary">balance</span>
        <span class="text-[12px] font-black uppercase tracking-[0.3em] italic text-center leading-none">Balance Sheet</span>
    </a>
    <a href="{{ url('/erp/contabilidad/reportes') }}" class="group bg-white border border-stone-100 p-10 rounded-[32px] flex flex-col items-center justify-center gap-6 transition-all hover:border-primary group hover:bg-primary/5 active:scale-95 shadow-sm">
        <span class="material-symbols-outlined text-5xl group-hover:scale-110 transition-transform text-stone-300 group-hover:text-primary">analytics</span>
        <span class="text-[12px] font-black uppercase tracking-[0.3em] italic text-center leading-none">Fiscal Analysis</span>
    </a>
</div>

<!-- Accounting Summary -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-10 mb-12">
    <!-- Income Statement Summary -->
    <div class="bg-white rounded-[40px] border border-stone-100 p-10 shadow-sm relative overflow-hidden group">
        <div class="flex items-center gap-6 mb-12 border-b border-stone-50 pb-8">
            <div class="w-12 h-12 bg-stone-950 rounded-2xl flex items-center justify-center text-primary shadow-2xl shadow-stone-950/20">
                <span class="material-symbols-outlined text-2xl">monitoring</span>
            </div>
            <div>
                <h3 class="text-2xl font-headline font-black text-stone-950 uppercase tracking-tighter italic leading-none">Net Income Lifecycle</h3>
                <p class="text-[10px] text-stone-400 font-black uppercase tracking-[0.3em] mt-2 italic italic">Current Fiscal Cycle Summary</p>
            </div>
        </div>

        <div class="space-y-4">
            <div class="flex justify-between items-center p-6 bg-stone-50 rounded-3xl border border-stone-100 transition-all hover:bg-white hover:shadow-md">
                <span class="text-[12px] font-black text-stone-500 uppercase tracking-widest italic italic">Total Influx Protocol</span>
                <span class="text-[16px] font-mono font-black text-green-500 italic tracking-tighter">${{ number_format($balances['ingresos'], 2) }}</span>
            </div>
            <div class="flex justify-between items-center p-6 bg-stone-50 rounded-3xl border border-stone-100 transition-all hover:bg-white hover:shadow-md">
                <span class="text-[12px] font-black text-stone-500 uppercase tracking-widest italic italic">Total Resource Drain</span>
                <span class="text-[16px] font-mono font-black text-red-500 italic tracking-tighter">(${{ number_format($balances['egresos'], 2) }})</span>
            </div>
            <div class="mt-10 pt-10 border-t border-stone-100 flex justify-between items-center px-4">
                <span class="text-[12px] font-black text-stone-950 uppercase tracking-[0.3em] italic">Net Profit Magnitude</span>
                <span class="text-4xl font-headline font-black text-green-600 italic tracking-tighter leading-none">${{ number_format($balances['ingresos'] - $balances['egresos'], 2) }}</span>
            </div>
        </div>
        <span class="material-symbols-outlined absolute -right-8 -bottom-8 text-[140px] opacity-[0.02] text-stone-950 pointer-events-none rotate-12 group-hover:opacity-[0.04] transition-opacity">receipt</span>
    </div>

    <!-- Balance Sheet Summary -->
    <div class="bg-white rounded-[40px] border border-stone-100 p-10 shadow-sm relative overflow-hidden group">
        <div class="flex items-center gap-6 mb-12 border-b border-stone-50 pb-8">
            <div class="w-12 h-12 bg-stone-950 rounded-2xl flex items-center justify-center text-primary shadow-2xl shadow-stone-950/20">
                <span class="material-symbols-outlined text-2xl">balance</span>
            </div>
            <div>
                <h3 class="text-2xl font-headline font-black text-stone-950 uppercase tracking-tighter italic leading-none">Consolidated Ledger Balance</h3>
                <p class="text-[10px] text-stone-400 font-black uppercase tracking-[0.3em] mt-2 italic italic">Aggregated Fiduciary Totals</p>
            </div>
        </div>

        <div class="space-y-4">
            <div class="grid grid-cols-3 gap-3">
                <div class="bg-stone-50 p-6 rounded-3xl border border-stone-100 transition-all hover:bg-white hover:shadow-md text-center">
                    <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em] mb-2 italic">Assets</p>
                    <p class="text-[14px] font-mono font-black text-stone-950 italic tracking-tighter">${{ number_format($balances['activo'], 2) }}</p>
                </div>
                <div class="bg-stone-50 p-6 rounded-3xl border border-stone-100 transition-all hover:bg-white hover:shadow-md text-center">
                    <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em] mb-2 italic">Liabilities</p>
                    <p class="text-[14px] font-mono font-black text-stone-950 italic tracking-tighter">${{ number_format($balances['pasivo'], 2) }}</p>
                </div>
                <div class="bg-stone-50 p-6 rounded-3xl border border-stone-100 transition-all hover:bg-white hover:shadow-md text-center">
                    <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em] mb-2 italic">Equity</p>
                    <p class="text-[14px] font-mono font-black text-stone-950 italic tracking-tighter">${{ number_format($balances['patrimonio'], 2) }}</p>
                </div>
            </div>
            
            <div class="mt-10 pt-10 border-t border-stone-100 flex justify-between items-center px-4">
                <span class="text-[12px] font-black text-stone-950 uppercase tracking-[0.3em] italic">Equation Verification</span>
                <span class="px-6 py-2 rounded-full text-[11px] font-black uppercase tracking-[0.3em] italic border-2 {{ abs($balances['activo'] - ($balances['pasivo'] + $balances['patrimonio'])) < 0.01 ? 'bg-green-100 text-green-700 border-green-200 shadow-[0_0_15px_rgba(34,197,94,0.3)]' : 'bg-red-100 text-red-700 border-red-200' }}">
                    {{ abs($balances['activo'] - ($balances['pasivo'] + $balances['patrimonio'])) < 0.01 ? 'INTEGRITY_CHECK_OK' : 'INTEGRITY_VIOLATION' }}
                </span>
            </div>
        </div>
        <span class="material-symbols-outlined absolute -right-8 -bottom-8 text-[140px] opacity-[0.02] text-stone-950 pointer-events-none rotate-12 group-hover:opacity-[0.04] transition-opacity">account_balance</span>
    </div>
</div>

<!-- Recent Journal Entries -->
<div class="bg-white rounded-[40px] border border-stone-100 shadow-sm p-10 mb-12">
    <div class="flex flex-col md:flex-row justify-between items-center mb-12 border-b border-stone-50 pb-8 gap-6">
        <div class="flex items-center gap-6">
            <div class="w-12 h-12 bg-stone-950 rounded-2xl flex items-center justify-center text-primary shadow-2xl shadow-stone-950/20">
                <span class="material-symbols-outlined text-2xl">receipt_long</span>
            </div>
            <div>
                <h3 class="text-2xl font-headline font-black text-stone-950 uppercase tracking-tighter italic leading-none">Journal Transmission Feed</h3>
                <p class="text-[10px] text-stone-400 font-black uppercase tracking-[0.3em] mt-2 italic italic">Live Accounting Entry Logic</p>
            </div>
        </div>
        <a href="{{ url('/erp/contabilidad/libro-diario') }}" class="text-[11px] font-black uppercase tracking-[0.4em] text-primary hover:text-stone-950 transition-all flex items-center gap-3 italic italic">
            ACCESS MASTER LEDGER
            <span class="material-symbols-outlined text-[20px] group-hover:translate-x-2 transition-transform">arrow_forward</span>
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full border-collapse">
            <thead>
                <tr class="zenith-table-header bg-stone-950 text-white">
                    <th class="px-8 py-5 text-left">PROTOCOL ID</th>
                    <th class="px-8 py-5 text-left">TIMESTAMP</th>
                    <th class="px-8 py-5 text-left">CONCEPT LOG</th>
                    <th class="px-8 py-5 text-right">QUANTUM</th>
                    <th class="px-8 py-5 text-center">STATUS</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-stone-50">
                @forelse($stats['asientos_recientes'] as $asiento)
                <tr class="group hover:bg-primary/5 transition-colors">
                    <td class="px-8 py-6">
                        <span class="text-[11px] font-mono font-black text-stone-400 group-hover:text-stone-950 transition-colors uppercase italic italic">AE-{{ str_pad($asiento->id, 5, '0', STR_PAD_LEFT) }}</span>
                    </td>
                    <td class="px-8 py-6">
                        <span class="text-[12px] font-black text-stone-950 uppercase tracking-tight italic">{{ $asiento->fecha }}</span>
                    </td>
                    <td class="px-8 py-6">
                        <p class="text-[12px] font-black text-stone-950 uppercase italic tracking-tight leading-tight">{{ $asiento->concepto }}</p>
                    </td>
                    <td class="px-8 py-6 text-right">
                        <span class="text-[14px] font-mono font-black text-stone-950 italic tracking-tighter leading-none">${{ number_format($asiento->total_debe, 2) }}</span>
                    </td>
                    <td class="px-8 py-6 text-center italic italic">
                        <span class="px-4 py-1 rounded-full text-[9px] font-black uppercase tracking-[0.2em] border italic {{ $asiento->estado === 'CONTABILIZADO' ? 'bg-green-100 text-green-700 border-green-200' : 'bg-amber-100 text-amber-700 border-amber-200' }}">
                            {{ $asiento->estado }}
                        </span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="py-20 text-center">
                        <p class="text-[12px] font-black text-stone-300 uppercase tracking-[0.3em] italic italic">Fiduciary transmission void in current cycle.</p>
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
