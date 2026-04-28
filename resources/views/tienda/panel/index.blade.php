@extends('tienda.panel.layout')
@section('title', 'Dashboard - Mi Cuenta')
@section('content')
<div class="max-w-[1920px] mx-auto px-6 py-12">
    <header class="mb-12">
        <span class="text-primary font-black text-[10px] uppercase tracking-[0.4em] mb-2 block">Terminal de Cliente v4.0</span>
        <h2 class="text-5xl font-headline font-black text-stone-900 uppercase tracking-tighter italic">Bienvenido, <span class="text-stone-300">{{ $user->name }}</span></h2>
    </header>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
        <!-- KPI: Total Ordenes -->
        <div class="bg-white rounded-[32px] shadow-xl p-8 border border-stone-100 relative overflow-hidden group hover:border-primary/20 transition-all">
            <div class="relative z-10">
                <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em] mb-4 italic">Volumen Operativo</p>
                <div class="flex items-end justify-between">
                    <p class="text-4xl font-headline font-black text-stone-900 tracking-tighter leading-none">{{ $totalOrders }}</p>
                    <span class="material-symbols-outlined text-primary text-3xl">inventory_2</span>
                </div>
            </div>
            <div class="absolute -right-4 -bottom-4 opacity-[0.02] group-hover:scale-110 transition-transform duration-700">
                <span class="material-symbols-outlined text-7xl">grid_view</span>
            </div>
        </div>

        <!-- KPI: Pendientes -->
        <div class="bg-white rounded-[32px] shadow-xl p-8 border border-stone-100 relative overflow-hidden group hover:border-amber-500/20 transition-all">
            <div class="relative z-10">
                <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em] mb-4 italic">En Tránsito</p>
                <div class="flex items-end justify-between">
                    <p class="text-4xl font-headline font-black text-stone-900 tracking-tighter leading-none">{{ $pendingOrders }}</p>
                    <span class="material-symbols-outlined text-amber-500 text-3xl">pending_actions</span>
                </div>
            </div>
            <div class="absolute -right-4 -bottom-4 opacity-[0.02] group-hover:scale-110 transition-transform duration-700">
                <span class="material-symbols-outlined text-7xl">schedule</span>
            </div>
        </div>

        <!-- KPI: Completadas -->
        <div class="bg-stone-900 rounded-[32px] shadow-xl p-8 border border-white/5 relative overflow-hidden group transition-all">
            <div class="relative z-10">
                <p class="text-[10px] font-black text-stone-500 uppercase tracking-[0.3em] mb-4 italic">Liquidadas</p>
                <div class="flex items-end justify-between">
                    <p class="text-4xl font-headline font-black text-white tracking-tighter leading-none">{{ $completedOrders }}</p>
                    <span class="material-symbols-outlined text-green-500 text-3xl">verified</span>
                </div>
            </div>
            <div class="absolute -right-4 -bottom-4 opacity-[0.05]">
                <span class="material-symbols-outlined text-7xl text-white">check_circle</span>
            </div>
        </div>

        <!-- KPI: Canceladas -->
        <div class="bg-white rounded-[32px] shadow-xl p-8 border border-stone-100 relative overflow-hidden group hover:border-red-500/20 transition-all">
            <div class="relative z-10">
                <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em] mb-4 italic">Anulaciones</p>
                <div class="flex items-end justify-between">
                    <p class="text-4xl font-headline font-black text-stone-900 tracking-tighter leading-none">{{ $cancelledOrders }}</p>
                    <span class="material-symbols-outlined text-red-500 text-3xl">block</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Spending Banner -->
    <div class="bg-stone-950 rounded-[40px] p-10 mb-12 text-white relative overflow-hidden border border-white/5 shadow-2xl flex flex-col md:flex-row justify-between items-center gap-8">
        <div class="relative z-10 text-center md:text-left">
            <span class="text-primary font-black text-[10px] uppercase tracking-[0.5em] mb-4 block">Inversión Logística Acumulada</span>
            <h3 class="text-6xl font-headline font-black tracking-tighter italic leading-none">$ {{ number_format($totalSpent, 2) }}</h3>
            <p class="text-stone-500 text-[10px] font-black uppercase tracking-[0.3em] mt-4 font-mono">Consolidado Fiscal - Cauplas Vzla C.A.</p>
        </div>
        <div class="relative z-10">
            <a href="{{ route('tienda.panel.ordenes') }}" class="bg-primary text-black font-black uppercase py-4 px-10 rounded-2xl tracking-[0.2em] text-[10px] hover:scale-105 transition-all shadow-xl shadow-primary/20">
                Auditar Historial Completo
            </a>
        </div>
        <!-- Decoration -->
        <div class="absolute right-0 top-0 w-1/2 h-full bg-gradient-to-l from-primary/5 to-transparent pointer-events-none"></div>
    </div>

    <!-- Recent Orders Table -->
    <div class="bg-white rounded-[40px] shadow-2xl border border-stone-200 overflow-hidden relative">
        <div class="p-10 border-b border-stone-50 flex justify-between items-center bg-stone-50/30">
            <h3 class="text-[14px] font-black text-stone-900 uppercase tracking-[0.2em] italic flex items-center gap-3">
                <span class="w-2 h-8 bg-primary rounded-full"></span>
                Transacciones Recientes
            </h3>
            <a href="{{ route('tienda.panel.ordenes') }}" class="text-[10px] font-black text-stone-400 hover:text-primary uppercase tracking-widest transition-all">Ver Todas →</a>
        </div>
        
        <table class="w-full text-left zenith-table-main">
            <thead class="zenith-table-header uppercase italic">
                <tr>
                    <th class="py-5 px-10">Registro</th>
                    <th class="py-5 px-10">Fecha</th>
                    <th class="py-5 px-10 text-center">Estatus</th>
                    <th class="py-5 px-10 text-right">Liquidez</th>
                    <th class="py-5 px-10 text-center">Acción</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-stone-50">
                @forelse($recentOrders as $order)
                <tr class="bg-white hover:bg-stone-50/50 transition-colors group">
                    <td class="py-6 px-10 font-mono text-[10.5px] font-bold text-stone-400 group-hover:text-primary tracking-tighter">ZEN-{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</td>
                    <td class="py-6 px-10 font-black uppercase text-stone-900 italic tracking-tight">{{ $order->created_at->format('d/M/y') }}</td>
                    <td class="py-6 px-10 text-center">
                        <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-[9px] font-black uppercase tracking-widest border bg-stone-900
                            @if($order->estado == 'Pagado') text-green-500 border-green-500/20 
                            @elseif($order->estado == 'Pendiente') text-amber-500 border-amber-500/20 
                            @elseif($order->estado == 'Cancelado') text-red-500 border-red-500/20 
                            @else text-stone-400 border-stone-800 @endif leading-none">
                            <span class="w-1.5 h-1.5 rounded-full @if($order->estado == 'Pagado') bg-green-500 @elseif($order->estado == 'Pendiente') bg-amber-500 @else bg-red-500 @endif"></span>
                            {{ $order->estado }}
                        </span>
                    </td>
                    <td class="py-6 px-10 text-right font-mono text-[11px] font-bold text-stone-950 tracking-tighter">$ {{ number_format($order->total, 2) }}</td>
                    <td class="py-6 px-10 text-center">
                        <a href="{{ route('tienda.panel.detalle-orden', $order->id) }}" class="text-[10px] font-black uppercase tracking-widest text-stone-400 hover:text-black transition-all flex items-center justify-center gap-2">
                             Auditar <span class="material-symbols-outlined text-[16px]">chevron_right</span>
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="py-32 text-center text-stone-400 font-black uppercase tracking-[0.2em] italic text-[11px]">No se detectó actividad comercial reciente.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection