@extends('layouts.erp')

@section('title', 'Accounting Reporting Center | INDUSTRIAL FORGE ERP | ERP La Cima')

@push('styles')
    <link rel="stylesheet" href="/frontend/public/erp/css/reportes-contables.css">
@endpush

@section('content')
<script>
  document.addEventListener('DOMContentLoaded', () => {
      const b = document.getElementById('breadcrumbPage');
      if(b) b.innerText = 'P�gina';
  });
</script>

<main class="flex-1 flex flex-col min-w-0 bg-surface">
<!-- TopNavBar (Shared Component) -->
<header class="bg-surface dark:bg-stone-950/80 backdrop-blur-xl docked full-width top-0 z-50 flex justify-between items-center w-full px-6 py-4 mx-auto tonal-shift-no-borders bg-stone-100 dark:bg-stone-900 sticky top-0">
<div class="flex items-center gap-8">
<div class="font-['Space_Grotesk'] uppercase tracking-tight text-xl font-bold tracking-tighter text-stone-900 dark:text-stone-50">
                    INDUSTRIAL <span class="text-lime-600 dark:text-lime-400">FORGE</span> ERP
                </div>
<div class="hidden lg:flex items-center bg-surface-container-low px-3 py-1.5 rounded-sm">
<span class="material-symbols-outlined text-stone-400 text-sm mr-2" data-icon="search">search</span>
<input class="bg-transparent border-none focus:ring-0 text-xs w-64 text-on-surface-variant p-0" placeholder="Search Ledgers..." type="text"/>
</div>
</div>
<div class="flex items-center gap-6">
<nav class="hidden md:flex items-center gap-6 font-['Space_Grotesk'] uppercase tracking-tight text-[11px] font-bold">
<a class="text-stone-500 dark:text-stone-400 hover:text-lime-500 dark:hover:text-lime-300 transition-colors scale-98-on-click duration-200" href="#">Dashboard</a>
<a class="text-stone-500 dark:text-stone-400 hover:text-lime-500 dark:hover:text-lime-300 transition-colors scale-98-on-click duration-200" href="#">Analytics</a>
<a class="text-lime-600 dark:text-lime-400 border-b-2 border-lime-600 dark:border-lime-400 pb-1" href="#">Reports</a>
<a class="text-stone-500 dark:text-stone-400 hover:text-lime-500 dark:hover:text-lime-300 transition-colors scale-98-on-click duration-200" href="#">Settings</a>
</nav>
<div class="flex items-center gap-3 border-l border-stone-200 dark:border-stone-800 pl-6">
<button class="text-stone-500 hover:text-lime-600 transition-colors relative">
<span class="material-symbols-outlined" data-icon="notifications">notifications</span>
<span class="absolute top-0 right-0 w-2 h-2 bg-error rounded-full border-2 border-surface"></span>
</button>
<button class="text-stone-500 hover:text-lime-600 transition-colors">
<span class="material-symbols-outlined" data-icon="help_outline">help_outline</span>
</button>
<div class="w-8 h-8 rounded-full bg-stone-200 overflow-hidden ring-2 ring-lime-500/20">
<img alt="User Profile Avatar" class="w-full h-full object-cover" data-alt="close-up portrait of a professional accountant in a modern office with glasses and a friendly neutral expression" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC87rTxr1Q47lGnTvJ1zmFKXogjRWKybFuzS3EtyNQO_2hMq_3IpUoUKrgXLdH9p3KT_v9-lUbhSj22leo9PJ0NIHkgBk0nuDm7I96ZCw5ZGbc-iCjZf7n3BSMywOzzJBS2IC1SGrUMpmrlu1aesJK6xzaFwO1NlBvnNOKcg0shjOOSG4nJBj1vlH7XxRzQRa8PAXHSpkuhqTNNjWy4O3VCITnSzbYkoMOh0Eo-8z4rxGzfw20MN6sLlEc0G_bo0FXBH-Fc6c6Z82Q"/>
</div>
</div>
</div>
</header>
<!-- Content Area -->
<div class="p-6 md:p-8 space-y-8 max-w-[1400px] mx-auto w-full">
<!-- Page Header / Context -->
<div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
<div>
<h1 class="text-3xl font-black uppercase tracking-tighter text-stone-900 flex items-center gap-3">
                        Accounting Reporting Center
                        <span class="text-xs bg-primary-container text-on-primary-container px-2 py-0.5 rounded-sm font-bold tracking-widest align-middle">FISCAL 2024</span>
