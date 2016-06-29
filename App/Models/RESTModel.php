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
    public $reqError = false;
    
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
            'base_uri' => 'http://localhost:23456/' . $this->prefix . '/',
            'http_errors' => false
        ]);

        if ($data) {
            $this->data = $this->_parseData($data);
        }
    }

    public function getAll($params = [])
    {
        $this->method = "GET";

        $this->_performRequest($params);

        return $this;
    }

    public function store($params = [])
    {
        $this->method = "POST";
        $this->_performRequest($params);

        return $this;
    }

    public function execute($params = [])
    {
        $this->_performRequest($params);

        return $this;
    }

    private function _performRequest($params = [])
    {
        $this->_parseParams($params);
        $this->setHeaders();

        $this->Response = $this->Client->request($this->method, $this->route, [
            'headers' => $this->headers,
            'form_params' => $this->data
        ]);

        $status = $this->Response->getStatusCode();
        if ($status === 200) {
            $this->recived_data = $this->_decode();
        } elseif ($status === 404) {
            $this->_parseError($this->_decode()->error);
        } else {
            $this->reqError = (object) [
                'type' => "INERTAL ERROR",
                'message' => "Le serveur a rencontré une erreur, veuillez nous exucser pour ce problème."
            ];
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

    private function _parseError($error)
    {
        $this->reqError = new \stdClass();
        $this->reqError->type = $error->type;

        switch ($error->type) {
            case "UNKNOWN_USER":
                $this->reqError->message = "Utilisateur introuvable";
        }
    }

    private function _parseParams(array $params)
    {
        if (isset($params['route'])) {
            $this->route = $params['route'];
        }
    }

    private function _decode()
    {
        return json_decode($this->Response->getBody()->getContents());
    }
}