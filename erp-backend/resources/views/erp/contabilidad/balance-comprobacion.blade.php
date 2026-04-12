@extends('erp.layouts.app')

@section('title', 'Balance de Comprobación | ERP La Cima')

@section('breadcrumb')
    <a href="{{ url('/erp/contabilidad') }}" class="hover:text-stone-900">Contabilidad</a>
    <span class="material-symbols-outlined text-sm">chevron_right</span>
    <span class="text-stone-900 font-medium">Balance de Comprobación</span>
@endsection

@section('content')
<!-- Header Section -->
<div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10">
    <div>
        <nav class="flex text-[10px] uppercase tracking-[0.2em] text-stone-500 mb-2">
            <span class="opacity-50">FINANCE</span>
            <span class="mx-2 opacity-30">/</span>
            <span class="text-primary font-bold">TRIAL BALANCE</span>
        </nav>
        <h1 class="text-4xl md:text-5xl font-bold uppercase tracking-tight text-stone-900 leading-none">Balance de Comprobación</h1>
        <p class="mt-4 text-stone-500 max-w-xl font-body leading-relaxed">
            Financial period overview for <span class="text-stone-900 font-semibold">Q3 Fiscal Year 2024</span>. 
            Ensuring equilibrium through high-precision ledger validation and automated reconciliation of all active accounts.
        </p>
    </div>
    <div class="flex items-center gap-3">
        <div class="flex bg-stone-100 rounded-lg p-1">
            <button class="flex items-center gap-2 px-4 py-2 rounded bg-white text-stone-900 text-xs font-bold uppercase tracking-wider shadow-sm transition-all border border-stone-200">
                <span class="material-symbols-outlined text-sm">picture_as_pdf</span>
                PDF
            </button>
            <button class="flex items-center gap-2 px-4 py-2 rounded text-stone-500 text-xs font-bold uppercase tracking-wider hover:text-stone-900 transition-all">
                <span class="material-symbols-outlined text-sm">table_view</span>
                EXCEL
            </button>
        </div>
        <button class="bg-primary hover:brightness-110 text-stone-900 font-bold text-xs uppercase tracking-[0.15em] px-6 py-3 rounded transition-all flex items-center gap-2 group shadow-sm shadow-primary/20">
            <span class="material-symbols-outlined text-sm">lock</span>
            CLOSE MONTH
        </button>
    </div>
</div>

<!-- Dashboard Stats Overlap Layout -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white p-6 rounded-xl border-l-4 border-primary shadow-sm border border-stone-200 flex flex-col justify-between">
        <div class="flex justify-between items-start mb-4">
            <span class="text-[10px] font-bold uppercase tracking-widest text-stone-500">Accounts Verified</span>
            <span class="material-symbols-outlined text-primary">done_all</span>
        </div>
        <div>
            <div class="text-3xl font-bold font-headline tracking-tighter">142</div>
            <div class="text-[10px] text-primary font-bold uppercase mt-1">Status: Operational</div>
        </div>
    </div>
    <div class="bg-white p-6 rounded-xl border-l-4 border-stone-900 shadow-sm border border-stone-200 flex flex-col justify-between">
        <div class="flex justify-between items-start mb-4">
            <span class="text-[10px] font-bold uppercase tracking-widest text-stone-500">Total Ledger Value</span>
            <span class="material-symbols-outlined text-stone-400">payments</span>
        </div>
        <div>
            <div class="text-3xl font-bold font-headline tracking-tighter">$4,289,500.00</div>
            <div class="text-[10px] text-stone-400 font-bold uppercase mt-1">Currency: USD</div>
        </div>
    </div>
    <div class="bg-white p-6 rounded-xl border-l-4 border-orange-500 shadow-sm border border-stone-200 flex flex-col justify-between">
        <div class="flex justify-between items-start mb-4">
            <span class="text-[10px] font-bold uppercase tracking-widest text-stone-500">Integrity Check</span>
            <span class="material-symbols-outlined text-orange-500">verified_user</span>
        </div>
        <div>
            <div class="text-3xl font-bold font-headline tracking-tighter text-orange-500">BALANCED</div>
            <div class="text-[10px] text-stone-400 font-bold uppercase mt-1">Delta: 0.000</div>
        </div>
    </div>
