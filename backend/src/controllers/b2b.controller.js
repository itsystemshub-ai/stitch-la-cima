const { B2BRequest, User } = require('../models');

// GET /api/b2b/requests - Get all B2B requests (admin only)
const getRequests = async (req, res) => {
  try {
    const requests = await B2BRequest.findAll({ order: [['createdAt', 'DESC']] });
    res.json({ success: true, data: requests });
  } catch (error) {
    console.error('Get B2B requests error:', error);
    res.status(500).json({ success: false, message: 'Error interno del servidor' });
  }
};

// POST /api/b2b/register - Register new B2B request
const register = async (req, res) => {
  try {
    const { companyName, rif, contactName, email, phone, businessType } = req.body;
    
    if (!companyName || !rif || !contactName || !email) {
      return res.status(400).json({ success: false, message: 'Todos los campos son requeridos' });
    }
    
    // Check if already exists
    const existing = await B2BRequest.findOne({ where: { rif } });
    if (existing) {
      return res.status(409).json({ success: false, message: 'RIF ya registrado' });
    }
    
    const request = await B2BRequest.create({
      companyName, rif, contactName, email, phone, businessType,
      status: 'pending'
    });
    
    res.status(201).json({ success: true, data: request });
  } catch (error) {
    console.error('B2B register error:', error);
    res.status(500).json({ success: false, message: 'Error interno del servidor' });
  }
};

// PATCH /api/b2b/requests/:id/approve - Approve B2B request
const approve = async (req, res) => {
  try {
    const { id } = req.params;
    const { adminNotes } = req.body;
    
    const request = await B2BRequest.findByPk(id);
    if (!request) {
      return res.status(404).json({ success: false, message: 'Solicitud no encontrada' });
    }
    
    await request.update({
      status: 'approved',
      adminNotes,
      reviewedBy: req.user?.id,
      reviewedAt: new Date()
    });
    
    // Create user account
    await User.create({
      name: request.contactName,
      email: request.email,
      phone: request.phone,
      password: Math.random().toString(36).slice(-8), // Temporary password
      role: 'b2b',
      company: request.companyName,
      rif: request.rif,
      businessType: request.businessType,
      status: 'active'
    });
    
    res.json({ success: true, message: 'Solicitud aprobada y usuario creado' });
  } catch (error) {
    console.error('B2B approve error:', error);
    res.status(500).json({ success: false, message: 'Error interno del servidor' });
  }
};

// PATCH /api/b2b/requests/:id/reject - Reject B2B request
const reject = async (req, res) => {
  try {
    const { id } = req.params;
    const { adminNotes } = req.body;
    
    const request = await B2BRequest.findByPk(id);
    if (!request) {
      return res.status(404).json({ success: false, message: 'Solicitud no encontrada' });
    }
    
    await request.update({
      status: 'rejected',
      adminNotes,
      reviewedBy: req.user?.id,
      reviewedAt: new Date()
    });
    
    res.json({ success: true, message: 'Solicitud rechazada' });
  } catch (error) {
    console.error('B2B reject error:', error);
    res.status(500).json({ success: false, message: 'Error interno del servidor' });
  }
};

module.exports = { getRequests, register, approve, reject };
