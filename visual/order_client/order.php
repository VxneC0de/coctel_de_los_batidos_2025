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
        
        <div class="logo"><a href="../menu_login/menu.php"><img src="./assets/coctel.jpg" alt="" width="50" height="50" ></a></div>
        <input type="radio" name="slider" id="menu-btn">
        <input type="radio" name="slider" id="close-btn">
        
        <ul class="nav-links">
            
            <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>
            <li><a href="../menu_login/menu.php">Tienda</a></li>
        
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
                  <i class='bx bx-list-ul'></i>
                  <a href="../order_client/order.php">Mis Ordenes</a>
                </div>
              </div>

            </div>

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

                    <table>

                        <thead>
                            <th>N° de Orden</th>
                            <th>Cliente</th>
                            <th>Pedido</th>
                            <th>Ver Orden</th>
                        </thead>

                        <tbody>
                            <td>1</td>
                            <td><p>Vanessa</p><p>Rubio</p></td>
                            <td>
                                <div class="status_list_order">
                                  <p>En Proceso.</p>
                                </div>
                            </td>
                            <td>
                                <a class="button_action_1"><i class='bx bx-show-alt'></i></a>
                            </td>
                        </tbody>

                    </table>

                </div>

            </div>

        </section>

        <div class="modal_overlay"></div>

        <section class="show_order">

            <button class="close_show_order"><i class="fas fa-times"></i></button>
          
            <div class="order_header">
                <h2>Informacion del pedido</h2>
            </div>

            <div class="user_info">
                <div class="name_field">
                    <label for="name">Nombre:</label>
                    <input type="text" id="name" value="John" readonly>
                </div>
                <div class="surname_field">
                    <label for="surname">Apellido:</label>
                    <input type="text" id="surname" value="Doe" readonly>
                </div>
                <div class="email_field">
                    <label for="email">Correo Electronico:</label>
                    <input type="email" id="email" value="john.doe@example.com" readonly>
                </div>
                <div class="cellphone_field">
                    <label for="cellphone">Celular:</label>
                    <input type="tel" id="cellphone" value="123-456-7890" readonly>
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
                <label for="name">Total:</label>
                <span id="total">Bs. 45,00</span>
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
                  <input type="text" id="reference" value="1234" readonly>
                </div>
              
                <div class="payment_method">
                  <label for="phone">Celular de pago:</label>
                  <input type="text" id="phone" value="01234567890" readonly>
                </div>
              
                <div class="order_time">
                  <label for="selectedDate">Fecha del Pedido:</label>
                  <input type="text" id="selectedDate" value="Hoy" readonly>
                </div>
              
                <div class="order_time">
                  <label for="selectedTime">Hora del Pedido:</label>
                  <input type="text" id="selectedTime" value="Tan pronto como sea posible" readonly>
                </div>
              
              </div>              
              
            <div class="status_list">
                <div class="status_list">
                    <label for="status_pedido">Estatus del Pedido</label>
                    <span id="status_pedido">En Proceso.</span>
                </div>
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
        document.querySelector('.button_action_1').addEventListener('click', function() {
            document.querySelector('.modal_overlay').style.display = 'block';
            document.querySelector('.show_order').style.display = 'block';
            document.querySelector('.show_data').style.display = 'none';
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