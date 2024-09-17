<!DOCTYPE html>
<?php
  session_start();
  if(isset ($_SESSION['who'])) { ?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/insert_styles.css">
  <title>Products</title>
</head>
<body>

<?php //include "menu.php"; ?>

  <main>

    <h1>PRODUCTS</h1>

    <?php 
    if(@$_GET['answer']==1){ ?>
    <h2 class="h2_1">Your registration was successful</h2>
    <?php }
    if(@$_GET['answer']==2){ ?>
    <h2 class="h2_2">There were problems registering, please try again later</h2>
    <?php }
    ?>

    <br>

    <form class="products" action="actions.php" method="post">

      <label for="name">Products' name</label>
      <input type="text" name="name" id="name-products" placeholder="Enter the products' name" required>

      <br>

      <label for="description">Description</label>
      <textarea name="description" id="description-products" cols="30" rows="10" placeholder="Enter the description" require></textarea>

      <br>

      <label for="price">Price</label>
      <input type="text" name="price" id="price-products" placeholder="Enter the price" required>

      <br>

      <label for="amount">Amount</label>
      <input type="text" name="amount" id="amount-products" placeholder="Enter the amount" required>

      <br>

      <label for="img">Image</label>
      <input type="text" name="img" id="img-products" placeholder="Enter the image" required>

      <br>

      <label for="date">Date</label>
      <input type="date" name="date" id="date-products" placeholder="Enter the date" required>

      <br>

      <label for="status">Status</label>
      <select name="status" id="status-products">
        <option value="0">Current</option>
        <option value="1">Not current</option>
      </select>

      <br>

      <input type="hidden" name="hidden" value="1">

      <br>

      <button type="submit">Enter</button>

    </form>

  </main>

  <script src="jquery.js"></script>

  <script src="./logic.js"></script>
  
</body>
</html>
<?php }else{
  header("location:userRegister.php?answer=6");
} ?>