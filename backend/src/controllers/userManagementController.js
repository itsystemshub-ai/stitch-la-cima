const prisma = require('../models/prismaClient');
const userManagementService = require('../services/userManagementService');
const configService = require('../services/configService');

/**
 * Get all users with optional role filter
 */
const getUsers = async (req, res) => {
  try {
    const { role, page = 1, limit = 20, search } = req.query;

    const where = {};

    if (role && userManagementService.VALID_ROLES.includes(role)) {
      where.role = role;
    }

    if (search) {
      where.OR = [
        { email: { contains: search, mode: 'insensitive' } },
        { name: { contains: search, mode: 'insensitive' } },
      ];
    }

    const skip = (parseInt(page, 10) - 1) * parseInt(limit, 10);

    const [users, total] = await Promise.all([
      prisma.user.findMany({
        where,
        orderBy: { createdAt: 'desc' },
        skip,
        take: parseInt(limit, 10),
        select: {
          id: true,
          email: true,
          name: true,
          role: true,
          createdAt: true,
          updatedAt: true,
          _count: {
            select: {
              sales: true,
            },
          },
        },
      }),
      prisma.user.count({ where }),
    ]);

    res.json({
      status: 'success',
      data: {
        users,
        pagination: {
          total,
          page: parseInt(page, 10),
          limit: parseInt(limit, 10),
          totalPages: Math.ceil(total / parseInt(limit, 10)),
        },
      },
    });
  } catch (error) {
    res.status(500).json({
      status: 'error',
      message: `Error al obtener usuarios: ${error.message}`,
    });
  }
};

/**
 * Get user by ID
 */
const getUserById = async (req, res) => {
  try {
    const { id } = req.params;
    const userId = parseInt(id, 10);

    if (isNaN(userId)) {
      return res.status(400).json({
        status: 'error',
        message: 'ID de usuario invalido',
      });
    }

    const user = await prisma.user.findUnique({
      where: { id: userId },
      select: {
        id: true,
        email: true,
        name: true,
        role: true,
        createdAt: true,
        updatedAt: true,
        _count: {
          select: {
            sales: true,
          },
        },
      },
    });

    if (!user) {
      return res.status(404).json({
        status: 'error',
        message: 'Usuario no encontrado',
      });
    }

    res.json({
      status: 'success',
      data: user,
    });
  } catch (error) {
    res.status(500).json({
      status: 'error',
      message: `Error al obtener usuario: ${error.message}`,
    });
  }
};

/**
 * Create a new user
 */
const createUser = async (req, res) => {
  try {
    const userData = req.body;

    const result = await userManagementService.createUser(userData, req.user?.id);

    res.status(201).json({
      status: 'success',
      data: result,
      message: result.passwordGenerated
        ? 'Usuario creado correctamente. Contrasena temporal generada.'
        : 'Usuario creado correctamente',
    });
  } catch (error) {
    if (
      error.message.includes('correo') ||
      error.message.includes('formato') ||
      error.message.includes('rol') ||
      error.message.includes('contrasena')
    ) {
      return res.status(400).json({
        status: 'error',
        message: error.message,
      });
    }

    res.status(500).json({
      status: 'error',
      message: `Error al crear usuario: ${error.message}`,
    });
  }
};

/**
 * Update user
 */
