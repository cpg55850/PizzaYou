<?php
    include_once "./header.php";
?>

<div class="container">
    <?php
        $id = $_GET['id'];
    
        $query = "select * from orders where customer_customer_id = '$id' and total_price > 0";
        $query_results = mysqli_query($conn, $query);
    
        while($row = mysqli_fetch_row($query_results)) {
            echo('<b>Order Details</b>' . '<br>');
            echo('Placed on: ' . $row[1] . '<br>');
            echo('$' . $row[2] . '<br><br>');
        }
    ?>
</div>

<?php
    include_once "./footer.php";
?>