<?php
session_start();
include ("db_config.php");
include ("functions/functions.php");

$working_time_id_1 = [
    [
        'day' => 'Monday',
        'from' => '8:00',
        'to' => '16:00',
    ],
    [
        'day' => 'Tuesday',
        'from' => '8:00',
        'to' => '16:00',
    ],
    [
        'day' => 'Wednesday',
        'from' => '8:00',
        'to' => '16:00',
    ],
    [
        'day' => 'Thursday',
        'from' => '8:00',
        'to' => '16:00',
    ],
    [
        'day' => 'Friday',
        'from' => '8:00',
        'to' => '16:00',
    ]
];

// insert into database
$working_time_serialized_id_1 = serialize($working_time_id_1);

$sql = "UPDATE dentist SET working_time = '$working_time_serialized_id_1' WHERE dentist_id = 1;";

mysqli_query($con,$sql) or die(mysqli_error($con));

$working_time_id_2 = [
    [
        'day' => 'Monday',
        'from' => '8:00',
        'to' => '16:00',
    ],
    [
        'day' => 'Tuesday',
        'from' => '8:00',
        'to' => '16:00',
    ],
    [
        'day' => 'Wednesday',
        'from' => '8:00',
        'to' => '16:00',
    ],
    [
        'day' => 'Thursday',
        'from' => '8:00',
        'to' => '16:00',
    ],
    [
        'day' => 'Friday',
        'from' => '8:00',
        'to' => '16:00',
    ]
];

// insert into database
$working_time_serialized_id_2 = serialize($working_time_id_2);

$sql = "UPDATE dentist SET working_time = '$working_time_serialized_id_2' WHERE dentist_id = 2;";

mysqli_query($con,$sql) or die(mysqli_error($con));

$working_time_id_3 = [
    [
        'day' => 'Tuesday',
        'from' => '8:00',
        'to' => '12:00',
    ],
    [
        'day' => 'Thursday',
        'from' => '8:00',
        'to' => '12:00',
    ]
];

// insert into database
$working_time_serialized_id_3 = serialize($working_time_id_3);

$sql = "UPDATE dentist SET working_time = '$working_time_serialized_id_3' WHERE dentist_id = 3;";

mysqli_query($con,$sql) or die(mysqli_error($con));

$working_time_id_4 = [
    [
        'day' => 'Tuesday',
        'from' => '12:00',
        'to' => '16:00',
    ],
    [
        'day' => 'Thursday',
        'from' => '12:00',
        'to' => '16:00',
    ]
];

// insert into database
$working_time_serialized_id_4 = serialize($working_time_id_4);

$sql = "UPDATE dentist SET working_time = '$working_time_serialized_id_4' WHERE dentist_id = 4;";

mysqli_query($con,$sql) or die(mysqli_error($con));


