<?php
session_start();
$username = $_GET['username'];
echo $username."<br>";
$db = mysqli_connect("localhost:3306","username","password","camagru");
echo $db."<br>";
$ret = mysqli_query($db,"SELECT avatar FROM users WHERE `username` = '$username'");
echo $ret."<br>";
if (mysqli_num_rows($ret) > 0){
    $avatar = $arr['avatar'];
    echo "$avatar";
    mysqli_close($db);
}
?>