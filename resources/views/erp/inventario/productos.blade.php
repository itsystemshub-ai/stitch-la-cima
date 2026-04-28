@extends('erp.layouts.app')

@section('title', 'Maestro de Productos')

@section('breadcrumb')
    <a href="{{ url('/erp/dashboard') }}" class="hover:text-stone-900 transition-colors">ERP</a>
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <a href="{{ url('/erp/inventario') }}" class="hover:text-stone-900 transition-colors">Inventario</a>
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <span class="text-stone-900">Maestro de Productos</span>
@endsection

@section('content')
    <!-- Unified Page Header (Match Lista de Precios Style) -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6 mb-10 pb-8 border-b border-stone-100">
        <div>
            <div class="flex items-center gap-2 mb-2">
                <span class="w-8 h-[2px] bg-primary"></span>
                <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em]">Gestión de Activos en Producción</p>
            </div>
            <h1 class="text-5xl font-headline font-black text-stone-900 tracking-tighter uppercase leading-none italic">
                Maestro <span class="text-stone-400 italic">Productos</span>
            </h1>
            <p class="text-[12px] text-stone-400 mt-2 font-black uppercase tracking-[0.2em] italic">MAYOR DE REPUESTO LA CIMA, C.A. • RIF: J-40308741-5</p>
        </div>
        
        <div class="flex items-center gap-3">
            <a href="{{ route('erp.inventario.lista-precios') }}" class="bg-white border border-stone-200 text-stone-900 px-8 py-4 text-[10px] font-black uppercase tracking-widest flex items-center gap-3 hover:border-primary transition-all rounded-xl shadow-sm group">
                <span class="material-symbols-outlined text-lg text-stone-400 group-hover:text-primary transition-colors">dataset</span>
                Carga Masiva Excel
            </a>
            <button onclick="openModal('createProductModal')" class="bg-primary text-stone-950 px-8 py-4 rounded-xl text-[10px] font-black uppercase tracking-widest flex items-center gap-3 hover:brightness-110 transition-all shadow-lg active:scale-95">
                <span class="material-symbols-outlined font-black text-lg">add</span>
                Añadir Producto
            </button>
        </div>
    </div>
    
    <!-- Compact Monitoring Metrics -->
    <div id="tour-product-filters" class="flex flex-wrap gap-4 mb-8">
        <!-- Status Mini-Card: Criticidad -->
        <div class="bg-white border border-stone-200 px-6 py-4 rounded-[20px] shadow-sm flex items-center gap-4 hover:border-red-500/30 transition-all group/alert {{ $low_stock_count > 0 ? 'bg-red-50/10' : '' }} min-w-[280px]">
            <div class="w-2 h-10 rounded-full {{ $low_stock_count > 0 ? 'bg-red-500 animate-pulse' : 'bg-green-500' }}"></div>
            <div>
                <p class="text-[8px] font-black text-stone-400 uppercase tracking-widest leading-none mb-1">Estatus de Criticidad</p>
                <h4 class="text-lg font-headline font-black text-stone-900 uppercase tracking-tighter italic leading-none">
                    {{ $low_stock_count > 0 ? 'ALERTA STOCK' : 'ÓPTIMO' }}
                </h4>
                <p class="text-[9px] font-bold text-stone-500 uppercase tracking-tight mt-1">
                    {{ $low_stock_count }} ITEMS CRÍTICOS
                </p>
            </div>
        </div>

        <!-- Metric Mini-Card: Valuación -->
        <div class="bg-stone-900 border border-stone-800 px-6 py-4 rounded-[20px] shadow-lg flex items-center gap-4 group/vault min-w-[280px]">
            <div class="w-10 h-10 bg-stone-800 rounded-xl flex items-center justify-center text-primary">
                <span class="material-symbols-outlined text-lg">payments</span>
            </div>
            <div>
                <p class="text-[8px] font-black text-primary uppercase tracking-widest leading-none mb-1">Bóveda de Activos</p>
                <div class="flex items-baseline gap-1">
                    <span class="text-xl font-headline font-black text-white tracking-tighter leading-none">${{ number_format($inventory_value / 1000, 1) }}</span>
                    <span class="text-primary text-xs font-light">K</span>
                </div>
                <p class="text-[8px] font-bold text-stone-500 uppercase tracking-widest mt-1 flex items-center gap-1">
                    <span class="w-1.5 h-1.5 rounded-full bg-primary/50"></span>
                    USD Global
                </p>
            </div>
        </div>
    </div>

    <!-- Main Data Grid: High-Precision Industrial Table -->
    <div class="bg-white border border-stone-200 rounded-[32px] shadow-xl overflow-hidden mb-12">
        <div class="p-8 border-b border-stone-100 bg-stone-50/50 flex flex-col xl:flex-row justify-between items-start xl:items-center gap-6">
            <div class="flex items-center gap-6">
                <div class="w-16 h-16 bg-stone-900 rounded-2xl flex items-center justify-center text-primary shadow-lg shadow-stone-900/10">
                    <span class="material-symbols-outlined text-3xl font-black">inventory_2</span>
                </div>
                <div>
                    <h2 class="text-2xl font-headline font-black text-stone-900 uppercase tracking-tighter leading-none italic">
                        Inventario <span class="text-stone-400">Maestro</span>
                    </h2>
                    <p class="text-[10px] text-stone-400 font-bold uppercase tracking-[0.3em] mt-2">Protocolo de Control J-40308741-5</p>
                </div>
            </div>

            <div class="flex flex-wrap items-center gap-4 w-full xl:w-auto">
                <form action="{{ route('erp.inventario.productos') }}" method="GET" class="relative flex-1 xl:flex-none">
                    <span class="material-symbols-outlined absolute left-5 top-1/2 -translate-y-1/2 text-stone-400">search</span>
                    <input name="search" value="{{ request('search') }}" onblur="this.form.submit()" class="w-full xl:w-80 bg-white border-stone-200 rounded-2xl pl-14 pr-6 py-4 text-[12px] font-black text-stone-900 focus:ring-8 focus:ring-primary/5 focus:border-primary transition-all placeholder:text-stone-300 uppercase tracking-tight" placeholder="BUSCAR POR SKU O NOMBRE...">
                </form>
                
                <div class="flex items-center gap-2 bg-white p-1.5 rounded-2xl border border-stone-100 shadow-sm">
                    <button class="w-11 h-11 flex items-center justify-center bg-stone-50 hover:bg-stone-950 text-stone-400 hover:text-primary transition-all rounded-xl" title="Configuración">
                        <span class="material-symbols-outlined text-lg">settings</span>
                    </button>
                    <a href="{{ route('erp.inventario.productos') }}" class="w-11 h-11 flex items-center justify-center bg-stone-50 hover:bg-stone-950 text-stone-400 hover:text-primary transition-all rounded-xl" title="Refrescar">
                        <span class="material-symbols-outlined text-lg">sync</span>
                    </a>
                    <button class="w-11 h-11 flex items-center justify-center bg-stone-50 hover:bg-stone-950 text-stone-400 hover:text-primary transition-all rounded-xl" title="Filtros Avanzados">
                        <span class="material-symbols-outlined text-lg">tune</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse min-w-[1200px]">
                <thead>
                    <tr class="zenith-table-header">
                        <th class="py-6 px-8 w-12"><input type="checkbox" class="w-4 h-4 rounded border-stone-300 text-primary focus:ring-primary"></th>
                        <th class="py-6 px-4">
                            <a href="{{ request()->fullUrlWithQuery(['sort_by' => 'codigo_oem', 'sort_order' => ($sortBy == 'codigo_oem' && $sortOrder == 'asc') ? 'desc' : 'asc']) }}" class="flex items-center gap-2 group hover:text-stone-900">
                                IDENTIFICADOR SKU
                                <span class="material-symbols-outlined text-xs {{ $sortBy == 'codigo_oem' ? 'text-primary' : 'text-stone-300' }}">swap_vert</span>
                            </a>
                        </th>
                        <th class="py-6 px-4">DESCRIPCIÓN TÉCNICA DEL REPUESTO</th>
                        <th class="py-6 px-4">CATEGORÍA / SISTEMA</th>
                        <th class="py-6 px-4">MARCA OPERATIVA / FAB.</th>
                        <th class="py-6 px-4 text-right">PRECIO VENTA</th>
                        <th class="py-6 px-4">DISPONIBILIDAD STOCK</th>
                        <th class="py-6 px-8 text-center">GESTIÓN</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-50">
                    @forelse($products as $index => $product)
                    <tr class="zenith-table-row group/row">
                        <td class="py-5 px-8"><input type="checkbox" class="w-4 h-4 rounded border-stone-300 text-primary focus:ring-primary"></td>
                        <td class="py-5 px-4 font-mono">
                            <span class="zenith-table-sku">
                                {{ $product->codigo_oem }}
                            </span>
                        </td>
                        <td class="py-5 px-4">
                            <a href="{{ url('/tienda/detalle_productos?id=' . $product->id) }}" target="_blank" class="zenith-table-main hover:text-primary transition-colors block">
                                {{ $product->nombre }}
                            </a>
                            <p class="zenith-table-secondary mt-1">ID Central: #{{ str_pad($product->id, 5, '0', STR_PAD_LEFT) }}</p>
                        </td>
                        <td class="py-5 px-4">
                            <span class="zenith-table-secondary font-black text-stone-600">{{ $product->categoria ?? 'GENERAL' }}</span>
                        </td>
                        <td class="py-5 px-4">
                            <div class="flex items-center gap-2">
                                <span class="zenith-table-secondary">{{ $product->marca ?? '-' }}</span>
                                <span class="text-stone-200">|</span>
                                <span class="zenith-table-secondary">{{ $product->fabricante ?? '-' }}</span>
                            </div>
                        </td>
                        <td class="py-5 px-4 text-right">
                            <span class="zenith-table-price">${{ number_format($product->precio_mayor, 2) }}</span>
                        </td>
                        <td class="py-5 px-4">
                            @php $safeMinimo = max(1, (float)$product->stock_minimo); @endphp
                            @php $stockPercent = min(100, ($product->stock_actual / ($safeMinimo * 3)) * 100); @endphp
                            <div class="flex items-center gap-4">
                                <span class="text-[12px] font-black {{ $product->stock_actual <= $safeMinimo ? 'text-red-600 animate-pulse' : 'text-stone-950' }} min-w-[30px] font-mono leading-none">
                                    {{ number_format($product->stock_actual, 0) }}
                                </span>
                                <div class="w-full max-w-[80px] bg-stone-100 h-1.5 rounded-full overflow-hidden flex-shrink-0">
                                    <div class="{{ $product->stock_actual <= $safeMinimo ? 'bg-red-500 shadow-[0_0_8px_rgba(239,68,68,0.4)]' : 'bg-primary' }} h-full transition-all duration-700" style="width: {{ $stockPercent }}%"></div>
                                </div>
                            </div>
                        </td>
                        <td class="py-5 px-8 text-center">
                            <button class="w-10 h-10 bg-white border border-stone-100 text-stone-400 hover:bg-stone-950 hover:text-primary hover:border-stone-950 transition-all rounded-xl shadow-sm flex items-center justify-center mx-auto">
                                <span class="material-symbols-outlined text-lg">more_vert</span>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="py-20 text-center">
                            <span class="material-symbols-outlined text-5xl text-stone-100 mb-4">inventory_2</span>
                            <p class="text-[10px] font-black text-stone-300 uppercase tracking-[0.5em]">No se detectaron activos en el maestro</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Footer: Pagination & Insights -->
        <div class="p-8 border-t border-stone-100 bg-stone-50/30 flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="flex items-center gap-4">
                <span class="text-[10px] font-black text-stone-400 uppercase tracking-widest">Sincronización: 100% OK</span>
                <span class="w-1 h-4 bg-stone-200 rounded-full"></span>
                <span class="text-[10px] font-black text-stone-900 uppercase tracking-widest">Mostrando {{ $products->total() }} Activos Registrados</span>
            </div>
            <div>
                {{ $products->appends(request()->query())->links('vendor.pagination.tailwind_zenith') }}
            </div>
        </div>
    </div>
 </div>
    </div>  </div>
    </div>
