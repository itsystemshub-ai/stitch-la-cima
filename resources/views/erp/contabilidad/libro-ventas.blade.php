@extends('erp.layouts.app')

@section('title', 'Libro Ventas | ERP La Cima')

@section('breadcrumb')
    <a href="{{ url('/erp/contabilidad') }}" class="hover:text-stone-900">Contabilidad</a>
    <span class="material-symbols-outlined text-sm">chevron_right</span>
    <span class="text-stone-900 font-medium">Libro Ventas</span>
@endsection

@section('content')
<!-- Header Section: Industrial Jurisdictional Authority -->
<header class="mb-16 flex flex-col md:flex-row md:items-end justify-between gap-10">
    <div class="max-w-4xl">
        <div class="flex items-center gap-4 mb-6">
            <span class="w-12 h-1 bg-primary rounded-full shadow-[0_0_15px_rgba(206,255,94,0.4)]"></span>
            <p class="text-[12px] font-black text-stone-400 uppercase tracking-[0.4em] italic leading-none">Fiscal Jurisdiction: SENIAT_COMPLIANCE_NODE</p>
        </div>
        <h1 class="text-5xl md:text-7xl font-headline font-black uppercase tracking-tighter text-stone-950 leading-none italic">
            Sales <span class="text-stone-300 not-italic">Ledger</span>
        </h1>
        <p class="mt-8 text-stone-500 font-black text-[12px] uppercase tracking-[0.2em] border-l-4 border-stone-950 pl-8 italic">
            Regulatory Compliance: Art. 58. Cryptographically signed chronological transmission of commercial revenue for the active fiscal period.
        </p>
    </div>
    <div class="flex flex-wrap gap-4">
        <button class="flex items-center gap-4 bg-stone-950 text-white px-8 py-4 rounded-2xl font-black text-[10px] uppercase tracking-[0.3em] transition-all hover:brightness-125 active:scale-95 shadow-2xl shadow-stone-950/20 italic">
            <span class="material-symbols-outlined text-[20px]">picture_as_pdf</span>
            Export_PDF
        </button>
        <button class="flex items-center gap-4 bg-primary text-stone-950 px-8 py-4 rounded-2xl font-black text-[10px] uppercase tracking-[0.3em] transition-all hover:brightness-110 active:scale-95 shadow-2xl shadow-primary/20 italic">
            <span class="material-symbols-outlined text-[20px]">table_view</span>
            Export_XLSX
        </button>
    </div>
</header>

<!-- Filters & Stats Bento: Analytical Precision -->
<section class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-12">
    <!-- Filter Card -->
    <div class="col-span-1 md:col-span-2 bg-white border border-stone-100 p-10 rounded-[40px] shadow-sm relative overflow-hidden group">
        <div class="absolute inset-0 opacity-[0.01] bg-stone-950 group-hover:opacity-[0.03] transition-opacity"></div>
        <div class="relative z-10">
            <h3 class="text-[12px] font-black uppercase tracking-[0.4em] text-stone-400 mb-8 italic">Temporal Cycle Selection</h3>
            <div class="flex flex-wrap gap-6">
                <div class="flex-1 min-w-[200px]">
                    <label class="block text-[11px] uppercase font-black text-stone-500 tracking-[0.2em] mb-3 italic">Fiscal_Year</label>
                    <select class="w-full bg-stone-50 border border-stone-100 rounded-2xl text-[12px] font-black text-stone-950 focus:ring-2 focus:ring-primary py-4 px-6 appearance-none uppercase italic">
                        <option>2024</option>
                        <option>2023</option>
                    </select>
                </div>
                <div class="flex-1 min-w-[200px]">
                    <label class="block text-[11px] uppercase font-black text-stone-500 tracking-[0.2em] mb-3 italic">Month_Period</label>
                    <select class="w-full bg-stone-50 border border-stone-100 rounded-2xl text-[12px] font-black text-stone-950 focus:ring-2 focus:ring-primary py-4 px-6 appearance-none uppercase italic">
                        <option>October</option>
                        <option selected>November</option>
                        <option>December</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="mt-10 flex items-center gap-4 text-primary text-[11px] font-black uppercase tracking-[0.2em] italic">
            <span class="w-3 h-3 bg-primary rounded-full animate-pulse shadow-[0_0_10px_#ceff5e]"></span>
            <span>Transmission Feed: November 2024 (Validated_Art_58)</span>
        </div>
    </div>

    <!-- Total Stats: Debit Magnitudes -->
    <div class="bg-stone-950 border border-stone-800 p-10 rounded-[40px] shadow-2xl relative overflow-hidden group transition-all hover:border-primary/20">
        <div class="absolute inset-0 opacity-[0.03] group-hover:opacity-[0.06] transition-opacity" style="background-image: radial-gradient(#ceff5e 1.5px, transparent 1.5px); background-size: 20px 20px;"></div>
        <h3 class="text-[10px] font-black uppercase tracking-[0.4em] text-stone-500 mb-4 relative z-10 italic">Consolidated VAT Debit</h3>
        <p class="text-4xl font-headline font-black text-white mb-6 relative z-10 italic tracking-tighter leading-none">Bs. 42.105,50</p>
        <div class="text-[11px] text-primary font-black uppercase tracking-[0.2em] flex items-center gap-2 relative z-10 italic">
            <span class="material-symbols-outlined text-[18px]">trending_up</span>
            +12.4% yield vs prev_cycle
        </div>
    </div>

    <div class="bg-white border border-stone-100 p-10 rounded-[40px] shadow-sm relative overflow-hidden group transition-all hover:border-primary">
        <h3 class="text-[10px] font-black uppercase tracking-[0.4em] text-stone-400 mb-4 italic">Exempt Capital Volume</h3>
        <p class="text-4xl font-headline font-black text-stone-950 mb-6 italic tracking-tighter leading-none">Bs. 8.420,00</p>
        <div class="text-[11px] text-stone-500 font-black uppercase tracking-[0.2em] italic">
            Magnitude Index: 16.5% of total_feed
        </div>
    </div>
