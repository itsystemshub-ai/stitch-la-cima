@push('styles')
<style>
  .industrial-node { @apply bg-white border border-stone-200 p-8 rounded-[32px] shadow-sm hover:border-primary transition-all relative overflow-hidden; }
  .mag-label { @apply text-[10px] font-black text-stone-400 uppercase tracking-[0.4em] italic mb-4 block; }
  .mag-value { @apply text-4xl font-headline font-black text-stone-900 italic tracking-tighter; }
</style>
@endpush

@section('breadcrumb')
    <a href="{{ url('/erp/inicio') }}" class="text-stone-500 hover:text-stone-900 transition-colors font-black text-[12px] uppercase tracking-widest italic">ERP_CORE</a>
    <span class="material-symbols-outlined text-[14px] text-stone-400">chevron_right</span>
    <span class="text-stone-900 font-black text-[12px] uppercase tracking-widest italic">INVENTORY_NODE</span>
@endsection

@section('content')
<!-- Page Header: Industrial Identity Trace -->
<div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-8 mb-12 relative z-10 border-b border-stone-200 pb-8">
    <div>
        <div class="flex items-center gap-3 mb-4">
            <span class="w-12 h-1 bg-primary shadow-[0_0_10px_#ceff5e]"></span>
            <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.5em] italic leading-none">ASSET_CONTROL_PROTOCOL: PHYSICAL_LOGIC</p>
        </div>
        <h2 class="text-5xl md:text-6xl font-headline font-black text-stone-900 tracking-tighter uppercase italic leading-none">INVENTORY_<span class="text-primary not-italic">HUBX</span></h2>
        <p class="text-stone-400 text-[10px] font-black uppercase tracking-[0.4em] mt-4 italic">
            MAYOR_REPUESTO_LA_CIMA // LOGISTICS_NODE_ALPHA_01
        </p>
    </div>
    <div class="flex gap-4">
        <div class="bg-white border border-red-100 px-8 py-4 rounded-[24px] shadow-sm border-l-[8px] border-l-red-500 group">
            <span class="text-[9px] font-black text-stone-400 uppercase tracking-[0.4em] block mb-1 italic group-hover:text-red-500 transition-colors">CRITICAL_DEPLETION_SCAN</span>
            <p class="text-2xl font-headline font-black text-red-500 italic tracking-tighter leading-none">{{ number_format($stats['low_stock'], 0) }} SKUs_ALERT</p>
        </div>
        <div class="bg-stone-50 px-8 py-4 rounded-[24px] shadow-inner border border-stone-100 text-center flex flex-col justify-center">
            <span class="text-[9px] font-black text-primary uppercase tracking-[0.4em] block mb-1 italic">GLOBAL_PROTOCOL</span>
            <p class="text-xl font-headline font-black text-stone-900 italic tracking-tighter leading-none">{{ $stats['low_stock'] > 0 ? 'ALERT_SIG_X6' : 'OPTIMAL_STATE' }}</p>
        </div>
    </div>
</div>

