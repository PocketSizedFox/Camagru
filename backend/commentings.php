<?php
session_start();
$post = $_GET['postname'];
$db = mysqli_connect("localhost:3306","username","password","Camagru");
$ret = mysqli_query($db,"SELECT user, comments FROM `$post`");
if (mysqli_num_rows($ret) > 0){
    while (($arr = mysqli_fetch_array($ret))){
        $username = $arr['user'];
        $comment = $arr['comments'];
        echo "fillcommentsection(\"$username\", \"$comment\");";
    }
    mysqli_close($db);
}
?>