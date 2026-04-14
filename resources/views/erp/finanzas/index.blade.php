@extends('erp.layouts.app')

@section('title', 'Control Financiero | Zenith ERP')

@section('breadcrumb')
    <span class="material-symbols-outlined text-sm text-stone-400">chevron_right</span>
    <span class="text-stone-900 font-medium">Finanzas</span>
@endsection

@section('content')
<section class="space-y-8">
    <!-- Header -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4">
        <div>
            <p class="text-[10px] font-black text-stone-400 tracking-[0.3em] uppercase mb-1">Indicadores de Desempeño Financiero</p>
            <h2 class="text-3xl font-headline font-black text-stone-900 tracking-tighter uppercase">Gestión de Tesorería</h2>
            <p class="text-stone-500 text-sm mt-1 font-medium">Monitoreo de activos, pasivos y flujo de caja en tiempo real.</p>
        </div>
        <div class="flex gap-3">
            <a href="{{ url('/erp/finanzas/reportes') }}" class="flex items-center gap-2 bg-stone-900 text-white px-6 py-2.5 rounded-xl text-[10px] font-black uppercase tracking-widest hover:bg-primary hover:text-stone-900 transition-all active:scale-95 shadow-lg shadow-stone-900/10">
                <span class="material-symbols-outlined text-sm">show_chart</span>
                Análisis Financiero
            </a>
        </div>
    </div>

    <!-- KPI Cards - Bento Style -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white p-6 rounded-2xl border border-stone-200 shadow-sm hover:border-primary transition-all">
            <div class="flex justify-between items-start mb-4">
                <div class="w-10 h-10 bg-stone-900 rounded-lg flex items-center justify-center">
                    <span class="material-symbols-outlined text-primary">savings</span>
                </div>
                <span class="px-2 py-1 bg-lime-100 text-lime-700 text-[9px] font-black uppercase rounded-md">+8.2%</span>
            </div>
            <p class="text-[10px] font-black text-stone-400 uppercase tracking-widest mb-1">Activos Totales</p>
            <p class="text-2xl font-headline font-black text-stone-900">$450,000.00</p>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-stone-200 shadow-sm hover:border-red-500/30 transition-all text-stone-900">
            <div class="flex justify-between items-start mb-4">
                <div class="w-10 h-10 bg-red-50 rounded-lg flex items-center justify-center">
                    <span class="material-symbols-outlined text-red-500">account_balance_wallet</span>
                </div>
                <span class="px-2 py-1 bg-red-100 text-red-700 text-[9px] font-black uppercase rounded-md">$180K</span>
            </div>
            <p class="text-[10px] font-black text-stone-400 uppercase tracking-widest mb-1">Pasivos Totales</p>
            <p class="text-2xl font-headline font-black text-stone-900">$180,000.00</p>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-stone-200 shadow-sm hover:border-blue-500/30 transition-all">
            <div class="flex justify-between items-start mb-4">
                <div class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center">
                    <span class="material-symbols-outlined text-blue-600">trending_up</span>
                </div>
                <span class="px-2 py-1 bg-blue-100 text-blue-700 text-[9px] font-black uppercase rounded-md">+12%</span>
            </div>
            <p class="text-[10px] font-black text-stone-400 uppercase tracking-widest mb-1">Patrimonio Neto</p>
            <p class="text-2xl font-headline font-black text-stone-900">$270,000.00</p>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-stone-200 shadow-sm hover:border-amber-500/30 transition-all">
            <div class="flex justify-between items-start mb-4">
                <div class="w-10 h-10 bg-amber-50 rounded-lg flex items-center justify-center">
                    <span class="material-symbols-outlined text-amber-600">corporate_fare</span>
                </div>
                <span class="px-2 py-1 bg-amber-100 text-amber-700 text-[9px] font-black uppercase rounded-md">$85K</span>
            </div>
            <p class="text-[10px] font-black text-stone-400 uppercase tracking-widest mb-1">Activos Fijos</p>
            <p class="text-2xl font-headline font-black text-stone-900">$85,000.00</p>
        </div>
    </div>

    <!-- Action Shortcuts -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <a href="{{ url('/erp/finanzas/activos-fijos') }}" class="group bg-stone-900 p-8 rounded-2xl flex items-center gap-6 hover:bg-stone-800 transition-all shadow-xl shadow-stone-900/10 active:scale-[0.98]">
            <div class="w-14 h-14 bg-stone-800 rounded-xl flex items-center justify-center group-hover:bg-primary transition-all">
                <span class="material-symbols-outlined text-white text-3xl group-hover:text-stone-900 transition-all">corporate_fare</span>
            </div>
            <div>
                <h3 class="font-headline text-xl font-bold text-white uppercase tracking-tight">Activos Fijos</h3>
                <p class="text-[10px] text-stone-500 font-black uppercase tracking-widest">Maquinaria y Equipos</p>
            </div>
        </a>

        <a href="{{ url('/erp/finanzas/cuentas-cobrar') }}" class="group bg-white p-8 rounded-2xl border border-stone-200 flex items-center gap-6 hover:border-primary transition-all shadow-sm active:scale-[0.98]">
            <div class="w-14 h-14 bg-stone-50 rounded-xl flex items-center justify-center group-hover:bg-primary/20 transition-all">
                <span class="material-symbols-outlined text-stone-400 text-3xl group-hover:text-primary transition-all">account_balance_wallet</span>
            </div>
            <div>
                <h3 class="font-headline text-xl font-bold text-stone-900 uppercase tracking-tight">Cuentas por Cobrar</h3>
                <p class="text-[10px] text-stone-400 font-black uppercase tracking-widest">Gestión de Cobranzas</p>
            </div>
        </a>

        <a href="{{ url('/erp/finanzas/reportes') }}" class="group bg-white p-8 rounded-2xl border border-stone-200 flex items-center gap-6 hover:border-primary transition-all shadow-sm active:scale-[0.98]">
            <div class="w-14 h-14 bg-stone-50 rounded-xl flex items-center justify-center group-hover:bg-primary/20 transition-all">
                <span class="material-symbols-outlined text-stone-400 text-3xl group-hover:text-primary transition-all">show_chart</span>
            </div>
            <div>
                <h3 class="font-headline text-xl font-bold text-stone-900 uppercase tracking-tight">Reportes</h3>
                <p class="text-[10px] text-stone-400 font-black uppercase tracking-widest">Métricas y Gráficos</p>
            </div>
        </a>
    </div>

    <!-- Comparative Overview -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Balance Analyzer -->
        <div class="bg-white rounded-2xl border border-stone-200 shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-stone-100 bg-stone-50/50 flex justify-between items-center">
                <h3 class="font-headline text-lg font-black uppercase tracking-tight text-stone-900">Activos vs Pasivos</h3>
                <span class="text-[9px] font-black text-stone-400 uppercase tracking-widest">Snapshot Mensual</span>
            </div>
            <div class="p-8 space-y-8">
                <div>
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-[10px] font-black text-stone-700 uppercase tracking-widest">Activos Totales</span>
                        <span class="font-headline text-lg font-bold text-lime-600">$450,000</span>
                    </div>
                    <div class="h-3 bg-stone-100 rounded-full overflow-hidden">
                        <div class="h-full bg-lime-500 w-[75%]"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-[10px] font-black text-stone-700 uppercase tracking-widest">Pasivos Totales</span>
                        <span class="font-headline text-lg font-bold text-red-500">$180,000</span>
                    </div>
                    <div class="h-3 bg-stone-100 rounded-full overflow-hidden">
                        <div class="h-full bg-red-500 w-[40%]"></div>
                    </div>
                </div>
                <div class="pt-4 border-t border-stone-100">
                    <p class="text-[9px] text-stone-400 font-black uppercase tracking-[0.2em] italic mb-2">Saldo Patrimonial Garantizado</p>
                    <p class="font-headline text-3xl font-black text-stone-900">$270,000.00</p>
                </div>
            </div>
        </div>

        <!-- Receivables Ledger -->
        <div class="bg-white rounded-2xl border border-stone-200 shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-stone-100 bg-stone-50/50 flex justify-between items-center">
                <h3 class="font-headline text-lg font-black uppercase tracking-tight text-stone-900">Cartera de Cobranza</h3>
                <span class="material-symbols-outlined text-stone-400 text-sm">more_vert</span>
            </div>
            <div class="p-4">
                <div class="space-y-3">
                    <div class="flex items-center justify-between p-4 bg-lime-50 rounded-2xl border border-lime-100">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center shadow-sm">
                                <span class="material-symbols-outlined text-lime-600">check_circle</span>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-stone-900 uppercase tracking-tight">Al Día</p>
                                <p class="text-[9px] text-stone-500 font-black tracking-widest uppercase">0-30 Días</p>
                            </div>
                        </div>
                        <span class="font-headline text-xl font-bold text-stone-900">$45,000</span>
                    </div>
                    
                    <div class="flex items-center justify-between p-4 bg-amber-50 rounded-2xl border border-amber-100 text-stone-900">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center shadow-sm">
                                <span class="material-symbols-outlined text-amber-500">pending</span>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-stone-900 uppercase tracking-tight">Próximos a Vencer</p>
                                <p class="text-[9px] text-stone-500 font-black tracking-widest uppercase">31-60 Días</p>
                            </div>
                        </div>
                        <span class="font-headline text-xl font-bold text-stone-900">$28,000</span>
                    </div>

                    <div class="flex items-center justify-between p-4 bg-red-50 rounded-2xl border border-red-100 text-stone-900">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center shadow-sm">
                                <span class="material-symbols-outlined text-red-500">warning</span>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-stone-900 uppercase tracking-tight">Vencidos</p>
                                <p class="text-[9px] text-stone-500 font-black tracking-widest uppercase">+60 Días</p>
                            </div>
                        </div>
                        <span class="font-headline text-xl font-bold text-stone-900">$12,000</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
