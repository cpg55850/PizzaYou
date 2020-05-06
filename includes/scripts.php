<!-- JQUERY -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>

<!-- AOS -->
<script src='https://unpkg.com/aos@next/dist/aos.js'></script>
<script>
AOS.init({
    offset: 400, // offset (in px) from the original trigger point
    delay: 0, // values from 0 to 3000, with step 50ms
    duration: 1000 // values from 0 to 3000, with step 50ms
});
</script>

<!-- CUSTOM SCRIPTS -->
<script src="./script.js"></script>
<script>
$(window).resize(function() {
    var width = $(window).width();
    if (width > 750) {
        $("#mobileMenu").hide();
    }
})
$(document).ready(function() {


    $("#menuBtn").click(function() {
        $("#mobileMenu").slideToggle();
    })
})
</script>