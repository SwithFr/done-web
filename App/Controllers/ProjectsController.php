<?php


namespace App\Controllers;


use App\Models\Project;

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
        $d['projects'] = (new Project())->getAll()->recived_data;
        return $this->set($d);
    }

    public function user_store()
    {

    }
}   