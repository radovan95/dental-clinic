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
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
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




        <div class="content mt-3" style="z-index:2;">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-xs-6 col-sm-12 col-md-12 col-lg-6 ">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Dentist</strong>
                            </div>
                            <div class="card-body">

                                <select data-placeholder="Choose a dentist..." id="dentists" name="dentists" class="standardSelect" tabindex="1" style="z-index: 1000">
                                    <option value=""></option>
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
                        </div>
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title">Active appointments</strong>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">First</th>
                                                <th scope="col">Last</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Patient number</th>
                                            </tr>
                                        </thead>
                                        <tbody id="active_body">

                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>

                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Finished appointments</strong>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">First</th>
                                        <th scope="col">Last</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Patient number</th>
                                    </tr>
                                    </thead>
                                    <tbody id="finished_body">

                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Cancelled appointments</strong>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">First</th>
                                        <th scope="col">Last</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Patient number</th>
                                    </tr>
                                    </thead>
                                    <tbody id="cancelled_body">

                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>


                </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <form method="post" action="addDentist.php" enctype="multipart/form-data">
                            <div class="card-header"><strong>Dentist</strong><small> Form</small></div>
                                <?php
                                if( isset($_SESSION['successMessage']) )
                                {
                                    echo $_SESSION['successMessage'];

                                    unset($_SESSION['successMessage']);
                                }
                                ?>
                            <div class="card-body card-block">
                                <div class="form-group"><label for="company" class=" form-control-label">First name</label><input type="text" name="first_name" id="first_name" placeholder="First name" class="form-control"></div>
                                <div class="form-group"><label for="vat" class=" form-control-label">Last name</label><input type="text" name="last_name" id="last_name" placeholder="Last name" class="form-control"></div>
                                <div class="form-group"><label for="service" class=" form-control-label">Service</label>
                                    <select data-placeholder="Choose a dentist..." id="service" name="service[]" multiple class="form-control standardSelect" tabindex="1" style="z-index: 1000">
                                        <option value=""></option>
                                        <?php
                                        $getDentist = "SELECT * FROM service WHERE name != 'consultation'";
                                        $run = mysqli_query($con,$getDentist);

                                        while ($get = mysqli_fetch_assoc($run))
                                        {
                                            $id = $get['service_id'];
                                            $name = $get['name'];

                                            echo "<option value='$id'>$name</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group"><label for="street" class=" form-control-label">Image</label><input type="file" id="image" name="image" class="form-control-file"></div>
                                <div class="form-group"><label for="street" class=" form-control-label">Proffesion</label><input type="text" name="proffesion" id="proffesion" placeholder="Enter proffesion" class="form-control"></div>
                                <div class="row form-group">
                                    <div class="col-8">
                                        <div class="form-group"><label for="city" class=" form-control-label">Email</label><input type="text" name="email" id="email" placeholder="Enter your email" class="form-control"></div>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-group"><label for="postal-code" class=" form-control-label">Password</label><input type="password" name="password" id="password" placeholder="Password" class="form-control"></div>
                                    </div>
                                </div>
                                <div class="form-group"><label for="country" class=" form-control-label">Phone</label><input type="text" name="phone" id="Phone" placeholder="Phone" class="form-control"></div>
                            </div>
                            <div class="card-footer">
                                <input type="submit" class="btn btn-success btn-sm">
                            </div>
                            </form>
                        </div>
                    </div>
            </div><!-- .animated -->
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
<script src="../jquery/jquery-3.3.1.min.js" type="text/javascript"></script>
<script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../javascript/jquery.bootstrap.js" type="text/javascript"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/main.js"></script>

<script src="assets/js/lib/data-table/datatables.min.js"></script>
<script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
<script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
<script src="assets/js/lib/data-table/datatables-init.js"></script>

<script src="assets/js/dashboard.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/lib/chosen/chosen.jquery.min.js"></script>

<script type="text/javascript">

    jQuery(document).ready(function($){
        $('#dentists').bind('change', function () {
            var dentistID = $(this).val();
            console.log(dentistID);
            if (dentistID) {
                $.ajax({
                    type: 'POST',
                    url: 'activeapp.php',
                    data: 'dentist_id=' + dentistID,
                    success: function (html) {
                        $('#active_body').html(html);
                    }
                });
            }
        });
    });

    jQuery(document).ready(function($){
        $('#dentists').bind('change', function () {
            var dentistID = $(this).val();
            console.log(dentistID);
            if (dentistID) {
                $.ajax({
                    type: 'POST',
                    url: 'finishedapp.php',
                    data: 'dentist_id=' + dentistID,
                    success: function (html) {
                        $('#finished_body').html(html);
                    }
                });
            }
        });
    });

    jQuery(document).ready(function($){
        $('#dentists').bind('change', function () {
            var dentistID = $(this).val();
            console.log(dentistID);
            if (dentistID) {
                $.ajax({
                    type: 'POST',
                    url: 'cancelledapp.php',
                    data: 'dentist_id=' + dentistID,
                    success: function (html) {
                        $('#cancelled_body').html(html);
                    }
                });
            }
        });
    });

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

<script type="text/javascript">
    jQuery(document).ready(function($){
        $('#bootstrap-data-table-export').DataTable();
    } );
</script>

</body>
</html>
