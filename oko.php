<?php

/*
¡Por supuesto! Aquí tienes un ejemplo de cómo podrías mostrar los detalles de la orden, con el nombre del producto, el precio, la cantidad y el monto total calculado.

Primero, asegúrate de haber recuperado el order_details de la base de datos. Luego, puedes procesar y mostrar esta información en una tabla de HTML como se describe. Aquí tienes el código:

*/

// Supongamos que ya has recuperado el `order_details` y está almacenado en $order_details
$order_details = "Producto: 1, Cantidad: 1, Subtotal: 45\nProducto: 2, Cantidad: 3, Subtotal: 135\nProducto: 5, Cantidad: 2, Subtotal: 90";

// Dividir los detalles por líneas
$order_items = explode("\n", trim($order_details));

// Conexión a la base de datos
include "./controller/connection.php";

echo "<table border='1'>";
echo "<tr>
        <th>Nombre del producto</th>
        <th>Precio</th>
        <th>Cantidad</th>
        <th>Monto total</th>
      </tr>";

foreach ($order_items as $item) {
    // Asegúrate de que no esté procesando una línea vacía
    if (!empty($item)) {
        // Dividir cada detalle en partes
        $parts = explode(", ", $item);
        
        // Extraer los valores
        $product_id = str_replace("Producto: ", "", $parts[0]);
        $quantity = str_replace("Cantidad: ", "", $parts[1]);
        $subtotal = str_replace("Subtotal: ", "", $parts[2]);

        // Consulta adicional para obtener el nombre y el precio del producto
        $product_query = "SELECT name_product, price_product FROM product WHERE id_product = '$product_id'";
        $result = mysqli_query($connection, $product_query);
        $product_data = mysqli_fetch_assoc($result);

        $product_name = $product_data['name_product'];
        $price = $product_data['price_product'];

        // Calcular el monto total
        $total = $price * $quantity;

        echo "<tr>
                <td>{$product_name}</td>
                <td>Bs. " . number_format($price, 2, ',', '.') . "</td>
                <td>{$quantity}</td>
                <td>Bs. " . number_format($total, 2, ',', '.') . "</td>
              </tr>";
    }
}

echo "</table>";



/*
Explicación del Código:
Recuperar y Dividir los Detalles de la Orden: El order_details se divide en líneas, cada una representando un producto.

Consulta para Obtener Detalles del Producto: Se hace una consulta a la base de datos para obtener el nombre y el precio del producto basado en el id_product.

Calcular el Monto Total: Se calcula el monto total multiplicando la cantidad por el precio del producto.

Mostrar los Detalles en una Tabla: Los detalles se presentan en una tabla HTML con columnas para el nombre del producto, precio, cantidad y monto total.

Asegúrate de ajustar el código de acuerdo a tu estructura y datos reales. Con este enfoque, podrás mostrar todos los detalles relevantes de manera clara y ordenada.

Si tienes más preguntas o necesitas más ajustes, ¡aquí estoy para ayudarte! */

?>;

<?php

include "connection.php";
session_start();
extract($_POST);
extract($_GET);

switch($hidden){
case 9:
    // INSERTAR DATOS DEL PAGO
    $id_user = $_SESSION['who'];
    $id_metodo = ($_POST['payment_method'] == "movil" ? 1 : ($_POST['payment_method'] == "efectivo" ? 2 : 3));
    $name = $_POST['namePay'];
    $lastName = $_POST['lasnamePay'];
    $phone = $_POST['phonePay'];
    $notes = $_POST['notesPay'];
    $date = $_POST['datePay'];
    $hour = $_POST['hourPay'];
    $reference_data = $_POST['reference_movil'] ?: ($_POST['reference_efectivo'] ?: '');
    $reference_phone = $_POST['phone_movil'] ?: ($_POST['phone_efectivo'] ?: '');

    // Manejo de archivos para los dos tipos de pagos
    $img = "";
    if (isset($_FILES['img_movil']['tmp_name']) && !empty($_FILES['img_movil']['tmp_name'])) {
        $img = handleFileUpload('img_movil', $connection);
    } elseif (isset($_FILES['img_efectivo']['tmp_name']) && !empty($_FILES['img_efectivo']['tmp_name'])) {
        $img = handleFileUpload('img_efectivo', $connection);
    }

    $sql_payment = "INSERT INTO payment (id_user_payment, id_metodo_payment, name_payment, lastName_payment, phone_payment, description_payment, date_payment, hour_payment, reference_data, reference_phone, img_payment) 
            VALUES ('$id_user', '$id_metodo', '$name', '$lastName', '$phone', '$notes', '$date', '$hour', '$reference_data', '$reference_phone', '$img')";

    if (mysqli_query($connection, $sql_payment)) {
        $id_payment = mysqli_insert_id($connection); // Obtener el ID del pago recién insertado

        // OBTENER PRODUCTOS DEL CARRITO
        $sql_cart = "SELECT c.id_product_cart, c.quantity_cart, p.price_product
                     FROM cart c 
                     JOIN product p ON c.id_product_cart = p.id_product
                     WHERE c.id_user_cart = '$id_user' AND c.status = 1";
        $result_cart = mysqli_query($connection, $sql_cart);

        $order_details = "";
        $total_bs = 0;
        while ($row_cart = mysqli_fetch_assoc($result_cart)) {
            $id_product = $row_cart['id_product_cart'];
            $quantity = $row_cart['quantity_cart'];
            $price = $row_cart['price_product'];
            $subtotal = $price * $quantity;
            $total_bs += $subtotal;
            $order_details .= "Producto: $id_product, Cantidad: $quantity, Subtotal: $subtotal\n";
        }

        // OBTENER LA TASA DE CAMBIO MÁS RECIENTE
        $tasaSql = "SELECT tasa_cambio FROM tasas_de_cambio ORDER BY fecha_cambio DESC LIMIT 1";
        $tasaResult = mysqli_query($connection, $tasaSql);
        
        if ($tasaResult && mysqli_num_rows($tasaResult) > 0) {
            $tasaRow = mysqli_fetch_assoc($tasaResult);
            $tasaCambio = $tasaRow['tasa_cambio'];
            $total_ef = $total_bs / $tasaCambio;
        } else {
            $tasaCambio = 1; // Valor por defecto en caso de no encontrar la tasa
            $total_ef = $total_bs / $tasaCambio;
        }

        // INSERTAR NUEVO PEDIDO EN LA TABLA ORDERS
        $sql_order = "INSERT INTO orders (id_user_order, id_payment_order, order_details, total_bs, total_ef, status) 
                      VALUES ('$id_user', '$id_payment', '$order_details', '$total_bs', '$total_ef', 1)";

        if (mysqli_query($connection, $sql_order)) {
            $id_order = mysqli_insert_id($connection);

            // ACTUALIZAR EL ESTADO DE TODOS LOS PRODUCTOS EN EL CARRITO A 2
            $sql_update_cart = "UPDATE cart SET status = 2 WHERE id_user_cart = '$id_user' AND status = 1";
            mysqli_query($connection, $sql_update_cart);

            header("Location: ../visual/order_client/order.php");
        } else {
            header("Location: ../visual/payment_oficial/payment.php?answer=2");
        }
    } else {
        header("Location: ../visual/payment_oficial/payment.php?answer=2");
    }
    break;
};

?>


