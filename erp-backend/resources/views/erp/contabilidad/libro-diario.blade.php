@extends('erp.layouts.app')

@section('title', 'Libro Diario | ERP La Cima')

@section('breadcrumb')
    <a href="{{ url('/erp/contabilidad') }}" class="hover:text-stone-900">Contabilidad</a>
    <span class="material-symbols-outlined text-sm">chevron_right</span>
    <span class="text-stone-900 font-medium">Libro Diario</span>
@endsection

@section('content')
<!-- Header & Stats -->
<div class="mb-10">
    <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6">
        <div>
            <span class="text-primary font-bold tracking-widest text-[10px] uppercase">Transaction Ledger</span>
            <h1 class="text-4xl md:text-5xl font-headline font-extrabold tracking-tighter uppercase mt-1">General Journal</h1>
            <div class="h-1 w-24 bg-primary mt-4"></div>
        </div>
        <!-- Quick Filter Stats -->
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-1">
            <div class="bg-white border border-stone-200 p-4 flex flex-col min-w-[140px]">
                <span class="text-[10px] font-bold text-stone-500 uppercase tracking-tighter">Total Debits</span>
                <span class="text-xl font-headline font-bold">$1,240,502.50</span>
            </div>
            <div class="bg-white border border-stone-200 p-4 flex flex-col min-w-[140px]">
                <span class="text-[10px] font-bold text-stone-500 uppercase tracking-tighter">Total Credits</span>
                <span class="text-xl font-headline font-bold">$1,240,502.50</span>
            </div>
            <div class="bg-primary/10 border border-primary/20 border-l-2 border-l-primary p-4 flex flex-col min-w-[140px]">
                <span class="text-[10px] font-bold text-stone-600 uppercase tracking-tighter">Auto-Generated</span>
                <span class="text-xl font-headline font-bold text-stone-900">142</span>
            </div>
            <div class="bg-white border border-stone-200 p-4 flex flex-col min-w-[140px]">
                <span class="text-[10px] font-bold text-stone-500 uppercase tracking-tighter">Manual Entries</span>
                <span class="text-xl font-headline font-bold">18</span>
            </div>
        </div>
    </div>
</div>

<!-- Filter Controls Area -->
<div class="bg-white border border-stone-200 p-6 mb-8 flex flex-wrap items-end gap-6 shadow-sm">
    <div class="flex-1 min-w-[280px]">
        <label class="block text-[10px] font-bold text-stone-500 uppercase mb-2 tracking-widest">Search by Account / Description</label>
        <div class="relative">
            <input class="w-full bg-stone-50 border border-stone-200 focus:ring-2 focus:ring-primary h-12 px-10 text-sm tracking-wide" placeholder="ENTER KEYWORDS..." type="text"/>
            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-stone-400">search</span>
        </div>
    </div>
    <div class="flex gap-4">
        <div>
            <label class="block text-[10px] font-bold text-stone-500 uppercase mb-2 tracking-widest">Date From</label>
            <input class="bg-stone-50 border border-stone-200 focus:ring-2 focus:ring-primary h-12 px-4 text-sm" type="date"/>
        </div>
        <div>
            <label class="block text-[10px] font-bold text-stone-500 uppercase mb-2 tracking-widest">Date To</label>
            <input class="bg-stone-50 border border-stone-200 focus:ring-2 focus:ring-primary h-12 px-4 text-sm" type="date"/>
        </div>
    </div>
    <button class="bg-stone-900 text-stone-100 h-12 px-8 font-headline font-bold uppercase tracking-widest hover:bg-stone-800 transition-colors">
        Apply Filter
    </button>
</div>

