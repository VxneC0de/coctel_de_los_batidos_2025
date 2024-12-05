<?php


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