</h1>
<p class="text-stone-500 text-sm mt-1 max-w-2xl">High-precision ledger activity, automated trial balances (Sumas y Saldos), and comprehensive fiscal compliance summaries for IVA and ISLR.</p>
</div>
<div class="flex gap-2">
<button class="bg-surface-container-high text-on-surface px-4 py-2 font-bold text-[10px] tracking-widest uppercase flex items-center gap-2 rounded-sm border border-outline-variant/15 hover:bg-surface-container-highest transition-colors">
<span class="material-symbols-outlined text-sm" data-icon="calendar_month">calendar_month</span>
                        APR 01 - APR 30
                    </button>
<button class="bg-primary text-on-primary px-5 py-2 font-black text-[10px] tracking-widest uppercase flex items-center gap-2 rounded-sm shadow-lg shadow-primary/10 hover:scale-105 transition-transform">
<span class="material-symbols-outlined text-sm" data-icon="print">print</span>
                        GENERATE AUDIT PACK
                    </button>
</div>
</div>
<!-- Bento Grid of Metrics -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6">
<!-- Sumas y Saldos Summary -->
<div class="md:col-span-2 bg-surface-container-lowest p-6 flex flex-col justify-between min-h-[160px] relative overflow-hidden group">
<div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
<span class="material-symbols-outlined text-7xl" data-icon="account_balance_wallet">account_balance_wallet</span>
</div>
<div>
<p class="text-[10px] font-black tracking-[0.2em] text-stone-400 uppercase mb-2">Trial Balance Status</p>
<h3 class="text-4xl font-black text-stone-900 tracking-tighter">$14,290,442.<span class="text-lime-600">82</span></h3>
</div>
<div class="flex items-center gap-4 mt-4">
<div class="flex items-center gap-1 text-[10px] font-bold text-success text-lime-700">
<span class="material-symbols-outlined text-xs" data-icon="check_circle">check_circle</span>
                            BALANCED
                        </div>
<div class="h-1 w-24 bg-stone-100 rounded-full overflow-hidden">
<div class="h-full bg-lime-500 w-full"></div>
</div>
<p class="text-[10px] font-bold text-stone-400">DIFF: 0.00 USD</p>
</div>
</div>
<!-- IVA Liability -->
<div class="bg-stone-900 text-stone-50 p-6 flex flex-col justify-between min-h-[160px]">
<div>
<p class="text-[10px] font-black tracking-[0.2em] text-stone-500 uppercase mb-2">Tax Liability (IVA)</p>
<h3 class="text-3xl font-bold tracking-tighter text-lime-400">$412,109.00</h3>
</div>
<div class="text-[10px] font-bold text-stone-400 flex items-center gap-2">
<span class="material-symbols-outlined text-xs text-error" data-icon="warning">warning</span>
                        DUE IN 12 DAYS
                    </div>
</div>
<!-- ISLR Provision -->
<div class="bg-surface-container-lowest p-6 flex flex-col justify-between min-h-[160px] border-l-4 border-primary">
<div>
<p class="text-[10px] font-black tracking-[0.2em] text-stone-400 uppercase mb-2">ISLR Provision</p>
<h3 class="text-3xl font-bold tracking-tighter text-stone-900">$892,330.<span class="text-stone-400">15</span></h3>
</div>
<div class="text-[10px] font-bold text-lime-600 flex items-center gap-2 uppercase tracking-widest">
<span class="material-symbols-outlined text-xs" data-icon="verified_user" style="font-variation-settings: 'FILL' 1;">verified_user</span>
                        Audited State
                    </div>
