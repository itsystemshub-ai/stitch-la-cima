@extends('erp.layouts.app')

@section('title', 'Libro Caja | ERP La Cima')

@section('breadcrumb')
    <a href="{{ url('/erp/contabilidad') }}" class="hover:text-stone-900">Contabilidad</a>
    <span class="material-symbols-outlined text-sm">chevron_right</span>
    <span class="text-stone-900 font-medium">Libro Caja</span>
@endsection

@section('content')
<!-- Header & Real-Time Balances -->
<div class="flex flex-col gap-6 mb-12">
    <div class="flex justify-between items-end">
        <div>
            <h1 class="text-4xl font-extrabold tracking-tighter uppercase text-stone-900">Gestión Bancaria &amp; Libro Caja</h1>
            <p class="text-stone-500 font-label text-sm uppercase tracking-widest mt-1">Saldos Consolidados a Tiempo Real</p>
        </div>
        <div class="flex gap-3">
            <button class="bg-stone-100 hover:bg-stone-200 border border-stone-200 px-4 py-2 text-xs font-bold uppercase tracking-widest flex items-center gap-2 transition-all text-stone-700">
                <span class="material-symbols-outlined text-sm">file_download</span> Exportar PDF
            </button>
            <button class="bg-primary hover:brightness-110 text-stone-900 px-4 py-2 text-xs font-bold uppercase tracking-widest flex items-center gap-2 transition-all shadow shadow-primary/20">
                <span class="material-symbols-outlined text-sm">sync_alt</span> Nueva Conciliación
            </button>
        </div>
    </div>

    <!-- Dashboard Grid (Bento Style) -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div class="bg-white border border-stone-200 p-6 flex flex-col gap-2 border-l-4 border-l-primary">
            <span class="text-[10px] font-bold text-stone-500 uppercase tracking-widest">Banco Santander - Operativo</span>
            <span class="text-3xl font-headline font-bold text-stone-900">$1,452,380.00</span>
            <div class="flex items-center gap-1 text-xs text-green-600 font-bold">
                <span class="material-symbols-outlined text-sm">arrow_upward</span> +2.4% vs ayer
            </div>
        </div>
        <div class="bg-white border border-stone-200 p-6 flex flex-col gap-2">
            <span class="text-[10px] font-bold text-stone-500 uppercase tracking-widest">BBVA - Reserva</span>
            <span class="text-3xl font-headline font-bold text-stone-900">$845,000.50</span>
            <div class="flex items-center gap-1 text-xs text-stone-500 font-bold">
                Conciliado hace 2h
            </div>
        </div>
        <div class="bg-white border border-stone-200 p-6 flex flex-col gap-2">
            <span class="text-[10px] font-bold text-stone-500 uppercase tracking-widest">Caja Chica - Planta 1</span>
            <span class="text-3xl font-headline font-bold text-stone-900">$12,400.00</span>
            <div class="flex items-center gap-1 text-xs text-red-500 font-bold">
                <span class="material-symbols-outlined text-sm">warning</span> Reponer fondos
            </div>
        </div>
        <div class="bg-primary text-stone-900 p-6 flex flex-col gap-2 rounded-lg">
            <span class="text-[10px] font-bold text-stone-800 uppercase tracking-widest">Consolidado Total</span>
            <span class="text-3xl font-headline font-bold">$2,309,780.50</span>
            <div class="flex items-center gap-1 text-xs text-stone-800 font-bold uppercase">
                Auditoría 100% OK
            </div>
        </div>
    </div>
</div>

