<?php

function PersonalInformation()
{
echo "<br /><h5>Personal informations</h5>
                        <hr style='border: 0.5px solid lightgrey;width: 70%'>";
?>
<form style="text-align: center" method="post" id="profile-form" action="personal_data.php">
    <input type="text" id="first_name" name="first_name" value="<?php echo $_SESSION['first_name'] ?>"  placeholder="Your name">
    <br />
    <input type="text" id="last_name" name="last_name" value="<?php echo $_SESSION['last_name'] ?>" placeholder="Your last name">
    <br />
    <input type="text" id="email" name="email" value="<?php echo $_SESSION['email'] ?>" placeholder="Your email address">
    <br />
    <input type="text" id="address" name="address" placeholder="Your address">
    <br />
    <input type="text" id="personal_number" name="personal_number" placeholder="Unique Personal Registration Number">
    <br />
    <input type="text" id="phone" name="phone" placeholder="Phone">
    <br />
    <br />
    <input type="submit" id="customer_list" name="customer_list" value="Submit">
</form>

<br />
<?php } ?>

<?php
function ActiveUser()
{
    echo
    '<div class="alert alert-success" role="alert" style="margin-bottom: 0 !important;">
                                            <h4 class="alert-heading">Well done!</h4>
                                            <p>A verification link has been sent to your email address.</p>
                                            <hr>
                                            <p class="mb-0">Please click on the link that has just been sent to your email account to verify your email and continue the registration process.</p>
                                        </div>';

}

function checkIfUserIsLogged()
{
    echo '
                <div style=\'background-color: rgba(245, 245, 245, 0.56);box-shadow: 2px 1px 2px 0px rgba(0, 0, 0, 0.44);border:1px solid lavender;padding: 20px;text-align: center\'><img src="assets/error.png" style=\'background-color: rgba(245, 245, 245, 0.56);width:28px;height:28px;color:red;text-align: center;font-size: 30px;display: block;margin-left: auto;margin-right: auto\'>
                     You are already logged !
                </div>';
}


function IfUserNotLogged()
{
    echo '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="col-xs-12 col-sm-offset-2 col-sm-4 col-md-offset-3 col-md-3 col-lg-offset-2 col-lg-3">
            <div class="tab" role="tabpanel">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab">Login</a></li>
                    <li role="presentation"><a href="#Section2" aria-controls="profile" role="tab" data-toggle="tab">Register</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content tabs">
                    <div role="tabpanel" class="tab-pane fade in active" id="Section1">
                        <form action="login-register.php" method="post">
                            <label for="login_email" class="login-email-title">E-mail</label>
                            <input id="login_email" type="email" name="login_email" class="form-control" autocomplete="off">

                            <label for="login_password" class="login-password-title">Password</label>
                            <input id="login_password" type="password" name="login_password" class="form-control" autocomplete="off">

                            <button type="submit" class="btn btn-ellipse btn-primary login-button" name="login">Login</button>
                            <a href="forgot.php" style="float: right">Forgot password ?</a>
                        </form>

                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="Section2">
                        <form action="login-register.php" method="post" id="register-form">
                            <label for="register_first_name" class="register-first-name-title">First name</label>
                            <input id="register_first_name" type="text" name="register_first_name" class="form-control" autocomplete="off">

                            <label for="register_last_name" class="register-last-name-title">Last name</label>
                            <input id="register_last_name" type="text" name="register_last_name" class="form-control" autocomplete="off">

                            <label for="register_email" class="register-email-title">E-mail</label>
                            <input id="register_email" type="email" name="register_email" class="form-control" autocomplete="off">

                            <label for="register_password" class="register-password-title">Password</label>
                            <input id="register_password" type="password" name="register_password" class="form-control" autocomplete="off">

                            <button type="submit" class="btn btn-ellipse btn-primary register-button" name="register">Register</button>
                           
                        </form>


                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>';
}

