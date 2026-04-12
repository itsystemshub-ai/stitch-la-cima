@extends('erp.layouts.app')

@section('title', 'Analítica de Rendimiento de Ventas')

@section('breadcrumb')
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <a href="{{ url('/erp/ventas') }}" class="hover:text-stone-900 transition-colors">Ventas</a>
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <span class="text-stone-900">Analítica de Rendimiento</span>
@endsection

@section('content')
  <!-- Analytics Header -->
  <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6 mb-12">
    <div class="space-y-1">
      <div class="flex items-center gap-2">
        <span class="w-2 h-6 bg-primary rounded-full"></span>
        <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em]">Inteligencia de Mercado & Foresight</p>
      </div>
      <h2 class="text-4xl font-headline font-black text-stone-900 tracking-tight leading-none italic uppercase">Analítica de <span class="text-primary-dim">Rendimiento</span></h2>
    </div>
    
    <div class="flex items-center gap-3">
      <div class="bg-stone-50 border border-stone-100 p-1 rounded-xl flex">
        <button class="px-5 py-2 rounded-lg text-[10px] font-black uppercase tracking-widest bg-white shadow-sm text-stone-900 transition-all italic">Mensual</button>
        <button class="px-5 py-2 rounded-lg text-[10px] font-black uppercase tracking-widest text-stone-400 hover:text-stone-900 transition-all italic">Trimestral</button>
        <button class="px-5 py-2 rounded-lg text-[10px] font-black uppercase tracking-widest text-stone-400 hover:text-stone-900 transition-all italic">Anual</button>
      </div>
    </div>
  </div>

  <!-- Bento Analytics Grid -->
  <div class="grid grid-cols-12 gap-8 mb-12">
    <!-- Big Chart -->
    <div class="col-span-12 lg:col-span-8 bg-white rounded-3xl border border-stone-100 shadow-sm p-10 overflow-hidden relative group">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-4">
            <div>
                <h4 class="text-xs font-black text-stone-400 uppercase tracking-[0.2em] mb-1">Fluctuación de Ingresos Brutos</h4>
                <p class="text-sm font-bold text-stone-900 uppercase italic">Proyección de Cierre de Año 2024</p>
            </div>
            <div class="flex items-center gap-2">
                <span class="text-2xl font-black text-stone-900 tracking-tighter italic">$ 482,900.00</span>
                <span class="px-2 py-0.5 bg-green-50 text-green-600 border border-green-100 rounded text-[8px] font-black uppercase tracking-widest">+12.4%</span>
            </div>
        </div>
        
        <!-- Synthetic Chart Representation -->
        <div class="h-64 flex items-end justify-between items-end gap-2 px-2">
            <div class="flex-1 bg-stone-100 rounded-t-xl hover:bg-primary transition-all cursor-pointer group/bar h-[40%] relative">
                <div class="absolute -top-10 left-1/2 -translate-x-1/2 bg-stone-900 text-white text-[9px] font-black py-1 px-2 rounded opacity-0 group-hover/bar:opacity-100 transition-opacity uppercase tracking-widest">Ene</div>
            </div>
            <div class="flex-1 bg-stone-100 rounded-t-xl hover:bg-primary transition-all cursor-pointer h-[55%]"></div>
            <div class="flex-1 bg-stone-100 rounded-t-xl hover:bg-primary transition-all cursor-pointer h-[45%]"></div>
            <div class="flex-1 bg-stone-900 rounded-t-xl hover:bg-primary transition-all cursor-pointer h-[75%]"></div>
            <div class="flex-1 bg-stone-100 rounded-t-xl hover:bg-primary transition-all cursor-pointer h-[60%]"></div>
            <div class="flex-1 bg-primary rounded-t-xl hover:bg-stone-900 transition-all cursor-pointer h-[90%]"></div>
            <div class="flex-1 bg-stone-100 rounded-t-xl hover:bg-primary transition-all cursor-pointer h-[50%]"></div>
            <div class="flex-1 bg-stone-100 rounded-t-xl hover:bg-primary transition-all cursor-pointer h-[65%]"></div>
            <div class="flex-1 bg-stone-100 rounded-t-xl hover:bg-primary transition-all cursor-pointer h-[80%]"></div>
            <div class="flex-1 bg-stone-100 rounded-t-xl hover:bg-primary transition-all cursor-pointer h-[70%]"></div>
            <div class="flex-1 bg-stone-100 rounded-t-xl hover:bg-primary transition-all cursor-pointer h-[85%]"></div>
            <div class="flex-1 bg-stone-100 rounded-t-xl hover:bg-primary transition-all cursor-pointer h-[95%]"></div>
        </div>
        <div class="flex justify-between mt-4 text-[9px] font-black text-stone-300 uppercase tracking-[0.3em] italic">
            <span>Trimestre 01</span>
            <span>Trimestre 02</span>
            <span>Trimestre 03</span>
            <span>Trimestre 04</span>
        </div>
    </div>

    <!-- Right Stats Stack -->
    <div class="col-span-12 lg:col-span-4 space-y-8">
        <div class="bg-stone-900 rounded-3xl p-8 relative overflow-hidden group">
            <div class="absolute inset-0 opacity-10" style="background-image: repeating-linear-gradient(45deg, #ceff5e 0, #ceff5e 1px, transparent 0, transparent 50%); background-size: 10px 10px;"></div>
            <div class="relative z-10">
                <h4 class="text-[10px] font-black text-stone-500 uppercase tracking-[0.3em] mb-4">Líder de Ventas (SPOTLIGHT)</h4>
                <div class="flex items-center gap-5">
                    <div class="w-16 h-16 bg-primary rounded-2xl flex items-center justify-center text-stone-900 font-black text-2xl shadow-xl shadow-primary/20 italic">EV</div>
                    <div>
                        <p class="text-base font-black text-white uppercase italic tracking-tight">Elara Vance</p>
                        <p class="text-[9px] font-black text-primary uppercase tracking-[0.2em]">Closed: $12.4M</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-3xl p-8 border border-stone-100 shadow-sm">
            <h4 class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em] mb-6 italic">Top Categorías</h4>
            <div class="space-y-6">
                <div class="flex justify-between items-center group">
                    <div class="flex items-center gap-3">
                        <div class="w-1 h-1 bg-primary rounded-full group-hover:w-4 transition-all"></div>
                        <p class="text-[10px] font-black text-stone-700 uppercase tracking-widest">Turbinas V12</p>
                    </div>
                    <span class="text-xs font-black italic">$ 124.2M</span>
                </div>
                <div class="flex justify-between items-center group text-stone-400">
                    <div class="flex items-center gap-3">
                        <div class="w-1 h-1 bg-stone-200 rounded-full group-hover:w-4 group-hover:bg-primary transition-all"></div>
                        <p class="text-[10px] font-black uppercase tracking-widest">Hydraulics P6</p>
                    </div>
                    <span class="text-xs font-black italic">$ 98.5M</span>
                </div>
            </div>
        </div>
    </div>
  </div>

  <!-- Regional & Global Reach -->
  <div class="grid grid-cols-12 gap-8 mb-12">
    <div class="col-span-12 lg:col-span-7 bg-white rounded-3xl border border-stone-100 shadow-sm overflow-hidden p-8">
        <h4 class="text-xs font-black text-stone-400 uppercase tracking-[0.2em] mb-8 italic">Distribución Geográfica de Demanda</h4>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div class="p-6 bg-stone-50 rounded-3xl border border-stone-100 flex flex-col items-center">
                <span class="text-[9px] font-black text-stone-400 uppercase mb-2">Oriente</span>
                <span class="text-xl font-headline font-black text-stone-900 leading-none">32%</span>
            </div>
            <div class="p-6 bg-stone-900 rounded-3xl border border-stone-800 flex flex-col items-center">
                <span class="text-[9px] font-black text-stone-500 uppercase mb-2">Occidente</span>
                <span class="text-xl font-headline font-black text-primary leading-none">41%</span>
            </div>
            <div class="p-6 bg-stone-50 rounded-3xl border border-stone-100 flex flex-col items-center">
                <span class="text-[9px] font-black text-stone-400 uppercase mb-2">Central</span>
                <span class="text-xl font-headline font-black text-stone-900 leading-none">18%</span>
            </div>
            <div class="p-6 bg-stone-50 rounded-3xl border border-stone-100 flex flex-col items-center">
                <span class="text-[9px] font-black text-stone-400 uppercase mb-2">Sur</span>
                <span class="text-xl font-headline font-black text-stone-900 leading-none">09%</span>
            </div>
        </div>
    </div>
    
    <div class="col-span-12 lg:col-span-5 bg-white rounded-3xl border border-stone-100 shadow-sm p-8 flex flex-col justify-between">
        <div class="mb-6">
            <h4 class="text-xs font-black text-stone-900 uppercase tracking-[0.2em] italic">Compliance & Legal Audit</h4>
            <p class="text-[10px] text-stone-400 font-bold uppercase tracking-widest mt-2 leading-relaxed">Verificación trimestral del SENIAT / Contribuyente Especial</p>
        </div>
        <div class="flex items-center gap-6 p-5 bg-stone-50 rounded-3xl border border-stone-100 group hover:border-primary transition-all duration-500">
            <div class="w-12 h-12 bg-stone-900 rounded-2xl flex items-center justify-center text-primary font-black italic shadow-lg group-hover:scale-110 transition-all">RIF</div>
            <div class="space-y-1">
                <p class="text-[10px] font-black text-stone-400 uppercase tracking-widest leading-none">Identidad Fiscal Consolidada</p>
                <p class="text-sm font-black text-stone-900 uppercase tracking-widest">J-40308741-5</p>
                <p class="text-[8px] font-bold text-stone-400 uppercase tracking-tighter">MAYOR DE REPUESTO LA CIMA, C.A.</p>
            </div>
        </div>
    </div>
  </div>
@endsection

@push('scripts')
    <script src="{{ asset('erp/js/reportes-ventas.js') }}"></script>
@endpush
