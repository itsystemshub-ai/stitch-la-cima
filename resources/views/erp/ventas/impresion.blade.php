@extends('erp.layouts.app')

@section('title', 'Impresión de Factura')

@section('breadcrumb')
    <a href="{{ url('/erp/inicio') }}" class="hover:text-stone-900 transition-colors">ERP</a>
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <a href="{{ url('/erp/ventas') }}" class="hover:text-stone-900 transition-colors">Ventas</a>
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <span class="text-stone-900">Vista de Impresión</span>
@endsection

@section('content')
    <div class="max-w-4xl mx-auto bg-white border border-stone-200 shadow-2xl rounded-[40px] overflow-hidden p-16 print:border-none print:shadow-none print:p-0">
        <!-- Factura Header -->
        <div class="flex justify-between items-start mb-16">
            <div>
                <h2 class="text-2xl font-black text-stone-900 uppercase mb-2 tracking-tighter">MAYOR DE REPUESTO LA CIMA, C.A.</h2>
                <p class="text-[10px] text-stone-400 font-bold uppercase tracking-widest leading-loose">
                    RIF: J-40308741-5<br>
                    AV. INTERCOMUNAL, GALPON #4<br>
                    BARQUISIMETO, EDO. LARA
                </p>
            </div>
            <div class="text-right">
                <span class="px-6 py-2 bg-stone-950 text-primary text-[10px] font-black uppercase tracking-widest rounded-full mb-4 inline-block">FACTURA FISCAL</span>
                <p class="text-3xl font-headline font-black text-stone-900">#FAC-2023-00452</p>
                <p class="text-[10px] text-stone-400 font-bold uppercase tracking-widest mt-2 underline decoration-primary decoration-2 underline-offset-4">FECHA: 12-04-2026</p>
            </div>
        </div>

        <!-- Table -->
        <div class="border-t-2 border-stone-900 mb-12 pt-8">
            <table class="w-full text-left">
                <thead>
                    <tr class="text-[10px] font-black text-stone-400 uppercase tracking-widest border-b border-stone-100">
                        <th class="py-4">Descripción del Repuesto</th>
                        <th class="py-4 text-center">Cant.</th>
                        <th class="py-4 text-right">Unitario</th>
                        <th class="py-4 text-right">Subtotal</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-50">
                    <tr class="text-xs font-bold text-stone-900 uppercase">
                        <td class="py-6">Kit de Empacadura Motor 4JJ1</td>
                        <td class="py-6 text-center">02</td>
                        <td class="py-6 text-right">$125.00</td>
                        <td class="py-6 text-right font-black">$250.00</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Totals -->
        <div class="flex justify-end pt-8 border-t-2 border-stone-900">
            <div class="w-64 space-y-4">
                <div class="flex justify-between text-[10px] font-black text-stone-400 uppercase">
                    <span>Base Imponible</span>
                    <span class="text-stone-900">$250.00</span>
                </div>
                <div class="flex justify-between text-[10px] font-black text-stone-400 uppercase italic">
                    <span>I.V.A (16%)</span>
                    <span class="text-stone-900">$40.00</span>
                </div>
                <div class="flex justify-between text-2xl font-headline font-black text-stone-900 pt-4 border-t border-stone-100">
                    <span>TOTAL</span>
                    <span class="text-primary">$290.00</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Print Control (Non-Printable) -->
    <div class="fixed bottom-12 right-12 print:hidden">
        <button onclick="window.print()" class="bg-black text-primary w-20 h-20 rounded-full shadow-2xl flex items-center justify-center hover:scale-110 transition-all active:scale-95 group">
            <span class="material-symbols-outlined text-3xl group-hover:animate-bounce">print</span>
        </button>
    </div>
@endsection
