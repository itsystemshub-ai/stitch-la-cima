@extends('erp.layouts.app')

@section('title', 'Control de Inventario')

@push('styles')
<style>
  .kpi-card { @apply bg-white rounded-xl border border-stone-200 p-6 hover:shadow-lg transition-all hover:border-primary/30; }
  .action-btn { @apply flex items-center justify-center gap-3 p-5 rounded-xl font-headline font-bold text-sm uppercase tracking-wider transition-all active:scale-[0.98]; }
  .data-table th { @apply text-xs font-bold text-stone-500 uppercase tracking-wider pb-3 text-left; }
  .data-table td { @apply text-sm py-3; }
  .badge { @apply px-2 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider; }
</style>
@endpush

@section('breadcrumb')
    <a href="{{ url('/erp/inicio') }}" class="hover:text-stone-900 transition-colors">ERP</a>
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <span class="text-stone-900">Inventario</span>
@endsection

@section('content')
<!-- Page Header: Industrial Identity -->
<div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-8 mb-12">
    <div>
        <div class="flex items-center gap-3 mb-4">
            <span class="w-10 h-1 bg-primary rounded-full shadow-[0_0_15px_rgba(206,255,94,0.4)]"></span>
            <p class="text-[12px] font-black text-stone-400 uppercase tracking-[0.4em] italic leading-none">Asset Management: Physical Control</p>
        </div>
        <h2 class="text-5xl md:text-6xl font-headline font-black text-stone-950 tracking-tighter uppercase italic leading-none">Inventory <span class="text-stone-300">Hub</span></h2>
        <p class="text-stone-500 text-[10px] font-black uppercase tracking-[0.3em] mt-4 italic italic">
            MAYOR DE REPUESTO LA CIMA, C.A. • ALPHA_LOGISTICS_NODE_01
        </p>
    </div>
    <div class="flex gap-4">
        <div class="bg-white border border-stone-100 px-8 py-4 rounded-2xl shadow-sm border-l-4 border-l-red-500">
            <span class="text-[9px] font-black text-stone-400 uppercase tracking-[0.4em] block mb-2 italic">CRITICAL DEPLETION SCAN</span>
            <p class="text-2xl font-headline font-black text-red-600 italic tracking-tighter leading-none">{{ number_format($stats['low_stock'], 0) }} SKUs</p>
        </div>
        <div class="bg-stone-950 px-8 py-4 rounded-2xl shadow-2xl border border-stone-800 text-center flex flex-col justify-center">
            <span class="text-[9px] font-black text-primary uppercase tracking-[0.4em] block mb-2 italic">GLOBAL PROTOCOL</span>
            <p class="text-xl font-headline font-black text-white italic tracking-tighter leading-none">{{ $stats['low_stock'] > 0 ? 'ALERT_SIG' : 'OPTIMAL_FLG' }}</p>
        </div>
    </div>
</div>

