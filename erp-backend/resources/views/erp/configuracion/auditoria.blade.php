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
                    <tr class="bg-stone-900 text-stone-400 text-[9px] font-black tracking-widest uppercase">
                        <th class="px-6 py-4">Timestamp / Auth ID</th>
                        <th class="px-6 py-4">Identidad de Usuario</th>
                        <th class="px-6 py-4">Vector de Red</th>
                        <th class="px-6 py-4">Acción de Sistema</th>
                        <th class="px-6 py-4">Detalle (JSON)</th>
                        <th class="px-6 py-4 text-right">Estado</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-100 text-xs">
                    <tr class="hover:bg-stone-50/50 transition-colors group">
                        <td class="px-6 py-5">
                            <div class="flex flex-col">
                                <span class="font-bold text-stone-900">2023-10-24 14:22:01</span>
                                <span class="text-[9px] text-stone-400 font-mono uppercase">AUTH_X99_221</span>
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            <div class="flex items-center gap-3">
                                <div class="h-8 w-8 bg-stone-900 rounded-lg flex items-center justify-center">
                                    <span class="material-symbols-outlined text-primary text-sm">person</span>
                                </div>
                                <div class="flex flex-col">
                                    <span class="font-bold text-stone-900">admin.valencia</span>
                                    <span class="text-[9px] text-stone-400 uppercase font-black">Superuser</span>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            <span class="text-xs font-mono bg-stone-100 text-stone-600 px-2 py-1 rounded-md">192.168.***.***</span>
                        </td>
                        <td class="px-6 py-5">
                            <span class="font-headline text-[10px] font-black tracking-widest bg-stone-900 text-primary px-2 py-1 rounded uppercase">LOGIN_SUCCESS</span>
                        </td>
                        <td class="px-6 py-5">
                            <div class="bg-stone-50 p-2 rounded-lg border-l-2 border-primary text-[9px] font-mono leading-tight max-w-[220px]">
                                <span class="text-stone-400">OLD:</span> null<br/>
                                <span class="text-stone-900 font-bold">NEW:</span> {"session_id":"S_881"}
                            </div>
                        </td>
                        <td class="px-6 py-5 text-right">
                            <span class="material-symbols-outlined text-lime-500">verified_user</span>
                        </td>
                    </tr>
                    <tr class="hover:bg-stone-50/50 transition-colors group">
                        <td class="px-6 py-5">
                            <div class="flex flex-col">
                                <span class="font-bold text-stone-900">2023-10-24 14:15:44</span>
                                <span class="text-[9px] text-stone-400 font-mono uppercase">AUTH_P01_990</span>
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            <div class="flex items-center gap-3">
                                <div class="h-8 w-8 bg-red-50 rounded-lg flex items-center justify-center">
                                    <span class="material-symbols-outlined text-red-500 text-sm">warning</span>
                                </div>
                                <div class="flex flex-col">
                                    <span class="font-bold text-stone-900">inventory.mgr</span>
                                    <span class="text-[9px] text-stone-400 uppercase font-black">Standard Access</span>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            <span class="text-xs font-mono bg-stone-100 text-stone-600 px-2 py-1 rounded-md">201.248.***.***</span>
                        </td>
                        <td class="px-6 py-5">
                            <span class="font-headline text-[10px] font-black tracking-widest bg-red-500 text-white px-2 py-1 rounded uppercase">DELETE_PRODUCT</span>
                        </td>
                        <td class="px-6 py-5">
                            <div class="bg-stone-50 p-2 rounded-lg border-l-2 border-red-500 text-[9px] font-mono leading-tight max-w-[220px]">
                                <span class="text-stone-400">OLD:</span> {"pid":"CMA-502"}<br/>
                                <span class="text-stone-900 font-bold">NEW:</span> null
                            </div>
                        </td>
                        <td class="px-6 py-5 text-right">
                            <span class="material-symbols-outlined text-stone-400">visibility</span>
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
