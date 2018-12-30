<?php
session_start();
include ('db_config.php');
include ('functions/functions.php');

$first_image = $_FILES["first_file"]["name"];
$second_image = $_FILES["second_file"]["name"];
$target_dir = "customer_images/";
$target_file = $target_dir . basename($first_image);
$target_second_file = $target_dir . basename($second_image);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$secondImageFileType = strtolower(pathinfo($target_second_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["first_file"]["tmp_name"]);
    $check_second_image = getimagesize($_FILES["second_file"]["tmp_name"]);
    if($check !== false || $check_second_image !== false) {
        echo "Files are images - " . $check["mime"] .  $check_second_image["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "Files are not image.";
        $uploadOk = 0;
    }
}

if ($_FILES["first_file"]["size"] > 500000 || $_FILES["second_file"]["size"] > 500000 ) {
    echo "Sorry, your files are too  large.";
    $uploadOk = 0;
}

if (file_exists($target_file) || file_exists($target_second_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $secondImageFileType != "jpg" && $secondImageFileType != "png" && $secondImageFileType !="jpeg") {
    echo "Sorry, only JPG, JPEG & PNG files are allowed.";
    $uploadOk = 0;
}

global $con;

$sql = "SELECT * from users where email = '".$_SESSION['email'] ."'";

$run_pro = mysqli_query($con, $sql);


while ($row_pro = mysqli_fetch_array($run_pro)) {

    $id_user = $row_pro['user_id'];

}

$getPatientId = "SELECT patient_id FROM patient WHERE u_id = $id_user";

$run_pro = mysqli_query($con, $getPatientId);

while ($row_pro = mysqli_fetch_array($run_pro)) {
    $patient_id = $row_pro['patient_id'];
}



if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["first_file"]["tmp_name"], $target_file) && move_uploaded_file($_FILES["second_file"]["tmp_name"], $target_second_file)) {
        $sql = "INSERT INTO gallery (p_id, before_image, after_image, gallery_date)
        VALUES ($patient_id,'$first_image', '$second_image', NOW())";

        if(mysqli_query($con, $sql))
        {
            $_SESSION['images_success'] = '<div style=\'background-color: rgba(245, 245, 245, 0.56);box-shadow: 2px 1px 2px 0px rgba(0, 0, 0, 0.44);border:1px solid lavender;margin-left: auto;margin-right: auto;margin-top: 0px; margin-bottom:20px;width:450px;padding:20px;text-align: center\'><img src="assets/check.png" style=\'background-color: rgba(245, 245, 245, 0.56);width:28px;height:28px;color:red;text-align: center;font-size: 30px;display: block;margin-left: auto;margin-right: auto\'>
                                Your images have been successfully uploaded.
                </div>';
            header("location: user_profile");
            exit();
        }

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

?>