<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'dental_clinic';
//Creating config file
$con= mysqli_connect($host,$username,$password,$database);


if(mysqli_connect_errno())
{
    echo "Failed to connect to mysql: ". mysqli_connect_error();
}

?>