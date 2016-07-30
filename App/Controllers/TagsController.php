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

    public function user_delete($tag_id)
    {
        $tag = new Task();
        $deletedTag= $tag->delete([
            'route' => $tag_id
        ]);
        if (!$deletedTag->recived_data->error) {
            $this->Session->setFlash("Le tag a bien été supprimé");
            $this->redirect('tableau-de-bord');
        } else {
            $d['errors'] = $deletedTag->recived_data->error;
            $this->Session->setFlash("Le tag n'a pas été supprimé", 'error');
            $this->redirect('tableau-de-bord', false, $d);
        }
    }

    public function user_edit($tag_id)
    {

    }

}