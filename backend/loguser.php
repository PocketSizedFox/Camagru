<?php
    session_start();
    include "./users.php";
    echo "test<br>";
    if (isset($_SESSION['logged_user_id'])) {
        header('location: ../homepage.php');
        echo "1<br>";
    }
    if (isset($_POST["userlogin"])) {
        $pw = $_POST["userpass"];
        $usr = $_POST["userusername"];
        $db = mysqli_connect("localhost:3306","username","password","camagru");
        $ret = mysqli_query($db,"SELECT `password`, verified FROM users WHERE username='$usr'");
        $arr = mysqli_fetch_array($ret);
		$_SESSION['verified'] = $arr['verified'];
		if (mysqli_num_rows($ret) == 1)
		{
			if (isset($_SESSION['verified']) && $_SESSION['verified'] != "Yes")
			{
				echo "<script>alert(\"Please Verify Your Account First\"); window.location.href = \"../homepage.php\";</script>";
			} else {
				echo $arr['password']."<br>";
				echo "2<br>{".$pw."}<br>".$usr."<br>";
				print_r($_SESSION);
				echo session_id();
				echo "<br>".hash("sha1", $pw)."<br>";
				if (user_pass($usr, hash("sha1", $pw))) {
				    echo "password<br>";
				}
				if (is_registered($usr)) {
				    echo "registered<br>";
				}
				if (is_registered($usr) && user_pass($usr, hash("sha1", $pw))) {
				    $_SESSION['logged_user_id'] = $usr;
				    echo "3<br>";
				    //header('location: ../homepage.php');
				} else {
				    echo "<br>false4<br>";
				}
				print_r($_SESSION);
			}
		} else {
			echo "user does not exist";
		}
    }
?>