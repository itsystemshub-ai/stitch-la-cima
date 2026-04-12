@extends('erp.layouts.app')

@section('title', 'Reportes Financieros | Zenith ERP')

@section('breadcrumb')
    <span class="material-symbols-outlined text-sm text-stone-400">chevron_right</span>
    <a href="{{ url('/erp/finanzas') }}" class="hover:text-stone-900 transition-colors">Finanzas</a>
    <span class="material-symbols-outlined text-sm text-stone-400">chevron_right</span>
    <span class="text-stone-900 font-medium">Reportes</span>
@endsection

@section('content')
<section class="space-y-8">
    <!-- Header -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6">
        <div>
            <p class="text-[10px] font-black text-stone-400 tracking-[0.3em] uppercase mb-1">Centro de Inteligencia de Datos</p>
            <h2 class="text-3xl font-headline font-black text-stone-900 tracking-tighter uppercase">Reportes Financieros</h2>
            <p class="text-stone-500 text-sm mt-1 font-medium italic">Análisis profundo de liquidez, rentabilidad y flujo de efectivo industrial.</p>
        </div>
        <div class="flex gap-3">
            <button class="flex items-center gap-2 bg-stone-900 text-white px-6 py-2.5 rounded-xl text-[10px] font-black uppercase tracking-widest hover:bg-primary hover:text-stone-900 transition-all active:scale-95 shadow-lg shadow-stone-900/10">
                <span class="material-symbols-outlined text-sm">ios_share</span>
                Exportar BI
            </button>
        </div>
    </div>

    <!-- Hero Ratios Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white p-6 rounded-2xl border border-stone-200 shadow-sm border-t-4 border-stone-900">
            <p class="text-[9px] font-black text-stone-400 uppercase tracking-widest mb-4">Razón Corriente</p>
            <div class="flex items-baseline gap-2">
                <span class="text-3xl font-headline font-black text-stone-900">2.41</span>
                <span class="text-[10px] font-black text-lime-600 uppercase">+12%</span>
            </div>
            <div class="mt-3 h-1 bg-stone-100 rounded-full overflow-hidden">
                <div class="h-full bg-primary w-[75%]"></div>
            </div>
            <p class="mt-3 text-[9px] font-black text-stone-500 uppercase italic">Umbral Óptimo: > 2.0</p>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-stone-200 shadow-sm border-t-4 border-primary">
            <p class="text-[9px] font-black text-stone-400 uppercase tracking-widest mb-4">Prueba Ácida</p>
            <div class="flex items-baseline gap-2">
                <span class="text-3xl font-headline font-black text-stone-900">1.85</span>
                <span class="text-[10px] font-black text-lime-600 uppercase">+4%</span>
            </div>
            <div class="mt-3 h-1 bg-stone-100 rounded-full overflow-hidden">
                <div class="h-full bg-stone-900 w-[62%]"></div>
            </div>
            <p class="mt-3 text-[9px] font-black text-stone-500 uppercase italic">Liquidez: Fuerte</p>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-stone-200 shadow-sm border-t-4 border-stone-900">
            <p class="text-[9px] font-black text-stone-400 uppercase tracking-widest mb-4">EBITDA Mensual</p>
            <div class="flex items-baseline gap-2">
                <span class="text-3xl font-headline font-black text-stone-900">$1.2M</span>
                <span class="text-[10px] font-black text-stone-400 uppercase">Estable</span>
            </div>
            <div class="mt-3 h-1 bg-stone-100 rounded-full overflow-hidden">
                <div class="h-full bg-primary w-[90%]"></div>
            </div>
            <p class="mt-3 text-[9px] font-black text-stone-500 uppercase italic">Rendimiento Operativo</p>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-red-100 shadow-sm border-t-4 border-red-500">
            <p class="text-[9px] font-black text-red-500 uppercase tracking-widest mb-4">Desviación Presupuesto</p>
            <div class="flex items-baseline gap-2">
                <span class="text-3xl font-headline font-black text-red-600">14.2%</span>
                <span class="material-symbols-outlined text-red-600 text-sm">warning</span>
            </div>
            <div class="mt-3 h-1 bg-stone-100 rounded-full overflow-hidden">
                <div class="h-full bg-red-500 w-[14%]"></div>
            </div>
            <p class="mt-3 text-[9px] font-black text-red-600 uppercase italic font-bold">Requiere Acción Inmediata</p>
        </div>
    </div>

    <!-- Analysis Section -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        <!-- Cash Flow Statement -->
        <div class="lg:col-span-8 bg-white p-8 rounded-3xl border border-stone-200 shadow-sm overflow-hidden group">
            <div class="flex justify-between items-start mb-10">
                <div>
                    <h3 class="text-2xl font-headline font-black uppercase tracking-tight text-stone-900">Estado de Flujo de Caja</h3>
                    <p class="text-[11px] font-black text-stone-400 uppercase tracking-widest mt-1">Metodología de Análisis Indirecto</p>
                </div>
                <div class="flex bg-stone-100 p-1 rounded-xl border border-stone-200">
                    <button class="px-4 py-1.5 text-[9px] font-black uppercase tracking-widest text-stone-400 hover:text-stone-900 transition-all">Directo</button>
                    <button class="px-4 py-1.5 text-[9px] font-black uppercase tracking-widest bg-stone-900 text-white shadow-lg rounded-lg">Indirecto</button>
                </div>
            </div>

            <!-- Graph Simulation -->
            <div class="relative h-64 w-full flex items-end gap-3 px-2 border-b-2 border-stone-100 group">
                @php
                    $values = [60, 75, 90, 45, 80, 100, 30, 55, 85, 65, 40, 70];
                @endphp
                @foreach($values as $v)
                    <div class="flex-1 bg-stone-100 group-hover:bg-primary/20 transition-all rounded-t-lg relative" style="height: {{ $v }}%">
                        <div class="absolute -top-8 left-1/2 -translate-x-1/2 bg-stone-900 text-white text-[9px] font-black px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity">
                            ${{ $v * 5 }}K
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="flex justify-between mt-4">
                <span class="text-[9px] font-black text-stone-400 uppercase tracking-widest">ENE • 2026</span>
                <span class="text-[9px] font-black text-stone-400 uppercase tracking-widest underline decoration-primary decoration-2 underline-offset-4">Cierre Fiscal Q4 Finalizado</span>
                <span class="text-[9px] font-black text-stone-900 uppercase tracking-widest">DIC • 2026</span>
            </div>

            <div class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-12 border-t border-stone-100 pt-8">
                <div>
                    <span class="text-[10px] font-black uppercase tracking-[0.2em] text-stone-900 flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-primary"></span>
                        Actividades Operativas
                    </span>
                    <div class="space-y-4 mt-6">
                        <div class="flex justify-between items-center bg-stone-50 p-3 rounded-xl border border-stone-100">
                            <span class="text-[11px] font-bold text-stone-500 uppercase">Utilidad Neta Adj.</span>
                            <span class="text-[12px] font-black text-lime-600">+$242,500</span>
                        </div>
                        <div class="flex justify-between items-center bg-stone-50 p-3 rounded-xl border border-stone-100">
                            <span class="text-[11px] font-bold text-stone-500 uppercase">Amortización / Dep.</span>
                            <span class="text-[12px] font-black text-lime-600">+$88,000</span>
                        </div>
                    </div>
                </div>
                <div>
                    <span class="text-[10px] font-black uppercase tracking-[0.2em] text-stone-900 flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-red-500"></span>
                        Actividades de Financiamiento
                    </span>
                    <div class="space-y-4 mt-6">
                        <div class="flex justify-between items-center bg-stone-50 p-3 rounded-xl border border-stone-100">
                            <span class="text-[11px] font-bold text-stone-500 uppercase">Pago Dividendos</span>
                            <span class="text-[12px] font-black text-red-600">-($45,000)</span>
                        </div>
                        <div class="flex justify-between items-center bg-stone-50 p-3 rounded-xl border border-stone-100">
                            <span class="text-[11px] font-bold text-stone-500 uppercase">Amortización Deuda</span>
                            <span class="text-[12px] font-black text-red-600">-($112,000)</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar Analytics -->
        <div class="lg:col-span-4 space-y-8">
            <!-- AR Summary -->
            <div class="bg-stone-900 text-white p-8 rounded-3xl shadow-xl shadow-stone-900/10 relative overflow-hidden group">
                <div class="absolute -top-10 -right-10 w-40 h-40 bg-primary/5 rounded-full blur-3xl transition-transform group-hover:scale-150"></div>
                
                <h3 class="text-xl font-headline font-black uppercase tracking-tight mb-8">Cartera por Antigüedad</h3>
                <div class="space-y-6 relative z-10">
                    <div>
                        <div class="flex justify-between text-[9px] font-black uppercase tracking-widest text-stone-400 mb-2">
                            <span>Vigente (0-30 Días)</span>
                            <span class="text-white">72%</span>
                        </div>
                        <div class="h-1.5 w-full bg-stone-800 rounded-full overflow-hidden">
                            <div class="h-full bg-primary w-[72%]"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between text-[9px] font-black uppercase tracking-widest text-stone-400 mb-2">
                            <span>Mora Temprana (31-60)</span>
                            <span class="text-white">18%</span>
                        </div>
                        <div class="h-1.5 w-full bg-stone-800 rounded-full overflow-hidden">
                            <div class="h-full bg-amber-500 w-[18%]"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between text-[9px] font-black uppercase tracking-widest text-stone-400 mb-2">
                            <span>Morosidad Alta (61-90+)</span>
                            <span class="text-white">10%</span>
                        </div>
                        <div class="h-1.5 w-full bg-stone-800 rounded-full overflow-hidden">
                            <div class="h-full bg-red-600 w-[10%]"></div>
                        </div>
                    </div>
                </div>
                <div class="mt-10 pt-8 border-t border-stone-800">
                    <p class="text-[10px] font-black text-stone-500 uppercase tracking-widest mb-2">Saldo Total Exigible</p>
                    <p class="text-3xl font-headline font-black text-white">$3,842,900.00</p>
                </div>
            </div>

            <!-- Revenue Mix -->
            <div class="bg-white p-8 rounded-3xl border border-stone-200 shadow-sm">
                <h3 class="text-sm font-headline font-black uppercase tracking-widest text-stone-900 mb-8">Ingresos vs Gastos</h3>
                <div class="flex items-center gap-6 mb-8">
                    <div class="flex items-center gap-2">
                        <span class="w-2 h-2 bg-primary rounded-full"></span>
                        <span class="text-[9px] font-black uppercase text-stone-400 tracking-widest">Ingresos</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="w-2 h-2 bg-stone-300 rounded-full"></span>
                        <span class="text-[9px] font-black uppercase text-stone-400 tracking-widest">Gastos</span>
                    </div>
                </div>
                <!-- Mini Bar Graph -->
                <div class="flex items-end gap-1.5 h-32">
                    @php
                        $bars = [
                            ['h' => 40, 'e' => 35],
                            ['h' => 60, 'e' => 55],
                            ['h' => 80, 'e' => 40],
                            ['h' => 95, 'e' => 50],
                        ];
                    @endphp
                    @foreach($bars as $b)
                        <div class="flex-1 flex flex-col justify-end gap-1">
                            <div class="w-full bg-primary rounded-t-sm" style="height: {{ $b['h'] }}%"></div>
                            <div class="w-full bg-stone-200 rounded-t-sm" style="height: {{ $b['e'] }}%"></div>
                        </div>
                        <div class="w-1"></div>
                    @endforeach
                </div>
                <button class="w-full mt-10 py-3 border border-stone-200 text-[10px] font-black uppercase tracking-widest text-stone-900 rounded-xl hover:bg-stone-900 hover:text-white hover:border-stone-900 transition-all active:scale-95">Desglose Analítico</button>
            </div>
        </div>
    </div>

    <!-- Ledger Snapshot -->
    <div class="bg-white rounded-3xl border border-stone-200 shadow-sm overflow-hidden">
        <div class="px-8 py-6 bg-stone-900 flex justify-between items-center text-white">
            <h3 class="text-[12px] font-black uppercase tracking-[0.2em]">Libro Auxiliar de Cuentas por Cobrar</h3>
            <div class="flex items-center gap-4">
                <span class="text-[10px] font-black text-stone-400 uppercase tracking-widest">Ordenar por: Vencimiento</span>
                <span class="material-symbols-outlined text-stone-400 cursor-pointer">filter_list</span>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-stone-50 border-b border-stone-100">
                        <th class="px-8 py-5 text-[10px] font-black text-stone-400 uppercase tracking-widest">Entidad Jurídica</th>
                        <th class="px-8 py-5 text-[10px] font-black text-stone-400 uppercase tracking-widest">Referencia Fiscal</th>
                        <th class="px-8 py-5 text-[10px] font-black text-stone-400 uppercase tracking-widest">Estado</th>
                        <th class="px-8 py-5 text-[10px] font-black text-stone-400 uppercase tracking-widest text-right">Monto Bruto</th>
                        <th class="px-8 py-5 text-[10px] font-black text-stone-400 uppercase tracking-widest text-right">Antigüedad</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-50">
                    <tr class="hover:bg-amber-50/20 transition-all">
                        <td class="px-8 py-5">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-stone-100 rounded-xl flex items-center justify-center font-headline font-black text-xs text-stone-900">TH</div>
                                <span class="text-[12px] font-black text-stone-900 uppercase tracking-tight">Turbine Heavy Industries</span>
                            </div>
                        </td>
                        <td class="px-8 py-5 font-mono text-[11px] text-stone-400 tracking-widest uppercase">#INV-88219-B</td>
                        <td class="px-8 py-5">
                            <span class="px-3 py-1 bg-primary/10 text-stone-900 text-[9px] font-black uppercase tracking-tighter rounded-lg border border-primary/20">Al Día</span>
                        </td>
                        <td class="px-8 py-5 text-[13px] font-black text-stone-900 text-right">$124,500.00</td>
                        <td class="px-8 py-5 text-[11px] font-black text-stone-400 text-right uppercase tracking-widest italic">12 Días</td>
                    </tr>
                    <tr class="hover:bg-red-50/20 transition-all">
                        <td class="px-8 py-5">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-stone-100 rounded-xl flex items-center justify-center font-headline font-black text-xs text-stone-900">FM</div>
                                <span class="text-[12px] font-black text-stone-900 uppercase tracking-tight">Forge Manufacturing Gmbh</span>
                            </div>
                        </td>
                        <td class="px-8 py-5 font-mono text-[11px] text-stone-400 tracking-widest uppercase">#INV-77121-A</td>
                        <td class="px-8 py-5">
                            <span class="px-3 py-1 bg-red-600 text-white text-[9px] font-black uppercase tracking-tighter rounded-lg">Crítico</span>
                        </td>
                        <td class="px-8 py-5 text-[13px] font-black text-stone-900 text-right">$442,150.00</td>
                        <td class="px-8 py-5 text-[11px] font-black text-red-600 text-right uppercase tracking-widest italic">94 Días</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="px-8 py-6 bg-stone-50 border-t border-stone-100 flex justify-end">
            <button class="text-[10px] font-black uppercase tracking-[0.2em] text-stone-900 flex items-center gap-3 group hover:translate-x-2 transition-transform">
                Ver Listado Completo 
                <span class="material-symbols-outlined text-sm text-primary group-hover:scale-125 transition-transform">arrow_forward</span>
            </button>
        </div>
    </div>
</section>
@endsection
