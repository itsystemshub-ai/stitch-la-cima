@extends('erp.layouts.app')

@section('title', 'Cálculo de Nómina | ERP Zenith')

@section('content')
<!-- Header -->
<div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4 mb-8">
  <div>
    <p class="text-xs font-bold text-stone-400 tracking-[0.2em] uppercase mb-1">
      Recursos Humanos
    </p>
    <h2 class="text-3xl font-headline font-black text-stone-900 tracking-tight">
      Cálculo de Nómina
    </h2>
    <p class="text-stone-500 text-sm mt-1">
      Procesamiento Industrial de Pagos • MAYOR DE REPUESTO LA CIMA, C.A.
    </p>
  </div>
  <div class="bg-white p-1 flex items-center rounded-lg border border-stone-200">
    <div class="px-4 py-2 flex flex-col border-r border-stone-100">
      <span class="text-[10px] text-stone-400 font-bold uppercase tracking-tighter">Inicio del Periodo</span>
      <input class="bg-transparent border-none text-stone-900 p-0 text-sm font-bold focus:ring-0" type="date" value="2023-11-01"/>
    </div>
    <div class="px-4 py-2 flex flex-col border-r border-stone-100">
      <span class="text-[10px] text-stone-400 font-bold uppercase tracking-tighter">Fin del Periodo</span>
      <input class="bg-transparent border-none text-stone-900 p-0 text-sm font-bold focus:ring-0" type="date" value="2023-11-15"/>
    </div>
    <button class="px-4 py-2 hover:bg-stone-50 transition-colors text-stone-500">
      <span class="material-symbols-outlined">refresh</span>
    </button>
  </div>
</div>

<!-- KPI Bento Grid -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-5 mb-8">
  <div class="bg-white p-6 rounded-xl border border-stone-200 shadow-sm border-l-4 border-stone-900">
    <p class="text-[10px] text-stone-400 font-bold uppercase tracking-widest">Total Bruto</p>
    <h3 class="text-2xl font-headline font-bold text-stone-900 mt-1">245.890,00 <span class="text-xs text-stone-400 uppercase">VED</span></h3>
  </div>
  <div class="bg-white p-6 rounded-xl border border-stone-200 shadow-sm border-l-4 border-stone-400">
    <p class="text-[10px] text-stone-400 font-bold uppercase tracking-widest">Suma Deducciones</p>
    <h3 class="text-2xl font-headline font-bold text-stone-900 mt-1">12.340,50 <span class="text-xs text-stone-400 uppercase">VED</span></h3>
  </div>
  <div class="bg-white p-6 rounded-xl border border-stone-200 shadow-sm border-l-4 border-primary">
    <p class="text-[10px] text-stone-400 font-bold uppercase tracking-widest">Neto a Pagar</p>
    <h3 class="text-2xl font-headline font-bold text-stone-900 mt-1">233.549,50 <span class="text-xs text-stone-400 uppercase">VED</span></h3>
  </div>
  <div class="bg-white p-6 rounded-xl border border-stone-200 shadow-sm border-l-4 border-stone-400">
    <p class="text-[10px] text-stone-400 font-bold uppercase tracking-widest">Costos Patronales</p>
    <h3 class="text-2xl font-headline font-bold text-stone-900 mt-1">34.120,00 <span class="text-xs text-stone-400 uppercase">VED</span></h3>
  </div>
</div>

