@extends('erp.layouts.app')

@section('title', 'Contabilidad | ERP La Cima')

@section('breadcrumb')
    <span class="text-stone-900">Contabilidad</span>
@endsection

@section('content')
    <!-- Header -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4 mb-8">
        <div>
            <p class="text-xs font-bold text-stone-400 tracking-[0.2em] uppercase mb-1">
                Módulo de Contabilidad
            </p>
            <h2 class="text-3xl font-headline font-black text-stone-900 tracking-tight">
                Control Contable
            </h2>
            <p class="text-stone-500 text-sm mt-1">
                MAYOR DE REPUESTO LA CIMA, C.A. • RIF: J-40308741-5
            </p>
        </div>
        <div class="flex gap-3">
            <a href="{{ url('/erp/contabilidad/libro-diario') }}" class="flex items-center gap-2 bg-primary text-stone-900 px-4 py-2 rounded-lg text-xs font-bold uppercase tracking-wider hover:brightness-110 transition-all">
                <span class="material-symbols-outlined text-sm">menu_book</span>
                Libro Diario
            </a>
        </div>
    </div>

    <!-- KPI Cards -->
    <div id="tour-accounting-stats" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
        <div class="bg-white rounded-xl border border-stone-200 p-6 hover:shadow-lg transition-all hover:border-primary/30">
            <div class="flex items-center justify-between mb-3">
                <div class="w-10 h-10 bg-green-50 rounded-lg flex items-center justify-center">
                    <span class="material-symbols-outlined text-green-600">trending_up</span>
                </div>
                <span class="px-2 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-green-100 text-green-700">+12%</span>
            </div>
            <p class="text-[10px] font-bold text-stone-400 uppercase tracking-wider">
                Ingresos del Mes
            </p>
            <p class="text-2xl font-headline font-bold text-stone-900 mt-1">
                ${{ number_format($stats['ingresos_mes'], 2) }}
            </p>
            <p class="text-xs text-stone-500 mt-1">Ventas brutas</p>
        </div>

        <div class="bg-white rounded-xl border border-stone-200 p-6 hover:shadow-lg transition-all hover:border-primary/30">
            <div class="flex items-center justify-between mb-3">
                <div class="w-10 h-10 bg-red-50 rounded-lg flex items-center justify-center">
                    <span class="material-symbols-outlined text-red-600">trending_down</span>
                </div>
                <span class="px-2 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-red-100 text-red-700">-5%</span>
            </div>
            <p class="text-[10px] font-bold text-stone-400 uppercase tracking-wider">
                Gastos del Mes
            </p>
            <p class="text-2xl font-headline font-bold text-stone-900 mt-1">
                ${{ number_format($stats['gastos_mes'], 2) }}
            </p>
            <p class="text-xs text-stone-500 mt-1">Costos operativos</p>
        </div>

        <div class="bg-white rounded-xl border border-stone-200 p-6 hover:shadow-lg transition-all hover:border-primary/30">
            <div class="flex items-center justify-between mb-3">
                <div class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center">
                    <span class="material-symbols-outlined text-blue-600">savings</span>
                </div>
                <span class="px-2 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-green-100 text-green-700">+8%</span>
            </div>
            <p class="text-[10px] font-bold text-stone-400 uppercase tracking-wider">
                Utilidad Neta
            </p>
            <p class="text-2xl font-headline font-bold text-stone-900 mt-1">
                ${{ number_format($stats['utilidad_neta'], 2) }}
            </p>
            <p class="text-xs text-stone-500 mt-1">Margen 33.7%</p>
        </div>

        <div class="bg-white rounded-xl border border-stone-200 p-6 hover:shadow-lg transition-all hover:border-primary/30">
            <div class="flex items-center justify-between mb-3">
                <div class="w-10 h-10 bg-amber-50 rounded-lg flex items-center justify-center">
                    <span class="material-symbols-outlined text-amber-600">gavel</span>
                </div>
                <span class="px-2 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-yellow-100 text-yellow-700">16%</span>
            </div>
            <p class="text-[10px] font-bold text-stone-400 uppercase tracking-wider">
                IVA por Pagar
            </p>
            <p class="text-2xl font-headline font-bold text-stone-900 mt-1">
                ${{ number_format($stats['iva_por_pagar'], 2) }}
            </p>
            <p class="text-xs text-stone-500 mt-1">Próximo vencimiento</p>
        </div>
    </div>

    <!-- Action Buttons -->
    <div id="tour-accounting-actions" class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
        <a href="{{ url('/erp/contabilidad/plan-cuentas') }}" class="flex items-center justify-center gap-3 p-5 rounded-xl font-headline font-bold text-sm uppercase tracking-wider transition-all active:scale-[0.98] bg-primary text-stone-900 hover:brightness-110 shadow-lg shadow-primary/20">
            <span class="material-symbols-outlined text-2xl">format_list_numbered</span>
            <span class="text-center leading-tight">Plan Cuentas ({{ $stats['cuentas_count'] }})</span>
        </a>
        <a href="{{ url('/erp/contabilidad/libros') }}" class="flex items-center justify-center gap-3 p-5 rounded-xl font-headline font-bold text-sm uppercase tracking-wider transition-all active:scale-[0.98] bg-white border border-stone-200 text-stone-700 hover:border-primary hover:bg-primary/5">
            <span class="material-symbols-outlined text-2xl">menu_book</span>
            <span class="text-center leading-tight">Libros Contables</span>
        </a>
        <a href="{{ url('/erp/contabilidad/balance-general') }}" class="flex items-center justify-center gap-3 p-5 rounded-xl font-headline font-bold text-sm uppercase tracking-wider transition-all active:scale-[0.98] bg-white border border-stone-200 text-stone-700 hover:border-primary hover:bg-primary/5">
            <span class="material-symbols-outlined text-2xl">balance</span>
            <span class="text-center leading-tight">Balance General</span>
        </a>
        <a href="{{ url('/erp/contabilidad/reportes') }}" class="flex items-center justify-center gap-3 p-5 rounded-xl font-headline font-bold text-sm uppercase tracking-wider transition-all active:scale-[0.98] bg-white border border-stone-200 text-stone-700 hover:border-primary hover:bg-primary/5">
            <span class="material-symbols-outlined text-2xl">pie_chart</span>
            <span class="text-center leading-tight">Reportes</span>
        </a>
    </div>

    <!-- Accounting Summary -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <!-- Income Statement Summary -->
        <div class="bg-white rounded-xl border border-stone-200 p-6">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-10 h-10 bg-green-50 rounded-lg flex items-center justify-center">
                    <span class="material-symbols-outlined text-green-600">monitoring</span>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-stone-900">Estado de Resultados</h3>
                    <p class="text-xs text-stone-500">Resumen del mes actual</p>
                </div>
            </div>

            <div class="space-y-4">
                <div class="flex justify-between items-center p-3 bg-green-50 rounded-lg">
                    <span class="text-sm font-medium text-stone-700">Ingresos por Ventas</span>
                    <span class="text-sm font-bold text-green-700">${{ number_format($stats['ingresos_mes'], 2) }}</span>
                </div>
                <div class="flex justify-between items-center p-3 bg-red-50 rounded-lg">
                    <span class="text-sm font-medium text-stone-700">Costo de Ventas</span>
                    <span class="text-sm font-bold text-red-700">(${{ number_format($stats['gastos_mes'], 2) }})</span>
                </div>
                <div class="flex justify-between items-center p-3 bg-stone-50 rounded-lg">
                    <span class="text-sm font-medium text-stone-700">Gastos Operativos</span>
                    <span class="text-sm font-bold text-stone-700">($20,000)</span>
                </div>
                <div class="border-t border-stone-200 pt-4 flex justify-between items-center">
                    <span class="text-sm font-bold text-stone-900">Utilidad Neta</span>
                    <span class="text-lg font-headline font-bold text-green-700">${{ number_format($stats['utilidad_neta'], 2) }}</span>
                </div>
            </div>
        </div>

        <!-- Balance Sheet Summary -->
        <div class="bg-white rounded-xl border border-stone-200 p-6">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center">
                    <span class="material-symbols-outlined text-blue-600">balance</span>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-stone-900">Balance General</h3>
                    <p class="text-xs text-stone-500">Al cierre del mes</p>
                </div>
            </div>

            <div class="space-y-4">
                <div class="flex justify-between items-center p-3 bg-blue-50 rounded-lg">
                    <span class="text-sm font-medium text-stone-700">Activos Totales</span>
                    <span class="text-sm font-bold text-blue-700">$450,000</span>
                </div>
                <div class="flex justify-between items-center p-3 bg-amber-50 rounded-lg">
                    <span class="text-sm font-medium text-stone-700">Pasivos Totales</span>
                    <span class="text-sm font-bold text-amber-700">$180,000</span>
                </div>
                <div class="flex justify-between items-center p-3 bg-green-50 rounded-lg">
                    <span class="text-sm font-medium text-stone-700">Patrimonio</span>
                    <span class="text-sm font-bold text-green-700">$270,000</span>
                </div>
                <div class="border-t border-stone-200 pt-4 flex justify-between items-center">
                    <span class="text-sm font-bold text-stone-900">A = P + Pt</span>
                    <span class="text-lg font-headline font-bold text-green-700">✓ Balanceado</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Journal Entries -->
    <div class="bg-white rounded-xl border border-stone-200 p-6 mb-8">
        <div class="flex justify-between items-center mb-6">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center">
                    <span class="material-symbols-outlined text-blue-600">receipt_long</span>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-stone-900">Asientos Recientes</h3>
                    <p class="text-xs text-stone-500">Últimos movimientos contables</p>
                </div>
            </div>
            <a href="{{ url('/erp/contabilidad/libro-diario') }}" class="text-xs font-bold text-primary hover:brightness-75 flex items-center gap-1">
                Ver todo
                <span class="material-symbols-outlined text-sm">arrow_forward</span>
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="border-b border-stone-200">
                    <tr>
                        <th class="text-xs font-bold text-stone-500 uppercase tracking-wider pb-3 text-left">Asiento</th>
                        <th class="text-xs font-bold text-stone-500 uppercase tracking-wider pb-3 text-left">Fecha</th>
                        <th class="text-xs font-bold text-stone-500 uppercase tracking-wider pb-3 text-left">Descripción</th>
                        <th class="text-xs font-bold text-stone-500 uppercase tracking-wider pb-3 text-right">Débito</th>
                        <th class="text-xs font-bold text-stone-500 uppercase tracking-wider pb-3 text-right">Crédito</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-100">
                    <tr class="hover:bg-stone-50 transition-colors">
                        <td class="py-3 text-stone-500 font-mono text-xs">AE-001</td>
                        <td class="py-3 text-stone-600 text-sm">01/04/2026</td>
                        <td class="py-3 font-medium text-stone-900">Registro de ventas del día</td>
                        <td class="py-3 text-right font-bold text-stone-900">$15,000</td>
                        <td class="py-3 text-right font-bold text-stone-900">$15,000</td>
                    </tr>
                    <tr class="hover:bg-stone-50 transition-colors">
                        <td class="py-3 text-stone-500 font-mono text-xs">AE-002</td>
                        <td class="py-3 text-stone-600 text-sm">02/04/2026</td>
                        <td class="py-3 font-medium text-stone-900">Pago a proveedores</td>
                        <td class="py-3 text-right font-bold text-stone-900">$8,500</td>
                        <td class="py-3 text-right font-bold text-stone-900">$8,500</td>
                    </tr>
                    <tr class="hover:bg-stone-50 transition-colors">
                        <td class="py-3 text-stone-500 font-mono text-xs">AE-003</td>
                        <td class="py-3 text-stone-600 text-sm">03/04/2026</td>
                        <td class="py-3 font-medium text-stone-900">Depreciación mensual</td>
                        <td class="py-3 text-right font-bold text-stone-900">$2,500</td>
                        <td class="py-3 text-right font-bold text-stone-900">$2,500</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('erp/js/contabilidad.js') }}"></script>
@endpush
