@extends('erp.layouts.app')

@section('title', 'Balance General | ERP La Cima')

@section('breadcrumb')
    <a href="{{ url('/erp/contabilidad') }}" class="hover:text-stone-900">Contabilidad</a>
    <span class="material-symbols-outlined text-sm">chevron_right</span>
    <span class="text-stone-900 font-medium">Balance General</span>
@endsection

@section('content')
<!-- Technical Blueprint Decoration -->
<div class="absolute top-0 right-0 w-1/2 h-full opacity-5 pointer-events-none">
    <svg class="w-full h-full" viewbox="0 0 100 100">
    <pattern height="10" id="grid" patternunits="userSpaceOnUse" width="10">
    <path d="M 10 0 L 0 0 0 10" fill="none" stroke="white" stroke-width="0.5"></path>
    </pattern>
    <rect fill="url(#grid)" height="100%" width="100%"></rect>
    </svg>
</div>

<!-- Header Section -->
<header class="relative z-10 mb-12 flex flex-col md:flex-row justify-between items-end border-b border-white/10 pb-10">
    <div class="max-w-3xl">
        <div class="flex items-center gap-3 mb-6">
            <span class="bg-primary px-4 py-1.5 text-[10px] font-black uppercase tracking-[0.3em] text-stone-950 italic">Reporte Oficial Certificado</span>
            <span class="text-stone-500 font-mono text-[9px] tracking-widest uppercase">FIN_ENG_v4.0.0_PRODUCTION</span>
        </div>
        <h1 class="text-4xl md:text-6xl font-headline font-black uppercase tracking-tighter leading-none mb-4 text-white italic">MAYOR DE REPUESTO <span class="text-stone-500 italic">LA CIMA, C.A.</span></h1>
        <p class="text-primary font-black uppercase tracking-[0.4em] text-[12px] italic">Estado de Situación Financiera Consolidado</p>
        <p class="text-stone-500 text-[10px] mt-6 font-mono uppercase tracking-widest italic">Cierre de Periodo Fiscal: 31 de Octubre, 2026 | Protocolo de Moneda: UM (Unidades Monetarias)</p>
    </div>
    <div class="mt-10 md:mt-0 flex gap-6">
        <div class="text-right">
            <p class="text-stone-500 text-[10px] font-black uppercase tracking-[0.3em] italic">Uptime Operativo</p>
            <p class="text-3xl font-headline font-black text-primary italic leading-none mt-1">99.8%</p>
        </div>
    </div>
</header>

<!-- Financial Dashboard Summary -->
<section class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12 relative z-10">
    <div class="bg-stone-900/40 backdrop-blur-xl p-8 border border-white/5 border-l-4 border-l-primary relative overflow-hidden transition-all hover:bg-stone-900/60 group">
        <div class="absolute -right-6 -top-6 opacity-5 group-hover:opacity-10 transition-opacity">
            <span class="material-symbols-outlined text-[120px]">trending_up</span>
        </div>
        <p class="text-stone-500 text-[10px] font-black uppercase tracking-[0.3em] mb-4 italic">Total Activos Brutos</p>
        <h3 class="text-4xl font-headline font-black tracking-tighter text-white italic leading-none">$4,852,200.45</h3>
    </div>
    <div class="bg-stone-900/40 backdrop-blur-xl p-8 border border-white/5 border-l-4 border-l-red-500 relative overflow-hidden transition-all hover:bg-stone-900/60 group">
        <div class="absolute -right-6 -top-6 opacity-5 group-hover:opacity-10 transition-opacity">
            <span class="material-symbols-outlined text-[120px]">account_balance</span>
        </div>
        <p class="text-stone-500 text-[10px] font-black uppercase tracking-[0.3em] mb-4 italic">Total Pasivos Exigibles</p>
        <h3 class="text-4xl font-headline font-black tracking-tighter text-white italic leading-none">$1,240,550.12</h3>
    </div>
    <div class="bg-stone-900/40 backdrop-blur-xl p-8 border border-white/5 border-l-4 border-l-stone-500 relative overflow-hidden transition-all hover:bg-stone-900/60 group">
        <div class="absolute -right-6 -top-6 opacity-5 group-hover:opacity-10 transition-opacity">
            <span class="material-symbols-outlined text-[120px]">shield</span>
        </div>
        <p class="text-stone-500 text-[10px] font-black uppercase tracking-[0.3em] mb-4 italic">Patrimonio Neto Consolidado</p>
        <h3 class="text-4xl font-headline font-black tracking-tighter text-primary italic leading-none">$3,611,650.33</h3>
    </div>
