<?php
session_start();
$user = $_GET['username'];
$db = mysqli_connect("localhost:3306","username","password","Camagru");
$ret = mysqli_query($db,"SELECT username FROM users WHERE username = '$user'");
$arr = mysqli_fetch_array($ret);
$users = (int)mysqli_num_rows($ret);
if (isset($user) && $users == 0) {
    echo "1";
} else {
    echo "0";
}
mysqli_close($db);
?>