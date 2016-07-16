<section class="section">
    <h2 class="section__title">Inscription</h2>
    <p class="section__content">
        Creez votre compte en moins de 30 secondes et commencez tout de suite à planifier vos tâches les plus importantes.
    </p>

    <?=
        Form::start(Html::url("inscription"), 'POST', [
            'errors' => $errors
        ])
        ->text('login', isset($user->login) ? $user->login : '',  [
            "placeholder" => "Tony",
            "class" => 'form__input form__input--full',
            'label' => "Identifiant :"
        ])
        ->password('password' , '', [
            'placeholder' => '*****',
            "class" => 'form__input form__input--full',
            'label' => "Mot de passe :"
        ])
        ->end("Je m‘inscris", [
            'class' => 'button form__submit--full'
        ])
    ?>

    <div class="linksToConnect">
        <a title="Redirig vers la page de connexion" href="<?= Html::url("connexion") ?>">J'ai déjà un compte !</a>
    </div>
</section>
