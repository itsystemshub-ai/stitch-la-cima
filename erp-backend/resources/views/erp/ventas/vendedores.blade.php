@extends('erp.layouts.app')

@section('title', 'Equipo de Vendedores | ERP La Cima')

@section('breadcrumb')
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <a href="{{ url('/erp/ventas') }}" class="hover:text-stone-900 transition-colors">Ventas</a>
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <span class="text-stone-900">Equipo de Vendedores</span>
@endsection

@section('content')
  <!-- Team Header -->
  <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6 mb-12">
    <div class="space-y-1">
      <div class="flex items-center gap-2">
        <span class="w-2 h-6 bg-primary rounded-full shadow-[0_0_15px_#ceff5e]"></span>
        <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em]">Capital Humano Estratégico</p>
      </div>
      <h2 class="text-4xl font-headline font-black text-stone-900 tracking-tight leading-none italic uppercase">Fuerza de <span class="text-primary-dim">Ventas</span></h2>
    </div>
    
    <div class="flex items-center gap-3">
        <button class="bg-stone-50 border border-stone-100 px-6 py-3 rounded-xl text-[10px] font-black uppercase tracking-widest text-stone-600 hover:text-stone-900 transition-all flex items-center gap-2 italic">
            <span class="material-symbols-outlined text-sm">group_add</span> Nuevo Vendedor
        </button>
        <button class="bg-stone-900 px-6 py-3 rounded-xl text-[10px] font-black uppercase tracking-widest text-primary hover:text-white transition-all flex items-center gap-2 italic">
            <span class="material-symbols-outlined text-sm">query_stats</span> Comisiones Mes
        </button>
    </div>
  </div>

  <div class="grid grid-cols-12 gap-8 mb-12">
    <!-- Registration Form -->
    <div class="col-span-12 lg:col-span-4 space-y-8">
        <div class="bg-white rounded-[32px] p-8 border border-stone-100 shadow-sm relative group overflow-hidden">
            <div class="absolute -right-4 -top-4 w-24 h-24 bg-primary/5 rounded-full blur-2xl"></div>
            <h3 class="text-[10px] font-black text-stone-400 uppercase tracking-[0.2em] mb-8 italic">Registro de Representante</h3>
            
            <form class="space-y-6">
                <div class="space-y-2">
                    <label class="text-[9px] font-black text-stone-400 uppercase tracking-widest ml-1 italic">Nombre Completo</label>
                    <input type="text" placeholder="E.G. RICARDO MENDOZA" class="w-full bg-stone-50 border-stone-100 text-[11px] font-bold py-4 px-6 rounded-2xl focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all uppercase tracking-widest outline-none italic">
                </div>
                
                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label class="text-[9px] font-black text-stone-400 uppercase tracking-widest ml-1 italic">Cédula / RIF</label>
                        <input type="text" placeholder="V-00.000.000" class="w-full bg-stone-50 border-stone-100 text-[11px] font-bold py-4 px-6 rounded-2xl focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all uppercase tracking-widest outline-none">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[9px] font-black text-stone-400 uppercase tracking-widest ml-1 italic">% Comisión</label>
                        <div class="relative">
                            <input type="text" placeholder="5.0" class="w-full bg-stone-50 border-stone-100 text-[11px] font-bold py-4 px-6 rounded-2xl focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all uppercase tracking-widest outline-none pr-10">
                            <span class="absolute right-4 top-4 text-stone-300 font-black italic">%</span>
                        </div>
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="text-[9px] font-black text-stone-400 uppercase tracking-widest ml-1 italic">Zona Geográfica</label>
                    <select class="w-full bg-stone-50 border-stone-100 text-[11px] font-bold py-4 px-6 rounded-2xl focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all uppercase tracking-widest outline-none italic appearance-none">
                        <option>Región Central</option>
                        <option>Región Occidente</option>
                        <option>Región Oriente</option>
                    </select>
                </div>

                <div class="pt-4">
                    <button class="w-full bg-primary py-4 rounded-2xl text-[10px] font-black uppercase tracking-widest text-stone-900 shadow-lg shadow-primary/20 hover:scale-[1.02] transition-all italic">
                        Vincular Profesional
                    </button>
                </div>
            </form>
        </div>

        <!-- Metric Accent -->
        <div class="bg-stone-900 rounded-[32px] p-8 border border-primary/20 relative overflow-hidden group">
            <div class="absolute inset-0 opacity-10" style="background-image: repeating-linear-gradient(45deg, #ceff5e 0, #ceff5e 1px, transparent 0, transparent 50%); background-size: 8px 8px;"></div>
            <div class="relative z-10">
                <p class="text-[10px] font-black text-stone-500 uppercase tracking-widest mb-1 italic">Meta Global Q3</p>
                <div class="flex items-baseline gap-2 mb-6">
                    <p class="text-3xl font-headline font-black text-primary tracking-tighter">$ 450.000</p>
                    <span class="text-[9px] font-black text-stone-600 uppercase">Proyectado</span>
                </div>
                <div class="w-full h-1.5 bg-stone-800 rounded-full overflow-hidden">
                    <div class="h-full bg-primary w-[65%] shadow-[0_0_10px_#ceff5e]"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Vendedores Table -->
    <div class="col-span-12 lg:col-span-8 bg-white rounded-[40px] border border-stone-100 shadow-xl overflow-hidden min-h-[600px]">
        <div class="p-8 border-b border-stone-50 flex justify-between items-center bg-stone-50/30">
            <h3 class="text-[11px] font-black text-stone-900 uppercase tracking-widest italic">Personal Activo</h3>
            <div class="flex gap-2">
                <button class="w-10 h-10 flex items-center justify-center rounded-xl bg-white border border-stone-100 text-stone-400 hover:text-stone-900 transition-all">
                    <span class="material-symbols-outlined text-lg">filter_list</span>
                </button>
                <button class="w-10 h-10 flex items-center justify-center rounded-xl bg-white border border-stone-100 text-stone-400 hover:text-stone-900 transition-all">
                    <span class="material-symbols-outlined text-lg">file_download</span>
                </button>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="text-[9px] font-black uppercase tracking-[0.2em] text-stone-400 border-b border-stone-50">
                        <th class="py-6 px-10">Identificación</th>
                        <th class="py-6 px-10">Región</th>
                        <th class="py-6 px-10 text-center">% Com.</th>
                        <th class="py-6 px-10 text-center">Cartera</th>
                        <th class="py-6 px-10 text-right">Rendimiento Mes</th>
                    </tr>
                </thead>
                <tbody class="text-[11px] font-bold text-stone-700 uppercase">
                    <tr class="border-b border-stone-50 hover:bg-stone-50/50 transition-all group">
                        <td class="py-6 px-10">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 bg-stone-900 rounded-xl flex items-center justify-center text-primary font-black italic shadow-lg">RM</div>
                                <div>
                                    <p class="text-stone-900 font-black tracking-tight italic">Ricardo Mendoza</p>
                                    <p class="text-[8px] text-stone-400 mt-1 uppercase tracking-widest font-sans font-bold">V-14.822.391</p>
                                </div>
                            </div>
                        </td>
                        <td class="py-6 px-10 italic">Región Central</td>
                        <td class="py-6 px-10 text-center font-black italic">8.5%</td>
                        <td class="py-6 px-10 text-center">
                            <span class="px-3 py-1 bg-stone-100 text-stone-600 rounded-lg text-[8px] font-black uppercase tracking-widest">142 Clientes</span>
                        </td>
                        <td class="py-6 px-10">
                            <div class="flex flex-col items-end gap-2">
                                <div class="w-32 h-1.5 bg-stone-100 rounded-full overflow-hidden">
                                    <div class="h-full bg-primary w-[82%]"></div>
                                </div>
                                <span class="text-[9px] font-black text-stone-900 italic tracking-widest">82% Alcance</span>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
  </div>

  <!-- Compliance Footer -->
  <div class="grid grid-cols-12 gap-8 mb-12">
    <div class="col-span-12 lg:col-span-8 bg-stone-50 rounded-[40px] p-10 border border-stone-100 flex flex-col md:flex-row items-center gap-10 italic">
        <div class="w-24 h-24 bg-white rounded-[32px] border border-stone-200 flex items-center justify-center text-stone-300 italic shadow-sm group hover:border-primary transition-all duration-700">
            <span class="material-symbols-outlined text-4xl group-hover:text-primary transition-all">verified_user</span>
        </div>
        <div class="space-y-4 text-center md:text-left">
            <h4 class="text-lg font-headline font-black text-stone-900 uppercase tracking-tight italic">MARCO PROTECTOR E IDENTIDAD CORPORATIVA</h4>
            <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em] leading-loose max-w-lg">Gestión centralizada del equipo humano de MAYOR DE REPUESTO LA CIMA, C.A. <br>RIF: J-40308741-5 • Valencia, Venezuela.</p>
        </div>
    </div>
    
    <div class="col-span-12 lg:col-span-4 bg-stone-900 rounded-[40px] p-10 relative overflow-hidden group flex flex-col justify-between italic">
        <div class="absolute inset-0 bg-primary opacity-0 group-hover:opacity-5 transition-all duration-1000"></div>
        <h4 class="text-[10px] font-black text-stone-500 uppercase tracking-[0.3em] italic mb-4">Estatus Administrativo</h4>
        <div class="flex items-center gap-4 py-4 bg-white/5 rounded-2xl px-6 border border-white/10 backdrop-blur-sm">
            <div class="w-3 h-3 bg-primary rounded-full animate-pulse shadow-[0_0_10px_#ceff5e]"></div>
            <p class="text-[11px] font-black text-white uppercase tracking-widest italic">Nómina Comisiones On-line</p>
        </div>
        <p class="text-[9px] font-black text-stone-700 uppercase tracking-widest mt-6 italic">Core Management v2.1.0</p>
    </div>
  </div>
@endsection

@push('scripts')
    <script src="{{ asset('erp/js/vendedores.js') }}"></script>
@endpush