</section>

<!-- Main Balance Table -->
<div class="space-y-16 relative z-10">
    <!-- SECTION: ACTIVOS -->
    <section>
        <div class="flex items-center gap-6 mb-8">
            <h2 class="text-3xl font-headline font-black uppercase tracking-tighter text-white italic">01 <span class="text-stone-600 italic">/ ACTIVOS</span></h2>
            <div class="h-[1px] flex-1 bg-white/10 shadow-[0_0_10px_rgba(255,255,255,0.05)]"></div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
            <!-- Activo Corriente -->
            <div class="bg-stone-950/30 p-10 rounded-[32px] border border-white/5 hover:border-white/10 transition-all shadow-2xl">
                <h3 class="text-[10px] font-black uppercase tracking-[0.4em] text-primary mb-10 border-b border-white/5 pb-4 italic">Activo Corriente</h3>
                <table class="w-full">
                    <tbody class="divide-y divide-white/5">
                        <tr class="hover:bg-white/[0.02] transition-all group">
                            <td class="py-5 text-[12px] font-black text-stone-500 group-hover:text-stone-100 uppercase tracking-tight italic">Caja y Bancos</td>
                            <td class="py-5 text-right">
                                <span class="font-mono text-[12px] font-black text-white italic tracking-tighter">$450,000.00</span>
                            </td>
                        </tr>
                        <tr class="hover:bg-white/[0.02] transition-all group">
                            <td class="py-5 text-[12px] font-black text-stone-500 group-hover:text-stone-100 uppercase tracking-tight italic">Cuentas por Cobrar Comerciales</td>
                            <td class="py-5 text-right">
                                <span class="font-mono text-[12px] font-black text-white italic tracking-tighter">$820,500.45</span>
                            </td>
                        </tr>
                        <tr class="hover:bg-primary/5 transition-all group">
                            <td class="py-5 text-[12px] font-black text-primary uppercase tracking-tight italic">Inventario de Repuestos (Valorizado)</td>
                            <td class="py-5 text-right">
                                <span class="font-mono text-[12px] font-black text-primary italic tracking-tighter">$1,840,300.00</span>
                            </td>
                        </tr>
                        <tr class="hover:bg-white/[0.02] transition-all group">
                            <td class="py-5 text-[12px] font-black text-stone-500 group-hover:text-stone-100 uppercase tracking-tight italic">IVA Crédito Fiscal</td>
                            <td class="py-5 text-right">
                                <span class="font-mono text-[12px] font-black text-white italic tracking-tighter">$98,400.00</span>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr class="border-t-2 border-primary/20 bg-stone-900/40">
                            <td class="p-6 text-[10px] font-black uppercase tracking-[0.3em] text-stone-500 italic">Subtotal Activo Circulante</td>
                            <td class="p-6 text-right text-2xl font-headline font-black text-primary tracking-tighter italic leading-none">$3,251,200.45</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- Activo No Corriente -->
            <div class="bg-stone-950/30 p-10 rounded-[32px] border border-white/5 hover:border-white/10 transition-all shadow-2xl">
                <h3 class="text-[10px] font-black uppercase tracking-[0.4em] text-stone-500 mb-10 border-b border-white/5 pb-4 italic">Activo No Corriente</h3>
                <table class="w-full">
                    <tbody class="divide-y divide-white/5">
                        <tr class="hover:bg-white/[0.02] transition-all group">
                            <td class="py-5 text-[12px] font-black text-stone-500 group-hover:text-stone-500 uppercase tracking-tight italic">Propiedad, Planta y Equipo</td>
                            <td class="py-5 text-right text-stone-300 font-mono text-[12px] font-black italic tracking-tighter">$1,450,000.00</td>
                        </tr>
                        <tr class="hover:bg-white/[0.02] transition-all group">
                            <td class="py-5 text-[12px] font-black text-stone-500 group-hover:text-stone-100 uppercase tracking-tight italic">Mobiliario y Equipos</td>
                            <td class="py-5 text-right text-stone-300 font-mono text-[12px] font-black italic tracking-tighter">$320,000.00</td>
                        </tr>
                        <tr class="hover:bg-red-500/5 transition-all group">
                            <td class="py-5 text-[12px] font-black text-red-400 uppercase tracking-tight italic">Depreciación Acumulada</td>
                            <td class="py-5 text-right font-mono text-[12px] font-black text-red-500 italic tracking-tighter">(-$169,000.00)</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr class="border-t-2 border-stone-500/20 bg-stone-900/40">
                            <td class="p-6 text-[10px] font-black uppercase tracking-[0.3em] text-stone-500 italic">Subtotal Activos Fijos</td>
                            <td class="p-6 text-right text-2xl font-headline font-black text-white tracking-tighter italic leading-none">$1,601,000.00</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </section>

    <!-- SECTION: PATRIMONIO (Special Highlight) -->
    <section>
        <div class="flex items-center gap-6 mb-8">
            <h2 class="text-3xl font-headline font-black uppercase tracking-tighter text-white italic">03 <span class="text-stone-600 italic">/ PATRIMONIO</span></h2>
            <div class="h-[1px] flex-1 bg-white/10 shadow-[0_0_10px_rgba(255,255,255,0.05)]"></div>
        </div>
        <div class="bg-stone-900/40 backdrop-blur-2xl p-10 rounded-[40px] border border-primary/20 shadow-2xl relative overflow-hidden">
            <div class="absolute right-[-20px] bottom-[-20px] opacity-[0.03]">
                <span class="material-symbols-outlined text-[300px]">verified</span>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
                <div>
                    <table class="w-full">
                        <tbody class="divide-y divide-white/5">
                            <tr class="hover:bg-white/[0.02] transition-all group">
                                <td class="py-6 text-[12px] font-black text-stone-500 group-hover:text-stone-100 uppercase tracking-tight italic">Capital Social Pagado</td>
                                <td class="py-6 text-right font-mono text-[14px] font-black text-white italic tracking-tighter">$2,000,000.00</td>
                            </tr>
                            <tr class="hover:bg-white/[0.02] transition-all group">
                                <td class="py-6 text-[12px] font-black text-stone-500 group-hover:text-stone-100 uppercase tracking-tight italic">Utilidades Acumuladas</td>
                                <td class="py-6 text-right font-mono text-[14px] font-black text-white italic tracking-tighter">$950,000.00</td>
                            </tr>
                            <tr class="bg-primary/10 border border-primary/20">
                                <td class="py-6 px-6 text-[12px] font-black text-primary uppercase tracking-tight italic">Utilidad Neta Periodo Actual</td>
                                <td class="py-6 px-6 text-right font-mono text-[18px] font-black text-primary italic tracking-tighter">$461,650.33</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="flex flex-col items-center justify-center p-12 bg-white/5 rounded-[30px] border border-white/5 shadow-inner">
                    <p class="text-[10px] text-stone-500 font-black uppercase tracking-[0.4em] mb-4 italic">Total Capital y Reservas</p>
                    <div class="text-6xl font-headline font-black tracking-tighter text-primary italic leading-none mb-6">$3,611,650.33</div>
                    <div class="flex items-center gap-3 text-stone-500 italic text-[11px] font-black uppercase tracking-widest">
                        <span class="material-symbols-outlined text-sm">verified_user</span>
                        CERTIFICADO POR AUDITORÍA CENTRAL
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Technical Footnote -->
<footer class="mt-20 pt-10 border-t border-white/10 flex flex-col md:flex-row justify-between items-start gap-10 opacity-40 hover:opacity-100 transition-all">
    <div class="flex items-center gap-12">
        <div class="flex flex-col">
            <span class="text-[10px] font-black uppercase tracking-[0.3em] text-stone-500 mb-2 italic">Firma Autorizada</span>
            <span class="text-[12px] font-black uppercase text-white tracking-tight italic">Directorio de Finanzas</span>
            <div class="w-32 h-[1px] bg-white/20 mt-4"></div>
        </div>
        <div class="flex flex-col">
            <span class="text-[10px] font-black uppercase tracking-[0.3em] text-stone-500 mb-2 italic">Contraloría General</span>
            <span class="text-[12px] font-black uppercase text-white tracking-tight italic">Unidad de Auditoría Central</span>
            <div class="w-32 h-[1px] bg-white/20 mt-4"></div>
        </div>
    </div>
    <div class="text-[10px] text-right max-w-md uppercase leading-relaxed font-mono text-stone-500 tracking-tight italic">
        ESTE REPORTE CONSTITUYE UNA REPRESENTACIÓN TÉCNICA DE ALTA PRECISIÓN DE LA SALUD FINANCIERA DE MAYOR DE REPUESTO LA CIMA, C.A. GENERADO BAJO PROTOCOLO ZENITH INDUSTRIAL 4.0. INTEGRIDAD DE DATOS VERIFICADA.
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
