<?php
session_start();
$username = $_SESSION['logged_user_id'];
$db = mysqli_connect("localhost:3306","username","password","Camagru");
$ret = mysqli_query($db,"SELECT notify FROM users WHERE username='$username'");
$arr = mysqli_fetch_array($ret);
echo $arr['notify'];
mysqli_close($db);
?>