/**
 * La Cima - Navigation Helper
 * Centralized page routing for the monorepo
 */
const NAV = {
  // Public Pages - Ecommerce
  home: 'index.html',
  catalogo: 'catalogo.html',
  carrito: 'carrito.html',
  checkout: 'checkout.html',
  busqueda: 'busqueda.html',
  fichaTecnica: 'ficha-tecnica.html',
  catalogoPdf: 'catalogo-pdf.html',
  contacto: 'contacto.html',
  nosotros: 'nosotros.html',
  terminos: 'terminos.html',
  privacidad: 'privacidad.html',

  // Auth
  login: 'login.html',
  registroPersonal: 'registro-personal.html',
  registroB2B: 'registro-b2b.html',
  recuperarPassword: 'recuperar-password.html',

  // ERP / Admin
  dashboard: 'dashboard.html',
  gestionProductos: 'gestion-productos.html',
  inventario: 'inventario.html',
  productos: 'productos.html',
  movimientoInventario: 'movimiento-inventario.html',
  directorio: 'directorio.html',
  cotizador: 'cotizador.html',
  reportes: 'reportes.html',
  configuracion: 'configuracion.html',
  aprobacionPassword: 'aprobacion-password.html',
  soporte: 'soporte.html',
};

// Resolve page path from any page
function page(targetKey) {
  return NAV[targetKey] || '#';
}

// Navigate to page
function navigateTo(targetKey, queryParams = {}) {
  const targetPath = NAV[targetKey];
  if (!targetPath) {
    console.warn(`Navigation target "${targetKey}" not found`);
    return;
  }

  let url = targetPath;
  if (Object.keys(queryParams).length > 0) {
    const params = new URLSearchParams(queryParams);
    url += `?${params}`;
  }

  window.location.href = url;
}

// Update all links with data-page attribute on DOMContentLoaded
document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('a[data-page]').forEach(link => {
    const target = link.getAttribute('data-page');
    if (NAV[target]) {
      link.href = NAV[target];
    } else {
      console.warn(`Nav link "${target}" not found in routing map`);
    }
  });
});
