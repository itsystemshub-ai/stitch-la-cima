@section('breadcrumb')
    <a href="{{ url('/erp/inicio') }}" class="text-stone-500 hover:text-primary transition-colors font-black text-[12px] uppercase tracking-widest italic">ERP_CORE</a>
    <span class="material-symbols-outlined text-[14px] text-stone-700">chevron_right</span>
    <a href="{{ url('/erp/inventario') }}" class="text-stone-500 hover:text-primary transition-colors font-black text-[12px] uppercase tracking-widest italic">ASSET_CONTROL</a>
    <span class="material-symbols-outlined text-[14px] text-stone-700">chevron_right</span>
    <span class="text-primary font-black text-[12px] uppercase tracking-widest italic">REPORTING_CENTER</span>
@endsection

@section('content')
    <!-- Page Header: Strategic Intelligence -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6 mb-12 pb-10 border-b border-white/5">
        <div>
            <div class="flex items-center gap-3 mb-4">
                <span class="w-12 h-[2px] bg-primary"></span>
                <p class="text-[12px] font-black text-stone-500 uppercase tracking-[0.4em] italic">ASSET_VALUATION_INTELLIGENCE</p>
            </div>
            <h1 class="text-6xl font-headline font-black text-white tracking-tighter uppercase leading-none">REPORTING <span class="text-stone-600">CENTER</span></h1>
            <p class="text-[12px] text-stone-500 mt-4 font-black uppercase tracking-[0.2em] italic">MAYOR DE REPUESTO LA CIMA, C.A. • RIF: J-40308741-5</p>
        </div>
        <div class="flex gap-4">
             <button class="bg-stone-900 border border-white/10 text-white px-10 py-5 text-[12px] font-black uppercase tracking-widest flex items-center gap-4 hover:border-primary/40 transition-all rounded-xl shadow-2xl relative group overflow-hidden italic">
                <span class="material-symbols-outlined text-xl text-primary">picture_as_pdf</span>
                GENERATE_PDF_HISTORY
            </button>
            <a href="{{ route('erp.export.inventario') }}" class="bg-primary text-stone-900 px-12 py-5 text-[12px] font-black uppercase tracking-[0.2em] rounded-xl shadow-2xl hover:scale-105 transition-all active:scale-95 group/btn flex items-center gap-3 italic">
                EXPORT_MASTER_DATA
                <span class="material-symbols-outlined text-[18px] group-hover:rotate-12 transition-transform font-black">table_view</span>
            </a>
        </div>
    </div>

    <!-- Analytics Cards -->
    <div class="grid grid-cols-12 gap-10 mb-16">
        <!-- Main Valuation Card (6 cols) -->
        <div class="col-span-12 lg:col-span-6 bg-stone-900 border border-white/5 rounded-[40px] p-12 shadow-3xl relative overflow-hidden group">
            <div class="absolute -right-20 -top-20 w-80 h-80 bg-primary/5 blur-[120px] rounded-full group-hover:bg-primary/10 transition-all duration-1000"></div>
            <div class="relative z-10 flex flex-col justify-between h-full">
                <div>
                    <div class="flex items-center gap-4 mb-10">
                        <div class="w-12 h-12 bg-primary/10 rounded-2xl flex items-center justify-center border border-primary/20 shadow-lg shadow-primary/5">
                            <span class="material-symbols-outlined text-primary text-2xl font-black">account_balance_wallet</span>
                        </div>
                        <p class="text-[12px] font-black text-primary uppercase tracking-[0.3em] italic">TOTAL_MASTER_VALUATION</p>
                    </div>
                    <h3 class="text-6xl font-headline font-black text-white tracking-tighter leading-none mb-6 italic group-hover:text-primary transition-colors duration-500">${{ number_format($valuation, 2) }}</h3>
                    <p class="text-stone-500 font-black text-[12px] uppercase tracking-[0.2em] italic">GROSS_CURRENT_ASSET_IN_WHAREHOUSE</p>
                </div>
                <div class="mt-16 flex items-center gap-10 border-t border-white/5 pt-10">
                    <div class="flex items-center gap-4">
                        <span class="material-symbols-outlined text-primary font-black">trending_up</span>
                        <div>
                            <p class="text-[14px] font-black text-white uppercase leading-none tracking-tighter italic">+12.4%_DELTA</p>
                            <p class="text-[10px] text-stone-600 font-black uppercase tracking-widest mt-2 italic">Q4_FISCAL_GROWTH</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="absolute right-0 bottom-0 opacity-[0.02] pointer-events-none group-hover:scale-110 transition-transform duration-1000 transform translate-x-10 translate-y-10">
                <span class="material-symbols-outlined text-[350px] leading-none text-white">analytics</span>
            </div>
        </div>

        <!-- Secondary Stat Cards (6 cols) -->
        <div class="col-span-12 lg:col-span-6 grid grid-cols-1 sm:grid-cols-2 gap-10">
            <div class="bg-stone-900 border border-white/5 rounded-[40px] p-12 shadow-3xl hover:border-red-500/40 transition-all duration-500 group/card relative overflow-hidden">
                <div class="absolute top-0 right-0 p-8 opacity-5 group-hover/card:opacity-10 transition-opacity">
                    <span class="material-symbols-outlined text-6xl text-red-500">warning</span>
                </div>
                <div class="w-14 h-14 bg-red-500/10 text-red-500 rounded-3xl flex items-center justify-center mb-10 group-hover/card:scale-110 transition-all border border-red-500/20 shadow-lg shadow-red-500/5">
                    <span class="material-symbols-outlined font-black text-2xl">warning_amber</span>
                </div>
                <p class="text-[12px] font-black text-stone-500 uppercase tracking-[0.2em] mb-3 italic">CRITICAL_STOCK_DELTA</p>
                <h4 class="text-4xl font-headline font-black text-white italic group-hover/card:text-red-500 transition-colors uppercase tracking-tighter">{{ $critical_items }} <span class="text-stone-700 italic">SKUs</span></h4>
                <div class="mt-10 h-[3px] w-full bg-stone-950 rounded-full overflow-hidden border border-white/5">
                    <div class="h-full bg-red-500 w-[65%] shadow-[0_0_15px_rgba(239,68,68,0.5)]"></div>
                </div>
                <p class="mt-6 text-[11px] text-red-500 font-black uppercase tracking-widest animate-pulse italic">OUT_OF_STOCK_RISK_DETECTED</p>
            </div>

            <div class="bg-stone-900 border border-white/5 rounded-[40px] p-12 shadow-3xl hover:border-primary/40 transition-all duration-500 group/card relative overflow-hidden">
                <div class="absolute top-0 right-0 p-8 opacity-5 group-hover/card:opacity-10 transition-opacity">
                    <span class="material-symbols-outlined text-6xl text-primary">published_with_changes</span>
                </div>
                <div class="w-14 h-14 bg-primary/10 text-primary rounded-3xl flex items-center justify-center mb-10 group-hover/card:rotate-12 transition-all border border-primary/20 shadow-lg shadow-primary/5">
                    <span class="material-symbols-outlined font-black text-2xl">published_with_changes</span>
                </div>
                <p class="text-[12px] font-black text-stone-500 uppercase tracking-[0.2em] mb-3 italic">MONTHLY_ROTATION_INDEX</p>
                <h4 class="text-4xl font-headline font-black text-white italic group-hover/card:text-primary transition-colors uppercase tracking-tighter">4.2x <span class="text-stone-700 italic">AVG</span></h4>
                <div class="mt-10 flex items-center gap-3">
                    <span class="w-2.5 h-2.5 bg-primary rounded-full animate-pulse shadow-lg shadow-primary/50"></span>
                    <p class="text-[11px] text-stone-500 font-black uppercase tracking-widest leading-none italic">OPERATIONAL_EFFICIENCY: OPTIMAL</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Data Table Partition -->
    <div class="bg-stone-900 border border-white/5 rounded-[50px] shadow-3xl overflow-hidden mb-16 relative">
        <div class="p-10 border-b border-white/5 bg-stone-950/30 flex justify-between items-center">
            <div class="flex items-center gap-4">
                <span class="w-3 h-3 bg-primary rounded-full"></span>
                <h3 class="text-[12px] font-black text-white uppercase tracking-[0.3em] italic">HIGH_DENSITY_MOVEMENTS [STREAM_AUDIT]</h3>
            </div>
            <div class="flex items-center gap-4">
                <select class="text-[11px] font-black border-white/5 bg-stone-950 text-stone-500 rounded-xl px-8 py-4 uppercase tracking-widest focus:ring-4 focus:ring-primary/10 transition-all cursor-pointer italic outline-none hover:border-primary/40">
                    <option>FILTER_BY_PERIOD</option>
                    <option>LAST_30_DAYS</option>
                    <option>Q4_FISCAL_2025</option>
                </select>
            </div>
        </div>

        <div class="overflow-x-auto custom-scrollbar">
            <table class="w-full text-left border-collapse min-w-[1200px]">
                <thead>
                    <tr class="bg-stone-950 uppercase border-b border-white/5 italic font-black text-stone-600 text-[11px] tracking-[0.2em]">
                        <th class="p-10 leading-none">GLOBAL_ASSET_IDENTITY</th>
                        <th class="p-10 leading-none">ABC_CLASSIFICATION</th>
                        <th class="p-10 leading-none">VECTOR_FLOW</th>
                        <th class="p-10 leading-none">REMAINING</th>
                        <th class="p-10 text-right leading-none">NET_VALUATION</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @forelse($movements as $movement)
                    <tr class="hover:bg-white/[0.02] transition-all group">
                        <td class="p-10">
                            <span class="font-black text-white block mb-2 text-[14px] uppercase italic tracking-tighter group-hover:text-primary transition-colors">{{ $movement->product->nombre }}</span>
                            <span class="text-[10px] text-stone-600 font-black uppercase tracking-[0.2em] italic flex items-center gap-2">
                                <span class="w-3 h-[1px] bg-stone-800"></span>
                                MASTER_SKU: {{ $movement->product->codigo_oem }}
                            </span>
                        </td>
                        <td class="p-10">
                            @php
                                $stock = $movement->product->stock_actual;
                                $min = $movement->product->stock_minimo;
                                $status = ($stock <= $min) ? 'CLASS_A' : (($stock < $min * 2) ? 'CLASS_B' : 'CLASS_C');
                            @endphp
                            <span class="px-5 py-2 @if($status == 'CLASS_A') bg-primary text-stone-900 shadow-lg shadow-primary/10 @else bg-stone-950 text-stone-600 border border-white/5 @endif text-[11px] font-black rounded-lg uppercase tracking-[0.1em] group-hover:bg-primary group-hover:text-stone-900 transition-all italic">{{ $status }}</span>
                        </td>
                        <td class="p-10">
                            <div class="flex items-center gap-3 @if($movement->type == 'IN') text-primary @else text-stone-700 @endif font-black text-[12px] uppercase italic tracking-tighter">
                                <span class="material-symbols-outlined text-[16px] font-black">{{ $movement->type == 'IN' ? 'download' : 'upload' }}</span>
                                {{ $movement->type == 'IN' ? 'STOCK_IN_VECTOR' : 'STOCK_OUT_VECTOR' }}
                            </div>
                        </td>
                        <td class="p-10">
                            <div class="flex flex-col">
                                <span class="text-white font-black italic text-[16px] tracking-tighter">{{ number_format($movement->quantity, 0) }} UNITS</span>
                                <span class="text-[9px] text-stone-700 font-black uppercase tracking-widest italic mt-1 leading-none">VERIFIED_MAGNITUDE</span>
                            </div>
                        </td>
                        <td class="p-10 text-right">
                            <span class="text-primary font-black text-[18px] italic tracking-tighter leading-none">$ {{ number_format($movement->quantity * $movement->product->precio_mayor, 2) }}</span>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="p-32 text-center text-stone-800 uppercase tracking-[0.5em] font-black italic text-[14px]">SYSTEM_ERROR: NO_MOVEMENTS_LOGGED_IN_BUFFER.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-10 bg-stone-950/50 flex justify-between items-center border-t border-white/5">
            <p class="text-[10px] font-black text-stone-700 uppercase tracking-[0.3em] italic leading-relaxed max-w-md">CONSISTENCY_AUDIT_REALTIME_STREAM_ACTIVE [CIMA_ERP_v2025] • ISO_STAMP: {{ now()->format('Ymd_His') }}</p>
            <div class="flex gap-4">
                <button class="w-12 h-12 bg-stone-950 border border-white/5 rounded-2xl flex items-center justify-center text-stone-700 hover:text-primary hover:border-primary/40 transition-all shadow-2xl">
                    <span class="material-symbols-outlined text-xl">chevron_left</span>
                </button>
                <button class="w-12 h-12 bg-primary text-stone-900 rounded-2xl flex items-center justify-center text-[12px] font-black shadow-3xl shadow-primary/20 italic">01</button>
                <button class="w-12 h-12 bg-stone-950 border border-white/5 rounded-2xl flex items-center justify-center text-stone-700 hover:text-primary hover:border-primary/40 transition-all shadow-2xl">
                    <span class="material-symbols-outlined text-xl">chevron_right</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Telemetry Insights Footer: Intelligence Protocol -->
    <div class="relative bg-stone-900 border border-white/5 p-12 md:p-20 rounded-[60px] overflow-hidden shadow-3xl group/footer mb-16">
        <div class="absolute -right-20 top-0 opacity-[0.03] select-none pointer-events-none transform group-hover/footer:rotate-6 transition-transform duration-1000">
            <span class="text-[25rem] font-black leading-none font-headline tracking-tighter text-white uppercase italic">DATA</span>
        </div>
        
        <div class="relative z-10 grid grid-cols-1 md:grid-cols-3 gap-20 items-center">
            <div>
                <div class="w-16 h-16 bg-primary rounded-3xl flex items-center justify-center mb-10 shadow-3xl shadow-primary/20 border border-primary/40">
                    <span class="material-symbols-outlined text-stone-900 text-3xl font-black">analytics</span>
                </div>
                <h2 class="text-5xl font-headline font-black text-white uppercase tracking-tight mb-8 leading-tight italic">Forensic_Stock <br> <span class="text-primary tracking-widest font-black uppercase">ANALYSIS</span></h2>
                <p class="text-[12px] text-stone-500 leading-relaxed font-black uppercase tracking-[0.2em] italic">THIS_REPORTING_CENTER_CONSOLIDATES_INVENTORY_INT_UNDER_GLOBAL_ACCOUNTING_SPECS.</p>
            </div>
            
            <div class="md:col-span-2 grid grid-cols-1 sm:grid-cols-2 gap-8">
                <div class="bg-stone-950 border border-white/5 p-10 rounded-[40px] group/card hover:bg-primary transition-all duration-700 cursor-pointer shadow-3xl overflow-hidden relative">
                     <div class="absolute -right-6 -bottom-6 opacity-5 group-hover/card:opacity-100 transition-opacity">
                         <span class="material-symbols-outlined text-[150px] text-stone-900 group-hover/card:text-stone-900/40">verified</span>
                     </div>
                    <div class="flex justify-between items-start mb-8">
                        <span class="text-[12px] font-black text-stone-500 group-hover/card:text-stone-900 uppercase tracking-widest italic">COMPLIANCE_LEVEL</span>
                        <span class="material-symbols-outlined text-stone-500 group-hover/card:text-stone-900 text-2xl font-black">policy</span>
                    </div>
                    <p class="text-[12px] font-black group-hover/card:text-stone-900/60 uppercase mb-2 italic">FISCAL_INTEGRITY_INDEX</p>
                    <h4 class="text-4xl font-headline font-black text-white group-hover/card:text-stone-900 uppercase italic tracking-tighter leading-none">CERTIFIED</h4>
                    <div class="mt-8 flex items-center gap-3">
                        <span class="w-3 h-3 bg-primary group-hover/card:bg-stone-900 rounded-full shadow-lg shadow-primary"></span>
                        <span class="text-[10px] font-black text-stone-500 group-hover/card:text-stone-900 uppercase tracking-[0.3em] italic leading-none">ART_177_LISLR_VEN</span>
                    </div>
                </div>
                
                <div class="bg-stone-950 border border-white/5 p-10 rounded-[40px] group/card hover:bg-white transition-all duration-700 cursor-pointer shadow-3xl relative overflow-hidden">
                    <div class="flex justify-between items-start mb-8">
                        <span class="text-[12px] font-black text-stone-500 group-hover/card:text-stone-400 uppercase tracking-widest italic">SYNCHRONICITY_ERR</span>
                        <span class="material-symbols-outlined text-primary text-2xl font-black">dynamic_feed</span>
                    </div>
                    <p class="text-[12px] font-black group-hover/card:text-stone-500 uppercase mb-2 italic">MASTER_NODE_LATENCY</p>
                    <h4 class="text-4xl font-headline font-black text-white group-hover/card:text-stone-950 uppercase italic tracking-tighter leading-none">0.4ms <span class="text-[14px] italic text-stone-600 group-hover/card:text-stone-400 uppercase tracking-widest ml-3">REALTIME</span></h4>
                    <div class="mt-8 flex items-center gap-4">
                        <span class="flex h-3 w-3 relative">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-3 w-3 bg-primary"></span>
                        </span>
                        <p class="text-[10px] text-stone-500 font-black uppercase tracking-[0.3em] italic leading-none">LIVE_TELEMETRY_PROTOCOL</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

