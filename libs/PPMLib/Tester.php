<?php
include 'XMLHandler.php';
$array = array(
    'WOLabour' => array(
        'Comments' => 'test',
        'Hours' => '23',
        'LaborType' => 'reg',
        'WoNum' => '2343',
        'EmpId' => 'user',
        'Craft' => 'mis'
    )
    );
$xmlHandler = new XMLHandler($array);
$t  = $xmlHandler->getXML();
print($t);
//$result = $xmlHandler->getXML();
//print($result);