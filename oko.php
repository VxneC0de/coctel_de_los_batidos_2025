<?php
    include "../../controller/connection.php";

    // Variables para filtrar
    $search = isset($_POST['search']) ? $_POST['search'] : '';

    // Construir la consulta SQL con los filtros aplicados y ordenar por id_category
    $sql = "SELECT p.*, c.name_category 
        FROM product p 
        JOIN category c ON p.id_category = c.id
        /*WHERE p.status = 1*/ /*por si solo quiero que se muestre los disponibles*/
        ORDER BY p.id_category ASC";  // Ordenar por id_category

    if ($search != '') {
      $sql .= " AND p.name_product LIKE '%$search%'";
    }

    $consult = mysqli_query($connection, $sql);

    // Array para almacenar los productos por categoría
    $productsByCategory = [];

    while ($ver = mysqli_fetch_array($consult)) {
      $productsByCategory[$ver['id_category']][] = $ver;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const addToCartButtons = document.querySelectorAll('.btn_hero_2');

            addToCartButtons.forEach(button => {
                button.addEventListener('click', function () {
                    // Asumiendo que has establecido una variable de sesión para identificar al usuario
                    // Aquí solo verificamos si la variable de sesión 'who' está definida
                    <?php if (!isset($_SESSION['who'])): ?>
                        alert('Debe registrarse para poder hacer un pedido.');
                        window.location.href = '../login_oficial/login.php';
                    <?php else: ?>
                        // Código para agregar el producto al carrito aquí
                        alert('Producto agregado al carrito.');
                    <?php endif; ?>
                });
            });
        });
    </script>
</head>
<body>
    <?php foreach ($productsByCategory as $categoryId => $products): ?>
      <section class="section_container order_container" id="<?php echo strtolower($products[0]['name_category']); ?>">

        <p class="section_description">
          <?php echo strtoupper($products[0]['name_category']); ?>
        </p>

        <div class="order_grid">
          <?php foreach ($products as $product): ?>
            <div class="order_card">
              <img src="<?php echo "../../img/" . basename($product['img_product']); ?>" alt="order">
              <h4><?php echo $product['name_product']; ?></h4>
              <h2><?php echo number_format($product['price_product'], 2, ",", ".") . " Bs"; ?></h2>

              <button class="btn_hero_2" data-id="<?php echo $product['id_product']; ?>">Agregar al carrito</button>
            </div>
          <?php endforeach; ?>
        </div>
      </section>
    <?php endforeach; ?>
</body>
</html>
