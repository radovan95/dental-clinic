<?php
include '../db_config.php';
include '../functions/functions.php';

global $con;

header('Content-Type: text/plain');
$ajax = utf8_encode($_POST['data']); // Don't forget the encoding
$data = json_decode($ajax);

$dentistId = mysqli_real_escape_string($con, $data->dentist_id);
$day = mysqli_real_escape_string($con, $data->day);
$from = mysqli_real_escape_string($con, $data->from);
$to = mysqli_real_escape_string($con, $data->to);

if(empty($dentistId) || empty($day) || empty($from) || empty($to)){
    echo "Please fill all the fields";
    exit();
}

if($to <= $from){
    echo "The ending time must be higher than the starting time";
    exit();
}

if($dentistId) {
    $get_pro = "SELECT working_time FROM dentist WHERE dentist_id = $dentistId  ";

    $run_pro = mysqli_query($con, $get_pro);

    $i = 0;

    while ($row_pro = mysqli_fetch_array($run_pro)) {
        $working_time = $row_pro ['working_time'];
    }

    $i++;

    $working_time_unserialized = unserialize($working_time);


    $array = json_decode(json_encode($working_time_unserialized), true);

    $working_day = [
        [
            'day' => $day,
            'from' => $from,
            'to' => $to,
        ]
    ];

    $merged_array = array_merge($array, $working_day);

    $arr2=array('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');

    foreach ($arr2 as $day){
        foreach ($merged_array as $key => $value){
            if(in_array($day, $merged_array[$key])){
                $new[] = $merged_array[$key];
            }
        }
    }


    $new_array = serialize($new);

    $sql = "UPDATE dentist SET working_time = '$new_array' WHERE dentist_id = $dentistId;";

    mysqli_query($con,$sql) or die(mysqli_error($con));

}


