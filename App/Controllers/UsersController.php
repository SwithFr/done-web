<?php


namespace App\Controllers;


use App\Models\User;

class UsersController extends AppController
{
    public function connect()
    {
        
    }

    public function logout()
    {
        
    }

    public function register()
    {
        if ($this->Request->isPost) {
            $user = new User();

            $data = $this->Request->data;
            if ($user->validate($data)) {
                $user->data = $data;
                $user->store->connect();
                $this->Session->write("usertoken", $user->recived_data->data->user_token);
                $this->Session->write("userid", $user->recived_data->data->user_id);
                $this->Session->setFlash("Votre compte a bien été crée ! Vous êtes maintenant connecté.");
                $this->redirect("tableau-de-bord");
            } else {
                $this->Session->setFlash("Désolé mais vos informations ne sont pas valides", 'error');
            }
        }
    }
}