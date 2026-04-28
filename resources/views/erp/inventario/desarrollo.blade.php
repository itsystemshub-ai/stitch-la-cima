@section('breadcrumb')
    <a href="{{ url('/erp/inicio') }}" class="text-stone-500 hover:text-primary transition-colors font-black text-[12px] uppercase tracking-widest italic">ERP_CORE</a>
    <span class="material-symbols-outlined text-[14px] text-stone-700">chevron_right</span>
    <a href="{{ url('/erp/inventario') }}" class="text-stone-500 hover:text-primary transition-colors font-black text-[12px] uppercase tracking-widest italic">ASSET_CONTROL</a>
    <span class="material-symbols-outlined text-[14px] text-stone-700">chevron_right</span>
    <span class="text-primary font-black text-[12px] uppercase tracking-widest italic">R&D_PIPELINE</span>
@endsection

@section('content')
    <!-- Page Header: Strategic Research & Development -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6 mb-12 pb-10 border-b border-white/5">
        <div>
            <div class="flex items-center gap-3 mb-4">
                <span class="w-12 h-[2px] bg-primary"></span>
                <p class="text-[12px] font-black text-stone-500 uppercase tracking-[0.4em] italic">SKU_EXPANSION_STRATEGY</p>
            </div>
            <h1 class="text-6xl font-headline font-black text-white tracking-tighter uppercase leading-none">R&D <span class="text-stone-600">Workspace</span></h1>
            <p class="text-[12px] text-stone-500 mt-4 font-black uppercase tracking-[0.2em] italic">MAYOR DE REPUESTO LA CIMA, C.A. • RIF: J-40308741-5</p>
        </div>
        <div class="flex gap-4">
             <button class="bg-primary text-stone-900 px-12 py-5 text-[12px] font-black uppercase tracking-[0.2em] rounded-xl shadow-2xl hover:scale-105 transition-all active:scale-95 group/btn italic">
                INITIATE_RESEARCH_STREAM
                <span class="material-symbols-outlined text-[20px] ml-3 inline-block group-hover:rotate-12 transition-transform font-black">add_circle</span>
            </button>
        </div>
    </div>

    <!-- R&D Metrics -->
    <div class="grid grid-cols-12 gap-10 mb-16">
        <div class="col-span-12 lg:col-span-4 bg-stone-900 border border-white/5 p-12 rounded-[40px] shadow-3xl relative overflow-hidden group">
            <div class="absolute top-0 right-0 p-8 opacity-5 group-hover:opacity-10 transition-opacity">
                <span class="material-symbols-outlined text-7xl text-white">biotech</span>
            </div>
            <p class="text-[12px] font-black text-stone-600 uppercase tracking-[0.3em] mb-6 italic">ANALYSIS_STAGE_ITEMS</p>
            <h3 class="text-4xl font-headline font-black text-white uppercase italic tracking-tighter group-hover:text-primary transition-colors cursor-default">{{ $products->count() }} SKUs_AUDITED</h3>
            <div class="mt-8 flex items-center gap-3 text-stone-500 font-black text-[12px] uppercase tracking-widest italic">
                <span class="flex h-2.5 w-2.5 relative">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-primary"></span>
                </span>
                VERIFICATION_PHASE_ACTIVE
            </div>
        </div>

        <div class="col-span-12 lg:col-span-4 bg-stone-900 border border-white/5 p-12 rounded-[40px] shadow-3xl relative overflow-hidden group">
            <div class="absolute top-0 right-0 p-8 opacity-5 group-hover:opacity-10 transition-opacity">
                <span class="material-symbols-outlined text-7xl text-white">verified</span>
            </div>
            <p class="text-[12px] font-black text-stone-600 uppercase tracking-[0.3em] mb-6 italic">SKU_APPROVAL_PROBABILITY</p>
            <h3 class="text-4xl font-headline font-black text-white uppercase italic tracking-tighter group-hover:text-primary transition-colors cursor-default">85% RATIO</h3>
            <div class="mt-8 flex items-center gap-3 text-primary font-black text-[12px] uppercase tracking-widest italic leading-none">
                <span class="material-symbols-outlined text-[16px] font-black">check_circle</span>
                HIGH_MARKET_VIABILITY_DETECTED
            </div>
        </div>

        <div class="col-span-12 lg:col-span-4 bg-primary p-12 rounded-[40px] shadow-3xl relative overflow-hidden group hover:bg-stone-950 transition-all duration-700">
            <div class="absolute -right-8 -bottom-8 opacity-10 group-hover:opacity-20 transition-opacity rotate-12">
                <span class="material-symbols-outlined text-[150px] text-stone-900 group-hover:text-primary">monetization_on</span>
            </div>
            <p class="text-[12px] font-black text-stone-900 group-hover:text-primary uppercase tracking-[0.3em] mb-6 italic">INVESTMENT_BUDGET_CAP</p>
            <h3 class="text-4xl font-headline font-black text-stone-900 group-hover:text-white uppercase italic tracking-tighter cursor-default">$ 12,500.00</h3>
            <div class="mt-8 flex items-center gap-3 text-stone-950 group-hover:text-stone-700 font-black text-[12px] uppercase tracking-widest italic">
                <span class="w-2.5 h-2.5 bg-stone-900 rounded-full group-hover:bg-primary"></span>
                PROJECTION: Q2_2024_FISCAL
            </div>
        </div>
    </div>

    <!-- Development Pipeline Table -->
    <section class="bg-stone-900 border border-white/5 rounded-[50px] shadow-3xl overflow-hidden mb-16 relative">
        <div class="p-10 border-b border-white/5 bg-stone-950/30 flex justify-between items-center">
            <div class="flex items-center gap-4">
                <span class="w-3 h-3 bg-primary rounded-full"></span>
                <h3 class="text-[12px] font-black text-white uppercase tracking-[0.3em] italic">ASSET_PIPELINE_STATUS [STREAM_MODE]</h3>
            </div>
            <div class="flex gap-8 text-[11px] font-black uppercase tracking-widest text-stone-600 italic">
                <span class="flex items-center gap-3"><span class="w-2.5 h-2.5 bg-amber-500 rounded-full shadow-[0_0_10px_rgba(245,158,11,0.3)]"></span> ANALYSIS</span>
                <span class="flex items-center gap-3"><span class="w-2.5 h-2.5 bg-blue-500 rounded-full shadow-[0_0_10px_rgba(59,130,246,0.3)]"></span> QUOTATION</span>
                <span class="flex items-center gap-3"><span class="w-2.5 h-2.5 bg-primary rounded-full shadow-[0_0_10px_rgba(206,255,94,0.3)]"></span> APPROVED</span>
            </div>
        </div>

        <div class="overflow-x-auto custom-scrollbar">
            <table class="w-full text-left border-collapse min-w-[1200px]">
                <thead>
                    <tr class="bg-stone-950 border-b border-white/5 text-stone-600 font-black text-[11px] uppercase tracking-widest italic">
                        <th class="p-10">OEM_REFERENCE</th>
                        <th class="p-10">ASSET_SPECIFICATION</th>
                        <th class="p-10 text-center">EXPECTED_SOURCE</th>
                        <th class="p-10 text-center">LIFECYCLE_STATUS</th>
                        <th class="p-10 text-right">ESTIMATED_COST</th>
                        <th class="p-10 text-center">SYSTEM_MTX</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @forelse($products as $product)
                        <tr class="hover:bg-white/[0.02] transition-colors group">
                            <td class="p-10">
                                <span class="bg-stone-950 text-white px-5 py-2 rounded-lg border border-white/5 text-[12px] font-black italic tracking-widest group-hover:border-primary/40 transition-colors uppercase leading-none">#{{ $product->codigo_oem }}</span>
                            </td>
                            <td class="p-10">
                                <span class="text-[14px] font-black text-white uppercase block mb-2 italic tracking-tighter group-hover:text-primary transition-colors">{{ $product->nombre }}</span>
                                <span class="text-[10px] text-stone-600 font-black uppercase tracking-widest italic border-b border-primary/40 pb-0.5">
                                    {{ $product->development_notes ?? 'WAITING_FOR_TECHNICAL_SPECS' }}
                                </span>
                            </td>
                            <td class="p-10 text-center">
                                <div class="flex flex-col items-center">
                                    <span class="text-stone-400 font-black text-[13px] uppercase italic tracking-tighter">{{ $product->marca ?? 'GLOBAL_UNKNOWN' }}</span>
                                    <span class="text-[9px] text-stone-700 font-black uppercase tracking-[0.2em] mt-1 italic">MANUFACTURER</span>
                                </div>
                            </td>
                            <td class="p-10 text-center">
                                <span class="px-5 py-2 bg-amber-500/10 text-amber-500 border border-amber-500/20 rounded-lg font-black text-[11px] uppercase italic tracking-tighter">PHASE: ANALYSIS</span>
                            </td>
                            <td class="p-10 text-right">
                                <span class="text-[18px] font-black text-white italic tracking-tighter leading-none">$ {{ number_format($product->precio_mayor, 2) }}</span>
                            </td>
                            <td class="p-10 text-center">
                                <div class="flex items-center justify-center gap-4">
                                    <button class="w-12 h-12 rounded-2xl border border-white/5 bg-stone-950 flex items-center justify-center hover:border-primary/40 hover:text-primary transition-all text-stone-600 shadow-2xl group/action" title="View Technical Sheet">
                                        <span class="material-symbols-outlined text-[20px] font-black group-hover/action:scale-110 transition-transform">visibility</span>
                                    </button>
                                    <form action="{{ route('erp.inventario.desarrollo.promote', $product->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="w-12 h-12 rounded-2xl border border-primary/20 bg-primary/10 flex items-center justify-center hover:bg-primary hover:text-stone-900 transition-all text-primary shadow-2xl group/promote" title="Promote to Master Catalog">
                                            <span class="material-symbols-outlined text-[20px] font-black group-hover/promote:scale-110 group-hover/promote:rotate-12 transition-all">rocket_launch</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-32 text-center text-stone-800 uppercase font-black text-[14px] tracking-[0.5em] italic">
                                <div class="flex flex-col items-center gap-6">
                                    <span class="material-symbols-outlined text-6xl opacity-10">biotech</span>
                                    ZERO_ITEMS_IN_DEVELOPMENT_PIPELINE.
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

    <!-- Contextual Guidance -->
    <div class="bg-stone-900 border border-white/5 p-12 rounded-[50px] flex flex-col md:flex-row items-center gap-12 mb-16 shadow-3xl relative overflow-hidden group/alert">
        <div class="absolute right-0 top-0 p-10 opacity-[0.02] transform translate-x-1/2 -translate-y-1/2 group-hover/alert:scale-110 transition-transform duration-1000">
            <span class="material-symbols-outlined text-[200px] text-white">lightbulb</span>
        </div>
        <div class="w-20 h-20 bg-primary/10 border border-primary/20 rounded-[30px] flex items-center justify-center shadow-3xl shrink-0 group-hover/alert:bg-primary group-hover/alert:rotate-12 transition-all duration-500">
            <span class="material-symbols-outlined text-primary group-hover/alert:text-stone-900 text-4xl font-black transition-colors">lightbulb</span>
        </div>
        <div class="relative z-10">
            <h4 class="text-2xl font-headline font-black text-white uppercase italic tracking-tighter mb-3 leading-none">SKU_GROWTH_SYSTEM_STRATEGY</h4>
            <p class="text-[12px] text-stone-500 font-black uppercase tracking-[0.2em] italic leading-relaxed">THIS_MODULE_CENTRALIZES_MARKET_INTELLIGENCE. ONCE_TECHNICAL_VALIDATION_IS_SEALED, THE_ITEM_CAN_BE_PROMOTED_TO_PRODUCT_MASTER_RECORDS_VIA_HIGH_FIDELITY_ORCHESTRATION, ENSURING_GLOBAL_DATA_INTEGRITY.</p>
        </div>
    </div>
@endsection

