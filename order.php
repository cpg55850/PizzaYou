<?php
    include_once "./header.php";
?>

<div class="container">
    <h1>Order Pizza</h1>
    <div id="order-pizza-container">

        <!-- Pizza -->
        <section>
            <div id="order-pizza" class="order-box">
                <h2>Choose your pizza</h2>
                <form action="#" method="post">
                    <select name="pizza" id="pizza">
                        <?php
                    $query = "SELECT * FROM pizzas;";
                    $query_results = mysqli_query($conn, $query);
            
                    if($query_results) {
                        while($row = mysqli_fetch_array($query_results, MYSQLI_NUM)) {
                            echo '<option value="' . $row[1] . '">' . $row[1] . '</option>';
                        }
                    }
                ?>
                    </select>
                    <input type="submit" name="submit_pizza" value="Add to cart">
                    <h4 class="quantity-h4">Quantity</h4>
                    <select name="pizza_quantity" class="quantity-field">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>


                    <select name="crust" id="crust">
                        <?php
                    $query = "SELECT * FROM crust;";
                    $query_results = mysqli_query($conn, $query);
            
                    if($query_results) {
                        while($row = mysqli_fetch_array($query_results, MYSQLI_NUM)) {
                            echo '<option value="' . $row[1] . '">' . $row[1] . '</option>';
                        }
                    }
                ?>
                    </select>

                    <select name="sauce" id="sauce">
                        <?php
                    $query = "SELECT * FROM sauce;";
                    $query_results = mysqli_query($conn, $query);
            
                    if($query_results) {
                        while($row = mysqli_fetch_array($query_results, MYSQLI_NUM)) {
                            echo '<option value="' . $row[1] . '">' . $row[1] . '</option>';
                        }
                    }
                ?>
                    </select>

                    <select name="toppings" id="toppings">
                        <?php
                    $query = "SELECT * FROM toppings;";
                    $query_results = mysqli_query($conn, $query);
            
                    if($query_results) {
                        while($row = mysqli_fetch_array($query_results, MYSQLI_NUM)) {
                            echo '<option value="' . $row[1] . '">' . $row[1] . '</option>';
                        }
                    }
                ?>
                    </select>
                </form>
            </div>
    </div>
    </section>

    <div id="output">
        <?php

                if(isset($_POST['submit_pizza'])){
                    $pizza_selected = $_POST['pizza'];  // Storing Selected Value In Variable
                    $quantity_selected = $_POST['pizza_quantity'];
                    $crust_selected = $_POST['crust'];
                    $sauce_selected = $_POST['sauce'];
                    $toppings_selected = $_POST['toppings'];

                    echo("Quantity: " . $quantity_selected . "<br>");
                
                    $query_crust = "SELECT * FROM crust WHERE name = '$crust_selected'";
                    $query_results = mysqli_query($conn, $query_crust);

                    if($crust = mysqli_fetch_assoc($query_results)) {                    
                        $crustId = $crust['crust_id'];
                    }

                    echo("crustId: " . $crustId . "<br>");

                    $query_pizza = "SELECT * FROM pizzas WHERE name = '$pizza_selected'";
                    $query_results = mysqli_query($conn, $query_pizza);

                    if($pizza = mysqli_fetch_assoc($query_results)) {                    
                        $pizzaId = $pizza['pizza_id'];
                    }

                    echo("pizzaId: " . $pizzaId . "<br>");

                    $query_sauce = "SELECT * FROM sauce WHERE name = '$sauce_selected'";
                    $query_results = mysqli_query($conn, $query_sauce);

                    if($sauce = mysqli_fetch_assoc($query_results)) {                    
                        $sauceId = $sauce['sauce_id'];
                    }

                    echo("sauceId: " . $sauceId . "<br>");

                    $query_toppings = "SELECT * FROM toppings WHERE name = '$toppings_selected'";
                    $query_results = mysqli_query($conn, $query_toppings);

                    if($toppings = mysqli_fetch_assoc($query_results)) {                    
                        $toppingId = $toppings['topping_id'];
                    }

                    echo("toppingId: " . $toppingId . "<br>");

                    $customerId = $_SESSION['customer_id'];

                    $query = "INSERT INTO orders_has_pizzas
                    VALUES ('1', '$customerId', '$quantity_selected', '$pizzaId', '$crustId', '$sauceId', '$toppingId')
                    ON DUPLICATE KEY UPDATE quantity = quantity+'$quantity_selected'";
                    $query_results = mysqli_query($conn, $query);
    
                    echo "<h2>Added to your cart: " . $quantity_selected . " " . $pizzaId . "</h2><br>";  // 
    
                    echo $query;

                }
            ?>
    </div>

    <div id="output">
        <?php

            if(isset($_POST['submit_drink'])){
                $selected_val = $_POST['drink'];  // Storing Selected Value In Variable
                $quantity_selected = $_POST['drink_quantity'];

            
                $query_drinks = "SELECT * FROM drinks WHERE name = '$selected_val'";
                $query_results = mysqli_query($conn, $query_drinks);

                if($row = mysqli_fetch_assoc($query_results)) {                    
                    $rowDrinkId = $row['drink_id'];

                    $query = "
                    INSERT INTO drinks_has_orders
                    VALUES ('" . 
                    $row['drink_id'] . 
                    "', '1', '" . 
                    $_SESSION['customer_id'] . 
                    "', '" .
                    $quantity_selected . "') ON DUPLICATE KEY UPDATE quantity = " . 
                    $quantity_selected;
                    $query_results = mysqli_query($conn, $query);
    
                    echo "<h2>Added to your cart: " . $quantity_selected . " " . $selected_val . "</h2><br>";  // 
    
                    echo $query;
                }
            }
        ?>
    </div>


    <!-- Wings -->
    <section>
        <div id="order-wings" class="order-box">
            <h2>Choose your wings</h2>
            <form action="#" method="post">
                <select name="wings" id="wings">
                    <?php
                    $query = "SELECT * FROM wings;";
                    $query_results = mysqli_query($conn, $query);
            
                    if($query_results) {
                        while($row = mysqli_fetch_array($query_results, MYSQLI_NUM)) {
                            echo '<option value="' . $row[1] . '">' . $row[1] . '</option>';
                        }
                    }
                ?>
                </select>
                <input type="submit" name="submit_wings" value="Add to cart">
                <h4 class="quantity-h4">Quantity</h4>
                <select name="wings_quantity" class="quantity-field">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </form>
        </div>

        <div id="output">
            <?php
            if(isset($_POST['submit_wings'])){
            $selected_val = $_POST['wings'];  // Storing Selected Value In Variable
            echo $selected_val  . " has been added to you cart.";  // Displaying Selected Value
            }
        ?>
        </div>
    </section>

    <hr>

    <!-- Drinks -->
    <section>
        <div id="order-drinks" class="order-box">
            <h2>Choose your drink</h2>
            <form action="#" method="post" id="drink">
                <select name="drink">
                    <?php
                    $query = "SELECT * FROM drinks;";
                    $query_results = mysqli_query($conn, $query);
            
                    if($query_results) {
                        while($row = mysqli_fetch_array($query_results, MYSQLI_NUM)) {
                            echo '<option value="' . $row[1] . '">' . $row[1] . '</option>';
                        }
                    }
                ?>
                </select>
                <input type="submit" name="submit_drink" value="Add to cart">
                <h4 class="quantity-h4">Quantity</h4>
                <select name="drink_quantity" class="quantity-field">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </form>
        </div>

        <div id="output">
            <?php

                if(isset($_POST['submit_drink'])){
                    $selected_val = $_POST['drink'];  // Storing Selected Value In Variable
                    $quantity_selected = $_POST['drink_quantity'];

                
                    $query_drinks = "SELECT * FROM drinks WHERE name = '$selected_val'";
                    $query_results = mysqli_query($conn, $query_drinks);

                    if($row = mysqli_fetch_assoc($query_results)) {                    
                        $rowDrinkId = $row['drink_id'];

                        $query = "
                        INSERT INTO drinks_has_orders
                        VALUES ('" . 
                        $row['drink_id'] . 
                        "', '1', '" . 
                        $_SESSION['customer_id'] . 
                        "', '" .
                        $quantity_selected . "') ON DUPLICATE KEY UPDATE quantity = quantity + " . 
                        $quantity_selected;
                        $query_results = mysqli_query($conn, $query);
        
                        echo "<h2>Added to your cart: " . $quantity_selected . " " . $selected_val . "</h2><br>";  // 
        
                        echo $query;
                    }
                }
            ?>
        </div>
    </section>



</div>

<?php
    include_once "./footer.php";
?>