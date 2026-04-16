@extends('layouts.ecommerce')

@section('title', 'Catálogo Detallado | Mayor de Repuesto LA CIMA, C.A.')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/catalogo_detallado.css') }}">
    <style>
        /* Estilos dinámicos para la vista de lista */
        #productGrid.view-list {
            grid-template-columns: 1fr !important;
            gap: 1.5rem;
        }
        #productGrid.view-list article {
            display: flex;
            flex-direction: row;
            height: auto;
            min-height: 200px;
            align-items: stretch;
        }
        #productGrid.view-list article > a {
            width: 250px;
            flex-shrink: 0;
            display: flex;
            border-right: 1px solid #e5e7eb;
        }
        @media (max-width: 640px) {
            #productGrid.view-list article {
                flex-direction: column;
                height: auto;
            }
            #productGrid.view-list article .aspect-square {
                width: 100%;
                height: auto;
                aspect-ratio: 1/1;
            }
        }
    </style>
@endpush

@section('content')
<main class="flex-grow pt-32 pb-12 px-6 max-w-[1920px] mx-auto w-full">
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
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end mb-8 gap-4">
                <div>
                    <span class="text-primary font-bold text-xs uppercase tracking-widest block mb-1">Precision Inventory</span>
                    <h1 class="font-headline text-4xl font-black uppercase tracking-tighter">Catálogo Completo</h1>
                </div>
                <div class="text-right w-full sm:w-auto">
                    <p class="text-xs font-bold text-on-surface-variant uppercase tracking-widest">Mostrando 12 de 842 Items</p>
                    <div class="flex gap-2 mt-2 justify-end">
                        <button id="gridViewBtn" class="view-btn active w-8 h-8 flex items-center justify-center bg-black text-white rounded" onclick="switchToGrid()"><span class="material-symbols-outlined text-sm">grid_view</span></button>
                        <button id="listViewBtn" class="view-btn w-8 h-8 flex items-center justify-center text-on-surface-variant hover:bg-stone-200 rounded transition-colors" onclick="switchToList()"><span class="material-symbols-outlined text-sm">list</span></button>
                    </div>
                </div>
            </div>

            <div id="productGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @forelse($products as $product)
                    <x-product-card :product="$product" />
                @empty
                    <div class="col-span-full py-12 text-center">
                        <span class="material-symbols-outlined text-6xl text-stone-200 mb-4 block">inventory_2</span>
                        <p class="text-stone-500 font-bold text-sm uppercase tracking-widest">No se encontraron productos con estos parámetros.</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-12 flex justify-center items-center gap-4">
                <button class="w-10 h-10 flex items-center justify-center rounded border border-outline text-on-surface-variant hover:text-primary hover:border-primary transition-all">
                    <span class="material-symbols-outlined">chevron_left</span>
                </button>
                <div class="flex items-center gap-2">
                    <button class="w-10 h-10 flex items-center justify-center rounded bg-black text-primary font-bold">1</button>
                    <button class="w-10 h-10 flex items-center justify-center rounded border border-outline hover:border-primary font-bold">2</button>
                    <button class="w-10 h-10 flex items-center justify-center rounded border border-outline hover:border-primary font-bold">3</button>
                    <span class="px-2 text-stone-400">...</span>
                    <button class="w-10 h-10 flex items-center justify-center rounded border border-outline hover:border-primary font-bold">24</button>
                </div>
                <button class="w-10 h-10 flex items-center justify-center rounded border border-outline text-on-surface-variant hover:text-primary hover:border-primary transition-all">
                    <span class="material-symbols-outlined">chevron_right</span>
                </button>
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
    <script>
    function switchToGrid() {
        const grid = document.getElementById('productGrid');
        const gridBtn = document.getElementById('gridViewBtn');
        const listBtn = document.getElementById('listViewBtn');
        
        grid.className = 'grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6';
        grid.classList.remove('view-list');
        
        gridBtn.classList.add('bg-black', 'text-white');
        gridBtn.classList.remove('text-on-surface-variant', 'hover:bg-stone-200');
        listBtn.classList.add('text-on-surface-variant', 'hover:bg-stone-200');
        listBtn.classList.remove('bg-black', 'text-white');
    }

    function switchToList() {
        const grid = document.getElementById('productGrid');
        const gridBtn = document.getElementById('gridViewBtn');
        const listBtn = document.getElementById('listViewBtn');
        
        grid.className = 'grid gap-6 view-list';
        
        listBtn.classList.add('bg-black', 'text-white');
        listBtn.classList.remove('text-on-surface-variant', 'hover:bg-stone-200');
        gridBtn.classList.add('text-on-surface-variant', 'hover:bg-stone-200');
        gridBtn.classList.remove('bg-black', 'text-white');
    }

    // Funcionalidad global del API carrito
    window.addToCart = function(productId, productName, price, imageUrl, category) {
        fetch('/api/tienda/carrito', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                product_id: productId,
                cantidad: 1
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                alert(productName + ' agregado exitosamente al carrito.');
                // Update badge if exists
            } else {
                alert('No se pudo agregar al carrito: ' + (data.message || 'Error'));
            }
        })
        .catch(err => {
            console.error('Error adding to cart', err);
            alert('Error técnico al agregar al carrito.');
        });
    }
    </script>
    <script src="{{ asset('js/catalogo_detallado.js') }}"></script>
@endpush