<!-- Metric Matrix: Precision Analytics -->
<div id="tour-inventory-stats" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12 relative z-10">
    <!-- Value Node -->
    <div class="industrial-node group">
        <div class="absolute -right-8 -top-8 opacity-[0.03] group-hover:scale-110 group-hover:opacity-[0.05] transition-all duration-1000">
            <span class="material-symbols-outlined text-[160px] text-stone-900">account_balance_wallet</span>
        </div>
        <span class="mag-label">TOTAL_ASSET_VALUATION_MAG</span>
        <div class="flex items-baseline gap-3">
            <span class="mag-value text-stone-900 italic tracking-tighter">{{ number_format($stats['valuation'], 2) }}</span>
            <span class="text-[11px] font-black text-stone-400 font-mono italic">USD_XMIT</span>
        </div>
        <div class="mt-8 flex items-center gap-3">
            <span class="bg-primary text-stone-950 px-4 py-1.5 rounded-lg text-[10px] font-black uppercase tracking-[0.3em] italic shadow-sm">STABLE_PULSE</span>
            <span class="text-[10px] text-stone-400 font-black uppercase tracking-widest italic group-hover:text-stone-600 transition-colors">REAL-TIME_SCAN</span>
        </div>
    </div>

    <!-- Turnover Node -->
    <div class="industrial-node group">
        <div class="absolute -right-8 -top-8 opacity-[0.03] group-hover:scale-110 group-hover:opacity-[0.05] transition-all duration-1000">
            <span class="material-symbols-outlined text-[160px] text-stone-900">sync_alt</span>
        </div>
        <span class="mag-label">VELOCITY_LOGIC: TURNOVER_FREQ</span>
        <div class="flex items-baseline gap-3">
            <span class="mag-value text-stone-900 italic tracking-tighter">4.28x</span>
            <span class="text-[10px] font-black text-stone-400 uppercase italic font-mono tracking-widest">CYCLES_MAG</span>
        </div>
        <div class="mt-8 flex items-center gap-3">
            <span class="bg-stone-100 text-stone-900 border border-stone-200 px-4 py-1.5 rounded-lg text-[10px] font-black uppercase tracking-[0.3em] italic shadow-inner">HIGH_FLOW_NODE</span>
            <span class="text-[10px] text-stone-400 font-black uppercase tracking-widest italic group-hover:text-stone-600 transition-colors">DEMAND_POS</span>
        </div>
    </div>

    <!-- Critical Alert Node -->
    <div class="industrial-node border-l-[8px] border-l-red-500 group">
        <span class="mag-label text-red-500">ALERT_SCAN: PRIORITY_ALPHA_1</span>
        <div class="flex items-baseline gap-3">
            <span class="mag-value text-red-500 italic tracking-tighter">{{ $stats['low_stock'] }}</span>
            <span class="text-[10px] font-black text-red-300 uppercase italic font-mono tracking-widest animate-pulse">CRITICAL_UNITS</span>
        </div>
        <div class="mt-8">
            <div class="w-full bg-stone-100 h-2 rounded-full overflow-hidden border border-stone-200 relative shadow-inner">
                @php $low_stock_percent = $stats['total_sku'] > 0 ? ($stats['low_stock'] / $stats['total_sku']) * 100 : 0; @endphp
                <div class="bg-red-500 h-full rounded-full shadow-[0_0_10px_#ef4444] transition-all duration-1000" style="width: {{ $low_stock_percent }}%"></div>
            </div>
            <p class="text-[10px] text-stone-400 font-black uppercase tracking-widest mt-4 italic group-hover:text-stone-600 transition-colors">{{ round($low_stock_percent, 1) }}% INTEGRITY_RISK_DETECTED</p>
        </div>
    </div>

    <!-- Sync Lock Node -->
    <div class="industrial-node border border-primary/20 bg-stone-50 shadow-inner group">
        <div class="absolute inset-0 opacity-[0.02] group-hover:opacity-[0.05] transition-opacity" style="background-image: radial-gradient(#000 1px, transparent 1px); background-size: 20px 20px;"></div>
        <span class="mag-label text-primary">LEDGER_SYNC_PROTOCOL_X9</span>
        <div class="flex items-baseline gap-3 relative z-10">
            <span class="text-4xl font-headline font-black text-stone-900 italic tracking-tighter shadow-sm">100%_SECURE</span>
        </div>
        <p class="text-[10px] text-stone-400 font-black uppercase tracking-[0.3em] mt-10 relative z-10 flex items-center gap-3 italic group-hover:text-stone-600 transition-colors">
            <span class="w-3 h-3 rounded-full bg-primary shadow-[0_0_10px_#ceff5e] animate-pulse"></span>
            VIRTUAL_STORE_SYNC_LOCK_ACTIVE
        </p>
    </div>
</div>

