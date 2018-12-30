<?php
include '../db_config.php';
include '../functions/functions.php';

global $con;
$dentist = mysqli_real_escape_string($con,$_POST['dentist_id']);

$dentist = $_POST['dentist_id'];

if($dentist) {
    $get_pro = "SELECT working_time FROM dentist WHERE dentist_id = $dentist  ";

    $run_pro = mysqli_query($con, $get_pro);

    $i = 0;

    while ($row_pro = mysqli_fetch_array($run_pro)) {
        $working_time = $row_pro ['working_time'];
    }

    $i++;

    $working_time_unserialized = unserialize($working_time);


    $array = json_decode(json_encode($working_time_unserialized), true);


    foreach ($array as $key => $value) {
        echo '<option value='.$array[$key]['day'].'>'.$array[$key]['day'].'</option>';
    }

}