<?php
    include_once "./includes/dbh.inc.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- FONTS -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">

    <!-- FAVICONS -->
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
    <link rel="manifest" href="img/favicon/site.webmanifest">

    <!-- FONTAWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    <title>Pizza You</title>
    <link rel="stylesheet" href="style.css">
</head>

<header>

    <nav id="main-nav">
        <a href="index.php">
            <div id="logo">
                <img src="img/tri_logo.png" alt="">
                <a href="index.php">Pizza You</a>
            </div>
        </a>


        <ul id="sub-nav">
            <li>

                <?php 
            session_start();
                if(isset($_SESSION['username'])) { 
                    echo("WELCOME, " . $_SESSION['username']); 
                    echo '<li>
                            <a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
                          </li>
                    ';
                } else {
                    echo("Not set?");
                }
            ?>
            </li>
            <li>
                <a href="menu.php">Menu</a>
            </li>
            <li>
                <a href="order.php">Order</a>
            </li>
            <li>
                <a href="deals.php">Deals</a>
            </li>
            <li>
                <a href="wings.php">Wings</a>
            </li>
            <li id="signin">
                <a href="login.php">Sign In</a>
            </li>
        </ul>
    </nav>

</header>