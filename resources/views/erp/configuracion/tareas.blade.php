@extends('erp.layouts.app')

@section('title', 'Tareas Programadas')

@section('breadcrumb')
    <a href="{{ url('/erp/inicio') }}" class="hover:text-stone-900 transition-colors">ERP</a>
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <a href="{{ url('/erp/configuracion') }}" class="hover:text-stone-900 transition-colors">Configuración</a>
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <span class="text-stone-900">Tareas Programadas</span>
@endsection

@section('content')
    <!-- Page Header -->
    <header class="mb-10 flex flex-col md:flex-row md:items-end justify-between gap-6 border-b border-stone-100 pb-8">
        <div>
            <div class="flex items-center gap-2 mb-2">
                <span class="w-8 h-[2px] bg-primary"></span>
                <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em]">Automatización y Cron Jobs</p>
            </div>
            <h1 class="text-5xl font-headline font-black text-stone-900 tracking-tighter uppercase leading-none">Tareas <span class="text-stone-400">Programadas</span></h1>
            <p class="text-xs text-stone-400 mt-2 font-medium uppercase tracking-widest text-[#9ca3af]">MAYOR DE REPUESTO LA CIMA, C.A. • RIF: J-40308741-5</p>
        </div>
        <button class="bg-stone-900 text-primary px-10 py-4 text-[10px] font-black uppercase tracking-[0.2em] rounded-xl shadow-xl hover:bg-black transition-all">
            Nueva Tarea de Sistema
        </button>
    </header>

    <!-- Stats Grid -->
    <div class="grid grid-cols-12 gap-8 mb-12">
        <div class="col-span-12 lg:col-span-6 bg-white border border-stone-200 p-8 rounded-[32px] shadow-sm relative overflow-hidden group">
            <p class="text-[10px] font-black text-stone-400 uppercase tracking-widest mb-4">Estado del Motor de Tareas</p>
            <div class="flex items-center gap-4">
                <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></div>
                <h3 class="text-3xl font-headline font-black text-stone-900 uppercase tracking-tight">Activo / Operacional</h3>
            </div>
        </div>
        <div class="col-span-12 lg:col-span-6 bg-stone-900 p-8 rounded-[32px] shadow-xl">
            <p class="text-[10px] font-black text-primary uppercase tracking-widest mb-4">Carga en Cola</p>
            <h3 class="text-3xl font-headline font-black text-white uppercase tracking-tight">0 Pendientes</h3>
        </div>
    </div>

    <!-- Timeline / Task List -->
    <section class="space-y-4">
        <div class="bg-white border border-stone-100 p-6 rounded-2xl flex items-center justify-between hover:border-primary transition-all">
            <div class="flex items-center gap-6">
                <div class="w-12 h-12 bg-stone-50 rounded-xl flex items-center justify-center text-stone-900">
                    <span class="material-symbols-outlined uppercase">sync</span>
                </div>
                <div>
                    <h4 class="font-black text-stone-900 uppercase text-sm">Sincronización de Stock</h4>
                    <p class="text-[10px] text-stone-400 font-bold uppercase tracking-widest mt-1">Sincroniza existencias web y ERP cada 5 minutos</p>
                </div>
            </div>
            <div class="flex items-center gap-8">
                <div class="text-right">
                    <p class="text-[10px] font-black text-stone-400 uppercase mb-1">Último Disparo</p>
                    <p class="text-sm font-bold text-stone-900">Hace 2m</p>
                </div>
                <button class="bg-stone-50 text-stone-900 px-4 py-2 text-[10px] font-black uppercase rounded-lg hover:bg-stone-900 hover:text-primary transition-all">Ejecutar Ahora</button>
            </div>
        </div>
    </section>
@endsection
