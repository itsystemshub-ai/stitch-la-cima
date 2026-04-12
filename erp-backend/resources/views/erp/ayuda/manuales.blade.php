@extends('erp.layouts.app')

@section('title', 'Manuales del Sistema | ERP Zenith')

@section('content')
<!-- Header -->
<div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4 mb-10">
  <div>
    <p class="text-xs font-bold text-stone-400 tracking-[0.2em] uppercase mb-1">Base de Conocimiento</p>
    <h2 class="text-3xl font-headline font-black text-stone-900 tracking-tight">Manuales de Usuario</h2>
    <p class="text-stone-500 text-sm mt-1">Guías de Operación Técnica • MAYOR DE REPUESTO LA CIMA, C.A.</p>
  </div>
  <div class="flex gap-3">
    <button class="bg-white border border-stone-200 text-stone-700 px-5 py-2.5 rounded-xl text-xs font-bold uppercase tracking-wider hover:bg-stone-50 transition-all active:scale-95 shadow-sm flex items-center gap-2">
      <span class="material-symbols-outlined text-sm">print</span>
      Imprimir Guía Rápida
    </button>
  </div>
</div>

<!-- Search & Categories Hierarchy -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
  <!-- Sidebar Navigator -->
  <div class="lg:col-span-3 space-y-6">
    <div class="bg-white rounded-xl border border-stone-200 p-6 shadow-sm">
      <h4 class="text-[10px] font-black text-stone-400 uppercase tracking-[0.2em] mb-6">Categorías</h4>
      <nav class="space-y-1">
        <button class="w-full flex items-center gap-3 p-3 bg-primary/10 text-stone-900 rounded-xl text-xs font-black uppercase transition-all border-l-4 border-primary">
          <span class="material-symbols-outlined text-sm">dashboard</span>
          Primeros Pasos
        </button>
        <button class="w-full flex items-center gap-3 p-3 text-stone-500 hover:bg-stone-50 rounded-xl text-xs font-bold uppercase transition-all">
          <span class="material-symbols-outlined text-sm">inventory_2</span>
          Inv. & Logística
        </button>
        <button class="w-full flex items-center gap-3 p-3 text-stone-500 hover:bg-stone-50 rounded-xl text-xs font-bold uppercase transition-all">
          <span class="material-symbols-outlined text-sm">point_of_sale</span>
          Ventas y POS
        </button>
        <button class="w-full flex items-center gap-3 p-3 text-stone-500 hover:bg-stone-50 rounded-xl text-xs font-bold uppercase transition-all">
          <span class="material-symbols-outlined text-sm">account_balance</span>
          Contabilidad
        </button>
        <button class="w-full flex items-center gap-3 p-3 text-stone-500 hover:bg-stone-50 rounded-xl text-xs font-bold uppercase transition-all">
          <span class="material-symbols-outlined text-sm">admin_panel_settings</span>
          Configuración
        </button>
      </nav>
    </div>

    <!-- Help Notice -->
    <div class="bg-stone-900 p-6 rounded-xl border border-stone-800 shadow-2xl relative overflow-hidden">
      <div class="relative z-10">
        <h5 class="text-primary text-[10px] font-black uppercase tracking-widest mb-3">¿No encuentra algo?</h5>
        <p class="text-stone-400 text-xs leading-relaxed mb-4">Nuestro equipo de soporte puede guiarle personalmente.</p>
        <a href="{{ url('/erp/ayuda/crear-ticket') }}" class="text-white text-[10px] font-black uppercase underline hover:text-primary transition-colors">Solicitar Video-Guía</a>
      </div>
      <span class="material-symbols-outlined absolute -right-6 -bottom-6 text-7xl text-primary opacity-10 pointer-events-none rotate-12">live_help</span>
    </div>
  </div>

  <!-- Content Area: Manual Grid -->
  <div class="lg:col-span-9 space-y-8">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <!-- Manual Card 1 -->
      <div class="bg-white rounded-2xl border border-stone-200 p-8 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all group border-b-4 border-b-primary cursor-pointer">
        <div class="flex justify-between items-start mb-6">
          <div class="w-12 h-12 bg-stone-50 rounded-xl border border-stone-100 flex items-center justify-center text-stone-400 group-hover:bg-stone-900 group-hover:text-primary transition-all">
            <span class="material-symbols-outlined text-2xl">rocket_launch</span>
          </div>
          <span class="bg-stone-100 text-stone-500 text-[8px] font-black px-2 py-0.5 rounded uppercase">v6.0</span>
        </div>
        <h3 class="text-lg font-headline font-black text-stone-900 uppercase tracking-tight mb-2">Guía de Inicio Rápido</h3>
        <p class="text-xs text-stone-500 leading-relaxed mb-6">Aprenda a navegar la interfaz de Zenith ERP y configurar su perfil de usuario en menos de 5 minutos.</p>
        <div class="flex items-center justify-between pt-4 border-t border-stone-50">
          <span class="text-[9px] font-black text-stone-400 uppercase">12 Páginas • PDF</span>
          <span class="material-symbols-outlined text-stone-400 group-hover:text-primary transition-colors">download</span>
        </div>
      </div>

      <!-- Manual Card 2 -->
      <div class="bg-white rounded-2xl border border-stone-200 p-8 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all group border-b-4 border-b-stone-900 cursor-pointer">
        <div class="flex justify-between items-start mb-6">
          <div class="w-12 h-12 bg-stone-50 rounded-xl border border-stone-100 flex items-center justify-center text-stone-400 group-hover:bg-stone-900 group-hover:text-primary transition-all">
            <span class="material-symbols-outlined text-2xl">barcode_scanner</span>
          </div>
          <span class="bg-stone-900 text-primary text-[8px] font-black px-2 py-0.5 rounded uppercase">Popular</span>
        </div>
        <h3 class="text-lg font-headline font-black text-stone-900 uppercase tracking-tight mb-2">Gestión de Inventario</h3>
        <p class="text-xs text-stone-500 leading-relaxed mb-6">Procedimientos para carga de mercancía, ajustes de stock y generación de Kardex detallado.</p>
        <div class="flex items-center justify-between pt-4 border-t border-stone-50">
          <span class="text-[9px] font-black text-stone-400 uppercase">45 Páginas • PDF</span>
          <span class="material-symbols-outlined text-stone-400 group-hover:text-primary transition-colors">download</span>
        </div>
      </div>

      <!-- Manual Card 3 -->
      <div class="bg-white rounded-2xl border border-stone-200 p-8 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all group cursor-pointer">
        <div class="flex justify-between items-start mb-6">
          <div class="w-12 h-12 bg-stone-50 rounded-xl border border-stone-100 flex items-center justify-center text-stone-400 group-hover:bg-stone-900 group-hover:text-primary transition-all">
            <span class="material-symbols-outlined text-2xl">receipt_long</span>
          </div>
        </div>
        <h3 class="text-lg font-headline font-black text-stone-900 uppercase tracking-tight mb-2">Facturación y POS</h3>
        <p class="text-xs text-stone-500 leading-relaxed mb-6">Uso correcto de la terminal de punto de venta, manejo de divisas y cierres de caja diarios.</p>
        <div class="flex items-center justify-between pt-4 border-t border-stone-50">
          <span class="text-[9px] font-black text-stone-400 uppercase">28 Páginas • PDF</span>
          <span class="material-symbols-outlined text-stone-400 group-hover:text-primary transition-colors">download</span>
        </div>
      </div>

      <!-- Manual Card 4 -->
      <div class="bg-white rounded-2xl border border-stone-200 p-8 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all group cursor-pointer">
        <div class="flex justify-between items-start mb-6">
          <div class="w-12 h-12 bg-stone-50 rounded-xl border border-stone-100 flex items-center justify-center text-stone-400 group-hover:bg-stone-900 group-hover:text-primary transition-all">
            <span class="material-symbols-outlined text-2xl">engineering</span>
          </div>
        </div>
        <h3 class="text-lg font-headline font-black text-stone-900 uppercase tracking-tight mb-2">Configuración Fiscal</h3>
        <p class="text-xs text-stone-500 leading-relaxed mb-6">Guía avanzada para administradores sobre tasas de IVA, ISLR e IGTF según regulaciones vigentes.</p>
        <div class="flex items-center justify-between pt-4 border-t border-stone-50">
          <span class="text-[9px] font-black text-stone-400 uppercase">18 Páginas • PDF</span>
          <span class="material-symbols-outlined text-stone-400 group-hover:text-primary transition-colors">download</span>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/manuales.js') }}"></script>
@endpush
