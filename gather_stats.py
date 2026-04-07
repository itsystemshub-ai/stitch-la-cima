# -*- coding: utf-8 -*-
"""Gather complete system statistics"""
import os
import re

base = r'c:\Users\ET\Documents\GitHub\stitch la cima'

# Count files
def count_files(path, ext=''):
    count = 0
    files = []
    if os.path.exists(path):
        for root, dirs, fnames in os.walk(path):
            for f in fnames:
                if ext and not f.endswith(ext):
                    continue
                count += 1
                files.append(f)
    return count, files

html_ecom, html_e_files = count_files(os.path.join(base, 'frontend/public/ecommerce'), '.html')
html_erp, html_erp_files = count_files(os.path.join(base, 'frontend/public/erp'), '.html')
html_auth, html_auth_files = count_files(os.path.join(base, 'frontend/public/auth'), '.html')
html_total = html_ecom + html_erp + html_auth

js_count, js_files = count_files(os.path.join(base, 'frontend/src/js'), '.js')
css_count, css_files = count_files(os.path.join(base, 'frontend/public/css'), '.css')
img_count, img_files = count_files(os.path.join(base, 'frontend/assets/images'))

ctrl_count, ctrl_files = count_files(os.path.join(base, 'backend/src/controllers'), '.controller.js')
routes_count, routes_files = count_files(os.path.join(base, 'backend/src/routes'), '.routes.js')
models_count, models_files = count_files(os.path.join(base, 'backend/src/models'), '.js')

# Check each HTML file
with_config = 0
with_logo_colors = 0
with_league = 0
with_logo = 0
with_company = 0
with_styles = 0
with_cdn = 0
utf8_accented = 0

folders = ['ecommerce', 'erp', 'auth']
for folder in folders:
    d = os.path.join(base, 'frontend/public', folder)
    if not os.path.exists(d):
        continue
    for fname in sorted(os.listdir(d)):
        if not fname.endswith('.html'):
            continue
        path = os.path.join(d, fname)
        with open(path, 'r', encoding='utf-8', errors='ignore') as f:
            content = f.read()
        
        if 'id="tailwind-config"' in content: with_config += 1
        if '#B3D92A' in content: with_logo_colors += 1
        if 'League Spartan' in content: with_league += 1
        if 'logo.png' in content: with_logo += 1
        if 'MAYOR DE REPUESTO' in content: with_company += 1
        if 'styles.css' in content: with_styles += 1
        if 'cdn.tailwindcss.com' in content: with_cdn += 1
        # Check UTF-8
        with open(path, 'rb') as fb:
            raw = fb.read()
        if b'\xc3\xa1' in raw or b'\xc3\xb1' in raw or b'\xc3\xb3' in raw:
            utf8_accented += 1

print(f'HTML_ECOMMERCE: {html_ecom}')
print(f'HTML_ECOMMERCE_FILES: {", ".join(html_e_files)}')
print(f'HTML_ERP: {html_erp}')
print(f'HTML_ERP_FILES: {", ".join(html_erp_files)}')
print(f'HTML_AUTH: {html_auth}')
print(f'HTML_AUTH_FILES: {", ".join(html_auth_files)}')
print(f'HTML_TOTAL: {html_total}')
print(f'JS_FILES: {js_count}')
print(f'JS_FILE_NAMES: {", ".join(js_files)}')
print(f'CSS_FILES: {css_count}')
print(f'CSS_FILE_NAMES: {", ".join(css_files)}')
print(f'IMG_FILES: {img_count}')
print(f'IMG_FILE_NAMES: {", ".join(img_files)}')
print(f'CONTROLLERS: {ctrl_count}')
print(f'CONTROLLER_NAMES: {", ".join(ctrl_files)}')
print(f'ROUTES: {routes_count}')
print(f'ROUTE_NAMES: {", ".join(routes_files)}')
print(f'MODELS: {models_count}')
print(f'MODEL_NAMES: {", ".join(models_files)}')
print(f'WITH_CONFIG: {with_config}')
print(f'WITH_LOGO_COLORS: {with_logo_colors}')
print(f'WITH_LEAGUE_SPARTAN: {with_league}')
print(f'WITH_LOGO: {with_logo}')
print(f'WITH_COMPANY: {with_company}')
print(f'WITH_STYLES_CSS: {with_styles}')
print(f'WITH_CDN: {with_cdn}')
print(f'UTF8_ACCENTED: {utf8_accented}')
