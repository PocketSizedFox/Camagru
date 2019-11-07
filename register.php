
<?php
session_start();
?>
<html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script src="js/registerjs.js">
</script>
    <head>
     <link rel="stylesheet" type="text/css" href="css/registerstyle.css">
        <title>
            Register
        </title>
    </head>
    <Header>
        <div class="headline">
            <div>
                <svg class="center1 camagrulogo" width="350" height="60%" viewBox="0 0 700 275" fill="#c2c2c2" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2 55.0743
                        C2 44.9649 4.27068 35.8962 8.81205 27.8682
                        C13.3534 19.741 19.5238 13.3979 27.3231 8.83871
                        C35.2211 4.27957 43.9583 2 53.5347 2
                        C64.7894 2 74.6125 4.72557 83.0042 10.1767
                        C91.3959 15.6279 97.5168 23.3586 101.367 33.3689
                        H85.2255
                        C82.3625 27.1248 78.216 22.3179 72.7861 18.9481
                        C67.4549 15.5783 61.0378 13.8934 53.5347 13.8934
                        C46.3277 13.8934 39.8612 15.5783 34.1351 18.9481
                        C28.409 22.3179 23.917 27.1248 20.6591 33.3689
                        C17.4012 39.5138 15.7722 46.7489 15.7722 55.0743
                        C15.7722 63.3006 17.4012 70.5358 20.6591 76.7798
                        C23.917 82.9247 28.409 87.6821 34.1351 91.0519
                        C39.8612 94.4217 46.3277 96.1066 53.5347 96.1066
                        C61.0378 96.1066 67.4549 94.4713 72.7861 91.2006
                        C78.216 87.8308 82.3625 83.0239 85.2255 76.7798
                        H101.367
                        C97.5168 86.691 91.3959 94.3721 83.0042 99.8233
                        C74.6125 105.175 64.7894 107.851 53.5347 107.851
                        C43.9583 107.851 35.2211 105.621 27.3231 101.161
                        C19.5238 96.6022 13.3534 90.3086 8.81205 82.2805
                        C4.27068 74.2525 2 65.1837 2 55.0743Z" stroke="#888888" stroke-width="4" />
                    <path d="M202 107
                        l-45 -104
                        h-13
                        l-45 104
                        h13
                        l18 -40
                        h41
                        l-3 -10
                        h-35
                        l16 -40
                        h3
                        L189 107Z"
                        stroke="#888888" stroke-width="4" />
			        <path d="M319 107
                        h-13
                        v-85
                        l-36 28
                        h-13
                        l-33 -28
                        v85
                        h-13
                        v-104
                        h13
                        l36 32
                        h7
                        l39 -32
                        h13z"
                        stroke="#888888" stroke-width="4" />
                    <path d="M430 107
                        l-45 -104
                        h-13
                        l-45 104
                        h13
                        l18 -40
                        h41
                        l-3 -10
                        h-35
                        l16 -40
                        h3
                        L417 107Z"
                        stroke="#888888" stroke-width="4" />
                    <path transform="translate(425,0)" d="M2 55.0743
                        C2 44.9649 4.27068 35.8962 8.81205 27.8682
                        C13.3534 19.741 19.5238 13.3979 27.3231 8.83871
                        C35.2211 4.27957 43.9583 2 53.5347 2
                        C64.7894 2 74.6125 4.72557 83.0042 10.1767
                        C91.3959 15.6279 97.5168 23.3586 101.367 33.3689
                        H85.2255
                        C82.3625 27.1248 78.216 22.3179 72.7861 18.9481
                        C67.4549 15.5783 61.0378 13.8934 53.5347 13.8934
                        C46.3277 13.8934 39.8612 15.5783 34.1351 18.9481
                        C28.409 22.3179 23.917 27.1248 20.6591 33.3689
                        C17.4012 39.5138 15.7722 46.7489 15.7722 55.0743
                        C15.7722 63.3006 17.4012 70.5358 20.6591 76.7798
                        C23.917 82.9247 28.409 87.6821 34.1351 91.0519
                        C39.8612 94.4217 46.3277 96.1066 53.5347 96.1066
                        C61.0378 96.1066 67.4549 94.4713 72.7861 91.2006
                        C78.216 87.8308 82.3625 83.0239 85.2255 76.7798
                        v-5
                        h-20
                        v-15
                        H101.367
                        v20
                        C97.5168 86.691 91.3959 94.3721 83.0042 99.8233
                        C74.6125 105.175 64.7894 107.851 53.5347 107.851
                        C43.9583 107.851 35.2211 105.621 27.3231 101.161
                        C19.5238 96.6022 13.3534 90.3086 8.81205 82.2805
                        C4.27068 74.2525 2 65.1837 2 55.0743Z"
                        stroke="#888888" stroke-width="4" />
                    <path transform="translate(-30,0)" d="M616.858 106.959
                        L592.276 64.5891
                        H575.986
                        V106.959
                        H562.51
                        V3.33801
                        H595.83
                        C603.629 3.33801 610.194 4.67602 615.526 7.35204
                        C620.955 10.0281 625.003 13.6456 627.669 18.2048
                        C630.334 22.7639 631.667 27.9673 631.667 33.8149
                        C631.667 40.9509 629.594 47.2445 625.447 52.6957
                        C621.4 58.1468 615.279 61.7644 607.085 63.5484
                        L633 106.959
                        H616.858Z
                        M575.986 53.7363
                        H595.83
                        C603.136 53.7363 608.615 51.9523 612.268 48.3843
                        C615.92 44.7172 617.747 39.8607 617.747 33.8149
                        C617.747 27.6699 615.92 22.9126 612.268 19.5428
                        C608.713 16.173 603.234 14.4881 595.83 14.4881
                        H575.986
                        V53.7363Z
                        " stroke="#888888" stroke-width="4" />
	                <path transform="translate(600,5)" d="M 10 0
                        L 10 70
                        Q 10 100 45 100
                        Q 85 100 85 70
                        L 85 0
                        L 72 0
                        L 72 70
                        Q 72 87 45 87
                        Q 23 87 23 70
                        L 23 0z
                        " stroke="#888888" stroke-width="4" />
                </svg>
            </div>
            <div class="wrap">
            <div class="search">
                <input type="text" class="searchTerm" placeholder="Search">
                    <button type="submit" class="searchButton">
                        <i class="fa fa-search"></i>
                    </button>
            </div>
            </div>
            <div class="icons">
                <?php if (isset($_SESSION['logged_user_id'])) {echo "<a href=\"profile.php\" class=\"headlineicon xxxlarge material-icons\">person</a>";}else{echo "<a href=\"register.php\" class=\"headlineicon xxxlarge material-icons\">person</a>";}?>
                <a href="homepage.php" class="headlineicon home xxxlarge fa fa-home"></a>
            </div>
        </div>
    </Header>
    <body style="background-color: #e6e6e6">
    <!-- Register form start -->
    <div class="wrap">
            <div id="register" class="registerpagestyle">
                <form action="backend/reguser.php" method="post">
                    <div class="container">
                        <br>
                    <h1 class="login_title">Register</h1>
                    <p class="t_text">Please fill in this form to create an account.</p>
                    <br>
                    <input class="registerform" type="text" placeholder="Enter Name" name="nameuser" maxlength="50" required>

                    <input type="text" placeholder="Enter Surname" name="usersurname" maxlength="50" required>

                    <input type="text" placeholder="Enter Username" name="userusername" maxlength="50" required>

                    <input type="text" placeholder="Enter Phone number" name="usernumber" maxlength="10" required>

                    <input type="text" placeholder="Enter Email" name="useremail" maxlength="50" required>

                    <input type="password" placeholder="Enter Password" name="userpass" maxlength="50" required>

                    <input type="password" placeholder="Repeat Password" name="userpass-repeat" maxlength="50" required>
                    <br>
                    <button type="submit" class="buttonstyle" name="userreg_user" value="reg">Register</button>
                    </div>
          
                    <div class="container signin">
                    <p class="t_text">Already have an account?</p>
                    <button class="buttonstyle" onclick="window.location.href='http://localhost:8080/Camagru/login.php'">Log In</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
