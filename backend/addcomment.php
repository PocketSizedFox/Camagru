<?php
session_start();
include "./backend/users.php";
mysqli_connect("localhost:3306", "username", "password");
if (isset($_SESSION['logged_user_id'])){
    $db = mysqli_connect("localhost:3306","username","password","Camagru");
    $table = $_COOKIE['postname'];
    $part1 = "(user,comments)";
    $comment = $_GET['comment'];
    $user = $_SESSION['logged_user_id'];
	$owner = substr($table, 7);
    $part2 = "('$user','$comment')";
	echo $owner;
	if ($comment != ""){
		mysqli_query($db,"INSERT INTO `$table` $part1 VALUES $part2");
		$ret = mysqli_query($db,"SELECT email, notify FROM users WHERE username='$owner'");
		$arr = mysqli_fetch_array($ret);
		$email = $arr['email'];
		$notify = $arr['notify'];
		if (mysqli_num_rows($ret) > 0){
			if ($notify == "Yes")
			{
				$to      = $email;
				$subject = 'New Comment'; 
				$message = '

				Hi '.$owner.' you are recieving this email because you opted (Yes) to recieve comment notifications.
				'.$user.' commented:
				'.$comment.'
				Thank you for your support if you require any further assistance please contact us at support@klees&ldu-pree.camagru.com';
				$headers = 'From:notify@klees&ldu-pree.camagru.com' . "\r\n";
				mail($to, $subject, $message, $headers);
				mysqli_query($db,"INSERT INTO emails (recipient,email,header,type) VALUES ('$owner','$to','$headers','addcomment')");
			}
		}
		header('location: ../homepage.php');
		mysqli_close($db);
	}
} else {
    header('location: ../login.php');
}
?>