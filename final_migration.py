# -*- coding: utf-8 -*-
import os
import shutil

BASE_DIR = r"c:\Users\ET\Documents\GitHub\stitch la cima"
STITCH_DIR = os.path.join(BASE_DIR, "stitch")
PUBLIC_DIR = os.path.join(BASE_DIR, "frontend", "public")

# Define the mapping: Folder Name -> (Destination Folder, Short Filename)
# Destination folders: 'auth', 'ecommerce', 'erp'
RENAMES = {
    # Auth
    "login_administrativo_acceso_seguro": ("auth", "login.html"),
    "login_register": ("auth", "register.html"),
    "password_recovery_request": ("auth", "recovery.html"),
    "create_corporate_account": ("auth", "register-corporate.html"),

    # E-commerce
    "e_commerce_la_cima_c.a_": ("ecommerce", "home.html"),
    "home_la_cima_c.a_": ("ecommerce", "home.html"), # Duplicate handled by overwriting
    "nosotros_y_contacto_e_commerce": ("ecommerce", "about.html"),
    "catalog_7_items_selected": ("ecommerce", "catalog.html"),
    "catalog_grid_view": ("ecommerce", "catalog.html"),
    "catalog_list_view": ("ecommerce", "catalog.html"),
    "product_detail_cummins_gasket": ("ecommerce", "product.html"),
    "your_cart_7_items": ("ecommerce", "cart.html"),
    "order_confirmed": ("ecommerce", "order-confirmed.html"),
    "factura_electr_nica_digital": ("ecommerce", "invoice-electronic.html"),
    "factura_fiscal_digital": ("ecommerce", "invoice-fiscal.html"),
    "vista_previa_de_impresi_n_factura": ("ecommerce", "invoice-preview.html"),
    "punto_de_venta_pos": ("ecommerce", "pos.html"),

    # ERP - Dashboards
    "dashboard_de_administraci_n_central": ("erp", "dashboard.html"),
    "dashboard_financiero_erp": ("erp", "dashboard-finance.html"),
    "dashboard_de_ventas_kpis": ("erp", "dashboard-sales.html"),
    "dashboard_de_rrhh_control_industrial": ("erp", "dashboard-hr.html"),
    "dashboard_de_compras_erp": ("erp", "dashboard-purchases.html"),
    "dashboard_de_contabilidad_erp": ("erp", "dashboard-accounting.html"),
    "erp_dashboard_forge_ops": ("erp", "dashboard-ops.html"),
    "erp_inventory_dashboard": ("erp", "inventory.html"),

    # ERP - Gestión
    "gesti_n_de_productos_inventario": ("erp", "products.html"),
    "gesti_n_de_clientes_y_retenciones": ("erp", "clients.html"),
    "gesti_n_de_proveedores_b2b": ("erp", "suppliers.html"),
    "gesti_n_de_usuarios_y_roles_granulares": ("erp", "users.html"),
    "gesti_n_de_empleados_expediente_digital": ("erp", "employees.html"),
    "gesti_n_de_vendedores_y_comisiones": ("erp", "commissions.html"),
    "gesti_n_de_cuentas_por_cobrar": ("erp", "receivables.html"),
    "gesti_n_de_activos_fijos": ("erp", "fixed-assets.html"),
    "gesti_n_de_backups_y_restauraci_n": ("erp", "backups.html"),
    "gesti_n_de_tickets_de_soporte": ("erp", "tickets.html"),
    "portal_del_empleado_auto_gesti_n": ("erp", "employee-portal.html"),
    "crear_nuevo_ticket_de_soporte": ("erp", "create-ticket.html"),
    "chat_de_asistencia_t_cnica_en_vivo": ("erp", "live-chat.html"),

    # ERP - Contabilidad y Finanzas
    "plan_de_cuentas_contable": ("erp", "chart-accounts.html"),
    "libro_diario_asientos_contables": ("erp", "journal.html"),
    "libro_de_caja_y_bancos_finanzas": ("erp", "cash-banks.html"),
    "libro_de_compras_fiscal": ("erp", "purchases-book.html"),
    "libro_de_ventas_fiscal": ("erp", "sales-book.html"),
    "balance_general": ("erp", "balance-sheet.html"),
    "estado_de_resultados_p_g": ("erp", "income-statement.html"),
    "balance_de_comprobaci_n_sumas_y_saldos": ("erp", "trial-balance.html"),
    "declaraci_n_de_iva_e_impuestos": ("erp", "tax-declaration.html"),
    "cierre_contable_y_liquidaci_n_de_impuestos": ("erp", "closing.html"),
    "registro_global_de_ventas": ("erp", "global-sales.html"),
    "registro_de_facturas_emitidas": ("erp", "invoices-issued.html"),
    "registro_de_factura_de_compra": ("erp", "invoices-purchase.html"),
    "kardex_valorizado_art._177": ("erp", "kardex.html"),
    "anulaciones_y_notas_de_cr_dito": ("erp", "credit-notes.html"),
    "ajustes_de_inventario_y_actas": ("erp", "inventory-adjustments.html"),
    "historial_de_compras_y_recepciones": ("erp", "purchase-history.html"),
    "processing_order.._": ("erp", "order-processing.html"),

    # ERP - Reportes
    "centro_de_reportes_financieros": ("erp", "reports-finance.html"),
    "centro_de_reportes_de_ventas": ("erp", "reports-sales.html"),
    "centro_de_reportes_de_inventario": ("erp", "reports-inventory.html"),
    "centro_de_reportes_de_rrhh": ("erp", "reports-hr.html"),
    "centro_de_reportes_de_compras": ("erp", "reports-purchases.html"),
    "centro_de_reportes_contables": ("erp", "reports-accounting.html"),
    "reporte_anual_de_rendimiento_comercial": ("erp", "annual-report.html"),
    "reportes_legales_y_configuraci_n_fiscal_rrhh": ("erp", "legal-reports.html"),
    "generaci_n_de_libros_legales": ("erp", "legal-books.html"),

    # ERP - Configuración y Seguridad
    "configuraci_n_de_par_metros_globales": ("erp", "settings.html"),
    "configuraci_n_legal_y_fiscal": ("erp", "settings-legal.html"),
    "estructura_y_flujos_de_aprobaci_n": ("erp", "workflows.html"),
    "centro_de_aprobaciones_gerenciales": ("erp", "approvals.html"),
    "auditor_a_y_logs_de_ciberseguridad": ("erp", "audit-logs.html"),
    "auditor_a_de_inventario_f_sico": ("erp", "audit-inventory.html"),
    "gestor_de_base_de_datos_y_esquemas": ("erp", "database.html"),
    "tareas_programadas_cron_jobs": ("erp", "cron-jobs.html"),
    "estado_de_salud_del_sistema_y_mantenimiento": ("erp", "system-status.html"),
    "industrial_forge": ("erp", "forge.html"),
    "manual_t_cnico_erp_industrial_forge.html": ("erp", "manual.html"), # Note: source is .html file directly? check logic

    # ERP - RRHH Específico
    "c_lculo_y_procesamiento_de_n_mina": ("erp", "payroll.html"),
    "prestaciones_sociales_y_liquidaciones_lottt": ("erp", "benefits.html"),
    
    # ERP - Soporte
    "centro_de_ayuda_y_soporte_t_cnico": ("erp", "help.html"),
    "advanced_search": ("erp", "advanced-search.html"),
    "art_culo_de_base_de_conocimientos_cierre_fiscal": ("erp", "knowledge-base.html"),
}

