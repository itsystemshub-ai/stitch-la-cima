import os
import shutil

BASE_DIR = r"c:\Users\ET\Documents\GitHub\stitch la cima"
STITCH_DIR = os.path.join(BASE_DIR, "stitch")
FRONTEND_PUBLIC = os.path.join(BASE_DIR, "frontend", "public")

# --- PASO 1: ELIMINAR ARCHIVOS HTML, JS Y CSS EN TODO EL SISTEMA (MÁS STITCH) ---
print("=== PASO 1: LIMPIEZA DEL SISTEMA ===")
paths_to_clean = [
    os.path.join(BASE_DIR, "frontend", "public"),
    os.path.join(BASE_DIR, "frontend", "src"),
    os.path.join(BASE_DIR, "backend", "src"),
]

extensions_to_delete = ['.html', '.js', '.css']

for path in paths_to_clean:
    if not os.path.exists(path):
        continue
    
    for root, dirs, files in os.walk(path):
        for file in files:
            file_path = os.path.join(root, file)
            _, ext = os.path.splitext(file)
            
            if ext.lower() in extensions_to_delete:
                try:
                    os.remove(file_path)
                    # print(f"Deleted: {file_path}")
                except Exception as e:
                    print(f"Error deleting {file_path}: {e}")

print("✅ System cleanup complete.")

# --- PASO 2: ORGANIZAR STITCH Y MOVER A LA RAÍZ ---
print("\n=== PASO 2: REORGANIZACIÓN DE STITCH ===")

# Definición de destino por prefijo
DESTINATIONS = {
    'auth': 'auth',
    'ecommerce': 'ecommerce',
    'erp': 'erp'
}

# Mapeo de nombres de carpeta a nombres de archivo cortos
RENAME_MAP = {
    'auth-login': 'login.html',
    'auth-recovery': 'recovery.html',
    
    'ecommerce-account': 'account.html',
    'ecommerce-cart': 'cart.html',
    'ecommerce-catalog': 'catalog.html',
    'ecommerce-landing-erp': 'landing-erp.html',
    'ecommerce-product': 'product.html',
    'ecommerce-search': 'search.html',
    
    'erp-clients': 'clients.html',
    'erp-dashboard': 'dashboard.html',
    'erp-inventory': 'inventory.html',
    'erp-quotes': 'quotes.html',
    'erp-reports': 'reports.html',
    'erp-sales': 'sales.html',
    'erp-settings': 'settings.html',
    'erp-support': 'support.html',
    'erp-tracking': 'tracking.html',
}

if not os.path.exists(STITCH_DIR):
    print("❌ Stitch directory not found!")
    exit()

for folder_name in os.listdir(STITCH_DIR):
    source_folder = os.path.join(STITCH_DIR, folder_name)
    
    if not os.path.isdir(source_folder):
        continue
        
    # Check if this folder is in our rename map
    if folder_name not in RENAME_MAP:
        continue
        
    target_filename = RENAME_MAP[folder_name]
    
    # Determine target subdirectory (auth, ecommerce, or erp)
    target_subdir_name = None
    for prefix, dir_name in DESTINATIONS.items():
        if folder_name.startswith(prefix):
            target_subdir_name = dir_name
            break
    
    if not target_subdir_name:
        continue
        
    # Full target directory
    target_dir = os.path.join(FRONTEND_PUBLIC, target_subdir_name)
    os.makedirs(target_dir, exist_ok=True)
    
    # Source file is code.html
    source_file = os.path.join(source_folder, "code.html")
    target_file = os.path.join(target_dir, target_filename)
    
    if os.path.exists(source_file):
        try:
            # Copy instead of move to keep a backup in stitch? 
            # User said "mover", but copy is safer. I will move (copy+delete) or just copy.
            # I'll use copy2 to preserve metadata, then I can delete source if needed.
            # For now, let's just copy to avoid data loss if script fails.
            shutil.copy2(source_file, target_file)
            print(f"✅ Moved: {folder_name}/code.html -> {target_subdir_name}/{target_filename}")
        except Exception as e:
            print(f"❌ Error moving {folder_name}: {e}")

print("\n✅ MIGRATION COMPLETE!")
print(f"Files are now in: {FRONTEND_PUBLIC}")
