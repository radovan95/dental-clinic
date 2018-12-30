<?php
session_start();

if(isset($_SESSION['admin'])){
    header('location: logout.php');
}

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
    <link rel="stylesheet" href="css/footer-white.css">

    <!-- Title -->
    <title>
        Dental Clinic - Contact
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
                <li><a id="header-tabs" href="gallery.php">GALLERY</a></li>
                <li><a id="header-tabs" href="about.php">ABOUT</a></li>
                <li><a id="header-tabs" href="contact.php">CONTACT</a></li>
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
                <h4 id="title-1">Contact</h4>

                <ul class="list-inline list-inline-arrows">
                    <li><a href="index.php" class="text-white">Home</a></li>
                    <li><a class="text-white">Contact</a></li>
                </ul>
            </div>

        </div>
    </div>

    <div class="container container-team">

        <h1 id="ourTeamTitle">CONTACT</h1>
        <hr id="underTitle" >

        <section id="contact">
            <div class="container">
                <p class="text-center w-75 m-auto">You're not going to hit a ridiculously long phone menu when you call us. Your email isn't going to the inbox abyss, never to be seen or heard from again. At Choice Screening, we provide the exceptional service we'd want to experience ourselves!</p>

                <div class="col-md-12 col-sm-12" style="margin-bottom: 50px; margin-top: 30px">
                    <!-- CONTACT FORM HERE -->
                    <div class="wow fadeInUp" data-wow-delay="0.4s">
                        <form id="contact-form" action="#" method="get">
                            <div class="col-md-6 col-sm-6">
                                <input type="text" class="form-control" name="name" placeholder="Name" required="">
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <input type="email" class="form-control" name="email" placeholder="Email" required="">
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <textarea class="form-control" rows="5" name="message" placeholder="Message" required=""></textarea>
                            </div>
                            <div class="col-md-offset-8 col-md-4 col-sm-offset-6 col-sm-6">
                                <button id="submit" type="submit" class="form-control" name="submit">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-3 my-5">
                        <div class="card border-0">
                            <div class="card-body text-center">
                                <i class="fa fa-phone fa-3x mb-3" aria-hidden="true"></i>
                                <h5 class="text-uppercase mb-5">call us</h5>
                                <p>1-800-1234-567 </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-3 my-5">
                        <div class="card border-0">
                            <div class="card-body text-center">
                                <i class="fa fa-map fa-3x mb-3" aria-hidden="true"></i>
                                <h5 class="text-uppercase mb-5">office loaction</h5>
                                <address>Dental 02, Level 12, Dental Center </address>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-3 my-5">
                        <div class="card border-0">
                            <div class="card-body text-center">
                                <i class="fa fa-calendar fa-3x mb-3" aria-hidden="true"></i>
                                <h5 class="text-uppercase mb-5">Calendar</h5>
                                <address>The timetable is for guidance only to help you plan your appointment with a preferred doctor or nurse.</address>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-3 my-5">
                        <div class="card border-0">
                            <div class="card-body text-center">
                                <i class="fa fa-globe fa-3x mb-3" aria-hidden="true"></i>
                                <h5 class="text-uppercase mb-5">email</h5>
                                <p>dental-clinic@dental.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding: 0">
        <footer id="myFooter">
            <div class="container">
                <ul>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Team</a></li>
                    <li><a href="#">Appointments</a></li>
                    <li><a href="#">Terms of service</a></li>
                </ul>
            </div>

            <div class="footer-social">
                <a href="#" class="social-icons"><i class="fab fa-facebook-f"></i></i></a>
                <a href="#" class="social-icons"><i class="fab fa-google"></i></a>
                <a href="#" class="social-icons"><i class="fab fa-twitter"></i></a>
            </div>
        </footer>
    </div>

    <!-- JAVASCRIPT -->
    <script src="jquery/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script src="javascript/team.js" type="text/javascript"></script>
    <script src="javascript/modernizer.js"></script>

</div>

</body>
</html>