function IfUserIsLogged()
{
    echo "<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                  <div class='col-xs-offset-0 col-xs-12 col-sm-offset-0 col-sm-4 col-md-4 col-lg-4'>
                      <img src='assets/data.png' style='width: 256px;margin-left: auto;margin-right: auto;display: block;'>
                      <h6 style='text-align: center;border: 1px solid #18afd3;color: #FFFFFF;border-radius: 10px;padding: 10px;background-color: #18afd3;'>Why we need your data?</h6>
                      <p style='text-align: center;font-size: 18px;margin:10px;font-family: Arial''>
                          We need your data to avoid any kind of false appointment attempt. All your data must be valid. Registration of false information will be punished and sanctioned.
                      </p>
                  </div>
                  
                  <div class='col-xs-offset-0 col-xs-12 col-sm-offset-0 col-sm-4 col-md-4  col-lg-4'>
                      <img src='assets/secure.png' style='width: 117px;margin-left: auto;margin-right: auto;display: block;'>
                      <h6 style='text-align: center;border: 1px solid #18afd3;color: #FFFFFF;border-radius: 10px;padding: 10px;background-color: #18afd3;'>Data security</h6>                     
                      <p style='text-align: center;font-size: 18px;margin:10px;font-family: Arial''>
                          All of your data is protected in the best possible way. Every day we try to improve our protection. Data is exclusively used for site purposes (scheduling).
                      </p>
                  </div>
                  
                  <div class='col-xs-offset-0 col-xs-12 col-sm-offset-0 col-sm-4 col-md-4 col-lg-4'>
                      <img src='assets/Undo.png' style='width: 135px;margin-left: auto;margin-right: auto;display: block;'>
                      <h6 style='text-align: center;border: 1px solid #18afd3;color: #FFFFFF;border-radius: 10px;padding: 10px;background-color: #18afd3;'>Update data</h6>                     
                      <p style='text-align: center;font-size: 18px;margin:10px;font-family: Arial''>
                          You can edit all the information later. If you do not fill out the form now, you can do it at any time. These data are needed to schedule an appointment.   
                      </p>
                  </div>
              </div>
              
              ";
}

function getPatientById()
{
    global $con;

    $sql = "SELECT * from users where email = '".$_SESSION['email'] ."'";

    $run_pro = mysqli_query($con, $sql);


    while ($row_pro = mysqli_fetch_array($run_pro)) {

        $id_user = $row_pro['user_id'];

    }

    $getPatientById = "SELECT * FROM patient WHERE u_id = $id_user";

    $run_pro = mysqli_query($con, $getPatientById);

    while ($row_pro = mysqli_fetch_array($run_pro)) {

        $first_name = $row_pro['first_name'];
        $last_name = $row_pro['last_name'];
        $email = $row_pro['email'];
        $address = $row_pro['address'];
        $phone = $row_pro['phone'];

        echo "<h5 style=\"text-align: center; font-family: 'Bebas Neue Regular'; margin-top: 5%\">Edit personal informations</h5>
                <form style=\"text-align: center\" method=\"post\" id=\"update-profile-form\" action=\"update_personal_data.php\">
                    <input type=\"text\" id=\"first_name\" name=\"first_name\" value=\"$first_name\"  placeholder=\"Your name\">
                    <br />
                    <input type=\"text\" id=\"last_name\" name=\"last_name\" value=\"$last_name\" placeholder=\"Your last name\">
                    <br />
                    <input type=\"text\" id=\"email\" name=\"email\" value=\"$email\" placeholder=\"Your email address\">
                    <br />
                    <input type=\"text\" id=\"address\" name=\"address\" value='$address' placeholder=\"Your address\">         
                    <br />
                    <input type=\"text\" id=\"phone\" name=\"phone\" value='$phone' placeholder=\"Phone\">
                    <br />
                    <br />
                    <input type=\"submit\" id=\"update\" name=\"update\" value=\"Update\">
                </form>";
    }




}