</div>
</div>
<!-- Tab Navigation for Sections -->
<div class="flex border-b border-outline-variant/20 gap-8 overflow-x-auto pb-px">
<button class="pb-4 border-b-2 border-primary text-primary font-black text-xs tracking-widest uppercase flex items-center gap-2">
<span class="material-symbols-outlined text-sm" data-icon="format_list_bulleted">format_list_bulleted</span>
                    Detailed Ledger
                </button>
<button class="pb-4 text-stone-500 hover:text-stone-800 font-bold text-xs tracking-widest uppercase flex items-center gap-2 transition-colors">
<span class="material-symbols-outlined text-sm" data-icon="balance">balance</span>
                    Sumas y Saldos
                </button>
<button class="pb-4 text-stone-500 hover:text-stone-800 font-bold text-xs tracking-widest uppercase flex items-center gap-2 transition-colors">
<span class="material-symbols-outlined text-sm" data-icon="summarize">summarize</span>
                    Fiscal Summary (IVA/ISLR)
                </button>
<button class="pb-4 text-stone-500 hover:text-stone-800 font-bold text-xs tracking-widest uppercase flex items-center gap-2 transition-colors">
<span class="material-symbols-outlined text-sm" data-icon="history">history</span>
                    Audit Trail
                </button>
</div>
<!-- Main Content: Detailed Ledger Table -->
<div class="space-y-4">
<div class="flex items-center justify-between">
<h2 class="headline text-lg font-bold uppercase tracking-tight text-stone-800">Operational Ledger Activity</h2>
<div class="flex gap-4">
<div class="flex items-center gap-2 text-[10px] font-bold uppercase text-stone-500">
<span class="w-2 h-2 rounded-full bg-lime-500"></span> Posted
                        </div>
<div class="flex items-center gap-2 text-[10px] font-bold uppercase text-stone-500">
<span class="w-2 h-2 rounded-full bg-amber-500"></span> Pending Audit
                        </div>
