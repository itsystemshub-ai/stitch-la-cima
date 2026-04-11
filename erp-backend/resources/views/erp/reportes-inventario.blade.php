@extends('layouts.erp')

@section('title', 'INDUSTRIAL FORGE ERP - Inventory Reporting Center | ERP La Cima')

@push('styles')
    <link rel="stylesheet" href="/frontend/public/erp/css/reportes-inventario.css">
@endpush

@section('content')
<script>
  document.addEventListener('DOMContentLoaded', () => {
      const b = document.getElementById('breadcrumbPage');
      if(b) b.innerText = 'Página';
  });
</script>

<main class="p-6 lg:p-10 space-y-8">
<!-- Header & Actions -->
<div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
<div>
<h2 class="text-4xl font-black tracking-tight uppercase mb-2">Inventory Reporting Center</h2>
<p class="text-secondary font-medium max-w-2xl">Compliance Art. 177: Detailed Valuation using Costo Promedio Ponderado (Weighted Average Cost). Real-time stock audit and kinetic turnover analysis.</p>
</div>
<div class="flex items-center gap-3">
<button class="flex items-center gap-2 px-4 py-2.5 bg-surface-container-high text-on-surface-variant font-bold text-[11px] tracking-widest uppercase hover:scale-105 transition-transform">
<span class="material-symbols-outlined text-sm">picture_as_pdf</span>
                        Export PDF
                    </button>
<button class="flex items-center gap-2 px-4 py-2.5 bg-primary text-on-primary font-bold text-[11px] tracking-widest uppercase hover:scale-105 transition-transform">
<span class="material-symbols-outlined text-sm">table_view</span>
                        Export Excel
                    </button>
</div>
</div>
<!-- Bento Stats Grid -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6">
<div class="md:col-span-2 bg-primary-container p-8 relative overflow-hidden flex flex-col justify-between min-h-[220px]">
<div class="relative z-10">
<div class="text-[10px] font-black uppercase tracking-[0.2em] mb-1 opacity-80">Total Inventory Valuation</div>
<div class="text-5xl font-black tracking-tighter text-on-primary-container">$4,892,450.00</div>
</div>
<div class="relative z-10 flex items-center gap-4 text-on-primary-container/70">
<div class="flex items-center gap-1 font-bold text-xs">
<span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">trending_up</span>
                            +12.4% vs Last Quarter
                        </div>
