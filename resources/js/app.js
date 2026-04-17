import Alpine from 'alpinejs';
import { GridStack } from 'gridstack';
import 'gridstack/dist/gridstack.min.css';
import { driver } from "driver.js";
import "driver.js/dist/driver.css";

window.Alpine = Alpine;
window.GridStack = GridStack;
window.driver = driver;

Alpine.start();

// ========== ZENITH NOTIFICATION ENGINE ==========
window.notify = function(message, type = 'success') {
    const toastContainer = document.getElementById('toast-container');
    if (!toastContainer) return;

    const toast = document.createElement('div');
    const colors = {
        success: 'bg-green-50 text-green-700 border-green-200',
        error: 'bg-red-50 text-red-700 border-red-200',
        info: 'bg-blue-50 text-blue-700 border-blue-200',
        warning: 'bg-orange-50 text-orange-700 border-orange-200'
    };

    toast.className = `flex items-center gap-3 px-4 py-3 rounded-xl border shadow-lg transform translate-y-10 opacity-0 transition-all duration-300 ${colors[type]}`;
    toast.innerHTML = `
        <span class="material-symbols-outlined text-lg">${type === 'success' ? 'check_circle' : 'info'}</span>
        <p class="text-xs font-bold uppercase tracking-wide">${message}</p>
    `;

    toastContainer.appendChild(toast);
    
    // Animate In
    setTimeout(() => {
        toast.classList.remove('translate-y-10', 'opacity-0');
    }, 10);

    // Remove
    setTimeout(() => {
        toast.classList.add('translate-y-10', 'opacity-0');
        setTimeout(() => toast.remove(), 300);
    }, 4000);
};

// ========== ZENITH CORE UI LOGIC ==========

