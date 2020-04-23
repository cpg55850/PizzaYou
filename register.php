<?php
    include_once("header.php");

    if(isset($_POST['submit'])){
        include_once 'includes/dbh.inc.php';
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $uname = mysqli_real_escape_string($conn, $_POST['uname']);
        $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
        
        //Error handlers
        //Check for empty fields
        if(empty($email) || empty($uname) || empty($pwd)){
            echo("empty");
        } else {
            //Check if email is valid
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                echo("email invalid");
            } else {
                $sql = "SELECT * FROM customer WHERE username='$uname'";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                
                if($resultCheck > 0){
                    echo("user is taken");
                } else {
                    //Hashing the password
                    $hashedPwd = sha1($pwd);
                    //Insert the user into the database
                    $sql = "INSERT INTO customer (username, email, password) VALUES ('$uname', '$email', '$hashedPwd');";
                    mysqli_query($conn, $sql);    

                    echo("Success!");
                }
            }
        }
    } 
?>

<div class="container">
    <h2>Register form</h2>

    <form id="reg_form" action="" method="POST">
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