@extends('layouts.erp')

@section('title', 'Finanzas | ERP La Cima | ERP La Cima')

@push('styles')
    <link rel="stylesheet" href="/frontend/public/erp/css/finanzas.css">
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
            Módulo de Finanzas
          </p>
          <h2
            class="text-3xl font-headline font-black text-stone-900 tracking-tight"
          >
            Control Financiero
          </h2>
          <p class="text-stone-500 text-sm mt-1">
            MAYOR DE REPUESTO LA CIMA, C.A. • RIF: J-40308741-5
          </p>
        </div>
        <div class="flex gap-3">
          <a
            href="/erp/reportes-financieros"
            class="flex items-center gap-2 bg-primary text-stone-900 px-4 py-2 rounded-lg text-xs font-bold uppercase tracking-wider hover:brightness-110 transition-all"
          >
            <span class="material-symbols-outlined text-sm">show_chart</span>
            Reporte Financiero
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
                >savings</span
              >
            </div>
            <span class="badge badge-green">+8%</span>
          </div>
          <p
            class="text-[10px] font-bold text-stone-400 uppercase tracking-wider"
          >
            Activos Totales
          </p>
          <p class="text-2xl font-headline font-bold text-stone-900 mt-1">
            $450,000
          </p>
          <p class="text-xs text-stone-500 mt-1">Valor total activos</p>
        </div>

        <div class="kpi-card">
          <div class="flex items-center justify-between mb-3">
            <div
              class="w-10 h-10 bg-red-50 rounded-lg flex items-center justify-center"
            >
              <span class="material-symbols-outlined text-red-600"
                >account_balance_wallet</span
              >
            </div>
            <span class="badge badge-red">$180K</span>
          </div>
          <p
            class="text-[10px] font-bold text-stone-400 uppercase tracking-wider"
          >
            Pasivos Totales
          </p>
          <p class="text-2xl font-headline font-bold text-stone-900 mt-1">
            $180,000
          </p>
          <p class="text-xs text-stone-500 mt-1">Deudas y obligaciones</p>
        </div>

        <div class="kpi-card">
          <div class="flex items-center justify-between mb-3">
            <div
              class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center"
            >
              <span class="material-symbols-outlined text-blue-600"
                >trending_up</span
              >
            </div>
            <span class="badge badge-green">+12%</span>
          </div>
          <p
            class="text-[10px] font-bold text-stone-400 uppercase tracking-wider"
          >
            Patrimonio Neto
          </p>
          <p class="text-2xl font-headline font-bold text-stone-900 mt-1">
            $270,000
          </p>
          <p class="text-xs text-stone-500 mt-1">Capital + utilidades</p>
        </div>

        <div class="kpi-card">
          <div class="flex items-center justify-between mb-3">
            <div
              class="w-10 h-10 bg-amber-50 rounded-lg flex items-center justify-center"
            >
              <span class="material-symbols-outlined text-amber-600"
                >corporate_fare</span
              >
            </div>
            <span class="badge badge-yellow">$85K</span>
          </div>
          <p
            class="text-[10px] font-bold text-stone-400 uppercase tracking-wider"
          >
            Activos Fijos
          </p>
          <p class="text-2xl font-headline font-bold text-stone-900 mt-1">
            $85,000
          </p>
          <p class="text-xs text-stone-500 mt-1">Neto depreciación</p>
        </div>
      </div>

      <!-- Action Buttons -->
      <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-8">
        <a
          href="/erp/activos-fijos"
          class="action-btn bg-primary text-stone-900 hover:brightness-110 shadow-lg shadow-primary/20"
        >
          <span class="material-symbols-outlined text-2xl">corporate_fare</span>
          <span class="text-center leading-tight">Activos Fijos</span>
        </a>
        <a
          href="/erp/cuentas-cobrar"
          class="action-btn bg-white border border-stone-200 text-stone-700 hover:border-primary hover:bg-primary/5"
        >
          <span class="material-symbols-outlined text-2xl"
            >account_balance_wallet</span
          >
          <span class="text-center leading-tight">Cuentas por Cobrar</span>
        </a>
        <a
          href="/erp/reportes-financieros"
          class="action-btn bg-white border border-stone-200 text-stone-700 hover:border-primary hover:bg-primary/5"
        >
          <span class="material-symbols-outlined text-2xl">show_chart</span>
          <span class="text-center leading-tight">Reportes</span>
        </a>
      </div>

      <!-- Financial Overview -->
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <!-- Assets vs Liabilities -->
        <div class="bg-white rounded-xl border border-stone-200 p-6">
          <div class="flex items-center gap-3 mb-6">
            <div
              class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center"
            >
              <span class="material-symbols-outlined text-blue-600"
                >balance</span
              >
            </div>
            <div>
              <h3 class="text-lg font-bold text-stone-900">
                Activos vs Pasivos
              </h3>
              <p class="text-xs text-stone-500">Comparación mensual</p>
            </div>
          </div>

          <div class="space-y-4">
            <div>
              <div class="flex justify-between items-center mb-2">
                <span class="text-sm font-medium text-stone-700">Activos</span>
                <span class="text-sm font-bold text-green-700">$450,000</span>
              </div>
              <div class="w-full bg-stone-100 rounded-full h-3">
                <div
                  class="bg-green-500 h-3 rounded-full"
                  style="width: 75%"
                ></div>
              </div>
            </div>
            <div>
              <div class="flex justify-between items-center mb-2">
                <span class="text-sm font-medium text-stone-700">Pasivos</span>
                <span class="text-sm font-bold text-red-700">$180,000</span>
              </div>
              <div class="w-full bg-stone-100 rounded-full h-3">
                <div
                  class="bg-red-500 h-3 rounded-full"
                  style="width: 40%"
                ></div>
              </div>
            </div>
            <div>
              <div class="flex justify-between items-center mb-2">
                <span class="text-sm font-medium text-stone-700"
                  >Patrimonio</span
                >
                <span class="text-sm font-bold text-blue-700">$270,000</span>
              </div>
              <div class="w-full bg-stone-100 rounded-full h-3">
                <div
                  class="bg-blue-500 h-3 rounded-full"
                  style="width: 60%"
                ></div>
              </div>
            </div>
          </div>
        </div>

        <!-- Accounts Receivable -->
        <div class="bg-white rounded-xl border border-stone-200 p-6">
          <div class="flex items-center gap-3 mb-6">
            <div
              class="w-10 h-10 bg-amber-50 rounded-lg flex items-center justify-center"
            >
              <span class="material-symbols-outlined text-amber-600"
                >account_balance_wallet</span
              >
            </div>
            <div>
              <h3 class="text-lg font-bold text-stone-900">
                Cuentas por Cobrar
              </h3>
              <p class="text-xs text-stone-500">Resumen de cartera</p>
            </div>
          </div>

          <div class="space-y-3">
            <div
              class="flex items-center justify-between p-3 bg-stone-50 rounded-lg"
            >
              <div class="flex items-center gap-3">
                <span
                  class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center"
                >
                  <span class="material-symbols-outlined text-green-600 text-sm"
                    >check_circle</span
                  >
                </span>
                <div>
                  <p class="text-sm font-bold text-stone-900">Al día</p>
                  <p class="text-[10px] text-stone-500">0-30 días</p>
                </div>
              </div>
              <span class="text-sm font-bold text-green-700">$45,000</span>
            </div>
            <div
              class="flex items-center justify-between p-3 bg-stone-50 rounded-lg"
            >
              <div class="flex items-center gap-3">
                <span
                  class="w-8 h-8 bg-amber-100 rounded-lg flex items-center justify-center"
                >
                  <span class="material-symbols-outlined text-amber-600 text-sm"
                    >pending</span
                  >
                </span>
                <div>
                  <p class="text-sm font-bold text-stone-900">Por vencer</p>
                  <p class="text-[10px] text-stone-500">31-60 días</p>
                </div>
              </div>
              <span class="text-sm font-bold text-amber-700">$28,000</span>
            </div>
            <div
              class="flex items-center justify-between p-3 bg-stone-50 rounded-lg"
            >
              <div class="flex items-center gap-3">
                <span
                  class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center"
                >
                  <span class="material-symbols-outlined text-red-600 text-sm"
                    >warning</span
                  >
                </span>
                <div>
                  <p class="text-sm font-bold text-stone-900">Vencidas</p>
                  <p class="text-[10px] text-stone-500">+60 días</p>
                </div>
              </div>
              <span class="text-sm font-bold text-red-700">$12,000</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Fixed Assets Summary -->
      <div class="bg-white rounded-xl border border-stone-200 p-6 mb-8">
        <div class="flex justify-between items-center mb-6">
          <div class="flex items-center gap-3">
            <div
              class="w-10 h-10 bg-purple-50 rounded-lg flex items-center justify-center"
            >
              <span class="material-symbols-outlined text-purple-600"
                >corporate_fare</span
              >
            </div>
            <div>
              <h3 class="text-lg font-bold text-stone-900">Activos Fijos</h3>
              <p class="text-xs text-stone-500">
                Resumen de activos registrados
              </p>
            </div>
          </div>
          <a
            href="/erp/activos-fijos"
            class="text-xs font-bold text-primary hover:brightness-75 flex items-center gap-1"
          >
            Ver todos
            <span class="material-symbols-outlined text-sm">arrow_forward</span>
          </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
          <div class="p-4 bg-stone-50 rounded-lg">
            <div class="flex items-center gap-3 mb-2">
              <span class="material-symbols-outlined text-stone-500"
                >computer</span
              >
              <span class="text-sm font-bold text-stone-900">Equipos</span>
            </div>
            <p class="text-2xl font-headline font-bold text-stone-900">
              $25,000
            </p>
            <p class="text-xs text-stone-500">5 activos registrados</p>
          </div>
          <div class="p-4 bg-stone-50 rounded-lg">
            <div class="flex items-center gap-3 mb-2">
              <span class="material-symbols-outlined text-stone-500"
                >chair</span
              >
              <span class="text-sm font-bold text-stone-900">Mobiliario</span>
            </div>
            <p class="text-2xl font-headline font-bold text-stone-900">
              $15,000
            </p>
            <p class="text-xs text-stone-500">8 activos registrados</p>
          </div>
          <div class="p-4 bg-stone-50 rounded-lg">
            <div class="flex items-center gap-3 mb-2">
              <span class="material-symbols-outlined text-stone-500"
                >directions_car</span
              >
              <span class="text-sm font-bold text-stone-900">Vehículos</span>
            </div>
            <p class="text-2xl font-headline font-bold text-stone-900">
              $45,000
            </p>
            <p class="text-xs text-stone-500">2 activos registrados</p>
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
    <script src="/frontend/public/erp/js/finanzas.js"></script>
@endpush