<!-- Metric Bento Grid: Precision Analytics -->
<div id="tour-inventory-stats" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-12">
    <!-- Value Card -->
    <div class="bg-white border border-stone-100 p-10 rounded-[40px] shadow-sm relative group overflow-hidden transition-all hover:border-primary">
        <div class="absolute -right-6 -top-6 opacity-[0.03] group-hover:scale-125 group-hover:opacity-[0.06] transition-all duration-700">
            <span class="material-symbols-outlined text-[160px]">account_balance_wallet</span>
        </div>
        <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.4em] mb-4 italic">Total Asset Valuation</p>
        <div class="flex items-baseline gap-2">
            <span class="text-4xl font-headline font-black text-stone-950 italic tracking-tighter leading-none">${{ number_format($stats['valuation'], 2) }}</span>
            <span class="text-[12px] font-black text-stone-400 font-mono italic">USD</span>
        </div>
        <div class="mt-6 flex items-center gap-3">
            <span class="flex items-center text-[9px] font-black text-stone-800 bg-primary px-4 py-1 rounded-full uppercase tracking-widest italic ornament shadow-xl shadow-primary/20">
                Stable_Pulse
            </span>
            <span class="text-[9px] text-stone-400 font-black uppercase tracking-[0.2em] italic italic">Real-time Valuation Scan</span>
        </div>
    </div>

    <!-- Turnover Card -->
    <div class="bg-white border border-stone-100 p-10 rounded-[40px] shadow-sm relative group overflow-hidden transition-all hover:border-primary">
        <div class="absolute -right-6 -top-6 opacity-[0.03] group-hover:scale-125 group-hover:opacity-[0.06] transition-all duration-700">
            <span class="material-symbols-outlined text-[160px]">sync_alt</span>
        </div>
        <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.4em] mb-4 italic">Velocity Logic: Turnover</p>
        <div class="flex items-baseline gap-2">
            <span class="text-4xl font-headline font-black text-stone-950 italic tracking-tighter leading-none">4.2x</span>
            <span class="text-[11px] font-black text-stone-400 uppercase italic">Cycles</span>
        </div>
        <div class="mt-6 flex items-center gap-3">
            <span class="flex items-center text-[9px] font-black text-primary bg-stone-950 px-4 py-1 rounded-full uppercase tracking-widest italic ornament shadow-xl shadow-stone-950/20">
                High_Flow
            </span>
            <span class="text-[9px] text-stone-400 font-black uppercase tracking-[0.2em] italic italic">Demand Velocity Positive</span>
        </div>
    </div>

    <!-- Critical Items Card -->
    <div class="bg-white border border-stone-100 p-10 rounded-[40px] shadow-sm relative group overflow-hidden transition-all hover:border-red-500 border-l-[12px] border-l-red-500">
        <p class="text-[10px] font-black text-red-600 uppercase tracking-[0.4em] mb-4 italic">Alert Scan: Priority_1</p>
        <div class="flex items-baseline gap-2">
            <span class="text-4xl font-headline font-black text-red-600 italic tracking-tighter leading-none">{{ $stats['low_stock'] }}</span>
            <span class="text-[11px] font-black text-red-400 uppercase italic">Units Critical</span>
        </div>
        <div class="mt-8">
            <div class="w-full bg-stone-50 h-3 rounded-full overflow-hidden p-[1px] border border-stone-100">
                @php $low_stock_percent = $stats['total_sku'] > 0 ? ($stats['low_stock'] / $stats['total_sku']) * 100 : 0; @endphp
                <div class="bg-red-500 h-full rounded-full shadow-[0_0_10px_rgba(239,68,68,0.3)] transition-all duration-1000" style="width: {{ $low_stock_percent }}%"></div>
            </div>
            <p class="text-[9px] text-stone-400 font-black uppercase tracking-[0.3em] mt-4 italic italic">{{ round($low_stock_percent, 1) }}% Integrity Risk Identified</p>
        </div>
    </div>

    <!-- Inventory Integrity -->
    <div class="bg-stone-950 border border-stone-800 p-10 rounded-[40px] group shadow-2xl relative overflow-hidden transition-all hover:border-primary/20">
        <div class="absolute inset-0 opacity-[0.03] group-hover:opacity-[0.06] transition-opacity" style="background-image: radial-gradient(#ceff5e 1.5px, transparent 1.5px); background-size: 20px 20px;"></div>
        <p class="text-[10px] font-black text-primary uppercase tracking-[0.4em] mb-4 relative z-10 italic">Ledger Sync Protocol</p>
        <div class="flex items-baseline gap-2 relative z-10">
            <span class="text-4xl font-headline font-black text-white italic tracking-tighter leading-none">100%</span>
        </div>
        <p class="text-[9px] text-stone-500 font-black uppercase tracking-[0.3em] mt-8 relative z-10 flex items-center gap-3 italic italic">
            <span class="w-3 h-3 rounded-full bg-primary shadow-[0_0_15px_rgba(206,255,94,0.6)] animate-pulse"></span>
            Virtual Store Sinc_Lock Active
        </p>
    </div>
</div>

