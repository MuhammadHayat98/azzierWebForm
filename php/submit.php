<?php
/*
* HTML Purifier goes here
*/

$wo = $_POST['WO'];
$hours = $_POST['Hours'];
$timeType = $_POST['type'];
$comment = $_POST['comments'];

$array = array(
    'WOLabour' => array(
        'Comments' => $comment,
        'Hours' => $hours,
        'LaborType' => $timeType,
        'WoNum' => $wo,
        'EmpId' => $_SESSION['username'],
        'Craft' => ''
    )
    );
$xmlHandler = new XMLHandler($array);
