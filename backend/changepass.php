<?php
session_start();
$username = $_SESSION['logged_user_id'];
$pw = $_POST["userpass"];
$rpw = $_POST["repeatpass"];
$hpw = hash("sha1",$pw);
if ($pw == $rpw)
{
    $db = mysqli_connect("localhost:3306","username","password","Camagru");
    $ret = mysqli_query($db,"UPDATE users SET password='$hpw' WHERE username = '$username'");
    mysqli_close($db);
    echo "<script>alert(\"Success password has been changed!\"); window.location.href = \"homepage.php\";</script>";
} else {
    echo "<script>alert(\"passwords don't match\"); window.location.href = \"homepage.php\";</script>";
}
?>