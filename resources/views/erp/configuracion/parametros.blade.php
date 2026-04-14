@extends('erp.layouts.app')

@section('title', 'Parámetros del Sistema | ERP Zenith')

@section('content')
<!-- Header -->
<div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4 mb-10">
  <div>
    <p class="text-xs font-bold text-stone-400 tracking-[0.2em] uppercase mb-1">Configuración Avanzada</p>
    <h2 class="text-3xl font-headline font-black text-stone-900 tracking-tight">Parámetros Maetros</h2>
    <p class="text-stone-500 text-sm mt-1">Definición de Lógica de Negocio • MAYOR DE REPUESTO LA CIMA, C.A.</p>
  </div>
  <div class="flex gap-3">
    <button class="bg-white border border-stone-200 text-stone-700 px-5 py-2.5 rounded-xl text-xs font-bold uppercase tracking-wider hover:bg-stone-50 transition-all active:scale-95 shadow-sm">
      Restablecer Defaults
    </button>
    <button class="bg-stone-900 text-primary px-5 py-2.5 rounded-xl text-xs font-bold uppercase tracking-wider hover:brightness-110 transition-all active:scale-95 shadow-lg shadow-stone-900/10">
      Guardar Cambios
    </button>
  </div>
</div>

<!-- Tabs Hierarchy -->
<div class="flex flex-wrap gap-2 mb-8 border-b border-stone-100 pb-2">
  <button class="px-5 py-2 text-xs font-black uppercase tracking-widest border-b-2 border-primary text-stone-900 bg-primary/5 rounded-t-lg transition-all">Generales</button>
  <button class="px-5 py-2 text-xs font-black uppercase tracking-widest border-b-2 border-transparent text-stone-400 hover:text-stone-600 transition-all">Inventario</button>
  <button class="px-5 py-2 text-xs font-black uppercase tracking-widest border-b-2 border-transparent text-stone-400 hover:text-stone-600 transition-all">Ventas & POS</button>
  <button class="px-5 py-2 text-xs font-black uppercase tracking-widest border-b-2 border-transparent text-stone-400 hover:text-stone-600 transition-all">Financieros</button>
  <button class="px-5 py-2 text-xs font-black uppercase tracking-widest border-b-2 border-transparent text-stone-400 hover:text-stone-600 transition-all">Integraciones API</button>
</div>

