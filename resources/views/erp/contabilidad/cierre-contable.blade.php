@extends('erp.layouts.app')

@section('title', 'Cierre Contable | ERP La Cima')

@section('breadcrumb')
    <a href="{{ url('/erp/contabilidad') }}" class="hover:text-stone-900">Contabilidad</a>
    <span class="material-symbols-outlined text-sm">chevron_right</span>
    <span class="text-stone-900 font-medium">Cierre Contable</span>
@endsection

@section('content')
<header class="mb-16 relative z-10 border-b border-primary/20 pb-12">
    <div class="absolute -left-12 top-0 w-2 h-24 bg-primary shadow-[0_0_20px_rgba(206,255,94,0.3)]"></div>
    <div class="flex items-center gap-4 mb-6">
        <span class="bg-primary/20 text-primary border border-primary/30 px-5 py-2 text-[12px] font-black uppercase tracking-[0.4em] italic">FISCAL_CLOSURE_PROTOCOL_v4.2</span>
        <span class="text-stone-600 font-mono text-[11px] uppercase tracking-widest italic font-black">NODE_ID: CLOSE_0x99A1</span>
    </div>
    <h1 class="text-stone-50 font-headline text-5xl md:text-7xl font-black uppercase tracking-tighter leading-none italic">FISCAL_CLOSURE & <br/><span class="text-primary">TAX_SUMMARY_MAG</span></h1>
    <div class="mt-8 flex gap-6 items-center">
        <div class="bg-stone-900 px-6 py-3 rounded-2xl border border-white/5 shadow-inner">
            <span class="text-stone-400 font-mono text-[12px] font-black tracking-[0.2em] uppercase italic">PERIOD: DEC_2026 // FISCAL_MAG_SYNC</span>
        </div>
        <div class="bg-primary/5 text-primary border border-primary/20 px-6 py-3 rounded-2xl flex items-center gap-4">
            <span class="w-3 h-3 rounded-full bg-primary animate-pulse shadow-[0_0_10px_#ceff5e]"></span>
            <span class="text-[12px] font-black tracking-[0.3em] uppercase italic">RECONCILIATION_IN_PROGRESS</span>
        </div>
    </div>
</header>

