@extends('erp.layouts.app')

@section('title', 'Compras | ERP La Cima')

@section('breadcrumb')
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <span class="text-stone-900">Compras</span>
@endsection

@section('content')
    <!-- Page Header: Strategic Sourcing -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6 mb-10">
        <div>
            <div class="flex items-center gap-2 mb-2">
                <span class="w-8 h-[2px] bg-primary"></span>
                <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em]">Gestión de Adquisiciones</p>
            </div>
            <h2 class="text-4xl font-headline font-black text-stone-900 tracking-tighter uppercase leading-none">Módulo de <span class="text-stone-400">Compras</span></h2>
            <p class="text-xs text-stone-400 mt-2 font-medium uppercase tracking-widest">MAYOR DE REPUESTO LA CIMA, C.A. • RIF: J-40308741-5</p>
        </div>
        <div id="tour-purchase-actions" class="flex gap-3">
            <a href="{{ url('/erp/compras/factura') }}" class="bg-stone-900 text-primary px-6 py-3 text-[10px] font-black uppercase tracking-widest flex items-center gap-3 hover:bg-stone-800 transition-all rounded-xl shadow-xl group active:scale-95">
                <span class="material-symbols-outlined text-sm group-hover:rotate-45 transition-transform">add_circle</span>
                Registrar Recepción
            </a>
            <button class="bg-white border border-stone-200 text-stone-500 hover:text-stone-900 p-3 rounded-xl transition-all shadow-sm">
                <span class="material-symbols-outlined">filter_list</span>
            </button>
        </div>
    </div>

    <!-- Buy Metrics Bento Grid -->
    <div id="tour-purchase-stats" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        <!-- Monthly Spend -->
        <div class="bg-white border border-stone-200 p-6 rounded-2xl shadow-sm relative overflow-hidden group hover:border-primary/50 transition-all">
            <p class="text-[10px] font-black text-stone-400 uppercase tracking-widest mb-4">Gasto Mensual (Neto)</p>
            <div class="flex items-baseline gap-2">
                <span class="text-3xl font-headline font-black text-stone-900">${{ number_format($stats['compras_mes'], 2) }}</span>
                <span class="text-[10px] font-bold text-stone-400 uppercase tracking-widest">USD</span>
            </div>
            <div class="mt-4 flex items-center gap-2">
                <span class="text-[9px] text-stone-400 font-bold uppercase tracking-tighter">Periodo Actual</span>
            </div>
        </div>

        <!-- Orders in Progress -->
        <div class="bg-white border border-stone-200 p-6 rounded-2xl shadow-sm relative overflow-hidden group hover:border-primary/50 transition-all">
            <p class="text-[10px] font-black text-stone-400 uppercase tracking-widest mb-4">Órdenes Pendientes</p>
            <div class="flex items-baseline gap-2">
                <span class="text-3xl font-headline font-black text-stone-900">{{ str_pad($stats['ordenes_pendientes'], 2, '0', STR_PAD_LEFT) }}</span>
                <span class="text-[10px] font-bold text-stone-400 uppercase tracking-widest">Activas</span>
            </div>
            <div class="mt-4">
                <div class="w-full bg-stone-100 h-1.5 rounded-full overflow-hidden">
                    <div class="bg-primary h-full w-[25%]"></div>
                </div>
            </div>
        </div>

        <!-- Supplier Count -->
        <div class="bg-white border border-stone-200 p-6 rounded-2xl shadow-sm relative overflow-hidden group hover:border-primary/50 transition-all">
            <p class="text-[10px] font-black text-stone-400 uppercase tracking-widest mb-4">Cartera de Aliados</p>
            <div class="flex items-baseline gap-2">
                <span class="text-3xl font-headline font-black text-stone-900">{{ $stats['proveedores_activos'] }}</span>
                <span class="text-[10px] font-bold text-stone-400 uppercase tracking-widest">Proveedores</span>
            </div>
            <p class="text-[9px] text-stone-400 font-bold uppercase tracking-tighter mt-4 flex items-center gap-1">
                <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span> Gestión Centralizada
            </p>
        </div>

        <!-- Accounts Payable -->
        <div class="bg-stone-900 border border-stone-800 p-6 rounded-2xl shadow-2xl relative overflow-hidden group">
            <div class="absolute inset-x-0 bottom-0 h-1 bg-primary"></div>
            <p class="text-[10px] font-black text-primary uppercase tracking-widest mb-4 relative z-10">Cuentas por Pagar</p>
            <div class="flex items-baseline gap-2 relative z-10">
                <span class="text-3xl font-headline font-black text-white">${{ number_format($stats['cuentas_por_pagar'] ?? 0, 2) }}</span>
                <span class="text-[10px] font-bold text-stone-500 uppercase tracking-widest">USD</span>
            </div>
            <p class="text-[9px] text-stone-400 font-bold uppercase tracking-tighter mt-4 relative z-10">Facturas pendientes</p>
        </div>
    </div>

    <!-- Purchases Quick Actions Overlay -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-10">
        <a href="{{ url('/erp/compras/proveedores') }}" class="group bg-white border border-stone-200 p-5 rounded-2xl flex flex-col items-center gap-3 hover:border-primary transition-all shadow-sm">
            <div class="w-12 h-12 bg-stone-100 rounded-xl flex items-center justify-center text-stone-400 group-hover:bg-primary group-hover:text-black transition-all text-sm">
                <span class="material-symbols-outlined text-2xl">local_shipping</span>
            </div>
            <span class="text-[10px] font-black text-stone-900 uppercase tracking-widest">Proveedores</span>
        </a>
        <a href="{{ url('/erp/compras/historial') }}" class="group bg-white border border-stone-200 p-5 rounded-2xl flex flex-col items-center gap-3 hover:border-primary transition-all shadow-sm">
            <div class="w-12 h-12 bg-stone-100 rounded-xl flex items-center justify-center text-stone-400 group-hover:bg-primary group-hover:text-black transition-all text-sm">
                <span class="material-symbols-outlined text-2xl">history</span>
            </div>
            <span class="text-[10px] font-black text-stone-900 uppercase tracking-widest">Historial</span>
        </a>
        <a href="{{ url('/erp/compras/libro') }}" class="group bg-white border border-stone-200 p-5 rounded-2xl flex flex-col items-center gap-3 hover:border-primary transition-all shadow-sm text-sm">
            <div class="w-12 h-12 bg-stone-100 rounded-xl flex items-center justify-center text-stone-400 group-hover:bg-primary group-hover:text-black transition-all text-sm">
                <span class="material-symbols-outlined text-2xl">menu_book</span>
            </div>
            <span class="text-[10px] font-black text-stone-900 uppercase tracking-widest">Libro Legal</span>
        </a>
        <a href="{{ url('/erp/compras/reportes') }}" class="group bg-white border border-stone-200 p-5 rounded-2xl flex flex-col items-center gap-3 hover:border-primary transition-all shadow-sm text-sm">
            <div class="w-12 h-12 bg-stone-100 rounded-xl flex items-center justify-center text-stone-400 group-hover:bg-primary group-hover:text-black transition-all text-sm">
                <span class="material-symbols-outlined text-2xl">insights</span>
            </div>
            <span class="text-[10px] font-black text-stone-900 uppercase tracking-widest">Costos</span>
        </a>
    </div>

    <!-- Active Procurement Cycle Dashboard -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-10">
        <!-- Recent Orders Table -->
        <div class="lg:col-span-2 bg-white rounded-2xl border border-stone-200 overflow-hidden shadow-sm">
            <div class="p-6 border-b border-stone-100 flex justify-between items-center bg-stone-50/50">
                <div class="flex items-center gap-3">
                    <div class="w-2 h-6 bg-primary rounded-full"></div>
                    <h3 class="text-sm font-black text-stone-900 uppercase tracking-tighter">Bitácora de Órdenes Recientes</h3>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-stone-50/80">
                            <th class="px-6 py-4 text-[9px] font-black text-stone-400 uppercase tracking-[0.2em]">Referencia</th>
                            <th class="px-6 py-4 text-[9px] font-black text-stone-400 uppercase tracking-[0.2em]">Proveedor Aliado</th>
                            <th class="px-6 py-4 text-[9px] font-black text-stone-400 uppercase tracking-[0.2em] text-right">Inversión</th>
                            <th class="px-6 py-4 text-[9px] font-black text-stone-400 uppercase tracking-[0.2em] text-center">Estatus</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-stone-100">
                        @forelse($recentOrders as $order)
                        <tr class="hover:bg-stone-50/50 transition-colors group">
                            <td class="px-6 py-4">
                                <p class="text-xs font-black text-stone-900 uppercase">{{ $order->numero_orden }}</p>
                                <p class="text-[9px] font-bold text-stone-400 font-mono tracking-widest">FECHA: {{ $order->created_at->format('d/m/Y') }}</p>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-stone-100 flex items-center justify-center text-[10px] font-black">
                                        {{ substr($order->supplier->nombre, 0, 2) }}
                                    </div>
                                    <div>
                                        <p class="text-xs font-black text-stone-900 uppercase">{{ $order->supplier->nombre }}</p>
                                        <p class="text-[9px] text-stone-400 font-bold uppercase tracking-tighter">{{ $order->supplier->rif }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <span class="text-sm font-headline font-black text-stone-900">${{ number_format($order->total, 2) }}</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="px-3 py-1 bg-green-50 text-green-600 text-[9px] font-black uppercase rounded-full border border-green-100">{{ $order->estado }}</span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-10 text-center text-stone-500 font-bold text-xs uppercase tracking-widest">No hay órdenes registradas.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="p-4 bg-stone-50 border-t border-stone-100 flex justify-center">
                <a href="{{ url('/erp/compras/historial') }}" class="text-[9px] font-black text-stone-400 uppercase tracking-widest hover:text-stone-900 transition-colors">Ver Auditoría Completa de Órdenes</a>
            </div>
        </div>

        <!-- Right Column: Compliance & Vendor Risk -->
        <div class="space-y-6">
            <!-- Strategic Vendor Risk -->
            <div class="bg-white rounded-2xl border border-stone-200 p-6 shadow-sm">
                <h3 class="text-[10px] font-black text-stone-900 uppercase tracking-widest mb-6">Alerta de Reposición</h3>
                <div class="space-y-5">
                    @forelse($stats['critical_stock'] ?? [] as $low_stock)
                    <div class="relative pt-1">
                        <div class="flex mb-2 items-center justify-between">
                            <div><span class="text-[9px] font-black inline-block py-1 px-2 uppercase rounded-full text-stone-600 bg-stone-100 max-w-[150px] truncate">{{ $low_stock->nombre }}</span></div>
                            <div class="text-right"><span class="text-[10px] font-black inline-block {{ $low_stock->stock_actual == 0 ? 'text-red-600' : 'text-amber-600' }} uppercase">{{ $low_stock->stock_actual }} en stock</span></div>
                        </div>
                        <div class="overflow-hidden h-1.5 mb-4 text-xs flex rounded bg-stone-100">
                            <div style="width:{{ $low_stock->stock_minimo > 0 ? min(100, ($low_stock->stock_actual / $low_stock->stock_minimo) * 100) : 0 }}%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center {{ $low_stock->stock_actual == 0 ? 'bg-red-500' : 'bg-amber-500' }}"></div>
                        </div>
                    </div>
                    @empty
                    <p class="text-[10px] text-stone-500 uppercase tracking-widest text-center italic">Inventario estable</p>
                    @endforelse
                </div>
                <button onclick="Swal.fire({
                    title: 'Iniciando Proceso de Emergencia',
                    text: 'Se enviará una solicitud de aprobación prioritaria a Gerente de Compras. ¿Continuar?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#ceff5e',
                    cancelButtonColor: '#1c1917',
                    confirmButtonText: 'Sí, enviar solicitud',
                    cancelButtonText: 'Cancelar',
                    color: '#1c1917'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire('Solicitud Enviada', 'El flujo de aprobación ha sido notificado.', 'success');
                    }
                })" class="w-full mt-6 py-3 border-2 border-stone-900 text-stone-900 text-[9px] font-black uppercase tracking-widest rounded-xl hover:bg-stone-900 hover:text-white transition-all active:scale-95">
                    Procesar Compra de Emergencia
                </button>
            </div>

            <!-- Tax Compliance Alert -->
            <div class="bg-stone-900 rounded-2xl p-6 relative overflow-hidden shadow-2xl">
                <div class="absolute inset-0 opacity-[0.05]" style="background-image: radial-gradient(#ceff5e 1px, transparent 1px); background-size: 15px 15px;"></div>
                <div class="relative z-10 flex items-start gap-4">
                    <div class="w-10 h-10 bg-primary/20 rounded-lg flex items-center justify-center text-primary group-hover:scale-110 transition-transform">
                        <span class="material-symbols-outlined">gavel</span>
                    </div>
                    <div>
                        <h4 class="text-xs font-black text-white uppercase tracking-tight">Vigencia Fiscal SENIAT</h4>
                        <p class="text-[9px] text-stone-400 font-bold uppercase mt-2 leading-relaxed">Sincronización confirmada para Cierre de Libro de Compras. RIF: J-40308741-5.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Final Legal Note -->
    <div class="pt-8 border-t border-stone-100 flex justify-between items-center opacity-40">
        <p class="text-[9px] font-black text-stone-500 uppercase tracking-widest">MAYOR DE REPUESTO LA CIMA, C.A. • CONTROL DE GESTIÓN DE COMPRAS • 2026</p>
        <p class="text-[9px] font-black text-stone-500 uppercase tracking-widest font-mono italic">Ref Code: ZENITH-采购-PRO</p>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('erp/js/compras.js') }}"></script>
    <style>
      .kpi-card {
        @apply bg-white rounded-xl border border-stone-200 p-6 hover:shadow-lg transition-all hover:border-primary/30;
      }
      .action-btn {
        @apply flex items-center justify-center gap-3 p-5 rounded-xl font-headline font-bold text-sm uppercase tracking-wider transition-all active:scale-[0.98];
      }
      .data-table th {
        @apply text-xs font-bold text-stone-500 uppercase tracking-wider pb-3 text-left;
      }
      .data-table td {
        @apply text-sm py-3;
      }
      .badge {
        @apply px-2 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider;
      }
      .badge-green {
        @apply bg-green-100 text-green-700;
      }
      .badge-yellow {
        @apply bg-yellow-100 text-yellow-700;
      }
      .badge-red {
        @apply bg-red-100 text-red-700;
      }
      .badge-blue {
        @apply bg-blue-100 text-blue-700;
      }
    </style>
@endpush
