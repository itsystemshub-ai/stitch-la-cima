function updateCartCounter() {
        const cart = JSON.parse(localStorage.getItem('cart') || '[]');
        const count = document.getElementById('cart-count');
        if (count) count.textContent = cart.length;
    }
    document.addEventListener('DOMContentLoaded', updateCartCounter);