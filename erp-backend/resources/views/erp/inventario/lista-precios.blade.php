@extends('erp.layouts.app')

@section('title', 'Carga Masiva de Precios & Existencias')

@section('breadcrumb')
    <a href="{{ url('/erp/inicio') }}" class="hover:text-stone-900 transition-colors">ERP</a>
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <a href="{{ url('/erp/inventario') }}" class="hover:text-stone-900 transition-colors">Inventario</a>
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <span class="text-stone-900">Lista de Precios</span>
@endsection

@section('content')
    <!-- Page Header: High-Performance Bulk Operations -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6 mb-10 pb-8 border-b border-stone-100">
        <div>
            <div class="flex items-center gap-2 mb-2">
                <span class="w-8 h-[2px] bg-primary"></span>
                <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em]">Gestión de Valorización Global</p>
            </div>
            <h1 class="text-5xl font-headline font-black text-stone-900 tracking-tighter uppercase leading-none">Lista de <span class="text-stone-400">Precios</span></h1>
            <p class="text-xs text-stone-400 mt-2 font-medium uppercase tracking-widest text-[#9ca3af]">MAYOR DE REPUESTO LA CIMA, C.A. • RIF: J-40308741-5</p>
        </div>
        <div class="flex gap-3">
             <button class="bg-white border border-stone-200 text-stone-900 px-8 py-4 text-[10px] font-black uppercase tracking-widest flex items-center gap-3 hover:border-primary transition-all rounded-xl shadow-sm">
                <span class="material-symbols-outlined text-lg">download</span>
                Descargar Plantilla
            </button>
        </div>
    </div>

    <!-- Live Sync Status -->
    <div class="grid grid-cols-12 gap-8 mb-12">
        <div class="col-span-12 lg:col-span-8 bg-stone-900 rounded-[40px] p-10 relative overflow-hidden flex flex-col justify-between min-h-[300px] shadow-2xl">
            <div class="absolute -right-10 -bottom-10 opacity-10">
                <span class="material-symbols-outlined text-[200px] text-white">cloud_upload</span>
            </div>
            
            <div class="relative z-10">
                <p class="text-[10px] font-black text-primary uppercase tracking-[0.4em] mb-4">Zona de Carga Inteligente</p>
                <div class="border-2 border-dashed border-stone-700 rounded-[32px] p-12 flex flex-col items-center justify-center group hover:border-primary transition-all cursor-pointer bg-white/[0.02]">
                    <span class="material-symbols-outlined text-6xl text-stone-600 group-hover:text-primary group-hover:scale-110 transition-all mb-6">file_upload</span>
                    <h4 class="text-xl font-headline font-black text-white uppercase mb-2">Arrastre su Archivo (CSV / EXCEL)</h4>
                    <p class="text-xs text-stone-500 font-bold uppercase tracking-wider">Límite de 5,000 registros por carga</p>
                </div>
            </div>

            <div class="relative z-10 flex justify-between items-center mt-8">
                <div class="flex items-center gap-3">
                    <span class="flex h-3 w-3 relative">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-3 w-3 bg-primary"></span>
                    </span>
                    <span class="text-[10px] font-black text-white uppercase tracking-widest">Sincronización con Tienda Virtual: ACTIVA</span>
                </div>
                <button class="bg-primary text-stone-900 px-8 py-3 rounded-full text-[10px] font-black uppercase tracking-widest hover:scale-105 transition-all shadow-lg">
                    Iniciar Procesamiento
                </button>
            </div>
        </div>

        <div class="col-span-12 lg:col-span-4 flex flex-col gap-6">
            <div class="bg-white border border-stone-200 p-8 rounded-[32px] shadow-sm flex-1">
                <p class="text-[10px] font-black text-stone-400 uppercase tracking-widest mb-4">Última Actualización</p>
                <h3 class="text-3xl font-headline font-black text-stone-900 uppercase leading-tight">Hoy, 10:24 AM</h3>
                <p class="text-[10px] text-stone-500 mt-2 font-bold uppercase">Por: Usuario Admin</p>
            </div>
            <div class="bg-primary border border-primary p-8 rounded-[32px] shadow-sm flex-1 group hover:bg-stone-900 transition-all duration-500 cursor-pointer">
                <p class="text-[10px] font-black text-stone-900 group-hover:text-primary uppercase tracking-widest mb-4">Items Sincronizados</p>
                <h3 class="text-5xl font-headline font-black text-stone-900 group-hover:text-white uppercase leading-tight tracking-tighter">1,388</h3>
                <div class="mt-4 flex items-center justify-between">
                    <span class="text-[10px] font-black text-stone-900/60 group-hover:text-primary/60 uppercase">Estatus Tienda</span>
                    <span class="material-symbols-outlined text-stone-900 group-hover:text-primary">language</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Integrity Dashboard: Preview Table -->
    <section class="bg-white border border-stone-200 rounded-[32px] shadow-sm overflow-hidden mb-12">
        <div class="p-8 border-b border-stone-50 flex justify-between items-center">
            <h3 class="text-[10px] font-black text-stone-900 uppercase tracking-[0.2em]">Pre-visualización de Cambios (Draft)</h3>
            <div class="flex gap-4">
                <button class="text-[10px] font-black text-stone-400 uppercase hover:text-red-500 transition-colors">Descartar Carga</button>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-stone-50/50 border-b border-stone-100 text-stone-400">
                        <th class="p-6 text-[10px] font-black uppercase tracking-widest text-center">∆</th>
                        <th class="p-6 text-[10px] font-black uppercase tracking-widest">SKU / ID</th>
                        <th class="p-6 text-[10px] font-black uppercase tracking-widest">Precio Anterior</th>
                        <th class="p-6 text-[10px] font-black uppercase tracking-widest">Precio Nuevo</th>
                        <th class="p-6 text-[10px] font-black uppercase tracking-widest text-center">Stock Actual</th>
                        <th class="p-6 text-[10px] font-black uppercase tracking-widest text-center">Stock Nuevo</th>
                        <th class="p-6 text-[10px] font-black uppercase tracking-widest text-right">Diferencia</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-50 font-body text-xs">
                    <tr class="hover:bg-stone-50 transition-colors">
                        <td class="p-6 text-center">
                            <span class="material-symbols-outlined text-green-500 text-sm italic">trending_up</span>
                        </td>
                        <td class="p-6 font-black text-stone-900 uppercase tracking-tighter">SUS-101-DEL</td>
                        <td class="p-6 text-stone-400 font-headline font-bold">$ 45.00</td>
                        <td class="p-6 text-stone-900 font-headline font-bold text-base">$ 48.50</td>
                        <td class="p-6 text-center font-black text-stone-400">88</td>
                        <td class="p-6 text-center font-black text-stone-900 text-sm">120</td>
                        <td class="p-6 text-right font-headline font-black text-green-600 text-lg">+ 7.8%</td>
                    </tr>
                    <tr class="hover:bg-stone-50 transition-colors italic opacity-60">
                        <td class="p-6 text-center">
                            <span class="material-symbols-outlined text-stone-400 text-sm">remove</span>
                        </td>
                        <td class="p-6 font-black text-stone-900 uppercase tracking-tighter">CAB-992-FRE</td>
                        <td class="p-6 text-stone-400 font-headline font-bold">$ 12.00</td>
                        <td class="p-6 text-stone-900 font-headline font-bold text-base">$ 12.00</td>
                        <td class="p-6 text-center font-black text-stone-400">45</td>
                        <td class="p-6 text-center font-black text-stone-900 text-sm">45</td>
                        <td class="p-6 text-right font-headline font-black text-stone-400 text-lg">0.0%</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
@endsection
