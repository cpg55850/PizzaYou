<?php
    include_once "dbh.inc.php";
    session_start();

    $totalCosts = $_SESSION['totalPrice'];
    $u_name = $_SESSION['u_name'];
    $current_order = $_SESSION['current_order'];

    // Update current order
    $query = "UPDATE orders SET total_price = '$totalCosts', order_date = NOW() WHERE order_id = '$current_order'";
    $query_results = mysqli_query($conn, $query);

    // Create new order
    $query = "INSERT INTO orders VALUES (NULL, NOW(), 0, $u_name)";
    $query_results = mysqli_query($conn, $query);
?>