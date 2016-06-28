<?php


namespace App\Models;


class User extends RESTModel
{
    public function connect()
    {
        $this->route = "login";
        $this->method = "POST";
        $this->execute();
    }

    public $validationRules = [
        "login" => [
            ['ruleName' => 'required', 'message' => 'L‘identifiant est obligatoire']
        ],
        "password" => [
            ['ruleName' => 'required', 'message' => 'Pour plus de sécurité, le mot de passe est obligatoire']
        ],
    ];
}