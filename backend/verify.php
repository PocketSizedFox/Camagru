<?php
mysql_connect("localhost:3306", "username", "password");
mysql_select_db("Camagru");
             
if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
    // Verify data
    $email = mysql_escape_string($_GET['email']); // Set email variable
    $hash = mysql_escape_string($_GET['hash']); // Set hash variable
                 
    $search = mysql_query("SELECT email, hash FROM users WHERE email='".$email."' AND hash='".$hash."'") or die(mysql_error()); 
    $match  = mysql_num_rows($search);
                 
    if($match > 0){
        // We have a match, activate the account
        mysql_query("UPDATE users SET verified='1' WHERE email='".$email."' AND hash='".$hash."'") or die(mysql_error());
        echo 'Your account has been activated, you can now login';
    }else{
        // No match -> invalid url or account has already been activated.
        echo 'The url is either invalid or you already have activated your account.';
    }
                 
}else{
    // Invalid approach
    echo 'Invalid approach, please use the link that has been send to your email.';
}
?>