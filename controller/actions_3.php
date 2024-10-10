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

      $sql = "insert into user values('', '', '$nickRegister', '$emailRegister', MD5('$confirmRegister'), '$countryCode', '$phoneNumber', 0, 0)";

      if(mysqli_query($connection, $sql)){
        header("location:../visual/login/login.php?answer=1");
      }else{
        header("location:../visual/login/login.php?answer=2");
      }

    }

  break;
  case 2:

    $sql = "select id, nick, email from user where (nick = '$loginData' or email = '$loginData') and password = MD5('$passwordLogin')";

    $conne=mysqli_query($connection, $sql);

    if($v = mysqli_fetch_array($conne)){
      session_start();
      $_SESSION['who'] = $v[0];
      $_SESSION['nick'] = $v[1];
      $_SESSION['email'] = $v[2];

      header("location:../visual/menu.php");

    }else{
      header("location:../visual/login/login.php?answer=5");
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
    $sql = "insert into products values('', '$name', '$description', '$price', '$amount', '$img', '$date', '$status')";

    if(mysqli_query($connection, $sql)){
      header("location:../visual/insert.php?answer=1");
    }else{
      header("location:../visual/insert.php?answer=2");
    }

  break;

};


//if($name !== "" && $description !== "" && $price !== "" && $amount !== "" && $img !== "" && $date !== "" && $status !== ""){




?>