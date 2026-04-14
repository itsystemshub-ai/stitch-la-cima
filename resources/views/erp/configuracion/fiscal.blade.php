@extends('erp.layouts.app')

@section('title', 'Configuración Fiscal | ERP Zenith')

@section('content')
<!-- Header -->
<div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4 mb-10">
  <div>
    <p class="text-xs font-bold text-stone-400 tracking-[0.2em] uppercase mb-1">Módulo Legal & Tributario</p>
    <h2 class="text-3xl font-headline font-black text-stone-900 tracking-tight">Configuración Fiscal</h2>
    <p class="text-stone-500 text-sm mt-1">Gestión de Tasas, Retenciones y Libros • MAYOR DE REPUESTO LA CIMA, C.A.</p>
  </div>
  <div class="flex gap-3">
    <button class="bg-stone-900 text-primary px-5 py-2.5 rounded-xl text-xs font-bold uppercase tracking-wider hover:brightness-110 transition-all active:scale-95 shadow-lg shadow-stone-900/10">
      Guardar Ajustes Fiscales
    </button>
  </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
  <!-- Left Column: Tax Parameters -->
  <div class="lg:col-span-8 space-y-8">
    <!-- Section: Impuestos (IVA) -->
    <div class="bg-white rounded-xl border border-stone-200 shadow-sm overflow-hidden">
      <div class="px-8 py-6 border-b border-stone-100 bg-stone-50/50 flex justify-between items-center">
        <h3 class="font-headline font-bold text-lg text-stone-900 uppercase">Impuestos al Valor Agregado (IVA)</h3>
        <span class="material-symbols-outlined text-primary">gavel</span>
      </div>
      <div class="p-8 space-y-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
          <div class="space-y-4 p-6 bg-stone-50 rounded-xl border border-stone-100">
            <label class="block text-[10px] font-black uppercase tracking-widest text-stone-400 mb-2">Alícuota General</label>
            <div class="flex items-end gap-3">
              <input type="number" value="16" class="w-24 bg-white border-stone-200 rounded-lg px-4 py-2 text-xl font-headline font-black text-stone-900 focus:ring-2 focus:ring-primary/50 transition-all"/>
              <span class="text-2xl font-headline font-black text-stone-300">%</span>
            </div>
            <p class="text-[10px] text-stone-400 font-bold uppercase mt-2">Aplicable a la mayoría de servicios y productos.</p>
          </div>
          <div class="space-y-4 p-6 bg-stone-50 rounded-xl border border-stone-100 opacity-60">
            <label class="block text-[10px] font-black uppercase tracking-widest text-stone-400 mb-2">Alícuota Reducida</label>
            <div class="flex items-end gap-3">
              <input type="number" value="8" class="w-24 bg-white border-stone-200 rounded-lg px-4 py-2 text-xl font-headline font-black text-stone-900 focus:ring-2 focus:ring-primary/50 transition-all"/>
              <span class="text-2xl font-headline font-black text-stone-300">%</span>
            </div>
            <p class="text-[10px] text-stone-400 font-bold uppercase mt-2">Productos de la cesta básica u otros decretados.</p>
          </div>
        </div>

        <div class="pt-4 space-y-4">
          <h4 class="text-[10px] font-black uppercase tracking-[0.2em] text-stone-500 mb-4">Parámetros de IGTF</h4>
          <div class="flex items-center justify-between p-4 border border-stone-100 rounded-xl">
            <div class="flex gap-4 items-center">
              <div class="w-10 h-10 bg-primary/10 rounded-lg flex items-center justify-center text-primary">
                <span class="material-symbols-outlined">payments</span>
              </div>
              <div>
                <p class="text-sm font-black text-stone-900 uppercase">Cobro de IGTF (3%)</p>
                <p class="text-[10px] text-stone-500 font-bold uppercase tracking-widest">Transacciones en divisas en efectivo</p>
              </div>
            </div>
            <div class="relative inline-block w-12 h-6 transition duration-200 ease-in-out bg-primary rounded-full cursor-pointer">
              <div class="absolute w-5 h-5 transition duration-200 ease-in-out transform bg-white rounded-full left-0.5 top-0.5 shadow-sm"></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Section: Retenciones ISLR -->
    <div class="bg-white rounded-xl border border-stone-200 shadow-sm overflow-hidden">
      <div class="px-8 py-6 border-b border-stone-100 bg-stone-50/50">
        <h3 class="font-headline font-bold text-lg text-stone-900 uppercase">Tabla de Retenciones ISLR</h3>
      </div>
      <div class="p-0">
        <table class="w-full text-left">
          <thead>
            <tr class="bg-stone-50 text-[10px] font-black text-stone-400 uppercase tracking-widest border-b border-stone-100">
              <th class="p-6">Concepto de Pago</th>
              <th class="p-6 text-center">Persona Nat.</th>
              <th class="p-6 text-center">Persona Jur.</th>
              <th class="p-6 text-right">Base Imp.</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-stone-100 text-sm">
            <tr class="hover:bg-primary/5 transition-colors">
              <td class="p-6 font-bold text-stone-700">Honorarios Profesionales</td>
              <td class="p-6 text-center font-mono font-bold text-stone-900">3%</td>
              <td class="p-6 text-center font-mono font-bold text-stone-900">5%</td>
              <td class="p-6 text-right text-stone-500 font-mono">100%</td>
            </tr>
            <tr class="hover:bg-primary/5 transition-colors">
              <td class="p-6 font-bold text-stone-700">Arrendamiento Inmuebles</td>
              <td class="p-6 text-center font-mono font-bold text-stone-900">3%</td>
              <td class="p-6 text-center font-mono font-bold text-stone-900">5%</td>
              <td class="p-6 text-right text-stone-500 font-mono">100%</td>
            </tr>
            <tr class="hover:bg-primary/5 transition-colors">
              <td class="p-6 font-bold text-stone-700">Fletes y Transporte</td>
              <td class="p-6 text-center font-mono font-bold text-stone-900">1%</td>
              <td class="p-6 text-center font-mono font-bold text-stone-900">3%</td>
              <td class="p-6 text-right text-stone-500 font-mono">100%</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Right Column: Calendarios & Info -->
  <div class="lg:col-span-4 space-y-8">
    <!-- Special Status Card -->
    <div class="bg-stone-900 p-8 rounded-xl shadow-2xl relative overflow-hidden border border-stone-800">
      <div class="relative z-10 space-y-6">
        <div>
          <h3 class="text-xl font-headline font-black text-primary uppercase leading-tight">Sujeto Pasivo Especial</h3>
          <p class="text-stone-500 text-[10px] font-black uppercase tracking-widest">Estatus SENIAT: Verificado</p>
        </div>
        
        <div class="p-5 bg-stone-800 border border-stone-700 rounded-xl space-y-4">
          <div class="flex justify-between items-center text-[10px] font-bold text-stone-400 uppercase tracking-widest">
            <span>Retención IVA</span>
            <span class="text-primary font-black">75%</span>
          </div>
          <div class="w-full h-1.5 bg-stone-900 rounded-full overflow-hidden">
            <div class="h-full bg-primary" style="width: 75%"></div>
          </div>
          <p class="text-[10px] text-stone-500 leading-relaxed italic">Según providencia administrativa vigente 0049.</p>
        </div>
        
        <button class="w-full bg-stone-800 text-stone-300 font-black uppercase text-[10px] py-3 rounded-xl border border-stone-700 hover:bg-stone-700 transition-all flex items-center justify-center gap-2">
          <span class="material-symbols-outlined text-sm">schedule</span>
          Calendario Especiales 2026
        </button>
      </div>
      <span class="material-symbols-outlined absolute -right-10 -bottom-10 text-[200px] opacity-10 text-primary pointer-events-none rotate-12">account_balance</span>
    </div>

    <!-- Fiscal Books Summary -->
    <div class="bg-white rounded-xl border border-stone-200 p-8 shadow-sm">
      <h4 class="text-[10px] font-black text-stone-400 uppercase tracking-[0.2em] mb-6">Generación de Libros</h4>
      <div class="space-y-4">
        <div class="flex items-center justify-between p-4 bg-stone-50 rounded-xl">
          <div class="flex items-center gap-3">
            <span class="material-symbols-outlined text-stone-400">book</span>
            <span class="text-xs font-bold text-stone-700 uppercase">Libro de Ventas</span>
          </div>
          <span class="px-2 py-0.5 bg-stone-900 text-primary text-[8px] font-black rounded uppercase">AUTO</span>
        </div>
        <div class="flex items-center justify-between p-4 bg-stone-50 rounded-xl">
          <div class="flex items-center gap-3">
            <span class="material-symbols-outlined text-stone-400">menu_book</span>
            <span class="text-xs font-bold text-stone-700 uppercase">Libro de Compras</span>
          </div>
          <span class="px-2 py-0.5 bg-stone-900 text-primary text-[8px] font-black rounded uppercase">AUTO</span>
        </div>
        <div class="flex items-center justify-between p-4 bg-stone-50 rounded-xl">
          <div class="flex items-center gap-3">
            <span class="material-symbols-outlined text-stone-400">inventory_2</span>
            <span class="text-xs font-bold text-stone-700 uppercase">Ajustes Inventario</span>
          </div>
          <span class="px-2 py-0.5 bg-stone-100 text-stone-400 text-[8px] font-black rounded uppercase text-stone-500">MANUAL</span>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/config-fiscal.js') }}"></script>
@endpush
