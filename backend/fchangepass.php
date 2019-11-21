<?php
session_start();
$db = mysqli_connect("localhost:3306","username","password","Camagru");
$email = $_SESSION['email'];
$ret = mysqli_query($db,"SELECT username FROM users WHERE email = '$email'");
$arr = mysqli_fetch_array($ret);
$username = $arr['username'];
$pw = $_POST["userpass"];
$rpw = $_POST["repeatpass"];
$hpw = hash("sha1",$pw);
if ($pw == $rpw)
{
    $db = mysqli_connect("localhost:3306","username","password","Camagru");
    $ret = mysqli_query($db,"UPDATE users SET password='$hpw' WHERE username = '$username'");
    mysqli_close($db);
    echo "<script>alert(\"Success password has been changed!\"); window.location.href = \"../homepage.php\";</script>";
} else {
    echo "<script>alert(\"passwords don't match\"); window.location.href = \"../homepage.php\";</script>";
}
?>