<?php

class XMLHandler 
{
    public $xml;
    public $postArray;
    function __contruct()  {
        $this->postArray = 5;
        $this->xml = 4;
    }
    public function getXML() {
        $this->array_to_xml($this->postArray, $this->xml);
        return $this->xml->asXML();
    }

   private function array_to_xml( $data, $xml_data ) {
        foreach( $data as $key => $value ) {
            if( is_numeric($key) ){
                $key = 'item'.$key; 
            }
            if( is_array($value) ) {
                $subnode = $xml_data->addChild($key);
                array_to_xml($value, $subnode);
            } else {
                $xml_data->addChild("$key",htmlspecialchars("$value"));
            }
        }
    }

    


}
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
$xmlHandler = new XMLHandler();
$t  = $xmlHandler->postArray;
var_dump($t);

?>