document.addEventListener('DOMContentLoaded', () => {
    // 1. Sidebar & Mobile Menu Toggle
    const menuToggle = document.getElementById('menuToggle');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebarOverlay');

    if (menuToggle && sidebar) {
        menuToggle.addEventListener('click', () => {
            sidebar.classList.toggle('open');
            if (overlay) overlay.classList.toggle('hidden');
        });
    }

    // 2. Dropdown Navigation (Sidebar / Menus)
    window.toggleDropdown = function(element) {
        const parent = element.closest('.menu-parent');
        if (!parent) return;
        
        document.querySelectorAll('.menu-parent.open').forEach(p => {
            if (p !== parent) p.classList.remove('open');
        });

        parent.classList.toggle('open');
    };

    // 3. ApexCharts Initialization
    const chartContainer = document.querySelector('#salesTrendChart');
    if (chartContainer) {
        const options = {
            series: [{
                name: 'Ingresos',
                data: [31, 40, 28, 51, 42, 109, 100]
            }],
            chart: {
                height: 250,
                type: 'area',
                toolbar: { show: false },
                fontFamily: 'Inter, sans-serif'
            },
            colors: ['#ceff5e'],
            fill: {
                type: 'gradient',
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.7,
                    opacityTo: 0.2,
                    stops: [0, 90, 100]
                }
            },
            dataLabels: { enabled: false },
            stroke: { curve: 'smooth', width: 3 },
            xaxis: {
                categories: ["Lun", "Mar", "Mie", "Jue", "Vie", "Sab", "Dom"],
                labels: { style: { colors: '#94a3b8', fontWeight: 600 } }
            },
            yaxis: { show: false },
            grid: { borderColor: '#f1f5f9', strokeDashArray: 4 },
            tooltip: { theme: 'dark' }
        };

        const chart = new ApexCharts(chartContainer, options);
        chart.render();
    }

    // 4. GridStack Initialization
    if(document.querySelector('.grid-stack')) {
        GridStack.init({
            disableOneColumnMode: true,
            float: true,
            animate: true
        });
    }

    // 5. Smart Navigator Focus
    window.addEventListener('keydown', (e) => {
        if ((e.metaKey || e.ctrlKey) && e.key === 'k') {
            setTimeout(() => {
                const searchInput = document.querySelector('[x-ref="searchInput"]');
                if (searchInput) {
                    searchInput.focus();
                }
            }, 100);
        }
    });

    // 6. Quick Tour Logic (Driver.js)
    window.startErpTour = function() {
        const d = window.driver({
            showProgress: true,
            allowClose: true,
            overlayColor: '#000',
            overlayOpacity: 0.85,
            stagePadding: 4,
            nextBtnText: 'Siguiente',
            prevBtnText: 'Anterior',
            doneBtnText: 'Finalizar',
            steps: [
                { 
                    element: '#tour-brand', 
                    popover: { 
                        title: 'Portal La Cima', 
                        description: 'Bienvenido a tu centro de mando corporativo. Aquí gestionamos inventario, ventas y finanzas.', 
                        position: 'right' 
                    } 
                },
                { 
                    element: '#tour-sidebar-search', 
                    popover: { 
                        title: 'Búsqueda de Módulos', 
                        description: 'Encuentra rápidamente cualquier herramienta o página del ERP.', 
                        position: 'right' 
                    } 
                },
                { 
                    element: '#tour-nav', 
                    popover: { 
                        title: 'Navegación Modular', 
                        description: 'Accede a los departamentos de Ventas, Inventario, Contabilidad y más.', 
                        position: 'right' 
                    } 
                },
                { 
                    element: '#tour-header-search', 
                    popover: { 
                        title: 'Búsqueda Global', 
                        description: 'Busca productos, facturas o clientes sin importar en qué página estés.', 
                        position: 'bottom' 
                    } 
                },
                { 
                    element: '#tour-notifications', 
                    popover: { 
                        title: 'Notificaciones', 
                        description: 'Mantente al tanto de alertas de stock, pedidos nuevos y aprobaciones pendientes.', 
                        position: 'bottom' 
                    } 
                },
                { 
                    element: '#tour-profile', 
                    popover: { 
                        title: 'Tu Cuenta', 
                        description: 'Gestiona tu perfil, configuración del sistema y cierra sesión de forma segura.', 
                        position: 'bottom' 
                    } 
                }
            ]
        });

        // Pasos dinámicos adicionales por módulo
        const contextSteps = [
            { 
                id: '#tour-dashboard', 
                title: 'Tablero de Control', 
                description: 'Un vistazo rápido al estado de tu empresa en tiempo real.' 
            },
            { 
                id: '#tour-inventory-stats', 
                title: 'Métricas de Inventario', 
                description: 'Controla la valoración, rotación y niveles críticos de stock.' 
            },
            { 
                id: '#tour-inventory-actions', 
                title: 'Gestión de Productos', 
                description: 'Acceso rápido al maestro de artículos, ajustes y auditoría.' 
            },
            { 
                id: '#tour-sales-stats', 
                title: 'Rendimiento Comercial', 
                description: 'Monitorea ingresos, ticket promedio y facturación del mes.' 
            },
            { 
                id: '#tour-sales-actions', 
                title: 'Terminal de Ventas', 
                description: 'Inicia nuevas ventas rápidamente o genera reportes de forecast.' 
            },
            { 
                id: '#tour-purchase-stats', 
                title: 'Métricas de Compra', 
                description: 'Verifica el gasto mensual y las cuentas por pagar pendientes.' 
            },
            { 
                id: '#tour-purchase-actions', 
                title: 'Gestión de Suministros', 
                description: 'Registra recepciones y gestiona tu cartera de proveedores.' 
            },
            { 
                id: '#tour-accounting-stats', 
                title: 'Indicadores Financieros', 
                description: 'KPIs de utilidad, ingresos y gastos según el plan contable.' 
            },
            { 
                id: '#tour-accounting-actions', 
                title: 'Cierre y Libros', 
                description: 'Gestiona el Plan de Cuentas, Libros Legales y Balances.' 
            },
            { 
                id: '#tour-hr-stats', 
                title: 'Capital Humano', 
                description: 'Indicadores de asistencia, vacaciones y nómina consolidada.' 
            },
            { 
                id: '#tour-hr-actions', 
                title: 'Gestión de Personal', 
                description: 'Control de expedientes de empleados y procesamiento de nómina.' 
            },
            // Pasos de Subpáginas Críticas
            { 
                id: '#tour-product-filters', 
                title: 'Filtros Técnicos', 
                description: 'Segmenta el inventario por categoría o marca para una localización rápida.' 
            },
            { 
                id: '#tour-product-search', 
                title: 'Buscador de Activos', 
                description: 'Localización instantánea de repuestos por SKU, nombre o marca.' 
            },
            { 
                id: '#tour-product-table', 
                title: 'Maestro de Datos', 
                description: 'Visualiza precios, stock y estatus de criticidad en tiempo real.' 
            },
            { 
                id: '#tour-pos-scanner', 
                title: 'Escaneo de Repuestos', 
                description: 'Utiliza el lector de barras o busca por nombre para cargar el carrito.' 
            },
            { 
                id: '#tour-pos-cart', 
                title: 'Transacción Activa', 
                description: 'Verifica los componentes cargados, ajusta cantidades o anula items.' 
            },
            { 
                id: '#tour-pos-total', 
                title: 'Resumen de Pago', 
                description: 'Visualiza el total neto e impuestos antes de seleccionar el método de liquidación.' 
            },
            { 
                id: '#tour-pos-checkout', 
                title: 'Finalizar Operación', 
                description: 'Procesa la venta y genera el comprobante fiscal de forma instantánea.' 
            }
        ];

        contextSteps.forEach(step => {
            if (document.querySelector(step.id)) {
                d.getConfig().steps.push({
                    element: step.id,
                    popover: {
                        title: step.title,
                        description: step.description,
                        position: 'top'
                    }
                });
            }
        });

        d.drive();
    };
});
