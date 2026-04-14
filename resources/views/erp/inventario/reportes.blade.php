@extends('erp.layouts.app')

@section('title', 'Centro de Reportes')

@section('breadcrumb')
    <a href="{{ url('/erp/inicio') }}" class="hover:text-stone-900 transition-colors">ERP</a>
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <a href="{{ url('/erp/inventario') }}" class="hover:text-stone-900 transition-colors">Inventario</a>
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <span class="text-stone-900">Centro de Reportes</span>
@endsection

@section('content')
    <!-- Page Header: Strategic Intelligence -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6 mb-10 pb-8 border-b border-stone-100">
        <div>
            <div class="flex items-center gap-2 mb-2">
                <span class="w-8 h-[2px] bg-primary"></span>
                <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em]">Valuación & Analítica de Stock</p>
            </div>
            <h1 class="text-5xl font-headline font-black text-stone-900 tracking-tighter uppercase leading-none">Centro de <span class="text-stone-400">Reportes</span></h1>
            <p class="text-xs text-stone-400 mt-2 font-medium uppercase tracking-widest text-[#9ca3af]">MAYOR DE REPUESTO LA CIMA, C.A. • RIF: J-40308741-5</p>
        </div>
        <div class="flex gap-3">
             <button class="bg-white border border-stone-200 text-stone-900 px-8 py-4 text-[10px] font-black uppercase tracking-widest flex items-center gap-3 hover:border-primary transition-all rounded-xl shadow-sm">
                <span class="material-symbols-outlined text-lg">picture_as_pdf</span>
                Descargar Historial PDF
            </button>
            <button class="bg-stone-900 text-primary px-10 py-4 text-[10px] font-black uppercase tracking-[0.2em] rounded-xl shadow-xl hover:bg-black transition-all active:scale-95 group/btn">
                Exportar Data Maestra
                <span class="material-symbols-outlined text-[16px] ml-2 inline-block group-hover:rotate-12 transition-transform">table_view</span>
            </button>
        </div>
    </div>

    <!-- Analytics Cards -->
    <div class="grid grid-cols-12 gap-8 mb-12">
        <!-- Main Valuation Card (6 cols) -->
        <div class="col-span-12 lg:col-span-6 bg-stone-950 rounded-[32px] p-10 shadow-2xl relative overflow-hidden group">
            <div class="absolute -right-20 -top-20 w-64 h-64 bg-primary/10 blur-[100px] rounded-full"></div>
            <div class="relative z-10 flex flex-col justify-between h-full">
                <div>
                    <div class="flex items-center gap-3 mb-8">
                        <div class="w-10 h-10 bg-primary/20 rounded-xl flex items-center justify-center">
                            <span class="material-symbols-outlined text-primary text-xl">account_balance_wallet</span>
                        </div>
                        <p class="text-[10px] font-black text-primary uppercase tracking-[0.3em]">Valorización Total Maestro</p>
                    </div>
                    <h3 class="text-6xl font-headline font-black text-white tracking-tighter leading-none mb-4 italic">$4.892.450,00</h3>
                    <p class="text-stone-500 font-bold text-[10px] uppercase tracking-widest">Activo Circulante Bruto en Almacén</p>
                </div>
                <div class="mt-12 flex items-center gap-8 border-t border-white/5 pt-8">
                    <div class="flex items-center gap-3">
                        <span class="material-symbols-outlined text-primary">trending_up</span>
                        <div>
                            <p class="text-[10px] font-black text-white uppercase leading-none">+12.4%</p>
                            <p class="text-[8px] text-stone-500 font-bold uppercase tracking-widest mt-1">Crecimiento Q4</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="absolute right-0 bottom-0 opacity-5 pointer-events-none group-hover:scale-110 transition-transform duration-1000">
                <span class="material-symbols-outlined text-[300px] leading-none">analytics</span>
            </div>
        </div>

        <!-- Secondary Stat Cards (6 cols) -->
        <div class="col-span-12 lg:col-span-6 grid grid-cols-1 sm:grid-cols-2 gap-8">
            <div class="bg-white border border-stone-200 rounded-[32px] p-10 shadow-sm hover:border-red-500 transition-colors group/card">
                <div class="w-12 h-12 bg-red-50 text-red-600 rounded-2xl flex items-center justify-center mb-8 group-hover/card:scale-110 transition-transform">
                    <span class="material-symbols-outlined font-black">warning_amber</span>
                </div>
                <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.2em] mb-2">Stock Crítico</p>
                <h4 class="text-4xl font-headline font-black text-stone-900 italic">18 <span class="text-stone-300">ITEMS</span></h4>
                <div class="mt-8 h-2 w-full bg-stone-100 rounded-full overflow-hidden">
                    <div class="h-full bg-red-500 w-[65%] shadow-[0_0_10px_rgba(239,68,68,0.3)]"></div>
                </div>
                <p class="mt-4 text-[9px] text-red-600 font-black uppercase tracking-widest animate-pulse">Riesgo de Quiebre Detectado</p>
            </div>

            <div class="bg-white border border-stone-200 rounded-[32px] p-10 shadow-sm hover:border-primary transition-colors group/card">
                <div class="w-12 h-12 bg-primary/10 text-stone-900 rounded-2xl flex items-center justify-center mb-8 group-hover/card:rotate-12 transition-transform">
                    <span class="material-symbols-outlined font-black">published_with_changes</span>
                </div>
                <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.2em] mb-2">Rotación Mensual</p>
                <h4 class="text-4xl font-headline font-black text-stone-900 italic">4.2x <span class="text-stone-300">AVG</span></h4>
                <div class="mt-8 flex items-center gap-2">
                    <span class="w-1.5 h-1.5 bg-primary rounded-full"></span>
                    <p class="text-[9px] text-stone-500 font-black uppercase tracking-widest leading-none">Eficiencia Operativa: ÓPTIMA</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Data Table Partition -->
    <div class="bg-white border border-stone-200 rounded-[40px] shadow-sm overflow-hidden mb-12">
        <div class="p-8 border-b border-stone-50 bg-stone-50/30 flex justify-between items-center">
            <h3 class="text-[10px] font-black text-stone-900 uppercase tracking-[0.2em]">Movimientos de Alta Densidad</h3>
            <div class="flex items-center gap-3">
                <select class="text-[10px] font-black border-none bg-stone-100 rounded-xl px-6 py-3 uppercase tracking-widest focus:ring-4 focus:ring-primary/10 transition-all cursor-pointer">
                    <option>FILTRAR POR PERÍODO</option>
                    <option>ÚLTIMOS 30 DÍAS</option>
                    <option>Q4 FISCAL 2025</option>
                </select>
            </div>
        </div>

        <div class="overflow-x-auto custom-scrollbar">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="text-[10px] font-black text-stone-400 uppercase tracking-widest border-b border-stone-100 italic">
                        <th class="p-8">Identificación Global</th>
                        <th class="p-8">Clasificación ABC</th>
                        <th class="p-8">Vector</th>
                        <th class="p-8">Existente</th>
                        <th class="p-8 text-right">Valuación Neta</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-50 text-xs font-body">
                    <tr class="hover:bg-stone-50/80 transition-colors group">
                        <td class="p-8">
                            <span class="font-black text-stone-900 block mb-1">Turbo Compresor G-23</span>
                            <span class="text-[9px] text-stone-400 font-bold uppercase tracking-widest font-mono italic">ID: LC-SKU-992201-AX</span>
                        </td>
                        <td class="p-8">
                            <span class="px-3 py-1 bg-stone-900 text-primary text-[9px] font-black rounded-lg uppercase tracking-widest group-hover:bg-primary group-hover:text-stone-900 transition-colors shadow-sm">Clase A</span>
                        </td>
                        <td class="p-8">
                            <div class="flex items-center gap-2 text-primary font-black text-[10px] uppercase italic">
                                <span class="material-symbols-outlined text-sm">download</span> ENTRADA
                            </div>
                        </td>
                        <td class="p-8 text-stone-900 font-black italic">45 UND</td>
                        <td class="p-8 text-right text-stone-900 font-black text-sm">$12.450,00</td>
                    </tr>
                    <tr class="hover:bg-stone-50/80 transition-colors group border-l-4 border-transparent hover:border-l-primary/40">
                        <td class="p-8">
                            <span class="font-black text-stone-900 block mb-1">Bomba Inyección Diésel</span>
                            <span class="text-[9px] text-stone-400 font-bold uppercase tracking-widest font-mono italic">ID: LC-SKU-440122-BY</span>
                        </td>
                        <td class="p-8">
                            <span class="px-3 py-1 bg-stone-100 text-stone-500 text-[9px] font-black rounded-lg uppercase tracking-widest shadow-sm">Clase B</span>
                        </td>
                        <td class="p-8">
                            <div class="flex items-center gap-2 text-stone-300 font-black text-[10px] uppercase italic">
                                <span class="material-symbols-outlined text-sm">upload</span> SALIDA
                            </div>
                        </td>
                        <td class="p-8 text-stone-900 font-black italic">12 UND</td>
                        <td class="p-8 text-right text-stone-900 font-black text-sm">$8.900,00</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="p-8 bg-stone-50/50 flex justify-between items-center border-t border-stone-50">
            <p class="text-[9px] font-black text-stone-400 uppercase tracking-[0.2em] italic">Auditoría de consistencia generada en tiempo real para: MAYOR DE REPUESTO LA CIMA, C.A.</p>
            <div class="flex gap-2">
                <button class="w-10 h-10 bg-white border border-stone-200 rounded-xl flex items-center justify-center text-stone-300 hover:text-stone-900 hover:border-primary transition-all">
                    <span class="material-symbols-outlined">chevron_left</span>
                </button>
                <button class="w-10 h-10 bg-stone-900 text-primary rounded-xl flex items-center justify-center text-[10px] font-black shadow-lg">01</button>
                <button class="w-10 h-10 bg-white border border-stone-200 rounded-xl flex items-center justify-center text-stone-300 hover:text-stone-900 hover:border-primary transition-all">
                    <span class="material-symbols-outlined">chevron_right</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Telemetry Insights Footer: Intelligence Protocol -->
    <div class="relative bg-stone-950 p-10 md:p-16 rounded-[40px] overflow-hidden shadow-[0_35px_60px_-15px_rgba(0,0,0,0.5)] group/footer mb-8">
        <div class="absolute -right-20 top-0 opacity-10 select-none pointer-events-none transform group-hover/footer:rotate-12 transition-transform duration-1000">
            <span class="text-[20rem] font-black leading-none font-headline tracking-tighter text-white uppercase italic">DATA</span>
        </div>
        
        <div class="relative z-10 grid grid-cols-1 md:grid-cols-3 gap-16 items-center">
            <div>
                <div class="w-12 h-12 bg-primary rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-primary/20">
                    <span class="material-symbols-outlined text-stone-900 text-2xl font-black">analytics</span>
                </div>
                <h2 class="text-4xl font-headline font-black text-white uppercase tracking-tight mb-6 leading-none italic">Análisis Forense <br> <span class="text-primary tracking-widest font-normal">de Stock</span></h2>
                <p class="text-[10px] text-stone-500 leading-relaxed font-black uppercase tracking-widest font-body">Este centro de reportes consolida la inteligencia de inventario bajo normativas internacionales de auditoría contable.</p>
            </div>
            
            <div class="md:col-span-2 grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div class="bg-white/5 backdrop-blur-xl border border-white/5 p-8 rounded-[28px] group/card hover:bg-primary transition-all duration-500 cursor-pointer shadow-2xl overflow-hidden relative">
                     <div class="absolute -right-4 -bottom-4 opacity-5 group-hover/card:opacity-20 transition-opacity">
                         <span class="material-symbols-outlined text-[100px] text-stone-900">verified</span>
                     </div>
                    <div class="flex justify-between items-start mb-6">
                        <span class="text-[10px] font-black text-stone-500 group-hover/card:text-stone-900 uppercase tracking-widest">Compliance</span>
                        <span class="material-symbols-outlined text-stone-500 group-hover:text-stone-900">policy</span>
                    </div>
                    <p class="text-[10px] font-black group-hover/card:text-stone-900/60 uppercase mb-1">Fiscal Integrity</p>
                    <h4 class="text-3xl font-headline font-black text-white group-hover/card:text-stone-900 uppercase">Certificado</h4>
                    <div class="mt-4 flex items-center gap-2 group-hover/card:text-stone-900 font-black text-[9px] uppercase tracking-widest">
                        <span class="w-1.5 h-1.5 bg-primary group-hover/card:bg-stone-900 rounded-full"></span>
                        Art. 177 LISLR
                    </div>
                </div>
                
                <div class="bg-white/5 backdrop-blur-xl border border-white/5 p-8 rounded-[28px] group/card hover:bg-stone-900 transition-all duration-500 cursor-pointer shadow-2xl relative">
                    <div class="flex justify-between items-start mb-6">
                        <span class="text-[10px] font-black text-stone-500 group-hover/card:text-primary uppercase tracking-widest">Sincronicidad</span>
                        <span class="material-symbols-outlined text-primary">dynamic_feed</span>
                    </div>
                    <p class="text-[10px] font-black group-hover/card:text-stone-500 uppercase mb-1">Latencia Maestra</p>
                    <h4 class="text-3xl font-headline font-black text-white group-hover/card:text-primary uppercase">0.4ms <span class="text-xs italic text-stone-600">RT</span></h4>
                    <div class="mt-4 flex items-center gap-2 text-stone-400 font-bold text-[9px] uppercase tracking-[0.2em]">
                        <span class="w-1.5 h-1.5 bg-primary rounded-full animate-ping"></span>
                        Live Telemetry
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
