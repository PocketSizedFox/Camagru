<?php
session_start();
include "./backend/users.php";
if (isset($_SESSION['logged_user_id'])){
    $db = mysqli_connect("localhost:3306","username","password","Camagru");
    $table = $_COOKIE['postname'];
    $part1 = "(user,comments)";
    $comment = $_GET['comment'];
    $user = $_SESSION['logged_user_id'];
	$owner = substr($table, 7);
    $part2 = "('$user','$comment')";
	echo $owner;
	if ($comment){
		mysqli_query($db,"INSERT INTO `$table` $part1 VALUES $part2");
		$ret = mysqli_query($db,"SELECT email, notify FROM users WHERE `username` = '$owner'");
		if (mysqli_num_rows($ret) > 0){
			if (arr['notify'] == "Yes")
				mail(arr['email'],"$user commented on your post", "Hi $owner you are recieving this email because you opted \"Yes\" to be notfied when someone comments on your post\n$user commented:\n$comment\nIf you need any support feel free to contact us at ldu-pree@student.wethinkcode.co.za");
		}
		header('location: ../homepage.php');
		mysqli_close($db);
	}
} else {
    header('location: ../login.php');
}
?>