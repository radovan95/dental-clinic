<?php
include '../db_config.php';
include '../functions/functions.php';

global $con;

header('Content-Type: text/plain');
$ajax = utf8_encode($_POST['data']); // Don't forget the encoding
$data = json_decode($ajax);

$appointmentId = mysqli_real_escape_string($con, $data->appointmentId);

echo $appointmentId;

$getPatient = "UPDATE appointment SET status = '1' WHERE appointment_id = '$appointmentId'";

mysqli_query($con, $getPatient);



?>

