@extends('erp.layouts.app')

@section('title', 'Reportería de RRHH | ERP Zenith')

@section('content')
<!-- Header Section -->
<div class="mb-12 border-l-8 border-primary pl-6">
  <p class="text-[10px] font-bold text-stone-400 tracking-[0.2em] uppercase mb-1">Centro de Inteligencia</p>
  <h1 class="text-5xl font-headline font-black uppercase tracking-tighter text-stone-900 mb-2">RRHH ANALYTICS</h1>
  <p class="text-stone-500 font-body uppercase text-[10px] tracking-[0.3em] font-semibold">Industrial Force HR Management / Suite v2.4 • MAYOR DE REPUESTO LA CIMA, C.A.</p>
</div>

<!-- Dashboard Bento Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
  <!-- Payroll Overview -->
  <div class="lg:col-span-2 bg-white p-8 rounded-xl border border-stone-200 shadow-sm relative overflow-hidden group">
    <div class="absolute top-0 right-0 w-32 h-32 bg-stone-50 -mr-16 -mt-16 rounded-full group-hover:scale-150 transition-transform duration-500"></div>
    <div class="flex justify-between items-start relative z-10 mb-8">
      <div>
        <span class="text-[10px] font-bold tracking-widest text-primary uppercase">Periodo Financiero: OCT 2026</span>
        <h3 class="text-2xl font-headline font-bold uppercase mt-1">Distribución de Nómina</h3>
      </div>
      <span class="material-symbols-outlined text-stone-400 text-4xl group-hover:text-primary transition-colors">payments</span>
    </div>
    <div class="flex items-end gap-4 mb-6">
      <span class="text-5xl font-headline font-black text-stone-900 tracking-tighter">VED 428.950</span>
      <span class="text-lime-600 font-bold mb-2 flex items-center text-sm"><span class="material-symbols-outlined text-sm">arrow_upward</span> 3.2%</span>
    </div>
    <div class="grid grid-cols-2 gap-4 border-t border-stone-100 pt-6">
      <div>
        <p class="text-[9px] text-stone-400 uppercase font-black tracking-widest">Mano de Obra Directa</p>
        <p class="font-headline font-bold text-lg text-stone-900">312.400,00</p>
      </div>
      <div>
        <p class="text-[9px] text-stone-400 uppercase font-black tracking-widest">Administrativo</p>
        <p class="font-headline font-bold text-lg text-stone-900">116.550,00</p>
      </div>
    </div>
  </div>

  <!-- Compliance Box -->
  <div class="bg-stone-900 p-8 rounded-xl shadow-lg border border-stone-800 flex flex-col justify-between">
    <div>
      <h3 class="text-lg font-headline font-bold uppercase mb-6 flex items-center gap-2 text-primary">
        <span class="material-symbols-outlined">verified_user</span> 
        Cumplimiento Legal
      </h3>
      <div class="space-y-4">
        <div class="flex justify-between items-center">
          <span class="text-[10px] font-black uppercase text-stone-400 tracking-widest">IVSS</span>
          <span class="px-2 py-0.5 bg-primary text-[10px] font-black text-stone-900 rounded">VALIDO</span>
        </div>
        <div class="flex justify-between items-center">
          <span class="text-[10px] font-black uppercase text-stone-400 tracking-widest">INCES</span>
          <span class="px-2 py-0.5 bg-primary text-[10px] font-black text-stone-900 rounded">VALIDO</span>
        </div>
        <div class="flex justify-between items-center">
          <span class="text-[10px] font-black uppercase text-stone-400 tracking-widest">FAOV</span>
          <span class="px-2 py-0.5 bg-amber-500 text-[10px] font-black text-white rounded">RENOVACIÓN</span>
        </div>
      </div>
    </div>
    <button class="text-[9px] font-black text-primary text-left uppercase tracking-widest mt-8 flex items-center gap-2 group">
      VER CERTIFICADOS <span class="material-symbols-outlined text-sm group-hover:translate-x-1 transition-transform">arrow_forward</span>
    </button>
  </div>

  <!-- Turnover Metric -->
  <div class="bg-white p-8 rounded-xl border border-stone-200 shadow-sm flex flex-col justify-center items-center text-center border-b-4 border-primary">
    <span class="text-[10px] font-black tracking-[0.2em] uppercase mb-2 text-stone-400">Rotación de Personal</span>
    <span class="text-7xl font-headline font-black text-stone-900 leading-none">4.2%</span>
    <span class="text-[9px] font-bold mt-2 text-stone-400 italic uppercase">Benchmark Industrial: 8.5%</span>
    <div class="w-full bg-stone-100 h-1 mt-6 rounded-full overflow-hidden">
      <div class="bg-stone-900 h-full w-[42%]"></div>
    </div>
  </div>
