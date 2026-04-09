const prisma = require('../models/prismaClient');
const bcrypt = require('bcrypt');
const crypto = require('crypto');
const configService = require('./configService');

/**
 * Valid roles in the system
 */
const VALID_ROLES = ['ADMIN', 'MANAGER', 'EMPLOYEE', 'USER'];

/**
 * Create a new user with validation
 * @param {object} userData - User data
 * @param {string} userData.email - User email
 * @param {string} [userData.name] - User name
 * @param {string} [userData.password] - User password (generated if not provided)
 * @param {string} [userData.role] - User role (default: USER)
 * @param {string} [createdBy] - User ID of creator for audit
 * @returns {Promise<object>} Created user (without password)
 */
async function createUser(userData, createdBy = null) {
  // Validate input
  const validation = validateUserData(userData);
  if (!validation.valid) {
    throw new Error(validation.errors.join(', '));
  }

  const { email, name, role = 'USER' } = userData;

  // Generate or use provided password
  const password = userData.password || generatePassword();
  const hashedPassword = await bcrypt.hash(password, 10);

  try {
    // Check if email already exists
    const existingUser = await prisma.user.findUnique({
      where: { email: email.toLowerCase() },
    });

    if (existingUser) {
      throw new Error('El correo electronico ya esta registrado');
    }

    const user = await prisma.user.create({
      data: {
        email: email.toLowerCase(),
        name: name || null,
        password: hashedPassword,
        role,
      },
    });

    // Log audit
    await configService.logAudit({
      userId: createdBy,
      action: 'CREATE',
      entity: 'User',
      entityId: String(user.id),
      details: JSON.stringify({
        email: user.email,
        name: user.name,
        role: user.role,
        passwordGenerated: !userData.password,
      }),
    });

    // Return user without password
    const { password: _, ...userWithoutPassword } = user;

    return {
      ...userWithoutPassword,
      passwordGenerated: !userData.password,
      tempPassword: userData.password ? null : password,
    };
  } catch (error) {
    if (error.message.includes('ya esta registrado') || error.code === 'P2002') {
      throw new Error('El correo electronico ya esta registrado');
    }
    throw new Error(`Error al crear usuario: ${error.message}`);
  }
}

/**
 * Validate user input data
 * @param {object} userData - User data to validate
 * @returns {{ valid: boolean, errors?: string[] }} Validation result
 */
function validateUserData(userData) {
  const errors = [];

  if (!userData) {
    return { valid: false, errors: ['Datos de usuario son requeridos'] };
  }

  // Email validation
  if (!userData.email) {
    errors.push('El correo electronico es requerido');
  } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(userData.email)) {
    errors.push('El formato del correo electronico es invalido');
  } else if (userData.email.length > 255) {
    errors.push('El correo electronico no puede exceder 255 caracteres');
  }

  // Name validation (optional)
  if (userData.name && userData.name.length > 255) {
    errors.push('El nombre no puede exceder 255 caracteres');
  }

  // Role validation
  if (userData.role && !VALID_ROLES.includes(userData.role)) {
    errors.push(`El rol debe ser uno de: ${VALID_ROLES.join(', ')}`);
  }

  // Password validation (if provided)
  if (userData.password) {
    if (userData.password.length < 8) {
      errors.push('La contrasena debe tener al menos 8 caracteres');
    }
    if (userData.password.length > 100) {
      errors.push('La contrasena no puede exceder 100 caracteres');
    }
  }

  return {
    valid: errors.length === 0,
    errors: errors.length > 0 ? errors : undefined,
  };
}

/**
 * Generate a secure random password
 * @param {number} [length=12] - Password length
 * @returns {string} Generated password
 */
function generatePassword(length = 12) {
  const lowercase = 'abcdefghijklmnopqrstuvwxyz';
  const uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
  const numbers = '0123456789';
  const symbols = '!@#$%^&*';
  const allChars = lowercase + uppercase + numbers + symbols;

  // Ensure at least one of each type
  let password = '';
  password += lowercase[crypto.randomInt(0, lowercase.length)];
  password += uppercase[crypto.randomInt(0, uppercase.length)];
  password += numbers[crypto.randomInt(0, numbers.length)];
  password += symbols[crypto.randomInt(0, symbols.length)];

  // Fill remaining length
  for (let i = password.length; i < length; i++) {
    password += allChars[crypto.randomInt(0, allChars.length)];
  }

  // Shuffle the password
  const passwordArray = password.split('');
  for (let i = passwordArray.length - 1; i > 0; i--) {
    const j = crypto.randomInt(0, i + 1);
    [passwordArray[i], passwordArray[j]] = [passwordArray[j], passwordArray[i]];
  }

  return passwordArray.join('');
}

/**
 * Update user with validation
 * @param {string} userId - User ID to update
 * @param {object} updateData - Data to update
 * @param {string} [updatedBy] - User ID of updater for audit
 * @returns {Promise<object>} Updated user (without password)
 */
