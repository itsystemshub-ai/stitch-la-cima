@extends('layouts.erp')

@section('title', 'backups | ERP La Cima')

@push('styles')
    <link rel="stylesheet" href="/frontend/public/erp/css/backups.css">
@endpush

@section('content')
<script>
  document.addEventListener('DOMContentLoaded', () => {
      const b = document.getElementById('breadcrumbPage');
      if(b) b.innerText = 'P�gina';
  });
</script>

<main class="md:ml-64 pt-6 px-4 md:px-10 pb-20">
<!-- Header & Stats Grid -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-6 mb-10">
<div class="lg:col-span-8">
<h1 class="font-headline text-5xl font-extrabold uppercase tracking-tighter text-stone-100 mb-2 leading-none">
                    Gestión de <span class="text-lime-400">Backups</span>
</h1>
<p class="text-stone-500 font-body max-w-xl">
                    Administración de redundancia de datos y protocolos de recuperación ante desastres para infraestructuras críticas industriales.
                </p>
</div>
<div class="lg:col-span-4 flex items-end justify-end gap-3">
<button class="bg-stone-800/50 text-stone-100 px-6 py-3 font-bold text-xs uppercase tracking-widest flex items-center gap-2 hover:bg-stone-700 transition-all active:scale-95">
<span class="material-symbols-outlined" data-icon="history">history</span> Historial Completo
                </button>
<button class="bg-lime-500 text-stone-950 px-6 py-3 font-black text-xs uppercase tracking-widest flex items-center gap-2 hover:bg-lime-400 transition-all active:scale-95 shadow-[0_0_20px_rgba(154,205,50,0.2)]">
<span class="material-symbols-outlined" data-icon="bolt">bolt</span> Ejecutar Backup
                </button>
</div>
</div>
<!-- Bento Grid Layout -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
<!-- Health Card -->
<div class="bg-stone-900 p-8 flex flex-col justify-between relative overflow-hidden">
<div class="absolute top-0 right-0 p-4">
<span class="material-symbols-outlined text-stone-800 text-8xl absolute -top-4 -right-4" data-icon="storage">storage</span>
</div>
<div class="relative z-10">
<span class="text-lime-400 font-bold text-xs uppercase tracking-[0.2em] mb-4 block">Estado del Sistema</span>
<h3 class="font-headline text-4xl font-bold text-stone-100 mb-2">94.2%</h3>
<p class="text-stone-500 text-sm">Salud de redundancia operativa</p>
</div>
<div class="mt-6 flex items-center gap-2 text-lime-500 text-xs font-mono">
<span class="w-2 h-2 rounded-full bg-lime-500 animate-pulse"></span>
                    SISTEMA SINCRONIZADO
                </div>
</div>
<!-- Storage Card -->
<div class="bg-stone-900 p-8 flex flex-col justify-between">
<div>
<span class="text-lime-400 font-bold text-xs uppercase tracking-[0.2em] mb-4 block">Almacenamiento Local</span>
<div class="flex items-end gap-2 mb-4">
<h3 class="font-headline text-4xl font-bold text-stone-100 leading-none">3.8</h3>
<span class="text-stone-500 font-headline font-bold text-xl mb-1">/ 5.0 MB</span>
</div>
<div class="w-full bg-stone-800 h-1 mt-2">
<div class="bg-lime-500 h-full w-[76%]"></div>
</div>
</div>
<p class="text-stone-500 text-sm mt-4">localStorage asignado para estados temporales</p>
</div>
<!-- Schedule Card -->
<div class="bg-stone-900 p-8 flex flex-col justify-between border-l-4 border-lime-500">
<div>
<span class="text-lime-400 font-bold text-xs uppercase tracking-[0.2em] mb-4 block">Próximo Backup</span>
<h3 class="font-headline text-2xl font-bold text-stone-100 mb-1">04:00 AM</h3>
<p class="text-stone-500 text-sm italic">Programación Diaria Automática</p>
</div>
<div class="flex items-center gap-4 mt-6">
<div class="flex -space-x-2">
<div class="w-8 h-8 rounded-full bg-stone-800 flex items-center justify-center border border-stone-900 text-[10px] font-bold">D</div>
<div class="w-8 h-8 rounded-full bg-stone-800 flex items-center justify-center border border-stone-900 text-[10px] font-bold">L</div>
<div class="w-8 h-8 rounded-full bg-lime-500 text-stone-950 flex items-center justify-center border border-stone-900 text-[10px] font-bold">M</div>
<div class="w-8 h-8 rounded-full bg-lime-500 text-stone-950 flex items-center justify-center border border-stone-900 text-[10px] font-bold">X</div>
</div>
<span class="text-stone-500 text-[10px] uppercase font-bold tracking-widest">En curso</span>
</div>
</div>
</div>
<!-- Configuration Sections -->
<div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
<!-- Controls Column -->
<div class="xl:col-span-1 flex flex-col gap-8">
<!-- Scheduling -->
<div class="bg-stone-900 p-6">
<h4 class="font-headline font-bold text-stone-100 uppercase tracking-wide mb-6 flex items-center gap-2">
<span class="material-symbols-outlined text-lime-400" data-icon="calendar_month">calendar_month</span>
                        Programación
                    </h4>
