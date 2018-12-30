<?php
session_start();
include '../db_config.php';
include '../functions/functions.php';

global $con;

header('Content-Type: text/plain');
$ajax = utf8_encode($_POST['data']); // Don't forget the encoding
$data = json_decode($ajax);

$service_id = mysqli_real_escape_string($con, $data->service);
$dentist = mysqli_real_escape_string($con, $data->dentist);
$date = mysqli_real_escape_string($con, $data->pickedDate);
$patient_number = mysqli_real_escape_string($con, $data->patientNumber);



if($service_id == NULL || empty($dentist) || empty($date) || empty($patient_number))
{
    echo "Please fill all the fields";
    exit();
}

$result = ($con->query($check_appointment = "SELECT a.*, p.* FROM appointment a JOIN patient p ON a.p_id = p.patient_id WHERE patient_number = '$patient_number' AND status = '0'"));

if($result-> num_rows > 0 )
{
    echo "This patient already has an appointment !";
    exit();
}

$getData = "SELECT * FROM patient WHERE patient_number = '$patient_number'";

$row_data = mysqli_query($con, $getData);

while($render = mysqli_fetch_assoc($row_data))
{
    $id = $render['patient_id'];
    $f_name = $render['first_name'];
    $l_name = $render['last_name'];
    $email = $render['email'];
    $address = $render['address'];
}

$date = date("Y-m-d H:i:s",strtotime(str_replace('/','-',$date)));


$insertData = "INSERT INTO appointment (s_id, d_id, p_id, first_name, last_name, email, address, datetime)
               VALUES ('$service_id','$dentist' , '$id' , '$f_name', '$l_name', '$email', '$address', '$date')";


mysqli_query($con, $insertData) or mysqli_errno($con);

 ?>