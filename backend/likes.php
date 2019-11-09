<?php
session_start();
$post = $_GET['postname'];
$username = substr($post, 7);
$table = $username."posts";
$img = "database/posts/".$post.".jpg";
$db = mysqli_connect("localhost:3306","username","password","Camagru");
$ret = mysqli_query($db,"SELECT likes FROM `$post` WHERE `comments` = ''");
$arr = mysqli_fetch_array($ret);
$likes = (int)mysqli_num_rows($ret);
echo "$likes";
mysqli_close($db);
?>