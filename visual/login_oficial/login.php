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
              <li><a href="#">Tienda</a></li>
              
              <li><a href="#">Contactos</a></li>
          
          </ul>
          
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
                    <input type="text" class="input-field" placeholder="Usuario o Correo" id="usernameLogin" name="loginData">
                    <i class="bx bx-user"></i>
                    <div class="error"></div>
                </div>
    
                <div class="input-box">
                    <input type="password" class="input-field" placeholder="Contraseña" id="passwordLogin" name="passwordLogin">
                    <i class="bx bx-lock-alt"></i>
                    <div class="error"></div>
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
                    <input type="text" class="input-field" placeholder="Nombre de Usuario" id="usernameRegister" name="nickRegister">
                    <i class="bx bx-user"></i>
                    <div class="error" id="usernameError">
                    <?php if(strpos(@$_GET['fields'], 'nickRegister') !== false) { ?> El nombre de usuario ya está registrado. <?php } ?>
                    </div>
                </div>
                
                <div class="input-box">
                    <input type="text" class="input-field" placeholder="Correo Electrónico" id="emailRegister" name="emailRegister">
                    <i class="bx bx-envelope"></i>
                    <div class="error" id="emailError">
                    <?php if(strpos(@$_GET['fields'], 'emailRegister') !== false) { ?> El correo electrónico ya está registrado. <?php } ?>
                    </div>
                </div>
                
                <div class="input-box">
                    <input type="password" class="input-field" placeholder="Contraseña" id="passwordRegister" name="passwordRegister">
                    <i class="bx bx-lock-alt"></i>
                    <div class="error"></div>
                </div>
                
                <div class="input-box">
                    <input type="password" class="input-field" placeholder="Confirmar Contraseña" id="confirmRegister" name="confirmRegister">
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
            
            </form>
                
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
        document.getElementById('login').addEventListener('submit', function(event) {
            const usernameLogin = document.getElementById('usernameLogin');
            const passwordLogin = document.getElementById('passwordLogin');
            let valid = true;
        
            document.querySelectorAll('.error').forEach((el) => el.innerHTML = '');
        
            if (usernameLogin.value.trim() === '') {
                setError(usernameLogin, 'El nombre de usuario es requerido.');
                valid = false;
            } else {
                setSuccess(usernameLogin);
            }
        
            if (passwordLogin.value.trim() === '') {
                setError(passwordLogin, 'La contraseña es requerida.');
                valid = false;
            } else {
                setSuccess(passwordLogin);
            }
        
            if (!valid) {
                event.preventDefault();
            }
        });
        
    </script>
    
    <script>
    const setError = (element, message) => {
        const errorDisplay = element.parentElement.querySelector(".error");
        errorDisplay.innerText = message;
        errorDisplay.style.display = 'block';
    }
    
    const setSuccess = element => {
        const inputBox = element.parentElement;
        const errorDisplay = inputBox.querySelector(".error");
        errorDisplay.innerText = '';
        inputBox.classList.remove('error');
    }
    
    const isValidEmail = email => {
        const re = /^(([^<>()[\\.,;:\s@"]+(\.[^<>()[\\.,;:\s@"]+)*)|(".+"))@(gmail|hotmail|yahoo|outlook)\.(com|info|es|io)$/;
        return re.test(String(email).toLowerCase());
    }
    
    document.getElementById('register').addEventListener('submit', function(event) {
        const usernameRegister = document.getElementById('usernameRegister');
        const emailRegister = document.getElementById('emailRegister');
        const passwordRegister = document.getElementById('passwordRegister');
        const confirmRegister = document.getElementById('confirmRegister');
        let valid = true;
    
        document.querySelectorAll('.error').forEach((el) => el.innerHTML = '');
    
        if (usernameRegister.value.trim() === '') {
            setError(usernameRegister, 'El nombre de usuario es requerido.');
            valid = false;
        } else {
            setSuccess(usernameRegister);
        }
    
        if (emailRegister.value.trim() === '') {
            setError(emailRegister, 'El email es requerido.');
            valid = false;
        } else if (!isValidEmail(emailRegister.value.trim())) {
            setError(emailRegister, 'Proporcionar un email válido.');
            valid = false;
        } else {
            setSuccess(emailRegister);
        }
    
        if (!passwordRegister.value.match(/(?=(.*[0-9]){2})/)) {
            setError(passwordRegister, 'La contraseña debe tener al menos 2 números.');
            valid = false;
        } else if (!passwordRegister.value.match(/[!@#$%^&*]/)) {
            setError(passwordRegister, 'La contraseña debe tener al menos un signo especial.');
            valid = false;
        } else if (!passwordRegister.value.match(/.{8,}/)) {
            setError(passwordRegister, 'La contraseña debe ser de al menos 8 caracteres.');
            valid = false;
        } else {
            setSuccess(passwordRegister);
        }
    
        if (passwordRegister.value !== confirmRegister.value) {
            setError(confirmRegister, 'Las contraseñas no coinciden. Inténtalo de nuevo.');
            valid = false;
        } else {
            setSuccess(confirmRegister);
        }
    
        if (!valid) {
            event.preventDefault();
        }
    });

    // Mostrar mensajes de error desde PHP 
    
    /*const urlParams = new URLSearchParams(window.location.search); 
    const answer = urlParams.get('answer'); 
    const field = urlParams.get('field'); 
    if (answer && field) { 
      let message; if (answer == 3) { 
        message = "El nombre de usuario ya está registrado."; 
      } else if (answer == 4) { 
        message = "El correo electrónico ya está registrado."; 
      } if (field == "nickRegister") { 
        setError(document.getElementById('usernameRegister'), message); 
      } else if (field == "emailRegister") { 
        setError(document.getElementById('emailRegister'), message); 
      } 
    }*/
    
    </script>
    

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    
</body>
</html>