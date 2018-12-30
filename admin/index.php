<?php
session_start();

if(!isset($_SESSION['email'])) {
    header('location: ../dentist_login.php');
}

include '../db_config.php';
include '../functions/functions.php';
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dental Clinic - Admin</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Flatpickr -->
    <link rel="stylesheet" href="../flatpickr/css/site.css">

    <link rel="stylesheet" href="../flatpickr/css/flatpicker.css">

    <link rel="stylesheet" href="../flatpickr/css/confirmDate.css">

    <link rel="shortcut icon" href="../assets/dental.png">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">
    <link rel="stylesheet" href="assets/css/lib/chosen/chosen.min.css">
    <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>


        <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.php">DENTAL CLINIC</a>
                <a class="navbar-brand hidden" href="index.php"><img src="images/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.php" style="text-align: center">Home</a>
                    </li>
                    <h3 class="menu-title">MENU</h3><!-- /.menu-title -->
                    <?php if($_SESSION['email'] == "scottriley@dental.com") { ?>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dentists</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-user"></i><a href="profile.php">Profile</a></li>
                        </ul>
                    </li>
                    <?php } ?>
                    <li class=" dropdown">
                        <a href="dentist_appointments.php" aria-haspopup="true" aria-expanded="false">Appointments</a>
                    </li>
                    <?php if($_SESSION['email'] == "scottriley@dental.com") { ?>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Settings</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-exchange"></i><a href="working_cancelling.php">Working / canceling time</a></li>
                        </ul>
                    </li>
                    <?php } ?>

                    <h3 class="menu-title"></h3><!-- /.menu-title -->

            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-12">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $_SESSION['email'] ?>
                        </a>

                        <div class="user-menu dropdown-menu">

                                <a class="nav-link" href="#"><i class="fa fa -cog"></i>Settings</a>

                                <a class="nav-link" href="admin_logout.php"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>HOME</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

            <div class="all">
                <div class="refreshDiv">
                    <div class="col-sm-6 col-lg-3">
                        <div class="card text-white bg-flat-color-1">
                            <div class="card-body pb-0">
                                <h4 class="mb-0">
                                    <span class="count"><?php getDentists(); ?></span>
                                </h4>
                                <p class="text-light">Dentists</p>
                            </div>

                        </div>
                    </div>
                    <!--/.col-->

                    <div class="col-sm-6 col-lg-3">
                        <div class="card text-white bg-flat-color-2">
                            <div class="card-body pb-0">

                                <h4 class="mb-0">
                                    <span class="count"><?php getPatients(); ?></span>
                                </h4>
                                <p class="text-light">Patients</p>


                            </div>
                        </div>
                    </div>
                    <!--/.col-->

                    <div class="col-sm-6 col-lg-3">
                        <div class="card text-white bg-flat-color-3">
                            <div class="card-body pb-0">
                                <div class="dropdown float-right">

                                </div>
                                <h4 class="mb-0">
                                    <span class="count"><?php getActive(); ?></span>
                                </h4>
                                <p class="text-light">Active appointments</p>

                            </div>


                        </div>
                    </div>
                    <!--/.col-->

                    <div class="col-sm-6 col-lg-3">
                        <div class="card text-white bg-flat-color-4">
                            <div class="card-body pb-0">
                                <div class="dropdown float-right">

                                </div>
                                <h4 class="mb-0">
                                    <span class="count"><?php getDone(); ?></span>
                                </h4>
                                <p class="text-light">Done appointments</p>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content mt-3">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="patientInserted" style="display: none">
                                <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                    <span class="badge badge-pill badge-success">Success</span>
                                    You successfully inserted the appointment .
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title">Patients</strong>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Patient number</th>
                                            <th>Make appointment</th>
                                            <th>History</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            getPatient();
                                            ?>
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div><!-- .animated -->
            </div><!-- .content -->
            <!--/.col-->

            <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                <form>
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="largeModalLabel">Add appointment</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                            <div class="offset-lg-1 col-lg-10 modal-body">
                                <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show appointmentError" style="display:none">
                                    <span class="badge badge-pill badge-danger">Error</span>
                                    Please fill all the fields !
                                </div>
                                <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show patientError" style="display:none">
                                    <span class="badge badge-pill badge-danger">Error</span>
                                    This patient already has an appointment .
                                </div>
                                <select name="service"  rel="tooltip" id="service" class="required">
                                    <option selected="true" disabled="disabled" value="">Choose a service..</option>
                                    <?php
                                    $getDentist = "SELECT * FROM service";
                                    $run = mysqli_query($con,$getDentist);

                                    while ($get = mysqli_fetch_assoc($run))
                                    {
                                        $service_id = $get['service_id'];
                                        $name = $get['name'];

                                        echo "<option value='$service_id'>$name</option>";
                                    }
                                    ?>
                                </select>

                                <select name="dentist" rel="tooltip" id="dentist_select" class="required">
                                    <option value="">Choose a dentist..</option>
                                </select>
                                <input class="flatpickr required" style="width: 100%;" rel="tooltip" name="DateAndTime" id="DateAndTime" type="text" placeholder="Choose date and time" data-mindate=today data-id="datetime">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="button" id="addPatient" class="btn btn-primary">Confirm</button>
                            </div>
                        </div>

                </div>
                </form>
            </div>

            <div class="modal fade" id="checkModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                <form>
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="largeModalLabel">Patient history</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="col-lg-12 modal-body" id="checkHistory">
                                <div class="table-responsive">
                                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Date & Time</th>
                                            <th>Appointment Details</th>
                                            <th>Note / Reason</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody id="history">
                                        <tr>

                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>



            <!--<div class="col-xl-6">-->
                <!--<div class="card">-->
                    <!--<div class="card-body">-->
                        <!--<div class="twt-feed blue-bg">-->

                            <!--<div class="media">-->
                                <!--<a href="#">-->
                                    <!--<img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="images/admin.jpg">-->
                                <!--</a>-->
                                <!--<div class="media-body">-->
                                    <!--<h2 class="text-white display-6">Jim Doe</h2>-->
                                    <!--<p class="text-light">Project Manager</p>-->
                                <!--</div>-->
                            <!--</div>-->
                        <!--</div>-->
                        <!--<div class="weather-category twt-category">-->
                            <!--<ul>-->
                                <!--<li class="active">-->
                                    <!--<h5>750</h5>-->
                                    <!--patients-->
                                <!--</li>-->
                                <!--<li>-->
                                    <!--<h5>865</h5>-->
                                    <!--appointments-->
                                <!--</li>-->
                                <!--<li>-->
                                    <!--<h5>3645</h5>-->
                                    <!--finished appointments-->
                                <!--</li>-->
                            <!--</ul>-->
                        <!--</div>-->

                    <!--</div>-->
                <!--</div>-->
            <!--</div>-->

           <div class="col-xl-3 col-lg-6">

            </div>


            <div class="col-xl-3 col-lg-6">

            </div>


            <div class="col-xl-3 col-lg-6">

            </div>

            <div class="col-xl-3 col-lg-6">

            </div>

            <div class="col-xl-6">

            </div>


        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->


    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>

    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/datatables-init.js"></script>
    <script src="assets/js/lib/chosen/chosen.jquery.min.js"></script>

    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/widgets.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.min.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>

        <script src="../flatpickr/js/application.js"></script>

        <script src="../flatpickr/js/init.js"></script>

        <script src="../flatpickr/js/flatpicker.js"></script>

        <script src="../flatpickr/js/confirmDate.js"></script>

        <script src="../flatpickr/js/weekSelect.js"></script>

        <script src="../flatpickr/js/rangePlugin.js"></script>

        <script src="../flatpickr/js/minMax.js"></script>

        <script src="../flatpickr/js/flatpickr2.js"></script>

        <script src="../flatpickr/js/theme.js"></script>

        <script>
            $(document).ready(function () {
                setInterval(function () {
                    $('.all').load(' .refreshDiv');
                },10000)
            })
        </script>

        <script>
            $(document).ready(function () {
                $('.modal').on('show.bs.modal', function () {
                    if ($(document).height() > $(window).height()) {
                        // no-scroll
                        $('body').addClass("modal-open-noscroll");
                    }
                    else {
                        $('body').removeClass("modal-open-noscroll");
                    }
                });
                $('.modal').on('hide.bs.modal', function () {
                    $('body').removeClass("modal-open-noscroll");
                });
            })
        </script>

        <script>

            var checkNumber;

            function checkId(id)
            {
                checkNumber = document.getElementById('patient_number_'+id).value;
                return checkNumber;
            }

        </script>

        <script>

            var patientNumber;

            function patient_number(id)
            {
                patientNumber = document.getElementById('patient_number_'+id).value;
                return patientNumber;
            }

        </script>



        <script>



            $('.check').click(function() {

                var data = {
                    patientNumber: patientNumber
                };

                $.ajax({
                    url: "checkHistory.php",
                    dataType: "text",
                    type: "POST",
                    data: {data: JSON.stringify(data)}, // Our valid JSON string
                    success: function (html) {
                        $('#history').html(html);
                    },
                    error: function (xhr, status, error) {
                        //...
                    }
                });

            });


        </script>

        <script>

        </script>

        <script>

            $('#addPatient').click(function() {

                var x = $('#DateAndTime').val();
                console.log(x);

                var data = {
                    service: $('#service').val(),
                    dentist: $('#dentist_select').val(),
                    pickedDate: $('#DateAndTime').val(),
                    patientNumber: patientNumber
                };
                var options = {
                    url: "addAppointment.php",
                    dataType: "text",
                    type: "POST",
                    data: {data: JSON.stringify(data)}, // Our valid JSON string
                    success: function (data, status, xhr) {
                        if(data.indexOf("Please fill all the fields") > -1) {
                            $('.appointmentError').show();
                        } else if(data.indexOf("This patient already has an appointment") > -1) {
                            $('.patientError').show();
                        } else {
                            localStorage.setItem("addPatient", data.success);
                            window.location.reload();
                        }
                    },
                    error: function (xhr, status, error) {
                        //...
                    }
                };
                $.ajax(options);
            });
        </script>

        <script>
            $(document).ready(function () {
                if (localStorage.getItem("addPatient")) {
                    $('#patientInserted').show();
                    localStorage.clear();
                }
            });
        </script>

        <script>
            document.getElementById("DateAndTime").disabled=true;

            $('#service').bind('change',function(){
                var service = $(this).val();
                if(service){
                    $.ajax({
                        type:'POST',
                        url:'checkService.php',
                        data:'service_id='+service,
                        success:function(html){
                            $('#dentist_select').html(html);
                            $('.flatpickr').flatpickr();
                            document.getElementById("DateAndTime").disabled=true;
                        }
                    });
                }else{
                    $('.flatpickr').flatpickr();
                    document.getElementById("DateAndTime").disabled=false;
                    $("#dentist_select").html();
                }
            });
        </script>


        <script>

            $('#dentist_select').bind('change',function(){
                var dentist = $(this).val();
                if(dentist){
                    $.ajax({
                        type:'POST',
                        url:'checkDentist.php',
                        data:'dentist_id='+dentist,
                        success:function(html){
                            $('.flatpickr').html(html);
                            document.getElementById("DateAndTime").disabled=false;
                        }
                    });
                }else{
                    $('.flatpickr').flatpickr();
                    document.getElementById("DateAndTime").disabled=false;

                }
            });



        </script>




        <script type="text/javascript">
            $(document).ready(function() {
                $('#bootstrap-data-table-export').DataTable();
            } );
        </script>

        <script>
            jQuery(document).ready(function() {
                jQuery(".standardSelect").chosen({
                    disable_search_threshold: 10,
                    no_results_text: "Oops, nothing found!",
                    width: "100%"
                });
            });
        </script>

</body>
</html>
