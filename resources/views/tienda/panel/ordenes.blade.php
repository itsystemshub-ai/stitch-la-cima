@extends('tienda.panel.layout')
@section('title', 'Mis Ordenes')
@section('content')
<div class="max-w-[1920px] mx-auto px-6 py-12">
    <div class="mb-12">
        <span class="text-primary font-black text-[10px] uppercase tracking-[0.4em] mb-2 block">Protocolo de Registro B2B</span>
        <h2 class="text-5xl font-headline font-black text-stone-900 uppercase tracking-tighter italic">Historial de <span class="text-stone-300">Transacciones</span></h2>
    </div>

    <div class="bg-white rounded-[40px] shadow-2xl border border-stone-200 overflow-hidden relative">
        <div class="absolute -right-20 -top-20 opacity-[0.02] pointer-events-none">
            <span class="material-symbols-outlined text-[300px]">history</span>
        </div>

        <table class="w-full text-left zenith-table-main">
            <thead class="zenith-table-header uppercase italic">
                <tr>
                    <th class="py-5 px-8">ID de Registro</th>
                    <th class="py-5 px-8">Fecha de Emisión</th>
                    <th class="py-5 px-8 text-center">Estado Operativo</th>
                    <th class="py-5 px-8 text-right">Total Liquidado</th>
                    <th class="py-5 px-8 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-stone-100">
                @forelse($orders as $order)
                <tr class="bg-white hover:bg-stone-50/50 transition-colors group">
                    <td class="py-5 px-8 font-mono text-[10.5px] font-bold text-stone-400 group-hover:text-primary transition-colors">ZEN-{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</td>
                    <td class="py-5 px-8 font-black uppercase text-stone-900 tracking-tight">{{ $order->created_at->format('d/M/Y') }}</td>
                    <td class="py-5 px-8 text-center">
                        <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-[9px] font-black uppercase tracking-widest border
                            @if($order->status == 'completed') bg-stone-900 text-green-500 border-green-500/30 
                            @elseif($order->status == 'pending') bg-stone-900 text-amber-500 border-amber-500/30 
                            @elseif($order->status == 'cancelled') bg-stone-900 text-red-500 border-red-500/30 
                            @else bg-stone-900 text-stone-400 border-stone-800 @endif leading-none">
                            <span class="w-1.5 h-1.5 rounded-full 
                                @if($order->status == 'completed') bg-green-500 animate-pulse 
                                @elseif($order->status == 'pending') bg-amber-500 
                                @elseif($order->status == 'cancelled') bg-red-500 
                                @else bg-stone-500 @endif"></span>
                            {{ ucfirst($order->status) }}
                        </span>
                    </td>
                    <td class="py-5 px-8 text-right font-mono text-[11px] font-bold text-stone-900">$ {{ number_format($order->total_amount, 2) }}</td>
                    <td class="py-5 px-8 text-center">
                        <a href="{{ route('tienda.panel.detalle-orden', $order->id) }}" class="inline-flex items-center gap-2 text-stone-900 hover:text-primary font-black uppercase text-[10px] tracking-widest bg-stone-50 hover:bg-stone-900 px-4 py-2 rounded-xl border border-stone-100 transition-all active:scale-95">
                            <span class="material-symbols-outlined text-[14px]">visibility</span>
                            Auditar
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="py-32 text-center">
                        <span class="material-symbols-outlined text-7xl text-stone-200 mb-4 block">history_toggle_off</span>
                        <p class="text-stone-400 font-black text-[12px] uppercase tracking-[0.3em] italic">No se detectaron transacciones en este registro fiscal.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        @if($orders->hasPages())
        <div class="px-8 py-6 bg-stone-50/50 border-t border-stone-100">
            {{ $orders->links() }}
        </div>
        @endif
    </div>
</div>
@endsection