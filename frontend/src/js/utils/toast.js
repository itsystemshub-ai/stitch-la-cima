/**
 * Toast Notification System - La Cima Zenith ERP
 */

let toastContainer = null;
let toastId = 0;

function initToastContainer() {
  if (toastContainer) return;
  
  toastContainer = document.createElement('div');
  toastContainer.id = 'toast-container';
  toastContainer.className = 'fixed top-4 right-4 z-50 flex flex-col gap-2 max-w-sm';
  document.body.appendChild(toastContainer);
}

function showToast(message, type = 'info', duration = 4000) {
  initToastContainer();
  
  const id = ++toastId;
  const toast = document.createElement('div');
  toast.id = `toast-${id}`;
  toast.className = `toast bg-white border rounded-lg shadow-card-hover p-4 flex items-start gap-3 animate-slide-in-right`;
  
  const colors = {
    success: 'border-green-200',
    error: 'border-red-200',
    warning: 'border-yellow-200',
    info: 'border-blue-200',
  };
  
  const icons = {
    success: 'check_circle text-green-600',
    error: 'error text-red-600',
    warning: 'warning text-yellow-600',
    info: 'info text-blue-600',
  };
  
  toast.classList.add(colors[type] || colors.info);
  toast.innerHTML = `
    <span class="material-symbols-outlined ${icons[type] || icons.info} text-lg shrink-0">${icons[type] || icons.info}</span>
    <div class="flex-1">
      <p class="text-sm text-stone-900">${message}</p>
    </div>
    <button onclick="dismissToast(${id})" class="shrink-0 text-stone-400 hover:text-stone-600">
      <span class="material-symbols-outlined text-sm">close</span>
    </button>
  `;
  
  toastContainer.appendChild(toast);
  
  // Auto dismiss
  setTimeout(() => dismissToast(id), duration);
  
  return id;
}

function dismissToast(id) {
  const toast = document.getElementById(`toast-${id}`);
  if (toast) {
    toast.style.opacity = '0';
    toast.style.transform = 'translateX(100%)';
    toast.style.transition = 'all 0.3s ease';
    setTimeout(() => toast.remove(), 300);
  }
}

// Global exposure
window.showToast = showToast;
window.dismissToast = dismissToast;
