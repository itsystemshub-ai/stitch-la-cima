@extends('erp.layouts.app')

@section('title', 'Gestión de Base de Datos | ERP Zenith')

@section('content')
<!-- Header -->
<div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4 mb-10">
  <div>
    <p class="text-xs font-bold text-stone-400 tracking-[0.2em] uppercase mb-1">Mantenimiento de Infraestructura</p>
    <h2 class="text-3xl font-headline font-black text-stone-900 tracking-tight">Núcleo de Base de Datos</h2>
    <p class="text-stone-500 text-sm mt-1">Monitoreo y Optimización de Almacenamiento • MAYOR DE REPUESTO LA CIMA, C.A.</p>
  </div>
  <div class="flex gap-3">
    <button class="bg-white border border-stone-200 text-stone-700 px-5 py-2.5 rounded-xl text-xs font-bold uppercase tracking-wider hover:bg-stone-50 transition-all active:scale-95 shadow-sm">
      Optimizar Índices
    </button>
    <button class="bg-stone-900 text-primary px-5 py-2.5 rounded-xl text-xs font-bold uppercase tracking-wider hover:brightness-110 transition-all active:scale-95 shadow-lg shadow-stone-900/10 flex items-center gap-2">
      <span class="material-symbols-outlined text-sm">storage</span>
      Chequeo de Integridad
    </button>
  </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 mb-8">
  <!-- Center Column: DB Stats & Tables -->
  <div class="lg:col-span-8 space-y-8">
    <!-- Health Overview Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
      <div class="bg-white p-6 rounded-xl border border-stone-200 shadow-sm border-l-4 border-primary">
        <p class="text-[9px] text-stone-400 font-black uppercase tracking-widest">Tamaño DB</p>
        <h3 class="text-2xl font-headline font-black text-stone-900 mt-1">1.24 GB</h3>
        <p class="text-[9px] text-lime-600 font-bold uppercase mt-1 flex items-center gap-1">
          <span class="material-symbols-outlined text-xs">keyboard_arrow_down</span> 0.5% este mes
        </p>
      </div>
      <div class="bg-white p-6 rounded-xl border border-stone-200 shadow-sm border-l-4 border-stone-900">
        <p class="text-[9px] text-stone-400 font-black uppercase tracking-widest">Total Registros</p>
        <h3 class="text-2xl font-headline font-black text-stone-900 mt-1">458,290</h3>
        <p class="text-[9px] text-stone-400 font-bold uppercase mt-1">Distribuido en 84 tablas</p>
      </div>
      <div class="bg-white p-6 rounded-xl border border-stone-200 shadow-sm border-l-4 border-stone-400">
        <p class="text-[9px] text-stone-400 font-black uppercase tracking-widest">Latencia Prom.</p>
        <h3 class="text-2xl font-headline font-black text-stone-900 mt-1">12 ms</h3>
        <p class="text-[9px] text-green-600 font-bold uppercase mt-1">Rendimiento Óptimo</p>
      </div>
    </div>

    <!-- Table Details -->
    <div class="bg-white rounded-xl border border-stone-200 shadow-sm overflow-hidden">
      <div class="px-8 py-6 border-b border-stone-100 bg-stone-50/50 flex justify-between items-center">
        <h3 class="font-headline font-bold text-lg text-stone-900 uppercase tracking-tight">Esquema de Tablas Críticas</h3>
        <span class="badge badge-green">MySQL 8.0 / InnoDB</span>
      </div>
      <div class="overflow-x-auto">
        <table class="w-full text-left">
          <thead>
            <tr class="bg-stone-50 text-[10px] font-black text-stone-400 uppercase tracking-widest border-b border-stone-100">
              <th class="p-6">Nombre de Tabla</th>
              <th class="p-6">Filas Estimadas</th>
              <th class="p-6">Espacio en Disco</th>
              <th class="p-6">Tipo</th>
              <th class="p-6 text-right">Mantenimiento</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-stone-100 text-sm font-body">
            <tr class="hover:bg-primary/5 transition-colors">
              <td class="p-6">
                <p class="font-black text-stone-900">products_kardex</p>
                <p class="text-[9px] text-stone-500 font-bold uppercase tracking-widest">Movimientos de Inventario</p>
              </td>
              <td class="p-6 font-mono font-bold text-stone-700">142,500</td>
              <td class="p-6 font-mono font-bold text-stone-700">256.4 MB</td>
              <td class="p-6">
                <span class="text-[10px] font-black text-stone-400 uppercase">Datos</span>
              </td>
              <td class="p-6 text-right">
                <button class="material-symbols-outlined text-stone-400 hover:text-primary transition-colors">rotate_left</button>
              </td>
            </tr>
            <tr class="hover:bg-primary/5 transition-colors">
              <td class="p-6">
                <p class="font-black text-stone-900">sales_ledger</p>
                <p class="text-[9px] text-stone-500 font-bold uppercase tracking-widest">Historial de Ventas</p>
              </td>
              <td class="p-6 font-mono font-bold text-stone-700">89,200</td>
              <td class="p-6 font-mono font-bold text-stone-700">188.1 MB</td>
              <td class="p-6">
                <span class="text-[10px] font-black text-stone-400 uppercase">Finanzas</span>
              </td>
              <td class="p-6 text-right">
                <button class="material-symbols-outlined text-stone-400 hover:text-primary transition-colors">rotate_left</button>
              </td>
            </tr>
            <tr class="hover:bg-primary/5 transition-colors">
              <td class="p-6">
                <p class="font-black text-stone-900">audit_logs</p>
                <p class="text-[9px] text-stone-500 font-bold uppercase tracking-widest">Registros de Seguridad</p>
              </td>
              <td class="p-6 font-mono font-bold text-stone-700">12,400</td>
              <td class="p-6 font-mono font-bold text-stone-700">64.5 MB</td>
              <td class="p-6">
                <span class="text-[10px] font-black text-stone-400 uppercase">Sistema</span>
              </td>
              <td class="p-6 text-right text-red-500">
                <button class="material-symbols-outlined hover:scale-110 transition-transform">delete_sweep</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Right Column: Monitoring & Actions -->
  <div class="lg:col-span-4 space-y-8">
    <!-- DB Engine Status -->
    <div class="bg-stone-900 p-8 rounded-xl shadow-2xl relative overflow-hidden border border-stone-800">
      <div class="relative z-10">
        <div class="flex items-center gap-3 mb-8">
          <div class="w-10 h-10 bg-primary/10 rounded-lg flex items-center justify-center text-primary">
            <span class="material-symbols-outlined text-2xl font-black">dns</span>
          </div>
          <h3 class="text-xl font-headline font-black text-stone-100 uppercase tracking-tight">Motor de Datos</h3>
        </div>
        
        <div class="space-y-6">
          <div class="flex justify-between items-center px-4 py-3 bg-stone-800 border border-stone-700 rounded-xl">
            <span class="text-[10px] font-black text-stone-500 uppercase tracking-[0.2em]">Uptime</span>
            <span class="text-xs font-black text-stone-200">242 d : 11 h</span>
          </div>
          <div class="flex justify-between items-center px-4 py-3 bg-stone-800 border border-stone-700 rounded-xl">
            <span class="text-[10px] font-black text-stone-500 uppercase tracking-[0.2em]">Max Connections</span>
            <span class="text-xs font-black text-stone-200">151 / 200</span>
          </div>
          <div class="pt-4 border-t border-stone-800">
            <p class="text-[9px] text-stone-500 font-bold uppercase tracking-widest mb-3">Health Pulse</p>
            <div class="flex items-center gap-4">
              <span class="w-3 h-3 bg-green-500 rounded-full animate-ping"></span>
              <span class="text-xs font-black text-green-500 uppercase tracking-tighter">Motor Operativo al 100%</span>
            </div>
          </div>
        </div>
      </div>
      <span class="material-symbols-outlined absolute -right-12 -bottom-12 text-[250px] opacity-10 text-primary pointer-events-none rotate-12">database</span>
    </div>

    <!-- DB Cleanup Actions -->
    <div class="bg-white rounded-xl border border-stone-200 p-8 shadow-sm">
      <h4 class="text-[10px] font-black text-stone-400 uppercase tracking-[0.2em] mb-6">Mantenimiento Preventivo</h4>
      <div class="space-y-4">
        <button class="w-full flex items-center justify-between p-4 bg-stone-50 rounded-xl border border-stone-100 hover:bg-stone-100 transition-all font-bold text-xs text-stone-900 group">
          Limpiar Tablas Temporales
          <span class="material-symbols-outlined text-stone-400 group-hover:text-amber-600 transition-colors">cleaning_services</span>
        </button>
        <button class="w-full flex items-center justify-between p-4 bg-stone-50 rounded-xl border border-stone-100 hover:bg-stone-100 transition-all font-bold text-xs text-stone-900 group">
          Regenerar Estadísticas
          <span class="material-symbols-outlined text-stone-400 group-hover:text-blue-600 transition-colors">analytics</span>
        </button>
        <button class="w-full flex items-center justify-between p-4 bg-stone-50 rounded-xl border border-stone-100 hover:bg-stone-100 transition-all font-bold text-xs text-stone-900 group">
          Verificar Foreign Keys
          <span class="material-symbols-outlined text-stone-400 group-hover:text-green-600 transition-colors">account_tree</span>
        </button>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/base-datos.js') }}"></script>
@endpush
