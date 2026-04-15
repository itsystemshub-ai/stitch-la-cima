import './bootstrap';
import { GridStack } from 'gridstack';
import 'gridstack/dist/gridstack.min.css';
import { driver } from "driver.js";
import "driver.js/dist/driver.css";

import Alpine from 'alpinejs';

window.Alpine = Alpine;
window.GridStack = GridStack;
window.driver = driver;

Alpine.start();

document.addEventListener('DOMContentLoaded', () => {
    // Inicialización automática de GridStack si encuentra el selector 
    if(document.querySelector('.grid-stack')) {
        let grid = GridStack.init({
            disableOneColumnMode: true,
            float: true
        });
    }

    // Lógica para Onboarding/Tutorial global condicional
    window.startErpTour = function() {
        const driverObj = driver({
          showProgress: true,
          steps: [
            { element: '#tour-nav', popover: { title: 'Navegación', description: 'Aquí encontrarás todos los módulos del ERP.' } },
            { element: '#tour-dashboard', popover: { title: 'Dashboard', description: 'Este es tu panel modular, puedes arrastrar las tarjetas con GridStack.' } },
            { element: '#tour-pos', popover: { title: 'Punto de Venta', description: 'Accede rápidamente al mostrador con caché offline.' } }
          ]
        });
        driverObj.drive();
    }
});