<!-- Bento Grid Layout: Closure Diagnostics -->
<div class="grid grid-cols-12 gap-8 items-stretch relative z-10 mb-20">
    <!-- Left Column: Reconciliations & Integrity Feed -->
    <div class="col-span-12 lg:col-span-7 space-y-8">
        <!-- Pending Reconciliations Node -->
        <section class="bg-stone-950 border border-stone-800 p-10 relative overflow-hidden group shadow-3xl rounded-[40px]">
            <div class="absolute top-0 right-0 w-48 h-48 bg-primary/5 -mr-24 -mt-24 rotate-45 transition-all duration-1000 group-hover:bg-primary/10"></div>
            <div class="flex items-center gap-4 mb-10 border-b border-white/5 pb-6">
                <span class="material-symbols-outlined text-primary text-[24px]">account_balance_wallet</span>
                <h3 class="font-headline text-2xl font-black uppercase tracking-tight text-white italic">PENDING_RECON_NODES</h3>
            </div>
            <div class="space-y-6">
                <div class="group/item flex items-start justify-between bg-stone-900/50 p-8 relative rounded-[24px] border border-stone-800 hover:border-primary/30 transition-all shadow-xl">
                    <div class="absolute left-0 top-1/2 -translate-y-1/2 h-16 w-1 bg-primary shadow-[0_0_15px_#ceff5e]"></div>
                    <div>
                        <p class="text-[11px] font-black text-stone-600 uppercase tracking-[0.4em] mb-3 italic group-hover/item:text-stone-400 transition-colors">Bank_vs_Ledger_Sync</p>
                        <p class="font-headline text-3xl font-black text-white italic tracking-tighter">14.203,45 <span class="text-[12px] font-black text-red-500 ml-4 uppercase tracking-[0.2em] not-italic animate-pulse">UNMATCHED_VARIANCE</span></p>
                    </div>
                    <button class="bg-stone-950 border border-stone-800 px-6 py-3 text-[11px] font-black tracking-[0.3em] uppercase text-stone-400 hover:bg-primary hover:text-stone-950 transition-all rounded-xl shadow-inner group-hover/item:text-white group-hover/item:border-white/10">REVIEW_SYNC_DATA</button>
                </div>
                <div class="group/item flex items-start justify-between bg-stone-900/50 p-8 relative rounded-[24px] border border-stone-800 hover:border-primary/30 transition-all shadow-xl">
                    <div class="absolute left-0 top-1/2 -translate-y-1/2 h-16 w-1 bg-stone-700"></div>
                    <div>
                        <p class="text-[11px] font-black text-stone-600 uppercase tracking-[0.4em] mb-3 italic group-hover/item:text-stone-400 transition-colors">Inventory_vs_Ledger_Audit</p>
                        <p class="font-headline text-3xl font-black text-white italic tracking-tighter">2.840,10 <span class="text-[12px] font-black text-primary ml-4 uppercase tracking-[0.2em] not-italic opacity-60">WITHIN_MARGIN_OK</span></p>
                    </div>
                    <button class="bg-stone-950 border border-stone-800 px-6 py-3 text-[11px] font-black tracking-[0.3em] uppercase text-stone-400 hover:bg-primary hover:text-stone-950 transition-all rounded-xl shadow-inner group-hover/item:text-white group-hover/item:border-white/10">VIEW_AUDIT_LOGS</button>
                </div>
            </div>
        </section>

        <!-- Integrity Checklist Trace -->
        <section class="bg-stone-900/40 p-10 border border-stone-800 rounded-[40px] shadow-2xl backdrop-blur-3xl">
            <h3 class="font-headline text-2xl font-black uppercase tracking-tight mb-10 text-white italic border-b border-white/5 pb-6">CLOSURE_INTEGRITY_CHECKLIST</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 font-mono uppercase italic">
                <div class="bg-stone-950/50 p-6 flex items-center gap-6 rounded-2xl border border-stone-800 hover:border-primary/20 transition-all group">
                    <span class="material-symbols-outlined text-primary text-[28px] group-hover:scale-125 transition-transform shadow-[0_0_15px_#ceff5e33]">check_circle</span>
                    <div>
                        <p class="text-[11px] font-black text-stone-600 uppercase tracking-[0.3em] mb-1">Asset_Depreciation_MAG</p>
                        <p class="text-[14px] font-black text-white tracking-widest uppercase">NODE_FINALIZED</p>
                    </div>
                </div>
                <div class="bg-stone-950/50 p-6 flex items-center gap-6 rounded-2xl border border-stone-800 hover:border-primary/20 transition-all group">
                    <span class="material-symbols-outlined text-primary text-[28px] group-hover:scale-125 transition-transform shadow-[0_0_15px_#ceff5e33]">check_circle</span>
                    <div>
                        <p class="text-[11px] font-black text-stone-600 uppercase tracking-[0.3em] mb-1">Accounts_Payable_Sync</p>
                        <p class="text-[14px] font-black text-white tracking-widest uppercase">PROTOCOL_LOCKED</p>
                    </div>
                </div>
                <div class="bg-stone-950/50 p-6 flex items-center gap-6 rounded-2xl border border-stone-800 hover:border-red-500/20 transition-all group">
                    <span class="material-symbols-outlined text-stone-800 text-[28px] group-hover:text-red-500 transition-colors">circle</span>
                    <div>
                        <p class="text-[11px] font-black text-stone-600 uppercase tracking-[0.3em] mb-1">Payroll_Accrual_Node</p>
                        <p class="text-[14px] font-black text-stone-500 tracking-widest uppercase group-hover:text-stone-300">AWAITING_HR_XMIT</p>
                    </div>
                </div>
                <div class="bg-stone-950/50 p-6 flex items-center gap-6 rounded-2xl border border-stone-800 hover:border-white/10 transition-all group">
                    <span class="material-symbols-outlined text-stone-800 text-[28px]">pending</span>
                    <div>
                        <p class="text-[11px] font-black text-stone-600 uppercase tracking-[0.3em] mb-1">Inter_Co_Balance_Link</p>
                        <p class="text-[14px] font-black text-stone-500 tracking-widest uppercase group-hover:text-stone-300">PENDING_SYNC_X6</p>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Right Column: Tax Provisions & Certification -->
    <div class="col-span-12 lg:col-span-5 space-y-8">
        <!-- Tax Provision Transmission Card -->
        <section class="bg-stone-900 border border-primary/20 p-10 flex flex-col justify-between min-h-[480px] relative overflow-hidden rounded-[40px] shadow-3xl group">
            <div class="absolute top-0 right-0 p-8 opacity-10 group-hover:opacity-30 transition-opacity">
                <span class="material-symbols-outlined text-primary text-6xl">description</span>
            </div>
            <div>
                <div class="bg-primary/20 text-primary border border-primary/30 px-5 py-2 text-[11px] font-black uppercase tracking-[0.4em] italic w-fit mb-8 rounded-lg">TAX_PROVISION_ FY2026</div>
                <div class="space-y-12">
                    <div class="border-l-4 border-primary/40 pl-8 group/mag">
                        <p class="text-[11px] font-black text-stone-600 uppercase tracking-[0.4em] mb-4 italic group-hover/mag:text-stone-400 transition-colors uppercase">ISLR_PROJECTION_TRANS (34%)</p>
                        <p class="font-headline text-5xl font-black text-white italic tracking-tighter mb-2 shadow-primary/10 drop-shadow-lg">184.290,00</p>
                        <p class="text-[11px] font-black text-stone-500 font-mono tracking-widest uppercase italic">EST_NET_TAXABLE_NODE: 542.029,41</p>
                    </div>
                    <div class="border-l-4 border-stone-800 pl-8 group/mag">
                        <p class="text-[11px] font-black text-stone-600 uppercase tracking-[0.4em] mb-4 italic group-hover/mag:text-stone-400 transition-colors uppercase">IVA_LIQUIDATION_NET_MAG</p>
                        <p class="font-headline text-4xl font-black text-stone-400 italic tracking-tighter mb-4 shadow-inner">42.105,12</p>
                        <div class="flex gap-6">
                            <span class="bg-stone-950 px-3 py-1 rounded text-[11px] text-stone-600 font-black tracking-widest uppercase border border-white/5 font-mono italic">INPUT: 82K</span>
                            <span class="bg-stone-950 px-3 py-1 rounded text-[11px] text-stone-600 font-black tracking-widest uppercase border border-white/5 font-mono italic">OUTPUT: 124K</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-12">
                <button class="w-full bg-primary text-stone-950 font-black p-6 text-[14px] uppercase tracking-[0.5em] hover:brightness-110 transition-all active:scale-[0.98] rounded-[24px] shadow-[0_0_30px_rgba(206,255,94,0.2)] italic">
                    PROVISION_SETTLEMENT_EXEC
                </button>
            </div>
        </section>

        <!-- Integrity Certificate: Formal Authority -->
        <section class="bg-stone-950 border border-stone-800 border-l-[12px] border-l-primary p-10 rounded-[32px] shadow-3xl hover:border-white/5 transition-all group">
            <div class="flex justify-between items-start mb-8 border-b border-white/5 pb-6">
                <div>
                    <h3 class="font-headline text-2xl font-black uppercase tracking-tighter text-white italic">CERTIFICATE_OF_INTEGRITY</h3>
                    <p class="text-[11px] font-mono text-stone-700 mt-2 uppercase tracking-widest font-black italic group-hover:text-stone-500 transition-colors">VALIDATION_HASH: 8F-22-E9-01-TITAN-SECURE</p>
                </div>
                <span class="material-symbols-outlined text-primary text-[36px] shadow-[0_0_20px_#ceff5e44]">verified</span>
            </div>
            <div class="space-y-6">
                <div class="bg-stone-900 border border-stone-800 p-8 font-mono text-[11px] leading-loose rounded-2xl relative overflow-hidden group/text">
                     <div class="absolute inset-0 bg-primary/2 opacity-0 group-hover/text:opacity-100 transition-opacity"></div>
                    <p class="text-stone-500 italic uppercase font-black relative z-10 transition-colors group-hover/text:text-stone-300">
                        "I HEREBY CERTIFY THAT THE FINANCIAL RECORDS PRESENTED FOR THE PERIOD ENDING DEC-2026 REFLECT THE TRUE INDUSTRIAL FISCAL POSITION OF ZENITH_ERP ACCORDING TO GLOBAL_STANDARDS_X09-22B..."
                    </p>
                    <div class="flex justify-between items-end border-t border-dashed border-stone-800 pt-6 mt-10 relative z-10">
                        <div>
                            <p class="font-black text-white text-[14px] italic tracking-tight uppercase">DR_ELARA_VANCE</p>
                            <p class="text-[11px] text-stone-700 font-black uppercase tracking-widest italic">CHIEF_FINANCIAL_NODE</p>
                        </div>
                        <div class="text-right">
                            <p class="font-black text-stone-400 text-[11px] uppercase tracking-widest mb-1 italic">FISCAL_AUTH_CODE</p>
                            <p class="text-[12px] text-primary font-black tracking-[0.2em] font-mono shadow-[0_0_10px_#ceff5e22]">SNT-2026-X99L-412_CMD</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<!-- Analytical Magnitudes: Periodic Insight -->
