<?php

session_start();

if(isset($_POST['submit'])){
	include 'dbh.inc.php';
	
	$email = $_POST['email'];
    $pwd = $_POST['pwd'];
    
	//Error handlers
	//Check if inputs are empty
	if(empty($email) || empty($pwd)){
			header("Location: ../login.php?login=empty");
			exit();
		} else {
			$sql = "SELECT * FROM customer WHERE email = '$email'";
			$result = mysqli_query($conn, $sql);
			$resultCheck = mysqli_num_rows($result);
			if($resultCheck < 1){
				header("Location: ../login.php?login=empty");
				exit();
			} else {
				if($row = mysqli_fetch_assoc($result)){
					//De-hashing the password
					$enteredPwdHashed = sha1($pwd);
					if($enteredPwdHashed != $row['password']){
						header("Location: ../login.php?login=error");
						exit();
					} elseif($enteredPwdHashed == $row['password']){
						//Log in the user here
						$_SESSION['customer_id'] = $row['customer_id'];
						$_SESSION['username'] = $row['username'];
						$_SESSION['email'] = $row['email'];
						$_SESSION['password'] = $row['password'];
						header("Location: ../index.php?login=success");
						exit();
					}
				}
			}
		}
	} else {
		header("Location: ../index.php?login=error");
		exit();
	}