<div class="space-y-4">
<div class="flex items-center justify-between p-3 bg-stone-800/30 hover:bg-stone-800/50 transition-colors">
<span class="text-sm font-medium">Backup Diario</span>
<div class="w-10 h-5 bg-lime-500 rounded-full relative">
<div class="absolute right-1 top-1 w-3 h-3 bg-stone-950 rounded-full"></div>
</div>
</div>
<div class="flex items-center justify-between p-3 bg-stone-800/30 hover:bg-stone-800/50 transition-colors">
<span class="text-sm font-medium">Respaldo Semanal</span>
<div class="w-10 h-5 bg-stone-700 rounded-full relative">
<div class="absolute left-1 top-1 w-3 h-3 bg-stone-950 rounded-full"></div>
</div>
</div>
<div class="flex items-center justify-between p-3 bg-stone-800/30 hover:bg-stone-800/50 transition-colors">
<span class="text-sm font-medium">Cifrado AES-256</span>
<div class="w-10 h-5 bg-lime-500 rounded-full relative">
<div class="absolute right-1 top-1 w-3 h-3 bg-stone-950 rounded-full"></div>
</div>
</div>
</div>
<button class="w-full mt-6 py-3 border border-stone-700 text-stone-400 text-xs font-bold uppercase tracking-widest hover:text-lime-400 hover:border-lime-400 transition-all">
                        MODIFICAR PARÁMETROS
                    </button>
</div>
<!-- Disaster Recovery -->
<div class="bg-stone-900/40 border border-red-900/30 p-6">
<h4 class="font-headline font-bold text-red-400 uppercase tracking-wide mb-4 flex items-center gap-2">
<span class="material-symbols-outlined" data-icon="emergency_home">emergency_home</span>
                        Zona de Recuperación
                    </h4>
<p class="text-stone-500 text-xs mb-6">Inicie el protocolo de restauración de punto anterior. Esta acción sobrescribirá los datos actuales.</p>
<button class="w-full py-4 bg-red-950/50 border border-red-700 text-red-500 font-black text-xs uppercase tracking-tighter hover:bg-red-900/50 transition-all flex items-center justify-center gap-3">
<span class="material-symbols-outlined" data-icon="restore">restore</span>
                        RESTAURAR PUNTO DE CONTROL
                    </button>
</div>
</div>
<!-- Table Column -->
<div class="xl:col-span-2">
<div class="bg-stone-900 overflow-hidden">
<div class="p-6 border-b border-stone-800 flex justify-between items-center">
<h4 class="font-headline font-bold text-stone-100 uppercase tracking-wide">Registro de Actividad</h4>
<div class="flex gap-2">
<span class="text-[10px] text-stone-500 uppercase font-bold px-2 py-1 bg-stone-800">Filtrar: Todos</span>
</div>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left font-body">
<thead>
<tr class="bg-stone-800/50 text-[10px] text-stone-400 uppercase tracking-[0.2em]">
<th class="px-6 py-4 font-black">Timestamp</th>
<th class="px-6 py-4 font-black">ID Hash</th>
<th class="px-6 py-4 font-black">Tamaño</th>
<th class="px-6 py-4 font-black">Tipo</th>
<th class="px-6 py-4 font-black text-right">Estado</th>
</tr>
</thead>
<tbody class="text-sm divide-y divide-stone-800">
<tr class="hover:bg-stone-800/20 transition-colors">
<td class="px-6 py-4">
<div class="text-stone-200">2023-10-24</div>
<div class="text-[10px] text-stone-500">14:02:11 GMT-5</div>
</td>
<td class="px-6 py-4 font-mono text-xs text-stone-400">#af82..192x</td>
<td class="px-6 py-4 font-medium">124.8 MB</td>
<td class="px-6 py-4">
<span class="text-[10px] border border-stone-700 px-2 py-1 rounded-sm text-stone-400 font-bold uppercase">Manual</span>
</td>
<td class="px-6 py-4 text-right">
<span class="text-lime-500 font-black text-[10px] uppercase tracking-widest flex items-center justify-end gap-1">
<span class="w-1.5 h-1.5 rounded-full bg-lime-500"></span> Éxito
                                        </span>
