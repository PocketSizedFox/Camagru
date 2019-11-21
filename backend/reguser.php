<?php
    session_start();
    include "./users.php";
    echo "1<br>";
    if ($_POST['userpass'] !== $_POST['userpass-repeat']) {
        echo "<script>alert(\"passwords don't match\"); window.location.href = \"../register.php\";</script>";
        echo "2<br>";
        return ;
    }
    user_add($_POST['userusername'],$_POST['nameuser'],"database/avatars/default.jpg",$_POST['usersurname'],$_POST['usernumber'],$_POST['useremail'],hash("sha1",$_POST['userpass']),"No","Yes");
    echo "3<br>";
    echo "<script>alert(\"Succesfully registered\"); window.location.href = \"../login.php\";</script>";
?>