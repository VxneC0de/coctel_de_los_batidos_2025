<div class="table_section_list">
    <table>
        <thead>
            <tr>
                <th>Nombre del producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Monto total</th>
            </tr>
        </thead>
        <tbody>
        <?php
            // Suponiendo que `order_details` contiene los detalles del pedido en formato JSON
            $order_details = json_decode($ver['order_details'], true);
            foreach ($order_details as $item) {
                $product_id = $item['id_product'];
                $quantity = $item['quantity'];
                $subtotal = $item['subtotal'];

                // Obtener el nombre del producto desde la base de datos usando $product_id
                $sql_product_name = "SELECT name_product FROM product WHERE id_product = '$product_id'";
                $result_product_name = mysqli_query($connection, $sql_product_name);
                $row_product_name = mysqli_fetch_assoc($result_product_name);
                $product_name = $row_product_name['name_product'] ?? 'Producto desconocido';

                echo "<tr>";
                echo "<td>$product_name</td>";
                echo "<td>BS. $subtotal</td>";
                echo "<td>$quantity</td>";
                echo "<td>BS. $subtotal</td>";
                echo "</tr>";
            }
        ?>
        </tbody>
    </table>
</div>





<div class="table_section">
    <?php
        include "../../controller/connection.php";

        // Variables para filtrar
        $search = isset($_POST['search']) ? $_POST['search'] : '';

        // Construir la consulta SQL
        $sql = "
            SELECT o.id_order, p.name_payment, p.lastName_payment, u.email, p.phone_payment, p.id_metodo_payment, p.reference_data, p.reference_phone, p.date_payment, p.hour_payment, o.total_bs, o.total_ef, o.status, o.order_details
            FROM orders o
            JOIN user u ON o.id_user_order = u.id
            JOIN payment p ON o.id_payment_order = p.id_payment
            WHERE o.status != 3
        ";

        if ($search != '') { 
            $sql .= " AND u.nick LIKE '%$search%'"; 
        }

        $consult = mysqli_query($connection, $sql);

        while ($ver = mysqli_fetch_array($consult)) {
            // Determinar el texto del status
            $statusText = '';
            switch ($ver['status']) {
                case 1:
                    $statusText = 'confirmacion';
                    break;
                case 2:
                    $statusText = 'proceso';
                    break;
                case 3:
                    $statusText = 'listo';
                    break;
                case 4:
                    $statusText = 'entregado';
                    break;
            }
            
            // Obtener el método de pago
            $metodoPago = '';
            switch ($ver['id_metodo_payment']) {
                case 1:
                    $metodoPago = 'Pago Móvil';
                    break;
                case 2:
                    $metodoPago = 'Efectivo';
                    break;
                case 3:
                    $metodoPago = 'Tarjeta';
                    break;
            }
    ?>

    <table>
        <thead>
            <tr>
                <th>N° de Orden</th>
                <th>Cliente</th>
                <th>Status</th>
                <th>Ver Orden</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td><?php echo $ver['id_order']; ?></td>
                <td>
                    <p><?php echo $ver['name_payment']; ?></p>
                    <p><?php echo $ver['lastName_payment']; ?></p>
                </td>
                <td>
                    <div class="status_list_order">
                        <p><?php echo ucfirst($statusText); ?></p>
                    </div>
                </td>
                <td>
                    <a class="button_action_1" data-id="<?php echo $ver['id_order']; ?>" data-name="<?php echo $ver['name_payment']; ?>" data-surname="<?php echo $ver['lastName_payment']; ?>" data-email="<?php echo $ver['email']; ?>" data-phone="<?php echo $ver['phone_payment']; ?>" data-total-bs="<?php echo $ver['total_bs']; ?>" data-total-ef="<?php echo $ver['total_ef']; ?>" data-payment="<?php echo $metodoPago; ?>" data-reference="<?php echo $ver['reference_data']; ?>" data-ref-phone="<?php echo $ver['reference_phone']; ?>" data-time="<?php echo $ver['hour_payment']; ?>" data-status="<?php echo $statusText; ?>"><i class='bx bx-show-alt'></i></a>
                </td>
            </tr>
        </tbody>
    </table>

    <div class="table_section_list">
        <table>
            <thead>
                <tr>
                    <th>Nombre del producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Monto total</th>
                </tr>
            </thead>
            <tbody>
            <?php
                // Suponiendo que `order_details` contiene los detalles del pedido en formato JSON
                $order_details = json_decode($ver['order_details'], true);
                foreach ($order_details as $item) {
                    $product_id = $item['id_product'];
                    $quantity = $item['quantity'];
                    $subtotal = $item['subtotal'];

                    // Obtener el nombre del producto desde la base de datos usando $product_id
                    $sql_product_name = "SELECT name_product FROM product WHERE id_product = '$product_id'";
                    $result_product_name = mysqli_query($connection, $sql_product_name);
                    $row_product_name = mysqli_fetch_assoc($result_product_name);
                    $product_name = $row_product_name['name_product'] ?? 'Producto desconocido';

                    echo "<tr>";
                    echo "<td>$product_name</td>";
                    echo "<td>BS. $subtotal</td>";
                    echo "<td>$quantity</td>";
                    echo "<td>BS. $subtotal</td>";
                    echo "</tr>";
                }
            ?>
            </tbody>
        </table>
    </div>

    <?php } ?>
</div>

