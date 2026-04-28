@extends('erp.layouts.app')

@section('title', 'Balance General | ERP La Cima')

@section('breadcrumb')
    <a href="{{ url('/erp/contabilidad') }}" class="hover:text-stone-900">Contabilidad</a>
    <span class="material-symbols-outlined text-sm">chevron_right</span>
    <span class="text-stone-900 font-medium">Balance General</span>
@endsection

@section('content')
<!-- Technical Blueprint Decoration: Fiduciary Mesh -->
<div class="absolute top-0 right-0 w-1/2 h-full opacity-5 pointer-events-none">
    <svg class="w-full h-full" viewbox="0 0 100 100">
        <pattern height="10" id="grid" patternunits="userSpaceOnUse" width="10">
            <path d="M 10 0 L 0 0 0 10" fill="none" stroke="white" stroke-width="0.5"></path>
        </pattern>
        <rect fill="url(#grid)" height="100%" width="100%"></rect>
    </svg>
</div>

<!-- Header Section: Industrial Authority -->
<header class="relative z-10 mb-16 flex flex-col md:flex-row justify-between items-end border-b border-primary/20 pb-12">
    <div class="max-w-4xl">
        <div class="flex items-center gap-4 mb-8">
            <span class="bg-primary px-6 py-2 text-[12px] font-black uppercase tracking-[0.4em] text-stone-950 italic shadow-[0_0_20px_rgba(206,255,94,0.3)]">REPORTE_OFICIAL_CERTIFICADO</span>
            <span class="text-stone-500 font-mono text-[11px] tracking-[0.2em] uppercase italic">FIN_ENG_v4.0.0_NOD_TRANSMISSION</span>
        </div>
        <h1 class="text-5xl md:text-7xl font-headline font-black uppercase tracking-tighter leading-none mb-6 text-white italic">MAYOR DE REPUESTO <br/><span class="text-stone-600 not-italic">LA CIMA, C.A.</span></h1>
        <p class="text-primary font-black uppercase tracking-[0.5em] text-[14px] italic mb-8">Estado de Situación Financiera Consolidado</p>
        <div class="flex items-center gap-4 bg-stone-900/50 p-4 rounded-2xl border border-white/5 w-fit">
            <span class="material-symbols-outlined text-stone-600 text-[18px]">event</span>
            <p class="text-stone-400 text-[11px] font-black uppercase tracking-[0.3em] italic">Fiscal_Cycle_End: OCT_31_2026 | Protocol_Currency: UM_MODERN_V1</p>
        </div>
    </div>
    <div class="mt-12 md:mt-0 flex gap-10 bg-stone-950/40 p-8 rounded-[32px] border border-white/5 backdrop-blur-xl">
        <div class="text-right">
            <p class="text-stone-600 text-[11px] font-black uppercase tracking-[0.4em] italic mb-2">Uptime Operativo</p>
            <p class="text-4xl font-headline font-black text-primary italic tracking-tight leading-none">99.98%</p>
        </div>
    </div>
</header>

<!-- Financial Dashboard Summary: Magnitude Analysis -->
<section class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16 relative z-10">
    <div class="bg-stone-900 border border-stone-800 p-10 rounded-[40px] shadow-2xl border-l-8 border-l-primary relative overflow-hidden transition-all hover:bg-stone-800/60 group">
        <div class="absolute -right-10 -top-10 opacity-[0.03] group-hover:opacity-[0.08] transition-all duration-700">
            <span class="material-symbols-outlined text-[180px]">trending_up</span>
        </div>
        <p class="text-stone-500 text-[11px] font-black uppercase tracking-[0.4em] mb-6 italic relative z-10">Total_Gross_Assets</p>
        <h3 class="text-5xl font-headline font-black tracking-tighter text-white italic leading-none relative z-10">$4.852.200,45</h3>
    </div>
    <div class="bg-stone-900 border border-stone-800 p-10 rounded-[40px] shadow-2xl border-l-8 border-l-red-500/50 relative overflow-hidden transition-all hover:bg-stone-800/60 group">
        <div class="absolute -right-10 -top-10 opacity-[0.03] group-hover:opacity-[0.08] transition-all duration-700">
            <span class="material-symbols-outlined text-[180px]">account_balance</span>
        </div>
        <p class="text-stone-500 text-[11px] font-black uppercase tracking-[0.4em] mb-6 italic relative z-10">Total_Liabilities_Exig</p>
        <h3 class="text-5xl font-headline font-black tracking-tighter text-white italic leading-none relative z-10">$1.240.550,12</h3>
    </div>
    <div class="bg-stone-900 border border-stone-800 p-10 rounded-[40px] shadow-2xl border-l-8 border-l-stone-600 relative overflow-hidden transition-all hover:bg-stone-800/60 group">
        <div class="absolute -right-10 -top-10 opacity-[0.03] group-hover:opacity-[0.08] transition-all duration-700">
            <span class="material-symbols-outlined text-[180px]">shield</span>
        </div>
        <p class="text-stone-500 text-[11px] font-black uppercase tracking-[0.4em] mb-6 italic relative z-10">Consolidated_Net_Equity</p>
        <h3 class="text-5xl font-headline font-black tracking-tighter text-primary italic leading-none relative z-10">$3.611.650,33</h3>
    </div>
