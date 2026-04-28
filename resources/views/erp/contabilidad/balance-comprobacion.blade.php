@extends('erp.layouts.app')

@section('title', 'Balance de Comprobación | ERP La Cima')

@section('breadcrumb')
    <a href="{{ url('/erp/contabilidad') }}" class="hover:text-stone-900">Contabilidad</a>
    <span class="material-symbols-outlined text-sm">chevron_right</span>
    <span class="text-stone-900 font-medium">Balance de Comprobación</span>
@endsection

@section('content')
<!-- Header Section: Industrial Monetary Equilibrium -->
<header class="flex flex-col md:flex-row md:items-end justify-between gap-10 mb-16">
    <div class="max-w-4xl">
        <div class="flex items-center gap-4 mb-6">
            <span class="w-12 h-1 bg-primary rounded-full shadow-[0_0_15px_rgba(206,255,94,0.4)]"></span>
            <p class="text-[12px] font-black text-stone-400 uppercase tracking-[0.4em] italic leading-none">Protocol: MONETARY_EQUILIBRIUM_CHECK</p>
        </div>
        <h1 class="text-5xl md:text-7xl font-headline font-black uppercase tracking-tighter text-stone-950 leading-none italic">
            Trial <span class="text-stone-300 not-italic">Balance</span>
        </h1>
        <p class="mt-8 text-stone-500 font-black text-[12px] uppercase tracking-[0.2em] border-l-4 border-stone-950 pl-8 italic leading-relaxed">
            Ledger Validation Node: Q3_FISCAL_2024. Systematic verification of transactional duality through high-precision account reconciliation and algorithmic parity testing for the active fiscal cycle.
        </p>
    </div>
    <div class="flex flex-wrap gap-4">
        <div class="flex bg-stone-50 border border-stone-100 rounded-2xl p-1 shadow-sm">
            <button class="flex items-center gap-4 px-8 py-4 rounded-xl bg-white text-stone-950 text-[10px] font-black uppercase tracking-[0.3em] shadow-sm transition-all border border-stone-100 hover:border-primary italic">
                <span class="material-symbols-outlined text-[20px]">picture_as_pdf</span>
                Export_PDF
            </button>
            <button class="flex items-center gap-4 px-8 py-4 rounded-xl text-stone-500 text-[10px] font-black uppercase tracking-[0.3em] hover:text-stone-950 transition-all italic">
                <span class="material-symbols-outlined text-[20px]">table_view</span>
                Data_Feed
            </button>
        </div>
        <button class="bg-stone-950 text-white font-black text-[10px] uppercase tracking-[0.3em] px-10 py-4 rounded-2xl transition-all flex items-center gap-4 group shadow-2xl shadow-stone-950/20 italic hover:brightness-125">
            <span class="material-symbols-outlined text-[20px] text-primary group-hover:rotate-12 transition-transform">lock_person</span>
            Finalize_Cycle
        </button>
    </div>
</header>

<!-- Dashboard Stats Summary: Verification Vectors -->
<section class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-16">
    <div class="bg-white p-10 rounded-[40px] border border-stone-100 shadow-sm relative group overflow-hidden transition-all hover:border-primary">
        <div class="flex justify-between items-start mb-6">
            <span class="text-[10px] font-black uppercase tracking-[0.4em] text-stone-400 italic">Nodes_Validated</span>
            <span class="material-symbols-outlined text-primary text-[24px]">verified</span>
        </div>
        <div>
            <div class="text-5xl font-headline font-black italic tracking-tighter leading-none text-stone-950">142 <span class="text-[14px] text-stone-300 not-italic">UNITS</span></div>
            <div class="text-[11px] text-stone-400 font-black uppercase tracking-[0.2em] mt-4 flex items-center gap-2 italic">
                <span class="w-2 h-2 bg-primary rounded-full animate-pulse shadow-[0_0_8px_#ceff5e]"></span>
                Transmission_Status: Optimal
            </div>
        </div>
    </div>
    <div class="bg-white p-10 rounded-[40px] border border-stone-100 shadow-sm relative group overflow-hidden transition-all hover:border-primary">
        <div class="flex justify-between items-start mb-6">
            <span class="text-[10px] font-black uppercase tracking-[0.4em] text-stone-400 italic">Ledger_Capitalization</span>
            <span class="material-symbols-outlined text-stone-400 text-[24px]">account_balance_wallet</span>
        </div>
        <div>
            <div class="text-5xl font-headline font-black italic tracking-tighter leading-none text-stone-950">$4,289,500.00</div>
            <div class="text-[11px] text-stone-400 font-black uppercase tracking-[0.2em] mt-4 italic">Index: Consolidated_USD_Equiv</div>
        </div>
    </div>
    <div class="bg-stone-950 p-10 rounded-[40px] shadow-2xl relative group overflow-hidden transition-all hover:border-primary/20">
        <div class="absolute inset-0 opacity-[0.03] group-hover:opacity-[0.06] transition-opacity" style="background-image: radial-gradient(#ceff5e 1.5px, transparent 1.5px); background-size: 20px 20px;"></div>
        <div class="flex justify-between items-start mb-6 relative z-10">
            <span class="text-[10px] font-black uppercase tracking-[0.4em] text-stone-500 italic">Integrity_Result</span>
            <span class="material-symbols-outlined text-primary text-[24px] animate-bounce">balance</span>
        </div>
        <div class="relative z-10">
            <div class="text-5xl font-headline font-black italic tracking-tighter leading-none text-primary uppercase">Balanced</div>
            <div class="text-[11px] text-stone-500 font-black uppercase tracking-[0.2em] mt-4 italic">Parity_Delta: 0.000_TRUE</div>
        </div>
    </div>
