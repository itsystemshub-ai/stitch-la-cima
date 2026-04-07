# -*- coding: utf-8 -*-
import os
import shutil

BASE_DIR = r"c:\Users\ET\Documents\GitHub\stitch la cima"
STITCH_DIR = os.path.join(BASE_DIR, "stitch")
PUBLIC_DIR = os.path.join(BASE_DIR, "frontend", "public")

# --- PASO 1: LIMPIEZA TOTAL DEL FRONTEND ---
print("=== PASO 1: LIMPIEZA TOTAL DEL FRONTEND ===")
extensions_to_delete = ['.html', '.js', '.css']
paths_to_clean = [PUBLIC_DIR] # Only clean public, keep backend/src as is

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
                except Exception as e:
                    print(f"⚠️ Error deleting {file_path}: {e}")

print("✅ Frontend cleaned.")

# --- PASO 2: RECOLECCIÓN Y MOVIMIENTO DE ARCHIVOS ---
print("\n=== PASO 2: MIGRACIÓN DE STITCH ===")

# Find all HTML files in STITCH
html_files = []
for root, dirs, files in os.walk(STITCH_DIR):
    for file in files:
        if file.lower().endswith('.html'):
            html_files.append(os.path.join(root, file))

print(f"🔍 Found {len(html_files)} HTML files in stitch.")

moved_count = 0
errors = []

for file_path in html_files:
    # Determine relative path and filename
    rel_path = os.path.relpath(file_path, STITCH_DIR)
    filename = os.path.basename(file_path)
    folder_name = os.path.basename(os.path.dirname(file_path))
    
    # Determine destination folder
    dest_folder = 'erp' # Default
    
    lower_folder = folder_name.lower()
    lower_file = filename.lower()
    
    # E-commerce keywords
    if any(k in lower_folder or k in lower_file for k in ['home', 'e_commerce', 'catalog', 'product', 'cart', 'invoice', 'pos', 'about']):
        dest_folder = 'ecommerce'
    
    # Auth keywords
    if any(k in lower_folder or k in lower_file for k in ['login', 'register', 'recovery', 'password', 'auth']):
        dest_folder = 'auth'
        
    # If it's a root file (folder_name == 'stitch'), decide based on name
    if folder_name == 'stitch' or folder_name == '':
        if 'manual' in lower_file:
            dest_folder = 'erp'
        elif any(k in lower_file for k in ['home', 'product', 'catalog']):
            dest_folder = 'ecommerce'
        else:
            dest_folder = 'erp' # Default ERP for others like settings, etc.

    # Generate short filename
    # Remove accents and special chars, keep alphanumeric and dashes
    name_no_ext = os.path.splitext(filename)[0]
    # Remove common suffixes like '_1'
    clean_name = name_no_ext.replace('_1', '').replace('_v2', '').replace('_v3', '')
    # Remove accents
    import unicodedata
    clean_name = ''.join(c for c in unicodedata.normalize('NFD', clean_name) if unicodedata.category(c) != 'Mn')
    # Replace non-alphanumeric with dash
    clean_name = ''.join(c if c.isalnum() else '-' for c in clean_name).strip('-')
    # Limit length
    if len(clean_name) > 30:
        clean_name = clean_name[:30]
    
    target_filename = clean_name + ".html"
    
    # Handle duplicates
    dest_dir = os.path.join(PUBLIC_DIR, dest_folder)
    target_path = os.path.join(dest_dir, target_filename)
    
    if os.path.exists(target_path):
        # If file exists, we assume it's already migrated (duplicate in stitch folder)
        # Or it's a different version. Since we want unique files, let's check size?
        # For now, we just skip if exists to avoid overwriting the 'main' one with a 'v1' one.
        # Or maybe the user wants all of them?
        # The user said "82 files", so maybe there are duplicates I should keep?
        # But usually, `code.html` in `catalog_1` and `catalog_2` are the same or variants.
        # I will just rename to unique if exists.
        target_filename = clean_name + "-v2.html"
        target_path = os.path.join(dest_dir, target_filename)
        if os.path.exists(target_path):
            target_filename = clean_name + "-v3.html"
            target_path = os.path.join(dest_dir, target_filename)

    try:
        os.makedirs(dest_dir, exist_ok=True)
        shutil.copy2(file_path, target_path)
        print(f"✅ {file_path} -> {dest_folder}/{target_filename}")
        moved_count += 1
    except Exception as e:
        errors.append((file_path, str(e)))

print(f"\n✅ MIGRATION COMPLETE! Moved {moved_count} files.")
if errors:
    print("❌ ERRORS:")
    for f, e in errors:
        print(f"  {f}: {e}")
