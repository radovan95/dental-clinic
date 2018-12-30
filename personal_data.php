<?php
session_start();
include ('db_config.php');
global $con;

$sql = "SELECT * from users where email = '".$_SESSION['email'] ."'";

$run_pro = mysqli_query($con, $sql);


while ($row_pro = mysqli_fetch_array($run_pro)) {

    $id_user = $row_pro['user_id'];

}


$first_name = $con->escape_string($_POST['first_name']);
$last_name = $con->escape_string($_POST['last_name']);
$address = $con->escape_string($_POST['address']);
$personal_number = $con->escape_string($_POST['personal_number']);
$email = $con->escape_string($_POST['email']);
$phone = $con->escape_string($_POST['phone']);

$generate_first_name = substr($first_name,0,1);
$generate_last_name = substr($last_name,0,1);


for ($i = 0; $i<6; $i++)
{
    $a = mt_rand(100000,999999);
    $a .= mt_rand(0,9);
}

$generate = $generate_first_name .+ $a ;
$generate .= $generate_last_name;


if(empty($first_name) && empty($last_name) && empty($address) && empty($personal_number) && is_numeric($personal_number) && empty($phone) && is_numeric($phone))
{
    echo "Please fill all fields";
}
else
{
    $sql = "INSERT INTO patient(u_id,first_name, last_name, email, address, phone,UPRN, patient_number) "
        . "VALUES ('$id_user','$first_name','$last_name','$email','$address','$phone', $personal_number, '$generate')";

    if ( $con->query($sql) )
    {
        header('Location: user_profile.php');
        exit;
    }
    else
    {
        echo("Error description: " . mysqli_error($con));
    }
}