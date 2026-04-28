@extends('erp.layouts.app')

@section('title', 'Libros Legales | ERP La Cima')

@section('breadcrumb')
    <a href="{{ url('/erp/contabilidad') }}" class="hover:text-stone-900">Contabilidad</a>
    <span class="material-symbols-outlined text-sm">chevron_right</span>
    <span class="text-stone-900 font-medium">Libros Legales</span>
@endsection

@section('content')
<!-- Hero Identity Branding: Regulatory Compliance -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-12 items-end mb-16 relative z-10 border-b border-primary/20 pb-12">
    <div class="md:col-span-2">
        <div class="flex items-center gap-4 mb-6">
            <div class="h-1 w-20 bg-primary shadow-[0_0_15px_#ceff5e]"></div>
            <span class="text-primary font-mono text-[11px] uppercase tracking-[0.5em] font-black italic">COMPLIANCE_GENERATOR_v4.2.0</span>
        </div>
        <h2 class="text-6xl font-headline font-black text-white uppercase leading-none tracking-tighter italic">
            MAYOR_LA_CIMA_SECURE
        </h2>
        <p class="text-stone-500 mt-6 max-w-2xl font-mono text-[12px] leading-loose uppercase font-black italic">
            PRECISION_REPORTING_NODE FOR SENIAT_INDUSTRIAL_COMPLIANCE. ENSURE ALL FISCAL_BOOKS ARE GENERATED UNDER GLOBAL_ENCRYPTION_STANDARDS. VALIDATED_SIGNATURE_READY.
        </p>
    </div>
    <div class="bg-stone-900 border border-white/5 p-8 rounded-[32px] shadow-3xl relative overflow-hidden group">
        <div class="absolute inset-0 bg-primary/2 opacity-0 group-hover:opacity-100 transition-opacity"></div>
        <div class="flex justify-between items-start mb-6">
            <span class="material-symbols-outlined text-primary text-[28px] shadow-[0_0_15px_#ceff5e33]">calendar_month</span>
            <span class="text-[11px] bg-primary/20 text-primary border border-primary/30 px-3 py-1 rounded font-black tracking-[0.3em] uppercase italic">ACTIVE_FISCAL_X9</span>
        </div>
        <h4 class="text-stone-600 text-[11px] font-black uppercase tracking-[0.4em] italic mb-2">CURRENT_FISCAL_PERIOD</h4>
        <p class="text-3xl font-headline font-black text-white uppercase tracking-tight italic">OCTUBRE_2026</p>
        <button class="w-full mt-8 py-4 bg-red-500/10 text-red-500 border border-red-500/30 font-black text-[11px] uppercase tracking-[0.4em] hover:bg-red-500 hover:text-white transition-all rounded-2xl italic">
            INITIATE_FISCAL_CLOSE
        </button>
    </div>
</div>

