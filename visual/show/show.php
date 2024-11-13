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

    <style>
        td {
            padding: 10px;
        }
        td button {
            padding: 5px;
        }
        td a{
            outline: none;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            padding: 6px;
            padding-top: 10px;
            color: #ffffff;
        }

        td a i{
            font-size: 20px;
        }
        thead{
            background-color: #C0EBA6;
        }
        th, td{
            border-bottom: 1px solid #347928;
        }
    </style>

</head>
<body>

<?php 
    include "../../controller/connection.php";
    include "../../controller/details.php";    
?>


    <div class="container">

        <nav>
            <div class="wrapper_nav">
                
                <div class="logo"><a href="#">LOGO.</a></div>
                <input type="radio" name="slider" id="menu-btn">
                <input type="radio" name="slider" id="close-btn">
                
                <ul class="nav-links">
                    
                    <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>
                    <li><a href="../order/order.php">Ordenes</a></li>

                    <li>
                        
                        <a href="#" class="desktop-item">Productos ▾</a>
                        <input type="checkbox" id="showDrop">
                        <label for="showDrop" class="mobile-item">Productos ▾</label>
                        
                        <ul class="drop-menu">
                        <li><a href="../upload/upload.php">Subir Producto</a></li>
                        <li><a href="./show.php">Ver Productos</a></li>
                        </ul>
                    
                    </li>
                    
                    <li><a href="../menu_admin/menu_admin.php">Tienda</a></li>
                
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
                
                    <div class="table_name">
                        <p>Detalles del Producto</p>
                    </div>

                    <div class="table_form">

                        <form method="post" action="#" class="search_container">

                        <select class="search_input select-custom" name="id_category">
                                <option value="" disabled selected>Elegir una Categoría</option>
                            <?php

                                $result = mysqli_query($connection, "SELECT id, name_category FROM category WHERE status = 1");
        
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='{$row['id']}'>{$row['name_category']}</option>";
                                }

                            ?>
                            </select>

                            <input class="search_input" list="products" type="text" name="search" placeholder="Nombre del Producto">


                            <button type="submit" class="search_button">
                                <i class='bx bx-search'></i>
                            </button>
                            
                        </form>

                    </div>

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

                        <?php

                            include "../../controller/connection.php";

                            $sql = "SELECT p.*, c.name_category 
                                    FROM product p 
                                    JOIN category c ON p.id_category = c.id
                                    WHERE p.status != 3";

                            $consult = mysqli_query($connection, $sql);

                            while ($ver = mysqli_fetch_array($consult)) {
                                $imgPath = "../../img/" . basename($ver['img_product']);
                                $statusText = ($ver['status'] == 1) ? "Disponible" : "No Disponible"

                        ?>


                        <tbody>

                            <td><img src="<?php echo $imgPath; ?>" alt="img"></td>
                            <td><?php echo $ver[2]; ?></td>
                            <td><?php echo $ver['name_category']; ?></td>
                            <td><?php echo number_format($ver[5], 2, ",", ".")." Bs"; ?></td>
                            <td><?php echo $ver[3]; ?></td>
                            <td><?php echo $statusText; ?>
                            <td>
                                <a class="button_action_1" href="../edit/edit.php?e=<?php echo $ver[0]; ?>"><i class='bx bx-edit-alt'></i></a>
                                <a class="button_action_2" href="#" onclick="confirmation(<?php echo $ver[0]; ?>)"><i class='bx bx-trash'></i></a>
                            </td>
        
                        </tbody>

                        <?php } ?>

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
                    <p>&copy; El Cóctel de los Batidos 2025</p>
                </div>
                
                <div class="footer-creater">
                    <a href="#">By VxneC0de</a>
                </div>
              
            </div>
      
        </footer>

    </div>

    <script>
        function confirmation(cod) {
            let answer = confirm("Are you sure to remove this product?");
            if (answer) {
            window.location.href = "../../controller/actions.php?e=" + cod + "&hidden=6";
            }
        }
    </script>

    

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    
</body>
</html>
<?php }else{
  header("location:../login/login.php?answer=6");
} ?>