@push('styles')
<style>
  .industrial-node { @apply bg-stone-900 border border-white/5 p-10 rounded-[40px] shadow-3xl hover:border-primary/20 transition-all relative overflow-hidden; }
  .mag-label { @apply text-[11px] font-black text-stone-600 uppercase tracking-[0.4em] italic mb-4 block; }
  .mag-value { @apply text-4xl font-headline font-black text-white italic tracking-tighter; }
</style>
@endpush

@section('breadcrumb')
    <a href="{{ url('/erp/inicio') }}" class="text-stone-500 hover:text-primary transition-colors font-black text-[12px] uppercase tracking-widest italic">ERP_CORE</a>
    <span class="material-symbols-outlined text-[14px] text-stone-700">chevron_right</span>
    <span class="text-stone-300 font-black text-[12px] uppercase tracking-widest italic">INVENTORY_NODE</span>
@endsection

@section('content')
<!-- Page Header: Industrial Identity Trace -->
<div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-12 mb-16 relative z-10 border-b border-primary/20 pb-12">
    <div>
        <div class="flex items-center gap-4 mb-6">
            <span class="w-12 h-1 bg-primary shadow-[0_0_15px_#ceff5e]"></span>
            <p class="text-[11px] font-black text-stone-500 uppercase tracking-[0.5em] italic leading-none">ASSET_CONTROL_PROTOCOL: PHYSICAL_LOGIC</p>
        </div>
        <h2 class="text-6xl md:text-7xl font-headline font-black text-white tracking-tighter uppercase italic leading-none">INVENTORY_<span class="text-primary">HUBX</span></h2>
        <p class="text-stone-600 text-[11px] font-black uppercase tracking-[0.4em] mt-6 italic">
            MAYOR_REPUESTO_LA_CIMA // LOGISTICS_NODE_ALPHA_01
        </p>
    </div>
    <div class="flex gap-6">
        <div class="bg-stone-900 border border-red-500/30 px-10 py-6 rounded-[32px] shadow-3xl border-l-[12px] border-l-red-500 group">
            <span class="text-[11px] font-black text-stone-600 uppercase tracking-[0.4em] block mb-2 italic group-hover:text-red-400 transition-colors">CRITICAL_DEPLETION_SCAN</span>
            <p class="text-3xl font-headline font-black text-red-500 italic tracking-tighter leading-none">{{ number_format($stats['low_stock'], 0) }} SKUs_ALERT</p>
        </div>
        <div class="bg-stone-950 px-10 py-6 rounded-[32px] shadow-inner border border-white/5 text-center flex flex-col justify-center">
            <span class="text-[11px] font-black text-primary uppercase tracking-[0.4em] block mb-2 italic shadow-[0_0_10px_#ceff5e22]">GLOBAL_PROTOCOL</span>
            <p class="text-2xl font-headline font-black text-white italic tracking-tighter leading-none">{{ $stats['low_stock'] > 0 ? 'ALERT_SIG_X6' : 'OPTIMAL_STATE' }}</p>
        </div>
    </div>
</div>

