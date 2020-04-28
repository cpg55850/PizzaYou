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

    <!-- JQUERY -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>

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
                if(isset($_SESSION['u_name'])) { 
                    echo("<a href='profile.php?id=" . $_SESSION['customer_id'] . "'>WELCOME, " . $_SESSION['u_name'] . "</a>"); 
                    echo '<li>
                            <a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
                          </li>
                          <li class="dropdown">
                            <a>Order</a>
                            <div class="dropdown-content">
                            <a href="pizzas.php">Pizza</a>
                            <a href="drinks.php">Drinks</a>
                            <a href="order.php">Wings</a>
                            </div>
                            </li>

                        ';
                } else {
                    echo("Not logged in.");
                }
                
            ?>
            </li>

            <li id="signin">
                <a href="login.php">Sign In</a>
            </li>
        </ul>
    </nav>

</header>

<body>