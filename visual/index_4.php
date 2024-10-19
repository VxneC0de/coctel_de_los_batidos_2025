<!DOCTYPE html>
<?php
  session_start();
  if(isset ($_SESSION['who'])) { ?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/insert_styles.css">
  <title>Edit Product</title>
</head>
<body>

  <main>

    <h1>EDIT PRODUCT</h1>

    <?php 
    if(@$_GET['answer']==1){ ?>
    <h2 class="h2_1">Its edition was successful</h2>
    <meta http-equiv = "refresh" content = "2; url = show.php"/>
    <?php }
    if(@$_GET['answer']==2){ ?>
    <h2 class="h2_2">There were problems registering, please try again later</h2>
    <meta http-equiv = "refresh" content = "3; url = show.php"/>
    <?php 
    }

    if(isset($_GET['answer'])){}else{
    ?>

    <br>

    <form class="products" action="actions.php" method="post">

    <?php
    include "connection.php";

    $sql = "select * from products where id = '$_GET[e]'";

    $consult = mysqli_query($connection,$sql);

    $ver=mysqli_fetch_array($consult);


    ?>

      <input type="hidden" name="numberId" value="<?php echo $ver[0]; ?>">

      <label for="name">Products' name</label>
      <input type="text" name="name" id="name-products" placeholder="Enter the products' name" value="<?php echo $ver[1]; ?>" required>

      <br>

      <label for="description">Description</label>
      <textarea name="description" id="description-products" cols="30" rows="10" placeholder="Enter the description" require><?php echo $ver[2]; ?></textarea>

      <br>

      <label for="price">Price</label>
      <input type="text" name="price" id="price-products" placeholder="Enter the price" value="<?php echo $ver[3]; ?>"  required>

      <br>

      <label for="amount">Amount</label>
      <input type="text" name="amount" id="amount-products" placeholder="Enter the amount" value="<?php echo $ver[4]; ?>"  required>

      <br>

      <label for="img">Image</label>
      <input type="text" name="img" id="img-products" placeholder="Enter the image" value="<?php echo $ver[5]; ?>"  required>

      <br>

      <label for="date">Date</label>
      <input type="date" name="date" id="date-products" placeholder="Enter the date" value="<?php echo $ver[6]; ?>"  required>

      <br>

      <label for="status">Status</label>
      <select name="status" id="status-products">
        <?php
          if($ver[7] == 0){ ?>
            <option value="0" selected>Current</option>
          <?php }else{ ?>
            <option value="1" selected>Not current</option>
          <?php } ?>

          <option value="0">Current</option>
          <option value="1">Not current</option>
      </select>

      <br>

      <input type="hidden" name="hidden" value="2">

      <br>

      <button type="submit">Edit</button>

    </form>

    <?php } ?>
  </main>

  <script src="jquery.js"></script>

  <script src="./logic.js"></script>
  
</body>
</html>
<?php }else{
  header("location:userRegister.php?answer=6");
} ?>