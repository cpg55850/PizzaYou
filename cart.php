<?php
    include_once "./header.php";
?>

<div class="container">
    <h2>Shopping Cart</h2>
    <?php
        // DRINKS
        
        $query = "
        SELECT
            drinks.name AS 'drink',
            customer.username AS 'customer',
            drinks_has_orders.quantity AS 'quantity',
            drinks.price AS 'price'
        FROM
            customer, drinks, drinks_has_orders
        WHERE
            customer.customer_id = drinks_has_orders.customer_customer_id
        AND
            drinks_has_orders.drinks_drink_id = drinks.drink_id
        ";
        $query_results = mysqli_query($conn, $query);

        $totalCosts = 0;

        echo("<table class='cart-table'>");
        if($query_results) {
            echo("<h4>Drinks</h4>");
            while($row = mysqli_fetch_assoc($query_results)) {
                if($row['quantity'] > 0) { echo '
                <tr>
                    <td><b>
                        ' . $row['drink'] . '
                    </b></td>
                    <td>
                        ' . $row['customer'] . '
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

        // PIZZAS
        
        $query = "
        SELECT
            pizzas.name AS 'pizza',
            customer.username AS 'customer',
            orders_has_pizzas.quantity AS 'quantity',
            toppings.name AS 'toppings',
            sauce.name AS 'sauce',
            crust.name AS 'crust',
            pizzas.price AS 'price'
        FROM
            customer, pizzas, orders_has_pizzas, toppings, sauce, crust
        WHERE
            customer.customer_id = orders_has_pizzas.customer_customer_id
        AND
            orders_has_pizzas.pizzas_pizza_id = pizzas.pizza_id
        AND
            toppings.topping_id = orders_has_pizzas.toppings_topping_id
        AND
            sauce.sauce_id = orders_has_pizzas.sauce_sauce_id
        AND
            crust.crust_id = orders_has_pizzas.crust_crust_id
        ";
        $query_results = mysqli_query($conn, $query);

        echo("<table class='cart-table'>");
        if($query_results) {
            echo("<h4>Pizzas</h4>");
            while($row = mysqli_fetch_assoc($query_results)) {
                if($row['quantity'] > 0) { echo '
                <tr>
                    <td><b>
                        ' . $row['pizza'] . '
                    </b></td>
                    <td>
                        ' . $row['customer'] . '
                    </td>
                    <td> Quantity:
                    ' . $row['quantity'] . '
                    </td>
                    <td> Price:
                    $' . $row['price'] * $row['quantity']. '
                    </td>    
                </tr><tr><td> <b>Toppings:</b>
                    ' . $row['toppings'] . '
                    </td>
                    <td> <b>Sauce:</b>
                    ' . $row['sauce'] . '
                    </td>
                    <td> <b>Crust:</b>
                    ' . $row['crust'] . '
                    </td>
                </tr>
            ';
                }
                $totalCosts += $row['price'] * $row['quantity'];
            }
        }

        echo("</table>");

        // WINGS
        

        $query = "
        SELECT
            wings.name AS 'wing',
            customer.username AS 'customer',
            wings_has_orders.quantity AS 'quantity',
            wings.price AS 'price'
        FROM
            wings, wings_has_orders, customer
        WHERE
            customer.customer_id = wings_has_orders.customer_customer_id
        AND
            wings_has_orders.wings_wing_id = wings.wing_id
        ";
        $query_results = mysqli_query($conn, $query);

        echo("<table class='cart-table'>");
        if($query_results) {
            echo("<h4>Wings</h4>");
            while($row = mysqli_fetch_assoc($query_results)) {
                if($row['quantity'] > 0) { echo '
                <tr>
                    <td><b>
                        ' . $row['wing'] . '
                    </b></td>
                    <td>
                        ' . $row['customer'] . '
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