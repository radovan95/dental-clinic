<?php
session_start();

if(!isset($_SESSION['email'])) {
    header('location: login-register.php');
}

include ("db_config.php");
include ("functions/functions.php");

$sql = "SELECT * from users where email = '".$_SESSION['email'] ."'";

$run_pro = mysqli_query($con, $sql);


while ($row_pro = mysqli_fetch_array($run_pro)) {

    $id_user = $row_pro['user_id'];

}

$result = ($con->query("SELECT * FROM patient WHERE u_id = $id_user"));

if($result->num_rows <1 )
{
    header('location: profile.php');
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

    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <link href="bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="fontawesome-free-5.0.13/web-fonts-with-css/css/fontawesome-all.css" type="text/css" rel="stylesheet">

    <!-- CSS -->
    <link href="css/team.css" type="text/css" rel="stylesheet">
    <link href="css/main.css" type="text/css" rel="stylesheet">

    <!-- Title -->
    <title>
        Dental Clinic - User profile
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
                <h4 id="title-1">User profile</h4>

                <ul class="list-inline list-inline-arrows">
                    <li><a href="index.php" class="text-white">Home</a></li>
                    <li><a class="text-white">User profile</a></li>
                </ul>
            </div>

        </div>
    </div>

    <div class="profile-title">
        <h1>USER PROFILE</h1>
    </div>

    <hr id="underUser">

    <?php

    if( isset($_SESSION['success']) )
    {
        echo $_SESSION['success'];

        unset($_SESSION['success']);
    }

    if( isset($_SESSION['comment_success']) )
    {
        echo $_SESSION['comment_success'];

        unset($_SESSION['comment_success']);
    }

    if( isset($_SESSION['images_success']) )
    {
        echo $_SESSION['images_success'];

        unset($_SESSION['images_success']);
    }

    ?>


    <div class="col-xs-12 col-sm-12 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8" >
        <?php
        if(isset($_GET['appointment'])) {
            $current = $_GET['appointment'];
        } else {
            $current = 'undefined';
        }
        ?>
        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 tab">
            <button class="tablinks" onclick="openCity(event, 'London')" <?php if($current == 'undefined') { echo "id='defaultOpen'";} ?> >Personal informations</button>
            <button class="tablinks" onclick="openCity(event, 'Paris')"  <?php if($current != 'undefined') { echo "id='defaultOpen'";} ?>>Appointments</button>
            <button class="tablinks" onclick="openCity(event, 'Tokyo')">Finished appointments</button>
        </div>
        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 profile-information">

            <div id="London" class="tabcontent" style="padding: 0">
                <?php

                if( isset($_SESSION['Error_1']) )
                {
                    echo $_SESSION['Error_1'];

                    unset($_SESSION['Error_1']);
                }

                ?>
                <?php getPatientById(); ?>
            </div>

            <div id="Paris" class="tabcontent" style="font-family: 'Bebas Neue Regular'">
                <h5 style="text-align: center;margin-top: 5%">Appointments</h5>
                <div class="limiter">
                    <div class="container-table100">
                        <div class="wrap-table100">
                            <div class="table">

                                <div class="row header">
                                    <div class="cell">
                                        Dentist name
                                    </div>
                                    <div class="cell">
                                        Service
                                    </div>
                                    <div class="cell">
                                        Date and time
                                    </div>
                                    <div class="cell">
                                        Cancel
                                    </div>
                                </div>

                                <?php

                                global $con;

                                $sql = "SELECT * from users where email = '".$_SESSION['email'] ."'";

                                $run_pro = mysqli_query($con, $sql);


                                while ($row_pro = mysqli_fetch_array($run_pro)) {

                                    $id_user = $row_pro['user_id'];

                                }

                                $getPatientId = "SELECT a.*, p.*, d.*, s.* FROM appointment a  
                                JOIN patient p ON a.p_id = p.patient_id
                                JOIN dentist d ON a.d_id = d.dentist_id
                                JOIN service s ON a.s_id = s.service_id
                                WHERE u_id = $id_user AND status = '0'";

                                $run_pro = mysqli_query($con, $getPatientId);

                                while ($row_pro = mysqli_fetch_array($run_pro)) {

                                    $dentist_id = $row_pro['dentist_id'];
                                    $appointment_id = $row_pro['appointment_id'];
                                    $patient_id = $row_pro['p_id'];
                                    $dentist_first = $row_pro['first_name'];
                                    $dentist_last = $row_pro['last_name'];
                                    $date_and_time = $row_pro['datetime'];
                                    $service_name = $row_pro['name'];

                                    $date = str_replace('/', '-', $date_and_time);
                                    $new_date = date('d-M-Y h:i:s', strtotime($date));

                                    $getTimer = "SELECT * FROM timer";

                                    $run_timer = mysqli_query($con, $getTimer);

                                    while ($get_timer = mysqli_fetch_array($run_timer)) {
                                        $time = $get_timer['time'];

                                        $datetime_from = date("M d,Y h:i:s", strtotime("-$time minutes", strtotime($new_date)));

                                        echo "<div class=\"row\">
                                              <div class=\"cell\">
                                                  $dentist_first $dentist_last
                                              </div>
                                              <div class=\"cell\">
                                                  $service_name
                                              </div>
                                              <div class=\"cell\">
                                                  $new_date
                                              </div>
                                              <div class=\"cell\" >
                                                  <span id='cancel_timer'></span>&emsp;<button class=\"fas-times\" id='myBtn'><i class=\"fas fa-times\"></i></button>
                                              </div>
                                           </div>";
                                    }
                                }

//                                if ( $run_pro->num_rows == 0 )
//                                {
//                                    echo "You have no appointments";
//                                }
//
//                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="myModal" class="modal">


                <div class="modal-content">
                    <div class="modal-header">
                        <span class="close">&times;</span>
                        <h5>Cancel the appointment</h5>
                    </div>
                    <div class="modal-body">
                            <h6>Reason:</h6>
                            <form method="post" id="cancel-form" name="cancel-form" action="cancel_appointment.php">
                                <input type="hidden" id='appointment_id' name="appointment_id" style='display: none' value="<?php echo $appointment_id ?>">
                                <textarea id="reason" name="reason" rows="5" placeholder="Please enter a reason" cols="30"></textarea>
                                <br>
                                <input type="submit"  id="cancel">
                            </form>
                    </div>
                </div>

            </div>


            <div id="image_modal" class="image_modal">


                <div class="modal-content">
                    <div class="modal-header">
                        <span class="close">&times;</span>
                        <h5>Before / After</h5>
                    </div>
                    <div class="modal-body">

                        <form action="upload_images.php" method="post" enctype="multipart/form-data">
                            <h6>Before</h6>
                            <input type="file" name="first_file" id="first_file">
                            <h6>After</h6>
                            <input type="file" name="second_file" id="second_file">
                            <input type="submit" value="submit" name="submit">
                        </form>
                    </div>
                </div>

            </div>

            <div id="Tokyo" class="tabcontent">
                <h5 style="text-align: center;margin-top: 5%;font-family: 'Bebas Neue Regular'">Finished appointments</h5>
                <div class="limiter">
                    <div class="container-table100">
                        <div class="wrap-table100">
                            <div class="table">

                                <div class="row header">
                                    <div class="cell" style="width: 140px">
                                        Dentist name
                                    </div>
                                    <div class="cell" style="width: 140px">
                                        Service
                                    </div>
                                    <div class="cell" style="width: 140px">
                                        Date and time
                                    </div>
                                    <div class="cell" style="width: 140px">
                                        Comments
                                    </div>
                                    <div class="cell" style="width: 140px">
                                        Photo
                                    </div>
                                </div>

                                <?php getFinishedAppointments(); ?>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- JAVASCRIPT -->
    <script src="jquery/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script src="javascript/team.js" type="text/javascript"></script>
    <script src="javascript/modernizer.js"></script>
    <script src="javascript/validate-cancel-appointment.js" type="text/javascript"></script>
    <script src="javascript/validate-comment-appointment.js" type="text/javascript"></script>
    <script src="javascript/validate-update-profile-form.js" type="text/javascript"></script>
    <script src="validation/jquery.validate.js" type="text/javascript"></script>

    <script>
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
    </script>

    <script>

        var y = <?php global $datetime_from; echo "'".$datetime_from."'" ?>

        //        var now = "10/9/2018 20:2:00";

        // Set the date we're counting down to
        var countDownDate = new Date(y).getTime();

        // Update the count down every 1 second
        var x = setInterval(function() {

            // Get todays date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Output the result in an element with id="demo"
            document.getElementById("cancel_timer").innerHTML = days + "d" + hours + "h "
                + minutes + "m " + seconds + "s ";

            // If the count down is over, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("cancel_timer").innerHTML = "Expired";
                $('.fas-times').hide();
            }
        }, 1000);
    </script>

    <script>
        // Get the modal
        var cancelModal = document.getElementById('myModal');

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span_0 = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal
        btn.onclick = function() {
            cancelModal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span_0.onclick = function() {
            cancelModal.style.display = "none";
        };

        // When the user clicks anywhere outside of the modal, close it
    </script>

    <script>
        // Get the modal
        var commentModal = document.getElementById('comment_modal');

        // Get the button that opens the modal
        var btn = document.getElementById("comment_btn");

        // Get the <span> element that closes the modal
        var span_1 = document.getElementsByClassName("close")[1];

        // When the user clicks the button, open the modal
        btn.onclick = function() {
            commentModal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span_1.onclick = function() {
            commentModal.style.display = "none";
        };


    </script>
    <script>
        // Get the modal
        var imageModal = document.getElementById('image_modal');

        // Get the button that opens the modal
        var btn = document.getElementById("image_btn");

        // Get the <span> element that closes the modal
        var span_2 = document.getElementsByClassName("close")[2];

        // When the user clicks the button, open the modal
        btn.onclick = function() {
            imageModal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span_2.onclick = function() {
            imageModal.style.display = "none";
        };

        // When the user clicks anywhere outside of the modal, close it

    </script>

    <script>
        window.onclick = function(event) {
            if (event.target == cancelModal) {
                cancelModal.style.display = "none";
            }
            else if (event.target == commentModal)
            {
                commentModal.style.display = "none";
            }
            else if (event.target == imageModal)
            {
                imageModal.style.display = "none";
            }
        }


    </script>




</div>

</body>
</html>