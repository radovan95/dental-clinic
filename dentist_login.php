<?php
session_start();
include ("db_config.php");
include ("functions/functions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dentist Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="assets/dental.png"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link href="fontawesome-free-5.0.13/web-fonts-with-css/css/fontawesome-all.css" type="text/css" rel="stylesheet">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/mains.css">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="color-over-image">

        <?php

        if( isset($_SESSION['wrong_data']) )
        {
            echo $_SESSION['wrong_data'];

            unset($_SESSION['wrong_data']);
        }
        ?>

            <div class="center" style="text-align: center">
            <form class="login100-form validate-form" method="post" action="login_dentist.php">
					<span class="login100-form-title">
						Dentist Login
					</span>

                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100" type="text" name="email" placeholder="Email">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                    <input class="input100" type="password" name="pass" placeholder="Password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                </div>

                <div class="container-login100-form-btn">
                    <input type="submit" class="login100-form-btn" value="Login">
                </div>
            </form>
            </div>

        </div>
    </div>
</div>




<!--===============================================================================================-->
<script src="jquery/jquery-3.3.1.min.js"></script>
<!--===============================================================================================-->
<script src="javascript/popper.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="javascript/select2.min.js"></script>
<!--===============================================================================================-->
<script src="javascript/tilt.jquery.min.js"></script>
<script >
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>
<!--===============================================================================================-->
<script src="javascript/main.js"></script>

</body>
</html>