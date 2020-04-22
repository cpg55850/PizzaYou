<?php

$host = "localhost";
$username = "root";
$password = "root";
$dbname = "pizza";
$port = 3306;

$conn = mysqli_connect($host.':'.$port, $username, $password, $dbname);

if(!$conn){
	die("Connection failed: ".mysli_connect_error());
}