</section>

<!-- Technical Spec Table: Fiscal Transmission Feed -->
<section class="bg-white border border-stone-100 rounded-[40px] overflow-hidden shadow-2xl mb-12">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-stone-950 text-white">
                    <th class="px-8 py-6 text-[12px] font-black uppercase tracking-[0.3em] font-headline border-b border-white/5 italic">Protocol_ID</th>
                    <th class="px-8 py-6 text-[12px] font-black uppercase tracking-[0.3em] font-headline border-b border-white/5 italic">Timestamp</th>
                    <th class="px-8 py-6 text-[12px] font-black uppercase tracking-[0.3em] font-headline border-b border-white/5 italic">Node_RIF</th>
                    <th class="px-8 py-6 text-[12px] font-black uppercase tracking-[0.3em] font-headline border-b border-white/5 italic">Entity_Identity</th>
                    <th class="px-8 py-6 text-[12px] font-black uppercase tracking-[0.3em] font-headline border-b border-white/5 text-right italic">Exempt</th>
                    <th class="px-8 py-6 text-[12px] font-black uppercase tracking-[0.3em] font-headline border-b border-white/5 text-right italic">Tax_Base</th>
                    <th class="px-8 py-6 text-[12px] font-black uppercase tracking-[0.3em] font-headline border-b border-white/5 text-right italic">VAT (16%)</th>
                    <th class="px-8 py-6 text-[12px] font-black uppercase tracking-[0.3em] font-headline border-b border-white/5 text-right italic">Retentions</th>
                    <th class="px-8 py-6 text-[12px] font-black uppercase tracking-[0.3em] font-headline border-b border-white/5 text-right text-primary italic">Magnitude</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-stone-50">
                <tr class="group hover:bg-primary/5 transition-colors">
                    <td class="px-8 py-6 font-mono text-[11px] font-black text-stone-400 group-hover:text-stone-950 uppercase italic italic">INV-2024-001</td>
                    <td class="px-8 py-6 text-[12px] font-black text-stone-950 uppercase italic tracking-tight">01/11/2024</td>
                    <td class="px-8 py-6 text-[12px] font-black text-stone-600 uppercase italic tracking-tight">J-12345678-9</td>
                    <td class="px-8 py-6">
                        <p class="text-[12px] font-black text-stone-950 uppercase italic leading-none tracking-tight">Siderúrgica del Turbio S.A.</p>
                        <p class="text-[9px] font-black text-stone-400 uppercase tracking-widest mt-1 italic italic">Industrial Entity Node</p>
                    </td>
                    <td class="px-8 py-6 text-[12px] font-mono font-black text-stone-600 text-right italic">0,00</td>
                    <td class="px-8 py-6 text-[12px] font-mono font-black text-stone-950 text-right italic font-mono">12.500,00</td>
                    <td class="px-8 py-6 text-[12px] font-mono font-black text-stone-950 text-right italic font-mono">2.000,00</td>
                    <td class="px-8 py-6 text-[12px] font-mono font-black text-stone-500 text-right italic font-mono">1.500,00</td>
                    <td class="px-8 py-6 text-[16px] font-mono font-black text-stone-950 text-right tracking-tighter leading-none italic font-mono">13.000,00 Bs.</td>
                </tr>
                <tr class="group hover:bg-primary/5 transition-colors">
                    <td class="px-8 py-6 font-mono text-[11px] font-black text-stone-400 group-hover:text-stone-950 uppercase italic italic">INV-2024-002</td>
                    <td class="px-8 py-6 text-[12px] font-black text-stone-950 uppercase italic tracking-tight">02/11/2024</td>
                    <td class="px-8 py-6 text-[12px] font-black text-stone-600 uppercase italic tracking-tight">J-98765432-1</td>
                    <td class="px-8 py-6">
                        <p class="text-[12px] font-black text-stone-950 uppercase italic leading-none tracking-tight">Corp. Eléctrica Nacional</p>
                        <p class="text-[9px] font-black text-stone-400 uppercase tracking-widest mt-1 italic italic">Statetal Utility Grid</p>
                    </td>
                    <td class="px-8 py-6 text-[12px] font-mono font-black text-stone-600 text-right italic">8.420,00</td>
                    <td class="px-8 py-6 text-[12px] font-mono font-black text-stone-950 text-right italic font-mono">0,00</td>
                    <td class="px-8 py-6 text-[12px] font-mono font-black text-stone-950 text-right italic font-mono">0,00</td>
                    <td class="px-8 py-6 text-[12px] font-mono font-black text-stone-500 text-right italic font-mono">0,00</td>
                    <td class="px-8 py-6 text-[16px] font-mono font-black text-stone-950 text-right tracking-tighter leading-none italic font-mono">8.420,00 Bs.</td>
                </tr>
                <tr class="group hover:bg-primary/5 transition-colors">
                    <td class="px-8 py-6 font-mono text-[11px] font-black text-stone-400 group-hover:text-stone-950 uppercase italic italic">INV-2024-003</td>
                    <td class="px-8 py-6 text-[12px] font-black text-stone-950 uppercase italic tracking-tight">05/11/2024</td>
                    <td class="px-8 py-6 text-[12px] font-black text-stone-600 uppercase italic tracking-tight">G-20001234-5</td>
                    <td class="px-8 py-6">
                        <p class="text-[12px] font-black text-stone-950 uppercase italic leading-none tracking-tight">Ministerio de Transporte</p>
                        <p class="text-[9px] font-black text-stone-400 uppercase tracking-widest mt-1 italic italic">Governmental Authority Hub</p>
                    </td>
                    <td class="px-8 py-6 text-[12px] font-mono font-black text-stone-600 text-right italic">0,00</td>
                    <td class="px-8 py-6 text-[12px] font-mono font-black text-stone-950 text-right italic font-mono">45.200,00</td>
                    <td class="px-8 py-6 text-[12px] font-mono font-black text-stone-950 text-right italic font-mono">7.232,00</td>
                    <td class="px-8 py-6 text-[12px] font-mono font-black text-stone-500 text-right italic font-mono">5.424,00</td>
                    <td class="px-8 py-6 text-[16px] font-mono font-black text-stone-950 text-right tracking-tighter leading-none italic font-mono">47.008,00 Bs.</td>
                </tr>
            </tbody>
            <tfoot>
                <tr class="bg-stone-50 border-t-2 border-stone-950">
                    <td class="px-8 py-8 text-[12px] font-black uppercase tracking-[0.4em] text-stone-950 italic" colspan="4">Consolidated Period Totals</td>
                    <td class="px-8 py-8 text-[12px] font-mono font-black text-stone-950 text-right italic font-mono">8.420,00</td>
                    <td class="px-8 py-8 text-[12px] font-mono font-black text-stone-950 text-right italic font-mono">79.850,00</td>
                    <td class="px-8 py-8 text-[12px] font-mono font-black text-stone-950 text-right italic font-mono">12.776,00</td>
                    <td class="px-8 py-8 text-[12px] font-mono font-black text-stone-950 text-right italic font-mono">6.924,00</td>
                    <td class="px-8 py-8 text-2xl font-headline font-black text-primary text-right tracking-tighter leading-none italic font-mono">Bs. 94.122,00</td>
                </tr>
            </tfoot>
        </table>
    </div>
</section>

<!-- Footer: Fiduciary Protocol Summary -->
<footer class="mt-20 flex flex-col md:flex-row justify-between items-start gap-12 border-t border-stone-100 pt-12 pb-16">
    <div class="text-[11px] uppercase font-black tracking-[0.4em] text-stone-400 italic">
        <p class="mb-2">System_Node: ALPHA_FINANCE_ERP</p>
        <p>Fiscal_Token: 0X992-B7F-1120-CC_GEN_001</p>
    </div>
    <div class="text-[11px] text-right uppercase font-black tracking-[0.4em] text-stone-400 italic">
        <p class="mb-2 text-stone-950">Encrypted Signature Protocol Active</p>
        <p>Certified Data Loop for SENIAT Regulatory Audits</p>
    </div>
</footer>

@endsection

@push('scripts')
    <script src="{{ asset('erp/js/libro-ventas.js') }}"></script>
@endpush