</div>
</div>
<div class="bg-surface-container-lowest overflow-hidden rounded-sm ring-1 ring-stone-200/50">
<div class="overflow-x-auto technical-scroll">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-surface-container-low border-b border-outline-variant/10">
<th class="px-6 py-4 text-[10px] font-black text-stone-500 uppercase tracking-[0.15em]">Date</th>
<th class="px-6 py-4 text-[10px] font-black text-stone-500 uppercase tracking-[0.15em]">Voucher ID</th>
<th class="px-6 py-4 text-[10px] font-black text-stone-500 uppercase tracking-[0.15em]">Account Description</th>
<th class="px-6 py-4 text-[10px] font-black text-stone-500 uppercase tracking-[0.15em] text-right">Debit</th>
<th class="px-6 py-4 text-[10px] font-black text-stone-500 uppercase tracking-[0.15em] text-right">Credit</th>
<th class="px-6 py-4 text-[10px] font-black text-stone-500 uppercase tracking-[0.15em] text-center">Marker</th>
<th class="px-6 py-4 text-[10px] font-black text-stone-500 uppercase tracking-[0.15em] text-right">Action</th>
</tr>
</thead>
<tbody class="divide-y divide-surface-container">
<!-- Row 1 -->
<tr class="hover:bg-surface-container-low transition-colors group">
<td class="px-6 py-4 font-mono text-[11px] text-stone-600">2024-04-28</td>
<td class="px-6 py-4">
<div class="flex flex-col">
<span class="font-bold text-xs text-stone-900">JV-8829-AF</span>
<span class="text-[10px] text-stone-400">Industrial Engine Ops</span>
</div>
</td>
<td class="px-6 py-4">
<div class="flex items-center gap-2">
<span class="px-2 py-0.5 bg-stone-100 text-stone-500 font-mono text-[10px] rounded-sm">11.02.04.01</span>
<span class="text-xs font-medium text-stone-700">Raw Materials Inventory - Alloy A2</span>
</div>
</td>
<td class="px-6 py-4 text-right font-mono text-xs font-bold text-stone-900">$45,200.00</td>
<td class="px-6 py-4 text-right font-mono text-xs text-stone-400">0.00</td>
<td class="px-6 py-4 text-center">
<span class="inline-flex items-center px-1.5 py-0.5 rounded-full text-[9px] font-black bg-lime-500/10 text-lime-700 border border-lime-500/20 uppercase tracking-tighter">POSTED</span>
</td>
<td class="px-6 py-4 text-right">
<button class="text-stone-400 hover:text-primary transition-colors">
<span class="material-symbols-outlined text-sm" data-icon="open_in_new">open_in_new</span>
</button>
</td>
</tr>
<!-- Row 2 -->
<tr class="hover:bg-surface-container-low transition-colors group">
<td class="px-6 py-4 font-mono text-[11px] text-stone-600">2024-04-28</td>
<td class="px-6 py-4">
<div class="flex flex-col">
<span class="font-bold text-xs text-stone-900">JV-8829-AF</span>
<span class="text-[10px] text-stone-400">Cash Offset</span>
</div>
</td>
<td class="px-6 py-4">
<div class="flex items-center gap-2">
<span class="px-2 py-0.5 bg-stone-100 text-stone-500 font-mono text-[10px] rounded-sm">11.01.01.02</span>
<span class="text-xs font-medium text-stone-700">Main Operating Account - Chase 4402</span>
</div>
</td>
<td class="px-6 py-4 text-right font-mono text-xs text-stone-400">0.00</td>
<td class="px-6 py-4 text-right font-mono text-xs font-bold text-stone-900">$45,200.00</td>
<td class="px-6 py-4 text-center">
<span class="inline-flex items-center px-1.5 py-0.5 rounded-full text-[9px] font-black bg-lime-500/10 text-lime-700 border border-lime-500/20 uppercase tracking-tighter">POSTED</span>
</td>
<td class="px-6 py-4 text-right">
<button class="text-stone-400 hover:text-primary transition-colors">
<span class="material-symbols-outlined text-sm" data-icon="open_in_new">open_in_new</span>
</button>
</td>
</tr>
<!-- Row 3 (Pending) -->
<tr class="hover:bg-surface-container-low transition-colors group">
<td class="px-6 py-4 font-mono text-[11px] text-stone-600">2024-04-29</td>
<td class="px-6 py-4">
<div class="flex flex-col">
<span class="font-bold text-xs text-stone-900">IV-2004-99</span>
<span class="text-[10px] text-stone-400">Precision Lathe Maintenance</span>
</div>
</td>
<td class="px-6 py-4">
<div class="flex items-center gap-2">
<span class="px-2 py-0.5 bg-stone-100 text-stone-500 font-mono text-[10px] rounded-sm">52.01.10.15</span>
<span class="text-xs font-medium text-stone-700">Equipment Maintenance &amp; Repairs</span>
</div>
</td>
<td class="px-6 py-4 text-right font-mono text-xs font-bold text-stone-900">$1,450.00</td>
<td class="px-6 py-4 text-right font-mono text-xs text-stone-400">0.00</td>
<td class="px-6 py-4 text-center">
<span class="inline-flex items-center px-1.5 py-0.5 rounded-full text-[9px] font-black bg-amber-500/10 text-amber-700 border border-amber-500/20 uppercase tracking-tighter">PENDING</span>
</td>
<td class="px-6 py-4 text-right">
<button class="text-stone-400 hover:text-primary transition-colors">
<span class="material-symbols-outlined text-sm" data-icon="open_in_new">open_in_new</span>
</button>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
<!-- Secondary Layout: Fiscal Summary & Audit Sidebar -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
<!-- Tax Reconciliation Block -->
<div class="lg:col-span-2 space-y-4">
<h2 class="headline text-lg font-bold uppercase tracking-tight text-stone-800">Fiscal Compliance Markers</h2>
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
<!-- IVA Summary Card -->
<div class="bg-surface-container-high/50 p-6 rounded-sm border border-outline-variant/15">
<div class="flex items-center justify-between mb-6">
<h4 class="text-xs font-black uppercase tracking-widest text-stone-500">IVA (VAT) Summary</h4>
<span class="material-symbols-outlined text-stone-400" data-icon="receipt_long">receipt_long</span>
</div>
<div class="space-y-4">
<div class="flex justify-between items-center pb-2 border-b border-stone-200">
<span class="text-xs font-medium text-stone-600">IVA Débito (Sales)</span>
<span class="font-mono text-xs font-bold">$1,245,600.00</span>
</div>
<div class="flex justify-between items-center pb-2 border-b border-stone-200">
<span class="text-xs font-medium text-stone-600">IVA Crédito (Purchases)</span>
<span class="font-mono text-xs font-bold text-error">($833,491.00)</span>
</div>
<div class="flex justify-between items-center pt-2">
<span class="text-xs font-black uppercase tracking-tight text-stone-900">Total Tax Payable</span>
<span class="font-mono text-sm font-black text-primary">$412,109.00</span>
</div>
</div>
<button class="w-full mt-6 py-2 bg-stone-900 text-stone-50 text-[10px] font-bold tracking-[0.2em] uppercase hover:bg-stone-800 transition-colors">
                                Download Form 01-IVA
                            </button>
