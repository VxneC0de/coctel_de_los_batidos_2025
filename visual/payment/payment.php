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
    <link rel="stylesheet" href="./payment.css">
    <title>Pago</title>
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
                <li><a href="#">Inicio</a></li>
        
            </ul>
        
            <div class="header-right">
                
                <div class="cart_icon">
                    <a href="#"><ion-icon name="cart"></ion-icon></a>
                    <span>1020bs</span>
                </div>
            
            </div>
        
            <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
    
        </div>

    </nav>

    <section class="section_container form_order">
        
        <div class="payment_div">
            
            <header>Orden</header>
            
            <form action="#" class="form_payment" id="orderForm">
                
                <div class="data">
                    
                    <h3 class="title_form">Mi contacto</h3>
                    
                    <div class="input-box">
                        <label>Nombre <span>*</span></label>
                        <input type="text" id="firstName" required />
                        <div class="error"></div>
                    </div>
                    
                    <div class="input-box">
                        <label>Apellido <span>*</span></label>
                        <input type="text" id="lastName" required />
                        <div class="error"></div>
                    </div>
                    
                    <div class="input-box">
                        <label>Teléfono <span>*</span></label>
                        <input type="text" id="phone" required />
                        <div class="error"></div>
                    </div>
                
                </div>

                <div class="data">
                    
                    <h3 class="title_form">Método de envío</h3>

                    <div class="div_envio">
                        
                        <div class="envio">
                            <div class="pickup">Pickup</div>
                        </div>                          

                    </div>

                </div>

                <div class="data">
                    
                    <h3 class="title_form">Punto de recogida</h3>
                    
                    <div class="div_recogida">
                        <p>Calle los Apatames, Edificio número 5, Local único, Caracas.
                            <br>
                            Caracas
                            <br>
                            Capital
                            <br>
                            1011
                        </p>
                    </div>

                </div>
                
                <div class="data">
                    
                    <h3 class="title_form">Notas adicionales</h3>

                        <div class="input-box">
                            <label>Notas del pedido (opcional)</label>
                            <textarea name="" id="orderNotes" maxlength="150"></textarea>
                        </div>

                    <h5>Seleccionar la hora de recogida</h5>

                    <div class="column">
                        
                        <div class="input-box">
                            <label>Fecha <span>*</span></label>
                            <select id="pickupDate" required>
                                <option value="Hoy">Hoy</option>
                            </select>
                            <div class="error"></div>
                        </div>
                        
                        <div class="input-box">
                            <label>Tiempo <span>*</span></label>
                            <select id="pickupTime" required>
                                <option value="asap">Tan pronto como sea posible</option>
                                <option value="7-730">7:00 - 7:30</option>
                                <option value="730-8">7:30 - 8:00</option>
                                <option value="8-830">8:00 - 8:30</option>
                                <option value="830-9">8:30 - 9:00</option>
                                <option value="9-930">9:00 - 9:30</option>
                                <option value="930-10">9:30 - 10:00</option>
                                <option value="10-1030">10:00 - 10:30</option>
                                <option value="1030-11">10:30 - 11:00</option>
                                <option value="11-1130">11:00 - 11:30</option>
                                <option value="1130-12">11:30 - 12:00</option>
                                <option value="1230-13">12:30 - 13:00</option>
                            </select>
                            <div class="error"></div>
                        </div>
                
        
                </div>

                </div>

                <div class="data">

                    <h3 class="title_form">Modo de Pago</h3>

                    <div class="metodos">

                        <div class="payment-option" id="pago-movil">
                            
                            <input type="radio" name="payment" id="radio-pago-movil">
                            <label for="radio-pago-movil" class="label_pago">Pago Móvil</label>
                            <div class="details_movil" id="details-movil">

                                <div class="input-box">
                                    <label for="referencia-movil">Ultimos 4 números de la referencia <span>*</span></label>
                                    <input type="text" id="referencia-movil">
                                    <div class="error"></div>
                                </div>

                                <div class="input-box">
                                    <label for="telefono-movil">Número de telefono donde se hizo el pago <span>*</span></label>
                                    <input type="text" id="telefono-movil">
                                    <div class="error"></div>
                                </div>
                                
                                <div class="input-box_2">
                                    <input type="file" id="file-movil" accept="image/*" hidden>
                                    <div class="img-area" data-img="">
                                        <i class='bx bxs-image-alt icon'></i>
                                        <h3 class="title_area">Captura del pago</h3>
                                        <p>La imagen debe ser inferior a <span>2MB</span></p>
                                    </div>
                                    <div class="select-image" id="select-image-movil"> 
                                        <p>Subir Captura</p> 
                                    </div>
                                </div>
                                <div id="imageError-movil" class="error_2"></div>

                            </div>

                        </div>
          
                        <div class="payment-option" id="efectivo">

                            <input type="radio" name="payment" id="radio-efectivo">
                            <label for="radio-efectivo" class="label_pago">Efectivo</label>
                            <div class="details_efectivo" id="details-efectivo">
                          
                                <div class="input-box_2">

                                    <input type="file" id="file-efectivo" accept="image/*" hidden>
                                    <div class="img-area" data-img="">
                                        <i class='bx bxs-image-alt icon'></i>
                                        <h3 class="title_area">Captura del pago</h3>
                                        <p>La imagen debe ser inferior a <span>2MB</span></p>
                                    </div>
                                    <div class="select-image" id="select-image-efectivo"> 
                                        <p>Subir Captura</p> 
                                    </div>

                                </div>
                                <div id="imageError-efectivo" class="error_2"></div>
                            </div>
                        </div>
          
                        <div class="payment-option" id="tarjeta">

                            <input type="radio" name="payment" id="radio-tarjeta">
                            <label for="radio-tarjeta" class="label_pago">Tarjeta</label>
                            <div class="details_tarjeta" id="details-tarjeta">
                          
                                <div class="input-box_2 img_edit">
                                    <div class="img-area_2">
                                        <p>Pagar directamente en caja al retirar el pedido</p>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="input-box box_submit">
                    <input type="submit" class="submit" value=" Confirmar el pedido">
                </div>

            </form>

        </div>

    </section>
      
    <div class="modal_overlay"></div>
  
    <section class="show_cart">
        
        <div class="cart_div">
            
            <div class="cart_header">
                <h2>RESUMEN DEL PEDIDO</h2>
            </div>
            
            <div class="cart_container">
                
                <form action="#" class="cart_items">
                    
                    <div class="cart_item">
                        
                        <div class="cart_right">
                            
                            <div class="item_details">
                                
                                <div class="item_details_title">
                                    <p>Empanada de Carne</p>
                                </div>
              
                                <div class="item_details_price">
                                    <strong>Bs. <span>35</span></strong> 
                                </div> 

                            </div>
          
                            <div class="quantity">

                                <div class="quantity_control">
                                    <button class="decrement">-</button>
                                    <input type="text" id="productQuantity" value="1" readonly>
                                    <button class="increment">+</button>
                                </div>

                            </div>
          
                            <div class="remove_item">
                                <a><i class='bx bx-trash'></i></a>
                            </div>
          
                        </div>
          
                        <div class="cart_left">
                            
                            <div class="total">
                                <div class="item_price_complete">$11,99</div>
                            </div>
          
                        </div>
          
                    </div>
          
                </form>
                
                <div class="cart_total">
                    
                    <div class="total_data">
                        <span>Subtotal</span>
                        <span>$11,99</span>
                    </div>
            
                    <div class="total_data">
                        <span>Envío</span>
                        <span>--</span>
                    </div>
            
                    <div class="total_data">
                        <span>TOTAL</span>
                        <span>$11,99</span>
                    </div>
          
                </div>
                
                <div class="cart_close">
                    <button class="close">Cerrar</button>
                </div>
      
            </div>
              
        </div>
  
    </section>
    
    <footer class="footer">
        
        <div class="footer-box">
            
            <div class="footer-text">
                <p>&copy; El Cóctel de los Batidos 2025</p>
            </div>
              
            <div class="footer-creater">
                <a href="#">By VxneC0de</a>
            </div>
            
        </div>
    
    </footer>
    
    
    <script>
    
    // Mostrar carrito y fondo de superposición al hacer clic en el icono del carrito
    
    document.querySelector('.cart_icon').addEventListener('click', function(e) {
        e.preventDefault();
        document.querySelector('.modal_overlay').style.display = 'block';
        document.querySelector('.show_cart').style.display = 'flex';
    });
    
    // Cerrar carrito y fondo de superposición al hacer clic en el botón de cerrar
    document.querySelector('.close').addEventListener('click', function() {
        document.querySelector('.modal_overlay').style.display = 'none';
        document.querySelector('.show_cart').style.display = 'none';
    });
    
    // Cerrar el carrito al hacer clic fuera del área del carrito
    document.querySelector('.modal_overlay').addEventListener('click', function() {
        document.querySelector('.modal_overlay').style.display = 'none';
        document.querySelector('.show_cart').style.display = 'none';
    });

    </script>

    <script>
    
    document.addEventListener('DOMContentLoaded', () => {
    // Función para ocultar detalles
    function hideAllDetails() {
        document.querySelectorAll('.details_movil, .details_efectivo, .details_tarjeta').forEach(detail => {
            detail.style.display = 'none';
        });
    }

    // Función para limpiar todos los inputs y áreas de imagen
    function clearInputs() {
        document.querySelectorAll('.details_movil input, .details_efectivo input, .details_movil textarea, .details_efectivo textarea').forEach(input => {
            input.value = '';
        });
        document.querySelectorAll('.img-area').forEach(imgArea => {
            imgArea.innerHTML = `
                <i class='bx bxs-image-alt icon'></i>
                <h3 class="title_area">Captura del pago</h3>
                <p>La imagen debe ser inferior a <span>2MB</span></p>
            `;
            imgArea.classList.remove('active');
            imgArea.dataset.img = '';
        });
    }

    // Listeners para los inputs de tipo radio
    document.querySelector('#radio-pago-movil').addEventListener('click', function() {
        hideAllDetails();
        clearInputs();
        document.querySelector('.details_movil').style.display = 'flex';
        console.log('Pago Móvil seleccionado');
    });

    document.querySelector('#radio-efectivo').addEventListener('click', function() {
        hideAllDetails();
        clearInputs();
        document.querySelector('.details_efectivo').style.display = 'flex';
        console.log('Efectivo seleccionado');
    });

    document.querySelector('#radio-tarjeta').addEventListener('click', function() {
        hideAllDetails();
        clearInputs();
        document.querySelector('.details_tarjeta').style.display = 'flex';
        console.log('Tarjeta seleccionada');
    });

    // Funcionalidad para la subida de imágenes
    const selectImages = document.querySelectorAll('.select-image');
    selectImages.forEach(selectImage => {
        const inputFile = selectImage.parentElement.querySelector('input[type="file"]');
        const imgArea = selectImage.parentElement.querySelector('.img-area');
        
        selectImage.addEventListener('click', () => {
            inputFile.click();
        });
        
        inputFile.addEventListener('change', () => {
            const image = inputFile.files[0];
            if (image.size < 2000000) {
                const reader = new FileReader();
                reader.onload = () => {
                    // Elimina todas las imágenes previas
                    const allImg = imgArea.querySelectorAll('img');
                    allImg.forEach(img => img.remove());
                    // Añade la nueva imagen
                    const imgUrl = reader.result;
                    const img = document.createElement('img');
                    img.src = imgUrl;
                    imgArea.appendChild(img);
                    imgArea.classList.add('active');
                    imgArea.dataset.img = image.name;
                };
                
                reader.readAsDataURL(image);
            } else {
                alert("La imagen debe ser menor a 2MB");
            }
        });
    });
});

    </script>


    <script>
        document.addEventListener('DOMContentLoaded', () => {
    const pickupDiv = document.querySelector('.pickup');
    const radioInputs = document.querySelectorAll('input[name="payment"]');
    
    pickupDiv.addEventListener('click', () => {
        // Desmarcar otros radio inputs
        radioInputs.forEach(input => input.checked = false);
        // Remover la clase 'selected' de todos los labels
        document.querySelectorAll('.payment-option label').forEach(label => {
            label.classList.remove('selected');
        });
        // Agregar la clase 'selected' al div pickup
        pickupDiv.classList.add('selected');
    });

    // Listener para desmarcar el div pickup cuando un radio input se selecciona
    radioInputs.forEach(input => {
        input.addEventListener('click', () => {
            pickupDiv.classList.remove('selected');
        });
    });
});

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

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    
</body>
</html>
<?php }else{
  header("location:../login_oficial/login.php?answer=6");
} ?>