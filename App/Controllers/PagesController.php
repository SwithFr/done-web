<?php

namespace App\Controllers;


use App\Models\Project;
use App\Models\Task;

class PagesController extends AppController
{

    public $hasModel = false;

    public function index(){}

    public function bye(){}

    public function user_dashboard()
    {
        // Récup projects
        $projectModel = new Project();
        $taskModel = new Task();
        $d['projects'] = $projectModel->getAll()->recived_data->data;
        $d['errors'] = [];

        // récup taches
        if ($d['projects']) {
            foreach ($d['projects'] as $project) {
                $project->tasks = $taskModel->getAll([
                    'route' => $project->id
                ])->recived_data->data;
            }
            $this->Session->write("hasProject", true);
        }

        return $this->set($d);
    }

    public function user_search()
    {
        $d = [];
        $task = new Task();
        $task->data = $this->Request->data;
        $retrievedTasks = $task->search();
        $d['tasks'] = $retrievedTasks->recived_data->data;
        
        return $this->set($d);
    }

}