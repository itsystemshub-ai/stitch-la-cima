@extends('tienda.panel.layout')
@section('title', 'Compras Canceladas')
@section('content')
<div class="max-w-[1920px] mx-auto px-6 py-12">
    <div class="mb-12">
        <span class="text-red-500 font-black text-[10px] uppercase tracking-[0.4em] mb-2 block italic">Registro de Excepciones Operativas</span>
        <h2 class="text-5xl font-headline font-black text-stone-900 uppercase tracking-tighter italic">Compras <span class="text-stone-300">Anuladas</span></h2>
    </div>

    <div class="bg-white rounded-[40px] shadow-2xl border border-stone-200 overflow-hidden relative border-red-500/10">
        <!-- Decoration -->
        <div class="absolute -right-20 -top-20 opacity-[0.02] pointer-events-none">
            <span class="material-symbols-outlined text-[300px] text-red-500">block</span>
        </div>

        <table class="w-full text-left zenith-table-main">
            <thead class="zenith-table-header uppercase italic">
                <tr>
                    <th class="py-5 px-10">Referencia de Anulación</th>
                    <th class="py-5 px-10">Cronología</th>
                    <th class="py-5 px-10 text-right">Monto No Versado</th>
                    <th class="py-5 px-10">Dictamen de Cancelación</th>
                    <th class="py-5 px-10 text-center">Protocolo</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-stone-50">
                @forelse($cancelledOrders as $order)
                <tr class="bg-white hover:bg-red-50/30 transition-colors group">
                    <td class="py-6 px-10 font-mono text-[10.5px] font-bold text-red-400 tracking-tighter italic">ZEN-ERR-{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</td>
                    <td class="py-6 px-10 font-black uppercase text-stone-900 tracking-tight leading-none italic">
                        {{ $order->created_at->format('d/M/Y H:i') }}
                    </td>
                    <td class="py-6 px-10 text-right font-mono text-[11px] font-bold text-stone-400 line-through decoration-red-500/30">
                        $ {{ number_format($order->total_amount, 2) }}
                    </td>
                    <td class="py-6 px-10 text-[12px] font-bold text-stone-500 italic uppercase tracking-tight">
                        {{ $order->cancellation_reason ?? 'Protocolo General de Anulación' }}
                    </td>
                    <td class="py-6 px-10 text-center">
                        <a href="{{ route('tienda.panel.detalle-orden', $order->id) }}" class="text-[10px] font-black uppercase tracking-widest text-stone-400 hover:text-red-500 transition-all flex items-center justify-center gap-2">
                             Auditar <span class="material-symbols-outlined text-[16px]">search</span>
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="py-32 text-center text-stone-300 font-black uppercase tracking-[0.2em] italic text-[11px]">No se detectaron anulaciones en este periodo fiscal.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        @if($cancelledOrders->hasPages())
        <div class="px-10 py-6 bg-stone-50/50 border-t border-stone-100">
            {{ $cancelledOrders->links() }}
        </div>
        @endif
    </div>
</div>
@endsection