<?php

namespace App\Controllers;

use Core\Controllers\Controller;

class AppController extends Controller
{
    public $components = ["Session"];

    public function beforeRender()
    {
        $prefixe = $this->Request->prefixe;
        if ($prefixe == "user" && !isset($_SESSION['usertoken'])) {
            $this->Session->setFlash("Vous devez être connecté pour effectué cette action !", "error");
            $this->redirect("connexion");
        }
    }

}