@extends('erp.layouts.app')

@section('title', 'Mis Tickets de Soporte | ERP Zenith')

@section('content')
<!-- Header -->
<div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4 mb-10">
  <div>
    <p class="text-xs font-bold text-stone-400 tracking-[0.2em] uppercase mb-1">Manejo de Incidentes</p>
    <h2 class="text-3xl font-headline font-black text-stone-900 tracking-tight">Tickets de Soporte</h2>
    <p class="text-stone-500 text-sm mt-1">Historial de Consultas y Soluciones • MAYOR DE REPUESTO LA CIMA, C.A.</p>
  </div>
  <div class="flex gap-3">
    <a href="{{ url('/erp/ayuda/crear-ticket') }}" class="bg-stone-900 text-primary px-5 py-2.5 rounded-xl text-xs font-bold uppercase tracking-wider hover:brightness-110 transition-all active:scale-95 shadow-lg shadow-stone-900/10 flex items-center gap-2">
      <span class="material-symbols-outlined text-sm">add</span>
      Nuevo Requerimiento
    </a>
  </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
  <!-- Left Column: Tickets Table -->
  <div class="lg:col-span-12">
    <div class="bg-white rounded-xl border border-stone-200 shadow-sm overflow-hidden">
      <div class="px-8 py-6 border-b border-stone-100 bg-stone-50/50 flex flex-col md:flex-row justify-between items-center gap-4">
        <div class="flex gap-2">
          <button class="px-4 py-1.5 bg-stone-900 text-primary text-[10px] font-black uppercase rounded-full shadow-lg shadow-stone-900/10">Todos</button>
          <button class="px-4 py-1.5 bg-white text-stone-400 text-[10px] font-black uppercase rounded-full border border-stone-200 hover:bg-stone-50 transition-colors">Abiertos</button>
          <button class="px-4 py-1.5 bg-white text-stone-400 text-[10px] font-black uppercase rounded-full border border-stone-200 hover:bg-stone-50 transition-colors">Resueltos</button>
        </div>
        <div class="relative group w-full md:w-64">
          <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-stone-300">
            <span class="material-symbols-outlined text-sm">search</span>
          </span>
          <input type="text" placeholder="Filtrar por ID o Asunto..." class="w-full bg-white border border-stone-200 text-xs pl-9 pr-4 py-2.5 rounded-xl focus:ring-2 focus:ring-primary/50 transition-all shadow-sm"/>
        </div>
      </div>
      
      <div class="overflow-x-auto">
        <table class="w-full text-left">
          <thead>
            <tr class="bg-stone-50 text-[10px] font-black text-stone-400 uppercase tracking-widest border-b border-stone-100">
              <th class="p-6">ID Ticket</th>
              <th class="p-6">Prioridad</th>
              <th class="p-6">Asunto del Requerimiento</th>
              <th class="p-6">Módulo / Area</th>
              <th class="p-6">Última Actividad</th>
              <th class="p-6">Estado</th>
              <th class="p-6 text-right">Acciones</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-stone-100 text-sm font-body">
            <tr class="hover:bg-primary/5 transition-all">
              <td class="p-6 font-mono font-black text-stone-900">#TK-2026-042</td>
              <td class="p-6 text-center">
                <span class="px-2 py-0.5 bg-red-100 text-red-700 text-[9px] font-black rounded uppercase">Alta</span>
              </td>
              <td class="p-6">
                <p class="font-bold text-stone-700">Error en cierre de caja POS</p>
                <p class="text-[9px] text-stone-400 uppercase font-black mt-1">Reportado por: Admin_Cima</p>
              </td>
              <td class="p-6">
                <span class="px-3 py-1 bg-stone-100 text-stone-600 text-[9px] font-black rounded-lg uppercase">Ventas / POS</span>
              </td>
              <td class="p-6 text-stone-500 font-bold text-xs uppercase">Hace 2 horas</td>
              <td class="p-6">
                <div class="flex items-center gap-2">
                  <div class="w-2 h-2 bg-amber-500 rounded-full animate-pulse"></div>
                  <span class="text-[10px] font-black text-amber-700 uppercase">En Revisión</span>
                </div>
              </td>
              <td class="p-6 text-right">
                <button class="bg-stone-900 text-primary p-2 rounded-lg hover:brightness-110 active:scale-95 transition-all shadow-md shadow-stone-900/10">
                  <span class="material-symbols-outlined text-sm">visibility</span>
                </button>
              </td>
            </tr>

            <tr class="hover:bg-primary/5 transition-all">
              <td class="p-6 font-mono font-black text-stone-900">#TK-2026-039</td>
              <td class="p-6 text-center">
                <span class="px-2 py-0.5 bg-stone-100 text-stone-500 text-[9px] font-black rounded uppercase">Media</span>
              </td>
              <td class="p-6">
                <p class="font-bold text-stone-700">Solicitud nueva columna en Kardex</p>
                <p class="text-[9px] text-stone-400 uppercase font-black mt-1">Reportado por: Javier_Ops</p>
              </td>
              <td class="p-6">
                <span class="px-3 py-1 bg-stone-100 text-stone-600 text-[9px] font-black rounded-lg uppercase">Inventario</span>
              </td>
              <td class="p-6 text-stone-300 font-bold text-xs uppercase">Ayer, 09:15 AM</td>
              <td class="p-6">
                <div class="flex items-center gap-2">
                  <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                  <span class="text-[10px] font-black text-green-700 uppercase">Completado</span>
                </div>
              </td>
              <td class="p-6 text-right">
                <button class="bg-stone-50 text-stone-400 p-2 rounded-lg hover:bg-stone-100 transition-all">
                  <span class="material-symbols-outlined text-sm">visibility</span>
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="px-8 py-6 border-t border-stone-100 bg-stone-50/30 flex justify-between items-center">
        <p class="text-[10px] font-black text-stone-400 uppercase tracking-widest">Mostrando 2 de 2 tickets encontrados</p>
        <div class="flex gap-2">
          <button class="w-8 h-8 rounded-lg flex items-center justify-center text-stone-300 border border-stone-100 hover:border-stone-200 transition-all cursor-not-allowed">
            <span class="material-symbols-outlined text-sm">chevron_left</span>
          </button>
          <button class="w-8 h-8 rounded-lg flex items-center justify-center text-stone-900 border border-primary bg-primary/10 transition-all font-black text-xs">1</button>
          <button class="w-8 h-8 rounded-lg flex items-center justify-center text-stone-300 border border-stone-100 hover:border-stone-200 transition-all cursor-not-allowed">
            <span class="material-symbols-outlined text-sm">chevron_right</span>
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/tickets.js') }}"></script>
@endpush
