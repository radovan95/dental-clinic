<?php
session_start();
include ("db_config.php");
include ("functions/functions.php");
?>
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
    <link href="css/index.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="css/footer-white.css">


    <!-- Title -->
    <title>
        Dental Clinic - Home
    </title>
</head>
<body>
<div class="global">

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

                <div class="col-xs-offset-1 col-sm-offset-1 col-md-offset-2 col-lg-offset-3 col-xs-10 col-sm-10 col-md-4 col-lg-3 header-text">
                    <div class="header-text-1">
                        <h2 style="letter-spacing: 0.02em;font-size: 60px;font-family: 'Bebas Neue Regular'">HIGH QUALITY MEDICAL CARE THAT'S FAST AND CONVENIENT</h2>
                    </div>

                    <div class="header-text-2">
                        <h2 style="letter-spacing: 0.02em;font-size: 20px">
                            Our entire team is dedicated to providing you with the highest standard of quality dental care services
                            that are tailored to meet the specific needs of every member of your family.
                        </h2>
                    </div>

                    <div class="highlight">
                        <a class="btn-responsive button " href="appointments.php" style="font-family: 'Bebas Neue Regular'">MAKE AN APPOINTMENT</a>
                    </div>

                </div>

                <div class="col-xs-offset-2 col-sm-offset-2 col-md-offset-0 col-lg-offset-0 col-xs-8 col-sm-8 col-md-4 col-lg-3 form-consultation">
                    <div class="slider" style="text-align: center">
                        <figure>
                            <?php showOnIndex(); ?>
                        </figure>
                    </div>
                </div>


            </div>

    <!-- Background image-->

    </div>
<!--    Opening hours, doctor's timetable , appointments, emergency cases-->
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 info">

        <div class="information">
            <h1 style="text-align: center">Introduction</h1>
            <br />
        </div>

        <hr id="underTitle">

        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 time">
            <div class="left-content">
                OPENING HOURS
            </div>
            <br />
            <div>
                <i style="color:orange;font-size: 40px;text-align: center;display: block" class="far fa-clock"></i>
                <br />
                <p id="center">
                    Mon–Frid &emsp; &emsp;    8:00am–7:00pm
                        <br />
                    Saturday  &emsp; &emsp;   &nbsp; 9:00am–5:00pm
                        <br />
                    Sunday &emsp; &emsp; &emsp;  9:00am–3:00pm
                </p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 time">
            <div class="left-content">
                DOCTORS’ TIMETABLE
            </div>
            <br />
            <i style="color:orange;font-size: 40px;text-align: center;display: block" class="far fa-calendar-alt"></i>
            <br />
            <p id="center">
                The timetable is for guidance only to help you plan your appointment with a preferred doctor or nurse. It does not guarantee availability as our doctors or nurses may sometimes be attending to other duties.
            </p>

        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 time">
            <div class="left-content">
                APPOINTMENTS
            </div>
            <br />
            <i style="color:orange;font-size: 40px;text-align: center;display: block" class="fas fa-phone"></i>
            <br />
            <p id="center">
                The first step towards a healthy life is to schedule an appointment. Please contact our office by phone or complete the appointment request form.
            </p>

        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 time">
            <div class="left-content">
                EMERGENCY CASES
            </div>
            <br />
            <i style="color:orange;font-size: 40px;text-align: center;display: block" class="fab fa-gratipay"></i>
            <br />
            <p id="center">
                1-800-1234-567
                <br />
                Call us!
            </p>
        </div>
    </div>

<!--    Why choose Dental-C-->

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 chooseDentalC">
        <h1>WHY CHOOSE DENTAL-C?</h1>
        <br />
    </div>

    <hr id="underTitle">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 whyChoose">
        <div class="col-lg-offset-2 col-lg-8">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 ">
                <div class="calendar">
                    <span class="fas fa-calendar-check" ></span>
                </div>
                <div>
                    <h6 id="secondTitles"><b>Easy Booking</b></h6>
                    <p id="silverText">Booking an appointment at our dental clinic is as easy as doing 2 clicks!</p>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="user">
                    <span class="fas fa-user-md"></span>
                </div>
                <div>
                    <h6 id="secondTitles"><b>Experience</b></h6>
                    <p id="silverText">Combined, our 5 dentists have over half a century of practical experience. They are ready to put it to action for you!</p>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="handHolding">
                    <i class="fas fa-hand-holding-usd"></i>
                </div>
                <div>
                    <h6 id="secondTitles"><b>Best Price Guarantee</b></h6>
                    <p id="silverText">Our reasonable prices made thousands of people smile with a new, beautiful smile, as never before!</p>
                </div>
            </div>
        </div>
    </div>

