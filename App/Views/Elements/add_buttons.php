<div class="buttons-container">
    <a class="add-button <?= isset($_SESSION['hasProject']) ? '' : 'disabled' ?>" href="<?= isset($_SESSION['hasProject']) ?  Html::url("taches/ajout")  : '#' ?>">Tâche</a>
    <a class="add-button" href="<?= Html::url("projets/ajout") ?>">Projet</a>
    <div class="button-wrapper">
        <a class="add-button" href="#">Options</a>
        <span class="add-button__content">
            <a class="add-button" href="<?= Html::url("etats/ajout") ?>">État</a>
            <a class="add-button" href="<?= Html::url("tags/ajout") ?>">Tag</a>
        </span>
    </div>
</div>