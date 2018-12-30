<?php
session_start();
include ("db_config.php");
include ("functions/functions.php");
?>
<html>
<head>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="assets/dental.png"/>

    <!-- Material Design -->
    <link href="MaterialDesign/css/materialdesignicons.css" type="text/css" rel="stylesheet">

    <!-- Bootstrap -->

    <link href="bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="fontawesome-free-5.0.13/web-fonts-with-css/css/fontawesome-all.css" type="text/css" rel="stylesheet">

    <!-- CSS -->
    <link href="css/login.css" type="text/css" rel="stylesheet">

    <!-- Title -->
    <title>
        Dental Clinic - Login Attempt
    </title>

</head>

<body>
<!-- Global -->
<div class="global">
    <!-- Header -->
    <header>
        <!-- Logo -->
        <div id="cd-logo">
            <a href="index.php">
                <img src="assets/dental.png" alt="Logo">
            </a>
            Dental-C</div>
    </header>

    <div id="cd-nav">
        <a href="#0" class="cd-nav-trigger">Menu<span></span></a>

        <!-- Header Tabs -->
        <nav id="cd-main-nav">
            <ul>
                <li><a id="header-tabs" href="index.php">HOME</a></li>
                <li><a id="header-tabs" href="appointments.php">APPOINTMENTS</a></li>
                <li><a id="header-tabs" href="#">GALLERY</a></li>
                <li><a id="header-tabs" href="team.php">TEAM</a></li>
                <li><a id="header-tabs" href="about.php">ABOUT</a></li>
                <li><a id="header-tabs" href="#">CONTACT</a></li>
                <?php
                if(isset($_SESSION['email'])) {
                    echo "<li><a id=\"header-tabs\" href='user_profile.php'>{$_SESSION['first_name']}</a></li>";
                    echo "<li><a id='header-tabs' href='logout.php'><i class=\"fas fa-sign-out-alt\"></i></a>";
                }
                else
                {
                    echo "<li><a id=\"header-tabs\" href=\"login-register.php\">LOGIN</a></li>";
                }
                ?>
            </ul>
        </nav>
    </div>
    <div class="background-image-1">
        <!-- Color over background image-->
        <div class="color-over-image">

            <!-- About title -->
            <div class="col-xs-12 col-sm-offset-2 col-sm-10 col-md-offset-2 col-md-10  col-lg-offset-2 col-lg-10  about-1">
                <h4 id="title-1">Login Attempt</h4>

                <ul class="list-inline list-inline-arrows">
                    <li><a href="index.php" class="text-white">Home</a></li>
                    <li><a href="login-register.php" class="text-white">Login / Register</a></li>
                    <li><a class="text-white">Error</a></li>
                </ul>
            </div>

        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="col-xs-12 col-sm-offset-2 col-sm-4 col-md-offset-3 col-md-3 col-lg-offset-2 col-lg-3">
            <div class="tab" role="tabpanel">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab">Login</a></li>
                    <li role="presentation"><a href="#Section2" aria-controls="profile" role="tab" data-toggle="tab">Register</a></li>
                </ul>

                <p>
                    <?php
                    if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ):
                        echo $_SESSION['message'];
                    else:
                        header( "location: login_stranica.php" );
                    endif;
                    ?>
                </p>

                <!-- Tab panes -->
                <div class="tab-content tabs">
                    <div role="tabpanel" class="tab-pane fade in active" id="Section1">
                        <form action="login-register.php" method="post">
                            <label for="login_email" class="login-email-title">E-mail</label>
                            <input id="login_email" type="email" name="login_email" class="form-control" autocomplete="off">

                            <label for="login_password" class="login-password-title">Password</label>
                            <input id="login_password" type="password" name="login_password" class="form-control" autocomplete="off">

                            <button type="submit" class="btn btn-ellipse btn-primary login-button" name="login">Login</button>
                            <a href="forgot.php" style="float: right">Forgot password ?</a>
                        </form>

                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="Section2">
                        <form action="login-register.php" method="post" id="register-form">
                            <label for="register_first_name" class="register-first-name-title">First name</label>
                            <input id="register_first_name" type="text" name="register_first_name" class="form-control" autocomplete="off">

                            <label for="register_last_name" class="register-last-name-title">Last name</label>
                            <input id="register_last_name" type="text" name="register_last_name" class="form-control" autocomplete="off">

                            <label for="register_email" class="register-email-title">E-mail</label>
                            <input id="register_email" type="email" name="register_email" class="form-control" autocomplete="off">

                            <label for="register_password" class="register-password-title">Password</label>
                            <input id="register_password" type="password" name="register_password" class="form-control" autocomplete="off">

                            <button type="submit" class="btn btn-ellipse btn-primary register-button" name="register">Register</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>





<!-- JAVASCRIPT -->
<script src="jquery/jquery-3.3.1.min.js" type="text/javascript"></script>
<script src="javascript/login.js" type="text/javascript"></script>
<script src="javascript/modernizer.js"></script>
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="javascript/validate-login-register-form.js" type="text/javascript"></script>
<script src="validation/jquery.validate.js" type="text/javascript"></script>

</div>

</body>
</html>