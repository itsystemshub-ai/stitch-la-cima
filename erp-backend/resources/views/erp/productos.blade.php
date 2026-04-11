@extends('layouts.erp')

@section('title', 'Inventario | Mayor de Repuesto LA CIMA, C.A. | ERP La Cima')

@push('styles')
    <link rel="stylesheet" href="/frontend/public/erp/css/productos.css">
@endpush

@section('content')
<script>
  document.addEventListener('DOMContentLoaded', () => {
      const b = document.getElementById('breadcrumbPage');
      if(b) b.innerText = 'Productos';
  });
</script>

<main class="p-10 flex-1">
        <!-- Page Title -->
        <div class="flex justify-between items-end mb-12">
            <div>
                <h2 class="text-6xl font-black text-white uppercase tracking-tighter mb-4 leading-none">Inventory Management</h2>
                <div class="flex items-center gap-6">
                    <div class="h-2 w-24 bg-primary"></div>
                    <span class="text-on-surface-variant text-xs font-black uppercase tracking-[0.4em]">Global Stock Control v4.2</span>
                </div>
            </div>
            <button class="bg-white text-black px-10 py-5 text-[10px] font-black uppercase tracking-[0.2em] flex items-center gap-4 hover:bg-primary transition-all shadow-xl">
                <span class="material-symbols-outlined font-black">add</span>
                New Product Entry
            </button>
        </div>

        <!-- Metric Bento -->
        <div class="grid grid-cols-4 gap-6 mb-10">
            <div class="bg-surface border border-outline p-8 group hover:bg-black transition-all">
                <p class="text-[9px] text-on-surface-variant font-black uppercase tracking-[0.3em] mb-6">Category Filter</p>
                <select class="bg-transparent border-none text-white text-2xl font-black p-0 focus:ring-0 uppercase tracking-tighter w-full cursor-pointer">
                    <option class="bg-surface">ALL MOTOR PARTS</option>
                    <option class="bg-surface">CYLINDER HEADS</option>
                    <option class="bg-surface">PISTON KITS</option>
                    <option class="bg-surface">CRANKSHAFTS</option>
                </select>
            </div>
            <div class="bg-surface border border-outline p-8 group hover:bg-black transition-all">
                <p class="text-[9px] text-on-surface-variant font-black uppercase tracking-[0.3em] mb-6">Brand Line</p>
                <select class="bg-transparent border-none text-white text-2xl font-black p-0 focus:ring-0 uppercase tracking-tighter w-full cursor-pointer">
                    <option class="bg-surface">ANY BRAND</option>
                    <option class="bg-surface">CUMMINS HEAVY</option>
                    <option class="bg-surface">CATERPILLAR GEN</option>
                    <option class="bg-surface">PERKINS IND</option>
                </select>
            </div>
            <div class="bg-surface border border-outline p-8">
                <p class="text-[9px] text-on-surface-variant font-black uppercase tracking-[0.3em] mb-6">Stock Health</p>
                <div class="flex items-center gap-4">
                    <div class="w-3 h-3 rounded-full bg-[#FFB300] animate-pulse"></div>
                    <span class="text-white text-2xl font-black tracking-tighter uppercase">LOW STOCK (4)</span>
                </div>
            </div>
            <div class="bg-black border border-primary/20 p-8 flex items-center justify-center relative overflow-hidden">
                <div class="absolute inset-0 opacity-[0.03]" style="background-image: radial-gradient(#ceff5e 1px, transparent 1px); background-size: 10px 10px;"></div>
                <div class="text-center z-10">
                    <p class="text-[42px] font-black text-primary leading-none tracking-tighter">1,402</p>
                    <p class="text-[9px] text-on-surface-variant font-black uppercase tracking-[0.3em] mt-3">Total SKU Count</p>
                </div>
            </div>
        </div>

        <!-- Inventory Table -->
        <div class="bg-surface border border-outline overflow-hidden rounded-sm shadow-2xl">
            <div class="overflow-x-auto custom-scrollbar">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-black">
                            <th class="p-6 text-xs font-black text-on-surface-variant uppercase tracking-[0.2em] border-b border-outline">SKU Code</th>
                            <th class="p-6 text-xs font-black text-on-surface-variant uppercase tracking-[0.2em] border-b border-outline">Component Name</th>
                            <th class="p-6 text-xs font-black text-on-surface-variant uppercase tracking-[0.2em] border-b border-outline">Category</th>
                            <th class="p-6 text-xs font-black text-on-surface-variant uppercase tracking-[0.2em] border-b border-outline">Stock Status</th>
                            <th class="p-6 text-xs font-black text-on-surface-variant uppercase tracking-[0.2em] border-b border-outline text-right">Cost (USD)</th>
                            <th class="p-6 text-xs font-black text-on-surface-variant uppercase tracking-[0.2em] border-b border-outline text-right">Price + IVA</th>
                            <th class="p-6 text-xs font-black text-on-surface-variant uppercase tracking-[0.2em] border-b border-outline text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-outline">
                        <!-- Product Row 1 -->
                        <tr class="hover:bg-black/40 transition-colors group">
                            <td class="p-6 text-sm font-black text-primary tracking-widest">#CP-8842-12</td>
                            <td class="p-6">
                                <p class="text-sm font-black text-white uppercase tracking-tight">Cylinder Head Gasket</p>
                                <p class="text-xs text-on-surface-variant font-bold uppercase tracking-widest mt-1">Cummins ISX Series</p>
                            </td>
                            <td class="p-6">
                                <span class="bg-white/5 border border-white/10 text-on-surface-variant text-xs font-black px-3 py-1 uppercase tracking-widest">Engine Seals</span>
                            </td>
                            <td class="p-6">
                                <div class="flex items-center gap-4">
                                    <div class="flex-1 bg-black h-1.5 max-w-[100px] border border-outline overflow-hidden rounded-full">
                                        <div class="bg-primary h-full w-[85%] shadow-[0_0_10px_#ceff5e]"></div>
                                    </div>
                                    <span class="text-[11px] font-black text-white tracking-widest">42 <span class="text-on-surface-variant font-bold text-[9px]">/ 50</span></span>
                                </div>
                            </td>
                            <td class="p-6 text-right text-sm font-black text-on-surface-variant tracking-tighter">$124.50</td>
                            <td class="p-6 text-right text-sm font-black text-primary tracking-tighter">$144.42</td>
                            <td class="p-6">
                                <div class="flex justify-center gap-3">
                                    <button class="p-2 text-on-surface-variant hover:text-primary transition-all"><span class="material-symbols-outlined text-lg">edit</span></button>
                                    <button class="p-2 text-on-surface-variant hover:text-white transition-all"><span class="material-symbols-outlined text-lg">archive</span></button>
                                </div>
                            </td>
                        </tr>
                        <!-- Product Row 2 (Critical) -->
                        <tr class="bg-red-500/5 hover:bg-red-500/10 transition-colors border-l-4 border-red-500">
                            <td class="p-6 text-sm font-black text-red-500 tracking-widest">#PK-1102-X</td>
                            <td class="p-6">
                                <p class="text-sm font-black text-white uppercase tracking-tight">Main Bearing Set</p>
                                <p class="text-[9px] text-red-500/60 font-medium uppercase tracking-widest mt-1">Perkins 1104D-44TA</p>
                            </td>
                            <td class="p-6">
                                <span class="bg-red-500/10 border border-red-500/20 text-red-500 text-[9px] font-black px-3 py-1 uppercase tracking-widest">Internal Parts</span>
                            </td>
                            <td class="p-6">
                                <div class="flex items-center gap-4">
                                    <div class="flex-1 bg-black h-1.5 max-w-[100px] border border-outline overflow-hidden rounded-full">
                                        <div class="bg-red-500 h-full w-[15%]"></div>
                                    </div>
                                    <span class="text-[11px] font-black text-red-500 tracking-widest">03 <span class="text-red-500/40 font-bold text-[9px]">/ 20</span></span>
                                </div>
                            </td>
                            <td class="p-6 text-right text-sm font-black text-on-surface-variant tracking-tighter">$82.00</td>
                            <td class="p-6 text-right text-sm font-black text-primary tracking-tighter">$95.12</td>
                            <td class="p-6 text-center">
                                <span class="material-symbols-outlined text-red-500 text-lg animate-pulse" style="font-variation-settings: 'FILL' 1;">error</span>
                            </td>
                        </tr>
                        <!-- Product Row 3 -->
                        <tr class="hover:bg-black/40 transition-colors group">
                            <td class="p-6 text-sm font-black text-primary tracking-widest">#FP-9931-B</td>
                            <td class="p-6">
                                <p class="text-sm font-black text-white uppercase tracking-tight">Fuel Injection Pump</p>
                                <p class="text-[9px] text-on-surface-variant font-bold uppercase tracking-widest mt-1">Bosch Heavy Duty</p>
                            </td>
                            <td class="p-6"><span class="bg-white/5 border border-white/10 text-on-surface-variant text-[9px] font-black px-3 py-1 uppercase tracking-widest">Fuel Systems</span></td>
                            <td class="p-6">
                                <div class="flex items-center gap-4">
                                    <div class="flex-1 bg-black h-1.5 max-w-[100px] border border-outline overflow-hidden rounded-full"><div class="bg-primary h-full w-[60%]"></div></div>
                                    <span class="text-[11px] font-black text-white tracking-widest">08 <span class="text-on-surface-variant font-bold text-[9px]">/ 12</span></span>
                                </div>
                            </td>
                            <td class="p-6 text-right text-sm font-black text-on-surface-variant tracking-tighter">$1,840.00</td>
                            <td class="p-6 text-right text-sm font-black text-primary tracking-tighter">$2,134.40</td>
                            <td class="p-6 text-center text-on-surface-variant"><span class="material-symbols-outlined text-lg">edit</span></td>
                        </tr>
                        <!-- Product Row 4 -->
                        <tr class="hover:bg-black/40 transition-colors group">
                            <td class="p-6 text-sm font-black text-primary tracking-widest">#TU-4420-W</td>
                            <td class="p-6">
                                <p class="text-sm font-black text-white uppercase tracking-tight">Turbocharger Assembly</p>
                                <p class="text-[9px] text-on-surface-variant font-bold uppercase tracking-widest mt-1">Holset HE351CW</p>
                            </td>
                            <td class="p-6"><span class="bg-white/5 border border-white/10 text-on-surface-variant text-[9px] font-black px-3 py-1 uppercase tracking-widest">Air Intake</span></td>
                            <td class="p-6">
                                <div class="flex items-center gap-4">
                                    <div class="flex-1 bg-black h-1.5 max-w-[100px] border border-outline overflow-hidden rounded-full"><div class="bg-primary h-full w-[40%]"></div></div>
                                    <span class="text-[11px] font-black text-white tracking-widest">02 <span class="text-on-surface-variant font-bold text-[9px]">/ 05</span></span>
                                </div>
                            </td>
                            <td class="p-6 text-right text-sm font-black text-on-surface-variant tracking-tighter">$645.00</td>
                            <td class="p-6 text-right text-sm font-black text-primary tracking-tighter">$748.20</td>
                            <td class="p-6 text-center text-on-surface-variant"><span class="material-symbols-outlined text-lg">edit</span></td>
                        </tr>
                        <!-- Row 5 (Warning) -->
                        <tr class="bg-[#FFB300]/5 hover:bg-[#FFB300]/10 transition-colors border-l-4 border-[#FFB300]">
                            <td class="p-6 text-sm font-black text-[#FFB300] tracking-widest">#VL-0012-S</td>
                            <td class="p-6">
                                <p class="text-sm font-black text-white uppercase tracking-tight">Exhaust Valve Set</p>
                                <p class="text-[9px] text-[#FFB300]/60 font-medium uppercase tracking-widest mt-1">CAT 3406E Industrial</p>
                            </td>
                            <td class="p-6"><span class="bg-[#FFB300]/10 border border-[#FFB300]/20 text-[#FFB300] text-[9px] font-black px-3 py-1 uppercase tracking-widest">Valve Train</span></td>
                            <td class="p-6">
                                <div class="flex items-center gap-4">
                                    <div class="flex-1 bg-black h-1.5 max-w-[100px] border border-outline overflow-hidden rounded-full"><div class="bg-[#FFB300] h-full w-[5%]"></div></div>
                                    <span class="text-[11px] font-black text-[#FFB300] tracking-widest">01 <span class="text-[#FFB300]/40 font-bold text-[9px]">/ 24</span></span>
                                </div>
                            </td>
                            <td class="p-6 text-right text-sm font-black text-on-surface-variant tracking-tighter">$18.40</td>
                            <td class="p-6 text-right text-sm font-black text-primary tracking-tighter">$21.34</td>
                            <td class="p-6 text-center text-[#FFB300]"><span class="material-symbols-outlined text-lg">warning</span></td>
                        </tr>
                        <!-- Product Row 6 -->
                        <tr class="hover:bg-black/40 transition-colors group">
                            <td class="p-6 text-sm font-black text-primary tracking-widest">#OP-5521-X</td>
                            <td class="p-6">
                                <p class="text-sm font-black text-white uppercase tracking-tight">Oil Pump Assembly</p>
                                <p class="text-[9px] text-on-surface-variant font-bold uppercase tracking-widest mt-1">Detroit Diesel Series 60</p>
                            </td>
                            <td class="p-6"><span class="bg-white/5 border border-white/10 text-on-surface-variant text-[9px] font-black px-3 py-1 uppercase tracking-widest">Lubrication</span></td>
                            <td class="p-6">
                                <div class="flex items-center gap-4">
                                    <div class="flex-1 bg-black h-1.5 max-w-[100px] border border-outline overflow-hidden rounded-full"><div class="bg-primary h-full w-[100%]"></div></div>
                                    <span class="text-[11px] font-black text-white tracking-widest">12 <span class="text-on-surface-variant font-bold text-[9px]">/ 12</span></span>
                                </div>
                            </td>
                            <td class="p-6 text-right text-sm font-black text-on-surface-variant tracking-tighter">$312.00</td>
                            <td class="p-6 text-right text-sm font-black text-primary tracking-tighter">$361.92</td>
                            <td class="p-6 text-center text-on-surface-variant"><span class="material-symbols-outlined text-lg">edit</span></td>
                        </tr>
                        <!-- Product Row 7 -->
                        <tr class="hover:bg-black/40 transition-colors group">
                            <td class="p-6 text-sm font-black text-primary tracking-widest">#RA-2211-L</td>
                            <td class="p-6">
                                <p class="text-sm font-black text-white uppercase tracking-tight">Heavy Duty Radiator</p>
                                <p class="text-[9px] text-on-surface-variant font-bold uppercase tracking-widest mt-1">Kenworth T800 Core</p>
                            </td>
                            <td class="p-6"><span class="bg-white/5 border border-white/10 text-on-surface-variant text-[9px] font-black px-3 py-1 uppercase tracking-widest">Cooling</span></td>
                            <td class="p-6">
                                <div class="flex items-center gap-4">
                                    <div class="flex-1 bg-black h-1.5 max-w-[100px] border border-outline overflow-hidden rounded-full"><div class="bg-primary h-full w-[30%]"></div></div>
                                    <span class="text-[11px] font-black text-white tracking-widest">03 <span class="text-on-surface-variant font-bold text-[9px]">/ 10</span></span>
                                </div>
                            </td>
                            <td class="p-6 text-right text-sm font-black text-on-surface-variant tracking-tighter">$940.00</td>
                            <td class="p-6 text-right text-sm font-black text-primary tracking-tighter">$1,090.40</td>
                            <td class="p-6 text-center text-on-surface-variant"><span class="material-symbols-outlined text-lg">edit</span></td>
                        </tr>
                        <!-- Product Row 8 -->
                        <tr class="hover:bg-black/40 transition-colors group">
                            <td class="p-6 text-sm font-black text-primary tracking-widest">#ST-6600-A</td>
                            <td class="p-6">
                                <p class="text-sm font-black text-white uppercase tracking-tight">24V Heavy Starter Motor</p>
                                <p class="text-[9px] text-on-surface-variant font-bold uppercase tracking-widest mt-1">Delco Remy 39MT</p>
                            </td>
                            <td class="p-6"><span class="bg-white/5 border border-white/10 text-on-surface-variant text-[9px] font-black px-3 py-1 uppercase tracking-widest">Electrical</span></td>
                            <td class="p-6">
                                <div class="flex items-center gap-4">
                                    <div class="flex-1 bg-black h-1.5 max-w-[100px] border border-outline overflow-hidden rounded-full"><div class="bg-primary h-full w-[75%]"></div></div>
                                    <span class="text-[11px] font-black text-white tracking-widest">15 <span class="text-on-surface-variant font-bold text-[9px]">/ 20</span></span>
                                </div>
                            </td>
                            <td class="p-6 text-right text-sm font-black text-on-surface-variant tracking-tighter">$425.00</td>
                            <td class="p-6 text-right text-sm font-black text-primary tracking-tighter">$493.00</td>
                            <td class="p-6 text-center text-on-surface-variant"><span class="material-symbols-outlined text-lg">edit</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- Pagination -->
            <div class="px-8 py-6 bg-black border-t border-outline flex justify-between items-center">
                <p class="text-[9px] text-on-surface-variant font-black uppercase tracking-[0.3em]">Showing 15 of 1,402 line items</p>
                <div class="flex gap-2">
                    <button class="w-10 h-10 flex items-center justify-center bg-surface border border-outline text-on-surface-variant hover:text-primary hover:border-primary transition-all text-xs font-black">1</button>
                    <button class="w-10 h-10 flex items-center justify-center bg-primary text-black text-xs font-black">2</button>
                    <button class="w-10 h-10 flex items-center justify-center bg-surface border border-outline text-on-surface-variant hover:text-primary hover:border-primary transition-all text-xs font-black">3</button>
                    <span class="flex items-center px-4 text-outline">...</span>
                    <button class="w-10 h-10 flex items-center justify-center bg-surface border border-outline text-on-surface-variant hover:text-primary hover:border-primary transition-all text-xs font-black">94</button>
                </div>
            </div>
        </div>

        <!-- Summary Statistics -->
        <div class="grid grid-cols-12 gap-8 mt-12">
            <div class="col-span-8 bg-black border-l-8 border-primary p-10 relative overflow-hidden">
                <div class="absolute right-0 top-0 opacity-[0.02] transform translate-x-1/4 -translate-y-1/4 scale-150">
                    <span class="material-symbols-outlined text-[300px]">precision_manufacturing</span>
                </div>
                <div class="relative z-10">
                    <h3 class="text-3xl font-black text-white uppercase tracking-tighter mb-4">Active Inventory Value</h3>
                    <p class="text-[10px] text-on-surface-variant font-black uppercase tracking-[0.4em] mb-8">Live Warehouse Appraisal System</p>
                    <div class="flex items-baseline gap-4">
                        <span class="text-6xl font-black text-primary tracking-tighter">$1,452,310.00</span>
                        <span class="text-sm font-black text-on-surface-variant uppercase tracking-widest">USD</span>
                    </div>
                    <div class="grid grid-cols-2 gap-10 mt-12">
                        <div class="border-t border-outline pt-6">
                            <p class="text-[9px] text-on-surface-variant font-black uppercase tracking-[0.3em] mb-2">Pre-Tax Warehouse Cost</p>
                            <p class="text-2xl font-black text-white tracking-widest leading-none">$1,219,940.40</p>
                        </div>
                        <div class="border-t border-outline pt-6">
                            <p class="text-[9px] text-on-surface-variant font-black uppercase tracking-[0.3em] mb-2">VAT Liability (16.0%)</p>
                            <p class="text-2xl font-black text-white tracking-widest leading-none">$232,369.60</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-span-4 bg-surface border-l-8 border-[#FFB300] p-10 flex flex-col justify-between">
                <div>
                    <h3 class="text-2xl font-black text-white uppercase tracking-tighter mb-8 leading-none">Restock Pipeline</h3>
                    <div class="space-y-6">
                        <div class="flex items-center justify-between border-b border-outline pb-4">
                            <span class="text-[10px] text-on-surface-variant font-black uppercase tracking-widest">Critical Low SKUs</span>
                            <span class="bg-[#FFB300] text-black text-[10px] font-black px-3 py-1 uppercase tracking-widest">04 SKUs</span>
                        </div>
                        <div class="flex items-center justify-between border-b border-outline pb-4">
                            <span class="text-[10px] text-on-surface-variant font-black uppercase tracking-widest">Pending Shipments</span>
                            <span class="text-white text-sm font-black uppercase tracking-widest">12 Orders</span>
                        </div>
                    </div>
                </div>
                <button class="w-full py-5 bg-black border border-[#FFB300]/20 text-[10px] font-black uppercase text-[#FFB300] tracking-[0.2em] hover:bg-[#FFB300] hover:text-black transition-all">
                    Generate Restock Report
                </button>
            </div>
        </div>
    </main>
@endsection

@push('scripts')
    <script src="/frontend/public/erp/js/productos.js"></script>
@endpush
