<?php 
    include_once "dbh.inc.php";
    session_start();

    $food = $_GET['food'];
    $quantity = $_GET['quantity'];
    $customer_id = $_SESSION['customer_id'];
    $current_order = $_SESSION['current_order'];

    // Get the current order
    $query = "SELECT max(order_ID) FROM orders";
    $query_results = mysqli_query($conn, $query);
    if($row = mysqli_fetch_row($query_results)) {
        $_SESSION['current_order'] = $row[0];
    }

    // If no orders exist...
    if($_SESSION['current_order'] == 0){
        // Create a new order
        $query = "INSERT INTO orders VALUES (NULL, NOW(), 0, '$customer_id')";
        $query_results = mysqli_query($conn, $query);

        // Get that new order
        $query = "SELECT max(order_ID) FROM orders";
        $query_results = mysqli_query($conn, $query);
        if($row = mysqli_fetch_row($query_results)) {
            $_SESSION['current_order'] = $row[0];
            $current_order = $_SESSION['current_order'];
        }
    }

    // Check if the current order's total price is greater than 0,
    // if so it has already been submitted
    $query = "SELECT total_price FROM orders WHERE order_id = '$current_order'";
    $query_results = mysqli_query($conn, $query);
    if($row = mysqli_fetch_row($query_results)) {
        if($row[0] > 0) {
            // Create a new order
            $query = "INSERT INTO orders VALUES (NULL, NOW(), 0, '$customer_id')";
            $query_results = mysqli_query($conn, $query);

            // Get that new order
            $query = "SELECT max(order_ID) FROM orders";
            $query_results = mysqli_query($conn, $query);
            if($row = mysqli_fetch_row($query_results)) {
                $_SESSION['current_order'] = $row[0];
                $current_order = $_SESSION['current_order'];
            }
        }
    }

    echo("food: " . $food);
    echo("quantity: " . $quantity);
    echo("customer_id: " . $customer_id);

    $query = "INSERT INTO orders_has_food_item
    VALUES ('$current_order', '$customer_id', '$food', '$quantity')
    ON DUPLICATE KEY UPDATE quantity = quantity + '$quantity'";

    echo("query: " . $query);
    
    $query_results = mysqli_query($conn, $query);
?>