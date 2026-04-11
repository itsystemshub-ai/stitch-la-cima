/**
 * Zenith ERP - Constantes de Identidad Corporativa
 * Mayor de Repuesto La Cima, C.A.
 */
const ZENITH_IDENTITY = {
    ENTITY_NAME: "Mayor de Repuesto La Cima, C.A.",
    RIF: "J-40308741-5",
    LOCATION: "Valencia, Venezuela",
    VERSION: "2.5.0 Premium",
    THEME: {
        PRIMARY: "#ceff5e",
        SECONDARY: "#1c1c1c",
        ACCENT: "#3b82f6"
    }
};

if (typeof window !== 'undefined') {
    window.ZENITH_IDENTITY = ZENITH_IDENTITY;
}

// Helper para actualizar el nombre en el DOM automáticamente
function updateInstitutionalIdentity() {
    document.title = `${document.title.split('|')[0]} | ${ZENITH_IDENTITY.ENTITY_NAME}`;
    
    // Buscar elementos que necesiten el nombre
    const entityElements = document.querySelectorAll('.entity-name');
    entityElements.forEach(el => el.textContent = ZENITH_IDENTITY.ENTITY_NAME);

    const rifElements = document.querySelectorAll('.entity-rif');
    rifElements.forEach(el => el.textContent = `RIF: ${ZENITH_IDENTITY.RIF}`);
}

window.addEventListener('DOMContentLoaded', updateInstitutionalIdentity);
