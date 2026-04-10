/**
 * ZENITH ERP - Layout Engine v2.0
 * Inyecta dinámicamente el Sidebar y Header en todas las páginas para asegurar coherencia total.
 * Mayor de Repuesto La Cima, C.A.
 */

const ZENITH_LAYOUT = {
    renderSidebar: function() {
        const sidebarHTML = `
            <aside id="sidebar" class="h-screen w-72 fixed left-0 top-0 z-50 flex flex-col bg-white border-r border-stone-200 sidebar">
                <div class="flex flex-col px-5 pt-6 pb-4">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-10 h-10 bg-stone-900 flex items-center justify-center rounded-lg shadow-lg">
                            <span class="material-symbols-outlined text-primary">precision_manufacturing</span>
                        </div>
                        <div>
                            <h2 class="font-headline font-bold text-lg text-stone-900 leading-none entity-name">${window.ZENITH_IDENTITY?.ENTITY_NAME || 'Mayor de Repuesto La Cima, C.A.'}</h2>
                            <span class="text-[10px] font-mono text-stone-400">v${window.ZENITH_IDENTITY?.VERSION || '2.5.0'}</span>
                        </div>
                    </div>
                    <p class="text-[10px] font-bold text-stone-400 tracking-wider uppercase">Sistemas Integrados Zenith</p>
                </div>

                <div class="px-4 mb-4">
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-stone-400">
                            <span class="material-symbols-outlined text-lg">search</span>
                        </span>
                        <input class="bg-stone-100 border-none text-sm pl-10 pr-3 py-2 w-full rounded-lg focus:ring-2 focus:ring-primary/50 focus:bg-white transition-all shadow-inner" placeholder="Buscar módulo..." type="text"/>
                    </div>
                </div>

                <nav class="flex-1 px-3 space-y-0.5 pb-24 overflow-y-auto no-scrollbar">
                    <a href="inicio.html" class="menu-item flex items-center gap-3 px-4 py-2 transition-colors nav-link" data-page="inicio">
                        <span class="material-symbols-outlined text-[20px]">dashboard</span>
                        <span class="flex-1 text-sm font-medium">Dashboard Central</span>
                        <span class="material-symbols-outlined dropdown-arrow text-[18px]">chevron_right</span>
                    </a>

                    <!-- SECCIÓN: COMERCIAL -->
                    <div class="menu-parent pt-2">
                        <p class="px-4 py-1 text-[9px] font-black text-stone-400 uppercase tracking-widest">Área Comercial</p>
                        <div class="menu-item menu-item-inactive" onclick="toggleDropdown(this)">
                            <span class="material-symbols-outlined text-[20px]">payments</span>
                            <span class="text-sm">Ventas & POS</span>
                            <span class="material-symbols-outlined dropdown-arrow">chevron_right</span>
                        </div>
                        <div class="submenu">
                            <a href="ventas.html"><span class="material-symbols-outlined">analytics</span> Monitor Ventas</a>
                            <a href="pos.html"><span class="material-symbols-outlined">point_of_sale</span> Terminal POS</a>
                            <a href="registro-ventas.html"><span class="material-symbols-outlined">list_alt</span> Diario de Ventas</a>
                            <a href="factura-electronica.html"><span class="material-symbols-outlined">receipt</span> Fact. Electrónica</a>
                            <a href="facturas-emitidas.html"><span class="material-symbols-outlined">history</span> Historial Facturas</a>
                            <a href="clientes.html"><span class="material-symbols-outlined">person</span> Clientes B2B</a>
                            <a href="vendedores.html"><span class="material-symbols-outlined">badge</span> Fuerza de Ventas</a>
                        </div>
                    </div>

                    <!-- SECCIÓN: LOGÍSTICA -->
                    <div class="menu-parent">
                        <div class="menu-item menu-item-inactive" onclick="toggleDropdown(this)">
                            <span class="material-symbols-outlined text-[20px]">inventory_2</span>
                            <span class="text-sm">Logística & Almacén</span>
                            <span class="material-symbols-outlined dropdown-arrow">chevron_right</span>
                        </div>
                        <div class="submenu">
                            <a href="inventario.html"><span class="material-symbols-outlined">inventory</span> Control Stock</a>
                            <a href="productos.html"><span class="material-symbols-outlined">category</span> Catálogo Items</a>
                            <a href="kardex.html"><span class="material-symbols-outlined">list</span> Kardex Movimientos</a>
                            <a href="ajustes-inventario.html"><span class="material-symbols-outlined">edit_note</span> Ajustes Stock</a>
                            <a href="auditoria-inventario.html"><span class="material-symbols-outlined">fact_check</span> Auditoría Física</a>
                            <a href="reportes-inventario.html"><span class="material-symbols-outlined">assessment</span> Reportes Logística</a>
                        </div>
                    </div>

                    <!-- SECCIÓN: COMPRAS -->
                    <div class="menu-parent">
                        <div class="menu-item menu-item-inactive" onclick="toggleDropdown(this)">
                            <span class="material-symbols-outlined text-[20px]">shopping_cart</span>
                            <span class="text-sm">Adquisiciones</span>
                            <span class="material-symbols-outlined dropdown-arrow">chevron_right</span>
                        </div>
                        <div class="submenu">
                            <a href="compras.html"><span class="material-symbols-outlined">shopping_basket</span> Monitor Compras</a>
                            <a href="proveedores.html"><span class="material-symbols-outlined">local_shipping</span> Proveedores</a>
                            <a href="factura-compra.html"><span class="material-symbols-outlined">receipt_long</span> Facturas Compra</a>
                            <a href="historial-compras.html"><span class="material-symbols-outlined">history_edu</span> Historial</a>
                            <a href="reportes-compras.html"><span class="material-symbols-outlined">analytics</span> Análisis Compras</a>
                        </div>
                    </div>

                    <!-- SECCIÓN: CONTABILIDAD -->
                    <div class="menu-parent pt-2 border-t border-stone-100">
                        <p class="px-4 py-1 text-[9px] font-black text-stone-400 uppercase tracking-widest">Finanzas & Leyes</p>
                        <div class="menu-item menu-item-inactive" onclick="toggleDropdown(this)">
                            <span class="material-symbols-outlined text-[20px]">account_balance</span>
                            <span class="text-sm">Administración</span>
                            <span class="material-symbols-outlined dropdown-arrow">chevron_right</span>
                        </div>
                        <div class="submenu">
                            <a href="contabilidad.html"><span class="material-symbols-outlined">table_chart</span> Resumen Contable</a>
                            <a href="plan-cuentas.html"><span class="material-symbols-outlined">account_tree</span> Plan de Cuentas</a>
                            <a href="balance-general.html"><span class="material-symbols-outlined">balance</span> Balance General</a>
                            <a href="estado-resultados.html"><span class="material-symbols-outlined">monitoring</span> Resultados</a>
                            <a href="libro-diario.html"><span class="material-symbols-outlined">menu_book</span> Libro Diario</a>
                            <a href="cierre-contable.html"><span class="material-symbols-outlined">lock</span> Cierre Periodo</a>
                        </div>
                    </div>

                    <!-- SECCIÓN: FISCAL -->
                    <div class="menu-parent">
                        <div class="menu-item menu-item-inactive" onclick="toggleDropdown(this)">
                            <span class="material-symbols-outlined text-[20px]">gavel</span>
                            <span class="text-sm">Libros & Fiscal</span>
                            <span class="material-symbols-outlined dropdown-arrow">chevron_right</span>
                        </div>
                        <div class="submenu">
                            <a href="libros-legales.html"><span class="material-symbols-outlined">library_books</span> Libros Legales</a>
                            <a href="libro-ventas.html"><span class="material-symbols-outlined">list</span> Libro de Ventas</a>
                            <a href="libro-compras.html"><span class="material-symbols-outlined">list</span> Libro de Compras</a>
                            <a href="declaracion-iva.html"><span class="material-symbols-outlined">account_balance_wallet</span> IVA / Fiscal</a>
                            <a href="config-fiscal.html"><span class="material-symbols-outlined">settings_applications</span> Config Fiscal</a>
                        </div>
                    </div>

                    <!-- SECCIÓN: RRHH -->
                    <div class="menu-parent pt-2 border-t border-stone-100">
                        <p class="px-4 py-1 text-[9px] font-black text-stone-400 uppercase tracking-widest">Capital Humano</p>
                        <div class="menu-item menu-item-inactive" onclick="toggleDropdown(this)">
                            <span class="material-symbols-outlined text-[20px]">groups</span>
                            <span class="text-sm">RRHH & Nómina</span>
                            <span class="material-symbols-outlined dropdown-arrow">chevron_right</span>
                        </div>
                        <div class="submenu">
                            <a href="rrhh.html"><span class="material-symbols-outlined">group</span> Gestión Humana</a>
                            <a href="empleados.html"><span class="material-symbols-outlined">person_add</span> Ficha Empleado</a>
                            <a href="nomina.html"><span class="material-symbols-outlined">payments</span> Cálculo Nómina</a>
                            <a href="prestaciones.html"><span class="material-symbols-outlined">savings</span> Prestaciones</a>
                            <a href="portal-empleado.html"><span class="material-symbols-outlined">account_box</span> Portal</a>
                        </div>
                    </div>

                    <!-- SECCIÓN: SISTEMA -->
                    <div class="menu-parent pt-2 border-t border-stone-100">
                        <p class="px-4 py-1 text-[9px] font-black text-stone-400 uppercase tracking-widest">Configuración & IT</p>
                        <div class="menu-item menu-item-inactive" onclick="toggleDropdown(this)">
                            <span class="material-symbols-outlined text-[20px]">settings_suggest</span>
                            <span class="text-sm">Arquitectura</span>
                            <span class="material-symbols-outlined dropdown-arrow">chevron_right</span>
                        </div>
                        <div class="submenu">
                            <a href="configuracion.html"><span class="material-symbols-outlined">settings</span> Gral. Sistema</a>
                            <a href="usuarios-roles.html"><span class="material-symbols-outlined">admin_panel_settings</span> Roles & Accesos</a>
                            <a href="base-datos.html"><span class="material-symbols-outlined">database</span> Base de Datos</a>
                            <a href="backups.html"><span class="material-symbols-outlined">backup</span> Resguardos/Backups</a>
                            <a href="auditoria-seguridad.html"><span class="material-symbols-outlined">assignment_ind</span> Log Accesos</a>
                            <a href="estado-sistema.html"><span class="material-symbols-outlined">cloud_circle</span> Monitor Servidor</a>
                        </div>
                    </div>

                    <!-- SECCIÓN: SOPORTE -->
                    <div class="menu-parent mb-8">
                        <div class="menu-item menu-item-inactive" onclick="toggleDropdown(this)">
                            <span class="material-symbols-outlined text-[20px]">help</span>
                            <span class="text-sm">Ayuda & Soporte</span>
                            <span class="material-symbols-outlined dropdown-arrow">chevron_right</span>
                        </div>
                        <div class="submenu">
                            <a href="ayuda.html"><span class="material-symbols-outlined">help_center</span> FAQ</a>
                            <a href="base-conocimiento.html"><span class="material-symbols-outlined">library_books</span> Knowledge</a>
                            <a href="tickets-soporte.html"><span class="material-symbols-outlined">support</span> Tickets</a>
                            <a href="chat-asistencia.html"><span class="material-symbols-outlined">chat</span> Chat Directo</a>
                        </div>
                    </div>
                </nav>

                <div class="mt-auto border-t border-stone-200 p-4 bg-stone-50/50">
                    <button onclick="logout()" class="w-full bg-red-50 text-red-600 font-bold py-2.5 px-4 flex items-center justify-center gap-2 hover:bg-red-100 transition-all rounded-xl text-xs uppercase tracking-widest border border-red-100 shadow-sm active:scale-95">
                        <span class="material-symbols-outlined text-[18px]">logout</span>
                        Cerrar Sesión
                    </button>
                </div>
            </aside>
        `;
        document.body.insertAdjacentHTML('afterbegin', sidebarHTML);
    },

    renderHeader: function() {
        const headerHTML = `
            <header class="fixed top-0 left-72 right-0 bg-white/80 backdrop-blur-xl z-40 border-b border-stone-200">
                <div class="flex justify-between items-center px-6 py-3">
                    <div class="flex items-center gap-4">
                        <button id="menuToggle" class="lg:hidden p-2 text-stone-500 hover:bg-stone-100 rounded-lg">
                            <span class="material-symbols-outlined">menu</span>
                        </button>
                        <div class="hidden md:flex items-center gap-2 text-[10px] font-black text-stone-400 uppercase tracking-[0.1em]">
                            <a href="inicio.html" class="hover:text-stone-900 transition-colors">ZENITH CORE</a>
                            <span class="material-symbols-outlined text-[14px]">chevron_right</span>
                            <span class="text-stone-900" id="breadcrumbPage">${document.title.split('|')[0] || 'Dashboard'}</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="hidden lg:block relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-stone-400">
                                <span class="material-symbols-outlined text-lg">search</span>
                            </span>
                            <input class="bg-stone-100 border-none text-sm pl-10 pr-3 py-1.5 w-64 rounded-lg focus:ring-2 focus:ring-primary/50 focus:bg-white transition-all shadow-inner" placeholder="Búsqueda rápida..." type="text"/>
                        </div>
                        <button class="p-2 text-stone-500 hover:bg-stone-100 rounded-lg relative transition-colors">
                            <span class="material-symbols-outlined">notifications</span>
                            <span class="absolute top-2.5 right-2.5 w-2 h-2 bg-red-500 rounded-full border-2 border-white"></span>
                        </button>
                        <div class="flex items-center gap-3 ml-2 pl-4 border-l border-stone-200">
                            <div class="text-right hidden md:block">
                                <p class="text-xs font-black text-stone-900 leading-none">Admin Zenith</p>
                                <p class="text-[9px] font-bold text-stone-400 tracking-wider">MODO: ADMINISTRADOR</p>
                            </div>
                            <div class="w-9 h-9 bg-stone-900 rounded-xl flex items-center justify-center text-primary font-black text-xs shadow-lg">ZC</div>
                        </div>
                    </div>
                </div>
            </header>
        `;
        document.body.insertAdjacentHTML('afterbegin', headerHTML);
    },

    highlightActive: function() {
        const path = window.location.pathname.split('/').pop() || 'inicio.html';
        const links = document.querySelectorAll('.nav-link, .submenu a');
        
        links.forEach(link => {
            const href = link.getAttribute('href');
            if (path === href) {
                if (link.classList.contains('nav-link')) {
                    link.classList.add('menu-item-active');
                    const arrow = link.querySelector('.dropdown-arrow');
                    if (arrow) arrow.style.display = 'none'; // No arrow for direct dashboard link if active
                } else {
                    link.classList.add('bg-stone-100', 'text-stone-900', 'font-bold');
                    const parent = link.closest('.menu-parent');
                    if (parent) {
                        parent.classList.add('open');
                        const item = parent.querySelector('.menu-item');
                        if (item) item.classList.add('menu-item-active');
                    }
                }
            }
        });
    },

    init: function() {
        if (window.location.pathname.includes('/auth/')) return;
        this.renderSidebar();
        this.renderHeader();
        this.highlightActive();
    }
};

function toggleDropdown(element) {
    const parent = element.closest('.menu-parent');
    if (!parent) return;
    
    // Cerrar otros menús si se desea (opcional, Photo 1 sugiere que pueden estar abiertos)
    // document.querySelectorAll('.menu-parent.open').forEach(p => {
    //     if (p !== parent) p.classList.remove('open');
    // });

    parent.classList.toggle('open');
}

function logout() {
    localStorage.removeItem('erp_session');
    window.location.href = '../auth/login.html';
}

window.addEventListener('DOMContentLoaded', () => ZENITH_LAYOUT.init());
