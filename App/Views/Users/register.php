<section class="section">
    <h2 class="section__title">Inscription</h2>
    <p class="section__content">
        Creez votre compte en moins de 30 secondes et commencez tout de suite à planifier vos tâches les plus importantes.
    </p>
    <?php
        $loginHasError = isset($errors) && isset($errors['login']) ? ' hasError' : '';
        $passwordHasError = isset($errors) && isset($errors['password']) ? ' hasError' : '';
    ?>
    <?= Form::start("inscription", 'POST', ['class' => 'form']) ?>

    <label for="login" class="<?= $loginHasError ?>">Identifiant <?= isset($errors['login']) ? '(' . $errors['login'] . ')' : '' ?></label>
    <?= Form::input('text', 'login', false, [
        'class' => 'form__input form__input--full' . $loginHasError,
        'placeholder' => 'Tony'
    ], isset($user->login) ? $user->login : '') ;?>

    <label for="login" class="<?= $passwordHasError ?>">Mot de passe <?= isset($errors['password']) ? '(' . $errors['password'] . ')' : '' ?></label>
    <?= Form::input('password', 'password', false, [
        'class' => 'form__input form__input--full' . $loginHasError,
        'placeholder' => '*****'
    ]) ;?>

    <?= Form::end("Je m‘inscris", [
        'class' => 'button form__submit--full'
    ]) ?>

    <div class="linksToConnect">
        <a title="Redirig vers la page de connexion" href="<?= Html::url("connexion") ?>">J'ai déjà un compte !</a>
    </div>
</section>
