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
}