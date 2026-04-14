@extends('erp.layouts.app')

@section('title', 'Cierre Contable | ERP La Cima')

@section('breadcrumb')
    <a href="{{ url('/erp/contabilidad') }}" class="hover:text-stone-900">Contabilidad</a>
    <span class="material-symbols-outlined text-sm">chevron_right</span>
    <span class="text-stone-900 font-medium">Cierre Contable</span>
@endsection

@section('content')
<header class="mb-10 relative">
    <div class="absolute -left-8 top-0 w-1 h-16 bg-primary"></div>
    <p class="text-primary font-label text-xs font-bold tracking-widest uppercase mb-1">Module: FISCAL_CLOSURE_v4</p>
    <h1 class="text-stone-900 font-headline text-5xl font-bold uppercase tracking-tighter leading-none">Fiscal Closing &amp; <br/><span class="text-primary">Tax Summary</span></h1>
    <div class="mt-4 flex gap-4 items-center">
        <span class="bg-stone-100 px-3 py-1 text-[10px] font-bold tracking-widest uppercase border border-stone-200">PERIOD: DEC 2023</span>
        <span class="bg-primary/10 text-primary border border-primary/20 px-3 py-1 text-[10px] font-bold tracking-widest uppercase flex items-center gap-2">
            <span class="w-1.5 h-1.5 rounded-full bg-primary animate-pulse"></span> IN PROGRESS
        </span>
    </div>
</header>