<!-- Metric Matrix: Precision Analytics -->
<div id="tour-inventory-stats" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-16 relative z-10">
    <!-- Value Node -->
    <div class="industrial-node group">
        <div class="absolute -right-8 -top-8 opacity-[0.05] group-hover:scale-110 group-hover:opacity-[0.1] transition-all duration-1000">
            <span class="material-symbols-outlined text-[180px] text-primary">account_balance_wallet</span>
        </div>
        <span class="mag-label">TOTAL_ASSET_VALUATION_MAG</span>
        <div class="flex items-baseline gap-4">
            <span class="mag-value text-white shadow-primary/10 drop-shadow-md italic tracking-tighter">{{ number_format($stats['valuation'], 2) }}</span>
            <span class="text-[12px] font-black text-stone-700 font-mono italic">USD_XMIT</span>
        </div>
        <div class="mt-8 flex items-center gap-4">
            <span class="bg-primary text-stone-950 px-5 py-2 rounded-xl text-[11px] font-black uppercase tracking-[0.3em] italic shadow-[0_0_20px_#ceff5e44]">STABLE_PULSE</span>
            <span class="text-[11px] text-stone-600 font-black uppercase tracking-widest italic group-hover:text-stone-400 transition-colors">REAL-TIME_SCAN</span>
        </div>
    </div>

    <!-- Turnover Node -->
    <div class="industrial-node group">
        <div class="absolute -right-8 -top-8 opacity-[0.05] group-hover:scale-110 group-hover:opacity-[0.1] transition-all duration-1000">
            <span class="material-symbols-outlined text-[180px] text-primary">sync_alt</span>
        </div>
        <span class="mag-label">VELOCITY_LOGIC: TURNOVER_FREQ</span>
        <div class="flex items-baseline gap-4">
            <span class="mag-value text-white italic tracking-tighter shadow-inner">4.28x</span>
            <span class="text-[11px] font-black text-stone-700 uppercase italic font-mono tracking-widest">CYCLES_MAG</span>
        </div>
        <div class="mt-8 flex items-center gap-4">
            <span class="bg-stone-950 text-primary border border-primary/20 px-5 py-2 rounded-xl text-[11px] font-black uppercase tracking-[0.3em] italic shadow-inner">HIGH_FLOW_NODE</span>
            <span class="text-[11px] text-stone-600 font-black uppercase tracking-widest italic group-hover:text-stone-400 transition-colors">DEMAND_POS</span>
        </div>
    </div>

    <!-- Critical Alert Node -->
    <div class="industrial-node border-l-[12px] border-l-red-500 group">
        <span class="mag-label text-red-500">ALERT_SCAN: PRIORITY_ALPHA_1</span>
        <div class="flex items-baseline gap-4">
            <span class="mag-value text-red-500 italic tracking-tighter">{{ $stats['low_stock'] }}</span>
            <span class="text-[11px] font-black text-red-800 uppercase italic font-mono tracking-widest animate-pulse">CRITICAL_UNITS</span>
        </div>
        <div class="mt-10">
            <div class="w-full bg-stone-950 h-3 rounded-full overflow-hidden border border-white/5 relative">
                @php $low_stock_percent = $stats['total_sku'] > 0 ? ($stats['low_stock'] / $stats['total_sku']) * 100 : 0; @endphp
                <div class="bg-red-500 h-full rounded-full shadow-[0_0_15px_#ef4444] transition-all duration-1000" style="width: {{ $low_stock_percent }}%"></div>
            </div>
            <p class="text-[11px] text-stone-600 font-black uppercase tracking-widest mt-4 italic italic group-hover:text-stone-400 transition-colors">{{ round($low_stock_percent, 1) }}% INTEGRITY_RISK_DETECTED</p>
        </div>
    </div>

    <!-- Sync Lock Node -->
    <div class="industrial-node border border-primary/20 bg-stone-950 shadow-inner group">
        <div class="absolute inset-0 opacity-[0.05] group-hover:opacity-[0.1] transition-opacity" style="background-image: radial-gradient(#ceff5e 2px, transparent 2px); background-size: 24px 24px;"></div>
        <span class="mag-label text-primary">LEDGER_SYNC_PROTOCOL_X9</span>
        <div class="flex items-baseline gap-4 relative z-10">
            <span class="text-5xl font-headline font-black text-white italic tracking-tighter shadow-[0_0_20px_#ceff5e11]">100%_SECURE</span>
        </div>
        <p class="text-[11px] text-stone-600 font-black uppercase tracking-[0.3em] mt-12 relative z-10 flex items-center gap-4 italic group-hover:text-stone-400 transition-colors">
            <span class="w-4 h-4 rounded-full bg-primary shadow-[0_0_20px_#ceff5e] animate-pulse"></span>
            VIRTUAL_STORE_SYNC_LOCK_ACTIVE
        </p>
    </div>
</div>

