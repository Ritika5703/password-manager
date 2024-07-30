<?php 

session_start();


include "connection.php";


$uname = $_POST["username"];
$pass = $_POST["password"];

$sql = "SELECT * FROM `users` WHERE `username` = '$uname' AND `password` = '$pass'";
$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result)>0) {
    $_SESSION["username"] = $uname;
    header("location:passwords.php");
} else {
    echo "Invalid credentials <a href='../index.html'>Try Again</a>";
}



mysqli_close($conn);
?>