<?php
    session_start();
    include "./users.php";
    if (isset($_SESSION['logged_user_id'])) {
            session_unset();
			header('location: ../homepage.php');
    }
?>