<section class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-8 relative z-10">
    <div class="bg-stone-900/50 p-8 border border-white/5 rounded-[32px] backdrop-blur-3xl group transition-all hover:bg-stone-900">
        <div class="flex justify-between items-center mb-6">
            <p class="text-[12px] font-black text-stone-600 uppercase tracking-[0.4em] italic group-hover:text-stone-400">EBITDA_Margin_XG</p>
            <span class="text-primary text-[12px] font-black font-mono shadow-[0_0_10px_#ceff5e44]">+2.42%_DELTA</span>
        </div>
        <div class="h-3 bg-stone-950 rounded-full overflow-hidden border border-white/5">
            <div class="h-full bg-primary w-[74%] shadow-[0_0_15px_#ceff5e]"></div>
        </div>
        <p class="font-headline text-4xl font-black mt-8 text-white italic tracking-tighter">32.42% <span class="text-[12px] font-black text-stone-700 ml-4 uppercase not-italic opacity-40">VS_PREV_CYCLE</span></p>
    </div>
    <div class="bg-stone-900/50 p-8 border border-white/5 rounded-[32px] backdrop-blur-3xl group transition-all hover:bg-stone-900">
        <div class="flex justify-between items-center mb-6">
            <p class="text-[12px] font-black text-stone-600 uppercase tracking-[0.4em] italic group-hover:text-stone-400">Liquidity_Ratio_Probe</p>
            <span class="text-red-500 text-[12px] font-black font-mono shadow-[0_0_10px_#ef444444]">-0.1%_RISK</span>
        </div>
        <div class="h-3 bg-stone-950 rounded-full overflow-hidden border border-white/5">
            <div class="h-full bg-stone-700 w-[62%]"></div>
        </div>
        <p class="font-headline text-4xl font-black mt-8 text-white italic tracking-tighter">1.84 <span class="text-[12px] font-black text-stone-700 ml-4 uppercase not-italic opacity-40">QUICK_RATIO_MAG</span></p>
    </div>
    <div class="bg-stone-900/50 p-8 border border-white/5 rounded-[32px] backdrop-blur-3xl group transition-all hover:bg-stone-900">
        <div class="flex justify-between items-center mb-6">
            <p class="text-[12px] font-black text-stone-600 uppercase tracking-[0.4em] italic group-hover:text-stone-400">Deferred_Tax_Provision</p>
            <span class="text-stone-700 text-[12px] font-black font-mono tracking-widest italic uppercase">STABLE_TRANSMIT</span>
        </div>
        <div class="h-3 bg-stone-950 rounded-full overflow-hidden border border-white/5">
            <div class="h-full bg-primary/20 w-[45%] opacity-40"></div>
        </div>
        <p class="font-headline text-4xl font-black mt-8 text-white italic tracking-tighter">12.400 <span class="text-[12px] font-black text-stone-700 ml-4 uppercase not-italic opacity-40">VES_EST_VALUE</span></p>
    </div>
</section>

@endsection

@push('scripts')
    <script src="{{ asset('erp/js/cierre-contable.js') }}"></script>
@endpush
