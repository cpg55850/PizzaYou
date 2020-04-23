<?php
    include_once "./header.php";
?>

<div class="container">
    <div id="output_orders"></div>

    <input type="submit" value="Place Order" id="submitorder">
</div>

<script>
$(document).ready(function() {
    $.get("./includes/cart.inc.php", function(data, status) {
        $("#output_orders").html(data);
    })

    $("#submitorder").click(function() {
        $.get("./includes/submit_order.inc.php")
        $("#output_orders").html("<h1>Your order has been placed.</h1>");
    });

})
</script>

<?php
    include_once "./footer.php";
?>