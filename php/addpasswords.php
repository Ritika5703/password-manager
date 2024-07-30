<?php 

include "connection.php";
session_start();

// Check if user is logged in
if (!isset($_SESSION["username"])) {
  header("location:./index.html");
  exit; // Stop further execution
}

$user_id = $_SESSION["username"];

$account = $_POST["acc_name"];
$uname = $_POST["username"];
$password = $_POST["password"];
$url = $_POST["url"];
$description = $_POST["description"];

$sql="INSERT INTO `accounts` (`id`, `user_id`, `acc_name`, `username`, `password`, `url`, `description`) VALUES (NULL, '$user_id', '$account', '$uname', AES_ENCRYPT('$password',''), '$url', '$description');";

if (mysqli_query($conn,$sql)) {
    header("location:passwords.php");
} else {
    echo "Passwords Not Added";
}

mysqli_close($conn);

?>