<!-- Section 1: Libro de Movimientos & Conciliación -->
<section class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
    <div class="lg:col-span-2 space-y-4">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-bold uppercase tracking-tight text-stone-900">Registro de Movimientos</h2>
            <div class="flex gap-2">
                <input class="bg-white border border-stone-200 text-xs px-4 py-2 focus:ring-1 focus:ring-primary w-64 rounded-lg" placeholder="Filtrar por concepto..." type="text"/>
            </div>
        </div>
        <div class="bg-white border border-stone-200 overflow-hidden rounded-lg">
            <table class="w-full text-left border-collapse">
                <thead class="bg-stone-50 text-stone-500 text-[10px] uppercase font-bold tracking-widest border-b border-stone-200">
                    <tr>
                        <th class="px-4 py-3">Fecha</th>
                        <th class="px-4 py-3">Referencia</th>
                        <th class="px-4 py-3">Concepto</th>
                        <th class="px-4 py-3">Tipo</th>
                        <th class="px-4 py-3 text-right">Monto</th>
                        <th class="px-4 py-3 text-center">Estado</th>
                    </tr>
                </thead>
                <tbody class="text-xs font-label">
                    <tr class="hover:bg-stone-50 transition-colors border-b border-stone-100">
                        <td class="px-4 py-4 text-stone-500">24/05/2024</td>
                        <td class="px-4 py-4 font-mono text-stone-700">#TRF-9023</td>
                        <td class="px-4 py-4 font-bold text-stone-900">Pago Proveedor Acero Inox</td>
                        <td class="px-4 py-4"><span class="bg-stone-100 text-stone-600 px-2 py-1 text-[10px] rounded">EGRESO</span></td>
                        <td class="px-4 py-4 text-right font-bold text-red-500">-$250,000.00</td>
                        <td class="px-4 py-4 text-center"><span class="material-symbols-outlined text-green-500 text-lg">check_circle</span></td>
                    </tr>
                    <tr class="bg-stone-50/50 hover:bg-stone-50 transition-colors border-b border-stone-100">
                        <td class="px-4 py-4 text-stone-500">24/05/2024</td>
                        <td class="px-4 py-4 font-mono text-stone-700">#CHQ-4451</td>
                        <td class="px-4 py-4 font-bold text-stone-900">Cobro Factura #V-998 (Cliente Ind.)</td>
                        <td class="px-4 py-4"><span class="bg-green-100 text-green-700 px-2 py-1 text-[10px] rounded">INGRESO</span></td>
                        <td class="px-4 py-4 text-right font-bold text-green-600">+$180,500.00</td>
                        <td class="px-4 py-4 text-center"><span class="material-symbols-outlined text-amber-500 text-lg">history</span></td>
                    </tr>
                    <tr class="hover:bg-stone-50 transition-colors border-b border-stone-100">
                        <td class="px-4 py-4 text-stone-500">23/05/2024</td>
                        <td class="px-4 py-4 font-mono text-stone-700">#INT-0032</td>
                        <td class="px-4 py-4 font-bold text-stone-900">Rendimientos Cuenta de Ahorro</td>
                        <td class="px-4 py-4"><span class="bg-green-100 text-green-700 px-2 py-1 text-[10px] rounded">INGRESO</span></td>
                        <td class="px-4 py-4 text-right font-bold text-green-600">+$12,450.00</td>
                        <td class="px-4 py-4 text-center"><span class="material-symbols-outlined text-green-500 text-lg">check_circle</span></td>
                    </tr>
                    <tr class="bg-stone-50/50 hover:bg-stone-50 transition-colors">
                        <td class="px-4 py-4 text-stone-500">23/05/2024</td>
                        <td class="px-4 py-4 font-mono text-stone-700">#TRF-8871</td>
                        <td class="px-4 py-4 font-bold text-stone-900">Nómina Operarios Planta 2</td>
                        <td class="px-4 py-4"><span class="bg-stone-100 text-stone-600 px-2 py-1 text-[10px] rounded">EGRESO</span></td>
                        <td class="px-4 py-4 text-right font-bold text-red-500">-$412,000.00</td>
                        <td class="px-4 py-4 text-center"><span class="material-symbols-outlined text-green-500 text-lg">check_circle</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Conciliación Rápida & Acciones -->
    <div class="space-y-6">
        <div class="bg-stone-900 text-stone-100 p-6 rounded-lg relative overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 bg-primary/20 blur-3xl rounded-full -translate-y-1/2 translate-x-1/2"></div>
            <h3 class="text-sm font-bold uppercase tracking-widest text-primary mb-4">Conciliación Rápida AI</h3>
            <p class="text-xs text-stone-300 leading-relaxed mb-6">Hemos detectado 4 movimientos bancarios que coinciden con facturas pendientes de cobro.</p>
            <div class="space-y-3">
                <div class="bg-stone-800 rounded p-3 flex justify-between items-center group cursor-pointer hover:bg-stone-700 transition-all border border-stone-700">
                    <div>
                        <div class="text-[10px] text-stone-400 font-bold uppercase">Match 98%</div>
                        <div class="text-xs font-bold text-white">Depósito $45,000.00</div>
                    </div>
                    <span class="material-symbols-outlined text-primary opacity-0 group-hover:opacity-100 transition-opacity">arrow_forward</span>
                </div>
                <button class="w-full bg-primary text-stone-900 rounded text-xs font-bold py-3 uppercase tracking-widest mt-2 hover:brightness-110">Ejecutar Auto-Conciliación</button>
            </div>
        </div>

        <div class="bg-white border border-stone-200 p-6 rounded-lg">
            <h3 class="text-xs font-bold uppercase tracking-widest text-stone-500 mb-4">Flujo Mensual</h3>
            <div class="h-32 flex items-end gap-2 px-2">
                <div class="flex-1 bg-primary/20 h-3/4 hover:bg-primary transition-all rounded-t"></div>
                <div class="flex-1 bg-primary/20 h-1/2 hover:bg-primary transition-all rounded-t"></div>
                <div class="flex-1 bg-primary/20 h-full hover:bg-primary transition-all rounded-t"></div>
                <div class="flex-1 bg-primary/20 h-2/3 hover:bg-primary transition-all rounded-t"></div>
                <div class="flex-1 bg-primary h-5/6 rounded-t"></div>
            </div>
            <div class="flex justify-between mt-2 text-[10px] text-stone-500 font-bold uppercase">
                <span>Ene</span><span>Feb</span><span>Mar</span><span>Abr</span><span>May</span>
            </div>
        </div>
    </div>
