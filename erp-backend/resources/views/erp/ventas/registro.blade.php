@extends('erp.layouts.app')

@section('title', 'Registro Diario de Ventas | ERP La Cima')

@section('breadcrumb')
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <a href="{{ url('/erp/ventas') }}" class="hover:text-stone-900 transition-colors">Ventas</a>
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <span class="text-stone-900">Registro Diario</span>
@endsection

@section('content')
  <!-- Header & Search -->
  <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6 mb-12">
    <div class="space-y-1">
      <div class="flex items-center gap-2">
        <span class="w-2 h-6 bg-primary rounded-full"></span>
        <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em]">Auditoría Comercial & Liquidaciones</p>
      </div>
      <h2 class="text-4xl font-headline font-black text-stone-900 tracking-tight leading-none italic uppercase">Bitácora de <span class="text-primary-dim">Operaciones</span></h2>
    </div>
    
    <div class="flex items-center gap-3">
      <div class="relative group">
        <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-stone-400 group-focus-within:text-primary transition-colors text-lg">search</span>
        <input type="text" placeholder="Filtrar por Folio o RIF..." class="bg-white border border-stone-200 pl-12 pr-6 py-3 rounded-xl text-xs font-bold w-64 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all outline-none">
      </div>
      <button class="bg-stone-900 text-white px-5 py-3 rounded-xl flex items-center gap-3 hover:bg-stone-800 transition-all active:scale-95 shadow-xl shadow-stone-200">
        <span class="material-symbols-outlined text-lg text-primary">download</span>
        <span class="text-[10px] font-bold uppercase tracking-widest text-white">Exportar</span>
      </button>
    </div>
  </div>

  <!-- Summary Dashboard (Mini Layout) -->
  <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
    <div class="bg-stone-900 rounded-3xl p-8 shadow-2xl relative overflow-hidden group">
      <div class="absolute inset-0 opacity-10" style="background-image: repeating-linear-gradient(45deg, #ceff5e 0, #ceff5e 1px, transparent 0, transparent 50%); background-size: 10px 10px;"></div>
      <div class="relative z-10">
        <p class="text-[10px] font-black text-stone-500 uppercase tracking-[0.3em] mb-4">Recaudado (24h)</p>
        <h3 class="text-4xl font-headline font-black text-white tracking-tighter mb-2">$ 14,203<span class="text-primary">.50</span></h3>
        <div class="flex items-center gap-2 text-[10px] font-black text-primary uppercase tracking-widest">
           <span class="material-symbols-outlined text-sm">trending_up</span> +5.2% vs ayer
        </div>
      </div>
    </div>
    <div class="bg-white rounded-3xl p-8 border border-stone-100 shadow-sm">
      <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em] mb-4">Cuentas por Cobrar</p>
      <h3 class="text-4xl font-headline font-black text-stone-900 tracking-tighter mb-2">$ 8,940<span class="text-stone-300">.00</span></h3>
      <p class="text-[10px] font-black text-amber-600 uppercase tracking-widest">12 facturas críticas</p>
    </div>
    <div class="bg-white rounded-3xl p-8 border border-stone-100 shadow-sm">
      <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em] mb-4">Ticket Promedio</p>
      <h3 class="text-4xl font-headline font-black text-stone-900 tracking-tighter mb-2">$ 535<span class="text-stone-300">/ORD</span></h3>
      <p class="text-[10px] font-black text-green-600 uppercase tracking-widest">Estabilidad detectada</p>
    </div>
  </div>

  <!-- Operations Table -->
  <div class="bg-white rounded-3xl border border-stone-100 shadow-sm overflow-hidden mb-12">
    <div class="px-10 py-8 border-b border-stone-50 flex justify-between items-center bg-stone-50/30">
        <div>
            <h4 class="text-lg font-black text-stone-900 uppercase tracking-tight italic">Libro de Operaciones Diarias</h4>
            <p class="text-xs text-stone-400 font-medium">Cronología exacta de transacciones comerciales</p>
        </div>
        <div class="flex gap-2">
            <span class="px-3 py-1 bg-primary/10 text-primary border border-primary/20 rounded-full text-[9px] font-black uppercase tracking-widest">Live Sync</span>
        </div>
    </div>
    <div class="overflow-x-auto">
      <table class="w-full">
        <thead>
          <tr class="text-left border-b border-stone-50 text-[10px] font-black text-stone-400 uppercase tracking-[0.2em] bg-stone-50/20">
            <th class="py-6 pl-10">Folio ID</th>
            <th class="py-6">Tipo</th>
            <th class="py-6">Entidad Registrada</th>
            <th class="py-6">Modalidad</th>
            <th class="py-6 text-right">Monto Unitario</th>
            <th class="py-6 text-center pr-10">Estatus Fiscal</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-stone-50">
          <tr class="group hover:bg-stone-50/80 transition-all duration-300">
            <td class="py-7 pl-10">
              <span class="text-xs font-mono font-bold text-stone-400 group-hover:text-primary-dim transition-colors">#TN-90212</span>
            </td>
            <td class="py-7">
              <span class="px-2 py-0.5 bg-blue-50 text-blue-600 rounded text-[9px] font-black uppercase tracking-widest border border-blue-100">Mostrador</span>
            </td>
            <td class="py-7">
              <div>
                <p class="text-sm font-bold text-stone-900 leading-none mb-1 uppercase tracking-tight transition-colors">Suministros Industriales S.A.</p>
                <p class="text-[9px] text-stone-400 italic">Repuestos Motor CAT3406 (Heavy Duty)</p>
              </div>
            </td>
            <td class="py-7 font-black text-[10px] text-stone-500 uppercase tracking-widest">Transferencia</td>
            <td class="py-7 text-right">
              <span class="text-base font-headline font-black text-stone-900 tracking-tight">$ 1,240.00</span>
            </td>
            <td class="py-7 pr-10 text-right">
                <div class="flex items-center justify-center">
                    <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse mr-2"></span>
                    <span class="text-[10px] font-black text-green-600 uppercase tracking-widest">Liquidada</span>
                </div>
            </td>
          </tr>
          <tr class="group hover:bg-stone-50/80 transition-all duration-300">
            <td class="py-7 pl-10">
              <span class="text-xs font-mono font-bold text-stone-400 group-hover:text-primary-dim transition-colors">#TN-90213</span>
            </td>
            <td class="py-7">
              <span class="px-2 py-0.5 bg-primary/20 text-stone-900 rounded text-[9px] font-black uppercase tracking-widest border border-primary/20">Punto Venta</span>
            </td>
            <td class="py-7">
              <div>
                <p class="text-sm font-bold text-stone-900 leading-none mb-1 uppercase tracking-tight transition-colors">Cliente Final D. Lopez</p>
                <p class="text-[9px] text-stone-400 italic">Kit Filtros Aire/Aceite (Volvo Pack)</p>
              </div>
            </td>
            <td class="py-7 font-black text-[10px] text-stone-500 uppercase tracking-widest">Efectivo (USD)</td>
            <td class="py-7 text-right">
              <span class="text-base font-headline font-black text-stone-900 tracking-tight">$ 125.50</span>
            </td>
            <td class="py-7 pr-10 text-right">
                <div class="flex items-center justify-center">
                    <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                    <span class="text-[10px] font-black text-green-600 uppercase tracking-widest">Liquidada</span>
                </div>
            </td>
          </tr>
          <tr class="group hover:bg-stone-50/80 transition-all duration-300">
            <td class="py-7 pl-10">
              <span class="text-xs font-mono font-bold text-stone-400 group-hover:text-primary-dim transition-colors">#TN-90214</span>
            </td>
            <td class="py-7">
              <span class="px-2 py-0.5 bg-amber-50 text-amber-600 rounded text-[9px] font-black uppercase tracking-widest border border-amber-100">Crédito</span>
            </td>
            <td class="py-7">
              <div>
                <p class="text-sm font-bold text-stone-900 leading-none mb-1 uppercase tracking-tight transition-colors">Logística del Norte S.R.L.</p>
                <p class="text-[9px] text-stone-400 italic">Correctivo Mayor Flota Eje A2</p>
              </div>
            </td>
            <td class="py-7 font-black text-[10px] text-stone-500 uppercase tracking-widest">Factura 30D</td>
            <td class="py-7 text-right">
              <span class="text-base font-headline font-black text-stone-900 tracking-tight">$ 4,890.00</span>
            </td>
            <td class="py-7 pr-10 text-right">
                <div class="flex items-center justify-center">
                    <span class="w-2 h-2 bg-amber-500 rounded-full mr-2 shadow-[0_0_8px_rgba(245,158,11,0.5)]"></span>
                    <span class="text-[10px] font-black text-amber-600 uppercase tracking-widest">Por Cobrar</span>
                </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Table Footer / Pagination -->
    <div class="px-10 py-6 bg-stone-50/50 border-t border-stone-50 flex flex-col md:flex-row justify-between items-center gap-6">
        <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.2em]">Reporte Consolidado • MAYOR DE REPUESTO LA CIMA, C.A. • RIF: J-40308741-5</p>
        <div class="flex items-center gap-4">
            <span class="text-[10px] font-black text-stone-400 uppercase tracking-widest">Pág. 1 de 14</span>
            <div class="flex gap-2">
                <button class="w-8 h-8 rounded-lg border border-stone-200 flex items-center justify-center hover:bg-white transition-all"><span class="material-symbols-outlined text-sm">chevron_left</span></button>
                <button class="w-8 h-8 rounded-lg border border-stone-200 flex items-center justify-center hover:bg-white transition-all text-primary"><span class="material-symbols-outlined text-sm">chevron_right</span></button>
            </div>
        </div>
    </div>
  </div>
@endsection

@push('scripts')
    <script src="{{ asset('erp/js/registro-ventas.js') }}"></script>
@endpush
