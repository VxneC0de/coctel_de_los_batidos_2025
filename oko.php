<?php
include "../../controller/connection.php";

// Variables para filtrar
$search = isset($_POST['search']) ? $_POST['search'] : '';

// Construir la consulta SQL con los filtros aplicados y ordenar por id_category
$sql = "SELECT p.*, c.name_category 
        FROM product p 
        JOIN category c ON p.id_category = c.id
        ORDER BY p.id_category ASC";  // Ordenar por id_category

if ($search != '') {
    $sql .= " AND p.name_product LIKE '%$search%'";
}

$consult = mysqli_query($connection, $sql);

// Array para almacenar los productos por categoría
$productsByCategory = [];

while ($ver = mysqli_fetch_array($consult)) {
    $productsByCategory[$ver['id_category']][] = $ver;
}
?>

<?php foreach ($productsByCategory as $categoryId => $products): ?>
    <section class="section_container order_container" id="<?php echo strtolower($products[0]['name_category']); ?>">

        <p class="section_description">
            <?php echo strtoupper($products[0]['name_category']); ?>
        </p>

        <div class="order_grid">
            <?php foreach ($products as $product): ?>
                <div class="order_card">
                    <img src="<?php echo "../../img/" . basename($product['img_product']); ?>" alt="order">
                    <h4><?php echo $product['name_product']; ?></h4>
                    <h2><?php echo number_format($product['price_product'], 2, ",", ".") . " Bs"; ?></h2>

                    <!-- Botón para agregar al carrito -->
                    <button class="btn_hero_2" data-id="<?php echo $product['id_product']; ?>">Agregar al carrito</button>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
<?php endforeach; ?>

<section class="show_order">
    <button class="close_show_order"><i class="fas fa-times"></i></button>
    <div class="order_content">
        <div class="image_section">
            <img id="productImage" src="" alt="Producto" width="200">
        </div>
        <div class="details_section">
            <div class="input_group">
                <label for="productName">Nombre:</label>
                <input type="text" id="productName" readonly>
            </div>
            <div class="input_group">
                <label for="productCategory">Categoría:</label>
                <input type="text" id="productCategory" readonly>
            </div>
            <div class="input_group">
                <label for="productPrice">Precio:</label>
                <input type="text" id="productPrice" readonly>
            </div>
            <!-- Sección relacionada con la descripción -->
            <div class="input_group">
                <label for="productDescription">Descripción:</label>
                <textarea id="productDescription" rows="4" readonly></textarea>
            </div>
            <div class="input_group">
                <label for="productStatus">Estado:</label>
                <input type="text" id="productStatus" readonly>
            </div>
            <div class="input_group quantity">
                <label for="productQuantity">Cantidad:</label>
                <div class="quantity_control">
                    <button class="decrement">-</button>
                    <input type="text" id="productQuantity" value="1" readonly>
                    <button class="increment">+</button>
                </div>
            </div>
            <div class="input_group">
                <button class="add_to_cart">Mandar al carrito</button>
            </div>
        </div>
    </div>
</section>