async function updateUser(userId, updateData, updatedBy = null) {
  try {
    const existingUser = await prisma.user.findUnique({
      where: { id: userId },
    });

    if (!existingUser) {
      throw new Error('Usuario no encontrado');
    }

    const data = {};
    const changes = {};

    if (updateData.email !== undefined) {
      if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(updateData.email)) {
        throw new Error('El formato del correo electronico es invalido');
      }
      data.email = updateData.email.toLowerCase();
    }

    if (updateData.name !== undefined) {
      data.name = updateData.name;
    }

    if (updateData.role !== undefined) {
      if (!VALID_ROLES.includes(updateData.role)) {
        throw new Error(`El rol debe ser uno de: ${VALID_ROLES.join(', ')}`);
      }
      data.role = updateData.role;
    }

    // Track changes for audit
    for (const [key, value] of Object.entries(data)) {
      if (existingUser[key] !== value) {
        changes[key] = { old: existingUser[key], new: value };
      }
    }

    if (Object.keys(data).length === 0) {
      throw new Error('No se proporcionaron datos validos para actualizar');
    }

    const updatedUser = await prisma.user.update({
      where: { id: userId },
      data,
    });

    // Log audit
    await configService.logAudit({
      userId: updatedBy,
      action: 'UPDATE',
      entity: 'User',
      entityId: userId,
      details: JSON.stringify({
        userEmail: existingUser.email,
        changes,
      }),
    });

    const { password: _, ...userWithoutPassword } = updatedUser;
    return userWithoutPassword;
  } catch (error) {
    if (error.code === 'P2002') {
      throw new Error('El correo electronico ya esta en uso');
    }
    throw error;
  }
}

/**
 * Update user role with validation
 * @param {string} userId - User ID to update
 * @param {string} newRole - New role
 * @param {number} [updatedBy] - User ID of updater for audit
 * @returns {Promise<object>} Updated user (without password)
 */
async function updateUserRole(userId, newRole, updatedBy = null) {
  if (!VALID_ROLES.includes(newRole)) {
    throw new Error(`El rol debe ser uno de: ${VALID_ROLES.join(', ')}`);
  }

  try {
    const user = await prisma.user.findUnique({
      where: { id: userId },
    });

    if (!user) {
      throw new Error('Usuario no encontrado');
    }

    const oldRole = user.role;

    const updatedUser = await prisma.user.update({
      where: { id: userId },
      data: { role: newRole },
    });

    // Log audit
    await configService.logAudit({
      userId: updatedBy,
      action: 'UPDATE',
      entity: 'User',
      entityId: String(userId),
      details: JSON.stringify({
        field: 'role',
        oldValue: oldRole,
        newValue: newRole,
        userEmail: user.email,
      }),
    });

    const { password: _, ...userWithoutPassword } = updatedUser;
    return userWithoutPassword;
  } catch (error) {
    if (error.message === 'Usuario no encontrado') {
      throw error;
    }
    throw new Error(`Error al actualizar rol del usuario: ${error.message}`);
  }
}

/**
 * Reset user password
 * @param {string} userId - User ID
 * @param {string} [newPassword] - New password (generated if not provided)
 * @param {string} [resetBy] - User ID of resetter for audit
 * @returns {Promise<{user: object, tempPassword: string|null}>} Updated user and temp password
 */
async function resetPassword(userId, newPassword = null, resetBy = null) {
  try {
    const user = await prisma.user.findUnique({
      where: { id: userId },
    });

    if (!user) {
      throw new Error('Usuario no encontrado');
    }

    const password = newPassword || generatePassword();
    const hashedPassword = await bcrypt.hash(password, 10);

    await prisma.user.update({
      where: { id: userId },
      data: { password: hashedPassword },
    });

    // Log audit
    await configService.logAudit({
      userId: resetBy,
      action: 'UPDATE',
      entity: 'User',
      entityId: String(userId),
      details: JSON.stringify({
        field: 'password',
        userEmail: user.email,
        passwordGenerated: !newPassword,
      }),
    });

    const { password: _, ...userWithoutPassword } = user;

    return {
      user: userWithoutPassword,
      tempPassword: newPassword ? null : password,
    };
  } catch (error) {
    if (error.message === 'Usuario no encontrado') {
      throw error;
    }
    throw new Error(`Error al restablecer contrasena: ${error.message}`);
  }
}

/**
 * Log a user management action
 * @param {object} params - Log parameters
 * @param {string} [params.userId] - User performing the action
 * @param {string} params.action - Action type
 * @param {string} params.entity - Entity type
 * @param {string} [params.entityId] - Entity ID
 * @param {object} [params.details] - Details object
 * @returns {Promise<object|null>} Created audit log or null on error
 */
async function logUserAction({ userId, action, entity, entityId, details }) {
  try {
    return await configService.logAudit({
      userId,
      action,
      entity,
      entityId,
      details: JSON.stringify(details || {}),
    });
  } catch (error) {
    console.error('Error al registrar accion de usuario:', error.message);
    return null;
  }
}

module.exports = {
  createUser,
  updateUser,
  validateUserData,
  generatePassword,
  updateUserRole,
  resetPassword,
  logUserAction,
  VALID_ROLES,
};