</section>

<!-- Main Balance Table: Fiduciary Depth -->
<div class="space-y-20 relative z-10 mb-20">
    <!-- SECTION: ACTIVOS -->
    <section>
        <div class="flex items-center gap-8 mb-10">
            <h2 class="text-4xl font-headline font-black uppercase tracking-tighter text-white italic">01 <span class="text-stone-600 not-italic">/ ACTIVOS</span></h2>
            <div class="h-px flex-1 bg-gradient-to-r from-primary/20 to-transparent"></div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
            <!-- Activo Corriente -->
            <div class="bg-stone-900/40 backdrop-blur-2xl p-12 rounded-[40px] border border-stone-800 shadow-2xl group transition-all hover:border-primary/20">
                <h3 class="text-[12px] font-black uppercase tracking-[0.5em] text-primary mb-12 border-b border-primary/10 pb-6 italic">Protocol: ACTIVO_CORRIENTE</h3>
                <table class="w-full">
                    <tbody class="divide-y divide-white/5">
                        <tr class="hover:bg-primary/5 transition-all group/row">
                            <td class="py-6 text-[12px] font-black text-stone-500 group-hover/row:text-white uppercase tracking-widest italic">Caja_Bancos_Physical</td>
                            <td class="py-6 text-right">
                                <span class="font-mono text-[14px] font-black text-white italic tracking-tighter">450.000,00 <span class="text-[10px] text-stone-600 not-italic uppercase">VES</span></span>
                            </td>
                        </tr>
                        <tr class="hover:bg-primary/5 transition-all group/row">
                            <td class="py-6 text-[12px] font-black text-stone-500 group-hover/row:text-white uppercase tracking-widest italic">Commercial_Receivables</td>
                            <td class="py-6 text-right">
                                <span class="font-mono text-[14px] font-black text-white italic tracking-tighter">820.500,45 <span class="text-[10px] text-stone-600 not-italic uppercase">VES</span></span>
                            </td>
                        </tr>
                        <tr class="bg-primary/5 border-x border-primary/20">
                            <td class="py-6 px-4 text-[12px] font-black text-primary uppercase tracking-widest italic">Inventory_Stock_Magnitude</td>
                            <td class="py-6 px-4 text-right">
                                <span class="font-mono text-[14px] font-black text-primary italic tracking-tighter">1.840.300,00 <span class="text-[10px] text-primary/40 not-italic uppercase">VES</span></span>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr class="border-t-2 border-primary/40 bg-stone-950/60 rounded-b-3xl">
                            <td class="p-8 text-[12px] font-black uppercase tracking-[0.4em] text-stone-500 italic">Subtotal_Circulating_Magn</td>
                            <td class="p-8 text-right text-3xl font-headline font-black text-primary tracking-tighter italic leading-none">3.251.200,45 <span class="text-[12px] text-stone-700 not-italic uppercase">VES</span></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- Activo No Corriente -->
            <div class="bg-stone-900/40 backdrop-blur-2xl p-12 rounded-[40px] border border-stone-800 shadow-2xl group transition-all hover:border-white/10">
                <h3 class="text-[12px] font-black uppercase tracking-[0.5em] text-stone-500 mb-12 border-b border-white/5 pb-6 italic">Protocol: ACTIVO_NO_CORRIENTE</h3>
                <table class="w-full">
                    <tbody class="divide-y divide-white/5">
                        <tr class="hover:bg-white/5 transition-all group/row">
                            <td class="py-6 text-[12px] font-black text-stone-600 group-hover/row:text-stone-300 uppercase tracking-widest italic">Fixed_Assets_PP&E</td>
                            <td class="py-6 text-right font-mono text-[14px] font-black text-stone-300 italic tracking-tighter">1.450.000,00</td>
                        </tr>
                        <tr class="hover:bg-red-500/5 transition-all group/row">
                            <td class="py-6 text-[12px] font-black text-red-400 group-hover/row:text-red-300 uppercase tracking-widest italic">Depreciation_Lifecycle_Accum</td>
                            <td class="py-6 text-right font-mono text-[14px] font-black text-red-500 italic tracking-tighter">(-169.000,00)</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr class="border-t-2 border-stone-700 bg-stone-950/60 rounded-b-3xl">
                            <td class="p-8 text-[12px] font-black uppercase tracking-[0.4em] text-stone-600 italic">Subtotal_Infrastructure_Fixed</td>
                            <td class="p-8 text-right text-3xl font-headline font-black text-white tracking-tighter italic leading-none">1.601.000,00 <span class="text-[12px] text-stone-700 not-italic uppercase">VES</span></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </section>

    <!-- SECTION: PATRIMONIO (Fiduciary Core) -->
    <section>
        <div class="flex items-center gap-8 mb-10">
            <h2 class="text-4xl font-headline font-black uppercase tracking-tighter text-white italic">03 <span class="text-stone-600 not-italic">/ PATRIMONIO</span></h2>
            <div class="h-px flex-1 bg-gradient-to-r from-primary/20 to-transparent"></div>
        </div>
        <div class="bg-stone-950 border border-primary/20 p-12 rounded-[40px] shadow-2xl relative overflow-hidden group">
            <div class="absolute right-[-40px] bottom-[-40px] opacity-[0.02] group-hover:opacity-[0.05] transition-all duration-1000">
                <span class="material-symbols-outlined text-[400px]">verified</span>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center relative z-10">
                <div>
                    <table class="w-full">
                        <tbody class="divide-y divide-white/5">
                            <tr class="hover:bg-white/5 transition-all group/row">
                                <td class="py-8 text-[12px] font-black text-stone-500 group-hover/row:text-white uppercase tracking-widest italic">Paid_Social_Capital_MAG</td>
                                <td class="py-8 text-right font-mono text-[16px] font-black text-white italic tracking-tighter">2.000.000,00</td>
                            </tr>
                            <tr class="hover:bg-white/5 transition-all group/row">
                                <td class="py-8 text-[12px] font-black text-stone-500 group-hover/row:text-white uppercase tracking-widest italic">Retained_Earnings_Accum</td>
                                <td class="py-8 text-right font-mono text-[16px] font-black text-white italic tracking-tighter">950.000,00</td>
                            </tr>
                            <tr class="bg-primary/5 border border-primary/30 shadow-[0_0_30px_rgba(206,255,94,0.05)]">
                                <td class="py-8 px-8 text-[12px] font-black text-primary uppercase tracking-widest italic">Active_Period_Net_Utility</td>
                                <td class="py-8 px-8 text-right font-mono text-[24px] font-black text-primary italic tracking-tighter">461.650,33</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="flex flex-col items-center justify-center p-16 bg-stone-900/50 rounded-[40px] border border-white/5 shadow-2xl relative overflow-hidden group/final">
                    <div class="absolute inset-0 bg-primary/2 opacity-0 group-hover/final:opacity-100 transition-opacity"></div>
                    <p class="text-[12px] text-stone-600 font-black uppercase tracking-[0.5em] mb-6 italic">Total_Net_Equity_Magn</p>
                    <div class="text-7xl font-headline font-black tracking-tighter text-primary italic leading-none mb-10 shadow-primary/20 drop-shadow-[0_0_15px_#ceff5e33]">$3.611.650,33</div>
                    <div class="flex items-center gap-4 text-stone-500 italic text-[12px] font-black uppercase tracking-[0.4em] bg-stone-950 px-6 py-3 rounded-full border border-white/5 shadow-xl">
                        <span class="material-symbols-outlined text-primary text-[20px]">verified_user</span>
                        CERTIFIED_AUDIT_TRANSMISSION
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Technical Footnote: Industrial Integrity -->
<footer class="mt-32 pt-12 border-t border-white/10 flex flex-col md:flex-row justify-between items-start gap-12 opacity-60 hover:opacity-100 transition-all duration-500">
    <div class="flex items-center gap-16">
        <div class="flex flex-col">
            <span class="text-[11px] font-black text-stone-600 uppercase tracking-[0.4em] mb-4 italic">Authorizing_Node_01</span>
            <span class="text-[14px] font-black uppercase text-white tracking-widest italic">Directorio_Finanzas_Central</span>
            <div class="w-48 h-1 bg-primary/20 mt-6 rounded-full overflow-hidden">
                <div class="h-full bg-primary w-[60%]"></div>
            </div>
        </div>
        <div class="flex flex-col">
            <span class="text-[11px] font-black text-stone-600 uppercase tracking-[0.4em] mb-4 italic">Contraloría_Audit_Link</span>
            <span class="text-[14px] font-black uppercase text-white tracking-widest italic">Unidad_Gestión_Fiduciaria</span>
            <div class="w-48 h-1 bg-stone-700 mt-6 rounded-full overflow-hidden">
                <div class="h-full bg-stone-500 w-[40%]"></div>
            </div>
        </div>
    </div>
    <div class="text-[11px] text-right max-w-xl uppercase font-black font-mono text-stone-500 tracking-widest leading-loose italic">
        ESTE REPORTE CONSTITUYE UNA REPRESENTACIÓN TÉCNICA DE ALTA PRECISIÓN DE LA SALUD FINANCIERA DE MAYOR DE REPUESTO LA CIMA, C.A. GENERADO BAJO PROTOCOLO ZENITH INDUSTRIAL 4.0. INTEGRIDAD DE DATOS ENCRIPTADA Y VERIFICADA POR NODO CENTRAL.
    </div>
</footer>


@endsection

@push('scripts')
    <script src="{{ asset('erp/js/balance-general.js') }}"></script>
    <script>
        // Aplicar el fondo oscuro al <main> cuando se renderice esta vista
        document.addEventListener('DOMContentLoaded', function() {
            const main = document.querySelector('main');
            if(main) {
                main.classList.remove('bg-background', 'bg-stone-50');
                main.classList.add('bg-[#1a1c1c]');
            }
        });
    </script>
@endpush
