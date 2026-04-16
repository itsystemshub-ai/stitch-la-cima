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
                if (searchInput) searchInput.focus();
            }, 100);
        }
    });
});