</div>

<!-- Trial Balance Table -->
<div class="bg-white border border-stone-200 rounded-xl overflow-hidden shadow-sm">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-stone-50 text-stone-500 border-b border-stone-200">
                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest w-24">Code</th>
                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest">Account Description</th>
                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-right">Opening Balance</th>
                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-right">Debit Total</th>
                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-right">Credit Total</th>
                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-right">Closing Balance</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-stone-200">
                <tr class="bg-white hover:bg-stone-50 transition-colors group">
                    <td class="px-6 py-4 text-[11px] font-mono text-stone-500 font-bold">10100</td>
                    <td class="px-6 py-4 text-sm font-bold text-stone-900">CASH AND BANK EQUIVALENTS</td>
                    <td class="px-6 py-4 text-sm font-mono text-right text-stone-600">$450,000.00</td>
                    <td class="px-6 py-4 text-sm font-mono text-right text-lime-600 font-bold">$125,000.00</td>
                    <td class="px-6 py-4 text-sm font-mono text-right text-red-500">$85,000.00</td>
                    <td class="px-6 py-4 text-sm font-mono text-right font-bold text-stone-900">$490,000.00</td>
                </tr>
                <tr class="bg-stone-50 hover:bg-stone-100 transition-colors group">
                    <td class="px-6 py-4 text-[11px] font-mono text-stone-500 font-bold">11200</td>
                    <td class="px-6 py-4 text-sm font-bold text-stone-900">ACCOUNTS RECEIVABLE</td>
                    <td class="px-6 py-4 text-sm font-mono text-right text-stone-600">$820,500.00</td>
                    <td class="px-6 py-4 text-sm font-mono text-right text-lime-600 font-bold">$340,000.00</td>
                    <td class="px-6 py-4 text-sm font-mono text-right text-red-500">$210,000.00</td>
                    <td class="px-6 py-4 text-sm font-mono text-right font-bold text-stone-900">$950,500.00</td>
                </tr>
                <tr class="bg-white hover:bg-stone-50 transition-colors group">
                    <td class="px-6 py-4 text-[11px] font-mono text-stone-500 font-bold">12100</td>
                    <td class="px-6 py-4 text-sm font-bold text-stone-900">INVENTORY: RAW MATERIALS</td>
                    <td class="px-6 py-4 text-sm font-mono text-right text-stone-600">$1,200,000.00</td>
                    <td class="px-6 py-4 text-sm font-mono text-right text-lime-600 font-bold">$450,000.00</td>
                    <td class="px-6 py-4 text-sm font-mono text-right text-red-500">$600,000.00</td>
                    <td class="px-6 py-4 text-sm font-mono text-right font-bold text-stone-900">$1,050,000.00</td>
                </tr>
                <tr class="bg-stone-50 hover:bg-stone-100 transition-colors group">
                    <td class="px-6 py-4 text-[11px] font-mono text-stone-500 font-bold">20100</td>
                    <td class="px-6 py-4 text-sm font-bold text-stone-900">ACCOUNTS PAYABLE</td>
                    <td class="px-6 py-4 text-sm font-mono text-right text-stone-600">$650,000.00</td>
                    <td class="px-6 py-4 text-sm font-mono text-right text-lime-600 font-bold">$180,000.00</td>
                    <td class="px-6 py-4 text-sm font-mono text-right text-red-500">$240,000.00</td>
                    <td class="px-6 py-4 text-sm font-mono text-right font-bold text-stone-900">$710,000.00</td>
                </tr>
                <tr class="bg-white hover:bg-stone-50 transition-colors group">
                    <td class="px-6 py-4 text-[11px] font-mono text-stone-500 font-bold">30100</td>
                    <td class="px-6 py-4 text-sm font-bold text-stone-900">RETAINED EARNINGS</td>
                    <td class="px-6 py-4 text-sm font-mono text-right text-stone-600">$1,169,000.00</td>
                    <td class="px-6 py-4 text-sm font-mono text-right text-lime-600 font-bold">$0.00</td>
                    <td class="px-6 py-4 text-sm font-mono text-right text-red-500">$85,000.00</td>
                    <td class="px-6 py-4 text-sm font-mono text-right font-bold text-stone-900">$1,084,000.00</td>
                </tr>
            </tbody>
            <tfoot class="border-t-2 border-stone-900">
                <tr class="bg-stone-900 text-stone-100">
                    <td class="px-6 py-5" colspan="2">
                        <div class="flex items-center gap-3">
                            <div class="w-2 h-2 rounded-full bg-primary animate-pulse"></div>
                            <span class="text-xs font-black uppercase tracking-[0.2em] font-headline">TOTALS VALIDATED</span>
                        </div>
                    </td>
                    <td class="px-6 py-5 text-right font-mono font-bold text-sm">$4,289,500.00</td>
                    <td class="px-6 py-5 text-right font-mono font-bold text-sm text-primary">$1,095,000.00</td>
                    <td class="px-6 py-5 text-right font-mono font-bold text-sm text-primary">$1,095,000.00</td>
                    <td class="px-6 py-5 text-right font-mono font-bold text-sm">$4,289,500.00</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<!-- Partida Doble Validation Badge -->
