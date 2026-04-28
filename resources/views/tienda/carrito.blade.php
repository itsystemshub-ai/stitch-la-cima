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
    <div id="emptyCartState" class="bg-white rounded-[40px] p-24 text-center border border-stone-200 shadow-2xl relative overflow-hidden">
        <div class="absolute inset-x-0 -top-40 h-80 bg-primary/10 blur-[120px] rounded-full pointer-events-none"></div>
        <span class="material-symbols-outlined text-[100px] text-stone-200 mb-8 block grayscale opacity-40">inventory</span>
        <h2 class="text-4xl font-headline font-black text-black uppercase tracking-tighter italic mb-4">Módulo de Adquisición Despejado</h2>
        <p class="text-stone-500 mb-10 max-w-sm mx-auto text-[12px] font-bold uppercase tracking-tight leading-relaxed">No se detectan componentes asignados a su sesión actual. Explore nuestro inventario técnico para iniciar el proceso.</p>
        <a href="{{ url('/tienda/catalogo_general') }}" class="inline-flex items-center justify-center gap-3 bg-black text-primary hover:bg-stone-800 font-black uppercase py-5 px-12 tracking-[0.3em] text-[10px] transform transition-all hover:-translate-y-1 shadow-xl active:scale-95">
            <span class="material-symbols-outlined">inventory_2</span>
            Sincronizar Catálogo
        </a>
    </div>

    <!-- Contenido del carrito (oculto por defecto) -->
    <div id="cartContent" class="hidden">
        <!-- B2B Shopping Cart Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start">
            
            <!-- Listado de Piezas (Columna Principal) -->
            <div class="lg:col-span-8 space-y-6">
                
                <!-- Security Header -->
                <div class="bg-black text-white rounded-3xl p-8 flex flex-col md:flex-row items-start md:items-center justify-between gap-6 relative overflow-hidden">
                    <div class="absolute -right-10 -top-10 opacity-5">
                        <span class="material-symbols-outlined text-8xl">verified_user</span>
                    </div>
                    <div class="flex items-center gap-6 relative z-10">
                        <span class="material-symbols-outlined text-primary text-4xl italic">security</span>
                        <div>
                            <h4 class="font-black uppercase tracking-[0.2em] text-[12px] italic">Canal de Adquisición Protegido</h4>
                            <p class="text-[9px] text-stone-500 font-black uppercase tracking-[0.2em]">Cifrado Activo AES-256 GCM / Protocolos de Seguridad Zenith Industrial</p>
                        </div>
                    </div>
                    <button onclick="if(confirm('¿Vaciar todo el carrito?')) Cart.clear(); renderCartItems();" class="text-[10px] font-black text-red-500 hover:text-white uppercase tracking-[0.3em] flex items-center gap-3 transition-all px-4 py-2 border border-red-500/20 rounded-xl hover:bg-red-500 relative z-10 italic">
                        <span class="material-symbols-outlined text-sm">delete_sweep</span>
                        Anular Carrito
                    </button>
                </div>

                <!-- Tabla de Contenidos -->
                <div class="bg-white rounded-[40px] border border-stone-200 overflow-hidden shadow-2xl">
                    
                    <!-- Table Header -->
                    <div class="grid grid-cols-12 gap-4 p-8 bg-stone-900 border-b border-stone-800 shadow-lg italic">
                        <div class="col-span-6 md:col-span-5 text-[10px] font-black text-primary uppercase tracking-[0.4em]">Producto / Referencia OEM</div>
                        <div class="col-span-3 hidden md:block text-center text-[10px] font-black text-primary uppercase tracking-[0.4em]">Costo Base</div>
                        <div class="col-span-4 md:col-span-2 text-center text-[10px] font-black text-primary uppercase tracking-[0.4em]">Cantidad</div>
                        <div class="col-span-2 text-right text-[10px] font-black text-primary uppercase tracking-[0.4em]">Subtotal</div>
                    </div>

                    <!-- Items Inject (Dynamic from JS) -->
                    <div id="cartItemsContainer" class="divide-y divide-stone-50 cart-list-container">
                        <!-- Generado por JavaScript -->
                    </div>

                    <!-- Footer del Contenedor de Items -->
                    <div class="p-8 bg-stone-50/50 border-t border-stone-100 flex justify-between items-center">
                        <a href="{{ url('/tienda/catalogo_general') }}" class="text-[10px] font-black uppercase text-stone-400 hover:text-black transition-all flex items-center gap-3 group tracking-[0.3em] italic">
                            <span class="material-symbols-outlined text-sm transition-transform group-hover:-translate-x-1">arrow_back</span>
                            Regresar a Inventario
                        </a>
                    </div>
                </div>
            </div>

            <!-- Panel de Cierre (Order Summary) -->
            <div class="lg:col-span-4 space-y-8">
                <!-- Summary Card -->
                <div class="bg-black text-white rounded-[40px] p-10 relative overflow-hidden shadow-2xl border border-white/5">
                    <div class="absolute -right-12 -top-12 opacity-[0.03] pointer-events-none">
                        <span class="material-symbols-outlined text-[180px]">receipt_long</span>
                    </div>

                    <h3 class="font-headline text-3xl font-black uppercase tracking-tighter mb-10 relative z-10 flex items-center gap-3 italic">
                        <span class="w-2 h-8 bg-primary rounded-full"></span>
                        Liquidación
                    </h3>

                    <div class="space-y-6 mb-12 relative z-10">
                        <div class="flex justify-between items-center text-[10px] text-stone-500 font-black uppercase tracking-[0.3em]">
                            <span>Base de Inversión</span>
                            <span id="ui-subtotal" class="font-mono text-stone-100 text-[12px]">$0.00</span>
                        </div>
                        <div class="flex justify-between items-center text-[10px] text-stone-500 font-black uppercase tracking-[0.3em]">
                            <span>Cálculo Fiscal (16% IVA)</span>
                            <span id="ui-iva" class="font-mono text-stone-100 text-[12px]">$0.00</span>
                        </div>
                        <div class="pt-8 border-t border-white/10">
                            <div class="flex justify-between items-start">
                                <div class="flex flex-col">
                                    <span class="text-[10px] uppercase tracking-[0.4em] font-black text-primary mb-1 italic">Total Neto</span>
                                    <span class="text-[8px] text-stone-600 uppercase tracking-widest font-black font-mono">Dólares Estadounidenses (USD)</span>
                                </div>
                                <span id="ui-total" class="text-4xl font-headline font-black text-primary tracking-tighter italic">$0.00</span>
                            </div>
                        </div>
                    </div>

                    <a href="{{ url('/tienda/checkout') }}" class="w-full bg-primary text-black hover:bg-white hover:text-black font-black uppercase tracking-[0.3em] py-6 rounded-2xl transition-all relative z-10 shadow-2xl flex items-center justify-center gap-4 text-center text-[10px] active:scale-95 group italic">
                        <span class="material-symbols-outlined text-lg group-hover:rotate-12 transition-transform">point_of_sale</span>
                        Proceder al Checkout
                    </a>
                    
                    <p class="text-[9px] uppercase tracking-[0.2em] text-stone-600 text-center mt-6 relative z-10 font-black italic">
                        Acceso exclusivo para entidades registradas
                    </p>
                </div>
                
                <!-- Shipping Info -->
                <div class="bg-stone-50 rounded-[32px] p-8 border border-stone-200 shadow-sm relative overflow-hidden group">
                    <div class="flex items-center gap-4 mb-4">
                        <span class="material-symbols-outlined text-primary text-3xl italic">local_shipping</span>
                        <span class="font-black text-[12px] uppercase tracking-[0.2em] text-stone-900 italic">Despacho Logístico</span>
                    </div>
                    <p class="text-[11px] font-bold text-stone-500 uppercase tracking-tight leading-relaxed">Sincronización nacional en <span class="text-stone-900">2-4 días hábiles</span>. Cobertura total bajo protocolos de seguridad Zenith.</p>
                </div>
                
                <!-- Security Badge -->
                <div class="bg-white rounded-3xl p-6 flex items-center gap-5 border border-stone-100 italic shadow-sm hover:shadow-md transition-shadow">
                    <span class="material-symbols-outlined text-stone-300 text-3xl">verified</span>
                    <div>
                        <p class="text-[10px] font-black uppercase tracking-[0.2em] text-stone-900">Transacción Blindada</p>
                        <p class="text-[9px] font-bold text-stone-400 uppercase tracking-widest">Protocolo de Cifrado AES-256</p>
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
        <div class="grid grid-cols-12 gap-6 p-8 items-center hover:bg-stone-50/50 transition-all border-l-8 border-transparent hover:border-primary group" data-id="${item.id}" style="animation-delay: ${index * 0.05}s">
            <!-- Imagen y Nombre -->
            <div class="col-span-6 md:col-span-5 flex items-center gap-8">
                <div class="w-24 h-24 bg-white rounded-[24px] flex-shrink-0 border border-stone-200 flex items-center justify-center p-4 relative group overflow-hidden shadow-lg transition-all hover:scale-105">
                    ${item.image 
                        ? '<img src="' + item.image + '" class="w-full h-full object-contain mix-blend-multiply group-hover:scale-110 transition-transform" alt="' + item.name + '">' 
                        : '<span class="material-symbols-outlined text-4xl text-stone-200">settings_input_component</span>'
                    }
                    <button onclick="Cart.remove(${item.id}); renderCartItems();" class="absolute inset-0 bg-stone-950/95 text-primary opacity-0 group-hover:opacity-100 transition-all flex flex-col items-center justify-center gap-2 backdrop-blur-sm">
                        <span class="material-symbols-outlined text-2xl italic">cancel</span>
                        <span class="text-[9px] font-black uppercase tracking-[0.3em] italic">Anular</span>
                    </button>
                </div>
                <div class="flex flex-col gap-2">
                    <span class="text-[10.5px] font-mono font-black text-stone-400 bg-stone-100 px-3 py-1 rounded-full border border-stone-200 w-fit uppercase tracking-tighter">REF-OEM: ${item.ref || 'IDENTIFICACIÓN PENDIENTE'}</span>
                    <span class="text-[14px] font-black text-stone-900 uppercase tracking-tighter leading-none italic group-hover:text-primary transition-colors">${item.name || 'COMPONENTE INDUSTRIAL ZENITH'}</span>
                </div>
            </div>
            
            <!-- Precio Unitario -->
            <div class="col-span-3 hidden md:flex items-center justify-center">
                <span class="text-[12px] font-mono font-black text-stone-400 tracking-tighter group-hover:text-stone-900">$ ${parseFloat(item.price).toFixed(2)}</span>
            </div>
            
            <!-- Controles de Cantidad -->
            <div class="col-span-4 md:col-span-2">
                <div class="flex items-center justify-between bg-stone-100 rounded-2xl overflow-hidden p-1.5 shadow-inner border border-stone-200 w-32 mx-auto">
                    <button onclick="Cart.decrement(${item.id}); renderCartItems();" class="w-10 h-10 flex items-center justify-center text-stone-400 hover:bg-stone-900 hover:text-white rounded-xl transition-all active:scale-90">
                        <span class="material-symbols-outlined text-sm font-black italic">remove</span>
                    </button>
                    <span class="text-[12px] font-black text-stone-950 w-10 text-center italic">${item.qty || 1}</span>
                    <button onclick="Cart.increment(${item.id}); renderCartItems();" class="w-10 h-10 flex items-center justify-center text-stone-400 hover:bg-stone-900 hover:text-white rounded-xl transition-all active:scale-90">
                        <span class="material-symbols-outlined text-sm font-black italic">add</span>
                    </button>
                </div>
            </div>
            
            <!-- Subtotal -->
            <div class="col-span-2 text-right">
                <span class="text-[12px] font-mono font-black text-stone-950 block tracking-tighter italic group-hover:scale-110 transition-transform origin-right">$ ${((item.price || 0) * (item.qty || 1)).toFixed(2)}</span>
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