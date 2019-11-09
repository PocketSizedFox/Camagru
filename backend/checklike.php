<?php
session_start();
$post = $_GET['postname'];
$user = $_SESSION['logged_user_id'];
$db = mysqli_connect("localhost:3306","username","password","Camagru");
$ret = mysqli_query($db,"SELECT user FROM `$post` WHERE comments = ''");
$i = 0;
while(($ret2 = mysqli_fetch_array($ret))){
	if ($ret2['user'] == $user){
	    mysqli_close($db);
	    print("isliked");
		$i = 1;
	}
}
if ($i == 0){
	print("notliked");
}
?>