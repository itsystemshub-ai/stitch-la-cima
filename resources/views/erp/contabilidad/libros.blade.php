@extends('erp.layouts.app')

@section('title', 'Libros Contables')

@section('breadcrumb')
    <a href="{{ route('erp.contabilidad.index') }}" class="text-stone-500 hover:text-stone-900 transition-colors">Contabilidad</a>
    <span class="mx-2 text-stone-300">/</span>
    <span class="text-stone-900">Libros Contables</span>
@endsection

@section('content')
<div class="max-w-6xl mx-auto">
    <!-- Header -->
    <div class="mb-10 text-center">
        <p class="text-[10px] font-black text-primary uppercase tracking-[0.4em] mb-3">Registros Legales y Fiscales</p>
        <h2 class="text-4xl font-headline font-black text-stone-950 italic uppercase tracking-tight">
            Portal de Libros <span class="text-stone-300 not-italic">Contables</span>
        </h2>
        <div class="w-16 h-1 bg-primary mx-auto mt-6 rounded-full"></div>
    </div>

    <!-- Portal Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pb-12">
        
        <!-- Libro Diario -->
        <a href="{{ route('erp.contabilidad.libro-diario') }}" class="group bg-white border border-stone-100 p-8 rounded-3xl hover:shadow-2xl hover:shadow-stone-200 hover:-translate-y-2 transition-all duration-500 relative overflow-hidden">
            <div class="absolute -right-4 -bottom-4 opacity-5 group-hover:opacity-10 transition-opacity">
                <span class="material-symbols-outlined text-[140px]">menu_book</span>
            </div>
            <div class="flex items-start gap-6 relative z-10">
                <div class="w-14 h-14 bg-stone-950 text-primary rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-500">
                    <span class="material-symbols-outlined text-3xl">menu_book</span>
                </div>
                <div class="flex-1">
                    <h3 class="text-xl font-headline font-black text-stone-900 uppercase italic tracking-tight mb-2">Libro Diario</h3>
                    <p class="text-stone-400 text-[10px] font-bold uppercase tracking-widest leading-relaxed">
                        Registro cronológico de todas las operaciones contables, asientos y movimientos patrimoniales del ejercicio fiscal actal.
                    </p>
                    <div class="mt-6 flex items-center gap-2 text-[10px] font-black text-primary uppercase tracking-tighter group-hover:gap-4 transition-all">
                        <span>Acceder al Registro</span>
                        <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </div>
                </div>
            </div>
        </a>

        <!-- Libro de Ventas -->
        <a href="{{ route('erp.contabilidad.libro-ventas') }}" class="group bg-white border border-stone-100 p-8 rounded-3xl hover:shadow-2xl hover:shadow-stone-200 hover:-translate-y-2 transition-all duration-500 relative overflow-hidden">
            <div class="absolute -right-4 -bottom-4 opacity-5 group-hover:opacity-10 transition-opacity">
                <span class="material-symbols-outlined text-[140px]">chrome_reader_mode</span>
            </div>
            <div class="flex items-start gap-6 relative z-10">
                <div class="w-14 h-14 bg-primary text-stone-900 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-500">
                    <span class="material-symbols-outlined text-3xl">chrome_reader_mode</span>
                </div>
                <div class="flex-1">
                    <h3 class="text-xl font-headline font-black text-stone-900 uppercase italic tracking-tight mb-2">Libro de Ventas</h3>
                    <p class="text-stone-400 text-[10px] font-bold uppercase tracking-widest leading-relaxed">
                        Control detallado de facturación, notas de crédito e IVA debito fiscal generado por las transacciones comerciales.
                    </p>
                    <div class="mt-6 flex items-center gap-2 text-[10px] font-black text-stone-900 uppercase tracking-tighter group-hover:gap-4 transition-all">
                        <span>Generar Libro de Ventas</span>
                        <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </div>
                </div>
            </div>
        </a>

        <!-- Libro de Caja -->
        <a href="{{ route('erp.contabilidad.libro-caja') }}" class="group bg-white border border-stone-100 p-8 rounded-3xl hover:shadow-2xl hover:shadow-stone-200 hover:-translate-y-2 transition-all duration-500 relative overflow-hidden">
            <div class="absolute -right-4 -bottom-4 opacity-5 group-hover:opacity-10 transition-opacity">
                <span class="material-symbols-outlined text-[140px]">savings</span>
            </div>
            <div class="flex items-start gap-6 relative z-10">
                <div class="w-14 h-14 bg-stone-100 text-stone-400 rounded-2xl flex items-center justify-center group-hover:bg-green-50 group-hover:text-green-600 transition-colors duration-500">
                    <span class="material-symbols-outlined text-3xl font-black">savings</span>
                </div>
                <div class="flex-1">
                    <h3 class="text-xl font-headline font-black text-stone-900 uppercase italic tracking-tight mb-2">Libro de Caja</h3>
                    <p class="text-stone-400 text-[10px] font-bold uppercase tracking-widest leading-relaxed">
                        Auditoría de ingresos y egresos de efectivo. Conciliación diaria del flujo de caja de la tesorería corporativa.
                    </p>
                    <div class="mt-6 flex items-center gap-2 text-[10px] font-black text-stone-400 uppercase tracking-tighter group-hover:text-green-600 group-hover:gap-4 transition-all">
                        <span>Auditar Movimientos</span>
                        <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </div>
                </div>
            </div>
        </a>

        <!-- Libros Legales -->
        <a href="{{ route('erp.contabilidad.libros-legales') }}" class="group bg-stone-950 p-8 rounded-3xl shadow-xl hover:shadow-stone-400 hover:-translate-y-2 transition-all duration-500 relative overflow-hidden">
            <div class="absolute -right-4 -bottom-4 opacity-10">
                <span class="material-symbols-outlined text-[140px] text-white">gavel</span>
            </div>
            <div class="flex items-start gap-6 relative z-10">
                <div class="w-14 h-14 bg-primary text-stone-950 rounded-2xl flex items-center justify-center group-hover:rotate-12 transition-transform duration-500">
                    <span class="material-symbols-outlined text-3xl font-black">law</span>
                </div>
                <div class="flex-1">
                    <h3 class="text-xl font-headline font-black text-white uppercase italic tracking-tight mb-2">Libros Legales</h3>
                    <p class="text-stone-400 text-[10px] font-bold uppercase tracking-widest leading-relaxed">
                        Preparación de Libros de Compras, Ventas e Inventario según normativas vigentes para declaraciones ante el SENIAT.
                    </p>
                    <div class="mt-6 flex items-center gap-2 text-[10px] font-black text-primary uppercase tracking-tighter group-hover:gap-4 transition-all">
                        <span>Revisar Cumplimiento</span>
                        <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </div>
                </div>
            </div>
        </a>

    </div>

    <!-- Advisory -->
    <div class="bg-primary/10 border border-primary/20 p-6 rounded-2xl flex items-center gap-6">
        <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center text-stone-950 flex-shrink-0 animate-pulse">
            <span class="material-symbols-outlined text-xl">verified</span>
        </div>
        <p class="text-[10px] font-black text-stone-900 uppercase tracking-widest leading-normal">
            Todos los libros generados en este portal cumplen con los estándares contables VEN-NIF y están listos para ser auditados o presentados ante organismos reguladores.
        </p>
    </div>
</div>
@endsection
