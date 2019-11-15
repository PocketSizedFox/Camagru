<?php
$email = $_GET['email'];
if (isset($email) &&  preg_match('/[^@]+@[^\.]+\..+/',$email)) {
    echo "1";
} else {
    echo "0";
}
?>