@endsection

@section('modals')
    <!-- Technical Data Sheet Modal (Create) -->
    <div id="createProductModal" class="hidden fixed inset-0 bg-stone-950/60 backdrop-blur-xl z-[100] flex items-center justify-center p-4">
        <div class="bg-white rounded-[40px] w-full max-w-5xl shadow-2xl border border-white/10 overflow-hidden animate-in fade-in zoom-in duration-500 max-h-[90vh] flex flex-col">
            <div class="p-10 border-b border-stone-100 flex justify-between items-start bg-stone-50/50">
                <div class="flex items-center gap-6">
                    <div class="w-16 h-16 bg-stone-900 rounded-3xl flex items-center justify-center text-primary shadow-2xl">
                        <span class="material-symbols-outlined text-3xl font-black">inventory_2</span>
                    </div>
                    <div>
                        <h3 class="text-4xl font-headline font-black text-stone-950 uppercase tracking-tighter leading-none">Apertura de <span class="text-primary italic">Ficha Técnica</span></h3>
                        <p class="text-[10px] text-stone-400 font-bold uppercase tracking-[0.3em] mt-2">Protocolo de Registro Central de Almacén</p>
                    </div>
                </div>
                <button onclick="closeModal('createProductModal')" class="group p-3 bg-white hover:bg-red-50 text-stone-400 hover:text-red-500 rounded-2xl border border-stone-100 transition-all shadow-sm">
                    <span class="material-symbols-outlined text-xl">close</span>
                </button>
            </div>
            <form action="{{ route('erp.inventario.productos.store') }}" method="POST" class="flex-1 overflow-y-auto">
                @csrf
                <div class="p-10 space-y-12">
                    <!-- Section: Core Specifications -->
                    <div class="grid grid-cols-12 gap-8">
                        <div class="col-span-12">
                            <div class="flex items-center gap-4 mb-4">
                                <span class="w-1 h-4 bg-primary rounded-full"></span>
                                <h4 class="text-[11px] font-black text-stone-900 uppercase tracking-[0.2em]">Especificaciones Nucleares</h4>
                            </div>
                        </div>
                        <div class="col-span-12 lg:col-span-8 space-y-2">
                            <label class="text-[9px] font-black text-stone-400 uppercase tracking-widest ml-1">Descripción Nominal del Activo</label>
                            <input type="text" name="nombre" placeholder="EJ. EMPAQUEDADURA DE CÁMARA (CULATA)" required class="w-full bg-stone-50 border-stone-100 rounded-2xl px-6 py-5 text-[12px] font-black text-stone-950 focus:ring-8 focus:ring-primary/5 transition-all uppercase placeholder:text-stone-300 tracking-tight">
                        </div>
                        <div class="col-span-12 lg:col-span-4 space-y-2">
                            <label class="text-[9px] font-black text-stone-400 uppercase tracking-widest ml-1">Código OEM (Identificador)</label>
                            <input type="text" name="codigo_oem" placeholder="XP-00000" required class="w-full bg-stone-50 border-stone-100 rounded-2xl px-6 py-5 text-[12px] font-black text-stone-950 focus:ring-8 focus:ring-primary/5 transition-all font-mono uppercase placeholder:text-stone-300 tracking-tighter">
                        </div>
                    </div>

                    <!-- Section: Technical Metadata -->
                    <div class="grid grid-cols-12 gap-6">
                        <div class="col-span-12">
                            <div class="flex items-center gap-4 mb-4">
                                <span class="w-1 h-4 bg-stone-900 rounded-full"></span>
                                <h4 class="text-[11px] font-black text-stone-900 uppercase tracking-[0.2em]">Metadatos Técnicos</h4>
                            </div>
                        </div>
                        <div class="col-span-12 md:col-span-4 space-y-2">
                            <label class="text-[9px] font-black text-stone-400 uppercase tracking-widest">Fabricante</label>
                            <input type="text" name="fabricante" class="w-full bg-stone-100/50 border-stone-100 rounded-xl px-5 py-4 text-[12px] font-black text-stone-900 focus:bg-white transition-all uppercase tracking-tight">
                        </div>
                        <div class="col-span-12 md:col-span-4 space-y-2">
                            <label class="text-[9px] font-black text-stone-400 uppercase tracking-widest">Marca Operativa</label>
                            <input type="text" name="marca" class="w-full bg-stone-100/50 border-stone-100 rounded-xl px-5 py-4 text-[12px] font-black text-stone-900 focus:bg-white transition-all uppercase tracking-tight">
                        </div>
                        <div class="col-span-12 md:col-span-4 space-y-2">
                            <label class="text-[9px] font-black text-stone-400 uppercase tracking-widest">Categoría de Sistema</label>
                            <input type="text" name="categoria" class="w-full bg-stone-100/50 border-stone-100 rounded-xl px-5 py-4 text-[12px] font-black text-stone-900 focus:bg-white transition-all uppercase tracking-tight">
                        </div>
                        <div class="col-span-12 md:col-span-3 space-y-2">
                            <label class="text-[9px] font-black text-stone-400 uppercase tracking-widest">Composición (Material)</label>
                            <input type="text" name="material" class="w-full bg-stone-100/50 border-stone-100 rounded-xl px-5 py-4 text-[12px] font-black text-stone-900 focus:bg-white transition-all uppercase tracking-tight">
                        </div>
                        <div class="col-span-12 md:col-span-3 space-y-2">
                            <label class="text-[9px] font-black text-stone-400 uppercase tracking-widest">Espesor Nominal</label>
                            <input type="text" name="espesor" class="w-full bg-stone-100/50 border-stone-100 rounded-xl px-5 py-4 text-[12px] font-black text-stone-900 focus:bg-white transition-all uppercase tracking-tight">
                        </div>
                        <div class="col-span-12 md:col-span-3 space-y-2">
                            <label class="text-[9px] font-black text-stone-400 uppercase tracking-widest">Dimensiones</label>
                            <input type="text" name="medidas" class="w-full bg-stone-100/50 border-stone-100 rounded-xl px-5 py-4 text-[12px] font-black text-stone-900 focus:bg-white transition-all uppercase tracking-tight">
                        </div>
                        <div class="col-span-12 md:col-span-3 space-y-2">
                            <label class="text-[9px] font-black text-stone-400 uppercase tracking-widest">Fecha Apertura</label>
                            <input type="date" name="fecha_incorporacion" class="w-full bg-stone-100/50 border-stone-100 rounded-xl px-5 py-4 text-[12px] font-black text-stone-900 focus:bg-white transition-all uppercase tracking-tight">
                        </div>
                    </div>

                    <!-- Section: Commercial Controls -->
                    <div class="bg-stone-50 border border-stone-100 p-10 rounded-[32px] shadow-inner relative overflow-hidden group">
                        <div class="relative z-10 grid grid-cols-1 md:grid-cols-2 gap-10">
                            <div class="space-y-4">
                                <label class="text-[10px] font-black text-stone-400 uppercase tracking-[0.4em] block">Precio Venta (USD)</label>
                                <div class="relative">
                                    <span class="absolute left-6 top-1/2 -translate-y-1/2 text-stone-200 font-headline font-black text-3xl">$</span>
                                    <input type="number" name="precio_mayor" step="0.01" required class="w-full bg-white border border-stone-200 rounded-[22px] pl-14 pr-6 py-6 text-3xl font-headline font-black text-stone-900 focus:border-primary transition-all outline-none shadow-sm">
                                </div>
                                <p class="text-[8px] text-stone-400 font-bold uppercase tracking-widest italic">Sujeto a márgenes de distribución autorizados</p>
                            </div>
                            <div class="space-y-4">
                                <label class="text-[10px] font-black text-stone-400 uppercase tracking-[0.4em] block">Stock de Apertura</label>
                                <div class="relative">
                                    <input type="number" name="stock_actual" value="0" required class="w-full bg-white border border-stone-200 rounded-[22px] px-6 py-6 text-3xl font-headline font-black text-stone-900 focus:border-primary transition-all outline-none shadow-sm">
                                    <span class="absolute right-6 top-1/2 -translate-y-1/2 text-stone-300 font-black uppercase text-[10px] tracking-widest">Unidades</span>
                                </div>
                                <p class="text-[8px] text-stone-400 font-bold uppercase tracking-widest italic">Inventario inicial disponible en almacén</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-10 bg-stone-50 border-t border-stone-100 flex flex-col md:flex-row gap-6">
                    <button type="button" onclick="closeModal('createProductModal')" class="flex-1 py-6 text-[11px] font-black uppercase text-stone-400 hover:text-red-500 transition-colors tracking-[0.2em] border border-transparent hover:border-red-100 rounded-2xl">Abortar Operación</button>
                    <button type="submit" class="flex-[2] py-6 bg-stone-900 text-primary text-[11px] font-black uppercase tracking-[0.4em] rounded-2xl shadow-2xl hover:bg-black transition-all active:scale-[0.98] flex items-center justify-center gap-4">
                        Sincronizar Bóveda de Activos
                        <span class="material-symbols-outlined text-sm">sync</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal(id) {
            document.getElementById(id).classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
        function closeModal(id) {
            document.getElementById(id).classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
    </script>
@endsection
