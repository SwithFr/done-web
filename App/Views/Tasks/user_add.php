<?php $title_for_layout = "Ajouter une tâche"; ?>
<a class="back-link" title="retour au tableau de bord" href="<?= Html::url('tableau-de-bord') ?>">Retour au tableau de bord</a>
<section class="section">
    <h2 class="section__title">Ajouter une tâche</h2>
</section>
<?= $this->element('add_task_form') ?>


