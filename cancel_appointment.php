<?php
session_start();
include ('db_config.php');
include ('functions/functions.php');
global $con;

$appointment_id = mysqli_real_escape_string($con, $_POST['appointment_id'] );
$reason = mysqli_real_escape_string($con, $_POST['reason'] );

if(empty($appointment_id) || empty($reason))
{
    echo "Error";
}
else
{
    $update_status = "UPDATE appointment SET status = '2' WHERE appointment_id = $appointment_id;";

    $insert = "INSERT INTO cancelled (a_id, reason)"
        . "VALUES ($appointment_id,'$reason')";

    if(mysqli_query($con,$update_status))
    {
        if(mysqli_query($con, $insert)) {
            $_SESSION['success'] = '<div style=\'background-color: rgba(245, 245, 245, 0.56);box-shadow: 2px 1px 2px 0px rgba(0, 0, 0, 0.44);border:1px solid lavender;margin-left: auto;margin-right: auto;margin-top: 0px; margin-bottom:20px;width:450px;padding:20px;text-align: center\'><img src="assets/check.png" style=\'background-color: rgba(245, 245, 245, 0.56);width:28px;height:28px;color:red;text-align: center;font-size: 30px;display: block;margin-left: auto;margin-right: auto\'>
                     You have successfully cancelled the appointment!
                </div>';
            header("location: user_profile");
            exit();
        }
    }


}


?>