</div>

<!-- Secondary Layout: Performance & Accruals -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
  <!-- Performance Summaries -->
  <div class="lg:col-span-2 space-y-6">
    <div class="flex items-center gap-4 mb-4">
      <h2 class="text-2xl font-headline font-black uppercase tracking-tight text-stone-900">Evaluación de Desempeño</h2>
      <div class="h-0.5 flex-1 bg-stone-100"></div>
      <span class="text-[10px] font-black text-stone-400 uppercase tracking-widest">Q3 DIVISIÓN INGENIERÍA</span>
    </div>
    <div class="space-y-4">
      <!-- Employee Card 1 -->
      <div class="bg-white p-6 rounded-xl border border-stone-200 shadow-sm flex items-center gap-6 group hover:border-primary transition-all">
        <div class="w-16 h-16 bg-stone-900 rounded-xl flex items-center justify-center font-bold text-primary text-xl shadow-lg shadow-stone-900/10">ER</div>
        <div class="flex-1">
          <div class="flex justify-between items-start">
            <h4 class="font-headline font-black uppercase text-xl text-stone-900">Elena Rodríguez</h4>
            <span class="text-[9px] font-black bg-stone-100 text-stone-500 px-2 py-1 rounded">PROJECT LEAD</span>
          </div>
          <p class="text-xs text-stone-500 mt-1 max-w-md leading-relaxed">Superó los objetivos de producción del Q3 en un 15%. Liderazgo excepcional en el proyecto de integración Forge-X.</p>
        </div>
        <div class="text-right pl-6 border-l border-stone-100">
          <p class="text-[9px] text-stone-400 uppercase font-black tracking-widest">Calificación</p>
          <p class="text-3xl font-headline font-black text-primary drop-shadow-[0_2px_4px_rgba(0,0,0,0.1)]">4.9</p>
        </div>
      </div>
      <!-- Employee Card 2 -->
      <div class="bg-white p-6 rounded-xl border border-stone-200 shadow-sm flex items-center gap-6 group hover:border-primary transition-all">
        <div class="w-16 h-16 bg-stone-900 rounded-xl flex items-center justify-center font-bold text-primary text-xl">MT</div>
        <div class="flex-1">
          <div class="flex justify-between items-start">
            <h4 class="font-headline font-black uppercase text-xl text-stone-900">Marcus Thorne</h4>
            <span class="text-[9px] font-black bg-stone-100 text-stone-500 px-2 py-1 rounded">SENIOR TECH</span>
          </div>
          <p class="text-xs text-stone-500 mt-1 max-w-md leading-relaxed">Rendimiento constante en ciclos de mantenimiento. Clave en la reducción del tiempo de inactividad técnica en un 20%.</p>
        </div>
        <div class="text-right pl-6 border-l border-stone-100">
          <p class="text-[9px] text-stone-400 uppercase font-black tracking-widest">Calificación</p>
          <p class="text-3xl font-headline font-black text-primary">4.7</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Vacation Accrual Tracking -->
  <div class="bg-stone-900 p-8 rounded-xl shadow-2xl relative overflow-hidden border border-stone-800">
    <div class="relative z-10 flex flex-col h-full">
      <h2 class="text-2xl font-headline font-black uppercase text-primary mb-8 border-b border-stone-800 pb-4">Pasivos Vacacionales</h2>
      <div class="space-y-8 flex-1">
        <div>
          <div class="flex justify-between text-[9px] font-black uppercase tracking-widest mb-3 text-stone-500">
            <span>Pendiente por Aprobar</span>
            <span class="text-primary">142 DÍAS TOTAL</span>
          </div>
          <div class="h-2 bg-stone-800 rounded-full overflow-hidden border border-stone-700">
            <div class="h-full bg-primary shadow-[0_0_10px_rgba(206,255,94,0.3)]" style="width: 66%"></div>
          </div>
        </div>
        <div class="space-y-4 overflow-y-auto max-h-[350px] pr-2 no-scrollbar">
          <!-- Accrual Item -->
          <div class="flex justify-between items-center py-4 border-b border-stone-800 group hover:bg-stone-800/50 transition-colors px-2 rounded-lg">
            <div>
              <p class="font-headline font-bold text-sm text-stone-200 uppercase">Ops Industrial</p>
              <p class="text-[9px] text-stone-500 font-bold uppercase">Prom. 12.5 días/pp</p>
            </div>
            <span class="bg-stone-800 border border-stone-700 text-stone-400 px-3 py-1 text-[9px] font-black rounded uppercase">CARGA ALTA</span>
          </div>
          <div class="flex justify-between items-center py-4 border-b border-stone-800 group hover:bg-stone-800/50 transition-colors px-2 rounded-lg">
            <div>
              <p class="font-headline font-bold text-sm text-stone-200 uppercase">Admin & RRHH</p>
              <p class="text-[9px] text-stone-500 font-bold uppercase">Prom. 9.1 días/pp</p>
            </div>
            <span class="bg-primary/20 border border-primary/30 text-primary px-3 py-1 text-[9px] font-black rounded uppercase tracking-tighter">CRÍTICO</span>
          </div>
        </div>
      </div>
      <button class="w-full bg-primary text-stone-900 py-4 mt-8 rounded-xl font-black uppercase text-xs tracking-widest hover:brightness-110 active:scale-95 transition-all shadow-xl shadow-primary/10">
        GENERAR PRONÓSTICO DE PASIVOS
      </button>
    </div>
    <span class="material-symbols-outlined absolute -right-8 -bottom-8 text-[200px] opacity-5 text-primary pointer-events-none rotate-12">analytics</span>
  </div>
