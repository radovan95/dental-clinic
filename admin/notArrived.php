<?php
include '../db_config.php';
include '../functions/functions.php';

global $con;

header('Content-Type: text/plain');
$ajax = utf8_encode($_POST['data']); // Don't forget the encoding
$data = json_decode($ajax);

$reason = "Not arrived";

$appointmentId = mysqli_real_escape_string($con, $data->appointmentId);

$notArrived = "UPDATE appointment SET status = '2' WHERE appointment_id = $appointmentId";

$insertIntoCancelled = "INSERT INTO cancelled(a_id, reason)VALUES ('$appointmentId','$reason')";

mysqli_query($con, $notArrived);
mysqli_query($con, $insertIntoCancelled);