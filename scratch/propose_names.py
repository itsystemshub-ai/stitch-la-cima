import os
import re

def slugify(text):
    text = text.lower()
    # Remove accents
    replacements = {
        'á': 'a', 'é': 'e', 'í': 'i', 'ó': 'o', 'ú': 'u',
        'ñ': 'n'
    }
    for char, rel in replacements.items():
        text = text.replace(char, rel)
    # Replace non-alphanumeric with hyphen
    text = re.sub(r'[^a-z0-9]+', '-', text)
    # Remove leading/trailing hyphens
    return text.strip('-')

def shorten(slug):
    words = slug.split('-')
    stop_words = {'de', 'la', 'y', 'el', 'los', 'las', 'un', 'una', 'en', 'a', 'erp', 'industrial', 'forge', 'la-cima', 'cima', 'ca'}
    filtered_words = [w for w in words if w not in stop_words]
    
    # If it's still long, take first 3 words
    if len(filtered_words) > 3:
        # Special logic: if "dashboard-de-ventas" -> "dashboard-ventas"
        # For now, just take first 3.
        return '-'.join(filtered_words[:3])
    return '-'.join(filtered_words)

root_dir = 'stitch_la_cima_repuestos'
results = []

if os.path.exists(root_dir):
    for item in os.listdir(root_dir):
        item_path = os.path.join(root_dir, item)
        if os.path.isdir(item_path):
            code_html = os.path.join(item_path, 'code.html')
            if os.path.exists(code_html):
                slug = slugify(item)
                short_name = shorten(slug) + '.html'
                results.append((item, short_name))

for original, proposed in results:
    print(f"{original} -> {proposed}")
