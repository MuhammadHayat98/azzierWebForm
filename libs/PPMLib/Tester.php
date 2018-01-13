<?php
require 'XMLHandler.php';
require 'azzierCom.php';
$coms = new azzierCom('interface_rw', 'monday9*9');

//$functions = new azzierFunctions($coms);

$data = $coms->getData('Employee^EmpID^=^mah51212', 'GETLABORINFO');
//$data->Emp
$scaleData = $coms->getData('LabourTypes^Description^', 'GETLABORTYPES');
//$json = json_encode(array("data" => $scaleData));
//echo var_dump($json);

$arrayScale = json_decode(json_encode($scaleData), True); 
$arrayScale = $arrayScale['LaborTypes']['LaborType'];

$htmlout = '';
foreach ($arrayScale as $key => $value)
{
    $htmlout .= "<option value=$key>" . $value['Type'] . "</option>"
}

print_r($arrayScale);
$array = array(
    'WOLabour' => array(
        'Comments' => 'test',
        'Hours' => '23',
        'LaborType' => 'reg',
        'WoNum' => '00001',
        'EmpId' => 'mah51212',
        'Craft' => '$craft'
    )
    );
$xmlHandler = new XMLHandler($array);

$t  = $xmlHandler->getXML();
$xmlHandler->toXmlFile();

$res = $coms->sendPost($t, 'WOTIMEENTRY');
echo $res;



?>