function getFinishedAppointments()
{
    global $con;

    $sql = "SELECT * from users where email = '".$_SESSION['email'] ."'";

    $run_pro = mysqli_query($con, $sql);


    while ($row_pro = mysqli_fetch_array($run_pro)) {

        $id_user = $row_pro['user_id'];

    }

    $getPatientId = "SELECT a.*, p.*, d.*, s.* FROM appointment a  
                              JOIN patient p ON a.p_id = p.patient_id
                              JOIN dentist d ON a.d_id = d.dentist_id
                              JOIN service s ON a.s_id = s.service_id
                              WHERE u_id = $id_user AND status = '1'";

    $run_pro = mysqli_query($con, $getPatientId);

    while ($row_pro = mysqli_fetch_array($run_pro)) {

        $dentist_id = $row_pro['dentist_id'];
        $appointment_id = $row_pro['appointment_id'];
        $patient_id = $row_pro['p_id'];
        $dentist_first = $row_pro['first_name'];
        $dentist_last = $row_pro['last_name'];
        $date_and_time = $row_pro['datetime'];
        $service_name = $row_pro['name'];

        $date = str_replace('/', '-', $date_and_time);
        $new_date = date('d-M-Y h:i:s', strtotime($date));

        $datetime_from = date("M d,Y h:i:s", strtotime("-120 minutes", strtotime($new_date)));

        echo "<div class=\"row\">
                   <div class=\"cell\">
                        $dentist_first $dentist_last
                   </div>
                   <div class=\"cell\">
                        $service_name
                   </div>
                   <div class=\"cell\">
                        $new_date
                   </div>
                   <div class='cell' id='comment_class'>
                       
                   <div id=\"comment_modal\" class=\"comment_modal\">
                        <div class=\"modal-content\">
                            <div class=\"modal-header\">
                                <span class=\"close\">&times;</span>
                                <h5>Add a comment</h5>
                            </div>
                        <div class=\"modal-body\">
                            <h6>Comment:</h6>
                            <form method=\"post\" name='comment-form' id='comment-form' action=\"comment_appointment.php\">
                                <input type=\"hidden\" id='comment_appointment' name=\"comment_appointment\" style='display: none' value='$appointment_id'>
                                <input type=\"hidden\" id='dentist_id' name=\"dentist_id\" style='display: none' value='$dentist_id'>
                                <textarea id=\"comment\" name=\"comment\" rows=\"5\" placeholder=\"Please enter a comment\" cols=\"30\"></textarea>
                                <br>
                                <input type=\"submit\"  id=\"comment_submit\">
                            </form>
                        </div>
                    </div>
            </div>";

        $result = $con->query("SELECT a_id FROM testimonials WHERE a_id = $appointment_id");
        if ( $result->num_rows >0 )
        {
            echo "You already commented";
        }

        else
        {
            echo "<span id='comments'></span><button class='fas-comments' id='comment_btn'><i class='fas fa-comments'></i></button>";
        }
        echo "    </div>
                  <div class='cell' >
                      <span id='patient_images'></span><button class='fas-images' id='image_btn'><i class='fas fa-images'></i></button>
                  </div>
              </div>";
    }


}

function getPatient()
{
    global $con;
        $getPatient = "SELECT * FROM patient";

        $i = 0;


        $run_pro = mysqli_query($con, $getPatient);

        while ($row_pro = mysqli_fetch_array($run_pro)) {

            $i++;

            $first_name = $row_pro['first_name'];
            $last_name = $row_pro['last_name'];
            $email = $row_pro['email'];
            $address = $row_pro['address'];
            $phone = $row_pro['phone'];
            $patient_number = $row_pro['patient_number'];

            echo "<tr>
                  <td>$first_name $last_name</td>
                  <td>$email </td>
                  <td>$phone</td>
                  <td>$patient_number</td>
                  <td><button type=\"button\" class=\"btn btn-outline-primary btn-sm m-0 waves-effect\" onclick='patient_number($i)' data-toggle=\"modal\" data-target=\"#addModal\">Add</button></td>
                  <td><button type=\"button\" class=\"btn btn-outline-primary btn-sm m-0 waves-effect check\"  onclick='patient_number($i);'data-toggle=\"modal\"  data-target=\"#checkModal\">Check</button></td>
                  <input type='hidden' id='patient_number_$i' value='$patient_number'>
              </tr>";
    }
}


