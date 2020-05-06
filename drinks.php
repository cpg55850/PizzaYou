<?php
    require_once('header.php');
    require_once('models/Food.php');

    // Instantiate Food
    $food = new Food();

    // Get Food
    $drinks = $food->getDrinks();
?>

<div class="container">
    <h1 style="text-align: center">Order Drink</h1>
    <div id="order-container">
        <?php foreach($drinks as $d): ?>
        <section>
            <div class="order-box">
                <form class="drink-form" method="get" action="./includes/order.inc.php">
                    <h2 class="text-center"><?php echo $d->name; ?></h2>
                    <div id="foodimg-container">
                        <img class="foodimg" src="img/<?php echo $d->image_url ?>">
                    </div>
                    <h4 class="quantity-h4">Quantity:</h4>
                    <select name="quantity" class="drink-quantity-selection">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                    <input type="hidden" name="food" value="<?php echo $d->idfood_item ?>">
                    <input type="submit" value="Order Now" id="submitbutton">
                </form>
            </div>
        </section>
        <?php endforeach; ?>
    </div>
</div>

<?php
    require_once('footer.php');
?>