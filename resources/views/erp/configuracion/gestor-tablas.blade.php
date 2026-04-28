@extends('erp.layouts.app')

@section('title', 'Gestor de Tablas | Zenith Industrial')

@section('breadcrumb')
    <a href="{{ url('/erp/inicio') }}" class="text-stone-400 hover:text-stone-900 transition-colors font-bold text-[12px] uppercase tracking-wider">NÚCLEO_ERP</a>
    <span class="material-symbols-outlined text-[14px] text-stone-300">chevron_right</span>
    <a href="{{ url('/erp/configuracion') }}" class="text-stone-400 hover:text-stone-900 transition-colors font-bold text-[12px] uppercase tracking-wider">CONTROL_SISTEMA</a>
    <span class="material-symbols-outlined text-[14px] text-stone-300">chevron_right</span>
    <a href="{{ url('/erp/configuracion/base-datos') }}" class="text-stone-400 hover:text-stone-900 transition-colors font-bold text-[12px] uppercase tracking-wider">INFRAESTRUCTURA_DB</a>
    <span class="material-symbols-outlined text-[14px] text-stone-300">chevron_right</span>
    <span class="text-stone-900 font-bold text-[12px] uppercase tracking-wider">GESTOR_DE_TABLAS</span>
@endsection

@section('content')
<!-- Header: Comprehensive Schema Management -->
<div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6 mb-10 pb-8 border-b border-stone-100">
  <div>
    <div class="flex items-center gap-2 mb-3">
        <span class="w-10 h-[2px] bg-primary"></span>
        <p class="text-[11px] font-black text-stone-400 uppercase tracking-[0.2em]">SISTEMA_COMPLETO_DE_DATOS</p>
    </div>
    <h1 class="text-4xl font-headline font-black text-stone-900 tracking-tight uppercase leading-none">Gestor de <span class="text-stone-300">Tablas</span></h1>
    <p class="text-[12px] text-stone-500 mt-3 font-medium uppercase tracking-wide">VISUALIZACIÓN DE ESTRUCTURA Y MAGNITUD DE REPOSITORIOS SQL</p>
  </div>
  <div class="flex gap-3">
    <div class="relative">
        <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-stone-400 text-[20px]">search</span>
        <input type="text" id="tableFilter" placeholder="FILTRAR TABLAS..." class="bg-stone-50 border border-stone-200 pl-11 pr-6 py-3 rounded-xl text-[11px] font-black uppercase tracking-wider text-stone-900 focus:outline-none focus:border-primary transition-all w-[300px]">
    </div>
    <a href="{{ url('/erp/configuracion/base-datos') }}" class="bg-stone-900 text-white px-6 py-3 rounded-xl text-[11px] font-black uppercase tracking-wider hover:brightness-110 transition-all flex items-center gap-2">
      <span class="material-symbols-outlined text-[18px]">arrow_back</span>
      VOLVER
    </a>
  </div>
</div>

