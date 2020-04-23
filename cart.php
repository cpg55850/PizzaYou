<?php
    include_once "./header.php";
?>

<div class="container">
    <div id="output_orders"></div>
</div>

<script>
$(document).ready(function() {
    $.get("./includes/cart.inc.php", function(data, status) {
        $("#output_orders").html(data);
    })
})
</script>

<?php
    include_once "./footer.php";
?>