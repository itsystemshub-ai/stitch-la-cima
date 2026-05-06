@extends('erp.layouts.app')

@section('title', 'Control Comercial')

@section('breadcrumb')
    <a href="{{ url('/erp/ventas') }}" class="hover:text-stone-900 transition-colors">Ventas</a>
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <span class="text-stone-900">Dashboard de Ventas</span>
@endsection

@section('content')
<!-- Header Section -->
<div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-8 mb-12">
  <div class="space-y-4">
    <div class="flex items-center gap-3">
      <span class="w-3 h-8 bg-primary rounded-sm shadow-[0_0_15px_rgba(206,255,94,0.4)]"></span>
      <p class="text-[12px] font-black text-stone-400 uppercase tracking-[0.4em] italic leading-none">Command Center: Commercial Div.</p>
    </div>
    <h2 class="text-2xl font-headline font-black text-stone-950 tracking-tighter leading-none uppercase italic">Trading <span class="text-stone-300">Hub</span></h2>
    <p class="text-stone-500 text-[10px] font-black uppercase tracking-[0.3em] italic">
      MAYOR DE REPUESTO LA CIMA, C.A. • ALPHA_SALES_NODE_01
    </p>
  </div>
  
  <div id="tour-sales-actions" class="flex flex-wrap items-center gap-4">
    <button class="bg-stone-950 text-white px-8 py-4 rounded-2xl flex items-center gap-4 hover:bg-stone-900 transition-all active:scale-95 shadow-2xl shadow-stone-950/20 border border-stone-800 italic">
      <span class="material-symbols-outlined text-[20px] text-primary">analytics</span>
      <span class="text-[10px] font-black uppercase tracking-[0.3em]">Run Predictive Analytics</span>
    </button>
    <a href="{{ url('/erp/ventas/pos') }}" class="bg-primary text-stone-950 px-10 py-4 rounded-2xl flex items-center gap-4 hover:brightness-110 transition-all font-black uppercase text-[10px] tracking-[0.3em] shadow-2xl shadow-primary/30 italic">
      <span class="material-symbols-outlined text-[20px]">point_of_sale</span>
      Initialize Sale
    </a>
  </div>
</div>

