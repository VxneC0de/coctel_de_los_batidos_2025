<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./index.css">
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
                            <li><a href="#">Bollitos</a></li>
                            <li><a href="#">Hallacas</a></li>
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
                
                <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
            
            </div>
        
        </nav>

        <section class="content">

            <form method="post" action="../../controller/actions_2.php" class="form-box">
            
                <div class="login-container" id="login">
                    
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
    
                </div>
        
        
                <div class="register-container" id="register">
        
                    <div class="top">
                        <span>¿Tienes una cuenta? <a href="#" onclick="login()">Accede</a></span>
                        <header>Inscribirse</header>
                    </div>
                    
                    <div class="input-box">
                        <input type="text" class="input-field" placeholder="Nombre de Usuario" id="nickRegister" name="nickRegister" required>
                        <i class="bx bx-user"></i>
                        <div class="error">
                            <?php
                            if(@$_GET['answer']==3){ ?>
                            <h2>The nickname is already registered. Try again</h2>
                            <?php } ?>
                        </div>
                    </div>
        
                    <div class="input-box">
                        <input type="text" class="input-field" placeholder="Correo Electrónico" id="emailRegister" name="emailRegister" placeholder="admin@admin.com" required>
                        <i class="bx bx-envelope"></i>
                        <div class="error">
                            <?php
                            if(@$_GET['answer']==4){ ?>
                            <h2>The email is already registered. Try again</h2>
                            <?php } ?>
                        </div>
                    </div>
                    
                    <div class="input-box">
                        <input type="password" class="input-field" placeholder="Contraseña" id="passwordRegister" name="passwordRegister" maxlength="250" required>
                        <i class="bx bx-lock-alt"></i>
                        <div class="error"></div>
                    </div>
        
                    <div class="input-box">
                        <input type="password" class="input-field" placeholder="Confirmar  Contraseña" id="confirmRegister" name="confirmRegister" maxlength="250" required>
                        <i class="bx bx-lock-alt"></i>
                        <div class="error"></div>
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
        
                </div>
            </form>

            <?php
            if(@$_GET['answer']==1){ ?>
            <h2>Your registration was successful</h2>
            <?php } ?>
            
            <?php
            if(@$_GET['answer']==2){ ?>
            <h2>Error registering</h2>
            <?php } ?>

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

        const form = document.querySelector('form');
        const passwordRegister = document.querySelector('#passwordRegister');
        const confirmRegister = document.querySelector('#confirmRegister');


        form.addEventListener('submit', (event) => {
        event.preventDefault(); //Evita el envio automtico del formulario.

        if(passwordRegister.value !== confirmRegister.value){
            alert('Passwords do not match. Try again');
            confirmRegister.focus(); //Pone el foco en el campo de repetir contraseña.
            
            return; //Detiene la ejecucion del codigo si las contraseñas no coinciden.
            }
            //Si las contraseñas coiniden, se encia el formulario.
            
            form.submit();
        });

    </script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    
</body>
</html>