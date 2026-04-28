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
<main class="flex-grow pt-20 pb-12 px-6 lg:px-10 max-w-[1920px] mx-auto w-full">
    <div class="flex flex-col lg:flex-row gap-6">
        
        <!-- Sidebar Filters -->
        <aside class="w-full lg:w-72 flex-shrink-0">
            <form action="{{ url()->current() }}" method="GET" id="filterForm" class="space-y-6">
                @if(request('q'))
                    <input type="hidden" name="q" value="{{ request('q') }}">
                @endif
                
                <div class="bg-white border border-outline p-5 rounded-[20px] shadow-sm">
                    <div class="flex justify-between items-center mb-5">
                        <h2 class="font-headline text-lg font-bold uppercase tracking-tighter flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary">filter_list</span>
                            Filtrado Técnico
                        </h2>
                        @if(request('brands') || request('categories'))
                            <a href="{{ url()->current() }}{{ request('q') ? '?q='.request('q') : '' }}" class="text-[9px] font-black text-stone-400 hover:text-primary uppercase tracking-widest">Limpiar</a>
                        @endif
                    </div>
                    
                    <div class="space-y-5">
                        <!-- Categorías -->
                        <div>
                            <label class="font-headline text-[10px] font-black uppercase text-stone-400 block mb-3 tracking-[0.3em] italic">Sistemas / Categorías</label>
                            <div class="space-y-2.5 max-h-48 overflow-y-auto pr-2 custom-scrollbar">
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
        <!-- Product Listing -->
        <section class="flex-grow">
            <!-- Consolidated Industrial Header: High Fidelity & Density -->
            <div class="mb-10 space-y-4">
                <div class="bg-white border border-stone-100 rounded-[24px] shadow-sm p-3 xl:p-4 flex flex-col xl:flex-row items-center gap-6 relative overflow-hidden group/header transition-all hover:shadow-md">
                    <div class="absolute inset-0 opacity-[0.02] pointer-events-none" style="background-image: radial-gradient(#000 1px, transparent 1px); background-size: 15px 15px;"></div>
                    
                    <!-- Identification Segment -->
                    <div class="flex items-center gap-5 min-w-max border-r border-stone-100 pr-6 relative z-10">
                        <div class="flex flex-col">
                            <span class="text-[9px] font-black uppercase text-primary tracking-[0.3em] italic mb-1.5">DB_CORE: MASTER</span>
                            <h1 class="font-headline text-3xl font-black uppercase tracking-tighter italic text-stone-900 leading-none">
                                CATÁLOG<span class="text-stone-300">O_X</span>
                            </h1>
                        </div>
                        <div class="flex flex-col border-l border-stone-100 pl-5">
                            <span class="text-[9px] font-black text-stone-400 uppercase tracking-widest italic mb-0.5">ESTADO_MATRIZ</span>
                            <p class="text-[14px] font-black text-stone-900 italic leading-none tracking-tighter">
                                {{ $products->total() }} <span class="text-primary text-[10px]">REGS</span>
                            </p>
                        </div>
                    </div>

                    <!-- AI Search Engine Segment -->
                    <div class="flex-grow w-full xl:w-auto relative group/search z-10">
                        <form action="{{ url('/tienda/catalogo_detallado') }}" method="GET" class="relative">
                            <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                                <span class="material-symbols-outlined text-primary font-black text-lg">search_spark</span>
                            </div>
                            <input type="text" 
                                   name="search" 
                                   value="{{ request('search') }}"
                                   class="w-full bg-stone-50 border border-stone-100 rounded-[20px] pl-14 pr-32 py-3.5 text-[14px] font-black text-stone-900 placeholder:text-stone-300 focus:bg-white focus:border-stone-950 focus:ring-0 transition-all italic tracking-tight"
                                   placeholder="SMART_SEARCH_v6.4: SKU, CATEGORÍA, NOMBRE..."/>
                            
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 gap-2">
                                @if(request('search'))
                                    <a href="{{ url('/tienda/catalogo_detallado') }}" class="w-8 h-8 flex items-center justify-center text-stone-300 hover:text-red-500 transition-colors">
                                        <span class="material-symbols-outlined font-black text-sm">close</span>
                                    </a>
                                @endif
                                <button type="submit" class="bg-stone-950 text-white px-5 py-2 rounded-xl text-[10px] font-black uppercase tracking-widest hover:bg-primary hover:text-stone-950 transition-all active:scale-95 italic">
                                    SCAN_DB
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Operations & Toggles Segment -->
                    <div class="flex items-center gap-6 min-w-max border-l border-stone-100 pl-6 relative z-10">
                        <div class="flex flex-col text-right">
                            <span class="text-[9px] font-black text-stone-400 uppercase tracking-[0.2em] italic mb-1 leading-none">PAG_PROTOCOL</span>
                            <p class="text-[11px] font-black text-stone-500 uppercase tracking-tight italic leading-none whitespace-nowrap">
                                {{ $products->firstItem() ?? 0 }}-{{ $products->lastItem() ?? 0 }}
                            </p>
                        </div>
                        <div class="flex p-1 bg-stone-50 rounded-xl border border-stone-100 gap-1">
                            <button id="gridViewBtn" title="Vista Cuadrícula" class="view-btn active w-9 h-9 flex items-center justify-center bg-stone-950 text-white rounded-lg transition-all shadow-sm active:scale-95" onclick="switchToGrid()">
                                <span class="material-symbols-outlined text-lg font-black">grid_view</span>
                            </button>
                            <button id="listViewBtn" title="Vista Lista" class="view-btn w-9 h-9 flex items-center justify-center text-stone-400 hover:bg-white hover:text-stone-950 rounded-lg transition-all active:scale-95" onclick="switchToList()">
                                <span class="material-symbols-outlined text-lg font-black">format_list_bulleted</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Compact Smart Suggestions Chips -->
                <div class="flex flex-wrap items-center gap-3 px-4">
                    <span class="text-[9px] font-black text-stone-400 uppercase tracking-[0.3em] italic">AI_MATCH_TRENDS:</span>
                    @foreach(['Empacadura', 'Cámara', 'Culata', 'Retén', 'Kit'] as $sug)
                        <a href="{{ url('/tienda/catalogo_detallado?search='.$sug) }}" 
                           class="text-[9px] font-black text-stone-500 hover:text-primary transition-colors uppercase italic tracking-tighter">#{{ $sug }}</a>
                        @if(!$loop->last)
                            <span class="w-1 h-1 bg-stone-200 rounded-full"></span>
                        @endif
                    @endforeach
                </div>
            </div>

            <div id="gridViewContainer">
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
            </div>

            <!-- List View (Table Mode) - Inspired by Photo 2 -->
            <div id="listViewContainer" class="hidden overflow-x-auto rounded-[32px] border border-stone-200 bg-white shadow-sm overflow-hidden">
                <table class="w-full text-left border-collapse min-w-[1000px]">
                    <thead class="bg-stone-50/80 border-b border-stone-100">
                        <tr class="text-[10px] font-black uppercase tracking-widest text-stone-400 italic">
                            <th class="py-5 px-6 w-10 text-center">N°</th>
                            <th class="py-5 px-6">CÓDIGO SKU</th>
                            <th class="py-5 px-6">CATEGORÍA</th>
                            <th class="py-5 px-6">FABRICANTE</th>
                            <th class="py-5 px-6">MARCA</th>
                            <th class="py-5 px-6">MATERIAL</th>
                            <th class="py-5 px-6">ESPESOR</th>
                            <th class="py-5 px-6">DESCRIPCIÓN</th>
                            <th class="py-5 px-6">MEDIDAS</th>
                            <th class="py-5 px-6 text-right">PRECIO</th>
                            <th class="py-5 px-6 text-center">CANT.</th>
                            <th class="py-5 px-6 text-right">MONTO</th>
                            <th class="py-5 px-6 text-center">ESTATUS</th>
                            <th class="py-5 px-6 text-right w-16">ACCION</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-stone-50">
                        @foreach($products as $product)
                        <tr class="hover:bg-stone-50/50 transition-all group">
                            <td class="py-4 px-6 text-center text-[11px] font-black text-stone-300 italic">
                                {{ $loop->iteration }}
                            </td>
                            <td class="py-4 px-6">
                                <span class="font-mono text-[11px] font-black text-stone-900 bg-stone-100 px-2 py-1 rounded border border-stone-200/50">
                                    {{ $product->codigo_oem ?? '---' }}
                                </span>
                            </td>
                            <td class="py-4 px-6">
                                <span class="text-[10px] font-black text-stone-500 uppercase tracking-tight">{{ $product->categoria ?? '---' }}</span>
                            </td>
                            <td class="py-4 px-6">
                                <span class="text-[10px] font-black text-stone-500 uppercase tracking-tight">{{ $product->fabricante ?? '---' }}</span>
                            </td>
                            <td class="py-4 px-6">
                                <span class="text-[10px] font-black text-stone-500 uppercase tracking-tight">{{ $product->marca ?? '---' }}</span>
                            </td>
                            <td class="py-4 px-6">
                                <span class="text-[10px] font-bold text-stone-400 uppercase">{{ $product->material ?? '---' }}</span>
                            </td>
                            <td class="py-4 px-6">
                                <span class="text-[10px] font-bold text-stone-400 uppercase">{{ $product->espesor ?? '---' }}</span>
                            </td>
                            <td class="py-4 px-6 max-w-xs">
                                <a href="{{ url('/tienda/producto/' . $product->id) }}" class="font-headline text-[12px] font-black uppercase text-stone-900 hover:text-primary transition-colors italic leading-tight block">
                                    {{ $product->nombre }}
                                </a>
                            </td>
                            <td class="py-4 px-6">
                                <span class="text-[10px] font-bold text-stone-400 uppercase">{{ $product->medidas ?? '---' }}</span>
                            </td>
                            <td class="py-4 px-6 text-right text-stone-900 font-headline font-black text-lg italic tracking-tighter">
                                ${{ number_format($product->precio_mayor ?? 0, 2) }}
                            </td>
                            <td class="py-4 px-6 text-center">
                                <input type="number" value="1" min="1" 
                                       data-price="{{ $product->precio_mayor ?? 0 }}"
                                       oninput="updateRowTotal(this)"
                                       class="w-10 h-8 text-center bg-stone-50 border border-stone-200 rounded-lg font-black text-[12px] focus:ring-1 focus:ring-primary focus:outline-none transition-all qty-input">
                            </td>
                            <td class="py-4 px-6 text-right">
                                <span class="font-headline text-lg font-black text-primary tracking-tighter italic row-total shadow-primary/5">
                                    ${{ number_format($product->precio_mayor ?? 0, 2) }}
                                </span>
                            </td>
                            <td class="py-4 px-6 text-center">
                                @if($product->created_at && $product->created_at->diffInDays(now()) < 15)
                                    <span class="inline-flex items-center gap-1.5 bg-primary text-stone-900 text-[8px] font-black uppercase px-2 py-1 rounded shadow-sm border border-black/5">
                                        Incorporado
                                    </span>
                                @endif
                            </td>
                            <td class="py-4 px-6 text-right">
                                <button onclick="Cart.add({{ $product->id }}, '{{ addslashes($product->nombre) }}', {{ $product->precio_mayor ?? 0 }}, '{{ $product->imagen_url ?? '' }}', '{{ $product->categoria ?? '' }}', this.closest('tr').querySelector('.qty-input').value)"
                                        class="w-9 h-9 bg-stone-950 text-white hover:bg-primary hover:text-stone-900 rounded-xl font-black flex items-center justify-center transition-all shadow-md active:scale-90 group/cart">
                                    <span class="material-symbols-outlined text-lg">add_shopping_cart</span>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-12 flex justify-center">
                {{ $products->links() }}
            </div>

            <!-- Technical Compatibility Table -->
            <div class="mt-16 bg-white p-8 rounded-[32px] border border-stone-200 shadow-sm relative overflow-hidden">
                <div class="absolute -right-20 -top-20 opacity-[0.02] pointer-events-none">
                    <span class="material-symbols-outlined text-[400px]">verified</span>
                </div>

                <h2 class="font-headline text-2xl font-black uppercase tracking-tighter mb-8 flex items-center gap-4 italic text-stone-900">
                    <span class="w-12 h-1.5 bg-primary rounded-full"></span>
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

    function updateRowTotal(input) {
        const price = parseFloat(input.getAttribute('data-price'));
        const qty = parseInt(input.value) || 0;
        const total = price * qty;
        const totalElement = input.closest('tr').querySelector('.row-total');
        if (totalElement) {
            totalElement.textContent = '$' + total.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
        }
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