</td>
</tr>
<tr class="hover:bg-stone-800/20 transition-colors bg-stone-800/10">
<td class="px-6 py-4">
<div class="text-stone-200">2023-10-23</div>
<div class="text-[10px] text-stone-500">04:00:00 GMT-5</div>
</td>
<td class="px-6 py-4 font-mono text-xs text-stone-400">#bf11..722q</td>
<td class="px-6 py-4 font-medium">119.2 MB</td>
<td class="px-6 py-4">
<span class="text-[10px] border border-stone-700 px-2 py-1 rounded-sm text-stone-400 font-bold uppercase">Auto</span>
</td>
<td class="px-6 py-4 text-right">
<span class="text-lime-500 font-black text-[10px] uppercase tracking-widest flex items-center justify-end gap-1">
<span class="w-1.5 h-1.5 rounded-full bg-lime-500"></span> Éxito
                                        </span>
</td>
</tr>
<tr class="hover:bg-stone-800/20 transition-colors">
<td class="px-6 py-4">
<div class="text-stone-200">2023-10-22</div>
<div class="text-[10px] text-stone-500">04:00:00 GMT-5</div>
</td>
<td class="px-6 py-4 font-mono text-xs text-stone-400">#cc09..918p</td>
<td class="px-6 py-4 font-medium">118.5 MB</td>
<td class="px-6 py-4">
<span class="text-[10px] border border-stone-700 px-2 py-1 rounded-sm text-stone-400 font-bold uppercase">Auto</span>
</td>
<td class="px-6 py-4 text-right">
<span class="text-red-500 font-black text-[10px] uppercase tracking-widest flex items-center justify-end gap-1">
<span class="w-1.5 h-1.5 rounded-full bg-red-500"></span> Fallo
                                        </span>
</td>
</tr>
<tr class="hover:bg-stone-800/20 transition-colors bg-stone-800/10">
<td class="px-6 py-4">
<div class="text-stone-200">2023-10-21</div>
<div class="text-[10px] text-stone-500">18:45:22 GMT-5</div>
</td>
<td class="px-6 py-4 font-mono text-xs text-stone-400">#ee21..001z</td>
<td class="px-6 py-4 font-medium">112.4 MB</td>
<td class="px-6 py-4">
<span class="text-[10px] border border-stone-700 px-2 py-1 rounded-sm text-stone-400 font-bold uppercase">Manual</span>
</td>
<td class="px-6 py-4 text-right">
<span class="text-lime-500 font-black text-[10px] uppercase tracking-widest flex items-center justify-end gap-1">
<span class="w-1.5 h-1.5 rounded-full bg-lime-500"></span> Éxito
                                        </span>
</td>
</tr>
</tbody>
</table>
</div>
</div>
<!-- Technical Footer Info -->
<div class="mt-6 flex flex-wrap gap-8 items-center text-[10px] font-bold uppercase tracking-widest text-stone-500">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-sm" data-icon="verified">verified</span>
                        Verificación de Integridad: OK
                    </div>
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-sm" data-icon="cloud_sync">cloud_sync</span>
                        Mirror S3: Conectado
                    </div>
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-sm" data-icon="security">security</span>
                        Encripción: AES-GCM 256
                    </div>
</div>
</div>
</div>
</main>
@endsection

@push('scripts')
    <script src="/frontend/public/erp/js/backups.js"></script>
@endpush