<!-- Bento Grid Layout -->
<div class="grid grid-cols-12 gap-6 items-stretch">
    <!-- Left Column: Reconciliations & Inventory -->
    <div class="col-span-12 lg:col-span-7 space-y-6">
        <!-- Pending Reconciliations Card -->
        <section class="bg-white border border-stone-200 p-8 relative overflow-hidden group shadow-sm rounded-xl">
            <div class="absolute top-0 right-0 w-24 h-24 bg-stone-50 -mr-12 -mt-12 rotate-45 transition-transform group-hover:scale-110"></div>
            <div class="flex items-center gap-3 mb-8">
                <span class="material-symbols-outlined text-primary" data-icon="account_balance_wallet">account_balance_wallet</span>
                <h3 class="font-headline text-xl font-bold uppercase tracking-tight text-stone-900">Pending Reconciliations</h3>
            </div>
            <div class="space-y-6">
                <div class="flex items-start justify-between bg-stone-50 p-4 relative rounded border border-stone-100">
                    <div class="absolute left-0 top-0 h-full w-1 bg-primary"></div>
                    <div>
                        <p class="font-label text-xs font-bold text-stone-500 uppercase tracking-widest mb-1">Bank vs Ledger</p>
                        <p class="font-headline text-2xl font-bold text-stone-900">$14,203.45 <span class="text-sm font-medium text-red-500 ml-2 uppercase tracking-normal font-body">Unmatched Variance</span></p>
                    </div>
                    <button class="bg-white border border-stone-200 px-4 py-2 text-[10px] font-bold tracking-widest uppercase hover:bg-primary hover:text-stone-900 transition-all rounded shadow-sm">Review Details</button>
                </div>
                <div class="flex items-start justify-between bg-stone-50 p-4 relative rounded border border-stone-100">
                    <div class="absolute left-0 top-0 h-full w-1 bg-stone-900"></div>
                    <div>
                        <p class="font-label text-xs font-bold text-stone-500 uppercase tracking-widest mb-1">Inventory vs Ledger</p>
                        <p class="font-headline text-2xl font-bold text-stone-900">$2,840.10 <span class="text-sm font-medium text-primary ml-2 uppercase tracking-normal font-body">Within Margin</span></p>
                    </div>
                    <button class="bg-white border border-stone-200 px-4 py-2 text-[10px] font-bold tracking-widest uppercase hover:bg-primary hover:text-stone-900 transition-all rounded shadow-sm">Audit Logs</button>
                </div>
            </div>
        </section>

        <!-- Status Progress -->
        <section class="bg-white p-8 border border-stone-200 rounded-xl shadow-sm">
            <h3 class="font-headline text-xl font-bold uppercase tracking-tight mb-6 text-stone-900">Closure Integrity Checklist</h3>
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-stone-50 p-4 flex items-center gap-4 rounded border border-stone-100">
                    <span class="material-symbols-outlined text-primary" data-icon="check_circle" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                    <div>
                        <p class="text-[10px] font-bold text-stone-500 uppercase tracking-widest">Asset Depreciation</p>
                        <p class="text-sm font-bold uppercase text-stone-900">Finalized</p>
                    </div>
                </div>
                <div class="bg-stone-50 p-4 flex items-center gap-4 rounded border border-stone-100">
                    <span class="material-symbols-outlined text-primary" data-icon="check_circle" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                    <div>
                        <p class="text-[10px] font-bold text-stone-500 uppercase tracking-widest">Accounts Payable</p>
                        <p class="text-sm font-bold uppercase text-stone-900">Locked</p>
                    </div>
                </div>
                <div class="bg-stone-50 p-4 flex items-center gap-4 rounded border border-stone-100">
                    <span class="material-symbols-outlined text-stone-400" data-icon="radio_button_unchecked">radio_button_unchecked</span>
                    <div>
                        <p class="text-[10px] font-bold text-stone-500 uppercase tracking-widest">Payroll Accrual</p>
                        <p class="text-sm font-bold uppercase text-stone-900">Awaiting HR</p>
                    </div>
                </div>
                <div class="bg-stone-50 p-4 flex items-center gap-4 rounded border border-stone-100">
                    <span class="material-symbols-outlined text-stone-400" data-icon="radio_button_unchecked">radio_button_unchecked</span>
                    <div>
                        <p class="text-[10px] font-bold text-stone-500 uppercase tracking-widest">Inter-Co. Balance</p>
                        <p class="text-sm font-bold uppercase text-stone-900">Pending Sync</p>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Right Column: Tax Provisions & Auth -->
    <div class="col-span-12 lg:col-span-5 space-y-6">
        <!-- Tax Provision Card -->
        <section class="bg-stone-900 text-stone-100 p-8 flex flex-col justify-between min-h-[400px] relative overflow-hidden rounded-xl shadow-lg">
            <div class="absolute top-0 right-0 p-4">
                <span class="material-symbols-outlined text-orange-500 text-4xl opacity-20" data-icon="description">description</span>
            </div>
            <div>
                <h3 class="font-headline text-2xl font-bold uppercase tracking-tight mb-8">Tax Provision <span class="text-orange-500">FY2023</span></h3>
                <div class="space-y-8">
                    <div class="border-l-2 border-orange-500/50 pl-6">
                        <p class="text-stone-400 font-label text-[10px] font-bold uppercase tracking-widest mb-2">ISLR Calculation (34%)</p>
                        <p class="font-headline text-4xl font-bold text-white">$184,290.00</p>
                        <p class="text-stone-500 text-xs mt-1">Estimated Net Taxable Income: $542,029.41</p>
                    </div>
                    <div class="border-l-2 border-stone-700 pl-6">
                        <p class="text-stone-400 font-label text-[10px] font-bold uppercase tracking-widest mb-2">IVA Liquidations (NET)</p>
                        <p class="font-headline text-3xl font-bold text-stone-300">$42,105.12</p>
                        <div class="flex gap-4 mt-2">
                            <span class="text-[10px] text-stone-500 uppercase">Input: $82K</span>
                            <span class="text-[10px] text-stone-500 uppercase">Output: $124K</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-12 pt-8 border-t border-stone-800">
                <button class="w-full bg-orange-500 text-stone-950 font-bold py-4 uppercase tracking-tighter hover:bg-orange-400 transition-all active:scale-95 rounded">
                    PROVISION SETTLEMENT
                </button>
            </div>
        </section>

        <!-- Certification Section -->
        <section class="bg-white p-8 border-l-[8px] border-primary rounded-r-xl border-y border-r border-stone-200 shadow-sm">
            <div class="flex justify-between items-start mb-6">
                <div>
                    <h3 class="font-headline text-lg font-bold uppercase tracking-tight text-stone-900">Certificate of Integrity</h3>
                    <p class="text-xs text-stone-500 mt-1">Validation Hash: 8F-22-E9-01-TITAN</p>
                </div>
                <span class="material-symbols-outlined text-primary text-3xl" data-icon="verified">verified</span>
            </div>
            <div class="space-y-4">
                <div class="bg-stone-50 p-4 font-mono text-[11px] leading-relaxed border border-stone-200 rounded">
                    <p class="text-stone-500 italic mb-2">"I hereby certify that the financial records presented for the period ending DEC-2023 reflect the true industrial fiscal position of TITAN ERP according to International Accounting Standards..."</p>
                    <div class="flex justify-between items-end border-t border-dashed border-stone-300 pt-2 mt-4">
                        <div>
                            <p class="font-bold text-stone-900">DR. ELARA VANCE</p>
                            <p class="text-[9px] text-stone-500">Chief Financial Officer</p>
                        </div>
                        <div class="text-right">
                            <p class="font-bold text-stone-900">SENIAT AUTH CODE</p>
                            <p class="text-[10px] text-primary font-bold tracking-widest">#SNT-2023-X99L-412</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<!-- Analytical Overlay Section -->
