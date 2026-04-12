<!DOCTYPE html>
<html class="light" lang="es">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta name="description" content="Gestión de Clientes B2B | Mayor de Repuesto La Cima, C.A."/>
    <title>Clientes | Mayor de Repuesto La Cima, C.A.</title>
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
                <p class="text-[10px] font-bold text-stone-400 tracking-[0.2em] uppercase mb-1">Red Comercial B2B</p>
                <h2 class="text-3xl font-headline font-black text-stone-900 tracking-tight text-uppercase">CARTERA DE CLIENTES</h2>
                <div class="flex items-center gap-2 mt-1">
                    <span class="flex items-center gap-1 text-[10px] font-bold text-green-600 bg-green-50 px-2 py-0.5 rounded-full">
                        <span class="material-symbols-outlined text-[12px]">group</span>
                        1,248 CUENTAS ACTIVAS
                    </span>
                </div>
            </div>
            <div class="flex gap-2">
                <button class="bg-stone-900 text-white px-5 py-2.5 rounded-xl font-bold text-xs uppercase shadow-premium hover:brightness-110 transition-all flex items-center gap-2">
                    <span class="material-symbols-outlined text-sm">person_add</span>
                    Registrar Nuevo Cliente
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-5 mb-8">
            <div class="premium-card">
                <p class="text-stone-400 text-[10px] font-bold uppercase tracking-widest mb-2">Clientes Premium</p>
                <h4 class="text-3xl font-headline font-black text-stone-900">84</h4>
            </div>
            <div class="premium-card border-l-4 border-l-stone-900">
                <p class="text-stone-400 text-[10px] font-bold uppercase tracking-widest mb-2">Ventas Proyectadas</p>
                <h4 class="text-3xl font-headline font-black text-stone-900">$425K</h4>
            </div>
            <div class="premium-card">
                <p class="text-stone-400 text-[10px] font-bold uppercase tracking-widest mb-2">Cobranza en Curso</p>
                <h4 class="text-3xl font-headline font-black text-stone-900">$18,450</h4>
            </div>
            <div class="premium-card border-l-4 border-l-red-500 bg-red-50/10">
                <p class="text-red-400 text-[10px] font-bold uppercase tracking-widest mb-2">Cuentas en Mora</p>
                <h4 class="text-3xl font-headline font-black text-red-600">03</h4>
            </div>
        </div>

        <div class="premium-card p-0 overflow-hidden">
            <div class="px-6 py-5 border-b border-stone-100 flex justify-between items-center bg-stone-50/50">
                <h3 class="text-sm font-bold text-stone-900 uppercase tracking-widest">Listado Maestro de Clientes</h3>
                <input type="text" placeholder="Buscar por RIF, Razón Social..." class="w-64 bg-white border border-stone-200 text-xs px-4 py-2 rounded-xl focus:ring-2 focus:ring-primary/50 outline-none">
            </div>
            <div class="data-table-container border-none rounded-none">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th class="pl-6">Cliente & RIF</th>
                            <th>Tipo / Categoría</th>
                            <th>Crédito Límite</th>
                            <th>Saldo Deudor</th>
                            <th>Última Compra</th>
                            <th class="pr-6 text-center">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="pl-6 py-4">
                                <p class="text-sm font-black text-stone-900">Autopartes El Parral C.A.</p>
                                <p class="text-[10px] font-mono text-stone-400 uppercase tracking-tighter">RIF: J-30492812-1</p>
                            </td>
                            <td><span class="text-[9px] font-black bg-stone-100 px-2 py-0.5 rounded text-stone-500 uppercase">TALLER ESPECIALIZADO</span></td>
                            <td class="font-bold text-stone-900">$15,000.00</td>
                            <td class="font-bold text-stone-400">$0.00</td>
                            <td class="text-xs text-stone-500">28/03/2026</td>
                            <td class="pr-6 text-center"><span class="badge-premium badge-success font-bold">SOLVENTE</span></td>
                        </tr>
                        <tr>
                            <td class="pl-6 py-4">
                                <p class="text-sm font-black text-stone-900">Transporte Logístico Global</p>
                                <p class="text-[10px] font-mono text-stone-400 uppercase tracking-tighter">RIF: J-40283129-4</p>
                            </td>
                            <td><span class="text-[9px] font-black bg-primary/10 px-2 py-0.5 rounded text-primary-dim uppercase">FLOTA NACIONAL</span></td>
                            <td class="font-bold text-stone-900">$45,000.00</td>
                            <td class="font-bold text-red-600">$8,400.20</td>
                            <td class="text-xs text-stone-500">14/03/2026</td>
                            <td class="pr-6 text-center"><span class="badge-premium badge-warning font-bold">CRÉDITO VENCIDO</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-8 pt-4 border-t border-stone-100 flex justify-between items-center text-[10px] font-bold text-stone-400 uppercase tracking-widest">
            <span class="entity-rif">RIF: J-40308741-5</span>
            <span class="entity-name">Mayor de Repuesto La Cima, C.A.</span>
        </div>

    </main>

    <div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden"></div>

</body>
</html>
