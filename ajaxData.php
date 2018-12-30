<?php
include('db_config.php');
include ('functions/functions.php');

$service_id = $_POST['service_id'];

if($service_id)

{
    echo "<option selected=\"true\" disabled=\"disabled\" value=\"0\">Choose dentist</option>";
    $get_service = "SELECT d.dentist_id, d.first_name, d.last_name, sd.* from dentist_service sd 
                    JOIN dentist d ON sd.d_id = d.dentist_id WHERE sd.s_id = $service_id";
    $run_service = mysqli_query($con, $get_service);

    while ($row_service = mysqli_fetch_array($run_service)) {
        $dentist_id = $row_service['dentist_id'];
        $first_name = $row_service['first_name'];
        $last_name = $row_service['last_name'];


        echo "<option value='$dentist_id'>$first_name $last_name</option> ";

    }
}

/*else if($_POST['service_id']==7)

{
    echo "<option selected=\"true\" disabled=\"disabled\" value=\"0\">Choose dentist</option>";
    $get_service = "SELECT d.dentist_id, d.s_id, d.first_name, d.last_name from dentist d 
                   JOIN service s ON d.s_id = s.service_id";
    $run_service = mysqli_query($con, $get_service);

    while ($row_service = mysqli_fetch_array($run_service)) {
        $dentist_id = $row_service['dentist_id'];
        $first_name = $row_service['first_name'];
        $last_name = $row_service['last_name'];


        echo "<option value='$dentist_id'>$first_name $last_name</option> ";

    }

}*/


