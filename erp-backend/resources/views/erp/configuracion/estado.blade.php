@extends('erp.layouts.app')

@section('title', 'Estado del Sistema')

@section('breadcrumb')
    <a href="{{ url('/erp/inicio') }}" class="hover:text-stone-900 transition-colors">ERP</a>
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <a href="{{ url('/erp/configuracion') }}" class="hover:text-stone-900 transition-colors">Configuración</a>
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <span class="text-stone-900">Estado del Sistema</span>
@endsection

@section('content')
    <!-- Page Header -->
    <header class="mb-10 border-b border-stone-100 pb-8">
        <div class="flex items-center gap-2 mb-2">
            <span class="w-8 h-[2px] bg-primary"></span>
            <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em]">Monitoreo de Infraestructura</p>
        </div>
        <h1 class="text-5xl font-headline font-black text-stone-900 tracking-tighter uppercase leading-none">Salud del <span class="text-stone-400">Sistema</span></h1>
    </header>

    <!-- Status Grid -->
    <div class="grid grid-cols-12 gap-8 mb-12">
        <div class="col-span-12 lg:col-span-4 bg-white border border-stone-200 p-8 rounded-[32px] shadow-sm relative overflow-hidden">
            <p class="text-[10px] font-black text-stone-400 uppercase tracking-widest mb-4">Servidor API</p>
            <div class="flex items-center gap-4">
                <div class="w-4 h-4 bg-green-500 rounded-full animate-pulse shadow-[0_0_15px_rgba(34,197,94,0.5)]"></div>
                <h3 class="text-3xl font-headline font-black text-stone-900 uppercase">ONLINE</h3>
            </div>
            <p class="text-[10px] text-stone-400 mt-4 font-bold uppercase tracking-widest">Latencia: 14ms</p>
        </div>

        <div class="col-span-12 lg:col-span-4 bg-white border border-stone-200 p-8 rounded-[32px] shadow-sm relative overflow-hidden">
            <p class="text-[10px] font-black text-stone-400 uppercase tracking-widest mb-4">Base de Datos</p>
            <div class="flex items-center gap-4">
                <div class="w-4 h-4 bg-green-500 rounded-full shadow-[0_0_10px_rgba(34,197,94,0.3)]"></div>
                <h3 class="text-3xl font-headline font-black text-stone-900 uppercase italic underline decoration-primary decoration-4 underline-offset-4 tracking-tighter">OPTIMAL</h3>
            </div>
            <p class="text-[10px] text-stone-400 mt-4 font-bold uppercase tracking-widest">Conexiones: 12 Activ.</p>
        </div>

        <div class="col-span-12 lg:col-span-4 bg-stone-900 p-8 rounded-[32px] shadow-xl relative overflow-hidden group">
            <p class="text-[10px] font-black text-primary uppercase tracking-widest mb-4">Último Backup</p>
            <h3 class="text-3xl font-headline font-black text-white uppercase tracking-tight">Hace 4 Horas</h3>
            <p class="text-[10px] text-stone-500 mt-4 font-bold uppercase tracking-widest">Estado: Verificado (S3)</p>
        </div>
    </div>

    <!-- System Logs / Uptime -->
    <section class="bg-white border border-stone-200 rounded-[32px] shadow-sm overflow-hidden mb-12">
        <div class="p-8 border-b border-stone-50 bg-stone-50/50">
            <h3 class="text-[10px] font-black text-stone-900 uppercase tracking-[0.2em]">Registro de Actividad del Núcleo</h3>
        </div>
        <div class="p-8 font-mono text-[11px] text-stone-600 bg-stone-950 text-green-400 space-y-1">
            <p>[2026-04-12 17:15:22] CACHE_CLEARED: Bootstrap sequence completed.</p>
            <p>[2026-04-12 17:15:23] DB_SYNC: PostgreSQL replication is caught up.</p>
            <p>[2026-04-12 17:15:24] AUTH_ENGINE: Monitoring active sessions...</p>
            <div class="animate-pulse border-l-2 border-primary pl-2 text-white">_ SYSTEM_IDLE</div>
        </div>
    </section>
@endsection
