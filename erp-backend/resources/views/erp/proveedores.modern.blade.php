<!DOCTYPE html>
<html class="light" lang="es"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Gestión de Proveedores | ERP La Cima</title>
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
                <span class="text-stone-900">Proveedores</span>
            </nav>
            <h2 class="text-3xl font-headline font-black text-stone-900 tracking-tight">PROVEEDORES</h2>
            <p class="text-stone-500 text-sm">Administración de la cadena de suministro.</p>
        </div>
        <button class="bg-stone-900 text-white px-6 py-2.5 rounded-lg text-xs font-black uppercase tracking-widest flex items-center gap-2 hover:bg-black transition-all">
            <span class="material-symbols-outlined text-sm text-primary">person_add</span>
            Nuevo Proveedor
        </button>
    </div>

    <!-- Busqueda y Filtros -->
    <div class="premium-card mb-6 flex gap-4">
        <div class="relative flex-1">
            <span class="absolute left-3 top-1/2 -translate-y-1/2 material-symbols-outlined text-stone-400">search</span>
            <input type="text" placeholder="Buscar por RIF, Nombre o Contacto..." class="w-full pl-10 pr-4 py-2 bg-stone-50 border border-stone-200 rounded-lg text-xs outline-none focus:ring-1 focus:ring-primary">
        </div>
        <select class="bg-stone-50 border border-stone-200 rounded-lg px-4 py-2 text-[10px] font-bold uppercase text-stone-500 outline-none">
            <option>Todos los Estados</option>
            <option>Nacionales</option>
            <option>Importados</option>
        </select>
    </div>

    <!-- Tabla de Proveedores -->
    <div class="data-table-container">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Empresa / RIF</th>
                    <th>Contacto</th>
                    <th>Teléfono / Email</th>
                    <th>Estatus</th>
                    <th class="text-right">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-stone-100">
                <tr>
                    <td>
                        <p class="font-bold text-stone-900">CUMMINS DE VENEZUELA, S.A.</p>
                        <p class="text-[10px] text-stone-400 font-mono italic">J-00045938-2</p>
                    </td>
                    <td class="text-xs">Ricardo Montilla</td>
                    <td>
                        <p class="text-xs">+58 241 850 4433</p>
                        <p class="text-[10px] text-blue-500">rmontilla@cummins.ve</p>
                    </td>
                    <td><span class="px-2 py-0.5 bg-green-100 text-green-700 text-[9px] font-black uppercase rounded-full">Activo</span></td>
                    <td class="text-right">
                        <div class="flex justify-end gap-2">
                            <button class="p-1.5 hover:bg-stone-100 rounded-md text-stone-400 hover:text-stone-900"><span class="material-symbols-outlined text-sm">edit</span></button>
                            <button class="p-1.5 hover:bg-stone-100 rounded-md text-stone-400 hover:text-stone-900"><span class="material-symbols-outlined text-sm">list_alt</span></button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="font-bold text-stone-900">BOSCH AUTO PARTS LATAM</p>
                        <p class="text-[10px] text-stone-400 font-mono italic">EXP-9923485</p>
                    </td>
                    <td class="text-xs">Maria Garcia</td>
                    <td>
                        <p class="text-xs">+1 305 445 9922</p>
                        <p class="text-[10px] text-blue-500">mgarcia@bosch-parts.com</p>
                    </td>
                    <td><span class="px-2 py-0.5 bg-blue-100 text-blue-700 text-[9px] font-black uppercase rounded-full">Importado</span></td>
                    <td class="text-right">
                        <div class="flex justify-end gap-2">
                            <button class="p-1.5 hover:bg-stone-100 rounded-md text-stone-400 hover:text-stone-900"><span class="material-symbols-outlined text-sm">edit</span></button>
                            <button class="p-1.5 hover:bg-stone-100 rounded-md text-stone-400 hover:text-stone-900"><span class="material-symbols-outlined text-sm">list_alt</span></button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</main>
<script src="js/common.js"></script>
</body></html>
