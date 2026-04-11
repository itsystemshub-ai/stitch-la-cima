/* ============================================
   ERP La Cima - JavaScript
   Archivo: inicio.js
   ============================================ */

   
// Verificar autenticación al cargar
(function() {
  const isLoggedIn = localStorage.getItem('erp_session') === 'true';
  if (!isLoggedIn) window.location.href = '/auth/login';
})();

// Resaltar página actual en sidebar se maneja en zenith-layout.js
// Pero mantenemos lógica específica de inicio si existiera.
