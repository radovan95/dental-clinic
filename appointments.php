<?php
session_start();
include ("db_config.php");
include ("functions/functions.php");

$sql = "SELECT * from users where email = '".$_SESSION['email'] ."'";

$run_pro = mysqli_query($con, $sql);


while ($row_pro = mysqli_fetch_array($run_pro)) {

    $id_user = $row_pro['user_id'];

}

$result = ($con->query("SELECT * FROM patient WHERE u_id = $id_user"));

if(!isset($_SESSION['email'])) {
    header('location: login-register.php');
    exit();
}

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

    <!-- Flatpickr -->
    <link rel="stylesheet" href="flatpickr/css/site.css">

    <link rel="stylesheet" href="flatpickr/css/flatpicker.css">

    <link rel="stylesheet" href="flatpickr/css/confirmDate.css">

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet">

    <link href="fontawesome-free-5.0.13/web-fonts-with-css/css/fontawesome-all.css" type="text/css" rel="stylesheet">

    <!-- CSS -->
    <link href="css/login.css" type="text/css" rel="stylesheet">
    <link href="css/material-bootstrap-wizard.css" type="text/css" rel="stylesheet">


    <!-- Title -->
    <title>
        Dental Clinic - Make an appointment
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
                <h4 id="title-1">APPOINTMENTS</h4>

                <ul class="list-inline list-inline-arrows">
                    <li><a href="index.php" class="text-white">Home</a></li>
                    <li><a class="text-white">Appointments</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-offset-2 col-md-8 col-lg-offset-2 col-lg-8 make-appointment" id="make-appointment">
                <!--      Wizard container        -->
                <div class="wizard-container">
                    <div class="card wizard-card" data-color="orange" id="wizard">
                        <?php

                        if( isset($_SESSION['date_error']) )
                        {
                            echo $_SESSION['date_error'];

                            unset($_SESSION['date_error']);
                        }

                        if( isset($_SESSION['appointment_error']) )
                        {
                            echo $_SESSION['appointment_error'];

                            unset($_SESSION['appointment_error']);
                        }


                        ?>
                        <form action="insert_appointment.php" method="post">
                            <!--        You can switch " data-color="rose" "  with one of the next bright colors: "blue", "green", "orange", "purple"        -->

                            <div class="wizard-header">
                                <h3 class="wizard-title">
                                    Make an appointment
                                </h3>
                                <h6>This information will let us know more about your appointment.</h6>
                            </div>
                            <div class="wizard-navigation">
                                <ul>
                                    <li style="width: 33.33%"><a href="#date-and-time" data-toggle="tab">Date and Time</a></li>
                                    <li style="width: 33.33%"><a href="#description" data-toggle="tab">Informations</a></li>
                                </ul>
                            </div>

                            <div class="tab-content">
                                <div class="tab-pane" id="date-and-time" style="margin-top: 20px">
                                    <div class="row">
                                        <div class="col-sm-12">

                                        </div>
                                        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 " style="margin-top: 10px">
                                            <div class="form-group label-floating disabling">
                                                <select id="service" name="service" style="width: 100%;border: 1px solid #c3c3c3;border-radius: 3px;height: 36px">
                                                    <option selected="true" disabled="disabled" value="default">Choose service</option>
                                                    <?php
                                                    $result = ($con->query($check_appointment = "SELECT a.*, p.* FROM appointment a 
                                                    JOIN patient p ON a.p_id = p.patient_id WHERE u_id = $id_user AND status = '1'"));

                                                    if($result-> num_rows > 0 ) {

                                                        $get_service = "select * from service WHERE service_id > 0 and service_id <7";
                                                        $run_service = mysqli_query($con, $get_service);

                                                        while ($row_service = mysqli_fetch_array($run_service)) {
                                                            $service_id = $row_service['service_id'];
                                                            $name = $row_service['name'];

                                                            echo "<option value='$service_id'>$name</option> ";
                                                        }
                                                    }
                                                    else
                                                    {
                                                        $get_service = "select * from service WHERE service_id = 7";
                                                        $run_service = mysqli_query($con, $get_service);

                                                        while ($row_service = mysqli_fetch_array($run_service)) {
                                                            $service_id = $row_service['service_id'];
                                                            $name = $row_service['name'];

                                                            echo "<option value='$service_id'>$name</option> ";
                                                        }
                                                    }

                                                    ?>

                                                </select>
                                                <br />
                                                <select name="dentist" rel="tooltip" id="dentist" class="required" onchange="setTextField(this)">
                                                    <option value="0" selected="true" disabled="disabled">Choose dentist</option>
                                                </select>

                                                <input id="dentist1" type = "hidden" name = "dentist1" value = "" />
                                                <script type="text/javascript">
                                                    function setTextField(ddl) {
                                                        document.getElementById('dentist1').value = ddl.options[ddl.selectedIndex].text;
                                                    }
                                                </script>

                                                <input id="working_time_1" type = "hidden" name = "dentist1" value = "" />
                                                <script type="text/javascript">
                                                    function setTextField(ddl) {
                                                        document.getElementById('working_time_1').value = ddl.options[ddl.selectedIndex].text;
                                                    }
                                                </script>

                                                <br />
                                                <div id="working_time"></div>
<!--                                                <label class="control-label">Date</label>-->
                                                <input class="flatpickr required" rel="tooltip" name="DateAndTime" id="DateAndTime" type="text" placeholder="Choose date and time" data-mindate=today data-id="datetime">
                                            </div>
                                            <div id="ajaxLoader" style="display:none;position: relative;left:45%"><img src="assets/ajax-loader.gif" alt="loading..."></div>
                                            <br />
                                            <div id="result" style="margin-bottom:0;text-align: center"></div>
                                            <input style="position: relative;left:35%" type='button' class='btn btn-fill btn-primary btn-wd' name='check' id="check" value='check' />
                                        </div>
                                        <div class="col-sm-6 col-sm-offset-3" style="">
                                            <div class="form-group label-floating">
                                                <div class="highlight-1">
<!--                                                    <input type='button' class='btn btn-next btn-fill btn-primary btn-wd' name='check' id="check" style="left:28%;" value='Check' />-->
<!--                                                    <div id="ajaxLoader" style="display:none;position: relative;left:45%"><img src="assets/ajax-loader.gif" alt="loading..."></div>-->
<!--                                                    <br />-->
<!--                                                    <div id="result" style="margin-top: 20px;margin-bottom:0;text-align: center"></div>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="description">
                                    <div class="row">
                                        <h4 class="info-text"> Informations </h4>
                                        <div class="col-xs-12 col-sm-5 col-sm-offset-1">
                                            <img src="assets/clock-icon.png" style='background-color: rgba(245, 245, 245, 0.56);width:64px;height:64px;color:red;text-align: center;font-size: 30px;display: block;margin-left: auto;margin-right: auto'>
                                            <p style="text-align: center"><br />We have another important thing for you. If you confirm the appointment, two hours before it, we will send you an email notification in case you forgot an appointment</p>
                                        </div>
                                        <div class="col-xs-12 col-sm-4 col-sm-offset-1" style="box-shadow: 2px 2px 2px 0px rgba(0, 0, 0, 0.55)">
                                            <div class="form-group label-floating">
<!--                                                <label class="control-label">Appointment:</label>-->
<!--                                                <p class="description">"The place is really nice. We use it every sunday when we go fishing. It is so awesome."</p>-->
                                                <h6 style="text-align: center">Service</h6>
                                                <p style="text-align: center;color:darkgrey;font-size: 14px;" id="show_service"></p>
                                                <h6 style="text-align: center;">Dentist</h6>
                                                <p style="text-align: center;color:darkgrey;font-size: 14px;" id="show_dentist"></p>
                                                <h6 style="text-align: center" >Date and time</h6>
                                                <p style="text-align: center;color:darkgrey;font-size: 14px;" id="show_DateAndTime"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wizard-footer">
                                <div class="pull-right">
                                    <input type='button' class='btn btn-next btn-fill btn-primary btn-wd' name='next' id="next" value='next' />

                                    <input type='submit' class='btn btn-finish btn-fill btn-primary btn-wd' name='finish' value='Finish' />
                                </div>
                                <div class="pull-left">
                                    <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </div> <!-- wizard container -->
            </div>
        </div> <!-- row -->
    </div> <!--  big container -->



    <!--    <noscript><h3> You must have JavaScript enabled in order to use this order form. Please-->
    <!--        enable JavaScript and then reload this page in order to continue. </h3>-->
    <!--    <meta HTTP-EQUIV="refresh" content=0;url="javascriptNotEnabled.php"></noscript>-->






    <!-- CORE JAVASCRIPT -->
    <script src="jquery/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="javascript/jquery.bootstrap.js" type="text/javascript"></script>

    <!-- Flatpickr JAVASCRIPT -->
    <script src="flatpickr/js/application.js"></script>

    <script src="flatpickr/js/init.js"></script>

    <script src="flatpickr/js/flatpicker.js"></script>

    <script src="flatpickr/js/confirmDate.js"></script>

    <script src="flatpickr/js/weekSelect.js"></script>

    <script src="flatpickr/js/rangePlugin.js"></script>

    <script src="flatpickr/js/minMax.js"></script>

    <script src="flatpickr/js/flatpickr2.js"></script>

    <script src="flatpickr/js/theme.js"></script>

    <script>


        $( '.flatpickr' ).flatpickr({
            enableTime: true,
            dateFormat: "d-M-Y H:i",
            minDate: new Date().fp_incr(1),
            defaultHour: "08:00",
            minTime: "08:00",
            maxTime: "16:00",
            minuteIncrement: "30",
            disable: [
                function(date) {
                    // return true to disable
                    return (date.getDay() === 6 || date.getDay() === 0);

                }
            ],
            locale: {
                "firstDayOfWeek": 1 // start week on Monday
            }

        });
    </script>



    <!-- JAVASCRIPT -->
    <script src="javascript/login.js" type="text/javascript"></script>
    <script src="javascript/appointments.js" type="text/javascript"></script>

    <!-- JAVASCRIPT MODERNIZER -->
    <script src="javascript/modernizer.js"></script>

    <!-- JAVASCRIPT VALIDATION -->
    <script src="validation/jquery.validate.js" type="text/javascript"></script>

    <script>
        $(document).ready(function(){
            document.getElementById("DateAndTime").disabled=true;
            document.getElementById("next").disabled=true;
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#service').bind('change',function(){
                var serviceID = $(this).val();
                if(serviceID){
                    $.ajax({
                        type:'POST',
                        url:'ajaxData.php',
                        data:'service_id='+serviceID,
                        beforeSend: function(){ jQuery ("#ajaxLoader").show();  },
                        complete: function(){ jQuery("#ajaxLoader").hide(); },
                        success:function(html){
                            $('#dentist').html(html);
                            $('.flatpickr').flatpickr();
                            document.getElementById("DateAndTime").disabled=true;
                            $('#working_time').html('');
                            $('#result').html('');
                            document.getElementById("next").disabled=true;

                        }
                    });
                }else{
                    $('.flatpickr').flatpickr();
                }
            });

            $('#dentist').bind('change',function(){
                var dentist = $(this).val();
                if(dentist){
                    $.ajax({
                        type:'POST',
                        url:'ajaxDentistData.php',
                        data:'dentist_id='+dentist,
                        beforeSend: function(){ jQuery ("#ajaxLoader").show();  },
                        complete: function(){ jQuery("#ajaxLoader").hide(); },
                        success:function(html){
                            $('#working_time').html(html);
                            $('.flatpickr').html(html);
                            document.getElementById("DateAndTime").disabled=false;
                            $('#result').html('');
                            document.getElementById("next").disabled=true;
                        }
                    });
                }else{
                    $('.flatpickr').flatpickr();
                    document.getElementById("DateAndTime").disabled=true;
                }
            });

            $('#DateAndTime').bind('change',function () {
                $('#result').html('');
                document.getElementById("next").disabled=true;
            })


        });

    </script>

    <script>
        $('#check').click(function() {
            var val1 = $('#DateAndTime').val();
            var val2 = $('#service').val();
            var val3 = $('#dentist').val();
            $.ajax({
                type: 'POST',
                url: 'checkDate.php',
                data: { DateAndTime: val1, Service: val2, Dentist: val3 },
                beforeSend: function(){ jQuery ("#ajaxLoader").show();  },
                complete: function(){ jQuery("#ajaxLoader").hide(); },
                success: function(html) {
                    $('#result').html(html);
                }
            });
        });
    </script>

    <script>
        $('#service').bind('change',function(){
            $("#show_service").html($("#service option:selected").text());
            $("#service").change(function() {
                $("#show_service option:selected").html($(this).text());
            });
        });

        $('#dentist').bind('change',function(){
            $("#show_dentist").html($("#dentist option:selected").text());
            $("#dentist").change(function() {
                $("#show_dentist option:selected").html($(this).text());
            });
        });

        $('#DateAndTime').bind('change',function(){
            $("#show_DateAndTime").html($("#DateAndTime").val());
            $("#DateAndTime").change(function() {
                $("#show_DateAndTime").html($(this).val());
            });
        });




    </script>

<!--    <script>-->
<!--        $("#make-appointment *").attr("disabled", true).off('click');-->
<!--    </script>-->



</div>

</body>
</html>