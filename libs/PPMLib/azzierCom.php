<?php

class azzierCom 
{
    private $username;
    private $password;
    private $client;
    private $request;
    private $body;

    public function __construct($username, $pass) {
        $this->username = $username;
        $this->password = $pass;
        $this->client = new http\Client;
        $this->request = new http\Client\Request; 
        $this->body = new http\Message\Body; 
    }

    public function sendPost($xml, $interfaceName) {
        $this->body->$body->addForm(array(
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
          return $response->getBody();

    }



}

?>