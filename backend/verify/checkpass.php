<?php
$pass = $_GET['pass'];
$reppass = $_GET['reppass'];
$string = $pass;
if (!isset($pass) or !isset($reppass)) {
    echo "0";
}
if ($pass == $reppass && preg_match('/[A-Z]/', $string) && strlen($string) >= 6) {
    echo "1";
} else {
    echo "0";
}
?>