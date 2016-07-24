<?php $title_for_layout = "Ajouter un projet"; ?>
<a class="back-link" title="retour au tableau de bord" href="<?= Html::url('tableau-de-bord') ?>">Retour au tableau de bord</a>
<section class="section">
    <h2 class="section__title">Ajouter un projet</h2>
    <p class="section__content">
        Choisissez judicieusement les noms de vos projets, plus ils serront précis, mieux vous serez organisés.
    </p>
</section>
<?= $this->element('add_project_form') ?>
