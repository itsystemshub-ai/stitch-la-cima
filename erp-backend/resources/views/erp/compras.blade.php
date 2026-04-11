@extends('layouts.erp')

@section('title', 'Compras | ERP La Cima | ERP La Cima')

@push('styles')
    <link rel="stylesheet" href="/frontend/public/erp/css/compras.css">
@endpush

@section('content')
<script>
  document.addEventListener('DOMContentLoaded', () => {
      const b = document.getElementById('breadcrumbPage');
      if(b) b.innerText = 'P�gina';
  });
</script>

<main class="ml-[288px] w-[calc(100vw-288px)] mt-[65px] p-6 pb-4">
      <!-- Header -->
      <div
        class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4 mb-8"
      >
        <div>
          <p
            class="text-xs font-bold text-stone-400 tracking-[0.2em] uppercase mb-1"
          >
            Módulo de Compras
          </p>
          <h2
            class="text-3xl font-headline font-black text-stone-900 tracking-tight"
          >
            Control de Compras
          </h2>
          <p class="text-stone-500 text-sm mt-1">
            MAYOR DE REPUESTO LA CIMA, C.A. • RIF: J-40308741-5
          </p>
        </div>
        <div class="flex gap-3">
          <a
            href="/erp/proveedores"
            class="flex items-center gap-2 bg-primary text-stone-900 px-4 py-2 rounded-lg text-xs font-bold uppercase tracking-wider hover:brightness-110 transition-all"
          >
            <span class="material-symbols-outlined text-sm">add</span>
            Nuevo Proveedor
          </a>
        </div>
      </div>

      <!-- KPI Cards -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
        <div class="kpi-card">
          <div class="flex items-center justify-between mb-3">
            <div
              class="w-10 h-10 bg-purple-50 rounded-lg flex items-center justify-center"
            >
              <span class="material-symbols-outlined text-purple-600"
                >shopping_cart</span
              >
            </div>
            <span class="badge badge-green">+15%</span>
          </div>
          <p
            class="text-[10px] font-bold text-stone-400 uppercase tracking-wider"
          >
            Órdenes del Mes
          </p>
          <p class="text-2xl font-headline font-bold text-stone-900 mt-1">24</p>
          <p class="text-xs text-stone-500 mt-1">Órdenes procesadas</p>
        </div>

        <div class="kpi-card">
          <div class="flex items-center justify-between mb-3">
            <div
              class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center"
            >
              <span class="material-symbols-outlined text-blue-600"
                >payments</span
              >
            </div>
            <span class="badge badge-blue">$45K</span>
          </div>
          <p
            class="text-[10px] font-bold text-stone-400 uppercase tracking-wider"
          >
            Total Compras
          </p>
          <p class="text-2xl font-headline font-bold text-stone-900 mt-1">
            $45,200
          </p>
          <p class="text-xs text-stone-500 mt-1">Gasto mensual</p>
        </div>

        <div class="kpi-card">
          <div class="flex items-center justify-between mb-3">
            <div
              class="w-10 h-10 bg-green-50 rounded-lg flex items-center justify-center"
            >
              <span class="material-symbols-outlined text-green-600"
                >local_shipping</span
              >
            </div>
            <span class="badge badge-green">12</span>
          </div>
          <p
            class="text-[10px] font-bold text-stone-400 uppercase tracking-wider"
          >
            Proveedores Activos
          </p>
          <p class="text-2xl font-headline font-bold text-stone-900 mt-1">12</p>
          <p class="text-xs text-stone-500 mt-1">Registrados</p>
        </div>

        <div class="kpi-card">
          <div class="flex items-center justify-between mb-3">
            <div
              class="w-10 h-10 bg-amber-50 rounded-lg flex items-center justify-center"
            >
              <span class="material-symbols-outlined text-amber-600"
                >pending</span
              >
            </div>
            <span class="badge badge-yellow">3</span>
          </div>
          <p
            class="text-[10px] font-bold text-stone-400 uppercase tracking-wider"
          >
            Órdenes Pendientes
          </p>
          <p class="text-2xl font-headline font-bold text-stone-900 mt-1">3</p>
          <p class="text-xs text-stone-500 mt-1">En tránsito</p>
        </div>
      </div>

      <!-- Action Buttons -->
      <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
        <a
          href="/erp/proveedores"
          class="action-btn bg-primary text-stone-900 hover:brightness-110 shadow-lg shadow-primary/20"
        >
          <span class="material-symbols-outlined text-2xl">local_shipping</span>
          <span class="text-center leading-tight">Proveedores</span>
        </a>
        <a
          href="/erp/historial-compras"
          class="action-btn bg-white border border-stone-200 text-stone-700 hover:border-primary hover:bg-primary/5"
        >
          <span class="material-symbols-outlined text-2xl">history</span>
          <span class="text-center leading-tight">Historial</span>
        </a>
        <a
          href="/erp/factura-compra"
          class="action-btn bg-white border border-stone-200 text-stone-700 hover:border-primary hover:bg-primary/5"
        >
          <span class="material-symbols-outlined text-2xl">request_quote</span>
          <span class="text-center leading-tight">Factura Compra</span>
        </a>
        <a
          href="/erp/reportes-compras"
          class="action-btn bg-white border border-stone-200 text-stone-700 hover:border-primary hover:bg-primary/5"
        >
          <span class="material-symbols-outlined text-2xl"
            >stacked_bar_chart</span
          >
          <span class="text-center leading-tight">Reportes</span>
        </a>
      </div>

      <!-- Recent Purchases Table -->
      <div class="bg-white rounded-xl border border-stone-200 p-6 mb-8">
        <div class="flex justify-between items-center mb-6">
          <div class="flex items-center gap-3">
            <div
              class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center"
            >
              <span class="material-symbols-outlined text-blue-600"
                >receipt_long</span
              >
            </div>
            <div>
              <h3 class="text-lg font-bold text-stone-900">
                Compras Recientes
              </h3>
              <p class="text-xs text-stone-500">
                Últimas órdenes de compra registradas
              </p>
            </div>
          </div>
          <a
            href="/erp/historial-compras"
            class="text-xs font-bold text-primary hover:brightness-75 flex items-center gap-1"
          >
            Ver todo
            <span class="material-symbols-outlined text-sm">arrow_forward</span>
          </a>
        </div>

        <div class="overflow-x-auto">
          <table class="w-full data-table">
            <thead class="border-b border-stone-200">
              <tr>
                <th class="pb-3">Orden</th>
                <th class="pb-3">Proveedor</th>
                <th class="pb-3">Productos</th>
                <th class="pb-3 text-right">Total</th>
                <th class="pb-3 text-center">Estado</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-stone-100">
              <tr class="hover:bg-stone-50 transition-colors">
                <td class="py-3 text-stone-500 font-mono text-xs">
                  OC-2024-001
                </td>
                <td class="py-3 font-medium text-stone-900">
                  Toyota Repuestos C.A.
                </td>
                <td class="py-3 text-stone-600">Discos de Freno x50</td>
                <td class="py-3 text-right font-bold text-stone-900">
                  $4,250.00
                </td>
                <td class="py-3 text-center">
                  <span class="badge badge-green">Recibido</span>
                </td>
              </tr>
              <tr class="hover:bg-stone-50 transition-colors">
                <td class="py-3 text-stone-500 font-mono text-xs">
                  OC-2024-002
                </td>
                <td class="py-3 font-medium text-stone-900">
                  Caterpillar Venezuela
                </td>
                <td class="py-3 text-stone-600">Inyectores x20</td>
                <td class="py-3 text-right font-bold text-stone-900">
                  $6,400.00
                </td>
                <td class="py-3 text-center">
                  <span class="badge badge-yellow">En tránsito</span>
                </td>
              </tr>
              <tr class="hover:bg-stone-50 transition-colors">
                <td class="py-3 text-stone-500 font-mono text-xs">
                  OC-2024-003
                </td>
                <td class="py-3 font-medium text-stone-900">
                  Bosch Auto Parts
                </td>
                <td class="py-3 text-stone-600">Filtros x200</td>
                <td class="py-3 text-right font-bold text-stone-900">
                  $3,000.00
                </td>
                <td class="py-3 text-center">
                  <span class="badge badge-green">Recibido</span>
                </td>
              </tr>
              <tr class="hover:bg-stone-50 transition-colors">
                <td class="py-3 text-stone-500 font-mono text-xs">
                  OC-2024-004
                </td>
                <td class="py-3 font-medium text-stone-900">
                  Volvo Parts Venezuela
                </td>
                <td class="py-3 text-stone-600">Turbo VGT x10</td>
                <td class="py-3 text-right font-bold text-stone-900">
                  $8,450.00
                </td>
                <td class="py-3 text-center">
                  <span class="badge badge-yellow">En tránsito</span>
                </td>
              </tr>
              <tr class="hover:bg-stone-50 transition-colors">
                <td class="py-3 text-stone-500 font-mono text-xs">
                  OC-2024-005
                </td>
                <td class="py-3 font-medium text-stone-900">
                  Repuestos del Centro
                </td>
                <td class="py-3 text-stone-600">Amortiguadores x30</td>
                <td class="py-3 text-right font-bold text-stone-900">
                  $4,350.00
                </td>
                <td class="py-3 text-center">
                  <span class="badge badge-green">Recibido</span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Purchases by Supplier Chart -->
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <!-- Supplier Distribution -->
        <div class="bg-white rounded-xl border border-stone-200 p-6">
          <div class="flex items-center gap-3 mb-6">
            <div
              class="w-10 h-10 bg-purple-50 rounded-lg flex items-center justify-center"
            >
              <span class="material-symbols-outlined text-purple-600"
                >pie_chart</span
              >
            </div>
            <div>
              <h3 class="text-lg font-bold text-stone-900">
                Compras por Proveedor
              </h3>
              <p class="text-xs text-stone-500">
                Distribución del gasto mensual
              </p>
            </div>
          </div>

          <div class="flex items-center gap-8">
            <!-- Donut Chart -->
            <div class="relative w-40 h-40">
              <svg
                class="w-full h-full transform -rotate-90"
                viewBox="0 0 36 36"
              >
                <path
                  d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"
                  fill="none"
                  stroke="#e2e2e5"
                  stroke-width="4"
                />
                <path
                  d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"
                  fill="none"
                  stroke="#3b82f6"
                  stroke-width="4"
                  stroke-dasharray="30, 100"
                  stroke-dashoffset="0"
                />
                <path
                  d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"
                  fill="none"
                  stroke="#22c55e"
                  stroke-width="4"
                  stroke-dasharray="25, 100"
                  stroke-dashoffset="-30"
                />
                <path
                  d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"
                  fill="none"
                  stroke="#f59e0b"
                  stroke-width="4"
                  stroke-dasharray="20, 100"
                  stroke-dashoffset="-55"
                />
                <path
                  d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"
                  fill="none"
                  stroke="#8b5cf6"
                  stroke-width="4"
                  stroke-dasharray="25, 100"
                  stroke-dashoffset="-75"
                />
              </svg>
              <div
                class="absolute inset-0 flex flex-col items-center justify-center"
              >
                <span class="text-[10px] font-bold text-stone-400 uppercase"
                  >Total</span
                >
                <span class="text-xl font-headline font-bold text-stone-900"
                  >$45K</span
                >
              </div>
            </div>

            <!-- Legend -->
            <div class="space-y-3 flex-1">
              <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                  <span class="w-3 h-3 bg-blue-500 rounded-sm"></span>
                  <span class="text-xs font-medium text-stone-600">Toyota</span>
                </div>
                <span class="text-xs font-bold text-stone-900">30%</span>
              </div>
              <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                  <span class="w-3 h-3 bg-green-500 rounded-sm"></span>
                  <span class="text-xs font-medium text-stone-600"
                    >Caterpillar</span
                  >
                </div>
                <span class="text-xs font-bold text-stone-900">25%</span>
              </div>
              <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                  <span class="w-3 h-3 bg-amber-500 rounded-sm"></span>
                  <span class="text-xs font-medium text-stone-600">Bosch</span>
                </div>
                <span class="text-xs font-bold text-stone-900">20%</span>
              </div>
              <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                  <span class="w-3 h-3 bg-purple-500 rounded-sm"></span>
                  <span class="text-xs font-medium text-stone-600">Otros</span>
                </div>
                <span class="text-xs font-bold text-stone-900">25%</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Pending Orders -->
        <div class="bg-white rounded-xl border border-stone-200 p-6">
          <div class="flex items-center gap-3 mb-6">
            <div
              class="w-10 h-10 bg-amber-50 rounded-lg flex items-center justify-center"
            >
              <span class="material-symbols-outlined text-amber-600"
                >pending</span
              >
            </div>
            <div>
              <h3 class="text-lg font-bold text-stone-900">
                Órdenes Pendientes
              </h3>
              <p class="text-xs text-stone-500">En tránsito o por recibir</p>
            </div>
          </div>

          <div class="space-y-4">
            <div
              class="flex items-center justify-between p-3 bg-stone-50 rounded-lg"
            >
              <div class="flex items-center gap-3">
                <span
                  class="w-8 h-8 bg-amber-100 rounded-lg flex items-center justify-center"
                >
                  <span class="material-symbols-outlined text-amber-600 text-sm"
                    >local_shipping</span
                  >
                </span>
                <div>
                  <p class="text-sm font-bold text-stone-900">OC-2024-002</p>
                  <p class="text-[10px] text-stone-500">
                    Caterpillar Venezuela
                  </p>
                </div>
              </div>
              <span class="text-xs font-bold text-amber-600">ETA: 2 días</span>
            </div>
            <div
              class="flex items-center justify-between p-3 bg-stone-50 rounded-lg"
            >
              <div class="flex items-center gap-3">
                <span
                  class="w-8 h-8 bg-amber-100 rounded-lg flex items-center justify-center"
                >
                  <span class="material-symbols-outlined text-amber-600 text-sm"
                    >local_shipping</span
                  >
                </span>
                <div>
                  <p class="text-sm font-bold text-stone-900">OC-2024-004</p>
                  <p class="text-[10px] text-stone-500">
                    Volvo Parts Venezuela
                  </p>
                </div>
              </div>
              <span class="text-xs font-bold text-amber-600">ETA: 5 días</span>
            </div>
            <div
              class="flex items-center justify-between p-3 bg-stone-50 rounded-lg"
            >
              <div class="flex items-center gap-3">
                <span
                  class="w-8 h-8 bg-amber-100 rounded-lg flex items-center justify-center"
                >
                  <span class="material-symbols-outlined text-amber-600 text-sm"
                    >local_shipping</span
                  >
                </span>
                <div>
                  <p class="text-sm font-bold text-stone-900">OC-2024-006</p>
                  <p class="text-[10px] text-stone-500">Repuestos del Centro</p>
                </div>
              </div>
              <span class="text-xs font-bold text-amber-600">ETA: 3 días</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Footer -->
      <div
        class="pt-4 border-t border-stone-100 flex flex-col md:flex-row justify-between items-center gap-4"
      >
        <span class="text-[10px] font-bold text-stone-400"
          >RIF: J-40308741-5 • Todos los derechos reservados © 2026</span
        >
        <div class="flex items-center gap-4">
          <a
            href="/erp/ayuda"
            class="text-[10px] font-bold text-stone-500 hover:text-stone-900"
            >Centro de Ayuda</a
          >
          <a
            href="/erp/manual-tecnico"
            class="text-[10px] font-bold text-stone-500 hover:text-stone-900"
            >Manual Técnico</a
          >
          <a
            href="/erp/estado-sistema"
            class="text-[10px] font-bold text-stone-500 hover:text-stone-900"
            >Estado del Sistema</a
          >
        </div>
      </div>
    </main>
@endsection

@push('scripts')
    <script src="/frontend/public/erp/js/compras.js"></script>
@endpush
