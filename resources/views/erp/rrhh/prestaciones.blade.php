@extends('erp.layouts.app')

@section('title', 'Prestaciones Sociales | ERP Zenith')

@section('content')
<!-- Header -->
<div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4 mb-8">
  <div>
    <p class="text-xs font-bold text-stone-400 tracking-[0.2em] uppercase mb-1">
      Recursos Humanos
    </p>
    <h2 class="text-3xl font-headline font-black text-stone-900 tracking-tight">
      Control de Prestaciones Sociales
    </h2>
    <p class="text-stone-500 text-sm mt-1">
      Gestión de Fondos y Garantía LOTTT • MAYOR DE REPUESTO LA CIMA, C.A.
    </p>
  </div>
</div>

<!-- Summary Stats Grid -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-5 mb-8">
  <div class="bg-white p-6 rounded-xl border border-stone-200 shadow-sm border-l-4 border-stone-900">
    <p class="text-[10px] text-stone-400 font-bold uppercase tracking-widest">Acumulado Total (Garantía)</p>
    <h3 class="text-2xl font-headline font-bold text-stone-900 mt-1">$ 428,590.00</h3>
  </div>
  <div class="bg-white p-6 rounded-xl border border-stone-200 shadow-sm border-l-4 border-stone-400">
    <p class="text-[10px] text-stone-400 font-bold uppercase tracking-widest">Provisión de Intereses</p>
    <h3 class="text-2xl font-headline font-bold text-stone-900 mt-1">$ 12,402.15</h3>
  </div>
  <div class="bg-white p-6 rounded-xl border border-stone-200 shadow-sm border-l-4 border-primary">
    <p class="text-[10px] text-stone-400 font-bold uppercase tracking-widest">Simulaciones Activas</p>
    <h3 class="text-2xl font-headline font-bold text-stone-900 mt-1">03</h3>
  </div>
  <div class="bg-white p-6 rounded-xl border border-stone-200 shadow-sm border-l-4 border-stone-400">
    <p class="text-[10px] text-stone-400 font-bold uppercase tracking-widest">Tasa BCV (TAM)</p>
    <h3 class="text-2xl font-headline font-bold text-stone-900 mt-1">54.2%</h3>
  </div>
</div>

