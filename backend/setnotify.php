<?php
session_start();
$username = $_SESSION['logged_user_id'];
$value = $_GET['value'];
$db = mysqli_connect("localhost:3306","username","password","Camagru");
mysqli_query($db,"UPDATE users SET notify='$value' WHERE username='$username'");
mysqli_close($db);
?>