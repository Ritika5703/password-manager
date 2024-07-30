<?php 
include "connection.php";

$id=$_POST["id"];
$account = $_POST["acc_name"];
$username = $_POST["username"];
$password = $_POST["password"];
$url = $_POST["url"];
$description = $_POST["description"];


$sql = "UPDATE `accounts` SET `acc_name` = '$account', `username` = '$username', `password` = '$password', `url` = '$url', `description` = '$description'  WHERE `accounts`.`id` = $id;";

if (mysqli_query($conn,$sql)) {
    header("location:passwords.php");
} else {
    echo "Something went wrong";
}

mysqli_close($conn);
?>