<!DOCTYPE html>
<html class="light" lang="es">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta name="description" content="Gestión de Adquisiciones | Mayor de Repuesto La Cima, C.A."/>
    <title>Compras | Mayor de Repuesto La Cima, C.A.</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300..700&family=Inter:wght@300..700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/premium-erp.css">
</head>
<body class="bg-background text-stone-900 min-h-screen">

    <script src="js/zenith-identity.js"></script>
    <script src="js/common.js"></script>
    <script src="js/zenith-layout.js"></script>
    <script src="js/zenith-data.js"></script>

    <main class="ml-[288px] w-[calc(100vw-288px)] mt-[65px] p-6 pb-4">
        
        <div class="flex justify-between items-end mb-8">
            <div>
                <p class="text-[10px] font-bold text-stone-400 tracking-[0.2em] uppercase mb-1">Cadena de Suministro</p>
                <h2 class="text-3xl font-headline font-black text-stone-900 tracking-tight text-uppercase">ÓRDENES DE COMPRA</h2>
                <div class="flex items-center gap-2 mt-1">
                    <span class="flex items-center gap-1 text-[10px] font-bold text-orange-600 bg-orange-50 px-2 py-0.5 rounded-full">
                        <span class="material-symbols-outlined text-[12px]">local_shipping</span>
                        3 TRÁNSITOS ACTIVOS
                    </span>
                </div>
            </div>
            <div class="flex gap-2">
                <button class="bg-stone-900 text-white px-5 py-2.5 rounded-xl font-bold text-xs uppercase shadow-premium hover:brightness-110 transition-all flex items-center gap-2">
                    <span class="material-symbols-outlined text-sm">add_shopping_cart</span>
                    Nueva Orden de Compra
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-5 mb-8">
            <div class="premium-card">
                <p class="text-stone-400 text-[10px] font-bold uppercase tracking-widest mb-2">Presupuesto Mes</p>
                <h4 class="text-3xl font-headline font-black text-stone-900">$250,000</h4>
            </div>
            <div class="premium-card border-l-4 border-l-stone-900">
                <p class="text-stone-400 text-[10px] font-bold uppercase tracking-widest mb-2">Gastos Ejecutados</p>
                <h4 class="text-3xl font-headline font-black text-stone-900">$142,800</h4>
            </div>
            <div class="premium-card">
                <p class="text-stone-400 text-[10px] font-bold uppercase tracking-widest mb-2">Pendiente Pago</p>
                <h4 class="text-3xl font-headline font-black text-red-600">$18,450</h4>
            </div>
            <div class="premium-card bg-primary/10">
                <p class="text-primary-dim text-[10px] font-black uppercase tracking-widest mb-2">Ahorro vs Last Month</p>
                <h4 class="text-3xl font-headline font-black text-stone-900">5.4%</h4>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2 premium-card p-0 overflow-hidden">
                <div class="px-6 py-4 border-b border-stone-100 flex justify-between items-center bg-stone-50/30">
                    <h3 class="text-sm font-bold text-stone-900 uppercase tracking-widest">Órdenes Recientes</h3>
                </div>
                <div class="data-table-container border-none rounded-none">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th class="pl-6">O.C. #</th>
                                <th>Proveedor</th>
                                <th>Monto Total</th>
                                <th>Estado</th>
                                <th class="pr-6">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="pl-6 py-4 font-bold text-stone-900 text-sm">OC-2026-001</td>
                                <td><span class="text-xs font-bold text-stone-500 uppercase">Cummins Marine Inc.</span></td>
                                <td class="font-bold text-stone-900">$54,200.00</td>
                                <td><span class="badge-premium badge-warning">EN CAMINO</span></td>
                                <td class="pr-6">
                                    <button class="p-1.5 hover:bg-stone-100 rounded-lg transition-colors">
                                        <span class="material-symbols-outlined text-stone-400 text-[18px]">visibility</span>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="pl-6 py-4 font-bold text-stone-900 text-sm">OC-2026-002</td>
                                <td><span class="text-xs font-bold text-stone-500 uppercase">Detroit Diesel Parts</span></td>
                                <td class="font-bold text-stone-900">$12,850.00</td>
                                <td><span class="badge-premium badge-success">RECIBIDO</span></td>
                                <td class="pr-6">
                                    <button class="p-1.5 hover:bg-stone-100 rounded-lg transition-colors">
                                        <span class="material-symbols-outlined text-stone-400 text-[18px]">verified</span>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="premium-card">
                <h3 class="text-sm font-bold text-stone-900 uppercase tracking-widest mb-6">Proveedores Top</h3>
                <div class="space-y-6">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-stone-100 rounded-xl flex items-center justify-center font-black text-stone-400">C</div>
                            <div>
                                <p class="text-xs font-black text-stone-900">Cummins USA</p>
                                <p class="text-[9px] text-stone-400 font-bold uppercase tracking-tighter italic">Importación Directa</p>
                            </div>
                        </div>
                        <span class="text-xs font-black text-stone-900">42 OC</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-stone-100 rounded-xl flex items-center justify-center font-black text-stone-400">V</div>
                            <div>
                                <p class="text-xs font-black text-stone-900">Volvo Group Latam</p>
                                <p class="text-[9px] text-stone-400 font-bold uppercase tracking-tighter italic">Distribuidor Regional</p>
                            </div>
                        </div>
                        <span class="text-xs font-black text-stone-900">28 OC</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8 pt-4 border-t border-stone-100 flex justify-between items-center text-[10px] font-bold text-stone-400">
            <span class="entity-rif">RIF: J-40308741-5</span>
            <span class="uppercase tracking-[0.2em]">Mayor de Repuesto La Cima, C.A.</span>
        </div>

    </main>

    <div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden"></div>

</body>
</html>
