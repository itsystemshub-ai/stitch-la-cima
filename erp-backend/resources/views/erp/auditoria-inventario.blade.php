@extends('layouts.erp')

@section('title', 'auditoria-inventario | ERP La Cima')

@push('styles')
    <link rel="stylesheet" href="/frontend/public/erp/css/auditoria-inventario.css">
@endpush

@section('content')
<script>
  document.addEventListener('DOMContentLoaded', () => {
      const b = document.getElementById('breadcrumbPage');
      if(b) b.innerText = 'P�gina';
  });
</script>

<main class="ml-64 min-h-screen relative overflow-hidden">
<!-- TopNavBar (Execution from JSON) -->
<header class="fixed top-0 left-64 right-0 z-50 bg-white/80 dark:bg-stone-950/80 backdrop-blur-xl border-b-0 flex justify-between items-center px-8 py-4">
<div class="flex items-center gap-8">
<div class="text-xl font-black text-stone-900 dark:text-white tracking-tighter uppercase font-['Space_Grotesk']">
                    AUDITORÍA DE ALMACÉN
                </div>
<nav class="hidden md:flex gap-6">
<a class="text-lime-600 dark:text-lime-400 font-bold border-b-2 border-lime-600 font-['Space_Grotesk'] uppercase tracking-tight transition-colors" href="#">DASHBOARD</a>
<a class="text-stone-500 dark:text-stone-400 font-medium font-['Space_Grotesk'] uppercase tracking-tight hover:text-lime-500 transition-colors" href="#">ANALYTICS</a>
<a class="text-stone-500 dark:text-stone-400 font-medium font-['Space_Grotesk'] uppercase tracking-tight hover:text-lime-500 transition-colors" href="#">SUPPORT</a>
</nav>
</div>
<div class="flex items-center gap-4">
<div class="relative">
<span class="absolute left-3 top-1/2 -translate-y-1/2 text-stone-400 material-symbols-outlined text-lg">search</span>
<input class="bg-surface-container-highest border-none pl-10 pr-4 py-1.5 text-xs font-['Inter'] w-64 focus:ring-2 focus:ring-primary" placeholder="BUSCAR REPUESTO..." type="text"/>
</div>
<div class="flex gap-2">
<span class="material-symbols-outlined text-stone-500 cursor-pointer" data-icon="notifications">notifications</span>
<span class="material-symbols-outlined text-stone-500 cursor-pointer" data-icon="settings">settings</span>
<span class="material-symbols-outlined text-stone-500 cursor-pointer" data-icon="help">help</span>
</div>
<div class="h-8 w-8 rounded-full bg-stone-200 overflow-hidden ml-2">
<img alt="User Profile Avatar" class="w-full h-full object-cover" data-alt="profile photo of a professional warehouse manager in industrial setting with soft background" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC3yYs7vHfbt_BndXhmiEYp3ind66J80ZMRmoCBnApOTFZ-hTIVLXY0tgYVAC50rgvdTLaAup4h_ajLKDKty2UvVUACfMU1RaB-YC9mRi9vRUwLnxkqNDNRjJdOZkXicg0QRow11C8jWZ8zQGXRivmygyQETNwiBvhI7sWe06gjRuG_yuCim7WDU87uVu4KzY49eGW3AW-bFK-rwc0keuvufLOvrxsYXNAkJQScfzeDfvsd_KNvLDBfTbTnD_1dbWZmE76qjkTwQ5E"/>
</div>
</div>
</header>
<!-- Content Body -->
<div class="pt-24 px-8 pb-12">
<!-- Breadcrumbs / Context -->
<div class="mb-8 flex justify-between items-end">
<div>
<div class="flex items-center gap-2 text-label-md text-secondary mb-2 uppercase tracking-widest font-bold">
<span>MAYOR DE REPUESTO LA CIMA, C.A.</span>
<span class="material-symbols-outlined text-xs">chevron_right</span>
<span>GESTIÓN DE INVENTARIO</span>
</div>
<h2 class="text-4xl font-black uppercase tracking-tighter text-on-surface leading-none">TOMA FÍSICA<br/><span class="text-primary-container bg-primary px-2">CONTEO CIEGO</span></h2>
</div>
<div class="flex gap-3">
<button class="bg-surface-container-high px-6 py-3 font-bold uppercase text-xs tracking-widest flex items-center gap-2 hover:scale-[1.02] transition-transform">
<span class="material-symbols-outlined text-sm">download</span> EXPORTAR PDF
                    </button>
<button class="bg-primary text-on-primary px-8 py-3 font-bold uppercase text-xs tracking-widest flex items-center gap-2 shadow-xl hover:scale-[1.02] transition-transform">
<span class="material-symbols-outlined text-sm">sync_alt</span> SINCRONIZAR Y AJUSTAR
                    </button>
