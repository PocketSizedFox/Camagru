<?php
include "backend/users.php";
$host = "localhost:3306";
$s01 = new mysqli($host,"username","password");

mysqli_query($s01,"DROP DATABASE Camagru");
mysqli_query($s01,"CREATE DATABASE Camagru");
echo "created the database...\n";

$db = mysqli_connect($host,"username","password","Camagru");
if ($db){
	echo "connected to the database...\n";
} else {
	echo "could not connect to the database...\n";}
//user table
$username = "username TEXT(50)";
$name = "name TEXT(50)";
$avatar = "avatar TEXT(50)";
$surname = "surname TEXT(50)";
$number = "contact TEXT(10)";
$email = "email TEXT(50)";
$password = "password TEXT(50000)";
$verified = "verified TEXT(3)";
$notify = "notify TEXT(3)";
$hash = "hash TEXT(35)";
$hash1 = "chpass TEXT(35)";
mysqli_query($db,"CREATE TABLE users ($username,$name,$avatar,$surname,$number,$email,$password,$verified,$notify,$hash,$hash1)");
//email log table
$recipient = "recipient TEXT(1000)";
$email = "email TEXT(1000)";
$header = "header TEXT(1000)";
$type = "type TEXT(50)";
mysqli_query($db,"CREATE TABLE emails ($recipient,$email,$header,$type)");
//defaults
user_add("ldu-pree","Liam","database/avatars/ldu-pree.jpg","Du Preez","0123456789","hello.dieliam@gmail.com",hash("sha1","l"),"No","Yes");
user_add("klees","Kaelin","database/avatars/klees.jpg","Lees","0123456789","k",hash("sha1","k"),"Yes","Yes");
user_add("l","l","database/avatars/default.jpg","l","0123456789","l",hash("sha1","l"),"Yes","Yes");
user_add("m","m","database/avatars/default.jpg","m","0123456789","m",hash("sha1","m"),"Yes","No");
user_add("n","n","database/avatars/default.jpg","n","0123456789","hello.dieliam@gmail.com",hash("sha1","n"),"Yes","Yes");
//user table created

//add posts
postadd("ldu-pree","post-1-ldu-pree.jpg");
postadd("ldu-pree","post-2-ldu-pree.jpg");
postadd("ldu-pree","post-3-ldu-pree.jpg");
postadd("klees","post-1-klees.jpg");
postadd("klees","post-2-klees.jpg");
$ret = mysqli_query($db,"SELECT * FROM emails");
if (mysqli_num_rows($ret) > 0){
    echo "table called \"emails\" created...<br>";
}else {
	echo "error creating table called \"emails\"...<br>";
}
$ret = mysqli_query($db,"SELECT username FROM users");
if (mysqli_num_rows($ret) > 0){
    echo "table called \"users\" created...<br>";
}else {
	echo "error creating table called \"users\"...<br>";
}
echo "\nRemember to change line 1070 in php.ini to: (sendmail_from = noreply@klees&ldu-pree.camagru.com)\n";
echo "emember to change line 1074 in php.ini to: (sendmail_path = \"/usr/sbin/sendmail -t -i\")\n";
echo "Remember to change line 1086 in php.ini to: (mail.log = /homes/ldu-pree/Desktop/mamp/apache2/htdocs/emaillogs)\n";
mysqli_close($db);
mysqli_close($s01);
?>