<?php
session_start();
/*
* HTML Purifier goes here
*/

$wo = $_POST['WO'];
$hours = $_POST['hours'];
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
//$xmlHandler = new XMLHandler($array);
print_r ($array);
//$result = $xmlHandler->getXML();

/*
//send xml file to azzier
$client = new http\Client;
$request = new http\Client\Request;
$body = new http\Message\Body;
$body->addForm(array(
  'xml' => $result,
  'interfacename' => 'WOTIMEENTRY'
), NULL);
$request->setRequestUrl('https://csun.azzier.com/api/interface');
$request->setRequestMethod('POST');
$request->setBody($body);
$request->setHeaders(array(
  'postman-token' => '9ec9d460-61ca-cfb1-8625-3d84d7a82890',
  'cache-control' => 'no-cache',
  'password' => 'monday9*9',
  'username' => 'interface_rw'
));
$client->enqueue($request)->send();
$response = $client->getResponse();
echo $response->getBody();

*/
?>