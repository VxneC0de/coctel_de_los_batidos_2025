/*
HACER
ERRORES EN LOGIN:
Si la clave es incorrecta o el usuario es incorrecto.

ACOMODAR VISTA DE MENU EN HEADER_CONTENT MARGIN-TOP
@media screen and (max-width: 570px) {
    .hero {
        height: auto; //revisar
    }
}

ACOMODAR VISTA DE NAV USER: ESTAN MUY PEGADOS EL NOMBRE DEL USER Y EL GMAIL DEL USER

REVISAR EL ACTIONS PARA CREAR NUEVO REGISTRO DE USUARIO:
Se quito el id_payment, hay que acomodarlo en el INSERT

VISTA DE MODAL PARA AGREGAR AL CARRITO

ACOMODAR LAS RESPUESTAS DE SI LA ACTUALIZACION FUE CORRECTA O NO EN EDITAR PRODUCTO.
AGREGAR VENTANA DE SI ESTA SEGURO DE QUERER ELIMINAR CON ESTILO (DESCARGAR EL PACK PARA ESO)


*/

/*!SECTION

Sí, puedes hacer que el botón para agregar al carrito en la ventana modal envíe el ID del producto y la cantidad seleccionada al carrito. Para lograr esto, puedes seguir estos pasos:

Abrir la ventana modal con el formulario para agregar la cantidad:

Primero, necesitas tener una función JavaScript que abra la ventana modal y pase el ID del producto.
<script>
    function openModal(productId) {
        document.getElementById('productIdInput').value = productId;
        document.getElementById('addToCartModal').style.display = 'block';
    }

    function closeModal() {
        document.getElementById('addToCartModal').style.display = 'none';
    }
</script>


Y en el HTML:
<div id="addToCartModal" style="display: none;">
    <div class="modal-content">
        <span onclick="closeModal()">Cerrar</span>
        <form id="addToCartForm" method="POST" action="add_to_cart.php">
            <input type="hidden" name="productId" id="productIdInput">
            <label for="quantity">Cantidad:</label>
            <input type="number" name="quantity" id="quantity" min="1" required>
            <button type="submit">Agregar al carrito</button>
        </form>
    </div>
</div>


Botón de agregar al carrito en cada producto:

Asegúrate de que cada botón en los productos llame a la función openModal con el ID del producto correspondiente.
<button class="btn_hero_2" onclick="openModal('<?php echo $product['id']; ?>')">Agregar al carrito</button>


Procesar la solicitud en el servidor (PHP):

En el archivo add_to_cart.php, procesa los datos enviados desde el formulario.
<?php
include "../../controller/connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = $_POST['productId'];
    $quantity = $_POST['quantity'];

    // Aquí puedes agregar el producto al carrito en la base de datos
    $sql = "INSERT INTO cart (product_id, quantity) VALUES ('$productId', '$quantity')";
    if (mysqli_query($connection, $sql)) {
        echo "Producto agregado al carrito.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
}
?>


Con estos pasos, cuando el usuario haga clic en el botón "Agregar al carrito", se abrirá la ventana modal donde podrá seleccionar la cantidad. Al enviar el formulario, se enviarán el ID del producto y la cantidad seleccionada al servidor para agregar el producto al carrito. Así garantizas que el ID del producto se maneja correctamente y se agrega al carrito junto con la cantidad deseada.

*/


