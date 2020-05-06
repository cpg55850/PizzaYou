<?php
    require_once('./header.php');
    require_once('models/User.php');

    $userModel = new User;

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        // Init data
        $data =[
          'email' => trim($_POST['email']),
          'pwd' => trim($_POST['pwd']),
          'email_err' => '',
          'pwd_err' => '',      
        ];

        // Validate Email
        if(empty($data['email'])){
          $data['email_err'] = 'Pleae enter email';
        }

        // Validate pwd
        if(empty($data['pwd'])){
          $data['pwd_err'] = 'Please enter pwd';
        }

        // Check for user/email
        if($userModel->findUserByEmail($data['email'])){
          // User found
        } else {
          // User not found
          $data['email_err'] = 'No user found';
        }

        // Make sure errors are empty
        if(empty($data['email_err']) && empty($data['pwd_err'])){
          // Validated
          // Check and set logged in user
          $loggedInUser = $userModel->login($data['email'], $data['pwd']);

          if($loggedInUser){
            // Create Session
            $_SESSION['user_id'] = $loggedInUser->customer_id;
            $_SESSION['user_email'] = $loggedInUser->email;
            $_SESSION['user_name'] = $loggedInUser->username;
            $_SESSION['user_type'] = $loggedInUser->user_type;
            header("Location: ./?login=success");
          } else {
            $data['pwd_err'] = 'pwd incorrect';

            header("Location: ./?login=pwderror");
          }
        } else {
          // Load view with errors
          header("Location: ./?login=error");
        }


      } else {
        // Init data
        $data =[    
          'email' => '',
          'pwd' => '',
          'email_err' => '',
          'pwd_err' => '',        
        ];
      }

?>

<div class="container">
    <h2>Log in form</h2>

    <form id="login_form" method="POST" action="">
        <p>
            <label for="email">E-mail:
                <input type="email" name="email" id="form_email" placeholder="Enter your email"
                    value="<?php if(isset($email)) echo $email; ?>">
            </label>
        </p>
        <span class="error-form" id="email-error"></span>
        <p>
            <label for="pwd">pwd:
                <input type="password" name="pwd" id="form_pwd" placeholder="Enter your pwd">
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
    require_once("footer.php");
?>