<?php
session_start();
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
    <meta name="description" content="Dental Clinic - Admin">
    <meta name="viewport" content="width=device-width, initial-scale=1">


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
                        <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
                    </a>

                    <div class="user-menu dropdown-menu">

                        <a class="nav-link" href="#"><i class="fa fa -cog"></i>Settings</a>

                        <a class="nav-link" href="#"><i class="fa fa-power -off"></i>Logout</a>
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
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">

        <!--<div class="col-sm-12">-->
        <!--<div class="alert  alert-success alert-dismissible fade show" role="alert">-->
        <!--<span class="badge badge-pill badge-success">Success</span> You successfully read this important alert message.-->
        <!--<button type="button" class="close" data-dismiss="alert" aria-label="Close">-->
        <!--<span aria-hidden="true">&times;</span>-->
        <!--</button>-->
        <!--</div>-->
        <!--</div>-->



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


        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">


                        <div class="col-lg-12" id="reload">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Appointments</h4>
                                </div>
                                <div class="card-body">
                                    <div id="message" style="display: none">
                                        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                            <span class="badge badge-pill badge-success">Success</span>
                                                You successfully updated the appointment!
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="default-tab">
                                        <nav>
                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Active</a>
                                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Finished</a>
                                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Cancelled</a>
                                            </div>
                                        </nav>
                                        <div class="tab-content pl-3 pt-2" id="nav-tabContent ">
                                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                                <div class="table-responsive">
                                                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                                        <thead>
                                                        <tr>
                                                            <th>Full name</th>
                                                            <th>E-mail</th>
                                                            <th>Phone</th>
                                                            <th>Date</th>
                                                            <th>Patient Number</th>
                                                            <th id="status">Status</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody id="active">
                                                            <?php DentistAppointmentsActive(); ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                                <div class="table-responsive">
                                                <table id="bootstrap-data-table" class="table table-striped table-bordered ">
                                                    <thead>
                                                    <tr>
                                                        <th>Full name</th>
                                                        <th>E-mail</th>
                                                        <th>Phone</th>
                                                        <th>Date</th>
                                                        <th>Patient Number</th>
                                                        <th>Note</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="finished">
                                                        <?php DentistAppointmentFinished() ?>
                                                    </tbody>
                                                </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                                <div class="table-responsive">
                                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th>Full name</th>
                                                        <th>E-mail</th>
                                                        <th>Phone</th>
                                                        <th>Date</th>
                                                        <th>Patient number</th>
                                                        <th>Reason</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="cancelled">
                                                        <?php DentistAppointmentCancelled() ?>
                                                    </tbody>
                                                </table>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
        <!--/.col-->



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

<script src="../jquery/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/main.js"></script>

<script src="assets/js/lib/data-table/datatables.min.js"></script>
<script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
<script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
<script src="assets/js/lib/data-table/datatables-init.js"></script>
<script src="assets/js/lib/chart-js/Chart.bundle.js"></script>
<script src="assets/js/dashboard.js"></script>
<script src="assets/js/widgets.js"></script>
<script src="assets/js/lib/vector-map/jquery.vmap.js"></script>
<script src="assets/js/lib/vector-map/jquery.vmap.min.js"></script>
<script src="assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
<script src="assets/js/lib/vector-map/country/jquery.vmap.world.js"></script>

<script>

    var activeCheck;

    function number(id)
    {
        activeCheck = document.getElementById('arrived_'+id).value;
        return activeCheck;
    }

    var appointmentId;

    function appId(id)
    {
        appointmentId = document.getElementById('appointmentId_'+id).value;
        return appointmentId;
    }

    var buttonId;

    function button(id)
    {
        buttonId = $(id).attr('id');
        return buttonId;
    }

    var noteId;

    function note(id) {
        noteId = $(id).attr('id');
        return noteId;
    }

    var note_Area;

    function noteArea(id) {
        note_Area = $(id).attr('id');
    }

</script>

<script>
    $('.arrived').click(function() {

        $('#' + buttonId).hide();
        $('#' + noteId).show();

    });
</script>

<script>
    $('.notArrived').click(function () {
        var data = {
            appointmentId: activeCheck
        };

        $.ajax({
            url: "notArrived.php",
            dataType: "text",
            type: "POST",
            data: {data: JSON.stringify(data)}, // Our valid JSON string
            success: function (html) {
                localStorage.setItem("NotArrived", data.success);
                window.location.reload();
            },
            error: function (xhr, status, error) {
                //...
            }
        });
    })
</script>

<script>


        $(document).on("click", ".submit", function () {

            console.log('da');

            var noteArea = $('#' + note_Area).val();

            var data = {
                appointmentId: appointmentId,
                noteArea: noteArea
            };

            $.ajax({
                url: "note.php",
                dataType: "text",
                type: "POST",
                data: {data: JSON.stringify(data)}, // Our valid JSON string
                success: function (data) {
                        localStorage.setItem("message", data.success);
                        window.location.reload();
                },
                error: function (xhr, status, error) {
                    //...
                }

            });
        });

</script>

<script>
    $(document).ready(function () {
        if (localStorage.getItem("NotArrived")) {
            $('#message').show();
            localStorage.clear();
        }
    });
</script>


<script>
    $(document).ready(function () {
        if (localStorage.getItem("message")) {
            $('#message').show();
            localStorage.clear();
        }
    });
</script>


<script>
    ( function ( $ ) {
        "use strict";

        jQuery( '#vmap' ).vectorMap( {
            map: 'world_en',
            backgroundColor: null,
            color: '#ffffff',
            hoverOpacity: 0.7,
            selectedColor: '#1de9b6',
            enableZoom: true,
            showTooltip: true,
            values: sample_data,
            scaleColors: [ '#1de9b6', '#03a9f5' ],
            normalizeFunction: 'polynomial'
        } );
    } )( jQuery );
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#bootstrap-data-table-export').DataTable();
    } );
</script>

</body>
</html>