<!-- System Interaction Panel: Technical Modules -->
<div id="tour-inventory-actions" class="grid grid-cols-2 md:grid-cols-5 gap-4 mb-12 relative z-10">
    <a href="{{ url('/erp/inventario/productos') }}" class="group bg-primary text-stone-900 p-8 rounded-[32px] flex flex-col items-center justify-center gap-4 transition-all hover:bg-stone-900 hover:text-primary hover:scale-[1.02] shadow-sm italic">
        <span class="material-symbols-outlined text-4xl group-hover:scale-110 transition-transform">category</span>
        <span class="text-[11px] font-black uppercase tracking-[0.3em] text-center leading-none">MASTER_CATALOG</span>
    </a>
    <a href="{{ url('/erp/inventario/desarrollo') }}" class="group bg-white border border-stone-200 p-8 rounded-[32px] flex flex-col items-center justify-center gap-4 transition-all hover:border-primary hover:scale-[1.02] shadow-sm text-stone-400 hover:text-stone-900 italic">
        <span class="material-symbols-outlined text-4xl group-hover:rotate-12 transition-all">biotech</span>
        <span class="text-[11px] font-black uppercase tracking-[0.3em] text-center leading-none">R&D_STAGING</span>
    </a>
    <a href="{{ url('/erp/inventario/lista-precios') }}" class="group bg-white border border-stone-200 p-8 rounded-[32px] flex flex-col items-center justify-center gap-4 transition-all hover:border-primary hover:scale-[1.02] shadow-sm text-stone-400 hover:text-stone-900 italic">
        <span class="material-symbols-outlined text-4xl group-hover:scale-110 transition-all">payments</span>
        <span class="text-[11px] font-black uppercase tracking-[0.3em] text-center leading-none">PRICE_MATRIX</span>
    </a>
    <a href="{{ url('/erp/inventario/kardex') }}" class="group bg-white border border-stone-200 p-8 rounded-[32px] flex flex-col items-center justify-center gap-4 transition-all hover:border-primary hover:scale-[1.02] shadow-sm text-stone-400 hover:text-stone-900 italic">
        <span class="material-symbols-outlined text-4xl group-hover:translate-x-1 transition-all">receipt_long</span>
        <span class="text-[11px] font-black uppercase tracking-[0.3em] text-center leading-none">KARDEX_LEDGER</span>
    </a>
    <a href="{{ url('/erp/inventario/ajustes') }}" class="group bg-white border border-stone-200 p-8 rounded-[32px] flex flex-col items-center justify-center gap-4 transition-all hover:border-primary hover:scale-[1.02] shadow-sm text-stone-400 hover:text-stone-900 italic">
        <span class="material-symbols-outlined text-4xl group-hover:scale-110 transition-all">edit_note</span>
        <span class="text-[11px] font-black uppercase tracking-[0.3em] text-center leading-none">STOCK_ADJUST</span>
    </a>
</div>

