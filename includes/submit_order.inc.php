<?php
    include_once "dbh.inc.php";
    session_start();

    $totalCosts = $_SESSION['totalPrice'];
    $customer_id = $_SESSION['customer_id'];
    $current_order = $_SESSION['current_order'];

    // Create new order
    $query = "INSERT INTO orders VALUES (NULL, NOW(), 0, $customer_id)";
    $query_results = mysqli_query($conn, $query);

    // Update current order
    $query = "UPDATE orders SET total_price = '$totalCosts', order_date = NOW() WHERE order_id = '$current_order'";
    $query_results = mysqli_query($conn, $query);
?>