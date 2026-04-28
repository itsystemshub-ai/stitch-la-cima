@extends('erp.layouts.app')

@section('title', 'NÚCLEO_INFRAESTRUCTURA_DATOS')

@section('breadcrumb')
    <a href="{{ url('/erp/inicio') }}" class="text-stone-400 hover:text-stone-900 transition-colors font-bold text-[10px] uppercase tracking-[0.2em]">NÚCLEO_OPERATIVO</a>
    <span class="material-symbols-outlined text-[14px] text-stone-300">chevron_right</span>
    <span class="text-stone-900 font-black text-[10px] uppercase tracking-[0.2em]">DATA_ARCHITECTURE</span>
@endsection

@section('content')
<div class="space-y-6 font-sans pb-10">
    
    <!-- Hero Header: Database Pulse & Real-time Metrics -->
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-4">
        <div class="lg:col-span-3 bg-stone-950 rounded-2xl p-8 relative overflow-hidden flex flex-col justify-between min-h-[220px] shadow-2xl">
            <!-- Background Decoration -->
            <div class="absolute top-0 right-0 w-64 h-64 bg-primary/10 rounded-full blur-[120px] -mr-32 -mt-32"></div>
            <div class="absolute bottom-0 left-0 w-32 h-32 bg-primary/5 rounded-full blur-[60px] -ml-16 -mb-16"></div>
            
            <div class="relative z-10">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-2 h-8 bg-primary rounded-full animate-pulse"></div>
                    <div>
                        <h1 class="text-white text-3xl font-black lowercase tracking-tighter leading-none italic">data_architecture</h1>
                        <p class="text-stone-500 text-[11px] font-bold uppercase tracking-[0.3em] mt-1 italic">Gestión de sustrato binario & telemetría de motor</p>
                    </div>
                </div>

                <div class="flex flex-wrap gap-12 mt-4">
                    <div class="space-y-1">
                        <p class="text-stone-500 text-[9px] font-black uppercase tracking-widest">Estado_Motor</p>
                        <div class="flex items-center gap-2">
                             <div class="w-2 h-2 rounded-full bg-primary animate-ping"></div>
                             <span class="text-white text-xl font-black italic uppercase tracking-tighter">{{ $dbStats['server_info']['type'] }} <span class="text-stone-600 text-sm font-bold">V_{{ $dbStats['version'] }}</span></span>
                        </div>
                    </div>
                    <div class="space-y-1">
                        <p class="text-stone-500 text-[9px] font-black uppercase tracking-widest">Latencia_SQL</p>
                        <span class="text-white text-xl font-black italic uppercase tracking-tighter">{{ $dbStats['latency'] }} <span class="text-stone-600 text-sm font-bold">MS</span></span>
                    </div>
                    <div class="space-y-1">
                        <p class="text-stone-500 text-[9px] font-black uppercase tracking-widest">Uptime_Servidor</p>
                        <span class="text-white text-xl font-black italic uppercase tracking-tighter">{{ $dbStats['uptime'] }}</span>
                    </div>
                </div>
            </div>

            <div class="relative z-10 flex gap-4 mt-8">
                 <button class="bg-primary text-stone-950 px-6 py-2.5 rounded-xl text-[10px] font-black uppercase tracking-widest hover:brightness-110 transition-all shadow-[0_0_20px_rgba(206,255,94,0.3)] flex items-center gap-2">
                    <span class="material-symbols-outlined text-[20px]">bolt</span> Optimizar_Indices
                 </button>
                 <button class="bg-white/5 border border-white/10 text-white px-6 py-2.5 rounded-xl text-[10px] font-black uppercase tracking-widest hover:bg-white/10 transition-all flex items-center gap-2">
                    <span class="material-symbols-outlined text-[20px]">backup</span> Dump_Estructural
                 </button>
            </div>
        </div>

        <div class="bg-primary rounded-2xl p-8 flex flex-col justify-between shadow-xl">
             <div class="space-y-1">
                <p class="text-stone-950/40 text-[9px] font-black uppercase tracking-widest">Carga_Total_Data</p>
                <div class="flex items-end gap-1">
                    <h2 class="text-stone-950 text-5xl font-black tracking-tighter leading-none italic">{{ $dbStats['size_mb'] }}</h2>
                    <span class="text-stone-950 font-black text-xs uppercase mb-1">MB</span>
                </div>
             </div>
             <div class="pt-6 border-t border-stone-950/10">
                 <div class="flex justify-between items-center mb-2">
                    <span class="text-stone-950 text-[10px] font-black uppercase italic">Distribución_Saturación</span>
                    <span class="text-stone-950 text-[10px] font-black uppercase">8%</span>
                 </div>
                 <div class="w-full h-3 bg-stone-950/20 rounded-full overflow-hidden">
                    <div class="h-full bg-stone-950 w-[8%] rounded-full"></div>
                 </div>
                 <p class="text-stone-950/60 text-[9px] font-bold uppercase mt-3 italic tracking-tight">Capacidad crítica nominal detectada</p>
             </div>
        </div>
    </div>

    <!-- Main Data Hub: Tables & Performance Matrix -->
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
        
        <!-- Center Table Grid: Advanced Layout -->
        <div class="xl:col-span-2 space-y-6">
            <div class="bg-white border border-stone-200 rounded-2xl shadow-sm overflow-hidden min-h-[600px]">
                <div class="p-6 border-b border-stone-100 flex justify-between items-center bg-stone-50/50">
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 bg-stone-900 rounded-xl flex items-center justify-center text-primary">
                            <span class="material-symbols-outlined">database</span>
                        </div>
                        <div>
                            <h3 class="text-[14px] font-black uppercase text-stone-900 italic tracking-tighter">Inventario_Estructural_Tablas</h3>
                            <p class="text-[10px] text-stone-500 font-bold uppercase tracking-widest">{{ $dbStats['tables_count'] }} Entidades registradas en el motor</p>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-stone-400">
                                <span class="material-symbols-outlined text-[18px]">search</span>
                            </span>
                            <input type="text" placeholder="REF_TABLA..." class="bg-stone-100 border-none rounded-xl pl-10 pr-4 py-2 text-[11px] font-black uppercase focus:ring-2 focus:ring-primary/50 transition-all w-[200px]">
                        </div>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-stone-50/50 border-b border-stone-100">
                                <th class="p-4 text-[9px] font-black text-stone-400 uppercase tracking-widest">Identificador</th>
                                <th class="p-4 text-[9px] font-black text-stone-400 uppercase tracking-widest">Densidad_Filas</th>
                                <th class="p-4 text-[9px] font-black text-stone-400 uppercase tracking-widest">Motor</th>
                                <th class="p-4 text-[9px] font-black text-stone-400 uppercase tracking-widest">Peso_Físico</th>
                                <th class="p-4 text-[9px] font-black text-stone-400 uppercase tracking-widest text-right">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-stone-50">
                            @foreach($dbStats['tables'] as $table)
                            <tr class="group hover:bg-stone-50/80 transition-all border-l-4 border-l-transparent hover:border-l-primary">
                                <td class="p-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-2 h-2 rounded-full bg-stone-300 group-hover:bg-primary transition-colors"></div>
                                        <div>
                                            <a href="{{ route('erp.configuracion.ver-tabla', ['tabla' => $table['name']]) }}" class="text-[12px] font-black text-stone-900 uppercase italic transition-colors hover:text-stone-600 tracking-tight">{{ $table['name'] }}</a>
                                            <p class="text-[9px] text-stone-400 font-bold uppercase italic mt-0.5">{{ $table['collation'] }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-4">
                                    <div class="flex flex-col gap-1">
                                        <span class="text-[11px] font-black font-mono text-stone-600">{{ number_format($table['rows']) }} <span class="text-[9px] text-stone-300">REG</span></span>
                                        <div class="w-24 h-1 bg-stone-100 rounded-full overflow-hidden">
                                            <div class="h-full bg-stone-400 w-[65%]"></div>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-4">
                                    <span class="px-2.5 py-1 bg-stone-100 text-stone-500 rounded-lg text-[9px] font-black uppercase tracking-widest border border-stone-200">
                                        {{ $table['engine'] }}
                                    </span>
                                </td>
                                <td class="p-4">
                                    <span class="text-[11px] font-black text-stone-950 font-mono">{{ $table['size_mb'] }} <span class="text-stone-400">MB</span></span>
                                </td>
                                <td class="p-4 text-right">
                                    <div class="flex justify-end gap-2">
                                        <a href="{{ route('erp.configuracion.ver-tabla', ['tabla' => $table['name']]) }}" class="p-2 bg-stone-100 text-stone-400 hover:bg-stone-950 hover:text-primary rounded-xl transition-all flex items-center justify-center shadow-sm">
                                            <span class="material-symbols-outlined text-[18px]">visibility</span>
                                        </a>
                                        <button class="p-2 bg-stone-100 text-stone-400 hover:bg-stone-950 hover:text-primary rounded-xl transition-all flex items-center justify-center shadow-sm">
                                            <span class="material-symbols-outlined text-[18px]">build</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Right Side: Advanced Diagnostic Panels -->
        <div class="space-y-6">
            
            <!-- Connection Detail Card -->
            <div class="bg-white border border-stone-200 rounded-2xl p-8 shadow-sm relative overflow-hidden">
                <h4 class="text-[13px] font-black uppercase text-stone-900 mb-6 italic tracking-tight">Detalles_Conexión_Activos</h4>
                <div class="space-y-5">
                    <div class="flex justify-between items-center group cursor-pointer hover:bg-stone-50 p-2 -m-2 rounded-xl transition-all">
                        <div class="flex items-center gap-3">
                             <span class="material-symbols-outlined text-stone-300">alternate_email</span>
                             <span class="text-[11px] font-bold text-stone-500 uppercase tracking-tight">Usuario_Root:</span>
                        </div>
                        <span class="text-[11px] font-black text-stone-900 italic lowercase tracking-tighter">{{ $dbStats['server_info']['user'] }}</span>
                    </div>
                    <div class="flex justify-between items-center group cursor-pointer hover:bg-stone-50 p-2 -m-2 rounded-xl transition-all">
                        <div class="flex items-center gap-3">
                             <span class="material-symbols-outlined text-stone-300">dns</span>
                             <span class="text-[11px] font-bold text-stone-500 uppercase tracking-tight">Hostname:</span>
                        </div>
                        <span class="text-[11px] font-black text-stone-900 uppercase italic tracking-tighter">{{ $dbStats['server_info']['ip'] }}</span>
                    </div>
                    <div class="flex justify-between items-center group cursor-pointer hover:bg-stone-50 p-2 -m-2 rounded-xl transition-all">
                        <div class="flex items-center gap-3">
                             <span class="material-symbols-outlined text-stone-300">security_update_good</span>
                             <span class="text-[11px] font-bold text-stone-500 uppercase tracking-tight">Protocolo:</span>
                        </div>
                        <span class="text-[11px] font-black text-primary bg-stone-900 px-2 py-0.5 rounded-lg uppercase tracking-widest italic">VERSION_{{ $dbStats['server_info']['protocol'] }}</span>
                    </div>
                </div>
            </div>

            <!-- Health Distribution Isometric Visual (Simulated with CSS) -->
            <div class="bg-stone-950 rounded-2xl p-8 shadow-2xl relative">
                <div class="flex items-center justify-between mb-8">
                     <h4 class="text-white text-[13px] font-black uppercase italic">Salud_Entorno</h4>
                     <span class="bg-emerald-500/20 text-emerald-500 px-3 py-1 rounded-full text-[9px] font-black uppercase tracking-widest border border-emerald-500/30">Stable_Grid</span>
                </div>
                
                <div class="space-y-6">
                    <div class="space-y-2">
                        <div class="flex justify-between items-center">
                            <span class="text-[10px] font-black text-stone-500 uppercase tracking-widest italic">Consumo_I/O</span>
                            <span class="text-[11px] font-black text-white italic">12%</span>
                        </div>
                        <div class="h-1.5 w-full bg-white/5 rounded-full overflow-hidden">
                            <div class="h-full bg-primary w-[12%] rounded-full shadow-[0_0_10px_#ceff5e]"></div>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <div class="flex justify-between items-center">
                            <span class="text-[10px] font-black text-stone-500 uppercase tracking-widest italic">Conexiones_Simultáneas</span>
                            <span class="text-[11px] font-black text-white italic">{{ $dbStats['connections'] }}</span>
                        </div>
                        <div class="h-1.5 w-full bg-white/5 rounded-full overflow-hidden">
                            <div class="h-full bg-blue-500 w-[18%] rounded-full shadow-[0_0_10px_#3b82f6]"></div>
                        </div>
                    </div>
                </div>

                <div class="mt-10 p-4 border border-white/5 rounded-xl bg-white/5 flex items-center gap-4">
                     <div class="w-12 h-12 rounded-xl bg-primary/20 flex items-center justify-center text-primary border border-primary/20">
                        <span class="material-symbols-outlined text-[24px]">verified</span>
                     </div>
                     <div>
                        <p class="text-white text-[11px] font-black uppercase italic">Integridad_Check</p>
                        <p class="text-stone-500 text-[9px] font-bold uppercase tracking-tight mt-0.5">Sustrato de datos verificado y saludable</p>
                     </div>
                </div>
            </div>

            <!-- Web Server Spec Glass Card -->
            <div class="bg-stone-50 border border-stone-200 rounded-2xl p-8 shadow-sm">
                 <h4 class="text-[13px] font-black uppercase text-stone-900 mb-6 italic tracking-tight">Software_Stack</h4>
                 <div class="grid grid-cols-2 gap-4">
                    <div class="p-4 bg-white border border-stone-100 rounded-xl">
                        <p class="text-[9px] font-black text-stone-400 uppercase mb-1">Entorno_Web</p>
                        <p class="text-[11px] font-black text-stone-900 uppercase italic truncate">{{ explode('/', $dbStats['web_server']['software'])[0] }}</p>
                    </div>
                    <div class="p-4 bg-white border border-stone-100 rounded-xl border-l-4 border-l-primary">
                        <p class="text-[9px] font-black text-stone-400 uppercase mb-1">Versión_PHP</p>
                        <p class="text-[11px] font-black text-stone-900 italic tracking-widest">{{ $dbStats['web_server']['php_version'] }}</p>
                    </div>
                 </div>
                 <div class="mt-4 flex flex-wrap gap-2 text-stone-400">
                    @foreach($dbStats['web_server']['extensions'] as $ext)
                        <span class="text-[9px] font-black uppercase px-2 py-0.5 bg-stone-100 border border-stone-200 rounded text-stone-500">{{ $ext }}</span>
                    @endforeach
                 </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Smooth Industrial Scrollbar */
::-webkit-scrollbar { width: 4px; height: 4px; }
::-webkit-scrollbar-track { background: transparent; }
::-webkit-scrollbar-thumb { background: #e5e5e5; border-radius: 20px; }
::-webkit-scrollbar-thumb:hover { background: #d4d4d4; }

@keyframes pulse-slow {
    0%, 100% { opacity: 0.1; }
    50% { opacity: 0.3; }
}
.animate-pulse-slow { animation: pulse-slow 4s cubic-bezier(0.4, 0, 0.6, 1) infinite; }
</style>
@endsection
