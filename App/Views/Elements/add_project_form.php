<?php
$errors = isset($_SESSION['project-errors']) ? $_SESSION['project-errors'] : [];
unset($_SESSION['project-errors']);
?>

<?=
    Form::start(Html::url("decouvrir/projets"), "POST", [
        'errors', $errors,
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