<div class="text-[10px] font-bold uppercase tracking-widest">Weighted Average Logic Applied</div>
</div>
<div class="absolute -right-10 -bottom-10 opacity-10">
<span class="material-symbols-outlined text-[200px]" style="font-variation-settings: 'wght' 700;">calculate</span>
</div>
</div>
<div class="bg-surface-container-lowest p-6 flex flex-col justify-between">
<div>
<div class="text-[10px] font-black text-secondary uppercase tracking-[0.2em] mb-4">Critical Stock Alerts</div>
<div class="text-4xl font-black text-error">18</div>
</div>
<div class="text-xs font-bold text-error bg-error-container/30 py-1 px-2 w-fit">Requires Immediate Reorder</div>
</div>
<div class="bg-surface-container-lowest p-6 flex flex-col justify-between">
<div>
<div class="text-[10px] font-black text-secondary uppercase tracking-[0.2em] mb-4">Stock Turnover Rate</div>
<div class="text-4xl font-black">4.2x</div>
</div>
<div class="text-xs font-bold text-primary bg-primary-container/20 py-1 px-2 w-fit">Optimal Efficiency</div>
</div>
</div>
<!-- Kinetic Turnover Chart & Critical Items -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
<div class="lg:col-span-2 bg-surface-container-low p-8 rounded-lg relative">
<div class="flex items-center justify-between mb-8">
<h3 class="text-xl font-bold uppercase tracking-tight">Stock Turnover Kinetic Analysis</h3>
<div class="flex items-center gap-2">
<span class="w-3 h-3 bg-primary"></span>
<span class="text-[10px] font-black uppercase tracking-widest">Volume Flux</span>
</div>
</div>
<!-- Placeholder for Chart.js Visual -->
<div class="h-[300px] flex items-end gap-3 px-4 border-b border-outline-variant/30">
<div class="flex-1 bg-stone-300 h-[40%] transition-all hover:bg-primary"></div>
<div class="flex-1 bg-stone-300 h-[60%] transition-all hover:bg-primary"></div>
<div class="flex-1 bg-stone-300 h-[45%] transition-all hover:bg-primary"></div>
<div class="flex-1 bg-primary h-[85%] transition-all"></div>
<div class="flex-1 bg-stone-300 h-[70%] transition-all hover:bg-primary"></div>
<div class="flex-1 bg-stone-300 h-[50%] transition-all hover:bg-primary"></div>
<div class="flex-1 bg-stone-300 h-[90%] transition-all hover:bg-primary"></div>
<div class="flex-1 bg-stone-300 h-[55%] transition-all hover:bg-primary"></div>
<div class="flex-1 bg-stone-300 h-[40%] transition-all hover:bg-primary"></div>
<div class="flex-1 bg-stone-300 h-[65%] transition-all hover:bg-primary"></div>
<div class="flex-1 bg-primary-container h-[95%] transition-all"></div>
<div class="flex-1 bg-stone-300 h-[60%] transition-all hover:bg-primary"></div>
</div>
<div class="flex justify-between mt-4 text-[10px] font-bold text-stone-500 tracking-widest uppercase">
<span>Jan</span><span>Feb</span><span>Mar</span><span>Apr</span><span>May</span><span>Jun</span><span>Jul</span><span>Aug</span><span>Sep</span><span>Oct</span><span>Nov</span><span>Dec</span>
</div>
</div>
<div class="bg-inverse-surface text-inverse-on-surface p-8">
<div class="flex items-center justify-between mb-6">
<h3 class="text-lg font-bold uppercase tracking-tight">Priority Reorder</h3>
<span class="material-symbols-outlined text-primary-fixed">warning</span>
</div>
<div class="space-y-6">
<div class="border-l-2 border-primary-fixed pl-4">
<div class="text-[10px] font-black uppercase tracking-widest opacity-50 mb-1">SKU: TRB-902-X</div>
<div class="text-sm font-bold uppercase mb-1">High-Pressure Turbine Seal</div>
<div class="flex justify-between items-center">
<span class="text-xs">Stock: 2 units</span>
<span class="text-xs text-primary-fixed font-bold">Min: 15 units</span>
</div>
</div>
<div class="border-l-2 border-primary-fixed pl-4">
<div class="text-[10px] font-black uppercase tracking-widest opacity-50 mb-1">SKU: GRX-44-LUB</div>
<div class="text-sm font-bold uppercase mb-1">Synthetic Gear Lubricant (50L)</div>
<div class="flex justify-between items-center">
<span class="text-xs">Stock: 5 units</span>
<span class="text-xs text-primary-fixed font-bold">Min: 40 units</span>
</div>
</div>
<div class="border-l-2 border-stone-600 pl-4">
<div class="text-[10px] font-black uppercase tracking-widest opacity-50 mb-1">SKU: CRV-11-FLT</div>
<div class="text-sm font-bold uppercase mb-1">Ind. Grade Carbon Filter</div>
<div class="flex justify-between items-center">
<span class="text-xs">Stock: 12 units</span>
<span class="text-xs text-primary-fixed font-bold">Min: 25 units</span>
</div>
</div>
</div>
<button class="w-full mt-8 py-3 bg-primary-fixed text-on-primary-fixed font-black text-[10px] tracking-widest uppercase">Generate Bulk Order</button>
</div>
</div>
<!-- Kardex & Valuation Table -->
<div class="bg-surface-container-low overflow-hidden">
<div class="p-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
<div>
<h3 class="text-xl font-bold uppercase tracking-tight">Kardex Central Registry</h3>
<p class="text-xs font-medium text-secondary">History of movements and Weighted Average Cost valuation (Art. 177)</p>
</div>
<div class="flex items-center gap-2">
<select class="bg-surface border-none text-[10px] font-bold tracking-widest py-2 px-4 focus:ring-1 focus:ring-primary">
<option>ALL PRODUCT CATEGORIES</option>
<option>RAW MATERIALS</option>
<option>FINISHED GOODS</option>
</select>
<select class="bg-surface border-none text-[10px] font-bold tracking-widest py-2 px-4 focus:ring-1 focus:ring-primary">
<option>LAST 30 DAYS</option>
<option>CURRENT FISCAL YEAR</option>
</select>
</div>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-stone-200/50 text-[10px] font-black uppercase tracking-widest text-on-surface-variant">
<th class="px-8 py-4">Transaction Date</th>
<th class="px-8 py-4">Item Identification</th>
<th class="px-8 py-4">Type</th>
<th class="px-8 py-4 text-right">Qty Change</th>
<th class="px-8 py-4 text-right">Unit Cost (Avg)</th>
<th class="px-8 py-4 text-right">Total Valuation</th>
<th class="px-8 py-4">Ref. Doc</th>
</tr>
</thead>
<tbody class="text-xs font-semibold divide-y divide-stone-200/30">
<tr class="bg-surface hover:bg-stone-100 transition-colors">
<td class="px-8 py-4">2023-11-24 09:12</td>
<td class="px-8 py-4">
<div class="font-bold">HEAVY-DUTY PISTON ARM</div>
<div class="text-[9px] text-secondary">SKU: HDPA-1002</div>
</td>
<td class="px-8 py-4">
<span class="inline-flex items-center gap-1 text-primary">
<span class="material-symbols-outlined text-xs">arrow_downward</span>
                                        PURCHASE
                                    </span>