function testimonials()
{
    global $con;

    $getTestimonials = "SELECT t.text, d.first_name, d.last_name , p.first_name, p.last_name FROM testimonials t
                     JOIN dentist d ON t.d_id = d.dentist_id
                     JOIN patient p ON t.p_id = p.patient_id ";

    $run = mysqli_query($con, $getTestimonials);

    while ($row_pro = mysqli_fetch_array($run)) {

        $text = $row_pro[0];
        $dentist_first_name = $row_pro[1];
        $dentist_last_name = $row_pro[2];
        $patient_first_name = $row_pro[3];
        $patient_last_name = $row_pro[4];

        echo "<div class=\"testimonial\">
                  <div class=\"testimonial-content\">
                      <div class=\"testimonial-icon\">
                          <i class=\"fa fa-quote-left\"></i>
                      </div>
                      <p style='word-wrap: break-word;' class=\"description\">
                          $text
                      </p>
                  </div>
                  <h3 class=\"title\">$patient_first_name $patient_last_name</h3>
                  <span class=\"post\">Appointment held by: $dentist_first_name $dentist_last_name</span>
              </div>";
    }
}



function getDentists()
{
    global $con;
    $getPatient = "SELECT count(dentist_id) d FROM dentist";

    $run_pro = mysqli_query($con, $getPatient);

    $row_pro = mysqli_fetch_array($run_pro);

    echo $row_pro['d'];

}

function getPatients()
{
    global $con;
    $getPatient = "SELECT count(patient_id) p FROM patient";

    $run_pro = mysqli_query($con, $getPatient);

    $row_pro = mysqli_fetch_array($run_pro);

    echo $row_pro['p'];

}

function getActive()
{
    global $con;
    $getPatient = "SELECT count(appointment_id) a FROM appointment WHERE status = '0'";

    $run_pro = mysqli_query($con, $getPatient);

    $row_pro = mysqli_fetch_array($run_pro);

    echo $row_pro['a'];

}

function getDone()
{
    global $con;
    $getPatient = "SELECT count(appointment_id) a FROM appointment WHERE status = '1'";

    $run_pro = mysqli_query($con, $getPatient);

    $row_pro = mysqli_fetch_array($run_pro);

    echo $row_pro['a'];

}

function DentistAppointmentsActive()
{

    global $con;

    $sql = "SELECT a.*, d.* FROM admin a
            JOIN dentist d ON a.d_id = d.dentist_id
            WHERE email = '".$_SESSION['email'] ."'";

    $run_pro = mysqli_query($con, $sql);


    while ($row_pro = mysqli_fetch_array($run_pro)) {

        $id_user = $row_pro['admin_id'];

    }

    $x = 0;
    $y = 0;
    $z = 0;

    $getPatientId = "SELECT a.*, p.*, d.*, s.* FROM appointment a  
                              JOIN patient p ON a.p_id = p.patient_id
                              JOIN dentist d ON a.d_id = d.dentist_id
                              JOIN service s ON a.s_id = s.service_id
                              WHERE d_id = $id_user AND status = '0'";


    $run_pro = mysqli_query($con, $getPatientId);

    while ($row_pro = mysqli_fetch_array($run_pro)) {

        $x++;
        $y++;
        $z++;

        $dentist_id = $row_pro['dentist_id'];
        $appointment_id = $row_pro['appointment_id'];
        $patient_id = $row_pro['p_id'];
        $f_name = $row_pro[4];
        $l_name = $row_pro[5];
        $date_and_time = $row_pro['datetime'];
        $service_name = $row_pro['name'];
        $email = $row_pro[6];
        $phone = $row_pro[16];
        $patient_number = $row_pro['patient_number'];

        $date = str_replace('/', '-', $date_and_time);
        $new_date = date('d-M-Y h:i:s', strtotime($date));
        date_default_timezone_set('Europe/Belgrade');
        $date_now = date('d-M-Y h:i:s', strtotime('+30 minutes'));


        echo "<tr>
                  <td style='vertical-align: middle;'>$f_name $l_name</td>
                  <td style='vertical-align: middle;'>$email</td>
                  <td style='vertical-align: middle;'>$phone</td>
                  <td style='vertical-align: middle;'>$new_date</td>
                  <td style='vertical-align: middle;'>$patient_number</td>
                  
                    ";
        if ($new_date > $date_now  ) {
            echo "<td>The appointment is still in progress</td>";
        } else {
            echo "<td id='button_$y' style='vertical-align: middle;'>
                      <button type='button' onclick=\"button(document.getElementById('button_$y')); note(document.getElementById('notes_$z')); number($x)\" class=\"btn btn-outline-primary btn-sm m-0 waves-effect arrived\">Arrived</button>
                      <button type=\"button\" style='margin-left: 20px !important' onclick='number($x)' class=\"btn btn-outline-primary btn-sm m-0 waves-effect notArrived\">Not arrived</button>
                      <input type='hidden' id='arrived_$x' value='$appointment_id'>
                  </td>
                  <td id='notes_$z' style='display: none'>
                      <div class=\"row form-group\">
                          <div class=\"col-12 col-md-9\">
                              <textarea name=\"textarea-input\" id='noteArea_$x' rows=\"2\" placeholder=\"Note...\" class='form-control'></textarea>
                              <button type=\"button\" style='margin-top: 10px !important;' onclick=\"noteArea(document.getElementById('noteArea_$x')); appId($x)\" class='btn btn-outline-primary btn-sm m-0 waves-effect submit'>Submit</button>
                              <input type='hidden' id='appointmentId_$x' value='$appointment_id' >
                          </div>
                      </div>
                  </td>
                  
                  
              </tr>";
        }
    }

}

