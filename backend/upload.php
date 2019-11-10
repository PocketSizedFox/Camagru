<?php
include "./users.php";
session_start();
if (!isset($_SESSION['logged_user_id'])){
    header('location: ../homepage.php');
}
$db = mysqli_connect("localhost:3306","username","password","Camagru");
$username = $_SESSION['logged_user_id'];
echo "(".$username.")";
echo "{".$_POST['fileToUpload']."}";
$tablename = $username."posts";
$ret = mysqli_query($db,"SELECT id FROM `$tablename`");
$postid = (mysqli_num_rows($ret)+1);
$postname = "post-".$postid."-".$username.".".strtolower(pathinfo(basename($_FILES["fileToUpload"]["name"]),PATHINFO_EXTENSION));
$target_dir = "../database/posts/";
$target_file = $target_dir.$postname;
echo $target_file."<br";
$uploadOk = 1;
$imageFileType = strtolower(pathinfo(basename($_FILES["fileToUpload"]["name"]),PATHINFO_EXTENSION));

if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

if($imageFileType != "jpg" && $imageFileType != "jpeg") {
    echo "Sorry, only JPG & JPEG files are allowed.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";

} else {
    echo $_FILES["fileToUpload"]["tmp_name"];
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        postadd($username,$postname);
        //header('location: ../homepage.php');
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
mysqli_close($db);
?>