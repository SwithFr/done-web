<?php

namespace App\Controllers;


use App\Models\Tag;

class TagsController extends AppController
{
    public function user_add()
    {
        $d = [];
        if ($this->Request->isPost) {
            $d['tag'] = $this->Request->data;
            $tag = new Tag();
            if ($tag->validate($d['tag'])) {
                $tag->data = $d['tag'];
                $tag->store();
                $this->Session->setFlash("Nouveau tag enregistré");
                $this->redirect('tableau-de-bord');
            } else {
                $d['errors'] = $tag->getErrors();
                $this->Session->setFlash("Veuillez verifier vos informations", 'error');
            }
        }

        return $this->set($d);
    }

}