<?php
session_start();
if (isset($_SESSION['logged_user_id']))
{
    
    if ($_GET['button'] == "camera"){
        echo "camera();";}
} else {
    echo "notlogged();";
}
?>
