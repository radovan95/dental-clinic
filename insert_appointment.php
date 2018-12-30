<?php
session_start();
include ('db_config.php');
global $con;

$date = $_POST['DateAndTime'];
$dentist = $_POST['dentist'];
$services = $_POST['service'];
$day = date('l', strtotime($date));

if($services == "default")
{
    echo "error";
}

if($dentist == "0")
{
    echo "error";
}

$sql = "SELECT * FROM users WHERE email = '".$_SESSION['email'] ."'";

$run_pro = mysqli_query($con, $sql);


while ($row_pro = mysqli_fetch_array($run_pro)) {

    $id_user = $row_pro['user_id'];
}

$sql = "SELECT * FROM patient WHERE u_id = $id_user ";

$run_pro = mysqli_query($con, $sql);


while ($row_pro = mysqli_fetch_array($run_pro)) {

    $patient_id = $row_pro['patient_id'];
    $first_name = $row_pro['first_name'];
    $last_name = $row_pro['last_name'];
    $email = $row_pro['email'];
    $address = $row_pro['address'];
    $phone = $row_pro['phone'];
}

$get_date = "SELECT * FROM dentist WHERE dentist_id = $dentist";

$run_pro = mysqli_query($con, $get_date);

while ($row_pro = mysqli_fetch_array($run_pro)) {
    $working_time = $row_pro ['working_time'];
}

$working_time_unserialized = unserialize($working_time);

$array = json_decode(json_encode($working_time_unserialized), true);

foreach ($working_time_unserialized as $working_times) {
    echo $working_times['day'] .'-'. $working_times['from'] .'<br />' ;
}

$result = ($con->query($check_appointment = "SELECT a.*, p.* FROM appointment a 
                      JOIN patient p ON a.p_id = p.patient_id WHERE u_id = $id_user AND status = '0'"));

if($result-> num_rows > 0 )
{
    $_SESSION['appointment_error'] = '<div style=\'background-color: rgba(245, 245, 245, 0.56);box-shadow: 2px 1px 2px 0px rgba(0, 0, 0, 0.44);border:1px solid lavender;padding: 20px;margin-top: 20px;text-align: center\'><img src="assets/error.png" style=\'background-color: rgba(245, 245, 245, 0.56);width:28px;height:28px;color:red;text-align: center;font-size: 30px;display: block;margin-left: auto;margin-right: auto\'>
                      You can only have one active appointment
                </div>';
    header('location: appointments.php');
    exit();
}


$date = date("Y-m-d H:i:s",strtotime(str_replace('/','-',$date)));

$sql = "INSERT INTO appointment (s_id, d_id, p_id, first_name, last_name, email, address, datetime)
        VALUES ('$services','$dentist', '$patient_id', '$first_name', '$last_name', '$email', '$address', '$date')";

if (strpos($working_time, $day) !== false)
{
    if(mysqli_query($con,$sql))
    {
        header('Location: user_profile.php?appointment');
    }
}else
{
    $_SESSION['date_error'] = '<div style=\'background-color: rgba(245, 245, 245, 0.56);box-shadow: 2px 1px 2px 0px rgba(0, 0, 0, 0.44);border:1px solid lavender;padding: 20px;margin-top: 20px;text-align: center\'><img src="assets/error.png" style=\'background-color: rgba(245, 245, 245, 0.56);width:28px;height:28px;color:red;text-align: center;font-size: 30px;display: block;margin-left: auto;margin-right: auto\'>
                      Please select the correct date !
                </div>';
    header("location: appointments.php");
    exit();
}




