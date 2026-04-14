@extends('erp.layouts.app')

@section('title', 'Factura Electrónica | ERP La Cima')

@section('breadcrumb')
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <a href="{{ url('/erp/ventas') }}" class="hover:text-stone-900 transition-colors">Ventas</a>
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <span class="text-stone-900">Facturación</span>
@endsection

@section('content')
  <!-- Invoice Action Header (No-Print) -->
  <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6 mb-12 no-print">
    <div class="space-y-1">
      <div class="flex items-center gap-2">
        <span class="w-2 h-6 bg-primary rounded-full"></span>
        <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em]">Documentación Fiscal Procesa</p>
      </div>
      <h2 class="text-4xl font-headline font-black text-stone-900 tracking-tight leading-none italic uppercase">Detalle de <span class="text-primary-dim">Factura</span></h2>
    </div>
    
    <div class="flex items-center gap-3">
        <button onclick="window.print()" class="bg-stone-50 border border-stone-100 px-6 py-3 rounded-xl text-[10px] font-black uppercase tracking-widest text-stone-600 hover:text-stone-900 transition-all flex items-center gap-2 italic">
            <span class="material-symbols-outlined text-sm">print</span> Imprimir
        </button>
        <button class="bg-stone-900 px-6 py-3 rounded-xl text-[10px] font-black uppercase tracking-widest text-primary hover:text-white transition-all flex items-center gap-2 italic">
            <span class="material-symbols-outlined text-sm">download</span> Exportar PDF
        </button>
    </div>
  </div>

  <!-- The Industrial Invoice Core -->
  <div class="bg-white rounded-[40px] border border-stone-100 shadow-2xl overflow-hidden relative print:shadow-none print:border-stone-200">
    <!-- Top Aesthetic Bar -->
    <div class="h-4 bg-primary w-full"></div>
    
    <div class="p-12 md:p-16">
        <!-- Header Section -->
        <div class="grid grid-cols-12 gap-12 pb-12 border-b border-stone-50 mb-12">
            <div class="col-span-12 lg:col-span-7">
                <div class="flex items-center gap-6 mb-8">
                    <div class="w-20 h-20 bg-stone-900 rounded-[28px] flex items-center justify-center shadow-2xl shadow-stone-900/20">
                        <span class="material-symbols-outlined text-primary text-4xl" style="font-variation-settings: 'FILL' 1;">precision_manufacturing</span>
                    </div>
                    <div>
                        <h3 class="text-[10px] font-black text-primary uppercase tracking-[0.4em] mb-1">Cero Compromisos</h3>
                        <h2 class="text-2xl font-headline font-black text-stone-900 tracking-tight leading-none uppercase italic">Mayor de Repuesto <br>La Cima, C.A.</h2>
                    </div>
                </div>
                <div class="space-y-1 text-[11px] font-bold text-stone-400 uppercase tracking-[0.1em]">
                    <p class="text-stone-900">RIF: J-40308741-5</p>
                    <p>Zona Industrial Municipal Norte, Av. Henry Ford</p>
                    <p>Galpón C-12. Valencia, Edo. Carabobo</p>
                    <p>+58 (241) 555-0198 • info@lacima-repuestos.com</p>
                </div>
            </div>
            
            <div class="col-span-12 lg:col-span-5 flex flex-col items-end text-right">
                <div class="bg-stone-50 rounded-3xl p-8 border border-stone-100 inline-block">
                    <p class="text-[9px] font-black text-stone-400 uppercase tracking-[0.3em] mb-2">Número de Factura</p>
                    <p class="text-4xl font-headline font-black text-stone-900 tracking-tighter italic">#FE-2024-00892</p>
                    <div class="grid grid-cols-2 gap-8 mt-6 pt-6 border-t border-stone-200">
                        <div>
                            <p class="text-[8px] font-black text-stone-400 uppercase tracking-widest mb-1">Fecha Emisión</p>
                            <p class="text-[10px] font-black text-stone-700 uppercase">24 OCT 2024</p>
                        </div>
                        <div>
                            <p class="text-[8px] font-black text-stone-400 uppercase tracking-widest mb-1">Control SENIAT</p>
                            <p class="text-[10px] font-black text-stone-700 uppercase">00-998822</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Billing Entity Grid -->
        <div class="grid grid-cols-12 gap-12 mb-16">
            <div class="col-span-12 lg:col-span-8">
                <div class="flex items-center gap-2 mb-6">
                    <span class="w-1 h-3 bg-primary rounded-full"></span>
                    <h4 class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em] italic">Información del Cliente</h4>
                </div>
                <div class="bg-stone-900 rounded-[32px] p-8 text-white relative overflow-hidden group">
                    <div class="absolute inset-0 opacity-5 pointer-events-none" style="background-image: radial-gradient(circle, #ceff5e 1px, transparent 1px); background-size: 20px 20px;"></div>
                    <div class="relative z-10">
                        <p class="text-xl font-headline font-black uppercase tracking-tight italic mb-4">Siderúrgica del Turbio, S.A. (SIDETUR)</p>
                        <div class="grid grid-cols-2 gap-8">
                            <div>
                                <p class="text-[8px] font-black text-stone-500 uppercase tracking-widest mb-1">Identificación Fiscal / RIF</p>
                                <p class="text-xs font-black text-primary uppercase">J-00034567-0</p>
                            </div>
                            <div>
                                <p class="text-[8px] font-black text-stone-500 uppercase tracking-widest mb-1">Teléfono Corporativo</p>
                                <p class="text-xs font-black text-white uppercase">+58 (251) 441-2090</p>
                            </div>
                            <div class="col-span-2">
                                <p class="text-[8px] font-black text-stone-500 uppercase tracking-widest mb-1">Dirección Fiscal Registrada</p>
                                <p class="text-xs font-bold text-stone-300 uppercase leading-relaxed">Zona Industrial II, Carrera 4 con Calle 2. Barquisimeto, Edo. Lara.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-span-12 lg:col-span-4">
                <div class="flex items-center gap-2 mb-6">
                    <span class="w-1 h-3 bg-primary rounded-full"></span>
                    <h4 class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em] italic">Términos Logísticos</h4>
                </div>
                <div class="space-y-5">
                    <div class="flex justify-between items-center py-3 border-b border-stone-50">
                        <span class="text-[9px] font-black text-stone-400 uppercase tracking-widest">Condición Pago</span>
                        <span class="text-[10px] font-black text-stone-900 uppercase italic">Contado / Net 07</span>
                    </div>
                    <div class="flex justify-between items-center py-3 border-b border-stone-50">
                        <span class="text-[9px] font-black text-stone-400 uppercase tracking-widest">Origen Despacho</span>
                        <span class="text-[10px] font-black text-stone-900 uppercase italic">WH-VAL-04</span>
                    </div>
                    <div class="flex justify-between items-center py-3 border-b border-stone-50">
                        <span class="text-[9px] font-black text-stone-400 uppercase tracking-widest">Prioridad Sistema</span>
                        <span class="px-3 py-1 bg-stone-900 text-primary rounded-lg text-[8px] font-black uppercase tracking-[0.2em] italic">Crítico / Industrial</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Line Items Table -->
        <div class="mb-16">
            <h4 class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em] mb-6 italic">Desglose de Partes y Servicios</h4>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-stone-50 text-[9px] font-black uppercase tracking-[0.2em] text-stone-400">
                            <th class="py-5 px-6 rounded-l-2xl">Ref / SKU</th>
                            <th class="py-5 px-6">Descripción Técnica</th>
                            <th class="py-5 px-6 text-center">Cant.</th>
                            <th class="py-5 px-6 text-right">P. Unitario ($)</th>
                            <th class="py-5 px-6 text-right rounded-r-2xl">Base Imponible ($)</th>
                        </tr>
                    </thead>
                    <tbody class="text-[11px] font-bold text-stone-700 uppercase">
                        <tr class="border-b border-stone-50 hover:bg-stone-50/50 transition-all group">
                            <td class="py-6 px-6 text-stone-400 font-mono group-hover:text-primary transition-colors">CUM-3972886</td>
                            <td class="py-6 px-6">
                                <p class="text-stone-900 font-black tracking-tight">Crankshaft Main Bearing Set</p>
                                <p class="text-[9px] text-stone-400 mt-1 uppercase italic">Industrial Grade / heavy Duty Application</p>
                            </td>
                            <td class="py-6 px-6 text-center font-black">12</td>
                            <td class="py-6 px-6 text-right font-black">$ 450.00</td>
                            <td class="py-6 px-6 text-right font-black text-stone-900 italic">$ 5.400,00</td>
                        </tr>
                        <tr class="border-b border-stone-50 bg-stone-50/20 hover:bg-stone-50/50 transition-all group">
                            <td class="py-6 px-6 text-stone-400 font-mono group-hover:text-primary transition-colors">DET-23530663</td>
                            <td class="py-6 px-6">
                                <p class="text-stone-900 font-black tracking-tight">Fuel Injector Assembly (Series 60)</p>
                                <p class="text-[9px] text-stone-400 mt-1 uppercase italic">Precision Calibration / Genuine Parts</p>
                            </td>
                            <td class="py-6 px-6 text-center font-black">06</td>
                            <td class="py-6 px-6 text-right font-black">$ 820.00</td>
                            <td class="py-6 px-6 text-right font-black text-stone-900 italic">$ 4.920,00</td>
                        </tr>
                        <tr class="border-b border-stone-50 hover:bg-stone-50/50 transition-all group">
                            <td class="py-6 px-6 text-stone-400 font-mono group-hover:text-primary transition-colors">PER-U5ME0034</td>
                            <td class="py-6 px-6">
                                <p class="text-stone-900 font-black tracking-tight">Upper Gasket Kit - 1104D Series</p>
                                <p class="text-[9px] text-stone-400 mt-1 uppercase italic">Composite Material / Hi-Temp Resistance</p>
                            </td>
                            <td class="py-6 px-6 text-center font-black">03</td>
                            <td class="py-6 px-6 text-right font-black">$ 215.50</td>
                            <td class="py-6 px-6 text-right font-black text-stone-900 italic">$ 646,50</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Financial Summary -->
        <div class="grid grid-cols-12 gap-12">
            <!-- Fiscal Verification (QR/SENIAT) -->
            <div class="col-span-12 lg:col-span-7 bg-stone-50 rounded-[32px] p-8 border border-stone-100 flex items-center gap-8 group">
                <div class="w-32 h-32 bg-white rounded-2xl flex items-center justify-center p-3 shadow-xl shadow-stone-200/50 group-hover:scale-105 transition-all">
                    <!-- Placeholder QR -->
                    <div class="w-full h-full bg-stone-900 flex flex-wrap opacity-10">
                        <div class="w-1/4 h-1/4 bg-white"></div><div class="w-1/4 h-1/4 bg-stone-900 text-white flex items-center justify-center text-[4px] font-black">QR</div>
                    </div>
                    <span class="absolute material-symbols-outlined text-stone-900 text-4xl" style="font-variation-settings: 'FILL' 1;">qr_code_2</span>
                </div>
                <div class="space-y-2">
                    <p class="text-[9px] font-black text-stone-400 uppercase tracking-[0.3em]">Validación Fiscal Electrónica</p>
                    <p class="text-xs font-black text-stone-900 uppercase">Certificación SENIAT: <span class="text-primary-dim">SNT-2024-VLC-00892</span></p>
                    <p class="text-[8px] font-bold text-stone-400 uppercase leading-relaxed max-w-xs italic mt-2">Documento generado automátimanete bajo normativa de contribuyentes especiales. Verificado por el sistema de control industrial La Cima.</p>
                </div>
            </div>
            
            <!-- Totals Stack -->
            <div class="col-span-12 lg:col-span-5 bg-stone-900 rounded-[32px] p-10 text-white relative overflow-hidden group">
                <div class="absolute inset-x-0 bottom-0 h-1 bg-primary w-0 group-hover:w-full transition-all duration-1000"></div>
                <div class="space-y-4">
                    <div class="flex justify-between items-center text-[10px] font-black uppercase text-stone-500 tracking-widest">
                        <span>Base Imponible</span>
                        <span class="text-stone-300 font-bold">$ 10.966,50</span>
                    </div>
                    <div class="flex justify-between items-center text-[10px] font-black uppercase text-stone-500 tracking-widest">
                        <span>IVA Gral (16%)</span>
                        <span class="text-stone-300 font-bold">$ 1.754,64</span>
                    </div>
                    <div class="flex justify-between items-center text-[10px] font-black uppercase text-primary tracking-widest">
                        <span>IVA Retenido (75%)</span>
                        <span class="font-bold">- $ 1.315,98</span>
                    </div>
                    <div class="pt-6 mt-6 border-t border-stone-800">
                        <div class="flex justify-between items-end">
                            <div>
                                <p class="text-[9px] font-black text-stone-500 uppercase tracking-[0.3em] mb-1 italic">Total Neto a Pagar</p>
                                <p class="text-[8px] font-bold text-stone-600 uppercase">Conversión BCV Ref.</p>
                            </div>
                            <div class="text-right">
                                <p class="text-4xl font-headline font-black text-primary tracking-tighter italic leading-none">$ 11.405,16</p>
                                <p class="text-[8px] text-stone-500 font-bold uppercase mt-2 tracking-tighter leading-none">Rate: 1 USD = 35.40 VES (BCV-ID:8892)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection

@push('scripts')
    <script src="{{ asset('erp/js/factura-electronica.js') }}"></script>
    <style>/* Optional hidden utilities for printing */
    @media print {
        header, aside, .no-print { display: none !important; }
        main { margin-top: 0 !important; margin-left: 0 !important; width: 100vw !important; padding: 0 !important; }
        .bg-stone-900 { background-color: #f5f5f5 !important; -webkit-print-color-adjust: exact; print-color-adjust: exact; }
    }
    </style>
@endpush