<!-- Journal Entries Table -->
<div class="overflow-x-auto bg-white border border-stone-200">
    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-stone-900 text-stone-100 font-headline uppercase text-xs tracking-widest">
                <th class="px-6 py-4 text-left font-medium">Date</th>
                <th class="px-6 py-4 text-left font-medium">Seat #</th>
                <th class="px-6 py-4 text-left font-medium">Account</th>
                <th class="px-6 py-4 text-left font-medium">Description</th>
                <th class="px-6 py-4 text-right font-medium">Debit</th>
                <th class="px-6 py-4 text-right font-medium">Credit</th>
                <th class="px-6 py-4 text-center font-medium">Type</th>
            </tr>
        </thead>
        <tbody class="text-sm font-body">
            <!-- Seat Group 1: Automatic -->
            <tr class="bg-white border-b border-stone-100 border-l-4 border-l-primary">
                <td class="px-6 py-5 text-stone-500 font-medium">2023-10-24</td>
                <td class="px-6 py-5 font-bold">#GJ-8842</td>
                <td class="px-6 py-5">
                    <div class="flex flex-col">
                        <span class="font-bold text-stone-900">1100-00</span>
                        <span class="text-[10px] text-stone-500 uppercase">Cash &amp; Bank</span>
                    </div>
                </td>
                <td class="px-6 py-5 text-stone-600">Sales Receipt: INV-9901 / Customer: ForgeWorks Ltd</td>
                <td class="px-6 py-5 text-right font-mono font-bold">$ 12,500.00</td>
                <td class="px-6 py-5 text-right font-mono text-stone-400">—</td>
                <td class="px-6 py-5 text-center">
                    <span class="inline-block px-2 py-1 bg-primary/10 text-stone-700 text-[9px] font-black uppercase tracking-widest rounded-sm border border-primary/20">Automatic</span>
                </td>
            </tr>
            <tr class="bg-white border-b border-stone-200 border-l-4 border-l-primary">
                <td class="px-6 py-5 text-stone-500 font-medium opacity-0">2023-10-24</td>
                <td class="px-6 py-5 font-bold opacity-0">#GJ-8842</td>
                <td class="px-6 py-5">
                    <div class="flex flex-col">
                        <span class="font-bold text-stone-900 pl-4">4000-01</span>
                        <span class="text-[10px] text-stone-500 uppercase pl-4">Product Sales - Domestic</span>
                    </div>
                </td>
                <td class="px-6 py-5 text-stone-600 italic">Corresponding Credit Entry</td>
                <td class="px-6 py-5 text-right font-mono text-stone-400">—</td>
                <td class="px-6 py-5 text-right font-mono font-bold">$ 12,500.00</td>
                <td class="px-6 py-5 text-center opacity-0"></td>
            </tr>

            <!-- Seat Group 2: Manual -->
            <tr class="bg-stone-50 border-b border-stone-100 border-l-4 border-l-yellow-400">
                <td class="px-6 py-5 text-stone-500 font-medium">2023-10-23</td>
                <td class="px-6 py-5 font-bold">#GJ-8841</td>
                <td class="px-6 py-5">
                    <div class="flex flex-col">
                        <span class="font-bold text-stone-900">6100-05</span>
                        <span class="text-[10px] text-stone-500 uppercase">Office Maintenance</span>
                    </div>
                </td>
                <td class="px-6 py-5 text-stone-600">Quarterly AC Service Adjustment - Manual Correction</td>
                <td class="px-6 py-5 text-right font-mono font-bold">$ 850.00</td>
                <td class="px-6 py-5 text-right font-mono text-stone-400">—</td>
                <td class="px-6 py-5 text-center">
                    <span class="inline-block px-2 py-1 bg-stone-200 text-stone-600 text-[9px] font-black uppercase tracking-widest rounded-sm">Manual</span>
                </td>
            </tr>
            <tr class="bg-stone-50 border-b border-stone-200 border-l-4 border-l-yellow-400">
                <td class="px-6 py-5 text-stone-500 font-medium opacity-0">2023-10-23</td>
                <td class="px-6 py-5 font-bold opacity-0">#GJ-8841</td>
                <td class="px-6 py-5">
                    <div class="flex flex-col">
                        <span class="font-bold text-stone-900 pl-4">1100-00</span>
                        <span class="text-[10px] text-stone-500 uppercase pl-4">Cash &amp; Bank</span>
                    </div>
                </td>
                <td class="px-6 py-5 text-stone-600 italic">Corresponding Credit Entry</td>
                <td class="px-6 py-5 text-right font-mono text-stone-400">—</td>
                <td class="px-6 py-5 text-right font-mono font-bold">$ 850.00</td>
                <td class="px-6 py-5 text-center opacity-0"></td>
            </tr>

            <!-- Seat Group 3: Automatic (Purchase) -->
            <tr class="bg-white border-b border-stone-100 border-l-4 border-l-primary">
                <td class="px-6 py-5 text-stone-500 font-medium">2023-10-22</td>
                <td class="px-6 py-5 font-bold">#GJ-8840</td>
                <td class="px-6 py-5">
                    <div class="flex flex-col">
                        <span class="font-bold text-stone-900">1500-00</span>
                        <span class="text-[10px] text-stone-500 uppercase">Inventory - Raw Materials</span>
                    </div>
                </td>
                <td class="px-6 py-5 text-stone-600">Purchase Order: PO-4552 / Supplier: SteelCore Ind.</td>
                <td class="px-6 py-5 text-right font-mono font-bold">$ 45,200.00</td>
                <td class="px-6 py-5 text-right font-mono text-stone-400">—</td>
                <td class="px-6 py-5 text-center">
                    <span class="inline-block px-2 py-1 bg-primary/10 text-stone-700 text-[9px] font-black uppercase tracking-widest rounded-sm border border-primary/20">Automatic</span>
                </td>
            </tr>
            <tr class="bg-white border-b border-stone-200 border-l-4 border-l-primary">
                <td class="px-6 py-5 text-stone-500 font-medium opacity-0">2023-10-22</td>
                <td class="px-6 py-5 font-bold opacity-0">#GJ-8840</td>
                <td class="px-6 py-5">
                    <div class="flex flex-col">
                        <span class="font-bold text-stone-900 pl-4">2100-00</span>
                        <span class="text-[10px] text-stone-500 uppercase pl-4">Accounts Payable</span>
                    </div>
                </td>
                <td class="px-6 py-5 text-stone-600 italic">Corresponding Credit Entry</td>
                <td class="px-6 py-5 text-right font-mono text-stone-400">—</td>
                <td class="px-6 py-5 text-right font-mono font-bold">$ 45,200.00</td>
                <td class="px-6 py-5 text-center opacity-0"></td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Pagination / Status Footer -->