<!-- Operational Dashboard: Flow Transmission -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-16 relative z-10">
    <!-- Main Movement Table: FLOW_XMIT -->
    <div class="lg:col-span-2 bg-white border border-stone-200 rounded-[40px] overflow-hidden shadow-sm">
        <div class="p-8 border-b border-stone-100 flex justify-between items-center bg-stone-50/50 backdrop-blur-xl">
            <div class="flex items-center gap-6">
                <div class="w-12 h-12 bg-white border border-stone-200 rounded-2xl flex items-center justify-center text-primary shadow-sm group">
                    <span class="material-symbols-outlined text-2xl group-hover:scale-110 transition-transform">swap_vert</span>
                </div>
                <div>
                    <h3 class="text-2xl font-headline font-black text-stone-900 uppercase tracking-tighter italic leading-none">STOCK_TRANSMISSION_FEED</h3>
                    <p class="text-[10px] text-stone-400 font-black uppercase tracking-[0.4em] mt-2 italic">REAL-TIME_MOVEMENT_LOGIC</p>
                </div>
            </div>
        </div>
        <div class="overflow-x-auto font-mono italic uppercase">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-stone-50 text-stone-400">
                        <th class="px-8 py-5 text-left text-[10px] font-black tracking-[0.3em] italic uppercase border-b border-stone-100">PROTOCOL_ID / TIMESTAMP</th>
                        <th class="px-8 py-5 text-left text-[10px] font-black tracking-[0.3em] italic uppercase border-b border-stone-100">ASSET_PROFILE_NODE</th>
                        <th class="px-8 py-5 text-right text-[10px] font-black tracking-[0.3em] italic uppercase border-b border-stone-100">QUANTUM</th>
                        <th class="px-8 py-5 text-center text-[10px] font-black tracking-[0.3em] italic uppercase border-b border-stone-100">FLOW_CMD</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-100">
                    @forelse($stats['recent_movements'] as $movement)
                    <tr class="hover:bg-stone-50/50 transition-colors group">
                        <td class="px-8 py-6">
                            <p class="text-[12px] font-black text-stone-900 tracking-widest mb-1">{{ $movement->created_at->format('d_M_Y') }}</p>
                            <p class="text-[10px] font-black text-stone-400 italic mt-1 group-hover:text-stone-500 transition-colors uppercase font-mono">REF: #{{ $movement->reference_id ?? 'INT_'.str_pad($movement->id, 5, '0', STR_PAD_LEFT) }}</p>
                        </td>
                        <td class="px-8 py-6 text-[12px] font-black text-stone-500 group-hover:text-stone-900 transition-colors uppercase italic tracking-tighter">{{ $product_names[$movement->product_id] ?? 'UNDEFINED_ASSET' }}</td>
                        <td class="px-8 py-6 text-right font-mono">
                            <span class="text-[15px] font-black italic tracking-tighter {{ $movement->tipo == 'ENTRADA' ? 'text-green-600' : 'text-red-500' }}">
                                {{ $movement->tipo == 'ENTRADA' ? '+' : '-' }}{{ number_format($movement->cantidad, 0) }}
                            </span>
                        </td>
                        <td class="px-8 py-6 text-center">
                            <span class="px-4 py-1.5 rounded-lg text-[10px] font-black tracking-widest border {{ $movement->tipo == 'ENTRADA' ? 'bg-green-50 text-green-600 border-green-100' : 'bg-red-50 text-red-500 border-red-100 shadow-inner' }}">
                                {{ $movement->tipo }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="py-16 text-center">
                            <p class="text-[11px] font-black text-stone-300 uppercase tracking-[0.5em] italic">NO_CATEGORICAL_TRANSMISSION_DETECTED</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="px-8 py-6 bg-stone-50 border-t border-stone-100 flex justify-center">
            <a href="{{ url('/erp/inventario/kardex') }}" class="text-[10px] font-black text-stone-400 hover:text-stone-900 transition-all italic uppercase tracking-[0.4em] font-mono">ACCESS_MASTER_HISTORICAL_TRACE</a>
        </div>
    </div>

    <!-- Right Column: Compliance & Catalog Insights -->
    <div class="flex flex-col gap-8">
        <div class="bg-white border border-stone-200 rounded-[40px] p-10 shadow-sm relative overflow-hidden group">
            <h3 class="text-[11px] font-black text-stone-900 uppercase tracking-[0.4em] mb-10 flex items-center gap-4 italic">
                <span class="material-symbols-outlined text-stone-300 group-hover:text-primary transition-colors">hub</span>
                CATALOG_STRUCTURAL_MIX
            </h3>
            <div class="space-y-10">
                <div class="group cursor-default">
                    <div class="flex justify-between items-end mb-3 font-mono uppercase italic font-black">
                        <span class="text-[10px] text-stone-400 group-hover:text-stone-600 transition-colors tracking-widest">Motor_Heavy_Duty_CORE</span>
                        <span class="text-[11px] text-stone-900">45%_POPULATION</span>
                    </div>
                    <div class="w-full bg-stone-100 h-2 rounded-full overflow-hidden border border-stone-200 shadow-inner">
                        <div class="bg-primary shadow-sm h-full rounded-full transition-all duration-1000" style="width: 45%"></div>
                    </div>
                </div>
            </div>
            <span class="material-symbols-outlined absolute -right-10 -bottom-10 text-[160px] opacity-[0.03] text-stone-900 pointer-events-none rotate-12 group-hover:opacity-[0.05] transition-opacity">analytics</span>
        </div>
        
        <div class="bg-stone-50 rounded-[40px] p-10 shadow-inner border border-stone-200 relative overflow-hidden transition-all hover:bg-white group">
            <div class="absolute inset-x-0 top-0 h-1 bg-primary/40"></div>
            <p class="text-[10px] font-black text-primary uppercase tracking-[0.5em] mb-4 italic">FISCAL_STATUS: COMPLIANT_OK</p>
            <p class="text-[13px] text-stone-500 leading-relaxed font-black uppercase italic tracking-widest group-hover:text-stone-900 transition-colors uppercase">ART_177_ISLR_PROTOCOL_DETECTED • SENIAT_NORMATIVE_SYNC_LOCK_ACTIVE</p>
            <span class="material-symbols-outlined absolute -right-10 -bottom-10 text-[160px] opacity-[0.05] text-stone-200 pointer-events-none rotate-12 group-hover:opacity-[0.1] transition-opacity">policy</span>
        </div>
    </div>
</div>

<!-- Asset Spotlight: Featured Catalog Nodes -->
<div class="mt-12 bg-white border border-stone-200 rounded-[48px] p-12 shadow-sm relative overflow-hidden backdrop-blur-3xl">
    <div class="flex items-center gap-5 mb-12">
        <div class="w-3 h-10 bg-primary rounded-full shadow-[0_0_10px_#ceff5e]"></div>
        <h3 class="text-3xl font-headline font-black text-stone-900 uppercase tracking-tighter italic leading-none">FEATURED_ASSET_SPOTLIGHT_X_RAY</h3>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      @foreach($stats['featured_products'] as $product)
      <div class="flex flex-col p-8 bg-stone-50 border border-stone-100 rounded-[32px] hover:border-primary hover:bg-white transition-all shadow-sm group relative overflow-hidden italic">
        <div class="absolute top-0 right-0 p-6 opacity-10 group-hover:opacity-30 transition-opacity">
            <span class="material-symbols-outlined text-stone-300 text-4xl">inventory_2</span>
        </div>
        <div class="w-16 h-16 bg-white border border-stone-200 rounded-[24px] flex items-center justify-center text-stone-400 group-hover:bg-primary group-hover:text-stone-950 transition-all duration-500 shadow-sm mb-8">
           <span class="material-symbols-outlined text-[32px] items-center">terminal</span>
        </div>
        <div class="space-y-5">
          <div>
            <p class="text-[10px] font-black text-stone-400 group-hover:text-primary uppercase tracking-[0.4em] transition-colors mb-2">ID: {{ $product->codigo_oem }}</p>
            <p class="text-[18px] font-black text-stone-900 uppercase italic tracking-tighter mb-3 leading-tight group-hover:text-primary transition-colors line-clamp-2">{{ $product->nombre }}</p>
          </div>
          <div class="flex flex-col gap-5 pt-5 border-t border-stone-200/50">
             <div class="flex flex-col">
                <span class="text-[10px] text-stone-400 font-black uppercase tracking-widest italic mb-1">INVENTORY_LEVEL_MAG</span> 
                <span class="text-[18px] font-mono font-black italic tracking-tighter {{ $product->stock_actual <= $product->stock_minimo ? 'text-red-500' : 'text-stone-900' }} shadow-inner">{{ number_format($product->stock_actual, 0) }}_UNITS</span>
             </div>
             <div class="flex flex-col">
                <span class="text-[10px] text-stone-400 font-black uppercase tracking-widest italic mb-1">ASSET_VALUATION_NODE</span> 
                <span class="text-[18px] font-mono font-black text-primary italic tracking-tighter shadow-sm">${{ number_format($product->stock_actual * $product->costo_compra, 2) }}</span>
             </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
</div>

@endsection
>


@endsection

