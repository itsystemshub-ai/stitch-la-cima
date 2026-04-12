@extends('erp.layouts.app')

@section('title', 'Estado del Sistema | Zenith ERP')

@section('breadcrumb')
    <span class="material-symbols-outlined text-sm text-stone-400">chevron_right</span>
    <a href="{{ url('/erp/configuracion') }}" class="hover:text-stone-900">Configuración</a>
    <span class="material-symbols-outlined text-sm text-stone-400">chevron_right</span>
    <span class="text-stone-900 font-medium">Estado del Sistema</span>
@endsection

@section('content')
<section class="space-y-6">
    <!-- Hero Status -->
    <div class="relative overflow-hidden bg-stone-900 p-8 rounded-2xl border-l-4 border-primary shadow-xl">
        <div class="absolute top-0 right-0 p-8 opacity-10">
            <span class="material-symbols-outlined text-[100px] text-white">power_settings_new</span>
        </div>
        <div class="relative z-10">
            <p class="text-[10px] font-black uppercase tracking-[0.3em] text-primary mb-2">Operational Health Indicator</p>
            <h2 class="font-headline text-4xl font-black uppercase tracking-tighter text-white">
                Sistemas: <span class="text-primary">Nominal</span>
            </h2>
            <div class="flex flex-wrap items-center gap-8 mt-6">
                <div>
                    <span class="block text-[9px] uppercase tracking-widest text-stone-500 mb-1">Uptime (30d)</span>
                    <span class="font-headline text-2xl font-bold text-white">99.98%</span>
                </div>
                <div class="w-px h-10 bg-stone-800 hidden sm:block"></div>
                <div>
                    <span class="block text-[9px] uppercase tracking-widest text-stone-500 mb-1">Latencia Promedio</span>
                    <span class="font-headline text-2xl font-bold text-white">42ms</span>
                </div>
                <div class="ml-auto">
                    <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-3 px-6 rounded-xl flex items-center gap-3 transition-all active:scale-95 group shadow-lg shadow-red-500/20">
                        <span class="material-symbols-outlined group-hover:rotate-12 transition-transform">report_problem</span>
                        <span class="uppercase tracking-widest text-[10px]">Reportar Incidencia</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Live Performance Visualizer -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 bg-white p-6 rounded-2xl border border-stone-200 shadow-sm">
            <div class="flex justify-between items-end mb-6">
                <div>
                    <h3 class="font-headline text-xl font-black uppercase tracking-tight text-stone-900">Tráfico de Red</h3>
                    <p class="text-[10px] text-stone-400 font-bold uppercase tracking-widest">Actividad en tiempo real (req/s)</p>
                </div>
                <div class="flex items-center gap-2">
                    <span class="w-3 h-3 rounded-full bg-primary animate-pulse"></span>
                    <span class="text-[10px] font-black text-stone-900 uppercase">Live</span>
                </div>
            </div>
            
            <div class="h-[200px] flex items-end gap-1.5 px-2">
                <div class="flex-1 bg-stone-100 h-[20%] rounded-t-sm"></div>
                <div class="flex-1 bg-stone-100 h-[35%] rounded-t-sm"></div>
                <div class="flex-1 bg-stone-100 h-[45%] rounded-t-sm"></div>
                <div class="flex-1 bg-stone-100 h-[30%] rounded-t-sm"></div>
                <div class="flex-1 bg-stone-100 h-[60%] rounded-t-sm"></div>
                <div class="flex-1 bg-primary h-[85%] rounded-t-sm"></div>
                <div class="flex-1 bg-primary h-[95%] rounded-t-sm shadow-[0_-4px_10px_rgba(206,255,94,0.3)]"></div>
                <div class="flex-1 bg-primary h-[75%] rounded-t-sm"></div>
                <div class="flex-1 bg-stone-100 h-[40%] rounded-t-sm"></div>
                <div class="flex-1 bg-stone-100 h-[25%] rounded-t-sm"></div>
                <div class="flex-1 bg-stone-100 h-[35%] rounded-t-sm"></div>
                <div class="flex-1 bg-stone-100 h-[50%] rounded-t-sm"></div>
                <div class="flex-1 bg-stone-100 h-[30%] rounded-t-sm"></div>
                <div class="flex-1 bg-stone-100 h-[20%] rounded-t-sm"></div>
            </div>
            
            <div class="flex justify-between items-center pt-6 mt-4 border-t border-stone-100">
                <div class="flex gap-8">
                    <div>
                        <p class="text-[9px] font-bold uppercase tracking-widest text-stone-400">Carga Actual</p>
                        <p class="font-headline text-lg font-bold text-stone-900">342 req/s</p>
                    </div>
                    <div>
                        <p class="text-[9px] font-bold uppercase tracking-widest text-stone-400">Pico Máximo</p>
                        <p class="font-headline text-lg font-bold text-stone-900">842 req/s</p>
                    </div>
                </div>
                <button class="text-primary hover:text-stone-900 transition-colors uppercase text-[10px] font-black tracking-widest border-b-2 border-primary pb-0.5">Ver Logs de Red</button>
            </div>
        </div>

        <!-- Resource Usage -->
        <div class="bg-white p-6 rounded-2xl border border-stone-200 shadow-sm flex flex-col justify-between">
            <h3 class="font-headline text-lg font-black uppercase tracking-tight text-stone-900 mb-6">Recursos del Servidor</h3>
            
            <div class="space-y-6">
                <div>
                    <div class="flex justify-between text-[10px] font-black uppercase tracking-widest mb-1">
                        <span>CPU Usage</span>
                        <span>42%</span>
                    </div>
                    <div class="h-2 bg-stone-100 rounded-full overflow-hidden">
                        <div class="h-full bg-primary w-[42%]"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between text-[10px] font-black uppercase tracking-widest mb-1">
                        <span>RAM (16GB)</span>
                        <span>6.8GB</span>
                    </div>
                    <div class="h-2 bg-stone-100 rounded-full overflow-hidden">
                        <div class="h-full bg-stone-900 w-[45%]"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between text-[10px] font-black uppercase tracking-widest mb-1">
                        <span>Storage (SSD)</span>
                        <span>78%</span>
                    </div>
                    <div class="h-2 bg-stone-100 rounded-full overflow-hidden">
                        <div class="h-full bg-amber-500 w-[78%]"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between text-[10px] font-black uppercase tracking-widest mb-1">
                        <span>Database Pool</span>
                        <span>12/100</span>
                    </div>
                    <div class="h-2 bg-stone-100 rounded-full overflow-hidden">
                        <div class="h-full bg-lime-500 w-[12%]"></div>
                    </div>
                </div>
            </div>
            
            <button class="mt-8 w-full py-3 bg-stone-50 text-stone-600 rounded-xl text-[10px] font-black uppercase tracking-widest hover:bg-stone-100 transition-all border border-stone-200">Ejecutar Diagnóstico Completo</button>
        </div>
    </div>

    <!-- Bento Status Grid -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <!-- Module: Inventory -->
        <div class="group bg-white p-6 rounded-2xl border border-stone-200 hover:border-primary transition-all shadow-sm">
            <div class="flex justify-between items-start mb-6">
                <div class="w-10 h-10 bg-stone-50 rounded-lg flex items-center justify-center group-hover:bg-primary/10 transition-colors">
                    <span class="material-symbols-outlined text-stone-400 group-hover:text-primary transition-colors">inventory_2</span>
                </div>
                <div class="h-2 w-2 rounded-full bg-primary animate-pulse"></div>
            </div>
            <h3 class="text-sm font-bold text-stone-900 uppercase tracking-tight">Inventario</h3>
            <p class="text-[9px] text-stone-400 font-bold uppercase tracking-widest">Sincronizado: 2m atrás</p>
        </div>

        <!-- Module: Sales -->
        <div class="group bg-white p-6 rounded-2xl border border-stone-200 hover:border-primary transition-all shadow-sm">
            <div class="flex justify-between items-start mb-6">
                <div class="w-10 h-10 bg-stone-50 rounded-lg flex items-center justify-center">
                    <span class="material-symbols-outlined text-stone-400">point_of_sale</span>
                </div>
                <div class="h-2 w-2 rounded-full bg-primary"></div>
            </div>
            <h3 class="text-sm font-bold text-stone-900 uppercase tracking-tight">Ventas</h3>
            <p class="text-[9px] text-stone-400 font-bold uppercase tracking-widest">Transacciones en vivo</p>
        </div>

        <!-- Module: Logistics (Maintenance) -->
        <div class="group bg-white p-6 rounded-2xl border-b-4 border-amber-500 shadow-sm">
            <div class="flex justify-between items-start mb-6">
                <div class="w-10 h-10 bg-amber-50 rounded-lg flex items-center justify-center">
                    <span class="material-symbols-outlined text-amber-500">local_shipping</span>
                </div>
                <div class="h-2 w-2 rounded-full bg-amber-500"></div>
            </div>
            <h3 class="text-sm font-bold text-stone-900 uppercase tracking-tight">Logística</h3>
            <p class="text-[9px] text-amber-500 font-bold uppercase tracking-widest">Latencia detectada</p>
        </div>

        <!-- Module: Finance -->
        <div class="group bg-white p-6 rounded-2xl border border-stone-200 hover:border-primary transition-all shadow-sm">
            <div class="flex justify-between items-start mb-6">
                <div class="w-10 h-10 bg-stone-50 rounded-lg flex items-center justify-center">
                    <span class="material-symbols-outlined text-stone-400 transition-colors">payments</span>
                </div>
                <div class="h-2 w-2 rounded-full bg-primary"></div>
            </div>
            <h3 class="text-sm font-bold text-stone-900 uppercase tracking-tight">Finanzas</h3>
            <p class="text-[9px] text-stone-400 font-bold uppercase tracking-widest">Ledger verificado</p>
        </div>
    </div>

    <!-- Maintenance History -->
    <div class="bg-white rounded-2xl border border-stone-200 shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-stone-100 bg-stone-50/50 flex justify-between items-center">
            <h3 class="font-headline text-lg font-black uppercase tracking-tight text-stone-900">Historial de Mantenimiento</h3>
            <span class="text-[9px] font-black text-stone-400 uppercase tracking-[0.2em]">Audit Trail v2.4</span>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left font-body">
                <thead>
                    <tr class="bg-white">
                        <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-stone-400">Fecha/Hora</th>
                        <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-stone-400">Sistema</th>
                        <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-stone-400">Acción</th>
                        <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-stone-400">Técnico</th>
                        <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-stone-400 text-right">Estado</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-100">
                    <tr class="hover:bg-stone-50/50 transition-colors">
                        <td class="px-6 py-4 text-xs text-stone-500">2023-10-24 04:00</td>
                        <td class="px-6 py-4 text-xs text-stone-900 font-bold uppercase">Main DB Cluster</td>
                        <td class="px-6 py-4 text-xs text-stone-600 italic">Optimización programada</td>
                        <td class="px-6 py-4 text-xs text-stone-500 font-mono">SYS-ADM-01</td>
                        <td class="px-6 py-4 text-right">
                            <span class="px-2 py-1 bg-lime-100 text-lime-700 text-[9px] font-black uppercase rounded-md tracking-widest">Éxito</span>
                        </td>
                    </tr>
                    <tr class="hover:bg-stone-50/50 transition-colors">
                        <td class="px-6 py-4 text-xs text-stone-500">2023-10-22 18:15</td>
                        <td class="px-6 py-4 text-xs text-stone-900 font-bold uppercase">API Gateway</td>
                        <td class="px-6 py-4 text-xs text-stone-600 italic">Hotfix de Emergencia</td>
                        <td class="px-6 py-4 text-xs text-stone-500 font-mono">DEV-SEC-09</td>
                        <td class="px-6 py-4 text-right">
                            <span class="px-2 py-1 bg-lime-100 text-lime-700 text-[9px] font-black uppercase rounded-md tracking-widest">Éxito</span>
                        </td>
                    </tr>
                    <tr class="hover:bg-stone-50/50 transition-colors">
                        <td class="px-6 py-4 text-xs text-stone-500">2023-10-21 02:00</td>
                        <td class="px-6 py-4 text-xs text-stone-900 font-bold uppercase">Inventario Node</td>
                        <td class="px-6 py-4 text-xs text-stone-600 italic">Migración de Hardware</td>
                        <td class="px-6 py-4 text-xs text-stone-500 font-mono">INF-OPS-04</td>
                        <td class="px-6 py-4 text-right">
                            <span class="px-2 py-1 bg-stone-100 text-stone-600 text-[9px] font-black uppercase rounded-md tracking-widest">Diferido</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
