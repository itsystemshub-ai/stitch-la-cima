@extends('layouts.erp')

@section('title', 'Monitor Financiero')

@section('content')
<main class="ml-[288px] w-[calc(100vw-288px)] mt-[65px] p-6 pb-4">
    
    <div class="flex justify-between items-end mb-8">
        <div>
            <p class="text-[10px] font-bold text-stone-400 tracking-[0.2em] uppercase mb-1">Tesorería & Liquidez</p>
            <h2 class="text-3xl font-headline font-black text-stone-900 tracking-tight text-uppercase">MONITOR FINANCIERO</h2>
            <div class="flex items-center gap-2 mt-1">
                <span class="flex items-center gap-1 text-[10px] font-bold text-green-600 bg-green-50 px-2 py-0.5 rounded-full">
                    <span class="material-symbols-outlined text-[12px]">account_balance_wallet</span>
                    EFECTIVO DISPONIBLE: $482,500
                </span>
            </div>
        </div>
        <div class="flex gap-2">
            <button class="bg-stone-900 text-white px-5 py-2.5 rounded-xl font-bold text-xs uppercase shadow-premium hover:brightness-110 transition-all flex items-center gap-2">
                <span class="material-symbols-outlined text-sm">currency_exchange</span>
                Registrar Movimiento Caja
            </button>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-8">
        <div class="premium-card bg-stone-900 text-white">
            <p class="text-stone-400 text-[10px] font-bold uppercase tracking-widest mb-2">EBITDA Anual</p>
            <h4 class="text-3xl font-headline font-black text-primary">$1,245,600</h4>
            <p class="text-[9px] mt-2 font-bold text-stone-500 uppercase tracking-tighter italic">+12% vs Periodo Anterior</p>
        </div>
        <div class="premium-card">
            <p class="text-stone-400 text-[10px] font-bold uppercase tracking-widest mb-2">Cuentas por Cobrar</p>
            <h4 class="text-3xl font-headline font-black text-stone-900">$84,500</h4>
            <p class="text-stone-400 text-[9px] mt-1 font-bold">12 facturas vencidas</p>
        </div>
        <div class="premium-card">
            <p class="text-stone-400 text-[10px] font-bold uppercase tracking-widest mb-2">Cuentas por Pagar</p>
            <h4 class="text-3xl font-headline font-black text-stone-900">$12,800</h4>
            <p class="text-green-500 text-[9px] mt-1 font-bold italic uppercase">Solvencia de proveedores: 98%</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Banks Table -->
        <div class="premium-card p-0 overflow-hidden">
            <div class="px-6 py-4 border-b border-stone-100 flex justify-between items-center bg-stone-50/30">
                <h3 class="text-sm font-bold text-stone-900 uppercase tracking-widest">Saldos en Bancos</h3>
            </div>
            <div class="p-6 space-y-4">
                <div class="flex items-center justify-between p-4 border border-stone-100 rounded-2xl transition-all hover:bg-stone-50/50 cursor-pointer">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-blue-50 text-blue-600 rounded-lg flex items-center justify-center font-black">B</div>
                        <div>
                            <p class="text-xs font-black text-stone-900 uppercase leading-none">Banesco Banco Universal</p>
                            <p class="text-[9px] text-stone-400 mt-1 uppercase">Cta. Corriente Corproativa</p>
                        </div>
                    </div>
                    <p class="text-sm font-black text-stone-900 font-headline tracking-tighter">$142,500.00</p>
                </div>
                <div class="flex items-center justify-between p-4 border border-stone-100 rounded-2xl transition-all hover:bg-stone-50/50 cursor-pointer">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-stone-100 text-stone-600 rounded-lg flex items-center justify-center font-black">M</div>
                        <div>
                            <p class="text-xs font-black text-stone-900 uppercase leading-none">Banco Mercantil</p>
                            <p class="text-[9px] text-stone-400 mt-1 uppercase">Cta. Recaudación Ventas</p>
                        </div>
                    </div>
                    <p class="text-sm font-black text-stone-900 font-headline tracking-tighter">$85,200.00</p>
                </div>
            </div>
        </div>

        <!-- Investment Card -->
        <div class="premium-card p-0 overflow-hidden border-orange-200">
             <div class="px-6 py-4 border-b border-orange-100 flex justify-between items-center bg-orange-50/20">
                <h3 class="text-sm font-bold text-orange-900 uppercase tracking-widest">Inversión en Activos</h3>
            </div>
            <div class="p-8 text-center flex flex-col items-center justify-center min-h-[220px]">
                <span class="material-symbols-outlined text-5xl text-orange-200 mb-4 scale-125">corporate_fare</span>
                <p class="text-[10px] font-black text-orange-900 uppercase tracking-widest mb-1">Valorización de Activos Fijos</p>
                <h3 class="text-4xl font-headline font-black text-stone-900">$842,500.00</h3>
                <p class="text-[9px] text-stone-400 mt-6 uppercase font-bold tracking-widest italic">Actualizado al Cierre Trimestral Q1 2026</p>
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
