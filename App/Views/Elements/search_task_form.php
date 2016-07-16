<?=
    Form::start(Html::url("search") , "POST", [
        'errors' => @$errors
    ])
    ->text('query', isset($query) ? $query : '' , [
        "placeholder" => "Trouver des tâches"
    ])
    ->end("chercher", [
        'class' => 'button button--smaller form__input form__submit'
    ])
?>