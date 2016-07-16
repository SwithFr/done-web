<form class="form" action="<?= Html::url("search") ?>" method="get">
    <label for="query" class="hidden">Trouver des tâches</label>
    <input class="form__input" type="text" id="query" name="query" placeholder="Trouver des tâches">
    <input class="button button--smaller form__input form__submit" type="submit" value="chercher">
</form>