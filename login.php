<?php
    include_once("header.php");
?>

<div class="container">
    <h2>Log in form</h2>

    <form id="login_form" action="includes/login.inc.php" method="POST">
        <p>
            <label for="email">E-mail:
                <input type="email" name="email" id="form_email" placeholder="Enter your email">
            </label>
        </p>
        <span class="error-form" id="email-error"></span>
        <p>
            <label for="pwd">Password:
                <input type="password" name="pwd" id="form_pwd" placeholder="Enter your password">
            </label>
        </p>
        <span class="error-form" id="pwd-error"></span>
        <p>
            <input type="submit" name="submit"></input>
        </p>
    </form>

    <br>

    <p><a href="register.php">Register</a></p>
    <p><a href="logout.php">Logout</a></p>

</div>

<script src="script.js"></script>

<?php
    include_once("footer.php");
?>