@section('breadcrumb')
    <a href="{{ url('/erp/inicio') }}" class="text-stone-500 hover:text-primary transition-colors font-black text-[12px] uppercase tracking-widest italic">ERP_CORE</a>
    <span class="material-symbols-outlined text-[14px] text-stone-700">chevron_right</span>
    <a href="{{ url('/erp/inventario') }}" class="text-stone-500 hover:text-primary transition-colors font-black text-[12px] uppercase tracking-widest italic">ASSET_CONTROL</a>
    <span class="material-symbols-outlined text-[14px] text-stone-700">chevron_right</span>
    <span class="text-primary font-black text-[12px] uppercase tracking-widest italic">KARDEX_LEDGER</span>
@endsection

@section('content')
    <!-- Page Header: Strategic Inventory Balancing -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6 mb-12 pb-10 border-b border-white/5">
        <div>
            <div class="flex items-center gap-3 mb-4">
                <span class="w-12 h-[2px] bg-primary"></span>
                <p class="text-[12px] font-black text-stone-500 uppercase tracking-[0.4em] italic">HISTORICAL_ASSET_TRACEABILITY</p>
            </div>
            <h1 class="text-6xl font-headline font-black text-white tracking-tighter uppercase leading-none">Kardex <span class="text-stone-600">Ledger</span></h1>
            <p class="text-[12px] text-stone-500 mt-4 font-black uppercase tracking-[0.2em] italic">MAYOR DE REPUESTO LA CIMA, C.A. • RIF: J-40308741-5</p>
        </div>
        <div class="flex gap-4">
             <button class="bg-stone-900 border border-white/10 text-white px-10 py-5 text-[12px] font-black uppercase tracking-widest flex items-center gap-4 hover:border-primary/40 transition-all rounded-xl shadow-2xl relative group overflow-hidden">
                <span class="material-symbols-outlined text-xl text-primary">filter_list</span>
                ADVANCED_FILTERS
            </button>
            <button class="bg-primary text-stone-900 px-12 py-5 text-[12px] font-black uppercase tracking-[0.2em] rounded-xl shadow-2xl hover:scale-105 transition-all active:scale-95 group/btn italic">
                EXPORT_LEGAL_REPORT
                <span class="material-symbols-outlined text-[18px] ml-3 inline-block group-hover:rotate-12 transition-transform">download</span>
            </button>
        </div>
    </div>

    <!-- Metric Bento Grid -->
    <div class="grid grid-cols-12 gap-10 mb-16">
        <div class="col-span-12 lg:col-span-4 bg-stone-900 border border-white/5 p-10 rounded-[40px] shadow-3xl relative overflow-hidden group">
            <div class="absolute top-0 right-0 p-8 opacity-[0.03] group-hover:opacity-[0.05] transition-opacity">
                <span class="material-symbols-outlined text-8xl text-white">account_balance_wallet</span>
            </div>
            <p class="text-[12px] font-black text-stone-600 uppercase tracking-[0.3em] mb-6 italic">TOTAL_ASSET_VALUATION</p>
            <h3 class="text-4xl font-headline font-black text-white uppercase tracking-tighter italic group-hover:text-primary transition-colors">$ {{ number_format($totalValuation ?? 0, 2) }}</h3>
            <div class="mt-6 flex items-center gap-3 text-primary font-black text-[12px] uppercase tracking-widest italic">
                <span class="material-symbols-outlined text-sm">verified_user</span>
                REALTIME_AUDITED_STREAM
            </div>
        </div>

        <div class="col-span-12 lg:col-span-4 bg-stone-900 border border-white/5 p-10 rounded-[40px] shadow-3xl relative overflow-hidden group">
            <div class="absolute top-0 right-0 p-8 opacity-[0.03] group-hover:opacity-[0.05] transition-opacity">
                <span class="material-symbols-outlined text-8xl text-white">functions</span>
            </div>
            <p class="text-[12px] font-black text-stone-600 uppercase tracking-[0.3em] mb-6 italic">INVENTORY_VALUATION_METHOD</p>
            <h3 class="text-4xl font-headline font-black text-white uppercase italic tracking-tighter group-hover:text-primary transition-colors">CPP_PROMEDIO</h3>
            <div class="mt-6 flex items-center gap-3 text-stone-600 font-black text-[12px] uppercase tracking-widest italic">
                <span class="material-symbols-outlined text-sm">gavel</span>
                COMPLIANCE_ART_177_ISLR
            </div>
        </div>

        <div class="col-span-12 lg:col-span-4 bg-primary p-10 rounded-[40px] shadow-3xl relative overflow-hidden group hover:bg-stone-950 transition-all duration-700">
            <div class="absolute -right-12 -bottom-12 opacity-10 rotate-12 group-hover:opacity-20 transition-opacity">
                <span class="material-symbols-outlined text-[180px] text-stone-900 group-hover:text-primary">verified</span>
            </div>
            <p class="text-[12px] font-black text-stone-900 group-hover:text-primary uppercase tracking-[0.3em] mb-6 italic">MOVEMENT_INTEGRITY_CHECK</p>
            <h3 class="text-4xl font-headline font-black text-stone-900 group-hover:text-white uppercase tracking-tighter italic">CONSISTENT_STATE</h3>
            <div class="mt-6 flex items-center gap-3 text-stone-900 group-hover:text-stone-700 font-black text-[12px] uppercase tracking-widest italic">
                <span class="w-2 h-2 bg-stone-900 rounded-full animate-pulse group-hover:bg-primary"></span>
                HASH: 9A2F11EB943902
            </div>
        </div>
    </div>

    <!-- Main Transaction Board -->
    <section class="bg-stone-900 border border-white/5 rounded-[40px] shadow-3xl overflow-hidden mb-20 relative">
        <div class="p-10 border-b border-white/5 flex justify-between items-center bg-stone-950/30">
            <div class="flex items-center gap-4">
                <span class="w-3 h-3 bg-primary rounded-full"></span>
                <h3 class="text-[12px] font-black text-white uppercase tracking-[0.3em] italic">TRANSACTION_HISTORY_LOG [CIMA_SPEC]</h3>
            </div>
            <div class="flex gap-6">
                <span class="px-6 py-2 bg-stone-950 border border-white/5 text-[11px] font-black text-stone-500 rounded-full uppercase italic tracking-widest">PERIOD: LAST_30_CALENDAR_DAYS</span>
            </div>
        </div>

        <div class="overflow-x-auto custom-scrollbar">
            <table class="w-full text-left border-collapse min-w-[1800px]">
                <thead>
                    <tr class="bg-stone-950">
                        <th class="p-8 text-[11px] font-black text-stone-600 uppercase tracking-widest italic">ISO_TIMESTAMP</th>
                        <th class="p-8 text-[11px] font-black text-stone-600 uppercase tracking-widest italic">TRACKING_REF</th>
                        <th class="p-8 text-[11px] font-black text-stone-600 uppercase tracking-widest italic">OPERATIONAL_CONCEPT</th>
                        <th class="p-8 text-[11px] font-black text-stone-600 uppercase tracking-widest italic text-center">∆ STOCK_DELTA</th>
                        <th class="p-8 text-[11px] font-black text-stone-600 uppercase tracking-widest italic text-center">AVAILability</th>
                        <th class="p-8 text-[11px] font-black text-stone-600 uppercase tracking-widest italic text-right">AVG_VALUATION</th>
                        <th class="p-8 text-[11px] font-black text-stone-600 uppercase tracking-widest italic text-right">CONSOLIDATED_BALANCE</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @forelse($movements as $movement)
                        <tr class="hover:bg-white/[0.02] transition-colors group">
                            <td class="p-8">
                                <span class="text-[14px] font-black text-white italic tracking-tighter uppercase group-hover:text-primary transition-colors">{{ $movement->created_at->format('d M Y') }}</span>
                                <span class="block text-[10px] text-stone-600 mt-2 uppercase font-black tracking-widest italic">{{ $movement->created_at->format('H:i:s') }} UTC</span>
                            </td>
                            <td class="p-8">
                                <span class="text-[12px] font-black text-primary bg-primary/5 px-4 py-2 rounded-lg border border-primary/20 italic tracking-widest">#{{ str_pad($movement->id, 8, '0', STR_PAD_LEFT) }}</span>
                            </td>
                            <td class="p-8">
                                <p class="text-[14px] font-black text-stone-200 uppercase italic tracking-tight">{{ $movement->product->nombre ?? 'NULL_OBJECT_REFERENCE' }}</p>
                                <p class="text-[11px] font-black text-stone-600 mt-2 uppercase tracking-[0.20em] italic">{{ $movement->reason }}</p>
                            </td>
                            <td class="p-8 text-center">
                                @if($movement->type == 'IN')
                                    <span class="px-5 py-2 bg-primary text-stone-900 rounded-lg font-black text-[12px] uppercase italic tracking-tighter shadow-lg shadow-primary/10">+ {{ number_format($movement->quantity, 0) }} UNITS</span>
                                @else
                                    <span class="px-5 py-2 bg-red-500/10 text-red-500 border border-red-500/20 rounded-lg font-black text-[12px] uppercase italic tracking-tighter shadow-lg shadow-red-500/10">- {{ number_format($movement->quantity, 0) }} UNITS</span>
                                @endif
                            </td>
                            <td class="p-8 text-center">
                                <div class="flex flex-col items-center">
                                    <span class="text-[18px] font-black text-white italic tracking-tighter">{{ number_format($movement->product->stock_actual ?? 0, 0) }}</span>
                                    <span class="text-[9px] font-black text-stone-700 uppercase tracking-[0.2em] mt-1 italic">MAGNITUDE</span>
                                </div>
                            </td>
                            <td class="p-8 text-right">
                                <span class="text-[16px] font-black text-stone-500 italic tracking-tighter">$ {{ number_format($movement->product->precio_mayor ?? 0, 2) }}</span>
                            </td>
                            <td class="p-8 text-right">
                                <span class="text-[20px] font-black text-primary italic tracking-tighter">$ {{ number_format(($movement->product->precio_mayor ?? 0) * ($movement->product->stock_actual ?? 0), 2) }}</span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="p-32 text-center text-stone-700 italic font-black uppercase text-[14px] tracking-[0.5em]">
                                <div class="flex flex-col items-center gap-6">
                                    <span class="material-symbols-outlined text-6xl opacity-10">history</span>
                                    NO_MOVEMENTS_DETECTED_IN_CURRENT_AUDIT_CYCLE.
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

    <!-- Telemetry Insights Footer: Global Consistency -->
    <div class="relative bg-stone-900 p-12 md:p-20 rounded-[50px] overflow-hidden shadow-3xl group/footer border border-white/5 mb-16">
        <div class="absolute -right-20 top-0 opacity-[0.03] select-none pointer-events-none transform group-hover/footer:rotate-6 transition-transform duration-1000">
            <span class="text-[25rem] font-black leading-none font-headline tracking-tighter text-white uppercase italic">CIMA</span>
        </div>
        
        <div class="relative z-10 grid grid-cols-1 md:grid-cols-3 gap-20 items-center">
            <div>
                <div class="w-16 h-16 bg-primary rounded-3xl flex items-center justify-center mb-10 shadow-3xl shadow-primary/20">
                    <span class="material-symbols-outlined text-stone-900 text-3xl font-black">history_edu</span>
                </div>
                <h2 class="text-5xl font-headline font-black text-white uppercase tracking-tight mb-8 leading-tight italic">Legal_Faith_And <br> <span class="text-primary tracking-widest font-black uppercase">DOCUMENTATION</span></h2>
                <p class="text-[12px] text-stone-500 leading-relaxed font-black uppercase tracking-[0.2em] italic">THIS_KARDEX_LEDGER_COMPLIES_WITH_INT_AUDIT_SPECS_AND_VENEZUELAN_FISCAL_LAW_v2024.</p>
            </div>
            
            <div class="md:col-span-2 grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div class="bg-stone-950 border border-white/5 p-10 rounded-3xl group/card hover:bg-primary transition-all duration-700 cursor-pointer shadow-3xl relative overflow-hidden">
                    <div class="absolute top-0 right-0 p-6 opacity-10 group-hover/card:opacity-100 transition-opacity">
                        <span class="material-symbols-outlined text-stone-700 group-hover/card:text-stone-900 text-3xl">shield_with_heart</span>
                    </div>
                    <p class="text-[12px] font-black text-stone-600 group-hover/card:text-stone-900/60 uppercase tracking-widest italic mb-2">IMMUTABILITY_INDEX</p>
                    <h4 class="text-4xl font-headline font-black text-white group-hover/card:text-stone-900 uppercase italic tracking-tighter leading-none">SEALED_RECORDS</h4>
                    <div class="mt-6 flex items-center gap-3">
                        <span class="flex h-3 w-3 relative">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary group-hover/card:bg-stone-900 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-3 w-3 bg-primary group-hover/card:bg-stone-900"></span>
                        </span>
                        <span class="text-[10px] font-black text-stone-500 group-hover/card:text-stone-900 uppercase tracking-widest italic">TIMESTAMPING_PROTOCOL_ACTIVE</span>
                    </div>
                </div>
                
                <div class="bg-stone-950 border border-white/5 p-10 rounded-3xl group/card hover:bg-white transition-all duration-700 cursor-pointer shadow-3xl relative overflow-hidden">
                    <div class="absolute top-0 right-0 p-6 opacity-10 group-hover/card:opacity-100 transition-opacity">
                        <span class="material-symbols-outlined text-primary text-3xl">hub</span>
                    </div>
                    <p class="text-[12px] font-black text-stone-600 group-hover/card:text-stone-400 uppercase tracking-widest italic mb-2">ERP_REALTIME_SYNC</p>
                    <h4 class="text-4xl font-headline font-black text-white group-hover/card:text-stone-950 uppercase italic tracking-tighter leading-none">L_v3_CORE_SYNC</h4>
                    <div class="mt-6 flex items-center gap-3">
                        <span class="w-1.5 h-1.5 bg-primary rounded-full animate-pulse"></span>
                        <span class="text-[10px] font-black text-stone-500 group-hover/card:text-stone-400 uppercase tracking-widest italic">LATENCY < 12ms_DETECTED</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

