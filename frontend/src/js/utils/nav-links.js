/**
 * La Cima - Navigation Helper
 * Centralized page routing for the monorepo
 */
const NAV = {
  // Public Pages
  landing: 'landing_page_corporativa_cima.html',
  landingERP: 'landing_page_flujo_p_blico_y_erp.html',
  catalog: 'cat_logo_de_repuestos_y_filtros_vin_oem.html',
  catalogPublic: 'cat_logo_p_blico_de_repuestos.html',
  productDetail: 'ficha_t_cnica_del_repuesto_y_compatibilidad.html',
  vinSearch: 'b_squeda_avanzada_y_diagramas_t_cnicos.html',
  cart: 'carrito_de_compras_b2b_b2c.html',
  checkout: 'checkout_y_registro_de_cliente_aftermarket.html',
  login: 'inicio_de_sesi_n_acceso_b2b_b2c.html',
  recoverPassword: 'recuperar_contrase_a.html',
  myAccount: 'mi_cuenta_pedidos_y_flotas_1.html',

  // ERP / Admin
  inventoryDashboard: 'dashboard_de_inventario_avanzado.html',
  inventoryManagement: 'gesti_n_detallada_de_inventario_1.html',
  salesCRM: 'panel_de_ventas_y_crm_de_vendedores.html',
  customerDirectory: 'directorio_de_clientes_b2b_talleres_y_flotas.html',
  quoter: 'cotizador_pro_y_licitaciones_masivas_1.html',
  logistics: 'seguimiento_log_stico_y_despachos_en_tiempo_real.html',
  support: 'centro_de_soporte_garant_as_rma_e_ia_de_compatibilidad.html',
  analytics: 'reportes_y_anal_tica_predictiva.html',
  systemConfig: 'configuraci_n_avanzada_del_sistema_1.html',

  // Documents
  techArchitecture: 'arquitectura_t_cnica_ecommerce_repuestos.html',
  checkoutLogic: 'l_gica_de_checkout_y_c_digo_backend.html',
};

// Resolve page path from any page
function page(targetKey) {
  return NAV[targetKey] || '#';
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
