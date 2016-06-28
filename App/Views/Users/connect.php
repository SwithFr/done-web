<?php use Core\Helpers\Form; ?>
<section class="section">
    <h2 class="section__title">Connexion</h2>
    <p class="section__content">
        Conectez-vous et retrouvez toutes vos tâches en attentes.
    </p>
    <?= Form::start("connexop,", 'POST', ['class' => 'form']) ?>

    <?= Form::input('text', 'login', 'Identifiant', [
        'class' => 'form__input form__input--full',
        'placeholder' => 'Tony'
    ]) ;?>
    <?= Form::input('password', 'password', 'Mot de passe', [
        'class' => 'form__input form__input--full',
        'placeholder' => '*****'
    ]) ;?>

    <?= Form::end("Je me connect", [
        'class' => 'button form__submit--full'
    ]) ?>

    <div class="linksToConnect">
        <a title="Redirig vers la page d'inscription" href="<?= \Core\Helpers\Html::url("inscription") ?>">Je n'ai pas encore de compte !</a>
    </div>
</section>
