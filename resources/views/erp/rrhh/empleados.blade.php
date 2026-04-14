@extends('erp.layouts.app')

@section('title', 'Expediente de Empleados | ERP Zenith')

@section('content')
<!-- Header -->
<div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4 mb-8">
  <div>
    <p class="text-xs font-bold text-stone-400 tracking-[0.2em] uppercase mb-1">
      Recursos Humanos
    </p>
    <h2 class="text-3xl font-headline font-black text-stone-900 tracking-tight">
      Expediente Digital de Empleados
    </h2>
    <p class="text-stone-500 text-sm mt-1">
      Gestión Centralizada de Personal • MAYOR DE REPUESTO LA CIMA, C.A.
    </p>
  </div>
  <div class="flex gap-3">
    <button class="bg-stone-100 text-stone-700 px-4 py-2 rounded-lg text-xs font-bold uppercase tracking-wider hover:bg-stone-200 transition-all flex items-center gap-2">
      <span class="material-symbols-outlined text-sm">filter_list</span>
      Filtros Avanzados
    </button>
    <button class="bg-primary text-stone-900 px-4 py-2 rounded-lg text-xs font-bold uppercase tracking-wider hover:brightness-110 transition-all flex items-center gap-2 shadow-lg shadow-primary/20">
      <span class="material-symbols-outlined text-sm">person_add</span>
      Nuevo Empleado
    </button>
  </div>
</div>

<!-- Stats Bento Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
  <div class="bg-white p-6 rounded-xl border border-stone-200 shadow-sm border-l-4 border-primary">
    <p class="text-[10px] uppercase font-bold text-stone-400 tracking-widest">Total Personal</p>
    <p class="text-3xl font-headline font-bold text-stone-900 mt-1">1,248</p>
    <p class="text-xs text-green-600 font-bold mt-2 flex items-center gap-1">
      <span class="material-symbols-outlined text-xs">trending_up</span> +12% este trimestre
    </p>
  </div>
  <div class="bg-white p-6 rounded-xl border border-stone-200 shadow-sm">
    <p class="text-[10px] uppercase font-bold text-stone-400 tracking-widest">Operaciones Activas</p>
    <p class="text-3xl font-headline font-bold text-stone-900 mt-1">1,182</p>
    <p class="text-xs text-stone-500 mt-2">Planta y Logística</p>
  </div>
  <div class="bg-white p-6 rounded-xl border border-stone-200 shadow-sm">
    <p class="text-[10px] uppercase font-bold text-stone-400 tracking-widest">En Vacaciones / Permiso</p>
    <p class="text-3xl font-headline font-bold text-stone-900 mt-1">24</p>
    <p class="text-xs text-stone-500 mt-2">Vacaciones / Médico</p>
  </div>
  <div class="bg-white p-6 rounded-xl border border-stone-200 shadow-sm">
    <p class="text-[10px] uppercase font-bold text-stone-400 tracking-widest">Aprobaciones Pendientes</p>
    <p class="text-3xl font-headline font-bold text-red-600 mt-1">08</p>
    <p class="text-xs text-red-500 font-bold mt-2">Requiere acción</p>
  </div>
</div>

