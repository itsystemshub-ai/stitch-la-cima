/**
 * Navigation Helper - La Cima Zenith ERP
 * Centralized page routing for the monorepo
 */
const NAV = {
  // Public Pages - Ecommerce
  home: 'index.html',
  catalogo: 'Catalogo_general.html',
  carrito: 'carrito_de_compras.html',
  checkout: 'orden_y_facturacion.html',
  busqueda: 'busqueda_resultados.html',
  fichaTecnica: 'ficha_tcnica_del_repuesto_y_compatibilidad.html',
  catalogoPdf: 'catalogo_pdf.html',
  contacto: 'contacto.html',
  nosotros: 'nosotros.html',
  terminos: 'terminos.html',
  privacidad: 'privacidad.html',

  // Auth
  login: 'login.html',
  registroPersonal: 'registro_personal.html',
  registroB2B: 'registro_corporativo_b2b.html',
  recuperarPassword: 'recuperar_contrase_a.html',

  // ERP / Admin
  dashboard: 'dashboard.html',
  gestionProductos: 'gestion_publico_productos.html',
  inventario: 'inventario_publico.html',
  productos: 'productos.html',
  movimientoInventario: 'movimiento_inventario.html',
  directorio: 'directorio.html',
  cotizador: 'cotizador_pro_y_licitaciones_masivas.html',
  reportes: 'reportes.html',
  configuracion: 'configuraci_n_avanzada_del_sistema.html',
  aprobacionPassword: 'aprobacion_contraseña_usuario.html',
  soporte: 'centro_de_soporte_garant_as_rma_e_ia_de_compatibilidad.html',
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
    }
  });
});

// Expose to global scope
window.NAV = NAV;
window.page = page;
window.navigateTo = navigateTo;
