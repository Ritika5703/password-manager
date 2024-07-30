<?php 

$host = "localhost";
$username = "root";
$password = "";
$db = "password_manager";

$conn = mysqli_connect($host,$username,$password,$db);

if (!$conn) {
    echo mysqli_connect_error();
}


?>