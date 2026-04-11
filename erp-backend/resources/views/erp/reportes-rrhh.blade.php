@extends('layouts.erp')

@section('title', 'INDUSTRIAL FORGE ERP - HR Reporting Center | ERP La Cima')

@push('styles')
    <link rel="stylesheet" href="/frontend/public/erp/css/reportes-rrhh.css">
@endpush

@section('content')
<script>
  document.addEventListener('DOMContentLoaded', () => {
      const b = document.getElementById('breadcrumbPage');
      if(b) b.innerText = 'Página';
  });
</script>

<main class="flex-1 min-h-screen p-8 lg:p-12 overflow-x-hidden">
<!-- Header Section -->
<div class="mb-12 border-l-8 border-primary pl-6">
<h1 class="text-5xl font-['Space_Grotesk'] font-bold uppercase tracking-tighter text-on-surface mb-2">HR REPORTING CENTER</h1>
<p class="text-secondary font-['Inter'] uppercase text-xs tracking-[0.3em] font-semibold">Industrial Force HR Management / Reporting Suite V2.4</p>
</div>
<!-- Dashboard Bento Grid -->
<div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-12">
<!-- Payroll Overview -->
<div class="md:col-span-2 bg-surface-container-lowest p-8 rounded-none relative overflow-hidden group">
<div class="absolute top-0 right-0 w-32 h-32 bg-primary/5 -mr-16 -mt-16 rounded-full group-hover:scale-150 transition-transform duration-500"></div>
<div class="flex justify-between items-start relative z-10 mb-8">
<div>
<span class="text-[10px] font-bold tracking-widest text-primary uppercase">Financial Period: OCT 2023</span>
<h3 class="text-2xl font-headline font-bold uppercase mt-1">Payroll Distribution</h3>
</div>
<span class="material-symbols-outlined text-primary text-4xl">payments</span>
</div>
<div class="flex items-end gap-4 mb-6">
<span class="text-5xl font-headline font-bold">$428,950</span>
<span class="text-lime-600 font-bold mb-2 flex items-center text-sm"><span class="material-symbols-outlined text-sm">arrow_upward</span> 3.2%</span>
</div>
<div class="grid grid-cols-2 gap-4 border-t border-surface-container pt-6">
<div>
<p class="text-[10px] text-secondary uppercase font-bold tracking-tighter">Direct Labor</p>
<p class="font-headline font-bold text-lg">$312,400</p>
</div>
<div>
<p class="text-[10px] text-secondary uppercase font-bold tracking-tighter">Administrative</p>
<p class="font-headline font-bold text-lg">$116,550</p>
</div>
</div>
</div>
<!-- Compliance Box -->
<div class="bg-surface-container-high p-8 flex flex-col justify-between">
<div>
<h3 class="text-lg font-headline font-bold uppercase mb-6 flex items-center gap-2">
<span class="material-symbols-outlined text-primary">verified_user</span> 
                            Compliance
                        </h3>
<div class="space-y-4">
<div class="flex justify-between items-center">
<span class="text-xs font-bold font-['Inter']">IVSS</span>
<span class="px-2 py-0.5 bg-lime-500 text-[10px] font-black text-on-primary">VALID</span>
</div>
<div class="flex justify-between items-center">
<span class="text-xs font-bold font-['Inter']">INCES</span>
<span class="px-2 py-0.5 bg-lime-500 text-[10px] font-black text-on-primary">VALID</span>
</div>
<div class="flex justify-between items-center">
<span class="text-xs font-bold font-['Inter']">FAOV</span>
<span class="px-2 py-0.5 bg-amber-500 text-[10px] font-black text-white">RENEWAL</span>
</div>
</div>
</div>
<button class="text-[10px] font-bold text-primary text-left uppercase tracking-widest mt-8 flex items-center gap-2 group">
                        VIEW CERTIFICATES <span class="material-symbols-outlined text-sm group-hover:translate-x-1 transition-transform">arrow_forward</span>