<!-- System Interaction Panel: Quick Access -->
<div id="tour-inventory-actions" class="grid grid-cols-2 md:grid-cols-5 gap-2 mb-12">
    <a href="{{ url('/erp/inventario/productos') }}" class="group bg-primary text-stone-950 p-8 rounded-[32px] flex flex-col items-center justify-center gap-4 transition-all hover:bg-stone-950 hover:text-primary active:scale-95 shadow-xl shadow-primary/20">
        <span class="material-symbols-outlined text-4xl group-hover:scale-110 transition-transform">category</span>
        <span class="text-[11px] font-black uppercase tracking-[0.3em] italic text-center leading-none">Master</span>
    </a>
    <a href="{{ url('/erp/inventario/desarrollo') }}" class="group bg-white border border-stone-100 p-8 rounded-[32px] flex flex-col items-center justify-center gap-4 transition-all hover:border-primary group hover:bg-primary/5 active:scale-95 shadow-sm">
        <span class="material-symbols-outlined text-4xl group-hover:scale-110 transition-transform text-stone-300 group-hover:text-primary">biotech</span>
        <span class="text-[11px] font-black uppercase tracking-[0.3em] italic text-center leading-none">R&D Hub</span>
    </a>
    <a href="{{ url('/erp/inventario/lista-precios') }}" class="group bg-white border border-stone-100 p-8 rounded-[32px] flex flex-col items-center justify-center gap-4 transition-all hover:border-primary group hover:bg-primary/5 active:scale-95 shadow-sm">
        <span class="material-symbols-outlined text-4xl group-hover:scale-110 transition-transform text-stone-300 group-hover:text-primary">payments</span>
        <span class="text-[11px] font-black uppercase tracking-[0.3em] italic text-center leading-none">Price Matrix</span>
    </a>
    <a href="{{ url('/erp/inventario/kardex') }}" class="group bg-white border border-stone-100 p-8 rounded-[32px] flex flex-col items-center justify-center gap-4 transition-all hover:border-primary group hover:bg-primary/5 active:scale-95 shadow-sm">
        <span class="material-symbols-outlined text-4xl group-hover:scale-110 transition-transform text-stone-300 group-hover:text-primary">receipt_long</span>
        <span class="text-[11px] font-black uppercase tracking-[0.3em] italic text-center leading-none">Kardex Log</span>
    </a>
    <a href="{{ url('/erp/inventario/ajustes') }}" class="group bg-white border border-stone-100 p-8 rounded-[32px] flex flex-col items-center justify-center gap-4 transition-all hover:border-primary group hover:bg-primary/5 active:scale-95 shadow-sm">
        <span class="material-symbols-outlined text-4xl group-hover:scale-110 transition-transform text-stone-300 group-hover:text-primary">edit_note</span>
        <span class="text-[11px] font-black uppercase tracking-[0.3em] italic text-center leading-none">Adjustments</span>
    </a>
</div>

