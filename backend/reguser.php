<?php
    session_start();
    include "./users.php";
    if (isset($_POST['userreg_user'])) {
        echo "1<br>";
        if ($_POST['userpass'] !== $_POST['userpass-repeat']) {
            echo "<script>alert('Passwords don't match');</script>";
            header('location: ../register.php');
            echo "2<br>";
            return ;
        }
        user_add($_POST['userusername'],$_POST['nameuser'],"database/avatars/default.jpg",$_POST['usersurname'],$_POST['usernumber'],$_POST['useremail'],hash("sha1",$_POST['userpass']),"no");
        echo "3<br>";
        header('location: ../login.php');
    }
?>