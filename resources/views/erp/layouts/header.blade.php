<header class="fixed top-0 left-72 right-0 bg-white/80 backdrop-blur-xl z-40 border-b border-stone-200">
  <div class="flex justify-between items-center px-6 py-3">
    <!-- Breadcrumb -->
    <div class="flex items-center gap-4">
      <button id="menuToggle" class="lg:hidden p-2 text-stone-500 hover:bg-stone-100 rounded-lg">
        <span class="material-symbols-outlined">menu</span>
      </button>
      <div class="hidden md:flex items-center gap-2 text-sm text-stone-500">
        <a href="{{ url('/erp/dashboard') }}" class="hover:text-stone-900">Inicio</a>
        @yield('breadcrumb')
      </div>
      <button id="tour-quick-tour" onclick="startErpTour()" class="ml-4 px-3 py-1.5 bg-stone-900 text-primary text-[10px] font-black uppercase tracking-widest rounded-full hover:bg-stone-800 transition-all flex items-center gap-2">
        <span class="material-symbols-outlined text-xs">auto_awesome</span>
        Quick Tour
      </button>
    </div>

    <!-- Acciones -->
    <div class="flex items-center gap-3">
      <!-- Busqueda Global -->
      <div id="tour-header-search" class="hidden lg:block relative">
        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-stone-400">
          <span class="material-symbols-outlined text-lg">search</span>
        </span>
        <input class="bg-stone-100 border-none text-sm pl-10 pr-3 py-2 w-64 rounded-lg focus:ring-2 focus:ring-primary/50 focus:bg-white transition-all" placeholder="Buscar repuestos, ventas, clientes..." type="text"/>
      </div>

      <!-- Notificaciones -->
      <div id="tour-notifications" class="relative" x-data="{ open: false }">
        <button @click="open = !open" class="p-2 text-stone-500 hover:bg-stone-100 rounded-lg relative transition-all active:scale-95">
          <span class="material-symbols-outlined">notifications</span>
          @if($unreadNotificationsCount > 0)
            <span class="absolute top-1 right-1 w-4 h-4 bg-red-500 text-white text-[9px] font-black rounded-full flex items-center justify-center border-2 border-white animate-pulse">
              {{ $unreadNotificationsCount }}
            </span>
          @endif
        </button>

        <!-- Dropdown de Notificaciones -->
        <div x-show="open" @click.away="open = false" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 scale-95 translate-y-[-10px]"
             x-transition:enter-end="opacity-100 scale-100 translate-y-0"
             class="absolute right-0 mt-2 w-80 bg-white border border-stone-200 rounded-[24px] shadow-2xl z-50 overflow-hidden" style="display: none;">
          <div class="p-4 border-b border-stone-100 flex justify-between items-center bg-stone-50/50">
            <span class="text-[10px] font-black text-stone-400 uppercase tracking-widest">Notificaciones</span>
            @if($unreadNotificationsCount > 0)
                <span class="text-[9px] font-black bg-primary text-stone-900 px-2 py-0.5 rounded-full uppercase">Nuevas</span>
            @endif
          </div>
          <div class="max-h-96 overflow-y-auto">
            @forelse($latestNotifications as $notif)
              <a href="{{ $notif->action_url ?? '#' }}" class="flex items-start gap-4 p-4 hover:bg-stone-50 border-b border-stone-50 transition-colors {{ !$notif->read ? 'bg-primary/5' : '' }}">
                <div class="w-8 h-8 rounded-full flex-shrink-0 flex items-center justify-center 
                  {{ $notif->type == 'success' ? 'bg-green-100 text-green-600' : 'bg-primary text-stone-900' }}">
                  <span class="material-symbols-outlined text-sm">{{ $notif->icon ?? 'info' }}</span>
                </div>
                <div>
                  <p class="text-[11px] font-black text-stone-900 uppercase leading-tight">{{ $notif->title }}</p>
                  <p class="text-[10px] text-stone-500 mt-1 line-clamp-2">{{ $notif->message }}</p>
                  <p class="text-[8px] text-stone-400 mt-2 font-bold uppercase">{{ $notif->created_at->diffForHumans() }}</p>
                </div>
              </a>
            @empty
              <div class="p-10 text-center">
                <span class="material-symbols-outlined text-stone-200 text-4xl">notifications_off</span>
                <p class="text-[10px] text-stone-400 mt-2 font-bold uppercase tracking-widest">Sin notificaciones</p>
              </div>
            @endforelse
          </div>
          <div class="p-3 bg-stone-50 text-center">
            <a href="{{ route('erp.inventario.auditoria') }}" class="text-[9px] font-black text-stone-400 hover:text-stone-900 uppercase tracking-widest transition-colors">Ver todo el historial</a>
          </div>
        </div>
      </div>

      <!-- Perfil con Dropdown -->
      @auth
      <div id="tour-profile" class="relative" x-data="{ open: false }">
        <button @click="open = !open" class="flex items-center gap-3 ml-2 pl-4 border-l border-stone-200 hover:bg-stone-50 rounded-lg px-3 py-2 transition-all">
          <div class="text-right hidden md:block">
            <p class="text-sm font-bold text-stone-900 leading-none">{{ Auth::user()->name }}</p>
            <p class="text-[10px] text-stone-500">{{ Auth::user()->email }}</p>
          </div>
          <div class="w-9 h-9 bg-stone-900 rounded-full flex items-center justify-center text-primary font-bold text-sm">
            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
          </div>
          <span class="material-symbols-outlined text-stone-400 text-lg" :class="{ 'rotate-180': open }">expand_more</span>
        </button>

        <!-- Dropdown Menu -->
        <div x-show="open" @click.away="open = false"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 scale-95 -translate-y-2"
             x-transition:enter-end="opacity-100 scale-100 translate-y-0"
             class="absolute right-0 top-full mt-2 w-64 bg-white border border-stone-200 rounded-xl shadow-2xl z-50 overflow-hidden" style="display: none;">
          
          <!-- User Info -->
          <div class="p-4 border-b border-stone-100 bg-stone-50/50">
            <div class="flex items-center gap-3">
              <div class="w-10 h-10 bg-stone-900 rounded-full flex items-center justify-center text-primary font-bold text-sm">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
              </div>
              <div>
                <p class="text-xs font-black text-stone-900 uppercase leading-tight">{{ Auth::user()->name }}</p>
                <p class="text-[10px] text-stone-500">{{ Auth::user()->email }}</p>
              </div>
            </div>
          </div>

          <!-- Menu Items -->
          <div class="py-2">
            <a href="{{ url('/erp/dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-xs font-bold text-stone-700 hover:bg-stone-50 transition-colors uppercase">
              <span class="material-symbols-outlined text-lg">dashboard</span>
              Dashboard
            </a>
            <a href="{{ url('/erp/perfil') }}" class="flex items-center gap-3 px-4 py-3 text-xs font-bold text-stone-700 hover:bg-stone-50 transition-colors uppercase">
              <span class="material-symbols-outlined text-lg">person</span>
              Mi Perfil
            </a>
            <a href="{{ url('/erp/configuracion') }}" class="flex items-center gap-3 px-4 py-3 text-xs font-bold text-stone-700 hover:bg-stone-50 transition-colors uppercase">
              <span class="material-symbols-outlined text-lg">settings</span>
              Configuración
            </a>
          </div>

          <!-- Divider & Logout -->
          <div class="border-t border-stone-100 py-2">
            <form method="POST" action="{{ url('/auth/logout') }}">
              @csrf
              <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 text-xs font-bold text-red-600 hover:bg-red-50 transition-colors uppercase">
                <span class="material-symbols-outlined text-lg">logout</span>
                Cerrar Sesión
              </button>
            </form>
          </div>
        </div>
      </div>
      @else
      <div class="flex items-center gap-3 ml-2 pl-4 border-l border-stone-200">
        <a href="{{ url('/auth/login') }}" class="px-4 py-2 bg-stone-900 text-white text-xs font-bold rounded-lg hover:bg-stone-800 transition-all uppercase">
          Iniciar Sesión
        </a>
      </div>
      @endauth

    </div>
  </div>
</header>
