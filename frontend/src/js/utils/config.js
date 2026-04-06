/**
 * Global Config - La Cima Zenith ERP
 * Company info and system configuration
 */
const COMPANY = {
  name: 'MAYOR DE REPUESTO LA CIMA, C.A',
  rif: 'J-40308741-5',
  logo: '/assets/images/logo.png',
  email: 'info@lacima.com.ve',
  phone: '+58 241-000-0000',
  address: 'Valencia, Venezuela',
};

const API_BASE = 'http://localhost:3000/api';

// Expose to global scope
window.COMPANY = COMPANY;
window.API_BASE = API_BASE;
