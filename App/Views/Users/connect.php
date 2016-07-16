<section class="section">
    <h2 class="section__title">Connexion</h2>
    <p class="section__content">
        Conectez-vous et retrouvez toutes vos tâches en attentes.
    </p>

    <?php
        $loginHasError = isset($errors) && isset($errors['login']) ? ' hasError' : '';
        $passwordHasError = isset($errors) && isset($errors['password']) ? ' hasError' : '';
    ?>
    <?= Form::start("connexion", 'POST', ['class' => 'form']) ?>

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

    <?= Form::end("Je me connect", [
        'class' => 'button form__submit--full'
    ]) ?>

    <div class="linksToConnect">
        <a title="Redirig vers la page d'inscription" href="<?= Html::url("inscription") ?>">Je n'ai pas encore de compte !</a>
    </div>
</section>