</div>
</div>
<!-- Bento Grid Layout -->
<div class="grid grid-cols-12 gap-6">
<!-- Selection Panel -->
<div class="col-span-12 lg:col-span-4 space-y-6">
<!-- Location Selector -->
<div class="bg-surface-container-lowest p-6 shadow-sm border-l-4 border-primary">
<h3 class="text-sm font-black uppercase tracking-widest mb-4">Parámetros de Auditoría</h3>
<div class="space-y-4">
<div>
<label class="block text-[10px] font-bold text-secondary uppercase tracking-widest mb-1">Seleccionar Pasillo</label>
<select class="w-full bg-surface-container-low border-none focus:ring-2 focus:ring-primary py-3 text-sm font-semibold">
<option>PASILLO A - MOTOR Y TRANSMISIÓN</option>
<option>PASILLO B - SUSPENSIÓN Y FRENOS</option>
<option>PASILLO C - ELÉCTRICO Y LUCES</option>
<option>PASILLO D - ACCESORIOS Y CARROCERÍA</option>
</select>
</div>
<div>
<label class="block text-[10px] font-bold text-secondary uppercase tracking-widest mb-1">Categoría Crítica</label>
<select class="w-full bg-surface-container-low border-none focus:ring-2 focus:ring-primary py-3 text-sm font-semibold">
<option>TODAS LAS CATEGORÍAS</option>
<option>REPUESTOS DE ALTA ROTACIÓN</option>
<option>VALOR ALTO (PREMIUM)</option>
</select>
</div>
<button class="w-full border-2 border-primary text-primary font-black py-3 uppercase tracking-tighter hover:bg-primary hover:text-on-primary transition-all">
                                INICIAR AUDITORÍA DE ZONA
                            </button>
</div>
</div>
<!-- Stats Card -->
<div class="bg-on-background text-white p-6 relative overflow-hidden group">
<div class="relative z-10">
<h3 class="text-xs font-bold text-primary-container tracking-[0.2em] uppercase mb-6">Resumen de Sesión</h3>
<div class="flex justify-between items-end mb-4">
<span class="text-4xl font-black">42/120</span>
<span class="text-[10px] font-bold text-stone-400">ITEMS CONTADOS</span>
</div>
<div class="w-full bg-stone-800 h-1 mb-6">
<div class="bg-primary-container h-full w-[35%]"></div>
</div>
<div class="flex items-center gap-4">
<div class="bg-stone-800 flex-1 p-3">
<p class="text-[9px] text-stone-400 uppercase font-bold tracking-widest">Discrepancias</p>
<p class="text-xl font-black text-error">12%</p>
</div>
<div class="bg-stone-800 flex-1 p-3">
<p class="text-[9px] text-stone-400 uppercase font-bold tracking-widest">Valor Neto Diff</p>
<p class="text-xl font-black">-$420.00</p>
</div>
</div>
</div>
<div class="absolute -right-4 -bottom-4 opacity-10 group-hover:scale-110 transition-transform">
<span class="material-symbols-outlined text-9xl">analytics</span>
</div>
</div>
</div>
<!-- Main Entry Panel -->
<div class="col-span-12 lg:col-span-8 bg-surface-container-lowest p-8">
<div class="flex justify-between items-center mb-6">
<h3 class="text-xl font-black uppercase tracking-tighter">Entrada de Conteo Ciego</h3>
<div class="flex items-center gap-2 bg-error-container text-on-error-container px-3 py-1 text-[10px] font-bold uppercase tracking-widest">
<span class="material-symbols-outlined text-xs">warning</span>
                            Alerta: 3 diferencias críticas detectadas
                        </div>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left">