function DentistAppointmentFinished()
{
    global $con;

    $sql = "SELECT a.*, d.* FROM admin a
            JOIN dentist d ON a.d_id = d.dentist_id
            WHERE email = '".$_SESSION['email'] ."'";

    $run_pro = mysqli_query($con, $sql);


    while ($row_pro = mysqli_fetch_array($run_pro)) {

        $id_user = $row_pro['admin_id'];

    }

    $x = 0;
    $y = 0;
    $z = 0;

    $getPatientId = "SELECT a.*, p.*, d.*, s.* FROM appointment a  
                              JOIN patient p ON a.p_id = p.patient_id
                              JOIN dentist d ON a.d_id = d.dentist_id
                              JOIN service s ON a.s_id = s.service_id
                              WHERE d_id = $id_user AND status = '1'";


    $run_pro = mysqli_query($con, $getPatientId);

    while ($row_pro = mysqli_fetch_array($run_pro)) {

        $x++;
        $y++;
        $z++;

        $dentist_id = $row_pro['dentist_id'];
        $appointment_id = $row_pro['appointment_id'];
        $patient_id = $row_pro['p_id'];
        $f_name = $row_pro[4];
        $l_name = $row_pro[5];
        $date_and_time = $row_pro['datetime'];
        $service_name = $row_pro['name'];
        $email = $row_pro[6];
        $phone = $row_pro[16];
        $patient_number = $row_pro['patient_number'];

        $date = str_replace('/', '-', $date_and_time);
        $new_date = date('d-M-Y h:i:s', strtotime($date));

        $getNote = "SELECT n.* FROM note n WHERE a_id = '$appointment_id'";

        $run_note = mysqli_query($con, $getNote);

        while ($get_note = mysqli_fetch_assoc($run_note)) {
            $note = $get_note['note'];


            echo "<tr>
                  <td style='vertical-align: middle;'>$f_name $l_name</td>
                  <td style='vertical-align: middle;'>$email</td>
                  <td style='vertical-align: middle;'>$phone</td>
                  <td style='vertical-align: middle;'>$new_date</td>
                  <td style='vertical-align: middle;'>$patient_number</td>
                  <td>$note</td>
              </tr>";
        }
    }
}

