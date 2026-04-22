@extends('layouts.ecommerce')

@section('title', 'Carrito de Compras | Mayor de Repuesto LA CIMA, C.A.')

@section('content')
<main class="flex-grow w-full max-w-screen-2xl mx-auto px-6 md:px-12 pt-32 pb-24 relative z-10">
    
    <!-- Título y Breadcrumb -->
    <div class="mb-12">
        <h1 class="text-6xl font-black text-black uppercase tracking-tighter leading-none mb-3">Tu <span class="text-primary">Carrito</span></h1>
        <p class="text-[11px] font-bold text-stone-500 uppercase tracking-[0.3em]">Revisa tus productos antes de proceder al pago</p>
    </div>

    <!-- Estado vacío (se muestra por defecto, JS lo oculta si hay items) -->
    <div id="emptyCartState" class="bg-white rounded-3xl p-24 text-center border border-outline shadow-sm relative overflow-hidden">
        <div class="absolute inset-x-0 -top-40 h-80 bg-primary/20 blur-[120px] rounded-full pointer-events-none"></div>
        <span class="material-symbols-outlined text-[100px] text-stone-200 mb-8 block">shopping_bag</span>
        <h2 class="text-3xl font-black text-black uppercase tracking-tight mb-4">Tu carrito está vacío</h2>
        <p class="text-stone-500 mb-10 max-w-md mx-auto text-sm leading-relaxed">Explora nuestro catálogo de repuestos industriales y añade los productos que necesitas.</p>
        <a href="{{ url('/tienda/catalogo_general') }}" class="inline-flex items-center justify-center gap-3 bg-black text-white hover:bg-primary hover:text-black font-black uppercase py-5 px-12 tracking-[0.2em] transform transition-all hover:-translate-y-1 shadow-lg">
            <span class="material-symbols-outlined">inventory_2</span>
            Ver Catálogo
        </a>
    </div>

    <!-- Contenido del carrito (oculto por defecto) -->
    <div id="cartContent" class="hidden">
        <!-- B2B Shopping Cart Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start">
            
            <!-- Listado de Piezas (Columna Principal) -->
            <div class="lg:col-span-8 space-y-6">
                
                <!-- Security Header -->
                <div class="bg-black text-white rounded-2xl p-6 flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
                    <div class="flex items-center gap-4">
                        <span class="material-symbols-outlined text-primary text-3xl">verified_user</span>
                        <div>
                            <h4 class="font-black uppercase tracking-widest text-xs">Compra Segura SSL/TLS</h4>
                            <p class="text-[10px] text-stone-400">Tus datos están protegidos con encriptación bancaria.</p>
                        </div>
                    </div>
                    <button onclick="if(confirm('¿Vaciar todo el carrito?')) Cart.clear(); renderCartItems();" class="text-[10px] font-bold text-red-400 hover:text-red-300 uppercase tracking-widest flex items-center gap-2 transition-colors">
                        <span class="material-symbols-outlined text-sm">delete_sweep</span>
                        Vaciar Carrito
                    </button>
                </div>

                <!-- Tabla de Contenidos -->
                <div class="bg-white rounded-3xl border border-outline overflow-hidden shadow-sm">
                    
                    <!-- Table Header -->
                    <div class="grid grid-cols-12 gap-4 p-6 bg-stone-50 border-b border-outline text-[10px] font-black uppercase tracking-[0.2em] text-stone-500">
                        <div class="col-span-6 md:col-span-5">Producto</div>
                        <div class="col-span-3 hidden md:block text-center">Precio Unit.</div>
                        <div class="col-span-4 md:col-span-2 text-center">Cantidad</div>
                        <div class="col-span-2 text-right">Subtotal</div>
                    </div>

                    <!-- Items Inject (Dynamic from JS) -->
                    <div id="cartItemsContainer" class="divide-y divide-stone-100 cart-list-container">
                        <!-- Generado por JavaScript -->
                    </div>

                    <!-- Footer del Contenedor de Items -->
                    <div class="p-6 bg-stone-50 border-t border-outline flex justify-between items-center">
                        <a href="{{ url('/tienda/catalogo_general') }}" class="text-[10px] uppercase font-bold text-stone-500 hover:text-black flex items-center gap-2 group transition-colors">
                            <span class="material-symbols-outlined text-sm transition-transform group-hover:-translate-x-1">arrow_back</span>
                            Añadir Más Productos
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

                    <h3 class="font-headline text-2xl font-black uppercase tracking-tighter mb-8 relative z-10">Resumen</h3>

                    <div class="space-y-4 mb-8 text-sm relative z-10">
                        <div class="flex justify-between text-stone-400 font-medium">
                            <span>Subtotal</span>
                            <span id="ui-subtotal">$0.00</span>
                        </div>
                        <div class="flex justify-between text-stone-400 font-medium">
                            <span>Impuesto (16% IVA)</span>
                            <span id="ui-iva">$0.00</span>
                        </div>
                        <div class="pt-4 border-t border-white/20">
                            <div class="flex justify-between items-center">
                                <span class="text-xs uppercase tracking-widest font-bold text-primary">Total</span>
                                <span id="ui-total" class="text-4xl font-black text-primary">$0.00</span>
                            </div>
                        </div>
                    </div>

                    <a href="{{ url('/tienda/checkout') }}" class="w-full bg-primary text-black hover:bg-white hover:text-black font-black uppercase tracking-[0.2em] py-5 transition-colors relative z-10 shadow-[0_10px_30px_rgba(212,237,49,0.2)] flex items-center justify-center gap-3 text-center">
                        <span class="material-symbols-outlined">credit_card</span>
                        Proceder al Pago
                    </a>
                    
                    <p class="text-[9px] uppercase tracking-widest text-stone-500 text-center mt-4 relative z-10">
                        Disponible para clientes registrados
                    </p>
                </div>
                
                <!-- Shipping Info -->
                <div class="bg-white rounded-2xl p-6 border border-outline">
                    <div class="flex items-center gap-3 mb-4">
                        <span class="material-symbols-outlined text-primary">local_shipping</span>
                        <span class="font-bold text-sm uppercase">Envío Nacional</span>
                    </div>
                    <p class="text-xs text-stone-500">Despacho en 2-4 días hábiles a toda Venezuela. Tarifas según zona y peso.</p>
                </div>
                
                <!-- Security Badge -->
                <div class="bg-stone-50 rounded-2xl p-4 flex items-center gap-4">
                    <span class="material-symbols-outlined text-stone-400">security</span>
                    <div>
                        <p class="text-[10px] font-black uppercase tracking-widest">Pago 100% Seguro</p>
                        <p class="text-[9px] text-stone-500">Encriptación SSL de 256 bits</p>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</main>
