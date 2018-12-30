<?php

require 'db_config.php';
session_start();
global $con;


if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    if ( $_POST['newpassword'] == $_POST['confirmpassword'] ) {

        $new_password = password_hash($_POST['newpassword'], PASSWORD_BCRYPT);


        $email = $con->escape_string($_POST['email']);
        $hash = $con->escape_string($_POST['hash']);

        $sql = "UPDATE users SET password='$new_password', hash='$hash' WHERE email='$email'";

        if ( $con->query($sql) ) {

            $_SESSION['message'] = '
                <div style=\'background-color: rgba(245, 245, 245, 0.56);box-shadow: 2px 1px 2px 0px rgba(0, 0, 0, 0.44);border:1px solid lavender;padding: 20px;text-align: center\'><img src="assets/check.png" style=\'background-color: rgba(245, 245, 245, 0.56);width:28px;height:28px;color:red;text-align: center;font-size: 30px;display: block;margin-left: auto;margin-right: auto\'>
                     Your password has been reset successfully !
                </div>';
            header("location: success.php");
        }

    }
    else {
        $_SESSION['message'] = '
                <div style=\'background-color: rgba(245, 245, 245, 0.56);box-shadow: 2px 1px 2px 0px rgba(0, 0, 0, 0.44);border:1px solid lavender;padding: 20px;text-align: center\'><img src="assets/error.png" style=\'background-color: rgba(245, 245, 245, 0.56);width:28px;height:28px;color:red;text-align: center;font-size: 30px;display: block;margin-left: auto;margin-right: auto\'>
                     The password does not match. Please try again!
                </div>';
        header("location: error.php");
    }

}
?>