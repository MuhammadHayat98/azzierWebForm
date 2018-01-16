<?php

class azzierCom 
{
    //Creates a communication object to send and recieve data to/from Azzier's interface
    private $username;
    private $password;
    private $client;
    private $request;
    private $url;
    //body is only used for post 
    private $body;

    public function __construct($username, $pass) {
        $this->username = $username;
        $this->password = $pass;
        //$this->url = $url;
        $this->client = new http\Client;
        $this->request = new http\Client\Request; 
        $this->body = new http\Message\Body; 
    }

    public function sendPost($xml, $interfaceName) {
        $this->body->addForm(array(
            'xml' => $xml,
            'interfacename' => $interfaceName
          ), NULL);
          $this->request->setRequestUrl('https://csuntest.azzier.com/api/interface');
          $this->request->setRequestMethod('POST');
          $this->request->setBody($this->body);
          $this->request->setHeaders(
          array(
            'postman-token' => '9ec9d460-61ca-cfb1-8625-3d84d7a82890',
            'cache-control' => 'no-cache',
            'password' => $this->password,
            'username' => $this->username
          ));

          $this->client->enqueue($this->request)->send();
          $response = $this->client->getResponse();
          
          //Reset the http client.
          $this->client->reset();
          
          return $response->getBody();


    }

    public function getData($runtimefilter, $interfaceName) {
        $this->request->setRequestUrl('https://csuntest.azzier.com/api/interface/');
        $this->request->setRequestMethod('GET');
        $this->request->setQuery(new http\QueryString(array(
            'interfacename' => $interfaceName,
            'runtimefilter' => $runtimefilter
          )));
        $this->request->setHeaders(array(
            'Postman-Token' => 'acb5734f-9887-8920-809f-b0a381d8ac85',
            'Cache-Control' => 'no-cache',
            'password' => $this->password,
            'username' => $this->username
          ));
        $this->client->enqueue($this->request)->send();
        $response = $this->client->getResponse();
        $xml_get = simplexml_load_string($response->getBody());
        $json = json_encode($xml_get);
        $obj = json_decode($json);
        //reset obj states
       // $this->resetStates();
       $this->client->reset();
        return $obj;

    }
}

?>