<?php
session_start();
$post = $_GET['postname'];
$username = $_GET['username'];
$table = $username."posts";
$img = "database/posts/".$post;
$db = mysqli_connect("localhost:3306","username","password","Camagru");
$ret = mysqli_query($db,"SELECT likes FROM `$table` WHERE `image` = '$img'");
if (mysqli_num_rows($ret) > 0){
    $likes = $arr['likes'];
    echo "$likes";
    echo "0";
    mysqli_close($db);
}
?>