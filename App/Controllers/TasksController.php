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
        $d['step'] = $step;
        if ($step == 0) {
            $this->_setp1();
        } elseif ($step == 1) {
        } elseif ($step == 2) {
            $d['projects'] = (new Project())->getAll()->recived_data;
        }
        
        return $this->set($d);
    }

    // Remove sessions' vars then create and log a fake user
    private function _setp1()
    {
        $this->Session->delete([
            "hasProject",
            "task-errors",
            "project-errors",
        ]);
        $this->_createAndLogFakeUser();
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
                $this->redirect("decouvrir/2");
            } else {
                $this->Session->write("task-errors", $task->getErrors());
                $this->Session->setFlash("Le titre de la tâche n'est pas valide !", 'error');
            }
        }
        $this->redirect("decouvrir/1");
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
        $this->Session->write("username", $fakeUser->recived_data->data->user_login);
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