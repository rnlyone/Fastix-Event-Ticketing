var staticCacheName = "pwa-v" + new Date().getTime();
var filesToCache = [
    '/offline',
    '/v30/images/pictures/20.png',
    '/images/icons/icon-72x72.png',
    '/images/icons/icon-96x96.png',
    '/images/icons/icon-128x128.png',
    '/images/icons/icon-144x144.png',
    '/images/icons/icon-152x152.png',
    '/images/icons/icon-192x192.png',
    '/images/icons/icon-384x384.png',
    '/images/icons/icon-512x512.png',
    '/images/icons/splash-640x1136.png',
    '/images/icons/splash-750x1334.png',
    '/images/icons/splash-1242x2208.png',
    '/images/icons/splash-1125x2436.png',
    '/images/icons/splash-828x1792.png',
    '/images/icons/splash-1242x2688.png',
    '/images/icons/splash-1536x2048.png',
    '/images/icons/splash-1668x2224.png',
    '/images/icons/splash-1668x2388.png',
    '/images/icons/splash-2048x2732.png',
    '/scripts/bootstrap.min.js',
    '/assets/css/vendor/bootstrap.min.css',
    '/scripts/custom.js',
    '/fonts/css/fontawesome-all.min.css',
    '/styles/bootstrap.css'
];
var APP_NAME = 'FASTIX';
var APP_VER = '1.0';
var CACHE_NAME = APP_NAME + '-' + APP_VER;
const OFFLINE_URL = '/offline';

var APP_DIAG = false;

// Cache on install
self.addEventListener('install', function(event) {
	event.waitUntil(
		caches.open(CACHE_NAME)
		.then(function(cache) {
			//Adding files to cache
			return cache.addAll(filesToCache);
		}).catch(function(error) {
			//Output error if file locations are incorrect
			if(APP_DIAG){console.log('Service Worker Cache: Error Check filesToCache array in _service-worker.js - files are missing or path to files is incorrectly written -  ' + error);}
		})
		.then(function() {
			//Install SW if everything is ok
			return self.skipWaiting();
		})
		.then(function(){
			if(APP_DIAG){console.log('Service Worker: Cache is OK');}
		})
	);
	if(APP_DIAG){console.log('Service Worker: Installed');}
});

// Clear cache on activate
self.addEventListener('activate', function(event) {
	event.waitUntil(self.clients.claim());
	event.waitUntil(
		//Check cache number, clear all assets and re-add if cache number changed
		caches.keys().then(cacheNames => {
			return Promise.all(
				cacheNames
					.filter(cacheName => (cacheName.startsWith(APP_NAME + "-")))
					.filter(cacheName => (cacheName !== CACHE_NAME))
					.map(cacheName => caches.delete(cacheName))
			);
		})
	);
	if(APP_DIAG){console.log('Service Worker: Activated')}
});

self.addEventListener('fetch', function(event) {
    console.log('[Service Worker] Fetch', event.request.url);
    if (event.request.mode === 'navigate') {
      event.respondWith((async () => {
        try {
          const preloadResponse = await event.preloadResponse;
          if (preloadResponse) {
            return preloadResponse;
          }

          const networkResponse = await fetch(event.request);
          return networkResponse;
        } catch (error) {
          console.log('[Service Worker] Fetch failed; returning offline page instead.', error);

          const cache = await caches.open(CACHE_NAME);
          const cachedResponse = await cache.match(OFFLINE_URL);
          return cachedResponse;
        }
      })());
    }
  });
