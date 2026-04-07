# -*- coding: utf-8 -*-
import os
import shutil
import re

BASE_DIR = r"c:\Users\ET\Documents\GitHub\stitch la cima"
STITCH_DIR = os.path.join(BASE_DIR, "stitch")
PUBLIC_DIR = os.path.join(BASE_DIR, "frontend", "public")

# --- PASO 1: ELIMINAR ARCHIVOS HTML, JS Y CSS EN TODO EL SISTEMA (MÁS STITCH) ---
print("=== PASO 1: LIMPIEZA DEL SISTEMA ===")

extensions_to_delete = ['.html', '.js', '.css']
skip_paths = ['node_modules', 'stitch', 'respaldo']

paths_to_clean = [
    os.path.join(BASE_DIR, "frontend", "public"),
    os.path.join(BASE_DIR, "frontend", "src"),
    os.path.join(BASE_DIR, "backend", "src"),
]

for path in paths_to_clean:
    if not os.path.exists(path):
        continue
    
    for root, dirs, files in os.walk(path):
        # Skip node_modules
        dirs[:] = [d for d in dirs if d not in skip_paths]
        
        for file in files:
            file_path = os.path.join(root, file)
            _, ext = os.path.splitext(file)
            
            if ext.lower() in extensions_to_delete:
                try:
                    os.remove(file_path)
                except Exception as e:
                    print(f"Error deleting {file_path}: {e}")

print("✅ System cleanup complete.")

# --- PASO 2: MAPA DE REORGANIZACIÓN ---
print("\n=== PASO 2: REORGANIZACIÓN DE STITCH ===")

# Destinos por prefijo de carpeta
def get_destination_and_name(folder_name):
    name_lower = folder_name.lower()
    
    # Mapeo explícito para nombres clave
    if 'login_administrativo' in name_lower or 'login_register' in name_lower:
        return 'auth', 'login.html' if 'register' not in name_lower else 'register.html'
    if 'password_recovery' in name_lower:
        return 'auth', 'recovery.html'
    
    if 'e_commerce' in name_lower:
        return 'ecommerce', 'home.html'
    if 'nosotros' in name_lower:
        return 'ecommerce', 'about.html'
    if 'catalog_' in name_lower:
        return 'ecommerce', 'catalog.html'
    if 'product_detail' in name_lower:
        return 'ecommerce', 'product.html'
    if 'your_cart' in name_lower:
        return 'ecommerce', 'cart.html'
    if 'order_confirmed' in name_lower:
        return 'ecommerce', 'order-confirmed.html'
    if 'factura_electr_nica' in name_lower:
        return 'ecommerce', 'invoice.html'
    if 'factura_fiscal' in name_lower:
        return 'ecommerce', 'invoice-fiscal.html'
    
    # ERP Defaults
    # Dashboard
    if 'dashboard' in name_lower:
        short_name = name_lower.replace('dashboard_de_', '').replace('dashboard_', '').replace('erp_', '')
        # Clean up spaces and special chars
        clean_name = re.sub(r'[^a-z0-9]', '-', short_name).strip('-')
        if not clean_name: clean_name = 'dashboard'
        return 'erp', f'{clean_name}.html'
    
    # Gestión
    if 'gesti_n' in name_lower or 'gestion' in name_lower:
        short_name = name_lower.replace('gesti_n_de_', '').replace('gestion_de_', '')
        clean_name = re.sub(r'[^a-z0-9]', '-', short_name).strip('-')
        if not clean_name: clean_name = 'management'
        return 'erp', f'{clean_name}.html'
    
    # Reportes
    if 'reporte' in name_lower:
        short_name = name_lower.replace('centro_de_reportes_de_', '').replace('reporte_', '')
        clean_name = re.sub(r'[^a-z0-9]', '-', short_name).strip('-')
        if not clean_name: clean_name = 'report'
        return 'erp', f'{clean_name}.html'
        
    # Configuración
    if 'configuraci_n' in name_lower or 'config' in name_lower:
        short_name = name_lower.replace('configuraci_n_de_', '').replace('config_', '')
        clean_name = re.sub(r'[^a-z0-9]', '-', short_name).strip('-')
        if not clean_name: clean_name = 'settings'
        return 'erp', f'{clean_name}.html'
        
    # Libros contables
    if 'libro_' in name_lower:
        short_name = name_lower.replace('libro_de_', '').replace('libro_', '')
        clean_name = re.sub(r'[^a-z0-9]', '-', short_name).strip('-')
        return 'erp', f'{clean_name}.html'

    # Fallback: remove prefixes and clean
    clean_folder = re.sub(r'[^a-z0-9]', '-', name_lower).strip('-')
    if len(clean_folder) > 30:
        clean_folder = clean_folder[:30]
    
    # Determine destination based on keywords
    if any(k in name_lower for k in ['user', 'auth', 'login', 'pass']):
        return 'auth', f'{clean_folder}.html'
    if any(k in name_lower for k in ['cart', 'product', 'catalog', 'shop', 'home', 'landing']):
        return 'ecommerce', f'{clean_folder}.html'
    
    return 'erp', f'{clean_folder}.html'

# Iterar sobre carpetas en stitch
moved_count = 0
errors = []

for folder_name in os.listdir(STITCH_DIR):
    source_folder = os.path.join(STITCH_DIR, folder_name)
    
    if not os.path.isdir(source_folder):
        continue
    
    # Look for code.html inside
    source_file = os.path.join(source_folder, "code.html")
    if not os.path.exists(source_file):
        continue
    
    target_dir_name, target_filename = get_destination_and_name(folder_name)
    target_dir = os.path.join(PUBLIC_DIR, target_dir_name)
    target_file = os.path.join(target_dir, target_filename)
    
    # Handle duplicates
    if os.path.exists(target_file):
        base, ext = os.path.splitext(target_filename)
        target_file = os.path.join(target_dir, f"{base}-v2{ext}")
    
    os.makedirs(target_dir, exist_ok=True)
    
    try:
        shutil.copy2(source_file, target_file)
        print(f"✅ {folder_name} -> {target_dir_name}/{target_filename}")
        moved_count += 1
    except Exception as e:
        errors.append((folder_name, str(e)))

print(f"\n✅ MIGRATION COMPLETE! Moved {moved_count} files.")
if errors:
    print("❌ ERRORS:")
    for f, e in errors:
        print(f"  {f}: {e}")