<thead>
<tr class="bg-surface-container-low">
<th class="py-4 px-4 text-[10px] font-black uppercase tracking-widest text-secondary">ID Repuesto</th>
<th class="py-4 px-4 text-[10px] font-black uppercase tracking-widest text-secondary">Descripción</th>
<th class="py-4 px-4 text-[10px] font-black uppercase tracking-widest text-secondary text-center">Teórico</th>
<th class="py-4 px-4 text-[10px] font-black uppercase tracking-widest text-secondary w-32">Conteo Físico</th>
<th class="py-4 px-4 text-[10px] font-black uppercase tracking-widest text-secondary text-right">Diferencia</th>
</tr>
</thead>
<tbody class="divide-y divide-surface-container">
<!-- Row 1 (Critical Discrepancy) -->
<tr class="group hover:bg-surface-container-low transition-colors">
<td class="py-5 px-4">
<div class="text-xs font-bold font-mono">KIT-3422-MX</div>
<div class="text-[9px] text-secondary uppercase tracking-tight">Estante A-12</div>
</td>
<td class="py-5 px-4 font-bold text-sm uppercase">Bomba de Agua Toyota Hilux 2.5</td>
<td class="py-5 px-4 text-center">
<span class="bg-surface-container px-2 py-1 text-xs font-bold text-secondary">24 UND</span>
</td>
<td class="py-5 px-4">
<input class="w-full bg-surface-container-highest border-none focus:ring-2 focus:ring-error font-black text-center py-2 text-error" type="number" value="18"/>
</td>
<td class="py-5 px-4 text-right">
<span class="text-error font-black">-6</span>
<span class="material-symbols-outlined text-xs text-error ml-1 align-middle">error</span>
</td>
</tr>
<!-- Row 2 (Balanced) -->
<tr class="group hover:bg-surface-container-low transition-colors">
<td class="py-5 px-4">
<div class="text-xs font-bold font-mono">FILT-900-OIL</div>
<div class="text-[9px] text-secondary uppercase tracking-tight">Estante A-04</div>
</td>
<td class="py-5 px-4 font-bold text-sm uppercase">Filtro Aceite Premium Genérico</td>
<td class="py-5 px-4 text-center">
<span class="bg-surface-container px-2 py-1 text-xs font-bold text-secondary">150 UND</span>
</td>
<td class="py-5 px-4">
<input class="w-full bg-surface-container-highest border-none focus:ring-2 focus:ring-primary font-black text-center py-2 text-primary" type="number" value="150"/>
</td>
<td class="py-5 px-4 text-right">
<span class="text-primary font-black">0</span>
<span class="material-symbols-outlined text-xs text-primary ml-1 align-middle">check_circle</span>
</td>
</tr>
<!-- Row 3 (Excess Discrepancy) -->
<tr class="group hover:bg-surface-container-low transition-colors">
<td class="py-5 px-4">
<div class="text-xs font-bold font-mono">FR-8821-PAD</div>
<div class="text-[9px] text-secondary uppercase tracking-tight">Estante A-09</div>
</td>
<td class="py-5 px-4 font-bold text-sm uppercase">Pastillas de Freno Delanteras Ford Explorer</td>
<td class="py-5 px-4 text-center">
<span class="bg-surface-container px-2 py-1 text-xs font-bold text-secondary">42 UND</span>
</td>
<td class="py-5 px-4">
<input class="w-full bg-surface-container-highest border-none focus:ring-2 focus:ring-primary font-black text-center py-2 text-primary" type="number" value="44"/>
</td>
<td class="py-5 px-4 text-right">
<span class="text-primary font-black">+2</span>
<span class="material-symbols-outlined text-xs text-primary ml-1 align-middle">trending_up</span>
</td>
</tr>
<!-- Row 4 -->
<tr class="group hover:bg-surface-container-low transition-colors">
<td class="py-5 px-4">
<div class="text-xs font-bold font-mono">RAD-400-ALU</div>
<div class="text-[9px] text-secondary uppercase tracking-tight">Estante A-15</div>
</td>
<td class="py-5 px-4 font-bold text-sm uppercase">Radiador Aluminio Chevrolet Silverado 2018</td>
<td class="py-5 px-4 text-center">
<span class="bg-surface-container px-2 py-1 text-xs font-bold text-secondary">8 UND</span>
</td>
<td class="py-5 px-4">
<input class="w-full bg-surface-container-highest border-none focus:ring-2 focus:ring-primary font-black text-center py-2" placeholder="--" type="number"/>
</td>
<td class="py-5 px-4 text-right">
<span class="text-stone-400 font-bold italic">Pendiente</span>
</td>
</tr>
</tbody>
</table>
</div>
</div>
<!-- Secondary Panel (Visual Guides & History) -->
<div class="col-span-12 grid grid-cols-1 md:grid-cols-3 gap-6">
<div class="bg-surface-container p-6 relative">
<div class="flex items-start gap-4">
<div class="p-3 bg-white shadow-sm">
<span class="material-symbols-outlined text-primary text-3xl">qr_code_scanner</span>
</div>
<div>
<h4 class="font-black uppercase tracking-tight text-sm mb-1">Escanear Manual</h4>
<p class="text-[10px] text-secondary leading-relaxed font-medium">Use un escáner industrial para entradas masivas de conteo ciego sin ver teóricos.</p>
</div>
</div>
</div>
<div class="bg-surface-container p-6 relative">
<div class="flex items-start gap-4">
<div class="p-3 bg-white shadow-sm">
<span class="material-symbols-outlined text-error text-3xl">verified_user</span>
</div>
<div>
<h4 class="font-black uppercase tracking-tight text-sm mb-1">Aprobación de Supervisor</h4>
<p class="text-[10px] text-secondary leading-relaxed font-medium">Las discrepancias mayores al 5% o $200 requieren token de seguridad.</p>
</div>
</div>
</div>
<div class="bg-primary/5 p-6 relative border-2 border-dashed border-primary/20">
<div class="flex items-start gap-4">
<div class="p-3 bg-primary text-on-primary shadow-sm">
<span class="material-symbols-outlined text-3xl" style="font-variation-settings: 'FILL' 1;">history</span>
</div>
<div>
<h4 class="font-black uppercase tracking-tight text-sm mb-1">Historial de Ajustes</h4>
<p class="text-[10px] text-secondary leading-relaxed font-medium">Ver auditorías pasadas del Pasillo A para detectar patrones de merma.</p>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- FAB - Only on relevant task screen (Action: Sync) -->
<button class="fixed bottom-10 right-10 w-16 h-16 bg-on-background text-white shadow-2xl flex items-center justify-center hover:scale-110 active:scale-95 transition-all z-50">
<span class="material-symbols-outlined text-3xl text-primary-container" style="font-variation-settings: 'FILL' 1;">save</span>
</button>
</main>
@endsection

@push('scripts')
    <script src="/frontend/public/erp/js/auditoria-inventario.js"></script>
@endpush
