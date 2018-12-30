<?php
include '../db_config.php';
include '../functions/functions.php';

global $con;
$dentist = mysqli_real_escape_string($con,$_POST['dentist_id']);

if($dentist)
{
    $get_pro = "SELECT a.*,p.* FROM appointment a 
                JOIN dentist d ON a.d_id = d.dentist_id
                JOIN patient p ON a.p_id = p.patient_id WHERE d.dentist_id = $dentist AND status = '1'";

    $run_pro = mysqli_query($con, $get_pro);

    while ($row_pro = mysqli_fetch_array($run_pro)) {
        $first_name = $row_pro ['first_name'];
        $last_name = $row_pro ['last_name'];
        $date = $row_pro['datetime'];
        $patient_number = $row_pro['patient_number'];


        echo "<tr>
              <td>$first_name </td>
              <td>$last_name</td>
              <td>$date</td>
              <td>$patient_number</td>
          </tr>";
    }

}