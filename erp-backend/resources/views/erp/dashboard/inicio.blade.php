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

  <!-- Tarjetas de Resumen -->
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 mb-6">
    <a href="{{ url('/erp/inventario') }}" class="bg-white border border-stone-200 rounded-xl p-5 hover:shadow-lg transition-all group">
      <div class="flex items-center justify-between mb-3">
        <div class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center group-hover:bg-stone-900 transition-colors"><span class="material-symbols-outlined text-blue-600 group-hover:text-primary">inventory_2</span></div>
        <span class="text-[10px] font-bold text-green-600 bg-green-50 px-2 py-0.5 rounded-full">+12%</span>
      </div>
      <p class="text-2xl font-headline font-bold text-stone-900" id="stockCount">14,204</p>
      <p class="text-xs text-stone-500 mt-1 uppercase font-bold tracking-tighter">Productos en Stock</p>
    </a>
    <a href="{{ url('/erp/ventas') }}" class="bg-white border border-stone-200 rounded-xl p-5 hover:shadow-lg transition-all group">
      <div class="flex items-center justify-between mb-3">
        <div class="w-10 h-10 bg-green-50 rounded-lg flex items-center justify-center group-hover:bg-stone-900 transition-colors"><span class="material-symbols-outlined text-green-600 group-hover:text-primary">payments</span></div>
        <span class="text-[10px] font-bold text-green-600 bg-green-50 px-2 py-0.5 rounded-full">+8.2%</span>
      </div>
      <p class="text-2xl font-headline font-bold text-stone-900" id="salesAmount">$128,450</p>
      <p class="text-xs text-stone-500 mt-1 uppercase font-bold tracking-tighter">Ventas del Mes</p>
    </a>
    <a href="{{ url('/erp/compras') }}" class="bg-white border border-stone-200 rounded-xl p-5 hover:shadow-lg transition-all group">
      <div class="flex items-center justify-between mb-3">
        <div class="w-10 h-10 bg-purple-50 rounded-lg flex items-center justify-center group-hover:bg-stone-900 transition-colors"><span class="material-symbols-outlined text-purple-600 group-hover:text-primary">shopping_cart</span></div>
        <span class="text-[10px] font-bold text-stone-400 bg-stone-100 px-2 py-0.5 rounded-full">3 activas</span>
      </div>
      <p class="text-2xl font-headline font-bold text-stone-900" id="pendingPurchases">$12,400</p>
      <p class="text-xs text-stone-500 mt-1 uppercase font-bold tracking-tighter">Compras Pendientes</p>
    </a>
    <a href="{{ url('/erp/ventas/clientes') }}" class="bg-white border border-stone-200 rounded-xl p-5 hover:shadow-lg transition-all group">
      <div class="flex items-center justify-between mb-3">
        <div class="w-10 h-10 bg-orange-50 rounded-lg flex items-center justify-center group-hover:bg-stone-900 transition-colors"><span class="material-symbols-outlined text-orange-600 group-hover:text-primary">people</span></div>
        <span class="text-[10px] font-bold text-green-600 bg-green-50 px-2 py-0.5 rounded-full">+5</span>
      </div>
      <p class="text-2xl font-headline font-bold text-stone-900" id="customerCount">342</p>
      <p class="text-xs text-stone-500 mt-1 uppercase font-bold tracking-tighter">Clientes Activos</p>
    </a>
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
        <div class="border-l-4 border-green-500 pl-4"><p class="text-[10px] font-black text-stone-400 uppercase tracking-widest">Stock Activo</p><p class="text-2xl font-headline font-bold text-stone-900">14,204</p></div>
        <div class="border-l-4 border-red-500 pl-4"><p class="text-[10px] font-black text-stone-400 uppercase tracking-widest">Alertas Críticas</p><p class="text-2xl font-headline font-bold text-red-500">5</p></div>
        <div class="border-l-4 border-primary pl-4"><p class="text-[10px] font-black text-stone-400 uppercase tracking-widest">Rotación</p><p class="text-2xl font-headline font-bold text-stone-900">12.4%</p></div>
      </div>
      <div class="h-32 bg-stone-50 rounded-lg flex items-end gap-1 px-3 py-2 overflow-hidden shadow-inner"><div class="flex-1 bg-stone-200 h-[40%] rounded-t"></div><div class="flex-1 bg-stone-300 h-[60%] rounded-t"></div><div class="flex-1 bg-stone-200 h-[55%] rounded-t"></div><div class="flex-1 bg-blue-400 h-[85%] rounded-t"></div><div class="flex-1 bg-stone-300 h-[45%] rounded-t"></div><div class="flex-1 bg-stone-200 h-[30%] rounded-t"></div><div class="flex-1 bg-stone-900 h-[95%] rounded-t"></div><div class="flex-1 bg-stone-200 h-[50%] rounded-t"></div><div class="flex-1 bg-stone-300 h-[70%] rounded-t"></div><div class="flex-1 bg-primary h-[100%] rounded-t"></div><div class="flex-1 bg-stone-200 h-[65%] rounded-t"></div><div class="flex-1 bg-stone-300 h-[75%] rounded-t"></div></div>
    </div>
    <div class="bg-stone-950 text-white rounded-xl p-8 relative overflow-hidden shadow-2xl">
        <div class="absolute right-0 top-0 opacity-[0.05] translate-x-1/4 -translate-y-1/4">
            <span class="material-symbols-outlined text-[150px]">monetization_on</span>
        </div>
      <div class="relative z-10">
          <p class="text-[10px] font-black text-primary uppercase tracking-[0.3em] mb-2">Ingresos del Mes</p>
          <h3 class="text-5xl font-headline font-black text-white tracking-tighter mb-8 italic">$128,450</h3>
      </div>
      <div class="space-y-4 mb-10 relative z-10">
        <div class="flex items-center justify-between bg-white/5 backdrop-blur-md rounded-xl p-4 border border-white/5">
            <div><p class="text-[10px] font-black text-stone-400 uppercase mb-1">FAC-001</p><p class="text-xs font-bold uppercase">Discos de Freno</p></div>
            <span class="font-headline font-black text-primary">$170.00</span>
        </div>
        <div class="flex items-center justify-between bg-white/5 backdrop-blur-md rounded-xl p-4 border border-white/5">
            <div><p class="text-[10px] font-black text-stone-400 uppercase mb-1">FAC-002</p><p class="text-xs font-bold uppercase">Turbo VGT</p></div>
            <span class="font-headline font-black text-primary">$845.00</span>
        </div>
      </div>
      <a href="{{ url('/erp/ventas') }}" class="block bg-primary text-stone-900 py-4 font-black text-[10px] uppercase tracking-[0.2em] rounded-xl hover:brightness-110 transition-all text-center shadow-xl shadow-primary/10 relative z-10">VER MÁS DETALLES</a>
    </div>
  </div>
@endsection
