<?php 
    include_once "dbh.inc.php";
    session_start();

    $drink = $_GET['drink'];
    $quantity = $_GET['quantity'];
    $customer_id = $_SESSION['customer_id'];

    echo("drink: " . $drink);
    echo("quantity: " . $quantity);
    echo("customer_id: " . $customer_id);

    $query = "INSERT INTO orders_has_food_item
    VALUES ('1', '$customer_id', '$drink', '$quantity')
    ON DUPLICATE KEY UPDATE quantity = quantity + '$quantity'";

    echo("query: " . $query);
    
    $query_results = mysqli_query($conn, $query);
?>