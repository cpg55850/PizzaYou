<?php
    include_once("header.php");
?>

<div class="container">
    <h2>Register form</h2>

    <form id="reg_form" action="includes/register.inc.php" method="POST">
        <p>
            <label for="fname">First Name:
                <input type="text" name="fname" id="form_fname" placeholder="Enter your first name">
            </label>
        </p>
        <span class="error-form" id="fname-error"></span>
        <p>
            <label for="lname">Last Name:
                <input type="text" name="lname" id="form_lname" placeholder="Enter your last name">
            </label>
        </p>
        <span class="error-form" id="lname-error"></span>
        <p>
            <label for="uname">Username:
                <input type="text" name="uname" id="form_uname" placeholder="Enter your username">
            </label>
        </p>
        <span class="error-form" id="uname-error"></span>
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
            <label for="pwd2">Repeat Password:
                <input type="password" name="pwd2" id="form_pwd2" placeholder="Enter your password">
            </label>
        </p>
        <span class="error-form" id="pwd2-error"></span>
        <p>
            <input type="submit" name="submit"></input>
        </p>
    </form>
</div>


<script src="script.js"></script>

<?php
    include_once("footer.php");
?>