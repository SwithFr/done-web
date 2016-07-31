<?php


namespace App\Controllers;


use App\Models\Project;
use App\Models\State;
use App\Models\Tag;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
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
            $d['form_url'] = 'decouvrir/projets';
        } elseif ($step == 2) {
            $d['task_form_url'] = 'decouvrir/taches';
            $d['projects'] = (new Project())->get()->recived_data;
            if ($this->Session->read('discoverCompleted')) {
                $this->_cleanFakeUser();
                $this->Session->delete([
                    'usertoken',
                    'userid',
                    'username',
                    'hasProject',
                ]);
            }
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

    private function _cleanFakeUser()
    {
        $user = new User();
        $user->delete([
            'route' => $this->Session->read('userid')
        ]);
    }

    public function user_add()
    {
        $d['projects'] = (new Project())->get()->data;
        $d['tags'] = (new Tag())->get()->data;
        $d['states'] = (new State())->get()->data;
        $d['task_form_url'] = 'taches/ajout';

        return $this->set($d);
    }

    public function user_store()
    {
        $task = new Task();
        $d['task'] = $this->Request->data;
        if ($task->validate($d['task'])) {
            $task->data = $d['task'];
            $task->formatDate();
            $task->setHeaders()->store();
            $this->Session->setFlash("La tâche a bien été ajoutée", "success");
            $this->redirect('tableau-de-bord');
        } else {
            $d['errors'] = $task->getErrors();
            $this->Session->setFlash("Le titre de la tâche n'est pas valide !", 'error');
            $this->redirect('taches/ajout', false, $d);
        }

    }

    public function user_delete($task_id)
    {
        $task = new Task();
        $deletedTask = $task->delete([
            'route' => $task_id
        ]);
        if (!$deletedTask->recived_data->error) {
            $this->Session->setFlash("La tâche a bien été supprimée");
            $this->redirect('tableau-de-bord');
        } else {
            $d['errors'] = $deletedTask->recived_data->error;
            $this->Session->setFlash("La tâche n'a pas été supprimée", 'error');
            $this->redirect('tableau-de-bord', false, $d);
        }
    }

    public function user_edit($task_id)
    {
        $task = new Task();
        $d['task'] = $task->get([
            "route" => $task_id
        ])->data;

        $d['projects'] = (new Project())->get()->data;
        $d['tags'] = (new Tag())->get()->data;
        $d['states'] = (new State())->get()->data;
        $d['selected_tags'] = [];
        foreach ($d['tags'] as $tag) {
            $d['selected_tags'][] = $tag->id;
        }

        if (!$task->isOwner()) {
            $this->Session->setFlash("Vous n'avez pas les droits sur cette tâche", "error");
            $d['task'] = new \stdClass();
            return $this->set($d);
        }

        if ($this->Request->isPost) {
            if ($task->validate($this->Request->data)) {
                $d['task'] = $task->data = $this->Request->data;
                $d['task']->id = $task->data->id = $task_id;
                $task->update();
                $this->Session->setFlash("La tâche a bien été mis à jour");
            } else {
                $d['errors'] = $task->getErrors();
                $this->Session->setFlash("Veuillez verifier vos informations", 'error');
            }
        }

        return $this->set($d);
    }
}