@extends('erp.layouts.app')

@section('title', 'Recursos Humanos | ERP Zenith')

@section('content')
<!-- Header -->
<div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6 mb-10">
  <div>
    <p class="text-[12px] font-black text-stone-400 tracking-[0.3em] uppercase mb-1 italic">Módulo de Capital Humano</p>
    <h2 class="text-4xl md:text-5xl font-headline font-black text-stone-950 tracking-tighter uppercase italic">Workforce <span class="text-stone-400">Control</span></h2>
    <p class="text-stone-500 text-[10px] font-black uppercase tracking-[0.2em] mt-3 italic">
      MAYOR DE REPUESTO LA CIMA, C.A. • ALPHA_HR_CORE_v2.0
    </p>
  </div>
  <div class="flex gap-4">
    <a href="{{ url('/erp/rrhh/empleados') }}" class="flex items-center gap-3 bg-stone-950 text-primary px-8 py-3 rounded-xl text-[10px] font-black uppercase tracking-[0.3em] hover:bg-primary hover:text-stone-950 transition-all shadow-xl shadow-stone-950/20 italic">
      <span class="material-symbols-outlined text-[18px]">person_add</span>
      ENROLL AGENT
    </a>
  </div>
</div>

<!-- KPI Cards -->
<div id="tour-hr-stats" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-10">
  <div class="bg-white border border-stone-100 p-8 rounded-[32px] shadow-sm relative overflow-hidden transition-all hover:border-primary group">
    <div class="flex items-center justify-between mb-4">
      <div class="w-12 h-12 bg-stone-950 rounded-2xl flex items-center justify-center text-primary shadow-2xl shadow-stone-950/20 group-hover:scale-110 transition-transform">
        <span class="material-symbols-outlined text-2xl">groups</span>
      </div>
      <span class="text-[9px] font-black text-green-500 uppercase tracking-widest italic">Stable</span>
    </div>
    <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em] mb-1 italic">Active Agents</p>
    <p class="text-3xl font-headline font-black text-stone-950 mt-1 italic leading-none">{{ $stats['empleados_activos'] }}</p>
    <div class="mt-4 h-[2px] bg-stone-50 rounded-full overflow-hidden p-[1px]">
        <div class="h-full bg-primary rounded-full transition-all duration-1000" style="width: 85%"></div>
    </div>
  </div>

  <div class="bg-white border border-stone-100 p-8 rounded-[32px] shadow-sm relative overflow-hidden transition-all hover:border-primary group">
    <div class="flex items-center justify-between mb-4">
      <div class="w-12 h-12 bg-stone-950 rounded-2xl flex items-center justify-center text-primary shadow-2xl shadow-stone-950/20 group-hover:scale-110 transition-transform">
        <span class="material-symbols-outlined text-2xl">payments</span>
      </div>
      <span class="text-[9px] font-black text-orange-500 uppercase tracking-widest italic">Pending</span>
    </div>
    <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em] mb-1 italic">Payroll Liabilities</p>
    <p class="text-3xl font-headline font-black text-stone-950 mt-1 italic leading-none">
      ${{ number_format($stats['nomina_por_pagar'], 2) }}
    </p>
    <p class="text-[9px] font-black text-stone-400 mt-4 uppercase tracking-widest italic italic">Pending Disbursement</p>
  </div>
</div>

<!-- Action Buttons -->
<div id="tour-hr-actions" class="grid grid-cols-2 md:grid-cols-4 gap-2 mb-12">
  <a href="{{ route('erp.rrhh.empleados') }}" class="flex flex-col items-center justify-center gap-4 p-10 bg-primary text-stone-950 rounded-[32px] transition-all hover:bg-stone-950 group hover:text-primary relative overflow-hidden active:scale-95 shadow-xl shadow-primary/20">
    <span class="material-symbols-outlined text-4xl group-hover:scale-110 transition-transform">person</span>
    <span class="text-[11px] font-black uppercase tracking-[0.3em] italic text-center leading-none">Registry</span>
  </a>
  <a href="{{ route('erp.rrhh.nomina') }}" class="flex flex-col items-center justify-center gap-4 p-10 bg-white border border-stone-100 text-stone-950 rounded-[32px] transition-all hover:border-primary group hover:bg-primary/5 active:scale-95 shadow-sm">
    <span class="material-symbols-outlined text-4xl group-hover:scale-110 transition-transform text-stone-300 group-hover:text-primary">payments</span>
    <span class="text-[11px] font-black uppercase tracking-[0.3em] italic text-center leading-none">Payroll</span>
  </a>
  <a href="{{ route('erp.rrhh.prestaciones') }}" class="flex flex-col items-center justify-center gap-4 p-10 bg-white border border-stone-100 text-stone-950 rounded-[32px] transition-all hover:border-primary group hover:bg-primary/5 active:scale-95 shadow-sm">
    <span class="material-symbols-outlined text-4xl group-hover:scale-110 transition-transform text-stone-300 group-hover:text-primary">savings</span>
    <span class="text-[11px] font-black uppercase tracking-[0.3em] italic text-center leading-none">Benefits</span>
  </a>
  <a href="{{ route('erp.rrhh.reportes') }}" class="flex flex-col items-center justify-center gap-4 p-10 bg-white border border-stone-100 text-stone-950 rounded-[32px] transition-all hover:border-primary group hover:bg-primary/5 active:scale-95 shadow-sm">
    <span class="material-symbols-outlined text-4xl group-hover:scale-110 transition-transform text-stone-300 group-hover:text-primary">bar_chart</span>
    <span class="text-[11px] font-black uppercase tracking-[0.3em] italic text-center leading-none">Intelligence</span>
  </a>
