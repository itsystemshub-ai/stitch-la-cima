/**
 * Rate Limiting Configuration
 * La Cima Zenith ERP - Security Improvement
 * Protects API from brute force and abuse
 */
const rateLimit = require('express-rate-limit');

// General API rate limit (100 requests per 15 minutes per IP)
const apiLimiter = rateLimit({
  windowMs: 15 * 60 * 1000, // 15 minutes
  max: 100, // Limit each IP to 100 requests per windowMs
  message: {
    success: false,
    message: 'Demasiadas peticiones. Por favor intente nuevamente en 15 minutos.',
  },
  standardHeaders: true, // Return rate limit info in the `RateLimit-*` headers
  legacyHeaders: false, // Disable the `X-RateLimit-*` headers
});

// Strict rate limit for auth endpoints (5 requests per 15 minutes per IP)
const authLimiter = rateLimit({
  windowMs: 15 * 60 * 1000, // 15 minutes
  max: 5, // Limit each IP to 5 requests per windowMs
  message: {
    success: false,
    message: 'Demasiados intentos de autenticación. Por favor espere 15 minutos.',
  },
  standardHeaders: true,
  legacyHeaders: false,
});

// Medium rate limit for write operations (30 requests per 15 minutes per IP)
const writeLimiter = rateLimit({
  windowMs: 15 * 60 * 1000, // 15 minutes
  max: 30, // Limit each IP to 30 requests per windowMs
  message: {
    success: false,
    message: 'Demasiadas operaciones. Por favor intente nuevamente en 15 minutos.',
  },
  standardHeaders: true,
  legacyHeaders: false,
});

module.exports = {
  apiLimiter,
  authLimiter,
  writeLimiter,
};
