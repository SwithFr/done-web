<?php
    $nameError = isset($_SESSION['project-errors']['name']) ? 'hasError' : '';
    unset($_SESSION['project-errors']);
?>
<form class="form" action="<?= \Core\Helpers\Html::url("decouvrir/projects") ?>" method="post">
    <label class="<?= $nameError ?>" for="name">Nom du projet</label>
    <input type="text" class="form__input <?= $nameError ?>" name="name" id="name" placeholder="Courses">
    <input class="button button--smaller form__input form__submit" type="submit" value="Ajouter">
</form>