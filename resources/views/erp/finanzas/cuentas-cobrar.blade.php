@extends('erp.layouts.app')

@section('title', 'Cuentas por Cobrar | Zenith ERP')

@section('breadcrumb')
    <span class="material-symbols-outlined text-sm text-stone-400">chevron_right</span>
    <a href="{{ url('/erp/finanzas') }}" class="hover:text-stone-900 transition-colors">Finanzas</a>
    <span class="material-symbols-outlined text-sm text-stone-400">chevron_right</span>
    <span class="text-stone-900 font-medium">Cuentas por Cobrar</span>
@endsection

@section('content')
<section class="space-y-8">
    <!-- Header -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6">
        <div>
            <p class="text-[10px] font-black text-stone-400 tracking-[0.3em] uppercase mb-1">Gestión de Cartera y Cobranzas</p>
            <h2 class="text-3xl font-headline font-black text-stone-900 tracking-tighter uppercase">Cuentas por Cobrar</h2>
            <p class="text-stone-500 text-sm mt-1 font-medium italic">Control de saldos pendientes, antigüedad de deuda y recuperación de capital.</p>
        </div>
        <div class="flex gap-4">
            <div class="bg-stone-900 px-6 py-3 rounded-2xl border-l-4 border-primary shadow-lg shadow-stone-900/10">
                <p class="text-[9px] text-stone-400 uppercase tracking-widest font-black mb-1">Total Cartera</p>
                <p class="text-xl font-headline font-black text-white">$482,950.00</p>
            </div>
            <div class="bg-stone-900 px-6 py-3 rounded-2xl border-l-4 border-red-500 shadow-lg shadow-stone-900/10">
                <p class="text-[9px] text-stone-400 uppercase tracking-widest font-black mb-1">Cartera Vencida</p>
                <p class="text-xl font-headline font-black text-red-500">$124,300.00</p>
            </div>
        </div>
    </div>

    <!-- Bento Grid for Stats & Aging -->
    <div class="grid grid-cols-1 md:grid-cols-12 gap-8">
        <!-- Aging Report Card -->
        <div class="md:col-span-8 bg-white p-8 rounded-3xl border border-stone-200 shadow-sm relative overflow-hidden group">
            <div class="absolute -top-10 -right-10 p-12 opacity-5 group-hover:opacity-10 transition-opacity rotate-12">
                <span class="material-symbols-outlined text-[180px]">analytics</span>
            </div>
            
            <div class="relative z-10">
                <h3 class="font-headline text-lg font-black uppercase tracking-tight text-stone-900 mb-8 flex items-center gap-3">
                    <span class="w-1.5 h-6 bg-primary"></span> 
                    Antigüedad de Saldos
                </h3>
                
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
                    <div class="bg-stone-50 p-6 rounded-2xl border border-stone-100 group-hover:border-primary/20 transition-all">
                        <span class="block text-[9px] font-black uppercase tracking-widest text-stone-400 mb-3 text-center">Al día (0-30)</span>
                        <span class="block text-2xl font-headline font-black text-stone-900 text-center">$358,650</span>
                        <div class="w-full bg-stone-200 h-1.5 mt-5 rounded-full overflow-hidden">
                            <div class="bg-primary h-full w-[74%] transform origin-left group-hover:scale-x-110 transition-transform"></div>
                        </div>
                    </div>
                    
                    <div class="bg-stone-50 p-6 rounded-2xl border border-stone-100">
                        <span class="block text-[9px] font-black uppercase tracking-widest text-stone-400 mb-3 text-center">31-60 Días</span>
                        <span class="block text-2xl font-headline font-black text-stone-900 text-center">$62,100</span>
                        <div class="w-full bg-stone-200 h-1.5 mt-5 rounded-full overflow-hidden">
                            <div class="bg-amber-500 h-full w-[13%]"></div>
                        </div>
                    </div>

                    <div class="bg-stone-50 p-6 rounded-2xl border border-stone-100">
                        <span class="block text-[9px] font-black uppercase tracking-widest text-stone-400 mb-3 text-center">61-90 Días</span>
                        <span class="block text-2xl font-headline font-black text-stone-900 text-center">$41,800</span>
                        <div class="w-full bg-stone-200 h-1.5 mt-5 rounded-full overflow-hidden">
                            <div class="bg-orange-600 h-full w-[9%]"></div>
                        </div>
                    </div>

                    <div class="bg-stone-50 p-6 rounded-2xl border border-red-100 group-hover:border-red-200 transition-all">
                        <span class="block text-[9px] font-black uppercase tracking-widest text-red-400 mb-3 text-center">Crítico (90+)</span>
                        <span class="block text-2xl font-headline font-black text-red-600 text-center">$20,400</span>
                        <div class="w-full bg-stone-200 h-1.5 mt-5 rounded-full overflow-hidden">
                            <div class="bg-red-600 h-full w-[4%]"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Action Card -->
        <div class="md:col-span-4 bg-stone-900 text-white p-8 rounded-3xl flex flex-col justify-between shadow-xl shadow-stone-900/20 relative overflow-hidden group">
            <div class="absolute -bottom-12 -right-12 w-48 h-48 bg-primary/10 rounded-full blur-3xl transition-transform group-hover:scale-150"></div>
            
            <div class="relative z-10">
                <div class="w-14 h-14 bg-white/10 rounded-2xl flex items-center justify-center mb-10 group-hover:bg-primary group-hover:text-stone-900 transition-all">
                    <span class="material-symbols-outlined text-3xl">add_card</span>
                </div>
                <h3 class="font-headline text-2xl font-black uppercase tracking-tight mb-4">Registrar Cobro</h3>
                <p class="text-[11px] text-stone-400 font-medium leading-relaxed italic">Asiente pagos recibidos y aplique abonos a facturas pendientes de forma inmediata.</p>
            </div>
            
            <button class="relative z-10 w-full bg-primary text-stone-900 font-black text-[10px] py-4 px-4 rounded-xl uppercase tracking-widest flex items-center justify-center gap-3 hover:brightness-110 transition-all active:scale-[0.98]">
                Seleccionar Documento
                <span class="material-symbols-outlined text-sm">arrow_forward</span>
            </button>
        </div>
    </div>

    <!-- Customer Ledger Section -->
    <div class="bg-white rounded-3xl border border-stone-200 shadow-sm overflow-hidden">
        <div class="p-8 border-b border-stone-100 flex flex-col lg:flex-row justify-between items-center gap-6 bg-stone-50/50">
            <h3 class="text-xl font-headline font-black uppercase tracking-tight text-stone-900">Cartera Detallada</h3>
            <div class="flex flex-wrap items-center gap-4 w-full lg:w-auto">
                <div class="flex-1 lg:w-96 bg-white border border-stone-200 px-4 py-2.5 rounded-xl flex items-center gap-3 focus-within:border-primary transition-all">
                    <span class="material-symbols-outlined text-stone-400 text-lg">search</span>
                    <input type="text" placeholder="BUSCAR POR CLIENTE O RIF..." class="bg-transparent border-none p-0 text-[10px] font-black uppercase tracking-widest text-stone-900 w-full placeholder:text-stone-300 focus:ring-0">
                </div>
                <div class="flex gap-2">
                    <button class="bg-white border border-stone-200 px-4 py-2.5 rounded-xl text-[10px] font-black uppercase tracking-widest text-stone-600 hover:text-stone-900 hover:border-stone-900 transition-all flex items-center gap-2">
                        <span class="material-symbols-outlined text-sm">filter_list</span> Filtrar
                    </button>
                    <button class="bg-white border border-stone-200 px-4 py-2.5 rounded-xl text-[10px] font-black uppercase tracking-widest text-stone-600 hover:text-stone-900 hover:border-stone-900 transition-all flex items-center gap-2">
                        <span class="material-symbols-outlined text-sm">download</span> Reporte
                    </button>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-stone-50 border-b border-stone-100">
                        <th class="px-6 py-5 text-[10px] font-black uppercase tracking-widest text-stone-400">Cliente / Región</th>
                        <th class="px-6 py-5 text-[10px] font-black uppercase tracking-widest text-stone-400">RIF / Identificación</th>
                        <th class="px-6 py-5 text-[10px] font-black uppercase tracking-widest text-stone-400 text-right">Saldo Total</th>
                        <th class="px-6 py-5 text-[10px] font-black uppercase tracking-widest text-stone-400 text-center">Fact. Vencidas</th>
                        <th class="px-6 py-5 text-[10px] font-black uppercase tracking-widest text-stone-400 text-center">Antigüedad</th>
                        <th class="px-6 py-5 text-[10px] font-black uppercase tracking-widest text-stone-400">Estado Cartera</th>
                        <th class="px-6 py-5 text-[10px] font-black uppercase tracking-widest text-stone-400 text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-100">
                    <tr class="hover:bg-amber-50/20 transition-all group">
                        <td class="px-6 py-5">
                            <p class="text-[12px] font-black text-stone-900 uppercase tracking-tight">REPUESTOS EL MOTOR, C.A.</p>
                            <p class="text-[9px] text-stone-400 font-black uppercase tracking-widest">Mayorista • Región Central</p>
                        </td>
                        <td class="px-6 py-5 text-[11px] font-bold text-stone-500 tracking-wider">J-31245678-0</td>
                        <td class="px-6 py-5 text-[14px] font-black text-stone-900 text-right">$45,200.00</td>
                        <td class="px-6 py-5 text-center">
                            <span class="px-3 py-1 bg-stone-100 text-stone-600 text-[9px] font-black uppercase rounded-lg border border-stone-200">03 FACT</span>
                        </td>
                        <td class="px-6 py-5 text-center text-[11px] font-bold text-stone-500">45 Días</td>
                        <td class="px-6 py-5">
                            <span class="flex items-center gap-2 text-[10px] font-black uppercase text-amber-600">
                                <span class="w-2 h-2 rounded-full bg-amber-500 animate-pulse"></span>
                                Pendiente
                            </span>
                        </td>
                        <td class="px-6 py-5 text-right">
                            <button class="w-10 h-10 rounded-xl flex items-center justify-center text-stone-300 hover:text-stone-900 hover:bg-stone-100 transition-all">
                                <span class="material-symbols-outlined">more_vert</span>
                            </button>
                        </td>
                    </tr>
                    
                    <tr class="hover:bg-red-50/20 transition-all group bg-red-50/5">
                        <td class="px-6 py-5">
                            <p class="text-[12px] font-black text-stone-900 uppercase tracking-tight">SERVICIOS INTEGRALES TÉCNICOS</p>
                            <p class="text-[9px] text-stone-400 font-black uppercase tracking-widest">Taller • Barquisimeto</p>
                        </td>
                        <td class="px-6 py-5 text-[11px] font-bold text-stone-500 tracking-wider">J-40552132-1</td>
                        <td class="px-6 py-5 text-[14px] font-black text-red-600 text-right">$12,850.00</td>
                        <td class="px-6 py-5 text-center">
                            <span class="px-3 py-1 bg-red-50 text-red-700 text-[9px] font-black uppercase rounded-lg border border-red-200">05 FACT</span>
                        </td>
                        <td class="px-6 py-5 text-center text-[11px] font-black text-red-600">94 Días</td>
                        <td class="px-6 py-5">
                            <span class="flex items-center gap-2 text-[10px] font-black uppercase text-red-600">
                                <span class="w-2 h-2 rounded-full bg-red-600"></span>
                                Riesgo Crítico
                            </span>
                        </td>
                        <td class="px-6 py-5 text-right">
                            <button class="w-10 h-10 rounded-xl flex items-center justify-center text-stone-300 hover:text-red-600 hover:bg-red-100 transition-all">
                                <span class="material-symbols-outlined">more_vert</span>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="px-8 py-6 bg-stone-50 border-t border-stone-100 flex flex-col md:flex-row justify-between items-center gap-4">
            <span class="text-[10px] font-black text-stone-400 uppercase tracking-widest font-headline">Auditoría de cartera industrial en tiempo real</span>
            <div class="flex items-center gap-2">
                <button class="w-10 h-10 border border-stone-200 rounded-xl flex items-center justify-center text-stone-400 hover:border-stone-900 hover:text-stone-900 transition-all"><span class="material-symbols-outlined">chevron_left</span></button>
                <div class="flex gap-1">
                    <button class="w-10 h-10 bg-stone-900 text-white rounded-xl text-[10px] font-black">01</button>
                    <button class="w-10 h-10 bg-white border border-stone-200 text-stone-900 rounded-xl text-[10px] font-black hover:border-stone-900 transitions-all">02</button>
                </div>
                <button class="w-10 h-10 border border-stone-200 rounded-xl flex items-center justify-center text-stone-400 hover:border-stone-900 hover:text-stone-900 transition-all"><span class="material-symbols-outlined">chevron_right</span></button>
            </div>
        </div>
    </div>
</section>
@endsection
