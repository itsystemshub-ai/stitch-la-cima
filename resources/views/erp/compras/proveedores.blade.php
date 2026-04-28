@extends('erp.layouts.app')

@section('title', 'Proveedores | ERP La Cima')

@section('breadcrumb')
    <a href="{{ url('/erp/compras') }}" class="hover:text-stone-900">Compras</a>
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <span class="text-stone-900">Proveedores</span>
@endsection

@section('content')
    <!-- Header: Alliance Management -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6 mb-10">
        <div>
            <div class="flex items-center gap-2 mb-2">
                <span class="w-8 h-[2px] bg-primary"></span>
                <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em]">Gestión de Alianzas Estratégicas</p>
            </div>
            <h2 class="text-4xl font-headline font-black text-stone-900 tracking-tighter uppercase leading-none">Maestro de <span class="text-stone-400">Proveedores</span></h2>
            <p class="text-xs text-stone-400 mt-2 font-medium uppercase tracking-widest">MAYOR DE REPUESTO LA CIMA, C.A. • RIF: J-40308741-5</p>
        </div>
        <div class="flex gap-3">
            <button class="bg-stone-900 text-primary px-6 py-3 text-[10px] font-black uppercase tracking-widest flex items-center gap-3 hover:bg-stone-800 transition-all rounded-xl shadow-xl group active:scale-95">
                <span class="material-symbols-outlined text-sm">person_add</span>
                Registrar Aliado
            </button>
            <button class="bg-white border border-stone-200 text-stone-500 hover:text-stone-900 p-3 rounded-xl transition-all shadow-sm">
                <span class="material-symbols-outlined">sync</span>
            </button>
        </div>
    </div>

    <!-- Vendor Dashboard Bento -->
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 mb-10">
        <!-- Main Registration / Editor Form -->
        <div class="lg:col-span-3 bg-white border border-stone-200 p-8 rounded-2xl shadow-sm relative overflow-hidden">
            <div class="absolute top-0 right-0 w-48 h-48 bg-primary/5 -mr-24 -mt-24 rounded-full blur-3xl"></div>
            <div class="flex items-center gap-3 mb-8">
                <div class="w-1.5 h-6 bg-primary rounded-full"></div>
                <h3 class="text-sm font-black text-stone-900 uppercase tracking-widest">Perfil de Proveedor</h3>
            </div>
            
            <form class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="space-y-6">
                    <div>
                        <label class="block text-[9px] font-black text-stone-400 uppercase tracking-widest mb-2">Información Fiscal (RIF)</label>
                        <input class="w-full bg-stone-50 border border-stone-100 rounded-xl p-4 text-xs font-mono focus:ring-2 focus:ring-primary/20 focus:border-primary/50 transition-all outline-none uppercase" placeholder="J-00000000-0" type="text"/>
                    </div>
                    <div>
                        <label class="block text-[9px] font-black text-stone-400 uppercase tracking-widest mb-2">Razón Social Completa</label>
                        <input class="w-full bg-stone-50 border border-stone-100 rounded-xl p-4 text-xs font-black text-stone-900 focus:ring-2 focus:ring-primary/20 focus:border-primary/50 transition-all outline-none uppercase" placeholder="EJ: INVERSIONES REPUESTO C.A." type="text"/>
                    </div>
                    <div class="flex items-center gap-4 py-2">
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" value="" class="sr-only peer" checked>
                            <div class="w-11 h-6 bg-stone-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-stone-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-stone-900"></div>
                        </label>
                        <span class="text-[10px] font-black text-stone-900 uppercase tracking-widest">Agente de Retención</span>
                    </div>
                </div>
                
                <div class="space-y-6">
                    <div>
                        <label class="block text-[9px] font-black text-stone-400 uppercase tracking-widest mb-2">Dirección de Operaciones</label>
                        <textarea class="w-full bg-stone-50 border border-stone-100 rounded-xl p-4 text-xs focus:ring-2 focus:ring-primary/20 focus:border-primary/50 transition-all outline-none min-h-[110px]" placeholder="Dirección detallada..."></textarea>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[9px] font-black text-stone-400 uppercase tracking-widest mb-2">Teléfono Directo</label>
                            <input class="w-full bg-stone-50 border border-stone-100 rounded-xl p-4 text-xs focus:ring-2 focus:ring-primary/20 focus:border-primary/50 transition-all outline-none" placeholder="0251-0000000" type="tel"/>
                        </div>
                        <div>
                            <label class="block text-[9px] font-black text-stone-400 uppercase tracking-widest mb-2">Email Administrativo</label>
                            <input class="w-full bg-stone-50 border border-stone-100 rounded-xl p-4 text-xs focus:ring-2 focus:ring-primary/20 focus:border-primary/50 transition-all outline-none" placeholder="correo@aliado.com" type="email"/>
                        </div>
                    </div>
                </div>
                
                <div class="md:col-span-2 pt-6 flex justify-end gap-4 border-t border-stone-50">
                    <button type="button" class="px-6 py-3 text-[10px] font-black text-stone-400 uppercase tracking-widest hover:text-stone-900 transition-colors">Limpiar Campos</button>
                    <button type="submit" class="bg-primary text-stone-900 px-10 py-3 text-[10px] font-black uppercase tracking-widest rounded-xl shadow-lg hover:brightness-110 active:scale-95 transition-all">Sincronizar Maestro</button>
                </div>
            </form>
        </div>

        <!-- Quick Stats Widget -->
        <div class="space-y-6">
            <div class="bg-stone-900 rounded-2xl p-6 shadow-2xl relative overflow-hidden group">
                <div class="absolute inset-x-0 bottom-0 h-1 bg-primary"></div>
                <p class="text-[10px] font-black text-primary uppercase tracking-widest mb-4">Proveedores Activos</p>
                <h4 class="text-5xl font-headline font-black text-white leading-none">84</h4>
                <p class="text-[9px] text-stone-500 font-bold uppercase mt-4">Aliados en Sistema</p>
            </div>
            
            <div class="bg-white border border-stone-200 rounded-2xl p-6 shadow-sm">
                <p class="text-[10px] font-black text-stone-400 uppercase tracking-widest mb-4 text-center">Deuda Consolidada</p>
                <div class="text-center font-headline font-black">
                    <span class="text-3xl text-stone-900">$142,502</span>
                    <span class="text-xs text-stone-400 block mt-1">TOTAL USD POR PAGAR</span>
                </div>
                <div class="mt-6 pt-6 border-t border-stone-50 flex justify-center">
                    <span class="text-[10px] font-black text-stone-900 uppercase bg-primary px-3 py-1 rounded-full">Balance Operativo</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Vendor Table -->
    <div class="bg-white rounded-2xl border border-stone-200 overflow-hidden shadow-sm mb-10">
        <div class="p-6 border-b border-stone-50 flex justify-between items-center bg-stone-50/50">
            <div class="flex items-center gap-3">
                <div class="w-2 h-6 bg-primary rounded-full"></div>
                <h3 class="text-sm font-black text-stone-900 uppercase tracking-tighter">Directorio Maestro de Alianzas</h3>
            </div>
            <div class="flex items-center gap-4">
                <div class="relative">
                    <span class="absolute inset-y-0 left-3 flex items-center text-stone-400"><span class="material-symbols-outlined text-sm">search</span></span>
                    <input type="text" class="bg-white border border-stone-100 pl-9 pr-4 py-2 text-[10px] font-black uppercase tracking-widest rounded-lg w-64 focus:ring-1 focus:ring-primary outline-none" placeholder="Filtrar por RIF o Nombre..."/>
                </div>
            </div>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="zenith-table-header">
                        <th class="px-8 py-5">Aliado Estratégico / Segmento</th>
                        <th class="px-8 py-5">Canal de Operación</th>
                        <th class="px-8 py-5">Perfil Fiscal</th>
                        <th class="px-8 py-5 text-right">Saldo Consolidado</th>
                        <th class="px-8 py-5 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-50">
                    <tr class="zenith-table-row group">
                        <td class="px-8 py-5">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-xl bg-stone-900 flex items-center justify-center text-primary text-[10px] font-black shadow-lg">AV</div>
                                <div>
                                    <p class="zenith-table-main">Aceros de Venezuela S.A.</p>
                                    <p class="zenith-table-sku mt-1 border-stone-100 text-stone-400">J-30594832-1</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-5">
                            <p class="zenith-table-main font-medium lowercase">compras@acerosv.com</p>
                            <p class="zenith-table-secondary mt-1">Soporte Corporativo</p>
                        </td>
                        <td class="px-8 py-5">
                            <span class="px-3 py-1 bg-stone-50 text-stone-900 text-[9px] font-black uppercase rounded-lg border border-stone-100">Agente Contribuyente</span>
                        </td>
                        <td class="px-8 py-5 text-right">
                            <span class="zenith-table-price">$42,900.00</span>
                        </td>
                        <td class="px-8 py-5">
                            <div class="flex justify-center gap-2 opacity-0 group-hover:opacity-100 transition-all">
                                <button class="p-2 hover:bg-stone-100 rounded-lg text-stone-400 hover:text-stone-900 transition-all">
                                    <span class="material-symbols-outlined text-lg">edit_square</span>
                                </button>
                                <button class="p-2 hover:bg-stone-900 rounded-lg text-stone-400 hover:text-white transition-all">
                                    <span class="material-symbols-outlined text-lg">manage_search</span>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr class="zenith-table-row group">
                        <td class="px-8 py-5">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-xl bg-stone-100 border border-stone-200 flex items-center justify-center text-stone-400 text-[10px] font-black">QI</div>
                                <div>
                                    <p class="zenith-table-main">Químicos Industriales Maracaibo</p>
                                    <p class="zenith-table-sku mt-1 border-stone-100 text-stone-400">J-40112345-0</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-5">
                            <p class="zenith-table-main font-medium lowercase">logistica@qimca.com.ve</p>
                            <p class="zenith-table-secondary mt-1">Despacho Principal</p>
                        </td>
                        <td class="px-8 py-5">
                            <span class="px-3 py-1 bg-stone-50 text-stone-900 text-[9px] font-black uppercase rounded-lg border border-stone-100">Ordinario</span>
                        </td>
                        <td class="px-8 py-5 text-right">
                            <span class="zenith-table-price">$12,450.50</span>
                        </td>
                        <td class="px-8 py-5">
                            <div class="flex justify-center gap-2 opacity-0 group-hover:opacity-100 transition-all">
                                <button class="p-2 hover:bg-stone-100 rounded-lg text-stone-400 hover:text-stone-900 transition-all">
                                    <span class="material-symbols-outlined text-lg">edit_square</span>
                                </button>
                                <button class="p-2 hover:bg-stone-900 rounded-lg text-stone-400 hover:text-white transition-all">
                                    <span class="material-symbols-outlined text-lg">manage_search</span>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Final Legal Note -->
    <div class="pt-8 border-t border-stone-100 flex justify-between items-center opacity-40">
        <p class="text-[9px] font-black text-stone-500 uppercase tracking-widest">MAYOR DE REPUESTO LA CIMA, C.A. • MAESTRO DE PROVEEDORES • 2026</p>
        <p class="text-[9px] font-black text-stone-500 uppercase tracking-widest font-mono italic">Zenith Protocol Alpha</p>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('erp/js/proveedores.js') }}"></script>
@endpush
