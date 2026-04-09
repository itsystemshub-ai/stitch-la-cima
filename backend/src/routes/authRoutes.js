const validate = require('../middleware/validate');
const { loginValidator, createUserValidator } = require('../validators/userValidator');
const { authLimiter } = require('../middleware/rateLimitMiddleware');

router.post('/register', createUserValidator, validate, authController.register);
router.post('/login', authLimiter, loginValidator, validate, authController.login);
router.post('/logout', authController.logout);

module.exports = router;
