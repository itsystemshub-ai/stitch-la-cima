@extends('erp.layouts.app')

@section('title', 'Recepción de Factura | ERP La Cima')

@section('breadcrumb')
    <a href="{{ url('/erp/compras') }}" class="hover:text-stone-900">Compras</a>
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <span class="text-stone-900">Recepción Facturas</span>
@endsection

@section('content')
    <!-- Page Header: Strategic Document Registry -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6 mb-10 pb-8 border-b border-stone-100">
        <div>
            <div class="flex items-center gap-2 mb-2">
                <span class="w-8 h-[2px] bg-primary"></span>
                <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em]">Carga de Documentos Fiscales</p>
            </div>
            <h1 class="text-5xl font-headline font-black text-stone-900 tracking-tighter uppercase leading-none">Recepción de <span class="text-stone-400">Factura</span></h1>
            <p class="text-xs text-stone-400 mt-2 font-medium uppercase tracking-widest text-[#9ca3af]">MAYOR DE REPUESTO LA CIMA, C.A. • RIF: J-40308741-5</p>
        </div>
        <div class="flex gap-4">
            <div class="bg-stone-900 px-6 py-4 flex flex-col items-end rounded-2xl shadow-xl">
                <span class="text-[10px] font-black text-primary uppercase tracking-widest opacity-80">Cumplimiento Legal</span>
                <span class="text-xs font-headline font-black text-white uppercase tracking-tighter mt-1 italic">Providencia SENIAT/00071</span>
            </div>
        </div>
    </div>

    <!-- Record Entry - Bento Grid Concept -->
    <div class="grid grid-cols-12 gap-8 mb-12">
        <!-- Main Transaction Form (8 cols) -->
        <div class="col-span-12 lg:col-span-8 space-y-8">
            <!-- Header Data Card -->
            <section class="bg-white border border-stone-200 p-10 rounded-[32px] shadow-sm relative overflow-hidden group hover:shadow-xl transition-all duration-500">
                <div class="absolute top-0 left-0 w-2 h-full bg-primary transform origin-bottom scale-y-0 group-hover:scale-y-100 transition-transform duration-500"></div>
                
                <h3 class="text-sm font-black text-stone-400 uppercase tracking-[0.2em] mb-10 border-b border-stone-50 pb-4">Información del Proveedor y Documento</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-8">
                    <div class="space-y-3">
                        <label class="block text-[10px] font-black text-stone-400 uppercase tracking-widest">Proveedor Autorizado</label>
                        <div class="relative group">
                            <select class="w-full bg-stone-50 border-none rounded-xl py-4 px-5 text-sm font-bold text-stone-900 focus:ring-4 focus:ring-primary/10 transition-all appearance-none cursor-pointer">
                                <option>SIDERÚRGICA DEL SUR C.A. - J-12345678-9</option>
                                <option>REPUESTOS INDUSTRIALES TITÁN - J-87654321-0</option>
                                <option>ENGRANAJES & MOTORES VZLA - J-11223344-5</option>
                            </select>
                            <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-stone-400 pointer-events-none group-hover:text-primary transition-colors">expand_more</span>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <label class="block text-[10px] font-black text-stone-400 uppercase tracking-widest">Nro de Factura Física</label>
                        <input class="w-full bg-stone-50 border-none rounded-xl py-4 px-5 text-sm font-mono font-bold text-stone-900 focus:ring-4 focus:ring-primary/10 transition-all placeholder:text-stone-300" placeholder="FAC-000000" type="text"/>
                    </div>

                    <div class="space-y-3">
                        <label class="block text-[10px] font-black text-stone-400 uppercase tracking-widest">Fecha de Emisión</label>
                        <input class="w-full bg-stone-50 border-none rounded-xl py-4 px-5 text-sm font-bold text-stone-900 focus:ring-4 focus:ring-primary/10 transition-all" type="date"/>
                    </div>

                    <div class="space-y-3">
                        <label class="block text-[10px] font-black text-stone-400 uppercase tracking-widest">Control Interno / Almacén</label>
                        <input class="w-full bg-stone-50 border-none rounded-xl py-4 px-5 text-sm font-bold text-stone-900 focus:ring-4 focus:ring-primary/10 transition-all" type="date"/>
                    </div>
                </div>
            </section>

            <!-- Line Items Table -->
            <section class="bg-white border border-stone-200 rounded-[32px] shadow-sm overflow-hidden flex flex-col group/table">
                <div class="p-10 pb-6 flex justify-between items-center bg-stone-50/30">
                    <div class="flex items-center gap-4">
                        <div class="w-2 h-6 bg-stone-900 rounded-full"></div>
                        <h3 class="text-sm font-black text-stone-900 uppercase tracking-widest">Desglose de Partes y Suministros</h3>
                    </div>
                    <button class="flex items-center gap-3 bg-stone-900 text-primary py-3 px-6 rounded-xl hover:bg-black transition-all active:scale-95 group/btn">
                        <span class="material-symbols-outlined text-[18px] group-hover/btn:rotate-90 transition-transform">add</span>
                        <span class="text-[10px] font-black uppercase tracking-widest">Agregar Fila</span>
                    </button>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-stone-50/50">
                            <tr>
                                <th class="px-10 py-5 text-[9px] font-black text-stone-400 uppercase tracking-widest">SKU / CÓDIGO PARTE</th>
                                <th class="px-5 py-5 text-[9px] font-black text-stone-400 uppercase tracking-widest">DESCRIPCIÓN TÉCNICA</th>
                                <th class="px-5 py-5 text-[9px] font-black text-stone-400 uppercase tracking-widest">CANTIDAD</th>
                                <th class="px-5 py-5 text-[9px] font-black text-stone-400 uppercase tracking-widest text-right">UNITARIO ($)</th>
                                <th class="px-10 py-5 text-[9px] font-black text-stone-400 uppercase tracking-widest text-right">SUBTOTAL</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-stone-50 font-medium">
                            <tr class="hover:bg-primary/5 transition-colors group/row">
                                <td class="px-10 py-6">
                                    <input class="bg-transparent border-none p-0 w-full font-mono text-xs font-black text-stone-900 focus:ring-0" type="text" value="BRG-2024-X1"/>
                                </td>
                                <td class="px-5 py-6">
                                    <input class="bg-transparent border-none p-0 w-full text-xs font-bold text-stone-600 focus:ring-0" type="text" value="Rodamiento de Bolas Alta Velocidad 6205-2Z"/>
                                </td>
                                <td class="px-5 py-6">
                                    <div class="flex items-center gap-3">
                                        <button class="w-6 h-6 rounded-md border border-stone-200 flex items-center justify-center text-stone-400 hover:bg-stone-900 hover:text-white transition-all">-</button>
                                        <input class="bg-transparent border-none p-0 w-10 text-center text-xs font-black text-stone-900 focus:ring-0" type="number" value="12"/>
                                        <button class="w-6 h-6 rounded-md border border-stone-200 flex items-center justify-center text-stone-400 hover:bg-stone-900 hover:text-white transition-all">+</button>
                                    </div>
                                </td>
                                <td class="px-5 py-6 text-right font-mono text-xs font-black text-stone-900">$45.50</td>
                                <td class="px-10 py-6 text-right font-headline font-black text-stone-900 tracking-tight">$546.00</td>
                            </tr>
                            <tr class="hover:bg-primary/5 transition-colors group/row bg-stone-50/20">
                                <td class="px-10 py-6">
                                    <input class="bg-transparent border-none p-0 w-full font-mono text-xs font-black text-stone-900 focus:ring-0" type="text" value="VLV-IND-99"/>
                                </td>
                                <td class="px-5 py-6">
                                    <input class="bg-transparent border-none p-0 w-full text-xs font-bold text-stone-600 focus:ring-0" type="text" value="Válvula de Compuerta Acero Inoxidable 2''"/>
                                </td>
                                <td class="px-5 py-6">
                                    <div class="flex items-center gap-3">
                                        <button class="w-6 h-6 rounded-md border border-stone-200 flex items-center justify-center text-stone-400 hover:bg-stone-900 hover:text-white transition-all">-</button>
                                        <input class="bg-transparent border-none p-0 w-10 text-center text-xs font-black text-stone-900 focus:ring-0" type="number" value="2"/>
                                        <button class="w-6 h-6 rounded-md border border-stone-200 flex items-center justify-center text-stone-400 hover:bg-stone-900 hover:text-white transition-all">+</button>
                                    </div>
                                </td>
                                <td class="px-5 py-6 text-right font-mono text-xs font-black text-stone-900">$1,280.00</td>
                                <td class="px-10 py-6 text-right font-headline font-black text-stone-900 tracking-tight">$2,560.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="p-10 bg-stone-900 flex justify-end gap-16 items-center">
                    <div class="text-right">
                        <span class="text-[9px] font-black text-stone-500 uppercase tracking-widest block mb-2">Base Imponible Consolidada</span>
                        <p class="text-3xl font-headline font-black text-white">$3,106.00</p>
                    </div>
                </div>
            </section>
        </div>

        <!-- Fiscal and Summary Sidebar (4 cols) -->
        <div class="col-span-12 lg:col-span-4 space-y-8">
            <!-- Liquidación Card -->
            <section class="bg-stone-950 p-10 rounded-[40px] shadow-2xl relative overflow-hidden group/fiscal">
                <div class="absolute -right-10 -top-10 w-40 h-40 bg-primary/10 blur-[100px] rounded-full group-hover/fiscal:bg-primary/20 transition-all duration-700"></div>
                
                <h3 class="text-sm font-black text-primary uppercase tracking-[0.2em] mb-12 flex items-center gap-3">
                    <span class="w-2 h-2 bg-primary rounded-full animate-pulse"></span>
                    Liquidación Tributaria
                </h3>

                <div class="space-y-8">
                    <div class="flex justify-between items-end border-b border-white/5 pb-4">
                        <span class="text-[10px] font-black text-stone-500 uppercase tracking-widest text-[#9ca3af]">Subtotal Operativo</span>
                        <span class="text-xl font-mono text-white">$3,106.00</span>
                    </div>
                    
                    <div class="flex justify-between items-end border-b border-white/5 pb-4">
                        <div class="flex items-center gap-3">
                            <span class="text-[10px] font-black text-stone-500 uppercase tracking-widest text-[#9ca3af]">IVA (16.00%)</span>
                            <span class="px-2 py-0.5 bg-white/5 text-primary text-[8px] font-black uppercase rounded border border-white/10">Crédito</span>
                        </div>
                        <span class="text-xl font-mono text-white">$496.96</span>
                    </div>

                    <div class="bg-white/5 backdrop-blur-md p-6 rounded-2xl border border-white/5 relative group/ret">
                        <div class="flex justify-between items-start mb-2">
                            <div>
                                <span class="text-primary font-black uppercase text-[11px] tracking-tight">Retención IVA (75%)</span>
                                <p class="text-[8px] text-stone-500 font-bold uppercase mt-1">Sujeto a Agente de Especial</p>
                            </div>
                            <span class="text-lg font-mono text-red-400">- $372.72</span>
                        </div>
                    </div>

                    <div class="pt-8 text-center md:text-right">
                        <span class="text-[10px] font-black text-stone-400 uppercase tracking-widest block mb-4">Total Neto a Provisionar</span>
                        <div class="flex items-baseline justify-end gap-3 text-white">
                            <span class="text-2xl font-black font-headline text-stone-500">USD</span>
                            <span class="text-6xl font-black font-headline tracking-tighter">$3,230.24</span>
                        </div>
                    </div>
                </div>

                <div class="mt-12 p-5 bg-stone-900 rounded-2xl border-l-4 border-primary">
                    <div class="flex gap-4">
                        <span class="material-symbols-outlined text-primary text-xl">gavel</span>
                        <div>
                            <p class="text-[9px] font-black text-white uppercase tracking-widest mb-1">Integridad Contable</p>
                            <p class="text-[9px] text-stone-500 font-bold leading-relaxed">Generación automática de comprobante y asiento en Libro de Compras validado.</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Metadata & Actions -->
            <div class="flex flex-col gap-4">
                <div class="bg-white border border-stone-200 p-6 rounded-[24px] flex items-center justify-between group cursor-pointer hover:border-primary/50 transition-all">
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 bg-stone-50 rounded-xl flex items-center justify-center text-stone-400 group-hover:text-primary group-hover:bg-primary/5 transition-colors">
                            <span class="material-symbols-outlined text-[20px]">warehouse</span>
                        </div>
                        <div>
                            <p class="text-[9px] font-black text-stone-400 uppercase tracking-widest">Impacto Logístico</p>
                            <p class="text-xs font-black text-stone-900">+14 Unidades en Stock</p>
                        </div>
                    </div>
                    <span class="material-symbols-outlined text-stone-300">chevron_right</span>
                </div>

                <button class="w-full bg-primary text-stone-900 py-6 rounded-3xl flex items-center justify-center gap-4 hover:shadow-2xl hover:shadow-primary/30 transition-all active:scale-95 group/btn-main">
                    <span class="text-xs font-black uppercase tracking-[0.2em] font-headline">Cargar Factura al Gasto</span>
                    <span class="material-symbols-outlined group-hover/btn-main:translate-x-2 transition-transform">bolt</span>
                </button>
                
                <p class="text-center text-[8px] font-black text-stone-400 uppercase tracking-widest">Procedimiento Crítico: irreversible tras confirmación de almacén</p>
            </div>
        </div>
    </div>

    <!-- Technical Telemetry Footer -->
    <footer class="mt-8 pt-8 border-t border-stone-100 flex flex-col md:flex-row justify-between items-center gap-6 text-[9px] font-black text-stone-300 uppercase tracking-widest mb-12">
        <div class="flex items-center gap-10">
            <div class="flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                <span>Nivel de Cifrado: AES-256</span>
            </div>
            <span>Servidor: CIMA-V3-PROD-01</span>
        </div>
        <div class="flex items-center gap-3 text-stone-400">
            <span class="material-symbols-outlined text-sm">verified</span>
            <span>Estampado de Tiempo Certificado: 2024.05.24 14:32:01</span>
        </div>
    </footer>
@endsection

@push('scripts')
    <script src="{{ asset('erp/js/factura-compra.js') }}"></script>
    <style>
      .bg-\[\#fbfbfb\] {
        background-color: #fbfbfb;
      }
    </style>
@endpush
