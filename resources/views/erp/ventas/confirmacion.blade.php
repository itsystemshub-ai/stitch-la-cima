@extends('erp.layouts.app')

@section('title', 'Orden Confirmada')

@section('breadcrumb')
    <a href="{{ url('/erp/inicio') }}" class="hover:text-stone-900 transition-colors">ERP</a>
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <a href="{{ url('/erp/ventas') }}" class="hover:text-stone-900 transition-colors">Ventas</a>
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <span class="text-stone-900">Confirmación</span>
@endsection

@section('content')
    <div class="flex flex-col items-center justify-center min-h-[60vh] text-center px-6">
        <!-- Success Icon -->
        <div class="w-32 h-32 bg-stone-50 rounded-full flex items-center justify-center mb-10 relative">
            <div class="absolute inset-0 bg-primary/10 rounded-full animate-ping"></div>
            <span class="material-symbols-outlined text-6xl text-primary relative z-10">verified</span>
        </div>

        <div class="max-w-2xl mb-12">
            <div class="flex items-center justify-center gap-2 mb-4">
                <span class="w-8 h-[2px] bg-primary"></span>
                <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em]">Operación Exitosa</p>
                <span class="w-8 h-[2px] bg-primary"></span>
            </div>
            <h1 class="text-6xl font-headline font-black text-stone-900 tracking-tighter uppercase leading-tight mb-4 tracking-[-0.04em]">Orden <span class="text-stone-400 italic font-medium">Confirmada</span></h1>
            <p class="text-stone-500 font-bold uppercase text-xs tracking-widest leading-relaxed">El documento #ORD-2023-9941 ha sido emitido y guardado en los registros fiscales de la empresa de manera exitosa.</p>
        </div>

        <div class="flex flex-col md:flex-row gap-4">
            <button class="bg-stone-900 text-primary px-12 py-5 text-[11px] font-black uppercase tracking-[0.2em] rounded-2xl shadow-xl hover:bg-black transition-all">
                Imprimir Documento
            </button>
            <a href="{{ url('/erp/ventas/historial') }}" class="bg-white border border-stone-200 text-stone-900 px-12 py-5 text-[11px] font-black uppercase tracking-[0.2em] rounded-2xl hover:border-primary transition-all">
                Ver Historial de Ventas
            </a>
        </div>
    </div>
@endsection