<!-- Configuration Grid: Parameter Matrix -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-10 text-white relative z-10 mb-20">
    <!-- Generator Controls: Param_Input -->
    <div class="lg:col-span-4 space-y-8">
        <div class="bg-stone-950 border border-stone-800 p-10 space-y-10 rounded-[40px] shadow-3xl backdrop-blur-3xl">
            <h3 class="font-headline font-black text-white uppercase tracking-[0.2em] text-[14px] flex items-center gap-4 italic border-b border-white/5 pb-6">
                <span class="material-symbols-outlined text-primary">settings_input_component</span>
                EXPORT_PARAMS_MATRIX
            </h3>
            <div class="space-y-8">
                <div class="space-y-4">
                    <label class="text-[11px] font-black text-stone-600 uppercase tracking-[0.4em] italic mb-4 block">PERIOD_BOUNDARIES_SELECTION</label>
                    <div class="grid grid-cols-1 gap-4 font-mono">
                        <div class="bg-stone-900/50 p-6 rounded-2xl border border-white/5 group hover:border-primary/20 transition-all">
                            <p class="text-[11px] text-stone-700 uppercase mb-2 font-black italic tracking-widest group-hover:text-stone-500">START_ENTRY_DATE</p>
                            <input class="bg-transparent border-none text-white text-[14px] font-black w-full p-0 focus:ring-0 uppercase italic tracking-tighter" type="date" value="2026-10-01"/>
                        </div>
                        <div class="bg-stone-900/50 p-6 rounded-2xl border border-white/5 group hover:border-primary/20 transition-all">
                            <p class="text-[11px] text-stone-700 uppercase mb-2 font-black italic tracking-widest group-hover:text-stone-500">END_BOUNDARY_DATE</p>
                            <input class="bg-transparent border-none text-white text-[14px] font-black w-full p-0 focus:ring-0 uppercase italic tracking-tighter" type="date" value="2026-10-31"/>
                        </div>
                    </div>
                </div>
                <div class="space-y-4">
                    <label class="text-[11px] font-black text-stone-600 uppercase tracking-[0.4em] italic mb-4 block">DOCUMENT_NODES_ACTIVE</label>
                    <div class="space-y-3 font-mono">
                        <label class="flex items-center justify-between p-5 bg-stone-900/50 border border-white/5 hover:border-primary/30 transition-all cursor-pointer group rounded-2xl">
                            <span class="text-[12px] text-stone-400 font-black uppercase tracking-widest italic group-hover:text-white">LIBRO_DIARIO_PROTOCOL</span>
                            <input checked="" class="w-5 h-5 rounded border-stone-800 text-primary focus:ring-primary bg-stone-950" type="checkbox"/>
                        </label>
                        <label class="flex items-center justify-between p-5 bg-stone-900/50 border border-white/5 hover:border-primary/30 transition-all cursor-pointer group rounded-2xl">
                            <span class="text-[12px] text-stone-400 font-black uppercase tracking-widest italic group-hover:text-white">LIBRO_MAYOR_SYNC</span>
                            <input checked="" class="w-5 h-5 rounded border-stone-800 text-primary focus:ring-primary bg-stone-950" type="checkbox"/>
                        </label>
                        <label class="flex items-center justify-between p-5 bg-stone-900/50 border border-white/5 hover:border-primary/30 transition-all cursor-pointer group rounded-2xl">
                            <span class="text-[12px] text-stone-400 font-black uppercase tracking-widest italic group-hover:text-white">INVENTORY_LEGAL_TRACE</span>
                            <input class="w-5 h-5 rounded border-stone-800 text-primary focus:ring-primary bg-stone-950" type="checkbox"/>
                        </label>
                        <label class="flex items-center justify-between p-5 bg-stone-900/50 border border-white/5 hover:border-primary/30 transition-all cursor-pointer group rounded-2xl">
                            <span class="text-[12px] text-stone-400 font-black uppercase tracking-widest italic group-hover:text-white">IVA_PURCHASE_LEDGER</span>
                            <input checked="" class="w-5 h-5 rounded border-stone-800 text-primary focus:ring-primary bg-stone-950" type="checkbox"/>
                        </label>
                    </div>
                </div>
            </div>
            <button class="w-full py-6 bg-primary text-stone-950 font-black text-[14px] uppercase tracking-[0.4em] shadow-[0_0_30px_rgba(206,255,94,0.2)] hover:brightness-110 active:scale-[0.98] transition-all flex items-center justify-center gap-4 rounded-[24px] italic">
                <span class="material-symbols-outlined">print_connect</span>
                GENERATE_BOOKS_CMD
            </button>
        </div>
    </div>

    <!-- Generation History: Audit_Trace -->
    <div class="lg:col-span-8">
        <div class="bg-stone-950 border border-stone-800 rounded-[40px] overflow-hidden shadow-3xl backdrop-blur-3xl">
            <div class="px-10 py-8 border-b border-white/5 flex justify-between items-center bg-stone-900/50">
                <h3 class="font-headline font-black text-white uppercase tracking-[0.3em] text-[14px] italic">RECENT_ACTIVITY_LOG_XMIT</h3>
                <div class="flex gap-4 font-mono">
                    <span class="bg-stone-950 text-stone-600 border border-white/5 px-4 py-2 rounded-xl text-[11px] font-black uppercase tracking-widest italic">RECORDS_FOUND: 12_SCAN</span>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left font-mono">
                    <thead class="bg-stone-900/80 border-b border-stone-800">
                        <tr>
                            <th class="px-10 py-6 text-[11px] font-black text-stone-700 uppercase tracking-[0.4em] italic">TIMESTAMP_SYNC</th>
                            <th class="px-10 py-6 text-[11px] font-black text-stone-700 uppercase tracking-[0.4em] italic">DOC_TITLE_V</th>
                            <th class="px-10 py-6 text-[11px] font-black text-stone-700 uppercase tracking-[0.4em] italic">FISCAL_MAG</th>
                            <th class="px-10 py-6 text-[11px] font-black text-stone-700 uppercase tracking-[0.4em] italic">COMPLIANCE_S</th>
                            <th class="px-10 py-6 text-[11px] font-black text-stone-700 uppercase tracking-[0.4em] italic text-right">MAGX</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5 italic">
                        <!-- Audit Row 1 -->
                        <tr class="hover:bg-primary/5 transition-colors group">
                            <td class="px-10 py-8">
                                <p class="text-[12px] text-white font-black tracking-tighter mb-1">2026.10.28</p>
                                <p class="text-[11px] text-stone-700 uppercase font-black tracking-widest group-hover:text-stone-500 transition-colors">14:22:15_UTC</p>
                            </td>
                            <td class="px-10 py-8">
                                <div class="flex items-center gap-4">
                                    <span class="material-symbols-outlined text-primary text-[20px] shadow-[0_0_10px_#ceff5e22]">description</span>
                                    <p class="text-[12px] text-white font-black uppercase tracking-widest italic">LIBRO_DIARIO_LEG</p>
                                </div>
                            </td>
                            <td class="px-10 py-8 text-[12px] text-stone-500 font-black uppercase italic tracking-widest group-hover:text-stone-300">OCT_26_MAG</td>
                            <td class="px-10 py-8">
                                <div class="flex flex-col gap-2">
                                    <span class="inline-flex items-center gap-2 px-3 py-1 rounded-lg bg-primary/10 text-primary text-[11px] font-black uppercase tracking-widest border border-primary/20 w-fit">
                                        VALIDATED_OK
                                    </span>
                                    <span class="inline-flex items-center gap-2 px-3 py-1 rounded-lg bg-blue-500/10 text-blue-400 text-[11px] font-black uppercase tracking-widest border border-blue-500/20 w-fit">
                                        DIGITAL_SIGN_X
                                    </span>
                                </div>
                            </td>
                            <td class="px-10 py-8 text-right">
                                <button class="material-symbols-outlined text-stone-700 hover:text-primary transition-all hover:scale-125">download_done</button>
                            </td>
                        </tr>
                        <!-- Audit Row 2 -->
                        <tr class="hover:bg-primary/5 transition-colors group">
                            <td class="px-10 py-8">
                                <p class="text-[12px] text-white font-black tracking-tighter mb-1">2026.10.28</p>
                                <p class="text-[11px] text-stone-700 uppercase font-black tracking-widest group-hover:text-stone-500 transition-colors">14:22:10_UTC</p>
                            </td>
                            <td class="px-10 py-8">
                                <div class="flex items-center gap-4">
                                    <span class="material-symbols-outlined text-primary text-[20px] shadow-[0_0_10px_#ceff5e22]">folder_shared</span>
                                    <p class="text-[12px] text-white font-black uppercase tracking-widest italic">LIBRO_MAYOR_LEG</p>
                                </div>
                            </td>
                            <td class="px-10 py-8 text-[12px] text-stone-500 font-black uppercase italic tracking-widest group-hover:text-stone-300">OCT_26_MAG</td>
                            <td class="px-10 py-8">
                                <div class="flex flex-col gap-2">
                                    <span class="inline-flex items-center gap-2 px-3 py-1 rounded-lg bg-primary/10 text-primary text-[11px] font-black uppercase tracking-widest border border-primary/20 w-fit">
                                        VALIDATED_OK
                                    </span>
                                    <span class="inline-flex items-center gap-2 px-3 py-1 rounded-lg bg-blue-500/10 text-blue-400 text-[11px] font-black uppercase tracking-widest border border-blue-500/20 w-fit">
                                        DIGITAL_SIGN_X
                                    </span>
                                </div>
                            </td>
                            <td class="px-10 py-8 text-right">
                                <button class="material-symbols-outlined text-stone-700 hover:text-primary transition-all hover:scale-125">download_done</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Satellite Insight Nodes: System Status -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-stretch mt-12 relative z-10 mb-20 font-mono italic">
    <div class="relative min-h-[360px] overflow-hidden group bg-stone-900 border border-white/5 rounded-[40px] shadow-3xl">
        <img class="absolute inset-0 w-full h-full object-cover opacity-20 grayscale group-hover:scale-110 transition-all duration-1000 group-hover:opacity-40" src="https://images.unsplash.com/photo-1558285514-046646736202?auto=format&fit=crop&q=80&w=2000"/>
        <div class="absolute inset-0 bg-gradient-to-t from-stone-950 via-stone-950/60 to-transparent"></div>
        <div class="absolute bottom-0 left-0 p-12 z-10 w-full">
            <span class="bg-primary text-stone-950 px-5 py-2 text-[11px] font-black uppercase tracking-[0.4em] mb-6 inline-block rounded-xl shadow-[0_0_20px_#ceff5e44]">OPERATION_STATUS_SYNC</span>
            <h4 class="text-4xl font-headline font-black text-white uppercase tracking-tighter mb-4 italic leading-tight">ACTIVE_INVENTORY_MAG_SYNC</h4>
            <p class="text-[12px] text-stone-500 font-black uppercase tracking-widest leading-relaxed max-w-lg group-hover:text-stone-300 transition-colors">GLOBAL_STOCK_DATABASES ARE CURRENTLY SYNCED WITH LOCAL SENIAT LEGAL RECORDS. REAL-TIME_TELEMETRY_ACTIVE.</p>
        </div>
    </div>
    
    <div class="bg-stone-950 p-12 border border-stone-800 relative overflow-hidden flex flex-col justify-between rounded-[40px] shadow-3xl group">
        <div class="absolute inset-0 bg-primary/2 opacity-0 group-hover:opacity-100 transition-opacity"></div>
        <div class="space-y-10 relative z-10">
            <h4 class="text-[11px] font-black text-stone-700 uppercase tracking-[0.5em] italic">COMPLIANCE_GEOMAP_SCAN</h4>
            <div class="flex items-center gap-4">
                <span class="material-symbols-outlined text-primary text-[32px] animate-pulse">location_on</span>
                <span class="text-white font-headline text-2xl uppercase tracking-[0.2em] font-black">VALENCIA / VENEZUELA_NODE01</span>
            </div>
            <div class="w-full h-48 bg-stone-900 rounded-[32px] relative overflow-hidden border border-white/5 shadow-inner">
                <img alt="Map Trace" class="w-full h-full object-cover opacity-30 grayscale group-hover:scale-105 transition-all duration-1000" src="https://images.unsplash.com/photo-1524661135-423995f22d0b?auto=format&fit=crop&q=80&w=2000"/>
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="w-10 h-10 bg-primary/20 rounded-full animate-ping"></div>
                    <div class="w-4 h-4 bg-primary rounded-full absolute shadow-[0_0_15px_#ceff5e]"></div>
                </div>
            </div>
        </div>
        <div class="pt-8 flex justify-between items-end border-t border-white/5 mt-10 relative z-10">
            <div>
                <p class="text-[11px] text-stone-700 font-black uppercase tracking-[0.4em] mb-2 italic">LEGAL_ENTITY_RIF_TRANS</p>
                <p class="text-white font-headline text-2xl font-black tracking-widest italic uppercase">J-12345678-9_X9</p>
            </div>
            <span class="material-symbols-outlined text-stone-800 text-[48px] italic opacity-30 group-hover:opacity-60 transition-opacity">factory</span>
        </div>
    </div>
</div>

<!-- Signature Visual Element -->
<div class="fixed -bottom-24 -right-24 w-96 h-96 bg-lime-600/5 rounded-full blur-[100px] pointer-events-none z-0"></div>
@endsection

@push('scripts')
    <script src="{{ asset('erp/js/libros-legales.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const main = document.querySelector('main');
            if(main) {
                main.classList.remove('bg-background', 'bg-stone-50');
                main.classList.add('bg-[#1a1c1c]');
            }
        });
    </script>
@endpush
