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
    ->text("due_to", isset($task->due_to) ? $task->due_to: '', [
        "placeholder" => "jj/mm/aaaa",
        "class" => 'form__input form__input--full',
        'label' => "A terminer avant le :"
    ])
    ->textarea("note", isset($task->note) ? $task->note: '', [
        "class" => 'form__input form__input--full',
        'label' => "Commentaire :"
    ])
    ->select("project_id", $projects->data, [
        'label' => 'Associer au projet :',
        'class' => 'form__input form__input--full',
        'value' => 'name'
    ])
    ->select("tag_id[]", isset($tags->data) ? $tags->data : [], [
        'label' => 'Associer un tag :',
        'class' => 'form__input form__input--full',
        'value' => 'name',
        'multiple' => true,
        'showIf' => !empty($tags->data)
    ])
    ->select("state_id", isset($states->data) ? $states->data : [], [
        'label' => 'Associer un état :',
        'class' => 'form__input form__input--full',
        'value' => 'name',
        'showIf' => !empty($states->data)
    ])
    ->end("Ajouter", ['class' => 'button button--smaller form__input form__submit form__submit--full'])
?>