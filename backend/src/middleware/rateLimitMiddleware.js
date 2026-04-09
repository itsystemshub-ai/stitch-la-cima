const rateLimit = require('express-rate-limit');

/**
 * General rate limiter for all API requests
 */
const apiLimiter = rateLimit({
  windowMs: 15 * 60 * 1000, // 15 minutes
  max: 100, // 100 requests per windowMs
  message: {
    status: 'error',
    message: 'Demasiadas peticiones desde esta IP, por favor intente de nuevo en 15 minutos.'
  },
  standardHeaders: true,
  legacyHeaders: false,
});

/**
 * Specific rate limiter for authentication routes (prevent brute force)
 */
const authLimiter = rateLimit({
  windowMs: 60 * 60 * 1000, // 1 hour
  max: 5, // 5 attempts per hour (stricter for production)
  message: {
    status: 'error',
    message: 'Demasiados intentos fallidos, su acceso ha sido restringido por una hora.'
  },
  standardHeaders: true,
  legacyHeaders: false,
});

module.exports = {
  apiLimiter,
  authLimiter
};
