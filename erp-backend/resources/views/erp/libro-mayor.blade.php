@extends('layouts.erp')

@section('title', 'Libro Mayor | ERP La Cima')

@push('styles')
    <link rel="stylesheet" href="/frontend/public/erp/css/premium-erp.css">
@endpush

@section('content')
<script>
  document.addEventListener('DOMContentLoaded', () => {
      const b = document.getElementById('breadcrumbPage');
      if(b) b.innerText = 'Módulo';
  });
</script>

<main class="ml-72 w-[calc(100vw-288px)] mt-[65px] p-6">

    <!-- Header Módulo -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4 mb-8">
        <div>
            <nav class="flex gap-2 text-[10px] font-bold text-stone-400 uppercase tracking-widest mb-2">
                <a href="/dashboard" class="hover:text-primary">Dashboard</a>
                <span>/</span>
                <a href="/erp/contabilidad" class="hover:text-primary">Contabilidad</a>
                <span>/</span>
                <span class="text-stone-900">Libro Mayor</span>
            </nav>
            <h2 class="text-3xl font-headline font-black text-stone-900 tracking-tight">LIBRO MAYOR</h2>
            <p class="text-stone-500 text-sm">Resumen de movimientos por cuenta contable.</p>
        </div>
        <div class="flex gap-3">
            <button class="bg-white border border-stone-200 px-4 py-2 rounded-lg text-xs font-bold flex items-center gap-2 hover:bg-stone-50 transition-all">
                <span class="material-symbols-outlined text-sm">account_tree</span>
                Plan de Cuentas
            </button>
            <button class="bg-stone-900 text-white px-4 py-2 rounded-lg text-xs font-bold flex items-center gap-2 hover:bg-black transition-all">
                <span class="material-symbols-outlined text-sm text-primary">download</span>
                Exportar PDF
            </button>
        </div>
    </div>

    <!-- Filtros de Cuenta -->
    <div class="premium-card mb-6 grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
            <label class="block text-[10px] font-bold text-stone-400 uppercase mb-1">Cuenta Contable</label>
            <select class="bg-stone-50 border border-stone-200 rounded-md py-2 px-3 text-xs w-full outline-none focus:ring-1 focus:ring-primary">
                <option>1.1.01.01.001 - Caja Principal</option>
                <option>1.1.01.02.001 - Banco Mercantil</option>
                <option>1.1.02.01.001 - Cuentas por Cobrar</option>
                <option>4.1.01.01.001 - Ventas Detal</option>
            </select>
        </div>
        <div>
            <label class="block text-[10px] font-bold text-stone-400 uppercase mb-1">Periodo</label>
            <div class="flex gap-2">
                <input type="month" value="2026-04" class="bg-stone-50 border border-stone-200 rounded-md py-2 px-3 text-xs w-full">
            </div>
        </div>
        <div class="flex items-end gap-2">
            <button class="flex-1 bg-primary text-stone-900 py-2 rounded-lg font-bold text-xs hover:brightness-105">CONSULTAR</button>
            <button class="p-2 border border-stone-200 rounded-md hover:bg-stone-50"><span class="material-symbols-outlined text-sm">refresh</span></button>
        </div>
    </div>

    <!-- Resumen de Cuenta -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <div class="bg-blue-50 border border-blue-100 p-4 rounded-xl">
            <p class="text-[10px] font-bold text-blue-600 uppercase mb-1">Saldo Anterior</p>
            <p class="text-2xl font-headline font-bold text-stone-900">$ 45,200.00</p>
        </div>
        <div class="bg-green-50 border border-green-100 p-4 rounded-xl">
            <p class="text-[10px] font-bold text-green-600 uppercase mb-1">Total Movimientos</p>
            <p class="text-2xl font-headline font-bold text-stone-900">$ +1,250.00</p>
        </div>
        <div class="bg-stone-900 p-4 rounded-xl">
            <p class="text-[10px] font-bold text-primary uppercase mb-1">Saldo Actual</p>
            <p class="text-2xl font-headline font-bold text-white">$ 46,450.00</p>
        </div>
    </div>

    <!-- Tabla de Movimientos -->
    <div class="data-table-container">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Asiento</th>
                    <th>Descripción / Glosa</th>
                    <th class="text-right">Debe</th>
                    <th class="text-right">Haber</th>
                    <th class="text-right">Saldo</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-stone-100">
                <tr>
                    <td>01/04/2026</td>
                    <td class="font-mono text-[10px] text-stone-400">#000124</td>
                    <td class="text-xs">Venta FAC-5402 - Ingreso Caja</td>
                    <td class="text-right text-blue-600 font-medium">$ 1,250.00</td>
                    <td class="text-right text-stone-300">0.00</td>
                    <td class="text-right font-bold">$ 46,450.00</td>
                </tr>
                <tr>
                    <td>02/04/2026</td>
                    <td class="font-mono text-[10px] text-stone-400">#000125</td>
                    <td class="text-xs">Transferencia Exenta #99234</td>
                    <td class="text-right text-stone-300">0.00</td>
                    <td class="text-right text-red-600 font-medium">$ 450.00</td>
                    <td class="text-right font-bold">$ 46,000.00</td>
                </tr>
            </tbody>
        </table>
    </div>

</main>
@endsection

@push('scripts')
    <script src="/frontend/public/erp/js/zenith-identity.js"></script>
    <script src="/frontend/public/erp/js/zenith-layout.js"></script>
@endpush