# --- EXECUTION ---
print("=== CLEANING PREVIOUS MIGRATION ===")
# Optional: Clean up previous bad files if necessary, but for now we just overwrite.

print("=== MIGRATING WITH SHORT NAMES ===")
moved_count = 0

for folder_name, (dest_subdir, short_filename) in RENAMES.items():
    # Determine source file path
    source_folder = os.path.join(STITCH_DIR, folder_name)
    source_file = os.path.join(source_folder, "code.html")
    
    # Special case: manual_t_cnico is a direct html file in stitch root or subfolder?
    # The list showed it in the root list.
    if folder_name == "manual_t_cnico_erp_industrial_forge.html":
        source_file = os.path.join(STITCH_DIR, folder_name)

    if not os.path.exists(source_file):
        print(f"⚠️ Source not found: {source_file}")
        continue
        
    # Destination path
    dest_dir = os.path.join(PUBLIC_DIR, dest_subdir)
    dest_file = os.path.join(dest_dir, short_filename)
    
    os.makedirs(dest_dir, exist_ok=True)
    
    try:
        shutil.copy2(source_file, dest_file)
        print(f"✅ {folder_name} -> {dest_subdir}/{short_filename}")
        moved_count += 1
    except Exception as e:
        print(f"❌ Error moving {folder_name}: {e}")

print(f"\n✅ MIGRATION COMPLETE! Moved {moved_count} files.")
