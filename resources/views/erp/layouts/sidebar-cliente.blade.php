<aside id="sidebar" class="h-screen w-72 fixed left-0 top-0 z-50 flex flex-col bg-white border-r border-stone-200 sidebar">
  <!-- Logo -->
  <div class="flex flex-col px-5 pt-6 pb-4">
    <div class="flex items-center gap-3 mb-2">
      <div class="w-10 h-10 bg-stone-900 flex items-center justify-center rounded-lg">
        <span class="material-symbols-outlined text-primary">shopping_basket</span>
      </div>
      <div>
        <h2 class="font-headline font-bold text-[12px] text-stone-700 leading-none uppercase">PORTAL CLIENTES</h2>
        <span class="text-[10px] font-mono text-stone-400">LA CIMA - B2B</span>
      </div>
    </div>
    <p class="text-[10px] font-bold text-stone-400 tracking-wider uppercase">Portal de Autoservicio Mayorista</p>
  </div>

  <!-- Menu Principal -->
  <nav class="flex-1 px-3 space-y-0.5 pb-24">
    <div class="menu-group">Compras y Pedidos</div>
    
    <a href="{{ url('/erp/cliente/dashboard') }}" class="menu-item {{ Request::is('erp/cliente/dashboard') ? 'menu-item-active' : 'menu-item-inactive' }}">
      <span class="material-symbols-outlined text-[20px]">space_dashboard</span><span class="text-[12px]">Mi Resumen</span>
    </a>

    <a href="{{ url('/erp/cliente/catalogo') }}" class="menu-item {{ Request::is('erp/cliente/catalogo*') ? 'menu-item-active' : 'menu-item-inactive' }}">
      <span class="material-symbols-outlined text-[20px]">grid_view</span><span class="text-[12px]">Catálogo de Productos</span>
    </a>

    <a href="{{ url('/erp/cliente/pedidos') }}" class="menu-item {{ Request::is('erp/cliente/pedidos*') ? 'menu-item-active' : 'menu-item-inactive' }}">
      <span class="material-symbols-outlined text-[20px]">package_2</span><span class="text-[12px]">Mis Pedidos</span>
    </a>

    <div class="menu-group">Administración Financiera</div>

    <a href="{{ url('/erp/cliente/estado-cuenta') }}" class="menu-item {{ Request::is('erp/cliente/estado-cuenta*') ? 'menu-item-active' : 'menu-item-inactive' }}">
      <span class="material-symbols-outlined text-[20px]">receipt_long</span><span class="text-[12px]">Estado de Cuenta</span>
    </a>

    <a href="{{ url('/erp/cliente/pagos') }}" class="menu-item {{ Request::is('erp/cliente/pagos*') ? 'menu-item-active' : 'menu-item-inactive' }}">
      <span class="material-symbols-outlined text-[20px]">account_balance_wallet</span><span class="text-[12px]">Registrar Pago</span>
    </a>

    <div class="menu-group">Atención</div>
    <a href="{{ url('/erp/cliente/ayuda') }}" class="menu-item {{ Request::is('erp/cliente/ayuda*') ? 'menu-item-active' : 'menu-item-inactive' }}">
      <span class="material-symbols-outlined text-[20px]">support_agent</span><span class="text-[12px]">Soporte y Reclamos</span>
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
