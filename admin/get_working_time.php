<?php

include '../db_config.php';
include '../functions/functions.php';

global $con;
$dentist = mysqli_real_escape_string($con,$_POST['dentist_id']);

$dentist = $_POST['dentist_id'];

if($dentist)
{
    $get_pro = "SELECT working_time FROM dentist WHERE dentist_id = $dentist  ";

    $run_pro = mysqli_query($con, $get_pro);

    $i = 0;

    while ($row_pro = mysqli_fetch_array($run_pro)) {
        $working_time = $row_pro ['working_time'];
    }

    $i++;

    $working_time_unserialized = unserialize($working_time);


    $array = json_decode(json_encode($working_time_unserialized), true);

    foreach ($working_time_unserialized as $working_times) {
        echo '<div style="margin-left: 20px"><div class="checkbox">
                                  <label for="checkbox1" class="form-check-label ">
                                    <input type="checkbox" id="working[]" name="working" value="' . $working_times['day'] . '" class="form-check-input"><b>' . $working_times['day'] . '</b>
                                  </label>
                                </div>
              From: ' . $working_times['from'] . ' 
              To: ' . $working_times['to']. '<br />
              <input type="hidden" id="dentId" value='.$dentist.'>
             </div><br />';
    }



}