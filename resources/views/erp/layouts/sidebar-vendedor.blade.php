<aside id="sidebar" class="h-screen w-72 fixed left-0 top-0 z-50 flex flex-col bg-white border-r border-stone-200 sidebar">
  <!-- Logo -->
  <div class="flex flex-col px-5 pt-6 pb-4">
    <div class="flex items-center gap-3 mb-2">
      <div class="w-10 h-10 bg-primary flex items-center justify-center rounded-lg">
        <span class="material-symbols-outlined text-stone-900">sell</span>
      </div>
      <div>
        <h2 class="font-headline font-bold text-[12px] text-stone-700 leading-none uppercase">ERP VENDEDORES</h2>
        <span class="text-[10px] font-mono text-stone-400">LA CIMA - VENTAS PRO</span>
      </div>
    </div>
    <p class="text-[10px] font-bold text-stone-400 tracking-wider uppercase">Portal de Fuerza de Ventas</p>
  </div>

  <!-- Menu Principal -->
  <nav class="flex-1 px-3 space-y-0.5 pb-24">
    <div class="menu-group">Operaciones de Venta</div>
    
    <a href="{{ url('/erp/vendedor/dashboard') }}" class="menu-item {{ Request::is('erp/vendedor/dashboard') ? 'menu-item-active' : 'menu-item-inactive' }}">
      <span class="material-symbols-outlined text-[20px]">analytics</span><span class="text-[12px]">Mi Dashboard</span>
    </a>

    <a href="{{ url('/erp/vendedor/pos') }}" class="menu-item {{ Request::is('erp/vendedor/pos*') ? 'menu-item-active' : 'menu-item-inactive' }}">
      <span class="material-symbols-outlined text-[20px]">add_shopping_cart</span><span class="text-[12px]">Nuevo Pedido (POS)</span>
    </a>

    <a href="{{ url('/erp/vendedor/clientes') }}" class="menu-item {{ Request::is('erp/vendedor/clientes*') ? 'menu-item-active' : 'menu-item-inactive' }}">
      <span class="material-symbols-outlined text-[20px]">groups</span><span class="text-[12px]">Mis Clientes</span>
    </a>

    <div class="menu-group">Consultas</div>

    <a href="{{ url('/erp/vendedor/stock') }}" class="menu-item {{ Request::is('erp/vendedor/stock*') ? 'menu-item-active' : 'menu-item-inactive' }}">
      <span class="material-symbols-outlined text-[20px]">inventory_2</span><span class="text-[12px]">Consulta de Stock</span>
    </a>

    <a href="{{ url('/erp/vendedor/ventas') }}" class="menu-item {{ Request::is('erp/vendedor/ventas*') ? 'menu-item-active' : 'menu-item-inactive' }}">
      <span class="material-symbols-outlined text-[20px]">list_alt</span><span class="text-[12px]">Historial de Ventas</span>
    </a>

    <a href="{{ url('/erp/vendedor/comisiones') }}" class="menu-item {{ Request::is('erp/vendedor/comisiones*') ? 'menu-item-active' : 'menu-item-inactive' }}">
      <span class="material-symbols-outlined text-[20px]">payments</span><span class="text-[12px]">Mis Comisiones</span>
    </a>

    <div class="menu-group">Soporte</div>
    <a href="{{ url('/erp/vendedor/ayuda') }}" class="menu-item {{ Request::is('erp/vendedor/ayuda*') ? 'menu-item-active' : 'menu-item-inactive' }}">
      <span class="material-symbols-outlined text-[20px]">help</span><span class="text-[12px]">Centro de Ayuda</span>
    </a>
  </nav>

  <!-- Boton Cerrar Sesion -->
  <div class="mt-auto border-t border-stone-200 p-4">
    <form method="POST" action="{{ url('/auth/logout') }}">
      @csrf
      <button type="submit" class="w-full bg-red-50 text-red-600 font-medium py-2.5 px-4 flex items-center justify-center gap-2 hover:bg-red-100 transition-all rounded-lg text-sm">
        <span class="material-symbols-outlined text-[18px]">logout</span>
        Cerrar Sesión
      </button>
    </form>
  </div>
</aside>
