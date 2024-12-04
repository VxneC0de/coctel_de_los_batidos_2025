<!DOCTYPE html>
<?php
session_start();
if (isset($_SESSION['who'])) { ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./order.css">
    <title>Sing In</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>


        <nav>
            <div class="wrapper_nav">
                
                <div class="logo"><a href="../menu_admin/menu.php"><img src="./assets/coctel.jpg" alt="" width="50" height="50" ></a></div>
                <input type="radio" name="slider" id="menu-btn">
                <input type="radio" name="slider" id="close-btn">
                
                <ul class="nav-links">
                  
                  <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>
                  <li><a href="../menu_admin/menu.php">Tienda</a></li>

                  <li>
                      
                    <a href="#" class="desktop-item">Productos ▾</a>
                    <input type="checkbox" id="showDrop">
                    <label for="showDrop" class="mobile-item">Productos ▾</label>
                    
                    <ul class="drop-menu">
                        <li><a href="../upload/upload.php">Subir Producto</a></li>
                        <li><a href="../show/show.php">Ver Productos</a></li>
                    </ul>
                  
                  </li>
                  
                  <li><a href="./order.php">Órdenes</a></li>
              
                </ul> 
                
                <div class="header-right">
                    
                    <div class="user_icon">
                        <a href="#"><ion-icon name="person"></ion-icon></a>
                    </div>
                    
                </div>

                <div class="user_sidebar">
                  
                  <button class="close_user"><i class="fas fa-times"></i></button>
                  
                  <div class="user_header">
                    <div class="name_user">
                        <h2><?php echo $_SESSION['nick']; ?></h2>
                    </div>
                    <div class="email_user">
                        <h4><?php echo $_SESSION['email']; ?></h4>
                    </div>
                  </div>

                  <div class="user_items">

                    <div class="user_item">

                      <div class="item_details">
                        <div class="item_details_title_user">
                          <i class='bx bx-log-out-circle'></i>
                          <a href="../../controller/actions.php?hidden=3">Cerrar Sesión</a>
                        </div>
                      </div>

                    </div>

                  </div>
                  
                </div>
                
                <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
            
            </div>
        
        </nav>

        <section class="content">

            <div class="table">

                <div class="table_header">

                    <div class="table_name">
                        <p>Detalles de los Pedidos</p>
                    </div>

                </div>

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

            </div>

        </section>

        <div class="modal_overlay"></div>

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
          
        <section class="show_data">

            <button class="close_show_data"><i class="fas fa-times"></i></button>

            <div class="data_header">
                <h2>Captura del pago</h2>
            </div>

            <div class="data_capture">
                <img src="./ejemplo.jpg" alt="pago_movil">
            </div>

        </section>
      
        <footer class="footer">
        
            <div class="footer-box">
                
                <div class="footer-text">
                    <p>&copy; El Cóctel de los Batidos 2025</p>
                </div>
                
                <div class="footer-creater">
                    <a href="#">By VxneC0de</a>
                </div>
              
            </div>
      
        </footer>



    <script>
        document.addEventListener('DOMContentLoaded', function() {
          const userIcon = document.querySelector('.user_icon a');
          const userSidebar = document.querySelector('.user_sidebar');
          const closeuser = document.querySelector('.close_user');
      
          userIcon.addEventListener('click', function(event) {
            event.preventDefault();
            userSidebar.style.right = '0';
          });
      
          closeuser.addEventListener('click', function() {
            userSidebar.style.right = '-100%';
          });
          
        });
    </script>

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

    

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    
</body>
</html>
<?php }else{
  header("location:../login_oficial/login.php?answer=6");
} ?>