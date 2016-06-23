<?php $title_for_layout = "Découvrez Done, le gestionnaire de tâche, en créant votre première tâche."; ?>
<?= $this->element("search_task_form") ?>
<?= $this->element("add_buttons") ?>
<?php if(!isset($_SESSION['hasProject'])): ?>
    <section class="section">
        <h2 class="section__title">Créer une tâche</h2>
        <p class="section__content">
            Une tâche étant rarement privée d'un contexte, il est préférable de les ranger par "projet" pour rester organisé. "Projet" est le terme utilisé par Done pour exprimer un contexte mais vous pouvez imaginez ça comme une grosse catégorie, par exemple "Courses".
        </p>
        <p class="section__content">
            Pour ajouter un projet, cliquez sur le boutton en haut de la page <a class="add-button" href="#add-project-section">Projet.</a>
        </p>
        <p class="section__content">
            N'ayant encore aucun projet, remarquez que vous ne pouvez ajouter de tâche pour le moment.
        </p>
    </section>
<?php endif; ?>

<section class="section" id="add-project-section">
    <h2 class="section__title">Ajouter un projet</h2>
    <p class="section__content">
        Créer un projet est relativement simple ! Il suffit de choisir un nom.
    </p>
    <?= $this->element("add_project_form") ?>
    <p class="section__infos">Cette action ne nécessite aucune inscription.</p>
</section>
<section class="section" id="add-task-section">
    <h2 class="section__title">Ajouter une tâche</h2>
    <p class="section__content">
        Pour ajouter une tâche, cliquez sur le boutton en haut de la page <a class="add-button" href="#add-task-section">Tâche.</a>
    </p>
    <p class="section__content">
        Ensuite, il vous suffit de choisir un titre pour votre tâche et de l'associer à un projet.
    </p>
    <?= $this->element("add_task_form", isset($projects) ? $projects : null) ?>
</section>