</button>
</div>
<!-- Turnover Metric -->
<div class="bg-primary text-on-primary p-8 flex flex-col justify-center items-center text-center">
<span class="text-[10px] font-black tracking-[0.2em] uppercase mb-2 opacity-80">Employee Turnover</span>
<span class="text-7xl font-headline font-bold leading-none">4.2%</span>
<span class="text-xs font-medium mt-2 opacity-80 italic">Industry Benchmark: 8.5%</span>
<div class="w-full bg-on-primary/20 h-1 mt-6">
<div class="bg-on-primary h-full w-[42%]"></div>
</div>
</div>
</div>
<!-- Secondary Layout: Performance & Accruals -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
<!-- Performance Summaries (Asymmetric Layout) -->
<div class="lg:col-span-2 space-y-6">
<div class="flex justify-between items-end mb-4">
<h2 class="text-2xl font-headline font-bold uppercase tracking-tight">Performance Summaries</h2>
<span class="text-xs font-bold text-secondary uppercase tracking-widest">Q3 Engineering Division</span>
</div>
<div class="space-y-4">
<!-- Employee Card 1 -->
<div class="bg-surface-container-low p-6 flex items-center gap-6 group hover:bg-surface-container transition-colors border-l-4 border-transparent hover:border-primary">
<img class="w-16 h-16 object-cover grayscale group-hover:grayscale-0 transition-all" data-alt="close-up portrait of a female industrial engineer wearing safety goggles and a hard hat in a workshop background" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAcYX_zLz4F-DIHW5ZLEjUqYN4nGjcTEtmmOwH0_DUiakbBAy0CUGvFTaPoZZyGtOxzjzlyWX--jlhduQDi4no6mq7_Un77OIrXmNKwpcdU_BKEOzbYhFcfo0FSDMYOiDPk47P0QXv_CS4QtD-5of3womt9KzZAF6ysXeg3OlTUILC0LxCswoAxkJG32I4_16V1y1ZBPzB67zQi62CN-Ng330sX-J3JBrzEUFdYnMrwpyiVzVy9lGfqx--YA_34tRuz-Z4ybqDx7O8"/>
<div class="flex-1">
<div class="flex justify-between">
<h4 class="font-headline font-bold uppercase text-lg">Elena Rodriguez</h4>
<span class="text-[10px] font-bold text-primary">PROJECT LEAD</span>
</div>
<p class="text-xs text-secondary mt-1 max-w-md">Exceeded Q3 production targets by 15%. Demonstrated exceptional lead in the Forge-X integration project.</p>
</div>
<div class="text-right">
<p class="text-[10px] text-secondary uppercase font-bold">Rating</p>
<p class="text-2xl font-headline font-bold text-primary">4.9</p>
</div>
</div>
<!-- Employee Card 2 -->
<div class="bg-surface-container-low p-6 flex items-center gap-6 group hover:bg-surface-container transition-colors border-l-4 border-transparent hover:border-primary">
<img class="w-16 h-16 object-cover grayscale group-hover:grayscale-0 transition-all" data-alt="professional portrait of a male mechanic in a dark uniform with a focused and serious expression" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAeSVfecYM00jYZTucel3zKrJLOggw7-Mc-j61TF7DzFAhKzOUa4dQb4pyG3CQdNzlUx0BJtOP5RVDFAD3oT2TTTZUFO3oWcE1kLj3elnpLPKHLMF2tatbxnSJOGdRK3S7FKoV5RrdANAi-fRYs_uSpVPoHobyY_KyWmr2YjrKagGQhoczIeG6ELGpbpTCTbPT0CAHSFKEtrYxQbNVbqDZSFYz38y3NFqFoofLLGmXa_yUZORRz1pqkWvA6UoJ-CWV8jd8nAQ2DwlM"/>
<div class="flex-1">
<div class="flex justify-between">
<h4 class="font-headline font-bold uppercase text-lg">Marcus Thorne</h4>
<span class="text-[10px] font-bold text-primary">SENIOR TECHNICIAN</span>
</div>
<p class="text-xs text-secondary mt-1 max-w-md">Consistent performance in maintenance cycles. Instrumental in reducing downtime of the hydraulic press by 20%.</p>
</div>
<div class="text-right">
<p class="text-[10px] text-secondary uppercase font-bold">Rating</p>
<p class="text-2xl font-headline font-bold text-primary">4.7</p>
</div>
</div>
<!-- Employee Card 3 -->
<div class="bg-surface-container-low p-6 flex items-center gap-6 group hover:bg-surface-container transition-colors border-l-4 border-transparent hover:border-primary">
<img class="w-16 h-16 object-cover grayscale group-hover:grayscale-0 transition-all" data-alt="professional portrait of a black woman in business attire with a confident smile in a bright office environment" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAO5pGRox9jSQmMtsdPOcQymeo4pZLVpq3yvO3kwHC8a7RMvTIWvqyVAbOl9458KGaWo0QjZFFIqjWnRl7lGv_xmtfbCtCKxbOiMRtX6E7ppI0xw-yCcgAl_WAVX_q2kOD16M66-DVNYVavvVHlgcbvb6l9M5ODfhwZJFrsXuU7dZ8Rd3Xb2RzdlF_BU4rbBouW7hU2w4G4vk4r3GuDNVM0NneF0JuMgMRWlvVsgBQO5hLec7tN4vZr1Nm-PYsLxtyQtrQIee1easo"/>
<div class="flex-1">
<div class="flex justify-between">
<h4 class="font-headline font-bold uppercase text-lg">Sarah Jenkins</h4>
<span class="text-[10px] font-bold text-primary">LOGISTICS COORDINATOR</span>
</div>
<p class="text-xs text-secondary mt-1 max-w-md">Optimized supply chain routes during the regional strike. Achieved zero delay in crucial parts delivery.</p>
</div>
<div class="text-right">
<p class="text-[10px] text-secondary uppercase font-bold">Rating</p>
<p class="text-2xl font-headline font-bold text-primary">4.8</p>
</div>
</div>
</div>
</div>
<!-- Vacation Accrual Tracking -->
<div class="bg-inverse-surface text-inverse-on-surface p-8 relative">
<h2 class="text-2xl font-headline font-bold uppercase mb-8 border-b border-white/10 pb-4">Vacation Accruals</h2>
<div class="space-y-8">
<div>
<div class="flex justify-between text-[10px] font-bold uppercase tracking-widest mb-2">
<span>Pending Approval</span>
<span>142 Days Total</span>
</div>
<div class="h-2 bg-white/10">
<div class="h-full bg-primary w-2/3"></div>
</div>
</div>
<div class="space-y-4 overflow-y-auto max-h-[400px] pr-2 no-scrollbar">
<!-- Accrual Item -->
<div class="flex justify-between items-center py-3 border-b border-white/5">
<div>
<p class="font-headline font-bold text-sm">Industrial Ops Team</p>
<p class="text-[10px] opacity-60">Avg. 12.5 days/person</p>
</div>
<span class="bg-white/10 px-3 py-1 text-[10px] font-bold">HIGH LOAD</span>
</div>
<div class="flex justify-between items-center py-3 border-b border-white/5">
<div>
<p class="font-headline font-bold text-sm">Design Bureau</p>
<p class="text-[10px] opacity-60">Avg. 18.2 days/person</p>
</div>
<span class="bg-primary/20 text-primary-fixed px-3 py-1 text-[10px] font-bold">AVAIL</span>
</div>
<div class="flex justify-between items-center py-3 border-b border-white/5">
<div>
<p class="font-headline font-bold text-sm">Admin &amp; HR</p>
<p class="text-[10px] opacity-60">Avg. 9.1 days/person</p>
</div>
<span class="bg-white/10 px-3 py-1 text-[10px] font-bold">CRITICAL</span>
</div>
<div class="flex justify-between items-center py-3 border-b border-white/5">
<div>
<p class="font-headline font-bold text-sm">Sales Division</p>
<p class="text-[10px] opacity-60">Avg. 15.0 days/person</p>
</div>
<span class="bg-primary/20 text-primary-fixed px-3 py-1 text-[10px] font-bold">AVAIL</span>
</div>
</div>
<button class="w-full border-2 border-primary text-primary py-3 text-[10px] font-bold uppercase tracking-widest hover:bg-primary hover:text-on-primary transition-all">
                            GENERATE ACCRUAL FORECAST
                        </button>
