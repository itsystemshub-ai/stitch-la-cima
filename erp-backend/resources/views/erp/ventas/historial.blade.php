@extends('erp.layouts.app')

@section('title', 'Historial de Facturas | ERP La Cima')

@section('breadcrumb')
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <a href="{{ url('/erp/ventas') }}" class="hover:text-stone-900 transition-colors">Ventas</a>
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <span class="text-stone-900">Historial Facturas</span>
@endsection

@section('content')
  <!-- History Header -->
  <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6 mb-12">
    <div class="space-y-1">
      <div class="flex items-center gap-2">
        <span class="w-2 h-6 bg-primary rounded-full"></span>
        <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em]">Archivo Fiscal Correlativo</p>
      </div>
      <h2 class="text-4xl font-headline font-black text-stone-900 tracking-tight leading-none italic uppercase">Historial de <span class="text-primary-dim">Facturas</span></h2>
    </div>
    
    <div class="flex items-center gap-3">
        <button class="bg-stone-50 border border-stone-100 px-6 py-3 rounded-xl text-[10px] font-black uppercase tracking-widest text-stone-600 hover:text-stone-900 transition-all flex items-center gap-2 italic">
            <span class="material-symbols-outlined text-sm">filter_list</span> Filtrar
        </button>
        <button class="bg-stone-900 px-6 py-3 rounded-xl text-[10px] font-black uppercase tracking-widest text-primary hover:text-white transition-all flex items-center gap-2 italic">
            <span class="material-symbols-outlined text-sm">file_download</span> Reporte Mensual
        </button>
    </div>
  </div>

  <!-- Summary Cards -->
  <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
    <div class="bg-white rounded-3xl p-8 border border-stone-100 shadow-sm relative group">
        <div class="absolute top-0 right-0 w-16 h-16 bg-primary/5 rounded-bl-[40px] opacity-0 group-hover:opacity-100 transition-all duration-500 flex items-center justify-center">
            <span class="material-symbols-outlined text-primary text-xl">payments</span>
        </div>
        <p class="text-[10px] font-black text-stone-400 uppercase tracking-widest mb-1">Total Facturado</p>
        <p class="text-3xl font-headline font-black text-stone-900">$ 284.930,00</p>
        <div class="mt-4 flex items-center gap-2">
            <span class="text-[9px] font-black text-green-600 uppercase tracking-widest">+12% vs mes ant.</span>
        </div>
    </div>
    <div class="bg-white rounded-3xl p-8 border border-stone-100 shadow-sm relative group">
        <p class="text-[10px] font-black text-stone-400 uppercase tracking-widest mb-1">Documentos</p>
        <p class="text-3xl font-headline font-black text-stone-900">1.248</p>
        <div class="mt-4 flex items-center gap-2">
            <span class="text-[9px] font-black text-stone-300 uppercase tracking-widest">Ejercicios 2024</span>
        </div>
    </div>
    <div class="bg-white rounded-3xl p-8 border border-stone-100 shadow-sm relative group">
        <p class="text-[10px] font-black text-stone-400 uppercase tracking-widest mb-1">Anuladas</p>
        <p class="text-3xl font-headline font-black text-stone-900 text-stone-300 italic">12</p>
        <div class="mt-4 flex items-center gap-2">
            <span class="text-[9px] font-black text-red-400 uppercase tracking-widest">Incidencia: 0.9%</span>
        </div>
    </div>
    <div class="bg-stone-900 rounded-3xl p-8 relative overflow-hidden group">
        <div class="absolute inset-0 opacity-10" style="background-image: repeating-linear-gradient(45deg, #ceff5e 0, #ceff5e 1px, transparent 0, transparent 50%); background-size: 10px 10px;"></div>
        <div class="relative z-10">
            <p class="text-[10px] font-black text-stone-500 uppercase tracking-widest mb-1">IVA Estimado</p>
            <p class="text-3xl font-headline font-black text-primary">$ 45.588,80</p>
            <div class="mt-4 flex items-center gap-2">
                <span class="text-[9px] font-black text-stone-400 uppercase tracking-widest">Fideicomiso Fiscal</span>
            </div>
        </div>
    </div>
  </div>

  <!-- Document Table -->
  <div class="bg-white rounded-[40px] border border-stone-100 shadow-xl overflow-hidden mb-12">
    <div class="p-8 border-b border-stone-50 flex justify-between items-center bg-stone-50/30">
        <div class="flex items-center gap-4">
            <div class="relative group">
                <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-stone-400 group-focus-within:text-primary transition-all">
                    <span class="material-symbols-outlined text-lg">search</span>
                </span>
                <input type="text" placeholder="Buscar por cliente, RIF o nro control..." class="bg-white border-stone-100 text-[11px] font-bold pl-12 pr-6 py-3 w-80 rounded-2xl focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all uppercase tracking-widest outline-none shadow-sm">
            </div>
        </div>
        <div class="flex items-center gap-4">
            <div class="w-[1px] h-8 bg-stone-200"></div>
            <p class="text-[10px] font-black text-stone-400 uppercase tracking-widest italic">Mostrando 1-15 de 1,248 resultados</p>
        </div>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="text-[9px] font-black uppercase tracking-[0.2em] text-stone-400 border-b border-stone-50">
                    <th class="py-6 px-10">Fecha / Control</th>
                    <th class="py-6 px-10">Entidad Cliente</th>
                    <th class="py-6 px-10 text-right">Base Imp. ($)</th>
                    <th class="py-6 px-10 text-right">Total ($)</th>
                    <th class="py-6 px-10 text-center">Estado</th>
                    <th class="py-6 px-10 text-right">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-[11px] font-bold text-stone-700 uppercase">
                <tr class="border-b border-stone-50 hover:bg-stone-50/50 transition-all group">
                    <td class="py-6 px-10">
                        <p class="text-stone-900 font-black tracking-tight italic">24/05/2024</p>
                        <p class="text-[8px] text-stone-400 mt-1 uppercase tracking-widest">F-0001824</p>
                    </td>
                    <td class="py-6 px-10">
                        <p class="text-stone-900 font-black tracking-tight">Aceros del Orinoco C.A.</p>
                        <p class="text-[8px] text-stone-400 mt-1 uppercase tracking-widest">J-30456214-0</p>
                    </td>
                    <td class="py-6 px-10 text-right font-black italic text-stone-400">$ 12.450,00</td>
                    <td class="py-6 px-10 text-right font-black italic text-stone-900">$ 14.442,00</td>
                    <td class="py-6 px-10 text-center">
                        <span class="px-3 py-1 bg-green-50 text-green-600 rounded-lg text-[8px] font-black uppercase tracking-widest italic">Vigente</span>
                    </td>
                    <td class="py-6 px-10 text-right">
                        <div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-all">
                            <button class="p-2 hover:bg-stone-100 rounded-lg text-stone-400 hover:text-stone-900 transition-all">
                                <span class="material-symbols-outlined text-lg">visibility</span>
                            </button>
                            <button class="p-2 hover:bg-stone-100 rounded-lg text-stone-400 hover:text-stone-900 transition-all">
                                <span class="material-symbols-outlined text-lg">print</span>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr class="border-b border-stone-50 bg-stone-50/20 hover:bg-stone-50/50 transition-all group">
                    <td class="py-6 px-10 italic">
                        <p class="text-stone-900 font-black tracking-tight italic">23/05/2024</p>
                        <p class="text-[8px] text-stone-400 mt-1 uppercase tracking-widest">F-0001823</p>
                    </td>
                    <td class="py-6 px-10">
                        <p class="text-stone-900 font-black tracking-tight">Suministros Industriales 2000</p>
                        <p class="text-[8px] text-stone-400 mt-1 uppercase tracking-widest">J-29877452-1</p>
                    </td>
                    <td class="py-6 px-10 text-right font-black italic text-stone-400">$ 4.200,00</td>
                    <td class="py-6 px-10 text-right font-black italic text-stone-900">$ 4.872,00</td>
                    <td class="py-6 px-10 text-center">
                        <span class="px-3 py-1 bg-green-50 text-green-600 rounded-lg text-[8px] font-black uppercase tracking-widest italic">Vigente</span>
                    </td>
                    <td class="py-6 px-10 text-right">
                        <div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-all">
                            <button class="p-2 hover:bg-stone-100 rounded-lg text-stone-400 hover:text-stone-900 transition-all">
                                <span class="material-symbols-outlined text-lg">visibility</span>
                            </button>
                            <button class="p-2 hover:bg-stone-100 rounded-lg text-stone-400 hover:text-stone-900 transition-all">
                                <span class="material-symbols-outlined text-lg">print</span>
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <!-- Table Footer -->
    <div class="p-8 bg-stone-50/30 border-t border-stone-50 flex justify-center">
        <div class="flex gap-2">
            <button class="w-10 h-10 flex items-center justify-center rounded-xl bg-white border border-stone-100 text-stone-400 hover:text-stone-900 transition-all">
                <span class="material-symbols-outlined text-lg">chevron_left</span>
            </button>
            <button class="w-10 h-10 flex items-center justify-center rounded-xl bg-primary text-stone-900 font-black text-xs italic">1</button>
            <button class="w-10 h-10 flex items-center justify-center rounded-xl bg-white border border-stone-100 text-stone-600 hover:text-stone-900 font-black text-xs transition-all italic">2</button>
            <button class="w-10 h-10 flex items-center justify-center rounded-xl bg-white border border-stone-100 text-stone-600 hover:text-stone-900 font-black text-xs transition-all italic">3</button>
            <button class="w-10 h-10 flex items-center justify-center rounded-xl bg-white border border-stone-100 text-stone-400 hover:text-stone-900 transition-all">
                <span class="material-symbols-outlined text-lg">chevron_right</span>
            </button>
        </div>
    </div>
  </div>

  <!-- Compliance Footer -->
  <div class="grid grid-cols-12 gap-8 mb-12">
    <div class="col-span-12 lg:col-span-8 bg-stone-50 rounded-[40px] p-10 border border-stone-100 flex flex-col md:flex-row items-center gap-10">
        <div class="w-32 h-32 bg-stone-900 rounded-[32px] flex items-center justify-center text-primary font-black italic shadow-2xl relative overflow-hidden group">
            <div class="absolute inset-x-0 bottom-0 h-1 bg-primary w-full shadow-[0_0_15px_#ceff5e]"></div>
            <span class="text-xl">RIF</span>
        </div>
        <div class="space-y-4 text-center md:text-left">
            <h4 class="text-xl font-headline font-black text-stone-900 uppercase tracking-tight italic">Mayor de Repuesto La Cima, C.A.</h4>
            <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em] leading-loose max-w-lg">Contribuyente Especial bajo supervisión directa del SENIAT. <br>RIF: J-40308741-5 • Valencia Operations Nucleus</p>
        </div>
    </div>
    
    <div class="col-span-12 lg:col-span-4 bg-primary rounded-[40px] p-10 relative overflow-hidden group">
        <div class="relative z-10 flex flex-col justify-between h-full">
            <h4 class="text-[10px] font-black text-stone-900 uppercase tracking-[0.3em] italic mb-4">Estatus Conexión Fiscal</h4>
            <div class="flex items-center gap-4 py-4 bg-white/20 rounded-2xl px-6 border border-white/30 backdrop-blur-sm">
                <div class="w-3 h-3 bg-stone-900 rounded-full animate-pulse shadow-[0_0_10px_#1c1c1c]"></div>
                <p class="text-[11px] font-black text-stone-900 uppercase tracking-widest italic">Servidores Online</p>
            </div>
            <p class="text-[9px] font-black text-stone-800 uppercase tracking-widest mt-6 opacity-60 italic italic leading-none">Última Auditoría: Hace 4 min</p>
        </div>
    </div>
  </div>

  <!-- Footer Branding -->
  <div class="py-12 border-t border-stone-50 mt-12 text-center opacity-30 group hover:opacity-100 transition-all duration-700 no-print">
      <p class="text-[9px] font-black text-stone-400 uppercase tracking-[0.5em] mb-2 leading-none">Industrial History Core v6.1 // Enterprise Archive</p>
      <p class="text-[8px] font-bold text-stone-300 uppercase tracking-[0.2em]">Propiedad Intelectual • 2024 • Mayor de Repuesto La Cima</p>
  </div>
@endsection

@push('scripts')
    <script src="{{ asset('erp/js/facturas-emitidas.js') }}"></script>
@endpush
