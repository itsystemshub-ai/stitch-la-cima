function switchToGrid() {
        const grid = document.getElementById('productGrid');
        const gridBtn = document.getElementById('gridViewBtn');
        const listBtn = document.getElementById('listViewBtn');
        
        grid.classList.remove('list-view');
        grid.classList.add('editorial-grid');
        
        gridBtn.classList.add('active', 'bg-black', 'text-white');
        gridBtn.classList.remove('text-on-surface-variant', 'hover:bg-stone-200');
        
        listBtn.classList.remove('active', 'bg-black', 'text-white');
        listBtn.classList.add('text-on-surface-variant', 'hover:bg-stone-200');
    }
    
    function switchToList() {
        const grid = document.getElementById('productGrid');
        const gridBtn = document.getElementById('gridViewBtn');
        const listBtn = document.getElementById('listViewBtn');

        grid.classList.remove('editorial-grid');
        grid.classList.add('list-view');

        listBtn.classList.add('active', 'bg-black', 'text-white');
        listBtn.classList.remove('text-on-surface-variant', 'hover:bg-stone-200');

        gridBtn.classList.remove('active', 'bg-black', 'text-white');
        gridBtn.classList.add('text-on-surface-variant', 'hover:bg-stone-200');
    }

    // Search functionality - redirect with query
    const searchInput = document.getElementById('searchInput');
    if (searchInput) {
        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter' && this.value.trim()) {
                window.location.href = '/tienda/catalogo_detallado?q=' + encodeURIComponent(this.value.trim());
            }
        });
    }

    // Read URL query parameters and filter products intelligently
    function handleSearchQuery() {
        const urlParams = new URLSearchParams(window.location.search);
        const query = urlParams.get('q');

        if (query) {
            // Update search input with query
            if (searchInput) {
                searchInput.value = query;
            }

            // Update page title/header to show search results
            const pageTitle = document.querySelector('h1');
            if (pageTitle) {
                pageTitle.innerHTML = 'Resultados para: <span class="text-primary">' + query + '</span>';
            }

            // Normalize search terms - remove accents and lowercase
            const normalizeText = (text) => {
                return text.toLowerCase()
                    .normalize("NFD")
                    .replace(/[\u0300-\u036f]/g, "")
                    .replace(/[^a-z0-9\s]/g, "");
            };

            const searchTerms = query.split(' ').map(normalizeText).filter(t => t.length > 1);
            
            // Filter products based on query - search in title, SKU, and data-tags
            const products = document.querySelectorAll('#productGrid article');
            let visibleCount = 0;

            products.forEach(product => {
                const title = normalizeText(product.querySelector('h3')?.textContent || '');
                const sku = normalizeText(product.querySelector('.text-primary')?.textContent || '');
                const tags = normalizeText(product.getAttribute('data-tags') || '');
                const price = normalizeText(product.querySelector('.text-xl')?.textContent || '');
                
                // Combine all searchable text
                const searchableText = title + ' ' + sku + ' ' + tags + ' ' + price;
                
                // Check if ANY search term matches
                const matches = searchTerms.some(term => searchableText.includes(term));
                
                if (matches) {
                    product.style.display = '';
                    visibleCount++;
                } else {
                    product.style.display = 'none';
                }
            });

            // Update item count display
            const countDisplay = document.querySelector('.text-xs.font-bold');
            if (countDisplay) {
                if (visibleCount > 0) {
                    countDisplay.textContent = `Mostrando ${visibleCount} resultados para "${query}"`;
                } else {
                    countDisplay.textContent = `No se encontraron resultados para "${query}"`;
                }
            }
            
            // Show "no results" message if nothing found
            const productGrid = document.getElementById('productGrid');
            let noResultsMsg = document.getElementById('noResultsMessage');
            
            if (visibleCount === 0) {
                if (!noResultsMsg) {
                    noResultsMsg = document.createElement('div');
                    noResultsMsg.id = 'noResultsMessage';
                    noResultsMsg.className = 'text-center py-16 col-span-full';
                    noResultsMsg.innerHTML = `
                        <span class="material-symbols-outlined text-6xl text-stone-300 mb-4">search_off</span>
                        <h3 class="text-2xl font-black text-black uppercase mb-2">Sin Resultados</h3>
                        <p class="text-stone-500 mb-6">No encontramos productos para "${query}"</p>
                        <a href="/tienda/catalogo_general" class="inline-flex items-center gap-2 bg-black text-primary px-6 py-3 rounded-md font-black text-xs uppercase tracking-widest hover:bg-stone-800 transition-all">
                            <span class="material-symbols-outlined text-sm">storefront</span>
                            Ver Catálogo Completo
                        </a>
                    `;
                    productGrid.appendChild(noResultsMsg);
                } else {
                    noResultsMsg.style.display = '';
                }
            } else {
                if (noResultsMsg) {
                    noResultsMsg.style.display = 'none';
                }
            }
        }
    }

    // Run on page load
    document.addEventListener('DOMContentLoaded', handleSearchQuery);
