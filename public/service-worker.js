// Service Worker para LA CIMA PWA - Versión Simplificada
const CACHE_NAME = 'la-cima-v4';

// Verificar contexto válido
function checkCaches() {
  try {
    return typeof caches !== 'undefined' && typeof caches.open === 'function';
  } catch (e) {
    return false;
  }
}

if (!checkCaches()) {
  console.log('[SW] Sin soporte para caches');
  self.skipWaiting();
  throw new Error('No caches support');
}

// Install - simplest possible
self.addEventListener('install', (event) => {
  console.log('[SW] Installing v4');
  self.skipWaiting();
});

// Activate - cleanup old caches
self.addEventListener('activate', (event) => {
  event.waitUntil(
    caches.keys().then(keys => 
      Promise.all(
        keys.filter(k => k !== CACHE_NAME).map(k => caches.delete(k))
      )
    )
  );
  self.clients.claim();
});

// Fetch - Network only, no caching
self.addEventListener('fetch', (event) => {
  // Skip non-GET requests
  if (event.request.method !== 'GET') return;
  
  // Skip Chrome extension URLs
  const url = event.request.url;
  if (url.startsWith('chrome-extension:') || url.startsWith('devtools:')) {
    return;
  }
  
  // Just pass through - no caching strategy
  event.respondWith(fetch(event.request).catch(() => {
    return new Response('Offline', { status: 503 });
  }));
});

console.log('[SW] LA CIMA v4 loaded');