<!-- Bento Grid: Key Metrics -->
<div id="tour-sales-stats" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-12">
  <!-- Ventas del Mes -->
  <div class="bg-white rounded-[40px] p-10 border border-stone-100 shadow-sm relative group overflow-hidden transition-all hover:border-primary">
    <div class="relative z-10 flex flex-col h-full">
      <div class="flex items-center justify-between mb-10">
        <div class="w-14 h-14 bg-stone-950 text-primary rounded-2xl flex items-center justify-center shadow-2xl shadow-stone-950/20 group-hover:scale-110 transition-transform">
          <span class="material-symbols-outlined text-2xl">payments</span>
        </div>
        <div class="flex flex-col items-end">
          <span class="text-[11px] font-black text-green-500 italic">+14.2% Peak</span>
          <span class="text-[9px] font-black text-stone-400 uppercase tracking-widest italic italic">Alpha Cluster</span>
        </div>
      </div>
      <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.4em] mb-2 italic">Consolidated Revenue</p>
      <div class="flex items-baseline gap-2">
        <span class="text-xl font-headline font-black text-stone-950 italic tracking-tighter leading-none">${{ number_format($stats['ventas_mes'], 0) }}</span>
        <span class="text-[10px] font-black text-stone-400 font-mono">.00</span>
      </div>
      <div class="mt-4 pt-4 border-t border-stone-50">
        <p class="text-[9px] text-stone-500 font-black uppercase tracking-widest italic">842 Authorized Packets Detected</p>
      </div>
    </div>
  </div>

  <!-- Cuentas por Cobrar -->
  <div class="bg-white rounded-[40px] p-10 border border-stone-100 shadow-sm relative group overflow-hidden transition-all hover:border-primary">
    <div class="relative z-10 flex flex-col h-full">
      <div class="flex items-center justify-between mb-10">
        <div class="w-14 h-14 bg-stone-950 text-primary rounded-2xl flex items-center justify-center shadow-2xl shadow-stone-950/20 group-hover:scale-110 transition-transform">
          <span class="material-symbols-outlined text-2xl">account_balance_wallet</span>
        </div>
        <div class="flex flex-col items-end">
          <span class="text-[11px] font-black text-amber-500 italic">{{ $stats['ordenes_pendientes'] }} Active</span>
          <span class="text-[9px] font-black text-stone-400 uppercase tracking-widest italic italic">Liability Scan</span>
        </div>
      </div>
      <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.4em] mb-2 italic">Outstanding Receivables</p>
      <div class="flex items-baseline gap-2">
        <span class="text-xl font-headline font-black text-stone-950 italic tracking-tighter leading-none">${{ number_format($stats['cuentas_por_cobrar'], 0) }}</span>
        <span class="text-[10px] font-black text-stone-400 font-mono">.00</span>
      </div>
      <div class="mt-4 pt-4 border-t border-stone-50">
        <p class="text-[9px] text-stone-500 font-black uppercase tracking-widest italic">System flagged as High Priority</p>
      </div>
    </div>
  </div>

  <!-- Ticket Promedio -->
  <div class="bg-white rounded-[40px] p-10 border border-stone-100 shadow-sm relative group overflow-hidden transition-all hover:border-primary">
    <div class="relative z-10 flex flex-col h-full">
      <div class="flex items-center justify-between mb-10">
        <div class="w-14 h-14 bg-stone-950 text-primary rounded-2xl flex items-center justify-center shadow-2xl shadow-stone-950/20 group-hover:scale-110 transition-transform">
          <span class="material-symbols-outlined text-2xl">monitoring</span>
        </div>
        <div class="flex flex-col items-end">
          <span class="text-[11px] font-black text-blue-500 italic">Target: $500</span>
          <span class="text-[9px] font-black text-stone-400 uppercase tracking-widest italic italic">Unit Logic</span>
        </div>
      </div>
      <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.4em] mb-2 italic">Avg. Order Value</p>
      <div class="flex items-baseline gap-2">
        <span class="text-xl font-headline font-black text-stone-950 italic tracking-tighter leading-none">${{ number_format($stats['ticket_promedio'], 0) }}</span>
        <span class="text-[10px] font-black text-stone-400 font-mono">.00</span>
      </div>
      <div class="mt-4 pt-4 border-t border-stone-50">
        <p class="text-[9px] text-stone-500 font-black uppercase tracking-widest italic">+5% Volume Velocity Increment</p>
      </div>
    </div>
  </div>

  <!-- Conversión -->
  <div class="bg-stone-950 rounded-[40px] p-10 shadow-2xl relative group overflow-hidden border border-stone-800 transition-all hover:border-primary/20">
    <div class="relative z-10 flex flex-col h-full">
      <div class="flex items-center justify-between mb-10">
        <div class="w-14 h-14 bg-stone-900 text-primary rounded-2xl flex items-center justify-center shadow-2xl border border-stone-800 group-hover:scale-110 transition-transform">
          <span class="material-symbols-outlined text-2xl">radar</span>
        </div>
        <span class="text-[11px] font-black text-primary uppercase italic tracking-widest">{{ $stats['clientes_activos'] }} Nodes</span>
      </div>
      <p class="text-[10px] font-black text-white/40 uppercase tracking-[0.4em] mb-2 italic">Network Retention Pulse</p>
      <div class="flex items-baseline gap-2">
        <span class="text-xl font-headline font-black text-white italic tracking-tighter leading-none">85.4%</span>
        <span class="text-[10px] font-black text-primary italic font-mono uppercase">LTV</span>
      </div>
      <div class="mt-6 pt-6 border-t border-white/5">
        <div class="w-full bg-stone-900 h-2 rounded-full overflow-hidden p-[1px] border border-stone-800">
          <div class="bg-primary h-full rounded-full shadow-[0_0_15px_rgba(206,255,94,0.4)] transition-all duration-1000" style="width: 85.4%"></div>
        </div>
        <p class="text-[9px] text-white/30 mt-4 font-black uppercase tracking-[0.3em] italic italic">Critical Retention Threshold Met</p>
      </div>
    </div>
  </div>
