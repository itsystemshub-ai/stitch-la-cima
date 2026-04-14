@extends('erp.layouts.app')

@section('title', 'Acerca de Zenith ERP | Ecosistema La Cima')

@section('content')
<!-- Header -->
<div class="mb-12">
  <p class="text-xs font-bold text-stone-400 tracking-[0.2em] uppercase mb-1">Información de Producto</p>
  <h2 class="text-3xl font-headline font-black text-stone-900 tracking-tight underline decoration-primary decoration-4 underline-offset-8">Acerca de Zenith ERP</h2>
</div>

<div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
  <!-- Left Side: Version Info & Identity -->
  <div class="lg:col-span-12 space-y-12">
    <div class="bg-stone-900 rounded-[2.5rem] p-12 shadow-2xl relative overflow-hidden flex flex-col items-center text-center border border-stone-800">
      <div class="relative z-10 space-y-8 max-w-2xl">
        <div class="inline-block p-6 bg-primary/10 rounded-3xl border border-primary/20 shadow-lg shadow-primary/5">
          <span class="text-8xl font-headline font-black text-primary tracking-tighter">Z.6</span>
        </div>
        <div>
          <h3 class="text-5xl font-headline font-black text-white uppercase tracking-tighter leading-none mb-4">ZENITH <span class="text-primary italic">CATALYST</span></h3>
          <p class="text-stone-400 text-lg font-medium leading-relaxed italic">"El núcleo inteligente de la industria de repuestos."</p>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 pt-8">
          <div class="p-6 bg-stone-800 rounded-3xl border border-stone-700 shadow-xl">
            <p class="text-[9px] text-stone-500 font-black uppercase tracking-widest mb-2">Versión</p>
            <p class="text-stone-100 font-black text-xl uppercase">6.0.4-L</p>
          </div>
          <div class="p-6 bg-stone-800 rounded-3xl border border-stone-700 shadow-xl">
            <p class="text-[9px] text-stone-500 font-black uppercase tracking-widest mb-2">Build</p>
            <p class="text-stone-100 font-black text-xl uppercase">2026.04</p>
          </div>
          <div class="p-6 bg-stone-800 rounded-3xl border border-stone-700 shadow-xl">
            <p class="text-[9px] text-stone-500 font-black uppercase tracking-widest mb-2">Licencia</p>
            <p class="text-primary font-black text-xl uppercase">ENTERPRISE</p>
          </div>
          <div class="p-6 bg-stone-800 rounded-3xl border border-stone-700 shadow-xl">
            <p class="text-[9px] text-stone-500 font-black uppercase tracking-widest mb-2">Motor</p>
            <p class="text-stone-100 font-black text-xl uppercase">LARAVEL</p>
          </div>
        </div>
      </div>
      <span class="material-symbols-outlined absolute -right-32 -bottom-32 text-[500px] opacity-10 text-primary pointer-events-none rotate-12">settings_suggest</span>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
      <!-- Legal Identity Section -->
      <div class="bg-white rounded-3xl p-10 border border-stone-200 shadow-sm space-y-8">
        <h4 class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em] flex items-center gap-3">
          <span class="w-10 h-[1px] bg-primary"></span> PROPIEDAD INTELECTUAL
        </h4>
        <div class="space-y-6">
          <div class="flex items-center gap-6">
            <div class="w-20 h-20 bg-stone-900 rounded-2xl flex items-center justify-center text-primary shadow-xl">
              <span class="text-2xl font-black">MC</span>
            </div>
            <div>
              <h5 class="text-2xl font-headline font-black text-stone-900 leading-tight">MAYOR DE REPUESTO LA CIMA, C.A.</h5>
              <p class="text-sm font-black text-stone-500 uppercase tracking-widest mt-1">RIF: J-40308741-5</p>
            </div>
          </div>
          <p class="text-stone-600 leading-relaxed font-body text-sm">Este sistema constituye propiedad industrial protegida bajo las leyes de propiedad intelectual de la República Bolivariana de Venezuela. Queda prohibida la reproducción total o parcial sin autorización expresa de los titulares.</p>
        </div>
      </div>

      <!-- Tech Stack / Under the Hood -->
      <div class="bg-stone-50 rounded-3xl p-10 border border-stone-200 shadow-inner space-y-8">
        <h4 class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em] flex items-center gap-3">
          <span class="w-10 h-[1px] bg-stone-900"></span> ARQUITECTURA DEL SISTEMA
        </h4>
        <div class="grid grid-cols-2 gap-4">
          <div class="p-5 bg-white rounded-2xl border border-stone-100 shadow-sm flex items-center gap-3">
             <span class="material-symbols-outlined text-stone-400">database</span>
             <div>
                <p class="text-[10px] font-black text-stone-900 uppercase">MySQL 8.0</p>
                <p class="text-[8px] text-stone-400 font-bold uppercase tracking-widest">Optimized Core</p>
             </div>
          </div>
          <div class="p-5 bg-white rounded-2xl border border-stone-100 shadow-sm flex items-center gap-3">
             <span class="material-symbols-outlined text-stone-400">palette</span>
             <div>
                <p class="text-[10px] font-black text-stone-900 uppercase">Golden UI v4</p>
                <p class="text-[8px] text-stone-400 font-bold uppercase tracking-widest">Design System</p>
             </div>
          </div>
          <div class="p-5 bg-white rounded-2xl border border-stone-100 shadow-sm flex items-center gap-3">
             <span class="material-symbols-outlined text-stone-400">encrypted</span>
             <div>
                <p class="text-[10px] font-black text-stone-900 uppercase">RSA 2048</p>
                <p class="text-[8px] text-stone-400 font-bold uppercase tracking-widest">Secure Cifr</p>
             </div>
          </div>
          <div class="p-5 bg-white rounded-2xl border border-stone-100 shadow-sm flex items-center gap-3">
             <span class="material-symbols-outlined text-stone-400">terminal</span>
             <div>
                <p class="text-[10px] font-black text-stone-900 uppercase">Zenith Engine</p>
                <p class="text-[8px] text-stone-400 font-bold uppercase tracking-widest">v6-Catalyst</p>
             </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
