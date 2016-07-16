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
            $this->Session->setFlash("Vous devez être connecté pour effectuer cette action !", "error");
            $this->redirect("connexion");
        }

        if (isset($_SESSION['username']) && strpos($_SESSION['username'], 'fake-') === false) {
            $this->layout = "default-connected";
        }
    }

}