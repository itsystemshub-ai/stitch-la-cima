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
  <form action="{{ route('erp.rrhh.nomina.generate') }}" method="POST" class="bg-white p-1 flex items-center rounded-lg border border-stone-200">
    @csrf
    <div class="px-4 py-2 flex flex-col border-r border-stone-100">
      <span class="text-[10px] text-stone-400 font-bold uppercase tracking-tighter">Periodo de Nómina</span>
      <input name="periodo" class="bg-transparent border-none text-stone-900 p-0 text-sm font-bold focus:ring-0" type="text" value="{{ now()->format('F-Y') }}"/>
    </div>
    <button type="submit" class="px-6 py-2 bg-primary text-stone-900 rounded-lg text-xs font-bold uppercase tracking-wider hover:brightness-110 transition-all flex items-center gap-2">
      <span class="material-symbols-outlined text-sm">payments</span>
      Generar
    </button>
  </form>
</div>

<!-- KPI Bento Grid -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-5 mb-8">
  <div class="bg-white p-6 rounded-xl border border-stone-200 shadow-sm border-l-4 border-stone-900">
    <p class="text-[10px] text-stone-400 font-bold uppercase tracking-widest">Total Bruto</p>
    <h3 class="text-2xl font-headline font-bold text-stone-900 mt-1">${{ number_format($payrolls->sum('salario_base'), 2) }}</h3>
  </div>
  <div class="bg-white p-6 rounded-xl border border-stone-200 shadow-sm border-l-4 border-stone-400">
    <p class="text-[10px] text-stone-400 font-bold uppercase tracking-widest">Suma Deducciones</p>
    <h3 class="text-2xl font-headline font-bold text-stone-900 mt-1">${{ number_format($payrolls->sum('deducciones'), 2) }}</h3>
  </div>
  <div class="bg-white p-6 rounded-xl border border-stone-200 shadow-sm border-l-4 border-primary">
    <p class="text-[10px] text-stone-400 font-bold uppercase tracking-widest">Neto a Pagar</p>
    <h3 class="text-2xl font-headline font-bold text-stone-900 mt-1">${{ number_format($payrolls->sum('total_pagar'), 2) }}</h3>
  </div>
</div>

<!-- Employee Payroll Table -->
<div class="bg-white rounded-xl border border-stone-200 shadow-sm overflow-hidden mb-8">
  <div class="px-6 py-4 border-b border-stone-100 flex justify-between items-center bg-stone-50">
    <h2 class="font-bold uppercase text-[10px] tracking-widest text-stone-500">Planilla Detallada de Nómina</h2>
    <div class="flex gap-4">
      <button class="flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-stone-400 hover:text-stone-900 transition-colors">
        <span class="material-symbols-outlined text-sm">download</span> Exportar CSV
      </button>
    </div>
  </div>
  <div class="overflow-x-auto">
    <table class="w-full text-left border-collapse">
      <thead>
        <tr class="zenith-table-header">
          <th class="px-6 py-4">Beneficiario / Cargo</th>
          <th class="px-6 py-4 text-right">Devengado Bruto</th>
          <th class="px-6 py-4 text-right">Deducciones Ley</th>
          <th class="px-6 py-4 text-center">Periodo Fiscal</th>
          <th class="px-6 py-4 text-right">Total Neto</th>
          <th class="px-6 py-4 text-right">Estado Pago</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-stone-50">
        @forelse($payrolls as $payroll)
        <tr class="zenith-table-row group">
          <td class="px-6 py-5">
            <div class="flex items-center gap-3">
              <div class="w-8 h-8 rounded-lg bg-stone-900 flex items-center justify-center font-black text-primary text-[10px] shadow-lg">
                {{ substr($payroll->employee->nombre, 0, 1) }}{{ substr($payroll->employee->apellido, 0, 1) }}
              </div>
              <div>
                <p class="zenith-table-main">{{ $payroll->employee->nombre_completo }}</p>
                <p class="zenith-table-secondary mt-1">{{ $payroll->employee->cargo }}</p>
              </div>
            </div>
          </td>
          <td class="px-6 py-5 text-right">
            <span class="zenith-table-secondary font-bold text-stone-600">${{ number_format($payroll->salario_base, 2) }}</span>
          </td>
          <td class="px-6 py-5 text-right">
            <span class="zenith-table-secondary font-bold text-red-600">-${{ number_format($payroll->deducciones, 2) }}</span>
          </td>
          <td class="px-6 py-5 text-center">
            <span class="zenith-table-secondary font-mono">{{ $payroll->periodo }}</span>
          </td>
          <td class="px-6 py-5 text-right">
            <span class="zenith-table-price">${{ number_format($payroll->total_pagar, 2) }}</span>
          </td>
          <td class="px-6 py-5 text-right">
            <span class="px-3 py-1 rounded-lg text-[9px] font-black uppercase tracking-widest {{ $payroll->estatus === 'PAGADO' ? 'bg-green-50 text-green-600 border border-green-100' : 'bg-amber-50 text-amber-600 border border-amber-100' }}">
                {{ $payroll->estatus }}
            </span>
          </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="px-6 py-12 text-center zenith-table-main text-stone-400">No hay registros de nómina procesados.</td>
        </tr>
        @endforelse
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
