@extends('erp.layouts.app')

@section('title', 'Libros Legales | ERP La Cima')

@section('breadcrumb')
    <a href="{{ url('/erp/contabilidad') }}" class="hover:text-stone-900">Contabilidad</a>
    <span class="material-symbols-outlined text-sm">chevron_right</span>
    <span class="text-stone-900 font-medium">Libros Legales</span>
@endsection

@section('content')
<!-- Hero Identity Branding -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-end mb-8 text-white">
    <div class="md:col-span-2">
        <div class="flex items-center gap-4 mb-2">
            <div class="h-[2px] w-12 bg-lime-600"></div>
            <span class="text-lime-500 font-headline uppercase tracking-widest text-xs font-bold">Compliance Generator v4.2</span>
        </div>
        <h2 class="text-5xl font-headline font-bold text-white uppercase leading-none tracking-tighter mt-2">
            MAYOR DE REPUESTO LA CIMA, C.A.
        </h2>
        <p class="text-stone-400 mt-4 max-w-xl font-body text-sm leading-relaxed">
            Precision reporting module for SENIAT industrial compliance. Ensure all fiscal books are generated according to regional tax authority standards with validated digital signatures.
        </p>
    </div>
    <div class="bg-stone-900/50 p-6 rounded-lg border-l-4 border-lime-600 shadow border border-stone-800">
        <div class="flex justify-between items-start mb-4">
            <span class="material-symbols-outlined text-lime-400">calendar_month</span>
            <span class="text-[10px] bg-lime-600/20 text-lime-400 px-2 py-0.5 rounded font-bold">ACTIVE FISCAL</span>
        </div>
        <h4 class="text-stone-400 text-xs font-bold uppercase tracking-widest">Current Fiscal Month</h4>
        <p class="text-2xl font-headline font-bold text-white uppercase tracking-tight mt-1">OCTUBRE 2023</p>
        <button class="w-full mt-4 py-3 bg-red-600 text-white font-headline text-xs font-bold uppercase tracking-widest hover:bg-red-500 transition-all rounded">
            Close Fiscal Month
        </button>
    </div>
</div>

