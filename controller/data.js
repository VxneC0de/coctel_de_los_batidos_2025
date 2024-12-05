/*

para borrar:
DROP TABLE IF EXISTS metodo;



payment
CREATE TABLE payment (
    id_payment INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_user_payment INT(11) UNSIGNED NOT NULL,
    id_metodo_payment INT(11) UNSIGNED NOT NULL,
    name_payment VARCHAR(50) NOT NULL,
    lastName_payment VARCHAR(50) NOT NULL,
    phone_payment VARCHAR(20) NOT NULL,
    description_payment TEXT NOT NULL,
    date_payment VARCHAR(50) NOT NULL,
    hour_payment VARCHAR(50) NOT NULL,
    reference_data VARCHAR(50) NOT NULL,
    reference_phone VARCHAR(20) NOT NULL,
    img_payment VARCHAR(255)
);

user
user (
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
    price_cart DOUBLE NOT NULL,
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
    id_payment_order INT(11) UNSIGNED NOT NULL,
    order_details TEXT NOT NULL,
    total_bs DOUBLE NOT NULL,
    total_ef DOUBLE NOT NULL,
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
('Papas Rellenas', 1),
('Bebidas Frías', 1),
('Otros', 1);




tasa de cambio
CREATE TABLE tasas_de_cambio (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tasa_cambio DECIMAL(10, 4) NOT NULL,
    fecha_cambio DATE NOT NULL,
    status TINYINT(4) UNSIGNED NOT NULL
);

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


CREATE TABLE user_two (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nick VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    verification_code TEXT NOT NULL,
    email_verified_at DATETIME DEFAULT NULL,
    code VARCHAR(50),
    status TINYINT(4) UNSIGNED NOT NULL
);

*/

/*
case 7:

        $user_id = $_SESSION['who'];

        foreach ($id_product_cart as $index => $product_id) {
            $product_price = $price_cart[$index];
            $product_quantity = $quantity_cart[$index];
            $status_value = $status[$index];

            // Verificar si el producto ya existe en el carrito para ese usuario
            $checkQuery = "SELECT * FROM cart WHERE id_user_cart = '$user_id' AND id_product_cart = '$product_id'";
            $checkResult = mysqli_query($connection, $checkQuery);

            if (mysqli_num_rows($checkResult) > 0) {
                // Actualizar la cantidad del producto en el carrito
                $query = "UPDATE cart SET quantity_cart = '$product_quantity', price_cart = '$product_price' WHERE id_user_cart = '$user_id' AND id_product_cart = '$product_id'";
            } else {
                // Insertar el nuevo producto en el carrito
                $query = "INSERT INTO cart (id_user_cart, id_product_cart, price_cart, quantity_cart, status) VALUES ('$user_id', '$product_id', '$product_price', '$product_quantity', '$status_value')";
            }

            $consulta = mysqli_query($connection, $query);

            if (!$consulta) {
                echo "Error: " . mysqli_error($connection);
            }
        }
        header("Location: ../visual/payment_oficial/payment.php");
        break;

*/




