<div x-data="{ 
        isOpen: false, 
        search: '',
        items: [
            { name: 'Dashboard Central', url: '/erp/dashboard', icon: 'dashboard', category: 'General' },
            { name: 'Ventas y POS', url: '/erp/ventas', icon: 'payments', category: 'Comercial' },
            { name: 'Inventario de Repuestos', url: '/erp/inventario', icon: 'inventory_2', category: 'Logística' },
            { name: 'Cierre Contable', url: '/erp/contabilidad/cierre', icon: 'lock', category: 'Finanzas' },
            { name: 'Gestión de RRHH', url: '/erp/rrhh', icon: 'groups', category: 'Personal' },
            { name: 'Configuración Sistema', url: '/erp/configuracion', icon: 'settings', category: 'Sistemas' }
        ],
        get filteredItems() {
            if (this.search === '') return this.items;
            return this.items.filter(i => i.name.toLowerCase().includes(this.search.toLowerCase()) || i.category.toLowerCase().includes(this.search.toLowerCase()));
        }
    }" 
    @keydown.window.cmd.k.prevent="isOpen = true"
    @keydown.window.ctrl.k.prevent="isOpen = true"
    @keydown.escape="isOpen = false"
    class="relative z-[100]"
>
    <!-- Modal Backdrop -->
    <div x-show="isOpen" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-stone-900/40 backdrop-blur-md"
         @click="isOpen = false"
    ></div>

    <!-- Navigator Content -->
    <div x-show="isOpen"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95"
         class="fixed inset-0 flex items-start justify-center pt-24 px-4 sm:px-6 pointer-events-none"
    >
        <div class="bg-white w-full max-w-xl rounded-2xl shadow-2xl overflow-hidden border border-stone-200 pointer-events-auto">
            <!-- Search Bar -->
            <div class="relative border-b border-stone-100">
                <span class="absolute inset-y-0 left-0 pl-5 flex items-center text-stone-400">
                    <span class="material-symbols-outlined">search</span>
                </span>
                <input x-model="search"
                       x-ref="searchInput"
                       @keydown.arrow-down="$focus.wrap().next()"
                       @keydown.arrow-up="$focus.wrap().previous()"
                       type="text" 
                       class="w-full pl-14 pr-4 py-5 text-lg font-headline font-bold text-stone-900 border-none focus:ring-0 placeholder:text-stone-300"
                       placeholder="¿A qué módulo deseas saltar?..."
                       autofocus
                />
                <div class="absolute right-4 top-1/2 -translate-y-1/2 flex items-center gap-1">
                    <span class="px-1.5 py-0.5 bg-stone-100 border border-stone-200 rounded text-[9px] font-black text-stone-500">ESC</span>
                </div>
            </div>

            <!-- Results -->
            <div class="max-h-[400px] overflow-y-auto p-2 space-y-1">
                <template x-for="item in filteredItems" :key="item.name">
                    <a :href="item.url" 
                       class="flex items-center justify-between p-3 rounded-xl hover:bg-primary/10 group transition-all"
                    >
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 bg-stone-50 rounded-lg flex items-center justify-center text-stone-400 group-hover:bg-primary group-hover:text-stone-900 transition-colors">
                                <span class="material-symbols-outlined" x-text="item.icon"></span>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-stone-900" x-text="item.name"></p>
                                <p class="text-[10px] font-black text-stone-400 uppercase tracking-widest" x-text="item.category"></p>
                            </div>
                        </div>
                        <span class="material-symbols-outlined text-stone-300 group-hover:text-stone-900 transition-colors">chevron_right</span>
                    </a>
                </template>

                <!-- Empty State -->
                <div x-show="filteredItems.length === 0" class="p-8 text-center">
                    <span class="material-symbols-outlined text-4xl text-stone-200 mb-2">search_off</span>
                    <p class="text-sm font-bold text-stone-400">No encontramos coincidencias para "<span x-text="search" class="text-stone-600"></span>"</p>
                </div>
            </div>

            <!-- Footer -->
            <div class="bg-stone-50 px-5 py-3 border-t border-stone-100 flex justify-between items-center">
                <p class="text-[10px] font-bold text-stone-400 uppercase tracking-[0.1em]">Atajos: ↑↓ Navegar • Enter Seleccionar</p>
                <div class="flex items-center gap-2">
                    <p class="text-[9px] font-black text-stone-300">ZENITH v6.0 AI CORE</p>
                </div>
            </div>
        </div>
    </div>
</div>