<!-- Configuration Grid -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 text-white">
    <!-- Generator Controls -->
    <div class="lg:col-span-4 space-y-6">
        <div class="bg-stone-900 border border-stone-800 p-6 space-y-6 rounded-xl shadow-lg">
            <h3 class="font-headline font-bold text-white uppercase tracking-widest text-sm flex items-center gap-2">
                <span class="material-symbols-outlined text-lime-400">settings_input_component</span>
                Export Parameters
            </h3>
            <div class="space-y-4">
                <div class="space-y-2">
                    <label class="text-[10px] font-bold text-stone-500 uppercase tracking-widest">Date Range Selection</label>
                    <div class="grid grid-cols-2 gap-2">
                        <div class="bg-stone-800 p-3 rounded">
                            <p class="text-[9px] text-stone-500 uppercase mb-1">Start Date</p>
                            <input class="bg-transparent border-none text-white text-xs w-full p-0 focus:ring-0" type="date" value="2023-10-01"/>
                        </div>
                        <div class="bg-stone-800 p-3 rounded">
                            <p class="text-[9px] text-stone-500 uppercase mb-1">End Date</p>
                            <input class="bg-transparent border-none text-white text-xs w-full p-0 focus:ring-0" type="date" value="2023-10-31"/>
                        </div>
                    </div>
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-bold text-stone-500 uppercase tracking-widest">Document Type</label>
                    <div class="space-y-2">
                        <label class="flex items-center justify-between p-3 bg-stone-800 hover:bg-stone-700/50 transition-colors cursor-pointer group rounded">
                            <span class="text-xs text-stone-300 font-medium">Libro Diario</span>
                            <input checked="" class="rounded border-stone-600 text-lime-600 focus:ring-lime-600 bg-stone-900" type="checkbox"/>
                        </label>
                        <label class="flex items-center justify-between p-3 bg-stone-800 hover:bg-stone-700/50 transition-colors cursor-pointer group rounded">
                            <span class="text-xs text-stone-300 font-medium">Libro Mayor</span>
                            <input checked="" class="rounded border-stone-600 text-lime-600 focus:ring-lime-600 bg-stone-900" type="checkbox"/>
                        </label>
                        <label class="flex items-center justify-between p-3 bg-stone-800 hover:bg-stone-700/50 transition-colors cursor-pointer group rounded">
                            <span class="text-xs text-stone-300 font-medium">Libro de Inventarios</span>
                            <input class="rounded border-stone-600 text-lime-600 focus:ring-lime-600 bg-stone-900" type="checkbox"/>
                        </label>
                        <label class="flex items-center justify-between p-3 bg-stone-800 hover:bg-stone-700/50 transition-colors cursor-pointer group rounded">
                            <span class="text-xs text-stone-300 font-medium">Libro de Compras (IVA)</span>
                            <input checked="" class="rounded border-stone-600 text-lime-600 focus:ring-lime-600 bg-stone-900" type="checkbox"/>
                        </label>
                        <label class="flex items-center justify-between p-3 bg-stone-800 hover:bg-stone-700/50 transition-colors cursor-pointer group rounded">
                            <span class="text-xs text-stone-300 font-medium">Libro de Ventas (IVA)</span>
                            <input checked="" class="rounded border-stone-600 text-lime-600 focus:ring-lime-600 bg-stone-900" type="checkbox"/>
                        </label>
                    </div>
                </div>
            </div>
            <button class="w-full py-4 bg-primary text-stone-900 font-headline text-sm font-bold uppercase tracking-[0.2em] shadow-lg shadow-lime-900/20 hover:scale-[1.02] active:scale-95 transition-all flex items-center justify-center gap-3 rounded">
                <span class="material-symbols-outlined">print_connect</span>
                Generate Books
            </button>
        </div>
    </div>

    <!-- Generation History Table -->
    <div class="lg:col-span-8">
        <div class="bg-stone-900/50 border border-stone-800 rounded-xl overflow-hidden shadow-lg border border-stone-800">
            <div class="px-6 py-4 border-b border-stone-800 flex justify-between items-center bg-stone-900">
                <h3 class="font-headline font-bold text-white uppercase tracking-widest text-sm">Recent Activity Log</h3>
                <div class="flex gap-2">
                    <span class="bg-stone-800 text-stone-400 px-2 py-1 rounded text-[10px] font-bold">12 RECORDS FOUND</span>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left font-body">
                    <thead class="bg-stone-800/50 border-b border-stone-800">
                        <tr>
                            <th class="px-6 py-4 text-[10px] font-bold text-stone-500 uppercase tracking-widest">Timestamp</th>
                            <th class="px-6 py-4 text-[10px] font-bold text-stone-500 uppercase tracking-widest">Document Title</th>
                            <th class="px-6 py-4 text-[10px] font-bold text-stone-500 uppercase tracking-widest">Fiscal Period</th>
                            <th class="px-6 py-4 text-[10px] font-bold text-stone-500 uppercase tracking-widest">Compliance Status</th>
                            <th class="px-6 py-4 text-[10px] font-bold text-stone-500 uppercase tracking-widest">Digital Auth</th>
                            <th class="px-6 py-4 text-right"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-stone-800">
                        <!-- Row 1 -->
                        <tr class="hover:bg-stone-800/30 transition-colors">
                            <td class="px-6 py-4">
                                <p class="text-xs text-white font-medium">2023-10-28</p>
                                <p class="text-[10px] text-stone-500 uppercase">14:22:15 PM</p>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="material-symbols-outlined text-lime-600 text-lg">description</span>
                                    <p class="text-xs text-white font-bold uppercase">Libro Diario</p>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-[11px] text-stone-400">OCT-23</td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center gap-1 px-2 py-1 rounded-full bg-lime-600/10 text-lime-400 text-[9px] font-black uppercase tracking-tighter border border-lime-600/20">
                                    <span class="material-symbols-outlined text-[10px]" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                                    Validated
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center gap-1 px-2 py-1 rounded-full bg-blue-600/10 text-blue-400 text-[9px] font-black uppercase tracking-tighter border border-blue-600/20">
                                    <span class="material-symbols-outlined text-[10px]" style="font-variation-settings: 'FILL' 1;">verified</span>
                                    Signed
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button class="material-symbols-outlined text-stone-500 hover:text-white transition-colors">download</button>
                            </td>
                        </tr>
                        <!-- Row 2 -->
                        <tr class="hover:bg-stone-800/30 transition-colors">
                            <td class="px-6 py-4">
                                <p class="text-xs text-white font-medium">2023-10-28</p>
                                <p class="text-[10px] text-stone-500 uppercase">14:22:10 PM</p>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="material-symbols-outlined text-lime-600 text-lg">folder_shared</span>
                                    <p class="text-xs text-white font-bold uppercase">Libro Mayor</p>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-[11px] text-stone-400">OCT-23</td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center gap-1 px-2 py-1 rounded-full bg-lime-600/10 text-lime-400 text-[9px] font-black uppercase tracking-tighter border border-lime-600/20">
                                    <span class="material-symbols-outlined text-[10px]" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                                    Validated
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center gap-1 px-2 py-1 rounded-full bg-blue-600/10 text-blue-400 text-[9px] font-black uppercase tracking-tighter border border-blue-600/20">
                                    <span class="material-symbols-outlined text-[10px]" style="font-variation-settings: 'FILL' 1;">verified</span>
                                    Signed
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button class="material-symbols-outlined text-stone-500 hover:text-white transition-colors">download</button>
                            </td>
                        </tr>
                        <!-- Row 3 -->
                        <tr class="hover:bg-stone-800/30 transition-colors">
                            <td class="px-6 py-4">
                                <p class="text-xs text-white font-medium">2023-09-30</p>
                                <p class="text-[10px] text-stone-500 uppercase">18:05:22 PM</p>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="material-symbols-outlined text-lime-600 text-lg">shopping_cart</span>
                                    <p class="text-xs text-white font-bold uppercase">Libro de Compras</p>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-[11px] text-stone-400">SEP-23</td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center gap-1 px-2 py-1 rounded-full bg-lime-600/10 text-lime-400 text-[9px] font-black uppercase tracking-tighter border border-lime-600/20">
                                    <span class="material-symbols-outlined text-[10px]" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                                    Validated
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center gap-1 px-2 py-1 rounded-full bg-stone-700 text-stone-300 text-[9px] font-black uppercase tracking-tighter border border-stone-600">
                                    <span class="material-symbols-outlined text-[10px]">lock</span>
                                    Pending Signature
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button class="material-symbols-outlined text-stone-500 hover:text-white transition-colors">download</button>
                            </td>
                        </tr>
                        <!-- Row 4 -->
                        <tr class="hover:bg-stone-800/30 transition-colors">
                            <td class="px-6 py-4">
                                <p class="text-xs text-white font-medium">2023-09-30</p>
                                <p class="text-[10px] text-stone-500 uppercase">18:04:11 PM</p>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="material-symbols-outlined text-lime-600 text-lg">sell</span>
                                    <p class="text-xs text-white font-bold uppercase">Libro de Ventas</p>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-[11px] text-stone-400">SEP-23</td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center gap-1 px-2 py-1 rounded-full bg-lime-600/10 text-lime-400 text-[9px] font-black uppercase tracking-tighter border border-lime-600/20">
                                    <span class="material-symbols-outlined text-[10px]" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                                    Validated
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center gap-1 px-2 py-1 rounded-full bg-stone-700 text-stone-300 text-[9px] font-black uppercase tracking-tighter border border-stone-600">
                                    <span class="material-symbols-outlined text-[10px]">lock</span>
                                    Pending Signature
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button class="material-symbols-outlined text-stone-500 hover:text-white transition-colors">download</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Dashboard Footnote & Map Mockup -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-stretch mt-8 text-white">
    <div class="relative min-h-[300px] overflow-hidden group bg-stone-900 border border-stone-800 rounded-xl">
        <img class="absolute inset-0 w-full h-full object-cover opacity-30 grayscale group-hover:scale-110 transition-transform duration-700" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA0eIaJLIqmWhvDUbWOTgQy82wcadTEPV_V9axH1q0YmHgqteQw13KN74NTdbE36ZYUuyv47M1TpZq1EcfF-OvC8a3EBGvYpg1w5VjFk3lSBj0roE3fYtERq2EY_Cy8Cs-ZxVlCZ2JIG0Hn1fKw1dWyxlJS_3DnsVdXC7Nqc_YkQgPMO5uKgVP_bBwHdzFbmR7nhLV4FWSE98hpg1-BvaGLz2DipR-y2UFS8nb9PwgIsI3c3lHJJp0jjEX-QY99cyEoTsZFVDVB0bM"/>
        <div class="absolute inset-0 bg-gradient-to-t from-stone-900 to-transparent"></div>
        <div class="absolute bottom-0 left-0 p-8 z-10">
            <span class="bg-lime-600 text-white px-3 py-1 text-[10px] font-bold uppercase tracking-widest mb-4 inline-block rounded">Operation Status</span>
            <h4 class="text-2xl font-headline font-bold text-white uppercase tracking-tight">Active Inventory sync</h4>
            <p class="text-sm text-stone-400 mt-2 max-w-sm">Global stock databases are currently synced with local SENIAT legal records. Real-time updates active.</p>
        </div>
    </div>
    
    <div class="bg-stone-950 p-8 border border-stone-800 relative overflow-hidden flex flex-col justify-between rounded-xl">
        <div class="space-y-4">
            <h4 class="text-xs font-bold text-stone-500 uppercase tracking-[0.3em]">Compliance Map</h4>
            <div class="flex items-center gap-2">
                <span class="material-symbols-outlined text-lime-400">location_on</span>
                <span class="text-white font-headline text-lg uppercase tracking-widest">Valencia, Venezuela</span>
            </div>
            <div class="w-full h-40 bg-stone-900 rounded relative overflow-hidden border border-stone-800">
                <img alt="Map Location" class="w-full h-full object-cover opacity-40 grayscale" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA77R_c6-kNY8OEIBzPeVbFdefPWhRkDcApyLnOZw8ScojxOCrNOZ2SdU5Kp5SmElSiuyS5yfCSzi8ZgB5pHJpX6oJUpxBuocXyjgTPyXqX2VZZj5mu2e-NLA5JHBGisdZHK3XX2xOCNc46NgF6tCNjbgN9Inqe-_5I08IeihWzfFVQBEhHpHpev67J6WjmkAMUQNLC7wgfISec5bTWNkgIgvAn_yRviobrZBIDJGkuSO0_gHlIzH5XJft7CYpkEpusYiR0MpUvhB4"/>
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="w-4 h-4 bg-lime-600 rounded-full animate-ping"></div>
                    <div class="w-2 h-2 bg-lime-400 rounded-full absolute"></div>
                </div>
            </div>
        </div>
        <div class="pt-6 flex justify-between items-end border-t border-stone-800 mt-6">
            <div>
                <p class="text-[10px] text-stone-500 font-bold uppercase">Legal Entity RIF</p>
                <p class="text-white font-headline font-bold tracking-widest">J-12345678-9</p>
            </div>
            <span class="material-symbols-outlined text-stone-700 text-4xl">factory</span>
        </div>
    </div>
</div>

<!-- Signature Visual Element -->
<div class="fixed -bottom-24 -right-24 w-96 h-96 bg-lime-600/5 rounded-full blur-[100px] pointer-events-none z-0"></div>
@endsection

@push('scripts')
    <script src="{{ asset('erp/js/libros-legales.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const main = document.querySelector('main');
            if(main) {
                main.classList.remove('bg-background', 'bg-stone-50');
                main.classList.add('bg-[#1a1c1c]');
            }
        });
    </script>
@endpush
