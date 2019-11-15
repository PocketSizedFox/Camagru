<?php
$nb = $_GET['phone'];
if (isset($nb) && preg_match('/\d\d\d\d\d\d\d\d\d\d/', $nb)) {
    echo "1";
} else {
    echo "0";
}
?>