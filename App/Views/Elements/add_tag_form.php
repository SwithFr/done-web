<?=
    Form::start(Html::url('tags/ajout'), "POST", [
        'errors' => isset($errors) ? $errors : [],
        "defaultInput" => [
            'class' => 'form__input'
        ]
    ])
    ->text("name", isset($tag->name) ? $tag->name: '', [
        "placeholder" => "Vraiment urgent",
        "class" => 'form__input form__input--full',
        'label' => "Nom du tag :"
    ])
    ->end("Ajouter", ['class' => 'button button--smaller form__input form__submit form__submit--full'])
?>