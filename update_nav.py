# -*- coding: utf-8 -*-
"""
Update all stitch HTML pages with proper navigation links
"""
import os
import re

stitch_dir = r'c:\Users\ET\Documents\GitHub\stitch la cima\stitch'

# Navigation structure
NAV = {
    'ecommerce-landing': {
        'home': 'ecommerce-landing/code.html',
        'catalog': 'ecommerce-catalog/code.html',
        'product': 'ecommerce-product/code.html',
        'cart': 'ecommerce-cart/code.html',
        'account': 'ecommerce-account/code.html',
        'login': 'auth-login/code.html',
        'erp': 'erp-dashboard/code.html',
    },
    'ecommerce-catalog': {
        'home': '../ecommerce-landing/code.html',
        'catalog': 'code.html',
        'product': '../ecommerce-product/code.html',
        'cart': '../ecommerce-cart/code.html',
        'account': '../ecommerce-account/code.html',
        'login': '../auth-login/code.html',
        'erp': '../erp-dashboard/code.html',
    },
    'ecommerce-product': {
        'home': '../ecommerce-landing/code.html',
        'catalog': '../ecommerce-catalog/code.html',
        'cart': '../ecommerce-cart/code.html',
        'account': '../ecommerce-account/code.html',
        'login': '../auth-login/code.html',
        'erp': '../erp-dashboard/code.html',
    },
    'ecommerce-cart': {
        'home': '../ecommerce-landing/code.html',
        'catalog': '../ecommerce-catalog/code.html',
        'product': '../ecommerce-product/code.html',
        'checkout': '../ecommerce-checkout/code.html',
        'account': '../ecommerce-account/code.html',
        'login': '../auth-login/code.html',
    },
    'ecommerce-account': {
        'home': '../ecommerce-landing/code.html',
        'catalog': '../ecommerce-catalog/code.html',
        'cart': '../ecommerce-cart/code.html',
        'orders': '../erp-orders/code.html',
        'settings': 'code.html',
        'login': '../auth-login/code.html',
    },
    'ecommerce-landing-erp': {
        'home': '../ecommerce-landing/code.html',
        'catalog': '../ecommerce-catalog/code.html',
        'erp': '../erp-dashboard/code.html',
        'login': '../auth-login/code.html',
    },
    'auth-login': {
        'home': '../ecommerce-landing/code.html',
        'catalog': '../ecommerce-catalog/code.html',
        'register': 'code.html',
        'recovery': '../auth-recovery/code.html',
        'erp': '../erp-dashboard/code.html',
    },
    'auth-recovery': {
        'home': '../ecommerce-landing/code.html',
        'login': '../auth-login/code.html',
    },
    'erp-dashboard': {
        'home': '../ecommerce-landing/code.html',
        'dashboard': 'code.html',
        'inventory': '../erp-inventory/code.html',
        'orders': '../erp-orders/code.html',
        'clients': '../erp-clients/code.html',
        'sales': '../erp-sales/code.html',
        'quotes': '../erp-quotes/code.html',
        'reports': '../erp-reports/code.html',
        'settings': '../erp-settings/code.html',
        'support': '../erp-support/code.html',
        'tracking': '../erp-tracking/code.html',
        'logout': '../auth-login/code.html',
    },
    'erp-inventory': {
        'home': '../ecommerce-landing/code.html',
        'dashboard': '../erp-dashboard/code.html',
        'inventory': 'code.html',
        'orders': '../erp-orders/code.html',
        'clients': '../erp-clients/code.html',
        'sales': '../erp-sales/code.html',
        'quotes': '../erp-quotes/code.html',
        'reports': '../erp-reports/code.html',
        'settings': '../erp-settings/code.html',
        'support': '../erp-support/code.html',
        'tracking': '../erp-tracking/code.html',
    },
    'erp-clients': {
        'home': '../ecommerce-landing/code.html',
        'dashboard': '../erp-dashboard/code.html',
        'inventory': '../erp-inventory/code.html',
        'orders': '../erp-orders/code.html',
        'clients': 'code.html',
        'sales': '../erp-sales/code.html',
        'quotes': '../erp-quotes/code.html',
        'reports': '../erp-reports/code.html',
        'settings': '../erp-settings/code.html',
        'support': '../erp-support/code.html',
        'tracking': '../erp-tracking/code.html',
    },
    'erp-sales': {
        'home': '../ecommerce-landing/code.html',
        'dashboard': '../erp-dashboard/code.html',
        'inventory': '../erp-inventory/code.html',
        'orders': '../erp-orders/code.html',
        'clients': '../erp-clients/code.html',
        'sales': 'code.html',
        'quotes': '../erp-quotes/code.html',
        'reports': '../erp-reports/code.html',
        'settings': '../erp-settings/code.html',
        'support': '../erp-support/code.html',
        'tracking': '../erp-tracking/code.html',
    },
    'erp-quotes': {
        'home': '../ecommerce-landing/code.html',
        'dashboard': '../erp-dashboard/code.html',
        'inventory': '../erp-inventory/code.html',
        'orders': '../erp-orders/code.html',
        'clients': '../erp-clients/code.html',
        'sales': '../erp-sales/code.html',
        'quotes': 'code.html',
        'reports': '../erp-reports/code.html',
        'settings': '../erp-settings/code.html',
        'support': '../erp-support/code.html',
        'tracking': '../erp-tracking/code.html',
    },
    'erp-reports': {
        'home': '../ecommerce-landing/code.html',
        'dashboard': '../erp-dashboard/code.html',
        'inventory': '../erp-inventory/code.html',
        'orders': '../erp-orders/code.html',
        'clients': '../erp-clients/code.html',
        'sales': '../erp-sales/code.html',
        'quotes': '../erp-quotes/code.html',
        'reports': 'code.html',
        'settings': '../erp-settings/code.html',
        'support': '../erp-support/code.html',
        'tracking': '../erp-tracking/code.html',
    },
    'erp-settings': {
        'home': '../ecommerce-landing/code.html',
        'dashboard': '../erp-dashboard/code.html',
        'inventory': '../erp-inventory/code.html',
        'orders': '../erp-orders/code.html',
        'clients': '../erp-clients/code.html',
        'sales': '../erp-sales/code.html',
        'quotes': '../erp-quotes/code.html',
        'reports': '../erp-reports/code.html',
        'settings': 'code.html',
        'support': '../erp-support/code.html',
        'tracking': '../erp-tracking/code.html',
    },
    'erp-support': {
        'home': '../ecommerce-landing/code.html',
        'dashboard': '../erp-dashboard/code.html',
        'inventory': '../erp-inventory/code.html',
        'orders': '../erp-orders/code.html',
        'clients': '../erp-clients/code.html',
        'sales': '../erp-sales/code.html',
        'quotes': '../erp-quotes/code.html',
        'reports': '../erp-reports/code.html',
        'settings': '../erp-settings/code.html',
        'support': 'code.html',
        'tracking': '../erp-tracking/code.html',
    },
    'erp-tracking': {
        'home': '../ecommerce-landing/code.html',
        'dashboard': '../erp-dashboard/code.html',
        'inventory': '../erp-inventory/code.html',
        'orders': '../erp-orders/code.html',
        'clients': '../erp-clients/code.html',
        'sales': '../erp-sales/code.html',
        'quotes': '../erp-quotes/code.html',
        'reports': '../erp-reports/code.html',
        'settings': '../erp-settings/code.html',
        'support': '../erp-support/code.html',
        'tracking': 'code.html',
    },
}

