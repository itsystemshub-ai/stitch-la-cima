@extends('erp.layouts.app')

@section('title', 'Configuración del Sistema | ERP Zenith')

@section('content')
<!-- Header -->
<div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4 mb-8">
  <div>
    <p class="text-xs font-bold text-stone-400 tracking-[0.2em] uppercase mb-1">
      Módulo de Configuración
    </p>
    <h2 class="text-3xl font-headline font-black text-stone-900 tracking-tight">
      Configuración del Sistema
    </h2>
    <p class="text-stone-500 text-sm mt-1">
      MAYOR DE REPUESTO LA CIMA, C.A. • RIF: J-40308741-5
    </p>
  </div>
  <div class="flex gap-3">
    <a href="{{ url('/erp/configuracion/backups') }}" class="flex items-center gap-2 bg-primary text-stone-900 px-4 py-2 rounded-lg text-xs font-bold uppercase tracking-wider hover:brightness-110 transition-all shadow-lg shadow-primary/20">
      <span class="material-symbols-outlined text-sm">backup</span>
      Backup Ahora
    </a>
  </div>
</div>

<!-- Quick Access Grid -->
<div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
  <a href="{{ url('/erp/configuracion/parametros') }}" class="flex flex-col items-center justify-center gap-3 p-6 bg-primary text-stone-900 rounded-xl font-headline font-bold text-sm uppercase tracking-wider transition-all hover:brightness-110 active:scale-95 shadow-lg shadow-primary/20 group">
    <span class="material-symbols-outlined text-3xl group-hover:scale-110 transition-transform">tune</span>
    <span class="text-center leading-tight">Parámetros</span>
  </a>
  <a href="{{ url('/erp/configuracion/fiscal') }}" class="flex flex-col items-center justify-center gap-3 p-6 bg-white border border-stone-200 text-stone-700 rounded-xl font-headline font-bold text-sm uppercase tracking-wider transition-all hover:border-primary hover:bg-primary/5 active:scale-95 group">
    <span class="material-symbols-outlined text-3xl group-hover:scale-110 transition-transform text-stone-400 group-hover:text-primary">policy</span>
    <span class="text-center leading-tight">Config Fiscal</span>
  </a>
  <a href="{{ url('/erp/configuracion/usuarios') }}" class="flex flex-col items-center justify-center gap-3 p-6 bg-white border border-stone-200 text-stone-700 rounded-xl font-headline font-bold text-sm uppercase tracking-wider transition-all hover:border-primary hover:bg-primary/5 active:scale-95 group">
    <span class="material-symbols-outlined text-3xl group-hover:scale-110 transition-transform text-stone-400 group-hover:text-primary">admin_panel_settings</span>
    <span class="text-center leading-tight">Usuarios</span>
  </a>
  <a href="{{ url('/erp/configuracion/estado-sistema') }}" class="flex flex-col items-center justify-center gap-3 p-6 bg-white border border-stone-200 text-stone-700 rounded-xl font-headline font-bold text-sm uppercase tracking-wider transition-all hover:border-primary hover:bg-primary/5 active:scale-95 group">
    <span class="material-symbols-outlined text-3xl group-hover:scale-110 transition-transform text-stone-400 group-hover:text-primary">health_and_safety</span>
    <span class="text-center leading-tight">Estado Sistema</span>
  </a>
</div>

