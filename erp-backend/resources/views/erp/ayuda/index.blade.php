@extends('erp.layouts.app')

@section('title', 'Centro de Ayuda | ERP Zenith')

@section('content')
<!-- Header -->
<div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4 mb-10">
  <div>
    <p class="text-xs font-bold text-stone-400 tracking-[0.2em] uppercase mb-1">Ecosistema de Asistencia</p>
    <h2 class="text-3xl font-headline font-black text-stone-900 tracking-tight">Centro de Ayuda</h2>
    <p class="text-stone-500 text-sm mt-1">Soporte Técnico & Documentación Industrial • MAYOR DE REPUESTO LA CIMA, C.A.</p>
  </div>
  <div class="flex gap-3">
    <a href="{{ url('/erp/ayuda/crear-ticket') }}" class="bg-primary text-stone-900 px-5 py-2.5 rounded-xl text-xs font-bold uppercase tracking-wider hover:brightness-110 transition-all active:scale-95 shadow-lg shadow-primary/20 flex items-center gap-2">
      <span class="material-symbols-outlined text-sm text-stone-900">add_task</span>
      Abrir Ticket de Soporte
    </a>
  </div>
</div>

<!-- Search Bar -->
<div class="mb-12">
  <div class="max-w-3xl mx-auto relative group">
    <span class="absolute inset-y-0 left-0 flex items-center pl-6 text-stone-400 group-focus-within:text-primary transition-colors">
      <span class="material-symbols-outlined text-3xl">search</span>
    </span>
    <input type="text" placeholder="¿En qué podemos ayudarte hoy? (ej. Facturación, Inventario, Reportes)" class="w-full bg-white border-2 border-stone-200 rounded-2xl py-6 pl-20 pr-8 text-lg font-headline font-bold text-stone-900 placeholder:text-stone-300 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all shadow-xl shadow-stone-200/50"/>
  </div>
</div>

<!-- Category Grid -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
  <a href="{{ url('/erp/ayuda/manuales') }}" class="bg-white p-8 rounded-2xl border border-stone-200 shadow-sm hover:border-primary hover:shadow-xl hover:shadow-primary/5 transition-all group">
    <div class="w-16 h-16 bg-stone-950 rounded-2xl flex items-center justify-center text-primary mb-6 group-hover:scale-110 transition-transform shadow-lg shadow-stone-900/10">
      <span class="material-symbols-outlined text-4xl">menu_book</span>
    </div>
    <h3 class="text-xl font-headline font-black text-stone-900 uppercase tracking-tight mb-2">Base de Conocimiento</h3>
    <p class="text-sm text-stone-500 leading-relaxed font-medium">Manuales detallados, guías de usuario y procedimientos operativos estandarizados.</p>
    <div class="mt-6 flex items-center text-[10px] font-black text-primary uppercase tracking-[0.2em]"> EXPLORAR GUÍAS <span class="material-symbols-outlined text-sm ml-2 group-hover:translate-x-2 transition-transform">arrow_forward</span></div>
  </a>

  <a href="{{ url('/erp/ayuda/tickets') }}" class="bg-white p-8 rounded-2xl border border-stone-200 shadow-sm hover:border-stone-900 hover:shadow-xl transition-all group">
    <div class="w-16 h-16 bg-stone-100 rounded-2xl flex items-center justify-center text-stone-400 mb-6 group-hover:scale-110 transition-transform group-hover:bg-stone-900 group-hover:text-primary">
      <span class="material-symbols-outlined text-4xl">confirmation_number</span>
    </div>
    <h3 class="text-xl font-headline font-black text-stone-900 uppercase tracking-tight mb-2">Mis Tickets de Soporte</h3>
    <p class="text-sm text-stone-500 leading-relaxed font-medium">Seguimiento en tiempo real de incidentes técnicos y solicitudes de nuevas funciones.</p>
    <div class="mt-6 flex items-center text-[10px] font-black text-stone-400 uppercase tracking-[0.2em] group-hover:text-stone-900"> VER STATUS <span class="material-symbols-outlined text-sm ml-2 group-hover:translate-x-2 transition-transform">arrow_forward</span></div>
  </a>

  <a href="{{ url('/erp/ayuda/acerca-de') }}" class="bg-white p-8 rounded-2xl border border-stone-200 shadow-sm hover:border-stone-400 hover:shadow-xl transition-all group">
    <div class="w-16 h-16 bg-stone-50 rounded-2xl flex items-center justify-center text-stone-300 mb-6 group-hover:scale-110 transition-transform group-hover:text-stone-900">
      <span class="material-symbols-outlined text-4xl">info</span>
    </div>
    <h3 class="text-xl font-headline font-black text-stone-900 uppercase tracking-tight mb-2">Acerca del Sistema</h3>
    <p class="text-sm text-stone-500 leading-relaxed font-medium">Información de versión, licencias vigentes y tecnologías que impulsan Zenith ERP.</p>
    <div class="mt-6 flex items-center text-[10px] font-black text-stone-300 uppercase tracking-[0.2em] group-hover:text-stone-900"> VER DETALLES <span class="material-symbols-outlined text-sm ml-2 group-hover:translate-x-2 transition-transform">arrow_forward</span></div>
  </a>