/*

Gracias por compartir la parte visual del carrito. Para integrar la funcionalidad de agregar productos al carrito desde tu página principal y manejar la cantidad de productos, puedes seguir estos pasos:

Actualizar el HTML del producto para abrir la ventana modal:

Asegúrate de que cada botón para agregar al carrito invoque la función openModal con el ID del producto:
<button class="btn_hero_2" onclick="openModal('<?php echo $product['id']; ?>')">Agregar al carrito</button>


Agregar la ventana modal para seleccionar la cantidad:

Agrega la ventana modal al HTML de tu página para que el usuario pueda seleccionar la cantidad de producto:
<div id="addToCartModal" style="display: none;">
    <div class="modal-content">
        <span onclick="closeModal()">Cerrar</span>
        <form id="addToCartForm" method="POST" action="add_to_cart.php">
            <input type="hidden" name="productId" id="productIdInput">
            <label for="quantity">Cantidad:</label>
            <input type="number" name="quantity" id="quantity" min="1" required>
            <button type="submit">Agregar al carrito</button>
        </form>
    </div>
</div>


JavaScript para manejar la ventana modal:

Usa JavaScript para mostrar y ocultar la ventana modal y para pasar el ID del producto al formulario:
<script>
    function openModal(productId) {
        document.getElementById('productIdInput').value = productId;
        document.getElementById('addToCartModal').style.display = 'block';
    }

    function closeModal() {
        document.getElementById('addToCartModal').style.display = 'none';
    }
</script>


Procesar la solicitud de agregar al carrito (PHP):

En el archivo add_to_cart.php, procesa los datos enviados desde el formulario para agregar el producto al carrito:
<?php
include "../../controller/connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = $_POST['productId'];
    $quantity = $_POST['quantity'];

    // Aquí puedes agregar el producto al carrito en la base de datos o en la sesión
    $sql = "INSERT INTO cart (product_id, quantity) VALUES ('$productId', '$quantity')";
    if (mysqli_query($connection, $sql)) {
        echo "Producto agregado al carrito.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
}
?>


Actualizar la visualización del carrito:

Cuando el usuario agregue productos al carrito, actualiza la visualización del carrito para reflejar los productos agregados y sus cantidades. Aquí tienes un ejemplo básico de cómo podrías hacerlo:
<?php
// Obtener los productos en el carrito desde la base de datos o la sesión
$cartItems = []; // Supón que esto viene de tu base de datos o sesión

foreach ($cartItems as $item):
?>
<div class="cart_item">
    <div class="remove_item">
        <span onclick="removeFromCart(<?php echo $item['id']; ?>)"><i class='bx bx-trash'></i></span>
    </div>
    <div class="item_details">
        <div class="item_details_title">
            <p><?php echo $item['name']; ?></p>
        </div>
        <div class="item_details_price">
            <strong>Bs. <span><?php echo number_format($item['price'], 2, ",", "."); ?></span></strong>
        </div>
    </div>
    <div class="qty">
        <span onclick="decreaseQty(<?php echo $item['id']; ?>)">-</span>
        <strong><?php echo $item['quantity']; ?></strong>
        <span onclick="increaseQty(<?php echo $item['id']; ?>)">+</span>
    </div>
</div>
<?php endforeach; ?>

Con estos pasos, tu sistema permitirá agregar productos al carrito, manejar la cantidad seleccionada y actualizar la visualización del carrito dinámicamente. Si tienes alguna otra pregunta o necesitas más ayuda, ¡estoy aquí para ayudarte!

*/


/*

para borrar:
DROP TABLE IF EXISTS metodo;


metodo
CREATE TABLE metodo (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name_metodo VARCHAR(50) NOT NULL,
    status TINYINT(4) UNSIGNED NOT NULL
);

INSERT INTO metodo (name_metodo, status) VALUES
('Pago Móvil', 1),
('Efectivo', 1),
('Tarjeta', 1);


payment
CREATE TABLE payment (
    id_payment INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_user_payment INT(11) UNSIGNED NOT NULL,
    id_order_payment INT(11) UNSIGNED NOT NULL,
    id_metodo_payment INT(11) UNSIGNED NOT NULL,
    email_payment VARCHAR(100) NOT NULL,
    area_payment VARCHAR(50) NOT NULL,
    phone_payment VARCHAR(20) NOT NULL,
    date_payment DATE NOT NULL,
    hour_payment TIME NOT NULL,
    reference VARCHAR(50) NOT NULL,
    img_payment VARCHAR(255)
);

user
CREATE TABLE user (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nick VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    code VARCHAR(50),
    status TINYINT(4) UNSIGNED NOT NULL
);


cart
CREATE TABLE cart (
    id_cart INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_user_cart INT(11) UNSIGNED NOT NULL,
    id_product_cart INT(11) UNSIGNED NOT NULL,
    quantity_cart INT(11) UNSIGNED NOT NULL,
    status TINYINT(4) UNSIGNED NOT NULL
);


product
CREATE TABLE product (
    id_product INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_category INT(11) UNSIGNED NOT NULL,
    name_product VARCHAR(100) NOT NULL,
    description_product TEXT NOT NULL,
    img_product VARCHAR(255),
    price_product DOUBLE NOT NULL,
    date_product DATE NOT NULL,
    quantity_product INT(11) UNSIGNED NOT NULL,
    status TINYINT(4) UNSIGNED NOT NULL
    
);

orders
CREATE TABLE orders (
    id_order INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_user_order INT(11) UNSIGNED NOT NULL,
    order_details TEXT NOT NULL,  -- Usamos TEXT para almacenar los detalles de los productos del carrito
    total DOUBLE NOT NULL,
    status TINYINT(4) UNSIGNED NOT NULL
);

category
CREATE TABLE category (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name_category VARCHAR(50) NOT NULL,
    status TINYINT(4) UNSIGNED NOT NULL
);

INSERT INTO category (name_category, status) VALUES
('Promociones', 1),
('Empanadas', 1),
('Pastelitos', 1),
('Especiales', 1),
('Hamburguesas', 1),
('Perritos Calientes', 1),
('Bebidas Frías', 1),
('Otros', 1);

*/