@extends('erp.layouts.app')

@section('title', 'Dashboard Principal')

@section('breadcrumb')
    <span class="text-stone-900">Dashboard Central</span>
@endsection

@section('content')
  <!-- Header Dashboard -->
  <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4 mb-6 border-b border-stone-200 pb-4">
    <div>
      <h2 class="text-xl font-headline font-black text-stone-900 tracking-tighter leading-none italic uppercase">MAYOR DE REPUESTO <span class="text-stone-500">LA CIMA, C.A.</span></h2>
      <p class="text-stone-500 text-[11px] mt-1.5 uppercase font-black tracking-tight flex items-center gap-2">
        <span class="w-1.5 h-1.5 rounded-full bg-primary shadow-[0_0_5px_#ceff5e]"></span>
        RIF: J-40308741-5 • RESUMEN OPERATIVO CENTRAL
      </p>
    </div>
    <div class="flex gap-2">
      <a href="{{ url('/sync') }}" class="bg-white border border-stone-200 px-3 py-1.5 rounded-lg flex items-center gap-1.5 hover:border-primary transition-all shadow-sm">
        <span class="material-symbols-outlined text-stone-400 text-[14px]">sync</span>
        <span class="text-[10px] font-black text-stone-600 uppercase tracking-widest">Sincronizar Legacy</span>
      </a>
      <div class="bg-white border border-stone-200 px-4 py-1.5 rounded-lg shadow-sm flex items-center gap-3">
        <div>
          <span class="text-[9px] font-black text-stone-400 uppercase tracking-widest block leading-none">Uptime</span>
          <p class="text-sm font-headline font-black text-stone-900 leading-none">99.9%</p>
        </div>
      </div>
      <div class="bg-primary px-4 py-1.5 rounded-lg text-stone-950 flex items-center gap-3">
         <div>
          <span class="text-[9px] font-black text-stone-900/60 uppercase tracking-widest block leading-none">Global</span>
          <p class="text-sm font-headline font-black uppercase leading-none">ÓPTIMO</p>
         </div>
      </div>
    </div>
  </div>

  <!-- Tarjetas de Resumen KPI (Densidad Industrial) -->
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6" id="tour-dashboard">
    <a href="{{ url('/erp/inventario') }}" class="bg-white border border-stone-200 rounded-xl p-5 hover:border-primary transition-all group shadow-sm flex flex-col justify-between h-28">
      <div class="flex justify-between items-start">
        <div>
          <p class="text-[10px] font-black text-stone-500 uppercase tracking-widest leading-none mb-1">Stock General</p>
          <p class="text-2xl font-mono font-black text-stone-900 tracking-tighter" id="stockCount">{{ number_format($stats['stock_total'], 0) }}</p>
        </div>
        <div class="w-8 h-8 rounded-lg bg-stone-50 border border-stone-100 flex items-center justify-center group-hover:bg-primary group-hover:border-primary transition-all">
          <span class="material-symbols-outlined text-stone-400 group-hover:text-stone-950 text-sm">inventory_2</span>
        </div>
      </div>
      <span class="text-[9px] font-bold text-green-600 bg-green-50 px-2 py-0.5 rounded uppercase self-start">+12% COBERTURA</span>
    </a>
    
    <a href="{{ url('/erp/ventas') }}" class="bg-white border border-stone-200 rounded-xl p-5 hover:border-primary transition-all group shadow-sm flex flex-col justify-between h-28">
      <div class="flex justify-between items-start">
        <div>
          <p class="text-[10px] font-black text-stone-500 uppercase tracking-widest leading-none mb-1">Ingresos de Mes</p>
          <p class="text-2xl font-mono font-black text-stone-900 tracking-tighter" id="salesAmount">${{ number_format($stats['ingresos_mes'], 2) }}</p>
        </div>
        <div class="w-8 h-8 rounded-lg bg-stone-50 border border-stone-100 flex items-center justify-center group-hover:bg-primary group-hover:border-primary transition-all">
          <span class="material-symbols-outlined text-stone-400 group-hover:text-stone-950 text-sm">payments</span>
        </div>
      </div>
      <span class="text-[9px] font-bold text-green-600 bg-green-50 px-2 py-0.5 rounded uppercase self-start">+8.2% CRECIMIENTO</span>
    </a>

    <a href="{{ url('/erp/compras') }}" class="bg-white border border-stone-200 rounded-xl p-5 hover:border-primary transition-all group shadow-sm flex flex-col justify-between h-28">
      <div class="flex justify-between items-start">
        <div>
          <p class="text-[10px] font-black text-stone-500 uppercase tracking-widest leading-none mb-1">Órdenes Abiertas</p>
          <p class="text-2xl font-mono font-black text-stone-900 tracking-tighter" id="pendingPurchases">{{ $stats['ordenes_pendientes'] }}</p>
        </div>
        <div class="w-8 h-8 rounded-lg bg-stone-50 border border-stone-100 flex items-center justify-center group-hover:bg-primary group-hover:border-primary transition-all">
          <span class="material-symbols-outlined text-stone-400 group-hover:text-stone-950 text-sm">shopping_cart</span>
        </div>
      </div>
      <span class="text-[9px] font-bold text-stone-600 bg-stone-100 border border-stone-200 px-2 py-0.5 rounded uppercase self-start">EN TRÁNSITO</span>
    </a>

    <a href="{{ url('/erp/ventas/clientes') }}" class="bg-white border border-stone-200 rounded-xl p-5 hover:border-primary transition-all group shadow-sm flex flex-col justify-between h-28">
      <div class="flex justify-between items-start">
        <div>
          <p class="text-[10px] font-black text-stone-500 uppercase tracking-widest leading-none mb-1">Clientes Activos</p>
          <p class="text-2xl font-mono font-black text-stone-900 tracking-tighter" id="customerCount">{{ $stats['clientes_activos'] }}</p>
        </div>
        <div class="w-8 h-8 rounded-lg bg-stone-50 border border-stone-100 flex items-center justify-center group-hover:bg-primary group-hover:border-primary transition-all">
          <span class="material-symbols-outlined text-stone-400 group-hover:text-stone-950 text-sm">people</span>
        </div>
      </div>
      <span class="text-[9px] font-bold text-stone-600 bg-stone-100 border border-stone-200 px-2 py-0.5 rounded uppercase self-start">VER LISTADO</span>
    </a>
  </div>

  <!-- Contenido Secundario -->
  <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
    
    <!-- Gráfico y Trends -->
    <div class="lg:col-span-2 bg-white border border-stone-200 rounded-xl p-6 shadow-sm">
      <div class="flex justify-between items-center mb-6">
        <div>
            <h3 class="text-sm font-black text-stone-900 uppercase tracking-widest">Tendencias Operativas</h3>
            <p class="text-[10px] text-stone-400 font-bold uppercase tracking-widest">Análisis de Flujo de Stock & Ventas</p>
        </div>
        <a href="{{ url('/erp/inventario') }}" class="px-3 py-1.5 bg-stone-50 text-[9px] font-black uppercase text-stone-500 hover:text-stone-900 flex items-center gap-1 transition-all roundedborder border-stone-200 hover:bg-stone-100">Informes <span class="material-symbols-outlined text-[14px]">arrow_forward</span></a>
      </div>
      
      <div class="grid grid-cols-3 gap-4 mb-6">
        <div class="bg-stone-50 p-4 rounded-lg border border-stone-100 flex flex-col justify-between h-24">
            <p class="text-[9px] font-black text-stone-500 uppercase tracking-widest leading-none mb-1">Stock Central</p>
            <p class="text-lg font-mono font-black text-stone-900">{{ number_format($stats['stock_total'], 0) }}</p>
            <div class="w-full bg-stone-200 h-1 rounded-full mt-2 overflow-hidden"><div class="bg-green-500 h-full w-[85%]"></div></div>
        </div>
        <div class="bg-red-50/50 p-4 rounded-lg border border-red-100 flex flex-col justify-between h-24">
            <p class="text-[9px] font-black text-red-500 uppercase tracking-widest leading-none mb-1">Vulnerabilidades</p>
            <p class="text-lg font-mono font-black text-red-600">{{ $stats['stock_risks'] }}</p>
            <div class="w-full bg-red-100 h-1 rounded-full mt-2 overflow-hidden"><div class="bg-red-500 h-full w-[40%] animate-pulse"></div></div>
        </div>
        <div class="bg-stone-50 p-4 rounded-lg border border-stone-100 flex flex-col justify-between h-24">
            <p class="text-[9px] font-black text-stone-500 uppercase tracking-widest leading-none mb-1">Validaciones Pendientes</p>
            <p class="text-lg font-mono font-black text-stone-900">{{ $stats['aprobaciones_count'] }}</p>
            <div class="w-full bg-stone-200 h-1 rounded-full mt-2 overflow-hidden"><div class="bg-primary h-full w-[60%]"></div></div>
        </div>
      </div>
      
      <!-- Contenedor del Gráfico -->
      <div id="salesTrendChart" class="w-full h-[220px]"></div>
    </div>

    <!-- Consolidado y Transacciones -->
    <div class="bg-white border border-stone-200 rounded-xl p-6 shadow-sm flex flex-col">
      <div class="mb-6 flex flex-col justify-center items-center py-4 bg-stone-50 rounded-lg border border-stone-100">
          <p class="text-[9px] font-black text-stone-400 uppercase tracking-widest mb-1">Caja Mensual Acumulada</p>
          <h3 class="text-3xl font-mono font-black text-stone-900 tracking-tighter leading-none">${{ number_format($stats['ingresos_mes'], 2) }}</h3>
          <span class="bg-primary text-stone-950 text-[9px] font-black px-2 mt-3 rounded uppercase tracking-widest">100% Conciliado</span>
      </div>

      <p class="text-[10px] font-black text-stone-900 uppercase border-b border-stone-100 pb-2 mb-3">Últimos Movimientos</p>
      
      <div class="flex-1 space-y-2 overflow-y-auto pr-1">
        @forelse($recentOrders as $order)
        <div class="flex items-center justify-between p-2.5 hover:bg-stone-50 rounded bg-white border border-transparent hover:border-stone-100 transition-all cursor-pointer group">
            <div class="flex flex-col">
                <span class="text-[9px] font-bold text-stone-400 uppercase tracking-widest mb-0.5">{{ $order->numero_orden }}</span>
                <span class="text-[11px] font-black uppercase tracking-tight text-stone-800 truncate max-w-[140px]">{{ $order->customer->razon_social ?? 'Cliente General' }}</span>
            </div>
            <div class="text-right">
                <span class="font-mono font-black text-stone-900 text-[13px] group-hover:text-primary transition-colors">${{ number_format($order->total, 2) }}</span>
                <p class="text-[8px] font-bold text-stone-400 uppercase mt-0.5">{{ $order->created_at->diffForHumans() }}</p>
            </div>
        </div>
        @empty
            <p class="text-[11px] text-stone-500 uppercase text-center py-4">No hay órdenes recientes</p>
        @endforelse
      </div>

      @if($stats['categoria_mix']->count() > 0)
      <div class="mt-6 pt-4 border-t border-stone-100">
        <p class="text-[10px] font-black text-stone-900 uppercase border-b border-stone-100 pb-2 mb-3">Mix Inventario</p>
        <div class="space-y-3">
          @foreach($stats['categoria_mix'] as $mix)
          <div>
            <div class="flex justify-between text-[9px] font-black mb-1">
              <span class="text-stone-500 uppercase">{{ $mix->categoria }}</span>
              <span class="text-stone-900">{{ $mix->total }} Und.</span>
            </div>
            <div class="w-full bg-stone-100 h-1.5 rounded-full overflow-hidden">
              <div class="bg-stone-400 h-full rounded-full transition-all" style="width: {{ min(100, $mix->total * 10) }}%"></div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
      @endif

    </div>
  </div>

  <!-- Footer Compacto del Dashboard -->
  <div class="text-center pt-6 border-t border-stone-200">
    <p class="text-[9px] font-bold text-stone-400 uppercase tracking-[0.2em] flex justify-center items-center gap-4">
        <span>Arquitectura Modular Activada</span>
        <span class="w-1 h-1 bg-stone-300 rounded-full"></span>
        <span>UI Optimizado a 12px</span>
        <span class="w-1 h-1 bg-stone-300 rounded-full"></span>
        <span>Zenith Industrial Design</span>
    </p>
  </div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Notificaciones Iniciales
        setTimeout(() => {
            if (window.notify) window.notify('Sistema Zenith v6.0 Online', 'success');
        }, 1000);
        
        // Datos del gráfico pasados desde el backend
        const trendData = @json($trendData);
        
        const categories = trendData.map(item => item.date);
        const totals = trendData.map(item => item.total);

        // Configuración de ApexCharts
        const options = {
            series: [{
                name: 'Ventas Diarias',
                data: totals.length > 0 ? totals : [30, 40, 35, 50, 49, 60, 70, 91, 125]
            }],
            chart: {
                height: 300,
                type: 'area',
                toolbar: { show: false },
                zoom: { enabled: false },
                fontFamily: 'Inter, sans-serif'
            },
            colors: ['#ceff5e'],
            dataLabels: { enabled: false },
            stroke: { curve: 'smooth', width: 4 },
            fill: {
                type: 'gradient',
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.4,
                    opacityTo: 0.05,
                    stops: [0, 90, 100]
                }
            },
            xaxis: {
                categories: categories.length > 0 ? categories : ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
                axisBorder: { show: false },
                axisTicks: { show: false },
                labels: { style: { colors: '#a8a29e', fontWeight: 600 } }
            },
            yaxis: {
                labels: { 
                    formatter: (val) => `$${val.toLocaleString()}`,
                    style: { colors: '#a8a29e', fontWeight: 600 } 
                }
            },
            grid: {
                borderColor: '#f5f5f4',
                strokeDashArray: 4,
                padding: { left: 0, right: 0 }
            },
            tooltip: {
                theme: 'dark',
                x: { show: true },
                y: { formatter: (val) => `$${val.toFixed(2)}` }
            }
        };

        const chart = new ApexCharts(document.querySelector("#salesTrendChart"), options);
        chart.render();
    });
</script>
@endsection
