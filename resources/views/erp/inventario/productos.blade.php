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
    <!-- Page Header: Strategic Inventory Management -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap:6 mb:10 pb:8 border-b border-stone-100">
        <div>
            <div class="flex items-center gap-2 mb-2">
                <span class="w-8 h-[2px] bg-primary"></span>
                <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em]">Gestión de Stock Central</p>
            </div>
            <h1 class="text-5xl font-headline font-black text-stone-900 tracking-tighter uppercase leading-none italic">Maestro de <span class="text-stone-400">Productos</span></h1>
            <p class="text-xs text-stone-400 mt-2 font-medium uppercase tracking-widest text-[#9ca3af]">MAYOR DE REPUESTO LA CIMA, C.A. • RIF: J-40308741-5</p>
        </div>
        <div class="flex gap-3">
             <a href="{{ route('erp.inventario.lista-precios') }}" class="bg-white border border-stone-200 text-stone-900 px-8 py-4 text-[10px] font-black uppercase tracking-widest flex items-center gap-3 hover:border-primary transition-all rounded-xl shadow-sm">
                <span class="material-symbols-outlined text-lg text-primary">upload_file</span>
                Carga Masiva Excel
            </a>
            <button onclick="openModal('createProductModal')" class="bg-stone-900 text-primary px-10 py-4 text-[10px] font-black uppercase tracking-[0.2em] flex items-center gap-3 hover:bg-black transition-all rounded-xl shadow-xl active:scale-95 group/btn">
                <span class="material-symbols-outlined text-[18px] group-hover/btn:rotate-90 transition-transform font-black">add</span>
                Nuevo Producto
            </button>
        </div>
    </div>

    <!-- Advanced Analytics & Filtering -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
        <!-- ... (Stat panels remain the same for now, but I'll update the colors if needed) ... -->
        <div class="bg-white border border-stone-200 p-8 rounded-[32px] shadow-sm hover:border-primary/40 transition-all group">
            <p class="text-[9px] font-black text-stone-400 uppercase tracking-widest mb-4">Filtrar Categoría</p>
            <div class="relative">
                <select class="w-full bg-stone-50 border-none rounded-xl py-4 pl-4 pr-10 text-[11px] font-black text-stone-900 uppercase tracking-tight focus:ring-4 focus:ring-primary/10 cursor-pointer appearance-none">
                    <option>Todos los Repuestos</option>
                    @foreach($products->pluck('categoria')->unique() as $cat)
                        <option>{{ $cat }}</option>
                    @endforeach
                </select>
                <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-stone-400 pointer-events-none">expand_more</span>
            </div>
        </div>

        <div class="bg-white border border-stone-200 p-8 rounded-[32px] shadow-sm hover:border-primary/40 transition-all group">
            <p class="text-[9px] font-black text-stone-400 uppercase tracking-widest mb-4">Línea de Marca</p>
            <div class="relative">
                <select class="w-full bg-stone-50 border-none rounded-xl py-4 pl-4 pr-10 text-[11px] font-black text-stone-900 uppercase tracking-tight focus:ring-4 focus:ring-primary/10 cursor-pointer appearance-none">
                    <option>Cualquier Marca</option>
                    @foreach($products->pluck('marca')->unique() as $marca)
                        <option>{{ $marca }}</option>
                    @endforeach
                </select>
                <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-stone-400 pointer-events-none">expand_more</span>
            </div>
        </div>

        <div class="bg-white border border-stone-200 p-8 rounded-[32px] shadow-sm {{ $low_stock_count > 0 ? 'border-amber-200' : 'border-stone-200' }} relative overflow-hidden group">
            <div class="absolute inset-y-0 left-0 w-1.5 {{ $low_stock_count > 0 ? 'bg-amber-500' : 'bg-green-500' }}"></div>
            <p class="text-[9px] font-black text-stone-400 uppercase tracking-widest mb-4">Estatus de Alerta</p>
            <div class="flex items-center gap-3">
                <span class="w-3 h-3 rounded-full {{ $low_stock_count > 0 ? 'bg-amber-500 animate-pulse' : 'bg-green-500' }}"></span>
                <span class="text-sm font-black text-stone-900 uppercase italic">Stock Bajo ({{ $low_stock_count }})</span>
            </div>
        </div>

        <div class="bg-stone-900 border border-stone-800 p-8 rounded-[32px] shadow-xl flex items-center justify-center relative overflow-hidden group">
            <div class="absolute inset-0 opacity-[0.05] group-hover:opacity-[0.1] transition-opacity" style="background-image: radial-gradient(#ceff5e 1px, transparent 1px); background-size: 10px 10px;"></div>
            <div class="text-center z-10 transition-transform group-hover:scale-110">
                <p class="text-4xl font-headline font-black text-primary tracking-tighter">${{ number_format($inventory_value / 1000, 1) }}K</p>
                <p class="text-[9px] text-stone-500 font-bold uppercase tracking-widest mt-1">Valuación Almacén</p>
            </div>
        </div>
    </div>

    <!-- Product Master Table: Data Grid (Synchronized with 13 Columns) -->
    <div class="bg-white border border-stone-200 rounded-[40px] shadow-sm overflow-hidden mb-12">
        <div class="p-8 border-b border-stone-50 bg-stone-50/30 flex justify-between items-center">
            <h3 class="text-[10px] font-black text-stone-900 uppercase tracking-[0.2em]">Listado Maestro de Activos (Sincronizado)</h3>
            <div class="flex items-center gap-4">
                 <form action="{{ route('erp.inventario.productos') }}" method="GET" class="relative hidden lg:block group">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-stone-400 group-focus-within:text-primary transition-colors">
                      <span class="material-symbols-outlined text-[18px]">search</span>
                    </span>
                    <input name="search" value="{{ request('search') }}" class="bg-white border border-stone-200 text-[10px] pl-10 pr-12 py-2.5 w-80 rounded-xl uppercase font-black focus:ring-4 focus:ring-primary/10 transition-all border-none shadow-sm" placeholder="Buscar por SKU, nombre, marca..." type="text"/>
                    @if(request('search'))
                        <a href="{{ route('erp.inventario.productos') }}" class="absolute inset-y-0 right-0 pr-3 flex items-center text-stone-300 hover:text-red-500 transition-colors">
                            <span class="material-symbols-outlined text-[16px]">close</span>
                        </a>
                    @endif
                  </form>
            </div>
        </div>

        <div class="overflow-x-auto custom-scrollbar">
            <table class="w-full text-left border-collapse min-w-[1800px] border border-stone-800 divide-x divide-stone-800">
                <thead>
                    <tr class="text-[10px] font-black text-stone-900 uppercase tracking-widest border-b border-stone-800 italic bg-stone-100 divide-x divide-stone-800">
                        <th class="p-6 text-center bg-stone-100 w-16">
                            <a href="{{ request()->fullUrlWithQuery(['sort_by' => 'id', 'sort_order' => ($sortBy == 'id' && $sortOrder == 'asc') ? 'desc' : 'asc']) }}" class="flex items-center justify-center gap-1 hover:text-black">
                                N°
                                @if($sortBy == 'id')
                                    <span class="material-symbols-outlined text-[14px]">{{ $sortOrder == 'asc' ? 'arrow_upward' : 'arrow_downward' }}</span>
                                @endif
                            </a>
                        </th>
                        <th class="p-6">Foto</th>
                        <th class="p-6 w-32">
                            <a href="{{ request()->fullUrlWithQuery(['sort_by' => 'codigo_oem', 'sort_order' => ($sortBy == 'codigo_oem' && $sortOrder == 'asc') ? 'desc' : 'asc']) }}" class="flex items-center gap-1 hover:text-black">
                                Código OEM
                                @if($sortBy == 'codigo_oem')
                                    <span class="material-symbols-outlined text-[14px]">{{ $sortOrder == 'asc' ? 'arrow_upward' : 'arrow_downward' }}</span>
                                @endif
                            </a>
                        </th>
                        <th class="p-6 text-center w-32">
                            <a href="{{ request()->fullUrlWithQuery(['sort_by' => 'categoria', 'sort_order' => ($sortBy == 'categoria' && $sortOrder == 'asc') ? 'desc' : 'asc']) }}" class="flex items-center justify-center gap-1 hover:text-black">
                                Categoría
                                @if($sortBy == 'categoria')
                                    <span class="material-symbols-outlined text-[14px]">{{ $sortOrder == 'asc' ? 'arrow_upward' : 'arrow_downward' }}</span>
                                @endif
                            </a>
                        </th>
                        <th class="p-6 text-center">
                            <a href="{{ request()->fullUrlWithQuery(['sort_by' => 'fabricante', 'sort_order' => ($sortBy == 'fabricante' && $sortOrder == 'asc') ? 'desc' : 'asc']) }}" class="flex items-center justify-center gap-1 hover:text-black">
                                Fabricante
                                @if($sortBy == 'fabricante')
                                    <span class="material-symbols-outlined text-[14px]">{{ $sortOrder == 'asc' ? 'arrow_upward' : 'arrow_downward' }}</span>
                                @endif
                            </a>
                        </th>
                        <th class="p-6 text-center">
                            <a href="{{ request()->fullUrlWithQuery(['sort_by' => 'marca', 'sort_order' => ($sortBy == 'marca' && $sortOrder == 'asc') ? 'desc' : 'asc']) }}" class="flex items-center justify-center gap-1 hover:text-black">
                                Marca
                                @if($sortBy == 'marca')
                                    <span class="material-symbols-outlined text-[14px]">{{ $sortOrder == 'asc' ? 'arrow_upward' : 'arrow_downward' }}</span>
                                @endif
                            </a>
                        </th>
                        <th class="p-6 text-center">
                            <a href="{{ request()->fullUrlWithQuery(['sort_by' => 'material', 'sort_order' => ($sortBy == 'material' && $sortOrder == 'asc') ? 'desc' : 'asc']) }}" class="flex items-center justify-center gap-1 hover:text-black">
                                Material
                                @if($sortBy == 'material')
                                    <span class="material-symbols-outlined text-[14px]">{{ $sortOrder == 'asc' ? 'arrow_upward' : 'arrow_downward' }}</span>
                                @endif
                            </a>
                        </th>
                        <th class="p-6 text-center">
                            <a href="{{ request()->fullUrlWithQuery(['sort_by' => 'espesor', 'sort_order' => ($sortBy == 'espesor' && $sortOrder == 'asc') ? 'desc' : 'asc']) }}" class="flex items-center justify-center gap-1 hover:text-black">
                                Espesor
                                @if($sortBy == 'espesor')
                                    <span class="material-symbols-outlined text-[14px]">{{ $sortOrder == 'asc' ? 'arrow_upward' : 'arrow_downward' }}</span>
                                @endif
                            </a>
                        </th>
                        <th class="p-6">
                            <a href="{{ request()->fullUrlWithQuery(['sort_by' => 'nombre', 'sort_order' => ($sortBy == 'nombre' && $sortOrder == 'asc') ? 'desc' : 'asc']) }}" class="flex items-center gap-1 hover:text-black">
                                Descripción
                                @if($sortBy == 'nombre')
                                    <span class="material-symbols-outlined text-[14px]">{{ $sortOrder == 'asc' ? 'arrow_upward' : 'arrow_downward' }}</span>
                                @endif
                            </a>
                        </th>
                        <th class="p-6 text-center">
                             <a href="{{ request()->fullUrlWithQuery(['sort_by' => 'medidas', 'sort_order' => ($sortBy == 'medidas' && $sortOrder == 'asc') ? 'desc' : 'asc']) }}" class="flex items-center justify-center gap-1 hover:text-black">
                                Medidas
                                @if($sortBy == 'medidas')
                                    <span class="material-symbols-outlined text-[14px]">{{ $sortOrder == 'asc' ? 'arrow_upward' : 'arrow_downward' }}</span>
                                @endif
                            </a>
                        </th>
                        <th class="p-6 text-right">
                            <a href="{{ request()->fullUrlWithQuery(['sort_by' => 'precio_mayor', 'sort_order' => ($sortBy == 'precio_mayor' && $sortOrder == 'asc') ? 'desc' : 'asc']) }}" class="flex items-center justify-end gap-1 hover:text-black">
                                Precio Mayor
                                @if($sortBy == 'precio_mayor')
                                    <span class="material-symbols-outlined text-[14px]">{{ $sortOrder == 'asc' ? 'arrow_upward' : 'arrow_downward' }}</span>
                                @endif
                            </a>
                        </th>
                        <th class="p-6 text-center">
                            <a href="{{ request()->fullUrlWithQuery(['sort_by' => 'stock_actual', 'sort_order' => ($sortBy == 'stock_actual' && $sortOrder == 'asc') ? 'desc' : 'asc']) }}" class="flex items-center justify-center gap-1 hover:text-black">
                                Stock
                                @if($sortBy == 'stock_actual')
                                    <span class="material-symbols-outlined text-[14px]">{{ $sortOrder == 'asc' ? 'arrow_upward' : 'arrow_downward' }}</span>
                                @endif
                            </a>
                        </th>
                        <th class="p-6 text-center bg-stone-100 w-32">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-800 text-xs font-body divide-x divide-stone-800 font-bold">
                    @forelse($products as $product)
                    <tr class="hover:bg-stone-50/80 transition-colors group">
                        <td class="p-6 text-center text-stone-400 font-mono">
                            {{ $product->id }}
                        </td>
                        <td class="p-6">
                            <div class="w-12 h-12 bg-stone-100 rounded-xl flex items-center justify-center border border-stone-200 group-hover:border-primary transition-colors overflow-hidden">
                                @if($product->foto_path)
                                    <img src="{{ $product->foto_path }}" class="w-full h-full object-cover">
                                @else
                                    <span class="material-symbols-outlined text-stone-300 group-hover:text-stone-900 transition-colors">image</span>
                                @endif
                            </div>
                        </td>
                        <td class="p-6">
                            <span class="text-[11px] font-black text-stone-900 tracking-wider font-mono bg-stone-100 px-3 py-1.5 rounded-lg border border-stone-200">#{{ $product->codigo_oem }}</span>
                        </td>
                        <td class="p-6 text-center">
                            <span class="px-2 py-1 bg-stone-100 text-stone-900 text-[9px] font-black uppercase rounded border border-stone-800 whitespace-normal block w-24 mx-auto leading-tight">{{ $product->categoria }}</span>
                        </td>
                        <td class="p-6 text-center uppercase text-stone-500 font-bold whitespace-normal break-words max-w-[120px]">
                            {{ $product->fabricante ?? '-' }}
                        </td>
                        <td class="p-6 text-center uppercase text-stone-900 font-black whitespace-normal break-words max-w-[100px]">
                            {{ $product->marca ?? '-' }}
                        </td>
                        <td class="p-6 text-center uppercase text-stone-400 font-medium">
                            {{ $product->material ?? '-' }}
                        </td>
                        <td class="p-6 text-center font-mono text-stone-500">
                            {{ $product->espesor ?? '-' }}
                        </td>
                        <td class="p-6">
                            <div class="min-w-0">
                                <p class="text-[13px] font-black text-stone-900 uppercase whitespace-normal break-words leading-tight mb-2">{{ $product->nombre }}</p>
                                <p class="text-[9px] text-stone-500 font-bold uppercase tracking-widest italic leading-none">{{ $product->codigo_interno }}</p>
                            </div>
                        </td>
                        <td class="p-6 text-center font-mono text-stone-500 uppercase">
                            {{ $product->medidas ?? '-' }}
                        </td>
                        <td class="p-6 text-right">
                            <p class="text-lg font-headline font-black text-stone-900 tracking-tighter leading-none mb-1">${{ number_format($product->precio_mayor, 2) }}</p>
                            <p class="text-[9px] text-stone-400 font-bold uppercase tracking-widest italic leading-none">Precio Lista</p>
                        </td>
                        <td class="p-6 text-center">
                            <div class="flex flex-col items-center gap-1">
                                <span class="text-[11px] font-black {{ $product->stock_actual <= $product->stock_minimo ? 'text-amber-600' : 'text-stone-900' }} italic">{{ number_format($product->stock_actual, 0) }}</span>
                                <div class="w-16 bg-stone-100 h-1 rounded-full overflow-hidden">
                                     @php $stockPercent = min(100, ($product->stock_actual / ($product->stock_minimo ?: 1 * 5)) * 100); @endphp
                                    <div class="{{ $product->stock_actual <= $product->stock_minimo ? 'bg-amber-500' : 'bg-primary' }} h-full" style="width: {{ $stockPercent }}%"></div>
                                </div>
                            </div>
                        </td>
                        <td class="p-6">
                            <div class="flex justify-center gap-2">
                                <button class="w-8 h-8 bg-white border border-stone-200 text-stone-400 hover:text-stone-900 hover:border-primary rounded-lg transition-all shadow-sm flex items-center justify-center group/icon">
                                    <span class="material-symbols-outlined text-[16px]">edit</span>
                                </button>
                                <button class="w-8 h-8 bg-white border border-stone-200 text-stone-400 hover:text-stone-900 hover:border-stone-900 rounded-lg transition-all shadow-sm flex items-center justify-center group/icon">
                                    <span class="material-symbols-outlined text-[16px]">history</span>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="13" class="p-20 text-center bg-stone-50/20">
                            <div class="flex flex-col items-center gap-6">
                                <span class="material-symbols-outlined text-7xl text-stone-200">search_off</span>
                                <div>
                                    <p class="text-[11px] font-black text-stone-900 uppercase tracking-[0.2em] mb-2">No se encontraron resultados</p>
                                    <p class="text-[10px] text-stone-400 font-bold uppercase tracking-widest italic">No hay productos que coincidan con "{{ request('search') }}"</p>
                                </div>
                                <a href="{{ route('erp.inventario.productos') }}" class="inline-flex items-center gap-2 bg-stone-900 text-primary px-8 py-3.5 rounded-2xl text-[10px] font-black uppercase tracking-widest hover:bg-black transition-all shadow-xl active:scale-95">
                                    <span class="material-symbols-outlined text-lg">filter_alt_off</span>
                                    Limpiar Filtros de Búsqueda
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-8 bg-stone-50/50 flex justify-between items-center border-t border-stone-50">
            <p class="text-[9px] font-black text-stone-400 uppercase tracking-[0.2em] italic">Catálogo sincronizado • Base de datos distribuida • May de Repuesto La Cima</p>
            <div class="flex gap-2">
                {{ $products->appends(request()->query())->links('vendor.pagination.tailwind_zenith') }}
            </div>
        </div>
    </div>
@endsection

@section('modals')
    <!-- Modal: Nuevo Item (Sincronizado con nuevos campos) -->
    <div id="createProductModal" class="hidden fixed inset-0 bg-stone-900/40 backdrop-blur-md z-[100] flex items-center justify-center p-6">
        <div class="bg-white rounded-[40px] w-full max-w-4xl shadow-2xl border border-stone-200 overflow-hidden animate-in fade-in zoom-in duration-300">
            <div class="p-10 border-b border-stone-100 flex justify-between items-center bg-stone-50">
                <div>
                    <h3 class="text-3xl font-headline font-black text-stone-900 uppercase tracking-tighter">Registrar <span class="text-primary italic">Nuevo Producto</span></h3>
                    <p class="text-[10px] text-stone-400 font-bold uppercase tracking-widest">Apertura de ficha técnica sincronizada con maestro excel</p>
                </div>
                <button onclick="closeModal('createProductModal')" class="material-symbols-outlined text-stone-400 hover:text-stone-900 transition-colors p-2 bg-white rounded-full shadow-sm border border-stone-100">close</button>
            </div>
            <form action="{{ route('erp.inventario.productos.store') }}" method="POST" class="p-10">
                @csrf
                <div class="grid grid-cols-12 gap-6 mb-10">
                    <div class="col-span-12 md:col-span-8">
                        <label class="text-[9px] font-black text-stone-400 uppercase tracking-widest block mb-1.5 ml-1">Descripción del Producto</label>
                        <input type="text" name="nombre" placeholder="Ej. AMORTIGUADOR DELANTERO DERECHO" required class="w-full bg-stone-50 border-stone-200 rounded-2xl px-5 py-4 text-xs font-bold text-stone-900 focus:ring-4 focus:ring-primary/10 transition-all uppercase">
                    </div>
                    <div class="col-span-12 md:col-span-4">
                        <label class="text-[9px] font-black text-stone-400 uppercase tracking-widest block mb-1.5 ml-1">Código OEM (SKU)</label>
                        <input type="text" name="codigo_oem" required class="w-full bg-stone-50 border-stone-200 rounded-2xl px-5 py-4 text-xs font-black text-stone-900 focus:ring-4 focus:ring-primary/10 transition-all font-mono uppercase">
                    </div>

                    <div class="col-span-12 md:col-span-4">
                        <label class="text-[9px] font-black text-stone-400 uppercase tracking-widest block mb-1.5 ml-1">Fabricante</label>
                        <input type="text" name="fabricante" class="w-full bg-stone-50 border-stone-200 rounded-2xl px-5 py-4 text-xs font-bold text-stone-900 focus:ring-4 focus:ring-primary/10 transition-all uppercase">
                    </div>
                    <div class="col-span-12 md:col-span-4">
                        <label class="text-[9px] font-black text-stone-400 uppercase tracking-widest block mb-1.5 ml-1">Marca</label>
                        <input type="text" name="marca" class="w-full bg-stone-50 border-stone-200 rounded-2xl px-5 py-4 text-xs font-bold text-stone-900 focus:ring-4 focus:ring-primary/10 transition-all uppercase">
                    </div>
                     <div class="col-span-12 md:col-span-4">
                        <label class="text-[9px] font-black text-stone-400 uppercase tracking-widest block mb-1.5 ml-1">Categoría</label>
                        <input type="text" name="categoria" class="w-full bg-stone-50 border-stone-200 rounded-2xl px-5 py-4 text-xs font-bold text-stone-900 focus:ring-4 focus:ring-primary/10 transition-all uppercase">
                    </div>

                    <div class="col-span-12 md:col-span-3">
                        <label class="text-[9px] font-black text-stone-400 uppercase tracking-widest block mb-1.5 ml-1">Material</label>
                        <input type="text" name="material" class="w-full bg-stone-50 border-stone-200 rounded-2xl px-5 py-4 text-xs font-bold text-stone-900 focus:ring-4 focus:ring-primary/10 transition-all uppercase">
                    </div>
                    <div class="col-span-12 md:col-span-3">
                        <label class="text-[9px] font-black text-stone-400 uppercase tracking-widest block mb-1.5 ml-1">Espesor</label>
                        <input type="text" name="espesor" class="w-full bg-stone-50 border-stone-200 rounded-2xl px-5 py-4 text-xs font-bold text-stone-900 focus:ring-4 focus:ring-primary/10 transition-all uppercase">
                    </div>
                    <div class="col-span-12 md:col-span-3">
                        <label class="text-[9px] font-black text-stone-400 uppercase tracking-widest block mb-1.5 ml-1">Medidas</label>
                        <input type="text" name="medidas" class="w-full bg-stone-50 border-stone-200 rounded-2xl px-5 py-4 text-xs font-bold text-stone-900 focus:ring-4 focus:ring-primary/10 transition-all uppercase">
                    </div>
                    <div class="col-span-12 md:col-span-3">
                        <label class="text-[9px] font-black text-stone-400 uppercase tracking-widest block mb-1.5 ml-1">Incorporación</label>
                        <input type="date" name="fecha_incorporacion" class="w-full bg-stone-50 border-stone-200 rounded-2xl px-5 py-4 text-xs font-bold text-stone-900 focus:ring-4 focus:ring-primary/10 transition-all">
                    </div>

                    <div class="col-span-12 md:col-span-6">
                        <label class="text-[9px] font-black text-stone-400 uppercase tracking-widest block mb-1.5 ml-1">Precio de Venta ($)</label>
                        <div class="relative">
                            <span class="absolute left-5 top-1/2 -translate-y-1/2 text-stone-400 font-headline font-black text-xl">$</span>
                            <input type="number" name="precio_mayor" step="0.01" required class="w-full bg-stone-50 border-stone-200 rounded-2xl pl-12 pr-5 py-5 text-xl font-headline font-black text-stone-900 focus:ring-4 focus:ring-primary/10 transition-all">
                        </div>
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        <label class="text-[9px] font-black text-stone-400 uppercase tracking-widest block mb-1.5 ml-1">Stock Inicial</label>
                        <input type="number" name="stock_actual" value="0" required class="w-full bg-stone-50 border-stone-200 rounded-2xl px-5 py-5 text-xl font-headline font-black text-stone-900 focus:ring-4 focus:ring-primary/10 transition-all">
                    </div>
                </div>
                <div class="flex gap-6 mt-6">
                    <button type="button" onclick="closeModal('createProductModal')" class="flex-1 py-5 text-[10px] font-black uppercase text-stone-400 hover:text-stone-900 transition-colors">Abortar Operación</button>
                    <button type="submit" class="flex-[3] py-5 bg-stone-900 text-primary text-[10px] font-black uppercase tracking-[0.4em] rounded-[22px] shadow-2xl hover:bg-black transition-all active:scale-95">Sincronizar Maestro de Inventario</button>
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
