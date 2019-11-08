<?php
session_start();
$post = $_GET['postname'];
$opt = $_GET['opt'];
$username = substr($post, 7);
$table = $username."posts";
$img = "database/posts/".$post.".jpg";
$db = mysqli_connect("localhost:3306","username","password","Camagru");
$ret = mysqli_query($db,"SELECT likes FROM `$table` WHERE `image` = '$img'");
$arr = mysqli_fetch_array($ret);
if (isset($_SESSION['logged_user_id']))
{
	if (mysqli_num_rows($ret) > 0 && $opt == "add"){
	    $likes = (int)$arr['likes'];
		$likes = $likes + (int)1;
	    echo "$likes";
		mysqli_query($db,"UPDATE `$table` SET likes='$likes' WHERE `image`='$img'");
	    mysqli_close($db);
	} else if (mysqli_num_rows($ret) > 0 && $opt == "less"){
	    $likes = (int)$arr['likes'];
		$likes = $likes - (int)1;
	    echo "$likes";
		mysqli_query($db,"UPDATE `$table` SET likes='$likes' WHERE `image`='$img'");
	    mysqli_close($db);
	}
} else {
	$likes = (int)$arr['likes'];
	echo "$likes";
}
?>