@extends('layouts.erp')

@section('title', 'Módulo de Activos Fijos - INDUSTRIAL FORGE ERP | ERP La Cima')

@push('styles')
    <link rel="stylesheet" href="/frontend/public/erp/css/activos-fijos.css">
@endpush

@section('content')
<script>
  document.addEventListener('DOMContentLoaded', () => {
      const b = document.getElementById('breadcrumbPage');
      if(b) b.innerText = 'P�gina';
  });
</script>

<main class="ml-64 pt-20 p-8 min-h-screen">
<header class="mb-10 flex flex-col md:flex-row md:items-end justify-between gap-6">
<div>
<h1 class="text-4xl font-black tracking-tighter uppercase mb-2">Activos Fijos</h1>
<p class="text-secondary font-medium tracking-tight">MAYOR DE REPUESTO LA CIMA, C.A. — Gestión de Maquinaria y Equipos</p>
</div>
<div class="flex gap-3">
<button class="px-4 py-2 bg-surface-container-high text-on-surface font-bold text-xs uppercase tracking-widest border border-outline-variant/15 hover:scale-102 transition-all">Exportar PDF</button>
<button class="px-6 py-2 bg-primary text-white font-black text-xs uppercase tracking-widest flex items-center gap-2 hover:scale-102 transition-all shadow-lg shadow-primary/20">
<span class="material-symbols-outlined text-sm" data-icon="add">add</span> Nuevo Activo
                </button>
