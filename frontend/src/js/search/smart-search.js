/**
 * Smart Search Service - La Cima Zenith ERP
 * Uses products-db.js API instead of hardcoded data
 */

let searchDebounceTimer = null;
let currentSuggestions = [];
let selectedSuggestionIndex = -1;

// Initialize smart search on inputs
function initSmartSearch(inputSelector) {
  const inputs = document.querySelectorAll(inputSelector || 'input[data-search], .search-input, #heroSearch, #navSearchInput');

  inputs.forEach(input => {
    // Create suggestions container if not exists
    if (!input.nextElementSibling?.classList.contains('search-suggestions')) {
      const suggestionsEl = document.createElement('div');
      suggestionsEl.className = 'search-suggestions absolute z-50 bg-white rounded-lg shadow-card border border-outline mt-1 w-full max-h-64 overflow-y-auto hidden';
      input.parentNode.style.position = input.parentNode.style.position || 'relative';
      input.parentNode.insertBefore(suggestionsEl, input.nextSibling);
    }

    // Input handler with debounce
    input.addEventListener('input', (e) => {
      clearTimeout(searchDebounceTimer);
      selectedSuggestionIndex = -1;
      
      const query = e.target.value.trim();
      if (query.length < 2) {
        hideSuggestions(input);
        return;
      }

      searchDebounceTimer = setTimeout(() => {
        fetchSuggestions(query, input);
      }, 300);
    });

    // Keyboard navigation
    input.addEventListener('keydown', (e) => {
      const suggestionsEl = getSuggestionsEl(input);
      if (!suggestionsEl || suggestionsEl.classList.contains('hidden')) return;

      const items = suggestionsEl.querySelectorAll('.suggestion-item');
      
      if (e.key === 'ArrowDown') {
        e.preventDefault();
        selectedSuggestionIndex = Math.min(selectedSuggestionIndex + 1, items.length - 1);
        updateSuggestionHighlight(items);
      } else if (e.key === 'ArrowUp') {
        e.preventDefault();
        selectedSuggestionIndex = Math.max(selectedSuggestionIndex - 1, 0);
        updateSuggestionHighlight(items);
      } else if (e.key === 'Enter') {
        e.preventDefault();
        if (selectedSuggestionIndex >= 0 && items[selectedSuggestionIndex]) {
          items[selectedSuggestionIndex].click();
        } else {
          executeSearch(input.value, input);
        }
      } else if (e.key === 'Escape') {
        hideSuggestions(input);
      }
    });

    // Show suggestions on focus
    input.addEventListener('focus', () => {
      if (input.value.trim().length >= 2) {
        fetchSuggestions(input.value.trim(), input);
      }
    });

    // Click outside to dismiss
    input.addEventListener('blur', () => {
      setTimeout(() => hideSuggestions(input), 200);
    });
  });
}

// Fetch suggestions from products-db.js (API-backed)
async function fetchSuggestions(query, input) {
  try {
    const products = await window.getAllProducts ? await getAllProducts() : [];
    const q = query.toLowerCase();
    
    currentSuggestions = products.filter(p => {
      return (
        (p.name && p.name.toLowerCase().includes(q)) ||
        (p.sku && p.sku.toLowerCase().includes(q)) ||
        (p.oem && p.oem.toLowerCase().includes(q)) ||
        (p.brand && p.brand.toLowerCase().includes(q)) ||
        (p.category && p.category.toLowerCase().includes(q)) ||
        (p.vehicle && p.vehicle.toLowerCase().includes(q))
      );
    }).slice(0, 8);

    renderSuggestions(currentSuggestions, input);
  } catch (error) {
    console.error('Error fetching search suggestions:', error);
  }
}

// Render suggestions dropdown
function renderSuggestions(products, input) {
  const suggestionsEl = getSuggestionsEl(input);
  if (!suggestionsEl) return;

  if (products.length === 0) {
    suggestionsEl.innerHTML = `
      <div class="p-4 text-center text-stone-500 text-sm">
        No se encontraron resultados para "${input.value}"
      </div>
    `;
    suggestionsEl.classList.remove('hidden');
    return;
  }

  suggestionsEl.innerHTML = products.map((p, index) => `
    <div class="suggestion-item flex items-center gap-3 px-4 py-3 hover:bg-surface-dim cursor-pointer transition-colors border-b border-outline last:border-b-0" 
         data-index="${index}"
         onclick="selectSmartProduct('${p.id}')">
      <span class="material-symbols-outlined text-stone-400 text-lg">search</span>
      <div class="flex-1 min-w-0">
        <div class="text-sm font-medium text-stone-900 truncate">${highlightQuery(p.name, input.value)}</div>
        <div class="text-xs text-stone-500">${p.brand} • ${p.sku} • $${p.price.toFixed(2)}</div>
      </div>
      ${p.stock > 0 ? '<span class="text-xs text-green-600 font-medium">En stock</span>' : '<span class="text-xs text-orange-600 font-medium">Bajo pedido</span>'}
    </div>
  `).join('');

  suggestionsEl.classList.remove('hidden');
}

// Select a product from suggestions
function selectSmartProduct(productId) {
  window.location.href = `ficha-tecnica.html?id=${productId}`;
}

// Execute search and redirect to results page
function executeSearch(query, input) {
  if (query.trim()) {
    window.location.href = `busqueda.html?q=${encodeURIComponent(query.trim())}`;
  }
}

// Get suggestions element
function getSuggestionsEl(input) {
  return input.nextElementSibling;
}

// Hide suggestions
function hideSuggestions(input) {
  const suggestionsEl = getSuggestionsEl(input);
  if (suggestionsEl) {
    suggestionsEl.classList.add('hidden');
  }
}

// Update keyboard highlight
function updateSuggestionHighlight(items) {
  items.forEach((item, index) => {
    if (index === selectedSuggestionIndex) {
      item.classList.add('bg-surface-dim');
    } else {
      item.classList.remove('bg-surface-dim');
    }
  });
}

// Highlight matching query in text
function highlightQuery(text, query) {
  if (!text || !query) return text;
  const regex = new RegExp(`(${query})`, 'gi');
  return text.replace(regex, '<mark class="bg-primary/20 text-inherit rounded px-0.5">$1</mark>');
}

// Initialize on DOMContentLoaded
document.addEventListener('DOMContentLoaded', function() {
  initSmartSearch();
});