</div>

<!-- Employees Table -->
<div class="bg-white rounded-[40px] border border-stone-100 p-10 mb-10 shadow-sm relative overflow-hidden">
  <div class="flex flex-col md:flex-row justify-between items-center mb-10 border-b border-stone-50 pb-8 gap-6">
    <div class="flex items-center gap-6">
      <div class="w-12 h-12 bg-stone-950 rounded-2xl flex items-center justify-center text-primary shadow-2xl shadow-stone-950/20">
        <span class="material-symbols-outlined">badge</span>
      </div>
      <div>
        <h3 class="text-2xl font-headline font-black text-stone-950 uppercase tracking-tighter italic">Recent Enrolments</h3>
        <p class="text-[10px] text-stone-400 font-black uppercase tracking-[0.3em] mt-1 italic italic">Current Workforce Snapshot</p>
      </div>
    </div>
    <a href="{{ url('/erp/rrhh/empleados') }}" class="text-[10px] font-black text-primary uppercase tracking-[0.4em] flex items-center gap-3 group hover:text-stone-950 transition-all italic italic">
      AUDIT FULL DIRECTORY
      <span class="material-symbols-outlined text-[20px] group-hover:translate-x-2 transition-transform">arrow_forward</span>
    </a>
  </div>

  <div class="overflow-x-auto">
    <table class="w-full border-collapse">
      <thead>
        <tr class="zenith-table-header bg-stone-950">
          <th class="px-8 py-5 text-left">AGENT PROFILE</th>
          <th class="px-8 py-5 text-left">DEPARTMENT</th>
          <th class="px-8 py-5 text-left">ASSIGNED ROLE</th>
          <th class="px-8 py-5 text-right">COMPENSATION</th>
          <th class="px-8 py-5 text-center">STATUS CODE</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-stone-50">
        @forelse($recentEmployees as $empleado)
        <tr class="hover:bg-primary/5 transition-colors group">
          <td class="px-8 py-6">
            <div class="flex items-center gap-4">
              <div class="w-10 h-10 bg-stone-950 text-white rounded-xl flex items-center justify-center text-[11px] font-black font-headline italic border border-stone-800 shadow-lg group-hover:text-primary transition-colors">
                {{ strtoupper(substr($empleado->nombre, 0, 1) . substr($empleado->apellido, 0, 1)) }}
              </div>
              <div>
                <p class="text-[12px] font-black text-stone-950 uppercase tracking-tight italic">{{ $empleado->nombre }} {{ $empleado->apellido }}</p>
                <p class="text-[10.5px] font-mono font-black text-stone-400 italic tracking-tighter">{{ $empleado->cedula }}</p>
              </div>
            </div>
          </td>
          <td class="px-8 py-6 text-stone-400 text-[11px] font-black uppercase tracking-widest italic italic">{{ $empleado->departamento ?? 'General' }}</td>
          <td class="px-8 py-6 text-stone-600 text-[12px] font-black uppercase tracking-tight italic italic">{{ $empleado->cargo ?? 'Técnico' }}</td>
          <td class="px-8 py-6 text-right font-mono text-[14px] font-black text-stone-950 italic tracking-tighter leading-none">${{ number_format($empleado->salario, 2) }}</td>
          <td class="px-8 py-6 text-center italic italic">
            <span class="px-4 py-1 rounded-full text-[9px] font-black uppercase tracking-[0.2em] {{ $empleado->estatus == 'ACTIVO' ? 'bg-green-100 text-green-700 border border-green-200 shadow-[0_0_10px_rgba(34,197,94,0.1)]' : 'bg-red-100 text-red-700 border border-red-200' }} italic">
                {{ $empleado->estatus }}
            </span>
          </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="py-20 text-center text-stone-300 font-black uppercase tracking-[0.3em] text-[12px] italic">
                No active personnel records found in secondary nodes.
            </td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

