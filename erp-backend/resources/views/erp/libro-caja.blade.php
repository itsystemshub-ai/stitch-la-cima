@extends('layouts.erp')

@section('title', 'TITAN INDUSTRIAL ERP - Finanzas &amp; Bancos | ERP La Cima')

@push('styles')
    <link rel="stylesheet" href="/frontend/public/erp/css/libro-caja.css">
@endpush

@section('content')
<script>
  document.addEventListener('DOMContentLoaded', () => {
      const b = document.getElementById('breadcrumbPage');
      if(b) b.innerText = 'P�gina';
  });
</script>

<main class="ml-64 pt-24 px-8 pb-12">
<!-- Header & Real-Time Balances -->
<div class="flex flex-col gap-6 mb-12">
<div class="flex justify-between items-end">
<div>
<h1 class="text-4xl font-extrabold tracking-tighter uppercase text-on-surface">Gestión Bancaria &amp; Libro Caja</h1>
<p class="text-secondary font-label text-sm uppercase tracking-widest mt-1">Saldos Consolidados a Tiempo Real</p>
</div>
<div class="flex gap-3">
<button class="bg-surface-container-high hover:bg-surface-container-highest px-4 py-2 text-xs font-bold uppercase tracking-widest flex items-center gap-2 transition-all">
<span class="material-symbols-outlined text-sm" data-icon="file_download">file_download</span> Exportar PDF
                    </button>
<button class="bg-primary hover:bg-primary-container text-on-primary px-4 py-2 text-xs font-bold uppercase tracking-widest flex items-center gap-2 transition-all">
<span class="material-symbols-outlined text-sm" data-icon="sync_alt">sync_alt</span> Nueva Conciliación
                    </button>
</div>
</div>
<!-- Dashboard Grid (Bento Style) -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-4">
<div class="bg-surface-container-lowest p-6 flex flex-col gap-2 border-l-4 border-primary">
<span class="text-[10px] font-bold text-secondary uppercase tracking-widest">Banco Santander - Operativo</span>
<span class="text-3xl font-headline font-bold text-on-surface">$1,452,380.00</span>
<div class="flex items-center gap-1 text-xs text-primary font-bold">
<span class="material-symbols-outlined text-sm" data-icon="arrow_upward">arrow_upward</span> +2.4% vs ayer
                    </div>
</div>
<div class="bg-surface-container-lowest p-6 flex flex-col gap-2">
<span class="text-[10px] font-bold text-secondary uppercase tracking-widest">BBVA - Reserva</span>
<span class="text-3xl font-headline font-bold text-on-surface">$845,000.50</span>
<div class="flex items-center gap-1 text-xs text-secondary font-bold">
                        Conciliado hace 2h
                    </div>
</div>
<div class="bg-surface-container-lowest p-6 flex flex-col gap-2">
<span class="text-[10px] font-bold text-secondary uppercase tracking-widest">Caja Chica - Planta 1</span>
<span class="text-3xl font-headline font-bold text-on-surface">$12,400.00</span>
<div class="flex items-center gap-1 text-xs text-error font-bold">
<span class="material-symbols-outlined text-sm" data-icon="warning">warning</span> Reponer fondos
                    </div>
</div>
<div class="bg-primary text-on-primary p-6 flex flex-col gap-2">
<span class="text-[10px] font-bold text-on-primary/70 uppercase tracking-widest">Consolidado Total</span>
<span class="text-3xl font-headline font-bold">$2,309,780.50</span>
<div class="flex items-center gap-1 text-xs text-on-primary/80 font-bold uppercase">
                        Auditoría 100% OK
                    </div>
