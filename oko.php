function updateCartQuantity() {
    const cartIcon = document.querySelector('.cart_icon span');
    const uniqueProductsCount = document.querySelectorAll('.cart_items .cart_item').length;
    cartIcon.textContent = uniqueProductsCount;
}

// Funcionalidad para "Mandar al carrito"
document.querySelector('.add_to_cart').addEventListener('click', function() {
    const productData = JSON.parse(this.dataset.product);

    if (productData.status != 1) {
        alert('El producto no está disponible, no se puede agregar al carrito.');
        document.querySelector('.modal_overlay').style.display = 'none';
        document.querySelector('.show_order').style.display = 'none';
        return;
    }

    const cartItemsContainer = document.querySelector('.cart_items');
    let existingCartItem = Array.from(cartItemsContainer.querySelectorAll('.cart_item')).find(cartItem =>
        cartItem.querySelector('.item_details_title p').textContent === productData.name
    );

    const form = document.querySelector('.cart_sidebar');

    if (existingCartItem) {
        const existingQuantity = existingCartItem.querySelector('.qty strong');
        const newQuantity = parseInt(existingQuantity.textContent) + productData.quantity;
        existingQuantity.textContent = newQuantity;

        const existingPriceSpan = existingCartItem.querySelector('.item_details_price span');
        const newPrice = (parseFloat(existingPriceSpan.textContent) + (productData.price * productData.quantity)).toFixed(2);
        existingPriceSpan.textContent = newPrice;

        const quantityInput = existingCartItem.querySelector('input[name="quantity_cart[]"]');
        quantityInput.value = newQuantity;
        const priceInput = existingCartItem.querySelector('input[name="price_cart[]"]');
        priceInput.value = newPrice;
    } else {
        const cartItem = document.createElement('div');
        cartItem.classList.add('cart_item');

        cartItem.innerHTML = `
            <div class="remove_item">
                <a href="#" class="remove_cart_item"><i class='bx bx-trash'></i></a>
            </div>
            <div class="item_details">
                <div class="item_details_title">
                    <p>${productData.name}</p>
                </div>
                <div class="item_details_price">
                    <strong>Bs. <span>${(productData.price * productData.quantity).toFixed(2)}</span></strong>
                </div>
            </div>
            <div class="qty">
                <span>-</span>
                <strong>${productData.quantity}</strong>
                <span>+</span>
            </div>
        `;

        cartItemsContainer.appendChild(cartItem);

        const hiddenInputsHTML = `
            <input type="hidden" name="id_user_cart[]" value="${productData.user_id}">
            <input type="hidden" name="id_product_cart[]" value="${productData.id}">
            <input type="hidden" name="price_cart[]" value="${(productData.price * productData.quantity).toFixed(2)}">
            <input type="hidden" name="quantity_cart[]" value="${productData.quantity}">
            <input type="hidden" name="status[]" value="1">
        `;
        form.insertAdjacentHTML('beforeend', hiddenInputsHTML);

        // Añadir evento click para eliminar el producto del DOM
        cartItem.querySelector('.remove_cart_item').addEventListener('click', function(e) {
            e.preventDefault();
            cartItem.remove();
            updateSubtotal();
            updateCartQuantity();
        });
    }

    updateSubtotal();
    updateCartQuantity();

    // Cerrar el modal independientemente de si es un producto nuevo o existente
    document.querySelector('.modal_overlay').style.display = 'none';
    document.querySelector('.show_order').style.display = 'none';
});

// Al cargar el carrito desde la base de datos
document.addEventListener('DOMContentLoaded', function() {
    const cartItemsCount = document.querySelectorAll('.cart_items .cart_item').length;
    document.querySelector('.cart_icon span').textContent = cartItemsCount;
});
