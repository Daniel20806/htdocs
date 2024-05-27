document.addEventListener('DOMContentLoaded', () => {
    loadCartFromStorage();

    const checkoutButton = document.getElementById('checkoutButton');
    checkoutButton.addEventListener('click', () => {
        alert('感謝您的購買！');
        clearCart();
        window.location.href = 'order.html';
    });

    const backButton = document.getElementById('backButton');
    backButton.addEventListener('click', () => {
        window.location.href = 'order.html';
    });
});

let cart = [];

function loadCartFromStorage() {
    const storedCart = localStorage.getItem('cart');

    if (storedCart) {
        cart = JSON.parse(storedCart);
        updateCartDisplay();
    }
}

function updateCartDisplay() {
    const cartItems = document.getElementById('cartItems');
    const totalPrice = document.getElementById('totalPrice');

    cartItems.innerHTML = '';
    let total = 0;

    cart.forEach(item => {
        const li = document.createElement('li');
        li.textContent = `${item.name} x${item.quantity} - NT$${item.price * item.quantity}`;
        cartItems.appendChild(li);
        total += item.price * item.quantity;
    });

    totalPrice.textContent = `總金額: NT$${total}`;

    if (cart.length === 0) {
        checkoutButton.disabled = true;
    } else {
        checkoutButton.disabled = false;
    }
}

function clearCart() {
    cart = [];
    localStorage.removeItem('cart');
    updateCartDisplay();
}