<!-- Inventory Operational Dashboard -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-10 mb-12">
    <!-- Main Movement Table -->
    <div class="lg:col-span-2 bg-white rounded-[40px] border border-stone-100 overflow-hidden shadow-sm">
        <div class="p-10 border-b border-stone-50 flex justify-between items-center">
            <div class="flex items-center gap-6">
                <div class="w-12 h-12 bg-stone-950 rounded-2xl flex items-center justify-center text-primary shadow-2xl shadow-stone-950/20">
                    <span class="material-symbols-outlined text-2xl">swap_vert</span>
                </div>
                <div>
                    <h3 class="text-2xl font-headline font-black text-stone-950 uppercase tracking-tighter italic leading-none">Stock Transmission Feed</h3>
                    <p class="text-[10px] text-stone-400 font-black uppercase tracking-[0.3em] mt-2 italic italic">Real-time Movement Logic</p>
                </div>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="zenith-table-header bg-stone-950 text-white">
                        <th class="px-8 py-5 text-left">PROTOCOL ID / TIMESTAMP</th>
                        <th class="px-8 py-5 text-left">ASSET PROFILE</th>
                        <th class="px-8 py-5 text-right">QUANTUM</th>
                        <th class="px-8 py-5 text-center">FLOW CODE</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-50">
                    @forelse($stats['recent_movements'] as $movement)
                    <tr class="hover:bg-primary/5 transition-colors group">
                        <td class="px-8 py-6">
                            <p class="text-[11px] font-black text-stone-950 uppercase tracking-tight italic">{{ $movement->created_at->format('d M Y') }}</p>
                            <p class="text-[10px] font-mono font-black text-stone-400 italic italic mt-1 uppercase">REF: #{{ $movement->reference_id ?? 'INT-'.str_pad($movement->id, 5, '0', STR_PAD_LEFT) }}</p>
                        </td>
                        <td class="px-8 py-6 text-[12px] font-black text-stone-950 uppercase italic tracking-tight">{{ $movement->product->nombre }}</td>
                        <td class="px-8 py-6 text-right">
                            <span class="text-[14px] font-mono font-black italic tracking-tighter leading-none {{ $movement->type == 'IN' ? 'text-green-500' : 'text-red-500' }}">
                                {{ $movement->type == 'IN' ? '+' : '-' }}{{ number_format($movement->quantity, 0) }}
                            </span>
                        </td>
                        <td class="px-8 py-6 text-center italic italic">
                            <span class="px-4 py-1 rounded-full text-[9px] font-black uppercase tracking-[0.2em] italic border {{ $movement->type == 'IN' ? 'bg-green-100 text-green-700 border-green-200' : ($movement->type == 'OUT' ? 'bg-red-100 text-red-700 border-red-200' : 'bg-stone-100 text-stone-600 border-stone-200') }}">
                                {{ $movement->type }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="py-20 text-center">
                            <p class="text-[12px] font-black text-stone-300 uppercase tracking-[0.3em] italic">No categorical transmission detected in recent cycles.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-8 bg-stone-50 border-t border-stone-100 flex justify-center">
            <a href="{{ url('/erp/inventario/kardex') }}" class="text-[10px] font-black text-stone-400 uppercase tracking-[0.4em] hover:text-stone-950 transition-all italic italic">ACCESS MASTER HISTORICAL LOG</a>
        </div>
    </div>

    <!-- Right Column: Compliance & Auditoria -->
    <div class="flex flex-col gap-6">
        <div class="bg-white rounded-[40px] border border-stone-100 p-10 shadow-sm relative overflow-hidden group">
            <h3 class="text-[11px] font-black text-stone-950 uppercase tracking-[0.4em] mb-10 flex items-center gap-4 italic italic">
                <span class="material-symbols-outlined text-stone-300">hub</span>
                Catalog Structural Mix
            </h3>
            <div class="space-y-8">
                <div class="group cursor-default">
                    <div class="flex justify-between items-end mb-3">
                        <span class="text-[11px] font-black text-stone-500 uppercase tracking-widest italic italic">Motor Heavy Duty</span>
                        <span class="text-[12px] font-mono font-black text-stone-950 italic">45% Population</span>
                    </div>
                    <div class="w-full bg-stone-50 h-3 rounded-full overflow-hidden p-[1px] border border-stone-100">
                        <div class="bg-stone-950 group-hover:bg-primary h-full rounded-full transition-all duration-700 shadow-xl" style="width: 45%"></div>
                    </div>
                </div>
            </div>
            <span class="material-symbols-outlined absolute -right-8 -bottom-8 text-[140px] opacity-[0.02] text-stone-950 pointer-events-none rotate-12 group-hover:opacity-[0.04] transition-opacity">analytics</span>
        </div>
        
        <div class="bg-stone-950 rounded-[40px] p-10 shadow-2xl border border-stone-800 relative overflow-hidden transition-all hover:border-primary/20 group">
            <p class="text-[10px] font-black text-primary uppercase tracking-[0.4em] mb-4 italic">FISCAL STATUS: COMPLIANT</p>
            <p class="text-[12px] text-stone-400 leading-relaxed font-black uppercase italic tracking-widest">ART. 177 ISLR PROTOCOL DETECTED • SENIAT NORMATIVE COMPLIANCE SYNC_LOCK ACTIVE</p>
            <span class="material-symbols-outlined absolute -right-8 -bottom-8 text-[140px] opacity-[0.05] text-primary pointer-events-none rotate-12 group-hover:opacity-[0.1] transition-opacity">policy</span>
        </div>
    </div>
</div>

<!-- Dashboard Spotlight Items -->
<div class="mt-16 bg-white rounded-[40px] border border-stone-100 p-10 shadow-sm relative overflow-hidden">
    <div class="flex items-center gap-4 mb-10">
        <div class="w-3 h-8 bg-primary rounded-full shadow-[0_0_15px_rgba(206,255,94,0.4)]"></div>
        <h3 class="text-2xl font-headline font-black text-stone-950 uppercase tracking-tighter italic leading-none">Featured Asset Spotlight</h3>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      @foreach($stats['featured_products'] as $product)
      <div class="flex items-center p-6 bg-stone-50 border border-stone-100 rounded-3xl hover:border-primary hover:bg-white transition-all shadow-inner group">
        <div class="w-16 h-16 bg-stone-950 rounded-2xl flex items-center justify-center border border-stone-800 flex-shrink-0 shadow-2xl group-hover:bg-primary group-hover:border-primary transition-colors">
           <span class="material-symbols-outlined text-primary text-2xl group-hover:text-stone-950 transition-colors">inventory_2</span>
        </div>
        <div class="ml-6 flex-1 min-w-0">
          <p class="text-[10px] font-black text-primary uppercase tracking-[0.3em] italic">SKU: {{ $product->codigo_oem }}</p>
          <p class="text-[14px] font-black text-stone-950 truncate uppercase italic tracking-tight mb-2">{{ $product->nombre }}</p>
          <div class="flex gap-6">
             <div class="flex flex-col"><span class="text-[9px] text-stone-400 font-black uppercase tracking-widest italic">Inventory Level</span> <span class="text-[11px] font-mono font-black italic tracking-tighter {{ $product->stock_actual <= $product->stock_minimo ? 'text-red-500' : 'text-stone-950' }}">{{ number_format($product->stock_actual, 0) }} Units</span></div>
             <div class="flex flex-col"><span class="text-[9px] text-stone-400 font-black uppercase tracking-widest italic">Asset Value</span> <span class="text-[11px] font-mono font-black text-green-500 italic tracking-tighter">${{ number_format($product->stock_actual * $product->costo_compra, 0) }}</span></div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
</div>

@endsection