</div>
<!-- ISLR Card -->
<div class="bg-surface-container-lowest p-6 rounded-sm border border-outline-variant/15 shadow-sm">
<div class="flex items-center justify-between mb-6">
<h4 class="text-xs font-black uppercase tracking-widest text-stone-500">ISLR Forecast</h4>
<span class="material-symbols-outlined text-stone-400" data-icon="analytics">analytics</span>
</div>
<div class="flex items-end justify-between">
<div>
<p class="text-[10px] text-stone-400 font-bold uppercase mb-1">Effective Rate</p>
<p class="text-2xl font-black text-stone-900">34.0<span class="text-stone-300">%</span></p>
</div>
<div class="text-right">
<p class="text-[10px] text-stone-400 font-bold uppercase mb-1">Audit Risk Level</p>
<div class="flex items-center gap-1 justify-end">
<div class="w-2 h-2 rounded-full bg-lime-500"></div>
<p class="text-[10px] font-black uppercase text-lime-700">OPTIMIZED</p>
</div>
</div>
</div>
<div class="mt-6 h-12 flex items-end gap-1">
<div class="flex-1 bg-stone-100 h-1/2"></div>
<div class="flex-1 bg-stone-100 h-2/3"></div>
<div class="flex-1 bg-primary h-full"></div>
<div class="flex-1 bg-primary-container h-4/5"></div>
<div class="flex-1 bg-stone-100 h-1/3"></div>
<div class="flex-1 bg-stone-100 h-1/4"></div>
</div>
<p class="mt-4 text-[10px] text-stone-500 italic">Historical data comparison vs Fiscal 2023 Q1 engine sector averages.</p>
</div>
</div>
</div>
<!-- Deep Audit Trails Sidebar -->
<div class="space-y-4">
<h2 class="headline text-lg font-bold uppercase tracking-tight text-stone-800">Audit Pulse</h2>
<div class="bg-surface-container p-6 rounded-sm space-y-6">
<div class="relative pl-6 border-l-2 border-primary/30 space-y-8">
<!-- Audit Item 1 -->
<div class="relative">
<div class="absolute -left-[31px] top-0 w-4 h-4 bg-primary rounded-full ring-4 ring-surface flex items-center justify-center">
<span class="material-symbols-outlined text-[10px] text-on-primary" data-icon="done_all" style="font-variation-settings: 'wght' 700;">done_all</span>
</div>
<div class="space-y-1">
<p class="text-[10px] font-black text-stone-900 uppercase">Year-End Reconciliation</p>
<p class="text-[10px] text-stone-500 font-medium leading-relaxed">Certified by Senior Auditor <strong>A. Chen</strong>. All engine assembly parts accounts verified.</p>
<p class="text-[9px] font-mono text-stone-400">28 APR 14:02:11</p>
</div>
</div>
<!-- Audit Item 2 -->
<div class="relative">
<div class="absolute -left-[31px] top-0 w-4 h-4 bg-stone-400 rounded-full ring-4 ring-surface flex items-center justify-center">
<span class="material-symbols-outlined text-[10px] text-on-primary" data-icon="edit">edit</span>
</div>
<div class="space-y-1">
<p class="text-[10px] font-black text-stone-900 uppercase">Adjustment Entry #901</p>
<p class="text-[10px] text-stone-500 font-medium leading-relaxed">Depreciation recalculation for CNC Machining Unit 04.</p>
<p class="text-[9px] font-mono text-stone-400">27 APR 09:15:55</p>
</div>
</div>
<!-- Audit Item 3 -->
<div class="relative opacity-60">
<div class="absolute -left-[31px] top-0 w-4 h-4 bg-stone-400 rounded-full ring-4 ring-surface flex items-center justify-center">
<span class="material-symbols-outlined text-[10px] text-on-primary" data-icon="history">history</span>
</div>
<div class="space-y-1">
<p class="text-[10px] font-black text-stone-900 uppercase">User Access Review</p>
<p class="text-[10px] text-stone-500 font-medium leading-relaxed">System-wide audit of payroll access permissions.</p>
<p class="text-[9px] font-mono text-stone-400">26 APR 16:40:00</p>
</div>
</div>
</div>
<button class="w-full py-3 bg-transparent border border-outline text-stone-600 text-[10px] font-black tracking-widest uppercase hover:bg-stone-200 transition-colors">
                            View Full Immutable Log
                        </button>