# Find all code.html files
for root, dirs, files in os.walk(stitch_dir):
    for fname in files:
        if fname == 'code.html':
            filepath = os.path.join(root, fname)
            
            # Determine the page name from folder name
            folder_name = os.path.basename(root)
            
            # Get navigation for this page
            page_nav = NAV.get(folder_name, NAV.get('ecommerce-landing', {}))
            
            # Read the file
            with open(filepath, 'r', encoding='utf-8') as f:
                content = f.read()
            
            # Create navigation HTML
            nav_items = ''
            for key, path in page_nav.items():
                label = key.replace('_', ' ').title()
                if key == 'home':
                    label = 'Inicio'
                elif key == 'catalog':
                    label = 'Catálogo'
                elif key == 'erp':
                    label = 'ERP'
                elif key == 'logout':
                    label = 'Cerrar Sesión'
                nav_items += f'<a href="{path}" class="nav-link">{label}</a>\n'
            
            # Add navigation script before closing head
            nav_script = f'''
<script src="../js/nav.js"></script>
<script>
    // Update navigation links
    document.querySelectorAll('[data-nav]').forEach(link => {{
        const page = link.getAttribute('data-nav');
        const routes = {JSON.dumps(page_nav)};
        if (routes[page]) {{
            link.href = routes[page];
        }}
    }});
</script>
'''
            
            # Insert before </head>
            if '</head>' in content:
                content = content.replace('</head>', nav_script + '</head>')
            
            # Write back
            with open(filepath, 'w', encoding='utf-8') as f:
                f.write(content)
            
            print(f'Updated: {folder_name}/code.html')

print('\nNavigation update complete!')
