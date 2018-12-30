<?php
session_start();
include 'db_config.php';
global $con;
$password = $con ->escape_string(md5($_POST['pass']));
$email = $con->escape_string($_POST['email']);
$result = $con->query("SELECT * FROM dentist WHERE email='$email'");



if ( $result->num_rows == 0 ){
    $_SESSION['wrong_data'] = '
                <div style=\'z-index=10;background-color: rgba(245, 245, 245, 0.56);box-shadow: 2px 1px 2px 0px rgba(0, 0, 0, 0.44);border:1px solid lavender;padding: 20px;text-align: center\'>
                     The entered data does not correspond to any user!
                </div>';
    header("location: dentist_login.php");
}

else {
    $user = $result->fetch_assoc();


    if ($password == $user['password']) {

        $_SESSION['email'] = $user['email'];

        $_SESSION['logged_in'] = true;

        header("location: admin/index.php");
    }
    else {
        $_SESSION['wrong_data'] = '
                <div style=\'background-color: rgba(245, 245, 245, 0.56);box-shadow: 2px 1px 2px 0px rgba(0, 0, 0, 0.44);border:1px solid lavender;padding: 20px;text-align: center\'>
                     The entered data does not correspond to any user!
                </div>';
        header("location: dentist_login.php");
    }
}
