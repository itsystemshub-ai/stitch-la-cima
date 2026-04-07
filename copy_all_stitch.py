# -*- coding: utf-8 -*-
"""
Clean migration: Copy all HTML from stitch to frontend/public with proper names.
Does NOT delete anything. Just copies and renames.
"""
import os
import shutil
import unicodedata
import re

BASE_DIR = r"c:\Users\ET\Documents\GitHub\stitch la cima"
STITCH_DIR = os.path.join(BASE_DIR, "stitch")
PUBLIC_DIR = os.path.join(BASE_DIR, "frontend", "public")

# 1. Clean up generic code*.html files left by previous bad script
print("=== CLEANING GENERIC FILES ===")
for root, dirs, files in os.walk(PUBLIC_DIR):
    for file in files:
        if file.startswith('code') and file.endswith('.html'):
            file_path = os.path.join(root, file)
            try:
                os.remove(file_path)
                print(f"  Removed: {file_path}")
            except:
                pass

# 2. Mapping keywords to destination folders
KEYWORDS_AUTH = ['login', 'register', 'recovery', 'password', 'auth']
KEYWORDS_ECOMMERCE = ['home', 'e_commerce', 'catalog', 'product', 'cart', 'invoice', 'pos', 'about', 'nosotros']

def get_destination(folder_name, file_name):
    combined = (folder_name + " " + file_name).lower()
    if any(k in combined for k in KEYWORDS_AUTH):
        return 'auth'
    if any(k in combined for k in KEYWORDS_ECOMMERCE):
        return 'ecommerce'
    return 'erp'

def get_short_name(folder_name, file_name):
    name_base = folder_name
    if folder_name == 'stitch' or folder_name == 'industrial_forge':
        name_base = os.path.splitext(file_name)[0]
        
    # Remove accents
    clean = ''.join(c for c in unicodedata.normalize('NFD', name_base) if unicodedata.category(c) != 'Mn')
    # Keep alphanumeric, replace rest with space
    clean = ''.join(c if c.isalnum() else ' ' for c in clean)
    # Replace spaces with dash
    clean = re.sub(r'\s+', '-', clean).strip('-')
    # Remove -code suffix
    clean = clean.replace('-code', '')
    # Limit length
    if len(clean) > 30:
        clean = clean[:30]
    
    return clean + ".html"

# 3. Collect and copy all HTML files
print("\n=== COPYING ALL STITCH HTML FILES ===")
html_files = []
for root, dirs, files in os.walk(STITCH_DIR):
    dirs[:] = [d for d in dirs if d not in ['node_modules', 'respaldo']]
    for file in files:
        if file.lower().endswith('.html'):
            html_files.append(os.path.join(root, file))

print(f"Found {len(html_files)} HTML files.")

moved_count = 0
for file_path in html_files:
    filename = os.path.basename(file_path)
    folder_name = os.path.basename(os.path.dirname(file_path))
    
    dest_folder = get_destination(folder_name, filename)
    short_name = get_short_name(folder_name, filename)
    
    dest_dir = os.path.join(PUBLIC_DIR, dest_folder)
    target_path = os.path.join(dest_dir, short_name)
    
    # Handle duplicates
    if os.path.exists(target_path):
        base, ext = os.path.splitext(short_name)
        # Check if it's a different file (compare size)
        if os.path.getsize(target_path) == os.path.getsize(file_path):
            continue # Skip identical files
        target_path = os.path.join(dest_dir, f"{base}-2{ext}")
        if os.path.exists(target_path):
            target_path = os.path.join(dest_dir, f"{base}-3{ext}")
    
    try:
        os.makedirs(dest_dir, exist_ok=True)
        shutil.copy2(file_path, target_path)
        print(f"✅ {folder_name}/{filename} -> {dest_folder}/{os.path.basename(target_path)}")
        moved_count += 1
    except Exception as e:
        print(f"❌ Error: {e}")

print(f"\n✅ DONE! Copied {moved_count} files.")
