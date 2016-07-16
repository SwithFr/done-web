<section class="section">
    <h2 class="section__title">Connexion</h2>
    <p class="section__content">
        Conectez-vous et retrouvez toutes vos tâches en attentes.
    </p>

   <?=
        Form::start(Html::url("connexion"), 'POST', [
            'errors' => $errors,
            "defaultInput" => [
                'class' => 'form__input'
            ]
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
        ->end("Je me connect", [
            'class' => 'button form__submit--full'
        ])
    ?>

    <div class="linksToConnect">
        <a title="Redirig vers la page d'inscription" href="<?= Html::url("inscription") ?>">Je n'ai pas encore de compte !</a>
    </div>
</section>
