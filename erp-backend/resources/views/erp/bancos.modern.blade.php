<!DOCTYPE html>
<html class="light" lang="es"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Maestro de Bancos | ERP La Cima</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300..900&family=Inter:wght@300..700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<link rel="stylesheet" href="css/common.css">
<link rel="stylesheet" href="css/premium-erp.css">
<script>
  tailwind.config = { darkMode: "class", theme: { extend: { colors: { primary: "#ceff5e", secondary: "#1c1c1c", background: "#f8fafc", surface: "#ffffff", outline: "#e2e8f0" }, fontFamily: { headline: ["League Spartan", "sans-serif"], body: ["Inter", "sans-serif"] } } } }
</script>
</head>
<body class="bg-background text-stone-900 min-h-screen">
<script src="js/zenith-identity.js"></script>
<script src="js/zenith-layout.js"></script>

<main class="ml-72 w-[calc(100vw-288px)] mt-[65px] p-6">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4 mb-8">
        <div>
            <nav class="flex gap-2 text-[10px] font-bold text-stone-400 uppercase tracking-widest mb-2">
                <a href="{{ url('/erp/' . 'inicio') }}" class="hover:text-primary">Dashboard</a>
                <span>/</span>
                <span class="text-stone-900">Maestros</span>
                <span>/</span>
                <span class="text-stone-900">Bancos</span>
            </nav>
            <h2 class="text-3xl font-headline font-black text-stone-900 tracking-tight">BANCOS Y CAJAS</h2>
            <p class="text-stone-500 text-sm">Conciliación bancaria y gestión de flujos de efectivo.</p>
        </div>
        <button class="bg-stone-900 text-white px-6 py-2.5 rounded-lg text-xs font-black uppercase tracking-widest flex items-center gap-2 hover:bg-black transition-all">
            <span class="material-symbols-outlined text-sm text-primary">account_balance</span>
            Registrar Cuenta
        </button>
    </div>

    <!-- Cuentas Bancarias Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Mercantil -->
        <div class="premium-card">
            <div class="flex justify-between items-start mb-4">
                <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center overflow-hidden">
                    <span class="text-white font-black text-lg italic">M</span>
                </div>
                <span class="px-2 py-0.5 bg-green-100 text-green-700 text-[8px] font-black uppercase rounded">Principal</span>
            </div>
            <p class="text-[10px] font-bold text-stone-400 uppercase">Banco Mercantil</p>
            <h4 class="text-lg font-black text-stone-900 mb-1">CUENTA CORRIENTE B2B</h4>
            <p class="text-[10px] font-mono text-stone-400 mb-4 italic">0105-0045-XX-XXXXXXXXXX</p>
            <div class="pt-4 border-t border-stone-100 flex justify-between items-end">
                <p class="text-[10px] font-bold text-stone-500 uppercase">Saldo Disponible</p>
                <p class="text-2xl font-black font-headline text-stone-900">$ 45,200.00</p>
            </div>
        </div>

        <!-- Banesco -->
        <div class="premium-card">
            <div class="flex justify-between items-start mb-4">
                <div class="w-12 h-12 bg-green-600 rounded-lg flex items-center justify-center overflow-hidden">
                    <span class="text-white font-black text-lg italic">B</span>
                </div>
            </div>
            <p class="text-[10px] font-bold text-stone-400 uppercase">Banesco Banco Universal</p>
            <h4 class="text-lg font-black text-stone-900 mb-1">CAJA DE AHORROS PV</h4>
            <p class="text-[10px] font-mono text-stone-400 mb-4 italic">0134-8845-XX-XXXXXXXXXX</p>
            <div class="pt-4 border-t border-stone-100 flex justify-between items-end">
                <p class="text-[10px] font-bold text-stone-500 uppercase">Saldo Disponible</p>
                <p class="text-2xl font-black font-headline text-stone-900">$ 12,300.25</p>
            </div>
        </div>

        <!-- Cajera Central -->
        <div class="premium-card bg-stone-900 text-white border-primary/20">
            <div class="flex justify-between items-start mb-4">
                <div class="w-12 h-12 bg-primary rounded-lg flex items-center justify-center">
                    <span class="material-symbols-outlined text-stone-900">payments</span>
                </div>
            </div>
            <p class="text-[10px] font-bold text-stone-500 uppercase">Control Interno</p>
            <h4 class="text-lg font-black text-primary mb-1 uppercase tracking-tighter">CAJA CHICA VALENCIA</h4>
            <p class="text-[10px] font-mono text-stone-600 mb-4 italic">REF: ZN-CCH-01</p>
            <div class="pt-4 border-t border-white/10 flex justify-between items-end">
                <p class="text-[10px] font-bold text-stone-500 uppercase">Fondo actual</p>
                <p class="text-2xl font-black font-headline text-white">$ 1,450.00</p>
            </div>
        </div>
    </div>

    <!-- Movimientos Recientes -->
    <div class="data-table-container">
        <div class="p-4 border-b border-stone-100 bg-stone-50 flex justify-between items-center">
            <h3 class="text-xs font-black uppercase tracking-widest text-stone-500 italic">Últimos Movimientos de Tesorería</h3>
            <button class="text-[10px] font-bold text-stone-400 hover:text-stone-900 transition-colors uppercase">Ver Historial Completo</button>
        </div>
        <table class="data-table">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Referencia</th>
                    <th>Concepto</th>
                    <th>Banco / Caja</th>
                    <th class="text-right">Monto</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-stone-100">
                <tr>
                    <td class="text-xs">10/04/2026</td>
                    <td class="font-mono text-[10px] text-stone-400">#TRF-99234</td>
                    <td class="text-xs font-bold text-stone-700">Pago de Nómina - Quincena 01 Abr</td>
                    <td class="text-xs text-stone-500 italic">Banco Mercantil</td>
                    <td class="text-right font-black text-red-600">-$ 4,500.00</td>
                </tr>
                <tr>
                    <td class="text-xs">09/04/2026</td>
                    <td class="font-mono text-[10px] text-stone-400">#DEP-88401</td>
                    <td class="text-xs font-bold text-stone-700">Depósito Venta POS - Turno Tarde</td>
                    <td class="text-xs text-stone-500 italic">Banesco</td>
                    <td class="text-right font-black text-green-600">+$ 1,250.00</td>
                </tr>
            </tbody>
        </table>
    </div>
</main>
<script src="js/common.js"></script>
</body></html>
