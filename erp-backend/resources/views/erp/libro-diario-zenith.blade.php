@extends('layouts.erp')

@section('title', 'Libro Diario | ERP La Cima')

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
                <span class="text-stone-900">Libro Diario Zenith</span>
            </nav>
            <h2 class="text-3xl font-headline font-black text-stone-900 tracking-tight">LIBRO DIARIO</h2>
            <p class="text-stone-500 text-sm">Registro cronológico de todas las operaciones contables.</p>
        </div>
        <div class="flex gap-3">
            <button class="bg-stone-900 text-white px-4 py-2 rounded-lg text-xs font-bold flex items-center gap-2 hover:bg-black transition-all">
                <span class="material-symbols-outlined text-sm text-primary">add</span>
                Nuevo Asiento
            </button>
        </div>
    </div>

    <!-- Tabla Contable -->
    <div class="data-table-container">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Asiento</th>
                    <th>Cuenta Contable</th>
                    <th class="text-right">Debe</th>
                    <th class="text-right">Haber</th>
                </tr>
            </thead>
            <tbody>
                <!-- Contenido Dinámico -->
                <tr class="bg-stone-50/50">
                    <td class="font-bold">01/04/2026</td>
                    <td class="text-stone-400 font-mono">#000124</td>
                    <td colspan="3" class="italic text-stone-500 font-medium">Venta de mercancía s/ factura FAC-5402</td>
                </tr>
                <tr>
                    <td></td><td></td><td>1.1.01.01.001 - Caja Principal</td>
                    <td class="text-right font-bold text-blue-600">$ 1,250.00</td>
                    <td class="text-right text-stone-300">0.00</td>
                </tr>
                <tr>
                    <td></td><td></td><td>4.1.01.01.001 - Ventas Detal</td>
                    <td class="text-right text-stone-300">0.00</td>
                    <td class="text-right font-bold text-red-600">$ 1,250.00</td>
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
