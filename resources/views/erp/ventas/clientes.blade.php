@extends('erp.layouts.app')

@section('title', 'Maestro de Clientes | ERP La Cima')

@section('breadcrumb')
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <a href="{{ url('/erp/ventas') }}" class="hover:text-stone-900 transition-colors">Ventas</a>
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <span class="text-stone-900">Maestro de Clientes</span>
@endsection

@section('content')
  <!-- Header & Action -->
  <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6 mb-12">
    <div class="space-y-1">
      <div class="flex items-center gap-2">
        <span class="w-2 h-6 bg-primary rounded-full"></span>
        <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em]">Gestión de Relaciones Comerciales</p>
      </div>
      <h2 class="text-4xl font-headline font-black text-stone-900 tracking-tight leading-none italic uppercase">Maestro de <span class="text-primary-dim">Clientes</span></h2>
    </div>
    
    <div class="flex items-center gap-3">
      <div class="relative group">
        <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-stone-400 group-focus-within:text-primary transition-colors text-lg">search</span>
        <input type="text" placeholder="RIF, Nombre o Teléfono..." class="bg-white border border-stone-200 pl-12 pr-6 py-3 rounded-xl text-xs font-bold w-64 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all outline-none">
      </div>
      <button class="bg-stone-900 text-white px-5 py-3 rounded-xl flex items-center gap-3 hover:bg-stone-800 transition-all active:scale-95 shadow-xl shadow-stone-200">
        <span class="material-symbols-outlined text-lg text-primary">person_add</span>
        <span class="text-[10px] font-bold uppercase tracking-widest text-white">Nuevo Cliente</span>
      </button>
    </div>
  </div>

  <div class="grid grid-cols-12 gap-8 mb-12">
    <!-- List Column -->
    <div class="col-span-12 lg:col-span-8 space-y-4">
      <div class="bg-white rounded-3xl border border-stone-100 shadow-sm overflow-hidden">
        <div class="px-8 py-6 border-b border-stone-50 flex justify-between items-center bg-stone-50/30">
            <h4 class="text-xs font-black text-stone-400 uppercase tracking-[0.2em]">Cuentas Registradas</h4>
            <div class="flex gap-4 items-center">
                <span class="text-[9px] font-black text-stone-400 uppercase">Filtro Activo: Todos</span>
                <button class="material-symbols-outlined text-stone-400 text-base">filter_list</button>
            </div>
        </div>
        <div class="divide-y divide-stone-50">
          <!-- Item 1 -->
          <div class="p-8 flex items-center justify-between group hover:bg-stone-50/50 transition-all duration-300">
            <div class="flex items-center gap-6">
              <div class="w-14 h-14 bg-stone-900 rounded-2xl flex items-center justify-center text-primary font-black text-xl shadow-xl shadow-stone-200 group-hover:scale-110 transition-transform">TC</div>
              <div>
                <div class="flex items-center gap-2 mb-1">
                  <h5 class="text-base font-black text-stone-900 uppercase tracking-tight italic">Transporte Carabobo, C.A.</h5>
                  <span class="px-2 py-0.5 bg-primary/10 text-primary border border-primary/20 rounded text-[8px] font-black uppercase tracking-widest">Agente de Retención</span>
                </div>
                <div class="flex items-center gap-4 text-[10px] font-bold text-stone-400 uppercase tracking-widest leading-none">
                  <span>RIF: J-30492834-0</span>
                  <span class="w-1 h-1 bg-stone-300 rounded-full"></span>
                  <span>Valencia, Carabobo</span>
                </div>
              </div>
            </div>
            <div class="flex items-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
              <button class="w-10 h-10 rounded-xl bg-white border border-stone-200 flex items-center justify-center hover:border-primary hover:text-primary transition-all shadow-sm"><span class="material-symbols-outlined text-lg">edit</span></button>
              <button class="w-10 h-10 rounded-xl bg-white border border-stone-200 flex items-center justify-center hover:border-primary hover:text-primary transition-all shadow-sm"><span class="material-symbols-outlined text-lg">history</span></button>
            </div>
          </div>
          <!-- Item 2 -->
          <div class="p-8 flex items-center justify-between group hover:bg-stone-50/50 transition-all duration-300">
            <div class="flex items-center gap-6">
              <div class="w-14 h-14 bg-stone-100 rounded-2xl flex items-center justify-center text-stone-400 font-black text-xl group-hover:bg-stone-900 group-hover:text-primary transition-all group-hover:scale-110">EP</div>
              <div>
                <div class="flex items-center gap-2 mb-1 text-stone-400">
                  <h5 class="text-base font-black text-stone-900 uppercase tracking-tight italic">Servicio El Parral</h5>
                  <span class="px-2 py-0.5 bg-stone-100 text-stone-400 border border-stone-200 rounded text-[8px] font-black uppercase tracking-widest">Ordinario</span>
                </div>
                <div class="flex items-center gap-4 text-[10px] font-bold text-stone-400 uppercase tracking-widest leading-none">
                  <span>RIF: J-41223945-2</span>
                  <span class="w-1 h-1 bg-stone-300 rounded-full"></span>
                  <span>Altos del Parral</span>
                </div>
              </div>
            </div>
            <div class="flex items-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
              <button class="w-10 h-10 rounded-xl bg-white border border-stone-200 flex items-center justify-center hover:border-primary hover:text-primary transition-all shadow-sm"><span class="material-symbols-outlined text-lg">edit</span></button>
              <button class="w-10 h-10 rounded-xl bg-white border border-stone-200 flex items-center justify-center hover:border-primary hover:text-primary transition-all shadow-sm"><span class="material-symbols-outlined text-lg">history</span></button>
            </div>
          </div>
        </div>
        <div class="px-8 py-5 bg-stone-50/30 border-t border-stone-50 flex justify-between items-center">
            <p class="text-[9px] font-black text-stone-400 uppercase tracking-widest">Total 1,429 cuentas en la base de datos central</p>
            <div class="flex gap-2">
                <button class="w-8 h-8 rounded-lg border border-stone-200 flex items-center justify-center hover:bg-white transition-all"><span class="material-symbols-outlined text-sm">chevron_left</span></button>
                <button class="w-8 h-8 rounded-lg border border-stone-200 flex items-center justify-center hover:bg-white transition-all"><span class="material-symbols-outlined text-sm">chevron_right</span></button>
            </div>
        </div>
      </div>
    </div>

    <!-- Quick Form Column -->
    <div class="col-span-12 lg:col-span-4 gap-8 flex flex-col">
        <div class="bg-stone-900 rounded-3xl p-8 relative overflow-hidden group">
            <div class="absolute inset-0 opacity-10" style="background-image: repeating-linear-gradient(-45deg, #ceff5e 0, #ceff5e 1px, transparent 0, transparent 50%); background-size: 8px 8px;"></div>
            <div class="relative z-10">
                <h4 class="text-sm font-black text-primary uppercase tracking-[0.3em] mb-6 italic">Configuración Fiscal</h4>
                <div class="space-y-6">
                    <div class="bg-stone-800/50 rounded-2xl p-4 border border-white/5">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-[10px] font-black text-stone-400 uppercase tracking-widest">Autoretención IVA</span>
                            <div class="w-8 h-4 bg-primary rounded-full relative"><div class="absolute right-1 top-1 w-2 h-2 bg-stone-900 rounded-full"></div></div>
                        </div>
                        <p class="text-[9px] text-stone-500 font-bold uppercase italic tracking-tighter leading-none">Aplicación automática de base imponible al 75% o 100%</p>
                    </div>
                    <div class="bg-stone-800/50 rounded-2xl p-4 border border-white/5 opacity-50">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-[10px] font-black text-stone-400 uppercase tracking-widest">Retención ISLR</span>
                            <div class="w-8 h-4 bg-stone-700 rounded-full relative"><div class="absolute left-1 top-1 w-2 h-2 bg-stone-400 rounded-full"></div></div>
                        </div>
                        <p class="text-[9px] text-stone-500 font-bold uppercase italic tracking-tighter leading-none">Control preventivo de impuesto sobre la renta</p>
                    </div>
                </div>
                <button class="w-full mt-8 bg-white/10 hover:bg-white/20 text-white rounded-xl py-4 text-[10px] font-black uppercase tracking-[0.2em] transition-all border border-white/10 italic">Actualizar Global Parameters</button>
            </div>
        </div>

        <div class="bg-white rounded-3xl p-8 border border-stone-100 shadow-sm flex-1">
            <h4 class="text-sm font-black text-stone-900 uppercase tracking-[0.2em] mb-6 italic">Legal Info</h4>
            <div class="space-y-4">
                <div class="p-4 bg-stone-50 rounded-2xl border border-stone-100">
                    <p class="text-[9px] font-black text-stone-400 uppercase tracking-widest mb-1">Fiscal Registered Entity</p>
                    <p class="text-xs font-bold text-stone-900 uppercase tracking-tight">MAYOR DE REPUESTO LA CIMA, C.A.</p>
                </div>
                <div class="p-4 bg-stone-50 rounded-2xl border border-stone-100">
                    <p class="text-[9px] font-black text-stone-400 uppercase tracking-widest mb-1">Tax ID (RIF)</p>
                    <p class="text-xs font-bold text-stone-900 uppercase tracking-tight tracking-widest">J-40308741-5</p>
                </div>
            </div>
            <div class="mt-8 pt-8 border-t border-stone-50">
                <p class="text-[10px] text-stone-400 font-bold italic text-center uppercase leading-tight tracking-tighter">Este sistema cumple con las normativas vigentes del SENIAT para el registro de contribuyentes.</p>
            </div>
        </div>
    </div>
  </div>
@endsection

@push('scripts')
    <script src="{{ asset('erp/js/clientes.js') }}"></script>
@endpush
