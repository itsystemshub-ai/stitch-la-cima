@extends('layouts.erp')

@section('title', 'Configuración | ERP La Cima | ERP La Cima')

@push('styles')
    <link rel="stylesheet" href="/frontend/public/erp/css/configuracion.css">
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
            Módulo de Configuración
          </p>
          <h2
            class="text-3xl font-headline font-black text-stone-900 tracking-tight"
          >
            Configuración del Sistema
          </h2>
          <p class="text-stone-500 text-sm mt-1">
            MAYOR DE REPUESTO LA CIMA, C.A. • RIF: J-40308741-5
          </p>
        </div>
        <div class="flex gap-3">
          <a
            href="/erp/backups"
            class="flex items-center gap-2 bg-primary text-stone-900 px-4 py-2 rounded-lg text-xs font-bold uppercase tracking-wider hover:brightness-110 transition-all"
          >
            <span class="material-symbols-outlined text-sm">backup</span>
            Backup Ahora
          </a>
        </div>
      </div>

      <!-- Action Buttons -->
      <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
        <a
          href="/erp/parametros"
          class="action-btn bg-primary text-stone-900 hover:brightness-110 shadow-lg shadow-primary/20"
        >
          <span class="material-symbols-outlined text-2xl">tune</span>
          <span class="text-center leading-tight">Parámetros</span>
        </a>
        <a
          href="/erp/config-fiscal"
          class="action-btn bg-white border border-stone-200 text-stone-700 hover:border-primary hover:bg-primary/5"
        >
          <span class="material-symbols-outlined text-2xl">policy</span>
          <span class="text-center leading-tight">Config Fiscal</span>
        </a>
        <a
          href="/erp/usuarios-roles"
          class="action-btn bg-white border border-stone-200 text-stone-700 hover:border-primary hover:bg-primary/5"
        >
          <span class="material-symbols-outlined text-2xl"
            >admin_panel_settings</span
          >
          <span class="text-center leading-tight">Usuarios</span>
        </a>
        <a
          href="/erp/estado-sistema"
          class="action-btn bg-white border border-stone-200 text-stone-700 hover:border-primary hover:bg-primary/5"
        >
          <span class="material-symbols-outlined text-2xl"
            >health_and_safety</span
          >
          <span class="text-center leading-tight">Estado Sistema</span>
        </a>
      </div>

      <!-- System Status -->
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <!-- System Health -->
        <div class="bg-white rounded-xl border border-stone-200 p-6">
          <div class="flex items-center gap-3 mb-6">
            <div
              class="w-10 h-10 bg-green-50 rounded-lg flex items-center justify-center"
            >
              <span class="material-symbols-outlined text-green-600"
                >health_and_safety</span
              >
            </div>
            <div>
              <h3 class="text-lg font-bold text-stone-900">
                Estado del Sistema
              </h3>
              <p class="text-xs text-stone-500">Monitoreo en tiempo real</p>
            </div>
          </div>

          <div class="space-y-4">
            <div class="flex items-center justify-between">
              <span class="text-sm text-stone-600">API Central</span>
              <span
                class="px-2 py-0.5 bg-green-100 text-green-700 text-[10px] font-bold rounded-full"
                >OPERATIVO</span
              >
            </div>
            <div class="flex items-center justify-between">
              <span class="text-sm text-stone-600">Base de Datos</span>
              <span
                class="px-2 py-0.5 bg-green-100 text-green-700 text-[10px] font-bold rounded-full"
                >CONECTADO</span
              >
            </div>
            <div class="flex items-center justify-between">
              <span class="text-sm text-stone-600">Usuarios Activos</span>
              <span class="text-sm font-bold text-stone-900"
                >12 administradores</span
              >
            </div>
            <div class="flex items-center justify-between">
              <span class="text-sm text-stone-600">Último Backup</span>
              <span class="text-xs text-stone-500">Hace 45 minutos</span>
            </div>
            <div class="flex items-center justify-between">
              <span class="text-sm text-stone-600">Espacio en Disco</span>
              <div class="flex items-center gap-2">
                <div class="w-24 h-2 bg-stone-100 rounded-full overflow-hidden">
                  <div class="h-full bg-green-500 w-[45%]"></div>
                </div>
                <span class="text-xs font-bold text-stone-900">45%</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Backup Management -->
        <div class="bg-white rounded-xl border border-stone-200 p-6">
          <div class="flex items-center gap-3 mb-6">
            <div
              class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center"
            >
              <span class="material-symbols-outlined text-blue-600"
                >backup</span
              >
            </div>
            <div>
              <h3 class="text-lg font-bold text-stone-900">
                Gestión de Backups
              </h3>
              <p class="text-xs text-stone-500">Respaldo y restauración</p>
            </div>
          </div>

          <div class="space-y-3">
            <div
              class="flex items-center justify-between p-3 bg-stone-50 rounded-lg"
            >
              <div class="flex items-center gap-3">
                <span class="material-symbols-outlined text-green-600"
                  >check_circle</span
                >
                <div>
                  <p class="text-sm font-bold text-stone-900">
                    Backup Automático
                  </p>
                  <p class="text-[10px] text-stone-500">Diario a las 23:00</p>
                </div>
              </div>
              <span class="badge badge-green">Activo</span>
            </div>
            <div
              class="flex items-center justify-between p-3 bg-stone-50 rounded-lg"
            >
              <div class="flex items-center gap-3">
                <span class="material-symbols-outlined text-blue-600"
                  >cloud</span
                >
                <div>
                  <p class="text-sm font-bold text-stone-900">
                    Backup en la Nube
                  </p>
                  <p class="text-[10px] text-stone-500">
                    Railway Cloud Storage
                  </p>
                </div>
              </div>
              <span class="badge badge-green">Activo</span>
            </div>
            <div
              class="flex items-center justify-between p-3 bg-stone-50 rounded-lg"
            >
              <div class="flex items-center gap-3">
                <span class="material-symbols-outlined text-stone-500"
                  >history</span
                >
                <div>
                  <p class="text-sm font-bold text-stone-900">Retención</p>
                  <p class="text-[10px] text-stone-500">30 días</p>
                </div>
              </div>
              <span class="badge badge-blue">30 días</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Configuration Summary -->
      <div class="bg-white rounded-xl border border-stone-200 p-6 mb-8">
        <div class="flex justify-between items-center mb-6">
          <div class="flex items-center gap-3">
            <div
              class="w-10 h-10 bg-purple-50 rounded-lg flex items-center justify-center"
            >
              <span class="material-symbols-outlined text-purple-600"
                >tune</span
              >
            </div>
            <div>
              <h3 class="text-lg font-bold text-stone-900">
                Configuraciones Principales
              </h3>
              <p class="text-xs text-stone-500">Parámetros del sistema</p>
            </div>
          </div>
          <a
            href="/erp/parametros"
            class="text-xs font-bold text-primary hover:brightness-75 flex items-center gap-1"
          >
            Ver todos
            <span class="material-symbols-outlined text-sm">arrow_forward</span>
          </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
          <div class="p-4 bg-stone-50 rounded-lg">
            <div class="flex items-center gap-2 mb-2">
              <span class="material-symbols-outlined text-stone-500 text-sm"
                >business</span
              >
              <span class="text-sm font-bold text-stone-900">Empresa</span>
            </div>
            <p class="text-xs text-stone-600">
              Mayor de Repuesto La Cima, C.A.
            </p>
            <p class="text-xs text-stone-500">RIF: J-40308741-5</p>
          </div>
          <div class="p-4 bg-stone-50 rounded-lg">
            <div class="flex items-center gap-2 mb-2">
              <span class="material-symbols-outlined text-stone-500 text-sm"
                >policy</span
              >
              <span class="text-sm font-bold text-stone-900">IVA</span>
            </div>
            <p class="text-xs text-stone-600">Tasa: 16%</p>
            <p class="text-xs text-stone-500">Contribuyente especial</p>
          </div>
          <div class="p-4 bg-stone-50 rounded-lg">
            <div class="flex items-center gap-2 mb-2">
              <span class="material-symbols-outlined text-stone-500 text-sm"
                >inventory_2</span
              >
              <span class="text-sm font-bold text-stone-900">Inventario</span>
            </div>
            <p class="text-xs text-stone-600">Método: Promedio Ponderado</p>
            <p class="text-xs text-stone-500">Stock mínimo: 10 unidades</p>
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
    <script src="/frontend/public/erp/js/configuracion.js"></script>
@endpush
