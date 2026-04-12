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
<header class="relative z-10 mb-12 flex flex-col md:flex-row justify-between items-end border-b border-white/10 pb-8">
    <div class="max-w-2xl">
        <div class="flex items-center gap-3 mb-4">
            <span class="bg-primary px-3 py-1 text-[10px] font-black uppercase tracking-widest text-white">Reporte Oficial</span>
            <span class="text-zinc-500 font-mono text-[10px]">FIN_ENG_v2.0.4</span>
        </div>
        <h1 class="text-4xl md:text-6xl font-bold uppercase tracking-tighter leading-none mb-4 text-white">MAYOR DE REPUESTO LA CIMA, C.A.</h1>
        <p class="text-primary-container font-medium uppercase tracking-[0.3em] text-sm text-primary">Estado de Situación Financiera</p>
        <p class="text-zinc-500 text-xs mt-4 font-mono uppercase">Cierre de Periodo Fiscal: 31 de Octubre, 2023 | Moneda: Unidades Monetarias (UM)</p>
    </div>
    <div class="mt-8 md:mt-0 flex gap-4">
        <div class="text-right">
            <p class="text-zinc-500 text-[10px] uppercase tracking-widest">Uptime Operativo</p>
            <p class="text-2xl font-['Space_Grotesk'] font-bold text-primary">99.8%</p>
        </div>
    </div>
</header>

<!-- Financial Dashboard Summary -->
<section class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12 relative z-10">
    <div class="bg-zinc-900/50 backdrop-blur-md p-6 border-l-4 border-primary relative overflow-hidden text-white">
        <div class="absolute -right-4 -top-4 opacity-10">
            <span class="material-symbols-outlined text-8xl" style="font-variation-settings: 'FILL' 1;">trending_up</span>
        </div>
        <p class="text-zinc-500 text-[10px] uppercase tracking-widest mb-1">Total Activos</p>
        <h3 class="text-3xl font-bold tracking-tighter">4.852.200,45</h3>
    </div>
    <div class="bg-zinc-900/50 backdrop-blur-md p-6 border-l-4 border-red-500 relative overflow-hidden text-white">
        <div class="absolute -right-4 -top-4 opacity-10">
            <span class="material-symbols-outlined text-8xl" style="font-variation-settings: 'FILL' 1;">account_balance</span>
        </div>
        <p class="text-zinc-500 text-[10px] uppercase tracking-widest mb-1">Total Pasivos</p>
        <h3 class="text-3xl font-bold tracking-tighter">1.240.550,12</h3>
    </div>
    <div class="bg-zinc-900/50 backdrop-blur-md p-6 border-l-4 border-zinc-500 relative overflow-hidden text-white">
        <div class="absolute -right-4 -top-4 opacity-10">
            <span class="material-symbols-outlined text-8xl" style="font-variation-settings: 'FILL' 1;">shield</span>
        </div>
        <p class="text-zinc-500 text-[10px] uppercase tracking-widest mb-1">Patrimonio Neto</p>
        <h3 class="text-3xl font-bold tracking-tighter text-primary">3.611.650,33</h3>
    </div>
</section>