</section>

<!-- Technical Spec Table: Duality Feed -->
<section class="bg-white border border-stone-100 rounded-[40px] overflow-hidden shadow-2xl mb-16">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-stone-950 text-white">
                    <th class="px-10 py-6 text-[12px] font-black uppercase tracking-[0.3em] font-headline border-b border-white/5 italic">Account_ID</th>
                    <th class="px-10 py-6 text-[12px] font-black uppercase tracking-[0.3em] font-headline border-b border-white/5 italic">Fiduciary_Description</th>
                    <th class="px-10 py-6 text-[12px] font-black uppercase tracking-[0.3em] font-headline border-b border-white/5 text-right italic">Opening</th>
                    <th class="px-10 py-6 text-[12px] font-black uppercase tracking-[0.3em] font-headline border-b border-white/5 text-right italic">Debit_Load</th>
                    <th class="px-10 py-6 text-[12px] font-black uppercase tracking-[0.3em] font-headline border-b border-white/5 text-right italic">Credit_Load</th>
                    <th class="px-10 py-6 text-[12px] font-black uppercase tracking-[0.3em] font-headline border-b border-white/5 text-right text-primary italic">Consolidated</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-stone-50">
                <tr class="group hover:bg-primary/5 transition-colors">
                    <td class="px-10 py-6 font-mono text-[11px] font-black text-stone-400 group-hover:text-stone-950 uppercase italic italic">10100-A</td>
                    <td class="px-10 py-6">
                        <p class="text-[12px] font-black text-stone-950 uppercase italic leading-none tracking-tight">Cash and Bank Equivalents</p>
                        <p class="text-[9px] font-black text-stone-400 uppercase tracking-widest mt-1 italic italic">Liquid Capital Node</p>
                    </td>
                    <td class="px-10 py-6 text-[13px] font-mono font-black text-stone-500 text-right italic">450,000.00</td>
                    <td class="px-10 py-6 text-[13px] font-mono font-black text-stone-950 text-right italic font-mono">125,000.00</td>
                    <td class="px-10 py-6 text-[13px] font-mono font-black text-stone-400 text-right italic font-mono">85,000.00</td>
                    <td class="px-10 py-6 text-[16px] font-mono font-black text-stone-950 text-right tracking-tighter leading-none italic font-mono">490,000.00</td>
                </tr>
                <tr class="group hover:bg-stone-50 transition-colors">
                    <td class="px-10 py-6 font-mono text-[11px] font-black text-stone-400 group-hover:text-stone-950 uppercase italic italic">11200-R</td>
                    <td class="px-10 py-6">
                        <p class="text-[12px] font-black text-stone-950 uppercase italic leading-none tracking-tight">Accounts Receivable</p>
                        <p class="text-[9px] font-black text-stone-400 uppercase tracking-widest mt-1 italic italic">Active Credit Stream</p>
                    </td>
                    <td class="px-10 py-6 text-[13px] font-mono font-black text-stone-500 text-right italic">820,500.00</td>
                    <td class="px-10 py-6 text-[13px] font-mono font-black text-stone-950 text-right italic font-mono">340,000.00</td>
                    <td class="px-10 py-6 text-[13px] font-mono font-black text-stone-400 text-right italic font-mono">210,000.00</td>
                    <td class="px-10 py-6 text-[16px] font-mono font-black text-stone-950 text-right tracking-tighter leading-none italic font-mono">950,500.00</td>
                </tr>
                <tr class="group hover:bg-primary/5 transition-colors">
                    <td class="px-10 py-6 font-mono text-[11px] font-black text-stone-400 group-hover:text-stone-950 uppercase italic italic">12100-I</td>
                    <td class="px-10 py-6">
                        <p class="text-[12px] font-black text-stone-950 uppercase italic leading-none tracking-tight">Inventory: Raw Materials</p>
                        <p class="text-[9px] font-black text-stone-400 uppercase tracking-widest mt-1 italic italic">Material Stock Index</p>
                    </td>
                    <td class="px-10 py-6 text-[13px] font-mono font-black text-stone-500 text-right italic">1,200,000.00</td>
                    <td class="px-10 py-6 text-[13px] font-mono font-black text-stone-950 text-right italic font-mono">450,000.00</td>
                    <td class="px-10 py-6 text-[13px] font-mono font-black text-stone-400 text-right italic font-mono">600,000.00</td>
                    <td class="px-10 py-6 text-[16px] font-mono font-black text-stone-950 text-right tracking-tighter leading-none italic font-mono">1,050,000.00</td>
                </tr>
            </tbody>
            <tfoot>
                <tr class="bg-stone-50 border-t-2 border-stone-950">
                    <td class="px-10 py-8 text-[12px] font-black uppercase tracking-[0.4em] text-stone-950 italic" colspan="2">Consolidated Terminal Totals</td>
                    <td class="px-10 py-8 text-[13px] font-mono font-black text-stone-950 text-right italic font-mono underline decoration-stone-200 decoration-2">4,289,500.00</td>
                    <td class="px-10 py-8 text-[13px] font-mono font-black text-stone-950 text-right italic font-mono underline decoration-primary decoration-2">1,095,000.00</td>
                    <td class="px-10 py-8 text-[13px] font-mono font-black text-stone-950 text-right italic font-mono underline decoration-primary decoration-2">1,095,000.00</td>
                    <td class="px-10 py-8 text-2xl font-headline font-black text-stone-950 text-right tracking-tighter leading-none italic font-mono underline decoration-primary decoration-4">4,289,500.00</td>
                </tr>
            </tfoot>
        </table>
    </div>