<!-- Main Area -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 mb-8">
  <!-- Accrued Benefits Table -->
  <div class="lg:col-span-8 bg-white rounded-xl border border-stone-200 shadow-sm overflow-hidden flex flex-col">
    <div class="px-6 py-4 border-b border-stone-100 flex justify-between items-center bg-stone-50">
      <h2 class="font-bold uppercase text-[10px] tracking-widest text-stone-500">Libro de Prestaciones Acumuladas (Art. 142)</h2>
      <button class="bg-white border border-stone-200 text-stone-700 text-[9px] font-bold uppercase py-1.5 px-3 rounded-lg flex items-center gap-2 hover:bg-stone-50 transition-all">
        <span class="material-symbols-outlined text-sm">filter_list</span> Filtrar Datos
      </button>
    </div>
    <div class="overflow-x-auto">
      <table class="w-full text-left border-collapse">
        <thead>
          <tr class="bg-stone-50 text-stone-500 font-bold uppercase text-[10px] tracking-widest border-b border-stone-100">
            <th class="p-4">Empleado</th>
            <th class="p-4 text-right">Salario Integral</th>
            <th class="p-4 text-right">Días Garantía</th>
            <th class="p-4 text-right">Total Acumulado</th>
            <th class="p-4 text-center">Calcular</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-stone-100 text-sm">
          <tr class="hover:bg-stone-50/80 transition-colors">
            <td class="p-4">
              <div class="font-bold text-stone-900">CARLOS MARTINEZ</div>
              <div class="text-[10px] text-stone-500">C.I: V-18.293.XXX</div>
            </td>
            <td class="p-4 text-right font-mono text-stone-600">$ 2,450.00</td>
            <td class="p-4 text-right font-mono text-stone-600">180 + 12</td>
            <td class="p-4 text-right font-mono font-bold text-stone-900">$ 16,340.50</td>
            <td class="p-4 text-center">
              <button class="material-symbols-outlined text-stone-400 hover:text-primary transition-colors">calculate</button>
            </td>
          </tr>
          <tr class="hover:bg-stone-50/80 transition-colors">
            <td class="p-4">
              <div class="font-bold text-stone-900">ANA RODRIGUEZ</div>
              <div class="text-[10px] text-stone-500">C.I: V-20.104.XXX</div>
            </td>
            <td class="p-4 text-right font-mono text-stone-600">$ 1,890.00</td>
            <td class="p-4 text-right font-mono text-stone-600">60 + 2</td>
            <td class="p-4 text-right font-mono font-bold text-stone-900">$ 4,120.25</td>
            <td class="p-4 text-center">
              <button class="material-symbols-outlined text-stone-400 hover:text-primary transition-colors">calculate</button>
            </td>
          </tr>
          <tr class="hover:bg-stone-50/80 transition-colors">
            <td class="p-4">
              <div class="font-bold text-stone-900">MARCOS PERNIA</div>
              <div class="text-[10px] text-stone-500">C.I: V-15.882.XXX</div>
            </td>
            <td class="p-4 text-right font-mono text-stone-600">$ 3,100.00</td>
            <td class="p-4 text-right font-mono text-stone-600">320 + 24</td>
            <td class="p-4 text-right font-mono font-bold text-stone-900">$ 38,400.00</td>
            <td class="p-4 text-center">
              <button class="material-symbols-outlined text-stone-400 hover:text-primary transition-colors">calculate</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Simulation Form -->
  <div class="lg:col-span-4 space-y-6">
    <div class="bg-stone-900 p-6 rounded-xl shadow-xl relative overflow-hidden border border-stone-800">
      <div class="relative z-10 flex flex-col gap-4">
        <div>
          <h3 class="text-xl font-headline font-black uppercase text-primary leading-tight">Motor de Simulación</h3>
          <p class="text-stone-400 text-[10px] font-bold uppercase tracking-wider">Liquidaciones y Finiquitos</p>
        </div>
        
        <div class="space-y-4">
          <div class="space-y-1">
            <label class="text-[9px] font-bold uppercase text-stone-500 tracking-widest">Seleccionar Empleado</label>
            <select class="w-full bg-stone-800 border-none rounded-lg text-primary text-xs font-bold py-2.5 focus:ring-2 focus:ring-primary/50 transition-all">
              <option>MARCOS PERNIA</option>
              <option>CARLOS MARTINEZ</option>
              <option>ANA RODRIGUEZ</option>
            </select>
          </div>
          <div class="grid grid-cols-2 gap-3">
            <div class="space-y-1">
              <label class="text-[9px] font-bold uppercase text-stone-500 tracking-widest">Fecha Egreso</label>
              <input class="w-full bg-stone-800 border-none rounded-lg text-stone-200 text-xs py-2 focus:ring-2 focus:ring-primary/50 transition-all" type="date"/>
            </div>
            <div class="space-y-1">
              <label class="text-[9px] font-bold uppercase text-stone-500 tracking-widest">Causa de Egreso</label>
              <select class="w-full bg-stone-800 border-none rounded-lg text-stone-200 text-xs py-2 focus:ring-2 focus:ring-primary/50 transition-all">
                <option>Renuncia Voluntaria</option>
                <option>Despido Justificado</option>
                <option>Despido Injustificado</option>
              </select>
            </div>
          </div>
          
          <div class="p-4 bg-stone-950 border border-stone-800 rounded-lg space-y-2">
            <div class="flex justify-between text-[11px]">
              <span class="text-stone-500 font-bold uppercase">Antigüedad (Art. 142)</span>
              <span class="text-stone-200 font-mono">$ 38,400.00</span>
            </div>
            <div class="flex justify-between text-[11px]">
              <span class="text-stone-500 font-bold uppercase">Intereses Acum.</span>
              <span class="text-stone-200 font-mono">$ 2,120.10</span>
            </div>
            <div class="flex justify-between text-[11px]">
              <span class="text-stone-500 font-bold uppercase">Indemnización (Art. 92)</span>
              <span class="text-stone-200 font-mono">$ 0.00</span>
            </div>
            <div class="flex justify-between text-xs border-t border-stone-800 pt-3 mt-2">
              <span class="text-primary font-black uppercase tracking-widest">Total a Pagar</span>
              <span class="text-primary font-mono font-black text-lg">$ 40,520.10</span>
            </div>
          </div>
          
          <div class="pt-2 space-y-2">
            <button class="w-full bg-primary text-stone-900 font-black uppercase text-xs py-3 rounded-lg tracking-tighter flex items-center justify-center gap-2 hover:brightness-110 active:scale-95 transition-all">
              <span class="material-symbols-outlined text-sm font-black">picture_as_pdf</span>
              Generar Finiquito PDF
            </button>
            <button class="w-full bg-stone-800 text-stone-300 font-bold uppercase text-[9px] py-2.5 rounded-lg tracking-widest hover:bg-stone-700 transition-all">
              Guardar Borrador
            </button>
          </div>
        </div>
      </div>
      <span class="material-symbols-outlined absolute -right-6 -bottom-6 text-9xl opacity-10 text-primary font-black rotate-12">precision_manufacturing</span>
    </div>
  </div>