</div>

<!-- Ledger Table -->
<div class="mt-16 bg-white rounded-xl border border-stone-200 shadow-sm overflow-hidden">
  <div class="px-8 py-6 border-b border-stone-100 flex justify-between items-center bg-stone-50">
    <h3 class="text-xl font-headline font-black uppercase text-stone-900 flex items-center gap-3">
      <span class="w-3 h-3 bg-primary rounded-full"></span>
      Libro de Cumplimiento Porteo Social
    </h3>
    <div class="flex gap-3">
      <button class="text-xs font-bold uppercase tracking-widest text-stone-500 hover:text-stone-900 border border-stone-200 bg-white px-4 py-2 rounded-lg transition-all">PDF</button>
      <button class="text-xs font-bold uppercase tracking-widest text-stone-500 hover:text-stone-900 border border-stone-200 bg-white px-4 py-2 rounded-lg transition-all">CSV</button>
    </div>
  </div>
  <div class="w-full">
    <table class="w-full text-left">
      <thead>
        <tr class="bg-stone-50 text-stone-400 font-black uppercase text-[10px] tracking-widest border-b border-stone-100">
          <th class="p-6">Departamento</th>
          <th class="p-6">Nro Personal</th>
          <th class="p-6">Aporte IVSS</th>
          <th class="p-6">INCES (2%)</th>
          <th class="p-6">FAOV (1%)</th>
          <th class="p-6 text-right">Estatus</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-stone-100">
        <tr class="hover:bg-stone-50 transition-colors">
          <td class="p-6 font-bold text-stone-900 text-sm">Industrial - Heavy Duty</td>
          <td class="p-6 text-sm text-stone-600">124</td>
          <td class="p-6 text-sm font-mono text-stone-600">12.450,00</td>
          <td class="p-6 text-sm font-mono text-stone-600">2.490,00</td>
          <td class="p-6 text-sm font-mono text-stone-600">1.245,00</td>
          <td class="p-6 text-right">
            <span class="text-[10px] font-black text-lime-600 uppercase bg-lime-50 px-2 py-1 rounded">PAGADO</span>
          </td>
        </tr>
        <tr class="hover:bg-stone-50 transition-colors">
          <td class="p-6 font-bold text-stone-900 text-sm">Headquarters Admin</td>
          <td class="p-6 text-sm text-stone-600">42</td>
          <td class="p-6 text-sm font-mono text-stone-600">9.800,00</td>
          <td class="p-6 text-sm font-mono text-stone-600">1.960,00</td>
          <td class="p-6 text-sm font-mono text-stone-600">980,00</td>
          <td class="p-6 text-right">
            <span class="text-[10px] font-black text-amber-500 uppercase bg-amber-50 px-2 py-1 rounded">PENDIENTE</span>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/reportes-rrhh.js') }}"></script>
@endpush
