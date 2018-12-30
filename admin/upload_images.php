<?php
session_start();
include('../db_config.php');
include('../functions/functions.php');


$appointment_id = mysqli_real_escape_string($con, $_POST['string']);
$first_image = $_FILES["images"]["name"][0];
$second_image = $_FILES["images"]["name"][1];
$target_dir = "../customer_images/";
$target_file = $target_dir . basename($first_image);
$target_second_file = $target_dir . basename($second_image);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$secondImageFileType = strtolower(pathinfo($target_second_file, PATHINFO_EXTENSION));

$tmp_image = $_FILES["images"]["tmp_name"];

var_dump($tmp_image);

die();

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["images"]["tmp_name"][0]);
    $check_second_image = getimagesize($_FILES["images"]["tmp_name"][1]);
    if($check !== false || $check_second_image !== false) {
        exit();
    }
}

if (file_exists($target_file) || file_exists($target_second_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $secondImageFileType != "jpg" && $secondImageFileType != "png" && $secondImageFileType !="jpeg") {
    echo "Sorry, only JPG, JPEG & PNG files are allowed.";
    $uploadOk = 0;
}



$getAppId = "SELECT a.*,d.* FROM appointment a
             JOIN dentist d ON a.d_id = d.dentist_id
             WHERE appointment_id = '$appointment_id'";

$run_pro = mysqli_query($con, $getAppId);

while ($row_pro = mysqli_fetch_array($run_pro)) {
    $patient_id = $row_pro['p_id'];
    $appointment_id = $row_pro['appointment_id'];
    $date = $row_pro['datetime'];
    $dentist_first_name = $row_pro['first_name'];
    $dentist_last_name = $row_pro['last_name'];

}

$getNote = "SELECT * FROM note WHERE a_id = '$appointment_id'";

$run_note = mysqli_query($con, $getNote);

while($row_note = mysqli_fetch_array($run_note)) {
    $note = $row_note['note'];
}




if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["images"]["tmp_name"][0], $target_file) && move_uploaded_file($_FILES["images"]["tmp_name"][1], $target_second_file)) {

        $sql = "INSERT INTO gallery (p_id, a_id, d_first_name, d_last_name, note, before_image, after_image, gallery_date)
        VALUES ($patient_id, $appointment_id ,'$dentist_first_name','$dentist_last_name', '$note','$first_image', '$second_image', NOW())";

        mysqli_query($con, $sql);

    } else {
        echo "Sorry, there was an error uploading your file.";
    }

}

?>