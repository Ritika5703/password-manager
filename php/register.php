<?php 


include "connection.php";

$name = $_POST["name"];
$email = $_POST["email"];
$uname = $_POST["username"];
$pass = $_POST["password"];


$sql = "INSERT INTO `users` (`user_id`, `name`, `email`, `username`, `password`) 
        VALUES (NULL, '$name', '$email', '$uname', '$pass');";


if (mysqli_query($conn,$sql)) {
    header("location:../index.html");
} else {
    echo "failed" . mysqli_error($conn);
}

mysqli_close($conn);




?>



