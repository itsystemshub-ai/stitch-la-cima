// Service Worker para LA CIMA PWA
const CACHE_NAME = 'la-cima-v2';
const OFFLINE_URL = '/tienda/offline';

// Archivos para cachear inicialmente (Rutas de Laravel)
const ASSETS_TO_CACHE = [
  '/tienda/index',
  '/tienda/catalogo_general',
  '/tienda/contacto',
  '/tienda/nosotros',
  '/tienda/carrito',
  '/tienda/catalogo_detallado',
  '/auth/login',
  '/auth/crear_cuenta',
  '/frontend/public/assets/images/logo.png',
  '/erp/pos',
  '/build/assets/pos.css',
  'https://cdn.tailwindcss.com?plugins=forms,container-queries',
  'https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap',
  'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap'
];

// Instalación del Service Worker
self.addEventListener('install', (event) => {
  event.waitUntil(
    caches.open(CACHE_NAME).then((cache) => {
      console.log('[Service Worker] Cache abierto');
      return cache.addAll(ASSETS_TO_CACHE).catch((error) => {
        console.log('[Service Worker] Error al cachear algunos archivos:', error);
      });
    })
  );
  self.skipWaiting();
});

// Activación del Service Worker
self.addEventListener('activate', (event) => {
  event.waitUntil(
    caches.keys().then((cacheNames) => {
      return Promise.all(
        cacheNames
          .filter((cacheName) => cacheName !== CACHE_NAME)
          .map((cacheName) => caches.delete(cacheName))
      );
    })
  );
  self.clients.claim();
});

// Estrategia de caché: Network First, luego Cache
self.addEventListener('fetch', (event) => {
  if (event.request.method !== 'GET') return;

  // Para navegación HTML
  if (event.request.mode === 'navigate') {
    event.respondWith(
      fetch(event.request)
        .catch(() => caches.match(event.request).then(cachedResponse => {
            return cachedResponse || caches.match(OFFLINE_URL);
        }))
    );
    return;
  }

  // Para otros recursos: Cache First, luego Network
  event.respondWith(
    caches.match(event.request).then((cachedResponse) => {
      if (cachedResponse) return cachedResponse;
      return fetch(event.request).then((response) => {
        if (!response || response.status !== 200 || response.type !== 'basic') {
          return response;
        }
        const responseToCache = response.clone();
        caches.open(CACHE_NAME).then((cache) => {
          cache.put(event.request, responseToCache);
        });
        return response;
      });
    })
  );
});

self.addEventListener('notificationclick', (event) => {
  event.notification.close();
  if (event.action === 'explore') {
    event.waitUntil(
      clients.openWindow('/tienda/catalogo_general')
    );
  }
});

self.addEventListener('sync', (event) => {
  if (event.tag === 'sync-sales') {
    event.waitUntil(syncSales());
  }
});

async function syncSales() {
  console.log('[Service Worker] Sincronizando ventas pendientes...');
}
