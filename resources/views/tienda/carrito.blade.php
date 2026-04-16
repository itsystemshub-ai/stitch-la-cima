@extends('layouts.ecommerce')

@section('title', 'Carrito de Inteligencia | Mayor de Repuesto LA CIMA, C.A.')

@section('content')
<main class="flex-grow w-full max-w-screen-2xl mx-auto px-6 md:px-12 pt-32 pb-24 relative z-10">
    
    <!-- Título y Breadcrumb -->
    <div class="mb-12">
        <h1 class="text-6xl font-black text-black uppercase tracking-tighter leading-none mb-3">Requerimiento <span class="text-primary">Activo</span></h1>
        <p class="text-[11px] font-bold text-stone-500 uppercase tracking-[0.3em]">Gestión de Componentes B2B &bull; Validación Segura</p>
    </div>

    @if(count($cartItems) === 0)
        <!-- Empty Cart Premium State -->
        <div class="bg-white rounded-3xl p-24 text-center border border-outline shadow-sm relative overflow-hidden">
            <div class="absolute inset-x-0 -top-40 h-80 bg-primary/20 blur-[120px] rounded-full pointer-events-none"></div>
            <span class="material-symbols-outlined text-[100px] text-stone-200 mb-8 block">conveyor_belt</span>
            <h2 class="text-3xl font-black text-black uppercase tracking-tight mb-4">Línea de Ensamble Vacía</h2>
            <p class="text-stone-500 mb-10 max-w-md mx-auto text-sm leading-relaxed">Su cesta de distribución industrial no contiene repuestos. Visite nuestro catálogo matriz para comenzar la selección de componentes.</p>
            <a href="{{ url('/tienda/catalogo_general') }}" class="inline-flex items-center justify-center gap-3 bg-black text-white hover:bg-primary hover:text-black font-black uppercase py-5 px-12 tracking-[0.2em] transform transition-all hover:-translate-y-1 shadow-lg">
                <span class="material-symbols-outlined">database</span>
                Abrir Catálogo de Partes
            </a>
        </div>
    @else
        <!-- B2B Shopping Cart Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start">
            
            <!-- Listado de Piezas (Columna Principal) -->
            <div class="lg:col-span-8 space-y-6">
                
                <!-- Security Header -->
                <div class="bg-black text-white rounded-2xl p-6 flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
                    <div class="flex items-center gap-4">
                        <span class="material-symbols-outlined text-primary text-3xl">verified_user</span>
                        <div>
                            <h4 class="font-black uppercase tracking-widest text-xs">Despacho Autorizado</h4>
                            <p class="text-[10px] text-stone-400">Protección SSL/TLS y rastreo logístico activo.</p>
                        </div>
                    </div>
                </div>

                <!-- Tabla de Contenidos -->
                <div class="bg-white rounded-3xl border border-outline overflow-hidden shadow-sm">
                    
                    <!-- Table Header -->
                    <div class="grid grid-cols-12 gap-4 p-6 bg-stone-50 border-b border-outline text-[10px] font-black uppercase tracking-[0.2em] text-stone-500">
                        <div class="col-span-6 md:col-span-5">Nomenclatura / Componente</div>
                        <div class="col-span-3 hidden md:block text-center">Valor Unitario</div>
                        <div class="col-span-4 md:col-span-2 text-center">Cant.</div>
                        <div class="col-span-2 text-right">Subtotal</div>
                    </div>

                    <!-- Items Inject -->
                    <div class="divide-y divide-stone-100 cart-list-container">
                        @php $subtotalTotal = 0; @endphp
                        @foreach($cartItems as $item)
                        @php 
                            $lineTotal = $item['precio'] * $item['cantidad']; 
                            $subtotalTotal += $lineTotal;
                        @endphp
                        <div class="grid grid-cols-12 gap-4 p-6 items-center cart-item-row transition-opacity" data-id="{{ $item['id'] }}" data-precio="{{ $item['precio'] }}">
                            
                            <!-- Producto Info -->
                            <div class="col-span-6 md:col-span-5 flex items-center gap-6">
                                <div class="w-20 h-20 bg-stone-50 rounded-xl flex-shrink-0 border border-stone-100 flex items-center justify-center p-2 hidden sm:flex relative group">
                                    <img src="{{ $item['imagen_url'] }}" alt="Foto Pieza" class="w-full h-full object-contain group-hover:scale-110 transition-transform">
                                    <button onclick="eliminarFila('{{ $item['id'] }}')" class="absolute -top-2 -left-2 bg-red-500 text-white p-1 rounded-full opacity-0 group-hover:opacity-100 transition-opacity flex">
                                        <span class="material-symbols-outlined text-xs">close</span>
                                    </button>
                                </div>
                                <div class="space-y-1">
                                    <span class="text-[9px] font-bold text-stone-400 uppercase tracking-widest block">OEM: {{ $item['codigo_oem'] }}</span>
                                    <a href="{{ url('/tienda/productos/'.$item['product_id']) }}" class="text-sm font-black text-black hover:text-primary transition-colors block leading-tight">{{ $item['nombre'] }}</a>
                                    <div class="block md:hidden text-xs text-stone-500 mt-2">${{ number_format($item['precio'], 2) }} unit.</div>
                                    <!-- Boton Eliminar Móvil -->
                                    <button onclick="eliminarFila('{{ $item['id'] }}')" class="block sm:hidden text-[10px] text-red-500 font-bold uppercase mt-2">Eliminar de la lista</button>
                                </div>
                            </div>

                            <!-- Precio Desktop -->
                            <div class="col-span-3 hidden md:flex items-center justify-center text-sm font-black text-stone-600">
                                ${{ number_format($item['precio'], 2) }}
                            </div>

                            <!-- Controls -->
                            <div class="col-span-4 md:col-span-2">
                                <div class="flex items-center justify-between border border-stone-200 rounded-lg overflow-hidden bg-stone-50">
                                    <button onclick="ajustar('{{ $item['id'] }}', -1)" class="w-8 h-10 flex items-center justify-center text-stone-500 hover:bg-stone-200 hover:text-black transition-colors"><span class="material-symbols-outlined text-sm">remove</span></button>
                                    <input type="number" id="qty-{{ $item['id'] }}" value="{{ $item['cantidad'] }}" class="w-10 h-10 text-center text-sm font-bold bg-transparent border-none p-0 focus:ring-0 m-0" readonly>
                                    <button onclick="ajustar('{{ $item['id'] }}', 1)" class="w-8 h-10 flex items-center justify-center text-stone-500 hover:bg-stone-200 hover:text-black transition-colors"><span class="material-symbols-outlined text-sm">add</span></button>
                                </div>
                            </div>

                            <!-- Subtotal -->
                            <div class="col-span-2 text-right">
                                <span id="line-total-{{ $item['id'] }}" class="text-base font-black text-black block">${{ number_format($lineTotal, 2) }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Footer del Contenedor de Items -->
                    <div class="p-6 bg-stone-50 border-t border-outline flex justify-between items-center">
                        <a href="{{ url('/tienda/catalogo_general') }}" class="text-[10px] uppercase font-bold text-stone-500 hover:text-black flex items-center gap-2 group transition-colors">
                            <span class="material-symbols-outlined text-sm transition-transform group-hover:-translate-x-1">arrow_back</span>
                            Añadir Más Piezas
                        </a>
                    </div>
                </div>
            </div>

            <!-- Panel de Cierre (Order Summary) -->
            <div class="lg:col-span-4 space-y-6">
                <!-- Summary Card -->
                <div class="bg-black text-white rounded-3xl p-8 relative overflow-hidden shadow-2xl">
                    <div class="absolute -right-12 -top-12 opacity-10">
                        <span class="material-symbols-outlined text-[150px]">receipt_long</span>
                    </div>

                    <h3 class="font-headline text-2xl font-black uppercase tracking-tighter mb-8 relative z-10">Consolidado</h3>

                    <div class="space-y-4 mb-8 text-sm relative z-10">
                        <div class="flex justify-between text-stone-400 font-medium">
                            <span>Subtotal Repuestos</span>
                            <span id="ui-subtotal" class="text-white font-black">${{ number_format($subtotalTotal, 2) }}</span>
                        </div>
                        <div class="flex justify-between text-stone-400 font-medium pb-4 border-b border-white/20">
                            <span>Estimado IVA (16%)</span>
                            @php $iva = $subtotalTotal * 0.16; @endphp
                            <span id="ui-iva" class="text-white font-black">${{ number_format($iva, 2) }}</span>
                        </div>
                        
                        <div class="flex justify-between items-center pt-2">
                            <span class="text-xs uppercase tracking-widest font-bold text-primary">Inversión Final</span>
                            <span id="ui-total" class="text-4xl font-black text-primary">${{ number_format($subtotalTotal + $iva, 2) }}</span>
                        </div>
                    </div>

                    <button onclick="irCheckout()" class="w-full bg-primary text-black hover:bg-white hover:text-black font-black uppercase tracking-[0.2em] py-5 transition-colors relative z-10 shadow-[0_10px_30px_rgba(212,237,49,0.2)]">
                        Habilitar Modulo de Pago
                    </button>
                    
                    <p class="text-[9px] uppercase tracking-widest text-stone-500 text-center mt-6 relative z-10">
                        Su orden pasará por el Hub de validación de disponibilidad Zenith.
                    </p>
                </div>
            </div>
            
        </div>
    @endif
</main>

@push('scripts')
<script>
    // Variables Core
    const cartUrl = '/api/tienda/carrito';
    // Utilizaremos los endpoints RESTFUL PUT Y DELETE
    // Dado que el subtotal es dinámico, debemos re-calcularlo en el cliente.
    
    function updateUITotals() {
        let rows = document.querySelectorAll('.cart-item-row');
        let newSubtotal = 0;
        
        rows.forEach(row => {
            let id = row.getAttribute('data-id');
            let price = parseFloat(row.getAttribute('data-precio'));
            let qtyInput = document.getElementById('qty-' + id);
            
            if(qtyInput) {
                let qty = parseInt(qtyInput.value);
                let lineT = price * qty;
                newSubtotal += lineT;
                document.getElementById('line-total-' + id).innerText = '$' + lineT.toFixed(2);
            }
        });

        if(rows.length === 0) {
            window.location.reload(); // Para que el blade muestre el estado de carrito vacío
        } else {
            let iva = newSubtotal * 0.16;
            document.getElementById('ui-subtotal').innerText = '$' + newSubtotal.toFixed(2);
            document.getElementById('ui-iva').innerText = '$' + iva.toFixed(2);
            document.getElementById('ui-total').innerText = '$' + (newSubtotal + iva).toFixed(2);
        }
    }

    async function ajustar(id, change) {
        let input = document.getElementById('qty-' + id);
        let currentQty = parseInt(input.value);
        let newQty = currentQty + change;
        
        if (newQty < 1) return; // No permitir menos de 1 mediante botones

        input.value = newQty;
        updateUITotals(); // Feedback instantáneo en UI
        
        // Sincronización transparente con Backend
        try {
            await fetch(cartUrl + '/' + id, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ cantidad: newQty })
            });
        } catch (error) {
            console.error('Core sync fallido', error);
        }
    }

    async function eliminarFila(id) {
        let fila = document.querySelector(`.cart-item-row[data-id="${id}"]`);
        fila.style.opacity = '0.5';
        fila.style.pointerEvents = 'none';

        try {
            let req = await fetch(cartUrl + '/' + id, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });

            if (req.ok) {
                fila.remove();
                updateUITotals();
            }
        } catch (error) {
            console.error(error);
            fila.style.opacity = '1';
            fila.style.pointerEvents = 'auto';
        }
    }

    function irCheckout() {
        window.location.href = "{{ url('/tienda/checkout') }}";
    }
</script>
@endpush
@endsection
