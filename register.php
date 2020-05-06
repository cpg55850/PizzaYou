<?php
    include_once("header.php");
    require_once('models/User.php');

    $userModel = new User;

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
  
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Init data
        $data =[
          'uname' => trim($_POST['uname']),
          'email' => trim($_POST['email']),
          'pwd' => trim($_POST['pwd']),
          'pwd2' => trim($_POST['pwd2']),
          'user_type' => trim($_POST['user_type']),
          'uname_err' => '',
          'email_err' => '',
          'pwd_error' => '',
          'pwd2_error' => ''
        ];

        // Validate Email
        if(empty($data['email'])){
          $data['email_err'] = 'Pleae enter email';
        } else {
          // Check email
          if($userModel->findUserByEmail($data['email'])){
            $data['email_err'] = 'Email is already taken';
          }
        }

        // Validate Name
        if(empty($data['uname'])){
          $data['name_err'] = 'Pleae enter name';
        }

        // Validate pwd
        if(empty($data['pwd'])){
          $data['pwd_error'] = 'Pleae enter pwd';
        } elseif(strlen($data['pwd']) < 6){
          $data['pwd_error'] = 'pwd must be at least 6 characters';
        }

        // Validate Confirm pwd
        if(empty($data['confirm_pwd'])){
          $data['confirm_pwd_err'] = 'Pleae confirm pwd';
        } else {
          if($data['pwd'] != $data['confirm_pwd']){
            $data['confirm_pwd_err'] = 'pwds do not match';
          }
        }

        // Make sure errors are empty
        if(empty($data['email_err']) && empty($data['uname_err']) && empty($data['pwd_err']) && empty($data['pw2_err'])){
          // Validated
          
          // Hash pwd
          $data['pwd'] = sha1($data['pwd']);

          // Register User
          if($userModel->register($data)){
            header('Location: ./register.php?submit=success');
          } else {
            die('Something went wrong');
          }

        } else {
          // Load view with errors
          header('Location: ./register.php?submit=error');
        }

      } else {
        // Init data
        $data =[
            'uname' => '',
            'email' => '',
            'pwd' => '',
            'pwd2' => '',
            'user_type' => '',
            'uname_err' => '',
            'email_err' => '',
            'pwd_error' => '',
            'pwd2_error' => ''
        ];
      }
?>

<div class="container">
    <h2>Register form</h2>

    <form id="reg_form" action="" method="POST">
        <p>
            <label for="uname">Username:
                <input type="text" name="uname" id="form_uname" value="<?php echo $data['uname']; ?>">
            </label>
        </p>
        <span class="error-form" id="uname-error"><?php echo $data['uname-error']; ?></span>
        <p>
            <label for="email">E-mail:
                <input type="email" name="email" id="form_email" value="<?php echo $data['email']; ?>">
            </label>
        </p>
        <span class="error-form" id="email-error"><?php echo $data['email-error']; ?></span>
        <p>
            <label for="user_type">User Type:
                <select name="user_type" id="user_type">
                    <option value="1">Customer</option>
                    <option value="2">Manager</option>
                </select>
            </label>
        </p>
        <p>
            <label for="pwd">pwd:
                <input type="password" name="pwd" id="form_pwd" value="<?php echo $data['pwd']; ?>">
            </label>
        </p>
        <span class="error-form" id="pwd-error"><?php echo $data['pwd-error']; ?></span>
        <p>
            <label for="pwd2">Repeat pwd:
                <input type="password" name="pwd2" id="form_pwd2" value="<?php echo $data['pwd2']; ?>">
            </label>
        </p>
        <span class="error-form" id="pwd2-error"><?php echo $data['pwd2-error']; ?></span>
        <p>
            <input type="submit" name="submit"></input>
        </p>
    </form>
</div>


<script src="script.js"></script>

<?php
    include_once("footer.php");
?>