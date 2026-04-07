// Service Worker para LA CIMA PWA
const CACHE_NAME = 'la-cima-v1';
const OFFLINE_URL = '/frontend/public/ecommerce/offline.html';

// Archivos para cachear inicialmente
const ASSETS_TO_CACHE = [
  '/frontend/public/ecommerce/index.html',
  '/frontend/public/ecommerce/catalogo_general.html',
  '/frontend/public/ecommerce/contacto.html',
  '/frontend/public/ecommerce/Nosotros.html',
  '/frontend/public/ecommerce/carrito.html',
  '/frontend/public/ecommerce/catalogo_detallado.html',
  '/frontend/public/ecommerce/product-detail-cummins-gasket.html',
  '/frontend/public/ecommerce/your-cart-7-items.html',
  '/frontend/public/ecommerce/e-commerce-la-cima-c-a.html',
  '/frontend/public/ecommerce/gestión-de-productos-inventari.html',
  '/frontend/public/ecommerce/catalog-7-items-selected.html',
  '/frontend/public/auth/login.html',
  '/frontend/public/auth/crear_cuenta.html',
  '/frontend/public/auth/olvido_contraseña.html',
  '/frontend/public/assets/images/logo.png',
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
        // No fallar la instalación si algunos archivos no se pueden cachear
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

// Estrategia de caché: Cache First, luego Network
self.addEventListener('fetch', (event) => {
  // Ignorar solicitudes que no son GET
  if (event.request.method !== 'GET') return;

  // Para navegación HTML, usar Network First con fallback a caché
  if (event.request.mode === 'navigate') {
    event.respondWith(
      fetch(event.request)
        .catch(() => caches.match(OFFLINE_URL))
    );
    return;
  }

  // Para otros recursos: Cache First, luego Network
  event.respondWith(
    caches.match(event.request).then((cachedResponse) => {
      if (cachedResponse) {
        return cachedResponse;
      }

      return fetch(event.request).then((response) => {
        // No cachear respuestas no válidas
        if (!response || response.status !== 200 || response.type !== 'basic') {
          return response;
        }

        // Clonar la respuesta para guardar en caché
        const responseToCache = response.clone();
        caches.open(CACHE_NAME).then((cache) => {
          cache.put(event.request, responseToCache);
        });

        return response;
      });
    }).catch(() => {
      // Si falla todo, retornar página offline para navegación
      if (event.request.mode === 'navigate') {
        return caches.match(OFFLINE_URL);
      }
    })
  );
});

// Manejar mensajes desde el cliente
self.addEventListener('message', (event) => {
  if (event.data && event.data.type === 'SKIP_WAITING') {
    self.skipWaiting();
  }
  
  if (event.data && event.data.type === 'CLEAR_CACHE') {
    caches.keys().then((cacheNames) => {
      cacheNames.forEach((cacheName) => {
        caches.delete(cacheName);
      });
    });
  }
});

// Push Notifications (preparado para futuro)
self.addEventListener('push', (event) => {
  const options = {
    body: event.data.text(),
    icon: '../../assets/images/logo.png',
    badge: '../../assets/images/logo.png',
    vibrate: [100, 50, 100],
    data: {
      dateOfArrival: Date.now(),
      primaryKey: 1
    },
    actions: [
      { action: 'explore', title: 'Ver Catálogo' },
      { action: 'close', title: 'Cerrar' }
    ]
  };

  event.waitUntil(
    self.registration.showNotification('LA CIMA - Repuestos', options)
  );
});

// Click en notificaciones
self.addEventListener('notificationclick', (event) => {
  event.notification.close();

  if (event.action === 'explore') {
    event.waitUntil(
      clients.openWindow('/frontend/public/ecommerce/catalogo_general.html')
    );
  }
});
