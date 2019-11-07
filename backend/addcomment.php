<?php
session_start();
include "./backend/users.php";
if (isset($_SESSION['logged_user_id'])){
    $db = mysqli_connect("localhost:3306","username","password","Camagru");
    $table = $_COOKIE['postname'];
    $part1 = "(user,comments)";
    $comment = $_GET['comment'];
    $user = $_SESSION['logged_user_id'];
    $part2 = "('$user','$comment')";
    mysqli_query($db,"INSERT INTO `$table` $part1 VALUES $part2");
    header('location: ../homepage.php');
    mysqli_close($db);
} else {
    header('location: ../login.php');
}
?>