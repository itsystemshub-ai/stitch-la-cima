@extends('layouts.erp')

@section('title', 'TITAN INDUSTRIAL ERP - Cron Jobs | ERP La Cima')

@push('styles')
    <link rel="stylesheet" href="/frontend/public/erp/css/tareas-programadas.css">
@endpush

@section('content')
<script>
  document.addEventListener('DOMContentLoaded', () => {
      const b = document.getElementById('breadcrumbPage');
      if(b) b.innerText = 'P�gina';
  });
</script>

<main class="flex-1 md:ml-64 p-6 lg:p-10">
<!-- Header Section -->
<div class="mb-10 flex flex-col md:flex-row md:items-end justify-between gap-6">
<div>
<h1 class="text-4xl lg:text-5xl font-black uppercase tracking-tighter text-on-surface mb-2">Cron Jobs</h1>
<p class="text-secondary max-w-2xl font-medium border-l-4 border-primary pl-4">Gestión y monitoreo de procesos automatizados de alto rendimiento. Control de redundancia y disparadores manuales del sistema central.</p>
</div>
<div class="flex gap-3">
<button class="bg-surface-container-high text-on-surface font-bold uppercase text-xs px-6 py-3 flex items-center gap-2 hover:scale-[1.02] transition-transform">
<span class="material-symbols-outlined text-lg">refresh</span> Recargar Estados
                    </button>
<button class="bg-primary text-on-primary font-black uppercase text-xs px-6 py-3 flex items-center gap-2 hover:scale-[1.02] transition-transform shadow-lg shadow-primary/20">
<span class="material-symbols-outlined text-lg">add</span> Nueva Tarea
                    </button>
</div>
</div>
<!-- Dashboard Stats Bento Grid -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
<div class="bg-surface-container-lowest p-6 flex flex-col gap-1 relative overflow-hidden">
<div class="text-[10px] font-black text-secondary tracking-widest uppercase">Tareas Activas</div>
<div class="text-4xl font-black headline">12</div>
<div class="absolute -right-4 -bottom-4 opacity-5">
<span class="material-symbols-outlined text-8xl">settings_suggest</span>
</div>
</div>
<div class="bg-surface-container-lowest p-6 flex flex-col gap-1 relative overflow-hidden border-b-4 border-primary">
<div class="text-[10px] font-black text-secondary tracking-widest uppercase">Éxito Últimas 24h</div>
<div class="text-4xl font-black headline text-primary">99.8%</div>
<div class="absolute -right-4 -bottom-4 opacity-5">
<span class="material-symbols-outlined text-8xl">check_circle</span>
</div>
</div>
<div class="bg-surface-container-lowest p-6 flex flex-col gap-1 relative overflow-hidden">
<div class="text-[10px] font-black text-secondary tracking-widest uppercase">Próximo Disparo</div>
<div class="text-2xl font-black headline">14:00:00</div>
<div class="text-[10px] text-secondary">SYNC_INV_01</div>
</div>
<div class="bg-surface-container-lowest p-6 flex flex-col gap-1 relative overflow-hidden">
<div class="text-[10px] font-black text-secondary tracking-widest uppercase">Alertas Sistema</div>
<div class="text-4xl font-black headline text-error">0</div>
<div class="absolute -right-4 -bottom-4 opacity-5">
<span class="material-symbols-outlined text-8xl">warning</span>
</div>
</div>
</div>
<!-- Task Grid Layout -->
<div class="space-y-4">
<!-- Task Row 1 -->
<div class="bg-surface-container-lowest flex flex-col lg:flex-row items-center gap-6 p-6 group hover:bg-white transition-colors relative overflow-hidden">
<div class="w-12 h-12 bg-primary/10 flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-primary text-3xl">account_balance_wallet</span>
</div>
<div class="flex-1 w-full lg:w-auto">
<div class="flex items-center gap-3 mb-1">
<h3 class="text-lg font-bold headline uppercase">Cierre de Período Contable</h3>
<span class="px-2 py-0.5 bg-primary/20 text-on-primary-container text-[10px] font-bold uppercase tracking-tighter">Diario</span>
</div>
<p class="text-xs text-secondary font-medium uppercase">Consolidación de asientos contables y generación de balance de sumas y saldos.</p>
</div>
<div class="grid grid-cols-2 md:grid-cols-3 gap-8 w-full lg:w-auto text-center lg:text-left">
<div>
<div class="text-[10px] font-bold text-secondary uppercase mb-1">Frecuencia</div>
<div class="text-sm font-mono font-bold">0 0 * * *</div>
</div>
<div>
<div class="text-[10px] font-bold text-secondary uppercase mb-1">Última Ejecución</div>
<div class="text-sm font-bold flex items-center gap-2">
<span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                                Éxito <span class="text-[10px] font-normal text-secondary">hace 14h</span>
</div>
</div>
<div class="hidden md:block">
<div class="text-[10px] font-bold text-secondary uppercase mb-1">Carga CPU</div>
<div class="w-24 h-2 bg-surface-container rounded-full overflow-hidden mt-2">
<div class="bg-primary h-full w-[15%]"></div>
</div>
</div>
</div>
<div class="flex items-center gap-2 w-full lg:w-auto shrink-0">
<button class="flex-1 lg:flex-none px-4 py-2 bg-stone-900 text-stone-100 text-[10px] font-black uppercase hover:bg-primary hover:text-on-primary transition-all active:scale-95">Disparar</button>
<button class="material-symbols-outlined p-2 text-secondary hover:text-on-surface">settings_applications</button>
<button class="material-symbols-outlined p-2 text-secondary hover:text-error">history</button>
</div>
</div>
<!-- Task Row 2 -->
<div class="bg-surface-container-lowest flex flex-col lg:flex-row items-center gap-6 p-6 group hover:bg-white transition-colors">
<div class="w-12 h-12 bg-stone-200 flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-stone-500 text-3xl">cleaning_services</span>
</div>
<div class="flex-1 w-full lg:w-auto">
<div class="flex items-center gap-3 mb-1">
<h3 class="text-lg font-bold headline uppercase">Purga de Logs de Auditoría</h3>
<span class="px-2 py-0.5 bg-stone-200 text-stone-600 text-[10px] font-bold uppercase tracking-tighter">Semanal</span>
</div>
<p class="text-xs text-secondary font-medium uppercase">Eliminación de registros históricos superiores a 180 días según política de privacidad.</p>
</div>
<div class="grid grid-cols-2 md:grid-cols-3 gap-8 w-full lg:w-auto text-center lg:text-left">
<div>
<div class="text-[10px] font-bold text-secondary uppercase mb-1">Frecuencia</div>
<div class="text-sm font-mono font-bold">0 2 * * 0</div>
</div>
<div>
<div class="text-[10px] font-bold text-secondary uppercase mb-1">Última Ejecución</div>
<div class="text-sm font-bold flex items-center gap-2">
<span class="w-2 h-2 rounded-full bg-primary"></span>
                                Éxito <span class="text-[10px] font-normal text-secondary">hace 3d</span>