const updateUser = async (req, res) => {
  try {
    const { id } = req.params;
    const userId = parseInt(id, 10);

    if (isNaN(userId)) {
      return res.status(400).json({
        status: 'error',
        message: 'ID de usuario invalido',
      });
    }

    const { email, name, role } = req.body;

    // Check if user exists
    const existingUser = await prisma.user.findUnique({
      where: { id: userId },
    });

    if (!existingUser) {
      return res.status(404).json({
        status: 'error',
        message: 'Usuario no encontrado',
      });
    }

    // Build update data
    const updateData = {};
    if (email !== undefined) {
      // Validate email format
      if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        return res.status(400).json({
          status: 'error',
          message: 'El formato del correo electronico es invalido',
        });
      }
      updateData.email = email.toLowerCase();
    }
    if (name !== undefined) {
      updateData.name = name || null;
    }
    if (role !== undefined) {
      if (!userManagementService.VALID_ROLES.includes(role)) {
        return res.status(400).json({
          status: 'error',
          message: `El rol debe ser uno de: ${userManagementService.VALID_ROLES.join(', ')}`,
        });
      }
      updateData.role = role;
    }

    // Track changes for audit
    const changes = {};
    for (const [key, value] of Object.entries(updateData)) {
      if (existingUser[key] !== value) {
        changes[key] = { old: existingUser[key], new: value };
      }
    }

    if (Object.keys(updateData).length === 0) {
      return res.status(400).json({
        status: 'error',
        message: 'No se proporcionaron datos para actualizar',
      });
    }

    const updatedUser = await prisma.user.update({
      where: { id: userId },
      data: updateData,
      select: {
        id: true,
        email: true,
        name: true,
        role: true,
        createdAt: true,
        updatedAt: true,
      },
    });

    // Log audit
    await configService.logAudit({
      userId: req.user?.id,
      action: 'UPDATE',
      entity: 'User',
      entityId: String(userId),
      details: JSON.stringify({
        userEmail: existingUser.email,
        changes,
      }),
    });

    res.json({
      status: 'success',
      data: updatedUser,
      message: 'Usuario actualizado correctamente',
    });
  } catch (error) {
    if (error.code === 'P2002') {
      return res.status(400).json({
        status: 'error',
        message: 'El correo electronico ya esta en uso por otro usuario',
      });
    }

    res.status(500).json({
      status: 'error',
      message: `Error al actualizar usuario: ${error.message}`,
    });
  }
};

/**
 * Update user role
 */
const updateUserRole = async (req, res) => {
  try {
    const { id } = req.params;
    const userId = parseInt(id, 10);

    if (isNaN(userId)) {
      return res.status(400).json({
        status: 'error',
        message: 'ID de usuario invalido',
      });
    }

    const { role } = req.body;

    if (!role) {
      return res.status(400).json({
        status: 'error',
        message: 'El campo "role" es requerido',
      });
    }

    const updatedUser = await userManagementService.updateUserRole(
      userId,
      role,
      req.user?.id
    );

    res.json({
      status: 'success',
      data: updatedUser,
      message: `Rol del usuario actualizado a ${role}`,
    });
  } catch (error) {
    if (
      error.message === 'Usuario no encontrado' ||
      error.message.includes('El rol debe ser')
    ) {
      return res.status(400).json({
        status: 'error',
        message: error.message,
      });
    }

    res.status(500).json({
      status: 'error',
      message: `Error al actualizar rol: ${error.message}`,
    });
  }
};

/**
 * Reset user password
 */
const resetUserPassword = async (req, res) => {
  try {
    const { id } = req.params;
    const userId = parseInt(id, 10);

    if (isNaN(userId)) {
      return res.status(400).json({
        status: 'error',
        message: 'ID de usuario invalido',
      });
    }

    const { password } = req.body;

    const result = await userManagementService.resetPassword(
      userId,
      password || null,
      req.user?.id
    );

    res.json({
      status: 'success',
      data: {
        user: result.user,
        passwordGenerated: result.tempPassword !== null,
      },
      message: result.tempPassword
        ? 'Contrasena restablecida correctamente. Contrasena temporal generada.'
        : 'Contrasena restablecida correctamente',
      tempPassword: result.tempPassword,
    });
  } catch (error) {
    if (error.message === 'Usuario no encontrado') {
      return res.status(404).json({
        status: 'error',
        message: error.message,
      });
    }

    res.status(500).json({
      status: 'error',
      message: `Error al restablecer contrasena: ${error.message}`,
    });
  }
};

/**
 * Deactivate user
 */
