@extends('erp.layouts.app')

@section('title', 'Auditoría de Almacén')

@section('breadcrumb')
    <a href="{{ url('/erp/inicio') }}" class="hover:text-stone-900 transition-colors">ERP</a>
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <a href="{{ url('/erp/inventario') }}" class="hover:text-stone-900 transition-colors">Inventario</a>
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <span class="text-stone-900">Auditoría de Almacén</span>
@endsection

@section('content')
    <!-- Page Header: Strategic Inventory Balancing -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6 mb-10 pb-8 border-b border-stone-100">
        <div>
            <div class="flex items-center gap-2 mb-2">
                <span class="w-8 h-[2px] bg-primary"></span>
                <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em]">Conteo Ciego y Conciliación Fiscal</p>
            </div>
            <h1 class="text-5xl font-headline font-black text-stone-900 tracking-tighter uppercase leading-none">Auditoría de <span class="text-stone-400">Almacén</span></h1>
            <p class="text-xs text-stone-400 mt-2 font-medium uppercase tracking-widest text-[#9ca3af]">MAYOR DE REPUESTO LA CIMA, C.A. • RIF: J-40308741-5</p>
        </div>
        <div class="flex gap-3">
             <button class="bg-white border border-stone-200 text-stone-900 px-8 py-4 text-[10px] font-black uppercase tracking-widest flex items-center gap-3 hover:border-primary transition-all rounded-xl shadow-sm">
                <span class="material-symbols-outlined text-lg">download</span>
                Exportar Reporte
            </button>
            <button class="bg-stone-900 text-primary px-10 py-4 text-[10px] font-black uppercase tracking-[0.2em] rounded-xl shadow-xl hover:bg-black transition-all active:scale-95 group/btn">
                Sincronizar Stock Real
                <span class="material-symbols-outlined text-[16px] ml-2 inline-block group-hover:rotate-12 transition-transform">sync_alt</span>
            </button>
        </div>
    </div>

    <!-- Interface Bento Grid -->
    <div class="grid grid-cols-12 gap-8 mb-12">
        <!-- Sidebar Controls (4 cols) -->
        <div class="col-span-12 lg:col-span-4 space-y-8">
            <section class="bg-white border border-stone-200 p-10 rounded-[32px] shadow-sm relative overflow-hidden group">
                <h3 class="text-[10px] font-black text-stone-400 uppercase tracking-[0.2em] mb-8">Parámetros de Auditoría</h3>
                
                <div class="space-y-6">
                    <div class="space-y-3">
                        <label class="block text-[10px] font-black text-stone-400 uppercase tracking-widest">Zona / Pasillo de Almacén</label>
                        <div class="relative group">
                            <select class="w-full bg-stone-50 border-none rounded-xl py-4 px-5 text-sm font-bold text-stone-900 focus:ring-4 focus:ring-primary/10 transition-all appearance-none cursor-pointer">
                                <option>PASILLO A - MOTOR & TRANSMISIÓN</option>
                                <option>PASILLO B - SISTEMA DE FRENOS</option>
                                <option>PASILLO C - CARROCERÍA & LUCES</option>
                            </select>
                            <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-stone-400 pointer-events-none group-hover:text-primary transition-colors">expand_more</span>
                        </div>
                    </div>

                    <button class="w-full bg-stone-900 text-primary py-5 rounded-2xl font-black text-[10px] uppercase tracking-[0.2em] hover:bg-black transition-all shadow-xl">
                        Iniciar Sesión de Conteo
                    </button>
                </div>
            </section>

            <section class="bg-stone-950 p-10 rounded-[32px] shadow-2xl relative overflow-hidden group/progress">
                <div class="absolute -right-10 -top-10 w-40 h-40 bg-primary/10 blur-[80px] rounded-full"></div>
                <h3 class="text-[10px] font-black text-primary uppercase tracking-[0.3em] mb-8">Estatus del Conteo</h3>
                
                <div class="flex justify-between items-end mb-4">
                    <span class="text-5xl font-headline font-black text-white italic tracking-tighter">42/120</span>
                    <span class="text-[10px] text-stone-500 font-bold uppercase tracking-widest mb-1 italic text-primary">Repuestos</span>
                </div>
                
                <div class="w-full bg-white/5 h-2 rounded-full overflow-hidden mb-8">
                    <div class="bg-primary h-full w-[35%] shadow-[0_0_15px_rgba(206,255,94,0.5)] transition-all duration-1000"></div>
                </div>

                <div class="flex items-center gap-4 py-4 border-t border-white/5">
                    <span class="material-symbols-outlined text-primary text-xl">verified</span>
                    <p class="text-[10px] text-stone-400 font-bold uppercase leading-tight">Protocolo de Integridad Activo <br> <span class="text-white/40 tracking-widest">MD5 Secured</span></p>
                </div>
            </section>
        </div>

        <!-- Audit Table (8 cols) -->
        <div class="col-span-12 lg:col-span-8 bg-white border border-stone-200 rounded-[32px] shadow-sm overflow-hidden flex flex-col">
            <div class="p-8 border-b border-stone-50 flex justify-between items-center bg-stone-50/30">
                <h3 class="text-[10px] font-black text-stone-900 uppercase tracking-[0.2em]">Hoja de Trabajo: Conteo Ciego</h3>
                <div class="flex items-center gap-3 bg-red-50 text-red-600 px-4 py-2 rounded-xl text-[10px] font-black uppercase tracking-widest animate-pulse">
                    <span class="material-symbols-outlined text-sm">report_problem</span>
                    3 Variaciones Críticas
                </div>
            </div>

            <div class="flex-1 overflow-x-auto custom-scrollbar">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="text-[10px] font-black text-stone-400 uppercase tracking-widest border-b border-stone-100">
                            <th class="p-6">Identificador SKU</th>
                            <th class="p-6 text-center">Teórico</th>
                            <th class="p-6 w-40">Físico (Conteo)</th>
                            <th class="p-6 text-right">Diferencia</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-stone-50 text-xs font-body">
                        <tr class="hover:bg-stone-50/80 transition-colors group">
                            <td class="p-6">
                                <span class="font-black text-stone-900 block mb-1">KIT-3422-MX</span>
                                <span class="text-[9px] text-stone-400 font-bold uppercase tracking-widest">Bomba de Agua Toyota Hilux</span>
                            </td>
                            <td class="p-6 text-center font-black text-stone-300">24 UND</td>
                            <td class="p-6">
                                <div class="relative">
                                    <input class="w-full bg-stone-100 border-none rounded-xl font-black text-center py-3 text-stone-900 focus:ring-4 focus:ring-primary/20 transition-all placeholder:text-stone-300" type="number" value="18"/>
                                    <span class="absolute right-3 top-1/2 -translate-y-1/2 text-[10px] font-black text-stone-400">u</span>
                                </div>
                            </td>
                            <td class="p-6 text-right">
                                <span class="px-3 py-1 bg-red-50 text-red-600 rounded-lg font-black text-[10px] uppercase shadow-sm">- 6</span>
                            </td>
                        </tr>
                        <tr class="hover:bg-stone-50/80 transition-colors group">
                            <td class="p-6">
                                <span class="font-black text-stone-900 block mb-1">FILT-900-OIL</span>
                                <span class="text-[9px] text-stone-400 font-bold uppercase tracking-widest">Filtro de Aceite Premium Master</span>
                            </td>
                            <td class="p-6 text-center font-black text-stone-300">150 UND</td>
                            <td class="p-6">
                                <div class="relative">
                                    <input class="w-full bg-stone-100 border-none rounded-xl font-black text-center py-3 text-stone-900 focus:ring-4 focus:ring-primary/20 transition-all" type="number" value="150"/>
                                </div>
                            </td>
                            <td class="p-6 text-right">
                                <span class="px-3 py-1 bg-stone-50 text-stone-400 rounded-lg font-black text-[10px] uppercase italic">0</span>
                            </td>
                        </tr>
                        <tr class="hover:bg-primary/5 transition-colors group">
                            <td class="p-6">
                                <span class="font-black text-stone-900 block mb-1 font-headline tracking-tight italic">ESCANEANDO...</span>
                                <span class="text-[9px] text-stone-400 font-bold uppercase tracking-widest italic group-hover:text-primary transition-colors line-clamp-1">Procesando código de barras industrial...</span>
                            </td>
                            <td class="p-6 text-center font-black text-stone-300 italic">--</td>
                            <td class="p-6">
                                <div class="w-full h-10 bg-stone-50 rounded-xl overflow-hidden relative">
                                    <div class="absolute inset-0 bg-primary opacity-20 animate-[pulse_1.5s_infinite]"></div>
                                    <div class="absolute h-[1px] w-full bg-primary top-1/2 -translate-y-1/2 animate-[bounce_2s_infinite]"></div>
                                </div>
                            </td>
                            <td class="p-6 text-right italic text-stone-300">Pending</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <div class="p-8 bg-stone-50/50 flex justify-end gap-4 border-t border-stone-50">
                <button class="px-8 py-3 text-[10px] font-black text-stone-400 uppercase tracking-widest hover:text-stone-600 transition-colors">Guardar Borrador</button>
                <button class="px-10 py-3 bg-stone-900 text-primary rounded-xl font-black text-[10px] uppercase tracking-widest shadow-lg hover:bg-black transition-all">Finalizar Auditoría</button>
            </div>
        </div>
    </div>

    <!-- Telemetry Insights Footer: Global Consistency -->
    <div class="relative bg-stone-900 p-10 md:p-16 rounded-[40px] overflow-hidden shadow-[0_35px_60px_-15px_rgba(0,0,0,0.3)] group/footer mb-12">
        <div class="absolute -right-20 top-0 opacity-10 select-none pointer-events-none transform group-hover/footer:rotate-12 transition-transform duration-1000">
            <span class="text-[20rem] font-black leading-none font-headline tracking-tighter text-white uppercase italic">CIMA</span>
        </div>
        
        <div class="relative z-10 grid grid-cols-1 md:grid-cols-3 gap-16 items-center">
            <div>
                <div class="w-12 h-12 bg-primary rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-primary/20">
                    <span class="material-symbols-outlined text-stone-900 text-2xl font-black">qr_code_scanner</span>
                </div>
                <h2 class="text-4xl font-headline font-black text-white uppercase tracking-tight mb-6 leading-none">Integridad de <br> <span class="text-primary tracking-widest">Existencias</span></h2>
                <p class="text-xs text-stone-400 leading-relaxed font-bold uppercase tracking-wider font-body">Todo proceso de auditoría es validado mediante firma digital y sellado industrial para garantizar la transparencia legal.</p>
            </div>
            
            <div class="md:col-span-2 grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="bg-white/5 backdrop-blur-xl border border-white/5 p-8 rounded-2xl group/card hover:bg-primary transition-all duration-500 cursor-pointer shadow-2xl">
                    <div class="flex justify-between items-start mb-6">
                        <span class="text-[10px] font-black text-stone-500 group-hover/card:text-stone-900 uppercase tracking-widest">Seguridad</span>
                        <span class="material-symbols-outlined text-stone-500 group-hover/card:text-stone-900">verified_user</span>
                    </div>
                    <p class="text-[10px] font-black group-hover/card:text-stone-900/60 uppercase mb-1">Supervisor Activo</p>
                    <h4 class="text-3xl font-headline font-black text-white group-hover/card:text-stone-900 uppercase">Validado</h4>
                    <div class="mt-4 flex items-center gap-2 group-hover/card:text-stone-900 font-bold text-[10px]">
                        <span class="w-1.5 h-1.5 bg-primary group-hover/card:bg-stone-900 rounded-full"></span>
                        Token AES-256
                    </div>
                </div>
                
                <div class="bg-white/5 backdrop-blur-xl border border-white/5 p-8 rounded-2xl group/card hover:bg-white transition-all duration-500 cursor-pointer shadow-2xl">
                    <div class="flex justify-between items-start mb-6">
                        <span class="text-[10px] font-black text-stone-500 group-hover/card:text-stone-400 uppercase tracking-widest">Sincronización</span>
                        <span class="material-symbols-outlined text-primary group-hover/card:text-primary">terminal</span>
                    </div>
                    <p class="text-[10px] font-black group-hover/card:text-stone-400 uppercase mb-1">Cruce ERP/Físico</p>
                    <h4 class="text-3xl font-headline font-black text-white group-hover/card:text-stone-900 uppercase">Activo</h4>
                    <div class="mt-4 flex items-center gap-2 text-stone-400 font-bold text-[10px]">
                        <span class="w-1.5 h-1.5 bg-primary rounded-full animate-pulse"></span>
                        Ready to Sync
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
