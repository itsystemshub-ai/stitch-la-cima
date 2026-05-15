@extends('erp.layouts.app')

@section('title', 'Punto de Venta (POS)')

@section('content')
<div class="bg-white p-8 rounded-2xl border border-stone-200 shadow-sm min-h-[400px] flex flex-col items-center justify-center text-center">
    <div class="w-20 h-20 bg-primary/10 text-primary-dark rounded-full flex items-center justify-center mb-6">
        <span class="material-symbols-outlined text-4xl">point_of_sale</span>
    </div>
    <h1 class="text-2xl font-black text-stone-900 uppercase tracking-tight">Módulo de Punto de Venta</h1>
    <p class="text-stone-400 font-bold uppercase text-[12px] tracking-widest mt-2">Preparando interfaz avanzada de facturación rápida...</p>
    <div class="mt-8 flex gap-4">
        <div class="w-3 h-3 bg-primary rounded-full animate-bounce"></div>
        <div class="w-3 h-3 bg-primary rounded-full animate-bounce [animation-delay:-.15s]"></div>
        <div class="w-3 h-3 bg-primary rounded-full animate-bounce [animation-delay:-.3s]"></div>
    </div>
</div>
@endsection
