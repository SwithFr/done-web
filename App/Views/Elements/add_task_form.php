<?php
    $titleError = isset($_SESSION['task-errors']['title']) ? 'hasError' : '';
    unset($_SESSION['task-errors']);
?>
<form class="form" action="<?= \Core\Helpers\Html::url("decouvrir/tasks") ?>" method="post">
    <label for="title <?= $titleError ?>">Titre de la tâche</label>
    <input type="text" class="form__input form__input--full <?= $titleError ?>" title="title" name="title" id="title" placeholder="Acheter des tomates">
    <label for="project">Associer au projet</label>
    <select class="form__input" id="project" name="project_id">
        <?php foreach($projects->data as $project): ?>
            <option value="<?= $project->id ?>"><?= $project->name ?></option>
        <?php endforeach; ?>
    </select>
    <input class="button button--smaller form__input form__submit" type="submit" value="Ajouter">
</form>