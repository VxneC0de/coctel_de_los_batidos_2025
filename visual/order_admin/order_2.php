<div class="table_section">
    <?php
        include "../../controller/connection.php";

        // Variables para filtrar
        $search = isset($_POST['search']) ? $_POST['search'] : '';

        // Construir la consulta SQL
        $sql = "
            SELECT o.id_order, p.name_payment, p.lastName_payment, u.email, p.phone_payment, p.id_metodo_payment, p.reference_data, p.reference_phone, p.date_payment, p.hour_payment, o.total_bs, o.total_ef, o.status
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

    <?php } ?>

</div>

<!-- Modal -->
<section class="show_order" id="orderModal" style="display:none;">
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
        <!-- Aquí irían los detalles del pedido (productos, precios, etc.) -->
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
            <input type="text" id="selectedDate" readonly>
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


<input type="text" id="selectedDate" value="Hoy" readonly>



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
                <div class="table_header_list">
                    <div class="table_name">
                        <p>Productos</p>
                    </div>
                </div>
                <div class="table_section_list">
                    <table>
                        <thead>
                            <th>Nombre del producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Monto total</th>
                        </thead>
                        <tbody>
                            <td>Churros</td>
                            <td>BS. 45</td>
                            <td>2</td>
                            <td>$4,00</td>
                        </tbody>
                    </table>
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
                  <input type="text" id="payment" value="Tarjeta de Crédito" readonly>
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
                  <option value="confirmacion" disabled selected>En confirmación</option>
                  <option value="proceso">En proceso</option>
                  <option value="listo">Listo</option>
                  <option value="entregado">Entregado</option>
              </select>
            </div>

            <div class="box_submit">
                <input type="submit" class="submit" value="Actualizar estatus">
            </div>
            
        </section>