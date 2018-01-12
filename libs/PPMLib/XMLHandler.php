<?php

class XMLHandler 
{
    private $xml;
    private $postArray;

    public function __construct($array)  {
       $this->postArray = $array;
       $this->xml = new SimpleXMLElement('<?xml version="1.0"?><root></root>');
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
                $this->array_to_xml($value, $subnode);
            } else {
                $xml_data->addChild("$key",htmlspecialchars("$value"));
            }
        }
    }
    /*
    * this is meant for testing purposes to see if a
    * xml string is formatted correctly
    */
    public function toXmlFile() {
        return $this->xml->asXML('test.xml');
    }

    

}

?>