<div class="mt-8 flex flex-col md:flex-row items-center justify-between gap-6 bg-lime-50 p-10 rounded-2xl border-2 border-dashed border-lime-200">
    <div class="flex items-center gap-6">
        <div class="w-20 h-20 rounded-full bg-primary flex items-center justify-center text-stone-900 shadow-sm">
            <span class="material-symbols-outlined text-4xl" style="font-variation-settings: 'FILL' 1;">security</span>
        </div>
        <div>
            <h3 class="text-2xl font-bold uppercase tracking-tight text-stone-900 font-headline">Partida Doble Validation</h3>
            <p class="text-sm text-stone-600 font-body mt-1">The fundamental accounting equation is satisfied for this period.</p>
        </div>
    </div>
    <div class="flex items-center gap-8 divide-x divide-stone-300">
        <div class="text-center">
            <div class="text-[10px] font-black text-stone-500 uppercase tracking-[0.2em] mb-1">Σ Total Debits</div>
            <div class="text-3xl font-headline font-bold text-stone-900 tracking-tighter">$1,095,000.00</div>
        </div>
        <div class="pl-8 flex flex-col items-center">
            <span class="material-symbols-outlined text-lime-600 text-3xl font-bold">equalizer</span>
            <span class="text-[10px] font-black text-lime-600 uppercase tracking-[0.2em] mt-1 text-center">VERIFIED</span>
        </div>
        <div class="pl-8 text-center">
            <div class="text-[10px] font-black text-stone-500 uppercase tracking-[0.2em] mb-1">Σ Total Credits</div>
            <div class="text-3xl font-headline font-bold text-stone-900 tracking-tighter">$1,095,000.00</div>
        </div>
    </div>
</div>

<!-- Footer Section (Industrial Style) -->
<footer class="mt-20 pt-10 border-t border-stone-200 flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
    <div class="flex items-center gap-4">
        <div class="text-[10px] font-black uppercase tracking-[0.3em] text-stone-500">Titan Accounting Module</div>
        <div class="w-1 h-1 rounded-full bg-stone-300"></div>
        <div class="text-[10px] font-medium text-stone-400">Node-A19 // Ledger ID: 899321</div>
    </div>
    <div class="flex gap-8">
        <div class="flex flex-col">
            <span class="text-[9px] font-black uppercase text-stone-400 tracking-widest">Last Sync</span>
            <span class="text-xs font-mono font-bold text-stone-600">2024-10-27 09:42:15 GMT</span>
        </div>
        <div class="flex flex-col">
            <span class="text-[9px] font-black uppercase text-stone-400 tracking-widest">Compliance</span>
            <span class="text-xs font-bold uppercase text-lime-600">ISO-9001 VALIDATED</span>
        </div>
    </div>
</footer>
@endsection

@push('scripts')
    <script src="{{ asset('erp/js/balance-comprobacion.js') }}"></script>
@endpush
