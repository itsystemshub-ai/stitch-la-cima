const { PasswordRecovery, User } = require('../models');

// POST /api/recovery/request - Request password recovery
const request = async (req, res) => {
  try {
    const { email, newPassword } = req.body;
    if (!email || !newPassword) {
      return res.status(400).json({ success: false, message: 'Email y nueva contraseña requeridos' });
    }
    
    // Check if user exists
    const user = await User.findOne({ where: { email } });
    if (!user) {
      return res.status(404).json({ success: false, message: 'Usuario no encontrado' });
    }
    
    const recovery = await PasswordRecovery.create({
      email,
      newPassword,
      status: 'pending',
      ip: req.ip
    });
    
    res.json({ success: true, data: { ticketId: recovery.ticketId } });
  } catch (error) {
    console.error('Recovery request error:', error);
    res.status(500).json({ success: false, message: 'Error interno del servidor' });
  }
};

// GET /api/recovery/requests - Get all recovery requests (admin only)
const getRequests = async (req, res) => {
  try {
    const requests = await PasswordRecovery.findAll({ order: [['createdAt', 'DESC']] });
    res.json({ success: true, data: requests });
  } catch (error) {
    console.error('Get recovery requests error:', error);
    res.status(500).json({ success: false, message: 'Error interno del servidor' });
  }
};

// PATCH /api/recovery/requests/:id/approve - Approve password recovery
const approve = async (req, res) => {
  try {
    const { id } = req.params;
    
    const recovery = await PasswordRecovery.findByPk(id);
    if (!recovery) {
      return res.status(404).json({ success: false, message: 'Ticket no encontrado' });
    }
    
    // Update user password
    const user = await User.findOne({ where: { email: recovery.email } });
    if (user) {
      await user.update({ password: recovery.newPassword });
    }
    
    await recovery.update({
      status: 'approved',
      approvedBy: req.user?.id,
      approvedAt: new Date()
    });
    
    res.json({ success: true, message: 'Contraseña actualizada exitosamente' });
  } catch (error) {
    console.error('Recovery approve error:', error);
    res.status(500).json({ success: false, message: 'Error interno del servidor' });
  }
};

// PATCH /api/recovery/requests/:id/reject - Reject password recovery
const reject = async (req, res) => {
  try {
    const { id } = req.params;
    
    const recovery = await PasswordRecovery.findByPk(id);
    if (!recovery) {
      return res.status(404).json({ success: false, message: 'Ticket no encontrado' });
    }
    
    await recovery.update({
      status: 'rejected',
      approvedBy: req.user?.id,
      approvedAt: new Date()
    });
    
    res.json({ success: true, message: 'Solicitud rechazada' });
  } catch (error) {
    console.error('Recovery reject error:', error);
    res.status(500).json({ success: false, message: 'Error interno del servidor' });
  }
};

module.exports = { request, getRequests, approve, reject };
