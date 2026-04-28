@extends('erp.layouts.app')

@section('title', 'Auditoría de Seguridad | Zenith ERP')

@section('breadcrumb')
    <span class="material-symbols-outlined text-sm text-stone-400">chevron_right</span>
    <a href="{{ url('/erp/configuracion') }}" class="hover:text-stone-900">Configuración</a>
    <span class="material-symbols-outlined text-sm text-stone-400">chevron_right</span>
    <span class="text-stone-900 font-medium">Auditoría</span>
@endsection

@section('content')
<section class="space-y-6">
    <!-- Header Section -->
    <div class="relative overflow-hidden bg-stone-950 p-8 rounded-2xl flex flex-col md:flex-row justify-between items-end gap-6 border-l-8 border-primary shadow-2xl">
        <div class="z-10">
            <span class="text-primary font-headline font-bold text-[10px] tracking-[0.3em] uppercase mb-2 block">Level 4 Authorization Required</span>
            <h1 class="text-3xl font-headline font-bold text-white uppercase tracking-tighter leading-none mb-4">Registro de Auditoría & Seguridad</h1>
            <p class="text-stone-400 font-body text-xs max-w-xl leading-relaxed italic">
                Monitoreo continuo de interacciones a nivel de sistema. Todos los hashes criptográficos y handshakes de IP son grabados. El acceso no autorizado activa protocolos de bloqueo inmediato.
            </p>
        </div>
        <div class="flex gap-4 z-10">
            <div class="bg-stone-900/50 backdrop-blur-md p-4 rounded-xl border border-stone-800 min-w-[140px]">
                <span class="text-[9px] text-stone-500 font-bold uppercase block mb-1">Eventos Live</span>
                <span class="text-2xl font-headline font-bold text-primary">1,204</span>
            </div>
            <div class="bg-stone-900/50 backdrop-blur-md p-4 rounded-xl border border-stone-800 min-w-[140px]">
                <span class="text-[9px] text-stone-500 font-bold uppercase block mb-1">Nivel de Riesgo</span>
                <span class="text-2xl font-headline font-bold text-lime-400">BAJO</span>
            </div>
        </div>
        <div class="absolute right-0 top-0 opacity-10 pointer-events-none translate-x-1/4 -translate-y-1/4">
            <span class="material-symbols-outlined text-[240px] text-primary" style="font-variation-settings: 'FILL' 1;">security</span>
        </div>
    </div>

    <!-- Search & Filters -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 bg-white p-4 rounded-2xl border border-stone-200 shadow-sm">
        <div class="md:col-span-2 relative">
            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-stone-400">search</span>
            <input class="w-full bg-stone-50 border-stone-200 focus:ring-2 focus:ring-primary focus:bg-white rounded-xl pl-10 pr-4 py-2.5 text-xs font-bold uppercase tracking-widest placeholder:text-stone-400 transition-all" placeholder="Buscar por Usuario, IP o Acción..." type="text"/>
        </div>
        <div>
            <select class="w-full bg-stone-50 border-stone-200 focus:ring-2 focus:ring-primary focus:bg-white rounded-xl py-2.5 text-xs font-bold uppercase tracking-widest transition-all">
                <option>Todas las Severidades</option>
                <option>Crítico</option>
                <option>Advertencia</option>
                <option>Informativo</option>
            </select>
        </div>
        <button class="bg-stone-900 text-white rounded-xl text-xs font-bold uppercase tracking-widest py-2.5 hover:bg-stone-800 transition-all flex items-center justify-center gap-2 active:scale-95 shadow-lg shadow-stone-900/10">
            <span class="material-symbols-outlined text-sm">filter_list</span>
            Filtrar Logs
        </button>
    </div>

    <!-- Audit Log Table -->
    <div class="bg-white rounded-2xl border border-stone-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left font-body">
                <thead>
                    <tr class="zenith-table-header bg-stone-950">
                        <th class="px-6 py-5">Timestamp / Trace ID</th>
                        <th class="px-6 py-5">Identidad Operativa</th>
                        <th class="px-6 py-5">Vector de Red (IP)</th>
                        <th class="px-6 py-5">Acción Ejecutada</th>
                        <th class="px-6 py-5">Protocolo JSON</th>
                        <th class="px-6 py-5 text-right">Validación</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-100">
                    <tr class="zenith-table-row group">
                        <td class="px-6 py-6">
                            <p class="zenith-table-main">2023-10-24 14:22:01</p>
                            <p class="zenith-table-sku mt-1 border-stone-100 opacity-60 italic">AUTH_X99_221</p>
                        </td>
                        <td class="px-6 py-6">
                            <div class="flex items-center gap-4">
                                <div class="h-9 w-9 bg-stone-900 rounded-xl flex items-center justify-center shadow-lg">
                                    <span class="material-symbols-outlined text-primary text-base">person</span>
                                </div>
                                <div>
                                    <p class="zenith-table-main">admin.valencia</p>
                                    <p class="zenith-table-secondary mt-0.5">NIVEL 4: SUPERUSER</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-6">
                            <span class="zenith-table-sku bg-stone-100 text-stone-500 border-stone-200">192.168.*.*</span>
                        </td>
                        <td class="px-6 py-6">
                            <span class="px-3 py-1 bg-stone-900 text-primary text-[9px] font-black tracking-widest rounded-lg border border-stone-800 uppercase italic shadow-sm">LOGIN_SUCCESS</span>
                        </td>
                        <td class="px-6 py-6">
                            <div class="bg-stone-50 p-3 rounded-xl border-l-[3px] border-primary text-[10px] font-mono leading-tight max-w-[240px] shadow-inner">
                                <span class="text-stone-400">SESSION:</span> <span class="text-stone-900 font-bold">"S_881"</span><br/>
                                <span class="text-stone-400">VECTOR:</span> <span class="text-primary font-bold">"W-SECURE"</span>
                            </div>
                        </td>
                        <td class="px-6 py-6 text-right">
                            <span class="material-symbols-outlined text-lime-500 drop-shadow-sm">verified_user</span>
                        </td>
                    </tr>
                    <tr class="zenith-table-row bg-stone-50/20 group">
                        <td class="px-6 py-6">
                            <p class="zenith-table-main">2023-10-24 14:15:44</p>
                            <p class="zenith-table-sku mt-1 border-stone-100 opacity-60 italic">AUTH_P01_990</p>
                        </td>
                        <td class="px-6 py-6" >
                            <div class="flex items-center gap-4">
                                <div class="h-9 w-9 bg-red-50 rounded-xl flex items-center justify-center border border-red-100 shadow-sm">
                                    <span class="material-symbols-outlined text-red-500 text-base">warning</span>
                                </div>
                                <div>
                                    <p class="zenith-table-main">inventory.mgr</p>
                                    <p class="zenith-table-secondary mt-0.5">NIVEL 2: STANDARD</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-6">
                            <span class="zenith-table-sku bg-stone-100 text-stone-500 border-stone-200">201.248.*.*</span>
                        </td>
                        <td class="px-6 py-6">
                            <span class="px-3 py-1 bg-red-600 text-white text-[9px] font-black tracking-widest rounded-lg shadow-sm uppercase italic">DELETE_PRODUCT</span>
                        </td>
                        <td class="px-6 py-6">
                            <div class="bg-stone-50 p-3 rounded-xl border-l-[3px] border-red-500 text-[10px] font-mono leading-tight max-w-[240px] shadow-inner">
                                <span class="text-stone-400">PID:</span> <span class="text-red-600 font-bold">"CMA-502"</span><br/>
                                <span class="text-stone-400">OP:</span> <span class="text-stone-900 font-black">"PURGE"</span>
                            </div>
                        </td>
                        <td class="px-6 py-6 text-right">
                            <span class="material-symbols-outlined text-stone-300">visibility</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Pagination -->
        <div class="bg-stone-50 px-6 py-4 flex items-center justify-between border-t border-stone-100">
            <span class="text-[9px] font-black text-stone-400 uppercase tracking-widest">Mostrando 2 de 1,204 registros activos</span>
            <div class="flex gap-2">
                <button class="p-1 hover:bg-stone-200 rounded-md transition-colors"><span class="material-symbols-outlined text-sm">chevron_left</span></button>
                <div class="flex items-center gap-1">
                    <span class="bg-stone-900 text-white text-[9px] font-black px-2 py-1 rounded">1</span>
                    <span class="text-stone-400 text-[9px] font-black px-2 py-1">2</span>
                </div>
                <button class="p-1 hover:bg-stone-200 rounded-md transition-colors"><span class="material-symbols-outlined text-sm">chevron_right</span></button>
            </div>
        </div>
    </div>

    <!-- Forensic Tools -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-2xl border border-stone-200 shadow-sm relative overflow-hidden group">
            <div class="relative z-10">
                <h3 class="font-headline font-black uppercase text-xs tracking-widest mb-2 text-stone-900">Verificación de Integridad</h3>
                <p class="text-stone-500 text-[10px] mb-6 font-medium leading-relaxed">Ejecuta un chequeo criptográfico (SHA-256) contra los logs para asegurar que no han sido manipulados.</p>
                <button class="w-full bg-stone-900 text-white font-headline text-[10px] font-black tracking-widest uppercase py-3 rounded-xl hover:bg-primary hover:text-stone-900 transition-all active:scale-95">Auditar Hash de Sistema</button>
            </div>
            <span class="material-symbols-outlined absolute -bottom-6 -right-6 text-stone-100 text-8xl group-hover:text-primary/10 transition-colors">fingerprint</span>
        </div>
        
        <div class="bg-white p-6 rounded-2xl border border-stone-200 shadow-sm relative overflow-hidden group">
            <div class="relative z-10">
                <h3 class="font-headline font-black uppercase text-xs tracking-widest mb-2 text-stone-900">Exportar Forense</h3>
                <p class="text-stone-500 text-[10px] mb-6 font-medium leading-relaxed">Descarga logs de actividad en formatos encriptados (CSV/JSON) para auditorías legales o corporativas.</p>
                <div class="grid grid-cols-2 gap-2">
                    <button class="bg-stone-100 text-stone-700 font-headline text-[9px] font-black uppercase py-2.5 rounded-lg hover:bg-stone-200 transition-colors">Descargar CSV</button>
                    <button class="bg-stone-100 text-stone-700 font-headline text-[9px] font-black uppercase py-2.5 rounded-lg hover:bg-stone-200 transition-colors">Descargar JSON</button>
                </div>
            </div>
            <span class="material-symbols-outlined absolute -bottom-6 -right-6 text-stone-100 text-8xl group-hover:text-amber-500/10 transition-colors">file_download</span>
        </div>

        <div class="bg-stone-900 p-6 rounded-2xl shadow-xl border border-stone-800 relative overflow-hidden">
            <h3 class="font-headline font-black uppercase text-xs tracking-widest text-primary mb-4">Estado IP Blocklist</h3>
            <div class="space-y-4">
                <div class="flex justify-between items-center text-[9px] font-black uppercase tracking-widest">
                    <span class="text-stone-400">Bloqueos Activos</span>
                    <span class="text-white">42 Nodos</span>
                </div>
                <div class="w-full bg-stone-800 h-1.5 rounded-full overflow-hidden">
                    <div class="bg-primary h-full w-[42%]"></div>
                </div>
                <div class="flex justify-between items-center text-[9px] font-black uppercase tracking-widest">
                    <span class="text-stone-400">Última Sincro</span>
                    <span class="text-white">Hace 3 mins</span>
                </div>
                <button class="w-full mt-4 text-primary text-[10px] font-black uppercase underline-offset-4 hover:underline transition-all">Gestionar Lista de Bloqueo</button>
            </div>
        </div>
    </div>
</section>
@endsection