</div>
</div>
<div class="hidden md:block">
<div class="text-[10px] font-bold text-secondary uppercase mb-1">Carga CPU</div>
<div class="w-24 h-2 bg-surface-container rounded-full overflow-hidden mt-2">
<div class="bg-primary h-full w-[45%]"></div>
</div>
</div>
</div>
<div class="flex items-center gap-2 w-full lg:w-auto shrink-0">
<button class="flex-1 lg:flex-none px-4 py-2 bg-stone-900 text-stone-100 text-[10px] font-black uppercase hover:bg-primary hover:text-on-primary transition-all active:scale-95">Disparar</button>
<button class="material-symbols-outlined p-2 text-secondary hover:text-on-surface">settings_applications</button>
<button class="material-symbols-outlined p-2 text-secondary hover:text-error">history</button>
</div>
</div>
<!-- Task Row 3 -->
<div class="bg-surface-container-lowest flex flex-col lg:flex-row items-center gap-6 p-6 group hover:bg-white transition-colors border-l-4 border-primary">
<div class="w-12 h-12 bg-primary/10 flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-primary text-3xl">sync_alt</span>
</div>
<div class="flex-1 w-full lg:w-auto">
<div class="flex items-center gap-3 mb-1">
<h3 class="text-lg font-bold headline uppercase">Sincronización de Inventario</h3>
<span class="px-2 py-0.5 bg-primary/20 text-on-primary-container text-[10px] font-bold uppercase tracking-tighter">5 Minutos</span>
</div>
<p class="text-xs text-secondary font-medium uppercase">Matching de stock entre almacenes centrales y puntos de distribución externos.</p>
</div>
<div class="grid grid-cols-2 md:grid-cols-3 gap-8 w-full lg:w-auto text-center lg:text-left">
<div>
<div class="text-[10px] font-bold text-secondary uppercase mb-1">Frecuencia</div>
<div class="text-sm font-mono font-bold">*/5 * * * *</div>
</div>
<div>
<div class="text-[10px] font-bold text-secondary uppercase mb-1">Última Ejecución</div>
<div class="text-sm font-bold flex items-center gap-2">
<span class="w-2 h-2 rounded-full bg-primary animate-ping"></span>
                                En Proceso <span class="text-[10px] font-normal text-secondary">ahora</span>
