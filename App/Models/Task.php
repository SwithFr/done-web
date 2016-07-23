<?php


namespace App\Models;


class Task extends RESTModel
{

    public $validationRules = [
        "title" => [
            ['ruleName' => 'required', 'message' => 'Le titre est obligatoire'],
            ['ruleName' => 'isString', 'message' => 'Le titre doit être composé uniquement de lettre']
        ],
        "project_id" => [
            ['ruleName' => 'required', 'message' => 'Il faut associer la tâche à un projet'],
            ['ruleName' => 'isInt', 'message' => 'l‘identifiant du projet doit être un nombre']
        ]
    ];

    public function search()
    {
        $this->route = "search";
        $this->method = "POST";
        return $this->execute();
    }

}