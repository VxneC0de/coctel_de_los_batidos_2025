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
    <link rel="stylesheet" href="./upload.css">
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
                            <li><a href="#">Catálogo</a></li>
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

            <form action="../../controller/actions.php" method="post" class="form-box">
    
                <div class="register-container" id="register">
        
                    <div class="top">
                        <header>Subir Producto</header>
                    </div>
                    
                    <div class="two-forms">
                        
                        <div class="input-box">
                            <input type="text" class="input-field" placeholder="Nombre del Producto" name="name" id="name-products">
                            <i class='bx bxs-food-menu iconoOne'></i>
                        </div>
                        
                        <div class="input-box select">
                            <select class="input-field select-custom">
                                <option value="" disabled selected>Elegir una Categoría</option>
                                <option value="categoria1">Empanadas</option>
                                <option value="categoria2">Pastelitos</option>
                                <option value="categoria3">Especiales</option>
                                <option value="categoria4">Bebidas Frías</option>
                                <option value="categoria5">Otros</option>
                            </select>
                            <i class='bx bxs-category' ></i>
                        </div>
                        
                    </div>
        
                    <div class="input-box">
                        <input type="text" class="input-field" placeholder="Precio" name="price" id="price-products">
                        <i class='bx bxs-dollar-circle'></i>
                    </div>
                    
                    <div class="input-box">
                        <input type="date" class="input-field" placeholder="Fecha" name="date" id="date-products">
                        <i class='bx bxs-calendar'></i>
                    </div>
        
                    <div class="input-box">
                        <input type="time" class="input-field" placeholder="Hora" name="hour" id="hour-products">
                        <i class='bx bxs-time'></i>
                    </div>
    
                    <div class="input-box img_box">
                        <input type="file" class="input-field" name="img" id="img-products">
                        <label for="file-upload"></label>
                        <i class='bx bxs-image-alt'></i>
                    </div>
    
                    <div class="input-box">
                        <textarea class="textarea-field" placeholder="Descripción" maxlength="150" name="description" id="description-products"></textarea>
                        <i class='bx bxs-comment-detail textarea-icon'></i>
                    </div>                
        
                    <div class="input-box">
                        <input type="submit" class="submit" value="Subir">
                    </div>
        
                </div>
            </form>

        </section>

        <?php 
            if(@$_GET['answer']==1){ ?>
                <h2 class="h2_1">Your registration was successful</h2>
            <?php }
            if(@$_GET['answer']==2){ ?>
                <h2 class="h2_2">There were problems registering, please try again later</h2>
            <?php }
        ?>

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