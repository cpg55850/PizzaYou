<?php

if(isset($_POST['submit'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $pwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);

    $str=implode("",file('../users.txt'));

    if(empty($fname) || empty($lname) || empty($uname) || empty($email) || empty($pwd)) {
        header("Location: ../register.php?register=empty");
        exit();
    } else if(strpos($str, $fname) !== false) {
        header("Location: ../register.php?register=usertaken");
        exit();
    } else {
        header("Location: ../register.php?register=success");
        $users = fopen("../users.txt", "a+");
        $user = $fname . ";" . $lname . ";" . $uname . ";" . $email . ";" . $pwd . "\n";
        fwrite($users, $user);
        exit();
    }
} else {
    header("Location: ../register.php");
    exit();
}

?>