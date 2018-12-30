<?php
session_start();
header("Content-Type: text/plain");
include ('../db_config.php');
include ('../functions/functions.php');

global $con;

$first_name = mysqli_real_escape_string($con, $_POST['first_name']);
$last_name = mysqli_real_escape_string($con, $_POST['last_name']);
$proffesion = mysqli_real_escape_string($con, $_POST['proffesion']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$password = mysqli_real_escape_string($con, md5($_POST['password']));
$phone = mysqli_real_escape_string($con, $_POST['phone']);

$image = $_FILES["image"]["name"];

$target_dir = "../admin_images/";
$target_file = $target_dir . basename($image);

$check = getimagesize($_FILES["image"]["tmp_name"]);

if($check !== false ) {
    echo "File is image - " . $check["mime"] . ".";
    $uploadOk = 1;
} else {
    echo "Files are not image.";
    $uploadOk = 0;
}


if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
}

if (empty($image))
{
    $image = "default-avatar";
};



if(empty($_POST['service'])){
    echo "error";
    header('location: profile.php');
    exit();
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL))
{
    echo "error";
    header('location: profile.php');
    exit();
}



if(empty($first_name) || empty($last_name) ||  empty($proffesion) || empty($email) ||  empty($password) || empty($phone) )
{
    echo "wrong data";
    header('location: profile.php');
    exit();
}

if(!is_numeric($phone))
{
    echo "phone field error";
    header('location: profile.php');
    exit();
}

$result = $con->query("SELECT * FROM dentist WHERE email='$email'");


if ( $result->num_rows > 0 ){
    echo 'error';
    header('location: profile.php');
    exit();
}


$new = new stdClass();

$working_time = serialize($new);

$insertingDentist = "INSERT INTO dentist (first_name, last_name, proffesion, image, email, password, phone, working_time)
                     VALUES ('$first_name', '$last_name', '$proffesion', '$image' , '$email', '$password', '$phone', '$working_time')";

mysqli_query($con, $insertingDentist) ;

$selectDentist = "SELECT * FROM dentist WHERE email = '$email'";

$run_dentist = mysqli_query($con, $selectDentist);

while($row_dentist = mysqli_fetch_assoc($run_dentist))
{
    $dentist_id = $row_dentist['dentist_id'];
}

$i = 0;
foreach ($_POST['service'] as $val) {
    mysqli_query($con,"INSERT INTO dentist_service (s_id, d_id) VALUES ('$val','$dentist_id')");
    $i++;
}


$insertingAdmin = "INSERT into admin (d_id) VALUES ('$dentist_id')";



if(mysqli_query($con, $insertingAdmin))
{
    $_SESSION['successMessage'] = '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                            <span class="badge badge-pill badge-success">Success</span>
                                                You have successfully added the dentist
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>';
    header("location: profile.php");
    exit();
}







