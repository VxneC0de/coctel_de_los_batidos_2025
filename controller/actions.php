<?php

include "connection.php";
extract($_POST);
extract($_GET);
switch($hidden){
  case 1:
    //REGISTER

    // para revisar si el nick o correo esta repetido
    $sqlNick = "select count(id) from user where nick='$nickRegister'";
    // para revisar si el email o correo esta repetido
    $sqlEmail = "select count(id) from user where email='$emailRegister'";

    // consulta que va a la base de datos
    $conne_1=mysqli_query($connection, $sqlNick);
    $conne_2=mysqli_query($connection, $sqlEmail);

    // vector que trae la consulta
    $union_1=mysqli_fetch_array($conne_1);
    $union_2=mysqli_fetch_array($conne_2);

    if($union_1[0]>0){
      header("location:../visual/login/login.php?answer=3");
    }else if($union_2[0]>0){
      header("location:../visual/login/login.php?answer=4");
    }else{

      $sql = "insert into user values('', '', '$nickRegister', '$emailRegister', MD5('$confirmRegister'), 0, 0)";

      if(mysqli_query($connection, $sql)){
        header("location:../visual/login/login.php?answer=1");
      }else{
        header("location:../visual/login/login.php?answer=2");
      }

    }

  break;
  case 2:
    //data User
    //$sql = "select id, nick, email from user where (nick = '$loginData' or email = '$loginData') and password = MD5('$passwordLogin')";
    
    $sql = "SELECT id, nick, email, status FROM user WHERE (nick = '$loginData' OR email = '$loginData') AND password = MD5('$passwordLogin')";

    $conne=mysqli_query($connection, $sql);

    /*if($v = mysqli_fetch_array($conne)){
      session_start();
      $_SESSION['who'] = $v[0];
      $_SESSION['nick'] = $v[2];
      $_SESSION['email'] = $v[3];

      header("location:../visual/upload/upload.php");

    }else{
      header("location:../visual/login/login.php?answer=5");
    }*/

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
    //INSERT
    $sql = "INSERT INTO product values('', '$id_category', '$name', '$description', '$img', '$price', '$date', '', '$status')";

    if(mysqli_query($connection, $sql)){
      header("location:../visual/show/show.php");
    }else{
      header("location:../visual/upload/upload.php?answer=2");
    }

  break;
  case 5:
    //EDIT
    $sql = "UPDATE product set id_category='$id_category', name_product='$name', description_product='$description', img_product='$img', price_product='$price', date_product='$date', status='$status' where id_product='$numberId'";

    if(mysqli_query($connection, $sql)){
      header("location:../visual/edit/edit.php?answer=1");
    }else{
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