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
            <p class="text-xs text-stone-400 mt-2 font-medium uppercase tracking-widest text-[#9ca3af]">MAYOR DE REPUESTO LA CIMA, C.A. • RIF: J-40308741-5</p>
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

    <!-- Premium Monitoring Context -->
    <div id="tour-product-filters" class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-12">
        <div class="bg-white border border-stone-200 p-6 rounded-[24px] shadow-sm hover:border-primary/50 transition-all group/card">
            <div class="flex justify-between items-start mb-6">
                <div class="w-10 h-10 bg-stone-50 rounded-xl flex items-center justify-center text-stone-400 group-hover/card:bg-stone-950 group-hover/card:text-primary transition-all">
                    <span class="material-symbols-outlined">analytics</span>
                </div>
                <div class="text-right">
                    <p class="text-[9px] font-black text-stone-400 uppercase tracking-widest">Filtrar Categoría</p>
                </div>
            </div>
            <div class="relative">
                <select onchange="this.form.submit()" name="categoria" class="w-full bg-stone-100 border-none rounded-xl py-4 pl-4 pr-10 text-[11px] font-black text-stone-900 uppercase tracking-tight focus:ring-4 focus:ring-primary/10 cursor-pointer appearance-none shadow-inner">
                    <option value="">Todos los Repuestos</option>
                    @foreach($products->pluck('categoria')->unique()->filter() as $cat)
                        <option value="{{ $cat }}" {{ request('categoria') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                    @endforeach
                </select>
                <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-stone-400 pointer-events-none text-sm">filter_list</span>
            </div>
        </div>

        <div class="bg-white border border-stone-200 p-6 rounded-[24px] shadow-sm hover:border-primary/50 transition-all group/card">
            <div class="flex justify-between items-start mb-6">
                <div class="w-10 h-10 bg-stone-50 rounded-xl flex items-center justify-center text-stone-400 group-hover/card:bg-stone-950 group-hover/card:text-primary transition-all">
                    <span class="material-symbols-outlined">verified</span>
                </div>
                <div class="text-right">
                    <p class="text-[9px] font-black text-stone-400 uppercase tracking-widest">Línea de Marca</p>
                </div>
            </div>
            <div class="relative">
                <select onchange="this.form.submit()" name="marca" class="w-full bg-stone-100 border-none rounded-xl py-4 pl-4 pr-10 text-[11px] font-black text-stone-900 uppercase tracking-tight focus:ring-4 focus:ring-primary/10 cursor-pointer appearance-none shadow-inner">
                    <option value="">Cualquier Marca</option>
                    @foreach($products->pluck('marca')->unique()->filter() as $marca)
                        <option value="{{ $marca }}" {{ request('marca') == $marca ? 'selected' : '' }}>{{ $marca }}</option>
                    @endforeach
                </select>
                <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-stone-400 pointer-events-none text-sm">branding_watermark</span>
            </div>
        </div>

        <div class="bg-white border border-stone-200 p-6 rounded-[24px] shadow-sm relative overflow-hidden group/alert {{ $low_stock_count > 0 ? 'bg-red-50/50' : '' }}">
            <div class="absolute inset-y-0 left-0 w-1 {{ $low_stock_count > 0 ? 'bg-red-500' : 'bg-green-500' }}"></div>
            <div class="flex justify-between items-start mb-2">
                <p class="text-[9px] font-black text-stone-400 uppercase tracking-widest">Estatus de Criticidad</p>
                <span class="w-2 h-2 rounded-full {{ $low_stock_count > 0 ? 'bg-red-500 animate-ping' : 'bg-green-500' }}"></span>
            </div>
            <h4 class="text-2xl font-headline font-black text-stone-900 uppercase tracking-tighter italic">
                {{ $low_stock_count > 0 ? 'Nivel Crítico' : 'Stock Operativo' }}
            </h4>
            <p class="text-[10px] font-bold text-stone-500 uppercase tracking-widest mt-1">
                {{ $low_stock_count }} items requieren reposición
            </p>
            <div class="mt-4 flex gap-1">
                @for($i=0; $i<12; $i++)
                    <div class="flex-1 h-3 rounded-sm {{ $i < ($low_stock_count > 0 ? 8 : 12) ? ($low_stock_count > 0 ? 'bg-red-500' : 'bg-green-500') : 'bg-stone-100' }}"></div>
                @endfor
            </div>
        </div>

        <div class="bg-white border border-stone-200 p-6 rounded-[24px] shadow-sm hover:border-primary/50 transition-all group/card">
            <div class="flex justify-between items-start mb-6">
                <div class="w-10 h-10 bg-stone-50 rounded-xl flex items-center justify-center text-stone-400 group-hover/card:bg-stone-950 group-hover/card:text-primary transition-all">
                    <span class="material-symbols-outlined">payments</span>
                </div>
                <div class="text-right">
                    <p class="text-[9px] font-black text-stone-400 uppercase tracking-widest">Valuación Total</p>
                </div>
            </div>
            <div class="relative">
                <p class="text-4xl font-headline font-black text-stone-900 tracking-tighter leading-none mb-1">
                    ${{ number_format($inventory_value / 1000, 1) }}<span class="text-primary tracking-normal">K</span>
                </p>
                <div class="flex items-center gap-2 mt-2">
                     <span class="text-[8px] font-black px-2 py-0.5 bg-primary/20 text-primary rounded-full uppercase tracking-widest">Global Vault</span>
                     <span class="text-[8px] font-bold text-stone-500 uppercase tracking-widest text-[#9ca3af]">Activos al costo</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Industrial Data Grid -->
    <div class="bg-white border-x border-t border-stone-200 rounded-t-[32px] shadow-sm overflow-hidden">
        <div class="p-8 border-b border-stone-100 bg-stone-50/50 flex flex-col lg:flex-row justify-between items-start lg:items-center gap-6">
            <div>
                <h3 class="text-[12px] font-black text-stone-900 uppercase tracking-[0.2em] flex items-center gap-3">
                    <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                    Maestro de Activos Sincronizado
                </h3>
                <p class="text-[9px] text-stone-400 font-bold uppercase tracking-widest mt-1 italic">Reflejando registros auditados en tiempo real</p>
            </div>
            <div id="tour-product-search" class="flex items-center gap-4 w-full lg:w-auto">
                 <form action="{{ route('erp.inventario.productos') }}" method="GET" class="relative w-full lg:w-96 group">
                    <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-stone-400 group-focus-within:text-primary transition-colors">
                      <span class="material-symbols-outlined text-[18px]">hub</span>
                    </span>
                    <input name="search" value="{{ request('search') }}" class="bg-white border border-stone-200 text-[11px] pl-12 pr-12 py-3.5 w-full rounded-2xl uppercase font-black focus:ring-8 focus:ring-primary/5 transition-all outline-none placeholder:text-stone-300 shadow-inner" placeholder="Escanear SKU, nombre o marca..." type="text"/>
                    @if(request('search'))
                        <a href="{{ route('erp.inventario.productos') }}" class="absolute inset-y-0 right-0 pr-4 flex items-center text-stone-300 hover:text-red-500 transition-colors">
                            <span class="material-symbols-outlined text-[16px]">cancel</span>
                        </a>
                    @endif
                  </form>
            </div>
        </div>

        <div id="tour-product-table" class="overflow-x-auto custom-scrollbar border-b border-stone-200">
            <table class="w-full text-left border-collapse min-w-[1900px]">
                <thead>
                    <tr class="text-[9px] font-black text-stone-400 uppercase tracking-[0.2em] bg-stone-50/50 border-b border-stone-100">
                        <th class="p-6 sticky left-0 bg-stone-50 z-20 w-24">
                            <a href="{{ request()->fullUrlWithQuery(['sort_by' => 'codigo_oem', 'sort_order' => ($sortBy == 'codigo_oem' && $sortOrder == 'asc') ? 'desc' : 'asc']) }}" class="flex items-center gap-2 hover:text-stone-950 transition-colors">
                                <span class="material-symbols-outlined text-sm">qr_code</span> SKU
                                @if($sortBy == 'codigo_oem')
                                    <span class="material-symbols-outlined text-[14px] text-primary">{{ $sortOrder == 'asc' ? 'expand_less' : 'expand_more' }}</span>
                                @endif
                            </a>
                        </th>
                        <th class="p-6">Asset Image</th>
                        <th class="p-6 w-96 sticky left-24 bg-stone-50 z-20 border-r border-stone-100/50">
                            <a href="{{ request()->fullUrlWithQuery(['sort_by' => 'nombre', 'sort_order' => ($sortBy == 'nombre' && $sortOrder == 'asc') ? 'desc' : 'asc']) }}" class="flex items-center gap-2 hover:text-stone-950 transition-colors">
                                Descripción del Producto
                                @if($sortBy == 'nombre')
                                    <span class="material-symbols-outlined text-[14px] text-primary">{{ $sortOrder == 'asc' ? 'expand_less' : 'expand_more' }}</span>
                                @endif
                            </a>
                        </th>
                        <th class="p-6 text-center">
                            <a href="{{ request()->fullUrlWithQuery(['sort_by' => 'categoria', 'sort_order' => ($sortBy == 'categoria' && $sortOrder == 'asc') ? 'desc' : 'asc']) }}" class="flex items-center justify-center gap-2 hover:text-stone-950 transition-colors">
                                Categoría
                                @if($sortBy == 'categoria')
                                    <span class="material-symbols-outlined text-[14px] text-primary">{{ $sortOrder == 'asc' ? 'expand_less' : 'expand_more' }}</span>
                                @endif
                            </a>
                        </th>
                        <th class="p-6 text-center">Marca / Fábrica</th>
                        <th class="p-6 text-center">Material</th>
                        <th class="p-6 text-center">Espesor</th>
                        <th class="p-6 text-center">Medidas</th>
                        <th class="p-6 text-right">
                            <a href="{{ request()->fullUrlWithQuery(['sort_by' => 'precio_mayor', 'sort_order' => ($sortBy == 'precio_mayor' && $sortOrder == 'asc') ? 'desc' : 'asc']) }}" class="flex items-center justify-end gap-2 hover:text-stone-950 transition-colors">
                                Precio Venta 
                                @if($sortBy == 'precio_mayor')
                                    <span class="material-symbols-outlined text-[14px] text-primary">{{ $sortOrder == 'asc' ? 'expand_less' : 'expand_more' }}</span>
                                @endif
                            </a>
                        </th>
                        <th class="p-6 text-center">
                            <a href="{{ request()->fullUrlWithQuery(['sort_by' => 'stock_actual', 'sort_order' => ($sortBy == 'stock_actual' && $sortOrder == 'asc') ? 'desc' : 'asc']) }}" class="flex items-center justify-center gap-2 hover:text-stone-950 transition-colors">
                                Existencia
                                @if($sortBy == 'stock_actual')
                                    <span class="material-symbols-outlined text-[14px] text-primary">{{ $sortOrder == 'asc' ? 'expand_less' : 'expand_more' }}</span>
                                @endif
                            </a>
                        </th>
                        <th class="p-6 text-center w-32 bg-stone-50/80 sticky right-0 z-20">Control</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-100 text-[11px] font-bold">
                    @forelse($products as $product)
                    <tr class="hover:bg-stone-50/50 transition-all group border-l-4 {{ request('search') == $product->codigo_oem ? 'border-primary bg-primary/5 shadow-inner' : 'border-transparent hover:border-primary/40' }}">
                        <td class="p-6 sticky left-0 {{ request('search') == $product->codigo_oem ? 'bg-primary/5' : 'bg-white' }} group-hover:bg-stone-50 z-10">
                            <div class="flex flex-col gap-2">
                                <span class="font-mono text-[10px] text-stone-900 bg-stone-900/5 px-3 py-2 rounded-lg border border-stone-200 font-black tracking-widest inline-block w-fit">
                                    {{ $product->codigo_oem }}
                                </span>
                                @if(request('search') == $product->codigo_oem)
                                    <span class="text-[8px] font-black text-stone-950 bg-primary px-2 py-0.5 rounded-full uppercase tracking-tighter animate-pulse flex items-center gap-1 w-fit shadow-lg shadow-primary/20">
                                        <span class="material-symbols-outlined text-[10px]">target</span>
                                        Item Enfocado
                                    </span>
                                @endif
                            </div>
                        </td>
                        <td class="p-6">
                            <div class="w-14 h-14 bg-stone-100 rounded-2xl flex items-center justify-center border border-stone-200 group-hover:border-primary transition-all overflow-hidden relative shadow-sm">
                                @if($product->foto_path)
                                    <img src="{{ $product->foto_path }}" class="w-full h-full object-cover">
                                @else
                                    <span class="material-symbols-outlined text-stone-300 text-2xl group-hover:text-stone-900 transition-colors">settings_input_component</span>
                                @endif
                                <div class="absolute inset-0 bg-gradient-to-t from-stone-900/20 to-transparent"></div>
                            </div>
                        </td>
                        <td class="p-6 sticky left-24 bg-white group-hover:bg-stone-50 z-10 border-r border-stone-100">
                            <div class="space-y-1">
                                <p class="text-[13px] font-black text-stone-950 uppercase leading-snug tracking-tight group-hover:text-primary transition-colors">{{ $product->nombre }}</p>
                                <div class="flex items-center gap-2">
                                    <span class="text-[8px] font-black text-stone-400 uppercase tracking-widest italic leading-none border-t border-stone-100 pt-1">{{ $product->codigo_interno }}</span>
                                </div>
                            </div>
                        </td>
                        <td class="p-6 text-center">
                            <span class="px-4 py-2 bg-stone-950 text-primary text-[9px] font-black uppercase rounded-lg tracking-[0.1em] shadow-lg shadow-primary/5 inline-block min-w-[120px]">
                                {{ $product->categoria }}
                            </span>
                        </td>
                        <td class="p-6 text-center">
                            <div class="space-y-0.5">
                                <p class="text-[11px] font-black text-stone-900 uppercase italic">{{ $product->marca ?? '-' }}</p>
                                <p class="text-[9px] font-bold text-stone-400 uppercase tracking-wider">{{ $product->fabricante ?? 'Origen Desconocido' }}</p>
                            </div>
                        </td>
                        <td class="p-6 text-center font-bold text-stone-500 uppercase tracking-tight">
                            {{ $product->material ?? '-' }}
                        </td>
                        <td class="p-6 text-center font-mono text-stone-900 text-[10px]">
                            {{ $product->espesor ?? '-' }}
                        </td>
                        <td class="p-6 text-center font-mono text-stone-900 text-[10px]">
                            {{ $product->medidas ?? '-' }}
                        </td>
                        <td class="p-6 text-right">
                            <div class="relative inline-block">
                                <p class="text-xl font-headline font-black text-stone-950 tracking-tighter leading-none mb-1 group-hover:scale-105 transition-transform origin-right">${{ number_format($product->precio_mayor, 2) }}</p>
                                <div class="h-0.5 bg-primary w-full origin-right scale-x-0 group-hover:scale-x-100 transition-transform"></div>
                            </div>
                            <p class="text-[8px] text-stone-400 font-bold uppercase tracking-widest italic mt-1">Precio Mayorista</p>
                        </td>
                        <td class="p-6 text-center">
                            <div class="flex flex-col items-center gap-2">
                                <div class="flex items-baseline gap-1">
                                    <span class="text-lg font-headline font-black {{ $product->stock_actual <= $product->stock_minimo ? 'text-red-500 animate-pulse' : 'text-stone-950' }}">{{ number_format($product->stock_actual, 0) }}</span>
                                    <span class="text-[8px] font-black text-stone-400 uppercase">u.</span>
                                </div>
                                <div class="w-20 bg-stone-100 h-1.5 rounded-full overflow-hidden border border-stone-200">
                                     @php $stockPercent = min(100, ($product->stock_actual / ($product->stock_minimo ?: 1 * 5)) * 100); @endphp
                                    <div class="{{ $product->stock_actual <= $product->stock_minimo ? 'bg-red-500' : 'bg-primary' }} h-full transition-all duration-700" style="width: {{ $stockPercent }}%"></div>
                                </div>
                            </div>
                        </td>
                        <td class="p-6 sticky right-0 bg-stone-950/2 backdrop-blur-sm z-10 group-hover:bg-primary/5">
                            <div class="flex justify-center gap-3">
                                <button class="w-10 h-10 bg-white border border-stone-200 text-stone-400 hover:text-stone-950 hover:border-stone-950 hover:rotate-6 rounded-xl transition-all shadow-sm flex items-center justify-center group/icon">
                                    <span class="material-symbols-outlined text-lg">edit_square</span>
                                </button>
                                <button class="w-10 h-10 bg-white border border-stone-200 text-stone-400 hover:text-red-600 hover:border-red-600 hover:-rotate-6 rounded-xl transition-all shadow-sm flex items-center justify-center group/icon">
                                    <span class="material-symbols-outlined text-lg">analytics</span>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="11" class="p-32 text-center bg-stone-50/20">
                            <div class="flex flex-col items-center gap-8 border-2 border-dashed border-stone-200 rounded-[40px] p-20">
                                <div class="w-24 h-24 bg-stone-100 rounded-full flex items-center justify-center text-stone-200">
                                    <span class="material-symbols-outlined text-5xl">inventory_2</span>
                                </div>
                                <div>
                                    <p class="text-xl font-headline font-black text-stone-900 uppercase tracking-tighter mb-2">Bóveda de Activos Vacía</p>
                                    <p class="text-xs text-stone-400 font-bold uppercase tracking-widest max-w-sm mx-auto">No se han detectado registros que coincidan con los criterios de búsqueda actuales.</p>
                                </div>
                                <a href="{{ route('erp.inventario.productos') }}" class="inline-flex items-center gap-4 bg-stone-950 text-primary px-10 py-5 rounded-[22px] text-[10px] font-black uppercase tracking-[0.3em] hover:scale-105 transition-all shadow-2xl active:scale-95">
                                    <span class="material-symbols-outlined">restart_alt</span>
                                    Reinicializar Filtros
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="px-8 py-6 bg-stone-50/50 flex flex-col md:flex-row justify-between items-center gap-4 border-t border-stone-100">
            <div class="flex items-center gap-4">
                <p class="text-[9px] font-black text-stone-400 uppercase tracking-[0.2em] italic">Catálogo de Activos Sincronizado v4.2 • La Cima Command</p>
            </div>
            <div class="flex gap-2">
                {{ $products->appends(request()->query())->links('vendor.pagination.tailwind_zenith') }}
            </div>
        </div>
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
                            <input type="text" name="nombre" placeholder="EJ. EMPAQUEDADURA DE CÁMARA (CULATA)" required class="w-full bg-stone-50 border-stone-100 rounded-2xl px-6 py-5 text-sm font-black text-stone-950 focus:ring-8 focus:ring-primary/5 transition-all uppercase placeholder:text-stone-300">
                        </div>
                        <div class="col-span-12 lg:col-span-4 space-y-2">
                            <label class="text-[9px] font-black text-stone-400 uppercase tracking-widest ml-1">Código OEM (Identificador)</label>
                            <input type="text" name="codigo_oem" placeholder="XP-00000" required class="w-full bg-stone-50 border-stone-100 rounded-2xl px-6 py-5 text-sm font-black text-stone-950 focus:ring-8 focus:ring-primary/5 transition-all font-mono uppercase placeholder:text-stone-300">
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
                            <input type="text" name="fabricante" class="w-full bg-stone-100/50 border-stone-100 rounded-xl px-5 py-4 text-xs font-bold text-stone-900 focus:bg-white transition-all uppercase">
                        </div>
                        <div class="col-span-12 md:col-span-4 space-y-2">
                            <label class="text-[9px] font-black text-stone-400 uppercase tracking-widest">Marca Operativa</label>
                            <input type="text" name="marca" class="w-full bg-stone-100/50 border-stone-100 rounded-xl px-5 py-4 text-xs font-bold text-stone-900 focus:bg-white transition-all uppercase">
                        </div>
                        <div class="col-span-12 md:col-span-4 space-y-2">
                            <label class="text-[9px] font-black text-stone-400 uppercase tracking-widest">Categoría de Sistema</label>
                            <input type="text" name="categoria" class="w-full bg-stone-100/50 border-stone-100 rounded-xl px-5 py-4 text-xs font-bold text-stone-900 focus:bg-white transition-all uppercase">
                        </div>
                        <div class="col-span-12 md:col-span-3 space-y-2">
                            <label class="text-[9px] font-black text-stone-400 uppercase tracking-widest">Composición (Material)</label>
                            <input type="text" name="material" class="w-full bg-stone-100/50 border-stone-100 rounded-xl px-5 py-4 text-xs font-bold text-stone-900 focus:bg-white transition-all uppercase">
                        </div>
                        <div class="col-span-12 md:col-span-3 space-y-2">
                            <label class="text-[9px] font-black text-stone-400 uppercase tracking-widest">Espesor Nominal</label>
                            <input type="text" name="espesor" class="w-full bg-stone-100/50 border-stone-100 rounded-xl px-5 py-4 text-xs font-bold text-stone-900 focus:bg-white transition-all uppercase">
                        </div>
                        <div class="col-span-12 md:col-span-3 space-y-2">
                            <label class="text-[9px] font-black text-stone-400 uppercase tracking-widest">Dimensiones</label>
                            <input type="text" name="medidas" class="w-full bg-stone-100/50 border-stone-100 rounded-xl px-5 py-4 text-xs font-bold text-stone-900 focus:bg-white transition-all uppercase">
                        </div>
                        <div class="col-span-12 md:col-span-3 space-y-2">
                            <label class="text-[9px] font-black text-stone-400 uppercase tracking-widest">Fecha Apertura</label>
                            <input type="date" name="fecha_incorporacion" class="w-full bg-stone-100/50 border-stone-100 rounded-xl px-5 py-4 text-xs font-bold text-stone-900 focus:bg-white transition-all uppercase">
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