<!-- Main Balance Table -->
<div class="space-y-12 relative z-10 text-white">
    <!-- SECTION: ACTIVOS -->
    <section>
        <div class="flex items-baseline gap-4 mb-4">
            <h2 class="text-2xl font-bold uppercase tracking-tighter text-white">01 / Activos</h2>
            <div class="h-[1px] flex-1 bg-white/10"></div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Activo Corriente -->
            <div class="bg-zinc-900/50 p-6 rounded-lg">
                <h3 class="text-xs font-bold uppercase tracking-[0.2em] text-zinc-500 mb-6 border-b border-white/5 pb-2">Activo Corriente</h3>
                <table class="w-full text-xs font-mono">
                    <tbody class="divide-y divide-white/5">
                        <tr class="hover:bg-white/5 transition-colors group">
                            <td class="py-3 text-zinc-400 group-hover:text-white">Caja y Bancos</td>
                            <td class="py-3 text-right tabular-nums">450.000,00</td>
                        </tr>
                        <tr class="hover:bg-white/5 transition-colors group">
                            <td class="py-3 text-zinc-400 group-hover:text-white">Cuentas por Cobrar Comerciales</td>
                            <td class="py-3 text-right tabular-nums">820.500,45</td>
                        </tr>
                        <tr class="hover:bg-white/5 transition-colors group bg-primary/5">
                            <td class="py-3 text-primary font-bold">Inventario de Repuestos (Valorizado)</td>
                            <td class="py-3 text-right tabular-nums font-bold">1.840.300,00</td>
                        </tr>
                        <tr class="hover:bg-white/5 transition-colors group">
                            <td class="py-3 text-zinc-400 group-hover:text-white">IVA Crédito Fiscal</td>
                            <td class="py-3 text-right tabular-nums">98.400,00</td>
                        </tr>
                        <tr class="hover:bg-white/5 transition-colors group">
                            <td class="py-3 text-zinc-400 group-hover:text-white">Retenciones de IVA por Recuperar</td>
                            <td class="py-3 text-right tabular-nums">42.000,00</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr class="border-t-2 border-primary/20">
                            <td class="pt-4 text-[10px] uppercase tracking-widest text-zinc-500">Subtotal Activo Corriente</td>
                            <td class="pt-4 text-right text-lg font-bold tracking-tight">3.251.200,45</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- Activo No Corriente -->
            <div class="bg-zinc-900/50 p-6 rounded-lg">
                <h3 class="text-xs font-bold uppercase tracking-[0.2em] text-zinc-500 mb-6 border-b border-white/5 pb-2">Activo No Corriente</h3>
                <table class="w-full text-xs font-mono">
                    <tbody class="divide-y divide-white/5">
                        <tr class="hover:bg-white/5 transition-colors group">
                            <td class="py-3 text-zinc-400 group-hover:text-white">Propiedad, Planta y Equipo</td>
                            <td class="py-3 text-right tabular-nums">1.450.000,00</td>
                        </tr>
                        <tr class="hover:bg-white/5 transition-colors group">
                            <td class="py-3 text-zinc-400 group-hover:text-white">Mobiliario y Equipos de Oficina</td>
                            <td class="py-3 text-right tabular-nums">320.000,00</td>
                        </tr>
                        <tr class="hover:bg-white/5 transition-colors group">
                            <td class="py-3 text-zinc-400 group-hover:text-white">Depreciación Acumulada</td>
                            <td class="py-3 text-right tabular-nums text-red-500">(-169.000,00)</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr class="border-t-2 border-primary/20">
                            <td class="pt-4 text-[10px] uppercase tracking-widest text-zinc-500">Subtotal Activo No Corriente</td>
                            <td class="pt-4 text-right text-lg font-bold tracking-tight">1.601.000,00</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </section>

    <!-- SECTION: PASIVOS -->
    <section>
        <div class="flex items-baseline gap-4 mb-4">
            <h2 class="text-2xl font-bold uppercase tracking-tighter text-white">02 / Pasivos</h2>
            <div class="h-[1px] flex-1 bg-white/10"></div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Pasivo Corriente -->
            <div class="bg-zinc-900/50 p-6 rounded-lg">
                <h3 class="text-xs font-bold uppercase tracking-[0.2em] text-zinc-500 mb-6 border-b border-white/5 pb-2">Pasivo Corriente</h3>
                <table class="w-full text-xs font-mono">
                    <tbody class="divide-y divide-white/5">
                        <tr class="hover:bg-white/5 transition-colors group">
                            <td class="py-3 text-zinc-400 group-hover:text-white">Cuentas por Pagar Proveedores</td>
                            <td class="py-3 text-right tabular-nums">680.000,00</td>
                        </tr>
                        <tr class="hover:bg-white/5 transition-colors group text-primary">
                            <td class="py-3 font-bold">IVA por Pagar</td>
                            <td class="py-3 text-right tabular-nums font-bold">124.550,12</td>
                        </tr>
                        <tr class="hover:bg-white/5 transition-colors group">
                            <td class="py-3 text-zinc-400 group-hover:text-white">Retenciones de ISLR por Pagar</td>
                            <td class="py-3 text-right tabular-nums">15.200,00</td>
                        </tr>
                        <tr class="hover:bg-white/5 transition-colors group">
                            <td class="py-3 text-zinc-400 group-hover:text-white">Pasivos Laborales Acumulados</td>
                            <td class="py-3 text-right tabular-nums">220.800,00</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr class="border-t-2 border-red-500/20">
                            <td class="pt-4 text-[10px] uppercase tracking-widest text-zinc-500">Subtotal Pasivo Corriente</td>
                            <td class="pt-4 text-right text-lg font-bold tracking-tight">1.040.550,12</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- Pasivo No Corriente -->
            <div class="bg-zinc-900/50 p-6 rounded-lg">
                <h3 class="text-xs font-bold uppercase tracking-[0.2em] text-zinc-500 mb-6 border-b border-white/5 pb-2">Pasivo No Corriente</h3>
                <table class="w-full text-xs font-mono">
                    <tbody class="divide-y divide-white/5">
                        <tr class="hover:bg-white/5 transition-colors group">
                            <td class="py-3 text-zinc-400 group-hover:text-white">Préstamos Bancarios Largo Plazo</td>
                            <td class="py-3 text-right tabular-nums">200.000,00</td>
                        </tr>
                    </tbody>
                    <tfoot class="h-24 block">
                        <!-- Empty space to align with the taller left table -->
                        <tr class="border-t-2 border-red-500/20 align-bottom w-full table-row">
                            <td class="pt-4 text-[10px] uppercase tracking-widest text-zinc-500">Subtotal Pasivo No Corriente</td>
                            <td class="pt-4 text-right text-lg font-bold tracking-tight">200.000,00</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </section>

    <!-- SECTION: PATRIMONIO -->
    <section>
        <div class="flex items-baseline gap-4 mb-4">
            <h2 class="text-2xl font-bold uppercase tracking-tighter text-white">03 / Patrimonio</h2>
            <div class="h-[1px] flex-1 bg-white/10"></div>
        </div>
        <div class="bg-zinc-900/50 p-8 rounded-lg border border-white/5 text-white">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div>
                    <table class="w-full text-xs font-mono">
                        <tbody class="divide-y divide-white/5">
                            <tr class="hover:bg-white/5 transition-colors group">
                                <td class="py-4 text-zinc-400 group-hover:text-white uppercase tracking-wider">Capital Social Suscrito y Pagado</td>
                                <td class="py-4 text-right tabular-nums text-sm">2.000.000,00</td>
                            </tr>
                            <tr class="hover:bg-white/5 transition-colors group">
                                <td class="py-4 text-zinc-400 group-hover:text-white uppercase tracking-wider">Reserva Legal</td>
                                <td class="py-4 text-right tabular-nums text-sm">200.000,00</td>
                            </tr>
                            <tr class="hover:bg-white/5 transition-colors group">
                                <td class="py-4 text-zinc-400 group-hover:text-white uppercase tracking-wider">Utilidades Acumuladas</td>
                                <td class="py-4 text-right tabular-nums text-sm">950.000,00</td>
                            </tr>
                            <tr class="hover:bg-white/5 transition-colors group bg-primary/10">
                                <td class="py-4 text-primary font-bold uppercase tracking-wider">Utilidad del Ejercicio</td>
                                <td class="py-4 text-right tabular-nums text-sm font-bold text-primary">461.650,33</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="flex flex-col items-center justify-center p-8 bg-zinc-950/50 rounded-lg border border-primary/20">
                    <span class="text-[10px] text-zinc-500 uppercase tracking-[0.3em] mb-2">Total Capital y Reservas</span>
                    <div class="text-5xl font-bold tracking-tighter text-primary mb-2">3.611.650,33</div>
                    <div class="flex items-center gap-2 text-zinc-500 italic text-[10px]">
                        <span class="material-symbols-outlined text-xs">verified</span>
                        Certificado por el departamento contable
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Technical Footnote -->
<footer class="mt-20 pt-8 border-t border-white/5 flex flex-col md:flex-row justify-between items-center gap-6 opacity-40 hover:opacity-100 transition-opacity text-white">
    <div class="flex items-center gap-8">
        <div class="flex flex-col">
            <span class="text-[9px] uppercase tracking-widest font-black">Preparado por</span>
            <span class="text-xs uppercase">Dpto. Contabilidad Central</span>
        </div>
        <div class="flex flex-col">
            <span class="text-[9px] uppercase tracking-widest font-black">Revisado por</span>
            <span class="text-xs uppercase">Dirección de Finanzas</span>
        </div>
    </div>
    <div class="text-[9px] text-right max-w-sm uppercase leading-relaxed font-mono">
        Este documento es una representación técnica de la salud financiera de MAYOR DE REPUESTO LA CIMA, C.A. La integridad de los datos de inventario está vinculada directamente al sistema ERP FINANCE_ENGINE Core.
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
