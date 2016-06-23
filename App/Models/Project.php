<?php


namespace App\Models;



class Project extends RESTModel
{
    public $validationRules = [
        "name" => [
            ['ruleName' => 'required', 'message' => 'Le nom est obligatoire'],
            ['ruleName' => 'isString', 'message' => 'Le nom doit être composé uniquement de lettre']
        ]
    ];
}