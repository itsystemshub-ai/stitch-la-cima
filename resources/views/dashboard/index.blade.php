@extends('layouts.erp')

@section('title', 'Dashboard Principal | Mayor de Repuesto La Cima, C.A.')
@section('breadcrumb_active', 'Inicio')

@section('content')
  <!-- Header Dashboard -->
  <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4 mb-8">
    <div class="animate-fade-in">
      <p class="text-[10px] font-black text-primary tracking-[0.3em] uppercase mb-2 font-headline">Intelligence Overview</p>
      <h2 class="text-4xl font-headline font-black text-text-dark tracking-tighter uppercase italic">MAYOR DE REPUESTO <span class="text-primary not-italic">LA CIMA, C.A.</span></h2>
      <p class="text-stone-400 text-xs font-medium flex items-center gap-2 mt-1">
        <span class="material-symbols-outlined text-sm">location_on</span> Zona Industrial Valencia • RIF: J-40308741-5
      </p>
    </div>
    <div class="flex gap-3">
      <div class="bg-white border border-stone-200 px-5 py-3 rounded-xl shadow-sm">
        <span class="text-[9px] font-black text-stone-400 uppercase tracking-widest">Uptime System</span>
        <p class="text-2xl font-headline font-black text-text-dark">99.9%</p>
      </div>
      <div class="bg-primary px-5 py-3 rounded-xl text-text-dark shadow-[0_0_20px_rgba(179,217,43,0.2)]">
        <span class="text-[9px] font-black uppercase tracking-widest opacity-60">Status</span>
        <p class="text-2xl font-headline font-black italic">ÓPTIMO</p>
      </div>
    </div>
  </div>

  <!-- Tarjetas de Resumen por Modulo -->
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">

    <!-- Inventario -->
    <a href="{{ url('/erp/inventario') }}" class="bg-white border border-stone-100 rounded-2xl p-6 hover:shadow-2xl hover:border-primary transition-all group relative overflow-hidden">
      <div class="flex items-center justify-between mb-4">
        <div class="w-12 h-12 bg-stone-50 rounded-xl flex items-center justify-center group-hover:bg-primary transition-colors">
          <span class="material-symbols-outlined text-text-dark group-hover:scale-110 transition-transform">inventory_2</span>
        </div>
        <span class="text-[10px] font-black text-primary bg-text-dark px-3 py-1 rounded-full">+12%</span>
      </div>
      <p class="text-3xl font-headline font-black text-text-dark tracking-tighter">{{ number_format($stats['stock_total']) }}</p>
      <p class="text-[10px] font-black text-stone-400 uppercase tracking-widest mt-1">Stock Total</p>
    </a>

    <!-- Ventas -->
    <a href="{{ url('/erp/ventas') }}" class="bg-white border border-stone-100 rounded-2xl p-6 hover:shadow-2xl hover:border-primary transition-all group">
      <div class="flex items-center justify-between mb-4">
        <div class="w-12 h-12 bg-stone-50 rounded-xl flex items-center justify-center group-hover:bg-primary transition-colors">
          <span class="material-symbols-outlined text-text-dark">payments</span>
        </div>
        <span class="text-[10px] font-black text-primary bg-text-dark px-3 py-1 rounded-full">+8.2%</span>
      </div>
      <p class="text-3xl font-headline font-black text-text-dark tracking-tighter">${{ number_format($stats['ingresos_mes'], 2) }}</p>
      <p class="text-[10px] font-black text-stone-400 uppercase tracking-widest mt-1">Ingresos Mes</p>
    </a>

    <!-- Compras -->
    <a href="{{ url('/erp/compras') }}" class="bg-white border border-stone-100 rounded-2xl p-6 hover:shadow-2xl hover:border-primary transition-all group">
      <div class="flex items-center justify-between mb-4">
        <div class="w-12 h-12 bg-stone-50 rounded-xl flex items-center justify-center group-hover:bg-primary transition-colors">
          <span class="material-symbols-outlined text-text-dark">shopping_cart</span>
        </div>
        <span class="text-[10px] font-black text-white bg-red-500 px-3 py-1 rounded-full">3 OFF</span>
      </div>
      <p class="text-3xl font-headline font-black text-text-dark tracking-tighter">{{ $stats['aprobaciones_count'] }}</p>
      <p class="text-[10px] font-black text-stone-400 uppercase tracking-widest mt-1">Aprobaciones Pendientes</p>
    </a>

    <!-- Clientes -->
    <a href="{{ url('/erp/clientes') }}" class="bg-white border border-stone-100 rounded-2xl p-6 hover:shadow-2xl hover:border-primary transition-all group">
      <div class="flex items-center justify-between mb-4">
        <div class="w-12 h-12 bg-stone-50 rounded-xl flex items-center justify-center group-hover:bg-primary transition-colors">
          <span class="material-symbols-outlined text-text-dark">people</span>
        </div>
        <span class="text-[10px] font-black text-primary bg-text-dark px-3 py-1 rounded-full">+5 NEW</span>
      </div>
      <p class="text-3xl font-headline font-black text-text-dark tracking-tighter">{{ $stats['clientes_activos'] }}</p>
      <p class="text-[10px] font-black text-stone-400 uppercase tracking-widest mt-1">Clientes Activos</p>
    </a>
  </div>

  <!-- Seccion Principal: Inventario + Ventas -->
  <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">

    <!-- Inventario (2/3) -->
    <div class="lg:col-span-2 bg-white border border-stone-100 rounded-3xl p-8 shadow-sm">
      <div class="flex justify-between items-center mb-8">
        <div class="flex items-center gap-4">
          <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center">
            <span class="material-symbols-outlined text-primary font-black">bar_chart</span>
          </div>
          <div>
            <h3 class="text-xl font-headline font-black text-text-dark uppercase tracking-tight">Análisis Operativo</h3>
            <p class="text-xs text-stone-400 font-medium tracking-wide">Desempeño del inventario en tiempo real</p>
          </div>
        </div>
        <button class="text-[10px] font-black text-stone-400 hover:text-text-dark uppercase tracking-[0.2em] transition-colors border-b-2 border-transparent hover:border-primary pb-1">Descargar Reporte</button>
      </div>

      <div class="grid grid-cols-3 gap-8 mb-8">
        <div class="bg-stone-50 p-5 rounded-2xl border-l-4 border-primary">
          <p class="text-[9px] font-black text-stone-400 uppercase tracking-widest mb-1">Stock Activo</p>
          <p class="text-3xl font-headline font-black text-text-dark tracking-tighter">14,204</p>
        </div>
        <div class="bg-stone-50 p-5 rounded-2xl border-l-4 border-red-500">
          <p class="text-[9px] font-black text-stone-400 uppercase tracking-widest mb-1">Riesgos Stock</p>
          <p class="text-3xl font-headline font-black text-red-500 tracking-tighter">{{ str_pad($stats['stock_risks'], 2, '0', STR_PAD_LEFT) }}</p>
        </div>
        <div class="bg-stone-50 p-5 rounded-2xl border-l-4 border-text-dark">
          <p class="text-[9px] font-black text-stone-400 uppercase tracking-widest mb-1">Aprobaciones</p>
          <p class="text-3xl font-headline font-black text-text-dark tracking-tighter">{{ $stats['aprobaciones_count'] }}</p>
        </div>
      </div>

      <!-- Grafica Estilo "La Cima" -->
      <div class="h-40 bg-stone-50 rounded-2xl flex items-end gap-2 px-6 py-4 overflow-hidden relative">
        <div class="absolute inset-0 opacity-[0.03]" style="background-image: linear-gradient(#000 1px, transparent 1px), linear-gradient(90deg, #000 1px, transparent 1px); background-size: 20px 20px;"></div>
        <div class="flex-1 bg-stone-200 h-[40%] rounded-t-lg transition-all hover:bg-primary cursor-pointer"></div>
        <div class="flex-1 bg-stone-200 h-[60%] rounded-t-lg transition-all hover:bg-primary cursor-pointer"></div>
        <div class="flex-1 bg-stone-200 h-[55%] rounded-t-lg transition-all hover:bg-primary cursor-pointer"></div>
        <div class="flex-1 bg-text-dark h-[85%] rounded-t-lg transition-all hover:bg-primary cursor-pointer"></div>
        <div class="flex-1 bg-stone-200 h-[45%] rounded-t-lg transition-all hover:bg-primary cursor-pointer"></div>
        <div class="flex-1 bg-stone-200 h-[30%] rounded-t-lg transition-all hover:bg-primary cursor-pointer"></div>
        <div class="flex-1 bg-primary h-[95%] rounded-t-lg transition-all hover:bg-text-dark cursor-pointer shadow-[0_0_20px_rgba(179,217,43,0.3)]"></div>
        <div class="flex-1 bg-stone-200 h-[50%] rounded-t-lg transition-all hover:bg-primary cursor-pointer"></div>
        <div class="flex-1 bg-stone-200 h-[70%] rounded-t-lg transition-all hover:bg-primary cursor-pointer"></div>
        <div class="flex-1 bg-text-dark h-[100%] rounded-t-lg transition-all hover:bg-primary cursor-pointer"></div>
      </div>
    </div>

    <!-- Ventas Rapidas (1/3) -->
    <div class="bg-text-dark text-white rounded-3xl p-8 relative overflow-hidden shadow-2xl">
      <div class="absolute top-0 right-0 opacity-10 pointer-events-none">
        <span class="material-symbols-outlined text-[200px] -mr-10 -mt-10">trending_up</span>
      </div>
      <div class="relative h-full flex flex-col">
        <p class="text-[10px] font-black text-primary uppercase tracking-[0.4em] mb-4 font-headline">Zenith Terminal</p>
        <h3 class="text-5xl font-headline font-black text-white tracking-tighter mb-2 italic">$128,450</h3>
        <p class="text-xs font-bold text-white/40 uppercase tracking-widest mb-8">Ventas Netas Mes Actual</p>
        
        <div class="space-y-4 mb-10 overflow-y-auto max-h-[220px]">
          @foreach($recentOrders as $order)
          <div class="flex items-center justify-between border-b border-white/5 pb-3">
            <div class="flex flex-col">
              <span class="text-[10px] font-black text-white/60 uppercase tracking-tighter">#ORD-{{ $order->id }}</span>
              <span class="text-[8px] font-medium text-white/30">{{ $order->customer->razon_social ?? 'Cliente Al Detal' }}</span>
            </div>
            <span class="text-sm font-black text-primary">${{ number_format($order->total, 2) }}</span>
          </div>
          @endforeach
        </div>

        <div class="mt-auto space-y-3">
          <a href="{{ url('/pos') }}" class="block w-full bg-primary text-text-dark py-4 font-black text-xs uppercase tracking-[0.2em] rounded-xl hover:bg-white transition-all text-center shadow-[0_10px_30px_rgba(179,217,43,0.3)]">
            ABRIR NUEVA VENTA
          </a>
          <button class="block w-full border border-white/10 text-white/60 py-4 font-black text-xs uppercase tracking-[0.2em] rounded-xl hover:bg-white/5 transition-all">
            VER HISTORIAL
          </button>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Inyectar funcionalidad de la campana (Simulación avanzada)
    document.addEventListener('DOMContentLoaded', function() {
        const btn = document.getElementById('notificationBtn');
        const dropdown = document.getElementById('notif-dropdown');
        const itemsContainer = document.getElementById('notif-items');
        const badge = document.getElementById('notif-badge');

        btn.addEventListener('click', function(e) {
            e.stopPropagation();
            dropdown.classList.toggle('hidden');
            loadNotifications();
        });

        document.addEventListener('click', () => dropdown.classList.add('hidden'));

        async function loadNotifications() {
            itemsContainer.innerHTML = '<div class="p-4 text-center text-stone-400 text-[10px] uppercase font-bold tracking-widest">Sincronizando Alertas...</div>';
            
            // Simulación de delay de red industrial
            setTimeout(() => {
                const alerts = [
                    { type: 'warning', title: 'STOCK CRÍTICO', body: 'Filtro Cummins LF9009 < 10 unidades.', time: 'Hace 5m' },
                    { type: 'success', title: 'VENTA ONLINE', body: 'Nueva orden #1052 recibida.', time: 'Hace 12m' },
                    { type: 'info', title: 'SYNC ACCESS', body: 'Sincronización completada con éxito.', time: 'Hace 1h' }
                ];

                itemsContainer.innerHTML = alerts.map(a => `
                    <div class="p-4 hover:bg-stone-50 transition-colors cursor-pointer border-l-4 ${a.type === 'warning' ? 'border-red-500' : (a.type === 'success' ? 'border-primary' : 'border-stone-400')}">
                        <div class="flex justify-between items-start mb-1">
                            <span class="text-[9px] font-black uppercase tracking-widest ${a.type === 'warning' ? 'text-red-500' : 'text-stone-400'}">${a.title}</span>
                            <span class="text-[8px] font-bold text-stone-300 uppercase">${a.time}</span>
                        </div>
                        <p class="text-xs text-text-dark font-medium">${a.body}</p>
                    </div>
                `).join('');
                
                badge.classList.add('hidden');
            }, 800);
        }
    });
  </script>
@endsection
