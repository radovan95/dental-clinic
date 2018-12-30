<?php
include '../db_config.php';
include '../functions/functions.php';

global $con;

$data = json_decode(stripslashes($_POST['data']));

$dentistId = mysqli_real_escape_string($con, $_POST['dentist_id']);

if($data == []){
    echo 'Empty';
    exit();
}

$get_pro = "SELECT working_time FROM dentist WHERE dentist_id = $dentistId";

$run_pro = mysqli_query($con, $get_pro);



while ($row_pro = mysqli_fetch_array($run_pro)) {
    $working_time = $row_pro ['working_time'];
}

$working_time_unserialized = unserialize($working_time);

$array = json_decode(json_encode($working_time_unserialized), true);



foreach ($data as $day)
{
    foreach ($array as $key => $value)
    {
        if($array[$key]['day'] == $day){
            unset($array[$key]);
        }
    }

}
$array = array_values($array);

$serialize_array = serialize($array);

$sql = "UPDATE dentist SET working_time = '$serialize_array' WHERE dentist_id = $dentistId";

mysqli_query($con,$sql) or die(mysqli_error($con));
/*foreach ($array as $working_times) {
    $result = !empty(array_intersect($data, $working_times));
    if($result == true){
        unset($working_times['day'], $working_times['from'], $working_times['to']);
    }
    var_dump($working_times);
}*/

