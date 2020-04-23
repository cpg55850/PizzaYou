<?php
    include_once "./header.php";
?>

<div class="container">
    <h2>Shopping Cart</h2>
    <?php
    $totalCosts = 0;
    
    $query = "
    SELECT
        food_item.name, food_item.price, orders_has_food_item.quantity
    FROM
        food_item
    INNER JOIN
        orders_has_food_item
    ON
        food_item.idfood_item = orders_has_food_item.food_item_idfood_item
    ";
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
            $totalCosts += $row['price'] * $row['quantity'];
        }
    }

    echo("</table>");

    echo("<h3>TOTAL: $" . $totalCosts);
    ?>
</div>

<?php
    include_once "./footer.php";
?>