</div>

<!-- Bottom Section: Transactions & Performance -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-10 mb-12">
  
  <!-- Recent Transactions -->
  <div class="lg:col-span-8 bg-white rounded-[40px] border border-stone-100 shadow-sm p-10">
    <div class="flex flex-col md:flex-row justify-between items-center mb-12 border-b border-stone-50 pb-8 gap-6">
      <div class="flex items-center gap-6">
        <div class="w-12 h-12 bg-stone-950 rounded-2xl flex items-center justify-center text-primary shadow-2xl shadow-stone-950/20">
          <span class="material-symbols-outlined text-2xl">dynamic_feed</span>
        </div>
        <div>
          <h3 class="text-xl font-headline font-black text-stone-950 uppercase tracking-tighter italic">Live Transmission Feed</h3>
          <p class="text-[10px] text-stone-400 font-black uppercase tracking-[0.3em] mt-1 italic">Recent Terminal Activity</p>
        </div>
      </div>
      <a href="{{ url('/erp/ventas/registro') }}" class="text-[10px] font-black uppercase tracking-[0.4em] text-primary hover:text-stone-950 transition-all flex items-center gap-3 italic italic">
        ACCESS DATA VAULT
        <span class="material-symbols-outlined text-[20px] group-hover:translate-x-2 transition-transform">arrow_forward</span>
      </a>
    </div>

    <div class="overflow-x-auto">
      <table class="w-full border-collapse">
        <thead>
          <tr class="zenith-table-header bg-stone-950 text-white">
            <th class="px-8 py-5 text-left">PROTOCOL ID</th>
            <th class="px-8 py-5 text-left">ENTITY PROFILE</th>
            <th class="px-8 py-5 text-left">PACKET LOAD</th>
            <th class="px-8 py-5 text-right">MAGNITUDE</th>
            <th class="px-8 py-5 text-center">STATUS</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-stone-50">
          @foreach($recentOrders as $order)
          <tr class="group hover:bg-primary/5 transition-colors">
            <td class="px-8 py-6">
              <span class="text-[11px] font-mono font-black text-stone-400 group-hover:text-stone-950 transition-colors uppercase italic italic">#{{ $order->numero_orden }}</span>
            </td>
            <td class="px-8 py-6">
              <div class="flex flex-col">
                <span class="text-[12px] font-black text-stone-950 uppercase tracking-tight italic">{{ $order->customer->razon_social ?? 'Unnamed Entity' }}</span>
                <span class="text-[10px] text-stone-400 font-mono font-black uppercase tracking-tighter italic italic mt-1">ID: {{ $order->customer->rif ?? '---' }}</span>
              </div>
            </td>
            <td class="px-8 py-6">
              <p class="text-[11px] text-stone-400 font-black uppercase tracking-widest italic italic">
                  {{ $order->items->count() }} Data Points
              </p>
            </td>
            <td class="px-8 py-6 text-right">
              <span class="text-[12px] font-mono font-black text-stone-950 italic tracking-tighter leading-none">${{ number_format($order->total, 2) }}</span>
            </td>
            <td class="px-8 py-6 text-center">
              <span class="px-4 py-1 rounded-full text-[9px] font-black uppercase tracking-[0.2em] border italic {{ $order->estado == 'Pagado' ? 'bg-green-100 text-green-700 border-green-200' : 'bg-amber-100 text-amber-700 border-amber-200' }}">
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
  <div class="lg:col-span-4 flex flex-col gap-10">
    <!-- Chart Card -->
    <div class="bg-white rounded-[40px] border border-stone-100 shadow-sm p-10 flex-1 relative overflow-hidden group">
      <h3 class="text-[11px] font-black text-stone-950 uppercase tracking-[0.4em] mb-12 flex items-center gap-4 italic italic">
        <span class="material-symbols-outlined text-stone-300">hub</span>
        Product Structural Mix
      </h3>
      
      <div class="relative w-full aspect-square max-w-[200px] mx-auto mb-10 group-hover:scale-105 transition-transform duration-500">
        <svg viewBox="0 0 36 36" class="w-full h-full transform -rotate-90 drop-shadow-2xl">
          <path d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="#f8f8fa" stroke-width="5"/>
          <path d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="#ceff5e" stroke-width="5" stroke-dasharray="45, 100" class="drop-shadow-[0_0_8px_rgba(206,255,94,0.3)]"/>
          <path d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="#1c1917" stroke-width="5" stroke-dasharray="25, 100" stroke-dashoffset="-45"/>
        </svg>
        <div class="absolute inset-0 flex flex-col items-center justify-center pointer-events-none">
          <span class="text-[10px] font-black text-stone-300 uppercase tracking-widest italic">Inventory</span>
          <span class="text-3xl font-headline font-black text-stone-950 italic tracking-tighter">DATA</span>
        </div>
      </div>

      <div class="space-y-5">
        @php
            $colors = ['bg-primary', 'bg-stone-950', 'bg-stone-200', 'bg-stone-400'];
        @endphp
        @forelse($stats['categoria_mix'] as $index => $mix)
        <div class="flex items-center justify-between p-3 bg-stone-50 rounded-2xl border border-stone-100 transition-all hover:bg-white hover:shadow-md">
          <div class="flex items-center gap-4">
            <div class="w-3 h-3 {{ $colors[$index % count($colors)] }} rounded-full shadow-sm"></div>
            <span class="text-[11px] font-black text-stone-600 uppercase tracking-widest italic italic">{{ $mix->categoria ?? 'General' }}</span>
          </div>
          <span class="text-[12px] font-mono font-black text-stone-950 italic">{{ $mix->percentage }}%</span>
        </div>
        @empty
        <p class="text-[11px] text-stone-300 font-black uppercase tracking-widest italic text-center py-8">Categorical mix not yet derived.</p>
        @endforelse
      </div>
    </div>

    <!-- Quick Action Card -->
    <div class="bg-stone-950 rounded-[40px] p-10 flex flex-col justify-between shadow-2xl relative overflow-hidden border border-stone-800 transition-all hover:border-primary/20">
      <div class="relative z-10">
        <h4 class="text-[11px] font-black text-primary uppercase tracking-[0.4em] mb-3 italic">Commercial Ops Support</h4>
        <p class="text-[10px] text-stone-500 font-black uppercase leading-relaxed tracking-widest italic italic">Advanced technical assistance and strategic logistics documentation hub.</p>
      </div>
      <div class="space-y-4 mt-10 relative z-10">
          <button class="w-full bg-primary text-stone-950 py-5 rounded-2xl font-headline font-black text-[11px] uppercase tracking-[0.3em] hover:bg-white transition-all flex items-center justify-center gap-4 active:scale-95 shadow-2xl shadow-primary/20 group italic">
              <span class="material-symbols-outlined text-[22px] group-hover:rotate-180 transition-transform">insights</span>
              RUN COMMERCIAL FORECAST
          </button>
          <div class="grid grid-cols-2 gap-3">
              <a href="{{ url('/erp/ayuda') }}" class="flex flex-col items-center justify-center p-6 bg-stone-900 border border-stone-800 rounded-3xl hover:border-primary transition-all group shadow-xl">
                  <span class="material-symbols-outlined text-stone-600 group-hover:text-primary transition-colors text-3xl">terminal</span>
                  <span class="text-[10px] font-black text-stone-500 uppercase mt-3 tracking-widest italic">Core FAQ</span>
              </a>
              <a href="{{ url('/erp/ayuda/manual') }}" class="flex flex-col items-center justify-center p-6 bg-stone-900 border border-stone-800 rounded-3xl hover:border-primary transition-all group shadow-xl">
                  <span class="material-symbols-outlined text-stone-600 group-hover:text-primary transition-colors text-3xl">menu_book</span>
                  <span class="text-[10px] font-black text-stone-500 uppercase mt-3 tracking-widest italic">Protocols</span>
              </a>
          </div>
      </div>
      <span class="material-symbols-outlined absolute -right-16 -bottom-16 text-[320px] opacity-[0.03] text-primary pointer-events-none rotate-12 group-hover:opacity-[0.05] transition-opacity">support_agent</span>
    </div>
  </div>
</div>

@endsection
