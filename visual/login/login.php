<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./login.css">
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
                    <li><a href="#">Inicio</a></li>
                    
                    <li>
                        <a href="#" class="desktop-item">Productos ▾</a>
                        <input type="checkbox" id="showDrop">
                        <label for="showDrop" class="mobile-item">Productos ▾</label>
                        
                        <ul class="drop-menu">
                            <li><a href="#">Empanadas</a></li>
                            <li><a href="#">Pastelitos</a></li>
                            <li><a href="#">Especiales</a></li>
                            <li><a href="#">Bebidas Frías</a></li>
                            <li><a href="#">Otros</a></li>
                        </ul>
                    </li>
                    
                    <li><a href="#">Contactos</a></li>
                
                </ul>
                
                <div class="header-right">

                    <div class="cart_icon">
                        <a href="#"><ion-icon name="cart"></ion-icon></a>
                        <span>0</span>
                    </div>
                    
                    <div class="user_icon">
                        <a href="#"><ion-icon name="person"></ion-icon></a>
                    </div>
                    
                </div>
                
                
                
                <div class="cart_sidebar">
                  
                  <button class="close_cart"><i class="fas fa-times"></i></button>
                  
                  <div class="cart_header">
                    <h2>Tu Pedido</h2>
                  </div>

                  <div class="cart_items">
                    
                    <div class="cart_item">

                      <div class="remove_item">
                        <span><i class='bx bx-trash'></i></span>
                      </div>

                      <div class="item_details">
                        <div class="item_details_title">
                            <p>Empanada de Carne</p>
                        </div>

                        <div class="item_details_price">
                            <strong>Bs. <span>35</span></strong> 
                        </div> 
                      </div>

                      <div class="qty">
                        <span>-</span>
                        <strong>1</strong>
                        <span>+</span>
                      </div>

                    </div>

                  </div>

                  <div class="cart_actions">

                    <div class="subtotal">
                      <p>SUBTOTAL:</p>
                      <strong>Bs. <span>525</span></strong>
                      <strong>$. <span>10</span></strong>
                    </div>

                    <button class="clean_btn">VACIAR CARRITO</button>
                    <button class="checkout_btn">IR AL PAGO</button>
                    </div>
                  
                  </div>
                
                
                
                <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
            
            </div>
        
        </nav>

        <section class="content">

            <div class="form-box">
            
                <form method="post" action="../../controller/actions.php" class="login-container" id="login">
                    
                    <div class="top">
                        <span>¿No tienes una cuenta? <a href="#" onclick="register()">Inscribirse</a></span>
                        <header>Acceso</header>
                    </div>
    
                    <div class="input-box">
                        <input type="text" class="input-field" placeholder="Usuario o Correo" name="loginData" id="emailLogin">
                        <i class="bx bx-user"></i>
                        <div class="error"></div>
                    </div>
    
                    <div class="input-box">
                        <input type="password" class="input-field" placeholder="Contraseña" name="passwordLogin" id="passwordLogin">
                        <i class="bx bx-lock-alt"></i>
                    </div>

                    <input type="hidden" name="hidden" value="2">
    
                    <div class="input-box">
                        <input type="submit" class="submit" id="btnLogin" value="Iniciar sesión">
                    </div>
                    
                    <div class="two-col">
                        
                        <div class="one">
                            <input type="checkbox" id="login-check">
                            <label for="login-check"> Recuérdame</label>
                        </div>
                        
                        <div class="two">
                            <label><a href="forgotten.php" id="btnRecuperar">¿Has olvidado tu contraseña?</a></label>
                        </div>
    
                    </div>
    
                </form>
        
        
                <form method="post" action="../../controller/actions.php" class="register-container" id="register">
        
                    <div class="top">
                        <span>¿Tienes una cuenta? <a href="#" onclick="login()">Accede</a></span>
                        <header>Inscribirse</header>
                    </div>
                    
                    <div class="input-box">
                        <input type="text" class="input-field" placeholder="Nombre de Usuario" id="nickRegister" name="nickRegister" required>
                        <i class="bx bx-user"></i>
                    </div>
        
                    <div class="input-box">
                        <input type="text" class="input-field" placeholder="Correo Electrónico" id="emailRegister" name="emailRegister" placeholder="admin@admin.com" required>
                        <i class="bx bx-envelope"></i>
                    </div>
                    
                    <div class="input-box">
                        <input type="password" class="input-field" placeholder="Contraseña" id="passwordRegister" name="passwordRegister" maxlength="250" required>
                        <i class="bx bx-lock-alt"></i>
                    </div>
        
                    <div class="input-box">
                        <input type="password" class="input-field" placeholder="Confirmar  Contraseña" id="confirmRegister" name="confirmRegister" maxlength="250" required>
                        <i class="bx bx-lock-alt"></i>
                    </div>

                    <input type="hidden" name="hidden" value="1">
        
                    <div class="input-box">
                        <input type="submit" class="submit" value="Registrarse" id="btnRegister">
                    </div>
        
                    <div class="two-col">
                        <div class="one">
                            <input type="checkbox" id="register-check">
                            <label for="register-check"> Recuérdame</label>
                        </div>
                        <div class="two">
                            <label><a href="#">Términos y condiciones</a></label>
                        </div>
                    </div>
        
                </form>

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


    <script>

        var a = document.getElementById("loginBtn");
        var b = document.getElementById("registerBtn");
        var x = document.getElementById("login");
        var y = document.getElementById("register");
    
        function login() {
            x.style.left = "4px";
            y.style.right = "-520px";
            x.style.opacity = 1;
            y.style.opacity = 0;
        }
    
        function register() {
            x.style.left = "-510px";
            y.style.right = "5px";
            x.style.opacity = 0;
            y.style.opacity = 1;
        }
    
    </script>

    <script>
    
        document.getElementById('register').addEventListener('submit', function(event) {
            const passwordRegister = document.getElementById('passwordRegister').value;
            const confirmRegister = document.getElementById('confirmRegister').value;
            
            if (passwordRegister !== confirmRegister) {
                alert('Las contraseñas no coinciden. Inténtalo de nuevo.');
                document.getElementById('confirmRegister').focus(); // Pone el foco en el campo de repetir contraseña.
                event.preventDefault(); // Evita el envío automático del formulario.
                }
        });
        
    </script>

    <script>
        document.getElementById('register').addEventListener('submit', function(event) {
            const password = document.getElementById('passwordRegister').value;
            const confirm = document.getElementById('confirmRegister').value;
            
            // Expresiones regulares para validar cada condición
            const hasTwoNumbers = /(?=(.*[0-9]){2})/;
            const hasSpecialChar = /[!@#$%^&*]/;
            const hasMinLength = /.{8,}/;
    
            if (!password.match(hasTwoNumbers)) {
                alert('La contraseña debe tener al menos 2 números.');
                event.preventDefault(); // Evita el envío automático del formulario
                return;
            }
            if (!password.match(hasSpecialChar)) {
                alert('La contraseña debe tener al menos un signo especial.');
                event.preventDefault(); // Evita el envío automático del formulario
                return;
            }
            if (!password.match(hasMinLength)) {
                alert('La contraseña debe ser de al menos 8 caracteres.');
                event.preventDefault(); // Evita el envío automático del formulario
                return;
            }
        });
    </script>  

    <script>
      document.addEventListener('DOMContentLoaded', function() {
        const cartIcon = document.querySelector('.cart_icon a');
        const cartSidebar = document.querySelector('.cart_sidebar');
        const closeCart = document.querySelector('.close_cart');
    
        cartIcon.addEventListener('click', function(event) {
          event.preventDefault();
          cartSidebar.style.right = '0';
        });
    
        closeCart.addEventListener('click', function() {
          cartSidebar.style.right = '-100%';
        });
        
      });
    </script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    
</body>
</html>