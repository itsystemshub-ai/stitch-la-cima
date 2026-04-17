@extends('erp.layouts.app')

@section('title', 'Control de Inventario')

@push('styles')
<style>
  .kpi-card { @apply bg-white rounded-xl border border-stone-200 p-6 hover:shadow-lg transition-all hover:border-primary/30; }
  .action-btn { @apply flex items-center justify-center gap-3 p-5 rounded-xl font-headline font-bold text-sm uppercase tracking-wider transition-all active:scale-[0.98]; }
  .data-table th { @apply text-xs font-bold text-stone-500 uppercase tracking-wider pb-3 text-left; }
  .data-table td { @apply text-sm py-3; }
  .badge { @apply px-2 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider; }
</style>
@endpush

@section('breadcrumb')
    <a href="{{ url('/erp/inicio') }}" class="hover:text-stone-900 transition-colors">ERP</a>
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <span class="text-stone-900">Inventario</span>
@endsection

@section('content')
    <!-- Page Header: Industrial Identity -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6 mb-10">
        <div>
            <div class="flex items-center gap-2 mb-2">
                <span class="w-8 h-[2px] bg-primary"></span>
                <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em]">Gestión de Activos Físicos</p>
            </div>
            <h2 class="text-4xl font-headline font-black text-stone-900 tracking-tighter uppercase leading-none">Control de <span class="text-stone-400">Inventario</span></h2>
            <p class="text-xs text-stone-400 mt-2 font-medium uppercase tracking-widest">MAYOR DE REPUESTO LA CIMA, C.A. • RIF: J-40308741-5</p>
        </div>
        <div class="flex gap-3">
            <div class="bg-white border border-stone-200 px-5 py-3 rounded-xl shadow-sm text-center">
                <span class="text-[9px] font-bold text-stone-400 uppercase tracking-widest block mb-1">Stock de Emergencia</span>
                <p class="text-lg font-headline font-black text-red-600">{{ number_format($stats['low_stock'], 0) }} ITEMS</p>
            </div>
            <div class="bg-stone-900 px-5 py-3 rounded-xl shadow-xl text-center border border-stone-800">
                <span class="text-[9px] font-bold text-primary uppercase tracking-widest block mb-1">Estatus Global</span>
                <p class="text-lg font-headline font-black text-white">{{ $stats['low_stock'] > 0 ? 'ALERTA' : 'ÓPTIMO' }}</p>
            </div>
        </div>
    </div>

    <!-- Metric Bento Grid: Precision Analytics -->
    <div id="tour-inventory-stats" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        <!-- Value Card -->
        <div class="bg-white border border-stone-200 p-6 rounded-2xl hover:border-primary/50 transition-all group shadow-sm relative overflow-hidden">
            <div class="absolute -right-4 -top-4 opacity-[0.03] group-hover:scale-110 transition-transform duration-700">
                <span class="material-symbols-outlined text-8xl">account_balance_wallet</span>
            </div>
            <p class="text-[10px] font-black text-stone-400 uppercase tracking-widest mb-4">Valor Total Activo</p>
            <div class="flex items-baseline gap-2">
                <span class="text-3xl font-headline font-black text-stone-900">${{ number_format($stats['valuation'], 2) }}</span>
                <span class="text-[10px] font-bold text-stone-400 uppercase">USD</span>
            </div>
            <div class="mt-4 flex items-center gap-2">
                <span class="flex items-center text-[10px] font-bold text-green-600 bg-green-50 px-2 py-0.5 rounded-full">
                    <span class="material-symbols-outlined text-xs mr-1">trending_up</span>Estable
                </span>
                <span class="text-[9px] text-stone-400 font-medium uppercase tracking-tighter">Valuación Real</span>
            </div>
        </div>

        <!-- Turnover Card -->
        <div class="bg-white border border-stone-200 p-6 rounded-2xl hover:border-primary/50 transition-all group shadow-sm relative overflow-hidden">
            <div class="absolute -right-4 -top-4 opacity-[0.03] group-hover:scale-110 transition-transform duration-700">
                <span class="material-symbols-outlined text-8xl">sync_alt</span>
            </div>
            <p class="text-[10px] font-black text-stone-400 uppercase tracking-widest mb-4">Rotación Promedio</p>
            <div class="flex items-baseline gap-2">
                <span class="text-3xl font-headline font-black text-stone-900">4.2x</span>
                <span class="text-[10px] font-bold text-stone-400 uppercase">Ciclos</span>
            </div>
            <div class="mt-4 flex items-center gap-2">
                <span class="flex items-center text-[10px] font-bold text-primary-dim bg-primary/10 px-2 py-0.5 rounded-full">
                    <span class="material-symbols-outlined text-xs mr-1">bolt</span>Alto
                </span>
                <span class="text-[9px] text-stone-400 font-medium uppercase tracking-tighter">Demanda en Alza</span>
            </div>
        </div>

        <!-- Critical Items Card -->
        <div class="bg-white border border-stone-200 p-6 rounded-2xl border-amber-200 hover:border-amber-400 transition-all group shadow-sm relative overflow-hidden">
            <p class="text-[10px] font-black text-amber-600 uppercase tracking-widest mb-4">Nivel de Alerta</p>
            <div class="flex items-baseline gap-2">
                <span class="text-3xl font-headline font-black text-amber-600">{{ $stats['low_stock'] }} ITEMS</span>
            </div>
            <div class="mt-4">
                <div class="w-full bg-stone-100 h-1 rounded-full overflow-hidden">
                    @php $low_stock_percent = $stats['total_sku'] > 0 ? ($stats['low_stock'] / $stats['total_sku']) * 100 : 0; @endphp
                    <div class="bg-amber-500 h-full" style="width: {{ $low_stock_percent }}%"></div>
                </div>
                <p class="text-[9px] text-stone-400 font-medium uppercase tracking-tighter mt-2">{{ round($low_stock_percent, 1) }}% de items críticos</p>
            </div>
        </div>

        <!-- Inventory Integrity -->
        <div class="bg-stone-900 border border-stone-800 p-6 rounded-2xl group shadow-2xl relative overflow-hidden">
            <div class="absolute inset-0 opacity-[0.05] group-hover:opacity-[0.1] transition-opacity" style="background-image: radial-gradient(#ceff5e 1px, transparent 1px); background-size: 15px 15px;"></div>
            <p class="text-[10px] font-black text-primary uppercase tracking-widest mb-4 relative z-10">Integridad de Stock</p>
            <div class="flex items-baseline gap-2 relative z-10">
                <span class="text-3xl font-headline font-black text-white">100%</span>
            </div>
            <p class="text-[9px] text-stone-400 font-medium uppercase tracking-tighter mt-4 relative z-10 flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                Sincronizado con Tienda Virtual
            </p>
        </div>
    </div>

    <!-- System Interaction Panel: Quick Access -->
    <div id="tour-inventory-actions" class="grid grid-cols-2 md:grid-cols-3 gap-6 mb-10">
        <a href="{{ url('/erp/inventario/productos') }}" class="group bg-white border border-stone-200 p-6 rounded-2xl flex items-center gap-5 hover:border-primary hover:bg-primary/5 transition-all shadow-sm">
            <div class="w-14 h-14 bg-stone-900 rounded-xl flex items-center justify-center text-primary group-hover:scale-110 transition-transform">
                <span class="material-symbols-outlined text-3xl">category</span>
            </div>
            <div class="min-w-0">
                <p class="text-sm font-black text-stone-900 uppercase truncate tracking-tight">Maestro</p>
                <p class="text-xs text-stone-400 font-bold uppercase truncate">{{ number_format($stats['total_sku'], 0) }} SKUs</p>
            </div>
        </a>
        <a href="{{ url('/erp/inventario/desarrollo') }}" class="group bg-white border border-stone-200 p-6 rounded-2xl flex items-center gap-5 hover:border-primary hover:bg-primary/5 transition-all shadow-sm">
            <div class="w-14 h-14 bg-stone-100 rounded-xl flex items-center justify-center text-stone-500 group-hover:bg-primary group-hover:text-black transition-all">
                <span class="material-symbols-outlined text-3xl">biotech</span>
            </div>
            <div class="min-w-0">
                <p class="text-sm font-black text-stone-900 uppercase truncate tracking-tight">Desarrollo</p>
                <p class="text-xs text-stone-400 font-bold uppercase truncate">Nuevos Items</p>
            </div>
        </a>
        <a href="{{ url('/erp/inventario/lista-precios') }}" class="group bg-white border border-stone-200 p-6 rounded-2xl flex items-center gap-5 hover:border-primary hover:bg-primary/5 transition-all shadow-sm">
            <div class="w-14 h-14 bg-stone-100 rounded-xl flex items-center justify-center text-stone-500 group-hover:bg-primary group-hover:text-black transition-all">
                <span class="material-symbols-outlined text-3xl">payments</span>
            </div>
            <div class="min-w-0">
                <p class="text-sm font-black text-stone-900 uppercase truncate tracking-tight">Lista Precios</p>
                <p class="text-xs text-stone-400 font-bold uppercase truncate">Carga Masiva</p>
            </div>
        </a>
        <a href="{{ url('/erp/inventario/kardex') }}" class="group bg-white border border-stone-200 p-6 rounded-2xl flex items-center gap-5 hover:border-primary hover:bg-primary/5 transition-all shadow-sm">
            <div class="w-14 h-14 bg-stone-100 rounded-xl flex items-center justify-center text-stone-500 group-hover:bg-primary group-hover:text-black transition-all">
                <span class="material-symbols-outlined text-3xl">receipt_long</span>
            </div>
            <div class="min-w-0">
                <p class="text-sm font-black text-stone-900 uppercase truncate tracking-tight">Kardex</p>
                <p class="text-xs text-stone-400 font-bold uppercase truncate">Auditoría 24/7</p>
            </div>
        </a>
        <a href="{{ url('/erp/inventario/auditoria') }}" class="group bg-white border border-stone-200 p-6 rounded-2xl flex items-center gap-5 hover:border-primary hover:bg-primary/5 transition-all shadow-sm">
            <div class="w-14 h-14 bg-stone-100 rounded-xl flex items-center justify-center text-stone-500 group-hover:bg-primary group-hover:text-black transition-all">
                <span class="material-symbols-outlined text-3xl">assignment</span>
            </div>
            <div class="min-w-0">
                <p class="text-sm font-black text-stone-900 uppercase truncate tracking-tight">Auditoría</p>
                <p class="text-xs text-stone-400 font-bold uppercase truncate">Física / Real</p>
            </div>
        </a>
        <a href="{{ url('/erp/inventario/ajustes') }}" class="group bg-white border border-stone-200 p-6 rounded-2xl flex items-center gap-5 hover:border-primary hover:bg-primary/5 transition-all shadow-sm">
            <div class="w-14 h-14 bg-stone-100 rounded-xl flex items-center justify-center text-stone-500 group-hover:bg-primary group-hover:text-black transition-all">
                <span class="material-symbols-outlined text-3xl">edit_note</span>
            </div>
            <div class="min-w-0">
                <p class="text-sm font-black text-stone-900 uppercase truncate tracking-tight">Ajustes</p>
                <p class="text-xs text-stone-400 font-bold uppercase truncate">Cuadratura</p>
            </div>
        </a>
    </div>

    <!-- Inventory Operational Dashboard -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-10">
        <!-- Main Movement Table -->
        <div class="lg:col-span-2 bg-white rounded-2xl border border-stone-200 overflow-hidden shadow-sm">
            <div class="p-6 border-b border-stone-100 flex justify-between items-center">
                <div class="flex items-center gap-3">
                    <div class="w-2 h-6 bg-primary rounded-full"></div>
                    <h3 class="text-lg font-headline font-black text-stone-900 uppercase tracking-tighter">Movimientos de Stock Central</h3>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left font-body">
                    <thead>
                        <tr class="bg-stone-50">
                            <th class="px-6 py-4 text-[10px] font-black text-stone-400 uppercase tracking-widest text-left">Fecha/Doc</th>
                            <th class="px-6 py-4 text-[10px] font-black text-stone-400 uppercase tracking-widest text-left">Producto</th>
                            <th class="px-6 py-4 text-[10px] font-black text-stone-400 uppercase tracking-widest text-right">Cant</th>
                            <th class="px-6 py-4 text-[10px] font-black text-stone-400 uppercase tracking-widest text-center">Estatus</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-stone-100">
                        @forelse($stats['recent_movements'] as $movement)
                        <tr class="hover:bg-stone-50/50 transition-colors group">
                            <td class="px-6 py-4">
                                <p class="text-[10px] font-bold text-stone-900 uppercase mb-0.5">{{ $movement->created_at->format('d M Y') }}</p>
                                <p class="text-[9px] font-mono text-stone-400">#{{ $movement->reference_id ?? 'INT-'.str_pad($movement->id, 5, '0', STR_PAD_LEFT) }}</p>
                            </td>
                            <td class="px-6 py-4 font-bold text-xs uppercase">{{ $movement->product->nombre }}</td>
                            <td class="px-6 py-4 text-right">
                                <span class="text-xs font-black {{ $movement->type == 'IN' ? 'text-green-600' : 'text-red-600' }}">
                                    {{ $movement->type == 'IN' ? '+' : '-' }}{{ number_format($movement->quantity, 0) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="badge {{ $movement->type == 'IN' ? 'badge-green' : ($movement->type == 'OUT' ? 'badge-red' : 'badge-stone') }}">
                                    {{ $movement->type }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center">
                                <p class="text-[10px] font-black text-stone-400 uppercase tracking-widest">Sin movimientos recientes registrados</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="p-4 bg-stone-50 border-t border-stone-100 flex justify-center">
                <a href="{{ url('/erp/inventario/kardex') }}" class="text-[10px] font-black text-stone-400 uppercase tracking-widest hover:text-stone-900 transition-colors">Visualizar Historial Maestro de Movimientos</a>
            </div>
        </div>

        <!-- Right Column: Compliance & Auditoria -->
        <div class="space-y-6">
            <div class="bg-white rounded-2xl border border-stone-200 p-6 shadow-sm">
                <h3 class="text-xs font-black text-stone-900 uppercase tracking-widest mb-6">Composición del Catálogo</h3>
                <div class="space-y-4">
                    <div class="group cursor-default">
                        <div class="flex justify-between items-end mb-1">
                            <span class="text-[10px] font-bold text-stone-500 uppercase">Motor Heavy Duty</span>
                            <span class="text-[10px] font-black text-stone-900">45%</span>
                        </div>
                        <div class="w-full bg-stone-100 h-2 rounded-full overflow-hidden">
                            <div class="bg-stone-900 group-hover:bg-primary h-full w-[45%] transition-colors duration-500"></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="bg-stone-900 rounded-2xl p-6 shadow-xl border border-stone-800">
                <p class="text-[10px] font-bold text-primary uppercase tracking-widest mb-3">Vigencia Fiscal</p>
                <p class="text-xs text-stone-400 leading-relaxed font-medium uppercase italic">Art. 177 ISLR • Cumplimiento Normativo SENIAT</p>
            </div>
        </div>
    </div>

    <!-- Dashboard Spotlight Items (Dangling Fix) -->
    <div class="mt-8">
        <div class="flex items-center gap-3 mb-6">
            <div class="w-8 h-[2px] bg-primary"></div>
            <h3 class="text-sm font-black text-stone-900 uppercase tracking-widest">Items de Inventario Destacados</h3>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          @foreach($stats['featured_products'] as $product)
          <div class="flex items-center p-4 bg-white border border-stone-200 rounded-xl hover:border-primary transition-all shadow-sm">
            <div class="w-12 h-12 bg-stone-100 rounded-lg flex items-center justify-center border border-stone-200 flex-shrink-0">
               <span class="material-symbols-outlined text-stone-400">inventory_2</span>
            </div>
            <div class="ml-4 flex-1 min-w-0">
              <p class="text-[10px] font-bold text-primary uppercase tracking-wider">SKU: {{ $product->codigo_oem }}</p>
              <p class="text-sm font-bold text-stone-900 truncate uppercase">{{ $product->nombre }}</p>
              <div class="flex gap-4 mt-1">
                 <div><span class="text-[9px] text-stone-400 font-bold uppercase">Stock:</span> <span class="text-[9px] font-black {{ $product->stock_actual <= $product->stock_minimo ? 'text-red-600' : 'text-stone-900' }}">{{ number_format($product->stock_actual, 0) }}</span></div>
                 <div><span class="text-[9px] text-stone-400 font-bold uppercase">Valor:</span> <span class="text-[9px] font-black text-green-600">${{ number_format($product->stock_actual * $product->costo_compra, 0) }}</span></div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
    </div>
@endsection

