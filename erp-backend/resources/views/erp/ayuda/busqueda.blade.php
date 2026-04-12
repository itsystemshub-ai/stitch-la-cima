@extends('erp.layouts.app')

@section('title', 'Búsqueda Avanzada')

@section('breadcrumb')
    <a href="{{ url('/erp/inicio') }}" class="hover:text-stone-900 transition-colors">ERP</a>
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <a href="{{ url('/erp/ayuda') }}" class="hover:text-stone-900 transition-colors">Ayuda</a>
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <span class="text-stone-900">Búsqueda Avanzada</span>
@endsection

@section('content')
    <!-- Page Header -->
    <div class="mb-12 border-b border-stone-100 pb-10">
        <div class="flex items-center gap-2 mb-4">
            <span class="w-8 h-[2px] bg-primary"></span>
            <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em]">Motor de Indexación Global</p>
        </div>
        <h1 class="text-6xl font-headline font-black text-stone-900 tracking-tighter uppercase leading-none">Búsqueda <span class="text-stone-400">Avanzada</span></h1>
    </div>

    <!-- Search Tool -->
    <div class="max-w-4xl mx-auto mb-16 px-4">
        <div class="bg-white border border-stone-200 p-4 rounded-[32px] shadow-xl flex items-center gap-4 focus-within:ring-4 focus-within:ring-primary/10 transition-all">
            <span class="material-symbols-outlined text-stone-400 ml-4">search</span>
            <input type="text" placeholder="Buscar por RIF, Nombre, Documento, Serial o Categoría..." class="flex-1 border-none focus:ring-0 text-xl font-bold placeholder:text-stone-300">
            <button class="bg-stone-900 text-primary px-10 py-4 text-[10px] font-black uppercase tracking-widest rounded-2xl hover:bg-black transition-all active:scale-95">Consultar</button>
        </div>
        <p class="text-center text-[10px] font-bold text-stone-400 uppercase mt-4 tracking-widest">Atajo: Presiona <span class="bg-stone-100 px-2 py-0.5 rounded border border-stone-200 text-stone-900">CMD + K</span> para búsqueda rápida</p>
    </div>

    <!-- Filter Bento Grid -->
    <div class="grid grid-cols-12 gap-8">
        <div class="col-span-12 lg:col-span-8 bg-stone-50 border border-stone-100 p-10 rounded-[40px]">
            <h3 class="text-[10px] font-black text-stone-900 uppercase tracking-widest mb-8">Filtros Inteligentes</h3>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
                <!-- Select Mocks -->
                <div class="space-y-2">
                    <label class="text-[9px] font-black text-stone-400 uppercase">Módulo</label>
                    <select class="w-full bg-white border-stone-200 rounded-xl text-xs font-bold p-3">
                        <option>Todos los Archivos</option>
                        <option>Ventas</option>
                        <option>Inventario</option>
                    </select>
                </div>
                <!-- Add more filters here -->
            </div>
        </div>
    </div>
@endsection