<section class="show_order" id="orderModal">
    <button class="close_show_order"><i class="fas fa-times"></i></button>
    <div class="order_header">
        <h2>Informacion del pedido</h2>
    </div>
    <div class="user_info">
        <div class="name_field">
            <label for="name">Nombre:</label>
            <input type="text" id="name" readonly>
        </div>
        <div class="surname_field">
            <label for="surname">Apellido:</label>
            <input type="text" id="surname" readonly>
        </div>
        <div class="email_field">
            <label for="email">Correo Electronico:</label>
            <input type="email" id="email" readonly>
        </div>
        <div class="cellphone_field">
            <label for="cellphone">Celular:</label>
            <input type="tel" id="cellphone" readonly>
        </div>
    </div>
    <div class="table_details">
    <div class="table_section_list">
        <table>
            <thead>
                <tr>
                    <th>Nombre del producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Monto total</th>
                </tr>
            </thead>
            <tbody>
            <?php
                // Suponiendo que `order_details` contiene los detalles del pedido en formato JSON
                $order_details = json_decode($ver['order_details'], true);
                foreach ($order_details as $item) {
                    $product_id = $item['id_product'];
                    $quantity = $item['quantity'];
                    $subtotal = $item['subtotal'];

                    // Obtener el nombre del producto desde la base de datos usando $product_id
                    $sql_product_name = "SELECT name_product FROM product WHERE id_product = '$product_id'";
                    $result_product_name = mysqli_query($connection, $sql_product_name);
                    $row_product_name = mysqli_fetch_assoc($result_product_name);
                    $product_name = $row_product_name['name_product'] ?? 'Producto desconocido';

                    echo "<tr>";
                    echo "<td>$product_name</td>";
                    echo "<td>BS. $subtotal</td>";
                    echo "<td>$quantity</td>";
                    echo "<td>BS. $subtotal</td>";
                    echo "</tr>";
                }
            ?>
            </tbody>
        </table>
    </div>
</div>
    </div>

    <div class="total_amount">
        <label for="total_bs">Total Bs:</label>
        <span id="total_bs"></span>
        <label for="total_ef">Total Efectivo:</label>
        <span id="total_ef"></span>
    </div>
    <div class="user_payment">
        <div class="payment_method">
            <label for="payment">Forma de Pago:</label>
            <input type="text" id="payment" readonly>
        </div>
        <div class="payment_method">
            <label for="capture">Captura del pago:</label>
            <span class="icon_clickable"><i class='bx bx-image'></i></span>
        </div>
        <div class="payment_method">
            <label for="reference">Referencia:</label>
            <input type="text" id="reference" readonly>
        </div>
        <div class="payment_method">
            <label for="phone">Celular de pago:</label>
            <input type="text" id="phone" readonly>
        </div>
        <div class="order_time">
            <label for="selectedDate">Fecha del Pedido:</label>
            <input type="text" id="selectedDate" value="Hoy" readonly>
        </div>
        <div class="order_time">
            <label for="selectedTime">Hora del Pedido:</label>
            <input type="text" id="selectedTime" readonly>
        </div>
    </div>
    <div class="status_list">
        <label for="status_pedido">Estatus del Pedido</label>
        <select id="status_pedido" class="status_select">
            <option value="confirmacion">En confirmación</option>
            <option value="proceso">En proceso</option>
            <option value="listo">Listo</option>
            <option value="entregado">Entregado</option>
        </select>
    </div>
    <div class="box_submit">
        <input type="submit" class="submit" value="Actualizar estatus">
    </div>
</section>

<script>
    document.querySelectorAll('.button_action_1').forEach(button => {
        button.addEventListener('click', function() {
            const idOrder = this.getAttribute('data-id');
            const name = this.getAttribute('data-name');
            const surname = this.getAttribute('data-surname');
            const email = this.getAttribute('data-email');
            const phone = this.getAttribute('data-phone');
            const totalBs = this.getAttribute('data-total-bs');
            const totalEf = this.getAttribute('data-total-ef');
            const payment = this.getAttribute('data-payment');
            const reference = this.getAttribute('data-reference');
            const refPhone = this.getAttribute('data-ref-phone');
            const time = this.getAttribute('data-time');
            const statusText = this.getAttribute('data-status');

            // Populate modal fields with order data
            document.getElementById('name').value = name;
            document.getElementById('surname').value = surname;
            document.getElementById('email').value = email;
            document.getElementById('cellphone').value = phone;
            document.getElementById('total_bs').innerText = `Bs. ${totalBs}`;
            document.getElementById('total_ef').innerText = `Bs. ${totalEf}`;
            document.getElementById('payment').value = payment;
            document.getElementById('reference').value = reference;
            document.getElementById('phone').value = refPhone;
            document.getElementById('selectedTime').value = time;

            // Set the status select value
            document.getElementById('status_pedido').value = statusText;

            // Display the modal
            document.querySelector('.modal_overlay').style.display = 'block';
            document.querySelector('.show_order').style.display = 'block';
            document.querySelector('.show_data').style.display = 'none';
        });
    });

    document.querySelector('.close_show_order').addEventListener('click', function() {
        document.querySelector('.modal_overlay').style.display = 'none';
        document.querySelector('.show_order').style.display = 'none';
    });

    document.querySelector('.icon_clickable').addEventListener('click', function() {
        document.querySelector('.show_data').style.display = 'block';
        document.querySelector('.modal_overlay').style.display = 'block';
        document.querySelector('.show_order').style.display = 'none';
    });

    document.querySelector('.close_show_data').addEventListener('click', function() {
        document.querySelector('.show_data').style.display = 'none';
        document.querySelector('.show_order').style.display = 'block';
    });
</script>
