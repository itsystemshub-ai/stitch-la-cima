const jwt = require('jsonwebtoken');
const { User, ActivityLog } = require('../models');

// Generate JWT token
const generateToken = (userId) => {
  return jwt.sign(
    { userId },
    process.env.JWT_SECRET,
    { expiresIn: process.env.JWT_EXPIRE || '24h' }
  );
};

// Generate refresh token
const generateRefreshToken = (userId) => {
  return jwt.sign(
    { userId },
    process.env.JWT_SECRET,
    { expiresIn: process.env.JWT_REFRESH_EXPIRE || '7d' }
  );
};

// POST /api/auth/login
const login = async (req, res) => {
  try {
    const { email, password } = req.body;

    if (!email || !password) {
      return res.status(400).json({
        success: false,
        message: 'Email y contraseña son requeridos',
      });
    }

    const user = await User.findOne({ where: { email } });

    if (!user) {
      return res.status(401).json({
        success: false,
        message: 'Credenciales inválidas',
      });
    }

    const isPasswordValid = await user.comparePassword(password);

    if (!isPasswordValid) {
      return res.status(401).json({
        success: false,
        message: 'Credenciales inválidas',
      });
    }

    // Update last login
    await user.update({ lastLogin: new Date() });

    // Log activity
    await ActivityLog.create({
      userId: user.id,
      action: 'LOGIN',
      details: 'Inicio de sesión exitoso',
      ip: req.ip,
      userAgent: req.headers['user-agent'],
    });

    const token = generateToken(user.id);
    const refreshToken = generateRefreshToken(user.id);

    // Set cookie for server-side rendering
    res.cookie('token', token, {
      httpOnly: true,
      maxAge: 24 * 60 * 60 * 1000, // 24h
      sameSite: 'lax',
    });

    res.json({
      success: true,
      data: {
        user,
        token,
        refreshToken,
        expires: new Date(Date.now() + 24 * 60 * 60 * 1000).toISOString(),
      },
    });
  } catch (error) {
    console.error('Error en login:', error);
    res.status(500).json({
      success: false,
      message: 'Error interno del servidor',
    });
  }
};

// POST /api/auth/register
const register = async (req, res) => {
  try {
    const { name, email, phone, password, role } = req.body;

    if (!name || !email || !password) {
      return res.status(400).json({
        success: false,
        message: 'Nombre, email y contraseña son requeridos',
      });
    }

    const existingUser = await User.findOne({ where: { email } });

    if (existingUser) {
      return res.status(409).json({
        success: false,
        message: 'El email ya está registrado',
      });
    }

    const user = await User.create({
      name,
      email,
      phone,
      password,
      role: role || 'user',
    });

    // Log activity
    await ActivityLog.create({
      userId: user.id,
      action: 'REGISTER',
      details: 'Registro de usuario',
      ip: req.ip,
      userAgent: req.headers['user-agent'],
    });

    const token = generateToken(user.id);

    res.status(201).json({
      success: true,
      data: {
        user,
        token,
      },
    });
  } catch (error) {
    console.error('Error en registro:', error);
    res.status(500).json({
      success: false,
      message: 'Error interno del servidor',
    });
  }
};

// POST /api/auth/register-b2b
const registerB2B = async (req, res) => {
  try {
    const { name, email, phone, password, company, rif, businessType } = req.body;

    if (!name || !email || !password || !company || !rif) {
      return res.status(400).json({
        success: false,
        message: 'Todos los campos son requeridos',
      });
    }

    const existingUser = await User.findOne({ where: { email } });

    if (existingUser) {
      return res.status(409).json({
        success: false,
        message: 'El email ya está registrado',
      });
    }

    const user = await User.create({
      name,
      email,
      phone,
      password,
      role: 'pending_b2b',
      company,
      rif,
      businessType,
      status: 'pending_approval',
    });

    // Log activity
    await ActivityLog.create({
      userId: user.id,
      action: 'REGISTER_B2B',
      details: `Registro B2B pendiente: ${company}`,
      ip: req.ip,
      userAgent: req.headers['user-agent'],
    });

    res.status(201).json({
      success: true,
      data: {
        message: 'Registro B2B pendiente de aprobación',
        user,
      },
    });
  } catch (error) {
    console.error('Error en registro B2B:', error);
    res.status(500).json({
      success: false,
      message: 'Error interno del servidor',
    });
  }
};

// POST /api/auth/refresh
const refreshToken = async (req, res) => {
  try {
    const { refreshToken } = req.body;

    if (!refreshToken) {
      return res.status(400).json({
        success: false,
        message: 'Refresh token es requerido',
      });
    }

    const decoded = jwt.verify(refreshToken, process.env.JWT_SECRET);
    const user = await User.findByPk(decoded.userId);

    if (!user) {
      return res.status(401).json({
        success: false,
        message: 'Usuario no encontrado',
      });
    }

    const newToken = generateToken(user.id);
    const newRefreshToken = generateRefreshToken(user.id);

    res.json({
      success: true,
      data: {
        token: newToken,
        refreshToken: newRefreshToken,
        expires: new Date(Date.now() + 24 * 60 * 60 * 1000).toISOString(),
      },
    });
  } catch (error) {
    res.status(401).json({
      success: false,
      message: 'Refresh token inválido',
    });
  }
};

// POST /api/auth/logout
const logout = async (req, res) => {
  try {
    if (req.user) {
      await ActivityLog.create({
        userId: req.user.id,
        action: 'LOGOUT',
        details: 'Cierre de sesión',
        ip: req.ip,
        userAgent: req.headers['user-agent'],
      });
    }

    res.json({
      success: true,
      message: 'Sesión cerrada exitosamente',
    });
  } catch (error) {
    res.status(500).json({
      success: false,
      message: 'Error interno del servidor',
    });
  }
};

// GET /api/auth/me
const getMe = async (req, res) => {
  try {
    const user = await User.findByPk(req.user.id);

    res.json({
      success: true,
      data: user,
    });
  } catch (error) {
    res.status(500).json({
      success: false,
      message: 'Error interno del servidor',
    });
  }
};

module.exports = {
  login,
  register,
  registerB2B,
  refreshToken,
  logout,
  getMe,
};
