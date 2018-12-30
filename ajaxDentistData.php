<style>
    <?php include 'css/appointment_table.css'; ?>
</style>

<?php

include('db_config.php');
include ('functions/functions.php');

$dentist = $_POST['dentist_id'];

if($dentist)
{
    $get_pro = "SELECT first_name,last_name,working_time FROM dentist WHERE dentist_id = $dentist  ";

    $run_pro = mysqli_query($con, $get_pro);

    while ($row_pro = mysqli_fetch_array($run_pro)) {
        $first_name = $row_pro ['first_name'];
        $last_name = $row_pro ['last_name'];
        $working_time = $row_pro ['working_time'];
    }

    echo "<div style='text-align: center'>Dentist: $first_name $last_name </div>  ";

    echo '<table class="table-fill">
                <thead>
                <tr>
                <th class="text-left">Bussiness days</th>
                <th class="text-left">Bussiness hours</th>
                </tr>
                </thead>
                <tbody class="table-hover">';

    $working_time_unserialized = unserialize($working_time);


    $array = json_decode(json_encode($working_time_unserialized), true);

    foreach ($working_time_unserialized as $working_times) {
            echo '<tr>
                    <td class="text-left">' . $working_times['day'] . '</td>
                    <td class="text-left">' . $working_times['from'] . ' - ' . $working_times['to']. '</td>
             </tr>';
    }


?>
    <script>

        var arrayFromPHP = <?php echo json_encode($array); ?>;
        var lastDate = false;


        for(var i = 0 , l = arrayFromPHP.length; i<l; i++){
            switch(arrayFromPHP[i].day)
            {
                case "Monday" :
                    arrayFromPHP[i].day = 1;
                    break;
                case "Tuesday" :
                    arrayFromPHP[i].day = 2;
                    break;
                case "Wednesday" :
                    arrayFromPHP[i].day = 3;
                    break;
                case "Thursday" :
                    arrayFromPHP[i].day = 4;
                    break;
                case "Friday" :
                    arrayFromPHP[i].day = 5;
                    break;
            }
        }
        console.log(arrayFromPHP);

        var newpicker = $( '.flatpickr' ).flatpickr({
            enableTime: true,
            dateFormat: "d-M-Y H:i",
            minDate: new Date().fp_incr(1),
            minTime: "08:00",
            maxTime: "12:00",
            minuteIncrement: "30",
            enable: [
                function(date) {
                    for(key in arrayFromPHP)
                    {
                        if(date.getDay() === arrayFromPHP[key].day)
                        {
                            return date.getDay() === arrayFromPHP[key].day;
                        }
                    }
                }
            ],
            locale: {
                "firstDayOfWeek": 1 // start week on Monday
            },
            onValueUpdate: function (dateObj, dateStr) {
                var date = new Date(dateStr);
                var dayNumber = date.getDay();

                for(key in arrayFromPHP)
                {
                    if(dayNumber === arrayFromPHP[key].day)
                    {
                        console.log(newpicker);
                        newpicker.config.minTime = arrayFromPHP[key].from;
                        newpicker.config.maxTime = arrayFromPHP[key].to;

                        if(lastDate === false || !sameDate(date,lastDate)) {

                            var time = arrayFromPHP[key].from.split(':');
                            date.setHours(time[0], time[1]);
                            console.log(date);
                            newpicker.setDate(date);

                            lastDate = date;
                        }
                    }
                }
            }
        });
        function sameDate(d1, d2) {
            return d1.getFullYear() === d2.getFullYear() &&
                d1.getMonth() === d2.getMonth() &&
                d1.getDate() === d2.getDate();
        }



    </script>

    <?php
}




?>





