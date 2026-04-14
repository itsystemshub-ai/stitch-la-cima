@extends('erp.layouts.app')

@section('title', 'Estado Resultados | ERP La Cima')

@section('breadcrumb')
    <a href="{{ url('/erp/contabilidad') }}" class="hover:text-stone-900">Contabilidad</a>
    <span class="material-symbols-outlined text-sm">chevron_right</span>
    <span class="text-stone-900 font-medium">Estado Resultados</span>
@endsection

@section('content')
<div class="max-w-6xl mx-auto md:p-6 lg:p-12 text-white">
    <!-- Header Section -->
    <div class="flex justify-between items-end mb-12 relative">
        <div class="space-y-2">
            <h2 class="text-xs font-bold text-amber-500 uppercase tracking-[0.3em]">ESTADO DE RESULTADOS (P&amp;G)</h2>
            <h1 class="text-5xl font-black text-zinc-50 uppercase tracking-tighter leading-none">MAYOR DE REPUESTO<br/><span class="text-zinc-600">LA CIMA, C.A.</span></h1>
            <p class="text-zinc-500 font-['Space_Grotesk'] text-sm tracking-widest mt-4">PERÍODO FISCAL 2023 | ESTRUCTURA NIIF (IFRS)</p>
        </div>
        <div class="flex gap-3">
            <button class="flex items-center gap-2 bg-zinc-900 px-6 py-3 text-zinc-300 font-['Inter'] font-bold text-xs uppercase tracking-widest hover:bg-zinc-800 transition-all border border-zinc-800 rounded-lg">
                <span class="material-symbols-outlined text-sm">download</span>
                <span>EXPORT PDF</span>
            </button>
            <button class="flex items-center gap-2 bg-amber-500 px-6 py-3 text-zinc-950 font-['Inter'] font-bold text-xs uppercase tracking-widest hover:brightness-110 transition-all rounded-lg">
                <span class="material-symbols-outlined text-sm">table_view</span>
                <span>EXPORT EXCEL</span>
            </button>
        </div>
        <!-- Precision Blueprint line -->
        <div class="absolute -bottom-4 left-0 w-full h-[1px] bg-zinc-800"></div>
    </div>

    <!-- Financial Summary Bento -->
    <div class="grid grid-cols-12 gap-6 mb-12">
        <!-- Utility Bruta Highlight -->
        <div class="col-span-12 md:col-span-4 bg-zinc-900/50 p-8 relative overflow-hidden group rounded-lg border border-zinc-800/50">
            <div class="absolute top-0 right-0 w-32 h-32 bg-amber-500/5 -mr-16 -mt-16 rounded-full blur-2xl group-hover:bg-amber-500/10 transition-colors"></div>
            <p class="text-xs font-bold text-zinc-500 uppercase tracking-widest mb-1">UTILIDAD BRUTA</p>
            <div class="flex items-baseline gap-2">
                <p class="text-3xl font-black text-zinc-100">$ 1.452.890,00</p>
                <span class="text-amber-500 text-xs font-bold font-['Space_Grotesk']">+14%</span>
            </div>
            <div class="mt-6 w-full bg-zinc-800 h-1 rounded-full overflow-hidden">
                <div class="bg-amber-500 h-1 w-[68%]"></div>
            </div>
        </div>
        <!-- Operating Margin -->
        <div class="col-span-12 md:col-span-4 bg-zinc-900/50 p-8 rounded-lg border border-zinc-800/50">
            <p class="text-xs font-bold text-zinc-500 uppercase tracking-widest mb-1">MARGEN OPERACIONAL</p>
            <p class="text-3xl font-black text-zinc-100">32.4%</p>
            <p class="text-[10px] text-zinc-600 mt-4 uppercase font-bold">OPTIMIZADO SEGÚN ART. 177</p>
        </div>
        <!-- Net Profit Prediction -->
        <div class="col-span-12 md:col-span-4 bg-amber-500 p-8 rounded-lg">
            <p class="text-xs font-bold text-amber-950 uppercase tracking-widest mb-1">UTILIDAD NETA DISPONIBLE</p>
            <p class="text-3xl font-black text-amber-950">$ 628.430,22</p>
            <div class="flex items-center gap-1 mt-4">
                <span class="material-symbols-outlined text-xs text-amber-900">verified</span>
                <span class="text-[10px] text-amber-900 font-bold uppercase">POST-ISLR (34%)</span>
            </div>
        </div>
    </div>

    <!-- Detailed Report Table -->
    <div class="bg-zinc-900/30 overflow-hidden rounded-lg border border-zinc-800/50">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-zinc-900 border-b border-zinc-800">
                    <th class="py-5 px-8 text-[10px] font-black text-zinc-500 uppercase tracking-[0.2em]">CÓDIGO CUENTA</th>
                    <th class="py-5 px-8 text-[10px] font-black text-zinc-500 uppercase tracking-[0.2em]">DESCRIPCIÓN DE PARTIDA</th>
                    <th class="py-5 px-8 text-right text-[10px] font-black text-zinc-500 uppercase tracking-[0.2em]">VALOR (USD)</th>
                    <th class="py-5 px-8 text-right text-[10px] font-black text-zinc-500 uppercase tracking-[0.2em]">% INC.</th>
                </tr>
            </thead>
            <tbody class="font-bold">
                <!-- SECTION: INCOME -->
                <tr class="bg-zinc-800/30">
                    <td class="py-4 px-8 text-[10px] font-black text-amber-500 uppercase tracking-widest" colspan="4">INGRESOS OPERACIONALES</td>
                </tr>
                <tr class="hover:bg-zinc-800/20 transition-colors">
                    <td class="py-4 px-8 text-xs font-mono text-zinc-500">4.1.01.01</td>
                    <td class="py-4 px-8 text-xs font-semibold text-zinc-300 uppercase tracking-tight">VENTAS NETAS DE REPUESTOS INDUSTRIALES</td>
                    <td class="py-4 px-8 text-right text-xs font-bold text-zinc-100">$ 4.250.000,00</td>
                    <td class="py-4 px-8 text-right text-[10px] font-bold text-zinc-500">100%</td>
                </tr>
                <tr class="hover:bg-zinc-800/20 transition-colors">
                    <td class="py-4 px-8 text-xs font-mono text-zinc-500">4.1.01.05</td>
                    <td class="py-4 px-8 text-xs font-semibold text-zinc-300 uppercase tracking-tight">SERVICIOS DE MECÁNICA DE PRECISIÓN</td>
                    <td class="py-4 px-8 text-right text-xs font-bold text-zinc-100">$ 180.450,00</td>
                    <td class="py-4 px-8 text-right text-[10px] font-bold text-zinc-500">4.2%</td>
                </tr>
                <!-- SECTION: COGS -->
                <tr class="bg-zinc-800/30">
                    <td class="py-4 px-8 text-[10px] font-black text-amber-500 uppercase tracking-widest" colspan="4">COSTO DE VENTAS (ART. 177)</td>
                </tr>
                <tr class="hover:bg-zinc-800/20 transition-colors">
                    <td class="py-4 px-8 text-xs font-mono text-zinc-500">5.1.01.10</td>
                    <td class="py-4 px-8 text-xs font-semibold text-zinc-400 uppercase tracking-tight">INVENTARIO INICIAL DE MERCANCÍA</td>
                    <td class="py-4 px-8 text-right text-xs font-bold text-zinc-300">$ 950.000,00</td>
                    <td class="py-4 px-8 text-right text-[10px] font-bold text-zinc-600">--</td>
                </tr>
                <tr class="hover:bg-zinc-800/20 transition-colors">
                    <td class="py-4 px-8 text-xs font-mono text-zinc-500">5.1.01.20</td>
                    <td class="py-4 px-8 text-xs font-semibold text-zinc-400 uppercase tracking-tight">COMPRAS NETAS NACIONALES/IMPORTADAS</td>
                    <td class="py-4 px-8 text-right text-xs font-bold text-zinc-300">$ 2.650.000,00</td>
                    <td class="py-4 px-8 text-right text-[10px] font-bold text-zinc-600">--</td>
                </tr>
                <tr class="hover:bg-zinc-800/20 transition-colors border-b border-zinc-800">
                    <td class="py-4 px-8 text-xs font-mono text-zinc-500">5.1.01.99</td>
                    <td class="py-4 px-8 text-xs font-semibold text-zinc-400 uppercase tracking-tight">INVENTARIO FINAL DE MERCANCÍA</td>
                    <td class="py-4 px-8 text-right text-xs font-bold text-zinc-300">($ 622.440,00)</td>
                    <td class="py-4 px-8 text-right text-[10px] font-bold text-zinc-600">--</td>
                </tr>
                <!-- TOTAL BRUTA -->
                <tr class="bg-zinc-900 border-t-2 border-amber-500/20">
                    <td class="py-6 px-8 text-sm font-black text-zinc-50 uppercase tracking-widest" colspan="2">UTILIDAD BRUTA EN VENTAS</td>
                    <td class="py-6 px-8 text-right text-lg font-black text-amber-400">$ 1.452.890,00</td>
                    <td class="py-6 px-8 text-right text-xs font-bold text-zinc-500">32.8%</td>
                </tr>
                <!-- SECTION: OPEX -->
                <tr class="bg-zinc-800/30">
                    <td class="py-4 px-8 text-[10px] font-black text-amber-500 uppercase tracking-widest" colspan="4">GASTOS OPERACIONALES</td>
                </tr>
                <tr class="hover:bg-zinc-800/20 transition-colors">
                    <td class="py-4 px-8 text-xs font-mono text-zinc-500">6.1.01.00</td>
                    <td class="py-4 px-8 text-xs font-semibold text-zinc-400 uppercase tracking-tight">GASTOS DE PERSONAL Y PRESTACIONES</td>
                    <td class="py-4 px-8 text-right text-xs font-bold text-zinc-300">$ 320.000,00</td>
                    <td class="py-4 px-8 text-right text-[10px] font-bold text-zinc-600">7.2%</td>
                </tr>
                <tr class="hover:bg-zinc-800/20 transition-colors">
                    <td class="py-4 px-8 text-xs font-mono text-zinc-500">6.1.05.00</td>
                    <td class="py-4 px-8 text-xs font-semibold text-zinc-400 uppercase tracking-tight">MANTENIMIENTO DE PLANTA E INDUSTRIAL</td>
                    <td class="py-4 px-8 text-right text-xs font-bold text-zinc-300">$ 85.000,00</td>
                    <td class="py-4 px-8 text-right text-[10px] font-bold text-zinc-600">1.9%</td>
                </tr>
                <tr class="hover:bg-zinc-800/20 transition-colors">
                    <td class="py-4 px-8 text-xs font-mono text-zinc-500">6.1.08.00</td>
                    <td class="py-4 px-8 text-xs font-semibold text-zinc-400 uppercase tracking-tight">PUBLICIDAD Y LOGÍSTICA DE DISTRIBUCIÓN</td>
                    <td class="py-4 px-8 text-right text-xs font-bold text-zinc-300">$ 95.500,00</td>
                    <td class="py-4 px-8 text-right text-[10px] font-bold text-zinc-600">2.1%</td>
                </tr>
                <!-- TOTAL BEFORE TAX -->
                <tr class="bg-zinc-900 border-t border-zinc-800">
                    <td class="py-6 px-8 text-sm font-black text-zinc-50 uppercase tracking-widest" colspan="2">UTILIDAD ANTES DE IMPUESTOS</td>
                    <td class="py-6 px-8 text-right text-lg font-black text-zinc-100">$ 952.390,00</td>
                    <td class="py-6 px-8 text-right text-xs font-bold text-zinc-500">21.5%</td>
                </tr>
                <!-- TAX SECTION -->
                <tr class="bg-zinc-800/10">
                    <td class="py-4 px-8 text-xs font-mono text-amber-600">8.1.01.01</td>
                    <td class="py-4 px-8 text-xs font-semibold text-zinc-400 uppercase tracking-tight italic">PROVISIÓN IMPUESTO SOBRE LA RENTA (34%)</td>
                    <td class="py-4 px-8 text-right text-xs font-bold text-red-500">($ 323.812,78)</td>
                    <td class="py-4 px-8 text-right text-[10px] font-bold text-zinc-600">--</td>
                </tr>
                <!-- FINAL NET -->
                <tr class="bg-amber-500">
                    <td class="py-8 px-8 text-base font-black text-amber-950 uppercase tracking-[0.2em]" colspan="2">UTILIDAD NETA DEL EJERCICIO</td>
                    <td class="py-8 px-8 text-right text-2xl font-black text-amber-950">$ 628.577,22</td>
                    <td class="py-8 px-8 text-right text-xs font-black text-amber-900">14.2%</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Technical Disclaimers -->
    <div class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-12">
        <div class="p-8 border border-zinc-800/50 bg-zinc-900/20 rounded-lg">
            <h4 class="text-[10px] font-black text-zinc-500 uppercase tracking-[0.3em] mb-4 flex items-center gap-2">
                <span class="material-symbols-outlined text-xs">analytics</span>
                NOTAS COMPLEMENTARIAS
            </h4>
            <p class="text-xs text-zinc-500 leading-relaxed font-body">
                Este reporte ha sido generado bajo los estándares internacionales de información financiera (NIIF). El costo de ventas incluye los ajustes por desvalorización de inventarios obsoletos según las políticas internas de gestión de almacén. Los gastos operativos han sido prorrateados en base al consumo directo por departamento.
            </p>
        </div>
        <div class="flex flex-col justify-end items-end gap-2 px-8">
            <div class="w-48 h-px bg-zinc-800"></div>
            <p class="text-[10px] font-black text-zinc-500 uppercase tracking-widest">DEPARTAMENTO DE FINANZAS</p>
            <p class="text-[10px] font-medium text-zinc-600 uppercase tracking-tighter leading-none">Generado automáticamente: 24 MAY 2024 - 14:35 UTC</p>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('erp/js/estado-resultados.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const main = document.querySelector('main');
            if(main) {
                main.classList.remove('bg-background', 'bg-stone-50');
                main.classList.add('bg-zinc-950');
            }
        });
    </script>
@endpush
