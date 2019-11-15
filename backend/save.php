<?php
$upload_di = "../database/posts/";
$uplaod_dir = "";
$img = $_POST['my_hidden'];
$img = str_replace('data:image/jpeg;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$data = base64_decode($img);
$file = $upload_dir."image_name.jpeg";
$success = file_put_contents($file, $data);
if (filesize($file) > 0) {
    echo "1";
} else {
    echo "0";
}
?>
