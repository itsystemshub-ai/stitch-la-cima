@extends('tienda.panel.layout')
@section('title', 'Orden ' . $order->id)
@section('content')
<div class="max-w-4xl mx-auto px-6 py-12">
    <a href="{{ route('tienda.panel.ordenes') }}" class="inline-flex items-center gap-2 text-stone-400 hover:text-black font-black uppercase text-[10px] tracking-[0.3em] mb-10 transition-all group">
        <span class="material-symbols-outlined text-sm group-hover:-translate-x-1 transition-transform">arrow_back</span>
        Retornar a Auditoría de Órdenes
    </a>

    <div class="bg-white rounded-[40px] shadow-2xl border border-stone-200 overflow-hidden relative">
        <!-- Watermark -->
        <div class="absolute -right-20 -top-20 opacity-[0.02] pointer-events-none">
            <span class="material-symbols-outlined text-[300px]">receipt_long</span>
        </div>

        <div class="p-10 border-b border-stone-100 bg-stone-50/50 flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
            <div>
                <span class="text-primary font-black text-[9px] uppercase tracking-[0.4em] mb-2 block italic">Registro de Transacción Consolidado</span>
                <h2 class="text-2xl font-headline font-black text-stone-900 uppercase tracking-tighter italic leading-none">Orden <span class="text-stone-300">#{{ $order->id }}</span></h2>
                <p class="text-[11px] font-mono font-bold text-stone-400 mt-2 tracking-widest">{{ $order->created_at->format('d/M/Y - H:i') }} VET</p>
            </div>
            
            <span class="inline-flex items-center gap-3 px-6 py-3 rounded-2xl text-[10px] font-black uppercase tracking-[0.2em] border shadow-sm
                @if($order->status == 'completed') bg-stone-900 text-green-500 border-green-500/30 
                @elseif($order->status == 'pending') bg-stone-900 text-amber-500 border-amber-500/30 
                @elseif($order->status == 'cancelled') bg-stone-900 text-red-500 border-red-500/30 
                @else bg-stone-900 text-stone-400 border-stone-800 @endif">
                <span class="w-2 h-2 rounded-full @if($order->status == 'completed') bg-green-500 animate-pulse @elseif($order->status == 'pending') bg-amber-500 @elseif($order->status == 'cancelled') bg-red-500 @else bg-stone-500 @endif"></span>
                {{ strtoupper($order->status) }}
            </span>
        </div>

        <div class="p-10">
            <h3 class="text-[10px] font-black uppercase tracking-[0.4em] text-stone-400 mb-8 italic">Desglose Técnico de Suministros</h3>
            
            <div class="space-y-4">
                @foreach($order->items as $item)
                <div class="flex items-center border border-stone-100 rounded-3xl p-6 hover:bg-stone-50 transition-all group shadow-sm hover:shadow-md">
                    <div class="w-20 h-20 bg-white border border-stone-100 rounded-2xl flex items-center justify-center text-stone-200 group-hover:text-primary transition-colors overflow-hidden">
                        @if($item->product && $item->product->image_url)
                            <img src="{{ $item->product->image_url }}" alt="" class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-opacity">
                        @else
                            <span class="material-symbols-outlined text-4xl">inventory_2</span>
                        @endif
                    </div>
                    
                    <div class="flex-1 ml-6">
                        <h4 class="text-[13px] font-black text-stone-900 uppercase tracking-tight mb-2 group-hover:text-primary transition-colors">{{ $item->product->name ?? 'Repuesto Industrial' }}</h4>
                        <div class="flex gap-4">
                            <span class="bg-stone-100 text-stone-500 px-3 py-1 rounded-lg text-[9px] font-black uppercase tracking-widest border border-stone-200">Cant: {{ $item->quantity }}</span>
                            <span class="text-stone-400 font-mono text-[10.5px] font-bold self-center">UND @ $ {{ number_format($item->price, 2) }}</span>
                        </div>
                    </div>
                    
                    <div class="text-right">
                        <span class="text-[10px] font-black text-stone-300 uppercase tracking-widest block mb-1">Subtotal</span>
                        <span class="text-[14px] font-mono font-bold text-stone-900 tracking-tighter">$ {{ number_format($item->price * $item->quantity, 2) }}</span>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Invoice Summary -->
            <div class="mt-12 pt-10 border-t border-stone-100">
                <div class="flex flex-col space-y-4 w-full md:w-80 ml-auto bg-stone-50/50 p-8 rounded-[40px] border border-stone-100">
                    <div class="flex justify-between items-center text-stone-500">
                        <span class="text-[10px] font-black uppercase tracking-widest">Base Imponible</span>
                        <span class="text-[11px] font-mono font-bold">$ {{ number_format($order->total_amount - $order->shipping_cost, 2) }}</span>
                    </div>
                    
                    <div class="flex justify-between items-center text-stone-500">
                        <span class="text-[10px] font-black uppercase tracking-widest">Logística / Envio</span>
                        <span class="text-[11px] font-mono font-bold">$ {{ number_format($order->shipping_cost, 2) }}</span>
                    </div>

                    @if($order->discount > 0)
                    <div class="flex justify-between items-center text-green-600">
                        <span class="text-[10px] font-black uppercase tracking-widest">Incentivo B2B</span>
                        <span class="text-[11px] font-mono font-bold">-$ {{ number_format($order->discount, 2) }}</span>
                    </div>
                    @endif

                    <div class="pt-6 border-t border-stone-200 flex justify-between items-end text-stone-950">
                        <span class="text-[12px] font-black uppercase tracking-[0.4em] mb-1 italic">Total Neto</span>
                        <span class="text-2xl font-mono font-bold tracking-tighter text-primary">$ {{ number_format($order->total_amount, 2) }}</span>
                    </div>
                </div>
                
                <div class="mt-12 flex justify-end gap-4">
                    <button onclick="window.print()" class="bg-black text-primary font-black uppercase py-4 px-10 rounded-2xl tracking-[0.2em] text-[10px] hover:bg-stone-800 transition-all flex items-center justify-center gap-2 group shadow-xl shadow-primary/5">
                        <span class="material-symbols-outlined text-lg">print</span>
                        Imprimir Protocolo
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection