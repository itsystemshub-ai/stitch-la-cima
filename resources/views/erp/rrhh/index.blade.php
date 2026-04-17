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
      <span class="badge badge-green">+2</span>
    </div>
    <p class="text-[10px] font-bold text-stone-400 uppercase tracking-wider">
      Empleados Activos
    </p>
    <p class="text-2xl font-headline font-bold text-stone-900 mt-1">24</p>
    <p class="text-xs text-stone-500 mt-1">Personal registrado</p>
  </div>

  <div class="kpi-card">
    <div class="flex items-center justify-between mb-3">
      <div class="w-10 h-10 bg-green-50 rounded-lg flex items-center justify-center">
        <span class="material-symbols-outlined text-green-600">payments</span>
      </div>
      <span class="badge badge-green">+5%</span>
    </div>
    <p class="text-[10px] font-bold text-stone-400 uppercase tracking-wider">
      Nómina Mensual
    </p>
    <p class="text-2xl font-headline font-bold text-stone-900 mt-1">
      $36,000
    </p>
    <p class="text-xs text-stone-500 mt-1">Total salarios</p>
  </div>

  <div class="kpi-card">
    <div class="flex items-center justify-between mb-3">
      <div class="w-10 h-10 bg-amber-50 rounded-lg flex items-center justify-center">
        <span class="material-symbols-outlined text-amber-600">calendar_month</span>
      </div>
      <span class="badge badge-yellow">3</span>
    </div>
    <p class="text-[10px] font-bold text-stone-400 uppercase tracking-wider">
      Vacaciones Pendientes
    </p>
    <p class="text-2xl font-headline font-bold text-stone-900 mt-1">3</p>
    <p class="text-xs text-stone-500 mt-1">Por aprobar</p>
  </div>

  <div class="kpi-card">
    <div class="flex items-center justify-between mb-3">
      <div class="w-10 h-10 bg-purple-50 rounded-lg flex items-center justify-center">
        <span class="material-symbols-outlined text-purple-600">emoji_events</span>
      </div>
      <span class="badge badge-green">95%</span>
    </div>
    <p class="text-[10px] font-bold text-stone-400 uppercase tracking-wider">
      Asistencia Promedio
    </p>
    <p class="text-2xl font-headline font-bold text-stone-900 mt-1">
      95%
    </p>
    <p class="text-xs text-stone-500 mt-1">Este mes</p>
  </div>
</div>