<script>
    document.querySelectorAll('.btn_hero_2').forEach(button => {
        button.addEventListener('click', function () {
            const productId = this.getAttribute('data-id');

            // Hacer una llamada AJAX para obtener los detalles del producto
            fetch(`get_product_details.php?id=${productId}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('productImage').src = `../../img/${data.img_product}`;
                    document.getElementById('productName').value = data.name_product;
                    document.getElementById('productCategory').value = data.name_category;
                    document.getElementById('productPrice').value = new Intl.NumberFormat('es-VE', {
                        style: 'currency',
                        currency: 'VES'
                    }).format(data.price_product);
                    // Línea relacionada con la descripción
                    document.getElementById('productDescription').value = data.description_product;

                    const statusText = (data.status == 1) ? "Disponible" : "No Disponible";
                    document.getElementById('productStatus').value = statusText;

                    // Restablecer la cantidad a 1 cada vez que se abre el modal
                    document.getElementById('productQuantity').value = 1;

                    document.querySelector('.modal_overlay').style.display = 'block';
                    document.querySelector('.show_order').style.display = 'flex';

                    document.querySelector('.add_to_cart').dataset.product = JSON.stringify({
                        id: data.id_product,
                        name: data.name_product,
                        price: data.price_product,
                        quantity: 1,
                        status: data.status
                    });
                })
                .catch(error => console.error('Error:', error));
        });
    });

    // Asegúrate de que este código se ejecute cuando se cierre el modal
    document.querySelector('.close_show_order').addEventListener('click', function () {
        document.querySelector('.modal_overlay').style.display = 'none';
        document.querySelector('.show_order').style.display = 'none';

        // Reiniciar la cantidad a 1
        document.getElementById('productQuantity').value = 1;

        // Reiniciar la cantidad en el dataset de 'add_to_cart'
        const productData = JSON.parse(document.querySelector('.add_to_cart').dataset.product);
        productData.quantity = 1;
        document.querySelector('.add_to_cart').dataset.product = JSON.stringify(productData);
    });

    document.querySelector('.increment').addEventListener('click', function () {
        const quantityInput = document.getElementById('productQuantity');
        let quantity = parseInt(quantityInput.value);
        quantity++;
        quantityInput.value = quantity;

        const productData = JSON.parse(document.querySelector('.add_to_cart').dataset.product);
        productData.quantity = quantity;
        document.querySelector('.add_to_cart').dataset.product = JSON.stringify(productData);
    });

    document.querySelector('.decrement').addEventListener('click', function () {
        const quantityInput = document.getElementById('productQuantity');
        let quantity = parseInt(quantityInput.value);
        if (quantity > 1) {
            quantity--;
            quantityInput.value = quantity;
        }

        const productData = JSON.parse(document.querySelector('.add_to_cart').dataset.product);
        productData.quantity = quantity;
        document.querySelector('.add_to_cart').dataset.product = JSON.stringify(productData);
    });

    // Funcionalidad para "Mandar al carrito"
    document.querySelector('.add_to_cart').addEventListener('click', function () {
        const productData = JSON.parse(this.dataset.product);

        if (productData.status != 1) {
            alert('El producto no está disponible, no se puede agregar al carrito.');
            // Cerrar el modal después de la alerta
            document.querySelector('.modal_overlay').style.display = 'none';
            document.querySelector('.show_order').style.display = 'none';
            return;
        }

        const cartItemsContainer = document.querySelector('.cart_items');
        let existingCartItem = Array.from(cartItemsContainer.querySelectorAll('.cart_item')).find(cartItem =>
            cartItem.querySelector('.item_details_title p').textContent === productData.name
        );

        const form = document.querySelector('.cart_sidebar');

        let isExistingProduct = false;

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

            isExistingProduct = true;
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
            cartItem.querySelector('.remove_cart_item').addEventListener('click', function (e) {
                e.preventDefault();
                cartItem.remove();
                updateSubtotal();
                updateCartQuantity();
            });
        }

        updateSubtotal();
        updateCartQuantity(productData.quantity, isExistingProduct);

        // Cerrar el modal independientemente si es un nuevo producto o uno existente
        document.querySelector('.modal_overlay').style.display = 'none';
        document.querySelector('.show_order').style.display = 'none';
    });

    function updateCartQuantity(addedQuantity, isExistingProduct) {
        const cartIcon = document.querySelector('.cart_icon span');
        let currentQuantity = parseInt(cartIcon.textContent);

        if (isExistingProduct) {
            // No incrementar el conteo total si es un producto existente que se está actualizando
            currentQuantity += addedQuantity;
        } else {
            // Incrementar el conteo total para nuevos productos
            currentQuantity += addedQuantity;
        }

        cartIcon.textContent = currentQuantity;
    }

    function updateSubtotal() {
        const cartItems = document.querySelectorAll('.cart_item');
        let subtotal = 0;

        cartItems.forEach(item => {
            const price = parseFloat(item.querySelector('.item_details_price span').textContent);
            subtotal += price;
        });

        document.querySelector('#subtotal').textContent = subtotal.toFixed(2);
    }
</script>