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
                        <img class="user-avatar rounded-circle" src="../assets/scott.jpg" alt="User Avatar">
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
                    <h1>HOME</h1>
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
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Delete working days</strong>
                            </div>
                            <div class="card-body">
                                <div id="message" style="display: none">
                                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                        <span class="badge badge-pill badge-success">Success</span>
                                        You successfully deleted the working day.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                                <select id="dentist" data-placeholder="Choose a dentist..." class="form-control" tabindex="1">
                                    <option value="">Choose a dentist...</option>
                                    <?php
                                    $getDentist = "SELECT * FROM dentist";
                                    $run = mysqli_query($con,$getDentist);

                                    while ($get = mysqli_fetch_assoc($run))
                                    {
                                        $id = $get['dentist_id'];
                                        $first_name = $get['first_name'];
                                        $last_name = $get['last_name'];

                                        echo "<option value='$id'>$first_name $last_name</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div id="working_times" style="margin-left: 15px" "></div>
                            <div id='buttons' class="card-body" style="display: none;">
                                <button type="button"  class="btn btn-outline-primary btn-sm m-0 waves-effect delete">Delete</button>
                            </div>
                        </div>
                    </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Update working days</strong>
                        </div>
                        <div class="card-body">
                            <div id="update_message" style="display: none">
                                <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                    <span class="badge badge-pill badge-success">Success</span>
                                    You successfully updated the working day.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                            <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show" id="error_empty" style="display: none;margin-top: 15px">
                                <span class="badge badge-pill badge-danger">Error</span>
                                Please fill all the fields.
                            </div>
                            <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show" id="error_ending" style="display: none;margin-top: 15px">
                                <span class="badge badge-pill badge-danger">Error</span>
                                The ending time must be higher than the starting time.
                            </div>
                            <select id="updateDentist" data-placeholder="Choose a dentist..." class="form-control" tabindex="1">
                                <option value="">Choose a dentist ...</option>
                                <?php
                                $getDentist = "SELECT * FROM dentist";
                                $run = mysqli_query($con,$getDentist);

                                while ($get = mysqli_fetch_assoc($run))
                                {
                                    $id = $get['dentist_id'];
                                    $first_name = $get['first_name'];
                                    $last_name = $get['last_name'];

                                    echo "<option value='$id'>$first_name $last_name</option>";
                                }
                                ?>
                            </select>

                            <div id="select_times" style="margin-top: 15px;display: none">
                                <select id="days" class="form-control" data-placeholder="Choose a dentist..." tabindex="1" name="days">
                                    <option value="">Choose a day...</option>
                                </select>

                                <input style="margin-top: 20px;width: 50%" class="flatpickr flatpickr-input active from" name="from" type="text" placeholder="Select from.." data-id="timePicker" readonly="readonly">
                                <input style="margin-top: 20px;width: 50%" class="flatpickr flatpickr-input active to" name="to" type="text" placeholder="Select to.." data-id="timePicker" readonly="readonly">


                                <div id='update_button' style="display: none; margin-top: 15px">
                                    <button type="button"  class="btn btn-outline-primary btn-sm m-0 waves-effect update">Update</button>
                                </div>

                            </div>
                            </div>
                        </div>

                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Insert working days</strong>
                        </div>
                        <div class="card-body">
                            <div id="insertedNew" style="display: none">
                                <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                    <span class="badge badge-pill badge-success">Success</span>
                                    You successfully inserted the working day.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                            <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show" id="error_fields" style="display: none;margin-top: 15px">
                                <span class="badge badge-pill badge-danger">Error</span>
                                Please fill all the fields.
                            </div>
                            <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show" id="error_time" style="display: none;margin-top: 15px">
                                <span class="badge badge-pill badge-danger">Error</span>
                                The ending time must be higher than the starting time.
                            </div>
                            <select id="insertDentist" data-placeholder="Choose a dentist..." class="form-control" tabindex="1">
                                <option value="">Choose a dentist ...</option>
                                <?php
                                $getDentist = "SELECT * FROM dentist";
                                $run = mysqli_query($con,$getDentist);

                                while ($get = mysqli_fetch_assoc($run))
                                {
                                    $id = $get['dentist_id'];
                                    $first_name = $get['first_name'];
                                    $last_name = $get['last_name'];

                                    echo "<option value='$id'>$first_name $last_name</option>";
                                }
                                ?>
                            </select>

                            <select id="weekdays" style="display: none; margin-top: 15px" class="form-control" data-placeholder="Choose a day..." tabindex="1" name="days">
                                <option value="">Choose a day...</option>
                            </select>

                            <input style="margin-top: 20px;width: 50%; display: none" name="from_time" class="flatpickr flatpickr-input active from_time" type="text" placeholder="Select from.." data-id="timePicker" readonly="readonly">
                            <input style="margin-top: 20px;width: 50%; display: none" name="to_time" class="flatpickr flatpickr-input active to_time" type="text" placeholder="Select to.." data-id="timePicker" readonly="readonly">


                            <div id='insert_button' style="display: none;margin-top: 15px">
                                <button type="button"  class="btn btn-outline-primary btn-sm m-0 waves-effect insert">Insert</button>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Change cancelling time</strong>
                        </div>
                        <div class="card-body">
                            <h5 style="font-family: 'Bebas Neue Regular';">Current: <?php cancellingTime(); ?></h5>
                            <br />
                            <div id="update_cancel" style="display: none">
                                <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                    <span class="badge badge-pill badge-success">Success</span>
                                    You successfully updated the cancelling time.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                            <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show" id="empty_cancel" style="display: none;margin-top: 15px">
                                <span class="badge badge-pill badge-danger">Error</span>
                                The cancellation input can't be empty
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show" id="notAnumber" style="display: none;margin-top: 15px">
                                <span class="badge badge-pill badge-danger">Error</span>
                                The cancellation input must contain only numbers
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div style="text-align: center">
                                <input type="text" id="cancel" name="cancel" placeholder="Enter the cancelling time">
                                <div id='cancel_button' style="margin-top: 15px;margin-left: auto;margin-right: auto;text-align: center">
                                    <button type="button"  class="btn btn-outline-primary btn-sm m-0 waves-effect submitCancel">Submit</button>
                                </div>
                            </div>
                        </div>

                    </div>
            </div>



                </div>

            </div><!-- .animated -->



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
    $('.submitCancel').click(function () {
        var cancelValue = $("#cancel").val();
        var back = 'Value is empty';

        $.ajax({
            type: "POST",
            url: "change_cancel_time.php",
            data: {cancel_value: cancelValue },
            cache: false,

            success: function(data){
                if(data.indexOf("Empty") > -1) {
                    localStorage.setItem("emptyCancel", data.success);
                    window.location.reload();
                }else if(data.indexOf("Not a number") > -1 ) {
                    localStorage.setItem("notAnumber", data.success);
                    window.location.reload();
                }
                else {
                    localStorage.setItem("cancelTimer", data.success);
                    window.location.reload();
                }

            }
        });
    })
</script>



<script>
    jQuery(document).ready(function($){
        $('#dentist').bind('change', function () {
            var dentistID = $(this).val();
            if (dentistID) {
                $.ajax({
                    type: 'POST',
                    url: 'get_working_time.php',
                    data: 'dentist_id=' + dentistID,
                    success: function (html) {
                        $('#working_times').html(html);
                        $('#buttons').show();
                        if( !$.trim( $('#working_times').html() ).length ) {
                            $('.delete').hide();
                        }
                    }
                });
            }
            else {
                $('#working_times').html('');
                $('#buttons').hide();
            }
        });
    });
</script>

<script>
    jQuery(document).ready(function($){
        $('#updateDentist').bind('change', function () {
            var updateDentist = $(this).val();
            if (updateDentist) {
                $.ajax({
                    type: 'POST',
                    url: 'update_working_time.php',
                    data: 'dentist_id=' + updateDentist,
                    success: function (html) {
                        $('#select_times').show();
                        $('#days').html(html);
                        $('#update_button').show();
                        $('input[name=from]').val('');
                        $('input[name=to]').val('');
                        $('#error').hide();
                    }
                });
            }else{
                $('#select_times').hide();
                $('input[name=from]').val('');
                $('input[name=to]').val('');
                $('#update_button').hide();
            }
        });
    });
</script>

<script>
    $(document).ready(function(){
        $('#insertDentist').bind('change', function () {
            var insertDentist = $(this).val();
            var opt = 'There is no days to insert';
            if (insertDentist) {
                $.ajax({
                    type: 'POST',
                    url: 'insert_working_days.php',
                    data: 'dentist_id=' + insertDentist,
                    success: function (html) {
                        $('#weekdays').html(html);
                        $('#weekdays').show();
                        $('#insert_button').show();
                        $('#error_time').hide();
                        $('input[name=from_time]').val('');
                        $('input[name=to_time]').val('');
                        if ($('#weekdays option:contains('+ opt +')').length) {
                            $('.from_time').hide();
                            $('.to_time').hide();
                            $('#insert_button').hide();
                        }
                        else{
                            $('.from_time').show();
                            $('.to_time').show();
                        }
                    }
                });
            }else{
                $('#weekdays').hide();
                $('input[name=from_time]').val('');
                $('input[name=to_time]').val('');
                $('.from_time').hide();
                $('.to_time').hide();
                $('#insert_button').hide();
            }
        });
    });
</script>




<script>
    $('.delete').click(function () {

        var days = [];
        var dentId = $('#dentId').val();

        $("input:checkbox[name=working]:checked").each(function(){
            days.push($(this).val());
        });

        var jsonString = JSON.stringify(days);

        $.ajax({
            type: "POST",
            url: "delete_day.php",
            data: {data : jsonString, dentist_id: dentId },
            cache: false,

            success: function(data){
                    localStorage.setItem("deleted", data.success);
                    window.location.reload();
            }
        });


    })
</script>

<script>

    $('.to').on('input', function() {
        var new_from = $('.from').val();
        var new_to = $(this).val();

        if(new_to > new_from){
            $('#error').hide();
        }
    });
</script>

<script>

    $('.to_time').on('input', function() {
        var new_from = $('.from_time').val();
        var new_to = $(this).val();

        if(new_to > new_from){
            $('#error_time').hide();
        }
    });
</script>


<script>
    $('.insert').click(function () {

            $('#error_time').hide();
            var dentistId = $('#insertDentist').val();
            var dayValue = $('#weekdays').val();
            var fromValue = $('.from_time').val();
            var toValue = $('.to_time').val();

            var data = {
                dentist_id: dentistId,
                day: dayValue,
                from: fromValue,
                to: toValue
            };


            $.ajax({
                url: "new_working_day.php",
                dataType: "text",
                type: "POST",
                data: {data: JSON.stringify(data)}, // Our valid JSON string
                success: function (data, status, xhr) {
                   if(data.indexOf("Please fill all the fields") > -1) {
                        localStorage.setItem("empty_fields", data.success);
                        window.location.reload();
                    }else if(data.indexOf("The ending time must be higher than the starting time") > -1 ) {
                        localStorage.setItem("wrongTime", data.success);
                        window.location.reload();
                    }
                    else {
                        localStorage.setItem("insertedNewDay", data.success);
                        window.location.reload();
                    }
                },
                error: function (xhr, status, error) {
                    //...
                }
            });
    });


</script>

<script>
    $( '.from' ).flatpickr({
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        minuteIncrement: "30",
        minDate: "08:00",
        maxDate: "20:00"

    });
</script>

<script>
    $( '.to' ).flatpickr({
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        minuteIncrement: "30",
        minDate: "08:00",
        maxDate: "20:00"

    });
</script>

<script>
    $( '.from_time' ).flatpickr({
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        minuteIncrement: "30",
        minDate: "08:00",
        maxDate: "20:00"

    });
</script>

<script>
    $( '.to_time' ).flatpickr({
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        minuteIncrement: "30",
        minDate: "08:00",
        maxDate: "20:00"

    });
</script>

<script>
    $('.update').click(function () {

            var dentistId = $('#updateDentist').val();
            var dayValue = $('#days').val();
            var fromValue = $('.from').val();
            var toValue = $('.to').val();

            var data = {
                dentist_id: dentistId,
                day: dayValue,
                from: fromValue,
                to: toValue
            };


            $.ajax({
                url: "update_day.php",
                dataType: "text",
                type: "POST",
                data: {data: JSON.stringify(data)}, // Our valid JSON string
                success: function (data) {
                    if(data.indexOf('Please fill all the fields') > -1){
                        localStorage.setItem("emptyData", data.success);
                        window.location.reload();
                    } else if(data.indexOf('The ending time must be higher than the starting time') > -1) {
                        localStorage.setItem("endingTime", data.success);
                        window.location.reload();
                    } else {
                        localStorage.setItem("updated", data.success);
                        window.location.reload();
                    }
                },
                error: function (xhr, status, error) {
                    //...
                }
            });




    })
</script>

<script>
    $(document).ready(function () {
        if (localStorage.getItem("empty_fields")) {
            $('#error_fields').show();
            localStorage.clear();
        }
    });
</script>

<script>
    $(document).ready(function () {
        if (localStorage.getItem("wrongTime")) {
            $('#error_time').show();
            localStorage.clear();
        }
    });
</script>

<script>
    $(document).ready(function () {
        if (localStorage.getItem("endingTime")) {
            $('#error_ending').show();
            localStorage.clear();
        }
    });
</script>

<script>
    $(document).ready(function () {
        if (localStorage.getItem("emptyData")) {
            $('#error_empty').show();
            localStorage.clear();
        }
    });
</script>

<script>
    $(document).ready(function () {
        if (localStorage.getItem("notAnumber")) {
            $('#notAnumber').show();
            localStorage.clear();
        }
    });
</script>

<script>
    $(document).ready(function () {
        if (localStorage.getItem("emptyCancel")) {
            $('#empty_cancel').show();
            localStorage.clear();
        }
    });
</script>

<script>
    $(document).ready(function () {
        if (localStorage.getItem("updated")) {
            $('#update_message').show();
            localStorage.clear();
        }
    });
</script>

<script>
    $(document).ready(function () {
        if (localStorage.getItem("cancelTimer")) {
            $('#update_cancel').show();
            localStorage.clear();
        }
    });
</script>

<script>
    $(document).ready(function () {
        if (localStorage.getItem("insertedNewDay")) {
            $('#insertedNew').show();
            localStorage.clear();
        }
    });
</script>


<script>
    $(document).ready(function () {
        if (localStorage.getItem("deleted")) {
            $('#message').show();
            localStorage.clear();
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
