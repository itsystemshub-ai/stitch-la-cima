@extends('erp.layouts.app')

@section('title', 'Declaración IVA | ERP La Cima')

@section('breadcrumb')
    <a href="{{ url('/erp/contabilidad') }}" class="hover:text-stone-900">Contabilidad</a>
    <span class="material-symbols-outlined text-sm">chevron_right</span>
    <span class="text-stone-900 font-medium">Declaración IVA</span>
@endsection

@section('content')
<!-- Header Section: Industrial Fiscal Authority -->
<header class="mb-16 relative">
    <div class="absolute -top-20 -left-20 w-96 h-96 bg-primary/5 rounded-full blur-[120px] pointer-events-none"></div>
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-10 relative z-10">
        <div class="max-w-4xl">
            <div class="flex items-center gap-4 mb-6">
                <span class="w-12 h-1 bg-primary rounded-full shadow-[0_0_15px_rgba(206,255,94,0.4)]"></span>
                <p class="text-[12px] font-black text-stone-500 uppercase tracking-[0.4em] italic leading-none">Transmission Node: FISCAL_OVERSIGHT_V4</p>
            </div>
            <h1 class="text-5xl md:text-7xl font-headline font-black uppercase tracking-tighter text-white leading-none italic">
                MAYOR DE REPUESTO <br/><span class="text-stone-600 not-italic">LA CIMA, C.A.</span>
            </h1>
        </div>
        <div class="bg-stone-900/50 p-10 border-l-4 border-primary rounded-r-[32px] backdrop-blur-xl shadow-2xl">
            <p class="text-[11px] text-stone-500 uppercase tracking-[0.3em] font-black italic mb-3">Tax_ID_RIF_Protocol</p>
            <p class="text-2xl font-mono text-white font-black italic tracking-tighter">J-40592831-0</p>
        </div>
    </div>
</header>

<!-- Bento Grid Statistics: Analytical Magnitudes -->
<section class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12 text-white">
    <!-- Debt vs Credit Card -->
    <div class="md:col-span-2 bg-stone-900 border border-stone-800 p-10 rounded-[40px] shadow-2xl relative overflow-hidden group transition-all hover:border-primary/20">
        <div class="absolute inset-0 opacity-[0.03] group-hover:opacity-[0.06] transition-opacity" style="background-image: radial-gradient(#ceff5e 1.5px, transparent 1.5px); background-size: 20px 20px;"></div>
        <div class="relative z-10">
            <h3 class="text-[12px] font-black uppercase tracking-[0.4em] text-stone-500 mb-8 italic">VAT_Balance_Analysis_Delta</h3>
            <div class="flex justify-between items-end gap-10">
                <div class="flex-1">
                    <p class="text-[11px] text-stone-600 uppercase font-black tracking-[0.2em] mb-4 italic">Fiscal_Debit_Current</p>
                    <p class="text-4xl font-headline font-black text-white italic tracking-tighter leading-none">425.890,00 <span class="text-[14px] text-stone-700 not-italic uppercase">VES</span></p>
                    <div class="w-full bg-stone-800 h-1.5 mt-6 rounded-full overflow-hidden">
                        <div class="bg-primary h-full w-[70%] shadow-[0_0_10px_#ceff5e]"></div>
                    </div>
                </div>
                <div class="flex-1">
                    <p class="text-[11px] text-stone-600 uppercase font-black tracking-[0.2em] mb-4 italic text-right">Fiscal_Credit_Accum</p>
                    <p class="text-4xl font-headline font-black text-primary text-right italic tracking-tighter leading-none">312.440,00 <span class="text-[14px] text-stone-700 not-italic uppercase">VES</span></p>
                    <div class="w-full bg-stone-800 h-1.5 mt-6 rounded-full overflow-hidden flex justify-end">
                        <div class="bg-stone-600 h-full w-[50%]"></div>
                    </div>
                </div>
            </div>
            <div class="mt-10 pt-10 border-t border-white/5 flex items-center justify-between">
                <p class="text-[11px] uppercase font-black text-stone-500 tracking-[0.3em] italic">Differential_Magnitude</p>
                <p class="text-2xl font-headline font-black text-white italic tracking-tight">+113.450,00 VES</p>
            </div>
        </div>
    </div>
    
    <!-- Tax Retentions Card -->
    <div class="bg-stone-900 border border-stone-800 p-10 rounded-[40px] shadow-2xl flex flex-col justify-between transition-all hover:border-primary/20">
        <span class="material-symbols-outlined text-primary text-[40px] drop-shadow-[0_0_10px_rgba(206,255,94,0.3)]">account_balance</span>
        <div>
            <h3 class="text-[11px] font-black uppercase tracking-[0.3em] text-stone-600 mb-2 italic">IVA_Retentions_Node</h3>
            <p class="text-3xl font-headline font-black text-white italic tracking-tighter leading-none">84.120,50</p>
        </div>
        <div class="mt-6 pt-6 border-t border-white/5">
            <p class="text-[10px] text-stone-500 uppercase font-black tracking-[0.2em] italic">Update: OCT_24_2024</p>
        </div>
    </div>
    
    <!-- ISLR Retentions Card -->
    <div class="bg-stone-900 border border-stone-800 p-10 rounded-[40px] shadow-2xl flex flex-col justify-between transition-all hover:border-primary/20">
        <span class="material-symbols-outlined text-stone-600 text-[40px]">receipt_long</span>
        <div>
            <h3 class="text-[11px] font-black uppercase tracking-[0.3em] text-stone-600 mb-2 italic">ISLR_Withholding</h3>
            <p class="text-3xl font-headline font-black text-white italic tracking-tighter leading-none">12.840,00</p>
        </div>
        <div class="mt-6 pt-6 border-t border-white/5">
            <button class="text-[10px] text-primary font-black uppercase tracking-[0.3em] italic hover:brightness-125 transition-all">View_Ledger_Feed</button>
        </div>
    </div>
