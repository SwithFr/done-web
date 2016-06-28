<?php


namespace App\Models;


use Core\Models\Behaviors\Validator;
use GuzzleHttp\Client;

class RESTModel
{
    use Validator;

    public $Client = null;
    public $Response = null;

    public $recived_data = null;
    public $data = [];
    
    public $prefix = "";
    public $route = "";
    public $headers = [];
    public $method = [];

    /**
     * RESTModel constructor.
     */
    public function __construct($data = null)
    {
        $className = explode("\\",get_called_class());
        $className = end($className);
        $this->prefix = strtolower($className) . "s";
        $this->Client = new Client([
            'base_uri' => 'http://localhost:23456/' . $this->prefix . '/'
        ]);

        if ($data) {
            $this->data = $this->_parseData($data);
        }
    }

    public function getAll()
    {
        $this->method = "GET";

        $this->_performRequest();

        return $this;
    }

    public function store()
    {
        $this->method = "POST";
        $this->_performRequest();

        return $this;
    }

    public function execute()
    {
        $this->_performRequest();

        return $this;
    }

    private function _performRequest()
    {
        $this->setHeaders();
        $this->Response = $this->Client->request($this->method, $this->route, [
            'headers' => $this->headers,
            'form_params' => $this->data
        ]);

        if ($this->Response->getStatusCode() === 200) {
            $this->recived_data = json_decode($this->Response->getBody()->getContents());
        } else {
            var_dump("ERROR");
        }
    }

    public function setHeaders()
    {
        if (isset($_SESSION['usertoken']) && isset($_SESSION['userid'])) {
            $this->headers = [
                'userid' => $_SESSION["userid"],
                'usertoken' => $_SESSION["usertoken"]
            ];
        }

        return $this;
    }

    private function _parseData($data)
    {
        return (object) $data;
    }


}