require('dotenv').config();
const express = require('express');
const cors = require('cors');
const helmet = require('helmet');
const cookieParser = require('cookie-parser');
const { apiLimiter } = require('./middleware/rateLimitMiddleware');
const path = require('path');
const winston = require('winston');
const fs = require('fs');

// Configuration
const { port, nodeEnv } = require('./config');
const routes = require('./routes');
const syncService = require('./services/syncService');

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

app.use(apiLimiter);

// Security Middleware
app.use(helmet({
  contentSecurityPolicy: nodeEnv === 'production' ? undefined : false,
  crossOriginEmbedderPolicy: false, // Allow CDN assets
}));

const allowedOrigins = process.env.CORS_ORIGINS
  ? process.env.CORS_ORIGINS.split(',')
  : ['http://localhost:5500', 'http://localhost:3000', 'https://zenith-erp.up.railway.app'];

app.use(cors({
  origin: function (origin, callback) {
    if (!origin) return callback(null, true);
    
    // Check if origin matches allowed list or matches local dev pattern
    const isAllowed = allowedOrigins.some(ao => ao === '*' || ao === origin || origin.startsWith('http://localhost:'));
    
    if (isAllowed) {
      callback(null, true);
    } else {
      callback(new Error('Not allowed by CORS Zenith Engine'));
    }
  },
  credentials: true,
  methods: ['GET', 'POST', 'PUT', 'DELETE', 'PATCH', 'OPTIONS'],
  allowedHeaders: ['Content-Type', 'Authorization', 'X-Requested-With']
}));

app.use(express.json({ limit: '10mb' }));
app.use(express.urlencoded({ extended: true, limit: '10mb' }));
app.use(cookieParser());

// Static Files
app.use(express.static(path.join(__dirname, '../public')));
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

const server = require('http').createServer(app);
const socketUtils = require('./utils/socket');
const io = require('socket.io')(server, {
  cors: {
    origin: allowedOrigins,
    methods: ['GET', 'POST'],
    credentials: true
  }
});

// Initialize socket utility
socketUtils.init(io);

// Socket.io connection handling
io.on('connection', (socket) => {
  logger.info(`🔌 Nuevo cliente conectado: ${socket.id}`);
  
  socket.on('disconnect', () => {
    logger.info(`🔌 Cliente desconectado: ${socket.id}`);
  });
});

// Attach io to app for use in controllers
app.set('io', io);

// Graceful shutdown
process.on('SIGTERM', () => {
  logger.info('SIGTERM signal received: closing HTTP server');
  server.close(() => {
    process.exit(0);
  });
});

process.on('unhandledRejection', (reason, promise) => {
  logger.error('Unhandled Rejection at:', promise, 'reason:', reason);
});

process.on('uncaughtException', (error) => {
  logger.error('Uncaught Exception:', error);
  process.exit(1);
});

server.listen(port, '0.0.0.0', () => {
  logger.info(`🚀 Zenith ERP Backend running on port ${port} [${nodeEnv}]`);
  logger.info(`📊 Health check: http://localhost:${port}/api/health`);
  logger.info(`🔌 Real-time enabled via Socket.io`);

  // Iniciar ciclo de sincronización de fondo (automático)
  const SYNC_INTERVAL_MS = parseInt(process.env.SYNC_INTERVAL_MS) || 5 * 60 * 1000; // Default 5 mins
  setInterval(async () => {
    try {
      logger.info('🔄 Iniciando sincronización de fondo...');
      // Solo sincronizar si el nodo tiene habilitada la sincronización
      if (process.env.SYNC_ENABLED === 'true') {
        const result = await syncService.sync();
        logger.info(`✅ Sincronización completada: ${result.summary}`);
      }
    } catch (error) {
      logger.error(`❌ Error en sincronización de fondo: ${error.message}`);
    }
  }, SYNC_INTERVAL_MS);
});

module.exports = { app, server };
