@extends('erp.layouts.app')

@section('title', 'Dashboard Principal')

@section('breadcrumb')
    <span class="text-stone-900">Dashboard Central</span>
@endsection

@section('content')
  <!-- Header Dashboard -->
  <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4 mb-8">
    <div>
      <p class="text-xs font-bold text-stone-400 tracking-[0.2em] uppercase mb-1">Resumen General</p>
      <h2 class="text-3xl font-headline font-black text-stone-900 tracking-tight leading-none">MAYOR DE REPUESTO LA CIMA, C.A.</h2>
      <p class="text-stone-500 text-sm mt-1 uppercase">RIF: J-40308741-5 • Valencia, Venezuela</p>
    </div>
    <div class="flex gap-3">
      <div class="bg-white border border-stone-200 px-4 py-2 rounded-lg">
        <span class="text-[10px] font-bold text-stone-400 uppercase">Uptime</span>
        <p class="text-xl font-headline font-bold text-stone-900">99.9%</p>
      </div>
      <div class="bg-primary px-4 py-2 rounded-lg text-stone-900 shadow-xl shadow-primary/20">
        <span class="text-[10px] font-bold uppercase">Estado</span>
        <p class="text-xl font-headline font-bold uppercase">ÓPTIMO</p>
      </div>
    </div>
  </div>

  <!-- Tarjetas de Resumen Modulares (GridStack) -->
  <div class="grid-stack mb-6" id="tour-dashboard">
    <div class="grid-stack-item" gs-w="3" gs-h="2">
      <div class="grid-stack-item-content">
        <a href="{{ url('/erp/inventario') }}" class="bg-white border border-stone-200 rounded-xl p-5 hover:shadow-lg transition-all group block h-full">
          <div class="flex items-center justify-between mb-3">
            <div class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center group-hover:bg-stone-900 transition-colors"><span class="material-symbols-outlined text-blue-600 group-hover:text-primary">inventory_2</span></div>
            <span class="text-[10px] font-bold text-green-600 bg-green-50 px-2 py-0.5 rounded-full">+12%</span>
          </div>
          <p class="text-2xl font-headline font-bold text-stone-900" id="stockCount">{{ number_format($stats['stock_total'], 0) }}</p>
          <p class="text-xs text-stone-500 mt-1 uppercase font-bold tracking-tighter">Productos en Stock</p>
        </a>
      </div>
    </div>
    
    <div class="grid-stack-item" gs-w="3" gs-h="2">
      <div class="grid-stack-item-content">
        <a href="{{ url('/erp/ventas') }}" class="bg-white border border-stone-200 rounded-xl p-5 hover:shadow-lg transition-all group block h-full">
          <div class="flex items-center justify-between mb-3">
            <div class="w-10 h-10 bg-green-50 rounded-lg flex items-center justify-center group-hover:bg-stone-900 transition-colors"><span class="material-symbols-outlined text-green-600 group-hover:text-primary">payments</span></div>
            <span class="text-[10px] font-bold text-green-600 bg-green-50 px-2 py-0.5 rounded-full">+8.2%</span>
          </div>
          <p class="text-2xl font-headline font-bold text-stone-900" id="salesAmount">${{ number_format($stats['ingresos_mes'], 2) }}</p>
          <p class="text-xs text-stone-500 mt-1 uppercase font-bold tracking-tighter">Ventas del Mes</p>
        </a>
      </div>
    </div>

    <div class="grid-stack-item" gs-w="3" gs-h="2">
      <div class="grid-stack-item-content">
        <a href="{{ url('/erp/compras') }}" class="bg-white border border-stone-200 rounded-xl p-5 hover:shadow-lg transition-all group block h-full">
          <div class="flex items-center justify-between mb-3">
            <div class="w-10 h-10 bg-purple-50 rounded-lg flex items-center justify-center group-hover:bg-stone-900 transition-colors"><span class="material-symbols-outlined text-purple-600 group-hover:text-primary">shopping_cart</span></div>
            <span class="text-[10px] font-bold text-stone-400 bg-stone-100 px-2 py-0.5 rounded-full">3 activas</span>
          </div>
          <p class="text-2xl font-headline font-bold text-stone-900" id="pendingPurchases">{{ $stats['ordenes_pendientes'] }}</p>
          <p class="text-xs text-stone-500 mt-1 uppercase font-bold tracking-tighter">Órdenes a Procesar</p>
        </a>
      </div>
    </div>

    <div class="grid-stack-item" gs-w="3" gs-h="2">
      <div class="grid-stack-item-content">
        <a href="{{ url('/erp/ventas/clientes') }}" class="bg-white border border-stone-200 rounded-xl p-5 hover:shadow-lg transition-all group block h-full">
          <div class="flex items-center justify-between mb-3">
            <div class="w-10 h-10 bg-orange-50 rounded-lg flex items-center justify-center group-hover:bg-stone-900 transition-colors"><span class="material-symbols-outlined text-orange-600 group-hover:text-primary">people</span></div>
            <span class="text-[10px] font-bold text-green-600 bg-green-50 px-2 py-0.5 rounded-full">+5</span>
          </div>
          <p class="text-2xl font-headline font-bold text-stone-900" id="customerCount">{{ $stats['clientes_activos'] }}</p>
          <p class="text-xs text-stone-500 mt-1 uppercase font-bold tracking-tighter">Clientes Activos</p>
        </a>
      </div>
    </div>
  </div>

  <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
    <div class="lg:col-span-2 bg-white border border-stone-200 rounded-xl p-6 shadow-sm">
      <div class="flex justify-between items-center mb-6">
        <div class="flex items-center gap-3">
          <div class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center text-blue-600"><span class="material-symbols-outlined">inventory_2</span></div>
          <div><h3 class="text-lg font-headline font-black text-stone-900 uppercase">Control de Inventario</h3><p class="text-xs text-stone-500 font-bold uppercase tracking-widest">Resumen general del stock</p></div>
        </div>
        <a href="{{ url('/erp/inventario') }}" class="text-[10px] font-black uppercase text-stone-400 hover:text-stone-900 flex items-center gap-2 transition-colors">Ver completo <span class="material-symbols-outlined text-sm">arrow_forward</span></a>
      </div>
      <div class="grid grid-cols-3 gap-6 mb-6">
        <div class="border-l-4 border-green-500 pl-4"><p class="text-[10px] font-black text-stone-400 uppercase tracking-widest">Stock Total</p><p class="text-2xl font-headline font-bold text-stone-900">{{ number_format($stats['stock_total'], 0) }}</p></div>
        <div class="border-l-4 border-red-500 pl-4"><p class="text-[10px] font-black text-stone-400 uppercase tracking-widest">Alertas de Stock</p><p class="text-2xl font-headline font-bold text-red-500">{{ $stats['stock_risks'] }}</p></div>
        <div class="border-l-4 border-primary pl-4"><p class="text-[10px] font-black text-stone-400 uppercase tracking-widest">Aprobaciones</p><p class="text-2xl font-headline font-bold text-stone-900">{{ $stats['aprobaciones_count'] }}</p></div>
      </div>
      <div id="salesTrendChart" class="w-full -ml-3"></div>
    </div>
    <div class="bg-stone-950 text-white rounded-xl p-8 relative overflow-hidden shadow-2xl">
        <div class="absolute right-0 top-0 opacity-[0.05] translate-x-1/4 -translate-y-1/4">
            <span class="material-symbols-outlined text-[150px]">monetization_on</span>
        </div>
      <div class="relative z-10">
          <p class="text-[10px] font-black text-primary uppercase tracking-[0.3em] mb-2">Ingresos del Mes</p>
          <h3 class="text-5xl font-headline font-black text-white tracking-tighter mb-8 italic">${{ number_format($stats['ingresos_mes'], 2) }}</h3>
      </div>
      <div class="space-y-4 mb-10 relative z-10">
        @foreach($recentOrders as $order)
        <div class="flex items-center justify-between bg-white/5 backdrop-blur-md rounded-xl p-4 border border-white/5">
            <div><p class="text-[10px] font-black text-stone-400 uppercase mb-1">{{ $order->numero_orden }}</p><p class="text-xs font-bold uppercase">{{ $order->customer->razon_social ?? 'Cliente General' }}</p></div>
            <span class="font-headline font-black text-primary">${{ number_format($order->total, 2) }}</span>
        </div>
        @endforeach
      </div>
      <a href="{{ url('/erp/ventas') }}" class="block bg-primary text-stone-900 py-4 font-black text-[10px] uppercase tracking-[0.2em] rounded-xl hover:brightness-110 transition-all text-center shadow-xl shadow-primary/10 relative z-10 mb-6">VER MÁS DETALLES</a>

      @if($stats['categoria_mix']->count() > 0)
      <div class="mt-8 pt-8 border-t border-white/5 relative z-10">
        <p class="text-[9px] font-black text-stone-500 uppercase tracking-widest mb-4">Mix de Ventas por Categoría</p>
        <div class="space-y-3">
          @foreach($stats['categoria_mix'] as $mix)
          <div class="flex items-center justify-between text-[10px]">
            <span class="text-stone-400 font-bold uppercase">{{ $mix->categoria }}</span>
            <span class="text-white font-black">{{ $mix->total }} ord.</span>
          </div>
          <div class="w-full bg-white/5 h-1 rounded-full overflow-hidden">
            <div class="bg-primary h-full" style="width: {{ min(100, $mix->total * 10) }}%"></div>
          </div>
          @endforeach
        </div>
      </div>
      @endif
    </div>
  </div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        setTimeout(() => {
            window.notify('Sistema Zenith v6.0 Online', 'success');
        }, 1000);
        
        // Simular alerta de stock bajo
        setTimeout(() => {
            window.notify('Alerta: Stock Crítico en Repuestos de Motor', 'warning');
        }, 3000);
    });
</script>
@endsection
