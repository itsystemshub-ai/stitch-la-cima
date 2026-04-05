/**
 * API Client - La Cima Zenith ERP
 * Centralized fetch wrapper with auth token handling
 */

const API_BASE_URL = 'http://localhost:3000/api';

class APIClient {
  constructor() {
    this.token = this._getToken();
  }

  // Get stored token
  _getToken() {
    try {
      const session = localStorage.getItem('zenith_session');
      return session ? JSON.parse(session).token : null;
    } catch {
      return null;
    }
  }

  // Store session
  _setSession(sessionData) {
    localStorage.setItem('zenith_session', JSON.stringify(sessionData));
    this.token = sessionData.token;
  }

  // Clear session
  _clearSession() {
    localStorage.removeItem('zenith_session');
    this.token = null;
  }

  // Core fetch with auth headers
  async request(method, endpoint, body = null) {
    const options = {
      method,
      headers: {
        'Content-Type': 'application/json',
      },
    };

    // Add auth token if exists
    if (this.token) {
      options.headers['Authorization'] = `Bearer ${this.token}`;
    }

    // Add body if exists
    if (body) {
      options.body = JSON.stringify(body);
    }

    try {
      const response = await fetch(`${API_BASE_URL}${endpoint}`, options);
      const data = await response.json();

      if (!response.ok) {
        // Token expired or invalid
        if (response.status === 401) {
          this._clearSession();
          if (!window.location.href.includes('login.html')) {
            window.location.href = 'login.html';
          }
        }
        throw new Error(data.message || 'Error en la petición');
      }

      return data;
    } catch (error) {
      console.error(`API ${method} ${endpoint}:`, error);
      throw error;
    }
  }

  // Convenience methods
  get(endpoint) { return this.request('GET', endpoint); }
  post(endpoint, body) { return this.request('POST', endpoint, body); }
  put(endpoint, body) { return this.request('PUT', endpoint, body); }
  patch(endpoint, body) { return this.request('PATCH', endpoint, body); }
  delete(endpoint) { return this.request('DELETE', endpoint); }

  // Session management
  setSession(sessionData) { this._setSession(sessionData); }
  clearSession() { this._clearSession(); }
  getToken() { return this.token; }
  isLoggedIn() { return !!this.token; }
  getCurrentUser() {
    try {
      const session = localStorage.getItem('zenith_session');
      return session ? JSON.parse(session).user : null;
    } catch {
      return null;
    }
  }
}

// Singleton instance
const api = new APIClient();
