@extends('erp.layouts.app')

@section('title', 'Contenido de Tabla | Zenith Industrial')

@section('breadcrumb')
    <a href="{{ url('/erp/inicio') }}" class="text-stone-400 hover:text-stone-900 transition-colors font-bold text-[12px] uppercase tracking-wider">NÚCLEO_ERP</a>
    <span class="material-symbols-outlined text-[14px] text-stone-300">chevron_right</span>
    <a href="{{ url('/erp/configuracion') }}" class="text-stone-400 hover:text-stone-900 transition-colors font-bold text-[12px] uppercase tracking-wider">CONTROL_SISTEMA</a>
    <span class="material-symbols-outlined text-[14px] text-stone-300">chevron_right</span>
    <a href="{{ url('/erp/configuracion/gestor-tablas') }}" class="text-stone-400 hover:text-stone-900 transition-colors font-bold text-[12px] uppercase tracking-wider">GESTOR_DE_TABLAS</a>
    <span class="material-symbols-outlined text-[14px] text-stone-300">chevron_right</span>
    <span class="text-stone-900 font-bold text-[12px] uppercase tracking-wider">{{ strtoupper($tabla) }}</span>
@endsection

@section('content')
<!-- Header: Table Content Analysis -->
<div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6 mb-10 pb-8 border-b border-stone-100">
  <div>
    <div class="flex items-center gap-2 mb-3">
        <span class="w-10 h-[2px] bg-primary"></span>
        <p class="text-[11px] font-black text-stone-400 uppercase tracking-[0.2em]">INSPECCIÓN_DE_REPOSITORIO</p>
    </div>
    <h1 class="text-4xl font-headline font-black text-stone-900 tracking-tight uppercase leading-none">Contenido: <span class="text-stone-300">{{ $tabla }}</span></h1>
    <p class="text-[12px] text-stone-500 mt-3 font-medium uppercase tracking-wide">VISUALIZACIÓN DE REGISTROS BINARIOS Y ESTRUCTURAS DE DATOS</p>
  </div>
  <div class="flex gap-3">
    <a href="{{ url('/erp/configuracion/gestor-tablas') }}" class="bg-stone-900 text-white px-6 py-3 rounded-xl text-[11px] font-black uppercase tracking-wider hover:brightness-110 transition-all flex items-center gap-2">
      <span class="material-symbols-outlined text-[18px]">arrow_back</span>
      VOLVER_AL_GESTOR
    </a>
  </div>
</div>

<!-- Data Inspection Grid -->
<div class="bg-white rounded-[32px] border border-stone-200 shadow-sm overflow-hidden min-h-[600px] flex flex-col">
  <div class="px-8 py-6 border-b border-stone-100 bg-stone-50/50 flex justify-between items-center">
    <div class="flex items-center gap-3">
        <span class="w-2 h-2 bg-primary rounded-full animate-pulse"></span>
        <h3 class="text-[12px] font-black text-stone-900 uppercase tracking-widest">FLUJO_DE_DATOS_ACTUAL [{{ $datos->total() }} REGISTROS]</h3>
    </div>
  </div>
  
  <div class="flex-1 overflow-auto max-h-[70vh]">
    <table class="w-full text-left border-collapse">
      <thead class="sticky top-0 z-10">
        <tr class="bg-stone-900 text-primary font-black text-[10px] uppercase tracking-widest">
          @foreach($columnas as $col)
          <th class="p-4 border-r border-stone-800 whitespace-nowrap">{{ $col }}</th>
          @endforeach
        </tr>
      </thead>
      <tbody class="divide-y divide-stone-100">
        @forelse($datos as $row)
        <tr class="hover:bg-stone-50 transition-colors text-[11px]">
          @foreach($columnas as $col)
          <td class="p-4 text-stone-600 font-medium border-r border-stone-50 max-w-[300px] truncate">
            {{ is_string($row->$col) ? $row->$col : json_encode($row->$col) }}
          </td>
          @endforeach
        </tr>
        @empty
        <tr>
            <td colspan="{{ count($columnas) }}" class="p-20 text-center">
                <span class="material-symbols-outlined text-6xl text-stone-200 transition-colors mb-4 block">database_off</span>
                <p class="text-[12px] text-stone-400 font-bold uppercase tracking-widest">LA_TABLA_NO_CONTIENE_REGISTROS_ACTUALMENTE</p>
            </td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <!-- Industrial Pagination -->
  @if($datos->hasPages())
  <div class="px-8 py-6 border-t border-stone-100 bg-stone-50/50">
    {{ $datos->links('vendor.pagination.tailwind_zenith') }}
  </div>
  @endif
</div>

<style>
/* Custom Scrollbar for the data grid */
.overflow-auto::-webkit-scrollbar {
  width: 8px;
  height: 8px;
}
.overflow-auto::-webkit-scrollbar-track {
  background: #f5f5f4; /* stone-100 */
}
.overflow-auto::-webkit-scrollbar-thumb {
  background: #1c1917; /* stone-900 */
  border-radius: 4px;
}
</style>
@endsection
