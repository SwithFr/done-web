<?php $title_for_layout = 'Gérer mes tags et états' ?>
<a class="back-link" title="retour au tableau de bord" href="<?= Html::url('tableau-de-bord') ?>">Retour au tableau de bord</a>
<section class="section">
    <h2 class="section__title">Gérer mes tags</h2>
    <ul class="list">
        <?php foreach($tags as $tag): ?>
            <li class="list__item">
                <?= $tag->name ?>
            </li>
        <?php endforeach; ?>
    </ul>
</section>
<section class="section">
    <h2 class="section__title">Gérer mes états</h2>
    <ul class="list">
        <?php foreach($states as $state): ?>
            <li class="list__item">
                <?= $state->name ?>
            </li>
        <?php endforeach; ?>
    </ul>
</section>