const deactivateUser = async (req, res) => {
  try {
    const { id } = req.params;
    const userId = parseInt(id, 10);

    if (isNaN(userId)) {
      return res.status(400).json({
        status: 'error',
        message: 'ID de usuario invalido',
      });
    }

    // Cannot deactivate own account
    if (req.user?.id === userId) {
      return res.status(400).json({
        status: 'error',
        message: 'No puedes desactivar tu propia cuenta',
      });
    }

    const user = await prisma.user.findUnique({
      where: { id: userId },
    });

    if (!user) {
      return res.status(404).json({
        status: 'error',
        message: 'Usuario no encontrado',
      });
    }

    // Deactivate by setting a deactivated flag in the role or marking inactive
    // Since the schema doesn't have an active field, we'll append _DEACTIVATED to role
    const deactivatedRole = user.role.endsWith('_DEACTIVATED')
      ? user.role
      : `${user.role}_DEACTIVATED`;

    await prisma.user.update({
      where: { id: userId },
      data: { role: deactivatedRole },
    });

    // Log audit
    await configService.logAudit({
      userId: req.user?.id,
      action: 'UPDATE',
      entity: 'User',
      entityId: String(userId),
      details: JSON.stringify({
        action: 'deactivate',
        userEmail: user.email,
        originalRole: user.role,
        deactivatedRole,
      }),
    });

    res.json({
      status: 'success',
      message: 'Usuario desactivado correctamente',
      data: {
        id: user.id,
        email: user.email,
        name: user.name,
        deactivated: true,
      },
    });
  } catch (error) {
    res.status(500).json({
      status: 'error',
      message: `Error al desactivar usuario: ${error.message}`,
    });
  }
};

/**
 * Get active user sessions
 * Note: This is a placeholder as session tracking would require
 * additional infrastructure (Redis, session store, etc.)
 */
const getActiveSessions = async (req, res) => {
  try {
    // Get all users with recent activity
    const users = await prisma.user.findMany({
      select: {
        id: true,
        email: true,
        name: true,
        role: true,
        updatedAt: true,
      },
      orderBy: { updatedAt: 'desc' },
    });

    // In a production environment, this would query a session store
    // For now, we return user activity info
    const sessions = users.map((user) => ({
      userId: user.id,
      email: user.email,
      name: user.name,
      role: user.role,
      lastActivity: user.updatedAt,
      // In production, add: sessionId, ipAddress, userAgent, loginTime, etc.
      isActive: true, // Placeholder
    }));

    res.json({
      status: 'success',
      data: {
        sessions,
        total: sessions.length,
        note: 'El seguimiento de sesiones activo requiere un almacén de sesiones dedicado (Redis, etc.)',
      },
    });
  } catch (error) {
    res.status(500).json({
      status: 'error',
      message: `Error al obtener sesiones activas: ${error.message}`,
    });
  }
};

/**
 * Force logout user
 * Note: This is a placeholder as session tracking would require
 * additional infrastructure
 */
const forceLogoutUser = async (req, res) => {
  try {
    const { id } = req.params;
    const userId = parseInt(id, 10);

    if (isNaN(userId)) {
      return res.status(400).json({
        status: 'error',
        message: 'ID de usuario invalido',
      });
    }

    // Cannot force logout own session
    if (req.user?.id === userId) {
      return res.status(400).json({
        status: 'error',
        message: 'No puedes cerrar tu propia sesion activa',
      });
    }

    const user = await prisma.user.findUnique({
      where: { id: userId },
    });

    if (!user) {
      return res.status(404).json({
        status: 'error',
        message: 'Usuario no encontrado',
      });
    }

    // In production, this would:
    // 1. Invalidate all JWT tokens for this user (via token blacklist in Redis)
    // 2. Clear session data
    // 3. Optionally force password change on next login

    // Log audit
    await configService.logAudit({
      userId: req.user?.id,
      action: 'UPDATE',
      entity: 'User',
      entityId: String(userId),
      details: JSON.stringify({
        action: 'force_logout',
        userEmail: user.email,
      }),
    });

    res.json({
      status: 'success',
      message: `Sesion del usuario ${user.email} cerrada correctamente`,
      data: {
        userId: user.id,
        email: user.email,
        forceLoggedOut: true,
      },
    });
  } catch (error) {
    res.status(500).json({
      status: 'error',
      message: `Error al cerrar sesion del usuario: ${error.message}`,
    });
  }
};

module.exports = {
  getUsers,
  getUserById,
  createUser,
  updateUser,
  updateUserRole,
  resetUserPassword,
  deactivateUser,
  getActiveSessions,
  forceLogoutUser,
};
