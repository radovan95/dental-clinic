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

    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <link href="bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="fontawesome-free-5.0.13/web-fonts-with-css/css/fontawesome-all.css" type="text/css" rel="stylesheet">

    <!-- CSS -->
    <link href="css/team.css" type="text/css" rel="stylesheet">
    <link href="css/foundation.css" type="text/css" rel="stylesheets">
    <link href="css/twentytwenty-no-compass.css" type="text/css" rel="stylesheet">
    <link href="css/twentytwenty.css" type="text/css" rel="stylesheet">

    <!-- Title -->
    <title>
        Dental Clinic - Before/After
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
                <h4 id="title-1">Before / After</h4>

                <ul class="list-inline list-inline-arrows">
                    <li><a href="index.php" class="text-white">Home</a></li>
                    <li><a class="text-white">Gallery</a></li>
                </ul>
            </div>

        </div>
    </div>



    <div id='container1' class='col-xs-12 col-sm-4 col-md-4 col-lg-4 twentytwenty-container' >
        <img src='customer_images/1_1.jpg' style="width: 100%">
        <img src='customer_images/1_2.jpg' style="width: 100%">
    </div>



    <!-- JAVASCRIPT -->
    <script src="jquery/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script src="javascript/team.js" type="text/javascript"></script>
    <script src="javascript/modernizer.js"></script>
    <script src="javascript/jquery.event.move.js"></script>
    <script src="javascript/jquery.twentytwenty.js"></script>

    <script>
        $(window).on('load',function() {
            $("#container1").twentytwenty();
        });
    </script>

</div>

</body>
</html>