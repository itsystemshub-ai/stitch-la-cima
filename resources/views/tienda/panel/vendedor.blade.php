@extends('tienda.panel.layout')
@section('title', 'Panel Vendedor')
@section('content')
<div class="max-w-[1920px] mx-auto px-6 py-12">
    <div class="mb-12">
        <span class="text-primary font-black text-[10px] uppercase tracking-[0.4em] mb-2 block italic">División de Inteligencia Comercial</span>
         <h2 class="text-3xl font-headline font-black text-stone-900 uppercase tracking-tighter italic">Panel de <span class="text-stone-300">Vendedor</span></h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
        <!-- KPI: Total Ventas -->
        <div class="bg-white rounded-[32px] shadow-xl p-8 border border-stone-100 relative overflow-hidden group">
            <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em] mb-4 italic">Volumen Acumulado</p>
            <div class="flex items-end justify-between">
                 <p class="text-2xl font-headline font-black text-stone-950 tracking-tighter leading-none">{{ $totalVentas }} <span class="text-[12px] text-stone-300">TRANSACCIONES</span></p>
                <span class="material-symbols-outlined text-green-500 text-3xl">analytics</span>
            </div>
        </div>

        <!-- KPI: Ventas Mes -->
        <div class="bg-white rounded-[32px] shadow-xl p-8 border border-stone-100 relative overflow-hidden group">
            <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em] mb-4 italic">Cierre Mensual Actual</p>
            <div class="flex items-end justify-between">
                <p class="text-4xl font-headline font-black text-stone-950 tracking-tighter leading-none">{{ $ventasDelMes }} <span class="text-[12px] text-stone-300">OPERACIONES</span></p>
                <span class="material-symbols-outlined text-primary text-3xl">calendar_month</span>
            </div>
        </div>

        <!-- KPI: Comision -->
        <div class="bg-stone-900 rounded-[32px] shadow-xl p-8 border border-white/5 relative overflow-hidden group">
            <p class="text-[10px] font-black text-stone-500 uppercase tracking-[0.3em] mb-4 italic">Liquidación de Comisiones</p>
            <div class="flex items-end justify-between">
                <p class="text-4xl font-headline font-black text-white tracking-tighter leading-none">$ {{ number_format($comisionTotal, 2) }}</p>
                <span class="material-symbols-outlined text-primary text-3xl italic">payments</span>
            </div>
            <div class="absolute -right-4 -bottom-4 opacity-[0.05]">
                     <span class="material-symbols-outlined text-4xl text-white">paid</span>
            </div>
        </div>
    </div>

    <!-- Sales Table -->
    <div class="bg-white rounded-[40px] shadow-2xl border border-stone-200 overflow-hidden relative">
        <div class="p-10 border-b border-stone-50 flex justify-between items-center bg-stone-50/30">
            <h3 class="text-[14px] font-black text-stone-900 uppercase tracking-[0.2em] italic flex items-center gap-3">
                <span class="w-2 h-8 bg-primary rounded-full"></span>
                Registro de Gestión Comercial
            </h3>
        </div>

        <table class="w-full text-left zenith-table-main">
            <thead class="zenith-table-header uppercase italic">
                <tr>
                    <th class="py-5 px-10">Referencia</th>
                    <th class="py-5 px-10">Identidad Cliente</th>
                    <th class="py-5 px-10">Fecha Registro</th>
                    <th class="py-5 px-10 text-right">Inversión</th>
                    <th class="py-5 px-10 text-center">Incentivo</th>
                    <th class="py-5 px-10 text-center">Estado Gestión</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-stone-50">
                @forelse($misVentas as $venta)
                <tr class="bg-white hover:bg-stone-50/50 transition-colors group">
                    <td class="py-6 px-10 font-mono text-[10.5px] font-bold text-stone-400 group-hover:text-primary tracking-tighter">ZEN-S-{{ str_pad($venta->id, 6, '0', STR_PAD_LEFT) }}</td>
                    <td class="py-6 px-10 font-black uppercase text-stone-900 tracking-tight leading-none group-hover:translate-x-1 transition-transform">
                        {{ $venta->customer->name ?? 'INSTITUCIONAL N/A' }}
                    </td>
                    <td class="py-6 px-10 text-stone-400 font-bold uppercase text-[10px] tracking-widest italic">
                        {{ $venta->created_at->format('d/M/Y') }}
                    </td>
                    <td class="py-6 px-10 text-right font-mono text-[11px] font-bold text-stone-950 tracking-tighter">
                        $ {{ number_format($venta->total_amount, 2) }}
                    </td>
                    <td class="py-6 px-10 text-center">
                        <span class="text-green-600 font-mono text-[10.5px] font-black tracking-widest">+ $ {{ number_format($venta->commission_amount, 2) }}</span>
                    </td>
                    <td class="py-6 px-10 text-center">
                        <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-[9px] font-black uppercase tracking-widest border bg-stone-900 leading-none
                            @if($venta->status == 'completed') text-green-500 border-green-500/20 
                            @elseif($venta->status == 'pending') text-amber-500 border-amber-500/20 
                            @elseif($venta->status == 'cancelled') text-red-500 border-red-500/20 
                            @else text-stone-400 border-stone-800 @endif">
                            <span class="w-1.5 h-1.5 rounded-full @if($venta->status == 'completed') bg-green-500 animate-pulse @elseif($venta->status == 'pending') bg-amber-500 @else bg-red-500 @endif"></span>
                            {{ $venta->status }}
                        </span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="py-32 text-center text-stone-400 font-black uppercase tracking-[0.2em] italic text-[11px]">No se detectaron operaciones comerciales asignadas.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection