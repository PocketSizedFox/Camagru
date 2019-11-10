<?php
session_start();
$username = $_SESSION['logged_user_id'];
$hash = md5( rand(0,1000));
$db = mysqli_connect("localhost:3306","username","password","Camagru");
mysqli_query($db,"UPDATE users SET chpass='$hash' WHERE username = '$username'");
$ret = mysqli_query($db,"SELECT email FROM users WHERE username = '$username'");
$arr = mysqli_fetch_array($ret);
$email = $arr['email'];
$to      = $email;
$subject = 'Change Password'; 
$message = '
 
Hi '.$username.' a request to change your password has been submitted if this was not you just ignore this email.
 
Please click this link to change your password:
http://localhost:80/Camagru/changepassword.php?email='.$email.'&hash='.$hash.'
 
';
                     
$headers = 'From:noreply@klees.ldu-pree.camagru.com' . "\r\n". 'To:' . $to . "\r\n";
if (mail($to, $subject, $message, $headers))
{
    echo "success";
} else 
    echo "failed";
mysqli_query($db,"INSERT INTO emails (recipient,email,header,type) VALUES ('$username','$to','$headers','chpass')");
mysqli_close($db);
?>