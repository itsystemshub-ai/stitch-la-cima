@extends('layouts.erp')

@section('title', 'METALLIC_CORE_ERP - Libro de Compras Fiscal | ERP La Cima')

@push('styles')
    <link rel="stylesheet" href="/frontend/public/erp/css/libro-compras.css">
@endpush

@section('content')
<script>
  document.addEventListener('DOMContentLoaded', () => {
      const b = document.getElementById('breadcrumbPage');
      if(b) b.innerText = 'P�gina';
  });
</script>

<main class="lg:ml-64 pt-24 pb-12 px-6 min-h-screen">
<!-- Dashboard Header -->
<div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-8 gap-4">
<div class="space-y-1">
<h1 class="text-4xl font-headline font-bold uppercase tracking-tighter text-white">Libro de Compras Fiscal</h1>
<p class="text-stone-500 font-mono text-sm">CONTROL FISCAL PERIODICIDAD MENSUAL - ART. 75 RIVA</p>
</div>
<div class="flex gap-3">
<button class="bg-stone-800 hover:bg-stone-700 text-stone-200 px-6 py-2 font-headline uppercase text-xs tracking-widest transition-all scale-95 active:scale-90 flex items-center gap-2">
<span class="material-symbols-outlined text-sm">download</span>
                    Exportar a Excel (SheetJS)
                </button>
<button class="bg-lime-400 hover:bg-lime-300 text-stone-950 px-6 py-2 font-headline font-bold uppercase text-xs tracking-widest transition-all scale-95 active:scale-90 flex items-center gap-2">
<span class="material-symbols-outlined text-sm">lock</span>
                    Cerrar Período Mensual
                </button>
</div>
</div>
<!-- Filter Stats Bento Grid -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
<div class="bg-stone-900 p-6 border-l-2 border-lime-400">
<div class="text-stone-500 font-headline uppercase text-[10px] tracking-widest mb-1">Total Base Imponible</div>
<div class="text-2xl font-headline font-bold text-white">45.290,50 <span class="text-stone-500 text-xs">VED</span></div>
</div>
<div class="bg-stone-900 p-6 border-l-2 border-stone-700">
<div class="text-stone-500 font-headline uppercase text-[10px] tracking-widest mb-1">Total IVA (16%)</div>
<div class="text-2xl font-headline font-bold text-white">7.246,48 <span class="text-stone-500 text-xs">VED</span></div>
</div>
<div class="bg-stone-900 p-6 border-l-2 border-stone-700">
<div class="text-stone-500 font-headline uppercase text-[10px] tracking-widest mb-1">IVA Retenido</div>
<div class="text-2xl font-headline font-bold text-lime-400">5.434,86 <span class="text-stone-500 text-xs">VED</span></div>
</div>
<div class="bg-stone-900 p-6 border-l-2 border-lime-400/50">
<div class="text-stone-500 font-headline uppercase text-[10px] tracking-widest mb-1">Total Compras</div>
<div class="text-2xl font-headline font-bold text-white">52.536,98 <span class="text-stone-500 text-xs">VED</span></div>
</div>
</div>
<!-- Fiscal Table Section -->
<div class="bg-stone-900 shadow-2xl overflow-hidden">
<div class="p-4 border-b border-stone-800 flex justify-between items-center bg-stone-950/40">
<div class="flex gap-4">
<select class="bg-stone-800 border-none text-[10px] font-headline uppercase tracking-widest text-stone-300 focus:ring-1 focus:ring-lime-400 pr-8">
<option>Octubre 2023</option>
<option>Septiembre 2023</option>
</select>
<div class="flex items-center gap-2 px-3 py-1 bg-stone-800 text-[10px] font-headline uppercase tracking-widest text-lime-400">
<span class="w-1.5 h-1.5 bg-lime-400 rounded-full animate-pulse"></span>
                        Estado: Abierto
                    </div>
