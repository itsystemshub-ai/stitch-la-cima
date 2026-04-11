@extends('layouts.erp')

@section('title', 'Ayuda | ERP La Cima | ERP La Cima')

@push('styles')
    <link rel="stylesheet" href="/frontend/public/erp/css/ayuda.css">
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
            Centro de Soporte
          </p>
          <h2
            class="text-3xl font-headline font-black text-stone-900 tracking-tight"
          >
            Ayuda y Soporte
          </h2>
          <p class="text-stone-500 text-sm mt-1">
            MAYOR DE REPUESTO LA CIMA, C.A. • RIF: J-40308741-5
          </p>
        </div>
        <div class="flex gap-3">
          <a
            href="/erp/crear-ticket"
            class="flex items-center gap-2 bg-primary text-stone-900 px-4 py-2 rounded-lg text-xs font-bold uppercase tracking-wider hover:brightness-110 transition-all"
          >
            <span class="material-symbols-outlined text-sm">add_circle</span>
            Crear Ticket
          </a>
        </div>
      </div>

      <!-- Quick Actions -->
      <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
        <a
          href="/erp/tickets-soporte"
          class="action-btn bg-primary text-stone-900 hover:brightness-110 shadow-lg shadow-primary/20"
        >
          <span class="material-symbols-outlined text-2xl"
            >confirmation_number</span
          >
          <span class="text-center leading-tight">Mis Tickets</span>
        </a>
        <a
          href="/erp/chat-asistencia"
          class="action-btn bg-white border border-stone-200 text-stone-700 hover:border-primary hover:bg-primary/5"
        >
          <span class="material-symbols-outlined text-2xl">chat</span>
          <span class="text-center leading-tight">Chat Asistencia</span>
        </a>
        <a
          href="/erp/base-conocimiento"
          class="action-btn bg-white border border-stone-200 text-stone-700 hover:border-primary hover:bg-primary/5"
        >
          <span class="material-symbols-outlined text-2xl">school</span>
          <span class="text-center leading-tight">Conocimiento</span>
        </a>
        <a
          href="/erp/manual-tecnico"
          class="action-btn bg-white border border-stone-200 text-stone-700 hover:border-primary hover:bg-primary/5"
        >
          <span class="material-symbols-outlined text-2xl">description</span>
          <span class="text-center leading-tight">Manual Técnico</span>
        </a>
      </div>

      <!-- Help Categories -->
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <!-- FAQs -->
        <div class="bg-white rounded-xl border border-stone-200 p-6">
          <div class="flex items-center gap-3 mb-6">
            <div
              class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center"
            >
              <span class="material-symbols-outlined text-blue-600">help</span>
            </div>
            <div>
              <h3 class="text-lg font-bold text-stone-900">
                Preguntas Frecuentes
              </h3>
              <p class="text-xs text-stone-500">
                Respuestas a consultas comunes
              </p>
            </div>
          </div>

          <div class="space-y-3">
            <details class="group">
              <summary
                class="flex items-center justify-between p-3 bg-stone-50 rounded-lg cursor-pointer hover:bg-stone-100 transition-colors"
              >
                <span class="text-sm font-medium text-stone-900"
                  >¿Cómo crear una nueva venta?</span
                >
                <span
                  class="material-symbols-outlined text-stone-400 group-open:rotate-180 transition-transform"
                  >expand_more</span
                >
              </summary>
              <div class="p-3 text-sm text-stone-600">
                Ve a Ventas > Punto de Venta, selecciona los productos y
                finaliza la venta.
              </div>
            </details>
            <details class="group">
              <summary
                class="flex items-center justify-between p-3 bg-stone-50 rounded-lg cursor-pointer hover:bg-stone-100 transition-colors"
              >
                <span class="text-sm font-medium text-stone-900"
                  >¿Cómo ajustar el inventario?</span
                >
                <span
                  class="material-symbols-outlined text-stone-400 group-open:rotate-180 transition-transform"
                  >expand_more</span
                >
              </summary>
              <div class="p-3 text-sm text-stone-600">
                Ve a Inventario > Ajustes y registra las diferencias
                encontradas.
              </div>
            </details>
            <details class="group">
              <summary
                class="flex items-center justify-between p-3 bg-stone-50 rounded-lg cursor-pointer hover:bg-stone-100 transition-colors"
              >
                <span class="text-sm font-medium text-stone-900"
                  >¿Cómo generar reportes?</span
                >
                <span
                  class="material-symbols-outlined text-stone-400 group-open:rotate-180 transition-transform"
                  >expand_more</span
                >
              </summary>
              <div class="p-3 text-sm text-stone-600">
                Cada módulo tiene una sección de Reportes. Selecciona el período
                y exporta.
              </div>
            </details>
          </div>
        </div>

        <!-- Contact Support -->
        <div class="bg-white rounded-xl border border-stone-200 p-6">
          <div class="flex items-center gap-3 mb-6">
            <div
              class="w-10 h-10 bg-green-50 rounded-lg flex items-center justify-center"
            >
              <span class="material-symbols-outlined text-green-600"
                >headset_mic</span
              >
            </div>
            <div>
              <h3 class="text-lg font-bold text-stone-900">
                Contactar Soporte
              </h3>
              <p class="text-xs text-stone-500">Estamos para ayudarte</p>
            </div>
          </div>

          <div class="space-y-4">
            <div class="flex items-center gap-4 p-3 bg-stone-50 rounded-lg">
              <span class="material-symbols-outlined text-stone-500"
                >email</span
              >
              <div>
                <p class="text-sm font-bold text-stone-900">
                  Correo Electrónico
                </p>
                <p class="text-xs text-stone-500">soporte@lacima.com</p>
              </div>
            </div>
            <div class="flex items-center gap-4 p-3 bg-stone-50 rounded-lg">
              <span class="material-symbols-outlined text-stone-500"
                >phone</span
              >
              <div>
                <p class="text-sm font-bold text-stone-900">Teléfono</p>
                <p class="text-xs text-stone-500">+58 241-123-4567</p>
              </div>
            </div>
            <div class="flex items-center gap-4 p-3 bg-stone-50 rounded-lg">
              <span class="material-symbols-outlined text-stone-500"
                >schedule</span
              >
              <div>
                <p class="text-sm font-bold text-stone-900">
                  Horario de Atención
                </p>
                <p class="text-xs text-stone-500">
                  Lun - Vie: 8:00 AM - 5:00 PM
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- System Status -->
      <div class="bg-white rounded-xl border border-stone-200 p-6 mb-8">
        <div class="flex items-center gap-3 mb-6">
          <div
            class="w-10 h-10 bg-green-50 rounded-lg flex items-center justify-center"
          >
            <span class="material-symbols-outlined text-green-600"
              >health_and_safety</span
            >
          </div>
          <div>
            <h3 class="text-lg font-bold text-stone-900">Estado del Sistema</h3>
            <p class="text-xs text-stone-500">Monitoreo en tiempo real</p>
          </div>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
          <div class="p-4 bg-green-50 rounded-lg text-center">
            <span class="material-symbols-outlined text-green-600 text-3xl mb-2"
              >check_circle</span
            >
            <p class="text-sm font-bold text-stone-900">API</p>
            <p class="text-xs text-green-600">Operativo</p>
          </div>
          <div class="p-4 bg-green-50 rounded-lg text-center">
            <span class="material-symbols-outlined text-green-600 text-3xl mb-2"
              >check_circle</span
            >
            <p class="text-sm font-bold text-stone-900">Base de Datos</p>
            <p class="text-xs text-green-600">Conectado</p>
          </div>
          <div class="p-4 bg-green-50 rounded-lg text-center">
            <span class="material-symbols-outlined text-green-600 text-3xl mb-2"
              >check_circle</span
            >
            <p class="text-sm font-bold text-stone-900">Backups</p>
            <p class="text-xs text-green-600">Al día</p>
          </div>
          <div class="p-4 bg-amber-50 rounded-lg text-center">
            <span class="material-symbols-outlined text-amber-600 text-3xl mb-2"
              >warning</span
            >
            <p class="text-sm font-bold text-stone-900">Actualización</p>
            <p class="text-xs text-amber-600">Pendiente</p>
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
    <script src="/frontend/public/erp/js/ayuda.js"></script>
@endpush