</section>

<!-- Section 2: Antigüedad de Saldos -->
<section class="space-y-6">
    <div class="flex justify-between items-center">
        <div>
            <h2 class="text-xl font-bold uppercase tracking-tight text-stone-900">Antigüedad de Saldos de Clientes</h2>
            <p class="text-[10px] text-stone-500 font-bold uppercase tracking-widest">Análisis de cartera vencida y riesgo</p>
        </div>
        <div class="flex items-center gap-6">
            <div class="flex items-center gap-2">
                <div class="w-3 h-3 bg-primary rounded-sm"></div>
                <span class="text-[10px] font-bold uppercase text-stone-500">Corriente</span>
            </div>
            <div class="flex items-center gap-2">
                <div class="w-3 h-3 bg-stone-300 rounded-sm"></div>
                <span class="text-[10px] font-bold uppercase text-stone-500">30-60 Días</span>
            </div>
            <div class="flex items-center gap-2">
                <div class="w-3 h-3 bg-red-500 rounded-sm"></div>
                <span class="text-[10px] font-bold uppercase text-stone-500">&gt;90 Días</span>
            </div>
        </div>
    </div>

    <div class="bg-white border border-stone-200 rounded-lg p-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
        <!-- Cliente 1 -->
        <div class="border-l-2 border-stone-100 pl-4">
            <div class="text-sm font-bold uppercase mb-1 text-stone-900">Industrial S.A.</div>
            <div class="text-[10px] text-stone-500 font-bold uppercase tracking-widest mb-3">Total Deuda: $1.2M</div>
            <div class="flex gap-1 h-2 mb-2 rounded overflow-hidden">
                <div class="w-[80%] bg-primary"></div>
                <div class="w-[15%] bg-stone-300"></div>
                <div class="w-[5%] bg-red-500"></div>
            </div>
            <div class="flex justify-between text-[10px] font-bold">
                <span class="text-lime-600">80% OK</span>
                <span class="text-stone-500">Bajo Riesgo</span>
            </div>
        </div>
        <!-- Cliente 2 -->
        <div class="border-l-2 border-stone-100 pl-4">
            <div class="text-sm font-bold uppercase mb-1 text-stone-900">Minera del Norte</div>
            <div class="text-[10px] text-stone-500 font-bold uppercase tracking-widest mb-3">Total Deuda: $840k</div>
            <div class="flex gap-1 h-2 mb-2 rounded overflow-hidden">
                <div class="w-[40%] bg-primary"></div>
                <div class="w-[40%] bg-stone-300"></div>
                <div class="w-[20%] bg-red-500"></div>
            </div>
            <div class="flex justify-between text-[10px] font-bold">
                <span class="text-stone-500">40% Vencido</span>
                <span class="text-red-500">Alerta</span>
            </div>
        </div>
        <!-- Cliente 3 -->
        <div class="border-l-2 border-stone-100 pl-4">
            <div class="text-sm font-bold uppercase mb-1 text-stone-900">Logística Global</div>
            <div class="text-[10px] text-stone-500 font-bold uppercase tracking-widest mb-3">Total Deuda: $3.5M</div>
            <div class="flex gap-1 h-2 mb-2 rounded overflow-hidden">
                <div class="w-[95%] bg-primary"></div>
                <div class="w-[5%] bg-stone-300"></div>
                <div class="w-0 bg-red-500"></div>
            </div>
            <div class="flex justify-between text-[10px] font-bold">
                <span class="text-lime-600">95% OK</span>
                <span class="text-lime-600">Excelente</span>
            </div>
        </div>
        <!-- Cliente 4 -->
        <div class="border-l-2 border-stone-100 pl-4">
            <div class="text-sm font-bold uppercase mb-1 text-stone-900">Suministros Ferrosos</div>
            <div class="text-[10px] text-stone-500 font-bold uppercase tracking-widest mb-3">Total Deuda: $150k</div>
            <div class="flex gap-1 h-2 mb-2 rounded overflow-hidden">
                <div class="w-[10%] bg-primary"></div>
                <div class="w-[20%] bg-stone-300"></div>
                <div class="w-[70%] bg-red-500"></div>
            </div>
            <div class="flex justify-between text-[10px] font-bold">
                <span class="text-red-500">70% &gt;90 Días</span>
                <span class="text-green-600 font-bold">ACTIVO</span>
            </div>
        </div>
    </div>

    <!-- Resumen de Riesgo (Full Width) -->
    <div class="bg-white border border-stone-200 rounded-lg p-4 flex justify-between items-center">
        <div class="flex gap-8">
            <div>
                <div class="text-[9px] font-bold text-stone-500 uppercase tracking-widest">Cartera Corriente</div>
                <div class="text-lg font-bold text-stone-900">$12,450,000.00</div>
            </div>
            <div>
                <div class="text-[9px] font-bold text-stone-500 uppercase tracking-widest">Monto en Riesgo</div>
                <div class="text-lg font-bold text-red-500">$842,000.00</div>
            </div>
            <div>
                <div class="text-[9px] font-bold text-stone-500 uppercase tracking-widest">Promedio Días Pago</div>
                <div class="text-lg font-bold text-stone-900">42 Días</div>
            </div>
        </div>
        <button class="bg-stone-900 text-stone-100 rounded px-6 py-3 text-xs font-bold uppercase tracking-widest hover:bg-stone-800 transition-all">Ver Reporte Analítico</button>
    </div>
</section>
@endsection

@push('scripts')
    <script src="{{ asset('erp/js/libro-caja.js') }}"></script>
@endpush
