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

    <div class="max-w-3xl mx-auto bg-white rounded-2xl border border-stone-200 p-8">
        <div class="grid grid-cols-2 gap-8 mb-8">
            <div>
                <p class="text-[10px] font-black uppercase tracking-widest text-stone-400 mb-1">Número de Orden</p>
                <p class="text-2xl font-black text-black">{{ $order->numero_orden }}</p>
            </div>
            <div>
                <p class="text-[10px] font-black uppercase tracking-widest text-stone-400 mb-1">Fecha</p>
                <p class="text-xl font-bold text-black">{{ $order->created_at->format('d/m/Y h:i A') }}</p>
            </div>
        </div>

        <div class="border-t border-b border-stone-200 py-6 mb-6">
            <p class="text-[10px] font-black uppercase tracking-widest text-stone-400 mb-4">Datos del Cliente</p>
            <p class="font-bold">{{ $order->customer->razon_social }}</p>
            <p class="text-stone-500">{{ $order->customer->rif }}</p>
        </div>

        <div class="border-b border-stone-200 pb-6 mb-6">
            <p class="text-[10px] font-black uppercase tracking-widest text-stone-400 mb-4">Productos</p>
            @foreach($order->items as $item)
            <div class="flex justify-between py-2">
                <span>{{ $item->cantidad }}x {{ $item->product->nombre }}</span>
                <span class="font-bold">${{ number_format($item->subtotal, 2) }}</span>
            </div>
            @endforeach
        </div>

        <div class="flex justify-between text-xl font-black">
            <span>Total</span>
            <span class="text-primary">${{ number_format($order->total, 2) }}</span>
        </div>

        <div class="mt-8 text-center">
            <p class="text-stone-500 text-sm mb-4">¿Necesitas ayuda con tu pedido?</p>
            <a href="{{ url('/tienda/contacto') }}" class="inline-block bg-black text-primary font-black uppercase py-3 px-8 tracking-[0.2em] text-xs hover:bg-stone-800">
                Contactar Soporte
            </a>
        </div>
    </div>

    <div class="text-center mt-12">
        <a href="{{ url('/tienda/catalogo_general') }}" class="text-stone-500 hover:text-black font-bold uppercase tracking-wider text-sm">
            ← Continuar Comprando
        </a>
    </div>
</main>
@endsection