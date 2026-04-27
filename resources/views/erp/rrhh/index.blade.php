@extends('erp.layouts.app')

@section('title', 'Recursos Humanos | ERP Zenith')

@section('content')
<!-- Header -->
<div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4 mb-8">
  <div>
    <p class="text-xs font-bold text-stone-400 tracking-[0.2em] uppercase mb-1">
      Módulo de Recursos Humanos
    </p>
    <h2 class="text-3xl font-headline font-black text-stone-900 tracking-tight">
      Control de Personal
    </h2>
    <p class="text-stone-500 text-sm mt-1">
      MAYOR DE REPUESTO LA CIMA, C.A. • RIF: J-40308741-5
    </p>
  </div>
  <div class="flex gap-3">
    <a href="{{ url('/erp/rrhh/empleados') }}" class="flex items-center gap-2 bg-primary text-stone-900 px-4 py-2 rounded-lg text-xs font-bold uppercase tracking-wider hover:brightness-110 transition-all">
      <span class="material-symbols-outlined text-sm">person_add</span>
      Nuevo Empleado
    </a>
  </div>
</div>

<!-- KPI Cards -->
<div id="tour-hr-stats" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
  <div class="kpi-card">
    <div class="flex items-center justify-between mb-3">
      <div class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center">
        <span class="material-symbols-outlined text-blue-600">groups</span>
      </div>
    </div>
    <p class="text-[10px] font-bold text-stone-400 uppercase tracking-wider">
      Empleados Activos
    </p>
    <p class="text-2xl font-headline font-bold text-stone-900 mt-1">{{ $stats['empleados_activos'] }}</p>
    <p class="text-xs text-stone-500 mt-1">Personal operativo</p>
  </div>

  <div class="kpi-card">
    <div class="flex items-center justify-between mb-3">
      <div class="w-10 h-10 bg-green-50 rounded-lg flex items-center justify-center">
        <span class="material-symbols-outlined text-green-600">payments</span>
      </div>
    </div>
    <p class="text-[10px] font-bold text-stone-400 uppercase tracking-wider">
      Pendiente por Pagar
    </p>
    <p class="text-2xl font-headline font-bold text-stone-900 mt-1">
      ${{ number_format($stats['nomina_por_pagar'], 2) }}
    </p>
    <p class="text-xs text-stone-500 mt-1">Nómina generada</p>
  </div>
</div>

<!-- Action Buttons -->
<div id="tour-hr-actions" class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-12">
  <a href="{{ route('erp.rrhh.empleados') }}" class="action-btn bg-primary text-stone-900 hover:brightness-110 shadow-lg shadow-primary/20">
    <span class="material-symbols-outlined text-2xl">person</span>
    <span class="text-center leading-tight">Empleados</span>
  </a>
  <a href="{{ route('erp.rrhh.nomina') }}" class="action-btn bg-white border border-stone-200 text-stone-700 hover:border-primary hover:bg-primary/5">
    <span class="material-symbols-outlined text-2xl">payments</span>
    <span class="text-center leading-tight">Nómina</span>
  </a>
  <a href="{{ route('erp.rrhh.prestaciones') }}" class="action-btn bg-white border border-stone-200 text-stone-700 hover:border-primary hover:bg-primary/5">
    <span class="material-symbols-outlined text-2xl">savings</span>
    <span class="text-center leading-tight">Prestaciones</span>
  </a>
  <a href="{{ route('erp.rrhh.reportes') }}" class="action-btn bg-white border border-stone-200 text-stone-700 hover:border-primary hover:bg-primary/5">
    <span class="material-symbols-outlined text-2xl">group_work</span>
    <span class="text-center leading-tight">Reportes</span>
  </a>
</div>

<!-- Employees Table -->
<div class="bg-white rounded-xl border border-stone-200 p-6 mb-8">
  <div class="flex justify-between items-center mb-6">
    <div class="flex items-center gap-3">
      <div class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center">
        <span class="material-symbols-outlined text-blue-600">groups</span>
      </div>
      <div>
        <h3 class="text-lg font-bold text-stone-900">
          Empleados Recientes
        </h3>
        <p class="text-xs text-stone-500">
          Personal registrado en el sistema
        </p>
      </div>
    </div>
    <a href="{{ url('/erp/rrhh/empleados') }}" class="text-xs font-bold text-primary hover:brightness-75 flex items-center gap-1">
      Ver todos
      <span class="material-symbols-outlined text-sm">arrow_forward</span>
    </a>
  </div>

  <div class="overflow-x-auto">
    <table class="w-full">
      <thead class="border-b border-stone-200">
        <tr>
          <th class="text-xs font-bold text-stone-500 uppercase tracking-wider pb-3 text-left">
            Empleado
          </th>
          <th class="text-xs font-bold text-stone-500 uppercase tracking-wider pb-3 text-left">
            Departamento
          </th>
          <th class="text-xs font-bold text-stone-500 uppercase tracking-wider pb-3 text-left">
            Cargo
          </th>
          <th class="text-xs font-bold text-stone-500 uppercase tracking-wider pb-3 text-right">
            Salario
          </th>
          <th class="text-xs font-bold text-stone-500 uppercase tracking-wider pb-3 text-center">
            Estado
          </th>
        </tr>
      </thead>
      <tbody class="divide-y divide-stone-100">
        @forelse($recentEmployees as $empleado)
        <tr class="hover:bg-stone-50 transition-colors">
          <td class="py-3">
            <div class="flex items-center gap-3">
              <div class="w-8 h-8 bg-stone-200 rounded-full flex items-center justify-center text-xs font-bold font-headline">
                {{ strtoupper(substr($empleado->nombre, 0, 1) . substr($empleado->apellido, 0, 1)) }}
              </div>
              <div>
                <p class="text-sm font-bold text-stone-900">{{ $empleado->nombre }} {{ $empleado->apellido }}</p>
                <p class="text-[10px] text-stone-500">{{ $empleado->cedula }}</p>
              </div>
            </div>
          </td>
          <td class="py-3 text-stone-600 text-sm italic">{{ $empleado->departamento ?? 'General' }}</td>
          <td class="py-3 text-stone-600 text-sm font-medium">{{ $empleado->cargo ?? 'Técnico' }}</td>
          <td class="py-3 text-right font-black text-stone-900">${{ number_format($empleado->salario, 2) }}</td>
          <td class="py-3 text-center">
            <span class="px-2 py-0.5 rounded-full text-[9px] font-black uppercase tracking-widest {{ $empleado->estatus == 'ACTIVO' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                {{ $empleado->estatus }}
            </span>
          </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="py-12 text-center text-stone-400 italic text-sm">
                No hay personal registrado recientemente.
            </td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

