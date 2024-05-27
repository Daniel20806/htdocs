let cart = [];

function addToOrder(name, price) {
    const existingItem = cart.find(item => item.name === name);

    if (existingItem) {
        existingItem.quantity++;
    } else {
        cart.push({ name: name, price: price, quantity: 1 });
    }

    updateCartDisplay();
    saveCartToStorage();
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

    const cartButton = document.getElementById('cartButton');
    cartButton.textContent = `購物車 (${cart.length})`;
}

function saveCartToStorage() {
    localStorage.setItem('cart', JSON.stringify(cart));
}

document.addEventListener('DOMContentLoaded', () => {
    const cartButton = document.getElementById('cartButton');
    cartButton.addEventListener('click', () => {
        document.getElementById('cartContainer').style.display = 'block';
    });

    const checkoutButton = document.getElementById('checkoutButton');
    checkoutButton.addEventListener('click', () => {
        if (cart.length > 0) {
            window.location.href = "cart.html";
        } else {
            alert('購物車是空的，無法結帳。');
        }
    });

    loadCartFromStorage();
});

function loadCartFromStorage() {
    const storedCart = localStorage.getItem('cart');

    if (storedCart) {
        cart = JSON.parse(storedCart);
        updateCartDisplay();
    }
}

function increaseQuantity(name) {
    const item = cart.find(item => item.name === name);
    if (item) {
        item.quantity++;
        updateCartDisplay();
        saveCartToStorage();
    }
}

function decreaseQuantity(name) {
    const item = cart.find(item => item.name === name);
    if (item && item.quantity > 1) {
        item.quantity--;
        updateCartDisplay();
        saveCartToStorage();
    } else if (item && item.quantity === 1) {
        cart = cart.filter(item => item.name !== name);
        updateCartDisplay();
        saveCartToStorage();
    }
}

function scrollToCategory(categoryId) {
    const categorySection = document.getElementById(categoryId);
    if (categorySection) {
        categorySection.scrollIntoView({ behavior: 'smooth' });
    }
}


