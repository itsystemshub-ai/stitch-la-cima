<!DOCTYPE html>
<html class="light" lang="es">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Punto de Venta | Mayor de Repuesto La Cima, C.A.</title>
    <!-- CRSF Token para la seguridad de Laravel HTTP POST -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&family=Sora:wght@100..800&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: { 
                primary: "#B3D92B", 
                "primary-hover": "#C1D96A",
                "primary-soft": "#C9D98F",
                background: "#F2F2F2", 
                surface: "#ffffff", 
                outline: "#e2e2e5",
                "text-dark": "#0D0D0D"
            },
            fontFamily: { headline: ["Outfit", "sans-serif"], body: ["Sora", "sans-serif"] }
          }
        }
      }
    </script>
    <style>
        body { font-family: 'Sora', sans-serif; }
        h1, h2, h3, h4, h5, h6, .font-headline { font-family: 'Outfit', sans-serif; }
        .bg-text-dark { background-color: #0D0D0D; }
    </style>
    <script src="/frontend/public/erp/js/pos.js"></script>
    <link rel="stylesheet" href="/frontend/public/erp/css/pos.css">
</head>
<body class="bg-background text-text-dark selection:bg-primary/30 h-screen flex overflow-hidden">

<!-- Sidebar -->
<aside class="w-64 bg-text-dark border-r border-outline flex flex-col z-50">
    <div class="p-8">
        <div class="flex items-center gap-2 mb-1">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="h-8 w-auto brightness-0 invert">
            <span class="text-xl font-headline font-black text-white italic tracking-tighter uppercase leading-none mt-1">ZENITH <span class="text-primary not-italic">V1.0</span></span>
        </div>
        <p class="text-[9px] font-black text-primary/60 tracking-[0.3em] mt-1 pl-1 uppercase font-headline">Terminal Operative</p>
    </div>

    <nav class="flex-1 px-4 space-y-1">
        <a href="{{ url('/dashboard') }}" class="flex items-center gap-4 px-4 py-3 text-white/60 hover:text-primary hover:bg-white/5 transition-all font-bold text-[10px] uppercase tracking-widest">
            <span class="material-symbols-outlined text-lg">dashboard</span> Dashboard
        </a>
        <a href="#" class="flex items-center gap-4 px-4 py-3 bg-primary text-text-dark font-black text-[10px] uppercase tracking-widest shadow-[0_0_20px_rgba(179,217,43,0.2)]">
            <span class="material-symbols-outlined text-lg">add_shopping_cart</span> New Sale
        </a>
        <a href="#" class="flex items-center gap-4 px-4 py-3 text-white/60 hover:text-primary hover:bg-white/5 transition-all font-bold text-[10px] uppercase tracking-widest">
            <span class="material-symbols-outlined text-lg">history</span> Sales History
        </a>
    </nav>

    <div class="p-6 border-t border-white/10 space-y-4">
        <button class="w-full bg-primary text-text-dark font-black py-4 text-[10px] uppercase tracking-[0.2em] hover:bg-white transition-all shadow-lg">Initiate Sale</button>
    </div>
</aside>

<!-- Main Terminal -->
<div class="flex-1 flex flex-col min-w-0">
    <!-- Header Controls -->
    <header class="bg-text-dark/95 backdrop-blur-md border-b border-white/10 p-6 flex flex-col md:flex-row justify-between items-end gap-6 shadow-xl">
        <div class="flex-1 max-w-2xl">
            <h2 class="text-4xl font-headline font-black text-white uppercase tracking-tighter mb-6 leading-none">Terminal 01: <span class="text-primary">Nueva Factura</span></h2>
            <div class="grid grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-[9px] font-black uppercase tracking-[0.2em] text-white/40">Entrada de Repuesto (SKU / OEM)</label>
                    <div class="flex items-center bg-white/5 border-l-4 border-primary px-4 py-3">
                        <span class="material-symbols-outlined text-primary text-lg mr-3">barcode_scanner</span>
                        <input class="bg-transparent border-none text-white w-full text-xs font-bold uppercase tracking-widest placeholder-white/20 focus:ring-0" placeholder="Escanear o escribir..." type="text"/>
                    </div>
                </div>
                <div class="space-y-2">
                    <label class="text-[9px] font-black uppercase tracking-[0.2em] text-white/40">Selección de Cliente</label>
                    <div class="relative">
                        <select id="checkoutCustomer" class="appearance-none bg-white/5 border border-white/10 text-white w-full py-3 px-4 text-xs font-black uppercase tracking-widest focus:ring-1 focus:ring-primary cursor-pointer">
                            <option value="1" class="bg-text-dark">Consumidor Final</option>
                            <option value="2" class="bg-text-dark">Transporte Carabobo, C.A.</option>
                            <option value="3" class="bg-text-dark">Industrial Parts S.A.</option>
                        </select>
                        <span class="material-symbols-outlined absolute right-4 top-2.5 text-white/40 pointer-events-none">expand_more</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex gap-4 mb-1">
            <button class="h-12 px-8 flex items-center justify-center gap-3 bg-red-500/10 border border-red-500/20 text-red-500 font-black uppercase text-[10px] tracking-widest hover:bg-red-500 hover:text-white transition-all">
                <span class="material-symbols-outlined text-lg">delete</span> Cancelar
            </button>
        </div>
    </header>

    <div class="flex-1 flex overflow-hidden">
        <!-- Transaction Table -->
        <div class="flex-1 p-8 overflow-y-auto custom-scrollbar">
            <div class="bg-white border border-stone-200 mb-10 shadow-2xl rounded-xl overflow-hidden">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-stone-50 border-b border-stone-200">
                            <th class="p-6 text-[10px] font-black text-stone-400 uppercase tracking-[0.2em]">Identificación del Repuesto</th>
                            <th class="p-6 text-[10px] font-black text-stone-400 uppercase tracking-[0.2em] text-center">Cant.</th>
                            <th class="p-6 text-[10px] font-black text-stone-400 uppercase tracking-[0.2em] text-right">Precio Unitario</th>
                            <th class="p-6 text-[10px] font-black text-stone-400 uppercase tracking-[0.2em] text-right">Subtotal</th>
                            <th class="p-6 w-12"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-stone-100 font-body">
                        <!-- Venta Demo conectada por Seeder -->
                        <tr class="hover:bg-stone-50 transition-colors group checkout-item" data-id="1" data-price="142.50" data-qty="2">
                            <td class="p-6">
                                <div class="flex items-center gap-6">
                                    <div class="w-12 h-12 bg-white border border-stone-200 flex items-center justify-center text-primary shadow-sm rounded-lg">
                                        <span class="material-symbols-outlined">settings_input_component</span>
                                    </div>
                                    <div>
                                        <p class="text-sm font-black text-text-dark uppercase tracking-tight font-headline">Filtro Cummins LF9009</p>
                                        <p class="text-[9px] text-stone-400 font-bold uppercase tracking-[0.2em] mt-1">SKU: LC-102 | OEM: LF9009</p>
                                    </div>
                                </div>
                            </td>
                            <td class="p-6 text-center text-sm font-black text-primary tracking-widest">02</td>
                            <td class="p-6 text-right text-sm font-bold text-stone-400 tracking-tighter">$ 142.50</td>
                            <td class="p-6 text-right text-sm font-black text-text-dark tracking-widest">$ 285.00</td>
                            <td class="p-6"></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Contextual Actions -->
            <div class="grid grid-cols-4 gap-4">
                <button class="p-6 border border-dashed border-stone-300 hover:border-primary hover:bg-primary/5 transition-all flex flex-col items-center gap-3 group rounded-xl">
                    <span class="material-symbols-outlined text-stone-400 group-hover:text-primary transition-colors">barcode</span>
                    <span class="text-[9px] font-black uppercase tracking-[0.2em] text-stone-400">Entrada Rápida OEM</span>
                </button>
                <button class="p-6 border border-dashed border-stone-300 hover:border-primary hover:bg-primary/5 transition-all flex flex-col items-center gap-3 group rounded-xl">
                    <span class="material-symbols-outlined text-stone-400 group-hover:text-primary transition-colors">sell</span>
                    <span class="text-[9px] font-black uppercase tracking-[0.2em] text-stone-400">Aplicar Descuento</span>
                </button>
                <button class="p-6 border border-dashed border-stone-300 hover:border-primary hover:bg-primary/5 transition-all flex flex-col items-center gap-3 group rounded-xl">
                    <span class="material-symbols-outlined text-stone-400 group-hover:text-primary transition-colors">inventory_2</span>
                    <span class="text-[9px] font-black uppercase tracking-[0.2em] text-stone-400">Consultar Stock</span>
                </button>
                <button class="p-6 border border-dashed border-stone-300 hover:border-primary hover:bg-primary/5 transition-all flex flex-col items-center gap-3 group rounded-xl">
                    <span class="material-symbols-outlined text-stone-400 group-hover:text-primary transition-colors">history</span>
                    <span class="text-[9px] font-black uppercase tracking-[0.2em] text-stone-400">Repetir Venta</span>
                </button>
            </div>
        </div>

        <!-- Checkout Sidebar -->
        <aside class="w-96 bg-text-dark border-l border-white/10 p-10 flex flex-col shadow-2xl">
            <div class="mb-10 text-center">
                <p class="text-[10px] font-black text-primary/40 uppercase tracking-[0.4em] mb-4">Zenith V1.0 Footer</p>
                <p class="text-[9px] font-bold text-white/20 uppercase tracking-[0.2em]">© 2026 ZENITH V1.0 TODOS LOS DERECHOS RESERVADOS.</p>
            </div>

            <div class="mt-auto space-y-8">
                <div class="bg-primary/5 border-l-8 border-primary p-8 shadow-2xl">
                    <p class="text-[10px] font-black text-primary uppercase tracking-[0.3em] mb-3 font-headline">Total a Pagar (USD)</p>
                    <p class="text-6xl font-headline font-black text-white tracking-tighter">$ 285.00</p>
                </div>
                
                <div class="space-y-4">
                    <button id="processSaleBtn" class="w-full h-20 bg-primary text-text-dark font-black text-base uppercase tracking-[0.3em] shadow-[0_0_50px_rgba(179,217,43,0.15)] hover:bg-white transition-all transform active:scale-95 rounded-xl font-headline">
                        Procesar Venta
                    </button>
                    <!-- Loading alert para Advanced Functions -->
                    <div id="checkoutStatus" class="hidden text-[10px] text-center uppercase tracking-widest mt-2 p-3 w-full font-black rounded-lg"></div>
                </div>

                <div class="text-center pt-8 border-t border-white/10">
                    <p class="text-[9px] text-white/40 font-black uppercase tracking-[0.3em]">Operador: ADMIN_MASTER_01</p>
                </div>
            </div>
        </aside>
    </div>
</div>

<!-- Background Elements -->
<div class="fixed inset-0 pointer-events-none opacity-[0.05] z-[-1]" style="background-image: radial-gradient(#B3D92B 1px, transparent 1px); background-size: 30px 30px;"></div>

<script>
document.getElementById('processSaleBtn').addEventListener('click', async function() {
    const btn = this;
    const statusBox = document.getElementById('checkoutStatus');
    
    btn.disabled = true;
    btn.innerHTML = 'PROCESANDO...';
    btn.classList.add('opacity-50');
    statusBox.classList.remove('hidden', 'text-red-500', 'bg-red-500/10', 'bg-primary');
    statusBox.classList.add('text-primary', 'bg-white/5');
    statusBox.innerHTML = 'VALIDANDO TRANSACCIÓN...';

    const payload = {
        customer_id: document.getElementById('checkoutCustomer').value,
        vendedor_id: 1, 
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
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify(payload)
        });

        const data = await response.json();

        if (!response.ok) {
            throw new Error(data.message || 'Error en Facturación');
        }

        statusBox.classList.remove('text-primary', 'bg-white/5');
        statusBox.classList.add('text-text-dark', 'bg-primary');
        statusBox.innerHTML = `VENTA EXITOSA: ${data.data.numero_orden}`;
        btn.innerHTML = 'COMPLETADO';

    } catch (error) {
        statusBox.classList.remove('text-primary', 'bg-white/5');
        statusBox.classList.add('text-red-500', 'bg-red-500/10');
        statusBox.innerHTML = `ERROR: ${error.message}`;
        btn.innerHTML = 'REINTENTAR';
        btn.disabled = false;
        btn.classList.remove('opacity-50');
    }
});
</script>

</body>
</html>
