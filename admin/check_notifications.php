<?php

session_start();
include '../db_config.php';
include '../functions/functions.php';

global $con;

$notification_id = $_POST['id'];

$update_query = "UPDATE notifications n
                         JOIN appointment a ON n.a_id = a.appointment_id
                         JOIN dentist d ON a.d_id = d.dentist_id
                         SET notification_check = 'checked' WHERE notification_check = 'unchecked' AND d.email = '".$_SESSION['email'] ."' AND notification_id = $notification_id";

mysqli_query($con, $update_query);