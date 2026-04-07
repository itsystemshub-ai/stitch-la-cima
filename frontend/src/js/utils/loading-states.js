/**
 * Loading States - Spinners & Skeletons
 * La Cima Zenith ERP - UX Improvement
 */

// ===== SPINNER =====
function showSpinner(target = 'body') {
  const el = typeof target === 'string' ? document.querySelector(target) : target;
  if (!el) return;
  
  const spinner = document.createElement('div');
  spinner.className = 'loading-spinner';
  spinner.innerHTML = `
    <div class="spinner-container">
      <div class="spinner-ring"></div>
      <div class="spinner-ring"></div>
      <div class="spinner-ring"></div>
      <p class="spinner-text">Cargando...</p>
    </div>
  `;
  el.appendChild(spinner);
  el.classList.add('loading-active');
}

function hideSpinner(target = 'body') {
  const el = typeof target === 'string' ? document.querySelector(target) : target;
  if (!el) return;
  
  const spinner = el.querySelector('.loading-spinner');
  if (spinner) {
    spinner.style.opacity = '0';
    setTimeout(() => spinner.remove(), 300);
  }
  el.classList.remove('loading-active');
}

// ===== SKELETON LOADER =====
function showSkeleton(target, type = 'card') {
  const el = typeof target === 'string' ? document.querySelector(target) : target;
  if (!el) return;
  
  const skeleton = document.createElement('div');
  skeleton.className = `skeleton-loader skeleton-${type}`;
  
  if (type === 'card') {
    skeleton.innerHTML = `
      <div class="skeleton skeleton-image"></div>
      <div class="skeleton skeleton-text"></div>
      <div class="skeleton skeleton-text skeleton-short"></div>
      <div class="skeleton skeleton-text skeleton-short"></div>
    `;
  } else if (type === 'table') {
    skeleton.innerHTML = `
      <div class="skeleton skeleton-text skeleton-table-header"></div>
      ${'<div class="skeleton skeleton-text skeleton-table-row"></div>'.repeat(5)}
    `;
  } else if (type === 'list') {
    skeleton.innerHTML = `
      ${'<div class="skeleton skeleton-text skeleton-list-item"></div>'.repeat(4)}
    `;
  } else if (type === 'text') {
    skeleton.innerHTML = `
      <div class="skeleton skeleton-text"></div>
      <div class="skeleton skeleton-text skeleton-short"></div>
    `;
  }
  
  el.appendChild(skeleton);
}

function hideSkeleton(target) {
  const el = typeof target === 'string' ? document.querySelector(target) : target;
  if (!el) return;
  
  const skeletons = el.querySelectorAll('.skeleton-loader');
  skeletons.forEach(s => {
    s.style.opacity = '0';
    setTimeout(() => s.remove(), 300);
  });
}

// ===== FETCH INTERCEPTOR WITH LOADING STATE =====
const api = {
  async get(url, options = {}) {
    showSpinner(options.spinner || '.main-content');
    try {
      const response = await fetch(url, { ...options, method: 'GET' });
      const data = await response.json();
      hideSpinner(options.spinner || '.main-content');
      
      if (!response.ok) {
        throw new Error(data.message || 'Error en la petición');
      }
      return data;
    } catch (error) {
      hideSpinner(options.spinner || '.main-content');
      console.error(`GET ${url}:`, error);
      throw error;
    }
  },
  
  async post(url, body, options = {}) {
    showSpinner(options.spinner || '.main-content');
    try {
      const response = await fetch(url, {
        ...options,
        method: 'POST',
        headers: { 'Content-Type': 'application/json', ...options.headers },
        body: JSON.stringify(body),
      });
      const data = await response.json();
      hideSpinner(options.spinner || '.main-content');
      
      if (!response.ok) {
        throw new Error(data.message || 'Error en la petición');
      }
      return data;
    } catch (error) {
      hideSpinner(options.spinner || '.main-content');
      console.error(`POST ${url}:`, error);
      throw error;
    }
  },
  
  async put(url, body, options = {}) {
    showSpinner(options.spinner || '.main-content');
    try {
      const response = await fetch(url, {
        ...options,
        method: 'PUT',
        headers: { 'Content-Type': 'application/json', ...options.headers },
        body: JSON.stringify(body),
      });
      const data = await response.json();
      hideSpinner(options.spinner || '.main-content');
      
      if (!response.ok) {
        throw new Error(data.message || 'Error en la petición');
      }
      return data;
    } catch (error) {
      hideSpinner(options.spinner || '.main-content');
      console.error(`PUT ${url}:`, error);
      throw error;
    }
  },
  
  async delete(url, options = {}) {
    showSpinner(options.spinner || '.main-content');
    try {
      const response = await fetch(url, { ...options, method: 'DELETE' });
      const data = await response.json();
      hideSpinner(options.spinner || '.main-content');
      
      if (!response.ok) {
        throw new Error(data.message || 'Error en la petición');
      }
      return data;
    } catch (error) {
      hideSpinner(options.spinner || '.main-content');
      console.error(`DELETE ${url}:`, error);
      throw error;
    }
  }
};

// Expose to global scope
window.showSpinner = showSpinner;
window.hideSpinner = hideSpinner;
window.showSkeleton = showSkeleton;
window.hideSkeleton = hideSkeleton;
window.api = api;
