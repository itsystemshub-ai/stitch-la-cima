// Universal Smart Search - Zenith ERP
// This file provides intelligent search functionality across all pages

// Product database for intelligent search
const productDatabase = [
    { id: 'TRB-VGT-84521', name: 'Turboalimentador Variable VGT', oem: '28231-27000', category: 'Motor', brand: 'Toyota', vehicle: 'Hilux 2016-2020', price: '$845.00', image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuDRn-wdKgaOpSBynFvnr0e_fmpdUwmPnpozU-NafufUaamlmKKGX6d-dkHr2aj7_nDx-AKznW0KzL5fIjYG7gtzalG2_9IuNT-hTRWpJiQeJzZ8511dZsT6tl5qkDqAo8LX7qK-hVKM713GcUlIo5wK0hJMgn8yJDs7Of6LasPy_8C4MbxFJrKC_7-xXWWCDrchCbWw_snA5feSSKqCid71lSKHG6-nFtzz1O8S3ya-CRGXCpluZVnH6mf88Zf6m9L0V_NoXpdkOA' },
    { id: 'BRK-9004-HD', name: 'Pastillas de Freno Heavy Duty', oem: '04465-35290', category: 'Frenos', brand: 'Toyota', vehicle: 'Land Cruiser 2016+', price: '$129.50', image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuCNjAH9S_Dx8VtU7mF1yl1gIoO1HHxRUQR20jPWmEZ_fWPK0Lf-aqaHg5SbId7ALpHlPm1IBVe6hQPm83-NLF_KRSd1NILUJYVRLn7UO6bSjWbJHrwIEjbFqo-DEe4gv3JFYAtDUXn6VNxmvX1mo4hAlQY5e3qx9t69T02-YM-fgbgyu5g29n1SbpBH5IfDiboMUFBwLW5HUBLf0gL-uFhYCkYCmLrNxaXuJfXidw71gc1TWNKpa50EjrPRsAU9-GWS_sIc880L1A' },
    { id: 'KIT-MT-2024', name: 'Kit de Filtros Mantenimiento', oem: 'HF28953', category: 'Filtros', brand: 'Ford', vehicle: 'Ranger Raptor 2019+', price: '$54.00', image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuD1LXppgzwzoDNtBCTum-3mUotkQKZr4efvjDbwAOBjwjJE2xZCUgtXD8SPX-_Nrqm76VjHKjH7dT9dKprmE0OBFhJprM5FcDSVVREanO0F4r8SMiO-hTRsbWq77Oy4vN8Zk7C5pJiqCntBy0l2e0yWjv_L5WjI7HIX-r13bq1FI_0xFhYGlLvThi__IzNvRhTRxJ6WmLoXd6SFCDRN_G_2vR0jLH5i2il3DtSt1QLW1MmUWGZsxfKHSnOmdfpVN-ai4OREYR2giw' },
    { id: 'OPT-8820-LED', name: 'Óptica Frontal LED Proyección', oem: '81110-02U80', category: 'Carrocería', brand: 'Toyota', vehicle: 'Corolla X50 2018-2022', price: '$210.00', image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuCrcJwmgPZi9HdRxqunTqDBpRfn4pF3cktXGtXeDeErJkw6Qr0CH6OOarSUXnpPzyA7DqT72dqcSy8u7-h3VsSX86XAAENjxgioCB4WNZwfXPtuR6AxXXTNotht--sFm_e7RL3FjkeUQfE-26tCftzD_frwFhDn1XAoncUkfQRnsU3VZ__P2TJjqMRUe7brF9pyOJYrpl2CyEHUYkAYbJ1zHE9sm8r21lspqmBh19bYhggjkEl8P1sXmOyTVSzh8pvZyxase_kxuQ' },
    { id: 'DIS-4421-VTL', name: 'Kit de Discos de Freno Ventilados', oem: '43512-60290', category: 'Frenos', brand: 'Toyota', vehicle: 'Land Cruiser 2015+', price: '$85.00', image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuCNjAH9S_Dx8VtU7mF1yl1gIoO1HHxRUQR20jPWmEZ_fWPK0Lf-aqaHg5SbId7ALpHlPm1IBVe6hQPm83-NLF_KRSd1NILUJYVRLn7UO6bSjWbJHrwIEjbFqo-DEe4gv3JFYAtDUXn6VNxmvX1mo4hAlQY5e3qx9t69T02-YM-fgbgyu5g29n1SbpBH5IfDiboMUFBwLW5HUBLf0gL-uFhYCkYCmLrNxaXuJfXidw71gc1TWNKpa50EjrPRsAU9-GWS_sIc880L1A' },
    { id: 'INJ-CAT-882', name: 'Inyector de Combustible Heavy Duty', oem: 'CAT-882', category: 'Motor', brand: 'Caterpillar', vehicle: 'CAT C7/C9', price: '$320.00', image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuAiuQeey5lmq6st-vJo1TRQIs8oQtq_4Cg3QyJcj3j5bJguRJRMBb8ZSC_EXi5lrwaP7iFhysnzJ-1xPxNGrK4UF7AT2OeN8ElIvXkr9-fKhD32L0ADYy9Ey15LiRkDN8mJeDuWdAW5rDzkxw-EYW2ydO_BYYgkeF9JIGC8kwEVf-n5FRVlF_rtG7bTZ9VsR_-6AslLZLeyVYNZWjszYl7HOoO_0ZWqNEcN2WLJnxoqR8dzy5OKZhKk8pdLOhI6kvQ7oAHsQ2gQeQ' },
    { id: 'SUS-101-DEL', name: 'Amortiguador Reforzado Delantero', oem: '48510-60440', category: 'Suspensión', brand: 'Toyota', vehicle: 'Land Cruiser 2015+', price: '$145.00', image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuDHtNySrP8HrGI66TLOsvDPkaDg0OsqNHGb13gCFvCGw0QIBbKbi8njt_UPgaMng-OmtqIcDmx0wAhZUrdUXCmDeFIZM1XG2w7u_7l-k80z1giO2h8A-I1XxRLmt3-W6Idk23flMeIDf660-0qi_Dc3Uczsjnu_ZMz4jIfiTbyh7AkLSoXLrM58e4ggXYxH_nVG2JNEMfP0fVELVbhRLEirDlLmeSZR96Sd4mKGltM7moFTxvlb8IZZgiNy_dX4rJRNFQjnr-pwkw' },
    { id: 'TRS-55-FIL', name: 'Filtro de Transmisión Automática', oem: '35330-60010', category: 'Transmisión', brand: 'Toyota', vehicle: 'Land Cruiser 2015+', price: '$42.50', image: '' },
    { id: 'VIN-HTX-2020', name: 'Sensor de Oxígeno Lambda', oem: '89465-02190', category: 'Electrónica', brand: 'Toyota', vehicle: 'Hilux 2016-2020', price: '$95.00', image: '' },
    { id: 'VIN-CLL-2019', name: 'Bomba de Agua', oem: '16100-59475', category: 'Motor', brand: 'Toyota', vehicle: 'Corolla 2019-2023', price: '$78.00', image: '' },
    { id: 'OEM-F150-2021', name: 'Kit de Embrague Completo', oem: 'FL3Z-7550-A', category: 'Transmisión', brand: 'Ford', vehicle: 'F-150 2021+', price: '$285.00', image: '' },
    { id: 'VIN-CAT-C15', name: 'Turbo Compresor C15', oem: '245-3932', category: 'Motor', brand: 'Caterpillar', vehicle: 'CAT C15', price: '$1,850.00', image: '' }
];

// Universal search function
function initSmartSearch(inputId, suggestionsId, resultsCountId, suggestionsListId) {
    const input = document.getElementById(inputId);
    const suggestions = document.getElementById(suggestionsId);
    const resultsCount = document.getElementById(resultsCountId);
    const suggestionsList = document.getElementById(suggestionsListId);
    let searchTimeout = null;

    if (!input) return;

    input.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        const searchTerm = this.value.trim().toLowerCase();

        if (!searchTerm) {
            if (suggestions) suggestions.classList.add('hidden');
            return;
        }

        searchTimeout = setTimeout(() => {
            const matches = productDatabase.filter(p => 
                p.id.toLowerCase().includes(searchTerm) ||
                p.name.toLowerCase().includes(searchTerm) ||
                p.oem.toLowerCase().includes(searchTerm) ||
                p.category.toLowerCase().includes(searchTerm) ||
                p.brand.toLowerCase().includes(searchTerm) ||
                p.vehicle.toLowerCase().includes(searchTerm)
            ).slice(0, 5);

            if (resultsCount) {
                resultsCount.textContent = `${matches.length} encontrado${matches.length !== 1 ? 's' : ''}`;
            }

            if (suggestionsList) {
                if (matches.length === 0) {
                    suggestionsList.innerHTML = `
                        <div class="p-4 text-center">
                            <span class="material-symbols-outlined text-stone-300 text-3xl mb-2">search_off</span>
                            <p class="text-xs text-stone-400">No se encontraron resultados</p>
                        </div>
                    `;
                } else {
                    suggestionsList.innerHTML = matches.map(p => `
                        <div class="p-3 hover:bg-stone-50 cursor-pointer transition-colors border-b border-outline/50 last:border-b-0" onclick="selectSmartProduct('${p.id}', '${inputId}', '${suggestionsId}')">
                            <div class="flex items-center gap-3">
                                ${p.image ? `<img src="${p.image}" class="w-10 h-10 rounded object-cover flex-shrink-0" alt="${p.name}"/>` : `<div class="w-10 h-10 bg-stone-100 rounded flex items-center justify-center flex-shrink-0"><span class="material-symbols-outlined text-stone-400 text-sm">inventory</span></div>`}
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-bold text-black truncate">${p.name}</p>
                                    <p class="text-[10px] text-stone-400">OEM: ${p.oem} | ${p.brand} ${p.vehicle}</p>
                                </div>
                                <span class="text-sm font-black text-primary">${p.price}</span>
                            </div>
                        </div>
                    `).join('');
                }
            }

            if (suggestions) suggestions.classList.remove('hidden');
        }, 300);
    });

    input.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            executeSmartSearch(this.value.trim(), suggestionsId);
        }
    });
}

// Select product from suggestions
function selectSmartProduct(productId, inputId, suggestionsId) {
    const input = document.getElementById(inputId);
    const suggestions = document.getElementById(suggestionsId);
    
    if (input) input.value = productId;
    if (suggestions) suggestions.classList.add('hidden');
    
    window.location.href = `busqueda_resultados.html?q=${encodeURIComponent(productId)}`;
}

// Execute search
function executeSmartSearch(searchTerm, suggestionsId) {
    const suggestions = document.getElementById(suggestionsId);
    if (suggestions) suggestions.classList.add('hidden');
    
    if (searchTerm) {
        window.location.href = `busqueda_resultados.html?q=${encodeURIComponent(searchTerm)}`;
    }
}

// Close suggestions when clicking outside
function initSearchClickOutside(inputId, suggestionsId) {
    document.addEventListener('click', function(e) {
        const input = document.getElementById(inputId);
        const suggestions = document.getElementById(suggestionsId);
        
        if (input && !input.contains(e.target) && suggestions && !suggestions.contains(e.target)) {
            suggestions.classList.add('hidden');
        }
    });
}

// Initialize all search bars on page load
document.addEventListener('DOMContentLoaded', function() {
    // Initialize navbar search
    initSmartSearch('navSearchInput', 'navSearchSuggestions', 'navResultsCount', 'navSuggestionsList');
    initSearchClickOutside('navSearchInput', 'navSearchSuggestions');

    // Initialize hero search
    initSmartSearch('heroSearchInput', 'heroSearchSuggestions', 'heroResultsCount', 'heroSuggestionsList');
    initSearchClickOutside('heroSearchInput', 'heroSearchSuggestions');
});
