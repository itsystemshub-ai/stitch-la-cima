@section('breadcrumb')
    <a href="{{ url('/erp/inicio') }}" class="text-stone-500 hover:text-primary transition-colors font-black text-[12px] uppercase tracking-widest italic">ERP_CORE</a>
    <span class="material-symbols-outlined text-[14px] text-stone-700">chevron_right</span>
    <a href="{{ url('/erp/inventario') }}" class="text-stone-500 hover:text-primary transition-colors font-black text-[12px] uppercase tracking-widest italic">ASSET_CONTROL</a>
    <span class="material-symbols-outlined text-[14px] text-stone-700">chevron_right</span>
    <span class="text-primary font-black text-[12px] uppercase tracking-widest italic">STOCK_EQUILIBRIUM</span>
@endsection

@section('content')
    <!-- Page Header: Strategic Inventory Balancing -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6 mb-12 pb-10 border-b border-white/5">
        <div>
            <div class="flex items-center gap-3 mb-4">
                <span class="w-12 h-[2px] bg-primary"></span>
                <p class="text-[12px] font-black text-stone-500 uppercase tracking-[0.4em] italic">VARIANCE_CORRECTION_LOGIC</p>
            </div>
            <h1 class="text-6xl font-headline font-black text-white tracking-tighter uppercase leading-none">Stock <span class="text-stone-600">Equilibrium</span></h1>
            <p class="text-[12px] text-stone-500 mt-4 font-black uppercase tracking-[0.2em] italic">MAYOR DE REPUESTO LA CIMA, C.A. • RIF: J-40308741-5</p>
        </div>
        <div class="flex gap-4">
            <div class="bg-stone-900 border border-white/5 px-8 py-5 flex flex-col items-end rounded-2xl shadow-3xl">
                <span class="text-[11px] font-black text-primary uppercase tracking-[0.2em] italic">AUDIT_STATUS_v3.2</span>
                <span class="text-[16px] font-headline font-black text-white uppercase tracking-tighter mt-1 italic">REALITY_MATCH: 99.4%</span>
            </div>
        </div>
    </div>

    <!-- Interface Bento Grid -->
    <div class="grid grid-cols-12 gap-10 mb-16">
        <!-- Adjustment Form (8 cols) -->
        <div class="col-span-12 lg:col-span-8 space-y-10">
            <section class="bg-stone-900 border border-white/5 p-12 rounded-[40px] shadow-3xl relative overflow-hidden group">
                <div class="absolute top-0 left-0 w-2 h-full bg-primary transform origin-bottom scale-y-0 group-hover:scale-y-100 transition-transform duration-700"></div>
                
                <h3 class="text-[12px] font-black text-stone-500 uppercase tracking-[0.3em] mb-12 border-b border-white/5 pb-6 italic">INTERNAL_FLOW_PARAMETERS</h3>
                
                <form action="{{ route('erp.inventario.ajustes.process') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-10">
                    @csrf
                    <div class="col-span-2 space-y-4">
                        <label class="block text-[11px] font-black text-stone-400 uppercase tracking-widest italic">master_asset_identification (SKU / NOMENCLATURE)</label>
                        <div class="relative group">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-5 text-stone-600 group-focus-within:text-primary transition-colors">
                                <span class="material-symbols-outlined text-2xl">inventory_2</span>
                            </span>
                            <select name="product_id" required class="w-full bg-stone-950 border border-white/5 rounded-xl py-5 pl-14 pr-6 text-[14px] font-black text-white focus:ring-4 focus:ring-primary/5 transition-all appearance-none cursor-pointer uppercase italic tracking-tight">
                                <option value="" disabled selected>SELECT_MASTER_PRODUCT_OBJECT...</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->codigo_oem }} - {{ $product->nombre }} (CURRENT: {{ number_format($product->stock_actual, 0) }})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <label class="block text-[11px] font-black text-stone-400 uppercase tracking-widest italic">ADJUSTMENT_VECTORS</label>
                        <div class="relative group">
                            <select name="type" required class="w-full bg-stone-950 border border-white/5 rounded-xl py-5 px-6 text-[13px] font-black text-white focus:ring-4 focus:ring-primary/5 transition-all appearance-none cursor-pointer uppercase italic tracking-tight">
                                <option value="IN">(+) FISCAL_ENTROPY_CORRECTION</option>
                                <option value="OUT">(-) TECHNICAL_MERMA_DEPLETION</option>
                                <option value="ADJUST">(=) REALITY_SYNC_CALIBRATION</option>
                            </select>
                            <span class="material-symbols-outlined absolute right-5 top-1/2 -translate-y-1/2 text-stone-600 pointer-events-none group-hover:text-primary transition-colors">expand_more</span>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <label class="block text-[11px] font-black text-stone-400 uppercase tracking-widest italic">MAGNITUDE_DELTA</label>
                        <div class="relative group">
                            <input name="quantity" required class="w-full bg-stone-950 border border-white/5 rounded-xl py-5 px-6 text-[16px] font-black text-primary focus:ring-4 focus:ring-primary/5 transition-all uppercase italic tracking-tighter" type="number" step="0.01" value="0"/>
                            <span class="absolute right-6 top-1/2 -translate-y-1/2 text-[10px] font-black text-stone-700 uppercase tracking-widest italic">UNITS_DETECTED</span>
                        </div>
                    </div>

                    <div class="col-span-2 space-y-4">
                        <label class="block text-[11px] font-black text-stone-400 uppercase tracking-widest italic">TECHNICAL_JUSTIFICATION (MANDATORY_LOG)</label>
                        <textarea name="reason" required class="w-full bg-stone-950 border border-white/5 rounded-xl py-6 px-6 text-[13px] font-black text-stone-300 focus:ring-4 focus:ring-primary/5 transition-all placeholder:text-stone-700 h-40 uppercase italic tracking-tight" placeholder="DETAILED VARIANCE ROOT CAUSE ANALYSIS FOR SYSTEM TRACEABILITY..."></textarea>
                    </div>

                    <div class="col-span-2 mt-8 flex justify-end gap-6 pt-10 border-t border-white/5">
                        <button type="reset" class="bg-stone-900 text-stone-600 px-10 py-5 text-[12px] font-black uppercase tracking-widest border border-white/5 rounded-xl hover:text-stone-400 transition-all italic">PURGE_BUFFER</button>
                        <button type="submit" class="bg-primary text-stone-900 px-12 py-5 text-[12px] font-black uppercase tracking-[0.2em] rounded-xl shadow-2xl hover:scale-105 transition-all active:scale-95 group/btn italic">
                            EXECUTE_EQUILIBRIUM_SYNC
                            <span class="material-symbols-outlined text-[18px] ml-3 inline-block group-hover:rotate-45 transition-transform">published_with_changes</span>
                        </button>
                    </div>
                </form>
            </section>
        </div>

        <!-- Lateral Insights (4 cols) -->
        <div class="col-span-12 lg:col-span-4 space-y-10">
            <!-- Summary Card -->
            <section class="bg-stone-900 border border-white/5 p-12 rounded-[40px] shadow-3xl relative overflow-hidden">
                <div class="absolute -right-10 -top-10 opacity-[0.03]">
                    <span class="material-symbols-outlined text-[150px] text-white">history</span>
                </div>
                <h3 class="text-[12px] font-black text-stone-600 uppercase tracking-[0.3em] mb-10 italic">RECENT_VARIANCE_LOG</h3>
                <div class="space-y-8 relative z-10">
                    <div class="flex items-center gap-6 group cursor-pointer border-b border-white/5 pb-8 last:border-0 last:pb-0">
                        <div class="w-14 h-14 rounded-2xl bg-red-500/10 text-red-500 flex items-center justify-center shrink-0 border border-red-500/20 group-hover:bg-red-500 group-hover:text-white transition-all duration-500 shadow-lg shadow-red-500/10">
                            <span class="material-symbols-outlined text-2xl font-black">remove</span>
                        </div>
                        <div class="flex-1">
                            <div class="flex justify-between items-start mb-2">
                                <p class="text-[12px] font-black text-white uppercase italic tracking-tight">OUT -5.00 UNITS</p>
                                <span class="text-[10px] font-black text-stone-600 uppercase tracking-widest italic">W_HOUSE_A</span>
                            </div>
                            <p class="text-[11px] font-black text-stone-500 uppercase tracking-widest italic truncate max-w-[150px]">WATER_PUMP_TYT_2024</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-6 group cursor-pointer border-b border-white/5 pb-8 last:border-0 last:pb-0">
                        <div class="w-14 h-14 rounded-2xl bg-primary/10 text-primary flex items-center justify-center shrink-0 border border-primary/20 group-hover:bg-primary group-hover:text-stone-900 transition-all duration-500 shadow-lg shadow-primary/10">
                            <span class="material-symbols-outlined text-2xl font-black">add</span>
                        </div>
                        <div class="flex-1">
                            <div class="flex justify-between items-start mb-2">
                                <p class="text-[12px] font-black text-white uppercase italic tracking-tight">IN +12.00 UNITS</p>
                                <span class="text-[10px] font-black text-stone-600 uppercase tracking-widest italic">RECEIVING_BAY</span>
                            </div>
                            <p class="text-[11px] font-black text-stone-500 uppercase tracking-widest italic truncate max-w-[150px]">OIL_FILTER_PREMIUM</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Compliance Policy -->
            <section class="bg-black border border-white/5 p-12 rounded-[40px] shadow-3xl relative overflow-hidden group/policy">
                <div class="absolute -right-20 -top-20 w-64 h-64 bg-primary/5 blur-[120px] rounded-full"></div>
                
                <h3 class="text-[12px] font-black text-primary uppercase tracking-[0.4em] mb-10 border-b border-primary/10 pb-6 italic flex items-center gap-4">
                    <span class="material-symbols-outlined text-lg">enhanced_encryption</span>
                    INTEGRITY_PROTOCOL_v4
                </h3>
                
                <p class="text-[12px] text-stone-400 font-black leading-loose uppercase tracking-widest mb-10 italic">
                    EVERY_MANUAL_ADJUST_GENERATES_IMMUTABLE_HASH. PROCESS_AFFECTS_AVG_COST_VECTOR. MANDATORY_VALIDATION_PER_ART_177_FISCAL_LAW.
                </p>
                
                <div class="bg-stone-900 border border-white/5 p-8 rounded-2xl text-center shadow-inner">
                    <span class="text-[10px] font-black text-stone-700 uppercase tracking-[0.3em] block mb-2 italic">NEXT_TOTAL_AUDIT_CYCLE</span>
                    <p class="text-3xl font-headline font-black text-white italic tracking-tighter uppercase">12 SEPTEMBER 2024</p>
                </div>
            </section>
        </div>
    </div>

    <!-- Telemetry Insights Footer: Global Consistency -->
    <div class="relative bg-stone-900 p-12 md:p-20 rounded-[50px] overflow-hidden shadow-3xl group/footer border border-white/5 mb-16">
        <div class="absolute -right-20 top-0 opacity-[0.03] select-none pointer-events-none transform group-hover/footer:rotate-6 transition-transform duration-1000">
            <span class="text-[25rem] font-black leading-none font-headline tracking-tighter text-white uppercase italic">CIMA</span>
        </div>
        
        <div class="relative z-10 grid grid-cols-1 md:grid-cols-3 gap-20 items-center">
            <div>
                <div class="w-16 h-16 bg-primary rounded-3xl flex items-center justify-center mb-10 shadow-3xl shadow-primary/20">
                    <span class="material-symbols-outlined text-stone-900 text-3xl font-black">troubleshoot</span>
                </div>
                <h2 class="text-5xl font-headline font-black text-white uppercase tracking-tight mb-8 leading-tight italic">SYNC_LATENCY <br> <span class="text-primary tracking-widest font-black uppercase">ANALYSIS_CORE</span></h2>
                <p class="text-[12px] text-stone-500 leading-relaxed font-black uppercase tracking-[0.2em] italic">AUTOMATED_MONITORING_OF_PHYSICAL_VS_DIGITAL_ENTROPY_VECTORS_FOR_TOTAL_ALTEC_CONTROL.</p>
            </div>
            
            <div class="md:col-span-2 grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div class="bg-stone-950 border border-white/5 p-10 rounded-3xl group/card hover:bg-primary transition-all duration-700 cursor-pointer shadow-3xl relative overflow-hidden">
                    <div class="absolute top-0 right-0 p-6 opacity-10 group-hover/card:opacity-100 transition-opacity">
                        <span class="material-symbols-outlined text-stone-700 group-hover/card:text-stone-900 text-3xl">verified</span>
                    </div>
                    <p class="text-[12px] font-black text-stone-600 group-hover/card:text-stone-900/60 uppercase tracking-widest italic mb-2">STOCK_ACCURACY_INDEX</p>
                    <h4 class="text-4xl font-headline font-black text-white group-hover/card:text-stone-900 uppercase italic tracking-tighter leading-none">99.42%_MATCH</h4>
                    <div class="mt-6 flex items-center gap-3">
                        <span class="flex h-3 w-3 relative">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary group-hover/card:bg-stone-900 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-3 w-3 bg-primary group-hover/card:bg-stone-900"></span>
                        </span>
                        <span class="text-[10px] font-black text-stone-500 group-hover/card:text-stone-900 uppercase tracking-widest italic">REAL_TIME_SIGNATURE_ACTIVE</span>
                    </div>
                </div>
                
                <div class="bg-stone-950 border border-white/5 p-10 rounded-3xl group/card hover:bg-white transition-all duration-700 cursor-pointer shadow-3xl relative overflow-hidden">
                    <div class="absolute top-0 right-0 p-6 opacity-10 group-hover/card:opacity-100 transition-opacity">
                        <span class="material-symbols-outlined text-primary text-3xl">shield_lock</span>
                    </div>
                    <p class="text-[12px] font-black text-stone-600 group-hover/card:text-stone-400 uppercase tracking-widest italic mb-2">ERP_AUDIT_PROTOCOL</p>
                    <h4 class="text-4xl font-headline font-black text-white group-hover/card:text-stone-950 uppercase italic tracking-tighter leading-none">ARMORED_STATE</h4>
                    <div class="mt-6 flex items-center gap-3">
                        <span class="w-1.5 h-1.5 bg-primary rounded-full"></span>
                        <span class="text-[10px] font-black text-stone-500 group-hover/card:text-stone-400 uppercase tracking-widest italic">SSL_v3_CONSISTENCY_LOCKED</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@endsection