<!-- All Tables Data Grid -->
<div class="bg-white rounded-[32px] border border-stone-200 shadow-sm overflow-hidden min-h-[600px]">
  <div class="px-8 py-6 border-b border-stone-100 bg-stone-50/50 flex justify-between items-center">
    <div class="flex items-center gap-3">
        <span class="w-2 h-2 bg-primary rounded-full animate-pulse"></span>
        <h3 class="text-[12px] font-black text-stone-900 uppercase tracking-widest">MAPEO_DE_ESQUEMAS_ACTIVOS [{{ $dbStats['tables_count'] }} TABLAS EN TOTAL]</h3>
    </div>
    <div class="flex gap-8">
        <div class="flex items-center gap-2">
            <span class="text-[10px] text-stone-400 font-bold uppercase tracking-widest">TOTAL_REGS:</span>
            <span class="text-[12px] font-black text-stone-900">{{ number_format($dbStats['total_records']) }}</span>
        </div>
        <div class="flex items-center gap-2">
            <span class="text-[10px] text-stone-400 font-bold uppercase tracking-widest">PESO_STORAGE:</span>
            <span class="text-[12px] font-black text-stone-900">{{ number_format($dbStats['size_mb'], 2) }} MB</span>
        </div>
    </div>
  </div>
  
  <div class="overflow-x-auto">
    <table class="w-full text-left" id="mainTableGrid">
      <thead>
        <tr class="bg-stone-50/50 border-b border-stone-100 text-stone-400 font-black text-[10px] uppercase tracking-widest">
          <th class="p-6">TABLA_IDENTIFICADOR</th>
          <th class="p-6">DETALLE_COMENTARIO</th>
          <th class="p-6">REGISTROS</th>
          <th class="p-6">CARGA_MB</th>
          <th class="p-6">MOTOR</th>
          <th class="p-6">ÚLTIMA_ACT_</th>
          <th class="p-6 text-right">GESTIÓN</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-stone-100">
        @foreach($dbStats['tables'] as $table)
        <tr class="hover:bg-stone-50 transition-colors group table-row-item">
          <td class="p-6">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-lg bg-stone-50 flex items-center justify-center text-stone-400 group-hover:bg-primary/20 group-hover:text-primary transition-colors">
                    <span class="material-symbols-outlined text-[18px]">table_rows</span>
                </div>
                <p class="text-[13px] font-black text-stone-900 uppercase tracking-tight leading-none">{{ $table['name'] }}</p>
            </div>
          </td>
          <td class="p-6">
            <p class="text-[10px] text-stone-500 font-bold uppercase tracking-wide leading-none">{{ $table['comment'] }}</p>
          </td>
          <td class="p-6">
            <span class="px-3 py-1 bg-stone-100 text-stone-700 rounded-lg border border-stone-200 text-[11px] font-black uppercase leading-none">{{ number_format($table['rows']) }}</span>
          </td>
          <td class="p-6">
            @php
                $color = $table['size_mb'] > 10 ? 'red' : ($table['size_mb'] > 1 ? 'amber' : 'stone');
            @endphp
            <span class="px-3 py-1 bg-stone-900 text-primary border border-stone-800 rounded-lg text-[11px] font-black italic tracking-widest leading-none">{{ $table['size_mb'] }} MB</span>
          </td>
          <td class="p-6">
            <span class="text-[10px] font-black text-stone-400 uppercase tracking-widest leading-none">{{ $table['engine'] }}</span>
          </td>
          <td class="p-6">
            <span class="text-[10px] font-medium text-stone-500 uppercase tracking-tighter">{{ $table['updated_at'] ?: 'S/D' }}</span>
          </td>
          <td class="p-6 text-right">
            <div class="flex justify-end gap-2">
                <button title="Optimizar" class="w-9 h-9 rounded-lg border border-stone-200 bg-white flex items-center justify-center hover:bg-stone-900 hover:text-white transition-all text-stone-300 shadow-sm">
                    <span class="material-symbols-outlined text-[16px]">bolt</span>
                </button>
                <a href="{{ route('erp.configuracion.ver-tabla', ['tabla' => $table['name']]) }}" title="Ver Contenido" class="w-9 h-9 rounded-lg border border-stone-200 bg-white flex items-center justify-center hover:bg-stone-900 hover:text-white transition-all text-stone-300 shadow-sm">
                    <span class="material-symbols-outlined text-[16px]">visibility</span>
                </a>
                <button title="Truncar" class="w-9 h-9 rounded-lg border border-red-100 bg-white flex items-center justify-center hover:bg-red-500 hover:text-white transition-all text-red-300 shadow-sm">
                    <span class="material-symbols-outlined text-[16px]">delete_sweep</span>
                </button>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterInput = document.getElementById('tableFilter');
    const tableRows = document.querySelectorAll('.table-row-item');

    filterInput.addEventListener('input', function(e) {
        const term = e.target.value.toLowerCase();
        
        tableRows.forEach(row => {
            const tableName = row.querySelector('p').textContent.toLowerCase();
            if (tableName.includes(term)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
});
</script>
@endsection