</div>
</div>
</div>
<!-- Technical Detail Table (No Borders) -->
<div class="mt-16 overflow-hidden">
<div class="flex justify-between items-center mb-6">
<h3 class="text-xl font-headline font-bold uppercase flex items-center gap-3">
<span class="w-3 h-3 bg-primary"></span>
                        Social Benefits Compliance Ledger
                    </h3>
<div class="flex gap-2">
<button class="bg-surface-container-high px-4 py-2 text-[10px] font-bold uppercase tracking-tighter">PDF</button>
<button class="bg-surface-container-high px-4 py-2 text-[10px] font-bold uppercase tracking-tighter">CSV</button>
</div>
</div>
<div class="w-full">
<table class="w-full text-left font-['Inter']">
<thead>
<tr class="bg-surface-container-highest">
<th class="p-4 text-[10px] font-bold uppercase tracking-widest text-secondary">Department</th>
<th class="p-4 text-[10px] font-bold uppercase tracking-widest text-secondary">Employee Count</th>
<th class="p-4 text-[10px] font-bold uppercase tracking-widest text-secondary">IVSS Contribution</th>
<th class="p-4 text-[10px] font-bold uppercase tracking-widest text-secondary">INCES (2%)</th>
<th class="p-4 text-[10px] font-bold uppercase tracking-widest text-secondary">FAOV (1%)</th>
<th class="p-4 text-[10px] font-bold uppercase tracking-widest text-secondary">Status</th>
</tr>
</thead>
<tbody class="text-xs">
<tr class="bg-surface hover:bg-surface-container-low transition-colors">
<td class="p-4 font-bold">Engineering - Havy Duty</td>
<td class="p-4">124</td>
<td class="p-4">$12,450.00</td>
<td class="p-4">$2,490.00</td>
<td class="p-4">$1,245.00</td>
<td class="p-4 text-lime-600 font-bold uppercase tracking-tighter">Paid</td>
</tr>
<tr class="bg-surface-container-low hover:bg-surface-container transition-colors">
<td class="p-4 font-bold">Logistics &amp; Warehousing</td>
<td class="p-4">86</td>
<td class="p-4">$8,120.50</td>
<td class="p-4">$1,624.10</td>
<td class="p-4">$812.05</td>
<td class="p-4 text-lime-600 font-bold uppercase tracking-tighter">Paid</td>
</tr>
<tr class="bg-surface hover:bg-surface-container-low transition-colors">
<td class="p-4 font-bold">Administration Headquarters</td>
<td class="p-4">42</td>
<td class="p-4">$9,800.00</td>
<td class="p-4">$1,960.00</td>
<td class="p-4">$980.00</td>
<td class="p-4 text-amber-500 font-bold uppercase tracking-tighter">Pending</td>
</tr>
<tr class="bg-surface-container-low hover:bg-surface-container transition-colors">
<td class="p-4 font-bold">Quality Control (QC)</td>
<td class="p-4">18</td>
<td class="p-4">$2,100.00</td>
<td class="p-4">$420.00</td>
<td class="p-4">$210.00</td>
<td class="p-4 text-lime-600 font-bold uppercase tracking-tighter">Paid</td>
</tr>
</tbody>
</table>
</div>
</div>
</main>
@endsection

@push('scripts')
    <script src="/frontend/public/erp/js/reportes-rrhh.js"></script>
@endpush
