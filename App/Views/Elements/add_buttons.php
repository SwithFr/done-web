<div class="buttons-container">
    <a class="add-button <?= isset($_SESSION['hasProject']) ? '' : 'disabled' ?>" href="<?= isset($_SESSION['hasProject']) ?  Html::url("taches/ajout")  : '#' ?>">Tâche</a>
    <a class="add-button" href="<?= Html::url("projets/ajout") ?>">Projet</a>
</div>