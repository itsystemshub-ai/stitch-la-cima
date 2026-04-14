@extends('erp.layouts.app')

@section('title', 'Maestro de Productos')

@section('breadcrumb')
    <a href="{{ url('/erp/inicio') }}" class="hover:text-stone-900 transition-colors">ERP</a>
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <a href="{{ url('/erp/inventario') }}" class="hover:text-stone-900 transition-colors">Inventario</a>
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <span class="text-stone-900">Maestro de Productos</span>
@endsection

@section('content')
    <!-- Page Header: Strategic Inventory Management -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6 mb-10 pb-8 border-b border-stone-100">
        <div>
            <div class="flex items-center gap-2 mb-2">
                <span class="w-8 h-[2px] bg-primary"></span>
                <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em]">Gestión de Stock Central</p>
            </div>
            <h1 class="text-5xl font-headline font-black text-stone-900 tracking-tighter uppercase leading-none italic">Maestro de <span class="text-stone-400">Productos</span></h1>
            <p class="text-xs text-stone-400 mt-2 font-medium uppercase tracking-widest text-[#9ca3af]">MAYOR DE REPUESTO LA CIMA, C.A. • RIF: J-40308741-5</p>
        </div>
        <button onclick="openModal('createProductModal')" class="bg-stone-900 text-primary px-10 py-4 text-[10px] font-black uppercase tracking-[0.2em] flex items-center gap-3 hover:bg-black transition-all rounded-xl shadow-xl active:scale-95 group/btn">
            <span class="material-symbols-outlined text-[18px] group-hover/btn:rotate-90 transition-transform font-black">add</span>
            Nuevo Item Estratégico
        </button>
    </div>

    <!-- Advanced Analytics & Filtering -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
        <div class="bg-white border border-stone-200 p-8 rounded-[32px] shadow-sm hover:border-primary/40 transition-all group">
            <p class="text-[9px] font-black text-stone-400 uppercase tracking-widest mb-4">Filtrar Categoría</p>
            <div class="relative">
                <select class="w-full bg-stone-50 border-none rounded-xl py-4 pl-4 pr-10 text-[11px] font-black text-stone-900 uppercase tracking-tight focus:ring-4 focus:ring-primary/10 cursor-pointer appearance-none">
                    <option>Todos los Repuestos</option>
                    <option>Frenado y Seguridad</option>
                    <option>Sistemas de Motor</option>
                    <option>Suspensión y Chasis</option>
                    <option>Transmisión</option>
                </select>
                <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-stone-400 pointer-events-none">expand_more</span>
            </div>
        </div>

        <div class="bg-white border border-stone-200 p-8 rounded-[32px] shadow-sm hover:border-primary/40 transition-all group">
            <p class="text-[9px] font-black text-stone-400 uppercase tracking-widest mb-4">Línea de Marca</p>
            <div class="relative">
                <select class="w-full bg-stone-50 border-none rounded-xl py-4 pl-4 pr-10 text-[11px] font-black text-stone-900 uppercase tracking-tight focus:ring-4 focus:ring-primary/10 cursor-pointer appearance-none">
                    <option>Cualquier Marca</option>
                    <option>Toyota / OEM</option>
                    <option>Caterpillar</option>
                    <option>Cummins</option>
                    <option>Volvo / Detroit</option>
                </select>
                <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-stone-400 pointer-events-none">expand_more</span>
            </div>
        </div>

        <div class="bg-white border border-stone-200 p-8 rounded-[32px] shadow-sm border-amber-200 relative overflow-hidden group">
            <div class="absolute inset-y-0 left-0 w-1.5 bg-amber-500"></div>
            <p class="text-[9px] font-black text-amber-600 uppercase tracking-widest mb-4">Estatus de Alerta</p>
            <div class="flex items-center gap-3">
                <span class="w-3 h-3 rounded-full {{ $low_stock_count > 0 ? 'bg-amber-500 animate-pulse' : 'bg-green-500' }}"></span>
                <span class="text-sm font-black text-stone-900 uppercase italic">Stock Bajo ({{ $low_stock_count }})</span>
            </div>
        </div>

        <div class="bg-stone-900 border border-stone-800 p-8 rounded-[32px] shadow-xl flex items-center justify-center relative overflow-hidden group">
            <div class="absolute inset-0 opacity-[0.05] group-hover:opacity-[0.1] transition-opacity" style="background-image: radial-gradient(#ceff5e 1px, transparent 1px); background-size: 10px 10px;"></div>
            <div class="text-center z-10 transition-transform group-hover:scale-110">
                <p class="text-4xl font-headline font-black text-primary tracking-tighter">${{ number_format($inventory_value / 1000000, 2) }}M</p>
                <p class="text-[9px] text-stone-500 font-bold uppercase tracking-widest mt-1">Valuación Almacén</p>
            </div>
        </div>
    </div>

    <!-- Product Master Table: Data Grid -->
    <div class="bg-white border border-stone-200 rounded-[40px] shadow-sm overflow-hidden mb-12">
        <div class="p-8 border-b border-stone-50 bg-stone-50/30 flex justify-between items-center">
            <h3 class="text-[10px] font-black text-stone-900 uppercase tracking-[0.2em]">Listado Maestro de Activos</h3>
            <div class="flex items-center gap-4">
                 <form action="{{ route('erp.inventario.productos') }}" method="GET" class="relative hidden lg:block">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-stone-400">
                      <span class="material-symbols-outlined text-[18px]">search</span>
                    </span>
                    <input name="search" value="{{ request('search') }}" class="bg-white border border-stone-200 text-[10px] pl-10 pr-4 py-2.5 w-64 rounded-xl uppercase font-black focus:ring-4 focus:ring-primary/10 transition-all border-none shadow-sm" placeholder="Buscar por SKU o Nombre..." type="text"/>
                  </form>
            </div>
        </div>

        <div class="overflow-x-auto custom-scrollbar">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="text-[10px] font-black text-stone-400 uppercase tracking-widest border-b border-stone-100 italic">
                        <th class="p-8">Identificación SKU</th>
                        <th class="p-8">Descripción del Bien</th>
                        <th class="p-8">Categoría</th>
                        <th class="p-8 text-center">Nivel Stock</th>
                        <th class="p-8 text-right">Precio USD</th>
                        <th class="p-8 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-50 text-xs font-body">
                    @forelse($products as $product)
                    <tr class="hover:bg-stone-50/80 transition-colors group">
                        <td class="p-8">
                            <span class="text-[11px] font-black text-stone-900 tracking-wider font-mono bg-stone-100 px-3 py-1.5 rounded-lg border border-stone-200">#{{ $product->codigo_oem }}</span>
                        </td>
                        <td class="p-8">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-stone-100 rounded-xl flex items-center justify-center border border-stone-200 group-hover:border-primary transition-colors overflow-hidden">
                                    @if($product->thumbnail)
                                        <img src="{{ $product->thumbnail }}" class="w-full h-full object-cover">
                                    @else
                                        <span class="material-symbols-outlined text-stone-400 group-hover:text-stone-900 transition-colors">album</span>
                                    @endif
                                </div>
                                <div class="min-w-0">
                                    <p class="text-sm font-black text-stone-900 uppercase truncate mb-1">{{ $product->nombre }}</p>
                                    <p class="text-[9px] text-stone-400 font-bold uppercase tracking-widest group-hover:text-stone-500 transition-colors italic">{{ $product->marca }} • {{ $product->codigo_interno }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="p-8">
                            <span class="px-3 py-1 bg-stone-100 text-stone-600 text-[9px] font-black uppercase rounded-lg tracking-widest border border-stone-200 group-hover:bg-primary group-hover:text-stone-900 group-hover:border-primary transition-all shadow-sm">{{ $product->categoria }}</span>
                        </td>
                        <td class="p-8">
                            <div class="flex flex-col items-center gap-2">
                                @php 
                                    $percent = $product->stock_minimo > 0 ? ($product->stock_actual / ($product->stock_minimo * 2)) * 100 : 100;
                                    $percent = min(100, $percent);
                                    $color = $product->stock_actual <= $product->stock_minimo ? 'bg-amber-500' : 'bg-green-500';
                                    $textColor = $product->stock_actual <= $product->stock_minimo ? 'text-amber-600' : 'text-stone-900';
                                @endphp
                                <span class="text-[11px] font-black {{ $textColor }} italic">{{ number_format($product->stock_actual, 0) }} / {{ number_format($product->stock_minimo, 0) }}</span>
                                <div class="w-24 bg-stone-100 h-1.5 rounded-full overflow-hidden shadow-inner border border-stone-100">
                                    <div class="{{ $color }} h-full transition-all duration-700" style="width: {{ $percent }}%"></div>
                                </div>
                            </div>
                        </td>
                        <td class="p-8 text-right">
                            <p class="text-lg font-headline font-black text-stone-900 tracking-tighter leading-none mb-1">${{ number_format($product->precio_mayor, 2) }}</p>
                            <p class="text-[9px] text-stone-400 font-bold uppercase tracking-widest italic leading-none">Mayor USD</p>
                        </td>
                        <td class="p-8">
                            <div class="flex justify-center gap-3">
                                <button class="w-10 h-10 bg-white border border-stone-200 text-stone-400 hover:text-stone-900 hover:border-primary hover:bg-primary/5 rounded-xl transition-all shadow-sm flex items-center justify-center group/icon">
                                    <span class="material-symbols-outlined text-[20px] group-hover/icon:scale-110 transition-transform">edit</span>
                                </button>
                                <button class="w-10 h-10 bg-white border border-stone-200 text-stone-400 hover:text-stone-900 hover:border-stone-900 rounded-xl transition-all shadow-sm flex items-center justify-center group/icon">
                                    <span class="material-symbols-outlined text-[20px] group-hover/icon:scale-110 transition-transform">visibility</span>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="p-12 text-center">
                            <p class="text-[10px] font-black text-stone-400 uppercase tracking-widest">No se encontraron productos estratégicos</p>
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

    <!-- Inventory valuation summary: Strategic Panels -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
        <div class="bg-stone-950 rounded-[40px] p-10 relative overflow-hidden group shadow-[0_35px_60px_-15px_rgba(0,0,0,0.5)]">
            <div class="absolute right-0 top-0 opacity-[0.03] scale-150 transform translate-x-1/4 -translate-y-1/4 group-hover:scale-[1.6] transition-transform duration-[2000ms]">
                <span class="material-symbols-outlined text-[300px] text-white">inventory_2</span>
            </div>
            <div class="relative z-10 h-full flex flex-col justify-between">
                <div>
                   <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 bg-primary/20 rounded-xl flex items-center justify-center">
                            <span class="material-symbols-outlined text-primary text-[20px]">account_balance_wallet</span>
                        </div>
                        <h3 class="text-2xl font-headline font-black text-white uppercase tracking-tighter">Valorización Global</h3>
                   </div>
                    <p class="text-[10px] text-primary font-black uppercase tracking-[0.3em] mb-10">Método de Costeo: Promedio Ponderado</p>
                    
                    <div class="flex items-baseline gap-4 mb-2">
                        <span class="text-7xl font-headline font-black text-white tracking-tighter italic leading-none">${{ number_format($inventory_value, 2) }}</span>
                        <span class="text-xs font-bold text-stone-600 uppercase tracking-widest">USD FOB</span>
                    </div>
                </div>
                
                <div class="grid grid-cols-2 gap-10 mt-12 pt-8 border-t border-white/5">
                    <div class="border-l border-stone-800 pl-6">
                        <p class="text-[9px] text-stone-500 font-bold uppercase tracking-widest mb-2">Costo Histórico</p>
                        <p class="text-2xl font-headline font-black text-white tracking-tight">$1,219,940</p>
                    </div>
                    <div class="border-l border-primary/40 pl-6">
                        <p class="text-[9px] text-stone-500 font-bold uppercase tracking-widest mb-2">Margen Proyectado</p>
                        <p class="text-2xl font-headline font-black text-primary tracking-tight">$232,369</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white border border-stone-200 rounded-[40px] p-10 flex flex-col justify-between shadow-sm relative overflow-hidden group">
            <div class="absolute -right-10 -bottom-10 opacity-[0.02] group-hover:opacity-[0.05] transition-opacity">
                 <span class="material-symbols-outlined text-[250px] text-stone-900">verified</span>
            </div>
            <div>
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 bg-stone-900 rounded-xl flex items-center justify-center">
                        <span class="material-symbols-outlined text-primary text-[20px]">assignment_turned_in</span>
                    </div>
                    <h3 class="text-2xl font-headline font-black text-stone-900 uppercase tracking-tighter">Auditoría & Control</h3>
                </div>
                <p class="text-[10px] text-stone-400 font-bold uppercase tracking-widest mb-10">Último Conteo Ciclico: Hace 48 Horas</p>
                
                <div class="space-y-4">
                    <div class="flex items-center justify-between p-5 bg-stone-50 rounded-[24px] border border-stone-100 hover:border-amber-200 transition-colors cursor-pointer group/row">
                        <div class="flex items-center gap-4">
                            <span class="material-symbols-outlined text-amber-500 font-black">warning</span>
                            <span class="text-[11px] font-black text-stone-900 uppercase">Ajustes Requeridos</span>
                        </div>
                        <span class="text-[11px] font-black text-stone-900 bg-amber-50 px-3 py-1 rounded-lg">04 Items</span>
                    </div>
                    <div class="flex items-center justify-between p-5 bg-stone-50 rounded-[24px] border border-stone-100 hover:border-primary transition-colors cursor-pointer group/row">
                        <div class="flex items-center gap-4">
                            <span class="material-symbols-outlined text-green-500 font-black">check_circle</span>
                            <span class="text-[11px] font-black text-stone-900 uppercase">Conciliación Fiscal Art. 177</span>
                        </div>
                        <span class="text-[11px] font-black text-green-700 bg-green-50 px-3 py-1 rounded-lg">Completada</span>
                    </div>
                </div>
            </div>
            
            <button class="w-full mt-10 py-5 bg-stone-900 text-primary text-[10px] font-black uppercase tracking-[0.3em] rounded-[22px] hover:bg-black transition-all shadow-xl active:scale-95 z-10">
                Generar Reporte Maestro de Valorización
            </button>
        </div>
    </div>
@endsection

@section('modals')
    <!-- Modal: Nuevo Item Estratégico -->
    <div id="createProductModal" class="hidden fixed inset-0 bg-stone-900/40 backdrop-blur-md z-[100] flex items-center justify-center p-6">
        <div class="bg-white rounded-[32px] w-full max-w-2xl shadow-2xl border border-stone-200 overflow-hidden animate-in fade-in zoom-in duration-300">
            <div class="p-8 border-b border-stone-100 flex justify-between items-center bg-stone-50">
                <div>
                    <h3 class="text-2xl font-headline font-black text-stone-900 uppercase tracking-tighter">Registrar <span class="text-primary italic">Activo</span></h3>
                    <p class="text-[10px] text-stone-400 font-bold uppercase tracking-widest">Apertura de ficha técnica estratégica</p>
                </div>
                <button onclick="closeModal('createProductModal')" class="material-symbols-outlined text-stone-400 hover:text-stone-900 transition-colors">close</button>
            </div>
            <form action="{{ route('erp.inventario.productos.store') }}" method="POST" class="p-8">
                @csrf
                <div class="grid grid-cols-2 gap-6 mb-8">
                    <div class="col-span-2">
                        <label class="text-[9px] font-black text-stone-400 uppercase tracking-widest block mb-2">Nombre del Producto</label>
                        <input type="text" name="nombre" required class="w-full bg-stone-50 border-stone-200 rounded-xl px-4 py-3 text-xs font-bold text-stone-900 focus:ring-4 focus:ring-primary/10 transition-all">
                    </div>
                    <div>
                        <label class="text-[9px] font-black text-stone-400 uppercase tracking-widest block mb-2">Código OEM (SKU)</label>
                        <input type="text" name="codigo_oem" required class="w-full bg-stone-50 border-stone-200 rounded-xl px-4 py-3 text-xs font-bold text-stone-900 focus:ring-4 focus:ring-primary/10 transition-all font-mono">
                    </div>
                    <div>
                        <label class="text-[9px] font-black text-stone-400 uppercase tracking-widest block mb-2">Código Interno</label>
                        <input type="text" name="codigo_interno" class="w-full bg-stone-50 border-stone-200 rounded-xl px-4 py-3 text-xs font-bold text-stone-900 focus:ring-4 focus:ring-primary/10 transition-all font-mono">
                    </div>
                    <div>
                        <label class="text-[9px] font-black text-stone-400 uppercase tracking-widest block mb-2">Categoría</label>
                        <select name="categoria" class="w-full bg-stone-50 border-stone-200 rounded-xl px-4 py-3 text-xs font-bold text-stone-900 focus:ring-4 focus:ring-primary/10 transition-all appearance-none cursor-pointer">
                            <option>Frenado</option>
                            <option>Motor</option>
                            <option>Suspensión</option>
                            <option>Transmisión</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-[9px] font-black text-stone-400 uppercase tracking-widest block mb-2">Marca</label>
                        <input type="text" name="marca" class="w-full bg-stone-50 border-stone-200 rounded-xl px-4 py-3 text-xs font-bold text-stone-900 focus:ring-4 focus:ring-primary/10 transition-all">
                    </div>
                    <div>
                        <label class="text-[9px] font-black text-stone-400 uppercase tracking-widest block mb-2">Precio Mayor (USD)</label>
                        <input type="number" name="precio_mayor" step="0.01" required class="w-full bg-stone-50 border-stone-200 rounded-xl px-4 py-3 text-xs font-bold text-stone-900 focus:ring-4 focus:ring-primary/10 transition-all">
                    </div>
                    <div>
                        <label class="text-[9px] font-black text-stone-400 uppercase tracking-widest block mb-2">Stock Inicial</label>
                        <input type="number" name="stock_actual" required class="w-full bg-stone-50 border-stone-200 rounded-xl px-4 py-3 text-xs font-bold text-stone-900 focus:ring-4 focus:ring-primary/10 transition-all">
                    </div>
                </div>
                <div class="flex gap-4">
                    <button type="button" onclick="closeModal('createProductModal')" class="flex-1 py-4 text-[10px] font-black uppercase text-stone-400 hover:text-stone-900 transition-colors">Cancelar</button>
                    <button type="submit" class="flex-[2] py-4 bg-stone-900 text-primary text-[10px] font-black uppercase tracking-[0.2em] rounded-xl shadow-xl hover:bg-black transition-all">Sincronizar Maestro</button>
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
