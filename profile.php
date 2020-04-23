<?php
    include_once "./header.php";
?>

<div class="container">

</div>

<script>
$(document).ready(function() {
    $.get('includes/profile.inc.php', function(data, status) {
        $('.container').html(data);
    })
})
</script>

<?php
    include_once "./footer.php";
?>