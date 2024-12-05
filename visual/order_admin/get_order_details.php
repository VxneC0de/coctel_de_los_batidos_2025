<?php
include "../../controller/connection.php";

$order_id = $_GET['order_id'];

$sql = "
    SELECT 
        o.id_order,
        p.name_payment,
        p.lastName_payment,
        p.phone_payment,
        u.email
    FROM 
        orders o
    JOIN 
        payment p ON o.id_payment_order = p.id_payment
    JOIN
        user u ON o.id_user_order = u.id
    WHERE 
        o.id_order = $order_id
";

$result = mysqli_query($connection, $sql);
$orderDetails = mysqli_fetch_assoc($result);

echo json_encode($orderDetails);
?>

