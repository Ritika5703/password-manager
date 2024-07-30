<?php 
include "connection.php";

$id = $_GET["id"];

$sql = "DELETE FROM accounts WHERE `accounts`.`id` = $id";

if (mysqli_query($conn,$sql)) {
    header("location:passwords.php");
} else {
    echo "Something went wrong";
}

mysqli_close($conn);
?>