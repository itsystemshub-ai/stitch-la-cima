<!DOCTYPE html>
<html class="light" lang="es">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Punto de Venta | Mayor de Repuesto La Cima, C.A.</title>
    <!-- CRSF Token para la seguridad de Laravel HTTP POST -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script src="/frontend/public/erp/js/pos.js"></script>
    <link rel="stylesheet" href="/frontend/public/erp/css/pos.css">
</head>
<body class="bg-background text-on-surface selection:bg-primary/30 h-screen flex overflow-hidden">

<!-- Sidebar -->
<aside class="w-64 bg-black border-r border-outline flex flex-col z-50">
    <div class="p-8">
        <div class="flex items-center gap-2 mb-1">
            <img src="/frontend/assets/images/logo.png" alt="Logo" class="h-8 w-auto brightness-0 invert">
            <span class="text-xl font-black text-white italic tracking-tighter uppercase leading-none mt-1">LA CIMA <span class="font-bold not-italic block text-[9px] tracking-[0.2em] mt-1 text-white/60">| Mayor de Repuesto La Cima, C.A.</span></span>
        </div>
        <p class="text-xs font-black text-primary/60 tracking-[0.3em] mt-1 pl-1">TERMINAL OPERATIVE</p>
    </div>

    <nav class="flex-1 px-4 space-y-1">
        <a href="{{ url('/dashboard') }}" class="flex items-center gap-4 px-4 py-3 text-on-surface-variant hover:text-primary hover:bg-white/5 transition-all font-bold text-xs uppercase tracking-widest">
            <span class="material-symbols-outlined text-lg">dashboard</span> Dashboard
        </a>
        <a href="#" class="flex items-center gap-4 px-4 py-3 bg-primary text-black font-black text-xs uppercase tracking-widest">
            <span class="material-symbols-outlined text-lg">add_shopping_cart</span> New Sale
        </a>
        <a href="#" class="flex items-center gap-4 px-4 py-3 text-on-surface-variant hover:text-primary hover:bg-white/5 transition-all font-bold text-xs uppercase tracking-widest">
            <span class="material-symbols-outlined text-lg">history</span> Sales History
        </a>
    </nav>

    <div class="p-6 border-t border-outline space-y-4">
        <button class="w-full bg-primary text-black font-black py-4 text-[10px] uppercase tracking-[0.2em] hover:bg-white transition-all shadow-lg">Initiate Sale</button>
    </div>
</aside>

