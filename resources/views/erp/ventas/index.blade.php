@extends('erp.layouts.app')

@section('title', 'Control Comercial')

@section('breadcrumb')
    <a href="{{ url('/erp/ventas') }}" class="hover:text-stone-900 transition-colors">Ventas</a>
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <span class="text-stone-900">Dashboard de Ventas</span>
@endsection

@section('content')
  <!-- Header Section -->
  <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6 mb-10">
    <div class="space-y-1">
      <div class="flex items-center gap-2">
        <span class="w-2 h-6 bg-primary rounded-full"></span>
        <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em]">División de Ventas & Facturación</p>
      </div>
      <h2 class="text-4xl font-headline font-black text-stone-900 tracking-tight leading-none uppercase">Control Comercial <span class="text-stone-400">Zenith</span></h2>
      <p class="text-xs text-stone-400 mt-2 font-medium uppercase tracking-widest">MAYOR DE REPUESTO LA CIMA, C.A. • RIF: J-40308741-5</p>
    </div>
    
    <div id="tour-sales-actions" class="flex items-center gap-3">
      <button class="bg-stone-900 text-white px-5 py-3 rounded-xl flex items-center gap-3 hover:bg-stone-800 transition-all group active:scale-95 shadow-xl shadow-stone-200 border border-stone-800">
        <span class="material-symbols-outlined text-lg text-primary">analytics</span>
        <span class="text-[10px] font-bold uppercase tracking-widest">Generar Forecast</span>
      </button>
      <a href="{{ url('/erp/ventas/pos') }}" class="bg-primary text-stone-900 px-6 py-3 rounded-xl flex items-center gap-3 hover:brightness-110 transition-all font-black uppercase text-[10px] tracking-[0.15em] shadow-xl shadow-primary/20">
        <span class="material-symbols-outlined text-lg">point_of_sale</span>
        Nueva Venta <span class="bg-stone-900/10 px-2 py-0.5 rounded text-[8px] ml-1">F10</span>
      </a>
    </div>
  </div>

  <!-- Bento Grid: Key Metrics -->
  <div id="tour-sales-stats" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
    <!-- Ventas del Mes -->
    <div class="bg-white rounded-3xl p-8 border border-stone-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 relative group overflow-hidden">
      <div class="absolute -right-6 -top-6 w-24 h-24 bg-green-50 rounded-full group-hover:scale-150 transition-transform duration-500"></div>
      <div class="relative z-10 flex flex-col h-full">
        <div class="flex items-center justify-between mb-8">
          <div class="w-12 h-12 bg-green-500 text-white rounded-2xl flex items-center justify-center shadow-lg shadow-green-200">
            <span class="material-symbols-outlined">payments</span>
          </div>
          <div class="flex flex-col items-end">
            <span class="text-xs font-black text-green-600">+14.2%</span>
            <span class="text-[8px] font-bold text-stone-400 uppercase tracking-widest">vs mes ant.</span>
          </div>
        </div>
        <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em] mb-2">Ingresos Consolidados</p>
        <div class="flex items-baseline gap-2">
          <span class="text-4xl font-headline font-black text-stone-900">${{ number_format($stats['ventas_mes'], 0) }}</span>
          <span class="text-xs font-bold text-stone-400">.00</span>
        </div>
        <div class="mt-4 pt-4 border-t border-stone-50">
          <p class="text-[9px] text-stone-500 leading-relaxed font-medium">842 transacciones aprobadas este ciclo fiscal.</p>
        </div>
      </div>
    </div>

    <!-- Cuentas por Cobrar -->
    <div class="bg-white rounded-3xl p-8 border border-stone-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 relative group overflow-hidden">
      <div class="absolute -right-6 -top-6 w-24 h-24 bg-amber-50 rounded-full group-hover:scale-150 transition-transform duration-500"></div>
      <div class="relative z-10 flex flex-col h-full">
        <div class="flex items-center justify-between mb-8">
          <div class="w-12 h-12 bg-amber-500 text-white rounded-2xl flex items-center justify-center shadow-lg shadow-amber-200">
            <span class="material-symbols-outlined">pending_actions</span>
          </div>
          <div class="flex flex-col items-end">
            <span class="text-xs font-black text-amber-600">{{ $stats['ordenes_pendientes'] }} Pendientes</span>
            <span class="text-[8px] font-bold text-stone-400 uppercase tracking-widest">Atención inmediata</span>
          </div>
        </div>
        <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em] mb-2">Pendiente de Cobro</p>
        <div class="flex items-baseline gap-2">
          <span class="text-4xl font-headline font-black text-stone-900">${{ number_format($stats['cuentas_por_cobrar'], 0) }}</span>
          <span class="text-xs font-bold text-stone-400">.00</span>
        </div>
        <div class="mt-4 pt-4 border-t border-stone-50">
          <p class="text-[9px] text-stone-500 leading-relaxed font-medium">Cuentas por cobrar en estado pendiente.</p>
        </div>
      </div>
    </div>

    <!-- Ticket Promedio -->
    <div class="bg-white rounded-3xl p-8 border border-stone-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 relative group overflow-hidden">
      <div class="absolute -right-6 -top-6 w-24 h-24 bg-blue-50 rounded-full group-hover:scale-150 transition-transform duration-500"></div>
      <div class="relative z-10 flex flex-col h-full">
        <div class="flex items-center justify-between mb-8">
          <div class="w-12 h-12 bg-blue-500 text-white rounded-2xl flex items-center justify-center shadow-lg shadow-blue-200">
            <span class="material-symbols-outlined">show_chart</span>
          </div>
          <div class="flex flex-col items-end">
            <span class="text-xs font-black text-blue-600">$535.00</span>
            <span class="text-[8px] font-bold text-stone-400 uppercase tracking-widest">Promedio Unitario</span>
          </div>
        </div>
        <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em] mb-2">Ticket de Venta</p>
        <div class="flex items-baseline gap-2">
          <span class="text-4xl font-headline font-black text-stone-900">${{ number_format($stats['ticket_promedio'], 0) }}</span>
          <span class="text-xs font-bold text-stone-400">/ORD</span>
        </div>
        <div class="mt-4 pt-4 border-t border-stone-50">
          <p class="text-[9px] text-stone-500 leading-relaxed font-medium">Incremento del 5% en volumen por cliente.</p>
        </div>
      </div>
    </div>

    <!-- Conversión -->
    <div class="bg-stone-900 rounded-3xl p-8 shadow-2xl relative group overflow-hidden border border-stone-800">
      <div class="absolute inset-0 opacity-20" style="background-image: radial-gradient(circle, #ceff5e 0.5px, transparent 0.5px); background-size: 15px 15px;"></div>
      <div class="relative z-10 flex flex-col h-full">
        <div class="flex items-center justify-between mb-8">
          <div class="w-12 h-12 bg-primary text-black rounded-2xl flex items-center justify-center shadow-lg shadow-primary/20">
            <span class="material-symbols-outlined">group</span>
          </div>
          <span class="text-xs font-black text-primary uppercase">{{ $stats['clientes_activos'] }} Activos</span>
        </div>
        <p class="text-[10px] font-black text-stone-500 uppercase tracking-[0.3em] mb-2 text-white/50">Base de Clientes</p>
        <div class="flex items-baseline gap-2">
          <span class="text-4xl font-headline font-black text-white">85.4%</span>
          <span class="text-xs font-bold text-primary italic">LTV</span>
        </div>
        <div class="mt-4 pt-4 border-t border-white/5">
          <div class="w-full bg-white/10 h-1 rounded-full overflow-hidden">
            <div class="bg-primary h-full w-[85%]"></div>
          </div>
          <p class="text-[9px] text-white/40 mt-3 leading-relaxed font-medium uppercase tracking-widest">Nivel de retención superior</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Bottom Section: Transactions & Performance -->
  <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 mb-10">
    
    <!-- Recent Transactions -->
    <div class="lg:col-span-8 bg-white rounded-3xl border border-stone-100 shadow-sm p-8">
      <div class="flex justify-between items-center mb-10">
        <div class="flex items-center gap-4">
          <div class="w-10 h-10 bg-stone-50 rounded-xl flex items-center justify-center text-stone-900 border border-stone-100">
            <span class="material-symbols-outlined">receipt_long</span>
          </div>
          <div>
            <h3 class="text-xl font-headline font-black text-stone-900 tracking-tight uppercase">Ventas Recientes</h3>
            <p class="text-xs text-stone-400 font-bold uppercase tracking-widest">Últimas operaciones del terminal</p>
          </div>
        </div>
        <a href="{{ url('/erp/ventas/registro') }}" class="text-[10px] font-black uppercase tracking-[0.2em] text-stone-400 hover:text-stone-900 transition-colors flex items-center gap-2">
          Ver Registro Completo
          <span class="material-symbols-outlined text-sm">arrow_forward</span>
        </a>
      </div>

      <div class="overflow-x-auto">
        <table class="w-full font-body">
          <thead>
            <tr class="text-left border-b border-stone-100 text-[10px] font-black text-stone-400 uppercase tracking-widest">
              <th class="pb-5 pl-2">Folio</th>
              <th class="pb-5">Cliente / Entidad</th>
              <th class="pb-5">Detalle Operativo</th>
              <th class="pb-5 text-right">Total (USD)</th>
              <th class="pb-5 text-center">Estatus</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-stone-50">
            @foreach($recentOrders as $order)
            <tr class="group hover:bg-stone-50/50 transition-colors">
              <td class="py-5 pl-2">
                <span class="text-xs font-mono font-bold text-stone-400 group-hover:text-stone-900 transition-colors uppercase">#{{ $order->numero_orden }}</span>
              </td>
              <td class="py-5">
                <div class="flex flex-col">
                  <span class="text-xs font-black text-stone-900 uppercase">{{ $order->customer->razon_social ?? 'Cliente General' }}</span>
                  <span class="text-[9px] text-stone-400 font-bold uppercase tracking-tighter">RIF: {{ $order->customer->rif ?? '---' }}</span>
                </div>
              </td>
              <td class="py-5">
                <p class="text-xs text-stone-500 font-medium italic">
                    {{ $order->items->count() }} item(s) registrado(s)
                </p>
              </td>
              <td class="py-5 text-right">
                <span class="text-sm font-headline font-black text-stone-900 tracking-tight">${{ number_format($order->total, 2) }}</span>
              </td>
              <td class="py-5 text-center">
                <span class="px-3 py-1 rounded-full text-[9px] font-black uppercase tracking-wider border {{ $order->estado == 'Pagado' ? 'bg-green-50 text-green-600 border-green-100' : 'bg-amber-50 text-amber-600 border-amber-100' }}">
                  {{ $order->estado }}
                </span>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

    <!-- Category Distribution & Rank -->
    <div class="lg:col-span-4 flex flex-col gap-8">
      <!-- Chart Card -->
      <div class="bg-white rounded-3xl border border-stone-100 shadow-sm p-8 flex-1">
        <h3 class="text-xs font-black text-stone-900 uppercase tracking-widest mb-8 flex items-center gap-3">
          <span class="material-symbols-outlined text-stone-400">pie_chart</span>
          Mix Comercial
        </h3>
        
        <div class="relative w-full aspect-square max-w-[180px] mx-auto mb-8">
          <svg viewBox="0 0 36 36" class="w-full h-full transform -rotate-90 drop-shadow-sm">
            <path d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="#f6f6f9" stroke-width="4.5"/>
            <path d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="#ceff5e" stroke-width="4.5" stroke-dasharray="45, 100"/>
            <path d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="#1c1c1c" stroke-width="4.5" stroke-dasharray="25, 100" stroke-dashoffset="-45"/>
            <path d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="#e2e2e5" stroke-width="4.5" stroke-dasharray="30, 100" stroke-dashoffset="-70"/>
          </svg>
          <div class="absolute inset-0 flex flex-col items-center justify-center pointer-events-none">
            <span class="text-[9px] font-black text-stone-400 uppercase tracking-tighter">Ventas</span>
            <span class="text-xl font-headline font-black text-stone-900">FY26</span>
          </div>
        </div>

        <div class="space-y-4">
          <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
              <div class="w-2.5 h-2.5 bg-primary rounded-sm"></div>
              <span class="text-[10px] font-bold text-stone-600 uppercase">Repuestos Cummins</span>
            </div>
            <span class="text-[10px] font-black text-stone-900">45%</span>
          </div>
          <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
              <div class="w-2.5 h-2.5 bg-stone-900 rounded-sm"></div>
              <span class="text-[10px] font-bold text-stone-600 uppercase">Filtros Volvo</span>
            </div>
            <span class="text-[10px] font-black text-stone-900">25%</span>
          </div>
        </div>
      </div>

      <!-- Quick Action Card -->
      <div class="bg-stone-900 rounded-3xl p-8 flex flex-col justify-between shadow-2xl relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')]"></div>
        <div class="relative z-10">
          <h4 class="text-xs font-black text-primary uppercase tracking-widest mb-2">Soporte Comercial</h4>
          <p class="text-[10px] text-stone-400 font-medium leading-relaxed uppercase">Accede a las herramientas de asistencia técnica avanzada.</p>
        </div>
        <div class="flex gap-3 mt-6 relative z-10">
          <button class="flex-1 bg-white/5 border border-white/10 p-3 rounded-xl transition-all text-[9px] font-black uppercase tracking-widest text-white hover:bg-white/10">FAQ</button>
          <button class="flex-1 bg-primary text-stone-900 p-3 rounded-xl hover:brightness-110 transition-all text-[9px] font-black uppercase tracking-widest">Catálogo</button>
        </div>
      </div>
    </div>
  </div>
@endsection
