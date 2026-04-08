require('dotenv').config();
const express = require('express');
const cors = require('cors');
const helmet = require('helmet');
const cookieParser = require('cookie-parser');
const rateLimit = require('express-rate-limit');
const path = require('path');
const winston = require('winston');
const fs = require('fs');

// Configuration
const { port, nodeEnv } = require('./config');
const routes = require('./routes');

// Create logs directory if it doesn't exist
if (!fs.existsSync('logs')) {
  fs.mkdirSync('logs', { recursive: true });
}

// Logger initialization
const logger = winston.createLogger({
  level: process.env.LOG_LEVEL || (nodeEnv === 'production' ? 'info' : 'debug'),
  format: winston.format.combine(
    winston.format.timestamp(),
    winston.format.json()
  ),
  transports: [
    new winston.transports.Console({
      format: winston.format.combine(
        winston.format.colorize(),
        winston.format.simple()
      ),
    }),
    new winston.transports.File({ filename: 'logs/error.log', level: 'error' }),
    new winston.transports.File({ filename: 'logs/combined.log' }),
  ],
});

const app = express();

// Trust proxy (for behind reverse proxy like nginx, Railway, Render)
app.set('trust proxy', 1);

// Rate Limiting
const limiter = rateLimit({
  windowMs: parseInt(process.env.RATE_LIMIT_WINDOW_MS) || 15 * 60 * 1000, // 15 minutes
  max: parseInt(process.env.RATE_LIMIT_MAX_REQUESTS) || 100, // limit each IP to 100 requests per windowMs
  message: {
    status: 'error',
    message: 'Demasiadas peticiones, por favor intente de nuevo más tarde.',
  },
  standardHeaders: true,
  legacyHeaders: false,
});

app.use(limiter);

// Security Middleware
app.use(helmet({
  contentSecurityPolicy: nodeEnv === 'production' ? undefined : false,
  crossOriginEmbedderPolicy: false, // Allow CDN assets
}));

// CORS Configuration
const allowedOrigins = process.env.CORS_ORIGINS
  ? process.env.CORS_ORIGINS.split(',')
  : [process.env.FRONTEND_URL || 'http://localhost:5500'];

app.use(cors({
  origin: function (origin, callback) {
    // Allow requests with no origin (mobile apps, Postman, etc.)
    if (!origin) return callback(null, true);
    
    if (allowedOrigins.indexOf(origin) !== -1 || allowedOrigins.includes('*')) {
      callback(null, true);
    } else {
      callback(new Error('Not allowed by CORS'));
    }
  },
  credentials: true,
  methods: ['GET', 'POST', 'PUT', 'DELETE', 'PATCH', 'OPTIONS'],
  allowedHeaders: ['Content-Type', 'Authorization', 'X-Requested-With'],
}));

app.use(express.json({ limit: '10mb' }));
app.use(express.urlencoded({ extended: true, limit: '10mb' }));
app.use(cookieParser());

// Static Files
app.use('/uploads', express.static(path.join(__dirname, '../uploads')));

// Health Check Endpoint
app.get('/api/health', (req, res) => {
  res.status(200).json({
    status: 'ok',
    timestamp: new Date().toISOString(),
    uptime: process.uptime(),
    environment: nodeEnv,
    version: require('../package.json').version,
  });
});

// Routes
app.use('/api', routes);

// 404 handler
app.use((req, res) => {
  res.status(404).json({
    status: 'error',
    message: 'Recurso no encontrado',
  });
});

// Global Error Handler
app.use((err, req, res, next) => {
  logger.error(err.stack);
  
  // Prisma error handling
  if (err.code?.startsWith('P2')) {
    return res.status(500).json({
      status: 'error',
      message: 'Error de base de datos',
    });
  }

  res.status(err.status || 500).json({
    status: 'error',
    message: nodeEnv === 'production' ? 'Error interno del servidor' : err.message,
  });
});

// Graceful shutdown
process.on('SIGTERM', () => {
  logger.info('SIGTERM signal received: closing HTTP server');
  process.exit(0);
});

process.on('unhandledRejection', (reason, promise) => {
  logger.error('Unhandled Rejection at:', promise, 'reason:', reason);
});

process.on('uncaughtException', (error) => {
  logger.error('Uncaught Exception:', error);
  process.exit(1);
});

app.listen(port, '0.0.0.0', () => {
  logger.info(`🚀 Zenith ERP Backend running on port ${port} [${nodeEnv}]`);
  logger.info(`📊 Health check: http://localhost:${port}/api/health`);
});

module.exports = app;
