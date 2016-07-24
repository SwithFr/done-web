<?php

namespace App\Controllers;


use App\Models\State;

class StatesController extends AppController
{
    public function user_add()
    {
        $d = [];
        if ($this->Request->isPost) {
            $d['state'] = $this->Request->data;
            $state = new State();
            if ($state->validate($d['state'])) {
                $state->data = $d['state'];
                $state->store();
                $this->Session->setFlash("Nouvel état enregistré");
                $this->redirect('tableau-de-bord');
            } else {
                $d['errors'] = $state->getErrors();
                $this->Session->setFlash("Veuillez verifier vos informations", 'error');
            }
        }
        
        return $this->set($d);
    }

    public function user_delete($state_id)
    {
        $state = new Task();
        $deletedState= $state->delete([
            'route' => $state_id
        ]);
        if (!$deletedState->recived_data->error) {
            $this->Session->setFlash("Le tag a bien été supprimé");
            $this->redirect('tableau-de-bord');
        } else {
            $d['errors'] = $deletedState->recived_data->error;
            $this->Session->setFlash("Le tag n'a pas été supprimé", 'error');
            $this->redirect('tableau-de-bord', false, $d);
        }
    }

}