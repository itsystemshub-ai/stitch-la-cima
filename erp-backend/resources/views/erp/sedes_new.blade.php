@extends('layouts.erp')

@section('title', 'Gestion de Sedes')

@section('content')
<main class="ml-[288px] w-[calc(100vw-288px)] mt-[65px] p-6 pb-4">
    
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4 mb-8">
        <div>
            <nav class="flex gap-2 text-[10px] font-bold text-stone-400 uppercase tracking-widest mb-2">
                <a href="/erp/inicio" class="hover:text-primary transition-colors">Dashboard</a>
                <span>/</span>
                <span class="text-stone-900">Maestros</span>
                <span>/</span>
                <span class="text-stone-900">Sedes</span>
            </nav>
            <h2 class="text-3xl font-headline font-black text-stone-900 tracking-tight">SEDES Y ALMACENES</h2>
            <p class="text-stone-500 text-sm">Control multi-sucursal del ecosistema empresarial y centros logísticos.</p>
        </div>
        <button class="bg-stone-900 text-white px-6 py-2.5 rounded-xl text-xs font-black uppercase tracking-widest flex items-center gap-2 hover:bg-black transition-all shadow-premium">
            <span class="material-symbols-outlined text-sm text-primary">location_on</span>
            Registrar Sede
        </button>
    </div>

    <!-- Sedes Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Casa Matriz -->
        <div class="premium-card relative overflow-hidden group">
            <div class="absolute top-0 right-0 p-4">
                <span class="px-2 py-1 bg-primary text-stone-900 text-[8px] font-black uppercase rounded shadow-lg shadow-primary/20">Principal</span>
            </div>
            <div class="flex items-center gap-4 mb-6">
                <div class="w-14 h-14 bg-stone-100 rounded-2xl flex items-center justify-center">
                    <span class="material-symbols-outlined text-3xl text-stone-900">apartment</span>
                </div>
                <div>
                    <h4 class="text-xl font-black text-stone-900 tracking-tighter uppercase italic">CASA MATRIZ - VALENCIA</h4>
                    <p class="text-[10px] font-bold text-stone-400 uppercase tracking-widest leading-none">Código: SED-001</p>
                </div>
            </div>
            <div class="space-y-3 mb-6">
                <div class="flex items-start gap-2">
                    <span class="material-symbols-outlined text-stone-400 text-sm mt-0.5">place</span>
                    <p class="text-xs text-stone-600 leading-relaxed italic">EDIF. MULTICENTRO PASEO EL PARRAL, OFICINA NO. 2-3-C, VALENCIA, CARABOBO.</p>
                </div>
                <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-stone-400 text-sm">call</span>
                    <p class="text-xs text-stone-600 font-bold">+58 241 850 4433</p>
                </div>
            </div>
            <div class="grid grid-cols-3 gap-3">
                <div class="p-3 bg-stone-50 rounded-xl text-center">
                    <p class="text-[8px] font-bold text-stone-400 uppercase">Personal</p>
                    <p class="text-lg font-black font-headline text-stone-900">12</p>
                </div>
                <div class="p-3 bg-stone-50 rounded-xl text-center">
                    <p class="text-[8px] font-bold text-stone-400 uppercase">Módulos</p>
                    <p class="text-[10px] font-black font-headline text-stone-900">CONT/ADM</p>
                </div>
                <div class="p-3 bg-stone-900 rounded-xl text-center">
                    <p class="text-[8px] font-bold text-primary uppercase">Stock</p>
                    <p class="text-lg font-black font-headline text-white italic tracking-tighter uppercase">HI</p>
                </div>
            </div>
        </div>

        <!-- Almacen Recreo -->
        <div class="premium-card relative overflow-hidden group">
            <div class="absolute top-0 right-0 p-4">
                <span class="px-2 py-1 bg-blue-100 text-blue-700 text-[8px] font-black uppercase rounded">Logística</span>
            </div>
            <div class="flex items-center gap-4 mb-6">
                <div class="w-14 h-14 bg-stone-100 rounded-2xl flex items-center justify-center">
                    <span class="material-symbols-outlined text-3xl text-stone-900">warehouse</span>
                </div>
                <div>
                    <h4 class="text-xl font-black text-stone-900 tracking-tighter uppercase italic">ALMACÉN EL RECREO</h4>
                    <p class="text-[10px] font-bold text-stone-400 uppercase tracking-widest leading-none">Código: SED-002</p>
                </div>
            </div>
            <div class="space-y-3 mb-6">
                <div class="flex items-start gap-2">
                    <span class="material-symbols-outlined text-stone-400 text-sm mt-0.5">place</span>
                    <p class="text-xs text-stone-600 leading-relaxed italic">URB. INDUSTRIAL EL RECREO, GALPÓN 5, VALENCIA, CARABOBO.</p>
                </div>
                <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-stone-400 text-sm">inventory</span>
                    <p class="text-xs text-stone-600 font-bold uppercase tracking-tight">CAPACIDAD: 85% OCUPADO</p>
                </div>
            </div>
            <div class="grid grid-cols-3 gap-3">
                <div class="p-3 bg-stone-50 rounded-xl text-center">
                    <p class="text-[8px] font-bold text-stone-400 uppercase">Personal</p>
                    <p class="text-lg font-black font-headline text-stone-900">8</p>
                </div>
                <div class="p-3 bg-stone-50 rounded-xl text-center">
                    <p class="text-[8px] font-bold text-stone-400 uppercase">Módulos</p>
                    <p class="text-[10px] font-black font-headline text-stone-900">INV/LOG</p>
                </div>
                <div class="p-3 bg-blue-600 rounded-xl text-center">
                    <p class="text-[8px] font-bold text-white uppercase">Stock</p>
                    <p class="text-lg font-black font-headline text-white italic tracking-tighter uppercase">MAX</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Identity -->
    <div class="mt-8 pt-4 border-t border-stone-100 flex justify-between items-center text-[10px] font-bold text-stone-400 uppercase tracking-widest">
        <span class="entity-rif">RIF: J-40308741-5</span>
        <span class="entity-name uppercase tracking-[0.2em]">Mayor de Repuesto La Cima, C.A.</span>
    </div>
</main>
@endsection
