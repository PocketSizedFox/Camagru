<?php
function posts($username) {
    $db = mysqli_connect("localhost:3306","username","password","Camagru");
    $ret = mysqli_query($db,"SELECT username FROM users");
    if (mysqli_num_rows($ret) > 0){
    while (($arr = mysqli_fetch_array($ret))){
        $username = $arr['username'];
        $id = "id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY";
        $likes = "likes INT(255)";
        $image = "image TEXT(30)";
        $date = "date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP";
        $name = $username."posts";
        mysqli_query($db,"CREATE TABLE `$name` ($id,$likes,$image,$date)");
    }
    mysqli_close($db);
    }
}
function postings() {
    $db = mysqli_connect("localhost:3306","username","password","Camagru");
    $ret = mysqli_query($db,"SELECT username, avatar FROM users");
    if (mysqli_num_rows($ret) > 0){
    while (($arr = mysqli_fetch_array($ret))){
        $username = $arr['username'];
        $avatar = $arr['avatar'];
        $tablename = $username."posts";
        $ret1 = mysqli_query($db,"SELECT id FROM `$tablename`");
        if (mysqli_num_rows($ret1) > 0){
            while (($arr1 = mysqli_fetch_array($ret1))){
                $id = $arr1['id'];
                echo "<script>addpost(\"$username\", $id, \"$avatar\");</script>\n";
                postcomment($username, $id);
            }
        }
    }
    mysqli_close($db);
    }
}
//function commentings($post) {
//    $db = mysqli_connect("localhost:3306","username","password","Camagru");
//    $ret = mysqli_query($db,"SELECT user, comments FROM `$post`");
//    if (mysqli_num_rows($ret) > 0){
//    while (($arr = mysqli_fetch_array($ret))){
//        $username = $arr['user'];
//        $comment = $arr['comments'];
//        echo "+\"fillcommentsection(\\\"$username\\\", \\\"$comment\\\");\"";
//    }
//    mysqli_close($db);
//    }
//}
function addcomment() {
    $db = mysqli_connect("localhost:3306","username","password","Camagru");
    mysqli_close($db);

}
function postcomment($username, $post_id) {
    $db = mysqli_connect("localhost:3306","username","password","Camagru");
    $user = "user TEXT(3000)";
    $comments = "comments TEXT(3000)";
    $name = "post-".$post_id."-".$username;
    mysqli_query($db,"CREATE TABLE `$name` ($user, $comments)");
    mysqli_close($db);
}
function postadd($username,$image) {
    $db = mysqli_connect("localhost:3306","username","password","Camagru");
    $part1 = "(likes,image)";
    $path = "database/posts/".$image;
    $part2 = "('0','$path')";
    $table = $username."posts";
    mysqli_query($db,"INSERT INTO `$table` $part1 VALUES $part2");
    
    mysqli_close($db);
}
function user_add($username,$name,$avatar,$surname,$number,$email,$password,$verified,$notify){
    if (($db = mysqli_connect("localhost:3306","username","password","Camagru")))
    $part1 = "(username,name,avatar,surname,contact,email,password,verified,notify)";
    $part2 = "('$username','$name','$avatar','$surname','$number','$email','$password','$verified','$notify')";
    mysqli_query($db,"INSERT INTO users $part1 VALUES $part2");
    posts($username);
    mysqli_close($db);
}
function user_del($username){
    $db = mysqli_connect("localhost:3306","username","password","Camagru");
    mysqli_query($db,"DELETE FROM users WHERE username = '$username'");
    mysqli_close($db);
}
function user_edit($username,$target,$value){
    $db = mysqli_connect("localhost:3306","username","password","Camagru");
    mysqli_query($db,"UPDATE users SET $target='$value' WHERE username='$username'");
    mysqli_close($db);
}
function get_val($username,$value){
    $db = mysqli_connect("localhost:3306","username","password","Camagru");
    $ret = mysqli_query($db,"SELECT $value FROM users WHERE username='$username'");
    $ret2 = mysqli_fetch_array($ret);
    echo $ret2[$value];
    mysqli_close($db);
}
function is_registered($username){
    $db = mysqli_connect("localhost:3306","username","password","Camagru");
    $ret = mysqli_query($db,"SELECT username FROM users");
    while(($ret2 = mysqli_fetch_array($ret))){
        if ($ret2['username'] == $username){
            mysqli_close($db);
            return(1);
        }
    }
    mysqli_close($db);
    return(0);
}
function user_pass($usernem,$hashed_pass){
    $db = mysqli_connect("localhost:3306","username","password","camagru");
    $ret = mysqli_query($db,"SELECT `password` FROM users WHERE username='$usernem'");
    $arr = mysqli_fetch_array($ret);
    if ($arr['password'] == $hashed_pass){
        mysqli_close($db);
        return (1);
    }
    mysqli_close($db);
    return (0);
}
?>
