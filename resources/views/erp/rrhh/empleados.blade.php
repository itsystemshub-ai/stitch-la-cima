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
    <p class="text-3xl font-headline font-bold text-stone-900 mt-1">{{ count($empleados) }}</p>
    <p class="text-xs text-green-600 font-bold mt-2 flex items-center gap-1">
      <span class="material-symbols-outlined text-xs">trending_up</span> Personal Registrado
    </p>
  </div>
  <div class="bg-white p-6 rounded-xl border border-stone-200 shadow-sm">
    <p class="text-[10px] uppercase font-bold text-stone-400 tracking-widest">Activos</p>
    <p class="text-3xl font-headline font-bold text-stone-900 mt-1">{{ $empleados->where('estatus', 'ACTIVO')->count() }}</p>
    <p class="text-xs text-stone-500 mt-2">Personal Operativo</p>
  </div>
</div>

<!-- Main Table Section -->
<div class="bg-white rounded-xl border border-stone-200 shadow-sm overflow-hidden">
  <!-- Table -->
  <div class="overflow-x-auto">
    <table class="w-full text-left border-collapse">
      <thead>
        <tr class="bg-stone-50 text-stone-500 font-bold uppercase text-[10px] tracking-widest border-b border-stone-200">
          <th class="px-6 py-4">Empleado</th>
          <th class="px-4 py-4">Cédula</th>
          <th class="px-4 py-4">Cargo</th>
          <th class="px-4 py-4 text-right">Salario Base</th>
          <th class="px-4 py-4">Fecha Ingreso</th>
          <th class="px-4 py-4">Estado</th>
          <th class="px-6 py-4 text-right">Acciones</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-stone-100 text-sm">
        @forelse($empleados as $empleado)
        <tr class="hover:bg-stone-50/80 transition-colors">
          <td class="px-6 py-4">
            <div class="flex items-center gap-3">
              <div class="w-9 h-9 rounded-full bg-stone-100 flex items-center justify-center font-bold text-stone-600">
                {{ substr($empleado->nombre, 0, 1) }}{{ substr($empleado->apellido, 0, 1) }}
              </div>
              <div>
                <p class="font-bold text-stone-900">{{ $empleado->nombre_completo }}</p>
                <p class="text-[10px] text-stone-500">{{ $empleado->email }}</p>
              </div>
            </div>
          </td>
          <td class="px-4 py-4 font-mono text-xs text-stone-500">{{ $empleado->cedula }}</td>
          <td class="px-4 py-4 text-stone-700 font-medium">{{ $empleado->cargo }}</td>
          <td class="px-4 py-4 text-right font-bold text-stone-900">${{ number_format($empleado->salario, 2) }}</td>
          <td class="px-4 py-4 text-stone-500 text-xs">{{ $empleado->fecha_ingreso->format('d M Y') }}</td>
          <td class="px-4 py-4">
            <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase {{ $empleado->estatus === 'ACTIVO' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                {{ $empleado->estatus }}
            </span>
          </td>
          <td class="px-6 py-4 text-right">
            <div class="flex justify-end gap-2">
              <button class="p-1.5 text-stone-400 hover:text-primary transition-all">
                <span class="material-symbols-outlined text-lg">folder_shared</span>
              </button>
            </div>
          </td>
        </tr>
        @empty
        <tr>
            <td colspan="7" class="px-6 py-10 text-center text-stone-500">No hay empleados registrados.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <!-- Pagination -->
  <div class="px-6 py-4 bg-stone-50 border-t border-stone-200">
    {{ $empleados->links() }}
  </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/empleados.js') }}"></script>
@endpush