</div>
</div>
</div>
<!-- Graphic Element: Data Flow Schema -->
<div class="bg-surface-container-lowest p-8 rounded-sm overflow-hidden relative border-t-2 border-lime-600 shadow-sm">
<div class="flex flex-col md:flex-row items-center justify-between gap-8">
<div class="z-10 md:w-1/3">
<h3 class="text-xl font-black uppercase tracking-tighter mb-4 leading-tight">Engineered for Fiscal Accuracy</h3>
<p class="text-stone-500 text-xs leading-relaxed">Our precision engine maps every nut, bolt, and man-hour directly into the general ledger with zero manual interpolation, ensuring a perfect audit trail every single fiscal quarter.</p>
</div>
<div class="flex-1 w-full h-32 flex items-center justify-center relative">
<!-- Abstract Visual Flow representing "Precision Blueprint" -->
<div class="absolute inset-0 flex items-center justify-around opacity-20">
<div class="w-px h-full bg-stone-300"></div>
<div class="w-px h-full bg-stone-300"></div>
<div class="w-px h-full bg-stone-300"></div>
<div class="w-px h-full bg-stone-300"></div>
</div>
<div class="relative z-10 flex gap-12">
<div class="flex flex-col items-center gap-2">
<div class="w-10 h-10 bg-stone-100 flex items-center justify-center rounded-sm border border-stone-200">
<span class="material-symbols-outlined text-stone-400" data-icon="precision_manufacturing">precision_manufacturing</span>
</div>
<span class="text-[9px] font-bold text-stone-400 uppercase tracking-widest">Inflow</span>
</div>
<div class="flex items-center">
<div class="h-0.5 w-16 bg-gradient-to-r from-stone-200 to-lime-500"></div>
<div class="w-2 h-2 bg-lime-500 rotate-45"></div>
</div>
<div class="flex flex-col items-center gap-2">
<div class="w-10 h-10 bg-lime-500 flex items-center justify-center rounded-sm">
<span class="material-symbols-outlined text-white" data-icon="account_balance">account_balance</span>
</div>
<span class="text-[9px] font-bold text-lime-600 uppercase tracking-widest">Forge Ledger</span>
</div>
<div class="flex items-center">
<div class="h-0.5 w-16 bg-gradient-to-r from-lime-500 to-stone-200"></div>
<div class="w-2 h-2 bg-stone-400 rotate-45"></div>
</div>
<div class="flex flex-col items-center gap-2">
<div class="w-10 h-10 bg-stone-100 flex items-center justify-center rounded-sm border border-stone-200">
<span class="material-symbols-outlined text-stone-400" data-icon="description">description</span>
</div>
<span class="text-[9px] font-bold text-stone-400 uppercase tracking-widest">Compliance</span>
</div>
</div>
</div>
</div>
</div>
</div>
</main>
@endsection

@push('scripts')
    <script src="/frontend/public/erp/js/reportes-contables.js"></script>
@endpush
