<?php
    include_once "./header.php";
?>

<div class="container">
    <h1>Order Pizza</h1>
    <div id="order-pizza-container">

        <section>
            <div class="order-box">
                <h2>Choose your Pizza</h2>
                <form class="pizza-form">
                    <select class="pizza-food-selection">
                        <?php
                        $query = "SELECT name, idfood_item FROM food_item WHERE category = 'Pizza'";
                        $query_results = mysqli_query($conn, $query);

                        if($query_results) {
                            while($row = mysqli_fetch_assoc($query_results)) {
                                echo '<option value="' . $row['idfood_item'] . '">' . $row['name'] . '</option>';
                            }
                        }
                        ?>
                    </select>
                    <input type="submit" value="Submit me" id="submitbutton">
                    <h4 class="quantity-h4">Quantity</h4>
                    <select class="pizza-quantity-selection">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </form>
            </div>
        </section>

        <section>
            <div class="order-box">
                <h2>Choose your drink</h2>
                <form class="drink-form">
                    <select class="drink-food-selection">
                        <?php
                        $query = "SELECT name, idfood_item FROM food_item WHERE category = 'Drink'";
                        $query_results = mysqli_query($conn, $query);

                        if($query_results) {
                            while($row = mysqli_fetch_assoc($query_results)) {
                                echo '<option value="' . $row['idfood_item'] . '">' . $row['name'] . '</option>';
                            }
                        }
                        ?>
                    </select>
                    <input type="submit" value="Submit me" id="submitbutton">
                    <h4 class="quantity-h4">Quantity</h4>
                    <select class="drink-quantity-selection">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </form>
            </div>
        </section>

        <div id="output"></div>


    </div>
</div>
<script>
$(".drink-form").submit(function(e) {
    e.preventDefault();
    $.get("./includes/order.inc.php", {
        drink: $(".drink-food-selection option:selected").val(),
        quantity: $(".drink-quantity-selection option:selected").text()
    }, function(data, status) {
        $("#output").text(data);
    });
});

$(".pizza-form").submit(function(e) {
    e.preventDefault();
    $.get("./includes/order.inc.php", {
        drink: $(".pizza-food-selection option:selected").val(),
        quantity: $(".pizza-quantity-selection option:selected").text()
    }, function(data, status) {
        $("#output").text(data);
    });
});
</script>

<?php
    include_once "./footer.php";
?>