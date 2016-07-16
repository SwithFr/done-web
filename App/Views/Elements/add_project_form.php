<?=
    Form::start(Html::url($form_url), "POST", [
        'errors' => isset($errors) ? $errors : [],
        "defaultInput" => [
            'class' => 'form__input'
        ]
    ])
    ->text("name", isset($project->name) ? $project->name : '', [
        "placeholder" => "Liste des courses",
        'label' => "Nom du projet :"
    ])
    ->end("Ajouter", [
        'class' => 'button button--smaller form__input form__submit'
    ])
?>