<?=
    Form::start(Html::url('etats/ajout'), "POST", [
        'errors' => isset($errors) ? $errors : [],
        "defaultInput" => [
            'class' => 'form__input'
        ]
    ])
    ->text("name", isset($task->name) ? $task->name: '', [
        "placeholder" => "Prêt a envoyer",
        "class" => 'form__input form__input--full',
        'label' => "Nom de l'état :"
    ])
    ->end("Ajouter", ['class' => 'button button--smaller form__input form__submit form__submit--full'])
?>