<?php
session_start();
include 'db_config.php';
include 'functions/functions.php';


if(isset($_POST['submit'])) {
    $day = mysqli_real_escape_string($con,$_POST['day']);
    $from = mysqli_real_escape_string($con,$_POST['from']);
    $to = mysqli_real_escape_string($con,$_POST['to']);

    $get_pro = "SELECT working_time FROM dentist WHERE dentist_id = 1";

    $run_pro = mysqli_query($con, $get_pro);

    while ($row_pro = mysqli_fetch_array($run_pro)) {
        $working_time = $row_pro ['working_time'];
    }
    $working_time_unserialized = unserialize($working_time);

    $array = json_decode(json_encode($working_time_unserialized), true);

    foreach ($array as $key => $value) {
        if ($key == $day) {
            $array[$key]['from'] = $from;
            $array[$key]['to'] = $to;
        }
    }

    $working_time_new = serialize($array);

    $sql = "UPDATE dentist SET working_time = '$working_time_new' WHERE dentist_id = 1;";

    mysqli_query($con,$sql) or die(mysqli_error($con));
}