</div>
<div class="text-stone-500 text-[10px] font-mono">MOSTRANDO 24 REGISTROS DE COMPRA</div>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-stone-950 text-stone-400 font-headline text-[10px] uppercase tracking-widest">
<th class="px-4 py-4 font-medium border-b border-stone-800">Fecha</th>
<th class="px-4 py-4 font-medium border-b border-stone-800">RIF Proveedor</th>
<th class="px-4 py-4 font-medium border-b border-stone-800">Nombre Proveedor</th>
<th class="px-4 py-4 font-medium border-b border-stone-800">Nro Factura</th>
<th class="px-4 py-4 font-medium border-b border-stone-800">Nro Control</th>
<th class="px-4 py-4 font-medium border-b border-stone-800 text-right">Base Imponible</th>
<th class="px-4 py-4 font-medium border-b border-stone-800 text-right">IVA (16%)</th>
<th class="px-4 py-4 font-medium border-b border-stone-800">Retención</th>
<th class="px-4 py-4 font-medium border-b border-stone-800 text-right">Total</th>
</tr>
</thead>
<tbody class="divide-y divide-stone-800/50 font-mono text-[11px]">
<!-- Row 1 -->
<tr class="hover:bg-stone-800/40 transition-colors group">
<td class="px-4 py-3 text-stone-300">12/10/2023</td>
<td class="px-4 py-3 text-lime-400 font-bold">J-31456789-0</td>
<td class="px-4 py-3 text-stone-300 uppercase">Siderúrgica del Turbo C.A.</td>
<td class="px-4 py-3 text-stone-400">00045612</td>
<td class="px-4 py-3 text-stone-400">00-998811</td>
<td class="px-4 py-3 text-right text-stone-300">12.500,00</td>
<td class="px-4 py-3 text-right text-stone-300">2.000,00</td>
<td class="px-4 py-3">
<span class="bg-stone-800 px-2 py-0.5 rounded text-[9px] text-lime-400">2023100045</span>
</td>
<td class="px-4 py-3 text-right text-white font-bold">14.500,00</td>
</tr>
<!-- Row 2 -->
<tr class="bg-stone-950/20 hover:bg-stone-800/40 transition-colors group">
<td class="px-4 py-3 text-stone-300">15/10/2023</td>
<td class="px-4 py-3 text-lime-400 font-bold">J-00123456-7</td>
<td class="px-4 py-3 text-stone-300 uppercase">Tecnología de Motores V8</td>
<td class="px-4 py-3 text-stone-400">00008922</td>
<td class="px-4 py-3 text-stone-400">00-004512</td>
<td class="px-4 py-3 text-right text-stone-300">5.200,00</td>
<td class="px-4 py-3 text-right text-stone-300">832,00</td>
<td class="px-4 py-3">
<span class="bg-stone-800 px-2 py-0.5 rounded text-[9px] text-lime-400">2023100046</span>
</td>
<td class="px-4 py-3 text-right text-white font-bold">6.032,00</td>
</tr>
<!-- Row 3 -->
<tr class="hover:bg-stone-800/40 transition-colors group">
<td class="px-4 py-3 text-stone-300">18/10/2023</td>
<td class="px-4 py-3 text-lime-400 font-bold">J-40552147-1</td>
<td class="px-4 py-3 text-stone-300 uppercase">Lubricantes Industriales X</td>
<td class="px-4 py-3 text-stone-400">00012399</td>
<td class="px-4 py-3 text-stone-400">00-112233</td>
<td class="px-4 py-3 text-right text-stone-300">2.100,50</td>
<td class="px-4 py-3 text-right text-stone-300">336,08</td>
<td class="px-4 py-3">
<span class="bg-stone-800 px-2 py-0.5 rounded text-[9px] text-lime-400">2023100047</span>
</td>
<td class="px-4 py-3 text-right text-white font-bold">2.436,58</td>
</tr>
<!-- Row 4 -->
<tr class="bg-stone-950/20 hover:bg-stone-800/40 transition-colors group">
<td class="px-4 py-3 text-stone-300">22/10/2023</td>
<td class="px-4 py-3 text-lime-400 font-bold">G-20000001-1</td>
<td class="px-4 py-3 text-stone-300 uppercase">Alcaldía de Municipio Industrial</td>
<td class="px-4 py-3 text-stone-400">F-88120</td>
<td class="px-4 py-3 text-stone-400">N/A</td>
<td class="px-4 py-3 text-right text-stone-300">800,00</td>
<td class="px-4 py-3 text-right text-stone-300">0,00</td>
<td class="px-4 py-3 text-stone-600 italic">EXENTO</td>
<td class="px-4 py-3 text-right text-white font-bold">800,00</td>
</tr>
</tbody>
<tfoot>
<tr class="bg-stone-950 border-t-2 border-lime-400/50 font-headline uppercase text-[10px] tracking-widest text-white">
<td class="px-4 py-4 text-right font-bold" colspan="5">Totales de Período</td>
<td class="px-4 py-4 text-right font-bold border-l border-stone-800">45.290,50</td>
<td class="px-4 py-4 text-right font-bold border-l border-stone-800">7.246,48</td>
<td class="px-4 py-4 border-l border-stone-800"></td>
<td class="px-4 py-4 text-right font-bold border-l border-stone-800 text-lime-400">52.536,98</td>
</tr>
</tfoot>
</table>
</div>
</div>
<!-- Footnotes / Compliance -->
<div class="mt-8 flex flex-col md:flex-row justify-between items-start gap-6">
<div class="max-w-2xl">
<h3 class="text-xs font-headline font-bold text-stone-400 uppercase tracking-widest mb-2">Declaración de Cumplimiento</h3>
<p class="text-[10px] text-stone-500 leading-relaxed font-body">
                    Este reporte ha sido generado bajo los lineamientos establecidos en la Providencia Administrativa SNAT/2011/00071 dictada por el SENIAT. Los datos aquí contenidos reflejan la operatividad fiscal de la empresa según el Artículo 75 del Reglamento General de la Ley de Impuesto al Valor Agregado. Cualquier modificación posterior al cierre del período requerirá la emisión de una declaración sustitutiva ante el portal fiscal.
                </p>
</div>
<div class="flex items-center gap-4 bg-stone-900 p-4 border border-stone-800">
<div class="text-right">
<div class="text-[9px] text-stone-500 uppercase tracking-widest">Sello Digital de Integridad</div>
<div class="text-[10px] font-mono text-lime-400">SHA256: 8f2a...1e4c</div>
</div>
<div class="w-12 h-12 border border-stone-700 p-1">
<img alt="Digital Seal" class="w-full h-full opacity-50" data-alt="Abstract geometric QR-like code icon in lime green and charcoal gray representing a digital fiscal security seal" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAeycSSCDPz1Rn_yViXxosODPq4PPfcufik4ezJTpsLut0PCx8anvncDVqhhltI_Xv3ci2NS7YXEjuRX4CxsC8sYD5tNIE21S-Mejz4iEQ67w5Zj6VcBcoztCJ1Lb1D-mubVuvpbka77_jbTqTEkMIbVOT7VdbzVstM0Km_KiO_DfUIUMehhpkxf7yiRhmf7HKvVO22gpfpgLLvPqpjG-7gACrbNTbAm8tBNYJL86uSsXjOpfNIY9pXijoqVD0Aw0m0504drjhnKDM"/>
</div>
</div>
</div>
</main>
@endsection

@push('scripts')
    <script src="/frontend/public/erp/js/libro-compras.js"></script>
@endpush