<!-- System Interaction Panel: Technical Modules -->
<div id="tour-inventory-actions" class="grid grid-cols-2 md:grid-cols-5 gap-6 mb-16 relative z-10">
    <a href="{{ url('/erp/inventario/productos') }}" class="group bg-primary text-stone-950 p-10 rounded-[40px] flex flex-col items-center justify-center gap-6 transition-all hover:bg-white hover:scale-[1.05] shadow-[0_0_40px_rgba(206,255,94,0.1)] italic">
        <span class="material-symbols-outlined text-5xl group-hover:scale-125 transition-transform duration-500">category</span>
        <span class="text-[12px] font-black uppercase tracking-[0.4em] text-center leading-none">MASTER_CATALOG</span>
    </a>
    <a href="{{ url('/erp/inventario/desarrollo') }}" class="group bg-stone-900 border border-white/5 p-10 rounded-[40px] flex flex-col items-center justify-center gap-6 transition-all hover:border-primary hover:scale-[1.05] shadow-3xl text-stone-500 hover:text-white italic">
        <span class="material-symbols-outlined text-5xl group-hover:rotate-12 transition-all">biotech</span>
        <span class="text-[12px] font-black uppercase tracking-[0.4em] text-center leading-none">R&D_STAGING</span>
    </a>
    <a href="{{ url('/erp/inventario/lista-precios') }}" class="group bg-stone-900 border border-white/5 p-10 rounded-[40px] flex flex-col items-center justify-center gap-6 transition-all hover:border-primary hover:scale-[1.05] shadow-3xl text-stone-500 hover:text-white italic">
        <span class="material-symbols-outlined text-5xl group-hover:scale-110 transition-all">payments</span>
        <span class="text-[12px] font-black uppercase tracking-[0.4em] text-center leading-none">PRICE_MATRIX</span>
    </a>
    <a href="{{ url('/erp/inventario/kardex') }}" class="group bg-stone-900 border border-white/5 p-10 rounded-[40px] flex flex-col items-center justify-center gap-6 transition-all hover:border-primary hover:scale-[1.05] shadow-3xl text-stone-500 hover:text-white italic">
        <span class="material-symbols-outlined text-5xl group-hover:translate-x-2 transition-all">receipt_long</span>
        <span class="text-[12px] font-black uppercase tracking-[0.4em] text-center leading-none">KARDEX_LEDGER</span>
    </a>
    <a href="{{ url('/erp/inventario/ajustes') }}" class="group bg-stone-900 border border-white/5 p-10 rounded-[40px] flex flex-col items-center justify-center gap-6 transition-all hover:border-primary hover:scale-[1.05] shadow-3xl text-stone-500 hover:text-white italic">
        <span class="material-symbols-outlined text-5xl group-hover:scale-110 transition-all">edit_note</span>
        <span class="text-[12px] font-black uppercase tracking-[0.4em] text-center leading-none">STOCK_ADJUST</span>
    </a>
</div>

