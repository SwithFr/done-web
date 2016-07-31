<?php


namespace App\Controllers;


use App\Models\Project;
use SwithError\SwithError;

class ProjectsController extends AppController
{
    public function createFromDiscover()
    {
        if (!$this->Request->isPost) {
            $this->Session->setFlash("Mauvaise methode !", "error");
        } else {
            $project = new Project();
            if ($project->validate($this->Request->data)) {
                $project->data = $this->Request->data;
                $project->store();
                $this->Session->setFlash("Le project a bien été ajouté", "success");
                $this->Session->write("hasProject", true);
                $this->redirect("decouvrir/2");
            } else {
                $this->Session->write("project-errors", $project->getErrors());
                $this->Session->setFlash("Le nom du projet n'est pas valide !", 'error');
            }
        }
        $this->redirect("decouvrir/1");
    }

    public function user_add()
    {
        $d['projects'] = (new Project())->get()->recived_data;
        $d['form_url'] = 'projets/ajout';

        return $this->set($d);
    }

    public function user_store()
    {
        $project = new Project();
        if ($project->validate($this->Request->data)) {
            $d['project'] = $this->Request->data;
            $project->data = $d['project'];
            $project->store();
            $this->Session->setFlash("Le project a bien été ajouté", "success");
            $this->Session->write("hasProject", true);
            $this->redirect('tableau-de-bord');
        } else {
            $d['errors'] = $project->getErrors();
            $this->Session->setFlash("Le nom du projet n'est pas valide !", 'error');
            $this->redirect('projets/ajout', false, $d);
        }

    }

    public function user_delete($project_id)
    {

    }

    public function user_edit($project_id)
    {
        $project = new Project();
        $d['project'] = $project->get([
            "route" => $project_id
        ])->data;
        
        if (!$project->isOwner()) {
            $this->Session->setFlash("Vous n'avez pas les droits sur ce projet", "error");
            $d['project'] = new \stdClass();
            return $this->set($d);
        }
        
        if ($this->Request->isPost) {
            if ($project->validate($this->Request->data)) {
                $d['project'] = $project->data = $this->Request->data;
                $d['project']->id = $project->data->id = $project_id;
                $project->update();
                $this->Session->setFlash("Le projet a bien été mis à jour");
            } else {
                $d['errors'] = $project->getErrors();
                $this->Session->setFlash("Veuillez verifier vos informations", 'error');
            }
        }
        
        return $this->set($d);
    }
}   