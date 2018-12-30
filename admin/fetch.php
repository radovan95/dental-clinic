<?php
session_start();
include '../db_config.php';
include '../functions/functions.php';

global $con;

if(isset($_POST["view"]))
{
    $sql = "SELECT a.*, d.* FROM admin a
            JOIN dentist d ON a.d_id = d.dentist_id
            WHERE email = '".$_SESSION['email'] ."'";

    $run_pro = mysqli_query($con, $sql);


    while ($row_pro = mysqli_fetch_array($run_pro)) {

        $id_user = $row_pro['admin_id'];

    }

    if($_POST["view"] != '')
    {
        $update_query = "UPDATE notifications n
                         JOIN appointment a ON n.a_id = a.appointment_id
                         JOIN dentist d ON a.d_id = d.dentist_id
                         SET notification_status = 'read' WHERE notification_status = 'unread' AND d.email = '".$_SESSION['email'] ."'";

        mysqli_query($con, $update_query);
    }



    /*$query = "SELECT a.*, d.* FROM appointment a
              JOIN dentist d ON a.d_id = d.dentist_id 
              WHERE d.email = '".$_SESSION['email'] ."'
              ORDER BY appointment_id DESC LIMIT 5";*/
    $query = "SELECT n.*, a.*, p.*, s.* FROM notifications n
              JOIN appointment a ON n.a_id = a.appointment_id
              JOIN service s ON a.s_id = s.service_id
              JOIN patient p ON a.p_id = p.patient_id
              JOIN dentist d ON a.d_id = d.dentist_id 
              WHERE d.email = '".$_SESSION['email'] ."' 
              ORDER BY notification_id DESC ";

    $result = mysqli_query($con, $query);
    $output = '';
    $n = 0;
    if(mysqli_num_rows($result) > 0)

    {
        while($row = mysqli_fetch_array($result)) {

            $date_and_time = $row['notification_date'];

            $date = str_replace('/', '-', $date_and_time);
            $new_date = date('F d, h:i:s', strtotime($date));

            $date_time = $row['datetime'];
            $dates = str_replace('/', '-', $date_time);
            $new_dates = date('F d, h:i:s', strtotime($dates));

            $appointment_id = $row['appointment_id'];

            $getReason = "SELECT c.reason FROM cancelled c JOIN appointment a ON c.a_id = a.appointment_id WHERE a.appointment_id = $appointment_id";

            $result_3 = mysqli_query($con, $getReason);

            while($row_reason = mysqli_fetch_array($result_3))
            {
                $reason = $row_reason['reason'];
            }


            $n++;
            if ($row['notification_type'] == 'active' && $row['notification_check'] == 'unchecked') {
                $output .= '
            <li style="background-color:rgba(255,193,7,0.51);margin-top:0;padding-top:0" onmouseover="notificationId(' .$row['notification_id'].')">
                <div style="padding-left: 10px; padding-right: 10px;">
                    <p style="padding-left: 0">'.$new_date.'</p>
                    <strong data-id='.$row['notification_id'].'>' . $row['first_name'] . ' ' . $row['last_name'] . '</strong> has scheduled an appointment.<br />
                    <b style="color:orangered">Date and time:</b><br />'.$new_dates.'<br />
                    <b style="color:orangered">Service: </b>'.$row['name'].'
                </div>
                <hr style="border: 1px solid #e5e5e5;margin-bottom: 0px">
                
            </li>
            ';
            } else if($row['notification_type'] == 'active' && $row['notification_check'] == 'checked') {
                $output .= '
            <li style="background-color:#fff;" onmouseover="notificationId(' .$row['notification_id'].')">
                <div style="padding-left: 10px; padding-right: 10px">
                    <p style="padding-left: 0">'.$new_date.'</p>
                    <strong data-id='.$row['notification_id'].'>' . $row['first_name'] . ' ' . $row['last_name'] . '</strong> has scheduled an appointment.<br />
                    <b style="color:orangered">Date and time:</b><br />'.$new_dates.'<br />
                    <b style="color:orangered">Service: </b>'.$row['name'].'
                    
                </div> 
                <hr style="border: 1px solid #e5e5e5;margin-bottom: 0px">
               
            </li>
            ';
            } else if($row['notification_type'] == 'cancel' && $row['notification_check'] == 'unchecked') {
                $output .= '
            <li style="background-color:rgba(255,193,7,0.51);" onmouseover="notificationId(' .$row['notification_id'].')">
                <div style="padding-left: 10px; padding-right: 10px">
                    <p style="padding-left: 0">'.$new_date.'</p>
                    <strong>' . $row['first_name'] . ' ' . $row['last_name'] . '</strong> has cancelled an appointment.<br />
                    <b style="color:orangered">Reason: </b>'.$reason.'
                </div>
                <hr style="border: 1px solid #e5e5e5;margin-bottom: 0px">
            </li>
            ';
            } else if ($row['notification_type'] == 'cancel' && $row['notification_check'] == 'checked') {
                $output .= '
            <li style="background-color:#fff;" onmouseover="notificationId('.$row['notification_id'].')">
                <div style="padding-left: 10px; padding-right: 10px">
                    <p style="padding-left: 0">'.$new_date.'</p>
                    <strong>' . $row['first_name'] . ' ' . $row['last_name'] . '</strong> has cancelled an appointment.<br />
                    <b style="color:orangered">Reason: </b>'.$reason.'
                </div>
                <hr style="border: 1px solid #e5e5e5;margin-bottom: 0px">
            </li>
            ';
            }
        }
    }
    else
    {
        $output .= '
            <li style="padding-left: 10px;padding-right: 10px">No notifications found</li>
        ';
    }

   /* $query_1 = "SELECT a.*, d.* FROM appointment a
                JOIN dentist d ON a.d_id = d.dentist_id 
                WHERE d.email = '".$_SESSION['email'] ."' AND type = 'unread'";*/

    $query_1 = "SELECT n.*, a.*, p.* FROM notifications n
              JOIN appointment a ON n.a_id = a.appointment_id
              JOIN patient p ON a.p_id = p.patient_id
              JOIN dentist d ON a.d_id = d.dentist_id 
              WHERE d.email = '".$_SESSION['email'] ."' AND notification_status = 'unread'";

    $result_1 = mysqli_query($con, $query_1);
    $count = mysqli_num_rows($result_1);
    $data = array(
        'notification' => $output,
        'unseen_notification' => $count
    );

    echo json_encode($data);
}