<!-- Operational Dashboard: Flow Transmission -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-12 mb-20 relative z-10">
    <!-- Main Movement Table: FLOW_XMIT -->
    <div class="lg:col-span-2 bg-stone-900 border border-white/5 rounded-[48px] overflow-hidden shadow-3xl">
        <div class="p-12 border-b border-white/5 flex justify-between items-center bg-stone-950/50 backdrop-blur-3xl">
            <div class="flex items-center gap-8">
                <div class="w-16 h-16 bg-stone-950 border border-white/5 rounded-2xl flex items-center justify-center text-primary shadow-33xl group">
                    <span class="material-symbols-outlined text-[32px] group-hover:scale-125 transition-transform">swap_vert</span>
                </div>
                <div>
                    <h3 class="text-3xl font-headline font-black text-white uppercase tracking-tighter italic leading-none">STOCK_TRANSMISSION_FEED</h3>
                    <p class="text-[11px] text-stone-600 font-black uppercase tracking-[0.4em] mt-3 italic">REAL-TIME_MOVEMENT_LOGIC</p>
                </div>
            </div>
        </div>
        <div class="overflow-x-auto font-mono italic uppercase">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-stone-950 text-stone-700">
                        <th class="px-10 py-6 text-left text-[11px] font-black tracking-[0.4em] italic uppercase">PROTOCOL_ID / TIMESTAMP</th>
                        <th class="px-10 py-6 text-left text-[11px] font-black tracking-[0.4em] italic uppercase">ASSET_PROFILE_NODE</th>
                        <th class="px-10 py-6 text-right text-[11px] font-black tracking-[0.4em] italic uppercase">QUANTUM</th>
                        <th class="px-10 py-6 text-center text-[11px] font-black tracking-[0.4em] italic uppercase">FLOW_CMD</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @forelse($stats['recent_movements'] as $movement)
                    <tr class="hover:bg-primary/5 transition-colors group">
                        <td class="px-10 py-8">
                            <p class="text-[12px] font-black text-white tracking-widest mb-1">{{ $movement->created_at->format('d_M_Y') }}</p>
                            <p class="text-[11px] font-black text-stone-700 italic mt-1 group-hover:text-stone-500 transition-colors uppercase font-mono">REF: #{{ $movement->reference_id ?? 'INT_'.str_pad($movement->id, 5, '0', STR_PAD_LEFT) }}</p>
                        </td>
                        <td class="px-10 py-8 text-[12px] font-black text-stone-400 group-hover:text-white transition-colors uppercase italic tracking-tighter">{{ $product_names[$movement->product_id] ?? 'UNDEFINED_ASSET' }}</td>
                        <td class="px-10 py-8 text-right font-mono">
                            <span class="text-[16px] font-black italic tracking-tighter {{ $movement->tipo == 'ENTRADA' ? 'text-primary' : 'text-red-500' }}">
                                {{ $movement->tipo == 'ENTRADA' ? '+' : '-' }}{{ number_format($movement->cantidad, 0) }}
                            </span>
                        </td>
                        <td class="px-10 py-8 text-center">
                            <span class="px-5 py-2 rounded-xl text-[11px] font-black tracking-widest border {{ $movement->tipo == 'ENTRADA' ? 'bg-primary/10 text-primary border-primary/20' : 'bg-red-500/10 text-red-500 border-red-500/20 shadow-inner' }}">
                                {{ $movement->tipo }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="py-24 text-center">
                            <p class="text-[12px] font-black text-stone-800 uppercase tracking-[0.5em] italic">NO_CATEGORICAL_TRANSMISSION_DETECTED</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="px-12 py-8 bg-stone-950/80 border-t border-white/5 flex justify-center">
            <a href="{{ url('/erp/inventario/kardex') }}" class="text-[11px] font-black text-stone-700 hover:text-white transition-all italic uppercase tracking-[0.5em] font-mono">ACCESS_MASTER_HISTORICAL_TRACE</a>
        </div>
    </div>

    <!-- Right Column: Compliance & Catalog Insights -->
    <div class="flex flex-col gap-10">
        <div class="bg-stone-900 border border-white/5 rounded-[48px] p-12 shadow-3xl relative overflow-hidden group">
            <h3 class="text-[12px] font-black text-white uppercase tracking-[0.4em] mb-12 flex items-center gap-6 italic">
                <span class="material-symbols-outlined text-stone-700 group-hover:text-primary transition-colors">hub</span>
                CATALOG_STRUCTURAL_MIX
            </h3>
            <div class="space-y-12">
                <div class="group cursor-default">
                    <div class="flex justify-between items-end mb-4 font-mono uppercase italic font-black">
                        <span class="text-[11px] text-stone-600 group-hover:text-stone-400 transition-colors tracking-widest">Motor_Heavy_Duty_CORE</span>
                        <span class="text-[12px] text-white">45%_POPULATION</span>
                    </div>
                    <div class="w-full bg-stone-950 h-3 rounded-full overflow-hidden p-[1px] border border-white/5 shadow-inner">
                        <div class="bg-primary shadow-[0_0_15px_#ceff5e] h-full rounded-full transition-all duration-1000" style="width: 45%"></div>
                    </div>
                </div>
            </div>
            <span class="material-symbols-outlined absolute -right-12 -bottom-12 text-[180px] opacity-[0.02] text-white pointer-events-none rotate-12 group-hover:opacity-[0.05] transition-opacity">analytics</span>
        </div>
        
        <div class="bg-stone-950 rounded-[48px] p-12 shadow-inner border border-primary/20 relative overflow-hidden transition-all hover:bg-stone-900 group">
            <div class="absolute inset-x-0 top-0 h-1 bg-primary/30"></div>
            <p class="text-[11px] font-black text-primary uppercase tracking-[0.5em] mb-6 italic shadow-[0_0_10px_#ceff5e22]">FISCAL_STATUS: COMPLIANT_OK</p>
            <p class="text-[14px] text-stone-600 leading-relaxed font-black uppercase italic tracking-widest group-hover:text-stone-400 transition-colors uppercase">ART_177_ISLR_PROTOCOL_DETECTED • SENIAT_NORMATIVE_SYNC_LOCK_ACTIVE</p>
            <span class="material-symbols-outlined absolute -right-12 -bottom-12 text-[180px] opacity-[0.05] text-primary pointer-events-none rotate-12 group-hover:opacity-[0.1] transition-opacity">policy</span>
        </div>
    </div>
</div>

<!-- Asset Spotlight: Featured Catalog Nodes -->
<div class="mt-20 bg-stone-950 border border-white/5 rounded-[56px] p-16 shadow-inner relative overflow-hidden backdrop-blur-3xl">
    <div class="flex items-center gap-6 mb-16">
        <div class="w-4 h-12 bg-primary rounded-full shadow-[0_0_20px_#ceff5e]"></div>
        <h3 class="text-4xl font-headline font-black text-white uppercase tracking-tighter italic leading-none">FEATURED_ASSET_SPOTLIGHT_X_RAY</h3>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
      @foreach($stats['featured_products'] as $product)
      <div class="flex flex-col p-10 bg-stone-900/50 border border-white/5 rounded-[40px] hover:border-primary/30 hover:bg-stone-900 transition-all shadow-3xl group relative overflow-hidden italic">
        <div class="absolute top-0 right-0 p-8 opacity-10 group-hover:opacity-30 transition-opacity">
            <span class="material-symbols-outlined text-stone-500 text-5xl">inventory_2</span>
        </div>
        <div class="w-20 h-20 bg-stone-950 border border-white/10 rounded-[28px] flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-stone-950 transition-all duration-500 shadow-inner mb-10">
           <span class="material-symbols-outlined text-[36px] items-center">terminal</span>
        </div>
        <div class="space-y-6">
          <div>
            <p class="text-[11px] font-black text-stone-600 group-hover:text-primary uppercase tracking-[0.4em] transition-colors mb-3">ID: {{ $product->codigo_oem }}</p>
            <p class="text-[20px] font-black text-white uppercase italic tracking-tighter mb-4 leading-tight group-hover:text-primary transition-colors line-clamp-2">{{ $product->nombre }}</p>
          </div>
          <div class="flex flex-col gap-6 pt-6 border-t border-white/5">
             <div class="flex flex-col">
                <span class="text-[11px] text-stone-700 font-black uppercase tracking-widest italic mb-2">INVENTORY_LEVEL_MAG</span> 
                <span class="text-[20px] font-mono font-black italic tracking-tighter {{ $product->stock_actual <= $product->stock_minimo ? 'text-red-500' : 'text-white' }} shadow-inner">{{ number_format($product->stock_actual, 0) }}_UNITS</span>
             </div>
             <div class="flex flex-col">
                <span class="text-[11px] text-stone-700 font-black uppercase tracking-widest italic mb-2">ASSET_VALUATION_NODE</span> 
                <span class="text-[20px] font-mono font-black text-primary italic tracking-tighter shadow-primary/10 drop-shadow-sm">${{ number_format($product->stock_actual * $product->costo_compra, 2) }}</span>
             </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
</div>


@endsection