</section>

<!-- Parity Validation Badge: Duality Verification -->
<section class="mb-20 bg-stone-950 p-12 rounded-[40px] shadow-2xl relative overflow-hidden group">
    <div class="absolute inset-0 opacity-[0.05] group-hover:opacity-[0.1] transition-opacity" style="background-image: repeating-linear-gradient(45deg, #ceff5e 0, #ceff5e 1px, transparent 0, transparent 40px); background-size: 40px 40px;"></div>
    <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-12">
        <div class="flex items-center gap-10">
            <div class="w-32 h-32 rounded-full border-4 border-primary/20 flex items-center justify-center relative">
                <div class="absolute inset-2 border border-primary/40 rounded-full animate-spin-slow"></div>
                <span class="material-symbols-outlined text-primary text-[56px] drop-shadow-[0_0_15px_rgba(206,255,94,0.5)]">security</span>
            </div>
            <div>
                <h3 class="text-3xl font-headline font-black uppercase tracking-tight text-white italic leading-none mb-4">Transaction Duality <span class="text-primary">Verified</span></h3>
                <p class="text-[12px] font-black uppercase tracking-[0.3em] text-stone-500 italic">Fundamental Accounting Equation: ACTIVE_EQUILIBRIUM_SATISFIED</p>
            </div>
        </div>
        <div class="flex flex-wrap items-center gap-12 justify-center">
            <div class="text-center px-8 py-4 bg-white/5 rounded-2xl border border-white/5">
                <p class="text-[10px] font-black text-stone-500 uppercase tracking-[0.4em] mb-3 italic">Total_Debits</p>
                <p class="text-4xl font-headline font-black text-white italic tracking-tighter">$1,095,000.00</p>
            </div>
            <div class="flex items-center text-primary">
                <span class="material-symbols-outlined text-[48px] animate-pulse">check_circle</span>
            </div>
            <div class="text-center px-8 py-4 bg-white/5 rounded-2xl border border-white/5">
                <p class="text-[10px] font-black text-stone-500 uppercase tracking-[0.4em] mb-3 italic">Total_Credits</p>
                <p class="text-4xl font-headline font-black text-white italic tracking-tighter">$1,095,000.00</p>
            </div>
        </div>
    </div>
</section>

<!-- Footer: Industrial Fiduciary Footprint -->
<footer class="mb-16 pt-12 border-t border-stone-100 flex flex-col md:flex-row justify-between items-start gap-12 text-[11px] font-black uppercase tracking-[0.4em] text-stone-400 italic">
    <div class="flex flex-col md:flex-row gap-12">
        <span class="flex items-center gap-4">
            <span class="w-2 h-2 rounded-full bg-primary shadow-[0_0_10px_#ceff5e]"></span>
            System_Node: ALPHA_FINANCE
        </span>
        <span>Transmission_ID: T-XC44-LEGER_899</span>
    </div>
    <div class="flex flex-col md:flex-row gap-12">
        <div class="flex flex-col">
            <span class="text-stone-600 mb-1">Time_Hash</span>
            <span class="text-stone-950">2024-10-27_09:42:15</span>
        </div>
        <div class="flex flex-col">
            <span class="text-stone-600 mb-1">Standard</span>
            <span class="text-primary">ISO-20022_COMPLIANT</span>
        </div>
    </div>
</footer>

@endsection

@push('scripts')
    <script src="{{ asset('erp/js/balance-comprobacion.js') }}"></script>
@endpush
