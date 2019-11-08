<?php
session_start();
$post = $_GET['postname'];
$username = substr($post, 7);
$table = $username."posts";
$img = "database/posts/".$post.".jpg";
$db = mysqli_connect("localhost:3306","username","password","Camagru");
$ret = mysqli_query($db,"SELECT likes FROM `$table` WHERE `image` = '$img'");
$arr = mysqli_fetch_array($ret);
if (mysqli_num_rows($ret) > 0){
    $likes = $arr['likes'];
    echo "$likes";
    mysqli_close($db);
}
?>