<div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
  <!-- Left Column: Form Sections -->
  <div class="lg:col-span-8 space-y-8">
    <!-- Section: Identity -->
    <div class="bg-white rounded-xl border border-stone-200 shadow-sm overflow-hidden">
      <div class="px-8 py-6 border-b border-stone-100 bg-stone-50/50">
        <h3 class="font-headline font-bold text-lg text-stone-900 uppercase">Identidad Corporativa</h3>
      </div>
      <div class="p-8 grid grid-cols-1 md:grid-cols-2 gap-8">
        <div class="space-y-2">
          <label class="block text-[10px] font-black uppercase tracking-widest text-stone-400">Razón Social</label>
          <input type="text" value="MAYOR DE REPUESTO LA CIMA, C.A." class="w-full bg-stone-50 border-stone-200 rounded-xl px-4 py-3 text-sm font-bold text-stone-700 focus:ring-2 focus:ring-primary/50 transition-all"/>
        </div>
        <div class="space-y-2">
          <label class="block text-[10px] font-black uppercase tracking-widest text-stone-400">RIF Principal</label>
          <input type="text" value="J-40308741-5" class="w-full bg-stone-50 border-stone-200 rounded-xl px-4 py-3 text-sm font-bold text-stone-700 focus:ring-2 focus:ring-primary/50 transition-all"/>
        </div>
        <div class="md:col-span-2 space-y-2">
          <label class="block text-[10px] font-black uppercase tracking-widest text-stone-400">Dirección Fiscal Central</label>
          <textarea class="w-full bg-stone-50 border-stone-200 rounded-xl px-4 py-3 text-sm font-bold text-stone-700 focus:ring-2 focus:ring-primary/50 transition-all" rows="2">Calle Principal, Zona Industrial Los Jarales, San Diego, Carabobo.</textarea>
        </div>
      </div>
    </div>

    <!-- Section: System Preferences -->
    <div class="bg-white rounded-xl border border-stone-200 shadow-sm overflow-hidden">
      <div class="px-8 py-6 border-b border-stone-100 bg-stone-50/50 flex justify-between items-center">
        <h3 class="font-headline font-bold text-lg text-stone-900 uppercase">Preferencias de Operación</h3>
        <span class="material-symbols-outlined text-stone-400">settings_applications</span>
      </div>
      <div class="p-8 space-y-6">
        <div class="flex items-center justify-between p-4 bg-stone-50 rounded-xl group hover:bg-stone-100 transition-all">
          <div class="flex gap-4 items-center">
            <div class="w-10 h-10 bg-white border border-stone-200 rounded-lg flex items-center justify-center text-stone-400 group-hover:text-primary transition-colors">
              <span class="material-symbols-outlined">monetization_on</span>
            </div>
            <div>
              <p class="text-sm font-black text-stone-900 uppercase">Multimoneda Activa</p>
              <p class="text-[10px] text-stone-500 font-bold uppercase tracking-widest">Permitir transacciones en USD/VED</p>
            </div>
          </div>
          <div class="relative inline-block w-12 h-6 transition duration-200 ease-in-out bg-stone-300 rounded-full cursor-pointer">
            <div class="absolute w-5 h-5 transition duration-200 ease-in-out transform bg-white rounded-full left-0.5 top-0.5 shadow-sm translate-x-6"></div>
          </div>
        </div>

        <div class="flex items-center justify-between p-4 bg-stone-50 rounded-xl group hover:bg-stone-100 transition-all">
          <div class="flex gap-4 items-center">
            <div class="w-10 h-10 bg-white border border-stone-200 rounded-lg flex items-center justify-center text-stone-400 group-hover:text-amber-500 transition-colors">
              <span class="material-symbols-outlined">warning</span>
            </div>
            <div>
              <p class="text-sm font-black text-stone-900 uppercase">Venta sin Existencia</p>
              <p class="text-[10px] text-stone-500 font-bold uppercase tracking-widest">Bloquear facturación si stock = 0</p>
            </div>
          </div>
          <div class="relative inline-block w-12 h-6 transition duration-200 ease-in-out bg-primary rounded-full cursor-pointer">
            <div class="absolute w-5 h-5 transition duration-200 ease-in-out transform bg-white rounded-full left-0.5 top-0.5 shadow-sm"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Right Column: Sidebar Settings -->
  <div class="lg:col-span-4 space-y-8">
    <!-- Current Status Card -->
    <div class="bg-stone-900 p-8 rounded-xl shadow-2xl relative overflow-hidden border border-stone-800">
      <div class="relative z-10">
        <h3 class="text-xl font-headline font-black text-primary uppercase mb-6 flex items-center gap-2">
          <span class="material-symbols-outlined">shield_check</span>
          Firma Digital
        </h3>
        <div class="space-y-6">
          <div class="p-4 bg-stone-800 border border-stone-700 rounded-xl">
            <p class="text-[9px] text-stone-500 font-black uppercase tracking-widest mb-2">Llave de Cifrado ERP</p>
            <div class="flex items-center justify-between">
              <span class="text-xs font-mono text-stone-300">ZENITH_RSA_2048_...</span>
              <button class="text-primary text-[10px] font-black uppercase">RENOVAR</button>
            </div>
          </div>
          <div class="space-y-4">
            <div class="flex justify-between items-center text-[10px] font-bold uppercase tracking-widest opacity-60 text-stone-400">
              <span>Token SENIAT</span>
              <span class="text-primary">ACTIVO</span>
            </div>
            <div class="flex justify-between items-center text-[10px] font-bold uppercase tracking-widest opacity-60 text-stone-400">
              <span>Certificado SSL</span>
              <span class="text-primary">EXP. 240 DÍAS</span>
            </div>
          </div>
        </div>
      </div>
      <span class="material-symbols-outlined absolute -right-10 -bottom-10 text-[200px] opacity-10 text-primary pointer-events-none rotate-12">lock</span>
    </div>

    <!-- Quick Actions -->
    <div class="bg-white rounded-xl border border-stone-200 p-6 shadow-sm">
      <h4 class="text-[10px] font-black text-stone-400 uppercase tracking-[0.2em] mb-6">Acciones Rápidas</h4>
      <div class="space-y-3">
        <button class="w-full flex items-center justify-between p-4 bg-stone-50 rounded-xl hover:bg-stone-100 transition-all text-xs font-bold text-stone-700 uppercase group">
          Limpiar Caché Global
          <span class="material-symbols-outlined text-stone-400 group-hover:text-stone-900 group-hover:rotate-45 transition-transform">autorenew</span>
        </button>
        <button class="w-full flex items-center justify-between p-4 bg-stone-50 rounded-xl hover:bg-stone-100 transition-all text-xs font-bold text-stone-700 uppercase group">
          Sincronizar Tasas BCV
          <span class="material-symbols-outlined text-stone-400 group-hover:text-stone-900 transition-colors">currency_exchange</span>
        </button>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/parametros.js') }}"></script>
@endpush
