/**
 * ZENITH ERP - API Client
 * Conexión automática: Local (localhost:3000) o Producción (/api)
 */

class ZenithAPI {
  constructor() {
    // Detectar ambiente automáticamente
    this.isLocalhost = window.location.hostname === 'localhost' || window.location.hostname === '127.0.0.1';
    this.baseUrl = this.isLocalhost ? 'http://localhost:3000/api' : '/api';
    this.token = localStorage.getItem('auth_token') || null;
    this.offlineQueue = JSON.parse(localStorage.getItem('zenith_offline_queue') || '[]');
  }

  // Configurar token de autenticación
  setToken(token) {
    this.token = token;
    if (token) {
      localStorage.setItem('auth_token', token);
    } else {
      localStorage.removeItem('auth_token');
    }
  }

  // Obtener token actual
  getToken() {
    return this.token;
  }

  // Verificar si está autenticado
  isAuthenticated() {
    return !!this.token;
  }

  // Headers para requests
  getHeaders(isFormData = false) {
    const headers = {};
    if (this.token) {
      headers['Authorization'] = `Bearer ${this.token}`;
    }
    if (!isFormData) {
      headers['Content-Type'] = 'application/json';
    }
    return headers;
  }

  // Método GET
  async get(endpoint, params = {}) {
    const queryString = new URLSearchParams(params).toString();
    const url = `${this.baseUrl}${endpoint}${queryString ? '?' + queryString : ''}`;
    
    try {
      const response = await fetch(url, {
        method: 'GET',
        headers: this.getHeaders()
      });
      return await this.handleResponse(response);
    } catch (error) {
      console.error('API GET Error:', error);
      throw error;
    }
  }

  // Método POST
  async post(endpoint, data, isFormData = false) {
    const url = `${this.baseUrl}${endpoint}`;
    
    try {
      const response = await fetch(url, {
        method: 'POST',
        headers: this.getHeaders(isFormData),
        body: isFormData ? data : JSON.stringify(data)
      });
      return await this.handleResponse(response);
    } catch (error) {
      console.error('API POST Error:', error);
      
      // Soporte Offline para Ventas
      if (endpoint === '/sales' && !isFormData) {
        console.warn('⚠️ Guardando venta en cola offline...');
        this.addToQueue('POST', endpoint, data);
        return {
          status: 'success',
          offline: true,
          message: 'Venta guardada localmente. Se sincronizará al recuperar conexión.',
          data: { ...data, id: `offline-${Date.now()}`, createdAt: new Date().toISOString() }
        };
      }
      
      throw error;
    }
  }

  // Guardar en cola offline
  addToQueue(method, endpoint, data) {
    const item = {
      id: `task-${Date.now()}`,
      method,
      endpoint,
      data,
      timestamp: new Date().toISOString()
    };
    this.offlineQueue.push(item);
    localStorage.setItem('zenith_offline_queue', JSON.stringify(this.offlineQueue));
    
    // Intentar registrar para Background Sync si está disponible
    if ('serviceWorker' in navigator && 'SyncManager' in window) {
      navigator.serviceWorker.ready.then(reg => {
        return reg.sync.register('sync-sales');
      }).catch(err => console.log('Background Sync not supported or failed', err));
    }
  }

  // Sincronizar cola (llamado al recuperar conexión)
  async syncQueue() {
    if (this.offlineQueue.length === 0) return;
    console.log('🔄 Sincronizando cola offline...');
    
    const remaining = [];
    for (const item of this.offlineQueue) {
      try {
        await this.post(item.endpoint, item.data);
        console.log(`✅ Item sincronizado: ${item.endpoint}`);
      } catch (error) {
        console.error(`❌ Error sincronizando item:`, error);
        remaining.push(item);
      }
    }
    
    this.offlineQueue = remaining;
    localStorage.setItem('zenith_offline_queue', JSON.stringify(this.offlineQueue));
  }

  // Método PUT
  async put(endpoint, data) {
    const url = `${this.baseUrl}${endpoint}`;
    
    try {
      const response = await fetch(url, {
        method: 'PUT',
        headers: this.getHeaders(),
        body: JSON.stringify(data)
      });
      return await this.handleResponse(response);
    } catch (error) {
      console.error('API PUT Error:', error);
      throw error;
    }
  }

  // Método DELETE
  async delete(endpoint) {
    const url = `${this.baseUrl}${endpoint}`;
    
    try {
      const response = await fetch(url, {
        method: 'DELETE',
        headers: this.getHeaders()
      });
      return await this.handleResponse(response);
    } catch (error) {
      console.error('API DELETE Error:', error);
      throw error;
    }
  }

