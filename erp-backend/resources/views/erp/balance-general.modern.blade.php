<!DOCTYPE html>
<html class="light" lang="es"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta name="description" content="Balance General | Mayor de Repuesto La Cima, C.A."/>
<meta name="theme-color" content="#ceff5e">
<title>Balance General | ERP La Cima</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300..700&family=Inter:wght@300..700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<link rel="stylesheet" href="css/common.css">
<link rel="stylesheet" href="css/premium-erp.css">
<script>
  tailwind.config = {
    darkMode: "class",
    theme: {
      extend: {
        colors: { primary: "#ceff5e", secondary: "#1c1c1c", background: "#f8fafc", surface: "#ffffff", outline: "#e2e8f0" },
        fontFamily: { headline: ["League Spartan", "sans-serif"], body: ["Inter", "sans-serif"] }
      }
    }
  }
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
                <a href="{{ url('/erp/' . 'contabilidad') }}" class="hover:text-primary">Contabilidad</a>
                <span>/</span>
                <span class="text-stone-900">Balance General</span>
            </nav>
            <h2 class="text-3xl font-headline font-black text-stone-900 tracking-tight">BALANCE GENERAL</h2>
            <p class="text-stone-500 text-sm">Estado de situación financiera detallado.</p>
        </div>
        <div class="flex gap-3">
            <button class="bg-stone-900 text-white px-4 py-2 rounded-lg text-xs font-bold flex items-center gap-2">
                <span class="material-symbols-outlined text-sm text-primary">print</span>
                Exportar Reporte
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="premium-card">
            <h3 class="font-bold text-stone-900 mb-6 flex items-center gap-2"><span class="material-symbols-outlined text-blue-600">account_balance</span> ACTIVO</h3>
            <div class="space-y-4">
                <div class="flex justify-between items-center py-2 border-b border-stone-100"><span class="text-xs font-bold uppercase">Activo Corriente</span><span class="font-bold text-stone-900">$ 145,200.00</span></div>
                <div class="flex justify-between items-center py-2 border-b border-stone-100 font-medium text-stone-600 text-xs pl-4"><span>Efectivo y Equivalentes</span><span>$ 85,200.00</span></div>
                <div class="flex justify-between items-center py-2 border-b border-stone-100 font-medium text-stone-600 text-xs pl-4"><span>Inventarios</span><span>$ 60,000.00</span></div>
                <div class="flex justify-between items-center py-2 border-b border-stone-100"><span class="text-xs font-bold uppercase">Activo No Corriente</span><span class="font-bold text-stone-900">$ 55,000.00</span></div>
            </div>
            <div class="mt-8 pt-4 border-t-2 border-stone-900 flex justify-between"><span class="font-black text-xs uppercase">Total Activo</span><span class="text-xl font-headline font-black">$ 200,200.00</span></div>
        </div>

        <div class="space-y-6">
            <div class="premium-card">
                <h3 class="font-bold text-stone-900 mb-6 flex items-center gap-2"><span class="material-symbols-outlined text-red-600">payments</span> PASIVO</h3>
                <div class="flex justify-between items-center py-2 border-b border-stone-100"><span class="text-xs font-bold uppercase">Pasivo Corriente</span><span class="font-bold text-stone-900">$ 45,200.00</span></div>
                <div class="mt-8 pt-4 border-t-2 border-stone-900 flex justify-between"><span class="font-black text-xs uppercase">Total Pasivo</span><span class="text-xl font-headline font-black">$ 45,200.00</span></div>
            </div>
            <div class="premium-card bg-stone-900 text-white">
                <h3 class="font-bold text-primary mb-6 flex items-center gap-2"><span class="material-symbols-outlined tracking-tight">stars</span> PATRIMONIO</h3>
                <div class="flex justify-between items-center py-2 border-b border-white/10 font-black"><span class="text-xs uppercase">Total Patrimonio</span><span class="text-xl font-headline font-black text-primary">$ 155,000.00</span></div>
            </div>
        </div>
    </div>
</main>
<script src="js/common.js"></script>
</body></html>
