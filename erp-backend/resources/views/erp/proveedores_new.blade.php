@extends('layouts.erp')

@section('title', 'Gestion de Proveedores')

@section('content')
<main class="ml-[288px] w-[calc(100vw-288px)] mt-[65px] p-6 pb-4">
    
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4 mb-8">
        <div>
            <nav class="flex gap-2 text-[10px] font-bold text-stone-400 uppercase tracking-widest mb-2">
                <a href="/erp/inicio" class="hover:text-primary transition-colors">Dashboard</a>
                <span>/</span>
                <span class="text-stone-900">Maestros</span>
                <span>/</span>
                <span class="text-stone-900">Proveedores</span>
            </nav>
            <h2 class="text-3xl font-headline font-black text-stone-900 tracking-tight">PROVEEDORES</h2>
            <p class="text-stone-500 text-sm">Administración de la cadena de suministro y proveedores internacionales.</p>
        </div>
        <button class="bg-stone-900 text-white px-6 py-2.5 rounded-xl text-xs font-black uppercase tracking-widest flex items-center gap-2 hover:bg-black transition-all shadow-premium">
            <span class="material-symbols-outlined text-sm text-primary">person_add</span>
            Nuevo Proveedor
        </button>
    </div>

    <!-- Busqueda y Filtros -->
    <div class="premium-card mb-6 flex gap-4">
        <div class="relative flex-1">
            <span class="absolute left-3 top-1/2 -translate-y-1/2 material-symbols-outlined text-stone-400">search</span>
            <input type="text" placeholder="Buscar por RIF, Nombre o Contacto..." class="w-full pl-10 pr-4 py-3 bg-stone-50 border border-stone-100 rounded-xl text-xs outline-none focus:ring-2 focus:ring-primary/20 transition-all">
        </div>
        <select class="bg-stone-50 border border-stone-100 rounded-xl px-4 py-3 text-[10px] font-bold uppercase text-stone-500 outline-none focus:ring-2 focus:ring-primary/20">
            <option>Todos los Estados</option>
            <option>Nacionales</option>
            <option>Importados</option>
        </select>
    </div>

    <!-- Tabla de Proveedores -->
    <div class="premium-card p-0 overflow-hidden">
        <div class="data-table-container border-none rounded-none">
            <table class="data-table w-full">
                <thead>
                    <tr>
                        <th class="pl-6 text-left">Empresa / RIF</th>
                        <th class="text-left">Contacto Principal</th>
                        <th class="text-left">Datos de Contacto</th>
                        <th class="text-center">Tipo</th>
                        <th class="pr-6 text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-100">
                    <tr>
                        <td class="pl-6 py-4">
                            <p class="font-bold text-stone-900 text-sm uppercase">CUMMINS DE VENEZUELA, S.A.</p>
                            <p class="text-[10px] text-stone-400 font-mono italic">RIF: J-00045938-2</p>
                        </td>
                        <td class="text-xs font-bold text-stone-600">Ricardo Montilla</td>
                        <td>
                            <p class="text-xs font-bold text-stone-900">+58 241 850 4433</p>
                            <p class="text-[10px] text-blue-500 font-bold">rmontilla@cummins.ve</p>
                        </td>
                        <td class="text-center">
                            <span class="px-2 py-1 bg-green-100 text-green-700 text-[9px] font-black uppercase rounded">NACIONAL</span>
                        </td>
                        <td class="pr-6 text-right">
                            <div class="flex justify-end gap-2">
                                <button class="p-1.5 hover:bg-stone-100 rounded-lg text-stone-400 hover:text-stone-900 transition-colors">
                                    <span class="material-symbols-outlined text-[20px]">edit</span>
                                </button>
                                <button class="p-1.5 hover:bg-stone-100 rounded-lg text-stone-400 hover:text-stone-900 transition-colors">
                                    <span class="material-symbols-outlined text-[20px]">analytics</span>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="pl-6 py-4">
                            <p class="font-bold text-stone-900 text-sm uppercase">BOSCH AUTO PARTS LATAM</p>
                            <p class="text-[10px] text-stone-400 font-mono italic">RIF: EXP-9923485</p>
                        </td>
                        <td class="text-xs font-bold text-stone-600">Maria Garcia</td>
                        <td>
                            <p class="text-xs font-bold text-stone-900">+1 305 445 9922</p>
                            <p class="text-[10px] text-blue-500 font-bold">mgarcia@bosch-parts.com</p>
                        </td>
                        <td class="text-center">
                            <span class="px-2 py-1 bg-blue-100 text-blue-700 text-[9px] font-black uppercase rounded">IMPORTADO</span>
                        </td>
                        <td class="pr-6 text-right">
                            <div class="flex justify-end gap-2">
                                <button class="p-1.5 hover:bg-stone-100 rounded-lg text-stone-400 hover:text-stone-900 transition-colors">
                                    <span class="material-symbols-outlined text-[20px]">edit</span>
                                </button>
                                <button class="p-1.5 hover:bg-stone-100 rounded-lg text-stone-400 hover:text-stone-900 transition-colors">
                                    <span class="material-symbols-outlined text-[20px]">analytics</span>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Footer Identity -->
    <div class="mt-8 pt-4 border-t border-stone-100 flex justify-between items-center text-[10px] font-bold text-stone-400 uppercase tracking-widest">
        <span class="entity-rif">RIF: J-40308741-5</span>
        <span class="entity-name uppercase tracking-[0.2em]">Mayor de Repuesto La Cima, C.A.</span>
    </div>
</main>
@endsection
