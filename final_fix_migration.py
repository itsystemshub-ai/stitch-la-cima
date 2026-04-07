# -*- coding: utf-8 -*-
import os
import shutil
import unicodedata
import re

BASE_DIR = r"c:\Users\ET\Documents\GitHub\stitch la cima"
STITCH_DIR = os.path.join(BASE_DIR, "stitch")
PUBLIC_DIR = os.path.join(BASE_DIR, "frontend", "public")

# --- PASO 1: LIMPIEZA TOTAL ---
print("=== PASO 1: LIMPIEZA TOTAL DEL FRONTEND ===")
extensions_to_delete = ['.html', '.js', '.css']
paths_to_clean = [PUBLIC_DIR]

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
                    pass # Ignore errors on delete

print("✅ Frontend cleaned.")

# --- PASO 2: RECOLECCIÓN Y MOVIMIENTO DE TODOS LOS ARCHIVOS HTML ---
print("\n=== PASO 2: RECOLECCIÓN Y MOVIMIENTO DE STITCH ===")

# Mapping for destinations
# Folder contains keyword -> destination folder
KEYWORDS_AUTH = ['login', 'register', 'recovery', 'password', 'auth']
KEYWORDS_ECOMMERCE = ['home', 'e_commerce', 'catalog', 'product', 'cart', 'invoice', 'pos', 'about', 'nosotros']

def get_destination(folder_name, file_name):
    combined = (folder_name + " " + file_name).lower()
    
    if any(k in combined for k in KEYWORDS_AUTH):
        return 'auth'
    if any(k in combined for k in KEYWORDS_ECOMMERCE):
        return 'ecommerce'
    return 'erp' # Default

def get_short_name(folder_name, file_name):
    # Prefer folder name
    name_base = folder_name
    
    # If folder is generic (like 'stitch' or 'industrial_forge' which might be root), use file name
    if folder_name == 'stitch' or folder_name == 'industrial_forge':
        name_base = os.path.splitext(file_name)[0]
        
    # Clean up name
    # Remove accents
    clean = ''.join(c for c in unicodedata.normalize('NFD', name_base) if unicodedata.category(c) != 'Mn')
    # Keep alphanumeric and dash
    clean = ''.join(c if c.isalnum() or c == ' ' else ' ' for c in clean)
    # Replace spaces with dash
    clean = re.sub(r'\s+', '-', clean).strip('-')
    # Remove common suffixes
    clean = clean.replace('-code', '').replace('-v2', '').replace('-v3', '')
    # Limit length
    if len(clean) > 30:
        clean = clean[:30]
    
    return clean + ".html"

# Collect all HTML files
html_files = []
for root, dirs, files in os.walk(STITCH_DIR):
    # Skip node_modules or backup dirs if any
    dirs[:] = [d for d in dirs if d not in ['node_modules', 'respaldo']]
    
    for file in files:
        if file.lower().endswith('.html'):
            full_path = os.path.join(root, file)
            html_files.append(full_path)

print(f"🔍 Found {len(html_files)} HTML files in stitch.")

moved_count = 0
errors = []

for file_path in html_files:
    rel_path = os.path.relpath(file_path, STITCH_DIR)
    filename = os.path.basename(file_path)
    # Folder containing the file
    folder_name = os.path.basename(os.path.dirname(file_path))
    
    dest_folder = get_destination(folder_name, filename)
    short_name = get_short_name(folder_name, filename)
    
    dest_dir = os.path.join(PUBLIC_DIR, dest_folder)
    target_path = os.path.join(dest_dir, short_name)
    
    # Handle duplicates
    if os.path.exists(target_path):
        base, ext = os.path.splitext(short_name)
        target_path = os.path.join(dest_dir, f"{base}-2{ext}")
        if os.path.exists(target_path):
            target_path = os.path.join(dest_dir, f"{base}-3{ext}")
    
    try:
        os.makedirs(dest_dir, exist_ok=True)
        shutil.copy2(file_path, target_path)
        print(f"✅ {rel_path} -> {dest_folder}/{os.path.basename(target_path)}")
        moved_count += 1
    except Exception as e:
        errors.append((rel_path, str(e)))

print(f"\n✅ MIGRATION COMPLETE! Moved {moved_count} files.")
if errors:
    print("❌ ERRORS:")
    for f, e in errors:
        print(f"  {f}: {e}")
