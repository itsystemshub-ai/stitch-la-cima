@extends('erp.layouts.app')

@section('title', 'Dashboard Vendedor')

@section('content')
<div class="space-y-6">
    <!-- Header de Bienvenida -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 bg-white p-8 rounded-2xl border border-stone-200 shadow-sm">
        <div>
            <h1 class="text-2xl font-black text-stone-900 uppercase tracking-tight">Bienvenido, <span class="text-primary-dark">{{ auth()->user()->name }}</span></h1>
            <p class="text-[12px] font-bold text-stone-400 uppercase tracking-widest mt-1">Panel de Control de Ventas • {{ now()->format('d M, Y') }}</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('erp.vendedor.pos') }}" class="bg-stone-900 text-primary px-6 py-3 rounded-xl text-[11px] font-black uppercase tracking-widest hover:bg-stone-800 transition-all shadow-lg flex items-center gap-2">
                <span class="material-symbols-outlined text-lg">add_shopping_cart</span>
                Nuevo Pedido
            </a>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Venta Mensual -->
        <div class="bg-white p-6 rounded-2xl border border-stone-200 shadow-sm hover:border-primary/50 transition-all group">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-stone-50 rounded-xl flex items-center justify-center text-stone-400 group-hover:bg-primary group-hover:text-stone-900 transition-all">
                    <span class="material-symbols-outlined">payments</span>
                </div>
                <span class="text-[10px] font-black text-green-500 bg-green-50 px-2 py-1 rounded-lg">+12.5%</span>
            </div>
            <p class="text-[10px] font-black text-stone-400 uppercase tracking-widest">Ventas del Mes</p>
            <h3 class="text-2xl font-black text-stone-900 mt-1">${{ number_format($stats['ventas_mes'], 2) }}</h3>
        </div>

        <!-- Pedidos Hoy -->
        <div class="bg-white p-6 rounded-2xl border border-stone-200 shadow-sm hover:border-primary/50 transition-all group">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-stone-50 rounded-xl flex items-center justify-center text-stone-400 group-hover:bg-primary group-hover:text-stone-900 transition-all">
                    <span class="material-symbols-outlined">list_alt</span>
                </div>
                <span class="text-[10px] font-black text-primary-dark bg-primary/10 px-2 py-1 rounded-lg">Hoy</span>
            </div>
            <p class="text-[10px] font-black text-stone-400 uppercase tracking-widest">Pedidos Hoy</p>
            <h3 class="text-2xl font-black text-stone-900 mt-1">{{ $stats['pedidos_hoy'] }}</h3>
        </div>

        <!-- Clientes Activos -->
        <div class="bg-white p-6 rounded-2xl border border-stone-200 shadow-sm hover:border-primary/50 transition-all group">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-stone-50 rounded-xl flex items-center justify-center text-stone-400 group-hover:bg-primary group-hover:text-stone-900 transition-all">
                    <span class="material-symbols-outlined">groups</span>
                </div>
            </div>
            <p class="text-[10px] font-black text-stone-400 uppercase tracking-widest">Clientes Activos</p>
            <h3 class="text-2xl font-black text-stone-900 mt-1">{{ $stats['clientes_activos'] }}</h3>
        </div>

        <!-- Comisión Acumulada -->
        <div class="bg-primary p-6 rounded-2xl border border-primary-dark/10 shadow-lg group">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-white/30 rounded-xl flex items-center justify-center text-stone-900">
                    <span class="material-symbols-outlined">account_balance_wallet</span>
                </div>
            </div>
            <p class="text-[10px] font-black text-stone-900/60 uppercase tracking-widest">Comisión Estimada</p>
            <h3 class="text-2xl font-black text-stone-900 mt-1">${{ number_format($stats['comision_acumulada'], 2) }}</h3>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Gráfico de Ventas Semanal -->
        <div class="lg:col-span-2 bg-white p-8 rounded-2xl border border-stone-200 shadow-sm">
            <div class="flex items-center justify-between mb-8">
                <h3 class="text-[14px] font-black text-stone-900 uppercase tracking-tight">Rendimiento Semanal</h3>
                <select class="bg-stone-50 border border-stone-200 text-[10px] font-black uppercase p-2 rounded-lg outline-none">
                    <option>Últimos 7 días</option>
                    <option>Últimos 30 días</option>
                </select>
            </div>
            <div id="salesChart" class="w-full h-64"></div>
        </div>

        <!-- Alertas y Notificaciones -->
        <div class="bg-white p-8 rounded-2xl border border-stone-200 shadow-sm">
            <h3 class="text-[14px] font-black text-stone-900 uppercase tracking-tight mb-6">Alertas Proactivas</h3>
            <div class="space-y-4">
                <div class="flex items-start gap-4 p-4 bg-orange-50 rounded-xl border border-orange-100">
                    <span class="material-symbols-outlined text-orange-500 mt-0.5">warning</span>
                    <div>
                        <p class="text-[11px] font-bold text-stone-900 uppercase">Stock Bajo: Repuestos ABC</p>
                        <p class="text-[10px] text-stone-500 mt-1">Solo quedan 5 unidades en almacén.</p>
                    </div>
                </div>
                <div class="flex items-start gap-4 p-4 bg-blue-50 rounded-xl border border-blue-100">
                    <span class="material-symbols-outlined text-blue-500 mt-0.5">info</span>
                    <div>
                        <p class="text-[11px] font-bold text-stone-900 uppercase">Nuevo Cliente Asignado</p>
                        <p class="text-[10px] text-stone-500 mt-1">Inversiones GHI ha sido vinculado a tu ruta.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    var options = {
        series: [{
            name: 'Ventas',
            data: [31, 40, 28, 51, 42, 109, 100]
        }],
        chart: {
            height: 250,
            type: 'area',
            toolbar: { show: false },
            fontFamily: 'Inter, sans-serif'
        },
        colors: ['#ceff5e'],
        dataLabels: { enabled: false },
        stroke: { curve: 'smooth', width: 3 },
        xaxis: {
            categories: ["Lun", "Mar", "Mie", "Jue", "Vie", "Sab", "Dom"],
            labels: { style: { colors: '#a8a29e', fontSize: '10px', fontWeight: 600 } }
        },
        yaxis: {
            labels: { style: { colors: '#a8a29e', fontSize: '10px', fontWeight: 600 } }
        },
        grid: { borderColor: '#f5f5f4' },
        fill: {
            type: 'gradient',
            gradient: { shadeIntensity: 1, opacityFrom: 0.7, opacityTo: 0.1 }
        }
    };

    var chart = new ApexCharts(document.querySelector("#salesChart"), options);
    chart.render();
</script>
@endpush
@endsection