  // Manejar respuesta
  async handleResponse(response) {
    const data = await response.json();
    
    if (!response.ok) {
      // Token expirado o inválido
      if (response.status === 401) {
        this.setToken(null);
        if (window.location.pathname.includes('/erp/') || window.location.pathname.includes('/auth/')) {
          window.location.href = '/auth/login';
        }
      }
      throw new Error(data.message || 'Error en la petición');
    }
    
    return data;
  }

  // Verificar conexión con el backend
  async checkConnection() {
    try {
      const response = await this.get('/health');
      return {
        connected: true,
        environment: response.environment,
        version: response.version,
        isLocal: this.isLocalhost
      };
    } catch (error) {
      return {
        connected: false,
        error: error.message,
        isLocal: this.isLocalhost
      };
    }
  }

  // ==========================================
  // AUTH API
  // ==========================================

  async login(email, password) {
    return await this.post('/auth/login', { email, password });
  }

  async register(userData) {
    return await this.post('/auth/register', userData);
  }

  async logout() {
    await this.post('/auth/logout', {});
    this.setToken(null);
    localStorage.removeItem('erp_session');
  }

  // ==========================================
  // USER MANAGEMENT API (Admin)
  // ==========================================

  async getUsers(params = {}) {
    return await this.get('/admin/users', params);
  }

  async getUserById(id) {
    return await this.get(`/admin/users/${id}`);
  }

  async createUser(userData) {
    return await this.post('/admin/users', userData);
  }

  async updateUser(id, userData) {
    return await this.put(`/admin/users/${id}`, userData);
  }

  async updateUserRole(id, role) {
    return await this.put(`/admin/users/${id}/role`, { role });
  }

  async resetUserPassword(id, newPassword) {
    return await this.post(`/admin/users/${id}/reset-password`, { newPassword });
  }

  async deactivateUser(id) {
    return await this.post(`/admin/users/${id}/deactivate`);
  }

  async getActiveSessions() {
    return await this.get('/admin/users/sessions');
  }

  async forceLogoutUser(id) {
    return await this.post(`/admin/users/${id}/force-logout`);
  }

  // ==========================================
  // PRODUCT API
  // ==========================================

  async getProducts(params = {}) {
    return await this.get('/inventory/products', params);
  }

  async getProductById(id) {
    return await this.get(`/inventory/products/${id}`);
  }

  async createProduct(productData) {
    return await this.post('/inventory/products', productData);
  }

  async updateProduct(id, productData) {
    return await this.put(`/inventory/products/${id}`, productData);
  }

  async deleteProduct(id) {
    return await this.delete(`/inventory/products/${id}`);
  }

  // ==========================================
  // SALES API
  // ==========================================

  async getSales(params = {}) {
    return await this.get('/sales', params);
  }

  async getSaleById(id) {
    return await this.get(`/sales/${id}`);
  }

  async createSale(saleData) {
    return await this.post('/sales', saleData);
  }

  async cancelSale(id) {
    return await this.post(`/sales/${id}/cancel`);
  }

  async getSalesSummary(params = {}) {
    return await this.get('/sales/summary', params);
  }

  async getDailyReport(params = {}) {
    return await this.get('/sales/daily-report', params);
  }

  // ==========================================
  // INVENTORY API
  // ==========================================

  async getInventorySummary() {
    return await this.get('/inventory/products/summary');
  }

  async getLowStockProducts() {
    return await this.get('/inventory/products/low-stock');
  }

  async addStock(data) {
    return await this.post('/inventory/stock/add', data);
  }

  async removeStock(data) {
    return await this.post('/inventory/stock/remove', data);
  }

  async adjustStock(data) {
    return await this.post('/inventory/stock/adjust', data);
  }

  async getKardex(productId) {
    return await this.get(`/inventory/kardex/${productId}`);
  }

  // ==========================================
  // PURCHASES API
  // ==========================================

  async getSuppliers(params = {}) {
    return await this.get('/purchases/suppliers', params);
  }

  async createSupplier(supplierData) {
    return await this.post('/purchases/suppliers', supplierData);
  }

  async updateSupplier(id, supplierData) {
    return await this.put(`/purchases/suppliers/${id}`, supplierData);
  }

  async getPurchaseOrders(params = {}) {
    return await this.get('/purchases/orders', params);
  }

  async createPurchaseOrder(orderData) {
    return await this.post('/purchases/orders', orderData);
  }

  async approvePurchaseOrder(id) {
    return await this.post(`/purchases/orders/${id}/approve`);
  }

