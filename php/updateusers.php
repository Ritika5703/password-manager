<?php 
include "connection.php";

$id=$_POST["id"];
$name=$_POST["name"];
$email=$_POST["email"];
$uname=$_POST["username"];
$pass=$_POST["password"];

$sql = "UPDATE `users` SET `name` = '$name', `email` = '$email', `username` = '$uname', `password` = '$pass' WHERE `users`.`user_id` = $id;";

if (mysqli_query($conn,$sql)) {
    header("location:passwords.php");
} else {
    echo "Something went wrong";
}

mysqli_close($conn);
?>