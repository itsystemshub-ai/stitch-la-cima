function switchToGrid() {
    const gridContainer = document.getElementById('gridViewContainer');
    const listContainer = document.getElementById('listViewContainer');
    const gridBtn = document.getElementById('gridViewBtn');
    const listBtn = document.getElementById('listViewBtn');
    
    if (gridContainer && listContainer) {
        gridContainer.classList.remove('hidden');
        listContainer.classList.add('hidden');
    }
    
    if (gridBtn && listBtn) {
        gridBtn.classList.add('bg-stone-900', 'text-primary');
        gridBtn.classList.remove('text-stone-400', 'hover:bg-stone-100');
        listBtn.classList.add('text-stone-400', 'hover:bg-stone-100');
        listBtn.classList.remove('bg-stone-900', 'text-primary');
    }
}

function switchToList() {
    const gridContainer = document.getElementById('gridViewContainer');
    const listContainer = document.getElementById('listViewContainer');
    const gridBtn = document.getElementById('gridViewBtn');
    const listBtn = document.getElementById('listViewBtn');
    
    if (gridContainer && listContainer) {
        gridContainer.classList.add('hidden');
        listContainer.classList.remove('hidden');
    }
    
    if (gridBtn && listBtn) {
        listBtn.classList.add('bg-stone-900', 'text-primary');
        listBtn.classList.remove('text-stone-400', 'hover:bg-stone-100');
        gridBtn.classList.add('text-stone-400', 'hover:bg-stone-100');
        gridBtn.classList.remove('bg-stone-900', 'text-primary');
    }
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
            
            // Filter products based on query - search in title, SKU, etc.
            const gridItems = document.querySelectorAll('#productGrid article');
            const tableRows = document.querySelectorAll('#listViewContainer tbody tr');
            let visibleCount = 0;

            const filterItem = (item, isRow = false) => {
                const title = normalizeText(item.querySelector(isRow ? 'a' : 'h3')?.textContent || '');
                const sku = normalizeText(item.querySelector(isRow ? '.font-mono' : '.text-mono')?.textContent || '');
                const searchableText = title + ' ' + sku;
                
                const matches = searchTerms.some(term => searchableText.includes(term));
                
                if (matches) {
                    item.style.display = isRow ? 'table-row' : '';
                    visibleCount++;
                } else {
                    item.style.display = 'none';
                }
            };

            gridItems.forEach(item => filterItem(item, false));
            // Only count once if showing both? No, they are mirrors. 
            // Reset visibleCount for rows if we want total unique products, 
            // but for simplicity we just filter both.
            let tableVisibleCount = 0;
            tableRows.forEach(row => {
                const title = normalizeText(row.querySelector('td:nth-child(3) a')?.textContent || '');
                const sku = normalizeText(row.querySelector('td:nth-child(2) span')?.textContent || '');
                const searchableText = title + ' ' + sku;
                const matches = searchTerms.some(term => searchableText.includes(term));
                if (matches) {
                    row.style.display = 'table-row';
                    tableVisibleCount++;
                } else {
                    row.style.display = 'none';
                }
            });
            
            // Sync visible count (assuming both represent the same set)
            visibleCount = Math.max(visibleCount, tableVisibleCount);

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