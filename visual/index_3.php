<!DOCTYPE html>
<?php
  session_start();
  if(isset ($_SESSION['who'])) { ?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/show_styles.css">
  <title>List of Products</title>
</head>
<body>

<?php 
  include "menu.php"; 
  include "./chat_bot/chatbox.php";
  include "details.php";
?>

  <main style="margin-top: 100px;">

  <h2>Welcome!: <?php echo $_SESSION['nick']; ?></h2>

    <h1>LIST OF PRODUCTS</h1>

    <table border="1">

      <tr>
        <th>ID</th>

        <th>NAME
          <a href="show.php?n=NAME&fu=asc"><ion-icon name="arrow-up"></ion-icon></a>
          <a href="show.php?n=NAME&fu=desc"><ion-icon name="arrow-down"></ion-icon></a>
        </th>

        <th>DESCRIPTION
          <a href="show.php?n=DESCRIPTION&fu=asc"><ion-icon name="arrow-up"></ion-icon></a>
          <a href="show.php?n=DESCRIPTION&fu=desc"><ion-icon name="arrow-down"></ion-icon></a></a>
        </th>

        <th>PRICE
          <a href="show.php?n=PRICE&fu=asc"><ion-icon name="arrow-up"></ion-icon></a>
          <a href="show.php?n=PRICE&fu=desc"><ion-icon name="arrow-down"></ion-icon></a></a>
        </th>

        <th>AMOUNT
          <a href="show.php?n=AMOUNT&fu=asc"><ion-icon name="arrow-up"></ion-icon></a>
          <a href="show.php?n=AMOUNT&fu=desc"><ion-icon name="arrow-down"></ion-icon></a></a>
        </th>

        <th>IMG
          <a href="show.php?n=IMG&fu=asc"><ion-icon name="arrow-up"></ion-icon></a>
          <a href="show.php?n=IMG&fu=desc"><ion-icon name="arrow-down"></ion-icon></a></a>
        </th>

        <th>DATE
          <a href="show.php?n=DATE&fu=asc"><ion-icon name="arrow-up"></ion-icon></a>
          <a href="show.php?n=DATE&fu=desc"><ion-icon name="arrow-down"></ion-icon></a></a>
        </th>

        <th colspan="2">ACTION</th>

      </tr>

      <?php

      include "connection.php";

      if(isset($_GET['n'])){
        $sql = "select * from products where STATUS=0 order by ".$_GET['n']." ".$_GET['fu'];
      }else{
        $sql = "select * from products  where STATUS=0";
      }

      $consult = mysqli_query($connection,$sql);

      while($ver=mysqli_fetch_array($consult)){
      
      ?>
      
      <tr>
        <td><?php echo $ver[0]; ?></td> 
        <td><?php echo $ver[1]; ?></td>
        <td><?php echo $ver[2]; ?></td>
        <td><?php echo number_format($ver[3], 2, ",", ".")." $"; ?></td>
        <?php 
        # number_format -> para traer el numero con decimales. 
        # 1er parametro -> numero o posicion a traer -> en este caso -> precio
        # 2do parametro -> cantidad de decimales
        # 3er tercer parametro -> cual es el simbolo que se usara para separar los decimales
        # 4to parametro -> simbolo para las cantidades de miles
        ?>
        <td><?php echo $ver[4]; ?></td>
        <td><img src="<?php echo $ver[5]; ?>" width="200"></td>
        <td><?php echo flipDate($ver[6]); ?></td>
        <td><a href="edit.php?e=<?php echo $ver[0]; ?>">EDIT</a></td>
        <td><a href="#" onclick="confirmation(<?php echo $ver[0]; ?>)">DELETE</a></td>
      </tr>

      <?php } ?>

    </table>


  </main>

  <script src="jquery.js"></script>

  <script src="./logic.js"></script>

  <script>

  function confirmation(cod) {
    let answer = confirm("Are you sure to remove this product?")
    if(answer){
        window.location.href = "actions.php?e="+cod+"&hidden=3";
    }
  }

  </script>

  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

  
  
</body>
</html>
<?php }else{
  header("location:userRegister.php?answer=6");
} ?>