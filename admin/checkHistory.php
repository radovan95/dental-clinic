<?php
include '../db_config.php';
include '../functions/functions.php';

global $con;

header('Content-Type: text/plain');
$ajax = utf8_encode($_POST['data']); // Don't forget the encoding
$data = json_decode($ajax);

$patient_number = mysqli_real_escape_string($con, $data->patientNumber);

$getData = "SELECT * FROM patient WHERE patient_number = '$patient_number'";

$row_data = mysqli_query($con, $getData);

while($render = mysqli_fetch_assoc($row_data))
{
    $id = $render['patient_id'];
    $f_name = $render['first_name'];
    $l_name = $render['last_name'];
    $email = $render['email'];
    $address = $render['address'];
}

$getPatientId = "SELECT a.*, p.*, d.*, s.* FROM appointment a  
                              JOIN patient p ON a.p_id = p.patient_id
                              JOIN dentist d ON a.d_id = d.dentist_id
                              JOIN service s ON a.s_id = s.service_id
                              WHERE status != '0' AND p.patient_number = '$patient_number'";

$run_pro = mysqli_query($con, $getPatientId);

global $appointment_id;


while ($row_pro = mysqli_fetch_array($run_pro)) {

    $dentist_id = $row_pro['dentist_id'];
    $appointment_id = $row_pro['appointment_id'];
    $patient_id = $row_pro['p_id'];
    $dentist_first = $row_pro['first_name'];
    $dentist_last = $row_pro['last_name'];
    $date_and_time = $row_pro['datetime'];
    $service_name = $row_pro['name'];
    $status = $row_pro['status'];
    $date = str_replace('/', '-', $date_and_time);
    $new_date = date('d-M-Y h:i:s', strtotime($date));

    if($status == 1)
    {
        $new_status = 'Arrived';
    }else{
        $new_status = 'Cancelled';
    }

    if($new_status == 'Cancelled')
    {
        $getReason = "SELECT c.* FROM cancelled c WHERE a_id = '$appointment_id'";

        $run_reason = mysqli_query($con, $getReason);

        while ($get_reason = mysqli_fetch_assoc($run_reason)) {
            $reason = $get_reason['reason'];
            $new = $reason;
        }
    }
    else{
        $getNote = "SELECT n.* FROM note n WHERE a_id = '$appointment_id'";

        $run_note = mysqli_query($con, $getNote);

        while ($get_note = mysqli_fetch_assoc($run_note)) {
            $note = $get_note['note'];
            $new = $note;
        }
    }

            echo "<tr><td style='text-align: center;vertical-align: middle;'>$new_date</td>
          <td><b>Service:</b> <i>$service_name</i> <br /><b>Dentist:</b> <i>$dentist_first $dentist_last</i> <br/></td>
          <td style='text-align: center;vertical-align: middle;'><b></b><i>$new</i></td>
          <td style='text-align: center;vertical-align: middle;'><b></b> <i>$new_status</i></td></tr>";


}




