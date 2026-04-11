@extends('layouts.erp')

@section('title', 'Ventas | ERP La Cima | ERP La Cima')

@push('styles')
    <link rel="stylesheet" href="/frontend/public/erp/css/ventas.css">
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
            Módulo de Ventas
          </p>
          <h2
            class="text-3xl font-headline font-black text-stone-900 tracking-tight"
          >
            Control de Ventas
          </h2>
        </div>
        <div class="flex gap-3">
          <a
            href="/pos"
            class="flex items-center gap-2 bg-primary text-stone-900 px-4 py-2 rounded-lg text-xs font-bold uppercase tracking-wider hover:brightness-110 transition-all"
          >
            <span class="material-symbols-outlined text-sm">point_of_sale</span>
            Nueva Venta
          </a>
        </div>
      </div>

      <!-- KPI Cards -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
        <div class="kpi-card">
          <div class="flex items-center justify-between mb-3">
            <div
              class="w-10 h-10 bg-green-50 rounded-lg flex items-center justify-center"
            >
              <span class="material-symbols-outlined text-green-600"
                >payments</span
              >
            </div>
            <span class="badge badge-green">+8.2%</span>
          </div>
          <p
            class="text-[10px] font-bold text-stone-400 uppercase tracking-wider"
          >
            Ventas del Mes
          </p>
          <p class="text-2xl font-headline font-bold text-stone-900 mt-1">
            $128,450
          </p>
          <p class="text-xs text-stone-500 mt-1">Ingresos brutos</p>
        </div>

        <div class="kpi-card">
          <div class="flex items-center justify-between mb-3">
            <div
              class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center"
            >
              <span class="material-symbols-outlined text-blue-600"
                >receipt_long</span
              >
            </div>
            <span class="badge badge-blue">24</span>
          </div>
          <p
            class="text-[10px] font-bold text-stone-400 uppercase tracking-wider"
          >
            Órdenes Pendientes
          </p>
          <p class="text-2xl font-headline font-bold text-stone-900 mt-1">
            $12,400
          </p>
          <p class="text-xs text-stone-500 mt-1">Compras pendientes</p>
        </div>

        <div class="kpi-card">
          <div class="flex items-center justify-between mb-3">
            <div
              class="w-10 h-10 bg-orange-50 rounded-lg flex items-center justify-center"
            >
              <span class="material-symbols-outlined text-orange-600"
                >people</span
              >
            </div>
            <span class="badge badge-green">+5</span>
          </div>
          <p
            class="text-[10px] font-bold text-stone-400 uppercase tracking-wider"
          >
            Clientes Activos
          </p>
          <p class="text-2xl font-headline font-bold text-stone-900 mt-1">
            342
          </p>
          <p class="text-xs text-stone-500 mt-1">Clientes registrados</p>
        </div>

        <div class="kpi-card">
          <div class="flex items-center justify-between mb-3">
            <div
              class="w-10 h-10 bg-purple-50 rounded-lg flex items-center justify-center"
            >
              <span class="material-symbols-outlined text-purple-600"
                >trending_up</span
              >
            </div>
            <span class="badge badge-green">+12%</span>
          </div>
          <p
            class="text-[10px] font-bold text-stone-400 uppercase tracking-wider"
          >
            Ticket Promedio
          </p>
          <p class="text-2xl font-headline font-bold text-stone-900 mt-1">
            $535
          </p>
          <p class="text-xs text-stone-500 mt-1">Por transacción</p>
        </div>
      </div>

      <!-- Action Buttons -->
      <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
        <a
          href="/pos"
          class="action-btn bg-primary text-stone-900 hover:brightness-110 shadow-lg shadow-primary/20"
        >
          <span class="material-symbols-outlined text-2xl">point_of_sale</span>
          <span class="text-center leading-tight">Punto de Venta</span>
        </a>
        <a
          href="/erp/registro-ventas"
          class="action-btn bg-white border border-stone-200 text-stone-700 hover:border-primary hover:bg-primary/5"
        >
          <span class="material-symbols-outlined text-2xl">list_alt</span>
          <span class="text-center leading-tight">Registro</span>
        </a>
        <a
          href="/erp/clientes"
          class="action-btn bg-white border border-stone-200 text-stone-700 hover:border-primary hover:bg-primary/5"
        >
          <span class="material-symbols-outlined text-2xl">people</span>
          <span class="text-center leading-tight">Clientes</span>
        </a>
        <a
          href="/erp/reportes-ventas"
          class="action-btn bg-white border border-stone-200 text-stone-700 hover:border-primary hover:bg-primary/5"
        >
          <span class="material-symbols-outlined text-2xl">bar_chart</span>
          <span class="text-center leading-tight">Reportes</span>
        </a>
      </div>

      <!-- Recent Sales Table -->
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
              <h3 class="text-lg font-bold text-stone-900">Ventas Recientes</h3>
              <p class="text-xs text-stone-500">
                Últimas transacciones registradas
              </p>
            </div>
          </div>
          <a
            href="/erp/registro-ventas"
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
                <th class="pb-3">Factura</th>
                <th class="pb-3">Cliente</th>
                <th class="pb-3">Productos</th>
                <th class="pb-3 text-right">Total</th>
                <th class="pb-3 text-center">Estado</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-stone-100">
              <tr class="hover:bg-stone-50 transition-colors">
                <td class="py-3 text-stone-500 font-mono text-xs">FAC-001</td>
                <td class="py-3 font-medium text-stone-900">
                  Transportes Rápidos C.A.
                </td>
                <td class="py-3 text-stone-600">Discos de Freno x2</td>
                <td class="py-3 text-right font-bold text-stone-900">
                  $170.00
                </td>
                <td class="py-3 text-center">
                  <span class="badge badge-green">Completada</span>
                </td>
              </tr>
              <tr class="hover:bg-stone-50 transition-colors">
                <td class="py-3 text-stone-500 font-mono text-xs">FAC-002</td>
                <td class="py-3 font-medium text-stone-900">
                  Inversiones El Paseo
                </td>
                <td class="py-3 text-stone-600">Turbo VGT x1</td>
                <td class="py-3 text-right font-bold text-stone-900">
                  $845.00
                </td>
                <td class="py-3 text-center">
                  <span class="badge badge-yellow">Pendiente</span>
                </td>
              </tr>
              <tr class="hover:bg-stone-50 transition-colors">
                <td class="py-3 text-stone-500 font-mono text-xs">FAC-003</td>
                <td class="py-3 font-medium text-stone-900">
                  Flota Industrial 2000
                </td>
                <td class="py-3 text-stone-600">Amortiguador + Pastillas</td>
                <td class="py-3 text-right font-bold text-stone-900">
                  $274.50
                </td>
                <td class="py-3 text-center">
                  <span class="badge badge-green">Completada</span>
                </td>
              </tr>
              <tr class="hover:bg-stone-50 transition-colors">
                <td class="py-3 text-stone-500 font-mono text-xs">FAC-004</td>
                <td class="py-3 font-medium text-stone-900">
                  Repuestos del Centro
                </td>
                <td class="py-3 text-stone-600">Filtro Transmisión x5</td>
                <td class="py-3 text-right font-bold text-stone-900">
                  $212.50
                </td>
                <td class="py-3 text-center">
                  <span class="badge badge-green">Completada</span>
                </td>
              </tr>
              <tr class="hover:bg-stone-50 transition-colors">
                <td class="py-3 text-stone-500 font-mono text-xs">FAC-005</td>
                <td class="py-3 font-medium text-stone-900">
                  Auto Partes Valencia
                </td>
                <td class="py-3 text-stone-600">Inyector Combustible x1</td>
                <td class="py-3 text-right font-bold text-stone-900">
                  $320.00
                </td>
                <td class="py-3 text-center">
                  <span class="badge badge-red">Cancelada</span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Sales by Category Chart -->
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <!-- Category Distribution -->
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
                Ventas por Categoría
              </h3>
              <p class="text-xs text-stone-500">
                Distribución de ventas del mes
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
                  stroke-dasharray="35, 100"
                  stroke-dashoffset="0"
                />
                <path
                  d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"
                  fill="none"
                  stroke="#22c55e"
                  stroke-width="4"
                  stroke-dasharray="25, 100"
                  stroke-dashoffset="-35"
                />
                <path
                  d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"
                  fill="none"
                  stroke="#f59e0b"
                  stroke-width="4"
                  stroke-dasharray="20, 100"
                  stroke-dashoffset="-60"
                />
                <path
                  d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"
                  fill="none"
                  stroke="#8b5cf6"
                  stroke-width="4"
                  stroke-dasharray="20, 100"
                  stroke-dashoffset="-80"
                />
              </svg>
              <div
                class="absolute inset-0 flex flex-col items-center justify-center"
              >
                <span class="text-[10px] font-bold text-stone-400 uppercase"
                  >Total</span
                >
                <span class="text-xl font-headline font-bold text-stone-900"
                  >$128K</span
                >
              </div>
            </div>

            <!-- Legend -->
            <div class="space-y-3 flex-1">
              <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                  <span class="w-3 h-3 bg-blue-500 rounded-sm"></span>
                  <span class="text-xs font-medium text-stone-600">Frenos</span>
                </div>
                <span class="text-xs font-bold text-stone-900">35%</span>
              </div>
              <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                  <span class="w-3 h-3 bg-green-500 rounded-sm"></span>
                  <span class="text-xs font-medium text-stone-600">Motor</span>
                </div>
                <span class="text-xs font-bold text-stone-900">25%</span>
              </div>
              <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                  <span class="w-3 h-3 bg-amber-500 rounded-sm"></span>
                  <span class="text-xs font-medium text-stone-600"
                    >Suspensión</span
                  >
                </div>
                <span class="text-xs font-bold text-stone-900">20%</span>
              </div>
              <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                  <span class="w-3 h-3 bg-purple-500 rounded-sm"></span>
                  <span class="text-xs font-medium text-stone-600">Otros</span>
                </div>
                <span class="text-xs font-bold text-stone-900">20%</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Top Products -->
        <div class="bg-white rounded-xl border border-stone-200 p-6">
          <div class="flex items-center gap-3 mb-6">
            <div
              class="w-10 h-10 bg-green-50 rounded-lg flex items-center justify-center"
            >
              <span class="material-symbols-outlined text-green-600"
                >trending_up</span
              >
            </div>
            <div>
              <h3 class="text-lg font-bold text-stone-900">
                Productos Más Vendidos
              </h3>
              <p class="text-xs text-stone-500">Top 5 del mes actual</p>
            </div>
          </div>

          <div class="space-y-4">
            <div
              class="flex items-center justify-between p-3 bg-stone-50 rounded-lg"
            >
              <div class="flex items-center gap-3">
                <span
                  class="w-8 h-8 bg-primary rounded-lg flex items-center justify-center text-xs font-bold text-stone-900"
                  >1</span
                >
                <div>
                  <p class="text-sm font-bold text-stone-900">
                    Kit Discos de Freno
                  </p>
                  <p class="text-[10px] text-stone-500">SKU: DIS-4421-VTL</p>
                </div>
              </div>
              <span class="text-sm font-bold text-stone-900">145 uds</span>
            </div>
            <div
              class="flex items-center justify-between p-3 bg-stone-50 rounded-lg"
            >
              <div class="flex items-center gap-3">
                <span
                  class="w-8 h-8 bg-stone-200 rounded-lg flex items-center justify-center text-xs font-bold text-stone-700"
                  >2</span
                >
                <div>
                  <p class="text-sm font-bold text-stone-900">Turbo VGT</p>
                  <p class="text-[10px] text-stone-500">SKU: TRB-VGT-84521</p>
                </div>
              </div>
              <span class="text-sm font-bold text-stone-900">89 uds</span>
            </div>
            <div
              class="flex items-center justify-between p-3 bg-stone-50 rounded-lg"
            >
              <div class="flex items-center gap-3">
                <span
                  class="w-8 h-8 bg-stone-200 rounded-lg flex items-center justify-center text-xs font-bold text-stone-700"
                  >3</span
                >
                <div>
                  <p class="text-sm font-bold text-stone-900">
                    Amortiguador Delantero
                  </p>
                  <p class="text-[10px] text-stone-500">SKU: SUS-101-DEL</p>
                </div>
              </div>
              <span class="text-sm font-bold text-stone-900">67 uds</span>
            </div>
            <div
              class="flex items-center justify-between p-3 bg-stone-50 rounded-lg"
            >
              <div class="flex items-center gap-3">
                <span
                  class="w-8 h-8 bg-stone-200 rounded-lg flex items-center justify-center text-xs font-bold text-stone-700"
                  >4</span
                >
                <div>
                  <p class="text-sm font-bold text-stone-900">
                    Filtro Transmisión
                  </p>
                  <p class="text-[10px] text-stone-500">SKU: TRS-55-FIL</p>
                </div>
              </div>
              <span class="text-sm font-bold text-stone-900">52 uds</span>
            </div>
            <div
              class="flex items-center justify-between p-3 bg-stone-50 rounded-lg"
            >
              <div class="flex items-center gap-3">
                <span
                  class="w-8 h-8 bg-stone-200 rounded-lg flex items-center justify-center text-xs font-bold text-stone-700"
                  >5</span
                >
                <div>
                  <p class="text-sm font-bold text-stone-900">
                    Pastillas Freno HD
                  </p>
                  <p class="text-[10px] text-stone-500">SKU: BRK-9004-HD</p>
                </div>
              </div>
              <span class="text-sm font-bold text-stone-900">48 uds</span>
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
    <script src="/frontend/public/erp/js/ventas.js"></script>
@endpush
