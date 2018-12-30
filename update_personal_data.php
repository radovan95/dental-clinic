<?php
session_start();
include ('db_config.php');
include ('functions/functions.php');

global $con;
$first_name = mysqli_real_escape_string($con , $_POST['first_name']);
$last_name = mysqli_real_escape_string($con , $_POST['last_name']);
$email = mysqli_real_escape_string($con , $_POST['email']);
$address = mysqli_real_escape_string($con , $_POST['address']);
$phone = mysqli_real_escape_string($con , $_POST['phone']);


if (!filter_var($email, FILTER_VALIDATE_EMAIL))
{
    $_SESSION['Error_1'] = '<div style=\'background-color: rgba(245, 245, 245, 0.56);box-shadow: 2px 1px 2px 0px rgba(0, 0, 0, 0.44);border:1px solid lavender;padding: 20px;margin-top: 20px;margin-right: 20px;text-align: center\'><img src="assets/error.png" style=\'background-color: rgba(245, 245, 245, 0.56);width:28px;height:28px;color:red;text-align: center;font-size: 30px;display: block;margin-left: auto;margin-right: auto\'>
                     Invalid email format !
                </div>';
    header("location: user_profile");
    exit();

}

if(!is_numeric($phone))
{
    $_SESSION['Error_1'] = '<div style=\'background-color: rgba(245, 245, 245, 0.56);box-shadow: 2px 1px 2px 0px rgba(0, 0, 0, 0.44);border:1px solid lavender;padding: 20px;margin-top: 20px;margin-right: 20px;text-align: center\'><img src="assets/error.png" style=\'background-color: rgba(245, 245, 245, 0.56);width:28px;height:28px;color:red;text-align: center;font-size: 30px;display: block;margin-left: auto;margin-right: auto\'> 
                          Field phone must contain only numbers
                </div>';
    header("location: user_profile");
    exit();
}

if(empty($first_name) || empty($last_name) || empty($email) || empty($address) || empty($phone))
{
    $_SESSION['Error_1'] = '<div style=\'background-color: rgba(245, 245, 245, 0.56);box-shadow: 2px 1px 2px 0px rgba(0, 0, 0, 0.44);border:1px solid lavender;padding: 20px;margin-top: 20px;margin-right: 20px;text-align: center\'><img src="assets/error.png" style=\'background-color: rgba(245, 245, 245, 0.56);width:28px;height:28px;color:red;text-align: center;font-size: 30px;display: block;margin-left: auto;margin-right: auto\'>
                     Please fill in all required fields
                </div>';
    header("location: user_profile");
    exit();
}

$sql = "SELECT * from users where email = '".$_SESSION['email'] ."'";

$run_pro = mysqli_query($con, $sql);


while ($row_pro = mysqli_fetch_array($run_pro)) {

    $id_user = $row_pro['user_id'];

}

$sql = "UPDATE patient SET first_name = '$first_name', last_name = '$last_name', address = '$address', phone = '$phone' WHERE u_id = $id_user";

if(mysqli_query($con,$sql))
{
    $_SESSION['Error_1'] = '<div style=\'background-color: rgba(245, 245, 245, 0.56);box-shadow: 2px 1px 2px 0px rgba(0, 0, 0, 0.44);border:1px solid lavender;padding: 20px;margin-top: 20px;margin-right: 20px;text-align: center\'><img src="assets/check.png" style=\'background-color: rgba(245, 245, 245, 0.56);width:28px;height:28px;color:red;text-align: center;font-size: 30px;display: block;margin-left: auto;margin-right: auto\'>
                     You have successfully changed the data!
                </div>';
    header("location: user_profile");
    exit();
}


?>