<!-- Department Summary -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-10 mb-10">
  <!-- Employees by Department -->
  <div class="bg-white rounded-[40px] border border-stone-100 p-10 shadow-sm relative overflow-hidden">
    <div class="flex items-center gap-6 mb-10">
      <div class="w-12 h-12 bg-stone-950 rounded-2xl flex items-center justify-center text-primary shadow-2xl shadow-stone-950/20">
        <span class="material-symbols-outlined text-2xl">pie_chart</span>
      </div>
      <div>
        <h3 class="text-2xl font-headline font-black text-stone-950 uppercase tracking-tighter italic">Structural Mix</h3>
        <p class="text-[10px] text-stone-400 font-black uppercase tracking-[0.3em] mt-1 italic italic">Density by Organizational Unit</p>
      </div>
    </div>

    <div class="space-y-8">
      @php
          $colors = ['bg-blue-500', 'bg-green-500', 'bg-amber-500', 'bg-purple-500', 'bg-red-500', 'bg-teal-500'];
      @endphp
      @forelse($deptMix as $index => $dept)
      <div>
        <div class="flex justify-between items-center mb-3">
          <span class="text-[11px] font-black text-stone-600 uppercase tracking-widest italic italic">{{ $dept->departamento ?? 'General' }}</span>
          <span class="text-[12px] font-black text-stone-950 uppercase tracking-tight italic">{{ $dept->total }} Agents</span>
        </div>
        <div class="w-full bg-stone-50 rounded-full h-3 border border-stone-100 p-[1px]">
          <div class="{{ $colors[$index % count($colors)] }} h-full rounded-full transition-all duration-1000 shadow-[0_0_10px_rgba(0,0,0,0.05)]" style="width: {{ $stats['total_empleados'] > 0 ? ($dept->total / $stats['total_empleados']) * 100 : 0 }}%"></div>
        </div>
      </div>
      @empty
      <p class="text-[12px] text-stone-300 font-black uppercase tracking-[0.2em] italic">No structural data acquired.</p>
      @endforelse
    </div>
  </div>

  <!-- Payroll Summary -->
  <div class="bg-stone-950 rounded-[40px] p-10 shadow-2xl relative overflow-hidden border border-stone-800">
    <div class="flex items-center gap-6 mb-10">
      <div class="w-12 h-12 bg-stone-900 rounded-2xl flex items-center justify-center text-primary border border-stone-800 shadow-2xl">
        <span class="material-symbols-outlined text-2xl">account_balance_wallet</span>
      </div>
      <div>
        <h3 class="text-2xl font-headline font-black text-white uppercase tracking-tighter italic">Alpha Payroll Scan</h3>
        <p class="text-[10px] text-stone-500 font-black uppercase tracking-[0.3em] mt-1 italic italic">Active Month Compensation Logic</p>
      </div>
    </div>

    <div class="space-y-4">
      <div class="flex items-center justify-between p-4 bg-stone-900 rounded-2xl border border-stone-800">
        <span class="text-[12px] font-black text-stone-400 uppercase tracking-tight italic italic">Base Operations Cost</span>
        <span class="text-[14px] font-mono font-black text-white italic tracking-tighter leading-none">${{ number_format($payrollSummary['salarios_base'], 2) }}</span>
      </div>
      <div class="flex items-center justify-between p-4 bg-stone-900 rounded-2xl border border-stone-800">
        <span class="text-[12px] font-black text-stone-400 uppercase tracking-tight italic italic">Force Multiplier (Bonus)</span>
        <span class="text-[14px] font-mono font-black text-white italic tracking-tighter leading-none">${{ number_format($payrollSummary['bonos'], 2) }}</span>
      </div>
      <div class="flex items-center justify-between p-4 bg-stone-900/50 rounded-2xl border border-stone-800 border-dashed">
        <span class="text-[11px] font-black text-red-500 uppercase tracking-widest italic italic">Fiscal Retention (-)</span>
        <span class="text-[14px] font-mono font-black text-red-400 italic tracking-tighter leading-none">-${{ number_format($payrollSummary['deducciones'], 2) }}</span>
      </div>
      <div class="pt-6 mt-4 border-t border-stone-800 flex justify-between items-end">
        <span class="text-[10px] font-black text-stone-500 uppercase tracking-[0.4em] italic mb-1 italic">Net Disbursement Pulse</span>
        <span class="text-4xl font-headline font-black text-primary italic tracking-tighter underline decoration-stone-800 underline-offset-8 leading-none">${{ number_format($payrollSummary['total_neto'], 2) }}</span>
      </div>
    </div>
  </div>
</div>

<div class="pt-10 border-t border-stone-100 flex flex-col md:flex-row justify-between items-center gap-6 opacity-40 hover:opacity-100 transition-opacity">
  <span class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em] italic italic">ZENITH_ALPHA_HR • RIF: J-40308741-5 • PRODUCTION_ENVIRONMENT © 2026</span>
</div>

@endsection

@push('scripts')
<script src="{{ asset('js/rrhh.js') }}"></script>
@endpush
