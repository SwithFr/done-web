<?php $title_for_layout = "Ajouter un tag"; ?>
<a class="back-link" title="retour au tableau de bord" href="<?= Html::url('tableau-de-bord') ?>">Retour au tableau de bord</a>
<section class="section">
    <h2 class="section__title">Ajouter un tag</h2>
</section>
<?= $this->element('add_tag_form') ?>