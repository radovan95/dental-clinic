<?php
session_start();
include ('db_config.php');
global $con;

$date = $_POST['DateAndTime'];
$dentist = $_POST['Dentist'];

$date = date("Y-m-d H:i:s",strtotime(str_replace('/','-',$date)));

$result = $con->query("SELECT * FROM appointment WHERE datetime = '$date' AND d_id = '$dentist'");

if($date == '1970-01-01 00:00:00' || $dentist == '')
{
    echo "<div id='result' style='color:red'>
              <img src='assets/error.png' style='width: 48px;display: block;margin: auto;'>
              <br />
              Please select all options listed above, and then check availability  
          </div>";
}

else if ($result-> num_rows > 0 ){

    echo "<div id='result'  style='color:red'> 
              <img src='assets/error.png' style='width: 48px;display: block;margin: auto;'>
              <br />
              This date and time are already reserved!
          </div>";
}
else
{
    echo "<div style='color:green'>
              <img src='assets/check.png' style='width: 48px;display: block;margin: auto'>
              <br />
              This date and time are free for booking
          </div>";
    ?>
    <script>
        document.getElementById('next').disabled = false;
    </script>
    <?php
}