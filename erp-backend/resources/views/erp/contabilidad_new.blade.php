@extends('layouts.erp')

@section('title', 'Monitor Contable')

@section('content')
<main class="ml-[288px] w-[calc(100vw-288px)] mt-[65px] p-6 pb-4">
    
    <div class="flex justify-between items-end mb-8">
        <div>
            <p class="text-[10px] font-bold text-stone-400 tracking-[0.2em] uppercase mb-1">Administración Central</p>
            <h2 class="text-3xl font-headline font-black text-stone-900 tracking-tight text-uppercase">MONITOR CONTABLE</h2>
            <div class="flex items-center gap-2 mt-1">
                <span class="flex items-center gap-1 text-[10px] font-bold text-blue-600 bg-blue-50 px-2 py-0.5 rounded-full">
                    <span class="material-symbols-outlined text-[12px]">account_balance</span>
                    PERIODO FISCAL 2026 ABIERTO
                </span>
            </div>
        </div>
        <div class="flex gap-2">
            <button class="bg-stone-900 text-white px-5 py-2.5 rounded-xl font-bold text-xs uppercase shadow-premium hover:brightness-110 transition-all flex items-center gap-2">
                <span class="material-symbols-outlined text-sm">history_edu</span>
                Nuevo Asiento Manual
            </button>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-5 mb-8">
        <div class="premium-card">
            <p class="text-stone-400 text-[10px] font-bold uppercase tracking-widest mb-2">Activo Total</p>
            <h4 class="text-3xl font-headline font-black text-stone-900">$1,245,000</h4>
        </div>
        <div class="premium-card border-l-4 border-l-red-500">
            <p class="text-stone-400 text-[10px] font-bold uppercase tracking-widest mb-2">Pasivo Exigible</p>
            <h4 class="text-3xl font-headline font-black text-stone-900">$215,800</h4>
        </div>
        <div class="premium-card border-l-4 border-l-green-500 text-green-600">
            <p class="text-stone-400 text-[10px] font-bold uppercase tracking-widest mb-2">Utilidad Bruta</p>
            <h4 class="text-3xl font-headline font-black">$842,500</h4>
        </div>
        <div class="premium-card border-l-4 border-l-primary">
            <p class="text-stone-400 text-[10px] font-bold uppercase tracking-widest mb-2">Patrimonio Neto</p>
            <h4 class="text-3xl font-headline font-black text-stone-900">$1,029,200</h4>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Status & Books -->
        <div class="lg:col-span-2 premium-card">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-sm font-bold text-stone-900 uppercase tracking-widest">Estado Jurídico y Libros</h3>
                <div class="flex gap-2">
                    <a href="/erp/libros-legales" class="text-[10px] font-bold text-stone-400 uppercase hover:text-primary transition-colors">Gestionar Libros</a>
                </div>
            </div>
            <div class="space-y-4">
                <div class="flex items-center justify-between p-4 bg-stone-50 rounded-2xl border border-stone-100">
                    <div class="flex items-center gap-4">
                        <span class="material-symbols-outlined text-stone-900">menu_book</span>
                        <div>
                            <p class="text-xs font-black text-stone-900 uppercase">Libro Diario</p>
                            <p class="text-[10px] text-stone-400 italic">Último asiento: Hoy 10:24 AM</p>
                        </div>
                    </div>
                    <span class="px-2 py-1 bg-green-100 text-green-700 text-[10px] font-bold rounded uppercase">AL DÍA</span>
                </div>
                <div class="flex items-center justify-between p-4 bg-stone-50 rounded-2xl border border-stone-100">
                    <div class="flex items-center gap-4">
                        <span class="material-symbols-outlined text-stone-900">inventory</span>
                        <div>
                            <p class="text-xs font-black text-stone-900 uppercase">Libro de Inventario</p>
                            <p class="text-[10px] text-stone-400 italic">Pendiente Foliación de Folio 154</p>
                        </div>
                    </div>
                    <span class="px-2 py-1 bg-yellow-100 text-yellow-700 text-[10px] font-bold rounded uppercase">PENDIENTE</span>
                </div>
            </div>
        </div>

        <!-- Tax Deadlines -->
        <div class="premium-card">
            <h3 class="text-sm font-bold text-stone-900 uppercase tracking-widest mb-6">Próximos Vencimientos IVA</h3>
            <div class="space-y-6">
                <div class="bg-red-50 p-4 rounded-2xl border border-red-100/50">
                    <p class="text-[10px] font-black text-red-600 uppercase tracking-widest mb-1">Declaración IVA</p>
                    <p class="text-sm font-bold text-stone-900">Vence en: 4 Días</p>
                    <div class="w-full bg-red-200 h-1.5 mt-3 rounded-full overflow-hidden">
                        <div class="bg-red-600 h-full w-[80%]"></div>
                    </div>
                </div>
                <div class="bg-stone-50 p-4 rounded-2xl border border-stone-100">
                    <p class="text-[10px] font-black text-stone-400 uppercase tracking-widest mb-1">Impuesto Sobre la Renta (ISLR)</p>
                    <p class="text-sm font-bold text-stone-900 italic">Estimación Trimestral: En Proceso</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Identity -->
    <div class="mt-8 pt-4 border-t border-stone-100 flex justify-between items-center text-[10px] font-bold text-stone-400 uppercase tracking-widest">
        <span class="entity-rif">RIF: J-40308741-5</span>
        <span class="entity-name">Mayor de Repuesto La Cima, C.A.</span>
    </div>
</main>
@endsection
