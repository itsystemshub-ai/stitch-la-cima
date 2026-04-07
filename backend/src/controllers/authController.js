const bcrypt = require('bcrypt');
const jwt = require('jsonwebtoken');
const { jwtSecret } = require('../config');
const prisma = require('../models/prismaClient');

const signToken = (id, role) => {
  return jwt.sign({ id, role }, jwtSecret, { expiresIn: '24h' });
};

exports.register = async (req, res) => {
  try {
    const { email, password, name, role } = req.body;
    const hashedPassword = await bcrypt.hash(password, 10);

    const user = await prisma.user.create({
      data: { email, password: hashedPassword, name, role },
    });

    const token = signToken(user.id, user.role);
    res.status(201).json({ status: 'success', token, user: { id: user.id, email: user.email, role: user.role } });
  } catch (error) {
    res.status(400).json({ status: 'error', message: error.message });
  }
};

exports.login = async (req, res) => {
  try {
    const { email, password } = req.body;
    const user = await prisma.user.findUnique({ where: { email } });

    if (!user || !(await bcrypt.compare(password, user.password))) {
      return res.status(401).json({ status: 'error', message: 'Invalid credentials' });
    }

    const token = signToken(user.id, user.role);
    res.cookie('token', token, { httpOnly: true, maxAge: 24 * 60 * 60 * 1000 });
    res.json({ status: 'success', token, user: { id: user.id, email: user.email, role: user.role } });
  } catch (error) {
    res.status(400).json({ status: 'error', message: error.message });
  }
};

exports.logout = (req, res) => {
  res.clearCookie('token');
  res.json({ status: 'success', message: 'Logged out' });
};