<!-- Monitoring & Ops Section -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
  <!-- System Health Card -->
  <div class="bg-white rounded-xl border border-stone-200 p-8 shadow-sm">
    <div class="flex items-center gap-4 mb-8">
      <div class="w-12 h-12 bg-stone-900 rounded-xl flex items-center justify-center text-primary shadow-lg shadow-stone-900/10">
        <span class="material-symbols-outlined">health_and_safety</span>
      </div>
      <div>
        <h3 class="text-xl font-headline font-black text-stone-900 uppercase tracking-tight">Estado de Salud Digital</h3>
        <p class="text-xs text-stone-500 uppercase font-black tracking-widest">Monitoreo Industrial en Tiempo Real</p>
      </div>
    </div>

    <div class="space-y-5">
      <div class="flex items-center justify-between p-3 border-b border-stone-100">
        <span class="text-sm font-bold text-stone-600 uppercase tracking-tighter">Core API Services</span>
        <span class="px-3 py-1 bg-green-100 text-green-700 text-[9px] font-black rounded-full uppercase">Operativo</span>
      </div>
      <div class="flex items-center justify-between p-3 border-b border-stone-100">
        <span class="text-sm font-bold text-stone-600 uppercase tracking-tighter">Relational Database</span>
        <span class="px-3 py-1 bg-green-100 text-green-700 text-[9px] font-black rounded-full uppercase">Conectado</span>
      </div>
      <div class="flex items-center justify-between p-3 border-b border-stone-100">
        <span class="text-sm font-bold text-stone-600 uppercase tracking-tighter">Sesiones Activas</span>
        <span class="text-sm font-black text-stone-900">12 Operadores</span>
      </div>
      <div class="space-y-2 px-3 pt-2">
        <div class="flex justify-between items-center mb-1">
          <span class="text-xs font-bold text-stone-500 uppercase tracking-widest">Almacenamiento en Disco</span>
          <span class="text-xs font-black text-stone-900 uppercase">45% USADO</span>
        </div>
        <div class="w-full h-2 bg-stone-100 rounded-full overflow-hidden border border-stone-200">
          <div class="h-full bg-primary shadow-[0_0_10px_rgba(206,255,94,0.3)]" style="width: 45%"></div>
        </div>
      </div>
    </div>
  </div>

  <!-- Backup Activity -->
  <div class="bg-stone-900 rounded-xl p-8 shadow-2xl relative overflow-hidden border border-stone-800">
    <div class="relative z-10">
      <div class="flex items-center gap-4 mb-8">
        <div class="w-12 h-12 bg-stone-800 rounded-xl flex items-center justify-center text-primary border border-stone-700">
          <span class="material-symbols-outlined">backup</span>
        </div>
        <div>
          <h3 class="text-xl font-headline font-black text-primary uppercase tracking-tight">Gestión de Respaldo</h3>
          <p class="text-xs text-stone-500 uppercase font-black tracking-widest">Integridad y Recuperación</p>
        </div>
      </div>

      <div class="grid grid-cols-1 gap-4">
        <div class="p-5 bg-stone-800 border border-stone-700 rounded-xl flex items-center justify-between group hover:bg-stone-750 transition-all">
          <div class="flex items-center gap-4">
            <span class="material-symbols-outlined text-primary text-3xl">check_circle</span>
            <div>
              <p class="text-sm font-black text-stone-200 uppercase tracking-tighter">Backup Automático</p>
              <p class="text-[10px] text-stone-500 font-bold uppercase tracking-widest">Programado: Diario 23:00</p>
            </div>
          </div>
          <span class="px-3 py-1 bg-primary/20 text-primary text-[9px] font-black rounded uppercase border border-primary/30">Activo</span>
        </div>
        <div class="p-5 bg-stone-800 border border-stone-700 rounded-xl flex items-center justify-between group hover:bg-stone-750 transition-all">
          <div class="flex items-center gap-4">
            <span class="material-symbols-outlined text-stone-400 text-3xl">cloud_sync</span>
            <div>
              <p class="text-sm font-black text-stone-200 uppercase tracking-tighter">Sincronización Cloud</p>
              <p class="text-[10px] text-stone-500 font-bold uppercase tracking-widest">Ult: Hace 14 minutos</p>
            </div>
          </div>
          <span class="px-3 py-1 bg-stone-700 text-stone-400 text-[9px] font-black rounded uppercase border border-stone-600">Sincronizado</span>
        </div>
      </div>
      
      <div class="mt-8 p-4 bg-stone-950 border border-stone-800 rounded-xl">
        <p class="text-[9px] text-stone-500 font-black uppercase tracking-[0.2em] mb-3">Último Punto de Restauración</p>
        <div class="flex justify-between items-end">
          <div class="text-stone-300 font-headline font-bold text-lg">DB_ZENITH_PROD_12042026.sql</div>
          <button class="text-[9px] font-black text-primary uppercase tracking-widest hover:underline border border-primary/30 px-3 py-1 rounded">Restaurar</button>
        </div>
      </div>
    </div>
    <span class="material-symbols-outlined absolute -right-10 -bottom-10 text-[220px] opacity-10 text-primary pointer-events-none rotate-12">storage</span>
  </div>
</div>

<!-- Detailed Params Summary -->
<div class="bg-white rounded-xl border border-stone-200 p-8 shadow-sm">
  <div class="flex justify-between items-center mb-10 border-b border-stone-100 pb-6">
    <div class="flex items-center gap-4">
      <div class="w-10 h-10 bg-stone-100 rounded-lg flex items-center justify-center text-stone-400">
        <span class="material-symbols-outlined">settings_suggest</span>
      </div>
      <h3 class="text-xl font-headline font-black text-stone-900 uppercase tracking-tight">Parámetros Críticos</h3>
    </div>
    <a href="{{ url('/erp/configuracion/parametros') }}" class="text-[10px] font-black text-primary uppercase tracking-widest flex items-center gap-2 group hover:brightness-75 transition-all">
      CONFIGURACIÓN AVANZADA
      <span class="material-symbols-outlined text-sm group-hover:translate-x-1 transition-transform">arrow_forward</span>
    </a>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
    <div class="flex flex-col gap-3">
      <p class="text-[10px] font-black text-stone-400 uppercase tracking-widest border-l-2 border-primary pl-3">Identidad de Empresa</p>
      <div class="p-4 bg-stone-50 rounded-xl">
        <p class="text-sm font-bold text-stone-900">MAYOR DE REPUESTO LA CIMA, C.A.</p>
        <p class="text-[10px] text-stone-500 font-bold uppercase tracking-widest mt-1">RIF: J-40308741-5</p>
      </div>
    </div>
    <div class="flex flex-col gap-3">
      <p class="text-[10px] font-black text-stone-400 uppercase tracking-widest border-l-2 border-stone-900 pl-3">Configuración Fiscal</p>
      <div class="p-4 bg-stone-50 rounded-xl">
        <p class="text-sm font-bold text-stone-900">IVA Aplicable: 16% / 0%</p>
        <p class="text-[10px] text-stone-500 font-bold uppercase tracking-widest mt-1">Sujeto a Retención: SI</p>
      </div>
    </div>
    <div class="flex flex-col gap-3">
      <p class="text-[10px] font-black text-stone-400 uppercase tracking-widest border-l-2 border-stone-400 pl-3">Logística & Stock</p>
      <div class="p-4 bg-stone-50 rounded-xl">
        <p class="text-sm font-bold text-stone-900">Método Valuación: P.P.</p>
        <p class="text-[10px] text-stone-500 font-bold uppercase tracking-widest mt-1">Aprobación Compras: > $500</p>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/configuracion.js') }}"></script>
@endpush
