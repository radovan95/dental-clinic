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
    <link href="css/owl.carousel.min.css" type="text/css" rel="stylesheet">
    <link href="css/owl.theme.default.min.css" type="text/css" rel="stylesheet">
    <link href="css/about.css" type="text/css" rel="stylesheet">

    <!-- Title -->
    <title>
        Dental Clinic - About
    </title>

</head>
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
                <h4 id="title-1">About</h4>

                <ul class="list-inline list-inline-arrows">
                    <li><a href="index.php" class="text-white">Home</a></li>
                    <li><a class="text-white">About</a></li>
                </ul>
            </div>

        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <!-- A few words about us - Title -->
        <div class="col-xs-offset-2 col-xs-8 col-sm-offset-2 col-sm-8 col-md-offset-0 col-md-12 col-lg-offset-1 col-lg-10 few-words">
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 text-under-title">

                <h4 class="few-words-title">A FEW WORDS ABOUT US</h4>
                <hr id="horizontal-line-under-title" align="left">

                <p id="paragraph-under-title">
                    We are a family focused dental practice, founded in 1997 with a strong emphasis on preventive care and general dentistry to help you and your family
                    achieve and keep a healthy smile for life.
                    During your consultation, we like to take the time to discuss with you all the options available to solve your dental problems
                    so we can provide the treatment that is the most suitable for you.
                    We are committed to attending continuous education courses and seminars covering all areas of dentistry in order to ensure
                    that all patients receive the best and most current treatments available.

                    Our experienced staff members are dedicated to providing friendly, comfortable and professional dental care
                    using all the latest technology to ensure your smile is always at its best.
                </p>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 heart-of-medical-health">
                <p id="title-heart-of-medical-health">THE HEART OF MEDICAL CENTER</p>
                <hr id="text-subline">

                <div class="heart-of-medical-center-image">
                    <img class="img-responsive" src="assets/scott.jpg" alt="scott"  >
                </div>


                <div class="heart-of-medical-center-body">
                    <h4 id="teamTitles" style="display: block"> Scott Riley</h4>
                    <p id="teamUnderTitle"><i>Chief Medical Officer</i></p>

                    <i style="color:orange;font-size: 20px;" class="fas fa-phone"></i>
                    1-800-1234-567
                </div>

                    <p id="teamDetails" style="clear: both">Our clinic's Chief Dental Officer, Dr. Scott Riley has been working in this field of medical specialization since 2002.</p>


                <div class="highlight">
                    <a class="btn-responsive button " href="#" style="font-family: 'Bebas Neue Regular'">MORE</a>
                </div>

            </div>

        </div>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 achievements">

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 achievements-icons">

            <h1 id="ourTeamTitle">OUR ACHIEVEMENTS</h1>
            <hr id="underTitle" >

            <div class="col-xs-offset-0 col-xs-12 col-sm-offset-0 col-sm-6 col-md-offset-2 col-md-4 col-lg-offset-2 col-lg-4">
                <span class="fas fa-trophy trophy"></span>
                <h6 style="position: relative;top:10px;">The Best Medical Center 2017</h6>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <span class="fas fa-certificate certificate"></span>
                <h6 style="position: relative;top:10px;">Certified by the International Association</h6>
            </div>
            <div class="col-xs-offset-0 col-xs-12 col-sm-offset-0 col-sm-6 col-md-offset-2 col-md-4 col-lg-offset-2 col-lg-4">
                <span class="fas fa-user-graduate graduate"></span>
                <h6 style="position: relative;top:10px;">The Best Doctors Award</h6>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <span class="fas fa-star star"></span>
                <h6 style="position: relative;top:10px;">The Five Star Award</h6>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 id="testimonial-title">TESTIMONIALS</h1>
                <hr id="underTitle" >
                <div id="testimonial-slider" class="owl-carousel">
                    <?php testimonials(); ?>
                </div>
            </div>
        </div>
    </div>

    <!--Footer-->
    <!--<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 footer">

        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 left-content-footer">
            <img src="assets/dental.png" class="img-responsive img-circle footer-logo">
            <h3 id="dental-c" class="hidden-xs dental-c" >DENTAL-C</h3>
            <p class="hidden-xs     " style="font-size: 15px;color:gainsboro;font-family: 'Bebas Neue Regular'">Dental Clinic</p>
        </div>

        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 copyright">
            © 2018 All Rights Reserved Terms of Use and Privacy Policy
        </div>

        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 glyphicon-footer">
            <ul id="footer-glyps">
                <li><a href="#" class="fab fa-facebook-f" aria-hidden="true"></a></li>
                <li><a href="#" class="fab fa-instagram" aria-hidden="true"></a></li>
                <li><a href="#" class="fab fa-twitter" aria-hidden="true"></a></li>
                <li><a href="#" class="fab fa-google" aria-hidden="true"></a></li>
            </ul>
        </div>
    </div>-->




    <!-- JAVASCRIPT -->
    <script src="jquery/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script src="javascript/owl.carousel.min.js"></script>
    <script src="javascript/about.js"></script>
    <script src="javascript/modernizer.js"></script>



</div>


</html>