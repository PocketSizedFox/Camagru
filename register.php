
<?php
session_start();
$name = $surname = $username = $phone = $email = $password = $reppassword = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["nameuser"]);
  $surname = test_input($_POST["usersurname"]);
  $username = test_input($_POST["userusername"]);
  $phone = test_input($_POST["usernumber"]);
  $email = test_input($_POST["useremail"]);
  $password = test_input($_POST["password"]);
  $reppassword = test_input($_POST["reppassword"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
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
    <header>
    <div class="headline">
    <div class="camagrulogo">
                <svg class="center1 camagrulogo" width="350" height="60%" viewBox="0 0 700 275" fill="#c2c2c2" xmlns="http://www.w3.org/2000/svg">
                    <path d="M47.706 3.099 C 11.379 13.580,-11.702 80.738,14.855 98.687 C 19.632 101.916,33.410 102.524,39.484 99.773 C 43.766 97.834,54.067 90.218,54.724 88.505 C 55.666 86.052,57.584 87.103,58.205 90.411 C 59.927 99.593,69.689 99.245,79.549 89.650 L 84.327 85.001 85.310 87.684 C 85.851 89.160,86.466 90.861,86.677 91.466 C 88.475 96.606,98.441 95.779,106.289 89.839 L 111.100 86.198 110.497 89.414 C 109.954 92.306,110.140 92.724,112.346 93.563 C 115.928 94.925,116.460 94.760,117.499 91.972 C 127.859 64.166,154.601 45.810,145.902 72.477 C 139.577 91.865,139.414 93.578,143.897 93.578 C 146.042 93.578,146.808 92.994,147.797 90.607 C 149.649 86.136,161.392 68.640,164.122 66.286 C 169.665 61.504,172.717 64.954,170.657 73.673 C 165.879 93.895,173.591 101.766,186.965 90.318 L 190.819 87.019 191.740 89.441 C 192.246 90.773,192.661 92.255,192.661 92.734 C 192.661 94.062,198.349 97.240,200.734 97.244 C 204.028 97.250,208.292 94.712,213.494 89.650 L 218.272 85.001 219.255 87.684 C 219.796 89.160,220.411 90.861,220.622 91.466 C 222.825 97.764,234.617 95.418,243.778 86.859 C 246.518 84.299,246.775 84.227,247.355 85.858 C 250.735 95.363,262.514 93.493,271.646 82.002 C 274.287 78.678,275.850 79.090,274.407 82.729 C 273.941 83.903,272.894 87.133,272.079 89.908 C 270.115 96.599,270.108 96.608,263.761 100.032 C 247.745 108.675,240.788 119.562,248.184 124.409 C 255.179 128.992,264.202 121.874,272.351 105.345 C 276.727 96.469,277.370 95.648,282.548 92.330 C 288.743 88.360,296.231 80.637,298.380 76.002 C 301.919 68.371,304.426 62.567,305.600 59.288 C 307.303 54.535,308.916 54.129,312.070 57.659 C 315.421 61.410,315.356 63.247,311.468 74.568 C 307.803 85.239,307.508 88.759,310.051 91.488 C 314.887 96.679,325.894 94.245,333.429 86.320 C 336.858 82.713,337.239 82.758,338.577 86.927 C 341.754 96.823,350.671 97.475,357.516 88.311 C 360.290 84.597,362.353 82.259,362.438 82.733 C 362.467 82.895,362.679 84.849,362.908 87.076 C 363.854 96.235,371.966 97.805,382.148 90.800 C 388.849 86.189,398.122 72.477,394.538 72.477 C 394.058 72.477,392.976 73.927,392.136 75.698 C 390.050 80.094,381.437 88.672,377.428 90.348 C 368.679 94.003,367.744 86.501,374.774 69.065 C 378.174 60.635,378.003 58.716,373.855 58.716 C 372.175 58.716,370.972 60.302,367.421 67.202 C 357.351 86.770,350.397 93.601,346.382 87.869 C 343.646 83.962,345.478 73.004,350.587 62.724 C 352.921 58.026,352.577 55.587,349.533 55.257 C 346.148 54.890,341.602 63.269,339.059 74.564 C 337.319 82.289,320.635 93.433,317.764 88.788 C 316.888 87.370,317.177 82.677,318.287 80.275 C 324.864 66.049,324.462 62.393,315.399 54.027 C 309.928 48.976,309.843 48.823,310.864 45.894 C 312.695 40.641,309.693 39.443,306.375 44.103 
            C 304.861 46.230,304.497 47.713,304.893 50.152 C 306.415 59.535,290.822 86.596,281.949 89.970 C 278.701 91.205,278.703 91.230,281.359 83.466 C 285.230 72.152,287.913 60.244,286.887 58.924 C 284.974 56.463,278.899 60.576,278.899 64.332 C 278.899 69.677,269.008 82.793,262.731 85.772 C 251.942 90.892,252.428 74.293,263.427 62.004 C 269.342 55.395,274.101 52.973,280.423 53.355 C 286.087 53.698,287.402 52.671,284.726 49.995 C 276.725 41.994,252.031 58.454,247.222 74.994 C 244.671 83.770,234.719 92.309,229.704 90.024 C 226.515 88.571,226.849 83.937,230.734 75.750 C 234.445 67.930,234.535 67.353,232.237 66.123 C 230.190 65.027,228.980 65.890,225.252 71.101 C 207.982 95.244,194.508 99.536,201.970 78.518 C 209.533 57.216,231.193 42.515,231.193 58.683 C 231.193 62.794,232.194 63.813,234.843 62.395 C 237.696 60.869,237.382 55.063,234.279 51.960 C 224.636 42.317,204.223 55.214,192.713 78.219 C 184.330 94.975,173.035 95.144,177.958 78.440 C 182.613 62.647,179.969 56.131,170.022 58.877 C 166.761 59.778,157.798 67.717,157.798 69.705 C 157.798 70.221,157.414 70.642,156.944 70.642 C 156.468 70.642,156.163 67.031,156.256 62.492 C 156.599 45.651,145.646 46.107,131.589 63.517 L 125.829 70.651 126.350 63.766 L 126.870 56.881 123.639 56.881 C 119.768 56.881,118.416 58.294,117.792 62.992 C 116.946 69.359,115.329 74.726,113.414 77.523 C 100.890 95.815,87.923 94.433,96.789 75.750 C 100.500 67.930,100.590 67.353,98.292 66.123 C 96.245 65.027,95.035 65.890,91.307 71.101 C 74.037 95.244,60.563 99.536,68.025 78.518 C 75.588 57.216,97.248 42.515,97.248 58.683 C 97.248 62.794,98.250 63.813,100.898 62.395 C 103.751 60.869,103.437 55.063,100.334 51.960 C 90.912 42.538,66.335 57.944,59.555 77.523 C 57.783 82.639,48.205 91.959,41.627 94.968 C 21.636 104.112,8.762 88.770,14.287 62.385 C 15.079 58.601,15.952 54.364,16.227 52.970 C 16.501 51.577,17.091 50.211,17.537 49.935 C 17.983 49.659,18.349 48.797,18.349 48.021 C 18.349 39.480,37.902 12.216,47.125 7.896 C 62.404 0.740,64.523 13.764,50.969 31.521 C 47.240 36.407,47.058 37.203,49.386 38.449 C 56.562 42.289,68.345 18.367,64.346 8.076 C 62.361 2.965,55.395 0.881,47.706 3.099 M266.457 103.899 C 262.424 116.926,249.541 127.461,249.541 117.732 C 249.541 112.902,252.967 109.080,261.847 104.001 C 266.530 101.323,267.260 101.307,266.457 103.899 "
            stroke="#ffffff" stroke-width="3" />
                </svg>
                </div>
            </div>
    </header>
    <body style="background-color: #e6e6e6">
    <!-- Register form start -->
    <div class="wrap">
            <div id="register" class="registerpagestyle">
                <form action="checkall()" method="post">
                    <div class="container">
                        <br>
                    <h1 class="login_title">Register</h1>
                    <p class="t_text">Please fill in this form to create an account.</p>
                    <br>
                    <input id="name" class="registerform" type="text" placeholder="Enter Name" name="nameuser" maxlength="50" onchange="checkname(event)" required>

                    <input id="surname" type="text" placeholder="Enter Surname" name="usersurname" maxlength="50" onchange="checksurname(event)" required>

                    <input id="username" type="text" placeholder="Enter Username" name="userusername" maxlength="50" onchange="checkusername(event)" required>

                    <input id="phone" type="text" placeholder="Enter Phone number" name="usernumber" maxlength="10" onchange="checkphone(event)" required>

                    <input id="email" type="text" placeholder="Enter Email" name="useremail" maxlength="50" onchange="checkemail(event)" required>

                    <input id="pass" type="password" placeholder="Enter Password" name="userpass" maxlength="50" required>

                    <input id="reppass" type="password" placeholder="Repeat Password" name="userpass-repeat" maxlength="50" onchange="checkpass(event)" required>
                    <br>
                    <button type="submit" class="buttonstyle" name="userreg_user" value="reg">Register</button>
                    </div>
          
                    <div class="container signin">
                    <p class="t_text">Already have an account?</p>
                    <button class="buttonstyle" onclick="window.location.href='login.php'">Log In</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
