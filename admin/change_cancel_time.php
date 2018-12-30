<?php
include '../db_config.php';
include '../functions/functions.php';

global $con;

$cancel_value = $_POST['cancel_value'];

if(empty($cancel_value))
{
    echo 'Empty';
    exit();
}

if(!is_numeric($cancel_value)){
    echo 'Not a number';
    exit();
}

$cancel_value = $cancel_value*60;

$update_cancel = "UPDATE timer SET time = '$cancel_value'";

mysqli_query($con, $update_cancel);