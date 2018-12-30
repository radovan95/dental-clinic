<?php
session_start();
include '../db_config.php';
include '../functions/functions.php';

global $con;

$dentist_id = $_POST['dentist_id'];

if($dentist_id){
    $get_pro = "SELECT first_name,last_name,working_time FROM dentist WHERE dentist_id = $dentist_id ";

    $run_pro = mysqli_query($con, $get_pro);

    while ($row_pro = mysqli_fetch_array($run_pro)) {
        $first_name = $row_pro ['first_name'];
        $last_name = $row_pro ['last_name'];
        $working_time = $row_pro ['working_time'];

        $working_time_unserialized = unserialize($working_time);


        $array = json_decode(json_encode($working_time_unserialized), true);


        echo '<div class="card">
                        <div class="card-header">
                            
                        </div>
                        <div class="card-body">
                            <table class="table">
                              <thead class="thead-dark">
                               
                              </thead>
                              <tbody>';
                                    if(empty($array)){
                                        echo '<tr>
                                                  <td><b>Does not have working days yet</b></td>
                                              </tr>';
                                    } else {
                                        foreach ($working_time_unserialized as $working_times) {
                                            echo '<tr>
                                                <td>' . $working_times['day'] . '</td>
                                                <td>' . $working_times['from'] . ' - ' . $working_times['to'] . '</td>
                                         </tr>';
                                        }
                                    }

                             echo '</tbody>
                            </table>

                        </div>
                    </div>';

    }
}