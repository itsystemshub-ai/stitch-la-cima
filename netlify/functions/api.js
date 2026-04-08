const serverless = require('serverless-http');
const app = require('../../backend/src/app.js');

module.exports.handler = serverless(app);