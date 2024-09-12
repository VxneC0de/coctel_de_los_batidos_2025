<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/userRegister.css">
  <title>Sing in</title>
</head>
<body>

  <header class="header">
    <div class="logo-container">
        <h2 class="logo">PRPDUCTS</h2>
    </div>
</header>

<section class="main-container">

    <div class="login">
        <h2>LOGIN</h2>

        <form method="post" action="../controller/actions.php">

            <div>
                <span>
                    <ion-icon name="mail"></ion-icon>
                </span>
                <input name="loginData" type="text" id="emailLogin" placeholder="admin@admin.com">
                <label for="username">EMAIL</label>
                <div class="error"></div>
            </div>

            <div>
                <span>
                    <ion-icon name="lock-closed" id="lockLogin"></ion-icon>
                </span>
                <input name="passwordLogin" type="password" id="passwordLogin" placeholder="***********">
                <label for="password">PASSWORD</label>
                <div class="error"></div>
            </div>

            <div>
                <a href="forgotten.php" id="btnRecuperar">Did you forget your password?</a>
            </div>

            <input type="hidden" name="hidden" value="2">
            
            <button class="btn" id="btnLogin">LOGIN</button>

            <div>
                <p>
                  You do not have an account?
                    <a>SING IN</a>
                </p>
            </div>

        </form>

    </div>

    <div class="register">
        <h2>SING IN</h2>

        <form action="../controller/actions.php" method="post">

            <div>
                <span>
                    <ion-icon name="person"></ion-icon>
                </span>
                <input type="text" id="nickRegister" name="nickRegister" required>
                <label for="nickRegister">NICK</label>
                <div class="error">
                  <?php
                    if(@$_GET['answer']==3){ ?>
                    <h2>The nickname is already registered. Try again</h2>
                  <?php } ?>
                </div>
            </div>

            <div>
                <span>
                    <ion-icon name="mail"></ion-icon>
                </span>
                <input type="email" id="emailRegister" name="emailRegister" placeholder="admin@admin.com" required>
                <label for="emailRegister">EMAIL</label>
                <div class="error">
                  <?php
                    if(@$_GET['answer']==4){ ?>
                    <h2>The email is already registered. Try again</h2>
                  <?php } ?>
                </div>
            </div>

            <div>
                <span>
                    <ion-icon name="business"></ion-icon>
                </span>
                <input type="tel" id="countryCode" name="countryCode" maxlength="4" placeholder="+58" required>
                <label for="countryCode">COUNTRY CODE</label>
                <div class="error"></div>
            </div>
            
            <div>
                <span>
                    <ion-icon name="call"></ion-icon>
                </span>
                <input type="tel" id="phoneNumber" name="phoneNumber" maxlength="15" placeholder="123456789" required>
                <label for="phoneNumber">PHONE NUMBER</label>
                <div class="error"></div>
            </div>

            <div>
                <span>
                    <ion-icon name="lock-closed"></ion-icon>
                </span>
                <input type="password" id="passwordRegister" name="passwordRegister" maxlength="250" placeholder="********" required>
                <label for="passwordRegister">PASSWORD</label>
                <div class="error"></div>
            </div>

            <div>
                <span>
                    <ion-icon name="lock-closed"></ion-icon>
                </span>
                <input type="password" id="confirmRegister" name="confirmRegister" maxlength="250" placeholder="********" required>
                <label for="confirmRegister">CONFIRM PASSWORD</label>
                <div class="error"></div>
            </div>

            <input type="hidden" name="hidden" value="1">

            <br>
        
            <button type="submit" id="btnRegister">SING IN</button>

        </form>

        <?php
          if(@$_GET['answer']==1){ ?>
          <h2>Your registration was successful</h2>
        <?php } ?>

        <?php
          if(@$_GET['answer']==2){ ?>
          <h2>Error registering</h2>
        <?php } ?>

        <div>
            <p>
                Do you already have an account?
                <a>LOGIN</a>
            </p>
        </div>

    </div>

</section>


  <script src="jquery.js"></script>

  <script src="./logic.js"></script>

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