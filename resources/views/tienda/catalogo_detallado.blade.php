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
        <aside class="w-full md:w-72 flex-shrink-0">
            <form action="{{ url()->current() }}" method="GET" id="filterForm" class="space-y-8">
                @if(request('q'))
                    <input type="hidden" name="q" value="{{ request('q') }}">
                @endif
                
                <div class="bg-white border border-outline p-6 rounded-lg shadow-sm">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="font-headline text-lg font-bold uppercase tracking-tighter flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary">filter_list</span>
                            Filtrado Técnico
                        </h2>
                        @if(request('brands') || request('categories'))
                            <a href="{{ url()->current() }}{{ request('q') ? '?q='.request('q') : '' }}" class="text-[9px] font-black text-stone-400 hover:text-primary uppercase tracking-widest">Limpiar</a>
                        @endif
                    </div>
                    
                    <div class="space-y-6">
                        <!-- Categorías -->
                        <div class="space-y-6">
                        <!-- Categorías -->
                        <div>
                            <label class="font-headline text-[10px] font-black uppercase text-stone-400 block mb-4 tracking-[0.3em] italic">Sistemas / Categorías</label>
                            <div class="space-y-3 max-h-48 overflow-y-auto pr-2 custom-scrollbar">
                                @forelse($categories as $category)
                                    <label class="flex items-center gap-3 cursor-pointer group">
                                        <input class="w-4 h-4 rounded border-stone-200 text-primary focus:ring-primary/20" 
                                               type="checkbox" name="categories[]" value="{{ $category }}"
                                               {{ is_array(request('categories')) && in_array($category, request('categories')) ? 'checked' : '' }}
                                               onchange="this.form.submit()"/>
                                        <span class="text-[12px] font-black text-stone-900 group-hover:text-primary transition-colors uppercase tracking-tight">{{ $category }}</span>
                                    </label>
                                @empty
                                    <p class="text-[10px] text-stone-400 italic font-black uppercase tracking-widest">No hay categorías disponibles</p>
                                @endforelse
                            </div>
                        </div>

                        <!-- Marcas -->
                        <div>
                            <label class="font-headline text-[10px] font-black uppercase text-stone-400 block mb-4 tracking-[0.3em] italic text-[#5a5c5e]">Fabricantes OEM</label>
                            <div class="space-y-3 max-h-64 overflow-y-auto pr-2 custom-scrollbar">
                                @forelse($brands as $brand)
                                    <label class="flex items-center gap-3 cursor-pointer group">
                                        <input class="w-4 h-4 rounded border-stone-200 text-primary focus:ring-primary/20" 
                                               type="checkbox" name="brands[]" value="{{ $brand }}"
                                               {{ is_array(request('brands')) && in_array($brand, request('brands')) ? 'checked' : '' }}
                                               onchange="this.form.submit()"/>
                                        <span class="text-[12px] font-black text-stone-900 group-hover:text-primary transition-colors uppercase tracking-tight">{{ $brand }}</span>
                                    </label>
                                @empty
                                    <p class="text-[10px] text-stone-400 italic font-black uppercase tracking-widest">No hay marcas disponibles</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Technical Support Card -->
                <div class="bg-stone-950 text-white p-8 rounded-3xl relative overflow-hidden group shadow-2xl border border-white/5">
                    <div class="relative z-10">
                        <h3 class="font-headline text-2xl font-black uppercase leading-none mb-3 text-primary italic">Soporte <br>Técnico</h3>
                        <p class="text-stone-500 text-[10px] font-black uppercase tracking-widest mb-6 leading-relaxed">Asistencia certificada para instalación industrial.</p>
                        <a href="{{ url('/tienda/contacto') }}" class="bg-primary/10 text-primary text-[9px] font-black uppercase tracking-[0.2em] px-4 py-2 rounded-lg border border-primary/20 flex items-center justify-center gap-2 group-hover:bg-primary group-hover:text-black transition-all">
                            Conectar con Ingeniero
                            <span class="material-symbols-outlined text-sm">engineering</span>
                        </a>
                    </div>
                    <div class="absolute -right-10 -bottom-10 opacity-[0.03] group-hover:scale-110 transition-transform duration-700 pointer-events-none">
                        <span class="material-symbols-outlined text-[180px]">settings_accessibility</span>
                    </div>
                </div>
            </form>
        </aside>

        <!-- Product Listing -->
        <section class="flex-grow">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end mb-12 gap-4 pb-6 border-b border-stone-100">
                <div>
                    <span class="bg-primary/10 text-primary font-black text-[9px] uppercase tracking-[0.4em] px-3 py-1 rounded-full mb-3 inline-block">Matriz de Inventario Zenith</span>
                    <h1 class="font-headline text-5xl font-black uppercase tracking-tighter italic text-stone-900 leading-none">Catálogo <span class="text-stone-300">Detallado</span></h1>
                </div>
                <div class="text-right w-full sm:w-auto">
                    <p class="text-[10.5px] font-black text-stone-400 uppercase tracking-[0.2em] italic mb-3">
                        Protocolo: Registros {{ $products->firstItem() ?? 0 }} - {{ $products->lastItem() ?? 0 }} / Total: {{ $products->total() }}
                    </p>
                    <div class="flex gap-2 justify-end">
                        <button id="gridViewBtn" class="view-btn active w-12 h-12 flex items-center justify-center bg-stone-900 text-primary rounded-xl" onclick="switchToGrid()"><span class="material-symbols-outlined text-xl">grid_view</span></button>
                        <button id="listViewBtn" class="view-btn w-12 h-12 flex items-center justify-center text-stone-400 hover:bg-stone-100 rounded-xl transition-all" onclick="switchToList()"><span class="material-symbols-outlined text-xl">format_list_bulleted</span></button>
                    </div>
                </div>
            </div>

            <div id="productGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @forelse($products as $product)
                    <x-product-card :product="$product" />
                @empty
                    <div class="col-span-full py-32 text-center bg-stone-50 rounded-[40px] border-2 border-dashed border-stone-200">
                        <span class="material-symbols-outlined text-8xl text-stone-200 mb-6 block">inventory_2</span>
                        <p class="text-stone-400 font-black text-[12px] uppercase tracking-[0.3em] italic">No se detectaron piezas compatibles bajo este filtrado.</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-20 flex justify-center">
                {{ $products->links() }}
            </div>

            <!-- Technical Compatibility Table -->
            <div class="mt-32 bg-white p-12 rounded-[50px] border border-stone-200 shadow-sm relative overflow-hidden">
                <div class="absolute -right-20 -top-20 opacity-[0.02] pointer-events-none">
                    <span class="material-symbols-outlined text-[400px]">verified</span>
                </div>

                <h2 class="font-headline text-3xl font-black uppercase tracking-tighter mb-12 flex items-center gap-4 italic text-stone-900">
                    <span class="w-16 h-2 bg-primary rounded-full"></span>
                    Protocolo de <span class="text-stone-300">Compatibilidad Técnica</span>
                </h2>
                <div class="overflow-x-auto">
                    <table class="w-full text-left zenith-table-main">
                        <thead class="zenith-table-header uppercase italic">
                            <tr>
                                <th class="py-5 px-8">Componente</th>
                                <th class="py-5 px-8">Fabricante Compatible</th>
                                <th class="py-5 px-8 text-center">Procedencia</th>
                                <th class="py-5 px-8 text-center">Calificación SAE</th>
                                <th class="py-5 px-8 text-right">Estatus Logístico</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-stone-100">
                            <tr class="bg-white hover:bg-stone-50/50 transition-colors">
                                <td class="py-5 px-8 font-black uppercase text-stone-900 tracking-tight">Inyectores de Precisión</td>
                                <td class="py-5 px-8 font-bold text-stone-500 uppercase text-[10.5px]">CATERPILLAR / PERKINS HD</td>
                                <td class="py-5 px-8 text-center text-stone-400 font-mono text-[10.5px] tracking-widest">USA / DE / 442</td>
                                <td class="py-5 px-8 text-center italic">
                                    <span class="bg-stone-50 text-stone-500 px-3 py-1 rounded-full text-[9px] font-black border border-stone-200 tracking-widest">OEM GENUINE SPEC</span>
                                </td>
                                <td class="py-5 px-8 text-right">
                                    <span class="text-green-600 font-black uppercase text-[10px] tracking-[0.2em] flex items-center justify-end gap-2">
                                        DISPONIBLE
                                        <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                                    </span>
                                </td>
                            </tr>
                            <tr class="bg-white hover:bg-stone-50/50 transition-colors">
                                <td class="py-5 px-8 font-black uppercase text-stone-900 tracking-tight">Kits de Empacadura Master</td>
                                <td class="py-5 px-8 font-bold text-stone-500 uppercase text-[10.5px]">DETROIT DIESEL S60</td>
                                <td class="py-5 px-8 text-center text-stone-400 font-mono text-[10.5px] tracking-widest">USA / MI / 902</td>
                                <td class="py-5 px-8 text-center italic">
                                    <span class="bg-stone-50 text-stone-500 px-3 py-1 rounded-full text-[9px] font-black border border-stone-200 tracking-widest">SAE-HEAVY-DUTY</span>
                                </td>
                                <td class="py-5 px-8 text-right">
                                    <span class="text-green-600 font-black uppercase text-[10px] tracking-[0.2em] flex items-center justify-end gap-2">
                                        DISPONIBLE
                                        <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                                    </span>
                                </td>
                            </tr>
                            <tr class="bg-white hover:bg-stone-50/50 transition-colors">
                                <td class="py-5 px-8 font-black uppercase text-stone-900 tracking-tight">Bombas de Flujo Crítico</td>
                                <td class="py-5 px-8 font-bold text-stone-500 uppercase text-[10.5px]">VOLVO PENTA / MACK</td>
                                <td class="py-5 px-8 text-center text-stone-400 font-mono text-[10.5px] tracking-widest">BRA / SP / 112</td>
                                <td class="py-5 px-8 text-center italic">
                                    <span class="bg-stone-50 text-stone-500 px-3 py-1 rounded-full text-[9px] font-black border border-stone-200 tracking-widest">SAE-GRADE-A</span>
                                </td>
                                <td class="py-5 px-8 text-right">
                                    <span class="text-amber-600 font-black uppercase text-[10px] tracking-[0.2em] flex items-center justify-end gap-2">
                                        STOCK BAJO
                                        <span class="w-2 h-2 bg-amber-500 rounded-full"></span>
                                    </span>
                                </td>
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