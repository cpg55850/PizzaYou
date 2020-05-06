<?php
    session_start();
    require_once('config/db.php');
    require_once('lib/pdo_db.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php require_once('includes/links.php'); ?>

    <title>Pizza You</title>
</head>

<header>
    <nav id="main-nav">
        <div id="logoContainer">
            <a href="index.php">
                <div id="logo">
                    <img src="img/tri_logo.png" alt="">
                    <a id="logoText" href="index.php">Pizza You</a>
                </div>
            </a>
        </div>

        <ul id="sub-nav">
            <li id="menuBtn"><i class="fas fa-bars"></i></li>
            <div id="desktopMenu">
                <?php if(isset($_SESSION['user_id'])) : ?>
                <li>
                    <a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
                </li>
                <li class="dropdown">
                    <a>Order</a>
                    <div class="dropdown-content">
                        <a href="pizzas.php">Pizza</a>
                        <a href="drinks.php">Drinks</a>
                    </div>
                </li>
                <div id="signin">
                    <a href="login.php">Sign In</a>
                </div>

                <?php else : ?>
                <div id="signin">
                    <a href="login.php">Sign In</a>
                </div>
                <?php endif; ?>

                <?php 
                if(isset($_SESSION['user_type'])){
                    if ($_SESSION['user_type'] == 2){
                    echo '<li><a href="data.php">Data</a></li>';
                    echo '<li><a href="manage.php">Manage</a></li>';
                    }
                }
                ?>
            </div>
        </ul>
    </nav>

    <nav id="mobileMenu">
        <ul>
            <li>
                <a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
            </li>
            <li><a href="pizzas.php">Pizza</a></li>
            <li><a href="drinks.php">Drinks</a></li>
            <?php
                if(isset($_SESSION['user_type'])){ 
                    if ($_SESSION['user_type'] == 2){
                        echo '<li><a href="data.php">Data</a></li>';
                        echo '<li><a href="manage.php">Manage</a></li>';
                    }

                }
            ?>
            <li><a href="login.php">Sign In</a></li>

        </ul>
    </nav>

</header>

<body>