  async receivePurchaseOrder(id) {
    return await this.post(`/purchases/orders/${id}/receive`);
  }

  async cancelPurchaseOrder(id) {
    return await this.post(`/purchases/orders/${id}/cancel`);
  }

  // ==========================================
  // HR API
  // ==========================================

  async getEmployees(params = {}) {
    return await this.get('/hr/employees', params);
  }

  async createEmployee(employeeData) {
    return await this.post('/hr/employees', employeeData);
  }

  async updateEmployee(id, employeeData) {
    return await this.put(`/hr/employees/${id}`, employeeData);
  }

  async deactivateEmployee(id) {
    return await this.post(`/hr/employees/${id}/deactivate`);
  }

  async getPayrolls(params = {}) {
    return await this.get('/hr/payrolls', params);
  }

  async calculatePayroll(data) {
    return await this.post('/hr/payrolls/calculate', data);
  }

  async processPayroll(data) {
    return await this.post('/hr/payrolls/process', data);
  }

  async getPayrollSummary(params = {}) {
    return await this.get('/hr/payrolls/summary', params);
  }

  async getAttendance(params = {}) {
    return await this.get('/hr/attendance', params);
  }

  async recordAttendance(data) {
    return await this.post('/hr/attendance', data);
  }

  // ==========================================
  // ACCOUNTING API
  // ==========================================

  async getChartOfAccounts() {
    return await this.get('/accounting/accounts');
  }

  async getJournalEntries(params = {}) {
    return await this.get('/accounting/journal-entries', params);
  }

  async createJournalEntry(entryData) {
    return await this.post('/accounting/journal-entries', entryData);
  }

  async getTrialBalance(params = {}) {
    return await this.get('/accounting/trial-balance', params);
  }

  async getBalanceSheet(params = {}) {
    return await this.get('/accounting/balance-sheet', params);
  }

  async getIncomeStatement(params = {}) {
    return await this.get('/accounting/income-statement', params);
  }

  async getTaxReport(params = {}) {
    return await this.get('/accounting/tax-report', params);
  }

  // ==========================================
  // FINANCE API
  // ==========================================

  async getFixedAssets(params = {}) {
    return await this.get('/finance/fixed-assets', params);
  }

  async getReceivables(params = {}) {
    return await this.get('/finance/receivables', params);
  }

  async getFinancialDashboard() {
    return await this.get('/finance/dashboard');
  }

  // ==========================================
  // CONFIG API
  // ==========================================

  async getConfigs(params = {}) {
    return await this.get('/admin/config', params);
  }

  async getConfigByKey(key) {
    return await this.get(`/admin/config/${key}`);
  }

  async updateConfig(key, value) {
    return await this.put(`/admin/config/${key}`, { value });
  }

  async getSystemHealth() {
    return await this.get('/admin/config/system/health');
  }

  async triggerBackup() {
    return await this.post('/admin/config/backup/trigger');
  }

  // ==========================================
  // UI HELPERS
  // ==========================================

  showNotification(message, type = 'info') {
    const banner = document.createElement('div');
    banner.className = `fixed bottom-4 right-4 p-4 rounded-lg shadow-2xl z-50 text-white transition-all transform translate-y-20 flex items-center gap-3`;
    
    const colors = {
      info: 'bg-blue-600',
      success: 'bg-green-600',
      error: 'bg-red-600',
      warning: 'bg-yellow-600'
    };
    
    banner.classList.add(colors[type] || colors.info);
    
    const icon = document.createElement('span');
    icon.className = 'material-symbols-outlined';
    icon.textContent = type === 'success' ? 'check_circle' : (type === 'error' ? 'error' : 'info');
    
    const text = document.createElement('span');
    text.textContent = message;
    
    banner.appendChild(icon);
    banner.appendChild(text);
    document.body.appendChild(banner);
    
    // Animate in
    setTimeout(() => {
      banner.classList.remove('translate-y-20');
    }, 10);
    
    // Auto remove
    setTimeout(() => {
      banner.classList.add('translate-y-20');
      setTimeout(() => banner.remove(), 500);
    }, 4000);
  }
}

// Exportar instancia global
window.zenithApi = new ZenithAPI();

// Verificar conexión al cargar
document.addEventListener('DOMContentLoaded', async () => {
  const connection = await window.zenithApi.checkConnection();
  if (connection.connected) {
    console.log(`✅ API conectada: ${connection.environment} (${connection.version})`);
  } else {
    console.warn('⚠️ API no disponible:', connection.error);
  }
});
