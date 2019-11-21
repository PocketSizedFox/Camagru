<?php
session_start();
$hash = md5( rand(0,1000));
$db = mysqli_connect("localhost:3306","username","password","Camagru");
$email = $_GET['email'];
$_SESSION['email'] = $email;
mysqli_query($db,"UPDATE users SET chpass='$hash' WHERE email = '$email'");
$ret = mysqli_query($db,"SELECT username FROM users WHERE email = '$email'");
if ($ret > 0)
{
    $arr = mysqli_fetch_array($ret);
    $to = $email;
    $username = $arr['username'];
    $subject = 'Change Password'; 
    $message = '
    
    Hi '.$username.' a request to change your password has been submitted if this was not you just ignore this email.
    
    Please click this link to change your password:
    http://localhost:80/Camagru/fchangepassword.php?email='.$email.'&hash='.$hash.'
    
    ';

    $headers = 'From:noreply@klees.ldu-pree.camagru.com' . "\r\n". 'To:' . $to . "\r\n";
    if (mail($to, $subject, $message, $headers))
    {
        echo "success";
    } else 
        echo "failed";
    mysqli_query($db,"INSERT INTO emails (recipient,email,header,type) VALUES ('$username','$to','$headers','chpass')");
}
mysqli_close($db);
?>