@endsection

@push('scripts')
<script>
/**
 * Renderiza los items del carrito desde localStorage
 */
function renderCartItems() {
    const container = document.getElementById('cartItemsContainer');
    const items = Cart.getAll();
    const emptyState = document.getElementById('emptyCartState');
    const cartContent = document.getElementById('cartContent');
    
    if (items.length === 0) {
        // Mostrar estado vacío
        emptyState.classList.remove('hidden');
        cartContent.classList.add('hidden');
        return;
    } else {
        // Ocultar estado vacío, mostrar contenido
        emptyState.classList.add('hidden');
        cartContent.classList.remove('hidden');
    }
    
    const subtotal = Cart.getTotal();
    const iva = subtotal * 0.16;
    const total = subtotal + iva;
    
    container.innerHTML = items.map((item, index) => `
        <div class="grid grid-cols-12 gap-4 p-6 items-center cart-item-row transition-all" data-id="${item.id}" style="animation-delay: ${index * 0.05}s">
            <!-- Imagen y Nombre -->
            <div class="col-span-6 md:col-span-5 flex items-center gap-6">
                <div class="w-20 h-20 bg-stone-50 rounded-xl flex-shrink-0 border border-stone-100 flex items-center justify-center p-3 relative group overflow-hidden">
                    ${item.image 
                        ? '<img src="' + item.image + '" class="w-full h-full object-contain mix-blend-multiply group-hover:scale-110 transition-transform" alt="' + item.name + '">' 
                        : '<span class="material-symbols-outlined text-3xl text-stone-300">settings_input_component</span>'
                    }
                    <button onclick="Cart.remove(${item.id}); renderCartItems();" class="absolute top-0 right-0 bg-red-500 text-white p-1.5 rounded-bl-xl opacity-0 group-hover:opacity-100 transition-all flex items-center justify-center">
                        <span class="material-symbols-outlined text-xs">close</span>
                    </button>
                </div>
                <div class="space-y-1">
                    <span class="text-[9px] font-bold text-stone-400 uppercase tracking-widest block">Ref: ${item.ref || 'N/A'}</span>
                    <span class="text-sm font-black text-black block leading-tight">${item.name || 'Producto'}</span>
                </div>
            </div>
            
            <!-- Precio Unitario -->
            <div class="col-span-3 hidden md:flex items-center justify-center text-sm font-black text-stone-600">
                $${parseFloat(item.price).toFixed(2)}
            </div>
            
            <!-- Controles de Cantidad -->
            <div class="col-span-4 md:col-span-2">
                <div class="flex items-center justify-center border border-stone-200 rounded-lg overflow-hidden bg-stone-50">
                    <button onclick="Cart.decrement(${item.id}); renderCartItems();" class="w-10 h-10 flex items-center justify-center text-stone-500 hover:bg-stone-200 hover:text-black transition-colors text-xl font-light">
                        <span class="material-symbols-outlined text-sm">remove</span>
                    </button>
                    <span class="w-12 text-center font-black text-sm">${item.qty || 1}</span>
                    <button onclick="Cart.increment(${item.id}); renderCartItems();" class="w-10 h-10 flex items-center justify-center text-stone-500 hover:bg-stone-200 hover:text-black transition-colors text-xl font-light">
                        <span class="material-symbols-outlined text-sm">add</span>
                    </button>
                </div>
            </div>
            
            <!-- Subtotal -->
            <div class="col-span-2 text-right">
                <span class="text-base font-black text-black block">$${((item.price || 0) * (item.qty || 1)).toFixed(2)}</span>
            </div>
        </div>
    `).join('');
    
// Actualizar totales
    document.getElementById('ui-subtotal').textContent = '$' + subtotal.toFixed(2);
    document.getElementById('ui-iva').textContent = '$' + iva.toFixed(2);
    document.getElementById('ui-total').textContent = '$' + total.toFixed(2);
}

// Inicializar al cargar
document.addEventListener('DOMContentLoaded', function() {
    const emptyState = document.getElementById('emptyCartState');
    const cartContent = document.getElementById('cartContent');
    
    if (!Cart.isEmpty()) {
        // Ocultar estado vacío, mostrar contenido
        emptyState.classList.add('hidden');
        cartContent.classList.remove('hidden');
        renderCartItems();
    } else {
        // Mostrar estado vacío
        emptyState.classList.remove('hidden');
        cartContent.classList.add('hidden');
    }
});
</script>
@endpush
@endsection