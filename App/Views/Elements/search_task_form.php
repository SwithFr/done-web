<?=
    Form::start(Html::url("search") , "POST", [
        "manageErrors" => false,
        'class' => 'form',
        "defaultInput" => [
            'class' => 'form__input'
        ]
    ])
    ->text('query', isset($query) ? $query : '' , [
        "placeholder" => "Trouver des tâches"
    ])
    ->end("chercher", [
        'class' => 'button button--smaller form__input form__submit'
    ])
?>