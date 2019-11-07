<?php

    function valid_number($nb) {
        return (preg_match('/\d\d\d\d\d\d\d\d\d\d/', $nb));
    }

    function pass_match ($pass, $cmp_pass) {
        if (!isset($pass) or !isset($cmp_pass))
            return false;
        return ($pass === $cmp_pass);
    }

    function valid_email ($email) {
        return ($email and preg_match('/[^@]+@[^\.]+\..+/',$email));
    }

    
?>