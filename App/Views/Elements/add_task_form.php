<?=
    Form::start(Html::url($task_form_url), "POST", [
        'errors' => isset($errors) ? $errors : [],
        "defaultInput" => [
            'class' => 'form__input'
        ]
    ])
    ->text("title", isset($task->title) ? $task->title: '', [
        "placeholder" => "Acheter des totmates",
        "class" => 'form__input form__input--full',
        'label' => "Titre de la tâche :"
    ])
    ->select("project_id", $projects->data, [
        'label' => 'Associer au projet :',
        'value' => 'name'
    ])
    ->end("Ajouter", ['class' => 'button button--smaller form__input form__submit'])
?>