function DentistAppointmentCancelled()
{
    global $con;

    $sql = "SELECT a.*, d.* FROM admin a
            JOIN dentist d ON a.d_id = d.dentist_id
            WHERE email = '".$_SESSION['email'] ."'";

    $run_pro = mysqli_query($con, $sql);


    while ($row_pro = mysqli_fetch_array($run_pro)) {

        $id_user = $row_pro['admin_id'];

    }

    $x = 0;
    $y = 0;
    $z = 0;



    $getPatientId = "SELECT a.*, p.*, d.*, s.* FROM appointment a  
                              JOIN patient p ON a.p_id = p.patient_id
                              JOIN dentist d ON a.d_id = d.dentist_id
                              JOIN service s ON a.s_id = s.service_id
                              WHERE d_id = $id_user AND status = '2'";

    $run_pro = mysqli_query($con, $getPatientId);

    while ($row_pro = mysqli_fetch_array($run_pro)) {

        $x++;
        $y++;
        $z++;

        $dentist_id = $row_pro['dentist_id'];
        $appointment_id = $row_pro['appointment_id'];
        $patient_id = $row_pro['p_id'];
        $f_name = $row_pro[4];
        $l_name = $row_pro[5];
        $date_and_time = $row_pro['datetime'];
        $service_name = $row_pro['name'];
        $email = $row_pro[6];
        $phone = $row_pro[16];
        $patient_number = $row_pro['patient_number'];

        $date = str_replace('/', '-', $date_and_time);
        $new_date = date('d-M-Y h:i:s', strtotime($date));

        $getReason = "SELECT c.* FROM cancelled c WHERE a_id = '$appointment_id'";

        $run_reason = mysqli_query($con, $getReason);

        while ($get_reason = mysqli_fetch_assoc($run_reason)) {
            $reason = $get_reason['reason'];


            echo "<tr>
                  <td style='vertical-align: middle;'>$f_name $l_name</td>
                  <td style='vertical-align: middle;'>$email</td>
                  <td style='vertical-align: middle;'>$phone</td>
                  <td style='vertical-align: middle;'>$new_date</td>
                  <td style='vertical-align: middle;'>$patient_number</td>
                  <td>$reason</td>
              </tr>";
        }
    }
}

function cancellingTime()
{
    global $con;
    $getPatient = "SELECT * FROM timer";

    $run_pro = mysqli_query($con, $getPatient);

    while($row_pro = mysqli_fetch_array($run_pro)){
        $time = $row_pro['time'];

        $minutes_time = $time.'&nbsp; minutes';

        if($time/60 <= 1)
        {
            $hours_time = '&nbsp;('.$time/60 .'&nbsp; hour)';
        } else {
            $hours_time = '&nbsp;('.$time/60 .'&nbsp; hours)';
        }

        echo $minutes_time;
        echo $hours_time;
    }



}

function showOnIndex()
{
    global $con;

    $getDentist = "SELECT * FROM dentist";

    $run_dentist = mysqli_query($con, $getDentist);

    while($row_dentist = mysqli_fetch_array($run_dentist))
    {
        $first_name = $row_dentist['first_name'];
        $last_name = $row_dentist['last_name'];
        $proffesion = $row_dentist['proffesion'];
        $image = $row_dentist['image'];
        $working_time = $row_dentist ['working_time'];

        $working_time_unserialized = unserialize($working_time);


        $array = json_decode(json_encode($working_time_unserialized), true);

        echo "<div class=\"slide\">
                                <img src='admin_images/$image' style=\"margin-top:15px;border-radius: 50%;color:red;width:64px;height:64px;text-align: center;font-size: 30px;display: block;margin-left: auto;margin-right: auto;\">
                                <h5 style=\"text-align: center\">$first_name $last_name</h5>
                                <div class=\"card-body\" style='width: 50%; float: none;margin: 0 auto'>
                                    <table class=\"table\">
                                        <thead>
                                            <tr>
                                                <th scope=\"col\">Day</th>
                                                <th scope=\"col\">Time</th>
                                          
                                            </tr>
                                        </thead>
                                        <tbody>";
                                            foreach ($working_time_unserialized as $working_times) {
                                                echo "
                                                <tr style='font-size: 16px'>
                                                    <td>".$working_times['day']."</td>
                                                    <td>".$working_times['from']." - ".$working_times['to']."</td>
                                                </tr>";
                                            }
                                            echo "
                                        </tbody>
                                    </table>
                        </div>
             </div>";


    }

}

?>


