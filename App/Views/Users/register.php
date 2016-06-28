<?php use Core\Helpers\Form; ?>
<section class="section">
    <h2 class="section__title">Inscription</h2>
    <p class="section__content">
        Creez votre compte en moins de 30 secondes et commencez tout de suite à planifier vos tâches les plus importantes.
    </p>
    <?= Form::start("inscription", 'POST', ['class' => 'form']) ?>

    <?= Form::input('text', 'login', 'Identifiant', [
        'class' => 'form__input form__input--full',
        'placeholder' => 'Tony'
    ]) ;?>
    <?= Form::input('password', 'password', 'Mot de passe', [
        'class' => 'form__input form__input--full',
        'placeholder' => '*****'
    ]) ;?>

    <?= Form::end("Je m‘inscris", [
        'class' => 'button form__submit--full'
    ]) ?>

    <div class="linksToConnect">
        <a title="Redirig vers la page de connexion" href="<?= \Core\Helpers\Html::url("connexion") ?>">J'ai déjà un compte !</a>
    </div>
</section>