<!--    Our services-->
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ourServices">
        <h1 id="ourServicesTitle">OUR SERVICES</h1>
        <br />

        <hr id="underTitle">

        <div class="container service-container">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="box">
                        <img src="assets/general.jpg">
                        <div class="box-content">
                            <h3 class="title">General Care</h3>
                            <ul class="icon">
                                <li><a href="#"><i class="fa fa-link" style="top: 10px;position: relative;"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="box">
                        <img src="assets/cosmetic.jpg">
                        <div class="box-content">
                            <h3 class="title">Cosmetic Dentistry</h3>
                            <ul class="icon">
                                <li><a href="#"><i class="fa fa-link" style="top: 10px;position: relative;"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="box">
                        <img src="assets/restorative.jpg">
                        <div class="box-content">
                            <h3 class="title">Restorative Dentistry</h3>
                            <ul class="icon">
                                <li><a href="#"><i class="fa fa-link" style="top: 10px;position: relative;"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!--<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 qualityService">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 left-side-content">
            <div class="color-over-left-side-image">
                <div class="col-xs-offset-2 col-xs-8 col-sm-offset-3 col-sm-6 col-md-offset-4 col-md-8 col-lg-offset-4 col-lg-8 text-over-left-content">
                    <h2>QUALITY SERVICES & BEST PRICES</h2>

                    <p id="dentaProvides">
                        Denta-C provides a vast range of dental care services for our patients.
                        You can find the full list of services or order a free consultation if you are interested in general dental care.
                    </p>

                    <div class="highlight">
                        <a class="btn-responsive button " href="appointments.php" style="font-family: 'Bebas Neue Regular'">MAKE AN APPOINTMENT</a>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 right-side-content">

        </div>
    </div>-->

    <!--    Our team-->
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ourTeam">
        <h1 id="ourTeamTitle">OUR TEAM</h1>
        <br />

        <hr id="underTitle">

        <div class="col-xs-12  col-sm-12  col-md-12 col-lg-offset-1 col-lg-10 teamImages">
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 team-1">
                <div class="heart-of-medical-center-image">
                    <img class="img-responsive" src="assets/scott.jpg" alt="general">
                </div>

                <div class="heart-of-medical-center-body">
                    <h4 id="teamTitles">Scott Riley</h4>
                    <p id="teamUnderTitle"><i>Chief Medical Officer</i></p>

                    <i style="color:orange;font-size: 20px;" class="fas fa-phone"></i>
                    1-800-1234-567
                </div>

                <p id="teamDetails" style="clear: both">Our clinic's Chief Dental Officer, Dr. Scott Riley has been working in this field of medical specialization since 2002.</p>
            </div>

            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 team-1">

                <div class="heart-of-medical-center-image">
                    <img class="img-responsive" src="assets/leslie.jpg" alt="cosmetic">
                </div>

                <div class="heart-of-medical-center-body">
                    <h4 id="teamTitles">Leslie Gross</h4>
                    <p id="teamUnderTitle"><i>Dental Hygienist</i></p>

                    <i style="color:orange;font-size: 20px;" class="fas fa-phone"></i>
                    1-800-1234-567
                </div>

                <p id="teamDetails" style="clear: both">Leslie is one of the most experienced dental hygienists in the country. She works at our dental clinic since day 1.</p>
            </div>

            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 team-1">

                <div class="heart-of-medical-center-image">
                    <img class="img-responsive" src="assets/Dana.jpg" alt="restorative" style="float:left">
                </div>

                <div class="heart-of-medical-center-body">
                    <h4 id="teamTitles">Dana Sims</h4>
                    <p id="teamUnderTitle"><i>Practical Nurse</i></p>

                    <i style="color:orange;font-size: 20px;" class="fas fa-phone"></i>
                    1-800-1234-567
                </div>

                <p id="teamDetails" style="clear: both">Dana previously served as a senior practical nurse at the Mayo clinic. She obtained her license by working hard after graduating from a medical college.</p>
            
            </div>

        </div>
    </div>

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

    <!-- JAVASCRIPT -->
    <script src="jquery/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script src="javascript/index.js" type="text/javascript"></script>
    <script src="javascript/modernizer.js"></script>

</div>

</body>