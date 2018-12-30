
<?php
// Set session variables to be used on profile.php page
$_SESSION['email'] = $_POST['register_email'];
$_SESSION['first_name'] = $_POST['register_first_name'];
$_SESSION['last_name'] = $_POST['register_last_name'];


if(strlen($_POST['register_password'])<8)
{
    $_SESSION['message'] = '
                <div style=\'background-color: rgba(245, 245, 245, 0.56);box-shadow: 2px 1px 2px 0px rgba(0, 0, 0, 0.44);border:1px solid lavender;padding: 20px;text-align: center\'><img src="assets/error.png" style=\'background-color: rgba(245, 245, 245, 0.56);width:28px;height:28px;color:red;text-align: center;font-size: 30px;display: block;margin-left: auto;margin-right: auto\'>
                     Your password must be at least 8 characters long
                </div>';
    header("location: error.php");
    exit();
}

// Escape all $_POST variables to protect against SQL injections
global $con;
$first_name = mysqli_real_escape_string( $con,$_POST['register_first_name']);
$last_name = mysqli_real_escape_string( $con,$_POST['register_last_name']);
$email = mysqli_real_escape_string( $con,$_POST['register_email']);
$password = mysqli_real_escape_string($con,password_hash($_POST['register_password'], PASSWORD_BCRYPT));
$hash = mysqli_real_escape_string( $con, md5( rand(0,1000) ) );


if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['message'] = '
                <div style=\'background-color: rgba(245, 245, 245, 0.56);box-shadow: 2px 1px 2px 0px rgba(0, 0, 0, 0.44);border:1px solid lavender;padding: 20px;text-align: center\'><img src="assets/error.png" style=\'background-color: rgba(245, 245, 245, 0.56);width:28px;height:28px;color:red;text-align: center;font-size: 30px;display: block;margin-left: auto;margin-right: auto\'>
                     Invalid email format !
                </div>';
    header("location: error.php");
    exit();
}

if(empty($first_name) || empty($last_name) || empty($email))
{
    $_SESSION['message'] = '
                <div style=\'background-color: rgba(245, 245, 245, 0.56);box-shadow: 2px 1px 2px 0px rgba(0, 0, 0, 0.44);border:1px solid lavender;padding: 20px;text-align: center\'><img src="assets/error.png" style=\'background-color: rgba(245, 245, 245, 0.56);width:28px;height:28px;color:red;text-align: center;font-size: 30px;display: block;margin-left: auto;margin-right: auto\'>
                     Please fill all fields !
                </div>';
    header("location: error.php");
    exit();
}

if(strlen($password)<8)
{
    $_SESSION['message'] = '
                <div style=\'background-color: rgba(245, 245, 245, 0.56);box-shadow: 2px 1px 2px 0px rgba(0, 0, 0, 0.44);border:1px solid lavender;padding: 20px;text-align: center\'><img src="assets/error.png" style=\'background-color: rgba(245, 245, 245, 0.56);width:28px;height:28px;color:red;text-align: center;font-size: 30px;display: block;margin-left: auto;margin-right: auto\'>
                     Your password must be at least 8 characters long
                </div>';
    header("location: error.php");
    exit();
}



$result = $con->query("SELECT * FROM users WHERE email='$email'") or die($con->error());


if ( $result->num_rows > 0 ) {

    $_SESSION['message'] = '
                <div style=\'background-color: rgba(245, 245, 245, 0.56);box-shadow: 2px 1px 2px 0px rgba(0, 0, 0, 0.44);border:1px solid lavender;padding: 20px;text-align: center\'><img src="assets/error.png" style=\'background-color: rgba(245, 245, 245, 0.56);width:28px;height:28px;color:red;text-align: center;font-size: 30px;display: block;margin-left: auto;margin-right: auto\'>
                     That email address is already registered. You sure you don\'t have an account ?
                </div>';
    header("location: error.php");

}
else {


    $sql = "INSERT INTO users(first_name, last_name, email, password, hash) "
        . "VALUES ('$first_name','$last_name','$email','$password','$hash')";


    if ( $con->query($sql) ){


        $_SESSION['active'] = 0;
        $_SESSION['logged_in'] = true;
        $_SESSION['message'] =

            "Link za potvrdu je poslat na: $email !";

        $to      = $email;
        $subject = 'Verification';
        $message_body = '
        Dear '.$first_name.',

        Thanks for the registration!

        Click the link below to activate your account:

        http://localhost/diplomski/verify.php?email='.$email.'&hash='.$hash;

        mail( $to, $subject, $message_body );

        header("location: profile.php");

    }

    else {
        $_SESSION['message'] = 'Registration unsuccessful!';
        header("location: error.php");
    }

}