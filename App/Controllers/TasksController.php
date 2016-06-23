<?php


namespace App\Controllers;


use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Core\Helpers\Date;

class TasksController extends AppController
{
    public $hasModel = false;

    public function discover($step)
    {
        if ($step == 0) {
            $this->Session->delete("hasProject");
            $this->Session->delete("task-errors");
            $this->Session->delete("project-errors");
            $this->_createAndLogFakeUser();
        } elseif ($step == 1) {
        } elseif ($step == 2) {
            return $this->set("projects", (new Project())->getAll()->recived_data);
            // Proposer inscription
        }
    }

    public function createFromDiscover()
    {
        if (!$this->Request->isPost) {
            $this->Session->setFlash("Mauvaise methode !", "error");
        } else {
            $task = new Task();
            if ($task->validate($this->Request->data)) {
                $task->data = $this->Request->data;
                $task->setHeaders()->store();
                $this->Session->setFlash("La tâche a bien été ajoutée", "success");
                $this->Session->write("discoverCompleted", true);
                $this->redirect("decouvrir/2#add-task-section");
            } else {
                $this->Session->write("task-errors", $task->getErrors());
                $this->Session->setFlash("Le titre de la tâche n'est pas valide !", 'error');
            }
        }
        $this->redirect("decouvrir/1#add-task-section");
    }

    private function _createAndLogFakeUser()
    {
        $fakeUser = new User([
            "login" => uniqid("fake-"),
            "password" => "fake"
        ]);
        $fakeUser->store()->connect();
        $this->Session->write("usertoken", $fakeUser->recived_data->data->user_token);
        $this->Session->write("userid", $fakeUser->recived_data->data->user_id);
    }
}