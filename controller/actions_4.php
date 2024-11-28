<?php

require __DIR__ . '/../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include "connection.php";
session_start(); // Asegúrate de que la sesión esté iniciada para acceder a $_SESSION
extract($_POST);
extract($_GET);

switch($hidden){
  case 1:
    //REGISTER
    $errors = array();

    $sqlNick = "SELECT COUNT(id) FROM user_two WHERE nick='$nickRegister'";
    $sqlEmail = "SELECT COUNT(id) FROM user_two WHERE email='$emailRegister'";

    $conne_1 = mysqli_query($connection, $sqlNick);
    $conne_2 = mysqli_query($connection, $sqlEmail);

    $union_1 = mysqli_fetch_array($conne_1);
    $union_2 = mysqli_fetch_array($conne_2);

    if ($union_1[0] > 0) {
        $errors[] = "nickRegister";
    }

    if ($union_2[0] > 0) {
        $errors[] = "emailRegister";
    }

    if (!empty($errors)) {
        $errorFields = implode(',', $errors);
        header("location:../visual/sing_prueba/login.php?answer=4&fields=$errorFields&nickRegister=$nickRegister&emailRegister=$emailRegister&errorLogin=1");
    } else {
        // Generar código de verificación
        $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

        // Encriptar contraseña
        $encrypted_password = password_hash($confirmRegister, PASSWORD_DEFAULT);

        // Insertar el usuario en la base de datos
        $sql = "INSERT INTO user_two (nick, email, password, verification_code, email_verified_at, status) VALUES ('$nickRegister', '$emailRegister', '$encrypted_password', '$verification_code', NULL, 0)";
        if (mysqli_query($connection, $sql)) {
            // Enviar correo de verificación
            $mail = new PHPMailer(true);
            try {
                $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Habilitar depuración detallada
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'pruebadevcode20@gmail.com'; // Tu correo electrónico de Gmail
                $mail->Password = 'prueba2020..'; // Tu contraseña o contraseña de aplicación
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587; // Puerto para TLS
            
                $mail->setFrom('pruebadevcode20@gmail.com', 'prueba');
                $mail->addAddress($emailRegister, $nickRegister);
                $mail->isHTML(true);
                $mail->Subject = 'Email verification';
                $mail->Body = '<p>Your verification code is: <b style="font-size: 30px;">' . $verification_code . '</b></p>';
            
                $mail->send();
                echo 'Correo enviado correctamente.';
                header("Location: email-verification.php?email=" . $emailRegister);
                exit();
            } catch (Exception $e) {
                echo "No se pudo enviar el mensaje. Error de PHPMailer: {$mail->ErrorInfo}";
            }
                 
            header("location:../visual/sing_prueba/login.php?answer=1");
        } else {
            header("location:../visual/sing_prueba/login.php?answer=2&nickRegister=$nickRegister&emailRegister=$emailRegister");
        }
    }
  break;
  case 2:
    //LOGIN
    $loginData = $_POST['loginData'];
    $passwordLogin = $_POST['passwordLogin'];

    $sql = "SELECT * FROM user_two WHERE (nick = '$loginData' OR email = '$loginData')";
    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) == 0) {
        die("Usuario o correo no encontrado.");
    }

    $user = mysqli_fetch_object($result);

    if (!password_verify($passwordLogin, $user->password)) {
        die("Contraseña incorrecta.");
    }

    if ($user->email_verified_at == null) {
        die("Por favor verifica tu correo <a href='email-verification.php?email=" . $user->email . "'>desde aquí</a>");
    }

    session_start();
    $_SESSION['who'] = $user->id;
    $_SESSION['nick'] = $user->nick;
    $_SESSION['email'] = $user->email;

    if ($user->status == 1) {
        header("Location: ../visual/upload_oficial/upload.php");
    } else {
        header("Location: ../visual/menu_client/menu_client.php");
    }
    exit();
  break;
  case 3:
    //LOGOUT
    session_start();
    session_unset();
    session_destroy();
    header("location:../visual/sing_prueba/login.php");
  break;
};

?>
