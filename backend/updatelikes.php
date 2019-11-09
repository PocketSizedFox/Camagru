<?php
session_start();
$post = $_GET['postname'];
$opt = $_GET['opt'];
$username = substr($post, 7);
$table = $username."posts";
$user = $_SESSION['logged_user_id'];
$img = "database/posts/".$post.".jpg";
$db = mysqli_connect("localhost:3306","username","password","Camagru");
$ret = mysqli_query($db,"SELECT likes, user FROM `$post` WHERE comments = ''");
$arr = mysqli_fetch_array($ret);
if (isset($_SESSION['logged_user_id']))
{
	if ($opt == "add"){
	    $likes = (int)mysqli_num_rows($ret);
		$likes = $likes + (int)1;
	    echo "$likes";
		mysqli_query($db,"INSERT INTO `$post` (user,comments,likes) VALUES ('$user','','1')");
		mysqli_query($db,"update `$table` SET likes='$likes' WHERE image='$img'");
	    mysqli_close($db);
	} else if ($opt == "less"){
	    $likes = (int)mysqli_num_rows($ret);
		$likes = $likes - (int)1;
	    echo "$likes";
		mysqli_query($db,"delete from `$post` WHERE user='$user' AND comments=''");
		mysqli_query($db,"update `$table` SET likes='$likes' WHERE image='$img'");
	    mysqli_close($db);
	}
} else {
	$likes = (int)mysqli_num_rows($ret);
	echo "$likes";
}
?>