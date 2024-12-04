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

    <style>

        .form-box{
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 60rem;
            overflow: hidden;
            z-index: 2;
        }
        .input-box_2 {
            position: relative;
            max-width: 500px;
	        width: 100%;
	        background: #C0EBA6;
	        padding: 30px;
	        border-radius: 30px;
            margin-bottom: 25px;
        }

        .img_container{
            display: flex;
        }

        .img-area {
	        position: relative;
            width: 100%;
            height: 150px;
            background: #242526;
            margin-bottom: 20px;
            border-radius: 30px;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            transition: .2s ease;
        }

        .img-area .icon {
	        font-size: 40px;
            color: #ffffff;
        }
        .img-area h3 {
	        font-size: 15px;
	        font-weight: 500;
	        margin-bottom: 6px;
            color: #ffffff;
        }
        .img-area p {
	        color: #ffffffc5;
        }
        .img-area p span {
	        font-weight: 600;
        }
        .img-area img {
	        position: absolute;
	        top: 0;
	        left: 0;
	        width: 100%;
	        height: 100%;
	        object-fit: cover;
	        object-position: center;
	        z-index: 100;
        }
        .img-area::before {
	        content: attr(data-img);
	        position: absolute;
	        top: 0;
	        left: 0;
	        width: 100%;
	        height: 100%;
	        background: rgba(0, 0, 0, .5);
	        color: #fff;
	        font-weight: 500;
	        text-align: center;
	        display: flex;
	        justify-content: center;
	        align-items: center;
	        pointer-events: none;
	        opacity: 0;
	        transition: all .3s ease;
	        z-index: 200;
        }
        .img-area.active:hover::before {
	        opacity: 1;
        }
        .select-image {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            padding: 10px 0;
            border-radius: 30px;
            background: #242526;
            color: #fff;
            font-weight: 500;
            font-size: 16px;
            cursor: pointer;
            transition: all .3s ease;
        }
        .select-image:hover {
            background: #347928;
        }
        .error_2 {
            color: #dd1335;
            font-weight: 600;
            font-size: 12.5px;
            padding-top: 4px;
            margin-top: -25px;
            margin-left: 10px;
            position: relative;
            margin-bottom: 0;
            min-height: 18px;
            display: flex;
            align-items: center;
        }

        @media only screen and (max-width: 540px) {
            .error, .error_2  {
                font-size: 12.5px;
            }

            .error_two, .error_2 {
                font-size: 12.5px;
            }
        }

        @media only screen and (max-width: 455px) {

            .error, .error_2  {
                font-size: 11.5px;
            }

            .input-box .error {
                width: 100%;
            }

            .error_two {
                font-size: 11.5px;
            }

            .input-box .error_two {
                width: 100%;
            }
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
                  <li><a href="#">Tienda</a></li>
    
                  <li>
                      
                    <a href="#" class="desktop-item">Productos ▾</a>
                    <input type="checkbox" id="showDrop">
                    <label for="showDrop" class="mobile-item">Productos ▾</label>
                    
                    <ul class="drop-menu">
                        <li><a href="./upload.php">Subir Producto</a></li>
                        <li><a href="../show_oficial/show.php">Ver Productos</a></li>
                    </ul>
                  
                  </li>
                  
                  <li><a href="../order_admin/order.php">Órdenes</a></li>
              
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
                          <i class='bx bx-cog'></i>
                          <a href="#">Editar Perfil</a>
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

            <form action="../../controller/actions.php" method="post" class="form-box" enctype="multipart/form-data" id="productForm">
    
                <div class="register-container" id="register">
        
                    <div class="top">
                        <header>Subir Producto</header>
                    </div>
                    
                    <div class="two-forms">
                        
                        <div class="input-box">
                            <input type="text" class="input-field" placeholder="Nombre del Producto" name="name" id="productName">
                            <i class='bx bxs-food-menu iconoOne'></i>
                            <div class="error_two"></div>
                        </div>
                        
                        <div class="input-box select">
                            <select class="input-field select-custom" name="id_category" id="productCategory">
                                <option value="" disabled selected>Elegir una Categoría</option>
                                    <?php

                                    $result = mysqli_query($connection, "SELECT id, name_category FROM category WHERE status = 1");
        
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<option value='{$row['id']}'>{$row['name_category']}</option>";
                                    }

                                    ?>
                            </select>
                            <i class='bx bxs-category' ></i>
                            <div class="error_two"></div>
                        </div>
                        
                    </div>

                    <div class="two-forms">
                        
                        <div class="input-box">
                            <input type="text" class="input-field" placeholder="Precio" name="price" id="productPrice">
                            <i class='bx bxs-dollar-circle'></i>
                            <div class="error_two"></div>
                        </div>
                        
                        <div class="input-box select">
                            <select class="input-field select-custom" name="status" id="productAvailability">
                                <option value="" disabled selected>Elegir Disponibilidad</option>
                                <option value="1">Disponible</option>
                                <option value="2">No Disponible</option>
                            </select>
                            <i class='bx bx-stats'></i>
                            <div class="error_two"></div>
                        </div>
                        
                    </div>
                    
                    <div class="input-box">
                        <input type="date" class="input-field" placeholder="Fecha" name="date" id="productDate">
                        <i class='bx bxs-calendar'></i>
                        <div class="error"></div>
                    </div>

                    <div class="input-box_2">
                        <input type="file" name="img" id="file" accept="image/*" hidden>
                        <div class="img-area" data-img="">
                            <i class='bx bxs-image-alt icon'></i>
                            <h3>Imagen</h3>
                            <p>La imagen debe ser inferior a <span>2MB</span></p>
                        </div>
                        <div class="select-image" id="select-image"> 
                            <p>Elegir imagen</p> 
                        </div>
                    </div>
                    <div id="imageError" class="error_2"></div>
    
                    <div class="input-box">
                        <textarea class="textarea-field" placeholder="Descripción" maxlength="150" name="description" id="productDescription"></textarea>
                        <i class='bx bxs-comment-detail textarea-icon'></i>
                        <div class="error"></div>
                    </div>
                    
                    <input type="hidden" name="hidden" value="4">
        
                    <div class="input-box">
                        <input type="submit" class="submit" value="Subir">
                    </div>
        
                </div>
            </form>

        </section>

        <?php 
            if(@$_GET['answer']==2){ ?>
                <h2 class="h2_2">There were problems registering, please try again later</h2>
            <?php }
        ?>

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
        const setError = (element, message) => {
            const errorDisplay = element.parentElement.querySelector(".error, .error_two");
            if (errorDisplay) {
                errorDisplay.innerText = message;
                errorDisplay.style.display = 'block';
            } else {
                // For image error
                const imageErrorDisplay = document.getElementById('imageError');
                imageErrorDisplay.innerText = message;
                imageErrorDisplay.style.display = 'block';
            }
        }
        
        const setSuccess = element => {
            const errorDisplay = element.parentElement.querySelector(".error, .error_two");
            if (errorDisplay) {
                errorDisplay.innerText = '';
                errorDisplay.style.display = 'none';
            } else {
                // For image error
                const imageErrorDisplay = document.getElementById('imageError');
                imageErrorDisplay.innerText = '';
                imageErrorDisplay.style.display = 'none';
            }
        }
        
        document.getElementById('productForm').addEventListener('submit', function(event) {
            const productName = document.getElementById('productName');
            const productCategory = document.getElementById('productCategory');
            const productPrice = document.getElementById('productPrice');
            const productAvailability = document.getElementById('productAvailability');
            const productDate = document.getElementById('productDate');
            const file = document.getElementById('file');
            let valid = true;
        
            // Limpiar mensajes de error
            document.querySelectorAll('.error, .error_two').forEach((el) => el.innerHTML = '');

            const currentDate = new Date(); 
            currentDate.setHours(0, 0, 0, 0); // Establecer la hora a 00:00:00 para comparar solo la fecha 
            const selectedDate = new Date(productDate.value); 
            selectedDate.setHours(0, 0, 0, 0);
        
            if (productName.value.trim() === '') {
                setError(productName, 'El nombre del producto es requerido.');
                valid = false;
            } else {
                setSuccess(productName);
            }
        
            if (productCategory.value.trim() === '') {
                setError(productCategory, 'La categoría es requerida.');
                valid = false;
            } else {
                setSuccess(productCategory);
            }
        
            if (productPrice.value.trim() === '') {
                setError(productPrice, 'El precio es requerido.');
                valid = false;
            } else {
                setSuccess(productPrice);
            }
        
            if (productAvailability.value.trim() === '') {
                setError(productAvailability, 'La disponibilidad es requerida');
                valid = false;
            } else {
                setSuccess(productAvailability);
            }
        
            if (productDate.value.trim() === '') { 
                setError(productDate, 'La fecha es requerida.'); 
                valid = false; 
            } else if (selectedDate < currentDate) { 
                setError(productDate, 'Ingresa una fecha válida.'); 
                valid = false; 
            } else { 
                setSuccess(productDate); 
            }
        
            if (file.value.trim() === '') {
                setError(file, 'La imagen es requerida.');
                valid = false;
            } else {
                setSuccess(file);
            }
        
            if (!valid) {
                event.preventDefault();
            }
        });
        
        document.querySelector('.select-image').addEventListener('click', function () {
            document.querySelector('#file').click();
        })
        
        document.querySelector('#file').addEventListener('change', function () {
            const image = this.files[0];
            if (image.size < 2000000) {
                const reader = new FileReader();
                reader.onload = () => {
                    const allImg = document.querySelector('.img-area').querySelectorAll('img');
                    allImg.forEach(item => item.remove());
                    const imgUrl = reader.result;
                    const img = document.createElement('img');
                    img.src = imgUrl;
                    document.querySelector('.img-area').appendChild(img);
                    document.querySelector('.img-area').classList.add('active');
                    document.querySelector('.img-area').dataset.img = image.name;
                    setSuccess(document.querySelector('#file'));  // Set success when image is valid
                }
                reader.readAsDataURL(image);
            } else {
                alert("Image size more than 2MB");
                setError(document.querySelector('#file'), 'La imagen debe ser inferior a 2MB.');
            }
        })
        
    </script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    
</body>
</html>
<?php }else{
  header("location:../login_oficial/login.php?answer=6");
} ?>