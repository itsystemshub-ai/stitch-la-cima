@extends('layouts.erp')

@section('title', 'Dashboard Principal')

@section('styles')
<link rel="stylesheet" href="{{ asset('erp/css/inicio.css') }}">
@endsection

@section('content')
<!-- ========== CONTENIDO PRINCIPAL ========== -->
<main class="ml-[288px] w-[calc(100vw-288px)] mt-[65px] p-6 pb-4">

  <!-- Header Dashboard -->
  <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4 mb-8">
    <div>
      <p class="text-xs font-bold text-stone-400 tracking-[0.2em] uppercase mb-1">Resumen General</p>
      <h2 class="text-3xl font-headline font-black text-stone-900 tracking-tight">MAYOR DE REPUESTO LA CIMA, C.A.</h2>
      <p class="text-stone-500 text-sm">RIF: J-40308741-5 • Valencia, Venezuela</p>
    </div>
    <div class="flex gap-3">
      <div class="bg-white border border-stone-200 px-4 py-2 rounded-lg">
        <span class="text-[10px] font-bold text-stone-400 uppercase">Uptime</span>
        <p class="text-xl font-headline font-bold text-stone-900">99.9%</p>
      </div>
      <div class="bg-primary px-4 py-2 rounded-lg text-stone-900">
        <span class="text-[10px] font-bold uppercase">Estado</span>
        <p class="text-xl font-headline font-bold">ÓPTIMO</p>
      </div>
    </div>
  </div>

  <!-- Tarjetas de Resumen por Modulo -->
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 mb-6">

    <!-- Inventario -->
    <a href="/erp/inventario" class="bg-white border border-stone-200 rounded-xl p-5 hover:shadow-lg hover:border-primary/50 transition-all group">
      <div class="flex items-center justify-between mb-3">
        <div class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center">
          <span class="material-symbols-outlined text-blue-600">inventory_2</span>
        </div>
        <span class="text-[10px] font-bold text-green-600 bg-green-50 px-2 py-0.5 rounded-full">+12%</span>
      </div>
      <p class="text-2xl font-headline font-bold text-stone-900">14,204</p>
      <p class="text-xs text-stone-500 mt-1">Productos en Stock</p>
    </a>

    <!-- Ventas -->
    <a href="/erp/ventas" class="bg-white border border-stone-200 rounded-xl p-5 hover:shadow-lg hover:border-primary/50 transition-all group">
      <div class="flex items-center justify-between mb-3">
        <div class="w-10 h-10 bg-green-50 rounded-lg flex items-center justify-center">
          <span class="material-symbols-outlined text-green-600">payments</span>
        </div>
        <span class="text-[10px] font-bold text-green-600 bg-green-50 px-2 py-0.5 rounded-full">+8.2%</span>
      </div>
      <p class="text-2xl font-headline font-bold text-stone-900">$128,450</p>
      <p class="text-xs text-stone-500 mt-1">Ventas del Mes</p>
    </a>

    <!-- Compras -->
    <a href="/erp/compras" class="bg-white border border-stone-200 rounded-xl p-5 hover:shadow-lg hover:border-primary/50 transition-all group">
      <div class="flex items-center justify-between mb-3">
        <div class="w-10 h-10 bg-purple-50 rounded-lg flex items-center justify-center">
          <span class="material-symbols-outlined text-purple-600">shopping_cart</span>
        </div>
        <span class="text-[10px] font-bold text-stone-400 bg-stone-100 px-2 py-0.5 rounded-full">3 activas</span>
      </div>
      <p class="text-2xl font-headline font-bold text-stone-900">$12,400</p>
      <p class="text-xs text-stone-500 mt-1">Compras Pendientes</p>
    </a>

    <!-- Clientes -->
    <a href="/erp/clientes" class="bg-white border border-stone-200 rounded-xl p-5 hover:shadow-lg hover:border-primary/50 transition-all group">
      <div class="flex items-center justify-between mb-3">
        <div class="w-10 h-10 bg-orange-50 rounded-lg flex items-center justify-center">
          <span class="material-symbols-outlined text-orange-600">people</span>
        </div>
        <span class="text-[10px] font-bold text-green-600 bg-green-50 px-2 py-0.5 rounded-full">+5</span>
      </div>
      <p class="text-2xl font-headline font-bold text-stone-900">342</p>
      <p class="text-xs text-stone-500 mt-1">Clientes Activos</p>
    </a>
  </div>

  <!-- Seccion Principal: Inventario + Ventas -->
  <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">

    <!-- Inventario (2/3) -->
    <div class="lg:col-span-2 bg-white border border-stone-200 rounded-xl p-6">
      <div class="flex justify-between items-center mb-6">
        <div class="flex items-center gap-3">
          <div class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center">
            <span class="material-symbols-outlined text-blue-600">inventory_2</span>
          </div>
          <div>
            <h3 class="text-lg font-bold text-stone-900">Control de Inventario</h3>
            <p class="text-xs text-stone-500">Resumen general del stock</p>
          </div>
        </div>
        <a href="/erp/inventario" class="text-xs font-bold text-stone-500 hover:text-stone-900 flex items-center gap-1">
          Ver completo
          <span class="material-symbols-outlined text-sm">arrow_forward</span>
        </a>
      </div>

      <div class="grid grid-cols-3 gap-6 mb-6">
        <div class="border-l-4 border-green-500 pl-4">
          <p class="text-[10px] font-bold text-stone-400 uppercase">Stock Activo</p>
          <p class="text-2xl font-headline font-bold text-stone-900">14,204</p>
        </div>
        <div class="border-l-4 border-red-500 pl-4">
          <p class="text-[10px] font-bold text-stone-400 uppercase">Alertas Críticas</p>
          <p class="text-2xl font-headline font-bold text-red-500">5</p>
        </div>
        <div class="border-l-4 border-primary pl-4">
          <p class="text-[10px] font-bold text-stone-400 uppercase">Rotación</p>
          <p class="text-2xl font-headline font-bold text-stone-900">12.4%</p>
        </div>
      </div>

      <!-- Grafica de Barras Simulada -->
      <div class="h-32 bg-stone-50 rounded-lg flex items-end gap-1 px-3 py-2 overflow-hidden">
        <div class="flex-1 bg-stone-200 h-[40%] rounded-t"></div>
        <div class="flex-1 bg-stone-300 h-[60%] rounded-t"></div>
        <div class="flex-1 bg-stone-200 h-[55%] rounded-t"></div>
        <div class="flex-1 bg-blue-400 h-[85%] rounded-t"></div>
        <div class="flex-1 bg-stone-300 h-[45%] rounded-t"></div>
        <div class="flex-1 bg-stone-200 h-[30%] rounded-t"></div>
        <div class="flex-1 bg-stone-900 h-[95%] rounded-t"></div>
        <div class="flex-1 bg-stone-200 h-[50%] rounded-t"></div>
        <div class="flex-1 bg-stone-300 h-[70%] rounded-t"></div>
        <div class="flex-1 bg-primary h-[100%] rounded-t"></div>
        <div class="flex-1 bg-stone-200 h-[65%] rounded-t"></div>
        <div class="flex-1 bg-stone-300 h-[75%] rounded-t"></div>
      </div>
      <div class="flex justify-between text-[10px] text-stone-400 mt-2 px-3">
        <span>Lun</span><span>Mar</span><span>Mié</span><span>Jue</span><span>Vie</span><span>Sáb</span><span>Dom</span>
      </div>
    </div>

    <!-- Ventas Rapidas (1/3) -->
    <div class="bg-stone-900 text-white rounded-xl p-6 relative overflow-hidden">
      <div class="absolute top-0 right-0 opacity-10">
        <span class="material-symbols-outlined text-9xl">trending_up</span>
      </div>
      <div class="relative">
        <p class="text-[10px] font-bold text-stone-400 uppercase tracking-widest mb-2">Ingresos del Mes</p>
        <h3 class="text-4xl font-headline font-black text-primary tracking-tighter mb-4">$128,450</h3>
        <div class="flex items-center gap-2 mb-6">
          <span class="text-sm font-medium text-stone-300">24 órdenes pendientes</span>
          <span class="ml-auto text-xs text-green-400">+12% vs mes anterior</span>
        </div>

        <div class="space-y-3 mb-6">
          <div class="flex items-center justify-between bg-white/5 rounded-lg p-3">
            <div class="flex items-center gap-3">
              <span class="material-symbols-outlined text-green-400">check_circle</span>
              <div>
                <p class="text-xs font-bold">FAC-001</p>
                <p class="text-[10px] text-stone-400">Discos de Freno x2</p>
              </div>
            </div>
            <span class="text-sm font-bold">$170.00</span>
          </div>
          <div class="flex items-center justify-between bg-white/5 rounded-lg p-3">
            <div class="flex items-center gap-3">
              <span class="material-symbols-outlined text-yellow-400">pending</span>
              <div>
                <p class="text-xs font-bold">FAC-002</p>
                <p class="text-[10px] text-stone-400">Turbo VGT x1</p>
              </div>
            </div>
            <span class="text-sm font-bold">$845.00</span>
          </div>
          <div class="flex items-center justify-between bg-white/5 rounded-lg p-3">
            <div class="flex items-center gap-3">
              <span class="material-symbols-outlined text-green-400">check_circle</span>
              <div>
                <p class="text-xs font-bold">FAC-003</p>
                <p class="text-[10px] text-stone-400">Amortiguador + Pastillas</p>
              </div>
            </div>
            <span class="text-sm font-bold">$274.50</span>
          </div>
        </div>

        <div class="flex gap-2">
          <a href="/erp/ventas" class="flex-1 bg-primary text-stone-900 py-2.5 font-bold text-sm rounded-lg hover:brightness-110 transition-all text-center">
            VER VENTAS
          </a>
          <a href="/erp/pos" class="w-10 h-10 border border-stone-700 flex items-center justify-center hover:bg-stone-800 rounded-lg transition-colors">
            <span class="material-symbols-outlined text-sm">add</span>
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Compras + Estado del Sistema -->
  <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">

    <!-- Compras Recientes -->
    <div class="bg-white border border-stone-200 rounded-xl p-6">
      <div class="flex justify-between items-center mb-5">
        <div class="flex items-center gap-3">
          <div class="w-10 h-10 bg-purple-50 rounded-lg flex items-center justify-center">
            <span class="material-symbols-outlined text-purple-600">local_shipping</span>
          </div>
          <div>
            <h3 class="text-lg font-bold text-stone-900">Compras Recientes</h3>
            <p class="text-xs text-stone-500">Órdenes en tránsito</p>
          </div>
        </div>
        <a href="/erp/compras" class="text-xs font-bold text-stone-500 hover:text-stone-900 flex items-center gap-1">
          Ver todas
          <span class="material-symbols-outlined text-sm">arrow_forward</span>
        </a>
      </div>

      <div class="space-y-3">
        <div class="flex items-center justify-between bg-stone-50 rounded-lg p-3 border-l-4 border-yellow-400">
          <div>
            <p class="text-sm font-bold text-stone-900">Repuestos Cummins #402</p>
            <p class="text-[10px] text-stone-500">Proveedor: Cummins Venezuela</p>
          </div>
          <span class="text-[10px] font-bold text-yellow-600 bg-yellow-50 px-2 py-1 rounded">ETA: 24h</span>
        </div>
        <div class="flex items-center justify-between bg-stone-50 rounded-lg p-3 border-l-4 border-blue-400">
          <div>
            <p class="text-sm font-bold text-stone-900">Ensamblajes Volvo</p>
            <p class="text-[10px] text-stone-500">Proveedor: Volvo Parts</p>
          </div>
          <span class="text-[10px] font-bold text-blue-600 bg-blue-50 px-2 py-1 rounded">ETA: 4d</span>
        </div>
        <div class="flex items-center justify-between bg-stone-50 rounded-lg p-3 border-l-4 border-green-400">
          <div>
            <p class="text-sm font-bold text-stone-900">Filtros Bosch Lote #15</p>
            <p class="text-[10px] text-stone-500">Proveedor: Bosch Auto Parts</p>
          </div>
          <span class="text-[10px] font-bold text-green-600 bg-green-50 px-2 py-1 rounded">Recibido</span>
        </div>
      </div>

      <div class="mt-5 pt-4 border-t border-stone-100 flex justify-between items-center">
        <span class="text-sm text-stone-500">Total pendiente</span>
        <span class="text-xl font-headline font-bold text-stone-900">$12,400.00</span>
      </div>
    </div>

    <!-- Estado del Sistema -->
    <div class="bg-white border border-stone-200 rounded-xl p-6">
      <div class="flex items-center gap-3 mb-5">
        <div class="w-10 h-10 bg-green-50 rounded-lg flex items-center justify-center">
          <span class="material-symbols-outlined text-green-600">health_and_safety</span>
        </div>
        <div>
          <h3 class="text-lg font-bold text-stone-900">Estado del Sistema</h3>
          <p class="text-xs text-stone-500">Monitoreo en tiempo real</p>
        </div>
      </div>

      <div class="space-y-4">
        <div class="flex items-center justify-between">
          <span class="text-sm text-stone-600">API Central</span>
          <span class="px-2 py-0.5 bg-green-100 text-green-700 text-[10px] font-bold rounded-full">OPERATIVO</span>
        </div>
        <div class="flex items-center justify-between">
          <span class="text-sm text-stone-600">Base de Datos</span>
          <span class="px-2 py-0.5 bg-green-100 text-green-700 text-[10px] font-bold rounded-full">CONECTADO</span>
        </div>
        <div class="flex items-center justify-between">
          <span class="text-sm text-stone-600">Usuarios Activos</span>
          <span class="text-sm font-bold text-stone-900">12 administradores</span>
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

      <div class="mt-5 pt-4 border-t border-stone-100 flex gap-2">
        <a href="/erp/estado-sistema" class="flex-1 border border-stone-300 text-stone-700 py-2 text-xs font-bold rounded-lg hover:bg-stone-50 transition-all text-center">
          DETALLES
        </a>
        <a href="/erp/backups" class="flex-1 bg-stone-900 text-white py-2 text-xs font-bold rounded-lg hover:bg-stone-800 transition-all text-center">
          BACKUP AHORA
        </a>
      </div>
    </div>
  </div>

  <!-- Modulos Disponibles -->
  <div class="bg-white border border-stone-200 rounded-xl p-6 mb-6">
    <h3 class="text-lg font-bold text-stone-900 mb-4">Módulos Disponibles</h3>
    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-7 gap-3">
      <!-- Inventario -->
      <a href="/erp/inventario" class="bg-blue-50 border border-blue-100 rounded-xl p-4 text-center hover:shadow-md transition-all hover:border-blue-300 group">
        <span class="material-symbols-outlined text-blue-600 text-3xl mb-2 group-hover:scale-110 transition-transform">inventory_2</span>
        <p class="text-xs font-bold text-stone-900">Inventario</p>
        <p class="text-[10px] text-stone-500">7 módulos</p>
      </a>
      <!-- Ventas -->
      <a href="/erp/ventas" class="bg-green-50 border border-green-100 rounded-xl p-4 text-center hover:shadow-md transition-all hover:border-green-300 group">
        <span class="material-symbols-outlined text-green-600 text-3xl mb-2 group-hover:scale-110 transition-transform">payments</span>
        <p class="text-xs font-bold text-stone-900">Ventas</p>
        <p class="text-[10px] text-stone-500">8 módulos</p>
      </a>
      <!-- Compras -->
      <a href="/erp/compras" class="bg-purple-50 border border-purple-100 rounded-xl p-4 text-center hover:shadow-md transition-all hover:border-purple-300 group">
        <span class="material-symbols-outlined text-purple-600 text-3xl mb-2 group-hover:scale-110 transition-transform">shopping_cart</span>
        <p class="text-xs font-bold text-stone-900">Compras</p>
        <p class="text-[10px] text-stone-500">6 módulos</p>
      </a>
      <!-- Contabilidad -->
      <a href="/erp/contabilidad" class="bg-orange-50 border border-orange-100 rounded-xl p-4 text-center hover:shadow-md transition-all hover:border-orange-300 group">
        <span class="material-symbols-outlined text-orange-600 text-3xl mb-2 group-hover:scale-110 transition-transform">account_balance</span>
        <p class="text-xs font-bold text-stone-900">Contabilidad</p>
        <p class="text-[10px] text-stone-500">11 módulos</p>
      </a>
      <!-- Finanzas -->
      <a href="/erp/finanzas" class="bg-yellow-50 border border-yellow-100 rounded-xl p-4 text-center hover:shadow-md transition-all hover:border-yellow-300 group">
        <span class="material-symbols-outlined text-yellow-600 text-3xl mb-2 group-hover:scale-110 transition-transform">monetization_on</span>
        <p class="text-xs font-bold text-stone-900">Finanzas</p>
        <p class="text-[10px] text-stone-500">4 módulos</p>
      </a>
      <!-- RRHH -->
      <a href="/erp/rrhh" class="bg-pink-50 border border-pink-100 rounded-xl p-4 text-center hover:shadow-md transition-all hover:border-pink-300 group">
        <span class="material-symbols-outlined text-pink-600 text-3xl mb-2 group-hover:scale-110 transition-transform">groups</span>
        <p class="text-xs font-bold text-stone-900">RRHH</p>
        <p class="text-[10px] text-stone-500">6 módulos</p>
      </a>
      <!-- Configuracion -->
      <a href="/erp/configuracion" class="bg-stone-50 border border-stone-200 rounded-xl p-4 text-center hover:shadow-md transition-all hover:border-stone-300 group">
        <span class="material-symbols-outlined text-stone-600 text-3xl mb-2 group-hover:scale-110 transition-transform">settings</span>
        <p class="text-xs font-bold text-stone-900">Sistema</p>
        <p class="text-[10px] text-stone-500">15 módulos</p>
      </a>
    </div>
  </div>

  <!-- Footer -->
  <div class="pt-4 border-t border-stone-100 flex flex-col md:flex-row justify-between items-center gap-4">
    <span class="text-[10px] font-bold text-stone-400">RIF: J-40308741-5 • Todos los derechos reservados © 2026</span>
    <div class="flex items-center gap-4">
      <a href="/erp/ayuda" class="text-[10px] font-bold text-stone-500 hover:text-stone-900">Centro de Ayuda</a>
      <a href="/erp/manual-tecnico" class="text-[10px] font-bold text-stone-500 hover:text-stone-900">Manual Técnico</a>
      <a href="/erp/estado-sistema" class="text-[10px] font-bold text-stone-500 hover:text-stone-900">Estado del Sistema</a>
    </div>
  </div>
</main>
@endsection

@section('scripts')
<script src="{{ asset('erp/js/inicio.js') }}"></script>
@endsection
