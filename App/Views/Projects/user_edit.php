<?php $title_for_layout = "Editer un projet"; ?>
<a class="back-link" title="retour au tableau de bord" href="<?= Html::url('tableau-de-bord') ?>">Retour au tableau de bord</a>
<section class="section">
    <h2 class="section__title">Editer le projet : <?= $project->name ?></h2>
</section>
<?= $this->element('add_project_form', ['project' => $project, 'form_url' => 'projets/edition/' . $project->id]) ?>
