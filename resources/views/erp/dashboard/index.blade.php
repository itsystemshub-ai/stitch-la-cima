@extends('erp.layouts.app')

@section('title', 'Dashboard Principal')

@section('breadcrumb')
    <span class="text-stone-900">Dashboard Central</span>
@endsection

@section('content')
  <!-- Header Dashboard -->
  <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4 mb-8">
    <div>
      <p class="text-[12px] font-black text-stone-400 tracking-[0.3em] uppercase mb-1 italic">Resumen Operativo Central</p>
      <h2 class="text-4xl font-headline font-black text-stone-900 tracking-tighter leading-none italic uppercase">MAYOR DE REPUESTO <span class="text-stone-400 italic">LA CIMA, C.A.</span></h2>
      <p class="text-stone-500 text-[12px] mt-1 uppercase font-black tracking-tight italic">RIF: J-40308741-5 • VALENCIA, VENEZUELA • PROTOCOLO ACTIVADO</p>
    </div>
    <div class="flex gap-3">
      <a href="{{ url('/sync') }}" class="bg-white border border-stone-200 px-4 py-2 rounded-lg flex items-center gap-2 hover:border-primary transition-all group shadow-sm">
        <span class="material-symbols-outlined text-stone-400 group-hover:text-primary transition-colors text-[14px]">sync</span>
        <span class="text-[10px] font-black text-stone-400 group-hover:text-stone-900 uppercase tracking-widest">Sincronizar Legacy</span>
      </a>
      <div class="bg-white border border-stone-200 px-6 py-2 rounded-[15px] shadow-sm">
        <span class="text-[9px] font-black text-stone-400 uppercase tracking-[0.3em]">Uptime Operativo</span>
        <p class="text-xl font-headline font-black text-stone-900 italic leading-none mt-1">99.9%</p>
      </div>
      <div class="bg-primary px-6 py-2 rounded-[15px] text-stone-950 shadow-xl shadow-primary/20">
        <span class="text-[9px] font-black uppercase tracking-[0.3em]">Estatus Global</span>
        <p class="text-xl font-headline font-black uppercase italic leading-none mt-1">ÓPTIMO</p>
      </div>
    </div>
  </div>

  <!-- Tarjetas de Resumen Modulares (GridStack) -->
  <div class="grid-stack mb-10" id="tour-dashboard">
    <div class="grid-stack-item" gs-w="3" gs-h="2">
      <div class="grid-stack-item-content">
        <a href="{{ url('/erp/inventario') }}" class="bg-white border border-stone-200 rounded-[28px] p-8 hover:shadow-2xl hover:border-primary transition-all group block h-full shadow-sm relative overflow-hidden">
          <div class="flex items-center justify-between mb-4 relative z-10">
            <div class="w-12 h-12 bg-stone-50 rounded-2xl flex items-center justify-center group-hover:bg-stone-950 transition-colors shadow-inner"><span class="material-symbols-outlined text-blue-600 group-hover:text-primary text-2xl font-black">inventory_2</span></div>
            <span class="text-[10px] font-black text-green-600 bg-green-50 px-3 py-1 rounded-full uppercase tracking-widest">+12% SIGMA</span>
          </div>
          <p class="text-4xl font-headline font-black text-stone-950 italic tracking-tighter relative z-10" id="stockCount">{{ number_format($stats['stock_total'], 0) }}</p>
          <p class="text-[12px] text-stone-400 mt-2 uppercase font-black tracking-[0.2em] relative z-10 italic">Productos en Stock</p>
          <span class="material-symbols-outlined absolute right-[-10px] bottom-[-10px] text-stone-50 text-[100px] z-0 opacity-0 group-hover:opacity-100 transition-opacity">inventory</span>
        </a>
      </div>
    </div>
    
    <div class="grid-stack-item" gs-w="3" gs-h="2">
      <div class="grid-stack-item-content">
        <a href="{{ url('/erp/ventas') }}" class="bg-white border border-stone-200 rounded-[28px] p-8 hover:shadow-2xl hover:border-primary transition-all group block h-full shadow-sm relative overflow-hidden">
          <div class="flex items-center justify-between mb-4 relative z-10">
            <div class="w-12 h-12 bg-stone-50 rounded-2xl flex items-center justify-center group-hover:bg-stone-950 transition-colors shadow-inner"><span class="material-symbols-outlined text-green-600 group-hover:text-primary text-2xl font-black">payments</span></div>
            <span class="text-[10px] font-black text-green-600 bg-green-50 px-3 py-1 rounded-full uppercase tracking-widest">+8.2% ROI</span>
          </div>
          <p class="text-4xl font-headline font-black text-stone-950 italic tracking-tighter relative z-10" id="salesAmount">${{ number_format($stats['ingresos_mes'], 2) }}</p>
          <p class="text-[12px] text-stone-400 mt-2 uppercase font-black tracking-[0.2em] relative z-10 italic">Ingresos del Mes</p>
          <span class="material-symbols-outlined absolute right-[-10px] bottom-[-10px] text-stone-50 text-[100px] z-0 opacity-0 group-hover:opacity-100 transition-opacity">trending_up</span>
        </a>
      </div>
    </div>

    <div class="grid-stack-item" gs-w="3" gs-h="2">
      <div class="grid-stack-item-content">
        <a href="{{ url('/erp/compras') }}" class="bg-white border border-stone-200 rounded-[28px] p-8 hover:shadow-2xl hover:border-primary transition-all group block h-full shadow-sm relative overflow-hidden">
          <div class="flex items-center justify-between mb-4 relative z-10">
            <div class="w-12 h-12 bg-stone-50 rounded-2xl flex items-center justify-center group-hover:bg-stone-950 transition-colors shadow-inner"><span class="material-symbols-outlined text-purple-600 group-hover:text-primary text-2xl font-black">shopping_cart</span></div>
            <span class="text-[10px] font-black text-stone-400 bg-stone-50 px-3 py-1 rounded-full uppercase tracking-widest">3 ACTIVAS</span>
          </div>
          <p class="text-4xl font-headline font-black text-stone-950 italic tracking-tighter relative z-10" id="pendingPurchases">{{ $stats['ordenes_pendientes'] }}</p>
          <p class="text-[12px] text-stone-400 mt-2 uppercase font-black tracking-[0.2em] relative z-10 italic">Órdenes a Procesar</p>
          <span class="material-symbols-outlined absolute right-[-10px] bottom-[-10px] text-stone-50 text-[100px] z-0 opacity-0 group-hover:opacity-100 transition-opacity">shopping_basket</span>
        </a>
      </div>
    </div>

    <div class="grid-stack-item" gs-w="3" gs-h="2">
      <div class="grid-stack-item-content">
        <a href="{{ url('/erp/ventas/clientes') }}" class="bg-white border border-stone-200 rounded-[28px] p-8 hover:shadow-2xl hover:border-primary transition-all group block h-full shadow-sm relative overflow-hidden">
          <div class="flex items-center justify-between mb-4 relative z-10">
            <div class="w-12 h-12 bg-stone-50 rounded-2xl flex items-center justify-center group-hover:bg-stone-950 transition-colors shadow-inner"><span class="material-symbols-outlined text-orange-600 group-hover:text-primary text-2xl font-black">people</span></div>
            <span class="text-[10px] font-black text-green-600 bg-green-50 px-3 py-1 rounded-full uppercase tracking-widest">+5 NUEVOS</span>
          </div>
          <p class="text-4xl font-headline font-black text-stone-950 italic tracking-tighter relative z-10" id="customerCount">{{ $stats['clientes_activos'] }}</p>
          <p class="text-[12px] text-stone-400 mt-2 uppercase font-black tracking-[0.2em] relative z-10 italic">Clientes Activos</p>
          <span class="material-symbols-outlined absolute right-[-10px] bottom-[-10px] text-stone-50 text-[100px] z-0 opacity-0 group-hover:opacity-100 transition-opacity">group</span>
        </a>
      </div>
    </div>
  </div>

  <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
    <div class="lg:col-span-2 bg-white border border-stone-200 rounded-[32px] p-10 shadow-sm relative overflow-hidden">
      <div class="flex justify-between items-center mb-10 relative z-10">
        <div class="flex items-center gap-6">
          <div class="w-14 h-14 bg-stone-950 rounded-2xl flex items-center justify-center text-primary shadow-xl"><span class="material-symbols-outlined text-3xl font-black">analytics</span></div>
          <div><h3 class="text-2xl font-headline font-black text-stone-900 uppercase italic tracking-tighter leading-none">Tendencias Operativas</h3><p class="text-[12px] text-stone-400 font-black uppercase tracking-[0.3em] mt-1">Análisis de Flujo de Stock SIGMA</p></div>
        </div>
        <a href="{{ url('/erp/inventario') }}" class="px-6 py-3 bg-stone-50 text-[10px] font-black uppercase text-stone-400 hover:text-stone-950 flex items-center gap-2 transition-all rounded-xl border border-transparent hover:border-stone-200 italic tracking-widest">Informes Completos <span class="material-symbols-outlined text-sm">arrow_forward</span></a>
      </div>
      <div class="grid grid-cols-3 gap-8 mb-10 relative z-10">
        <div class="bg-stone-50 p-6 rounded-2xl border border-stone-100 flex flex-col justify-between h-32">
            <p class="text-[10px] font-black text-stone-400 uppercase tracking-widest leading-none mb-2">Stock Central</p>
            <p class="text-3xl font-headline font-black text-stone-950 italic leading-none">{{ number_format($stats['stock_total'], 0) }}</p>
            <div class="w-full bg-stone-200 h-1 rounded-full mt-4 overflow-hidden"><div class="bg-green-500 h-full w-[85%]"></div></div>
        </div>
        <div class="bg-red-50/50 p-6 rounded-2xl border border-red-100 flex flex-col justify-between h-32">
            <p class="text-[10px] font-black text-red-400 uppercase tracking-widest leading-none mb-2">Vulnerabilidades</p>
            <p class="text-3xl font-headline font-black text-red-500 italic leading-none">{{ $stats['stock_risks'] }}</p>
            <div class="w-full bg-red-100 h-1 rounded-full mt-4 overflow-hidden"><div class="bg-red-500 h-full w-[40%] animate-pulse"></div></div>
        </div>
        <div class="bg-stone-50 p-6 rounded-2xl border border-stone-100 flex flex-col justify-between h-32">
            <p class="text-[10px] font-black text-stone-400 uppercase tracking-widest leading-none mb-2">Validaciones</p>
            <p class="text-3xl font-headline font-black text-stone-950 italic leading-none">{{ $stats['aprobaciones_count'] }}</p>
            <div class="w-full bg-stone-200 h-1 rounded-full mt-4 overflow-hidden"><div class="bg-primary h-full w-[60%]"></div></div>
        </div>
      </div>
      <div id="salesTrendChart" class="w-full -ml-3"></div>
    </div>

    <div class="bg-stone-950 text-white rounded-[40px] p-10 relative overflow-hidden shadow-2xl">
        <div class="absolute right-[-40px] top-[-40px] opacity-[0.05]">
            <span class="material-symbols-outlined text-[300px]">payments</span>
        </div>
      <div class="relative z-10 mb-10">
          <div class="flex items-center gap-2 mb-2">
              <span class="w-8 h-[2px] bg-primary"></span>
              <p class="text-[10px] font-black text-primary uppercase tracking-[0.4em] italic">Consolidado Bancario Mensual</p>
          </div>
          <h3 class="text-5xl font-headline font-black text-white tracking-tighter italic leading-none">${{ number_format($stats['ingresos_mes'], 2) }}</h3>
          <p class="text-[11px] text-stone-500 font-black uppercase tracking-widest mt-4">Transacciones Liquidadas • 100% OK</p>
      </div>

      <div class="space-y-4 mb-10 relative z-10">
        @foreach($recentOrders as $order)
        <div class="flex items-center justify-between bg-white/5 backdrop-blur-xl rounded-2xl p-5 border border-white/10 hover:bg-white/10 transition-all cursor-pointer group">
            <div>
                <p class="text-[10px] font-black text-stone-500 group-hover:text-primary transition-colors uppercase mb-1 tracking-widest font-mono">{{ $order->numero_orden }}</p>
                <p class="text-[12px] font-black uppercase italic tracking-tight text-white/90 truncate max-w-[150px]">{{ $order->customer->razon_social ?? 'Cliente General' }}</p>
            </div>
            <div class="text-right">
                <span class="font-headline font-black text-primary text-xl leading-none italic">${{ number_format($order->total, 2) }}</span>
                <p class="text-[9px] font-black text-stone-600 uppercase tracking-tight mt-1">{{ $order->created_at->diffForHumans() }}</p>
            </div>
        </div>
        @endforeach
      </div>

      <a href="{{ url('/erp/ventas') }}" class="group block bg-primary text-stone-950 py-5 font-black text-[11px] uppercase tracking-[0.4em] rounded-[20px] hover:bg-white transition-all text-center shadow-2xl shadow-primary/20 relative z-10 mb-8 italic">
          AUDITAR FLUJO DE CAJA
          <span class="material-symbols-outlined text-sm ml-2 group-hover:translate-x-2 transition-transform">arrow_forward</span>
      </a>

      @if($stats['categoria_mix']->count() > 0)
      <div class="mt-8 pt-10 border-t border-white/5 relative z-10">
        <p class="text-[10px] font-black text-stone-500 uppercase tracking-[0.3em] mb-6 italic">Mix Operativo de Activos</p>
        <div class="space-y-6">
          @foreach($stats['categoria_mix'] as $mix)
          <div class="flex items-center justify-between text-[11px] mb-2">
            <span class="text-stone-400 font-black uppercase tracking-tight italic">{{ $mix->categoria }}</span>
            <span class="text-white font-black font-mono tracking-tighter">{{ $mix->total }} UNITS.</span>
          </div>
          <div class="w-full bg-white/5 h-1.5 rounded-full overflow-hidden">
            <div class="bg-primary h-full rounded-full transition-all duration-1000" style="width: {{ min(100, $mix->total * 10) }}%"></div>
          </div>
          @endforeach
        </div>
      </div>
      @endif
    </div>
  </div>