<section class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="bg-white p-6 border-b-2 border-primary/20 rounded-t-xl border border-stone-200 shadow-sm">
        <div class="flex justify-between items-center mb-4">
            <p class="text-[10px] font-bold text-stone-500 uppercase tracking-widest">EBITDA Margin</p>
            <span class="text-primary text-xs font-bold">+2.4%</span>
        </div>
        <div class="h-2 bg-stone-100 rounded-full overflow-hidden">
            <div class="h-full bg-primary w-[74%]"></div>
        </div>
        <p class="font-headline text-xl font-bold mt-4 text-stone-900">32.4% <span class="text-xs font-medium text-stone-500">vs prev. yr</span></p>
    </div>
    <div class="bg-white p-6 border-b-2 border-primary/20 rounded-t-xl border border-stone-200 shadow-sm">
        <div class="flex justify-between items-center mb-4">
            <p class="text-[10px] font-bold text-stone-500 uppercase tracking-widest">Liquidity Ratio</p>
            <span class="text-red-500 text-xs font-bold">-0.1%</span>
        </div>
        <div class="h-2 bg-stone-100 rounded-full overflow-hidden">
            <div class="h-full bg-stone-900 w-[62%]"></div>
        </div>
        <p class="font-headline text-xl font-bold mt-4 text-stone-900">1.8 <span class="text-xs font-medium text-stone-500">Quick Ratio</span></p>
    </div>
    <div class="bg-white p-6 border-b-2 border-primary/20 rounded-t-xl border border-stone-200 shadow-sm">
        <div class="flex justify-between items-center mb-4">
            <p class="text-[10px] font-bold text-stone-500 uppercase tracking-widest">Deferred Taxes</p>
            <span class="text-stone-500 text-xs font-bold">Stable</span>
        </div>
        <div class="h-2 bg-stone-100 rounded-full overflow-hidden">
            <div class="h-full bg-lime-200 w-[45%]"></div>
        </div>
        <p class="font-headline text-xl font-bold mt-4 text-stone-900">$12,400 <span class="text-xs font-medium text-stone-500">Asset value</span></p>
    </div>
</section>
@endsection

@push('scripts')
    <script src="{{ asset('erp/js/cierre-contable.js') }}"></script>
@endpush
