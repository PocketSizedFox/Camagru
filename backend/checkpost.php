<?php
session_start();
$username = $_SESSION['logged_user_id'];
$table = $username."posts";
$db = mysqli_connect("localhost:3306","username","password","Camagru");
$ret = mysqli_query($db,"SELECT id FROM $table");
$arr = mysqli_fetch_array($ret);
$id = (int)mysqli_num_rows($ret);
$id++;
echo "post-".$id."-".$username;
mysqli_close($db);
?>