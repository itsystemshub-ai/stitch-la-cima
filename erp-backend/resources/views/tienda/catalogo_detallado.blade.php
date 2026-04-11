@extends('layouts.ecommerce')

@section('title', 'Catálogo Detallado | Mayor de Repuesto LA CIMA, C.A.')

@push('styles')
    <link rel="stylesheet" href="/frontend/public/ecommerce/css/catalogo_detallado.css">
@endpush

@section('content')
<main class="flex-grow pt-24 pb-12 px-6 max-w-[1920px] mx-auto w-full">
    <div class="flex flex-col md:flex-row gap-8">
        
        <!-- Sidebar Filters -->
        <aside class="w-full md:w-72 flex-shrink-0 space-y-8">
            <div class="bg-white border border-outline p-6 rounded-lg shadow-sm">
                <h2 class="font-headline text-lg font-bold uppercase tracking-tighter mb-6 flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary">filter_list</span>
                    Filtrado Técnico
                </h2>
                <div class="space-y-6">
                    <div>
                        <label class="font-headline text-xs font-bold uppercase text-on-surface-variant block mb-3 tracking-widest">Tipo de Motor</label>
                        <div class="space-y-2">
                            <label class="flex items-center gap-3 cursor-pointer group">
                                <input class="w-4 h-4 rounded border-outline text-primary focus:ring-primary" type="checkbox"/>
                                <span class="text-sm font-medium group-hover:text-primary transition-colors">Diesel V8 Heavy Duty</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer group">
                                <input checked="" class="w-4 h-4 rounded border-outline text-primary focus:ring-primary" type="checkbox"/>
                                <span class="text-sm font-medium group-hover:text-primary transition-colors">Inline 6 Turbo</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer group">
                                <input class="w-4 h-4 rounded border-outline text-primary focus:ring-primary" type="checkbox"/>
                                <span class="text-sm font-medium group-hover:text-primary transition-colors">Gas Turbine Aux</span>
                            </label>
                        </div>
                    </div>
                    <div>
                        <label class="font-headline text-xs font-bold uppercase text-on-surface-variant block mb-3 tracking-widest text-[#5a5c5e]">Marca / Fabricante</label>
                        <select class="w-full bg-stone-100 border-none rounded-lg text-sm p-3 focus:ring-2 focus:ring-primary">
                            <option>Cummins Engine Co.</option>
                            <option>Volvo Penta</option>
                            <option>Caterpillar Inc.</option>
                            <option>Detroit Diesel</option>
                        </select>
                    </div>
                    <div>
                        <label class="font-headline text-xs font-bold uppercase text-on-surface-variant block mb-3 tracking-widest text-[#5a5c5e]">Tipo de Maquinaria</label>
                        <div class="grid grid-cols-2 gap-2">
                            <button class="p-2 text-xs font-bold border border-outline rounded hover:bg-black hover:text-white transition-all uppercase">Excavator</button>
                            <button class="p-2 text-xs font-bold border border-outline rounded bg-primary text-black uppercase">Truck</button>
                            <button class="p-2 text-xs font-bold border border-outline rounded hover:bg-black hover:text-white transition-all uppercase">Marine</button>
                            <button class="p-2 text-xs font-bold border border-outline rounded hover:bg-black hover:text-white transition-all uppercase">GenSet</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Technical Support Card -->
            <div class="bg-black text-white p-6 rounded-lg relative overflow-hidden group">
                <div class="relative z-10">
                    <h3 class="font-headline text-xl font-black uppercase leading-none mb-2 text-primary">Soporte Técnico</h3>
                    <p class="text-stone-400 text-xs mb-4">Piezas críticas y asistencia en instalación industrial.</p>
                    <button class="text-primary text-xs font-bold uppercase flex items-center gap-1 group-hover:gap-2 transition-all">
                        Hablar con Ingeniero
                        <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </button>
                </div>
                <div class="absolute -right-4 -bottom-4 opacity-10 group-hover:scale-110 transition-transform duration-500">
                    <span class="material-symbols-outlined text-8xl" style="font-variation-settings: 'FILL' 1;">engineering</span>
                </div>
            </div>
        </aside>

        <!-- Product Listing -->
        <section class="flex-grow">
            <div class="flex justify-between items-end mb-8">
                <div>
                    <span class="text-primary font-bold text-xs uppercase tracking-widest block mb-1">Precision Inventory</span>
                    <h1 class="font-headline text-4xl font-black uppercase tracking-tighter">Catálogo Completo</h1>
                </div>
                <div class="text-right">
                    <p class="text-xs font-bold text-on-surface-variant uppercase tracking-widest">
                        Mostrando {{ $products->firstItem() ?? 0 }} a {{ $products->lastItem() ?? 0 }} de {{ $products->total() }} Items
                    </p>
                    <div class="flex gap-2 mt-2 justify-end">
                        <button id="gridViewBtn" class="view-btn active w-8 h-8 flex items-center justify-center bg-black text-white rounded" onclick="switchToGrid()"><span class="material-symbols-outlined text-sm">grid_view</span></button>
                        <button id="listViewBtn" class="view-btn w-8 h-8 flex items-center justify-center text-on-surface-variant hover:bg-stone-200 rounded transition-colors" onclick="switchToList()"><span class="material-symbols-outlined text-sm">list</span></button>
                    </div>
                </div>
            </div>

            <div id="productGrid" class="editorial-grid">
                @foreach($products as $item)
                @php
                    $productData = json_encode([
                        'id' => $item->id,
                        'nombre' => $item->nombre,
                        'precio' => $item->precio_mayor,
                        'imagen' => $item->imagen_url ?? 'https://via.placeholder.com/400x400?text=' . urlencode($item->nombre),
                        'sku' => $item->codigo_oem ?? $item->codigo_erp
                    ]);
                @endphp
                <article class="bg-white border border-outline rounded-xl overflow-hidden hover:shadow-xl transition-all group flex flex-col">
                    <div class="aspect-square bg-stone-100 relative overflow-hidden">
                        <a href="/tienda/detalle_productos?id={{ $item->id }}">
                            <img alt="{{ $item->nombre }}" src="{{ $item->imagen_url ?? 'https://via.placeholder.com/400x400?text=' . urlencode($item->nombre) }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </a>
                    </div>
                    <div class="p-5 flex flex-col flex-grow">
                        <p class="text-[10px] font-black uppercase text-on-surface-variant tracking-widest mb-1 text-primary">SKU: {{ $item->codigo_oem ?? $item->codigo_erp }}</p>
                        <a href="/tienda/detalle_productos?id={{ $item->id }}">
                            <h3 class="text-lg font-bold uppercase tracking-tight mb-4 group-hover:text-primary transition-colors line-clamp-2">{{ $item->nombre }}</h3>
                        </a>
                        <div class="mt-auto flex justify-between items-center">
                            <span class="text-xl font-black text-black tracking-tighter">${{ number_format($item->precio_mayor, 2) }}</span>
                            <button onclick='addToCart({!! $productData !!})' class="bg-black text-white p-2 rounded-lg hover:bg-primary hover:text-black transition-colors">
                                <span class="material-symbols-outlined text-sm">add_shopping_cart</span>
                            </button>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-12 flex justify-center">
                {{ $products->links() }}
            </div>

            <!-- Technical Compatibility Table -->
            <div class="mt-24">
                <h2 class="font-headline text-2xl font-bold uppercase tracking-widest mb-8 flex items-center gap-4">
                    <span class="w-12 h-[2px] bg-primary"></span>
                    Compatibilidad Técnica
                </h2>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="font-headline uppercase text-xs tracking-widest text-on-surface-variant border-b border-outline">
                            <tr>
                                <th class="pb-4 px-4 font-black">Componente</th>
                                <th class="pb-4 px-4 font-black">Marca Compatible</th>
                                <th class="pb-4 px-4 font-black">Origen</th>
                                <th class="pb-4 px-4 font-black">Certificación</th>
                                <th class="pb-4 px-4 font-black">Disponibilidad</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            <tr class="bg-white hover:bg-stone-50 transition-colors border-b border-outline">
                                <td class="py-4 px-4 font-bold">Inyectores de Combustible</td>
                                <td class="py-4 px-4">CAT / Perkins</td>
                                <td class="py-4 px-4">USA / Germany</td>
                                <td class="py-4 px-4 font-medium uppercase text-xs">OEM Specification</td>
                                <td class="py-4 px-4 text-primary font-bold">In Stock</td>
                            </tr>
                            <tr class="bg-white hover:bg-stone-50 transition-colors border-b border-outline">
                                <td class="py-4 px-4 font-bold">Kits de Empacadura</td>
                                <td class="py-4 px-4">Detroit Diesel</td>
                                <td class="py-4 px-4">USA</td>
                                <td class="py-4 px-4 font-medium uppercase text-[10px]">SAE Standard</td>
                                <td class="py-4 px-4 text-primary font-bold">In Stock</td>
                            </tr>
                            <tr class="bg-white hover:bg-stone-50 transition-colors">
                                <td class="py-4 px-4 font-bold">Bombas de Agua</td>
                                <td class="py-4 px-4">Mack / Volvo</td>
                                <td class="py-4 px-4">Brazil</td>
                                <td class="py-4 px-4 font-medium uppercase text-[10px]">Heavy Duty Grade</td>
                                <td class="py-4 px-4 text-red-600 font-bold">Low Stock</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</main>
@endsection

@push('scripts')
    <script src="/frontend/public/ecommerce/js/catalogo_detallado.js"></script>
    <script src="/frontend/public/ecommerce/js/zenith-ecommerce-sync.js"></script>
@endpush