</td>
<td class="px-8 py-4 text-right">+450</td>
<td class="px-8 py-4 text-right">$1,240.00</td>
<td class="px-8 py-4 text-right font-bold">$558,000.00</td>
<td class="px-8 py-4 font-mono text-[10px] opacity-60">PO-88210-FG</td>
</tr>
<tr class="bg-surface-container-low hover:bg-stone-100 transition-colors">
<td class="px-8 py-4">2023-11-24 11:45</td>
<td class="px-8 py-4">
<div class="font-bold">TITANIUM VALVE ASSEMBLY</div>
<div class="text-[9px] text-secondary">SKU: TVA-009-S</div>
</td>
<td class="px-8 py-4">
<span class="inline-flex items-center gap-1 text-orange-600">
<span class="material-symbols-outlined text-xs">arrow_upward</span>
                                        SALE
                                    </span>
</td>
<td class="px-8 py-4 text-right">-120</td>
<td class="px-8 py-4 text-right">$2,890.50</td>
<td class="px-8 py-4 text-right font-bold">$346,860.00</td>
<td class="px-8 py-4 font-mono text-[10px] opacity-60">INV-441092</td>
</tr>
<tr class="bg-surface hover:bg-stone-100 transition-colors">
<td class="px-8 py-4">2023-11-23 15:20</td>
<td class="px-8 py-4">
<div class="font-bold">HYDRAULIC PUMP FLUID (L)</div>
<div class="text-[9px] text-secondary">SKU: HPF-99-B</div>
</td>
<td class="px-8 py-4">
<span class="inline-flex items-center gap-1 text-primary">
<span class="material-symbols-outlined text-xs">arrow_downward</span>
                                        PURCHASE
                                    </span>
</td>
<td class="px-8 py-4 text-right">+2,000</td>
<td class="px-8 py-4 text-right">$45.12</td>
<td class="px-8 py-4 text-right font-bold">$90,240.00</td>
<td class="px-8 py-4 font-mono text-[10px] opacity-60">PO-88195-FG</td>
</tr>
<tr class="bg-surface-container-low hover:bg-stone-100 transition-colors">
<td class="px-8 py-4">2023-11-23 16:05</td>
<td class="px-8 py-4">
<div class="font-bold">HEAVY-DUTY PISTON ARM</div>
<div class="text-[9px] text-secondary">SKU: HDPA-1002</div>
</td>
<td class="px-8 py-4">
<span class="inline-flex items-center gap-1 text-error">
<span class="material-symbols-outlined text-xs">error</span>
                                        ADJUSTMENT
                                    </span>
