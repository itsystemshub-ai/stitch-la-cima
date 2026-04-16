@extends('erp.layouts.app')

@section('title', 'Reporte de Ganancias Mensuales')

@section('breadcrumb')
    <a href="{{ route('erp.ventas.index') }}" class="text-stone-500 hover:text-stone-900 transition-colors">Ventas</a>
    <span class="mx-2 text-stone-300">/</span>
    <span class="text-stone-900">Reporte de Ganancias</span>
@endsection

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6 mb-10">
        <div>
            <p class="text-[10px] font-black text-primary uppercase tracking-[0.3em] mb-2">Inteligencia Financiera</p>
            <h2 class="text-4xl font-headline font-black text-stone-950 tracking-tight leading-none italic uppercase">
                Análisis de Ganancias <span class="text-stone-400 not-italic">| {{ now()->translatedFormat('F Y') }}</span>
            </h2>
            <p class="text-stone-500 text-sm mt-3 font-medium">Cálculo en tiempo real basado en el Margen Bruto (Venta - Costo).</p>
        </div>
        <div class="flex gap-2">
            <button onclick="window.print()" class="bg-white border border-stone-200 px-6 py-3 rounded-xl font-black text-[10px] uppercase tracking-widest hover:bg-stone-50 transition-all flex items-center gap-2">
                <span class="material-symbols-outlined text-sm">print</span> Exportar PDF
            </button>
            <a href="{{ route('erp.ventas.reportes') }}" class="bg-stone-950 text-white px-6 py-3 rounded-xl font-black text-[10px] uppercase tracking-widest hover:bg-stone-800 transition-all flex items-center gap-2">
                <span class="material-symbols-outlined text-sm">analytics</span> Reportes de Ventas
            </a>
        </div>
    </div>

    <!-- Summary Widgets -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
        <!-- Ingresos Brutos -->
        <div class="bg-white border border-stone-200 rounded-2xl p-8 relative overflow-hidden group hover:shadow-2xl hover:shadow-stone-200 transition-all duration-500">
            <div class="absolute right-0 top-0 p-4 opacity-5 group-hover:opacity-10 transition-opacity">
                <span class="material-symbols-outlined text-8xl">account_balance_wallet</span>
            </div>
            <p class="text-[10px] font-black text-stone-400 uppercase tracking-widest mb-4">Ingresos Totales (Brutos)</p>
            <h3 class="text-4xl font-headline font-black text-stone-950 mb-2">${{ number_format($reporte->ingresos_brutos, 2) }}</h3>
            <div class="flex items-center gap-2 text-green-600 font-black text-[10px] uppercase">
                <span class="material-symbols-outlined text-sm">trending_up</span> Basado en {{ $reporte->total_ventas }} ventas
            </div>
        </div>

        <!-- Costo CMV -->
        <div class="bg-white border border-stone-200 rounded-2xl p-8 relative overflow-hidden group hover:shadow-2xl hover:shadow-stone-200 transition-all duration-500">
            <div class="absolute right-0 top-0 p-4 opacity-5 group-hover:opacity-10 transition-opacity">
                <span class="material-symbols-outlined text-8xl">shopping_bag</span>
            </div>
            <p class="text-[10px] font-black text-stone-400 uppercase tracking-widest mb-4">Costo de Mercancía (CMV)</p>
            <h3 class="text-4xl font-headline font-black text-stone-950 mb-2">${{ number_format($reporte->total_costo, 2) }}</h3>
            <p class="text-[10px] font-bold text-stone-400 uppercase tracking-widest italic">Repuestos retirados de bodega</p>
        </div>

        <!-- Ganancia Neta -->
        <div class="bg-primary shadow-2xl shadow-primary/20 rounded-2xl p-8 relative overflow-hidden group hover:brightness-105 transition-all duration-500">
            <div class="absolute right-0 top-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                <span class="material-symbols-outlined text-8xl">monetization_on</span>
            </div>
            <p class="text-[10px] font-black text-stone-900 uppercase tracking-widest mb-4">Ganancia Bruta Real</p>
            <h3 class="text-4xl font-headline font-black text-stone-950 mb-2">${{ number_format($reporte->ganancia_neta, 2) }}</h3>
            <div class="flex items-center gap-2 text-stone-900 font-black text-xs uppercase tracking-tighter">
                Margen: {{ $reporte->ingresos_brutos > 0 ? number_format(($reporte->ganancia_neta / $reporte->ingresos_brutos) * 100, 1) : 0 }}% sobre ventas
            </div>
        </div>
    </div>

    <!-- Main Content Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-1 gap-6">
        <!-- Chart Section -->
        <div class="bg-white border border-stone-200 rounded-2xl p-8 shadow-sm">
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h4 class="text-lg font-headline font-black text-stone-950 uppercase italic tracking-tight">Curva de Rendimiento Diario</h4>
                    <p class="text-[10px] font-bold text-stone-400 uppercase tracking-widest mt-1 italic">Fluctuación de ingresos recaudados en el mes</p>
                </div>
                <div class="flex gap-2">
                    <span class="flex items-center gap-2 text-[10px] font-black text-primary bg-stone-900 px-3 py-1 rounded-full uppercase tracking-widest animate-pulse">
                        <span class="w-2 h-2 bg-primary rounded-full"></span> Live Analysis
                    </span>
                </div>
            </div>
            <div id="earningsTrendChart" class="w-full h-80"></div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const categories = {!! json_encode($ventasGrafico->pluck('fecha')->map(fn($f) => date('d M', strtotime($f)))) !!};
        const data = {!! json_encode($ventasGrafico->pluck('total')) !!};

        const options = {
            series: [{
                name: 'Ventas Diarias',
                data: data
            }],
            chart: {
                height: 350,
                type: 'bar',
                toolbar: { show: false },
                fontFamily: 'Inter, sans-serif'
            },
            plotOptions: {
                bar: {
                    borderRadius: 10,
                    columnWidth: '40%',
                    distributed: true,
                    dataLabels: { position: 'top' }
                }
            },
            colors: ['#ceff5e', '#a3e635', '#84cc16', '#65a30d', '#4d7c0f', '#3f6212', '#365314'],
            dataLabels: {
                enabled: true,
                formatter: function (val) { return "$" + val.toFixed(0); },
                offsetY: -20,
                style: { fontSize: '10px', colors: ["#304758"], fontWeight: '900' }
            },
            grid: {
                borderColor: '#f1f5f9',
                strokeDashArray: 4,
                yaxis: { lines: { show: true } }
            },
            xaxis: {
                categories: categories,
                position: 'bottom',
                axisBorder: { show: false },
                axisTicks: { show: false },
                labels: { style: { colors: '#94a3b8', fontWeight: 700, fontSize: '10px' } }
            },
            yaxis: {
                axisBorder: { show: false },
                axisTicks: { show: false },
                labels: {
                    show: true,
                    formatter: function (val) { return "$" + val; },
                    style: { colors: '#94a3b8', fontWeight: 700 }
                }
            },
            tooltip: { theme: 'dark' }
        };

        const chart = new ApexCharts(document.querySelector("#earningsTrendChart"), options);
        chart.render();
    });
</script>
@endpush
@endsection
