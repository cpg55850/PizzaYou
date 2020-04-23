<?php
    include_once "dbh.inc.php";
    session_start();

    $_SESSION['totalPrice'] = 0;

    $query = "SELECT max(order_ID) FROM orders";
    $query_results = mysqli_query($conn, $query);
    if($row = mysqli_fetch_row($query_results)) {
        $current_order = $row[0];
    }

    $customer_id = $_SESSION['customer_id'];

    $query = "SELECT *
    FROM orders
    WHERE order_id = '$current_order'
    AND customer_customer_id = '$customer_id'";
    $query_results = mysqli_query($conn, $query);
    if($row = mysqli_fetch_row($query_results)) {
        $query = "
    SELECT
        food_item.name, food_item.price, orders_has_food_item.quantity
    FROM
        food_item
    INNER JOIN
        orders_has_food_item
    ON
        food_item.idfood_item = orders_has_food_item.food_item_idfood_item
    AND
        orders_has_food_item.orders_order_id = " . $current_order;
    $query_results = mysqli_query($conn, $query);

    echo("<table class='cart-table'>");
    if($query_results) {
        while($row = mysqli_fetch_assoc($query_results)) {
            if($row['quantity'] > 0) { echo '
            <tr>
                <td><b>
                    ' . $row['name'] . '
                </b></td>
                <td>
                    ' . $row['price'] . '
                </td>
                <td> Quantity:
                ' . $row['quantity'] . '
                </td>
                <td> Price:
                $' . $row['price'] * $row['quantity']. '
                </td>     
            </tr>
        ';
            }
            $_SESSION['totalPrice'] += $row['price'] * $row['quantity'];
        }
    }

    echo("</table>");
    }
    
    

    echo("<h3>TOTAL: $" . $_SESSION['totalPrice']);

    if($_SESSION['totalPrice'] > 0) {
        echo '<input type="submit" value="Place Order" id="submitorder">';
    }
    ?>

<script>
$("#submitorder").click(function() {
    $.get("./includes/submit_order.inc.php")
    $("#output_orders").html("<h1>Your order has been placed.</h1>");
});
</script>