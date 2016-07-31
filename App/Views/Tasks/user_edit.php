<?php $title_for_layout = "Editer une tâche"; ?>
<a class="back-link" title="retour au tableau de bord" href="<?= Html::url('tableau-de-bord') ?>">Retour au tableau de bord</a>
<section class="section">
    <h2 class="section__title">Editer une tâche</h2>
</section>
<?= $this->element('add_task_form', ['task' => $task, 'task_form_url' => 'taches/edition/' . $task->id]) ?>