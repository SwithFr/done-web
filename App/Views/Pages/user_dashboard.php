<?php $title_for_layout = "Tableau de bord de " . $this->Session->read('username'); ?>
<h1><span class="hidden">Vos tâches pour </span>Aujourd'hui</h1>
<?php if(!empty($projects)): ?>
    <ul class="projects">
        <?php foreach($projects as $project): ?>
            <li class="project">
                <h2 style="color:red;"><?= $project->name ?></h2>
                <?= $this->element('actions', ['type' => 'projets', 'item' => $project]) ?>
                <ul class="project__tasks">
                    <?php if(!empty($project->tasks)): ?>
                        <?php foreach($project->tasks as $task): ?>
                            <li class="task">
                                <h3 style="color:blue;"><?= $task->title ?></h3>
                                <?php if(isset($task->note)): ?>
                                    <p class="task_note">
                                        <?= Text::cut($task->note, 100) ?>
                                    </p>
                                <?php endif; ?>
                                <?= $this->element('actions', ['type' => 'taches', 'item' => $task]) ?>
                            </li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        Pas encore de tâche ! Ajoutez-en une.
                    <?php endif; ?>
                </ul>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    Pas encore de projet ! Ajoutez-en un.
<?php endif; ?>