</div>
</div>
</div>
<!-- Section 1: Libro de Movimientos & Conciliación -->
<section class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
<div class="lg:col-span-2 space-y-4">
<div class="flex justify-between items-center">
<h2 class="text-xl font-bold uppercase tracking-tight">Registro de Movimientos</h2>
<div class="flex gap-2">
<input class="bg-surface-container-high border-none text-xs px-4 py-2 focus:ring-1 focus:ring-primary w-64" placeholder="Filtrar por concepto..." type="text"/>
</div>
</div>
<div class="bg-surface-container-lowest overflow-hidden">
<table class="w-full text-left border-collapse">
<thead class="bg-surface-container text-secondary text-[10px] uppercase font-bold tracking-widest">
<tr>
<th class="px-4 py-3">Fecha</th>
<th class="px-4 py-3">Referencia</th>
<th class="px-4 py-3">Concepto</th>
<th class="px-4 py-3">Tipo</th>
<th class="px-4 py-3 text-right">Monto</th>
<th class="px-4 py-3 text-center">Estado</th>
</tr>
</thead>
<tbody class="text-xs font-label">
<tr class="hover:bg-surface-container-low transition-colors">
<td class="px-4 py-4 text-secondary">24/05/2024</td>
<td class="px-4 py-4 font-mono">#TRF-9023</td>
<td class="px-4 py-4 font-bold">Pago Proveedor Acero Inox</td>
<td class="px-4 py-4"><span class="bg-surface-container-high px-2 py-1 text-[10px]">EGRESO</span></td>
<td class="px-4 py-4 text-right font-bold text-error">-$250,000.00</td>
<td class="px-4 py-4 text-center"><span class="material-symbols-outlined text-primary text-lg" data-icon="check_circle">check_circle</span></td>
</tr>
<tr class="bg-surface-container-low/50 hover:bg-surface-container-low transition-colors">
<td class="px-4 py-4 text-secondary">24/05/2024</td>
<td class="px-4 py-4 font-mono">#CHQ-4451</td>
<td class="px-4 py-4 font-bold">Cobro Factura #V-998 (Cliente Ind.)</td>
<td class="px-4 py-4"><span class="bg-primary-container/20 text-on-primary-container px-2 py-1 text-[10px]">INGRESO</span></td>
<td class="px-4 py-4 text-right font-bold text-primary">+$180,500.00</td>
<td class="px-4 py-4 text-center"><span class="material-symbols-outlined text-secondary text-lg" data-icon="history">history</span></td>
</tr>
<tr class="hover:bg-surface-container-low transition-colors">
<td class="px-4 py-4 text-secondary">23/05/2024</td>
<td class="px-4 py-4 font-mono">#INT-0032</td>
<td class="px-4 py-4 font-bold">Rendimientos Cuenta de Ahorro</td>
<td class="px-4 py-4"><span class="bg-primary-container/20 text-on-primary-container px-2 py-1 text-[10px]">INGRESO</span></td>
<td class="px-4 py-4 text-right font-bold text-primary">+$12,450.00</td>
<td class="px-4 py-4 text-center"><span class="material-symbols-outlined text-primary text-lg" data-icon="check_circle">check_circle</span></td>
</tr>
<tr class="bg-surface-container-low/50 hover:bg-surface-container-low transition-colors">
<td class="px-4 py-4 text-secondary">23/05/2024</td>
<td class="px-4 py-4 font-mono">#TRF-8871</td>
<td class="px-4 py-4 font-bold">Nómina Operarios Planta 2</td>
<td class="px-4 py-4"><span class="bg-surface-container-high px-2 py-1 text-[10px]">EGRESO</span></td>
<td class="px-4 py-4 text-right font-bold text-error">-$412,000.00</td>
<td class="px-4 py-4 text-center"><span class="material-symbols-outlined text-primary text-lg" data-icon="check_circle">check_circle</span></td>
</tr>
</tbody>
</table>
</div>
</div>
<!-- Conciliación Rápida & Acciones -->
<div class="space-y-6">
<div class="bg-stone-900 text-stone-100 p-6 rounded-lg relative overflow-hidden">
<div class="absolute top-0 right-0 w-32 h-32 bg-lime-500/10 blur-3xl rounded-full -translate-y-1/2 translate-x-1/2"></div>
<h3 class="text-sm font-bold uppercase tracking-widest text-lime-400 mb-4">Conciliación Rápida AI</h3>
<p class="text-xs text-stone-400 leading-relaxed mb-6">Hemos detectado 4 movimientos bancarios que coinciden con facturas pendientes de cobro.</p>
<div class="space-y-3">
<div class="bg-stone-800 p-3 flex justify-between items-center group cursor-pointer hover:bg-stone-700 transition-all">
<div>
<div class="text-[10px] text-stone-500 font-bold uppercase">Match 98%</div>
<div class="text-xs font-bold">Depósito $45,000.00</div>
</div>
<span class="material-symbols-outlined text-lime-500 opacity-0 group-hover:opacity-100 transition-opacity" data-icon="arrow_forward">arrow_forward</span>
</div>
<button class="w-full bg-lime-500 text-stone-950 text-xs font-bold py-3 uppercase tracking-widest mt-2">Ejecutar Auto-Conciliación</button>
</div>
</div>
<div class="bg-surface-container p-6">
<h3 class="text-xs font-bold uppercase tracking-widest text-secondary mb-4">Flujo Mensual</h3>
<div class="h-32 flex items-end gap-2 px-2">
<div class="flex-1 bg-primary/20 h-3/4 hover:bg-primary transition-all"></div>
<div class="flex-1 bg-primary/20 h-1/2 hover:bg-primary transition-all"></div>
<div class="flex-1 bg-primary/20 h-full hover:bg-primary transition-all"></div>
<div class="flex-1 bg-primary/20 h-2/3 hover:bg-primary transition-all"></div>
<div class="flex-1 bg-primary h-5/6"></div>
</div>
<div class="flex justify-between mt-2 text-[10px] text-secondary font-bold uppercase">
<span>Ene</span><span>Feb</span><span>Mar</span><span>Abr</span><span>May</span>
</div>
</div>
</div>
</section>
<!-- Section 2: Antigüedad de Saldos -->
<section class="space-y-6">
<div class="flex justify-between items-center">
<div>
<h2 class="text-xl font-bold uppercase tracking-tight">Antigüedad de Saldos de Clientes</h2>
<p class="text-[10px] text-secondary font-bold uppercase tracking-widest">Análisis de cartera vencida y riesgo</p>
</div>
<div class="flex items-center gap-6">
<div class="flex items-center gap-2">
<div class="w-3 h-3 bg-primary"></div>
<span class="text-[10px] font-bold uppercase text-secondary">Corriente</span>
</div>
<div class="flex items-center gap-2">
<div class="w-3 h-3 bg-secondary"></div>
<span class="text-[10px] font-bold uppercase text-secondary">30-60 Días</span>
</div>
<div class="flex items-center gap-2">
<div class="w-3 h-3 bg-error"></div>
<span class="text-[10px] font-bold uppercase text-secondary">&gt;90 Días</span>
</div>
</div>
</div>
<div class="bg-surface-container-lowest p-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
<!-- Cliente 1 -->
<div class="border-l border-surface-container-high pl-4">
<div class="text-sm font-bold uppercase mb-1">Industrial S.A.</div>
<div class="text-[10px] text-secondary font-bold uppercase tracking-widest mb-3">Total Deuda: $1.2M</div>
<div class="flex gap-1 h-2 mb-2">
<div class="w-[80%] bg-primary"></div>
<div class="w-[15%] bg-secondary"></div>
<div class="w-[5%] bg-error"></div>
</div>
<div class="flex justify-between text-[10px] font-bold">
<span class="text-primary">80% OK</span>
<span class="text-error">Bajo Riesgo</span>
</div>
</div>
<!-- Cliente 2 -->
<div class="border-l border-surface-container-high pl-4">
<div class="text-sm font-bold uppercase mb-1">Minera del Norte</div>
<div class="text-[10px] text-secondary font-bold uppercase tracking-widest mb-3">Total Deuda: $840k</div>
<div class="flex gap-1 h-2 mb-2">
<div class="w-[40%] bg-primary"></div>
<div class="w-[40%] bg-secondary"></div>
<div class="w-[20%] bg-error"></div>
</div>
<div class="flex justify-between text-[10px] font-bold">
<span class="text-secondary">40% Vencido</span>
<span class="text-error">Alerta</span>
</div>
</div>
<!-- Cliente 3 -->
<div class="border-l border-surface-container-high pl-4">
<div class="text-sm font-bold uppercase mb-1">Logística Global</div>
<div class="text-[10px] text-secondary font-bold uppercase tracking-widest mb-3">Total Deuda: $3.5M</div>
<div class="flex gap-1 h-2 mb-2">
<div class="w-[95%] bg-primary"></div>
<div class="w-[5%] bg-secondary"></div>
<div class="w-0 bg-error"></div>
</div>
<div class="flex justify-between text-[10px] font-bold">
<span class="text-primary">95% OK</span>
<span class="text-primary">Excelente</span>
</div>
</div>
<!-- Cliente 4 -->
<div class="border-l border-surface-container-high pl-4">
<div class="text-sm font-bold uppercase mb-1">Suministros Ferrosos</div>
<div class="text-[10px] text-secondary font-bold uppercase tracking-widest mb-3">Total Deuda: $150k</div>
<div class="flex gap-1 h-2 mb-2">
<div class="w-[10%] bg-primary"></div>
<div class="w-[20%] bg-secondary"></div>
<div class="w-[70%] bg-error"></div>
</div>
<div class="flex justify-between text-[10px] font-bold">
<span class="text-error">70% &gt;90 Días</span>
<span class="text-error">BLOQUEADO</span>
</div>
</div>
</div>
<!-- Resumen de Riesgo (Full Width) -->
<div class="bg-surface-container-high p-4 flex justify-between items-center">
<div class="flex gap-8">
<div>
<div class="text-[9px] font-bold text-secondary uppercase tracking-widest">Cartera Corriente</div>
<div class="text-lg font-bold">$12,450,000.00</div>
</div>
<div>
<div class="text-[9px] font-bold text-secondary uppercase tracking-widest">Monto en Riesgo</div>
<div class="text-lg font-bold text-error">$842,000.00</div>
</div>
<div>
<div class="text-[9px] font-bold text-secondary uppercase tracking-widest">Promedio Días Pago</div>
<div class="text-lg font-bold">42 Días</div>
</div>
</div>
<button class="bg-on-surface text-surface px-6 py-3 text-xs font-bold uppercase tracking-widest hover:bg-stone-800 transition-all">Ver Reporte Analítico</button>
</div>
</section>
</main>
@endsection

@push('scripts')
    <script src="/frontend/public/erp/js/libro-caja.js"></script>
@endpush
