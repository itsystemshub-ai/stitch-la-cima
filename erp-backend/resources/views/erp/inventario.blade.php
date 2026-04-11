@extends('layouts.erp')

@section('title', 'Inventario | ERP La Cima | ERP La Cima')

@push('styles')
    <link rel="stylesheet" href="/frontend/public/erp/css/inventario.css">
@endpush

@section('content')
<script>
  document.addEventListener('DOMContentLoaded', () => {
      const b = document.getElementById('breadcrumbPage');
      if(b) b.innerText = 'P�gina';
  });
</script>

<main class="ml-[288px] w-[calc(100vw-288px)] mt-[65px] p-6 pb-4">
      <!-- Header Dashboard -->
      <div
        class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4 mb-8"
      >
        <div>
          <p
            class="text-xs font-bold text-stone-400 tracking-[0.2em] uppercase mb-1"
          >
            Módulo de Inventario
          </p>
          <h2
            class="text-3xl font-headline font-black text-stone-900 tracking-tight"
          >
            Control de Inventario
          </h2>
        </div>
        <div class="flex gap-3">
          <div
            class="bg-white border border-stone-200 px-4 py-2 rounded-lg text-center"
          >
            <span class="text-[10px] font-bold text-stone-400 uppercase"
              >Último Ajuste</span
            >
            <p class="text-sm font-headline font-bold text-stone-900">Hoy</p>
          </div>
          <div
            class="bg-primary px-4 py-2 rounded-lg text-stone-900 text-center"
          >
            <span class="text-[10px] font-bold uppercase">Estado</span>
            <p class="text-sm font-headline font-bold">ÓPTIMO</p>
          </div>
        </div>
      </div>

      <!-- KPI Cards -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
        <div class="kpi-card">
          <div class="flex items-center justify-between mb-3">
            <div
              class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center"
            >
              <span class="material-symbols-outlined text-blue-600"
                >payments</span
              >
            </div>
            <span class="badge badge-green">+8.2%</span>
          </div>
          <p
            class="text-[10px] font-bold text-stone-400 uppercase tracking-wider"
          >
            Valor Total Inventario
          </p>
          <p class="text-2xl font-headline font-bold text-stone-900 mt-1">
            $1,428,550
          </p>
          <p class="text-xs text-stone-500 mt-1">Costo promedio ponderado</p>
        </div>

        <div class="kpi-card">
          <div class="flex items-center justify-between mb-3">
            <div
              class="w-10 h-10 bg-green-50 rounded-lg flex items-center justify-center"
            >
              <span class="material-symbols-outlined text-green-600"
                >sync_alt</span
              >
            </div>
            <span class="badge badge-blue">4.2x</span>
          </div>
          <p
            class="text-[10px] font-bold text-stone-400 uppercase tracking-wider"
          >
            Rotación Inventario
          </p>
          <p class="text-2xl font-headline font-bold text-stone-900 mt-1">
            12.4%
          </p>
          <p class="text-xs text-stone-500 mt-1">Rendimiento mensual</p>
        </div>

        <div class="kpi-card border-amber-200">
          <div class="flex items-center justify-between mb-3">
            <div
              class="w-10 h-10 bg-amber-50 rounded-lg flex items-center justify-center"
            >
              <span class="material-symbols-outlined text-amber-600"
                >warning</span
              >
            </div>
            <span class="badge badge-yellow">Atención</span>
          </div>
          <p
            class="text-[10px] font-bold text-stone-400 uppercase tracking-wider"
          >
            Stock Bajo
          </p>
          <p class="text-2xl font-headline font-bold text-amber-600 mt-1">
            28 Items
          </p>
          <p class="text-xs text-stone-500 mt-1">Requiere reposición pronto</p>
        </div>

        <div class="kpi-card border-red-200">
          <div class="flex items-center justify-between mb-3">
            <div
              class="w-10 h-10 bg-red-50 rounded-lg flex items-center justify-center"
            >
              <span class="material-symbols-outlined text-red-600">error</span>
            </div>
            <span class="badge badge-red">Urgente</span>
          </div>
          <p
            class="text-[10px] font-bold text-stone-400 uppercase tracking-wider"
          >
            Sin Stock
          </p>
          <p class="text-2xl font-headline font-bold text-red-600 mt-1">
            12 Items
          </p>
          <p class="text-xs text-stone-500 mt-1">Compra inmediata requerida</p>
        </div>
      </div>

      <!-- Action Buttons -->
      <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
        <a
          href="/erp/productos"
          class="action-btn bg-primary text-stone-900 hover:brightness-110 shadow-lg shadow-primary/20"
        >
          <span class="material-symbols-outlined text-2xl">category</span>
          <span class="text-center leading-tight">Productos</span>
        </a>
        <a
          href="/erp/kardex"
          class="action-btn bg-white border border-stone-200 text-stone-700 hover:border-primary hover:bg-primary/5"
        >
          <span class="material-symbols-outlined text-2xl">receipt_long</span>
          <span class="text-center leading-tight">Kardex</span>
        </a>
        <a
          href="/erp/auditoria-inventario"
          class="action-btn bg-white border border-stone-200 text-stone-700 hover:border-primary hover:bg-primary/5"
        >
          <span class="material-symbols-outlined text-2xl">assignment</span>
          <span class="text-center leading-tight">Auditoría Física</span>
        </a>
        <a
          href="/erp/ajustes-inventario"
          class="action-btn bg-white border border-stone-200 text-stone-700 hover:border-primary hover:bg-primary/5"
        >
          <span class="material-symbols-outlined text-2xl">edit_note</span>
          <span class="text-center leading-tight">Ajustes</span>
        </a>
      </div>

      <!-- Recent Movements Table -->
      <div class="bg-white rounded-xl border border-stone-200 p-6 mb-8">
        <div class="flex justify-between items-center mb-6">
          <div class="flex items-center gap-3">
            <div
              class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center"
            >
              <span class="material-symbols-outlined text-blue-600"
                >move_group</span
              >
            </div>
            <div>
              <h3 class="text-lg font-bold text-stone-900">
                Movimientos Recientes
              </h3>
              <p class="text-xs text-stone-500">
                Últimas entradas y salidas de inventario
              </p>
            </div>
          </div>
          <a
            href="/erp/kardex"
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
                <th class="pb-3">Tipo</th>
                <th class="pb-3">Documento</th>
                <th class="pb-3">Producto</th>
                <th class="pb-3 text-right">Cantidad</th>
                <th class="pb-3 text-center">Estado</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-stone-100">
              <tr class="hover:bg-stone-50 transition-colors">
                <td class="py-3">
                  <span class="badge badge-green">Entrada</span>
                </td>
                <td class="py-3 text-stone-500 font-mono text-xs">
                  FAC-2024-0092
                </td>
                <td class="py-3 font-medium text-stone-900">
                  Kit Discos de Freno Ventilados
                </td>
                <td class="py-3 text-right font-bold text-stone-900">+45</td>
                <td class="py-3 text-center">
                  <span class="badge badge-green">Verificado</span>
                </td>
              </tr>
              <tr class="hover:bg-stone-50 transition-colors">
                <td class="py-3">
                  <span class="badge badge-red">Salida</span>
                </td>
                <td class="py-3 text-stone-500 font-mono text-xs">
                  REM-2024-0412
                </td>
                <td class="py-3 font-medium text-stone-900">
                  Turbo VGT Geometría Variable
                </td>
                <td class="py-3 text-right font-bold text-stone-900">-12</td>
                <td class="py-3 text-center">
                  <span class="badge badge-green">Verificado</span>
                </td>
              </tr>
              <tr class="hover:bg-stone-50 transition-colors">
                <td class="py-3">
                  <span class="badge badge-yellow">Ajuste</span>
                </td>
                <td class="py-3 text-stone-500 font-mono text-xs">
                  ADJ-2024-0015
                </td>
                <td class="py-3 font-medium text-stone-900">
                  Amortiguador Reforzado Delantero
                </td>
                <td class="py-3 text-right font-bold text-stone-900">-2</td>
                <td class="py-3 text-center">
                  <span class="badge badge-yellow">Pendiente</span>
                </td>
              </tr>
              <tr class="hover:bg-stone-50 transition-colors">
                <td class="py-3">
                  <span class="badge badge-green">Entrada</span>
                </td>
                <td class="py-3 text-stone-500 font-mono text-xs">
                  FAC-2024-0091
                </td>
                <td class="py-3 font-medium text-stone-900">
                  Filtro Transmisión Automática
                </td>
                <td class="py-3 text-right font-bold text-stone-900">+120</td>
                <td class="py-3 text-center">
                  <span class="badge badge-green">Verificado</span>
                </td>
              </tr>
              <tr class="hover:bg-stone-50 transition-colors">
                <td class="py-3">
                  <span class="badge badge-red">Salida</span>
                </td>
                <td class="py-3 text-stone-500 font-mono text-xs">
                  REM-2024-0411
                </td>
                <td class="py-3 font-medium text-stone-900">
                  Pastillas de Freno Heavy Duty
                </td>
                <td class="py-3 text-right font-bold text-stone-900">-6</td>
                <td class="py-3 text-center">
                  <span class="badge badge-red">Error</span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Inventory Categories Chart -->
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
                Distribución por Categoría
              </h3>
              <p class="text-xs text-stone-500">Composición del inventario</p>
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
                  stroke-dasharray="45, 100"
                  stroke-dashoffset="0"
                />
                <path
                  d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"
                  fill="none"
                  stroke="#22c55e"
                  stroke-width="4"
                  stroke-dasharray="25, 100"
                  stroke-dashoffset="-45"
                />
                <path
                  d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"
                  fill="none"
                  stroke="#f59e0b"
                  stroke-width="4"
                  stroke-dasharray="15, 100"
                  stroke-dashoffset="-70"
                />
                <path
                  d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"
                  fill="none"
                  stroke="#8b5cf6"
                  stroke-width="4"
                  stroke-dasharray="15, 100"
                  stroke-dashoffset="-85"
                />
              </svg>
              <div
                class="absolute inset-0 flex flex-col items-center justify-center"
              >
                <span class="text-[10px] font-bold text-stone-400 uppercase"
                  >Total</span
                >
                <span class="text-xl font-headline font-bold text-stone-900"
                  >14,204</span
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
                <span class="text-xs font-bold text-stone-900">45%</span>
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
                <span class="text-xs font-bold text-stone-900">15%</span>
              </div>
              <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                  <span class="w-3 h-3 bg-purple-500 rounded-sm"></span>
                  <span class="text-xs font-medium text-stone-600">Otros</span>
                </div>
                <span class="text-xs font-bold text-stone-900">15%</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Compliance Panel -->
        <div class="bg-white rounded-xl border border-stone-200 p-6">
          <div class="flex items-center gap-3 mb-6">
            <div
              class="w-10 h-10 bg-green-50 rounded-lg flex items-center justify-center"
            >
              <span class="material-symbols-outlined text-green-600"
                >description</span
              >
            </div>
            <div>
              <h3 class="text-lg font-bold text-stone-900">
                Cumplimiento Legal
              </h3>
              <p class="text-xs text-stone-500">
                Libros y reportes requeridos por ley
              </p>
            </div>
          </div>

          <div class="space-y-3">
            <button
              class="w-full flex items-center justify-between p-3 bg-stone-50 hover:bg-primary/10 rounded-lg transition-colors text-left group"
            >
              <div>
                <p class="text-sm font-bold text-stone-900">
                  Libro de Inventarios
                </p>
                <p class="text-[10px] text-stone-500">Art. 177 ISLR</p>
              </div>
              <span
                class="material-symbols-outlined text-stone-400 group-hover:text-stone-900 transition-colors"
                >download</span
              >
            </button>
            <button
              class="w-full flex items-center justify-between p-3 bg-stone-50 hover:bg-primary/10 rounded-lg transition-colors text-left group"
            >
              <div>
                <p class="text-sm font-bold text-stone-900">
                  Kardex Valorizado
                </p>
                <p class="text-[10px] text-stone-500">Control de existencias</p>
              </div>
              <span
                class="material-symbols-outlined text-stone-400 group-hover:text-stone-900 transition-colors"
                >download</span
              >
            </button>
            <button
              class="w-full flex items-center justify-between p-3 bg-stone-50 hover:bg-primary/10 rounded-lg transition-colors text-left group"
            >
              <div>
                <p class="text-sm font-bold text-stone-900">Libro de Compras</p>
                <p class="text-[10px] text-stone-500">IVA y SENIAT</p>
              </div>
              <span
                class="material-symbols-outlined text-stone-400 group-hover:text-stone-900 transition-colors"
                >download</span
              >
            </button>
            <button
              class="w-full flex items-center justify-between p-3 bg-stone-50 hover:bg-primary/10 rounded-lg transition-colors text-left group"
            >
              <div>
                <p class="text-sm font-bold text-stone-900">Libro de Ventas</p>
                <p class="text-[10px] text-stone-500">IVA y SENIAT</p>
              </div>
              <span
                class="material-symbols-outlined text-stone-400 group-hover:text-stone-900 transition-colors"
                >download</span
              >
            </button>
          </div>

          <div class="mt-4 pt-4 border-t border-stone-100">
            <p class="text-[10px] text-stone-500">
              Datos sincronizados según Art. 177 de la Ley de ISLR y
              Providencias SENIAT.
            </p>
          </div>
        </div>
      </div>

      <!-- Stock Verification Table -->
      <div class="bg-white rounded-xl border border-stone-200 p-6 mb-8">
        <div class="flex justify-between items-center mb-6">
          <div class="flex items-center gap-3">
            <div
              class="w-10 h-10 bg-orange-50 rounded-lg flex items-center justify-center"
            >
              <span class="material-symbols-outlined text-orange-600"
                >inventory</span
              >
            </div>
            <div>
              <h3 class="text-lg font-bold text-stone-900">
                Verificación de Stock
              </h3>
              <p class="text-xs text-stone-500">
                Productos principales del inventario
              </p>
            </div>
          </div>
          <a
            href="/erp/productos"
            class="text-xs font-bold text-primary hover:brightness-75 flex items-center gap-1"
          >
            Ver todos
            <span class="material-symbols-outlined text-sm">arrow_forward</span>
          </a>
        </div>

        <div class="space-y-3">
          <!-- Item 1 -->
          <div
            class="flex items-center p-4 bg-stone-50 rounded-lg hover:bg-stone-100 transition-colors"
          >
            <div
              class="w-12 h-12 bg-white rounded-lg flex items-center justify-center border border-stone-200 flex-shrink-0"
            >
              <span class="material-symbols-outlined text-stone-400"
                >settings</span
              >
            </div>
            <div class="ml-4 flex-1 min-w-0">
              <p
                class="text-[10px] font-bold text-primary uppercase tracking-wider"
              >
                SKU: DIS-4421-VTL
              </p>
              <p class="text-sm font-bold text-stone-900 truncate">
                Kit Discos de Freno Ventilados
              </p>
            </div>
            <div class="hidden md:grid grid-cols-3 gap-8 text-right px-4">
              <div>
                <p class="text-[10px] font-bold text-stone-400 uppercase">
                  Stock
                </p>
                <p class="text-lg font-headline font-bold text-stone-900">
                  424
                </p>
              </div>
              <div>
                <p class="text-[10px] font-bold text-stone-400 uppercase">
                  Costo Unit.
                </p>
                <p class="text-lg font-headline font-bold text-stone-900">
                  $142.50
                </p>
              </div>
              <div>
                <p class="text-[10px] font-bold text-stone-400 uppercase">
                  Valor Total
                </p>
                <p class="text-lg font-headline font-bold text-green-600">
                  $60,420
                </p>
              </div>
            </div>
          </div>

          <!-- Item 2 -->
          <div
            class="flex items-center p-4 bg-stone-50 rounded-lg hover:bg-stone-100 transition-colors"
          >
            <div
              class="w-12 h-12 bg-white rounded-lg flex items-center justify-center border border-stone-200 flex-shrink-0"
            >
              <span class="material-symbols-outlined text-stone-400">bolt</span>
            </div>
            <div class="ml-4 flex-1 min-w-0">
              <p
                class="text-[10px] font-bold text-primary uppercase tracking-wider"
              >
                SKU: TRB-VGT-84521
              </p>
              <p class="text-sm font-bold text-stone-900 truncate">
                Turbo VGT Geometría Variable
              </p>
            </div>
            <div class="hidden md:grid grid-cols-3 gap-8 text-right px-4">
              <div>
                <p class="text-[10px] font-bold text-stone-400 uppercase">
                  Stock
                </p>
                <p class="text-lg font-headline font-bold text-amber-600">12</p>
              </div>
              <div>
                <p class="text-[10px] font-bold text-stone-400 uppercase">
                  Costo Unit.
                </p>
                <p class="text-lg font-headline font-bold text-stone-900">
                  $1,850
                </p>
              </div>
              <div>
                <p class="text-[10px] font-bold text-stone-400 uppercase">
                  Valor Total
                </p>
                <p class="text-lg font-headline font-bold text-green-600">
                  $22,200
                </p>
              </div>
            </div>
          </div>

          <!-- Item 3 -->
          <div
            class="flex items-center p-4 bg-stone-50 rounded-lg hover:bg-stone-100 transition-colors"
          >
            <div
              class="w-12 h-12 bg-white rounded-lg flex items-center justify-center border border-stone-200 flex-shrink-0"
            >
              <span class="material-symbols-outlined text-stone-400"
                >compress</span
              >
            </div>
            <div class="ml-4 flex-1 min-w-0">
              <p
                class="text-[10px] font-bold text-primary uppercase tracking-wider"
              >
                SKU: SUS-101-DEL
              </p>
              <p class="text-sm font-bold text-stone-900 truncate">
                Amortiguador Reforzado Delantero
              </p>
            </div>
            <div class="hidden md:grid grid-cols-3 gap-8 text-right px-4">
              <div>
                <p class="text-[10px] font-bold text-stone-400 uppercase">
                  Stock
                </p>
                <p class="text-lg font-headline font-bold text-stone-900">88</p>
              </div>
              <div>
                <p class="text-[10px] font-bold text-stone-400 uppercase">
                  Costo Unit.
                </p>
                <p class="text-lg font-headline font-bold text-stone-900">
                  $45.20
                </p>
              </div>
              <div>
                <p class="text-[10px] font-bold text-stone-400 uppercase">
                  Valor Total
                </p>
                <p class="text-lg font-headline font-bold text-green-600">
                  $3,977
                </p>
              </div>
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
    <script src="/frontend/public/erp/js/inventario.js"></script>
@endpush