<!-- Department Summary -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
  <!-- Employees by Department -->
  <div class="bg-white rounded-xl border border-stone-200 p-6">
    <div class="flex items-center gap-3 mb-6">
      <div class="w-10 h-10 bg-purple-50 rounded-lg flex items-center justify-center">
        <span class="material-symbols-outlined text-purple-600">group_work</span>
      </div>
      <div>
        <h3 class="text-lg font-bold text-stone-900">
          Empleados por Departamento
        </h3>
        <p class="text-xs text-stone-500">Distribución del personal</p>
      </div>
    </div>

    <div class="space-y-4">
      @php
          $colors = ['bg-blue-500', 'bg-green-500', 'bg-amber-500', 'bg-purple-500', 'bg-red-500', 'bg-teal-500'];
      @endphp
      @forelse($deptMix as $index => $dept)
      <div>
        <div class="flex justify-between items-center mb-2">
          <span class="text-sm font-medium text-stone-700">{{ $dept->departamento ?? 'General' }}</span>
          <span class="text-sm font-bold text-stone-900">{{ $dept->total }} empleados</span>
        </div>
        <div class="w-full bg-stone-100 rounded-full h-3">
          <div class="{{ $colors[$index % count($colors)] }} h-3 rounded-full" style="width: {{ $stats['total_empleados'] > 0 ? ($dept->total / $stats['total_empleados']) * 100 : 0 }}%"></div>
        </div>
      </div>
      @empty
      <p class="text-sm text-stone-500 italic">No hay departamentos registrados.</p>
      @endforelse
    </div>
  </div>

  <!-- Payroll Summary -->
  <div class="bg-white rounded-xl border border-stone-200 p-6">
    <div class="flex items-center gap-3 mb-6">
      <div class="w-10 h-10 bg-green-50 rounded-lg flex items-center justify-center">
        <span class="material-symbols-outlined text-green-600">payments</span>
      </div>
      <div>
        <h3 class="text-lg font-bold text-stone-900">
          Resumen de Nómina
        </h3>
        <p class="text-xs text-stone-500">Cálculo del mes actual</p>
      </div>
    </div>

    <div class="space-y-3">
      <div class="flex items-center justify-between p-3 bg-stone-50 rounded-lg">
        <span class="text-sm font-medium text-stone-700">Salarios Base</span>
        <span class="text-sm font-bold text-stone-900">${{ number_format($payrollSummary['salarios_base'], 2) }}</span>
      </div>
      <div class="flex items-center justify-between p-3 bg-stone-50 rounded-lg">
        <span class="text-sm font-medium text-stone-700">Horas Extra</span>
        <span class="text-sm font-bold text-stone-900">${{ number_format($payrollSummary['horas_extra'], 2) }}</span>
      </div>
      <div class="flex items-center justify-between p-3 bg-stone-50 rounded-lg">
        <span class="text-sm font-medium text-stone-700">Bonos / Cesta Ticket</span>
        <span class="text-sm font-bold text-stone-900">${{ number_format($payrollSummary['bonos'], 2) }}</span>
      </div>
      <div class="flex items-center justify-between p-3 bg-stone-50 rounded-lg">
        <span class="text-sm font-medium text-stone-700">Deducciones (IVSS, FAOV)</span>
        <span class="text-sm font-bold text-red-700">-${{ number_format($payrollSummary['deducciones'], 2) }}</span>
      </div>
      <div class="border-t border-stone-200 pt-4 flex justify-between items-center">
        <span class="text-sm font-bold text-stone-900">Total Nómina P.</span>
        <span class="text-lg font-headline font-bold text-green-700">${{ number_format($payrollSummary['total_neto'], 2) }}</span>
      </div>
    </div>
  </div>
</div>

<div class="pt-4 border-t border-stone-100 flex flex-col md:flex-row justify-between items-center gap-4">
  <span class="text-[10px] font-bold text-stone-400">RIF: J-40308741-5 • Todos los derechos reservados © 2026</span>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/rrhh.js') }}"></script>
@endpush
