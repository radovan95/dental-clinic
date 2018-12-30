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

    <!-- Title -->
    <title>
        Dental Clinic - Team
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
                <h4 id="title-1">Team</h4>

                <ul class="list-inline list-inline-arrows">
                    <li><a href="index.php" class="text-white">Home</a></li>
                    <li><a class="text-white">Team</a></li>
                </ul>
            </div>

        </div>
    </div>

    <div class="container container-team">

        <h1 id="ourTeamTitle">OUR TEAM</h1>
        <hr id="underTitle" >

        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="our-team">
                    <img src="assets/scottriley.jpg" alt="">
                    <div class="team-content">
                        <h3 class="post-title">Scott Riley</h3>
                        <span class="post">Chief Dental Officer</span>
                        <p class="description">

                        </p>
                        <ul class="team_social">
                            <li><a href="#"><i style="position: relative;top: 8px;" class="fas fa-info"></i></a></li>
                        </ul>
                    </div>
                    <div class="team-prof">
                        <h3 class="post-title">Scott Riley</h3>
                        <span class="post">Chief Dental Officer</span>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="our-team">
                    <img src="assets/katherine.jpg" alt="katherine">
                    <div class="team-content">
                        <h3 class="post-title">Katherine Wong</h3>
                        <span class="post">Practical Nurse</span>
                        <p class="description">

                        </p>
                        <ul class="team_social">
                            <li><a href="#"><i style="position: relative;top: 8px;" class="fas fa-info"></i></a></li>
                        </ul>
                    </div>
                    <div class="team-prof">
                        <h3 class="post-title">Katherine Wong</h3>
                        <span class="post">Practical Nurse</span>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="our-team">
                    <img src="assets/johnny.jpg" alt="johnny">
                    <div class="team-content">
                        <h3 class="post-title">Johnny Fowler</h3>
                        <span class="post">Dental Hygienist</span>
                        <p class="description">

                        </p>
                        <ul class="team_social">
                            <li><a href="#"><i style="position: relative;top: 8px;" class="fas fa-info"></i></a></li>
                        </ul>
                    </div>
                    <div class="team-prof">
                        <h3 class="post-title">Johnny Fowler</h3>
                        <span class="post">Dental Hygienist</span>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="our-team">
                    <img src="assets/Mariac.jpg" alt="">
                    <div class="team-content">
                        <h3 class="post-title">Maria Cassia</h3>
                        <span class="post">Dentist</span>
                        <p class="description">

                        </p>
                        <ul class="team_social">
                            <li><a href="#"><i style="position: relative;top: 8px;" class="fas fa-info"></i></a></li>
                        </ul>
                    </div>
                    <div class="team-prof">
                        <h3 class="post-title">Maria Cassia</h3>
                        <span class="post">Dentist</span>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="our-team" style="margin-top: 20px">
                    <img src="assets/Ellison%20John.jpg" alt="Walter Jenkins">
                    <div class="team-content">
                        <h3 class="post-title">Walter Jenkins</h3>
                        <span class="post">Cardiologist</span>
                        <p class="description">

                        </p>
                        <ul class="team_social">
                            <li><a href="#"><i style="position: relative;top: 8px;" class="fas fa-info"></i></a></li>
                        </ul>
                    </div>
                    <div class="team-prof">
                        <h3 class="post-title">Walter Jenkins</h3>
                        <span class="post">Cardiologist</span>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="our-team" style="margin-top: 20px">
                    <img src="assets/martha.jpg" alt="martha">
                    <div class="team-content">
                        <h3 class="post-title">Martha Schmidt</h3>
                        <span class="post">Practical nurse</span>
                        <p class="description">

                        </p>
                        <ul class="team_social">
                            <li><a href="#"><i style="position: relative;top: 8px;" class="fas fa-info"></i></a></li>
                        </ul>
                    </div>
                    <div class="team-prof">
                        <h3 class="post-title">Martha Schmidt</h3>
                        <span class="post">Practical nurse</span>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="our-team" style="margin-top: 20px">
                    <img src="assets/eric.jpg" alt="eric">
                    <div class="team-content">
                        <h3 class="post-title">Eric Snyder</h3>
                        <span class="post">Dentist</span>
                        <p class="description">

                        </p>
                        <ul class="team_social">
                            <li><a href="#"><i style="position: relative;top: 8px;" class="fas fa-info"></i></a></li>
                        </ul>
                    </div>
                    <div class="team-prof">
                        <h3 class="post-title">Eric Snyder</h3>
                        <span class="post">Dentist</span>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="our-team" style="margin-top: 20px">
                    <img src="assets/lilly.jpg" alt="">
                    <div class="team-content">
                        <h3 class="post-title">Lilly Herman</h3>
                        <span class="post">Therapist</span>
                        <p class="description">

                        </p>
                        <ul class="team_social">
                            <li><a href="#"><i style="position: relative;top: 8px;" class="fas fa-info"></i></a></li>
                        </ul>
                    </div>
                    <div class="team-prof">
                        <h3 class="post-title">Lilly Herman</h3>
                        <span class="post">Therapist</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="jquery/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script src="javascript/team.js" type="text/javascript"></script>
    <script src="javascript/modernizer.js"></script>

</div>

</body>
</html>