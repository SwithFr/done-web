<?php


namespace App\Controllers;


use App\Models\User;

class UsersController extends AppController
{
    public function connect()
    {
        $d = [];
        if ($this->Request->isPost) {
            $user = new User();

            $data = $d['user'] = $this->Request->data;
            if ($user->validate($data)) {
                $user->data = $data;
                $user->connect();
                $this->Session->write("usertoken", $user->recived_data->data->user_token);
                $this->Session->write("userid", $user->recived_data->data->user_id);
                $this->Session->setFlash("Vous êtes maintenant connecté.");
                $this->redirect("tableau-de-bord");
            } else {
                $d['errors'] = $user->getErrors();
                $this->Session->setFlash("Désolé mais vos informations ne sont pas valides", 'error');
            }
        }

        return $this->set($d);
    }

    public function logout()
    {
        unset($_SESSION['usertoken']);
        unset($_SESSION['userid']);

        $this->Session->setFlash("Vous êtes déconnecté, à bientot !");
        $this->redirect("accueil");
    }

    public function register()
    {
        $d = [];
        if ($this->Request->isPost) {
            $user = new User();

            $data = $d['user'] = $this->Request->data;
            if ($user->validate($data)) {
                $user->data = $data;
                $user->store()->connect();
                $this->Session->write("usertoken", $user->recived_data->data->user_token);
                $this->Session->write("userid", $user->recived_data->data->user_id);
                $this->Session->setFlash("Votre compte a bien été crée ! Vous êtes maintenant connecté.");
                $this->redirect("tableau-de-bord");
            } else {
                $d['errors'] = $user->getErrors();
                $this->Session->setFlash("Désolé mais vos informations ne sont pas valides", 'error');
            }
        }
        
        return $this->set($d);
    }
}