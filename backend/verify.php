<?php
session_start();
mysqli_connect("localhost:3306", "username", "password");
$db = mysqli_connect("localhost:3306","username","password","Camagru");
echo "test";
if(isset($_GET['email']) && isset($_GET['hash']))
{
    $email = $_GET['email'];
    $hash = $_GET['hash'];
    $ret = mysqli_query($db,"SELECT email, hash, verified FROM users WHERE email='$email' AND `hash`='$hash'");
    $match  = mysqli_num_rows($ret);
    $arr = mysqli_fetch_array($ret);
    if ($match > 0 && $arr['verified'] == "No"){
        mysqli_query($db,"UPDATE users SET verified='Yes' WHERE email='$email' AND hash='$hash'");
        echo "Your account has been activated, you can now login";
    } else {
        echo "The url is invalid.".$arr['verified']."|".$arr['email']."|".$arr['hash']."|".$email."|".$hash."/";
    }
}else{
    echo "Invalid approach, please use the link that has been send to your email.";
}
mysqli_close($db);
?>