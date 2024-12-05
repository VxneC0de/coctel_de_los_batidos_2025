<section class="show_order" id="orderModal">

    <button class="close_show_order"><i class="fas fa-times"></i></button>

    <div class="order_header">
        <h2>Informacion del pedido</h2>
    </div>

    <div class="user_info">
        <div class="name_field">
            <label for="name">Nombre:</label>
            <input type="text" id="name" readonly>
        </div>
        <div class="surname_field">
            <label for="surname">Apellido:</label>
            <input type="text" id="surname" readonly>
        </div>
        <div class="email_field">
            <label for="email">Correo Electronico:</label>
            <input type="email" id="email" readonly>
        </div>
        <div class="cellphone_field">
            <label for="cellphone">Celular:</label>
            <input type="tel" id="cellphone" readonly>
        </div>
    </div>

    <div class="table_details">

        <div class="table_header_list">
            <div class="table_name">
                <p>Productos</p>
            </div>
        </div>

        <div class="table_section_list">
            <table>
                <thead>
                    <th>Nombre del producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Monto total</th>
                </thead>
                <tbody id="orderDetailsTableBody">
                    <!-- Detalles del pedido serán insertados aquí -->
                </tbody>
            </table>
        </div>

    </div>

    <div class="total_amount">
        <label for="total_bs">Total Bs:</label>
        <span id="total_bs"></span>
        <label for="total_ef">Total Efectivo:</label>
        <span id="total_ef"></span>
    </div>

    <div class="user_payment">

        <div class="payment_method">
            <label for="payment">Forma de Pago:</label>
            <input type="text" id="payment" readonly>
        </div>

        <div class="payment_method">
            <label for="capture">Captura del pago:</label>
            <span class="icon_clickable"><i class='bx bx-image'></i></span>
        </div>

        <div class="payment_method">
            <label for="reference">Referencia:</label>
            <input type="text" id="reference" readonly>
        </div>

        <div class="payment_method">
            <label for="phone">Celular de pago:</label>
            <input type="text" id="phone" readonly>
        </div>

        <div class="order_time">
            <label for="selectedDate">Fecha del Pedido:</label>
            <input type="text" id="selectedDate" value="Hoy" readonly>
        </div>

        <div class="order_time">
            <label for="selectedTime">Hora del Pedido:</label>
            <input type="text" id="selectedTime" readonly>
        </div>

    </div>              

    <div class="status_list">
        <div class="status_list">
            <label for="status_pedido">Estatus del Pedido</label>
            <span id="status_pedido"></span>
        </div>
    </div>

</section>

<script>
document.querySelectorAll('.button_action_1').forEach(button => {
    button.addEventListener('click', function() {
        const idOrder = this.getAttribute('data-id');
        const name = this.getAttribute('data-name');
        const surname = this.getAttribute('data-surname');
        const email = this.getAttribute('data-email');
        const phone = this.getAttribute('data-phone');
        const totalBs = this.getAttribute('data-total-bs');
        const totalEf = this.getAttribute('data-total-ef');
        const payment = this.getAttribute('data-payment');
        const reference = this.getAttribute('data-reference');
        const refPhone = this.getAttribute('data-ref-phone');
        const time = this.getAttribute('data-time');
        const statusText = this.getAttribute('data-status');

        let orderDetails = this.getAttribute('data-order-details');
        orderDetails = orderDetails ? JSON.parse(orderDetails) : [];

        // Llenar los campos del modal con los datos de la orden
        document.getElementById('name').value = name;
        document.getElementById('surname').value = surname;
        document.getElementById('email').value = email;
        document.getElementById('cellphone').value = phone;
        document.getElementById('total_bs').innerText = `Bs. ${totalBs}`;
        document.getElementById('total_ef').innerText = `Bs. ${totalEf}`;
        document.getElementById('payment').value = payment;
        document.getElementById('reference').value = reference;
        document.getElementById('phone').value = refPhone;
        document.getElementById('selectedTime').value = time;

        // Mapeo del status
        const statusMapping = {
            'confirmacion': 'En Confirmación',
            'proceso': 'En Proceso',
            'listo': 'Listo',
            'entregado': 'Entregado'
        };

        // Asignar el texto de estado adecuado
        document.getElementById('status_pedido').innerText = statusMapping[statusText] || statusText;

        // Llenar los detalles del pedido en la tabla del modal
        const orderDetailsTableBody = document.getElementById('orderDetailsTableBody');
        orderDetailsTableBody.innerHTML = ''; // Limpiar contenido previo

        orderDetails.forEach(item => {
            const product_id = item.id_product;
            const price = parseFloat(item.price); // Convertir price a un número
            const quantity = item.quantity;
            const subtotal = parseFloat(item.subtotal); // Convertir subtotal a un número

            // Obtener el nombre del producto desde la base de datos usando product_id
            const xhr = new XMLHttpRequest();
            xhr.open('GET', `get_product_name.php?product_id=${product_id}`, false); // Asegúrate de que esta ruta es correcta
            xhr.send(null);
            const product_name = xhr.responseText.trim(); // Eliminar espacios en blanco

            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${product_name}</td>
                <td>Bs. ${price.toFixed(2)}</td>
                <td>${quantity}</td>
                <td>Bs. ${subtotal.toFixed(2)}</td>
            `;
            orderDetailsTableBody.appendChild(row);
        });

        // Mostrar el modal
        document.querySelector('.modal_overlay').style.display = 'block';
        document.querySelector('.show_order').style.display = 'block';
        document.querySelector('.show_data').style.display = 'none';
    });
});

document.querySelector('.close_show_order').addEventListener('click', function() {
    document.querySelector('.modal_overlay').style.display = 'none';
    document.querySelector('.show_order').style.display = 'none';
});

document.querySelector('.icon_clickable').addEventListener('click', function() {
    document.querySelector('.show_data').style.display = 'block';
    document.querySelector('.modal_overlay').style.display = 'block';
    document.querySelector('.show_order').style.display = 'none';
});

document.querySelector('.close_show_data').addEventListener('click', function() {
    document.querySelector('.show_data').style.display = 'none';
    document.querySelector('.show_order').style.display = 'block';
});
</script>
