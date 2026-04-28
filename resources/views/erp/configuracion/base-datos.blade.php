@extends('erp.layouts.app')

@section('title', 'Infraestructura de Datos | Zenith Industrial')

@section('breadcrumb')
    <a href="{{ url('/erp/inicio') }}" class="text-stone-400 hover:text-stone-900 transition-colors font-bold text-[12px] uppercase tracking-wider">NÚCLEO_ERP</a>
    <span class="material-symbols-outlined text-[14px] text-stone-300">chevron_right</span>
    <a href="{{ url('/erp/configuracion') }}" class="text-stone-400 hover:text-stone-900 transition-colors font-bold text-[12px] uppercase tracking-wider">CONTROL_SISTEMA</a>
    <span class="material-symbols-outlined text-[14px] text-stone-300">chevron_right</span>
    <span class="text-stone-900 font-bold text-[12px] uppercase tracking-wider">INFRAESTRUCTURA_DB</span>
@endsection

@section('content')
<div class="flex flex-col lg:flex-row gap-6 min-h-screen bg-[#f3f3f3] -m-6 p-6 font-sans">
    
    <!-- Sidebar: Database Navigator (phpMyAdmin style) -->
    <div class="lg:w-[250px] flex-shrink-0 bg-white border border-stone-200 rounded-lg shadow-sm overflow-hidden flex flex-col">
        <div class="p-4 bg-stone-50 border-b border-stone-200 flex items-center justify-between">
            <h2 class="text-[12px] font-black text-stone-900 uppercase tracking-tighter">Navegador_DB</h2>
            <div class="flex gap-1">
                <span class="material-symbols-outlined text-[16px] text-stone-400 cursor-pointer hover:text-stone-900">refresh</span>
                <span class="material-symbols-outlined text-[16px] text-stone-400 cursor-pointer hover:text-stone-900">settings</span>
            </div>
        </div>
        <div class="p-2 space-y-1 overflow-y-auto max-h-[calc(100vh-200px)]">
            <div class="flex items-center gap-2 p-2 hover:bg-stone-50 rounded-md group cursor-pointer">
                <span class="material-symbols-outlined text-[18px] text-stone-400">add_box</span>
                <span class="text-[12px] font-bold text-stone-600 group-hover:text-stone-900 transition-colors uppercase italic">Nueva</span>
            </div>
            @foreach(['information_schema', 'mysql', 'performance_schema', 'phpmyadmin', $dbStats['database_name'], 'test'] as $db)
            <div class="flex flex-col">
                <div class="flex items-center gap-2 p-2 hover:bg-stone-50 rounded-md group cursor-pointer {{ $db == $dbStats['database_name'] ? 'bg-stone-100' : '' }}">
                    <span class="material-symbols-outlined text-[18px] text-stone-400">expand_more</span>
                    <span class="material-symbols-outlined text-[18px] text-stone-400">database</span>
                    <span class="text-[12px] font-bold text-stone-600 group-hover:text-stone-900 transition-colors uppercase italic tracking-tight">{{ $db }}</span>
                </div>
                @if($db == $dbStats['database_name'])
                <div class="ml-8 mt-1 space-y-0.5 border-l-2 border-stone-100 pl-4">
                    @foreach(array_slice($dbStats['tables'], 0, 10) as $table)
                    <div class="flex items-center gap-2 p-1.5 hover:bg-stone-50 rounded-md group cursor-pointer">
                         <span class="material-symbols-outlined text-[16px] text-stone-300">table_rows</span>
                         <span class="text-[11px] font-medium text-stone-500 group-hover:text-stone-900 uppercase italic transition-colors truncate">{{ $table['name'] }}</span>
                    </div>
                    @endforeach
                    <div class="p-1 px-2 text-[10px] text-stone-400 font-bold uppercase italic cursor-pointer hover:text-primary">... Ver más ({{ $dbStats['tables_count'] }})</div>
                </div>
                @endif
            </div>
            @endforeach
        </div>
    </div>

    <!-- Main Workspace -->
    <div class="flex-1 flex flex-col gap-6">
        
        <!-- Top Tab Navigation -->
        <div class="bg-white border border-stone-200 rounded-lg shadow-sm flex overflow-x-auto no-scrollbar">
            @foreach(['Bases de datos', 'SQL', 'Estado actual', 'Cuentas de usuarios', 'Exportar', 'Importar', 'Configuración', 'Replicación', 'Más'] as $tab)
            <div class="px-6 py-4 border-r border-stone-100 flex items-center gap-2 cursor-pointer hover:bg-stone-50 transition-colors whitespace-nowrap {{ $loop->first ? 'bg-[#e5e5e5] border-b-2 border-b-stone-900' : '' }}">
                <span class="material-symbols-outlined text-[20px] text-stone-500 {{ $loop->first ? 'text-stone-900' : '' }}">
                    @switch($tab)
                        @case('Bases de datos') database @break
                        @case('SQL') terminal @break
                        @case('Estado actual') monitoring @break
                        @case('Cuentas de usuarios') group @break
                        @case('Exportar') upload @break
                        @case('Importar') download @break
                        @case('Configuración') settings @break
                        @case('Replicación') dns @break
                        @default more_horiz
                    @endswitch
                </span>
                <span class="text-[12px] font-black uppercase italic tracking-tight text-stone-600 {{ $loop->first ? 'text-stone-900' : '' }}">{{ $tab }}</span>
            </div>
            @endforeach
        </div>

        <!-- Database Structure (Integrated phpMyAdmin View) -->
        <div class="bg-white border border-stone-200 rounded-lg shadow-sm overflow-hidden mb-6">
            <div class="bg-[#c2c2c2] px-6 py-3 border-b border-stone-300 flex justify-between items-center">
                <h3 class="text-[14px] font-black uppercase text-stone-800 tracking-tight italic">Estructura de la base de datos: <span class="text-stone-500">{{ $dbStats['database_name'] }}</span></h3>
                <div class="flex gap-2">
                    <button class="bg-white border border-stone-300 px-3 py-1 rounded text-[10px] font-black uppercase hover:bg-stone-50">Seleccionar todos</button>
                    <button class="bg-white border border-stone-300 px-3 py-1 rounded text-[10px] font-black uppercase hover:bg-stone-50">Con los seleccionados:</button>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-stone-50/80 border-b border-stone-200 text-stone-400 font-black text-[10px] uppercase tracking-widest">
                            <th class="p-4 w-10"></th>
                            <th class="p-4 border-r border-stone-100">Tabla</th>
                            <th class="p-4 border-r border-stone-100">Acción</th>
                            <th class="p-4 border-r border-stone-100 text-right">Registros</th>
                            <th class="p-4 border-r border-stone-100 text-center">Tipo</th>
                            <th class="p-4 border-r border-stone-100">Cotejamiento</th>
                            <th class="p-4 text-right">Tamaño</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-stone-100">
                        @foreach($dbStats['tables'] as $table)
                        <tr class="hover:bg-stone-50 transition-colors group">
                            <td class="p-4 text-center">
                                <input type="checkbox" class="rounded border-stone-300 text-stone-900 focus:ring-stone-900">
                            </td>
                            <td class="p-4 border-r border-stone-50">
                                <a href="{{ route('erp.configuracion.ver-tabla', ['tabla' => $table['name']]) }}" class="text-[12px] font-black text-primary hover:underline uppercase tracking-tight italic">{{ $table['name'] }}</a>
                            </td>
                            <td class="p-4 border-r border-stone-50">
                                <div class="flex gap-3 items-center">
                                    <a href="{{ route('erp.configuracion.ver-tabla', ['tabla' => $table['name']]) }}" class="flex items-center gap-1 text-[10px] font-black text-stone-400 hover:text-stone-900 uppercase">
                                        <span class="material-symbols-outlined text-[16px]">visibility</span> Examinar
                                    </a>
                                    <a href="#" class="flex items-center gap-1 text-[10px] font-black text-stone-400 hover:text-stone-900 uppercase">
                                        <span class="material-symbols-outlined text-[16px]">list</span> Estructura
                                    </a>
                                </div>
                            </td>
                            <td class="p-4 border-r border-stone-50 text-right font-black text-[11px] text-stone-600">
                                {{ number_format($table['rows']) }}
                            </td>
                            <td class="p-4 border-r border-stone-50 text-center text-[10px] font-bold text-stone-400 uppercase tracking-widest">
                                {{ $table['engine'] }}
                            </td>
                            <td class="p-4 border-r border-stone-50 text-[10px] font-medium text-stone-400 uppercase italic">
                                {{ $table['collation'] }}
                            </td>
                            <td class="p-4 text-right font-black text-[11px] text-stone-600">
                                {{ $table['size_mb'] }} <span class="text-stone-300">MB</span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="bg-stone-100/50 border-t-2 border-stone-300 text-[11px] font-black text-stone-900 uppercase italic">
                            <td class="p-4 text-center">{{ $dbStats['tables_count'] }}</td>
                            <td class="p-4">Tablas</td>
                            <td class="p-4">Sumatoria de totales</td>
                            <td class="p-4 text-right">{{ number_format($dbStats['total_records']) }}</td>
                            <td class="p-4"></td>
                            <td class="p-4"></td>
                            <td class="p-4 text-right">{{ number_format($dbStats['size_mb'], 2) }} MB</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        <!-- Dashboard Grid (phpMyAdmin style) -->
        <div class="grid grid-cols-1 xl:grid-cols-2 gap-6">
            
            <!-- Column Left: Settings -->
            <div class="space-y-6">
                <!-- Configuraciones generales -->
                <div class="bg-white border border-stone-200 rounded-lg shadow-sm overflow-hidden">
                    <div class="bg-[#c2c2c2] px-6 py-3 border-b border-stone-300">
                        <h3 class="text-[14px] font-black uppercase text-stone-800 tracking-tight italic">Configuraciones generales</h3>
                    </div>
                    <div class="p-8 space-y-6">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <span class="material-symbols-outlined text-stone-400">subject</span>
                                <span class="text-[13px] font-bold text-stone-700 uppercase italic">Cotejamiento de la conexión al servidor</span>
                                <span class="material-symbols-outlined text-[16px] text-primary cursor-help">help</span>
                            </div>
                            <select class="bg-stone-50 border border-stone-200 px-4 py-2 rounded-md text-[13px] font-black text-stone-900 focus:outline-none focus:border-stone-900 transition-all uppercase w-[250px]">
                                <option>{{ $dbStats['server_info']['collation'] }}</option>
                                <option>utf8mb4_general_ci</option>
                                <option>utf8mb4_bin</option>
                            </select>
                        </div>
                        <div class="flex items-center gap-3 cursor-pointer group">
                            <span class="material-symbols-outlined text-stone-400 group-hover:text-primary transition-colors">key</span>
                            <span class="text-[13px] font-black text-stone-400 group-hover:text-stone-900 transition-colors uppercase italic underline">Más configuraciones</span>
                        </div>
                    </div>
                </div>

                <!-- Configuraciones de apariencia -->
                <div class="bg-white border border-stone-200 rounded-lg shadow-sm overflow-hidden">
                    <div class="bg-[#c2c2c2] px-6 py-3 border-b border-stone-300">
                        <h3 class="text-[14px] font-black uppercase text-stone-800 tracking-tight italic">Configuraciones de apariencia</h3>
                    </div>
                    <div class="p-8 space-y-6">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3 text-stone-700">
                                <span class="material-symbols-outlined text-[20px]">language</span>
                                <span class="text-[13px] font-bold uppercase italic">Idioma <span class="text-stone-400">(Language)</span></span>
                                <span class="material-symbols-outlined text-[16px] text-primary cursor-help">help</span>
                            </div>
                            <select class="bg-stone-50 border border-stone-200 px-4 py-2 rounded-md text-[13px] font-black text-stone-900 uppercase w-[250px]">
                                <option>Español - Spanish</option>
                                <option>Inglés - English</option>
                            </select>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3 text-stone-700">
                                <span class="material-symbols-outlined text-[20px]">palette</span>
                                <span class="text-[13px] font-bold uppercase italic">Tema</span>
                            </div>
                            <div class="flex gap-2">
                                <select class="bg-stone-50 border border-stone-200 px-4 py-2 rounded-md text-[13px] font-black text-stone-900 uppercase w-[150px]">
                                    <option>pmahomme</option>
                                    <option>zenith</option>
                                </select>
                                <button class="bg-stone-100 border border-stone-200 px-4 py-2 rounded-md text-[11px] font-black uppercase text-stone-700 hover:bg-stone-200 transition-all">Ver todo</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Column Right: Technical Specs -->
            <div class="space-y-6">
                <!-- Servidor de base de datos -->
                <div class="bg-white border border-stone-200 rounded-lg shadow-sm overflow-hidden">
                    <div class="bg-[#c2c2c2] px-6 py-3 border-b border-stone-300">
                        <h3 class="text-[14px] font-black uppercase text-stone-800 tracking-tight italic">Servidor de base de datos</h3>
                    </div>
                    <div class="p-8">
                        <ul class="space-y-4">
                            <li class="flex items-start gap-2 text-[12px] font-bold text-stone-600">
                                <span class="w-1.5 h-1.5 bg-stone-900 rounded-full mt-1.5 flex-shrink-0"></span>
                                <div><span class="text-stone-400 uppercase italic mr-1">Servidor:</span> <span class="text-stone-900">{{ $dbStats['server_info']['ip'] }}</span></div>
                            </li>
                            <li class="flex items-start gap-2 text-[12px] font-bold text-stone-600">
                                <span class="w-1.5 h-1.5 bg-stone-900 rounded-full mt-1.5 flex-shrink-0"></span>
                                <div><span class="text-stone-400 uppercase italic mr-1">Tipo de servidor:</span> <span class="text-stone-900">{{ $dbStats['server_info']['type'] }}</span></div>
                            </li>
                            <li class="flex items-start gap-2 text-[12px] font-bold text-stone-600">
                                <span class="w-1.5 h-1.5 bg-stone-900 rounded-full mt-1.5 flex-shrink-0"></span>
                                <div><span class="text-stone-400 uppercase italic mr-1">Conexión del servidor:</span> <span class="text-stone-900 italic">No se está utilizando SSL</span> <span class="material-symbols-outlined text-[14px] text-primary cursor-help">help</span></div>
                            </li>
                            <li class="flex items-start gap-2 text-[12px] font-bold text-stone-600">
                                <span class="w-1.5 h-1.5 bg-stone-900 rounded-full mt-1.5 flex-shrink-0"></span>
                                <div><span class="text-stone-400 uppercase italic mr-1">Versión del servidor:</span> <span class="text-stone-900">{{ $dbStats['server_info']['version'] }} - {{ $dbStats['server_info']['os'] }} binary distribution</span></div>
                            </li>
                            <li class="flex items-start gap-2 text-[12px] font-bold text-stone-600">
                                <span class="w-1.5 h-1.5 bg-stone-900 rounded-full mt-1.5 flex-shrink-0"></span>
                                <div><span class="text-stone-400 uppercase italic mr-1">Versión del protocolo:</span> <span class="text-stone-900 font-black">{{ $dbStats['server_info']['protocol'] }}</span></div>
                            </li>
                            <li class="flex items-start gap-2 text-[12px] font-bold text-stone-600">
                                <span class="w-1.5 h-1.5 bg-stone-900 rounded-full mt-1.5 flex-shrink-0"></span>
                                <div><span class="text-stone-400 uppercase italic mr-1">Usuario:</span> <span class="text-stone-900 font-black tracking-tight">{{ $dbStats['server_info']['user'] }}</span></div>
                            </li>
                            <li class="flex items-start gap-2 text-[12px] font-bold text-stone-600">
                                <span class="w-1.5 h-1.5 bg-stone-900 rounded-full mt-1.5 flex-shrink-0"></span>
                                <div><span class="text-stone-400 uppercase italic mr-1">Conjunto de caracteres del servidor:</span> <span class="text-stone-900 uppercase font-black tracking-tighter italic">UTF-8 Unicode ({{ $dbStats['server_info']['charset'] }})</span></div>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Servidor web -->
                <div class="bg-white border border-stone-200 rounded-lg shadow-sm overflow-hidden">
                    <div class="bg-[#c2c2c2] px-6 py-3 border-b border-stone-300">
                        <h3 class="text-[14px] font-black uppercase text-stone-800 tracking-tight italic">Servidor web</h3>
                    </div>
                    <div class="p-8">
                        <ul class="space-y-4">
                            <li class="flex items-start gap-2 text-[12px] font-bold text-stone-600">
                                <span class="w-1.5 h-1.5 bg-stone-900 rounded-full mt-1.5 flex-shrink-0"></span>
                                <div><span class="text-stone-900">{{ $dbStats['web_server']['software'] }}</span></div>
                            </li>
                            <li class="flex items-start gap-2 text-[12px] font-bold text-stone-600">
                                <span class="w-1.5 h-1.5 bg-stone-900 rounded-full mt-1.5 flex-shrink-0"></span>
                                <div><span class="text-stone-400 uppercase italic mr-1">Versión del cliente de base de datos:</span> <span class="text-stone-900">libmysql - mysqlnd {{ PHP_MAJOR_VERSION }}.{{ PHP_MINOR_VERSION }}.{{ PHP_RELEASE_VERSION }}</span> <span class="material-symbols-outlined text-[14px] text-primary cursor-help">help</span></div>
                            </li>
                            <li class="flex items-start gap-2 text-[12px] font-bold text-stone-600">
                                <span class="w-1.5 h-1.5 bg-stone-900 rounded-full mt-1.5 flex-shrink-0"></span>
                                <div class="flex items-center gap-2">
                                    <span class="text-stone-400 uppercase italic">extensión PHP:</span> 
                                    @foreach($dbStats['web_server']['extensions'] as $ext)
                                        <span class="text-stone-900 font-black italic">{{ $ext }}</span>
                                        <span class="material-symbols-outlined text-[14px] text-primary cursor-help">help</span>
                                    @endforeach
                                </div>
                            </li>
                            <li class="flex items-start gap-2 text-[12px] font-bold text-stone-600">
                                <span class="w-1.5 h-1.5 bg-stone-900 rounded-full mt-1.5 flex-shrink-0"></span>
                                <div><span class="text-stone-400 uppercase italic mr-1">Versión de PHP:</span> <span class="text-primary font-black">{{ $dbStats['web_server']['php_version'] }}</span></div>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- phpMyAdmin -->
                <div class="bg-white border border-stone-200 rounded-lg shadow-sm overflow-hidden">
                    <div class="bg-[#c2c2c2] px-6 py-3 border-b border-stone-300">
                        <h3 class="text-[14px] font-black uppercase text-stone-800 tracking-tight italic text-primary">Zenith_Admin <span class="text-stone-500">(phpMyAdmin Standard)</span></h3>
                    </div>
                    <div class="p-8">
                        <ul class="space-y-4">
                            <li class="flex items-start gap-2 text-[12px] font-bold text-stone-600">
                                <span class="w-1.5 h-1.5 bg-stone-900 rounded-full mt-1.5 flex-shrink-0"></span>
                                <div class="text-stone-500 italic">Acerca de esta versión: <span class="text-stone-900 font-black">{{ $dbStats['phpmyadmin']['version'] }}</span>, versión estable más reciente: <span class="text-primary font-black animate-pulse">{{ $dbStats['phpmyadmin']['latest'] }}</span></div>
                            </li>
                            <li class="flex items-start gap-2 text-[12px] font-bold text-stone-600 underline cursor-pointer hover:text-stone-900 transition-colors italic">
                                <span class="w-1.5 h-1.5 bg-stone-900 rounded-full mt-1.5 flex-shrink-0"></span>
                                <div>Documentación</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- System Actions Footer (Stitch Style) -->
        <div class="flex justify-between items-center bg-white border border-stone-200 p-6 rounded-lg shadow-sm">
            <div class="flex gap-4">
                <a href="{{ route('erp.configuracion.gestor-tablas') }}" class="bg-stone-900 text-primary px-8 py-3 rounded-lg text-[11px] font-black uppercase italic tracking-widest hover:brightness-110 transition-all flex items-center gap-2">
                    <span class="material-symbols-outlined text-[20px]">table_chart</span>
                    IR_AL_GESTOR_DE_TABLAS_COMPLETO
                </a>
                <button class="bg-white border border-stone-200 text-stone-900 px-8 py-3 rounded-lg text-[11px] font-black uppercase italic tracking-widest hover:bg-stone-50 transition-all flex items-center gap-2">
                    <span class="material-symbols-outlined text-[20px]">bolt</span>
                    OPTIMIZAR_NÚCLEO
                </button>
            </div>
            <div class="flex items-center gap-4 text-stone-400 text-[11px] font-bold uppercase italic border-l border-stone-100 pl-6">
                <span>CONEXIÓN: {{ $dbStats['latency'] }} MS</span>
                <span class="text-primary">PULSO: ACTIVO</span>
            </div>
        </div>

    </div>
</div>

<style>
/* Clean Scrollbar for Sidebar */
.no-scrollbar::-webkit-scrollbar {
    display: none;
}
.no-scrollbar {
    -ms-overflow-style: none;
    scrollbar-width: none;
}

::-webkit-scrollbar {
    width: 6px;
    height: 6px;
}
::-webkit-scrollbar-track {
    background: transparent;
}
::-webkit-scrollbar-thumb {
    background: #e5e5e5;
    border-radius: 10px;
}
::-webkit-scrollbar-thumb:hover {
    background: #d4d4d4;
}
</style>
@endsection
