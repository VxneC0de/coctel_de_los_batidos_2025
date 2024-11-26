<!DOCTYPE html>
<?php
  session_start();
  if(isset ($_SESSION['who'])) { ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./menu_client.css">
    <title>Sing In</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>

        <nav>

          <div class="wrapper_nav">
              
              <div class="logo"><a href="#">LOGO.</a></div>
              <input type="radio" name="slider" id="menu-btn">
              <input type="radio" name="slider" id="close-btn">
              
              <ul class="nav-links">
                  
                  <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>
                    <li><a href="#main">Inicio</a></li>
                  
                  <li>
                      <a href="#" class="desktop-item">Productos ▾</a>
                      <input type="checkbox" id="showDrop">
                      <label for="showDrop" class="mobile-item">Productos ▾</label>
                      
                      <ul class="drop-menu">
                        <li><a href="#promociones" class="menu_item">Promociones</a></li>
                        <li><a href="#empanadas" class="menu_item">Empanadas</a></li>
                        <li><a href="#pastelitos" class="menu_item">Pastelitos</a></li>
                        <li><a href="#especiales" class="menu_item">Especiales</a></li>
                        <li><a href="#bebidas" class="menu_item">Bebidas Frías</a></li>
                        <li><a href="#otros" class="menu_item">Otros</a></li>
                      </ul>
                  </li>
                  
                  <li><a href="#">Contactos</a></li>
              
              </ul>
              
              <div class="header-right">

                  <div class="cart_icon">
                      <a href="#"><ion-icon name="cart"></ion-icon></a>
                      <span>0</span>
                  </div>
                  
                  <div class="user_icon">
                      <a href="#"><ion-icon name="person"></ion-icon></a>
                  </div>
                  
              </div>

              <div class="cart_sidebar">
                
                <button class="close_cart"><i class="fas fa-times"></i></button>
                
                <div class="cart_header">
                  <h2>Tu Pedido</h2>
                </div>

                <div class="cart_items">
                  
                  <div class="cart_item">

                    <div class="remove_item">
                      <span><i class='bx bx-trash'></i></span>
                    </div>

                    <div class="item_details">
                      <div class="item_details_title">
                          <p>Empanada de Carne</p>
                      </div>

                      <div class="item_details_price">
                          <strong>Bs. <span>35</span></strong> 
                      </div> 
                    </div>

                    <div class="qty">
                      <span>-</span>
                      <strong>1</strong>
                      <span>+</span>
                    </div>

                  </div>

                </div>

                <div class="cart_actions">

                  <div class="subtotal">
                    <p>SUBTOTAL:</p>
                    <strong>Bs. <span>525</span></strong>
                    <strong>$. <span>10</span></strong>
                  </div>

                  <button class="clean_btn">VACIAR CARRITO</button>
                  <button class="checkout_btn">IR AL PAGO</button> <!-- Botón de pago -->
                </div>
                
              </div>

              <div class="user_sidebar">
                
                <button class="close_user"><i class="fas fa-times"></i></button>
                
                <div class="user_header">
                  <div class="name_user">
                    <h2>Carol</h2>
                  </div>
                  <div class="email_user">
                    <h4>carol@gmail.com</h4>
                  </div>
                </div>

                <div class="user_items">
                  
                  <div class="user_item">

                    <div class="item_details">
                      <div class="item_details_title_user">
                        <i class='bx bx-list-ul'></i>
                        <a href="#">Mis Ordenes</a>
                      </div>
                    </div>

                  </div>

                  <div class="user_item">

                    <div class="item_details">
                      <div class="item_details_title_user">
                        <i class='bx bx-cog'></i>
                        <a href="#">Editar Perfil</a>
                      </div>
                    </div>

                  </div>

                  <div class="user_item">

                    <div class="item_details">
                      <div class="item_details_title_user">
                        <i class='bx bx-log-out-circle'></i>
                        <a href="#">Cerrar Sesión</a>
                      </div>
                    </div>

                  </div>

                </div>
                
              </div>
              
              <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
          
          </div>
      
        </nav>

        <section class="hero" id="main">

          <div class="header_content">
            
            <div class="hero_text">
              <h2>#Sabores para cualquier momento</h2>
              <h1>¡El Cóctel de los Batidos 2025 te da la bienvenida!</h1>
              <p>Impulsa tu día con nuestras empanadas, pastelitos y jugos naturales. ¡Disfruta de una combinación perfecta de sabor y energía en tus mañanas!</p>

            </div>

          </div>

            <div class="header_image">
              <img src="./assets/hero_2.png" alt="hero" class="img_hero_2">
            </div>

        </section>

        <section class="section_container banner_container">

          <div class="banner_card">
            <p>PRUÉBALAS HOY</p> 
            <h4>EMPANADA MÁS POPULAR</h4>
          </div>

          <div class="banner_card">
            <p>PRUÉBALAS HOY</p> 
            <h4>MÁS SABOR <br> MÁS DIVERSIÓN</h4>
          </div>

          <div class="banner_card">
            <p>PRUÉBALAS HOY</p> 
            <h4>FRESCAS Y PICANTES</h4>
          </div>

        </section>

        <section class="section_container order_container" id="promociones">

          <h2 class="section_header">ELIGE Y DISFRUTA</h2>

          <p class="section_description">
            PROMOCIONES
          </p>

          <div class="order_grid">

            <div class="order_card">
              <img src="./assets/order-2.png" alt="order">
              <h4>Mechada</h4>
              <h2>40bs</h2>

              <button class="btn_hero_2">Agregar al carrito</button>
            </div>

            <div class="order_card">
              <img src="./assets/order-3.png" alt="order">
              <h4>Pollo</h4>
              <h2>40bs</h2>

              <button class="btn_hero_2">Agregar al carrito</button>
            </div>

          </div>

        </section>

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

<div class="modal_overlay"></div>

<section class="show_order">
  <button class="close_show_order"><i class="fas fa-times"></i></button>
  <div class="order_content">
    <div class="image_section">
      <img id="productImage" src="" alt="Producto" width="200">
    </div>
    <div class="details_section">
      <div class="input_group">
        <label for="productName">Nombre:</label>
        <input type="text" id="productName" readonly>
      </div>
      <div class="input_group">
        <label for="productCategory">Categoría:</label>
        <input type="text" id="productCategory" readonly>
      </div>
      <div class="input_group">
        <label for="productPrice">Precio:</label>
        <input type="text" id="productPrice" readonly>
      </div>
      <div class="input_group">
        <label for="productDescription">Descripción:</label>
        <textarea id="productDescription" rows="4" readonly></textarea>
      </div>
      <div class="input_group">
        <label for="productStatus">Estado:</label>
        <input type="text" id="productStatus" readonly>
      </div>
      <div class="input_group quantity">
        <label for="productQuantity">Cantidad:</label>
        <div class="quantity_control">
          <button class="decrement">-</button>
          <input type="text" id="productQuantity" value="1" readonly>
          <button class="increment">+</button>
        </div>
      </div>
      <div class="input_group">
        <button class="add_to_cart">Mandar al carrito</button>
      </div>
    </div>
  </div>
</section>

<script>
document.querySelectorAll('.btn_hero_2').forEach(button => {
  button.addEventListener('click', function() {
    const productId = this.getAttribute('data-id');
    
    // Hacer una llamada AJAX para obtener los detalles del producto
    fetch(`get_product_details.php?id=${productId}`)
      .then(response => response.json())
      .then(data => {
        document.getElementById('productImage').src = `../../img/${data.img_product}`;
        document.getElementById('productName').value = data.name_product;
        document.getElementById('productCategory').value = data.name_category;
        document.getElementById('productPrice').value = new Intl.NumberFormat('es-VE', { style: 'currency', currency: 'VES' }).format(data.price_product);
        document.getElementById('productDescription').value = data.description_product;
        
        // Ajuste aquí para mostrar el estado correctamente
        const statusText = (data.status == 1) ? "Disponible" : "No Disponible";
        document.getElementById('productStatus').value = statusText;

        document.querySelector('.modal_overlay').style.display = 'block';
        document.querySelector('.show_order').style.display = 'flex';
      })
      .catch(error => console.error('Error:', error));
  });
});

document.querySelector('.close_show_order').addEventListener('click', function() {
  document.querySelector('.modal_overlay').style.display = 'none';
  document.querySelector('.show_order').style.display = 'none';
});

document.querySelector('.increment').addEventListener('click', function() {
  const quantityInput = document.getElementById('productQuantity');
  let quantity = parseInt(quantityInput.value);
  quantity++;
  quantityInput.value = quantity;
});

document.querySelector('.decrement').addEventListener('click', function() {
  const quantityInput = document.getElementById('productQuantity');
  let quantity = parseInt(quantityInput.value);
  if (quantity > 1) {
    quantity--;
    quantityInput.value = quantity;
  }
});

</script>



        

    
        <script>
          document.addEventListener('DOMContentLoaded', function() {
            const userIcon = document.querySelector('.user_icon a');
            const userSidebar = document.querySelector('.user_sidebar');
            const closeuser = document.querySelector('.close_user');
        
            userIcon.addEventListener('click', function(event) {
              event.preventDefault();
              userSidebar.style.right = '0';
            });
        
            closeuser.addEventListener('click', function() {
              userSidebar.style.right = '-100%';
            });
            
          });
        </script>
    
        <script>
          document.addEventListener('DOMContentLoaded', function() {
            const cartIcon = document.querySelector('.cart_icon a');
            const cartSidebar = document.querySelector('.cart_sidebar');
            const closeCart = document.querySelector('.close_cart');
        
            cartIcon.addEventListener('click', function(event) {
              event.preventDefault();
              cartSidebar.style.right = '0';
            });
        
            closeCart.addEventListener('click', function() {
              cartSidebar.style.right = '-100%';
            });
          });
        </script>
    
        <script>
          
          document.querySelectorAll('.menu_item').forEach(item => {
            item.addEventListener('click', () => {
              document.getElementById('menu-btn').checked = false;
            });
          });

        </script>


        <script src="https://unpkg.com/scrollreveal"></script>

        <script>
          ScrollReveal({ 
            // reset: true,
            distance: "80px",
            duration: 2000,
            delay: 200
          });
          
          ScrollReveal().reveal('nav', { origin: 'top' });
          ScrollReveal().reveal('.banner_card, .section_description, .order_card', { origin: 'bottom' });
          ScrollReveal().reveal('.hero_text h2, .hero_text h1, .hero_p, .footer_logo, .footer_content p', { origin: 'left' });
          ScrollReveal().reveal('.header_image, .top2, .footer_links li, .footer_socials a', { origin: 'right' });
        </script>

        <script>
          document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
              e.preventDefault();
              
              document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
              });
            });
          });
        </script>

<script>
        
        document.querySelector('.btn_hero_2').addEventListener('click', function() {
          document.querySelector('.modal_overlay').style.display = 'block';
          document.querySelector('.show_order').style.display = 'flex';
        });

        document.querySelector('.close_show_order').addEventListener('click', function() {
          document.querySelector('.modal_overlay').style.display = 'none';
          document.querySelector('.show_order').style.display = 'none';
        });

        document.querySelector('.increment').addEventListener('click', function() {
          const quantityInput = document.getElementById('productQuantity');
          let quantity = parseInt(quantityInput.value);
          quantity++;
          quantityInput.value = quantity;
        });

        document.querySelector('.decrement').addEventListener('click', function() {
          const quantityInput = document.getElementById('productQuantity');
          let quantity = parseInt(quantityInput.value);
          if (quantity > 1) {
            quantity--;
            quantityInput.value = quantity;
          }
        });
        
        </script>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    
</body>
</html>
<?php }else{
  header("location:../login/login.php?answer=6");
} ?>