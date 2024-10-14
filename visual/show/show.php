<!DOCTYPE html>
<?php
  session_start();
  if(isset ($_SESSION['who'])) { ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./show.css">
    <title>Sing In</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>

    <div class="container">

        <nav>
            <div class="wrapper_nav">
                
                <div class="logo"><a href="#">LOGO.</a></div>
                <input type="radio" name="slider" id="menu-btn">
                <input type="radio" name="slider" id="close-btn">
                
                <ul class="nav-links">
                    
                    <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>
                    <li><a href="#">Ordenes</a></li>

                    <li>
                        
                        <a href="#" class="desktop-item">Productos ▾</a>
                        <input type="checkbox" id="showDrop">
                        <label for="showDrop" class="mobile-item">Productos ▾</label>
                        
                        <ul class="drop-menu">
                            <li><a href="#">Subir Producto</a></li>
                            <li><a href="#">Ver Productos</a></li>
                        </ul>
                    
                    </li>
                    
                    <li><a href="#">Tienda</a></li>
                
                </ul>
                
                <div class="header-right">
                    
                    <div class="user_icon">
                        <a href="#"><ion-icon name="person"></ion-icon></a>
                    </div>
                    
                </div>          
                
                <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
            
            </div>
        
        </nav>

        <section class="content">

            <div class="table">

                <div class="table_header">

                    <p>Detalles del Producto</p>

                    <form method="post" action="#" class="search_container">

                        <select class="search_input select-custom">
                            <option value="" disabled selected>Categoría</option>
                            <option value="categoria1">Empanadas</option>
                            <option value="categoria2">Pastelitos</option>
                            <option value="categoria3">Especiales</option>
                            <option value="categoria4">Bebidas Frías</option>
                            <option value="categoria5">Otros</option>
                        </select>

                        <input class="search_input" list="products" type="text" name="search" placeholder="Nombre del Producto">

                        <!--
                        </datalist>
                        -->

                        <button type="submit" class="search_button">
                            <i class='bx bx-search'></i>
                        </button>
                    </form>

                </div>

                <div class="table_section">

                    <table>

                        <thead>
                            <th>Imagen</th>
                            <th>Nombre</th>
                            <th>Categoría</th>
                            <th>Precio</th>
                            <th>Descripción</th>
                            <th>Status</th>
                            <th>Acciones</th>
                        </thead>

                        <tbody>
                            <td><img src="./pastelito.jpg" alt="pastelito"></td>
                            <td>Pastelito de Papa con Queso</td>
                            <td>Pastelito</td>
                            <td>Bs. 40</td>
                            <td>Relleno de Papa con Queso</td>
                            <td>
                                <button class="button_status_1">
                                    <i class='bx bx-check-circle'></i>
                                </button>
                                <button class="button_status_2">
                                    <i class='bx bx-x-circle'></i>
                                </button>
                            </td>
                            <td>
                                <button class="button_action_1"><i class='bx bx-edit-alt'></i></button>
                                <button class="button_action_2"><i class='bx bx-trash'></i></button>
                            </td>
                        </tbody>

                    </table>

                </div>

                <div class="pagination">

                    <div><i class='bx bx-chevrons-left'></i></div>
                    <div><i class='bx bx-chevron-left'></i></div>
                    <div>1</div>
                    <div>2</div>
                    <div>3</div>
                    <div><i class='bx bx-chevron-right'></i></div>
                    <div><i class='bx bx-chevrons-right'></i></div>
                    
                </div>

            </div>

        </section>

        <footer class="footer">
        
            <div class="footer-box">
                
                <div class="footer-text">
                    <p>&copy; 2024 El Cóctel de los Batidos 2025</p>
                </div>
                
                <div class="footer-creater">
                    <a href="#">By VxneC0de</a>
                </div>
              
            </div>
      
        </footer>

    </div>
    

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    
</body>
</html>
<?php }else{
  header("location:../login/login.php?answer=6");
} ?>