<?php

include "connection.php";
extract($_POST);
extract($_GET);
switch($hidden){
  case 1:
    //REGISTER

$errors = array();

$sqlNick = "SELECT COUNT(id) FROM user WHERE nick='$nickRegister'";
$sqlEmail = "SELECT COUNT(id) FROM user WHERE email='$emailRegister'";

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
    header("location:../visual/login_oficial/login.php?answer=4&fields=$errorFields&nickRegister=$nickRegister&emailRegister=$emailRegister");
} else {
    $sql = "INSERT INTO user VALUES('', '', '$nickRegister', '$emailRegister', MD5('$confirmRegister'), 0, 0)";
    if (mysqli_query($connection, $sql)) {
        header("location:../visual/login_oficial/login.php?answer=1");
    } else {
        header("location:../visual/login_oficial/login.php?answer=2&nickRegister=$nickRegister&emailRegister=$emailRegister");
    }
}


  break;
  case 2:
    //data User
    
    $sql = "SELECT id, nick, email, status FROM user WHERE (nick = '$loginData' OR email = '$loginData') AND password = MD5('$passwordLogin')";

    $conne=mysqli_query($connection, $sql);

    if ($v = mysqli_fetch_array($conne)) { 
      session_start(); 
      $_SESSION['who'] = $v['id']; 
      $_SESSION['nick'] = $v['nick']; 
      $_SESSION['email'] = $v['email']; 
      
      if ($v['status'] == 1) { 
        header("Location: ../visual/upload/upload.php"); 
      } else { 
        header("Location: ../visual/menu_client/menu_client.php"); 
      } 
      
    } else { 
      header("Location: ../visual/login/login.php?answer=5"); 
    }

  break;
  case 3:

    session_start();

    session_unset();
    session_destroy();
    header("location:../visual/login/login.php");

  break;
  case 4:
    // INSERT

    // IMG
    
    $file = $_FILES['img']['tmp_name'];
    $type = $_FILES['img']['type'];

    if (strpos($type, "gif") !== false || strpos($type, "jpeg") !== false || strpos($type, "jpg") !== false || strpos($type, "png") !== false) {
        $sql = "SELECT MAX(id_product) FROM product";
        $result = mysqli_query($connection, $sql);
        $row = mysqli_fetch_array($result);

        if (isset($row[0])) {
            $max = $row[0] + 1;
        } else {
            $max = 1;
        }

        $ext = getimagesize($file);

        if ($ext[2] == IMAGETYPE_GIF) {
            $max = $max . ".gif";
        } elseif ($ext[2] == IMAGETYPE_JPEG) {
            $max = $max . ".jpg";
        } elseif ($ext[2] == IMAGETYPE_PNG) {
            $max = $max . ".png";
        }

        if (is_uploaded_file($file)) {
            move_uploaded_file($file, '../img/' . $max);
            $img = '../img/' . $max;
        } else {
            echo "Error al subir el archivo.";
        }
    }

    $sql = "INSERT INTO product (id_category, name_product, description_product, img_product, price_product, date_product, quantity_product, status) VALUES ('$id_category', '$name', '$description', '$img', '$price', '$date', '$quantity', '$status')";

    if(mysqli_query($connection, $sql)){
        header("location:../visual/show/show.php");
    } else {
        header("location:../visual/upload/upload.php?answer=2");
    }

    break;

    case 5:
      // EDIT
  
      $img = ""; // Inicializamos la variable $img
  
      // Comprobar si se ha subido una nueva imagen
      if (!empty($_FILES['img']['tmp_name'])) {
          $file = $_FILES['img']['tmp_name'];
          $type = $_FILES['img']['type'];
  
          if (strpos($type, "gif") !== false || strpos($type, "jpeg") !== false || strpos($type, "jpg") !== false || strpos($type, "png") !== false) {
              $sql = "SELECT MAX(id_product) FROM product";
              $result = mysqli_query($connection, $sql);
              $row = mysqli_fetch_array($result);
  
              if (isset($row[0])) {
                  $max = $row[0] + 1;
              } else {
                  $max = 1;
              }
  
              $ext = getimagesize($file);
  
              if ($ext[2] == IMAGETYPE_GIF) {
                  $max = $max . ".gif";
              } elseif ($ext[2] == IMAGETYPE_JPEG) {
                  $max = $max . ".jpg";
              } elseif ($ext[2] == IMAGETYPE_PNG) {
                  $max = $max . ".png";
              }
  
              if (is_uploaded_file($file)) {
                  move_uploaded_file($file, '../img/' . $max);
                  $img = '../img/' . $max;
              } else {
                  echo "Error al subir el archivo.";
                  exit;
              }
          }
      }
  
      // Si no se ha subido una nueva imagen, recuperar la imagen existente
      if (empty($img)) {
          $sql = "SELECT img_product FROM product WHERE id_product = '$numberId'";
          $result = mysqli_query($connection, $sql);
          $row = mysqli_fetch_array($result);
          $img = $row['img_product'];
      }
  
      $sql = "UPDATE product SET id_category='$id_category', name_product='$name', description_product='$description', img_product='$img', price_product='$price', date_product='$date', status='$status' WHERE id_product='$numberId'";
  
      if (mysqli_query($connection, $sql)) {
          header("location:../visual/edit/edit.php?answer=1");
      } else {
          header("location:../visual/edit/edit.php?answer=2");
      }
  
      break;
  
  
  case 6:
    // DELETE
    $sql = "UPDATE product SET status=3 WHERE id_product=?";
    if ($statement = mysqli_prepare($connection, $sql)) {
        mysqli_stmt_bind_param($statement, "i", $e);
        
        if (mysqli_stmt_execute($statement)) {
            header("location:../visual/show/show.php");
        } else {
            echo "<script>alert('Could not delete');</script>";
            header("location:../visual/show/show.php");
        }
        
        mysqli_stmt_close($statement);
    } else {
        echo "<script>alert('Query preparation failed');</script>";
        header("location:../visual/show/show.php");
    }
  break;
  

};



?>;