<!-- Main Table Section -->
<div class="bg-white rounded-xl border border-stone-200 shadow-sm overflow-hidden">
  <!-- Filters Bar -->
  <div class="bg-stone-50 px-6 py-4 flex flex-wrap gap-6 items-center border-b border-stone-200">
    <div class="flex flex-col gap-1">
      <label class="text-[10px] font-bold uppercase text-stone-500">Departamento</label>
      <select class="bg-white border-stone-200 rounded-lg text-xs font-bold py-1.5 px-3 focus:ring-2 focus:ring-primary/50 transition-all">
        <option>Todos los Departamentos</option>
        <option>Ventas</option>
        <option>Almacen</option>
        <option>Contabilidad</option>
        <option>Mantenimiento</option>
        <option>Calidad</option>
        <option>Logística</option>
      </select>
    </div>
    <div class="flex flex-col gap-1">
      <label class="text-[10px] font-bold uppercase text-stone-500">Nivel de Cargo</label>
      <select class="bg-white border-stone-200 rounded-lg text-xs font-bold py-1.5 px-3 focus:ring-2 focus:ring-primary/50 transition-all">
        <option>Todos los Niveles</option>
        <option>Ejecutivo</option>
        <option>Líder de Equipo</option>
        <option>Especialista</option>
        <option>Operador</option>
      </select>
    </div>
    <div class="flex flex-col gap-1">
      <label class="text-[10px] font-bold uppercase text-stone-500">Antigüedad</label>
      <select class="bg-white border-stone-200 rounded-lg text-xs font-bold py-1.5 px-3 focus:ring-2 focus:ring-primary/50 transition-all">
        <option>Cualquier duración</option>
        <option>5+ Años</option>
        <option>2-5 Años</option>
        <option>Menos de 2 años</option>
      </select>
    </div>
    <div class="flex-1"></div>
    <div class="flex gap-2">
      <button class="p-2 text-stone-500 hover:text-primary transition-colors">
        <span class="material-symbols-outlined">download</span>
      </button>
      <button class="p-2 text-stone-500 hover:text-primary transition-colors">
        <span class="material-symbols-outlined">print</span>
      </button>
    </div>
  </div>

  <!-- Table -->
  <div class="overflow-x-auto">
    <table class="w-full text-left border-collapse">
      <thead>
        <tr class="bg-stone-50 text-stone-500 font-bold uppercase text-[10px] tracking-widest border-b border-stone-200">
          <th class="px-6 py-4">Empleado</th>
          <th class="px-4 py-4">Cédula (V/E)</th>
          <th class="px-4 py-4">Departamento</th>
          <th class="px-4 py-4">Cargo</th>
          <th class="px-4 py-4 text-right">Salario Base</th>
          <th class="px-4 py-4">Fecha Ingreso</th>
          <th class="px-4 py-4">Estado</th>
          <th class="px-6 py-4 text-right">Acciones</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-stone-100 text-sm">
        <tr class="hover:bg-stone-50/80 transition-colors">
          <td class="px-6 py-4">
            <div class="flex items-center gap-3">
              <div class="w-9 h-9 rounded-full bg-stone-100 flex items-center justify-center font-bold text-stone-600">MR</div>
              <div>
                <p class="font-bold text-stone-900">Marcos Rodríguez</p>
                <p class="text-[10px] text-stone-500">m.rodriguez@lacima.com</p>
              </div>
            </div>
          </td>
          <td class="px-4 py-4 font-mono text-xs text-stone-500">V-18.452.102</td>
          <td class="px-4 py-4">
            <span class="bg-stone-100 px-2 py-0.5 rounded text-[10px] font-bold uppercase text-stone-600">Mantenimiento</span>
          </td>
          <td class="px-4 py-4 text-stone-700 font-medium">Técnico Jefe</td>
          <td class="px-4 py-4 text-right font-bold text-stone-900">$2,850.00</td>
          <td class="px-4 py-4 text-stone-500 text-xs">15 Ene 2018</td>
          <td class="px-4 py-4">
            <span class="badge badge-green">Activo</span>
          </td>
          <td class="px-6 py-4">
            <div class="flex justify-end gap-2">
              <button class="p-1.5 text-stone-400 hover:text-primary transition-all" title="Ver Expediente">
                <span class="material-symbols-outlined text-lg">folder_shared</span>
              </button>
              <button class="p-1.5 text-stone-400 hover:text-primary transition-all" title="Editar">
                <span class="material-symbols-outlined text-lg">edit_square</span>
              </button>
            </div>
          </td>
        </tr>
        <tr class="hover:bg-stone-50/80 transition-colors">
          <td class="px-6 py-4">
            <div class="flex items-center gap-3">
              <div class="w-9 h-9 rounded-full bg-stone-100 flex items-center justify-center font-bold text-stone-600">EV</div>
              <div>
                <p class="font-bold text-stone-900">Elena Vasquez</p>
                <p class="text-[10px] text-stone-500">e.vasquez@lacima.com</p>
              </div>
            </div>
          </td>
          <td class="px-4 py-4 font-mono text-xs text-stone-500">V-22.109.443</td>
          <td class="px-4 py-4">
            <span class="bg-stone-100 px-2 py-0.5 rounded text-[10px] font-bold uppercase text-stone-600">Logística</span>
          </td>
          <td class="px-4 py-4 text-stone-700 font-medium">Analista de Cadena</td>
          <td class="px-4 py-4 text-right font-bold text-stone-900">$3,100.00</td>
          <td class="px-4 py-4 text-stone-500 text-xs">03 May 2020</td>
          <td class="px-4 py-4">
            <span class="badge badge-green">Activo</span>
          </td>
          <td class="px-6 py-4">
            <div class="flex justify-end gap-2">
              <button class="p-1.5 text-stone-400 hover:text-primary transition-all">
                <span class="material-symbols-outlined text-lg">folder_shared</span>
              </button>
              <button class="p-1.5 text-stone-400 hover:text-primary transition-all">
                <span class="material-symbols-outlined text-lg">edit_square</span>
              </button>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  <!-- Pagination -->
  <div class="px-6 py-4 bg-stone-50 flex justify-between items-center border-t border-stone-200">
    <p class="text-xs text-stone-500 font-medium">Mostrando 1-2 de 1,248 empleados</p>
    <div class="flex gap-1">
      <button class="w-8 h-8 flex items-center justify-center bg-white border border-stone-200 rounded text-stone-400 hover:bg-primary hover:text-stone-900 transition-colors">
        <span class="material-symbols-outlined text-sm">chevron_left</span>
      </button>
      <button class="w-8 h-8 flex items-center justify-center bg-primary text-stone-900 rounded font-bold text-xs ring-2 ring-primary ring-offset-2">1</button>
      <button class="w-8 h-8 flex items-center justify-center bg-white border border-stone-200 rounded text-stone-500 hover:bg-primary hover:text-stone-900 transition-colors font-bold text-xs">2</button>
      <button class="w-8 h-8 flex items-center justify-center bg-white border border-stone-200 rounded text-stone-400 hover:bg-primary hover:text-stone-900 transition-colors">
        <span class="material-symbols-outlined text-sm">chevron_right</span>
      </button>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/empleados.js') }}"></script>
@endpush