</div>

<!-- Featured Help Section -->
<div class="bg-stone-900 rounded-3xl p-10 relative overflow-hidden shadow-2xl border border-stone-800">
  <div class="relative z-10 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
    <div>
      <span class="px-4 py-1.5 bg-primary/20 text-primary text-[10px] font-black rounded-full uppercase tracking-widest border border-primary/30 inline-block mb-6 italic">Última Actualización: v6.0.4 - "Zenith Catalyst"</span>
      <h2 class="text-4xl font-headline font-black text-white uppercase leading-none mb-6">Novedades en <span class="text-primary italic underline decoration-wavy underline-offset-8">Zenith 6.0</span></h2>
      <p class="text-stone-400 text-lg leading-relaxed mb-8 font-medium">Hemos renovado el motor de conciliación bancaria y optimizado la carga de inventario masiva. Descubre cómo estas mejoras potencian tu flujo de trabajo industrial.</p>
      <button class="bg-primary text-stone-900 px-8 py-4 rounded-xl font-black uppercase text-xs tracking-widest hover:brightness-110 transition-all flex items-center gap-3">
        Ver registro de cambios
        <span class="material-symbols-outlined text-lg">history</span>
      </button>
    </div>
    <div class="grid grid-cols-2 gap-4">
      <div class="p-6 bg-stone-800 border border-stone-700 rounded-2xl hover:border-primary/50 transition-all cursor-pointer group">
        <span class="material-symbols-outlined text-primary text-3xl mb-4 group-hover:rotate-12 transition-transform">account_balance_wallet</span>
        <h4 class="text-stone-100 font-bold uppercase text-[11px] tracking-widest">Nuevo Módulo Fiscal</h4>
      </div>
      <div class="p-6 bg-stone-800 border border-stone-700 rounded-2xl hover:border-primary/50 transition-all cursor-pointer group">
        <span class="material-symbols-outlined text-primary text-3xl mb-4 group-hover:rotate-12 transition-transform">bolt</span>
        <h4 class="text-stone-100 font-bold uppercase text-[11px] tracking-widest">Optimización de Queries</h4>
      </div>
      <div class="p-6 bg-stone-800 border border-stone-700 rounded-2xl hover:border-primary/50 transition-all cursor-pointer group">
        <span class="material-symbols-outlined text-primary text-3xl mb-4 group-hover:rotate-12 transition-transform">security_update_good</span>
        <h4 class="text-stone-100 font-bold uppercase text-[11px] tracking-widest">Seguridad End-to-End</h4>
      </div>
      <div class="p-6 bg-stone-800 border border-stone-700 rounded-2xl hover:border-primary/50 transition-all cursor-pointer group">
        <span class="material-symbols-outlined text-primary text-3xl mb-4 group-hover:rotate-12 transition-transform">smartphone</span>
        <h4 class="text-stone-100 font-bold uppercase text-[11px] tracking-widest">App Móvil Mejorada</h4>
      </div>
    </div>
  </div>
  <span class="material-symbols-outlined absolute -right-20 -bottom-20 text-[350px] opacity-10 text-primary pointer-events-none rotate-12">help</span>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/ayuda.js') }}"></script>
@endpush