</section>

<!-- Form and Detail Split Layout: Fiduciary Transmission -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-12 items-start text-white">
    <!-- Declaration Form -->
    <section class="lg:col-span-2 bg-stone-900/40 backdrop-blur-2xl p-12 rounded-[40px] border border-stone-800 shadow-2xl">
        <div class="flex items-center justify-between mb-12">
            <h2 class="text-3xl font-headline font-black uppercase text-white italic tracking-tighter">Form_00030: <span class="text-primary">VAT_Submission</span></h2>
            <span class="px-6 py-2 bg-stone-950 text-stone-500 text-[11px] uppercase font-black tracking-[0.3em] rounded-full border border-white/5 italic">Period: 10-2024</span>
        </div>
        <div class="space-y-12">
            <!-- Form Section: Sales -->
            <div>
                <div class="flex items-center gap-6 mb-8">
                    <span class="text-[12px] font-black text-stone-500 uppercase tracking-[0.4em] italic whitespace-nowrap">Section_A: Revenue_Transmission</span>
                    <div class="h-px bg-stone-800 w-full"></div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                    <div class="space-y-4">
                        <label class="text-[11px] uppercase text-stone-600 font-black tracking-[0.3em] italic">Domestic_Sales_Magnitude</label>
                        <div class="bg-stone-950 border border-stone-800 p-6 focus-within:border-primary transition-all rounded-3xl shadow-inner group">
                            <input class="bg-transparent border-none focus:ring-0 text-white font-mono w-full text-xl p-0 font-black italic" type="text" value="2.661.812,50"/>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <label class="text-[11px] uppercase text-stone-600 font-black tracking-[0.3em] italic">VAT_Debit_Calculated (16%)</label>
                        <div class="bg-stone-800/20 border border-stone-800 p-6 rounded-3xl group transition-all hover:bg-stone-800/40">
                            <input class="bg-transparent border-none focus:ring-0 text-primary font-mono w-full text-xl p-0 font-black italic opacity-90" readonly="" type="text" value="425.890,00"/>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Form Section: Purchases -->
            <div>
                <div class="flex items-center gap-6 mb-8">
                    <span class="text-[12px] font-black text-stone-500 uppercase tracking-[0.4em] italic whitespace-nowrap">Section_B: Expenditure_Credit_Sync</span>
                    <div class="h-px bg-stone-800 w-full"></div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                    <div class="space-y-4">
                        <label class="text-[11px] uppercase text-stone-600 font-black tracking-[0.3em] italic">Domestic_Purchase_Volume</label>
                        <div class="bg-stone-950 border border-stone-800 p-6 focus-within:border-primary transition-all rounded-3xl shadow-inner group">
                            <input class="bg-transparent border-none focus:ring-0 text-white font-mono w-full text-xl p-0 font-black italic" type="text" value="1.952.750,00"/>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <label class="text-[11px] uppercase text-stone-600 font-black tracking-[0.3em] italic">VAT_Credit_Verified (16%)</label>
                        <div class="bg-stone-800/20 border border-stone-800 p-6 rounded-3xl group transition-all hover:bg-stone-800/40">
                            <input class="bg-transparent border-none focus:ring-0 text-primary font-mono w-full text-xl p-0 font-black italic opacity-90" readonly="" type="text" value="312.440,00"/>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Form Footer: Totals -->
            <div class="bg-stone-950 p-12 border-l-8 border-primary rounded-r-[40px] mt-16 flex flex-col md:flex-row justify-between items-center gap-12 shadow-2xl relative overflow-hidden group">
                <div class="absolute inset-0 opacity-[0.02] bg-primary group-hover:opacity-[0.05] transition-opacity"></div>
                <div class="relative z-10">
                    <p class="text-[11px] text-stone-600 uppercase font-black tracking-[0.4em] mb-4 italic">Consolidated_Liability_Protocol</p>
                    <p class="text-5xl font-headline font-black text-white italic tracking-tighter leading-none">113.450,00 <span class="text-[18px] text-stone-700 not-italic uppercase">VES</span></p>
                </div>
                <button class="relative z-10 bg-primary text-stone-950 px-12 py-5 font-headline font-black uppercase text-[12px] tracking-[0.3em] transition-all hover:brightness-110 active:scale-95 rounded-2xl shadow-2xl shadow-primary/30 italic">
                    Transmit_To_Seniat
                </button>
            </div>
        </div>
    </section>
    
    <!-- Technical Breakdown: Entity Detail -->
    <aside class="space-y-8 lg:sticky lg:top-8">
        <div class="bg-stone-900 border border-stone-800 rounded-[40px] overflow-hidden shadow-2xl">
            <div class="p-8 bg-stone-950 border-b border-white/5">
                <h3 class="text-[12px] font-black uppercase tracking-[0.3em] text-white italic">Retention_Audit_Log</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-stone-950 text-[11px] uppercase text-stone-600 font-black italic">
                            <th class="px-8 py-6 tracking-[0.2em]">Provider_ID</th>
                            <th class="px-4 py-6 tracking-[0.2em]">Type</th>
                            <th class="px-8 py-6 text-right tracking-[0.2em]">Quantum</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        <tr class="group hover:bg-primary/5 transition-colors">
                            <td class="px-8 py-6">
                                <p class="text-[12px] font-black text-stone-200 group-hover:text-white uppercase italic tracking-tight">TRANS-CARIBE, C.A.</p>
                                <p class="text-[10px] text-stone-600 uppercase font-mono italic">J-30922831-2</p>
                            </td>
                            <td class="px-4 py-6">
                                <span class="text-[9px] bg-primary/10 text-primary px-3 py-1 rounded-full uppercase font-black border border-primary/20 italic">IVA</span>
                            </td>
                            <td class="px-8 py-6 text-right font-mono text-[12px] font-black text-stone-400 group-hover:text-white italic">12.500,00</td>
                        </tr>
                        <tr class="group hover:bg-stone-800 transition-colors">
                            <td class="px-8 py-6">
                                <p class="text-[12px] font-black text-stone-200 group-hover:text-white uppercase italic tracking-tight">INVERSIONES 2020</p>
                                <p class="text-[10px] text-stone-600 uppercase font-mono italic">J-29833100-1</p>
                            </td>
                            <td class="px-4 py-6">
                                <span class="text-[9px] bg-white/5 text-stone-500 px-3 py-1 rounded-full uppercase font-black border border-white/5 italic">ISLR</span>
                            </td>
                            <td class="px-8 py-6 text-right font-mono text-[12px] font-black text-stone-400 group-hover:text-white italic">4.200,00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Industrial Visual Node -->
        <div class="h-64 relative overflow-hidden group rounded-[40px] border border-stone-800 shadow-2xl">
            <img alt="Industrial Precision" class="w-full h-full object-cover grayscale brightness-50 group-hover:brightness-75 group-hover:scale-110 transition-all duration-700" src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?auto=format&fit=crop&q=80&w=800"/>
            <div class="absolute inset-0 bg-gradient-to-t from-stone-950 via-stone-950/40 to-transparent"></div>
            <div class="absolute bottom-8 left-8">
                <p class="text-[11px] uppercase font-black tracking-[0.4em] text-primary italic mb-2">Technical_Asset_Registry</p>
                <p class="text-lg text-white font-headline font-black italic tracking-tight uppercase">Precise. Fiduciary. Zenith.</p>
            </div>
        </div>
        
        <div class="bg-stone-900 p-8 border-l-4 border-stone-700 rounded-r-[32px] border-y border-r border-stone-800 shadow-xl backdrop-blur-xl">
            <div class="flex items-center gap-4 mb-6">
                <span class="material-symbols-outlined text-stone-600 text-[20px]">verified_user</span>
                <span class="text-[11px] uppercase text-stone-400 font-black tracking-[0.3em] italic">Fiduciary_Integrity</span>
            </div>
            <p class="text-[12px] text-stone-500 leading-relaxed italic font-black uppercase tracking-widest">
                "Audit protocol synchronized with Gaceta Oficial N° 42.100. Calculations subject to final banking reconciliation loop."
            </p>
        </div>
    </aside>
</div>

@endsection

@push('scripts')
    <script src="{{ asset('erp/js/declaracion-iva.js') }}"></script>
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