<!-- Action Buttons -->
<div id="tour-hr-actions" class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
  <a href="{{ url('/erp/rrhh/empleados') }}" class="action-btn bg-primary text-stone-900 hover:brightness-110 shadow-lg shadow-primary/20">
    <span class="material-symbols-outlined text-2xl">person</span>
    <span class="text-center leading-tight">Empleados</span>
  </a>
  <a href="{{ url('/erp/rrhh/nomina') }}" class="action-btn bg-white border border-stone-200 text-stone-700 hover:border-primary hover:bg-primary/5">
    <span class="material-symbols-outlined text-2xl">payments</span>
    <span class="text-center leading-tight">Nómina</span>
  </a>
  <a href="{{ url('/erp/rrhh/prestaciones') }}" class="action-btn bg-white border border-stone-200 text-stone-700 hover:border-primary hover:bg-primary/5">
    <span class="material-symbols-outlined text-2xl">savings</span>
    <span class="text-center leading-tight">Prestaciones</span>
  </a>
  <a href="{{ url('/erp/rrhh/reportes') }}" class="action-btn bg-white border border-stone-200 text-stone-700 hover:border-primary hover:bg-primary/5">
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
        <tr class="hover:bg-stone-50 transition-colors">
          <td class="py-3">
            <div class="flex items-center gap-3">
              <div class="w-8 h-8 bg-stone-200 rounded-full flex items-center justify-center text-xs font-bold">
                JP
              </div>
              <div>
                <p class="text-sm font-bold text-stone-900">Juan Pérez</p>
                <p class="text-[10px] text-stone-500">V-12345678</p>
              </div>
            </div>
          </td>
          <td class="py-3 text-stone-600 text-sm">Ventas</td>
          <td class="py-3 text-stone-600 text-sm">Vendedor Senior</td>
          <td class="py-3 text-right font-bold text-stone-900">$1,500</td>
          <td class="py-3 text-center">
            <span class="badge badge-green">Activo</span>
          </td>
        </tr>
        <tr class="hover:bg-stone-50 transition-colors">
          <td class="py-3">
            <div class="flex items-center gap-3">
              <div class="w-8 h-8 bg-stone-200 rounded-full flex items-center justify-center text-xs font-bold">
                MG
              </div>
              <div>
                <p class="text-sm font-bold text-stone-900">
                  María González
                </p>
                <p class="text-[10px] text-stone-500">V-87654321</p>
              </div>
            </div>
          </td>
          <td class="py-3 text-stone-600 text-sm">Almacén</td>
          <td class="py-3 text-stone-600 text-sm">Almacenista</td>
          <td class="py-3 text-right font-bold text-stone-900">$1,200</td>
          <td class="py-3 text-center">
            <span class="badge badge-green">Activo</span>
          </td>
        </tr>
        <tr class="hover:bg-stone-50 transition-colors">
          <td class="py-3">
            <div class="flex items-center gap-3">
              <div class="w-8 h-8 bg-stone-200 rounded-full flex items-center justify-center text-xs font-bold">
                PR
              </div>
              <div>
                <p class="text-sm font-bold text-stone-900">
                  Pedro Ramírez
                </p>
                <p class="text-[10px] text-stone-500">V-11223344</p>
              </div>
            </div>
          </td>
          <td class="py-3 text-stone-600 text-sm">Contabilidad</td>
          <td class="py-3 text-stone-600 text-sm">Contador</td>
          <td class="py-3 text-right font-bold text-stone-900">$2,000</td>
          <td class="py-3 text-center">
            <span class="badge badge-green">Activo</span>
          </td>
        </tr>
        <tr class="hover:bg-stone-50 transition-colors">
          <td class="py-3">
            <div class="flex items-center gap-3">
              <div class="w-8 h-8 bg-stone-200 rounded-full flex items-center justify-center text-xs font-bold">
                AL
              </div>
              <div>
                <p class="text-sm font-bold text-stone-900">Ana López</p>
                <p class="text-[10px] text-stone-500">V-55667788</p>
              </div>
            </div>
          </td>
          <td class="py-3 text-stone-600 text-sm">RRHH</td>
          <td class="py-3 text-stone-600 text-sm">Gerente RRHH</td>
          <td class="py-3 text-right font-bold text-stone-900">$2,500</td>
          <td class="py-3 text-center">
            <span class="badge badge-green">Activo</span>
          </td>
        </tr>
        <tr class="hover:bg-stone-50 transition-colors">
          <td class="py-3">
            <div class="flex items-center gap-3">
              <div class="w-8 h-8 bg-stone-200 rounded-full flex items-center justify-center text-xs font-bold">
                CD
              </div>
              <div>
                <p class="text-sm font-bold text-stone-900">
                  Carlos Díaz
                </p>
                <p class="text-[10px] text-stone-500">V-99887766</p>
              </div>
            </div>
          </td>
          <td class="py-3 text-stone-600 text-sm">Servicio Técnico</td>
          <td class="py-3 text-stone-600 text-sm">Técnico</td>
          <td class="py-3 text-right font-bold text-stone-900">$1,300</td>
          <td class="py-3 text-center">
            <span class="badge badge-yellow">Vacaciones</span>
          </td>
        </tr>
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
      <div>
        <div class="flex justify-between items-center mb-2">
          <span class="text-sm font-medium text-stone-700">Ventas</span>
          <span class="text-sm font-bold text-stone-900">8 empleados</span>
        </div>
        <div class="w-full bg-stone-100 rounded-full h-3">
          <div class="bg-blue-500 h-3 rounded-full" style="width: 33%"></div>
        </div>
      </div>
      <div>
        <div class="flex justify-between items-center mb-2">
          <span class="text-sm font-medium text-stone-700">Almacén</span>
          <span class="text-sm font-bold text-stone-900">6 empleados</span>
        </div>
        <div class="w-full bg-stone-100 rounded-full h-3">
          <div class="bg-green-500 h-3 rounded-full" style="width: 25%"></div>
        </div>
      </div>
      <div>
        <div class="flex justify-between items-center mb-2">
          <span class="text-sm font-medium text-stone-700">Contabilidad</span>
          <span class="text-sm font-bold text-stone-900">4 empleados</span>
        </div>
        <div class="w-full bg-stone-100 rounded-full h-3">
          <div class="bg-amber-500 h-3 rounded-full" style="width: 17%"></div>
        </div>
      </div>
      <div>
        <div class="flex justify-between items-center mb-2">
          <span class="text-sm font-medium text-stone-700">RRHH</span>
          <span class="text-sm font-bold text-stone-900">3 empleados</span>
        </div>
        <div class="w-full bg-stone-100 rounded-full h-3">
          <div class="bg-purple-500 h-3 rounded-full" style="width: 12%"></div>
        </div>
      </div>
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
        <span class="text-sm font-bold text-stone-900">$30,000</span>
      </div>
      <div class="flex items-center justify-between p-3 bg-stone-50 rounded-lg">
        <span class="text-sm font-medium text-stone-700">Horas Extra</span>
        <span class="text-sm font-bold text-stone-900">$2,500</span>
      </div>
      <div class="flex items-center justify-between p-3 bg-stone-50 rounded-lg">
        <span class="text-sm font-medium text-stone-700">Cesta Ticket</span>
        <span class="text-sm font-bold text-stone-900">$3,500</span>
      </div>
      <div class="flex items-center justify-between p-3 bg-stone-50 rounded-lg">
        <span class="text-sm font-medium text-stone-700">Deducciones (IVSS, FAOV)</span>
        <span class="text-sm font-bold text-red-700">-$4,200</span>
      </div>
      <div class="border-t border-stone-200 pt-4 flex justify-between items-center">
        <span class="text-sm font-bold text-stone-900">Total Nómina</span>
        <span class="text-lg font-headline font-bold text-green-700">$36,000</span>
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