</div>

<!-- Context Info -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-8">
  <div class="bg-stone-50 p-6 rounded-xl border border-stone-200">
    <h4 class="text-sm font-black uppercase tracking-tight flex items-center gap-2 text-stone-900 mb-3">
      <span class="material-symbols-outlined text-primary text-lg">info</span>
      Cumplimiento Art. 142 LOTTT
    </h4>
    <p class="text-xs text-stone-500 leading-relaxed">
      La garantía de prestaciones sociales consiste en 15 días de salario integral por trimestre, totalizando 60 días anuales. Adicionalmente, tras el primer año se acumulan 2 días adicionales por año (hasta 30 días). El sistema compara automáticamente la cuenta acumulada vs el cálculo por tiempo al finalizar la relación, pagando lo que sea más favorable al trabajador.
    </p>
  </div>
  <div class="bg-stone-50 p-6 rounded-xl border border-stone-200">
    <h4 class="text-sm font-black uppercase tracking-tight text-stone-900 mb-4">Estructura de Salario Integral</h4>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
      <div class="flex items-center gap-3">
        <div class="w-10 h-10 bg-white border border-stone-200 text-stone-400 flex items-center justify-center rounded-lg">
          <span class="material-symbols-outlined text-sm text-primary">payments</span>
        </div>
        <div>
          <div class="font-bold text-[10px] uppercase text-stone-700">Sueldo Base</div>
          <div class="text-[9px] text-stone-400 uppercase font-bold tracking-widest">Fijo Mensual</div>
        </div>
      </div>
      <div class="flex items-center gap-3">
        <div class="w-10 h-10 bg-white border border-stone-200 text-stone-400 flex items-center justify-center rounded-lg">
          <span class="material-symbols-outlined text-sm">beach_access</span>
        </div>
        <div>
          <div class="font-bold text-[10px] uppercase text-stone-700">Bono Vacacional</div>
          <div class="text-[9px] text-stone-400 uppercase font-bold tracking-widest">Alícuota Anual</div>
        </div>
      </div>
      <div class="flex items-center gap-3">
        <div class="w-10 h-10 bg-white border border-stone-200 text-stone-400 flex items-center justify-center rounded-lg">
          <span class="material-symbols-outlined text-sm">account_balance_wallet</span>
        </div>
        <div>
          <div class="font-bold text-[10px] uppercase text-stone-700">Utilidades</div>
          <div class="text-[9px] text-stone-400 uppercase font-bold tracking-widest">Alícuota Legal</div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/prestaciones.js') }}"></script>
@endpush