</div>
</header>
<!-- Dashboard Widgets (Bento Style) -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">
<div class="md:col-span-1 bg-surface-container-lowest p-6 flex flex-col justify-between border-l-4 border-primary">
<span class="text-[10px] font-bold uppercase tracking-widest text-secondary mb-4">Valor Total Activos</span>
<div>
<span class="text-3xl font-black tracking-tighter">$1,240,500.00</span>
<div class="flex items-center gap-1 text-primary mt-1">
<span class="material-symbols-outlined text-xs" data-icon="trending_up">trending_up</span>
<span class="text-[10px] font-bold uppercase">4.2% vs Año Anterior</span>
</div>
</div>
</div>
<div class="md:col-span-1 bg-surface-container-lowest p-6 flex flex-col justify-between border-l-4 border-stone-800">
<span class="text-[10px] font-bold uppercase tracking-widest text-secondary mb-4">Depreciación Acumulada</span>
<div>
<span class="text-3xl font-black tracking-tighter">$412,280.45</span>
<p class="text-[10px] text-stone-500 font-medium uppercase mt-1">33.2% del Valor Inicial</p>
</div>
</div>
<div class="md:col-span-2 relative overflow-hidden bg-stone-900 p-6 flex flex-col justify-between">
<img alt="Engine block industrial background" class="absolute inset-0 w-full h-full object-cover opacity-20" data-alt="close-up of a high-performance engine block with precision metallic textures and professional industrial lighting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDq7O27VBFiJ7hre-_UekW37sUGY9gbsCeijCX4wtGdTb8MS9apy31wwRWum97L3U5tdRhRhQEU0PqjSaKHeFU3jqrV-lKd3mpRJZds8wk710C9f6n6yjwNXITn6CBDRGeVGE-mzg9lVK7j7CORv1sPsBI6C54cHq_al0e-CFBtFMeOqKnjKJPp410uPgbx0PHiYvo38kImj8HVj09JWonuCRMTUgcMTD_B0KYi-mHPlHUbZy0NpOd9s5DtGQUYC4zBg5H1QjC-0bQ"/>
<div class="relative z-10 flex flex-col h-full">
<span class="text-[10px] font-bold uppercase tracking-widest text-lime-400 mb-4">Proyección Depreciación Mensual</span>
<div class="flex items-end gap-2">
<span class="text-4xl font-black tracking-tighter text-white">-$12,450</span>
<span class="text-xs font-bold text-stone-400 uppercase tracking-widest pb-1">USD / Mes</span>
</div>
<div class="mt-4 flex items-center gap-4">
<div class="flex-1 h-1.5 bg-stone-700 overflow-hidden">
<div class="h-full bg-lime-500 w-[65%]"></div>
</div>
<span class="text-[10px] font-bold text-stone-400 uppercase">Período Fiscal Q3</span>
</div>
</div>
</div>
</div>
<!-- Section: Inventory Table -->
<div class="bg-surface-container-lowest overflow-hidden">
<div class="p-6 flex items-center justify-between">
<h3 class="text-xl font-black tracking-tighter uppercase">Inventario de Activos</h3>
<div class="flex gap-4">
<div class="bg-surface-container px-3 py-1 flex items-center gap-2">
<span class="material-symbols-outlined text-stone-500 text-sm" data-icon="search">search</span>
<input class="bg-transparent border-none focus:ring-0 text-[10px] font-bold uppercase w-64" placeholder="BUSCAR POR CÓDIGO O NOMBRE..." type="text"/>
</div>
<button class="material-symbols-outlined p-2 text-stone-600 hover:bg-surface-container transition-colors" data-icon="filter_list">filter_list</button>
</div>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead class="bg-surface-container-low border-b border-outline-variant/15">
<tr>
<th class="px-6 py-4 text-[10px] font-bold uppercase tracking-widest text-secondary">Código</th>
<th class="px-6 py-4 text-[10px] font-bold uppercase tracking-widest text-secondary">Descripción</th>
<th class="px-6 py-4 text-[10px] font-bold uppercase tracking-widest text-secondary">Fecha Compra</th>
<th class="px-6 py-4 text-[10px] font-bold uppercase tracking-widest text-secondary text-right">Valor Inicial</th>
<th class="px-6 py-4 text-[10px] font-bold uppercase tracking-widest text-secondary">Método</th>
<th class="px-6 py-4 text-[10px] font-bold uppercase tracking-widest text-secondary text-right">Dep. Acumulada</th>
<th class="px-6 py-4 text-[10px] font-bold uppercase tracking-widest text-secondary text-right">Valor Libros</th>
<th class="px-6 py-4 text-[10px] font-bold uppercase tracking-widest text-secondary text-center">Acción</th>
</tr>
</thead>
<tbody class="divide-y divide-surface-container">
<tr class="hover:bg-surface-container-low transition-colors group">
<td class="px-6 py-4 font-bold text-xs">AF-00214</td>
<td class="px-6 py-4">
<div class="flex flex-col">
<span class="text-xs font-bold uppercase">Torno CNC Precision X-900</span>
<span class="text-[10px] text-stone-500 uppercase font-medium">Maquinaria Pesada</span>
</div>
</td>
<td class="px-6 py-4 text-xs">12/05/2021</td>
<td class="px-6 py-4 text-xs font-bold text-right">$125,000.00</td>
<td class="px-6 py-4">
<span class="text-[9px] px-2 py-0.5 bg-stone-200 font-black uppercase rounded-sm">Línea Recta</span>
</td>
<td class="px-6 py-4 text-xs font-bold text-right text-error">$31,250.00</td>
<td class="px-6 py-4 text-xs font-black text-right text-primary">$93,750.00</td>
<td class="px-6 py-4 text-center">
<button class="material-symbols-outlined text-stone-400 hover:text-primary transition-colors text-lg" data-icon="visibility">visibility</button>
</td>
</tr>
<tr class="bg-surface-container-low/30 hover:bg-surface-container-low transition-colors">
<td class="px-6 py-4 font-bold text-xs">AF-00245</td>
<td class="px-6 py-4">
<div class="flex flex-col">
<span class="text-xs font-bold uppercase">Montacargas Caterpillar 5T</span>
<span class="text-[10px] text-stone-500 uppercase font-medium">Equipos de Almacén</span>
</div>
</td>
<td class="px-6 py-4 text-xs">15/09/2022</td>
<td class="px-6 py-4 text-xs font-bold text-right">$45,500.00</td>
<td class="px-6 py-4">
<span class="text-[9px] px-2 py-0.5 bg-stone-200 font-black uppercase rounded-sm">Línea Recta</span>
</td>
<td class="px-6 py-4 text-xs font-bold text-right text-error">$8,450.00</td>
<td class="px-6 py-4 text-xs font-black text-right text-primary">$37,050.00</td>
<td class="px-6 py-4 text-center">
<button class="material-symbols-outlined text-stone-400 hover:text-primary transition-colors text-lg" data-icon="visibility">visibility</button>
</td>
</tr>
<tr class="hover:bg-surface-container-low transition-colors">
<td class="px-6 py-4 font-bold text-xs">AF-00289</td>
<td class="px-6 py-4">
<div class="flex flex-col">
<span class="text-xs font-bold uppercase">Camión Distribución ISUZU NLR</span>
<span class="text-[10px] text-stone-500 uppercase font-medium">Vehículos</span>
</div>
</td>
<td class="px-6 py-4 text-xs">03/01/2023</td>
<td class="px-6 py-4 text-xs font-bold text-right">$68,200.00</td>
<td class="px-6 py-4">
<span class="text-[9px] px-2 py-0.5 bg-stone-200 font-black uppercase rounded-sm">Línea Recta</span>
</td>
<td class="px-6 py-4 text-xs font-bold text-right text-error">$6,820.00</td>
<td class="px-6 py-4 text-xs font-black text-right text-primary">$61,380.00</td>
<td class="px-6 py-4 text-center">
<button class="material-symbols-outlined text-stone-400 hover:text-primary transition-colors text-lg" data-icon="visibility">visibility</button>
</td>
</tr>
<tr class="bg-surface-container-low/30 hover:bg-surface-container-low transition-colors">
<td class="px-6 py-4 font-bold text-xs">AF-00312</td>
<td class="px-6 py-4">
<div class="flex flex-col">
<span class="text-xs font-bold uppercase">Compresor Aire Industrial 500L</span>
<span class="text-[10px] text-stone-500 uppercase font-medium">Herramientas</span>
</div>
</td>
<td class="px-6 py-4 text-xs">22/11/2023</td>
<td class="px-6 py-4 text-xs font-bold text-right">$12,900.00</td>
<td class="px-6 py-4">
<span class="text-[9px] px-2 py-0.5 bg-stone-200 font-black uppercase rounded-sm">Línea Recta</span>
</td>
<td class="px-6 py-4 text-xs font-bold text-right text-error">$430.00</td>
<td class="px-6 py-4 text-xs font-black text-right text-primary">$12,470.00</td>
<td class="px-6 py-4 text-center">
<button class="material-symbols-outlined text-stone-400 hover:text-primary transition-colors text-lg" data-icon="visibility">visibility</button>
</td>
</tr>
</tbody>
</table>
</div>
<div class="px-6 py-4 bg-surface-container-low flex items-center justify-between">
<span class="text-[10px] font-bold uppercase text-stone-500">Mostrando 4 de 128 activos</span>
<div class="flex gap-2">
<button class="w-8 h-8 flex items-center justify-center border border-outline-variant hover:bg-primary hover:text-white transition-colors">
<span class="material-symbols-outlined text-sm" data-icon="chevron_left">chevron_left</span>
</button>
<button class="w-8 h-8 flex items-center justify-center border border-outline-variant bg-primary text-white text-[10px] font-bold">1</button>
<button class="w-8 h-8 flex items-center justify-center border border-outline-variant hover:bg-primary hover:text-white transition-colors text-[10px] font-bold">2</button>
<button class="w-8 h-8 flex items-center justify-center border border-outline-variant hover:bg-primary hover:text-white transition-colors text-[10px] font-bold">3</button>
<button class="w-8 h-8 flex items-center justify-center border border-outline-variant hover:bg-primary hover:text-white transition-colors">
<span class="material-symbols-outlined text-sm" data-icon="chevron_right">chevron_right</span>
</button>
</div>
</div>
</div>
<!-- Floating Action Section (Right Overlay) -->
<section class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-6">
<div class="bg-surface-container-high p-6 flex items-start gap-4">
<div class="w-10 h-10 bg-primary/10 flex items-center justify-center text-primary">
<span class="material-symbols-outlined" data-icon="calendar_month">calendar_month</span>
</div>
<div>
<h4 class="text-xs font-black uppercase tracking-widest mb-1">Cierre Mensual</h4>
<p class="text-[10px] text-stone-600 font-medium mb-3">Generar asientos automáticos de depreciación para el período actual.</p>
<button class="text-[10px] font-black uppercase text-primary border-b border-primary hover:text-primary-container transition-colors">Procesar Ahora</button>
</div>
</div>
<div class="bg-surface-container-high p-6 flex items-start gap-4">
<div class="w-10 h-10 bg-stone-800 text-white flex items-center justify-center">
<span class="material-symbols-outlined" data-icon="barcode_scanner">barcode_scanner</span>
</div>
<div>
<h4 class="text-xs font-black uppercase tracking-widest mb-1">Auditoría Física</h4>
<p class="text-[10px] text-stone-600 font-medium mb-3">Sincronizar etiquetas QR de activos con la base de datos central.</p>
<button class="text-[10px] font-black uppercase text-stone-900 border-b border-stone-900 hover:text-primary transition-colors">Iniciar Escaneo</button>
</div>
</div>
<div class="bg-primary-container p-6 flex items-start gap-4">
<div class="w-10 h-10 bg-on-primary-container text-primary-container flex items-center justify-center">
<span class="material-symbols-outlined" data-icon="analytics" data-weight="fill" style="font-variation-settings: 'FILL' 1;">analytics</span>
</div>
<div>
<h4 class="text-xs font-black uppercase tracking-widest mb-1 text-on-primary-container">Reporte Fiscal</h4>
<p class="text-[10px] text-on-primary-container/80 font-medium mb-3">Resumen detallado de activos y amortizaciones para declaración de ISLR.</p>
<button class="text-[10px] font-black uppercase text-on-primary-container border-b border-on-primary-container hover:scale-105 transition-transform">Descargar XLSX</button>
</div>
</div>
</section>
</main>
@endsection

@push('scripts')
    <script src="/frontend/public/erp/js/activos-fijos.js"></script>
@endpush
