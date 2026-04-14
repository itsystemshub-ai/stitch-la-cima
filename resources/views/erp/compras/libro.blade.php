@extends('erp.layouts.app')

@section('title', 'Libro de Compras Fiscal | ERP La Cima')

@section('breadcrumb')
    <a href="{{ url('/erp/compras') }}" class="hover:text-stone-900">Compras</a>
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <span class="text-stone-900">Libro de Compras</span>
@endsection

@section('content')
    <!-- Header: Fiscal Operations -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6 mb-10">
        <div>
            <div class="flex items-center gap-2 mb-2">
                <span class="w-8 h-[2px] bg-primary"></span>
                <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em]">Control Fiscal de Operaciones de Compra</p>
            </div>
            <h2 class="text-4xl font-headline font-black text-stone-900 tracking-tighter uppercase leading-none">Libro de <span class="text-stone-400">Compras</span></h2>
            <p class="text-xs text-stone-400 mt-2 font-medium uppercase tracking-widest">MAYOR DE REPUESTO LA CIMA, C.A. • RIF: J-40308741-5</p>
        </div>
        <div class="flex gap-3">
            <button class="bg-stone-900 text-primary px-6 py-3 text-[10px] font-black uppercase tracking-widest flex items-center gap-3 hover:bg-stone-800 transition-all rounded-xl shadow-xl active:scale-95">
                <span class="material-symbols-outlined text-sm">print_connect</span>
                Generar Legalización
            </button>
            <button class="bg-white border border-stone-200 text-stone-500 hover:text-stone-900 p-3 rounded-xl transition-all shadow-sm">
                <span class="material-symbols-outlined">settings_suggest</span>
            </button>
        </div>
    </div>

    <!-- Totalizers Bento -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-10">
        <div class="bg-white border border-stone-200 p-6 rounded-2xl shadow-sm">
            <p class="text-[9px] font-black text-stone-400 uppercase tracking-widest mb-2">Base Imponible</p>
            <p class="text-xl font-headline font-black text-stone-900">$45,290.50</p>
        </div>
        <div class="bg-white border border-stone-200 p-6 rounded-2xl shadow-sm">
            <p class="text-[9px] font-black text-stone-400 uppercase tracking-widest mb-2">Crédito Fiscal (IVA 16%)</p>
            <p class="text-xl font-headline font-black text-stone-900">$7,246.48</p>
        </div>
        <div class="bg-stone-950 p-6 rounded-2xl shadow-xl relative overflow-hidden group">
            <div class="absolute inset-x-0 bottom-0 h-1 bg-primary"></div>
            <p class="text-[9px] font-black text-primary uppercase tracking-widest mb-2">IVA Retenido</p>
            <p class="text-xl font-headline font-black text-white">$5,434.86</p>
        </div>
        <div class="bg-white border border-stone-200 p-6 rounded-2xl shadow-sm">
            <p class="text-[9px] font-black text-stone-400 uppercase tracking-widest mb-2">Total Consolidado</p>
            <p class="text-xl font-headline font-black text-stone-900">$52,536.98</p>
        </div>
    </div>

    <!-- Fiscal Ledger Table -->
    <div class="bg-white rounded-2xl border border-stone-200 overflow-hidden shadow-sm mb-10">
        <div class="p-6 border-b border-stone-50 flex justify-between items-center bg-stone-50/50">
            <div class="flex items-center gap-4">
                <select class="bg-white border border-stone-200 text-[10px] font-black uppercase tracking-widest text-stone-900 focus:ring-1 focus:ring-primary outline-none px-4 py-2 rounded-lg pr-9">
                    <option>Período: Octubre 2026</option>
                    <option>Período: Septiembre 2026</option>
                </select>
                <div class="flex items-center gap-2 px-4 py-2 bg-primary/10 rounded-lg">
                    <span class="w-1.5 h-1.5 bg-stone-900 rounded-full animate-pulse"></span>
                    <span class="text-[9px] font-black text-stone-900 uppercase tracking-widest">Estado: Abierto</span>
                </div>
            </div>
            <p class="text-[9px] font-black text-stone-400 uppercase tracking-widest">Módulo de Auditoría Fiscal Activo</p>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-stone-50/80">
                        <th class="px-6 py-5 text-[9px] font-black text-stone-400 uppercase tracking-[0.2em]">Cómputo</th>
                        <th class="px-6 py-5 text-[9px] font-black text-stone-400 uppercase tracking-[0.2em]">Identificación Fiscal (RIF)</th>
                        <th class="px-6 py-5 text-[9px] font-black text-stone-400 uppercase tracking-[0.2em]">Proveedor / Aliado</th>
                        <th class="px-6 py-5 text-[9px] font-black text-stone-400 uppercase tracking-[0.2em]">Documento</th>
                        <th class="px-6 py-5 text-[9px] font-black text-stone-400 uppercase tracking-[0.2em] text-right">Base Imponible</th>
                        <th class="px-6 py-5 text-[9px] font-black text-stone-400 uppercase tracking-[0.2em] text-right">IVA</th>
                        <th class="px-6 py-5 text-[9px] font-black text-stone-400 uppercase tracking-[0.2em] text-center">Protocolo Ret.</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-100 font-mono text-[10px]">
                    <tr class="hover:bg-stone-50/80 transition-colors">
                        <td class="px-6 py-4 font-bold text-stone-900">12/10/26</td>
                        <td class="px-6 py-4 font-black text-stone-900">J-31456789-0</td>
                        <td class="px-6 py-4 uppercase text-stone-500 font-bold">Siderúrgica del Turbo C.A.</td>
                        <td class="px-6 py-4 text-stone-400">FAC: 00045612 <br> <span class="text-[8px] uppercase tracking-tighter">CTRL: 00-998811</span></td>
                        <td class="px-6 py-4 text-right font-black text-stone-900">12.500,00</td>
                        <td class="px-6 py-4 text-right font-black text-stone-500">2.000,00</td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-2 py-1 bg-stone-900 text-primary text-[8px] font-black uppercase rounded">2026100045</span>
                        </td>
                    </tr>
                    <tr class="hover:bg-stone-50/80 transition-colors">
                        <td class="px-6 py-4 font-bold text-stone-900">15/10/26</td>
                        <td class="px-6 py-4 font-black text-stone-900">J-00123456-7</td>
                        <td class="px-6 py-4 uppercase text-stone-500 font-bold">Tecnología de Motores V8</td>
                        <td class="px-6 py-4 text-stone-400">FAC: 00008922 <br> <span class="text-[8px] uppercase tracking-tighter">CTRL: 00-004512</span></td>
                        <td class="px-6 py-4 text-right font-black text-stone-900">5.200,00</td>
                        <td class="px-6 py-4 text-right font-black text-stone-500">832,00</td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-2 py-1 bg-stone-900 text-primary text-[8px] font-black uppercase rounded">2026100046</span>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr class="bg-stone-900 text-white font-headline font-black uppercase tracking-widest text-[11px]">
                        <td colspan="4" class="px-6 py-4 text-right">Consolidado Fiscal del Período</td>
                        <td class="px-6 py-4 text-right text-primary">45.290,50</td>
                        <td class="px-6 py-4 text-right">7.246,48</td>
                        <td class="px-6 py-4 text-center">$52,536.98</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <!-- Compliance Footer -->
    <div class="mt-8 pt-8 border-t border-stone-100 flex flex-col md:flex-row justify-between items-start gap-12 opacity-50">
        <div class="max-w-xl">
            <h4 class="text-[9px] font-black text-stone-900 uppercase tracking-widest mb-3 text-center md:text-left">Nota Jurídica Administrativa</h4>
            <p class="text-[9px] text-stone-500 leading-relaxed font-medium">Este documento constituye la transcripción digital de las operaciones de compra conforme a la Providencia Administrativa SNAT/2011/00071 del SENIAT. La integridad de estos registros está garantizada por el protocolo Zenith Alpha Core.</p>
        </div>
        <div class="flex items-center gap-6">
            <div class="text-right">
                <p class="text-[8px] font-black text-stone-400 uppercase tracking-widest">Sello de Integridad Fiscal</p>
                <p class="text-[9px] font-mono text-stone-900 font-black">HASH_SHA256: 8F2A...1E4C</p>
            </div>
            <div class="w-12 h-12 bg-stone-900 rounded-lg flex items-center justify-center text-primary border border-stone-800">
                <span class="material-symbols-outlined text-2xl">verified_user</span>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('erp/js/libro-compras.js') }}"></script>
@endpush