</td>
<td class="px-8 py-4 text-right">-5</td>
<td class="px-8 py-4 text-right">$1,240.00</td>
<td class="px-8 py-4 text-right font-bold">$6,200.00</td>
<td class="px-8 py-4 font-mono text-[10px] opacity-60">AUDIT-X9</td>
</tr>
<tr class="bg-surface hover:bg-stone-100 transition-colors">
<td class="px-8 py-4">2023-11-22 08:30</td>
<td class="px-8 py-4">
<div class="font-bold">GRAPHITE GASKET PACK</div>
<div class="text-[9px] text-secondary">SKU: GGP-223</div>
</td>
<td class="px-8 py-4">
<span class="inline-flex items-center gap-1 text-orange-600">
<span class="material-symbols-outlined text-xs">arrow_upward</span>
                                        SALE
                                    </span>
</td>
<td class="px-8 py-4 text-right">-500</td>
<td class="px-8 py-4 text-right">$12.50</td>
<td class="px-8 py-4 text-right font-bold">$6,250.00</td>
<td class="px-8 py-4 font-mono text-[10px] opacity-60">INV-441050</td>
</tr>
</tbody>
</table>
</div>
<div class="p-6 bg-stone-200/30 flex justify-between items-center text-[10px] font-black uppercase tracking-widest">
<div class="flex gap-4">
<button class="hover:text-primary transition-colors">First</button>
<button class="hover:text-primary transition-colors">Prev</button>
</div>
<div class="flex items-center gap-2">
<span class="w-6 h-6 bg-primary text-on-primary flex items-center justify-center">1</span>
<span class="w-6 h-6 hover:bg-stone-300 flex items-center justify-center cursor-pointer">2</span>
<span class="w-6 h-6 hover:bg-stone-300 flex items-center justify-center cursor-pointer">3</span>
<span>...</span>
<span class="w-6 h-6 hover:bg-stone-300 flex items-center justify-center cursor-pointer">42</span>
</div>
<div class="flex gap-4">
<button class="hover:text-primary transition-colors">Next</button>
<button class="hover:text-primary transition-colors">Last</button>
</div>
</div>
</div>
<!-- Technical Disclosure Section -->
<div class="bg-surface-container-high p-8 grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
<div>
<h4 class="text-sm font-black uppercase tracking-[0.2em] mb-4">Regulatory Compliance Detail</h4>
<p class="text-xs text-secondary leading-relaxed mb-4">
                        All valuations presented in this report are calculated in strict adherence to <strong>Art. 177 - Weighted Average Cost (Costo Promedio Ponderado)</strong>. This method ensures that the cost of each item is determined from the weighted average of the cost of similar items at the beginning of a period and the cost of similar items purchased or produced during the period.
                    </p>
<p class="text-xs text-secondary leading-relaxed">
                        Audit trail is maintained for every transaction. Adjustments for physical inventory counts are logged separately and require supervisor validation.
                    </p>
</div>
<div class="grid grid-cols-2 gap-4">
<div class="bg-surface p-4 border-l-4 border-primary">
<div class="text-[9px] font-black uppercase opacity-50 mb-1">Last Audit Date</div>
<div class="text-sm font-bold uppercase">Oct 30, 2023</div>
</div>
<div class="bg-surface p-4 border-l-4 border-primary">
<div class="text-[9px] font-black uppercase opacity-50 mb-1">Accuracy Index</div>
<div class="text-sm font-bold uppercase">99.82%</div>
</div>
<div class="bg-surface p-4 border-l-4 border-primary">
<div class="text-[9px] font-black uppercase opacity-50 mb-1">Fiscal Status</div>
<div class="text-sm font-bold uppercase text-lime-600">Compliant</div>
</div>
<div class="bg-surface p-4 border-l-4 border-primary">
<div class="text-[9px] font-black uppercase opacity-50 mb-1">Asset Turnover</div>
<div class="text-sm font-bold uppercase">Optimized</div>
</div>
</div>
</div>
</main>
@endsection

@push('scripts')
    <script src="/frontend/public/erp/js/reportes-inventario.js"></script>
@endpush