<!-- Main Terminal -->
<div class="flex-1 flex flex-col min-w-0">
    <!-- Header Controls -->
    <header class="bg-black/40 backdrop-blur-md border-b border-outline p-6 flex flex-col md:flex-row justify-between items-end gap-6">
        <div class="flex-1 max-w-2xl">
            <h2 class="text-4xl font-black text-white uppercase tracking-tighter mb-6 leading-none">Terminal 04: <span class="text-primary-dim">New Transaction</span></h2>
            <div class="grid grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-xs font-black uppercase tracking-[0.2em] text-on-surface-variant">Product Entry (SKU / Name)</label>
                    <div class="flex items-center bg-surface border-l-4 border-primary px-4 py-3">
                        <span class="material-symbols-outlined text-primary text-lg mr-3">barcode_scanner</span>
                        <input class="bg-transparent border-none text-white w-full text-xs font-black uppercase tracking-widest placeholder-white/20" placeholder="Scan or type item..." type="text"/>
                    </div>
                </div>
                <div class="space-y-2">
                    <label class="text-xs font-black uppercase tracking-[0.2em] text-on-surface-variant">Customer Selection</label>
                    <div class="relative">
                        <!-- Advanced Logic Hooks: ID is explicitly assigned para conectarlo a la BBDD -->
                        <select id="checkoutCustomer" class="appearance-none bg-surface border border-outline text-white w-full py-3 px-4 text-xs font-black uppercase tracking-widest focus:ring-1 focus:ring-primary cursor-pointer">
                            <option value="1" class="bg-surface">Consumidor Final</option>
                            <option value="2" class="bg-surface">Transporte Carabobo</option>
                            <option value="3" class="bg-surface">Industrial Parts S.A.</option>
                            <option value="4" class="bg-surface">Constructora Master</option>
                        </select>
                        <span class="material-symbols-outlined absolute right-4 top-2.5 text-on-surface-variant pointer-events-none">expand_more</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex gap-4 mb-1">
            <button class="h-12 px-8 flex items-center justify-center gap-3 bg-red-500/10 border border-red-500/20 text-red-500 font-black uppercase text-[10px] tracking-widest hover:bg-red-500 hover:text-white transition-all">
                <span class="material-symbols-outlined text-lg">delete</span> Cancel
            </button>
        </div>
    </header>

    <div class="flex-1 flex overflow-hidden">
        <!-- Transaction Table -->
        <div class="flex-1 p-8 overflow-y-auto custom-scrollbar">
            <div class="bg-surface border border-outline mb-10 shadow-2xl">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-black">
                            <th class="p-6 text-xs font-black text-on-surface-variant uppercase tracking-[0.2em] border-b border-outline">Part Identification</th>
                            <th class="p-6 text-xs font-black text-on-surface-variant uppercase tracking-[0.2em] border-b border-outline text-center">Qty</th>
                            <th class="p-6 text-xs font-black text-on-surface-variant uppercase tracking-[0.2em] border-b border-outline text-right">Unit Price</th>
                            <th class="p-6 text-xs font-black text-on-surface-variant uppercase tracking-[0.2em] border-b border-outline text-right">Subtotal</th>
                            <th class="p-6 w-12 border-b border-outline"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-outline">
                        <!-- Item Simulation for Advanced Processing demo -->
                        <tr class="hover:bg-black/40 transition-colors group checkout-item" data-id="1" data-price="142.50" data-qty="4">
                            <td class="p-6">
                                <div class="flex items-center gap-6">
                                    <div class="w-12 h-12 bg-black border border-outline flex items-center justify-center text-primary">
                                        <span class="material-symbols-outlined">settings_input_component</span>
                                    </div>
                                    <div>
                                        <p class="text-sm font-black text-white uppercase tracking-tight">Cummins Gasket</p>
                                        <p class="text-xs text-on-surface-variant font-black uppercase tracking-[0.2em] mt-1">SKU: CU-982-GK</p>
                                    </div>
                                </div>
                            </td>
                            <td class="p-6 text-center text-sm font-black text-primary tracking-widest">04</td>
                            <td class="p-6 text-right text-sm font-black text-on-surface-variant tracking-tighter">$ 142.50</td>
                            <td class="p-6 text-right text-sm font-black text-white tracking-widest">$ 570.00</td>
                            <td class="p-6"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Checkout Sidebar -->
        <aside class="w-96 bg-black border-l border-outline p-10 flex flex-col">
            <div class="mt-auto space-y-10">
                <div class="bg-primary/5 border-l-8 border-primary p-8 shadow-2xl">
                    <p class="text-xs font-black text-primary uppercase tracking-[0.3em] mb-3">Grand Total Due</p>
                    <p class="text-6xl font-black text-white tracking-tighter">$ 570.00</p>
                </div>
                
                <div class="space-y-4">
                    <button id="processSaleBtn" class="w-full h-20 bg-primary text-black font-black text-base uppercase tracking-[0.3em] shadow-[0_0_50px_rgba(206,255,94,0.15)] hover:bg-white transition-all transform active:scale-95">
                        Process Sale
                    </button>
                    <!-- Loading alert para Advanced Functions -->
                    <div id="checkoutStatus" class="hidden text-xs text-center uppercase tracking-widest mt-2 p-2 w-full font-bold"></div>
                </div>
            </div>
        </aside>
    </div>
</div>

<!-- Background Elements -->
<div class="fixed inset-0 pointer-events-none opacity-[0.02] z-[-1]" style="background-image: radial-gradient(#ceff5e 1px, transparent 1px); background-size: 40px 40px;"></div>

<!-- JS Avanzado para Checkout Integrado (Laravel Endpoint) -->
<script>
document.getElementById('processSaleBtn').addEventListener('click', async function() {
    const btn = this;
    const statusBox = document.getElementById('checkoutStatus');
    
    // UI Feedback
    btn.disabled = true;
    btn.innerHTML = 'PROCESANDO...';
    btn.classList.add('opacity-50');
    statusBox.classList.remove('hidden', 'text-red-500', 'bg-red-500/10');
    statusBox.classList.add('text-primary');
    statusBox.innerHTML = 'Ejecutando Transacción Atómica...';

    // Construir Payload Estricto para el Controlador Avanzado de Laravel
    const payload = {
        customer_id: document.getElementById('checkoutCustomer').value, // ID del <select>
        vendedor_id: 1, // ID simulación admin
        items: []
    };

    document.querySelectorAll('.checkout-item').forEach(row => {
        payload.items.push({
            product_id: row.dataset.id,
            cantidad: row.dataset.qty,
            precio_unitario: row.dataset.price
        });
    });

    try {
        const response = await fetch('/api/erp/invoice/checkout', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                // CSRF Protection habilitada en Laravel
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify(payload)
        });

        const data = await response.json();

        if (!response.ok) {
            throw new Error(data.message || data.error || 'Error Transaccional de BD');
        }

        // Success - Visualmente brutal y contudente
        statusBox.classList.remove('text-primary');
        statusBox.classList.add('text-black', 'bg-primary');
        statusBox.innerHTML = `Venta Guardada (Nro: ${data.data.numero_orden}). Stock deducido estrictamente.`;
        btn.innerHTML = 'VENTA EXITOSA';

    } catch (error) {
        statusBox.classList.remove('text-primary');
        statusBox.classList.add('text-red-500', 'bg-red-500/10');
        statusBox.innerHTML = `ERROR: ${error.message}`;
        btn.innerHTML = 'INTENTAR NUEVAMENTE';
        btn.classList.remove('opacity-50');
        btn.disabled = false;
    }
});
</script>

</body>
</html>
