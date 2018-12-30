<?php
session_start();
include ("db_config.php");
include ("functions/functions.php");


if(!isset($_SESSION['email'])) {
    header('location: login-register.php');
    exit();
}

$sql = "SELECT * from users where email = '".$_SESSION['email'] ."'";

$run_pro = mysqli_query($con, $sql);


while ($row_pro = mysqli_fetch_array($run_pro)) {

    $id_user = $row_pro['user_id'];

}

$result = ($con->query("SELECT * FROM patient WHERE u_id = $id_user"));

if($result->num_rows > 0)
{
    header('location: user_profile.php');
    exit();
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
        Dental Clinic - Profile
    </title>

</head>
<?php

if ( !isset($_SESSION['email']) ) {
    $_SESSION['message'] = '
                <div style=\'background-color: rgba(245, 245, 245, 0.56);box-shadow: 2px 1px 2px 0px rgba(0, 0, 0, 0.44);border:1px solid lavender;padding: 20px;text-align: center\'><img src="assets/error.png" style=\'background-color: rgba(245, 245, 245, 0.56);width:28px;height:28px;color:red;text-align: center;font-size: 30px;display: block;margin-left: auto;margin-right: auto\'>
                     You must be logged in to view this page !
                </div>';
    header("location: error.php" );

}
else {
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
}
?>
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
                <h4 id="title-1">Profile</h4>

                <ul class="list-inline list-inline-arrows">
                    <li><a href="index.php" class="text-white">Home</a></li>
                    <li><a class="text-white">Profile</a></li>
                </ul>
            </div>

        </div>
    </div>

    <?php

    if ($active == true)
    {
        IfUserIsLogged();
    }


    ?>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding-left: 0;padding-right: 0;margin-top: 25px">

            <?php

            if ( !$active ){
                echo "<div class=\"col-xs-12 col-sm-12 col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6 \" >
                          ";ActiveUser();
                echo "</div>";
            }
            else
            {

                echo "<div class='image-behind-div'>
                          <div class='color-behind-div'>
                              <div class=\"col-xs-12 col-sm-12 col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6 profile-informations\" >
                                  ";personalInformation();
                echo "        </div>
                          </div>
                      </div>";
            }

            ?>



<!--            <a href="logout.php"><button type="submit" class="btn btn-ellipse btn-primary logout-button" name="logout">Logout</button></a>-->
    </div>

<!--    <noscript><h3> You must have JavaScript enabled in order to use this order form. Please-->
<!--        enable JavaScript and then reload this page in order to continue. </h3>-->
<!--    <meta HTTP-EQUIV="refresh" content=0;url="javascriptNotEnabled.php"></noscript>-->


<!-- JAVASCRIPT -->
<script src="jquery/jquery-3.3.1.min.js" type="text/javascript"></script>
<script src="javascript/login.js" type="text/javascript"></script>
<script src="javascript/modernizer.js"></script>
<script src="javascript/validate-profile-form.js" type="text/javascript"></script>
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="validation/jquery.validate.js" type="text/javascript"></script>

</div>

</body>
</html>