/div>

  <!-- Industrial Design System Reference (Oculto/Técnico) -->
  <div class="mt-12 pt-8 border-t border-stone-100 opacity-40 hover:opacity-100 transition-opacity">
    <div class="flex items-center gap-3 mb-6">
        <span class="w-8 h-[1px] bg-stone-300"></span>
        <p class="text-[9px] font-black text-stone-400 uppercase tracking-[0.4em]">Protocolo de Diseño Zenith Gold</p>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
        <div>
            <p class="text-[8px] font-black text-stone-500 uppercase mb-2">Tipografía Core</p>
            <div class="space-y-1">
                <div class="flex justify-between text-[10px] font-bold uppercase"><span>H1 Giga</span> <span class="text-stone-300">48px+</span></div>
                <div class="flex justify-between text-[10px] font-bold uppercase"><span>Sub-menus</span> <span class="text-stone-300">11.5px</span></div>
                <div class="flex justify-between text-[10px] font-bold uppercase"><span>Data Base</span> <span class="text-stone-300">12px</span></div>
            </div>
        </div>
        <div>
            <p class="text-[8px] font-black text-stone-500 uppercase mb-2">Paleta Técnica</p>
            <div class="flex gap-2">
                <div class="w-4 h-4 rounded bg-primary border border-stone-200" title="Zenith High-Vis"></div>
                <div class="w-4 h-4 rounded bg-stone-900" title="Deep Stone"></div>
                <div class="w-4 h-4 rounded bg-[#f8fafc]" title="Cloud Surface"></div>
            </div>
        </div>
        <div class="col-span-2">
            <p class="text-[8px] font-black text-stone-500 uppercase mb-2">Estatus del Repositorio</p>
            <p class="text-[10px] text-stone-400 leading-tight">Sistema optimizado bajo arquitectura modular. Tablas estandarizadas a 12px con renderizado OCR-Style para máxima precisión contable e industrial.</p>
        </div>
    </div>
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
