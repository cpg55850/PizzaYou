<?php
    include_once "./header.php";
?>

<div class="container">
    <?php
        $id = $_GET['id'];
    
        $query = "select * from PIZZA_YOU_orders where customer_customer_id = '$id' and total_price > 0";
        $query_results = mysqli_query($conn, $query);
    
        while($row = mysqli_fetch_assoc($query_results)) {
            echo('<b>Order Details</b>' . '<br>');
            echo('Placed on: ' . $row['order_date'] . '<br>');
            echo('$' . $row['total_price'] . '<br><br>');
        }
    ?>
</div>

<?php
    include_once "./footer.php";
?>