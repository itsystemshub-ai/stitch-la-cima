const express = require('express');
const http = require('http');
const { Server } = require('socket.io');
const cors = require('cors');
const helmet = require('helmet');
const cookieParser = require('cookie-parser');
const expressLayouts = require('express-ejs-layouts');
const path = require('path');
require('dotenv').config();

const sequelize = require('./config/database');

// Routes
const authRoutes = require('./routes/auth.routes');
const userRoutes = require('./routes/user.routes');
const productRoutes = require('./routes/product.routes');
const categoryRoutes = require('./routes/category.routes');
const cartRoutes = require('./routes/cart.routes');
const orderRoutes = require('./routes/order.routes');
const b2bRoutes = require('./routes/b2b.routes');
const recoveryRoutes = require('./routes/recovery.routes');
const viewRoutes = require('./routes/view.routes');

const app = express();
const server = http.createServer(app);

// Socket.IO setup
const io = new Server(server, {
  cors: {
    origin: process.env.FRONTEND_URL || '*',
    methods: ['GET', 'POST'],
  },
});

// Middleware - Configure CSP to allow Tailwind CDN, inline scripts, and external images
app.use(helmet({
  contentSecurityPolicy: {
    directives: {
      defaultSrc: ["'self'"],
      scriptSrc: ["'self'", "'unsafe-inline'", "https://cdn.tailwindcss.com", "https://cdn.jsdelivr.net"],
      styleSrc: ["'self'", "'unsafe-inline'", "https://fonts.googleapis.com", "https://cdn.jsdelivr.net"],
      fontSrc: ["'self'", "https://fonts.gstatic.com", "data:"],
      imgSrc: ["'self'", "data:", "https:", "http:"],
      connectSrc: ["'self'", "http://localhost:3000", "ws:"],
      frameSrc: ["'none'"],
      objectSrc: ["'none'"],
      upgradeInsecureRequests: [],
    },
  },
  crossOriginEmbedderPolicy: false,
}));
app.use(cors());
app.use(cookieParser());
app.use(express.json());
app.use(express.urlencoded({ extended: true }));

// View engine setup
app.set('view engine', 'ejs');
app.set('views', path.join(__dirname, 'views'));
app.set('layout', 'layouts/main');
app.use(expressLayouts);

// Static files - Serve original HTML and assets from frontend/
app.use(express.static(path.join(__dirname, '../../frontend/public/ecommerce')));
app.use('/erp', express.static(path.join(__dirname, '../../frontend/public/erp')));
app.use('/src/js', express.static(path.join(__dirname, '../../frontend/src/js')));
app.use('/src/scss', express.static(path.join(__dirname, '../../frontend/src/scss')));
app.use('/css', express.static(path.join(__dirname, '../public')));

// Make io and sequelize available to routes
app.use((req, res, next) => {
  req.io = io;
  next();
});

// API Routes
app.use('/api/auth', authRoutes);
app.use('/api/users', userRoutes);
app.use('/api/products', productRoutes);
app.use('/api/categories', categoryRoutes);
app.use('/api/cart', cartRoutes);
app.use('/api/orders', orderRoutes);
app.use('/api/b2b', b2bRoutes);
app.use('/api/recovery', recoveryRoutes);

// View Routes (dynamic page rendering)
app.use('/', viewRoutes);

// Health check
app.get('/api/health', (req, res) => {
  res.json({ status: 'ok', timestamp: new Date().toISOString() });
});

// Socket.IO real-time events
io.on('connection', (socket) => {
  console.log(`🔌 Cliente conectado: ${socket.id}`);

  // Join user to their own room
  socket.on('join', (userId) => {
    socket.join(`user:${userId}`);
    console.log(`User ${userId} joined room`);
  });

  // Product stock updates
  socket.on('product:stock:update', (data) => {
    io.emit('product:stock:changed', data);
  });

  // New order notification
  socket.on('order:created', (order) => {
    io.emit('order:new', order);
  });

  // Order status update
  socket.on('order:status:update', (data) => {
    io.to(`user:${data.userId}`).emit('order:status:changed', data);
  });

  // Cart updated
  socket.on('cart:updated', (data) => {
    io.to(`user:${data.userId}`).emit('cart:change', data);
  });

  // Low stock alert
  socket.on('stock:alert', (data) => {
    io.emit('stock:low', data);
  });

  socket.on('disconnect', () => {
    console.log(`❌ Cliente desconectado: ${socket.id}`);
  });
});

// Export io for use in controllers
module.exports.io = io;

// Error handling middleware
app.use((err, req, res, next) => {
  console.error(err.stack);
  res.status(err.status || 500).json({
    success: false,
    message: err.message || 'Error interno del servidor',
    ...(process.env.NODE_ENV === 'development' && { stack: err.stack }),
  });
});

// Start server
const PORT = process.env.PORT || 3000;

async function start() {
  try {
    await sequelize.authenticate();
    console.log('✅ Base de datos conectada');
    
    if (process.env.NODE_ENV === 'development') {
      await sequelize.sync({ force: false });
      console.log('✅ Base de datos sincronizada');
    }
    
    server.listen(PORT, () => {
      console.log(`\n🚀 Zenith ERP corriendo en http://localhost:${PORT}`);
      console.log(`📊 Entorno: ${process.env.NODE_ENV || 'development'}`);
      console.log(`📦 API: http://localhost:${PORT}/api/health`);
      console.log(`🖥️  Web: http://localhost:${PORT}/\n`);
      console.log(`🔌 Socket.IO activo para actualizaciones en tiempo real\n`);
    });
  } catch (error) {
    console.error('❌ Error al iniciar el servidor:', error);
    process.exit(1);
  }
}

start();
