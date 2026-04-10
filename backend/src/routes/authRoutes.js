const { authLimiter } = require('../middleware/rateLimitMiddleware');
const auditLog = require('../middleware/auditMiddleware');

router.post('/register', auditLog('USER_REGISTER'), createUserValidator, validate, authController.register);
router.post('/login', authLimiter, auditLog('USER_LOGIN'), loginValidator, validate, authController.login);
router.post('/logout', auditLog('USER_LOGOUT'), authController.logout);

module.exports = router;
