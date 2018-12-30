<?php
session_start();
include ('db_config.php');
include ('functions/functions.php');

global $con;

$dentist_id = mysqli_real_escape_string($con, $_POST['dentist_id'] );
$comment = mysqli_real_escape_string($con, $_POST['comment'] );
$appointment_id = mysqli_real_escape_string($con, $_POST['comment_appointment'] );


if(empty($dentist_id) || empty($comment) || empty($appointment_id))
{
    echo "Undefined data!";
}
else {
    $sql = "SELECT * from users where email = '" . $_SESSION['email'] . "'";

    $run_pro = mysqli_query($con, $sql);


    while ($row_pro = mysqli_fetch_array($run_pro)) {

        $id_user = $row_pro['user_id'];

    }

    $getPatientId = "SELECT patient_id FROM patient WHERE u_id = $id_user";

    $run_pro = mysqli_query($con, $getPatientId);

    while ($row_pro = mysqli_fetch_array($run_pro)) {
        $patient_id = $row_pro['patient_id'];
    }

    $insert_comment = "INSERT INTO testimonials (p_id, d_id, a_id, text)"
        . "VALUES ($patient_id,$dentist_id, $appointment_id, '$comment')";

    if(mysqli_query($con,$insert_comment))
    {
        $_SESSION['comment_success'] = '<div style=\'background-color: rgba(245, 245, 245, 0.56);box-shadow: 2px 1px 2px 0px rgba(0, 0, 0, 0.44);border:1px solid lavender;margin-left: auto;margin-right: auto;margin-top: 0px; margin-bottom:20px;width:450px;padding:20px;text-align: center\'><img src="assets/check.png" style=\'background-color: rgba(245, 245, 245, 0.56);width:28px;height:28px;color:red;text-align: center;font-size: 30px;display: block;margin-left: auto;margin-right: auto\'>
                                    You have posted a comment successfully
                                </div>';
        header("Location: user_profile.php");
        exit();
    }

}



?>

