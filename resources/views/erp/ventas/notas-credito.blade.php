@extends('erp.layouts.app')

@section('title', 'Notas de Crédito | ERP La Cima')

@section('breadcrumb')
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <a href="{{ url('/erp/ventas') }}" class="hover:text-stone-900 transition-colors">Ventas</a>
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <span class="text-stone-900">Notas de Crédito</span>
@endsection

@section('content')
  <!-- Credit Note Header -->
  <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6 mb-12">
    <div class="space-y-1">
      <div class="flex items-center gap-2">
        <span class="w-2 h-6 bg-primary rounded-full shadow-[0_0_15px_#ceff5e]"></span>
        <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em]">Documentación Rectificativa</p>
      </div>
      <h2 class="text-4xl font-headline font-black text-stone-900 tracking-tight leading-none italic uppercase">Notas de <span class="text-primary-dim">Crédito</span></h2>
    </div>
    
    <div class="bg-stone-900 px-6 py-4 rounded-2xl flex items-center gap-6 border border-primary/20">
        <div>
            <p class="text-[8px] font-black text-stone-500 uppercase tracking-widest">Saldo a Reintegrar</p>
            <p class="text-xl font-headline font-black text-primary tracking-tight leading-none">$ 0,00</p>
        </div>
        <div class="w-[1px] h-8 bg-stone-800"></div>
        <button class="bg-primary px-6 py-2 rounded-xl text-[10px] font-black uppercase tracking-widest text-stone-900 hover:scale-105 transition-all italic">
            Procesar NC
        </button>
    </div>
  </div>

  <div class="grid grid-cols-12 gap-8 mb-12">
    <!-- Search & Details -->
    <div class="col-span-12 lg:col-span-4 space-y-8">
        <div class="bg-white rounded-[32px] p-8 border border-stone-100 shadow-sm relative group">
            <h3 class="text-[10px] font-black text-stone-400 uppercase tracking-[0.2em] mb-6">Vincular Documento</h3>
            <div class="relative mb-4">
                <input type="text" placeholder="NRO DE FACTURA (E.G. F-0001824)" class="w-full bg-stone-50 border-stone-100 text-[11px] font-bold py-4 px-6 rounded-2xl focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all uppercase tracking-widest outline-none italic">
                <button class="absolute right-2 top-2 w-10 h-10 bg-stone-900 text-primary rounded-xl flex items-center justify-center hover:scale-110 transition-all shadow-lg">
                    <span class="material-symbols-outlined text-lg">search</span>
                </button>
            </div>
            <p class="text-[9px] font-bold text-stone-400 italic">Ingrese el número de control para cargar partidas.</p>
        </div>

        <div class="bg-stone-50 rounded-[32px] p-8 border border-stone-100 italic">
            <h3 class="text-[10px] font-black text-stone-400 uppercase tracking-[0.2em] mb-6">Motivo Fiscal</h3>
            <div class="space-y-3">
                <label class="flex items-center gap-3 p-4 bg-white rounded-2xl border border-stone-100 cursor-pointer hover:border-primary transition-all group">
                    <input type="radio" name="reason" class="w-4 h-4 text-primary focus:ring-primary border-stone-200">
                    <span class="text-[10px] font-black text-stone-600 uppercase tracking-widest">Devolución de Mercancía</span>
                </label>
                <label class="flex items-center gap-3 p-4 bg-white rounded-2xl border border-stone-100 cursor-pointer hover:border-primary transition-all group">
                    <input type="radio" name="reason" class="w-4 h-4 text-primary focus:ring-primary border-stone-200">
                    <span class="text-[10px] font-black text-stone-600 uppercase tracking-widest">Anulación Total</span>
                </label>
                <label class="flex items-center gap-3 p-4 bg-white rounded-2xl border border-stone-100 cursor-pointer hover:border-primary transition-all group">
                    <input type="radio" name="reason" class="w-4 h-4 text-primary focus:ring-primary border-stone-200">
                    <span class="text-[10px] font-black text-stone-600 uppercase tracking-widest">Error en Facturación</span>
                </label>
            </div>
        </div>
    </div>

    <!-- Product Grid for Credit -->
    <div class="col-span-12 lg:col-span-8 bg-white rounded-[40px] border border-stone-100 shadow-xl overflow-hidden min-h-[500px]">
        <div class="p-8 border-b border-stone-50 bg-stone-50/30 flex justify-between items-center">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-stone-900 rounded-xl flex items-center justify-center text-primary shadow-lg scale-90">
                    <span class="material-symbols-outlined text-xl">inventory_2</span>
                </div>
                <h3 class="text-[11px] font-black text-stone-900 uppercase tracking-widest italic">Partidas Facturadas (Lectura)</h3>
            </div>
            <p class="text-[9px] font-black text-stone-400 uppercase tracking-widest">Doc: F-PENDIENTE</p>
        </div>

        <div class="p-8">
            <table class="w-full text-left">
                <thead>
                    <tr class="text-[9px] font-black uppercase tracking-[0.2em] text-stone-400 border-b border-stone-50">
                        <th class="pb-6 px-4">Descripción del Repuesto</th>
                        <th class="pb-6 px-4 text-center">Cant. Fac.</th>
                        <th class="pb-6 px-4 text-center">Cant. Dev.</th>
                        <th class="pb-6 px-4 text-right">Precio Unit. ($)</th>
                        <th class="pb-6 px-4 text-right">Monto NC ($)</th>
                    </tr>
                </thead>
                <tbody class="text-[10px] font-bold text-stone-600 uppercase italic">
                    <tr class="border-b border-stone-50">
                        <td class="py-6 px-4">
                            <p class="text-stone-900 font-black tracking-tight leading-tight">Pastillas de Freno Premium - Cerámica</p>
                            <p class="text-[8px] text-stone-400 mt-1 uppercase tracking-widest font-sans">SKU: MC-34928-PF</p>
                        </td>
                        <td class="py-6 px-4 text-center font-black text-stone-400">04</td>
                        <td class="py-6 px-4 text-center">
                            <input type="number" value="0" class="w-12 bg-stone-50 border-stone-100 text-[10px] font-black py-1 px-2 rounded-lg text-center focus:ring-primary focus:border-primary outline-none">
                        </td>
                        <td class="py-6 px-4 text-right">24.50</td>
                        <td class="py-6 px-4 text-right font-black text-stone-900 italic">0,00</td>
                    </tr>
                    <tr class="border-b border-stone-50">
                        <td class="py-6 px-4">
                            <p class="text-stone-900 font-black tracking-tight leading-tight">Kit Rodamientos Trasero Industrial</p>
                            <p class="text-[8px] text-stone-400 mt-1 uppercase tracking-widest font-sans">SKU: KR-1120</p>
                        </td>
                        <td class="py-6 px-4 text-center font-black text-stone-400">02</td>
                        <td class="py-6 px-4 text-center">
                            <input type="number" value="0" class="w-12 bg-stone-50 border-stone-100 text-[10px] font-black py-1 px-2 rounded-lg text-center focus:ring-primary focus:border-primary outline-none">
                        </td>
                        <td class="py-6 px-4 text-right">18.20</td>
                        <td class="py-6 px-4 text-right font-black text-stone-900 italic">0,00</td>
                    </tr>
                </tbody>
            </table>

            <div class="mt-12 bg-stone-50 rounded-3xl p-8 border border-stone-100 italic">
                <div class="flex justify-between items-center mb-4 opacity-40">
                    <p class="text-[10px] font-black text-stone-600 uppercase tracking-widest">Base Imponible NC</p>
                    <p class="text-[11px] font-black text-stone-900">$ 0,00</p>
                </div>
                <div class="flex justify-between items-center mb-6 opacity-40">
                    <p class="text-[10px] font-black text-stone-600 uppercase tracking-widest">IVA Rectificado (16%)</p>
                    <p class="text-[11px] font-black text-stone-900">$ 0,00</p>
                </div>
                <div class="w-full h-[1px] bg-stone-200 mb-6"></div>
                <div class="flex justify-between items-center">
                    <p class="text-[12px] font-black text-stone-900 uppercase tracking-[0.2em] italic">Total Nota de Crédito</p>
                    <p class="text-2xl font-headline font-black text-stone-900 tracking-tighter">$ 0,00</p>
                </div>
            </div>
        </div>
    </div>
  </div>

  <!-- Compliance Footer -->
  <div class="grid grid-cols-12 gap-8 mb-12">
    <div class="col-span-12 lg:col-span-9 bg-stone-900 rounded-[40px] p-10 border border-primary/20 flex flex-col md:flex-row items-center gap-10">
        <div class="w-24 h-24 bg-primary/10 rounded-[32px] border border-primary/30 flex items-center justify-center text-primary italic shadow-2xl">
            <span class="material-symbols-outlined text-4xl">history_edu</span>
        </div>
        <div class="space-y-4 text-center md:text-left">
            <h4 class="text-lg font-headline font-black text-white uppercase tracking-tight italic">Control de Auditoría Reversiva</h4>
            <p class="text-[10px] font-black text-stone-500 uppercase tracking-[0.3em] leading-loose max-w-lg">Toda Nota de Crédito emitida debe estar debidamente justificada según normativa vigente. RIF: J-40308741-5 • Mayor de Repuesto La Cima.</p>
        </div>
    </div>
    
    <div class="col-span-12 lg:col-span-3 bg-stone-50 rounded-[40px] p-10 border border-stone-100 relative group flex flex-col justify-center italic">
        <h4 class="text-[9px] font-black text-stone-400 uppercase tracking-[0.3em] mb-4 text-center">Protocolo Legal</h4>
        <div class="p-4 bg-white rounded-2xl border border-stone-200 text-center">
            <p class="text-[11px] font-black text-stone-900 uppercase tracking-widest italic animate-pulse">Certificando...</p>
        </div>
    </div>
  </div>

  <!-- Footer Branding -->
  <div class="py-12 border-t border-stone-50 mt-12 text-center opacity-30 group hover:opacity-100 transition-all duration-700">
      <p class="text-[9px] font-black text-stone-400 uppercase tracking-[0.5em] mb-2 leading-none italic">Credit Revision Engine v3.0 // Fiscal Correction Framework</p>
      <p class="text-[8px] font-bold text-stone-300 uppercase tracking-[0.2em]">MAYOR DE REPUESTO LA CIMA, C.A. • RIF: J-40308741-5</p>
  </div>
@endsection

@push('scripts')
    <script src="{{ asset('erp/js/notas-credito.js') }}"></script>
@endpush
