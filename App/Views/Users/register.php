<?php use Core\Helpers\Form; ?>
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
