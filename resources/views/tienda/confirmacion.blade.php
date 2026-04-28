@extends('layouts.ecommerce')

@section('title', 'Pedido Confirmado | Mayor de Repuesto LA CIMA, C.A.')

@push('styles')
    <link rel="stylesheet" href="css/confirmacion.css">
@endpush

@section('content')
<main class="flex-grow w-full max-w-screen-2xl mx-auto px-6 md:px-12 pt-32 pb-24 relative z-10">
    <div class="text-center mb-16">
        <span class="material-symbols-outlined text-8xl text-green-500 mb-4">check_circle</span>
        <h1 class="text-6xl font-black text-black uppercase tracking-tighter leading-none mb-4">Pedido <span class="text-primary italic">Confirmado</span></h1>
        <p class="text-stone-500 text-lg">Tu orden ha sido procesada exitosamente</p>
    </div>

    <div class="max-w-3xl mx-auto bg-white rounded-[40px] border border-stone-200 p-12 shadow-2xl relative overflow-hidden">
        <div class="absolute -right-20 -top-20 opacity-[0.03] pointer-events-none">
            <span class="material-symbols-outlined text-[300px]">description</span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-12">
            <div class="p-6 bg-stone-50 rounded-3xl border border-stone-100">
                <p class="text-[10px] font-black uppercase tracking-[0.3em] text-stone-400 mb-3 italic">Identificador de Orden</p>
                <p class="text-3xl font-headline font-black text-stone-900 tracking-tighter italic uppercase leading-none">#{{ $order->numero_orden }}</p>
            </div>
            <div class="p-6 bg-stone-50 rounded-3xl border border-stone-100">
                <p class="text-[10px] font-black uppercase tracking-[0.3em] text-stone-400 mb-3 italic">Registro Temporal</p>
                <p class="text-xl font-mono font-bold text-stone-800 tracking-tight">{{ $order->created_at->format('d/m/Y - h:i A') }}</p>
            </div>
        </div>

        <div class="bg-stone-900 p-8 rounded-3xl mb-12 shadow-xl border border-white/5">
            <p class="text-[10px] font-black uppercase tracking-[0.3em] text-primary mb-6 italic leading-none border-b border-white/10 pb-4">Consignatario Autorizado</p>
            <p class="font-headline text-xl font-black text-white uppercase tracking-tight mb-1">{{ $order->customer->razon_social }}</p>
            <p class="text-[11px] font-mono font-bold text-stone-400 tracking-widest">{{ $order->customer->rif }}</p>
        </div>

        <div class="mb-10">
            <p class="text-[10px] font-black uppercase tracking-[0.3em] text-stone-400 mb-6 italic">Auditoria de Ítems Adquiridos</p>
            <div class="space-y-4 max-h-[300px] overflow-y-auto pr-2 custom-scrollbar">
                @foreach($order->items as $item)
                <div class="flex justify-between items-center group py-2 border-b border-stone-50">
                    <div class="flex flex-col">
                        <span class="text-[12px] font-black text-stone-900 uppercase tracking-tight group-hover:text-primary transition-colors">{{ $item->product->nombre }}</span>
                        <span class="text-[9px] text-stone-400 font-bold uppercase tracking-widest">{{ $item->cantidad }} UNIDADES</span>
                    </div>
                    <span class="text-[11px] font-mono font-bold text-stone-500">$ {{ number_format($item->subtotal, 2) }}</span>
                </div>
                @endforeach
            </div>
        </div>

        <div class="pt-8 border-t border-stone-200 flex justify-between items-end">
            <div class="flex flex-col">
                <span class="text-stone-400 text-[10px] font-black uppercase tracking-[0.4em] mb-1">Total Liquidado</span>
                <span class="text-stone-300 text-[8px] font-bold uppercase font-mono italic">Transacción B2B Exitosa</span>
            </div>
            <span class="text-5xl font-headline font-black text-stone-950 tracking-tighter italic leading-none">$ {{ number_format($order->total, 2) }}</span>
        </div>

        <div class="mt-12 flex flex-col md:flex-row gap-4">
            <a href="{{ url('/tienda/index') }}" class="flex-1 bg-stone-900 text-primary font-black uppercase py-5 rounded-2xl tracking-[0.2em] text-[10px] hover:bg-stone-800 transition-all text-center flex items-center justify-center gap-2 group">
                <span class="material-symbols-outlined text-lg">home</span>
                Panel de Inicio
            </a>
            <button onclick="window.print()" class="flex-1 border-2 border-stone-100 text-stone-400 font-black uppercase py-5 rounded-2xl tracking-[0.2em] text-[10px] hover:bg-stone-50 hover:text-stone-600 transition-all flex items-center justify-center gap-2 group">
                <span class="material-symbols-outlined text-lg">print</span>
                Imprimir Recibo
            </button>
        </div>
    </div>

    <div class="text-center mt-16">
        <a href="{{ url('/tienda/catalogo_general') }}" class="text-[11px] font-black text-stone-400 hover:text-primary uppercase tracking-[0.3em] transition-all italic underline underline-offset-8 decoration-primary/20">
            Explorar Nuevos Repuestos →
        </a>
    </div>
</main>
@endsection