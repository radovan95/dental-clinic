<?php
session_start();
include ("db_config.php");
include ("functions/functions.php");

if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
{
    global $con;
    $email = $con->escape_string($_POST['register_email']);
    $result = $con->query("SELECT * FROM users WHERE email='$email'");


    if ( $result->num_rows == 0 ) // User doesn't exist
    {
        $_SESSION['message'] = '
                <div style=\'background-color: rgba(245, 245, 245, 0.56);box-shadow: 2px 1px 2px 0px rgba(0, 0, 0, 0.44);border:1px solid lavender;padding: 20px;text-align: center\'><img src="assets/error.png" style=\'background-color: rgba(245, 245, 245, 0.56);width:28px;height:28px;color:red;text-align: center;font-size: 30px;display: block;margin-left: auto;margin-right: auto\'>
                     User with this data does not exist!
                </div>';
        header("location: error.php");
    }
    else { // User exists (num_rows != 0)

        $user = $result->fetch_assoc(); // $user becomes array with user data

        $email = $user['email'];
        $hash = $user['hash'];
        $first_name = $user['first_name'];

        // Session message to display on success.php
        $_SESSION['message'] = "<p>Please check your email:<span>$email</span>"
            . " to find a password reset link</p>";

        // Send registration confirmation link (reset.php)
        $to      = $email;
        $subject = 'Password Reset Link ';
        $message_body = '
        Dear '.$first_name.',

        We have received a password change request,

        Please click on the link below to reset your password:

        http://localhost/diplomski/reset.php?email='.$email.'&hash='.$hash;

        mail($to, $subject, $message_body);

        header("location: success.php");
    }
}
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
        Dental Clinic - Forgot Password
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
                <li><a id="header-tabs" href="#">APPOINTMENTS</a></li>
                <li><a id="header-tabs" href="#">GALLERY</a></li>
                <li><a id="header-tabs" href="team.php">TEAM</a></li>
                <li><a id="header-tabs" href="about.php">ABOUT</a></li>
                <li><a id="header-tabs" href="#">CONTACT</a></li>
                <li><a id="header-tabs" href="login-register.php">
                        <?php
                        if(isset($_SESSION['email'])) {
                            echo "{$_SESSION['first_name']}";
                        }
                        else
                        {
                            echo "LOGIN";
                        }?>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="background-image-1">
        <!-- Color over background image-->
        <div class="color-over-image">

            <!-- About title -->
            <div class="col-xs-12 col-sm-offset-2 col-sm-10 col-md-offset-2 col-md-10  col-lg-offset-2 col-lg-10  about-1">
                <h4 id="title-1">Find your password</h4>

                <ul class="list-inline list-inline-arrows">
                    <li><a href="index.php" class="text-white">Home</a></li>
                    <li><a href="login-register.php" class="text-white">Login / Register</a></li>
                    <li><a class="text-white">Forgot password</a></li>
                </ul>
            </div>

        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="col-xs-12 col-sm-offset-4 col-sm-4 col-md-offset-4 col-md-4 col-lg-offset-4 col-lg-4 profile-informations" >
            <div class="form">

                <h4>Find Your Password</h4>

                <form action="forgot.php" method="post" id="forgot-form">
                    <div class="field-wrap">
                        <label for="register_email" class="register-email-title">E-mail address</label>
                        <input id="register_email" type="email" name="register_email" class="form-control" autocomplete="off">
                    </div>
                    <button class="btn btn-ellipse btn-primary register-button" style="margin-top: 2%" >Reset</button>
                </form>
            </div>
        </div>
    </div>

    <!--    <noscript><h3> You must have JavaScript enabled in order to use this order form. Please-->
    <!--        enable JavaScript and then reload this page in order to continue. </h3>-->
    <!--    <meta HTTP-EQUIV="refresh" content=0;url="javascriptNotEnabled.php"></noscript>-->


    <!-- JAVASCRIPT -->
    <script src="jquery/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script src="javascript/login.js" type="text/javascript"></script>
    <script src="javascript/modernizer.js"></script>
    <script src="javascript/validate-forgot-form.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="validation/jquery.validate.js" type="text/javascript"></script>

</div>

</body>
</html>
