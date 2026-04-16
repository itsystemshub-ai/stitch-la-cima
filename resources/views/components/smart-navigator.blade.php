    <div x-data="{ 
        isOpen: false, 
        search: '',
        modules: [
            { name: 'Dashboard Central', url: '/erp/dashboard', icon: 'dashboard', category: 'General' },
            { name: 'Ventas y POS', url: '/erp/ventas', icon: 'payments', category: 'Comercial' },
            { name: 'Inventario de Repuestos', url: '/erp/inventario', icon: 'inventory_2', category: 'Logística' },
            { name: 'Cierre Contable', url: '/erp/contabilidad/cierre', icon: 'lock', category: 'Finanzas' },
            { name: 'Gestión de RRHH', url: '/erp/rrhh', icon: 'groups', category: 'Personal' }
        ],
        products: [],
        isLoading: false,
        get filteredModules() {
            if (this.search === '') return this.modules;
            return this.modules.filter(m => m.name.toLowerCase().includes(this.search.toLowerCase()));
        },
        async searchProducts() {
            if (this.search.length < 2) {
                this.products = [];
                return;
            }
            this.isLoading = true;
            try {
                const res = await fetch(`/erp/inventario/api/search?q=${encodeURIComponent(this.search)}`);
                this.products = await res.json();
            } catch (e) { console.error(e); }
            this.isLoading = false;
        }
    }" 
    x-init="$watch('search', () => searchProducts())"
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
         class="fixed inset-0 bg-stone-900/60 backdrop-blur-xl"
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
        <div class="bg-white/95 backdrop-blur-md w-full max-w-2xl rounded-2xl shadow-2xl overflow-hidden border border-white/20 pointer-events-auto">
            <!-- Search Bar -->
            <div class="relative border-b border-stone-100">
                <span class="absolute inset-y-0 left-0 pl-6 flex items-center text-primary">
                    <span class="material-symbols-outlined font-black" x-show="!isLoading">search</span>
                    <span class="material-symbols-outlined animate-spin" x-show="isLoading">sync</span>
                </span>
                <input x-model="search"
                       x-ref="searchInput"
                       type="text" 
                       class="w-full pl-16 pr-4 py-6 text-xl font-headline font-black text-stone-900 border-none focus:ring-0 placeholder:text-stone-300 bg-transparent"
                       placeholder="Busca módulos o repuestos (IA Enabled)..."
                       autofocus
                />
            </div>

            <!-- Results -->
            <div class="max-h-[500px] overflow-y-auto p-4 space-y-6">
                
                <!-- Modules Section -->
                <div x-show="filteredModules.length > 0">
                    <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.2em] mb-3 px-2">Sugerencias de Navegación</p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                        <template x-for="item in filteredModules" :key="item.name">
                            <a :href="item.url" class="flex items-center gap-4 p-3 rounded-xl hover:bg-stone-900 hover:text-white group transition-all border border-stone-50 hover:border-stone-900">
                                <div class="w-10 h-10 bg-primary/10 rounded-lg flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-stone-900 transition-colors">
                                    <span class="material-symbols-outlined" x-text="item.icon"></span>
                                </div>
                                <span class="text-xs font-black uppercase tracking-tight" x-text="item.name"></span>
                            </a>
                        </template>
                    </div>
                </div>

                <!-- AI Product Results -->
                <div x-show="products.length > 0">
                    <p class="text-[10px] font-black text-primary uppercase tracking-[0.2em] mb-3 px-2">Resultados de Inventario (IA Match)</p>
                    <div class="space-y-px">
                        <template x-for="p in products" :key="p.id">
                            <a :href="'/erp/inventario/productos?search=' + p.codigo_oem" class="flex items-center justify-between p-4 rounded-xl hover:bg-stone-50 group transition-all">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 bg-stone-100 rounded-lg flex flex-col items-center justify-center">
                                        <p class="text-[8px] font-black text-stone-400 tracking-tighter uppercase" x-text="p.marca"></p>
                                        <span class="material-symbols-outlined text-stone-900">settings_applications</span>
                                    </div>
                                    <div>
                                        <p class="text-sm font-black text-stone-900 uppercase leading-none mb-1" x-text="p.nombre"></p>
                                        <p class="text-[10px] font-bold text-stone-400 uppercase tracking-widest">
                                            OEM: <span class="text-stone-600" x-text="p.codigo_oem"></span> • 
                                            Stock: <template x-if="p.stock_actual > 0"><span class="text-green-600 font-black" x-text="p.stock_actual"></span></template>
                                            <template x-if="p.stock_actual <= 0"><span class="text-red-500 font-black">AGOTADO</span></template>
                                        </p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm font-black text-stone-900" x-text="'$' + parseFloat(p.precio_mayor).toFixed(2)"></p>
                                    <span class="text-[8px] font-black text-stone-300 uppercase tracking-tighter">Precio Mayor</span>
                                </div>
                            </a>
                        </template>
                    </div>
                </div>

                <!-- Empty State -->
                <div x-show="filteredModules.length === 0 && products.length === 0 && search.length > 1" class="py-12 text-center">
                    <span class="material-symbols-outlined text-5xl text-stone-100 mb-4 animate-bounce">satellite_alt</span>
                    <p class="text-sm font-black text-stone-400 uppercase tracking-widest">No hay señales de "<span x-text="search" class="text-stone-900"></span>" en la base de datos</p>
                </div>
            </div>

            <!-- Footer -->
            <div class="bg-stone-900 px-6 py-4 flex justify-between items-center">
                <div class="flex items-center gap-4">
                    <p class="text-[9px] font-black text-stone-500 uppercase tracking-[0.2em] flex items-center gap-2">
                        <span class="w-1.5 h-1.5 bg-primary rounded-full animate-pulse"></span>
                        ZENITH AI v6.0 CORE ACTIVE
                    </p>
                </div>
                <div class="flex items-center gap-3">
                    <span class="px-2 py-1 bg-white/5 rounded text-[8px] font-black text-stone-400 uppercase">↑↓ Navegar</span>
                    <span class="px-2 py-1 bg-white/5 rounded text-[8px] font-black text-stone-400 uppercase">ESC Cerrar</span>
                </div>
            </div>
        </div>
    </div>
</div>