</div>
</div>
<div class="hidden md:block">
<div class="text-[10px] font-bold text-secondary uppercase mb-1">Carga CPU</div>
<div class="w-24 h-2 bg-surface-container rounded-full overflow-hidden mt-2">
<div class="bg-primary h-full w-[82%]"></div>
</div>
</div>
</div>
<div class="flex items-center gap-2 w-full lg:w-auto shrink-0">
<button class="flex-1 lg:flex-none px-4 py-2 bg-stone-950 text-lime-400 text-[10px] font-black uppercase opacity-50 cursor-not-allowed">Ejecutando</button>
<button class="material-symbols-outlined p-2 text-secondary hover:text-on-surface">settings_applications</button>
<button class="material-symbols-outlined p-2 text-secondary hover:text-error">history</button>
</div>
</div>
<!-- Task Row 4 -->
<div class="bg-surface-container-lowest flex flex-col lg:flex-row items-center gap-6 p-6 group hover:bg-white transition-colors">
<div class="w-12 h-12 bg-stone-200 flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-stone-500 text-3xl">mail</span>
</div>
<div class="flex-1 w-full lg:w-auto">
<div class="flex items-center gap-3 mb-1">
<h3 class="text-lg font-bold headline uppercase">Envío de Reportes Automáticos</h3>
<span class="px-2 py-0.5 bg-stone-200 text-stone-600 text-[10px] font-bold uppercase tracking-tighter">Personalizado</span>
</div>
<p class="text-xs text-secondary font-medium uppercase">Distribución de KPIs de producción a la junta directiva y jefes de planta.</p>
</div>
<div class="grid grid-cols-2 md:grid-cols-3 gap-8 w-full lg:w-auto text-center lg:text-left">
<div>
<div class="text-[10px] font-bold text-secondary uppercase mb-1">Frecuencia</div>
<div class="text-sm font-mono font-bold">0 8 1 * *</div>
</div>
<div>
<div class="text-[10px] font-bold text-secondary uppercase mb-1">Última Ejecución</div>
<div class="text-sm font-bold flex items-center gap-2">
<span class="w-2 h-2 rounded-full bg-error"></span>
                                Fallido <span class="text-[10px] font-normal text-secondary">hace 24d</span>
</div>
</div>
<div class="hidden md:block">
<div class="text-[10px] font-bold text-secondary uppercase mb-1">Carga CPU</div>
<div class="w-24 h-2 bg-surface-container rounded-full overflow-hidden mt-2">
<div class="bg-error h-full w-[5%]"></div>
</div>
</div>
</div>
<div class="flex items-center gap-2 w-full lg:w-auto shrink-0">
<button class="flex-1 lg:flex-none px-4 py-2 bg-stone-900 text-stone-100 text-[10px] font-black uppercase hover:bg-primary hover:text-on-primary transition-all active:scale-95">Disparar</button>
<button class="material-symbols-outlined p-2 text-secondary hover:text-on-surface">settings_applications</button>
<button class="material-symbols-outlined p-2 text-secondary hover:text-error">history</button>
</div>
</div>
</div>
<!-- Footer Meta Info -->
<footer class="mt-12 pt-8 border-t border-surface-container flex flex-col md:flex-row justify-between items-center gap-4 text-[10px] font-bold text-secondary uppercase tracking-[0.2em]">
<div class="flex gap-6">
<span class="flex items-center gap-2"><span class="w-1.5 h-1.5 bg-primary rounded-full"></span> Motor de Cron: Activo</span>
<span class="flex items-center gap-2"><span class="w-1.5 h-1.5 bg-primary rounded-full"></span> Queue Worker: 4 Hilos</span>
<span class="flex items-center gap-2"><span class="w-1.5 h-1.5 bg-stone-400 rounded-full"></span> Latencia: 14ms</span>
</div>
<div>Titan Systems © 2024 - Industrial Infrastructure Unit</div>
</footer>
</main>
@endsection

@push('scripts')
    <script src="/frontend/public/erp/js/tareas-programadas.js"></script>
@endpush
