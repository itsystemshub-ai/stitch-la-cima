@extends('erp.layouts.app')

@section('title', 'Gestión de Respaldos | ERP Zenith')

@section('content')
<!-- Header -->
<div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4 mb-10">
  <div>
    <p class="text-xs font-bold text-stone-400 tracking-[0.2em] uppercase mb-1">Protección de Datos</p>
    <h2 class="text-3xl font-headline font-black text-stone-900 tracking-tight">Gestión de Respaldos</h2>
    <p class="text-stone-500 text-sm mt-1">Garantizando la Continuidad Operativa • MAYOR DE REPUESTO LA CIMA, C.A.</p>
  </div>
  <div class="flex gap-3">
    <button class="bg-stone-900 text-primary px-5 py-2.5 rounded-xl text-xs font-bold uppercase tracking-wider hover:brightness-110 transition-all active:scale-95 shadow-lg shadow-stone-900/10 flex items-center gap-2">
      <span class="material-symbols-outlined text-sm">backup</span>
      Respaldar Ahora
    </button>
  </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 mb-8">
  <!-- Center Column: Backup History -->
  <div class="lg:col-span-8 space-y-8">
    <!-- Storage Status Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
      <div class="bg-white p-6 rounded-xl border border-stone-200 shadow-sm border-l-4 border-primary">
        <div class="flex justify-between items-start mb-4">
          <div>
            <p class="text-[9px] text-stone-400 font-black uppercase tracking-widest">Almacenamiento Local</p>
            <h3 class="text-2xl font-headline font-black text-stone-900 mt-1">4.2 GB / 10 GB</h3>
          </div>
          <span class="material-symbols-outlined text-stone-300">hard_drive</span>
        </div>
        <div class="w-full h-1.5 bg-stone-100 rounded-full overflow-hidden">
          <div class="h-full bg-primary shadow-[0_0_8px_rgba(206,255,94,0.5)]" style="width: 42%"></div>
        </div>
      </div>
      <div class="bg-white p-6 rounded-xl border border-stone-200 shadow-sm border-l-4 border-stone-900">
        <div class="flex justify-between items-start mb-4">
          <div>
            <p class="text-[9px] text-stone-400 font-black uppercase tracking-widest">Cloud Sync (Amazon S3)</p>
            <h3 class="text-2xl font-headline font-black text-stone-900 mt-1">68 Respaldos</h3>
          </div>
          <span class="material-symbols-outlined text-stone-300">cloud_upload</span>
        </div>
        <div class="flex items-center gap-2">
          <span class="w-2 h-2 bg-green-500 rounded-full"></span>
          <p class="text-[9px] text-green-700 font-bold uppercase tracking-tight">Sincronizado hace 2h</p>
        </div>
      </div>
    </div>

    <!-- Backup List -->
    <div class="bg-white rounded-xl border border-stone-200 shadow-sm overflow-hidden">
      <div class="px-8 py-6 border-b border-stone-100 bg-stone-50/50 flex justify-between items-center">
        <h3 class="font-headline font-bold text-lg text-stone-900 uppercase tracking-tight">Historial de Resguardos</h3>
        <select class="bg-white border-stone-200 text-[10px] font-black uppercase tracking-widest rounded-lg px-3 py-1.5 focus:ring-primary/30">
          <option>Últimos 30 días</option>
          <option>Todos</option>
        </select>
      </div>
      <div class="overflow-x-auto">
        <table class="w-full text-left">
          <thead>
            <tr class="bg-stone-50 text-[10px] font-black text-stone-400 uppercase tracking-widest border-b border-stone-100">
              <th class="p-6">Archivo de Respaldo</th>
              <th class="p-6">Fecha / Hora</th>
              <th class="p-6">Tamaño</th>
              <th class="p-6">Tipo</th>
              <th class="p-6 text-right">Acciones</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-stone-100 text-sm font-body text-stone-600">
            <tr class="hover:bg-primary/5 transition-colors group">
              <td class="p-6 font-bold text-stone-900 flex items-center gap-3">
                <span class="material-symbols-outlined text-stone-300 group-hover:text-primary transition-colors">description</span>
                ZENITH_PROD_20260412.sql.gz
              </td>
              <td class="p-6 font-mono font-bold text-xs uppercase">12 Abr 2026 • 23:00</td>
              <td class="p-6 font-mono font-bold text-xs">124.5 MB</td>
              <td class="p-6">
                <span class="px-3 py-1 bg-stone-100 text-stone-500 text-[9px] font-black rounded uppercase">Automático</span>
              </td>
              <td class="p-6 text-right">
                <div class="flex justify-end gap-2">
                  <button class="material-symbols-outlined text-stone-400 hover:text-stone-900 transition-colors p-1" title="Restaurar">settings_backup_restore</button>
                  <button class="material-symbols-outlined text-stone-400 hover:text-blue-500 transition-colors p-1" title="Descargar">download</button>
                </div>
              </td>
            </tr>
            <tr class="hover:bg-primary/5 transition-colors group">
              <td class="p-6 font-bold text-stone-900 flex items-center gap-3">
                <span class="material-symbols-outlined text-stone-300 group-hover:text-primary transition-colors">description</span>
                ZENITH_MANUAL_DBUP.sql.gz
              </td>
              <td class="p-6 font-mono font-bold text-xs uppercase">11 Abr 2026 • 15:24</td>
              <td class="p-6 font-mono font-bold text-xs">122.1 MB</td>
              <td class="p-6">
                <span class="px-3 py-1 bg-primary/20 text-primary text-[9px] font-black rounded uppercase border border-primary/30">Manual</span>
              </td>
              <td class="p-6 text-right">
                <div class="flex justify-end gap-2">
                  <button class="material-symbols-outlined text-stone-400 hover:text-stone-900 transition-colors p-1">settings_backup_restore</button>
                  <button class="material-symbols-outlined text-stone-400 hover:text-blue-500 transition-colors p-1">download</button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Right Column: Settings & Scheduling -->
  <div class="lg:col-span-4 space-y-8">
    <!-- Scheduling Card -->
    <div class="bg-stone-900 p-8 rounded-xl shadow-2xl relative overflow-hidden border border-stone-800">
      <div class="relative z-10">
        <h3 class="text-xl font-headline font-black text-primary uppercase mb-6 flex items-center gap-2">
          <span class="material-symbols-outlined">schedule_send</span>
          Programación
        </h3>
        <div class="space-y-6">
          <div class="flex items-center justify-between p-4 bg-stone-800 border border-stone-700 rounded-xl">
            <div>
              <p class="text-xs font-black text-stone-200 uppercase tracking-tighter">Respaldo Diario</p>
              <p class="text-[9px] text-stone-500 font-bold uppercase tracking-widest">Ejecutar a las 23:00</p>
            </div>
            <div class="relative inline-block w-10 h-5 bg-primary rounded-full cursor-pointer">
              <div class="absolute w-4 h-4 bg-white rounded-full left-0.5 top-0.5 translate-x-5"></div>
            </div>
          </div>
          <div class="flex items-center justify-between p-4 bg-stone-800 border border-stone-700 rounded-xl opacity-60">
            <div>
              <p class="text-xs font-black text-stone-200 uppercase tracking-tighter">Depuración Log</p>
              <p class="text-[9px] text-stone-500 font-bold uppercase tracking-widest">Eliminar antiguos (>30d)</p>
            </div>
            <div class="relative inline-block w-10 h-5 bg-stone-700 rounded-full cursor-pointer">
              <div class="absolute w-4 h-4 bg-white rounded-full left-0.5 top-0.5"></div>
            </div>
          </div>
          <div class="pt-4 px-4">
             <p class="text-[10px] text-stone-400 uppercase font-black tracking-widest mb-2 border-l-2 border-primary pl-3">Destino de Red</p>
             <p class="text-xs font-mono text-stone-500">s3://lacima-erp-vault-2026/backups/</p>
          </div>
        </div>
      </div>
      <span class="material-symbols-outlined absolute -right-10 -bottom-10 text-[200px] opacity-10 text-primary pointer-events-none rotate-12">cloud_sync</span>
    </div>

    <!-- Integrity Checklist -->
    <div class="bg-white rounded-xl border border-stone-200 p-8 shadow-sm">
      <h4 class="text-[10px] font-black text-stone-400 uppercase tracking-[0.2em] mb-6">Chequeo de Integridad</h4>
      <div class="space-y-4">
        <div class="flex items-center gap-3 p-4 bg-stone-50 rounded-xl group hover:bg-stone-100 transition-all border border-stone-100">
           <span class="material-symbols-outlined text-green-500">verified</span>
           <span class="text-xs font-bold text-stone-900 uppercase">Verificación Checksum</span>
        </div>
        <div class="flex items-center gap-3 p-4 bg-stone-50 rounded-xl group hover:bg-stone-100 transition-all border border-stone-100">
           <span class="material-symbols-outlined text-stone-300">verified</span>
           <span class="text-xs font-bold text-stone-500 uppercase">Simulación de Restore (Pend)</span>
        </div>
        <button class="w-full mt-4 text-primary text-[10px] font-black uppercase tracking-[0.2em] hover:brightness-75 transition-all">
          EJECUTAR TEST COMPLETO
        </button>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/backups.js') }}"></script>
@endpush
