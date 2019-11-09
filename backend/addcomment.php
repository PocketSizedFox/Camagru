<?php
/*$sender = 'test@test.com';
$recipient = 'hello.dielaim@gmail.com';

$subject = "php mail test";
$message = "php test message";
$headers = 'From:' . $sender;

if (mail($recipient, $subject, $message, $headers))
{
    echo "Message accepted";
}
else
{
    echo "Error: Message not accepted";
}
*/
session_start();
error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");
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
		echo "<br>email to: ".$email;
		$notify = $arr['notify'];
		echo "<br>notify: ".$notify;
		if (mysqli_num_rows($ret) > 0){
			echo "<br>".mysqli_num_rows($ret);
			if ($notify == "Yes")
			{
				$to      = $email;
				echo "<br>to: ".$to;
				$subject = 'New Comment';
				echo "<br>subject: ".$subject;
				$message = '

				Hi '.$owner.' you are recieving this email because you opted (Yes) to recieve comment notifications.
				'.$user.' commented:
				'.$comment.'
				Thank you for your support if you require any further assistance please contact us at support@klees.ldu-pree.camagru.com';
		                     
				$headers = 'From:noreply@klees&ldu-pree.camagru.com' . "\r\n". 'To:' . $to . "\r\n";
				if (mail($to, $subject, $message, $headers))
				{
				    echo "Message accepted";
				}
				else
				{
				    echo "Error: Message not accepted";
				}
				mysqli_query($db,"INSERT INTO emails (recipient,email,header,type) VALUES ('$owner','$to','$headers','verify')");
			}
		}
		//header('location: ../homepage.php');
		mysqli_close($db);
	}
} else {
    header('location: ../login.php');
}
?>