<div class="mt-12 flex flex-col md:flex-row items-center justify-between gap-6">
    <div class="flex items-center gap-4">
        <button class="p-2 border border-stone-300 bg-white hover:bg-stone-50 rounded"><span class="material-symbols-outlined">chevron_left</span></button>
        <div class="flex gap-1">
            <span class="px-3 py-1 bg-stone-900 text-stone-100 font-bold rounded">1</span>
            <span class="px-3 py-1 bg-white border border-stone-200 hover:bg-stone-50 cursor-pointer rounded">2</span>
            <span class="px-3 py-1 bg-white border border-stone-200 hover:bg-stone-50 cursor-pointer rounded">3</span>
            <span class="px-3 py-1">...</span>
            <span class="px-3 py-1 bg-white border border-stone-200 hover:bg-stone-50 cursor-pointer rounded">24</span>
        </div>
        <button class="p-2 border border-stone-300 bg-white hover:bg-stone-50 rounded"><span class="material-symbols-outlined">chevron_right</span></button>
    </div>
    <div class="flex items-center gap-8 text-[10px] font-bold uppercase tracking-widest text-stone-400">
        <div class="flex items-center gap-2">
            <div class="w-2 h-2 rounded-full bg-primary animate-pulse"></div>
            <span>System Sync Active</span>
        </div>
        <div>Showing 50 of 1,242 entries</div>
        <button class="flex items-center gap-1 text-primary hover:underline">
            <span class="material-symbols-outlined text-[14px]">download</span>
            <span>Export Ledger (PDF/CSV)</span>
        </button>
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('erp/js/libro-diario.js') }}"></script>
    <style>
        .account-row { transition: background-color 0.2s; }
    </style>
@endpush