<!-- Employee Payroll Table -->
<div class="bg-white rounded-xl border border-stone-200 shadow-sm overflow-hidden mb-8">
  <div class="px-6 py-4 border-b border-stone-100 flex justify-between items-center bg-stone-50">
    <h2 class="font-bold uppercase text-[10px] tracking-widest text-stone-500">Planilla Detallada de Nómina</h2>
    <div class="flex gap-4">
      <button class="flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-primary hover:brightness-75 transition-colors">
        <span class="material-symbols-outlined text-sm">filter_alt</span> Filtrar Empleados
      </button>
      <button class="flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-stone-400 hover:text-stone-900 transition-colors">
        <span class="material-symbols-outlined text-sm">download</span> Exportar CSV
      </button>
    </div>
  </div>
  <div class="overflow-x-auto">
    <table class="w-full text-left border-collapse">
      <thead>
        <tr class="bg-stone-50 text-stone-500 font-bold uppercase text-[10px] tracking-widest border-b border-stone-100">
          <th class="px-6 py-4">Detalles del Empleado</th>
          <th class="px-6 py-4">Salario Base</th>
          <th class="px-6 py-4">Recargos LOTTT</th>
          <th class="px-6 py-4">Deducciones (IVSS/FAOV)</th>
          <th class="px-6 py-4">Cesta Ticket</th>
          <th class="px-6 py-4">Total Neto</th>
          <th class="px-6 py-4 text-right">Acciones</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-stone-100 text-sm">
        <tr class="hover:bg-stone-50/80 transition-colors">
          <td class="px-6 py-4">
            <div class="flex items-center gap-3">
              <div class="w-8 h-8 rounded bg-stone-900 flex items-center justify-center font-bold text-primary text-xs">RM</div>
              <div>
                <p class="text-sm font-bold text-stone-900">RICARDO MENDOZA</p>
                <p class="text-[10px] text-stone-500 uppercase font-medium">Líder Ops • ID: 402231</p>
              </div>
            </div>
          </td>
          <td class="px-6 py-4 font-medium text-stone-600">45.000,00</td>
          <td class="px-6 py-4">
            <div class="flex flex-col gap-1">
              <span class="text-[9px] px-2 py-0.5 bg-stone-100 text-stone-500 rounded w-fit">HE 50%: 12.5h</span>
              <span class="text-[9px] px-2 py-0.5 bg-primary/10 text-stone-900 rounded w-fit uppercase font-bold">Bono: 5.000,00</span>
            </div>
          </td>
          <td class="px-6 py-4 text-sm font-medium text-red-600">
            <p>-1.250,40 <span class="text-[9px] text-stone-400 block uppercase">IVSS (0.5%) + FAOV (0.25%)</span></p>
          </td>
          <td class="px-6 py-4">
            <p class="text-sm font-medium text-stone-600">1.000,00</p>
            <p class="text-[9px] text-stone-400 uppercase">22 Días Activos</p>
          </td>
          <td class="px-6 py-4 font-headline font-bold text-stone-900">49.749,60</td>
          <td class="px-6 py-4 text-right">
            <button class="p-2 hover:bg-stone-100 rounded-lg transition-all text-stone-400">
              <span class="material-symbols-outlined text-sm">visibility</span>
            </button>
            <button class="p-2 hover:bg-stone-100 rounded-lg transition-all text-stone-400">
              <span class="material-symbols-outlined text-sm">file_download</span>
            </button>
          </td>
        </tr>
        <tr class="hover:bg-stone-50/80 transition-colors">
          <td class="px-6 py-4">
            <div class="flex items-center gap-3">
              <div class="w-8 h-8 rounded bg-stone-900 flex items-center justify-center font-bold text-primary text-xs">AS</div>
              <div>
                <p class="text-sm font-bold text-stone-900">ANA SÁNCHEZ</p>
                <p class="text-[10px] text-stone-500 uppercase font-medium">Ing. Mecánica • ID: 402245</p>
              </div>
            </div>
          </td>
          <td class="px-6 py-4 font-medium text-stone-600">62.000,00</td>
          <td class="px-6 py-4">
            <div class="flex flex-col gap-1">
              <span class="text-[9px] px-2 py-0.5 bg-stone-100 text-stone-500 rounded w-fit">HE 75%: 4.0h</span>
              <span class="text-[9px] px-2 py-0.5 bg-stone-100 text-stone-500 rounded w-fit font-bold">Com: 8.500,00</span>
            </div>
          </td>
          <td class="px-6 py-4 text-sm font-medium text-red-600">
            <p>-1.860,00 <span class="text-[9px] text-stone-400 block uppercase">PF (1%) + IVSS/FAOV</span></p>
          </td>
          <td class="px-6 py-4">
            <p class="text-sm font-medium text-stone-600">1.000,00</p>
            <p class="text-[9px] text-stone-400 uppercase">22 Días Activos</p>
          </td>
          <td class="px-6 py-4 font-headline font-bold text-stone-900">69.640,00</td>
          <td class="px-6 py-4 text-right">
            <button class="p-2 hover:bg-stone-100 rounded-lg transition-all text-stone-400">
              <span class="material-symbols-outlined text-sm">visibility</span>
            </button>
            <button class="p-2 hover:bg-stone-100 rounded-lg transition-all text-stone-400">
              <span class="material-symbols-outlined text-sm">file_download</span>
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<!-- Action Panel -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
  <!-- Summary Card -->
  <div class="bg-white p-8 rounded-xl border border-stone-200 shadow-sm flex flex-col justify-between">
    <div>
      <h3 class="font-headline font-black text-2xl uppercase tracking-tighter text-stone-900 mb-6 border-b border-stone-100 pb-4">Resumen Contable</h3>
      <div class="space-y-4">
        <div class="flex justify-between items-center text-sm font-bold">
          <span class="text-stone-400 uppercase tracking-widest text-[10px]">Sueldo Básico Total</span>
          <span class="text-stone-900 font-mono">145.500,00</span>
        </div>
        <div class="flex justify-between items-center text-sm font-bold">
          <span class="text-stone-400 uppercase tracking-widest text-[10px]">Horas Extra y Recargos</span>
          <span class="text-stone-900 font-mono">28.400,00</span>
        </div>
        <div class="flex justify-between items-center text-sm font-bold">
          <span class="text-stone-400 uppercase tracking-widest text-[10px]">Deducciones Legales</span>
          <span class="text-red-600 font-mono">-12.340,50</span>
        </div>
        <div class="pt-4 border-t border-stone-100 flex justify-between items-center">
          <span class="font-headline font-black text-stone-900 uppercase tracking-widest text-sm">Pasivo Neto</span>
          <span class="font-headline font-black text-2xl text-primary drop-shadow-[0_2px_4px_rgba(0,0,0,0.1)]">233.549,50</span>
        </div>
      </div>
    </div>
  </div>

  <!-- Global Actions -->
  <div class="flex flex-col gap-4">
    <button class="flex-1 bg-stone-900 text-primary p-6 rounded-xl flex flex-col items-center justify-center gap-2 group hover:brightness-110 active:scale-95 transition-all shadow-xl shadow-stone-900/10">
      <span class="material-symbols-outlined text-3xl">account_balance_wallet</span>
      <span class="font-headline font-bold text-xl uppercase tracking-tight">Procesar y Generar Asiento Contable</span>
      <p class="text-[10px] font-medium uppercase tracking-widest text-stone-400 group-hover:text-primary transition-colors">Contabilización Automática en Libro Diario</p>
    </button>
    <div class="grid grid-cols-2 gap-4">
      <button class="bg-white border border-stone-200 p-4 rounded-xl flex flex-col items-center gap-2 hover:bg-stone-50 transition-all uppercase font-bold text-[10px] tracking-widest text-stone-700">
        <span class="material-symbols-outlined">description</span>
        Descargar Recibos
      </button>
      <button class="bg-white border border-stone-200 p-4 rounded-xl flex flex-col items-center gap-2 hover:bg-stone-50 transition-all uppercase font-bold text-[10px] tracking-widest text-stone-700">
        <span class="material-symbols-outlined">print</span>
        Imprimir Resumen
      </button>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/nomina.js') }}"></script>
@endpush
